<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Helper\OrderHelper;
use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\IngredientRestaurantLanguage;
use App\Models\Kot;
use App\Models\KotHold;
use App\Models\KotProduct;
use App\Models\KotProductIngredient;
use App\Models\KotProductVariation;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Product;
use App\Models\ProductLanguage;
use App\Models\ProductRestaurantLanguage;
use App\Models\RestaurantLanguage;
use App\Models\Table;
use App\Models\VariationRestaurantLanguage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Variable;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPdfMail;
use App\Models\Restaurant;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{
    public function getCurrentTableDetails(Request $req)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $langId)
        ->where('restaurant_id', $restaurantId)
        ->value('id');

        $tableId = $req->tableId;

        $table = Table::with(['orders' => function ($query) {
                        $query->where('finished', '=', 0)->latest()->take(1)->with('kots.kotProducts');
                    }, 'floor', 'kotHold'])
                    ->where('id', $tableId)
                    ->where('restaurant_id', $restaurantId)
                    ->first();

        if ($table) {
            $orderData = null;
            $receivedType = 'dine_in';
            if ($table->orders->isNotEmpty()) {
                $order = $table->orders->first();
                $kotsData = $order->kots->map(function ($kot) use($restaurantLanguageId) {
                    $kotProductsData = $kot->kotProducts->map(function ($kotProduct) use($restaurantLanguageId) {
                        $name = ProductRestaurantLanguage::where('restaurant_language_id', $restaurantLanguageId)
                                ->where('product_id', $kotProduct->product_id)
                                ->value('name');
                                
                        $subCategoryId = Product::where('id', $kotProduct->product_id)
                                                    ->value('sub_category_id');

                        $variation = null;
                        $ingredients = [];
                        if($kotProduct->kotProductVariation){
                            $varName = VariationRestaurantLanguage::where('restaurant_language_id', $restaurantLanguageId)
                                        ->where('variation_id', $kotProduct->kotProductVariation->variation_id)
                                        ->value('name');
                            $variation = $varName;
                        }

                        if($kotProduct->kotProductIngredients){
                            $ingredients = $kotProduct->kotProductIngredients->map(function ($kotProductIngredient) use($restaurantLanguageId) {
                                $ingName = IngredientRestaurantLanguage::where('restaurant_language_id', $restaurantLanguageId)
                                        ->where('ingredient_id', $kotProductIngredient->ingredient_id)
                                        ->value('name');
                                return $ingName;
                            });
                        }

                        return [
                            'id' => $kotProduct->id,
                            'quantity' => $kotProduct->quantity,
                            'note' => $kotProduct->note,
                            'name' => $name,
                            'subCategoryId' => $subCategoryId,
                            'price' => $kotProduct->price,
                            'total_price' => $kotProduct->total_price,
                            'extra_amount' => $kotProduct->extra_amount,
                            'variation' => $variation,
                            'ingredients' => $ingredients,
                        ];
                    });
                    return [
                        'id' => $kot->id,
                        'time' => $kot->time,
                        'number' => $kot->number,
                        'kot_products' => $kotProductsData
                    ];
                });
                $orderData = [
                    'id' => $order->id,
                    'person' => $order->person,
                    'phone' => $order->phone,
                    'name' => $order->name,
                    'email' => $order->email,
                    'address' => $order->address,
                    'locality' => $order->locality,
                    'start_at' => $order->start_at,
                    'finish_time' => $order->finish_time,
                    'finish_at' => $order->finish_at,
                    'note' => $order->note,
                    'waiter' => $order->waiter_id,
                    'kots' => $kotsData,
                    'total_price' => $order->total_price,
                    'discount_amount' => $order->discount_amount,
                    'payable_amount' => $order->payable_amount,
                    'discount_type' => $order->discount_type
                ];
                $latestKot = Kot::where('order_id', $order->id)->latest()->take(1)->first();
                if($latestKot){
                    $receivedType = $latestKot->food_received_type ? : 'dine_in';
                }
            }

            $floorData = null;
            if ($table->floor) {
                $floor = $table->floor;
                $floorData = [
                    'id' => $floor->id,
                    'name' => $floor->short_cut,
                ];
            }

            $holdKOTData = null;
            if($table->kotHold){
                $holdKOTData = $table->kotHold;
            }



            $transformedTable = [
                'id' => $table->id,
                'table_number' => $table->table_number,
                'capacity_of_person' => $table->capacity_of_person,
                'order' => $orderData,
                'hold_kot_data' => $holdKOTData,
                'floor' => $floorData,
                'received_type' => $receivedType
            ];
        } else {
            $transformedTable = null;
        }

        return response()->json($transformedTable);
    }

    public function addKOT(Request $request){
        $restaurantId = CustomerHelper::getRestaurantId();
        $table = Table::with(['orders' => function ($query) {
            $query->where('finish_time', '=', null)->where('finished', '=', 0)->latest()->take(1)->with('kots.kotProducts');
        }, 'floor'])
        ->where('id', $request->tableId)
        ->where('restaurant_id', $restaurantId)
        ->first();   

        if($table->orders->isNotEmpty()){
            $order = $table->orders->first();
            $orderId = $order->id;

            $kotNumber = count($order->kots) + 1;
        }else{
            $order = OrderHelper::orderUpdate($request, $restaurantId, 4, $table);
            $orderId = $order->id;
            $kotNumber = 1;
        }

        $priceCount = 0;
        $kot = new Kot();
        $kot->order_id = $orderId;
        $kot->restaurant_id = $restaurantId;
        $kot->time = date('H:i:s');
        $kot->food_received_type = $request->foodReceivedType;
        $kot->number = $kotNumber;
        if($kot->save()){
            $kotPrice = 0;
            foreach($request->cart as $product){
                $priceCount += $product['quantity'] * ($product['price'] + $product['extraAmount']);
                $kotPrice += $product['quantity'] * ($product['price'] + $product['extraAmount']);
                $kotProduct = new KotProduct();
                $kotProduct->kot_id = $kot->id;
                $kotProduct->product_id = $product['id'];
                $kotProduct->quantity = $product['quantity']; 
                $kotProduct->note = $product['note']; 
                $kotProduct->price = $product['price']; 
                $kotProduct->extra_amount = $product['extraAmount'];
                $kotProduct->total_price = ($product['extraAmount'] + $product['price']) * $product['quantity'];
                if($kotProduct->save()){
                    foreach($product['ingredient'] as $ingredient){
                        $kotProductIngredient = new KotProductIngredient();
                        $kotProductIngredient->kot_product_id = $kotProduct->id;
                        $kotProductIngredient->ingredient_id = $ingredient['id'];
                        $kotProductIngredient->price = $ingredient['price'];
                        $kotProductIngredient->save();
                    }
                    if(isset($product['variation']) && !empty($product['variation'])){
                        $variation = $product['variation'];
                        $kotProductVariation = new KotProductVariation();
                        $kotProductVariation->kot_product_id = $kotProduct->id;
                        $kotProductVariation->variation_id = $variation['id'];
                        $kotProductVariation->price = $variation['price'];
                        $kotProductVariation->save();
                    }
                }
            }
            Kot::where('id',$kot->id)->update(['price' => $kotPrice]);
        }

        $order = OrderHelper::orderUpdate($request, $restaurantId, 11, null);

        $this->updateCustomerData($order->id, $request);
        $this->removeHoldKOT($request->tableId);
        
        return response()->json(['success'=>'KOT Added Successfully.']);
    }

    public function removeDiscount(Request $request) {
        
        $order =  Order::findOrFail($request->tableId);

        if($order) {

            $order->update([
                'discount_type'   =>  'fixed',
                'discount_amount' =>  0.00,
                'payable_amount'  =>  $order->total_price
            ]);

            return response()->json([
                'success' => 'Discount Remove Successfully.'
            ], 200);
        }
        
    }

    public function saveData(Request $request){

        $restaurantId = CustomerHelper::getRestaurantId();
        $table = Table::with(['orders' => function ($query) {
            $query->where('finish_time', '=', null)->where('finished', '=', 0)->latest()->take(1);
        }, 'floor'])
        ->where('id', $request->tableId)
        ->where('restaurant_id', $restaurantId)
        ->first();

        if($table->orders->isNotEmpty()){
            $order = $table->orders->first();
        }else{
            $order = OrderHelper::orderUpdate($request, $restaurantId, 3, null);
        }

        OrderHelper::orderUpdate($request, $restaurantId, 12, null);

        $this->updateCustomerData($order->id, $request);
        return response()->json(['success'=>'Data Added Successfully.']);
    }
    
    public function updateCustomerData($orderId, $request){

        $restaurantId = CustomerHelper::getRestaurantId();

        $data = [
            'restaurant_id' => $restaurantId,
            'name' => $request->personName,
            'number' => $request->personNumber,
        ];
        $getCustomerId = Order::where('id', $orderId)->value('customer_id');
        if($getCustomerId){
            Customer::where('id', $getCustomerId)
                    ->update($data);
        }else{
            $customerId = Customer::insertGetId($data);
            Order::where('id', $orderId)->update(['customer_id' => $customerId]);
        }
    }

    public function holdKOT(Request $request){
        $restaurantId = CustomerHelper::getRestaurantId();

        $personDetails = [
            'number' => $request->personNumber,
            'name' => $request->personName,
            'email' => $request->personEmail,
            'address' => $request->personAddress,
            'locality' => $request->personLocality,
            'person' => $request->numberOfPerson
        ];

        $data = [
            'products' => json_encode($request->cart),
            'person_details' => json_encode($personDetails),
            'waiter_id' => $request->selectWaiter,
            'food_received_type' => $request->foodReceivedType,
            'order_note' => $request->orderNote
        ];

        KotHold::updateOrCreate(
            [
                'table_id' => $request->tableId,
                'restaurant_id' => $restaurantId
            ],$data);

        Order::where('table_id', $request->tableId)->update([
            'total_price'     => $request->subTotal,
            'payable_amount'  => $request->payableAmount,
            'discount_amount' => $request->discountAmount
        ]);

        return response()->json(['success'=>'Hold KOT Added Successfully.']);

    }

    public function removeHoldKOT($tableId){
        $restaurantId = CustomerHelper::getRestaurantId();
        KotHold::where('table_id', $tableId)->where('restaurant_id', $restaurantId)->delete();
        return response()->json(['success'=>'Hold KOT Removed Successfully.']);
    }

    public function saveSettleBill(Request $request) {

        $orderPayment = new OrderPayment();
        $orderPayment->order_id = $request->orderId;
        $orderPayment->table_id = $request->tableId;
        $orderPayment->payment_type = $request->paymentType;
        $orderPayment->customer_paid = $request->customerPaid;
        $orderPayment->return_to_customer = $request->returnMoney;
        $orderPayment->tip = $request->tip;
        $orderPayment->settle_amount = $request->settlementAmount;
        $orderPayment->payment_type_data = $request->subPaymentData ? $request->subPaymentData : null;
        $orderPayment->save();

        Order::where('id', $request->orderId)
                ->update([
                    // 'finish_time' => Carbon::now(),
                    'finished' => 1,
                    'is_serve' => 1,
                    'finish_at' => Carbon::now(),
                ]);

        return response()->json(['success'=>'Bill Settle Successfully.']);
    }

    public function printOrder ($id) {

        $restaurant = Restaurant::find(Auth::user()->restaurant_id);

        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->first();

        $order = Order::with('kots.kotProducts')->find($id);

        $kotId = (isset($order->kots) && isset($order->kots[0])) ? $order->kots[0]->id : "";
        $orderProduct = KotProduct::with('product.productRestaurantLanguages')->where('kot_id',$kotId)->get();

        $htmlContent = view('emails.invoice', compact('setting', 'order', 'restaurant', 'orderProduct'))->render();

        // Load HTML content into Dompdf instance
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');  // Set the default font

        $domPdf = new Dompdf($options); 

        // Load HTML content into Dompdf instance
        $domPdf->loadHtml($htmlContent);

        // Render the HTML as PDF
        $domPdf->render();

        // Get the generated PDF content
        $pdfContent = $domPdf->output();

        // Send email with PDF attachment
        $result = Mail::to($order->email)->send(new SendPdfMail($pdfContent,$order,$setting, $restaurant));

        if($result) {
            return response()->json([
                'status'    =>  true,
                'success'   =>  'We Have Mail Invoice To Your Mail Address With Pdf Attachment.'
            ], 200);
        }

    }
}