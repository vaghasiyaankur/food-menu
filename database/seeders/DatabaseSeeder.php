<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            SettingSeeder::class,
            ColorSeeder::class,
            TableSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            FloorSeeder::class,
            OrderSeeder::class
        ]);
    }
}
