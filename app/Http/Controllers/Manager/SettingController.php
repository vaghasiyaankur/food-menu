<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Color;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Helper\ImageHelper;


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
       $setting = Setting::select('restaurant_name', 'phone_number', 'manager_name', 'restaurant_logo', 'open_time', 'close_time')->first();

       $setting['open_time_12_format'] = date("g:i a", strtotime($setting->open_time));
       $setting['close_time_12_format'] = date("g:i a", strtotime($setting->close_time));

        return response()->json([ 'setting' => $setting ] , 200);
    }

     /**
     * Update webiste common setting Data in database
     * 
     * @return @json (success message)
     * 
     */
    public function updateSetting(Request $request)
    {
        $setting = Setting::first();

        $restaurant_logo_name = $setting->restaurant_logo;
        if($request->file('restaurant_logo')){
            $restaurant_logo_name = ImageHelper::storeImage($request->file('restaurant_logo'), 'setting');
            ImageHelper::removeImage($setting->restaurant_logo);
        }

        $settingData = [
            'restaurant_name' => $request->restaurant_name,
            'phone_number' => $request->phone_number,
            'manager_name' => $request->manager_name,
            'restaurant_logo' => $restaurant_logo_name,
            'open_time' => date("H:i", strtotime($request->open_time)),
            'close_time' => date("H:i", strtotime($request->close_time)),
        ];

       Setting::where('id', $setting->id)->update($settingData);

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
        $tables = Table::paginate(10);

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
        $table = Table::where('capacity_of_person', intval($capacity))->first();
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
        $table = Table::where('id', $id)->first();

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
            'floor_number' => $request->floor_number,
            'color_id' => $request->color,
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
        $table = Table::find($request->id)->delete();

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
        $table = Table::find($request->id)->update(['status' => $request->status]);

        return response()->json(['success'=>'Table Status Updated Successfully.']);
    }

}