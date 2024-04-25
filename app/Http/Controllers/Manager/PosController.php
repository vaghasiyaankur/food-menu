<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\IngredientRestaurantLanguage;
use App\Models\Kot;
use App\Models\KotProduct;
use App\Models\KotProductIngredient;
use App\Models\KotProductVariation;
use App\Models\Order;
use App\Models\ProductLanguage;
use App\Models\ProductRestaurantLanguage;
use App\Models\RestaurantLanguage;
use App\Models\Table;
use App\Models\VariationRestaurantLanguage;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Variable;

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
                        $query->where('finish_time', '=', null)->where('finished', '=', 0)->latest()->take(1)->with('kots.kotProducts');
                    }, 'floor'])
                    ->where('id', $tableId)
                    ->where('restaurant_id', $restaurantId)
                    ->first();

        if ($table) {
            $orderData = null;
            if ($table->orders->isNotEmpty()) {
                $order = $table->orders->first();
                $kotsData = $order->kots->map(function ($kot) use($restaurantLanguageId) {
                    $kotProductsData = $kot->kotProducts->map(function ($kotProduct) use($restaurantLanguageId) {
                        $name = ProductRestaurantLanguage::where('restaurant_language_id', $restaurantLanguageId)
                                ->where('product_id', $kotProduct->product_id)
                                ->value('name');

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
                    'start_time' => $order->start_time,
                    'finish_time' => $order->finish_time,
                    'finish_at' => $order->finish_at,
                    'kots' => $kotsData,
                ];
            }

            $floorData = null;
            if ($table->floor) {
                $floor = $table->floor;
                $floorData = [
                    'id' => $floor->id,
                    'name' => $floor->name,
                ];
            }

            $transformedTable = [
                'id' => $table->id,
                'table_number' => $table->table_number,
                'capacity_of_person' => $table->capacity_of_person,
                'order' => $orderData,
                'floor' => $floorData,
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
            $order = new Order();
            $order->table_id = $request->tableId;
            $order->restaurant_id = $restaurantId;
            $order->start_time = date('Y-m-d H:i:s');
            $order->save();

            $orderId = $order->id;
            $kotNumber = 1;
        }
        $priceCount = 0;
        $kot = new Kot();
        $kot->order_id = $orderId;
        $kot->restaurant_id = $restaurantId;
        $kot->time = date('H:i:s');
        $kot->number = $kotNumber;
        if($kot->save()){
            foreach($request->cart as $product){
                $priceCount += $product['quantity'] * $product['price'] + $product['extraAmount'];
                $kotProduct = new KotProduct();
                $kotProduct->kot_id = $kot->id;
                $kotProduct->product_id = $product['id'];
                $kotProduct->quantity = $product['quantity']; 
                $kotProduct->note = $product['note']; 
                $kotProduct->price = $product['price']; 
                $kotProduct->extra_amount = $product['extraAmount'];
                $kotProduct->total_price = ($product['quantity'] * $product['price']) + $product['extraAmount'];
                if($kotProduct->save()){
                    foreach($product['ingredient'] as $ingredient){
                        $kotProductIngredient = new KotProductIngredient();
                        $kotProductIngredient->kot_product_id = $kotProduct->id;
                        $kotProductIngredient->ingredient_id = $ingredient['id'];
                        $kotProductIngredient->price = $ingredient['price'];
                        $kotProductIngredient->save();
                    }
                    if($product['variation']){
                        $variation = $product['variation'];
                        $kotProductVariation = new KotProductVariation();
                        $kotProductVariation->kot_product_id = $kotProduct->id;
                        $kotProductVariation->variation_id = $variation['id'];
                        $kotProductVariation->price = $variation['price'];
                        $kotProductVariation->save();
                    }
                }
            }
        }

        Order::where('id', $order->id)->update(['total_price' => $order->total_price + $priceCount]);
        
        return response()->json(['success'=>'KOT Added Successfully.']);
    }
}