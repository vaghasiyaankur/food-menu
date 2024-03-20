<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryLanguage;
use App\Models\SubCategory;
use App\Models\Language;
use App\Models\SubCategoryLanguage;
use File;
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
                'restaurant_id' => 1,
                'added_by_id' => 1
            ],
            [
                'name' => ['Panjabi', 'પંજાબી','पंजाबी'],
                'image' => '/category/panjabi_dish.png',
                'restaurant_id' => 1,
                'added_by_id' => 1
            ],
            [
                'name' => ['Indian','ભારતીય','भारतीय'],
                'image' => '/category/indian_dish.png',
                'restaurant_id' => 2,
                'added_by_id' => 4
            ],
            [
                'name' => ['Panjabi', 'પંજાબી','पंजाबी'],
                'image' => '/category/panjabi_dish.png',
                'restaurant_id' => 2,
                'added_by_id' => 4
            ]
        ];

        $check_folder= is_dir(storage_path('app/public/category'));
        if(!$check_folder) mkdir(storage_path('app/public/category'));

        $languages = Language::all();

        foreach ($categories as $cate) {
            $cat = new Category();
            $cat->image = $cate['image'];
            $cat->added_by_id = $cate['added_by_id'];
            $cat->restaurant_id = $cate['restaurant_id'];
            $cat->save();

            foreach($languages as $k=>$lan){
                $catlan = new CategoryLanguage();
                $catlan->language_id = $lan->id;
                $catlan->category_id = $cat->id;
                $catlan->name = $cate['name'][$k];
                $catlan->save();
            }


            File::copy(public_path('images'.$cate['image']), public_path('storage/'. $cate['image']));

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
