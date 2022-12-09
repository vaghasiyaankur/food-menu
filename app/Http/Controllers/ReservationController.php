<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Validator;

class ReservationController extends Controller
{
    public function addReservation(Request $request)
    {
        $order = Order::wherePerson($request->person)->pluck('table_id');
        $person = str_pad($request->person, 2, '0', STR_PAD_LEFT);
        $table_id = Table::whereStatus(1)->whereNotIn('id',$order)->whereCapacityOfPerson($person)->orWhere('capacity_of_person', '>', $person)->orderBy('capacity_of_person','ASC')->first('id');
        $regster = new Customer();
        $regster->name = $request->customer_name;
        $regster->number = $request->customer_number;
        if($regster->save()){
            $order = new Order();
            $order->customer_id = $regster->id;
            $order->floor_id = $request->floor;
            $order->table_id = $table_id->id;
            $order->person = $request->person;
            $order->role = $request->role;
            $order->save();
        }

        return response()->json(['success' => 'registration added successfully.']);
    }
}
