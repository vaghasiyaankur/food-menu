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
        $setting->highlight_time = 1;
        $setting->language_id = 1;
        $setting->user_id = 1;
        $setting->save();

        $setting = new Setting();
        $setting->restaurant_name = 'Food Menu Restaurant';
        $setting->phone_number = '9874563215';
        $setting->manager_name = 'john g. doe';
        $setting->restaurant_logo = 'setting/logo.png';
        $setting->open_time = '08:00';
        $setting->close_time = '22:00';
        $setting->close_reservation = 0;
        $setting->member_capacity = 45;
        $setting->highlight_on_off = 1;
        $setting->highlight_time = 1;
        $setting->language_id = 1;
        $setting->user_id = 2;
        $setting->save();

        $setting = new Setting();
        $setting->restaurant_name = 'Food Menu Restaurant';
        $setting->phone_number = '9876543210';
        $setting->manager_name = 'jonathan r. Atkins';
        $setting->restaurant_logo = 'setting/logo.png';
        $setting->open_time = '08:30';
        $setting->close_time = '23:00';
        $setting->close_reservation = 0;
        $setting->member_capacity = 45;
        $setting->highlight_on_off = 1;
        $setting->highlight_time = 1;
        $setting->language_id = 1;
        $setting->user_id = 3;
        $setting->save();

        $setting = new Setting();
        $setting->restaurant_name = 'Food Menu Restaurant';
        $setting->phone_number = '9876543210';
        $setting->manager_name = 'Mahesh n. Atkins';
        $setting->restaurant_logo = 'setting/logo.png';
        $setting->open_time = '09:00';
        $setting->close_time = '22:00';
        $setting->close_reservation = 0;
        $setting->member_capacity = 45;
        $setting->highlight_on_off = 1;
        $setting->highlight_time = 1;
        $setting->language_id = 1;
        $setting->user_id = 4;
        $setting->save();

        $setting = new Setting();
        $setting->restaurant_name = 'Food Menu Restaurant';
        $setting->phone_number = '9876543210';
        $setting->manager_name = 'Prakash k. Atkins';
        $setting->restaurant_logo = 'setting/logo.png';
        $setting->open_time = '09:30';
        $setting->close_time = '23:00';
        $setting->close_reservation = 0;
        $setting->member_capacity = 45;
        $setting->highlight_on_off = 1;
        $setting->highlight_time = 1;
        $setting->language_id = 1;
        $setting->user_id = 5;
        $setting->save();
    }
}
