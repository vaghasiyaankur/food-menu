<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
use File;

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

        File::copy(public_path('images/setting/logo.png'), public_path('storage/setting/logo.png'));


        $setting = new Setting();
        $setting->restaurant_name = 'Food Menu Restaurant';
        $setting->phone_number = '9876543210';
        $setting->manager_name = 'Denise J. Atkins';
        $setting->restaurant_logo = 'setting/logo.png';
        $setting->open_time = '09:00';
        $setting->close_time = '23:00';
        $setting->close_reservation = 0;
        $setting->member_capacity = 45;
        $setting->highlight_on_off = 1;
        $setting->highlight_time = 0;
        $setting->language_id = 1;
        $setting->save();
    }
}
