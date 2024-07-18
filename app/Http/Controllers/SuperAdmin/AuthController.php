<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()
            ->withErrors($validatedData->errors())
            ->withInput($request->only('email'));
        }

        if (Auth::attempt($request->only(['email','password']))) {
            if (Auth::user()->role == 'super_admin') {
                return redirect()->route('super-admin.dashboard');
            }else{
                Auth::logout();
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our record.',
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        if(Auth::user()) {
            if(Auth::user()->role == 'super_admin') {
                Auth::logout();
                return redirect()->route('super-admin.auth');
            }
        }
    }
}
