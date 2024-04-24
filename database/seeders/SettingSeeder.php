<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $check_folder= is_dir(storage_path('app/public/setting'));
        if(!$check_folder) mkdir(storage_path('app/public/setting'));
        $image_name_1 = rand(00000,11111) .'_logo.png';
        File::copy(public_path('images/setting/logo.png'), public_path('storage/setting/'.$image_name_1));

        $setting = new Setting();
        $setting->restaurant_name = 'Food Menu Restaurant';
        $setting->phone_number = '9876543210';
        $setting->logo = 'setting/'.$image_name_1;
        $setting->fav_icon = 'setting/'.$image_name_1;
        $setting->open_time = '09:00 AM';
        $setting->close_time = '11:00 PM';
        $setting->close_reservation = 0;
        $setting->member_capacity = 45;
        $setting->highlight_on_off = 1;
        $setting->highlight_time = 1;
        $setting->language_id = 1;
        $setting->restaurant_id = 1;
        $setting->address = "43, abc circle";
        $setting->bill_header = "Food Menu Restaurant";
        $setting->bill_footer = "copyRight Food Menu Restaurant";
        $setting->currency_name = "Indian";
        $setting->currency_code = "INR";
        $setting->currency_symbol = "₹";
        $setting->save();

        $image_name_2 = rand(00000,11111) .'_logo.png';
        File::copy(public_path('images/setting/logo.png'), public_path('storage/setting/'.$image_name_2));

        $setting = new Setting();
        $setting->restaurant_name = 'Food Menu Restaurant';
        $setting->phone_number = '9874563215';
        $setting->logo = 'setting/'.$image_name_2;
        $setting->fav_icon = 'setting/'.$image_name_2;
        $setting->open_time = '08:00 AM';
        $setting->close_time = '10:00 PM';
        $setting->close_reservation = 0;
        $setting->member_capacity = 45;
        $setting->highlight_on_off = 1;
        $setting->highlight_time = 1;
        $setting->language_id = 1;
        $setting->restaurant_id = 2;
        $setting->address = "43, abc circle";
        $setting->bill_header = "Food Menu Restaurant";
        $setting->bill_footer = "copyRight Food Menu Restaurant";
        $setting->currency_name = "Indian";
        $setting->currency_code = "INR";
        $setting->currency_symbol = "₹";
        $setting->save();
    }
}
