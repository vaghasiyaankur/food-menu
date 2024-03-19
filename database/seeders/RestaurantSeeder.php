<?php

namespace Database\Seeders;

use App\Models\Restaurant;
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
            'name' => 'Khushi restaurant',
            'location' => '98, krishna park soic, pasodara patiya, surat, gujarat, India.',
            'operating_start_hours' => '10:00 AM',
            'operating_end_hours' => '11:00 PM',
            'status' => 1
        ]);

        Restaurant::create([
            'id' => '2',
            'name' => 'Khushi restaurant',
            'location' => '98, krishna park soic, parvat patiya, surat, gujarat, India.',
            'operating_start_hours' => '10:00 AM',
            'operating_end_hours' => '11:00 PM',
            'status' => 1
        ]);
    }
}
