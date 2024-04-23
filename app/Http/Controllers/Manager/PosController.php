<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
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
                        $query->where('finish_time', '=', null)->where('finished', '=', 0)->latest()->take(1)->with('kots.kotProducts', 'floor');
                    }])
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
}