<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\RestaurantLanguage;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = new Language();
        $language->id = 1;
        $language->name = 'English';
        $language->save();

        $language = new Language();
        $language->id = 2;
        $language->name = 'Gujarati';
        $language->save();

        $language = new Language();
        $language->id = 3;
        $language->name = 'Hindi';
        $language->save();

        $restaurants = [
            '1' => ['1', '2', '3'],
            '2' => ['1', '2', '3']
        ];

        foreach($restaurants as $res_id=>$restaurant){
            foreach($restaurant as $restaurantLang)
                RestaurantLanguage::create([
                    'restaurant_id' => $res_id,
                    'language_id' => $restaurantLang,
                    'status' => 1,
                ]);
            }
        }
    }
