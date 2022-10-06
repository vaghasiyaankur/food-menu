<?php

namespace App\Http\Controllers;

use App\Models\HotelRegistration;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'member' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 401);
        }

        $regster = new HotelRegistration();
        $regster->name = $request->name;
        $regster->number = $request->number;
        $regster->member = $request->member;
        $regster->floor_location = $request->floor_location;
        $regster->save();

        return response()->json(['success', 'registration added successfully.']);
    }
}
