<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $setting = new Setting();
        $setting->phone_number = '9876543210';
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

        $setting = new Setting();
        $setting->phone_number = '9874563215';
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
