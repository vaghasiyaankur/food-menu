<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function kotList() {
        $kot_orders = Order::with([
            'table' => function ($query) {
                $query->select('id', 'table_number');
            },
            'kots.kotProducts.product.productRestaurantLanguages'
        ])->paginate(12);
        
        return response()->json($kot_orders);
    }
}
