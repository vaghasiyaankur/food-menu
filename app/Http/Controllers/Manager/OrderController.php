<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Kot;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function kotList(Request $request) {
        $floorId = $request->floor;
        $dineType = $request->dineType;
        $kot_orders = Order::with([
            'table' => function ($query) {
                $query->select('id', 'table_number');
            },
            'kots.kotProducts.product.productRestaurantLanguages'
        ])->whereHas('table', function ($query) use ($floorId) {
            if ($floorId != '') $query->where('floor_id', $floorId);
        })
        ->whereHas('kots', function ($query) use ($dineType) {
            if ($dineType != '') $query->where('food_received_type', $dineType);
        })
        ->whereRestaurantId(Auth::user()->restaurant_id)->whereNull('finish_at')->where('finished', 0)->paginate(12);
        
        return response()->json($kot_orders);
    }

    public function orderServe(Request $request) {
        if ($request->type == 'order') {
            Kot::whereOrderId($request->id)->update(['is_serve'=> 1]);
            Order::whereId($request->id)->update(['is_serve'=> 1]);
        } else {
            $kot = Kot::find($request->id);
            $kot->update(['is_serve'=> 1]);

            $kot_exists = Kot::whereOrderId($request->id)->whereIsServe(1)->exists();
            if ($kot_exists) {
                Order::whereId($kot->order_id)->update(['is_serve'=> 1]);
            }
        }
        return response()->json(['success' => 'Order Serve Successfully.']);
    }

    public function getCompleteOrders(Request $request) {
        $kot_orders = Order::with(['kots' => function ($query) {
            $query->withCount('kotProducts');
        }])
        ->select('id','created_at','total_price')
        ->whereRestaurantId(Auth::user()->restaurant_id)
        ->whereNotNull('finish_at')
        ->where('finished', 1)
        ->paginate(12);

        // Iterate over each order in the paginated result
        foreach ($kot_orders as $order) {
            // Add the kot_products_count of the current order to the total sum
            $order->total_products = 0;
            foreach ($order->kots as $key => $kot) {
                $order->total_products += $kot->kot_products_count;
            }
        }
        
        return response()->json($kot_orders);
    }

    public function getOrder ($id) {
        $kot_order = Order::with([
            'table' => function ($query) {
                $query->select('id', 'table_number');
            },
            'kots.kotProducts.product.productRestaurantLanguages'
        ])->whereRestaurantId(Auth::user()->restaurant_id)->find($id);
        
        return response()->json($kot_order);
    }
}