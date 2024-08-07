<?php

namespace Database\Seeders;

use App\Helper\LanguageHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;
use App\Models\Restaurant;
use App\Models\RestaurantLanguage;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = LanguageHelper::getLanguageSeederContent();

        $restaurants = Restaurant::get();
        foreach($restaurants as $restaurant){
            foreach ($contents as $content) {
                $restaurant_lang_id = RestaurantLanguage::where('restaurant_id', $restaurant->id)->where('language_id',$content['language_id'])->value('id');
                $cnt = new Content();
                $cnt->restaurant_language_id = $restaurant_lang_id;
                $cnt->title = $content['title'];
                $cnt->content = $content['content'];
                $cnt->save();
            }
        }
    }
}
    