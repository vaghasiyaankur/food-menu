<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Table;
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
            return response()->json(['success' => 'registration added successfully.']);
        }else{
            return response()->json(['error' => 'Something Went Wrong.'], 401);
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
        // return response()->json([ 'close_reservation' => $close_reservation ] , 200);
    }
}
