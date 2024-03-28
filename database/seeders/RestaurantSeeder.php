<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\RestaurantLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::create([
            'id' => '1',
            'name' => 'Food Menu Restaurant, Katargam',
            'slug' => 'food-menu-restaurant-katargam',
            'location' => '98, Gajera park Soc, near gajera school, katargam, surat, gujarat, India.',
            'operating_start_hours' => '10:00 AM',
            'operating_end_hours' => '11:00 PM',
            'status' => 1
        ]);

        Restaurant::create([
            'id' => '2',
            'name' => 'Food Menu Restaurant, Adajan',
            'slug' => 'food-menu-restaurant-adajan',
            'location' => 'palanpur patiya, adajan, surat, gujarat, India.',
            'operating_start_hours' => '10:00 AM',
            'operating_end_hours' => '11:00 PM',
            'status' => 1
        ]);

       

    }
}
