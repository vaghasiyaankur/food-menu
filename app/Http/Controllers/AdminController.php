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
            $restaurantCode = $this->generateUniqueCode($request->name, $request->user_id);
            
            $checkRestaurantCode = Restaurant::pluck('restaurant_code')->toArray();
            if (in_array($restaurantCode, $checkRestaurantCode)) {
                return response()->json(['error' => 'The code already exists.'], 400);
            }

            $slug = Str::slug($request->name);
            $baseSlug = $slug;
            $i = 1;

            while (Restaurant::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $i;
                $i++;
            }
            $restaurant = Restaurant::insertGetId([
                'name'  => $request->name,
                'slug'  => $slug,
                'location' => $request->address,
                'request_status' => 2,
                'restaurant_code' => $restaurantCode
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

    private function generateUniqueCode($name, $userId) {
        $baseCode = strtoupper(substr($name, 0, 2)) . sprintf('%04d', mt_rand(1, 9999)) . $userId;
    
        while (Restaurant::where('restaurant_code', $baseCode)->exists()) {
            $baseCode = strtoupper(substr($name, 0, 2)) . sprintf('%04d', mt_rand(1, 9999)) . $userId;
        }
    
        return $baseCode;
    }
    
}
