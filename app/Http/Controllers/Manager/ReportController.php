<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Table;

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
        $total_order = Order::count();
        $complete_order = Order::count();
        $ongoing_order = Order::count();
        $reservation_table = Table::count();

        return response()->json([ 'total_order' => $total_order, 'complete_order' => $complete_order, 'ongoing_order' => $ongoing_order, 'reservation_table' => $reservation_table ] , 200);
    }
}
