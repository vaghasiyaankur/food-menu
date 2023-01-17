<?php
namespace App\Helper;
use App\Models\Table;
use App\Models\Order;

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
            if($floor) $tableIds = $tableIds->where('floor_id', $floor);
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
            $ordersTableIds = Order::whereIn('table_id', $tableIds)->pluck('table_id')->toArray();

            foreach ($tableIds as $tableId) {
                if(!in_array($tableId, $ordersTableIds)) return $tableId;
            }

            $time = [];
            foreach($tableIds as $tableId){
                $lastOrdersId = Order::where('table_id', $tableId)->orderBy('created_at', 'desc')->first()->id;
                array_push($time, $lastOrdersId);
            }

            if($order_tableId && $orderExists){
                $table_id = Order::whereIn('table_id', $order_tableId)->orderBy('created_at', 'ASC')->first()->table_id;
            }else{
                $table_id = Order::whereIn('id', $time)->orderBy('created_at', 'ASC')->first()->table_id;
            }
            return $table_id;
        }
        // return $tableIds ? $tableIds->id : 0;
    }
}
?>
