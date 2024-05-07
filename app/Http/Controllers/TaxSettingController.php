<?php

namespace App\Http\Controllers;

use App\Helper\SettingHelper;
use App\Models\TaxSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaxSettingController extends Controller
{

    public function getTaxList() {
        $taxes = TaxSetting::all();
        return response()->json(['taxes'=>$taxes]);
    }

    public function saveTaxDetail(Request $request) {

        $rules = [
            'tax_name' => 'required',
            'tax_charge_type' => 'required',
            'tax_charge_amount' => 'required'
        ];
    
        $validator = Validator::make($request->all(), $rules);
        
        // Add custom validation rule
        $validator->after(function ($validator) use ($request) {
            if ($request->tax_charge_type == 'percentage' && $request->tax_charge_amount > 100) {
                $validator->errors()->add('tax_charge_amount', 'Tax charge amount cannot be greater than 100 for percentage type.');
            }
        });

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();

        $restaurant_id = SettingHelper::getUserIdUsingQrcode();
        $data['restaurant_id'] = $restaurant_id ? $restaurant_id : Auth::user()->restaurant_id;

        TaxSetting::updateOrCreate(['id' => $request->id], $data);

        return response()->json(['success'=>'Tax Save Successfully.']);
    }

    public function deleteTaxDetail(TaxSetting $tax) {
        $tax->delete();
        return response()->json(['success' => 'Tax Deleted Successfully.']);
    }

    public function saveTaxStatus(Request $request) {
        $data = $request->toArray();

        foreach ($data as $key => $value) {
            $newKey = preg_replace('/^status_/', '', $key); // Remove 'status_' prefix
            TaxSetting::where('id',$newKey)->update(['status' => $value]);
        }
        return response()->json(['success' => 'Tax Status Changed Successfully.']);
    }
}
