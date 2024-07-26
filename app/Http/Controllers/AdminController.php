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
        $formDetail = json_decode($request->register_detail, true);
        
        $userData = $formDetail[0];
        unset($userData['type']);
        unset($userData['password_confirmation']);

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
            'mobile_number' => $userData['mobile_number'],
            'role'  =>  'admin'
        ]);

        if($user) {

            $restaurantData = $formDetail[1];
            unset($restaurantData['type']);

            $restaurantCode = $this->generateUniqueRestaurantCode($restaurantData['name']);

            $checkRestaurantCode = Restaurant::pluck('restaurant_code')->toArray();
            if (in_array($restaurantCode, $checkRestaurantCode)) {
                return response()->json(['error' => 'The restaurant already exists.'], 400);
            }

            $slug = Str::slug($restaurantData['name']);
            $baseSlug = $slug;
            $i = 1;

            while (Restaurant::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $i;
                $i++;
            }

            $restaurant = Restaurant::create([
                'name' => $restaurantData['name'],
                'address' => $restaurantData['address'],
                'restaurant_code' => $restaurantCode,
            ]);

            if($restaurant) {

                User::where('id', $user->id)->update(['restaurant_id' => $restaurant->id]);

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

    private function generateUniqueRestaurantCode($name)
    {
        $prefix = strtoupper(substr($name, 0, 2));
        do {
            $randomNumber = rand(10000000, 99999999);
            $restaurantCode = $prefix . $randomNumber;
        } while (Restaurant::where('restaurant_code', $restaurantCode)->exists());

        return $restaurantCode;
    }
    
}
