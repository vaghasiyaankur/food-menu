<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Setting;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        $restaurantId = Auth::user()->restaurant_id;
        $restaurantTime = Restaurant::whereId($restaurantId)->first(['operating_start_hours', 'operating_end_hours']);

        $openTiming = $restaurantTime->operating_start_hours;
        $restaurantOpen = Carbon::createFromFormat('h:i A', $openTiming)->format('H');

        $closeTiming = $restaurantTime->operating_end_hours;
        $restaurantClose = Carbon::createFromFormat('h:i A', $closeTiming)->format('H');

        $from_date = $request->from_date ? date('Y-m-d', strtotime($request->from_date)) : Carbon::now()->format('Y-m-d');
        $to_date = $request->to_date ? date('Y-m-d', strtotime($request->to_date)) : $from_date;

        $total_order =  Order::withTrashed()->whereRestaurantId($restaurantId)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
        $complete_order = Order::whereRestaurantId($restaurantId)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->where('finished', 1)->count();
        $ongoing_order = Order::whereRestaurantId($restaurantId)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->where('finished', 0)->whereNotNull('start_at')->count();
        $customers = Customer::count();

        if(!$total_order) $reservation_table = 0;
        else{
            $most_table_order = Order::whereRestaurantId($restaurantId)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->groupBy('table_id')->select('table_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->first();
            $reservation_table = $most_table_order->table_id ? : 0;
        }
        
        $hourly_data = Order::withTrashed()
        ->where('restaurant_id', $restaurantId)
        ->whereBetween('created_at', [$from_date . ' 00:00:00', $to_date . ' 23:59:59'])
        ->get()
            ->groupBy(fn($date) => $date->created_at->format('H'))
            ->map(fn($group, $hour) => [
                'hour' => $hour,
                'total' => $group->count(),
                'completed' => $group->where('finished', 1)->count(),
                'ongoing' => $group->where('finished', 0)->whereNotNull('start_at')->whereNull('deleted_at')->count(),
            ]);
        
        $hours = $total = $completed = $ongoing = [];

        for ($hour = $restaurantOpen; $hour <= $restaurantClose; $hour++) {
            $hourStr = str_pad($hour, 2, '0', STR_PAD_LEFT); 
            $data = $hourly_data->get($hourStr, [
                'hour' => $hourStr,
                'total' => 0,
                'completed' => 0,
                'ongoing' => 0,
            ]);

            $hours[] = $data['hour'];
            $total[] = $data['total'];
            $completed[] = $data['completed'];
            $ongoing[] = $data['ongoing'];
        }

        $chart_data = ['hours' => $hours,'total' => $total,'completed' => $completed, 'ongoing' => $ongoing];

        return response()->json(['chart_data' => $chart_data,'total_order' => $total_order,'complete_order' => $complete_order,
            'ongoing_order' => $ongoing_order,'reservation_table' => $reservation_table,'customers' => $customers ], 200);
    }

    public function reportChartData(Request $request)
    {
        $all_orders = Order::withTrashed()->whereRestaurantId(Auth::user()->restaurant_id)->select('created_at', DB::raw('count(*) as orders'))->groupBy('created_at')->orderBy('created_at')->get();
        return response()->json(['all_orders' => $all_orders ] , 200);
    }
}
