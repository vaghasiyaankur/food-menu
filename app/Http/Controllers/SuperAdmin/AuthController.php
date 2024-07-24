<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Handles user login requests and authentication.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance containing the login credentials.
     * @return \Illuminate\Http\RedirectResponse A redirect response based on the outcome of the login attempt.
    */
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

    /**
     * Logs out the currently authenticated user if they are a super admin and redirects them to the super admin authentication route.
     *
     * @return \Illuminate\Http\RedirectResponse A redirect response to the super admin authentication route.
     *
     */
    public function logout()
    {
        if(Auth::user()) {
            if(Auth::user()->role == 'super_admin') {
                Auth::logout();
                return to_route('super-admin.auth');
            }
        }
    }
}
