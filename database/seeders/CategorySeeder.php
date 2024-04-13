<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryLanguage;
use App\Models\CategoryRestaurantLanguage;
use App\Models\SubCategory;
use App\Models\Language;
use App\Models\RestaurantLanguage;
use App\Models\SubCategoryLanguage;
use App\Models\SubcategoryRestaurantLanguage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => ['Indian','ભારતીય','भारतीय'],
                'image' => '/category/indian_dish.png',
                'sub_categories' => [
                    ['Dosa', 'ઢોસા', 'ढोसा'],
                    ['Gujarati Dish', 'ગુજરાતી વાનગી', 'गुजराती डिश']
                ],
                'restaurant_id' => 1,
                'added_by_id' => 1,
                'category_type' => 1,
                'status' =>1
            ],
            [
                'name' => ['Panjabi', 'પંજાબી','पंजाबी'],
                'image' => '/category/panjabi_dish.png',
                'sub_categories' => [
                    ['Naan Or Roti', 'નાન કે રોટી', 'नान या रोटी'],
                    ['Sabji', 'સબજી', 'सब्जी']
                ],
                'restaurant_id' => 1,
                'added_by_id' => 1,
                'category_type' => 1,
                'status' =>1
            ],
            [
                'name' => ['Indian','ભારતીય','भारतीय'],
                'image' => '/category/indian_dish.png',
                'sub_categories' => [
                    ['Dosa', 'ઢોસા', 'ढोसा'],
                    ['Gujarati Dish', 'ગુજરાતી વાનગી', 'गुजराती डिश']
                ],
                'restaurant_id' => 2,
                'added_by_id' => 4,
                'category_type' => 1,
                'status' =>1
            ],
            [
                'name' => ['Panjabi', 'પંજાબી','पंजाबी'],
                'image' => '/category/panjabi_dish.png',
                'sub_categories' => [
                    ['Naan Or Roti', 'નાન કે રોટી', 'नान या रोटी'],
                    ['Sabji', 'સબજી', 'सब्जी']
                ],
                'restaurant_id' => 2,
                'added_by_id' => 4,
                'category_type' => 1,
                'status' =>1
            ]
        ];

        $check_folder= is_dir(storage_path('app/public/category'));
        if(!$check_folder) mkdir(storage_path('app/public/category'));

        $check_folder= is_dir(storage_path('app/public/sub_category'));
        if(!$check_folder) mkdir(storage_path('app/public/sub_category'));

        $languages = Language::all();

        
        foreach ($categories as $k => $cate) {
            
            $catSourcePath = public_path('assets/images/seederImages'.$cate['image']);
            $catDestinationPath = storage_path('app/public'.$cate['image']);
            if (File::exists($catSourcePath)) {
                if(!File::exists($catDestinationPath)){
                    File::copy($catSourcePath, $catDestinationPath);
                }
            }

            $cat = new Category();
            $cat->image = $cate['image'];
            $cat->added_by_id = $cate['added_by_id'];
            $cat->restaurant_id = $cate['restaurant_id'];
            $cat->save();

            foreach($languages as $lan_key=>$lan){
                $catlan = new CategoryLanguage();
                $catlan->language_id = $lan->id;
                $catlan->category_id = $cat->id;
                $catlan->name = $cate['name'][$lan_key];
                $catlan->save();


                $restaurantLanguage = RestaurantLanguage::where('restaurant_id', $cate['restaurant_id'])->where('language_id', $lan->id)->first();

                $subCatRestLang = new CategoryRestaurantLanguage();
                $subCatRestLang->name = $cate['name'][$lan_key];
                $subCatRestLang->restaurant_language_id = $restaurantLanguage->id;
                $subCatRestLang->category_id = $cat->id;
                $subCatRestLang->save();
            }


            foreach ($cate['sub_categories'] as $key => $subCat) {
                $imageName = '';
                if($subCat[0] == 'Dosa') $imageName = 'dosa';
                else if($subCat[0] == 'Gujarati Dish') $imageName = 'gujarati_dish';
                else if($subCat[0] == 'Sabji') $imageName = 'sabji';
                else if($subCat[0] == 'Naan Or Roti') $imageName = 'naan_roti';

                $sourcePath = public_path('assets/images/seederImages/sub_category/'.$imageName.'.webp');
                $destinationPath = storage_path('app/public/sub_category/'.$cat->restaurant_id.'-'.$k.'-'.$key.'.webp');
                if (File::exists($sourcePath)) {
                    if(!File::exists($destinationPath)){
                        File::copy($sourcePath, $destinationPath);
                    }
                }
                $subCate = new SubCategory();
                $subCate->image = 'sub_category/'.$cat->restaurant_id.'-'.$k.'-'.$key.'.webp';
                $subCate->category_id = $cat->id;
                $subCate->restaurant_id = $cate['restaurant_id'];
                $subCate->save();
                foreach($languages as $ke=>$lang){
                    $subcatlang = new SubCategoryLanguage();
                    $subcatlang->name = $subCat[$ke];
                    $subcatlang->language_id = $lang->id;
                    $subcatlang->sub_category_id = $subCate->id;
                    $subcatlang->save();

                    $restaurantLanguage = RestaurantLanguage::where('restaurant_id', $cate['restaurant_id'])->where('language_id', $lang->id)->first();
                    $subCatRestLang = new SubcategoryRestaurantLanguage();
                    $subCatRestLang->name = $subCat[$ke];
                    $subCatRestLang->restaurant_language_id = $restaurantLanguage->id;
                    $subCatRestLang->sub_category_id = $subCate->id;
                    $subCatRestLang->save();
                }
            }

        }
    }

            /**
             * Get the value of key
             */
            public function getKey()
            {
                return $this->key;
            }
}
