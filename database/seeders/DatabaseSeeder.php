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
            AdminSeeder::class,
            RestaurantSeeder::class,
            UserSeeder::class,
            RestaurantManagerSeeder::class,
            LanguageSeeder::class,
            CategorySeeder::class,
            ColorSeeder::class,
            ProductSeeder::class,
            ComboSeeder::class,
            CustomerSeeder::class,
            FloorSeeder::class,
            TableSeeder::class,
            // OrderSeeder::class,
            SettingSeeder::class,
            ContentSeeder::class,
            QrCodeTokenSeeder::class,
            IngredientSeeder::class,
            VariationSeeder::class
        ]);
    }
}
