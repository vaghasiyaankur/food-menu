<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Table;
use Carbon\Carbon;
use DB;

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
        $from_date = $request->from_date ? date('Y-m-d', strtotime($request->from_date)) : date('Y-m-d', strtotime(Carbon::now()));
        $to_date = $request->to_date ? date('Y-m-d', strtotime($request->to_date)) : $from_date;
        
        $total_order =  Order::whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
        $complete_order = Order::whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
        $ongoing_order = Order::whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();    
        $reservation_table = Table::whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();

        return response()->json([ 'total_order' => $total_order, 'complete_order' => $complete_order, 'ongoing_order' => $ongoing_order, 'reservation_table' => $reservation_table ] , 200);
    }
}
