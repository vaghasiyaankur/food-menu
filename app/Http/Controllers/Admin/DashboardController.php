<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardList(Request $request)
    {
        $from_date = $request->from_date ? date('Y-m-d', strtotime($request->from_date)) : Carbon::now()->format('Y-m-d');
        $to_date = $request->to_date ? date('Y-m-d', strtotime($request->to_date)) : $from_date;

        $ordersQuery = Order::whereRestaurantId(Auth::user()->restaurant_id)
                    ->whereDate('created_at', '>=', $from_date)
                    ->whereDate('created_at', '<=', $to_date);

        $total_order = $ordersQuery->count();

        $completeOrdersQuery = (clone $ordersQuery)->where('finished', 1);
        $complete_order = $completeOrdersQuery->count();
        $latest_complete_order = $completeOrdersQuery->take(8)->get();

        $pendingOrdersQuery = (clone $ordersQuery)->where('finished', 0)->whereNotNull('start_at');
        $pending_order = $pendingOrdersQuery->count();
        $latest_pending_order = $pendingOrdersQuery->take(8)->get();

        $latest_orders = $ordersQuery->take(8)->get();


        $categories = SubCategory::with(['subCategoryRestaurantLanguages' => function($query) {
            $query->first();
        }, 'products'])->whereStatus(1)->take(8)->get();            

        $customers = Customer::whereRestaurantId(Auth::user()->restaurant_id)
                    ->whereDate('created_at', '>=', $from_date)
                    ->whereDate('created_at', '<=', $to_date);

        $latestCustomer = $customers->take(8)->get();
        $customers = $customers->count();

        $latest_products = Product::whereRestaurantId(Auth::user()->restaurant_id)
                        ->whereStatus(1)
                        ->latest('id')
                        ->take(8)
                        ->get();

        $transactions = OrderPayment::whereHas('order', function($order){
            $order->whereRestaurantId(Auth::user()->restaurant_id);
        })->latest('id')->take(8)->get();                        

        return response()->json([
            'status' => true, 
            'total_order' => $total_order,
            'completed_order' => $complete_order,
            'latest_complete_order' => $latest_complete_order,
            'pending_order' => $pending_order,
            'latest_pending_order' => $latest_pending_order,
            'latest_orders' => $latest_orders,
            'customer' => $customers,
            'latest_customer' => $latestCustomer,
            'category' => $categories,
            'latest_products' => $latest_products,
            'transactions' => $transactions
        ], 200);
    }
}
