<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Table;
use App\Models\Floor;
use Illuminate\Http\Request;
use App\Helper\ReservationHelper;
use Carbon\Carbon;
use Validator;

class ReservationController extends Controller
{
    public function addReservation(Request $request)
    {
        $order = Order::wherePerson($request->person)->pluck('table_id');

        $table_id = ReservationHelper::takeTable($request->floor, $request->person);
        if($table_id){
            $table = Table::where('id', $table_id)->first();
            $regster = new Customer();
            $regster->name = $request->customer_name;
            $regster->number = $request->customer_number;
            $regster->agree_condition = $request->agree_condition;
            if($regster->save()){
                $order = new Order();
                $order->customer_id = $regster->id;
                $order->table_id = $table_id;
                $order->person = $request->person;
                $order->role = $request->role;
                $order->finish_time = $table->finish_order_time;
                $order->finished = 0;
                $order->save();
            }
            return response()->json(['success' => 'registration added successfully.', 'orderId' => $order->id]);
        }else{
            return response()->json(['error' => "We don't have the capacity table for that many people"], 401);
        }

    }

    /**
     * Check Reservation is open or close
     *
     * @return @json ($close_reservation = 0 or 1)
     *
     */

    public function checkReservation()
    {
        $close_reservation = Setting::first()->close_reservation;
        return response()->json([ 'close_reservation' => $close_reservation ] , 200);
    }

    /**
     * Check Reservation is open or close
     *
     * @return @json ($close_reservation = 0 or 1)
     *
     */

    public function changeReservation(Request $request)
    {
        Setting::first()->update(['close_reservation' => $request->reservation]);
        
        $close_reservation = Setting::first()->close_reservation;
        return response()->json([ 'close_reservation' => $close_reservation ] , 200);
    }

    /**
     * Waiting Time for order
     *
     * @return @json ($time = 1:00)
     *
     */

    public function checkTime(Request $request)
    {
        $table_id = ReservationHelper::takeTable($request->floor, $request->person);
        if($table_id){
            $allOrder = Order::where('table_id', $table_id)->where('finished', 0)->select('id', 'table_id', 'start_time', 'finish_time', 'finished')->get();
            $calculateTime = 0;
            foreach($allOrder as $order){
                if($order->start_time){
                    $start  = new Carbon($order->start_time);
                    $end    = new Carbon();
                    $calculateTime += $order->finish_time - $start->diffInMinutes($end);
                }else{
                    $calculateTime += $order->finish_time;
                }
            }

            $waiting_time = date('H:i', mktime(0,$calculateTime));
            return response()->json([ 'success' => true, 'waiting_time' => $waiting_time ] , 200);
        }else{
            return response()->json([ 'success' => false, 'message' => "We don't have the capacity table for that many people" ] , 200);
        }
    }

    /**
     * Flor List On Member Capacity
     *
     * @return @json ($floors)
     *
     */

    public function floorAvailable(Request $request)
    {   
        $table_id = ReservationHelper::takeTable($request->floor, $request->person);

        $table = Table::where('status', 1)->where('capacity_of_person', intval($request->member))->first();
        if(!$table) {
            $table = Table::where('status', 1)->orderBy('capacity_of_person','ASC')->where('capacity_of_person', '>' , intval($request->member))->first();
        }
        if($table){
            $table_capacity = $table->capacity_of_person;
            $floors = Floor::whereHas('tables', function($q) use($table_capacity){
                    $q->where('capacity_of_person', $table_capacity);
                })->pluck('name','id');

            return response()->json([ 'success' => true, 'floors' => $floors ] , 200);
        }else{
            return response()->json([ 'success' => true, 'floors' => []] , 200);
        }
    }

    /**
     *  Show Waiting Time for order for user
     *
     * @return @json ($floors)
     *
     */

    public function waitingTime(Request $request)
    {   
        // $table_id = ReservationHelper::takeTable($request->floor, $request->person);
        $orderIds = $request->ids;
        $orderId = $orderIds[0];
        $table_id = Order::where('id', $orderId)->first()->table_id;
        $updated_at = Order::where('id', $orderId)->first()->updated_at;

        if($table_id){
            $allOrder = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->where('finished', 0)->where('updated_at', '<=', $updated_at)->select('id', 'table_id', 'start_time', 'finish_time', 'finished', 'updated_at')->get();
            $calculateTime = 0;
            foreach($allOrder as $order){
                // if($order->start_time){
                //     $start  = new Carbon($order->start_time);
                //     $end    = new Carbon();
                //     $calculateTime += $order->finish_time;
                // }else{
                    $calculateTime += $order->finish_time;
                // }
            }
            $firstOrderTime = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->where('finished', 0)->where('updated_at', '<=', $updated_at)->whereNotNull('start_time')->first();
            if($firstOrderTime){
                $started_time = $firstOrderTime->start_time;
            }else{
                $firstOrderTime = $allOrder[0];
                $started_time = @$firstOrderTime->created_at;
            } 
            $start  = new Carbon($started_time);
            $time_format_date = strtotime(date("H:i:s",strtotime($start)));
            $finalTime = date("H:i:s",strtotime('+'.$calculateTime.' minutes',$time_format_date));

            $start  = new Carbon($finalTime);
            $end    = new Carbon();
            $time = ($start->diffInHours($end) * 60) + ($start->diffInMinutes($end) * 60)+ ($start->diffInSeconds($end) * 1000);

            return response()->json([ 'success' => true, 'time' => $time ] , 200);
        }else{
            return response()->json([ 'success' => false, 'message' => "We don't have the capacity table for that many people" ] , 200);
        }
    }

    
}
