<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Http\Controllers\Controller;
use App\Models\UpiData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UpiController extends Controller
{
    public function getUpiCodes(Request $req)
    {
        $restaurantId = CustomerHelper::getRestaurantId();
        $upi = UpiData::where('restaurant_id', $restaurantId)->get();

        return response()->json(['upiList' => $upi]);
    }

    public function addUpi(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'mode' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imageName = '';
        if($req->file('image')){
            $directory = storage_path('app/public/upi/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $imageFile = $req->file('image');
            $imageName = '/upi/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/upi/'),$imageName);
        }
        
        $restaurantId = CustomerHelper::getRestaurantId();
        
        $coupon = new UpiData();
        $coupon->restaurant_id = $restaurantId;
        $coupon->name = $req->name;
        $coupon->phone = $req->phone;
        $coupon->image = $imageName;
        $coupon->mode = $req->mode;
        $coupon->added_by = Auth::user()->role;
        $coupon->added_by_id = Auth::user()->id;
        $coupon->save();

        return response()->json(['success'=>'Upi Added Successfully.']);
    }

    public function getUpi($id)
    {
        $restaurantId = CustomerHelper::getRestaurantId();
        $coupon = UpiData::where('restaurant_id', $restaurantId)->find($id);

        return response()->json($coupon);
    }

    public function updateUpi(Request $req)
    {
        $rules = [];
        $rules['name'] = 'required';
        $rules['mode'] = 'required';
        if($req->file('image')){
            $rules['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg,webp';
        }
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } 
        
        $upi = UpiData::find($req->id);
        $imageName = '';
        if($req->file('image')){
            $path = storage_path()."/app/public/" .@$upi->image;
            $result = File::exists($path);

            if($result)
            {
                File::delete($path);
            }

            $imageFile = $req->file('image');
            $imageName = '/upi/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/upi/'),$imageName);
        }else{
            $imageName = $upi->image;
        }

        UpiData::where('id', $req->id)->update([
            'name' => $req->name,
            'phone' => $req->phone,
            'image' => $imageName,
            'mode' => $req->mode
        ]);

        return response()->json(['success'=>'Upi Updated Successfully.']);
    }

    public function deleteUpi(Request $req)
    {
        $upi = UpiData::find($req->id);

        $path = storage_path()."/app/public/" .@$upi->image;
        $result = File::exists($path);

        if($result)
        {
            File::delete($path);
        }

        $upi->delete();

        return response()->json(['success'=>'Upi Deleted Successfully.']);
    }
}
