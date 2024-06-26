<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\RestaurantLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RestaurantSeeder extends Seeder
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

        Restaurant::create([
            'id' => '1',
            'name' => 'Food Menu Restaurant, Katargam',
            'slug' => 'food-menu-restaurant-katargam',
            'location' => '98, Gajera park Soc, near gajera school, katargam, surat, gujarat, India.',
            'logo' => 'setting/'.$image_name_1,
            'fav_icon' => 'setting/'.$image_name_1,
            'operating_start_hours' => '10:00 AM',
            'operating_end_hours' => '11:00 PM',
            'status' => 1
        ]);

        $image_name_2 = rand(00000,11111) .'_logo.png';
        File::copy(public_path('images/setting/logo.png'), public_path('storage/setting/'.$image_name_2));

        Restaurant::create([
            'id' => '2',
            'name' => 'Food Menu Restaurant, Adajan',
            'slug' => 'food-menu-restaurant-adajan',
            'location' => 'palanpur patiya, adajan, surat, gujarat, India.',
            'logo' => 'setting/'.$image_name_2,
            'fav_icon' => 'setting/'.$image_name_2,
            'operating_start_hours' => '10:00 AM',
            'operating_end_hours' => '11:00 PM',
            'status' => 1
        ]);

    }
}
