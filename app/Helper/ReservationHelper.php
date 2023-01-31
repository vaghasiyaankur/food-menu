<?php
namespace App\Helper;
use App\Models\Table;
use App\Models\Order;
use \Carbon\Carbon;

class ReservationHelper{

    /* Choose Table on Reservation */
    public static function takeTable($floor, $person, $user_id)
    {
        $tableIds = Table::where('status', 1)->where('user_id', $user_id);
        if($floor) $tableIds = $tableIds->where('floor_id', $floor);
        // $tableIds = $tableIds->where('capacity_of_person', intval($person))->pluck('id');
        // if(!count($tableIds)) {
            $from_cap = intval($person);
            if($from_cap < 4) $to_cap = intval(ceil($person * 2));
            else $to_cap = intval(ceil($person * 1.5));
            // $nexttable = Table::where('status', 1);
            // if($floor) $nexttable = $nexttable->where('floor_id', $floor);
            // $nexttable = $nexttable->orderBy('capacity_of_person','ASC')->whereIn('capacity_of_person', '>' , [$from_cap, $to_cap])->first();
            // dd($from_cap);
            $tableIds = Table::where('status', 1)->where('user_id', $user_id);

            if($floor != 'null' && $floor != 0) {
                $tableIds = $tableIds->where('floor_id', $floor);
            }
            $tableIds = $tableIds->orderBy('capacity_of_person','ASC')->where('capacity_of_person', '>=', $from_cap)->where('capacity_of_person', '<=', $to_cap)->pluck('id');     
            $orderExists = Order::with(['table' => function($q) use ($from_cap,$user_id){
                $q->where('capacity_of_person', $from_cap)->where('user_id',$user_id);
            }])->whereNotNull('start_time')->where('finished', 0)->doesntExist();

            $order_tableId = Table::where('status', 1)->where('user_id', $user_id);
            if($floor) $order_tableId = $order_tableId->where('floor_id', $floor);
            $order_tableId = $order_tableId->orderBy('capacity_of_person','ASC')->where('capacity_of_person', $from_cap)->pluck('id');
        // }
        // $cap = Table::where('id', $table)
        // dd($tableIds);
        if(!count($tableIds)) return 0;
        else{
            $ordersTableIds = Order::whereIn('table_id', $tableIds)->where('finished', 0)->pluck('table_id')->toArray();

            foreach ($tableIds as $tableId) {
                if(!in_array($tableId, $ordersTableIds)) return $tableId;
            }

            $time = [];
            $tables_time_wise = [];
            foreach($tableIds as $tableId){
                $allOrder = Order::where('table_id', $tableId)->where('finished', 0)->select('id', 'table_id', 'start_time', 'finish_time', 'finished')->get();
                $calculateTime = 0;
                foreach($allOrder as $order){
                    if($order->start_time){
                        $start  = new Carbon($order->start_time);
                        $end    = new Carbon();
                        $calculateTime += $order->finish_time - $start->diffInMinutes($end);
                    }else{
                        $calculateTime += $order->finish_time;
                    }
                    $tables_time_wise[$tableId] = $calculateTime;
                }

                // $lastOrdersId = Order::where('table_id', $tableId)->orderBy('created_at', 'desc')->first()->id;
                array_push($time, $calculateTime);
            }
            $table_id = array_search(min($time), $tables_time_wise);
            return $table_id;
        }
        // return $tableIds ? $tableIds->id : 0;
    }
}
?>
