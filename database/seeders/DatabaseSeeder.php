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
            UserSeeder::class,
            LanguageSeeder::class,
            CategorySeeder::class,
            ColorSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            FloorSeeder::class,
            TableSeeder::class,
            // OrderSeeder::class,
            SettingSeeder::class,
            ContentSeeder::class,
            QrCodeTokenSeeder::class
        ]);
    }
}
