<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function checklogin()
    {
        $check_auth = Auth::check();
        $lock = 0;
        $user = [];
        if ($check_auth) {
            $user = Auth::user();
            $lock = Auth::user()->lock_enable;
        }
        return response()->json(['check_auth' => $check_auth, 'lock' => $lock, 'user' => $user]);
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');

        $isRestaurantApproved = User::with(['restaurant' => function($query) {
            $query->select('id', 'request_status', 'deleted_at')->withTrashed();
        }])
        ->where('email', $credentials['email'])
        ->select('id', 'restaurant_id', 'deleted_at')
        ->withTrashed()
        ->first();

        if (isset($isRestaurantApproved) && $isRestaurantApproved->restaurant->request_status == 0 && $isRestaurantApproved->restaurant->deleted_at != null)  {
            return response()->json(['status' => false, 'message' => 'Your Request Decline For Some Reason. We Have Mail To Your Mail Address.']);
        }
        
        $checkRestaurantStatus = User::where('email', $credentials['email'])
            ->whereHas('restaurant', function($query) {
                $query->where('request_status', 2);
            })
        ->select('id', 'restaurant_id')
        ->first();

        if(!is_null($checkRestaurantStatus)) {
            return response()->json(['error' => true,'message' => 'Your Restaurant Not Approved Yet!']);
        } else {
            if (Auth::attempt($credentials)) {
                $id = Auth::user()->id;
                return response()->json(['success' => true,'message' => 'You are logged in successfully.', 'id' => $id]);
            }else{
                return response()->json(['success' => false,'message' => 'Unable to access account, verify password.']);
            }
        }
    }

    public function lockEnableDisable(Request $request)
    {
        $update = User::where('id', Auth::user()->id)->update(['lock_enable' => $request->lock]);
        return 'success';
    }

    public function userPassCode()
    {
        $user = Auth::user();

        return response()->json(['passCode' => @$user->lock_pin]);
    }

    public function checkRestaurantStatus(Request $request)
    {
        $toggleStatus = User::where('email', $request->email)
            ->whereHas('restaurant', function ($query) {
                $query->where('request_status', 2);
            })
        ->exists() ? 1 : 0;

        return response()->json(['success' => true, 'status' => $toggleStatus], 200);
    }

}
