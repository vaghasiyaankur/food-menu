<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardList(Request $request)
    {
        $from_date = $request->from_date ? date('Y-m-d', strtotime($request->from_date)) : Carbon::now()->format('Y-m-d');
        $to_date = $request->to_date ? date('Y-m-d', strtotime($request->to_date)) : $from_date;

        $total_order =  Order::whereRestaurantId(Auth::user()->restaurant_id)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
        $complete_order = Order::whereRestaurantId(Auth::user()->restaurant_id)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->where('finished', 1)->count();
        $pending_order = Order::whereRestaurantId(Auth::user()->restaurant_id)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->where('finished', 0)->whereNotNull('start_at')->count();
        $customers = Customer::count();
        $latestCustomer = Customer::whereRestaurantId(Auth::user()->restaurant_id)->orderByDesc('id')->take(8)->get();

        return response()->json([
            'status' => true, 
            'total_order' => $total_order,
            'completed_order' => $complete_order,
            'pending_order' => $pending_order,
            'customer' => $customers,
            'latest_customer' => $latestCustomer
        ], 200);
    }
}
