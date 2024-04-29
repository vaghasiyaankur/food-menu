<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function kotList(Request $request) {
        $floorId = $request->floor;
        $kot_orders = Order::with([
            'table' => function ($query) {
                $query->select('id', 'table_number');
            },
            'kots.kotProducts.product.productRestaurantLanguages'
        ])->whereHas('table', function ($query) use ($floorId) {
            if ($floorId != '') $query->where('floor_id', $floorId);
        })->whereRestaurantId(Auth::user()->restaurant_id)->paginate(12);
        
        return response()->json($kot_orders);
    }
}
