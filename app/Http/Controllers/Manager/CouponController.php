<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function getCouponCodes(Request $req)
    {
        $restaurantId = CustomerHelper::getRestaurantId();
        $coupons = Coupon::where('restaurant_id', $restaurantId)->get();

        return response()->json(['coupons' => $coupons]);
    }

    public function addCoupon(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'code' => 'required',
            'discount_type' => 'required',
            'discount_value' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) use ($req) {
                    if ($req->input('discount_type') == 'percentage' && $value > 100) {
                        $fail('The Discount Value must not be more than 100 when type percentage.');
                    }
                },
            ],
            'starting_date_time' => 'required|date_format:Y-m-d\TH:i',
            'expiry_date_time' => 'required|date_format:Y-m-d\TH:i|after:starting_date_time',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        
        $coupon = new Coupon();
        $coupon->restaurant_id = $restaurantId;
        $coupon->code = $req->code;
        $coupon->discount_type = $req->discount_type;
        $coupon->discount_value = $req->discount_value;
        $coupon->starting_date_time = $req->starting_date_time;
        $coupon->expiry_date_time = $req->expiry_date_time;
        $coupon->added_by = Auth::user()->role;
        $coupon->added_by_id = Auth::user()->id;
        $coupon->save();

        return response()->json(['success'=>'Coupon Added Successfully.']);
    }

    public function getCoupon($id)
    {
        $restaurantId = CustomerHelper::getRestaurantId();
        $coupon = Coupon::where('restaurant_id', $restaurantId)->find($id);

        return response()->json($coupon);
    }

    public function updateCoupon(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'code' => 'required',
            'discount_type' => 'required',
            'discount_value' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) use ($req) {
                    if ($req->input('discount_type') == 'percentage' && $value > 100) {
                        $fail('The Discount Value must not be more than 100 when type percentage.');
                    }
                },
            ],
            'starting_date_time' => 'required|date_format:Y-m-d\TH:i',
            'expiry_date_time' => 'required|date_format:Y-m-d\TH:i|after:starting_date_time',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }    

        Coupon::where('id', $req->id)->update([
            'code' => $req->code,
            'discount_type' => $req->discount_type,
            'discount_value' => $req->discount_value,
            'starting_date_time' => date('Y-m-d H:i:s', strtotime($req->starting_date_time)),
            'expiry_date_time' => date('Y-m-d H:i:s', strtotime($req->expiry_date_time)),
        ]);

        return response()->json(['success'=>'Coupon Updated Successfully.']);
    }

    public function deleteCoupon(Request $req)
    {
        Coupon::find($req->id)->delete();

        return response()->json(['success'=>'Coupon Deleted Successfully.']);
    }

    public function applyCoupon(Request $req) {
        $restaurantId = CustomerHelper::getRestaurantId();
    
        $coupon = Coupon::where('restaurant_id', $restaurantId)
                        ->where('code', $req->discountCoupon)
                        ->where('starting_date_time', '<=', Carbon::now())
                        ->where('expiry_date_time', '>=', Carbon::now())
                        ->first();
    
        if ($coupon) {
            return response()->json(['message' => 'Applied Successfully.', 'coupon' => $coupon], 200);
        } else {
            return response()->json(['message' => 'No coupon available or not valid.'], 404);
        }
    }
}
