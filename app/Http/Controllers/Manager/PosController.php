<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Kot;
use App\Models\KotProduct;
use App\Models\KotProductIngredient;
use App\Models\KotProductVariation;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function getCurrentTableDetails(Request $req)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
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
                $kotsData = $order->kots->map(function ($kot) {
                    $kotProductsData = $kot->kotProducts->map(function ($kotProduct) {
                        return [
                            'id' => $kotProduct->id,
                            'quantity' => $kotProduct->quantity,
                            'note' => $kotProduct->note,
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

        $kot = new Kot();
        $kot->order_id = $orderId;
        $kot->restaurant_id = $restaurantId;
        $kot->time = date('H:i:s');
        $kot->number = $kotNumber;
        if($kot->save()){
            foreach($request->cart as $product){
                $kotProduct = new KotProduct();
                $kotProduct->kot_id = $kot->id;
                $kotProduct->product_id = $product['id'];
                $kotProduct->quantity = $product['quantity']; 
                $kotProduct->note = $product['note']; 
                $kotProduct->price = $product['price']; 
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
        
        return response()->json(['success'=>'KOT Added Successfully.']);
    }
}