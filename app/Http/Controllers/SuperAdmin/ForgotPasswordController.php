<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData->errors())
                ->withInput($request->only('email'));
        }

        $user = User::where('email', $request->email)->value('role');
        
        if($user === 'super_admin') {

            $status = Password::sendResetLink(
                $request->only('email')
            );
    
            return $status === Password::RESET_LINK_SENT
                        ? back()->with('status', __($status))
                        : back()->withErrors(['email' => __($status)]);
        } else {
            return back()->with('error', 'You Are Not Authorized To Proceeds This.');
        }
    }


    /**
     * Display the password reset form.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token)
    {
        return view('admin.auth.password_reset', ['token' => $token]);
    }

    /**
     * Reset the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('super-admin.auth')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
