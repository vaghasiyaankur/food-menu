<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {

        // Validate the request data
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check if validation fails
        if ($validatedData->fails()) {
            return redirect()->back()
            ->withErrors($validatedData->errors())
            ->withInput($request->only('email'));
        }

        // Attempt to log the user in
        if (Auth::login($request->only(['email','password']))) {

            // if (Auth::user()->role == 'super_admin') {
                return redirect()->route('super-admin.dashboard');
            // }else{
            //     Auth::logout();
            // }
        }

        // Authentication failed...
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
}
