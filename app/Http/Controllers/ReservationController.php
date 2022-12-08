<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ReservationController extends Controller
{
    public function addReservation(Request $request)
    {
        dd($request->toarray());
        $regster = new HotelRegistration();
        $regster->name = $request->name;
        $regster->number = $request->number;
        $regster->member = $request->member;
        $regster->save();

        return response()->json(['success', 'registration added successfully.']);
    }
}
