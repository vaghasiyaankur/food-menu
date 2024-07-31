<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Color;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Helper\ImageHelper;
use App\Helper\SettingHelper;
use App\Models\KotHold;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
    * This controller is used for the Settings tab
    * in the Manage panel
    */


    /**
     * To pass website setting data from database to frontend
     *
     * @return @json ($setting)
     *
     */
    public function settingData()
    {
        $restaurant = Restaurant::find(Auth::user()->restaurant_id);
        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->first();
        $select_highlight_time = '';
        if(intval($setting->highlight_time * 60) < 60 && intval($setting->highlight_time * 60) > 0) $select_highlight_time = intval($setting->highlight_time * 60).' seconds';
        if(intval($setting->highlight_time * 60) >= 60) $select_highlight_time = intval($setting->highlight_time).' minute';
        $setting['open_time_12_format'] = date("g:i A", strtotime($restaurant->operating_start_hours));
        $setting['close_time_12_format'] = date("g:i A", strtotime($restaurant->operating_end_hours));
        $setting['select_highlight_time'] = $select_highlight_time;

        return response()->json([ 'setting' => $setting, 'restaurant' => $restaurant ] , 200);
    }

    /**
     * Update webiste common setting Data in database
     *
     * @return @json (success message)
     *
     */
    public function updateSetting(Request $request)
    {
        $rules = [
            'restaurant.name' => 'required',
            'restaurant.operating_start_hours' => 'required',
            'restaurant.operating_end_hours' => 'required',
            'setting.logo' => 'image|mimes:jpg,png,jpeg,gif,svg,webp',
            'setting.fav_icon' => 'image|mimes:jpg,png,jpeg,gif,svg,webp',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $res_setting = Restaurant::whereId(Auth::user()->restaurant_id)->first();

        $logo_name = $res_setting->logo;
        if($request->file('setting.logo')){
            $logo_name = ImageHelper::storeImage($request->file('setting.logo'), 'setting');
            ImageHelper::removeImage($res_setting->logo);
        }

        $fav_icon_name = $res_setting->fav_icon;
        if($request->file('setting.fav_icon')){
            $fav_icon_name = ImageHelper::storeImage($request->file('setting.fav_icon'), 'setting');
            ImageHelper::removeImage($res_setting->fav_icon);
        }



        $settingData = $request->setting;
        $settingData['highlight_on_off'] = isset($settingData['highlight_on_off']) && $settingData['highlight_on_off'] == 'on' ? 1 : 0;
        $settingData['highlight_time'] = $request->highlight_on_off ? $request->highlight_time : 0;
        
        $restaurantData = $request->restaurant;
        $restaurantData['logo'] = $logo_name;
        $restaurantData['fav_icon'] = $fav_icon_name;

        Setting::updateOrCreate(['id' => $request->id],$settingData);
        Restaurant::updateOrCreate(['id' => Auth::user()->restaurant_id],$restaurantData);

        return response()->json([ 'success' => 'Setting Data Updated successfully' ] , 200);
    }

    /**
     * To pass all table list from database to frontend
     *
     * @return @json ($tables)
     *
     */
    public function tableList(Request $request)
    {
        $tables = Table::with('color','orders', 'floor')->whereRestaurantId(Auth::user()->restaurant_id)->paginate(10);

        return response()->json([ 'tables' => $tables ] , 200);
    }

    /**
     * To pass all table color list from database to frontend
     *
     * @return @json ($colors)
     *
     */
    public function colorList()
    {
        $colors = Color::all();

        return response()->json([ 'colors' => $colors ] , 200);
    }

    /**
     * To check the color of the table from above the capacity of person
     *
     * @return @json (suceess message and color id)
     *
     */
    public function checkColor($capacity)
    {
        $table = Table::where('capacity_of_person', intval($capacity))->whereRestaurantId(Auth::user()->restaurant_id)->first();
        if($table) return response()->json([ 'success' => true, 'color_id' => $table->color_id ] , 200);
        else return response()->json([ 'success' => false ] , 200);
    }

    /**
     * To pass Single table data from database to frontend
     *
     * @return @json ($table)
     *
     */
    public function tableData($id)
    {
        $table = Table::where('id', $id)->whereRestaurantId(Auth::user()->restaurant_id)->first();

        return response()->json([ 'table' => $table ] , 200);
    }

    /**
     * Add Table Or Update Table Data In Database
     *
     * @return @json (success message)
     *
     */
    public function addUpdateTable(Request $request)
    {
        $data = [
            'table_number' => $request->table_number,
            'capacity_of_person' => $request->capacity_of_person,
            'floor_id' => $request->floor_number,
            'color_id' => $request->color,
            'restaurant_id' => Auth::user()->restaurant_id,
        ];

        Table::updateOrCreate(['id' => $request->id], $data);

        if($request->id == 0) $message = 'created';
        else $message = "Updated";

        return response()->json(['success' => 'Table Data Successfully '.$message], 200);
    }

    /**
     * Remove Table Data In Database
     *
     * @return @json (success message)
     *
     */
    public function deleteTable(Request $request)
    {
        KotHold::where('table_id', $request->id)->delete();
        Table::find($request->id)->delete();

        return response()->json(['success'=>'Table Deleted Successfully.']);
    }

    /**
     * Change Table Status In Database
     *
     * @return @json (success message)
     *
     */
    public function changeTableStatus(Request $request)
    {
        Table::find($request->id)->update(['status' => $request->status]);

        return response()->json(['success'=>'Table Status Updated Successfully.']);
    }

    /**
     * Member Limitation check for reservation
     *
     * @return @json (member capacity number)
     *
     */
    public function memberLimitation(Request $request)
    {
        $restaurant_id = SettingHelper::getUserIdUsingQrcode();
        $restaurant_id = $restaurant_id ? $restaurant_id : Auth::user()->restaurant_id;
        $member_capacity = Setting::whereRestaurantId($restaurant_id)->first()->member_capacity;

        return response()->json(['member_capacity'=>$member_capacity]);
    }

    public function getCurrency() {
        $setting = Setting::select('currency_name', 'currency_code', 'currency_symbol')->whereRestaurantId(Auth::user()->restaurant_id)->first();

        return response()->json(['setting'=>$setting]);
    }

    public function saveCurrency(Request $request) 
    {
        $rules = [
            'currency_name' => 'required',
            'currency_code' => 'required',
            'currency_symbol' => 'required'
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();

        Setting::whereRestaurantId(Auth::user()->restaurant_id)->update($data);

        return response()->json(['success'=>'Currency Updated Successfully.']);
    }

}
