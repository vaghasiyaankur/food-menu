<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Table;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
    * This controller is used for Report Page data
    * in the Manage panel
    */


    /**
     * To pass Report of the website to manager panel
     *
     * @return @json ($setting)
     *
     */

    public function reportData(Request $request)
    {
        $from_date = $request->from_date ? date('Y-m-d', strtotime($request->from_date)) : Carbon::now()->format('Y-m-d');
        $to_date = $request->to_date ? date('Y-m-d', strtotime($request->to_date)) : $from_date;

        $total_order =  Order::whereRestaurantId(Auth::user()->restaurant_id)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
        $complete_order = Order::whereRestaurantId(Auth::user()->restaurant_id)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->where('finished', 1)->count();
        $ongoing_order = Order::whereRestaurantId(Auth::user()->restaurant_id)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->where('finished', 0)->whereNotNull('start_at')->count();
        $customers = Customer::count();

        if(!$total_order) $reservation_table = 0;
        else{
            $most_table_order = Order::whereRestaurantId(Auth::user()->restaurant_id)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->groupBy('table_id')->select('table_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->first();

            $reservation_table = $most_table_order->table_id ? : 0;
        }

        return response()->json([ 'total_order' => $total_order, 'complete_order' => $complete_order, 'ongoing_order' => $ongoing_order, 'reservation_table' => $reservation_table, 'customers' => $customers] , 200);
    }

    public function reportChartData(Request $request)
    {
        $all_orders = Order::withTrashed()->whereRestaurantId(Auth::user()->restaurant_id)->select('created_at', DB::raw('count(*) as orders'))->groupBy('created_at')->orderBy('created_at')->get();
        return response()->json(['all_orders' => $all_orders ] , 200);
    }
}
