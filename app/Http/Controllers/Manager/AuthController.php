<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function checklogin()
    {
        $check_auth = Auth::check();
        $lock = 0;
        if ($check_auth) {
            $lock = Auth::user()->lock_enable;
        }
        return response()->json(['check_auth' => $check_auth, 'lock' => $lock]);
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['success' => 'You are logged in successfully.']);
        }else{
            return response()->json(['error' => 'Unable to access account, verify password.']);
        }
    }

    public function lockEnableDisable(Request $request)
    {
        $update = User::where('id', Auth::user()->id)->update(['lock_enable' => $request->lock]);
        return 'success';
    }

    public function userPasscode()
    {
        $user = Auth::user();

        return response()->json(['passcode' => @$user->lock_pin]);
    }

}
