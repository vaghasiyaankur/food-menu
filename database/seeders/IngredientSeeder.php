<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientRestaurantLanguage;
use App\Models\Language;
use App\Models\ProductIngredient;
use App\Models\RestaurantLanguage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            ['name' => ['Butter Milk', 'છાછ', 'छाछ'], 'price' => 2.50],
            ['name' => ['Milk', 'દૂધ', 'दूध'], 'price' => 3.00],
            ['name' => ['Salad', 'સલાડ', 'सलाद'], 'price' => 4.50],
            ['name' => ['Sweet', 'મીઠાઈ', 'मिठाई'], 'price' => 3.50],
            ['name' => ['Noodles', 'નૂડલ્સ', 'नूडल्स'], 'price' => 5.00],
            ['name' => ['Pasta', 'પાસ્તા', 'पास्ता'], 'price' => 4.50],
            ['name' => ['Mushrooms', 'મશરૂમ', 'मशरूम'], 'price' => 6.00],
            ['name' => ['Tofu', 'ટોફુ', 'टोफू'], 'price' => 4.00],
            ['name' => ['Almond', 'બાદામ', 'बादाम'], 'price' => 8.00],
            ['name' => ['Cashew', 'કાજૂ', 'काजू'], 'price' => 7.00],
            ['name' => ['Raisins', 'કિશમિશ', 'किशमिश'], 'price' => 6.50],
            ['name' => ['Pistachio', 'પિસ્તા', 'पिस्ता'], 'price' => 9.00],
            ['name' => ['Chocolates', 'ચોકલેટ્સ', 'चॉकलेट्स'], 'price' => 3.50],
            ['name' => ['Papad', 'પાપડ', 'पापड़'], 'price' => 2.00],
            ['name' => ['Cheese', 'ચીઝ', 'चीज़'], 'price' => 5.00],
            ['name' => ['Paneer', 'પનીર', 'पनीर'], 'price' => 6.50],
            ['name' => ['Butter', 'મક્ખણ', 'मक्खन'], 'price' => 4.00],
            ['name' => ['Punjabi Pickle', 'પંજાબી આચાર', 'पंजाबी अचार'], 'price' => 5.50],
            ['name' => ['Curd', 'દહી', 'दही'], 'price' => 3.00],
            ['name' => ['Rice', 'ચોખા', 'चावल'], 'price' => 10.00],
            ['name' => ['Coconut Chutney', 'નારીયેલ ચટણી', 'नारियल चटनी'], 'price' => 4.50],
            ['name' => ['Sambar', 'સાંભર', 'सांभर'], 'price' => 5.00],
            ['name' => ['Mayonnaise', 'મેયોનીઝ', 'मेयोनेज'], 'price' => 3.50],
            ['name' => ['Corn', 'મક્કા', 'मक्का'], 'price' => 2.50],
            ['name' => ['Olive', 'ઓલિવ', 'ऑलिव'], 'price' => 8.00]
        ];

        $check_folder= is_dir(storage_path('app/public/ingredient'));
        if(!$check_folder) mkdir(storage_path('app/public/ingredient'));
        
        $languages = Language::all();
        
        $restaurantData = [
            ['id' => 1, 'added_by' => 1],
            ['id' => 2, 'added_by' => 4]
        ];

        foreach($restaurantData as $restData){
            foreach ($ingredients as $k => $ingredient) {
                $newKey = $k + 1;
                $sourcePath = public_path('assets/images/seederImages/ingredient/'.$newKey.'.webp');
                $destinationPath = public_path('storage/ingredient/'.$restData['id'].'-'.$newKey.'.webp');
                if (File::exists($sourcePath)) {
                    if(!File::exists($destinationPath)){
                        File::copy($sourcePath, $destinationPath);
                    }
                }
                $ing = new Ingredient();
                $ing->image = 'ingredient/'.$restData['id'].'-'.$newKey.'.webp';
                $ing->restaurant_id = $restData['id'];
                $ing->price = $ingredient['price'];
                $ing->added_by_id = $restData['added_by'];
                if($ing->save()){
                    foreach($languages as $key=>$lan){
                        $restaurantLanguage = RestaurantLanguage::where('restaurant_id', $restData['id'])
                                                ->where('language_id', $lan->id)
                                                ->first();
                        $ingCatRestLang = new IngredientRestaurantLanguage();
                        $ingCatRestLang->name = $ingredient['name'][$key];
                        $ingCatRestLang->restaurant_language_id = $restaurantLanguage->id;
                        $ingCatRestLang->ingredient_id = $ing->id;
                        $ingCatRestLang->save();
                    }
                }
            }
        }

        //Add For Testing 
        $datas = [
            ['ingredient_id' => 1, 'product_id' => 1],
            ['ingredient_id' => 2, 'product_id' => 1],
            ['ingredient_id' => 1, 'product_id' => 2],
            ['ingredient_id' => 2, 'product_id' => 2]
        ];
        foreach($datas as $data){
            ProductIngredient::create($data);
        }

    }
}
