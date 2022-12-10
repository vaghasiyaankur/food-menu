<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Helper\ReservationHelper;
use Validator;

class ReservationController extends Controller
{
    public function addReservation(Request $request)
    {
        $order = Order::wherePerson($request->person)->pluck('table_id');

        $table_id = ReservationHelper::takeTable($request->floor, $request->person);
        
        if($table_id){
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
                $order->save();
            }
            return response()->json(['success' => 'registration added successfully.']);
        }else{
            return response()->json(['error' => 'Something Went Wrong.'], 401);
        }

    }
}
