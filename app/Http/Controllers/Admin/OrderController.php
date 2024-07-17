<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrders(Request $request)
    {
        $search = $request->input('search', false);
        $status = $request->input('status', false);

        // Fetch the currency symbol for the authenticated user's restaurant
        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->value('currency_symbol');

        // Initialize the base query for orders
        $orders = Order::with('customer')->whereRestaurantId(Auth::user()->restaurant_id)
                ->when($search, function ($query, $search) {
                    return $query->whereHas('customer', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                })
                ->when($status, function ($query, $status) {
                    return $query->where('status', $status);
                })
        ->latest('id')
        ->paginate(10);

        // Return the response as JSON
        return response()->json(['setting' => $setting, 'orders' => $orders]);
    }

    public function getOrder(Order $order) {

        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->first(['currency_code', 'currency_symbol']);

        $order->load([
            'customer',
            'orderPayment',
            'kots.kotProducts.product.productRestaurantLanguagesFirst',
            'kots.kotProducts.kotProductVariation.variation.variationRestaurantLanguagesFirst',
            'floorShiftHistory',
            'tableShiftHistory'
        ]);

        return response()->json(['setting' => $setting, 'order' => $order]);
    } 
}
