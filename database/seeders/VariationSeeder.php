<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryLanguage;
use App\Models\CategoryRestaurantLanguage;
use App\Models\Variation;
use App\Models\VariationRestaurantLanguage;
use App\Models\SubCategory;
use App\Models\Language;
use App\Models\ProductRestaurantLanguage;
use App\Models\RestaurantLanguage;
use App\Models\SubCategoryLanguage;
use App\Models\SubcategoryRestaurantLanguage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variations = [
            ['name' => ['S', 'S', 'S']],
            ['name' => ['M', 'M', 'N']],
            ['name' => ['L', 'L', 'L']],
            ['name' => ['X', 'X', 'X']]
        ];

        $check_folder= is_dir(storage_path('app/public/variation'));
        if(!$check_folder) mkdir(storage_path('app/public/variation'));
        
        $languages = Language::all();
        
        $restaurantData = [
            ['id' => 1, 'added_by' => 1],
            ['id' => 2, 'added_by' => 4]
        ];

        foreach($restaurantData as $restData){
            foreach ($variations as $k => $variation) {
                $newKey = $k + 1;
                $sourcePath = public_path('assets/images/seederImages/variation/'.$newKey.'.webp');
                $destinationPath = public_path('storage/variation/'.$restData['id'].'-'.$newKey.'.webp');
                if (File::exists($sourcePath)) {
                    if(!File::exists($destinationPath)){
                        File::copy($sourcePath, $destinationPath);
                    }
                }

                $var = new Variation();
                $var->image = 'variation/'.$restData['id'].'-'.$newKey.'.webp';
                $var->restaurant_id = $restData['id'];
                $var->added_by_id = $restData['added_by'];
                if($var->save()){
                    foreach($languages as $key=>$lan){
                        
                        $restaurantLanguage = RestaurantLanguage::where('restaurant_id', $restData['id'])
                                                ->where('language_id', $lan->id)
                                                ->first();

                        $varCatRestLang = new VariationRestaurantLanguage();
                        $varCatRestLang->name = $variation['name'][$key];
                        $varCatRestLang->restaurant_language_id = $restaurantLanguage->id;
                        $varCatRestLang->variation_id = $var->id;
                        $varCatRestLang->save();
                    }
                }
            }
        }
    }
}
