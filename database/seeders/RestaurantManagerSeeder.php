<?php

namespace Database\Seeders;

use App\Models\RestaurantManager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RestaurantManager::create([
            'manager_id' => 1,
            'restaurant_id' => 1,
        ]);

        RestaurantManager::create([
            'manager_id' => 4,
            'restaurant_id' => 2,
        ]);
    }
}
