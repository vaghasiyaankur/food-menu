<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrders(){

        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->value('currency_symbol');

        $orders = Order::with('customer')->get();

        return response()->json(['setting' => $setting,'orders' => $orders]);
    }

    public function getOrder(Order $order) {

        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->value('currency_symbol');

        $order->load('customer');

        return response()->json(['setting' => $setting, 'order' => $order]);
    } 
}
