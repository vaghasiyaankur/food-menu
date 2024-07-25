<?php

namespace App\Http\Controllers;

use App\Helper\SettingHelper;
use App\Http\Requests\UserRequest;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\User;
use App\Notifications\VerificationNotification;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin(){
        if (Auth::user()->role == 'super_admin') {
            return redirect()->route('super-admin.dashboard');
        } else {
            return view('admin');
        }
    }

    public function registerDetail(Request $request)
    {
        if($request->type == 'signup') {

            $request->merge([
                'password'  =>  Hash::make($request->password),
                'role'      =>  'admin'
            ]);
    
            $user = User::create($request->only(
                ['name', 'email', 'password', 'mobile_number', 'role'])
            );

            return response()->json([
                'status'    =>  true,
                'user'      =>  $user->id,
                'message'   =>  'User Register Successfully'
            ], 200);

        } else {

            $restaurant = Restaurant::insertGetId([
                'name'    => $request->name,
                'location' => $request->address,
                'request_status' => 2,
                'restaurant_code' => $this->generateUniqueNumber(6),
            ]);

            if($restaurant) {

                User::where('id', $request->user_id)->update(['restaurant_id' => $restaurant]);
    
                $user = User::where('role', 'super_admin')->first();
                if($user) {
                    $user->notify(new VerificationNotification($restaurant));

                    return response()->json([
                        'status'    =>  true,
                        'type'      =>  'restaurant',
                        'message'   =>  'Restaurant Register Successfully.'
                    ], 200);
                }

            }
        }

    }

    private function generateUniqueNumber($length = 6) {
        do {
            $number = str_pad(rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
        } while (Restaurant::where('restaurant_code', $number)->exists());
    
        return $number;
    }
    
}
