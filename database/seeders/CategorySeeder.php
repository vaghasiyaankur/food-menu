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
                'sub_categories' => [
                    ['Dosa', 'ઢોસા', 'ढोसा'],
                    ['Gujarati Dish', 'ગુજરાતી વાનગી', 'गुजराती डिश']
                ],
                'user_id' => 1
            ],
            [
                'name' => ['Panjabi', 'પંજાબી','पंजाबी'],
                'image' => '/category/panjabi_dish.png',
                'sub_categories' => [
                    ['Naan Or Roti', 'નાન કે રોટી', 'नान या रोटी'],
                    ['Sabji', 'સબજી', 'सब्जी']
                ],
                'user_id' => 1
            ],
            [
                'name' => ['Indian','ભારતીય','भारतीय'],
                'image' => '/category/indian_dish.png',
                'sub_categories' => [
                    ['Dosa', 'ઢોસા', 'ढोसा'],
                    ['Gujarati Dish', 'ગુજરાતી વાનગી', 'गुजराती डिश']
                ],
                'user_id' => 2
            ],
            [
                'name' => ['Panjabi', 'પંજાબી','पंजाबी'],
                'image' => '/category/panjabi_dish.png',
                'sub_categories' => [
                    ['Naan Or Roti', 'નાન કે રોટી', 'नान या रोटी'],
                    ['Sabji', 'સબજી', 'सब्जी']
                ],
                'user_id' => 2
            ]
        ];

        $check_folder= is_dir(storage_path('app/public/category'));
        if(!$check_folder) mkdir(storage_path('app/public/category'));

        $languages = Language::all();

        foreach ($categories as $cate) {
            $cat = new Category();
            $cat->image = $cate['image'];
            $cat->user_id = $cate['user_id'];
            $cat->save();

            foreach($languages as $k=>$lan){
                $catlan = new CategoryLanguage();
                $catlan->language_id = $lan->id;
                $catlan->category_id = $cat->id;
                $catlan->name = $cate['name'][$k];
                $catlan->save();
            }


            File::copy(public_path('images'.$cate['image']), public_path('storage/'. $cate['image']));

            foreach ($cate['sub_categories'] as $key => $subCat) {
                $subCate = new SubCategory();
                $subCate->category_id = $cat->id;
                $subCate->user_id = $cate['user_id'];
                $subCate->save();
                foreach($languages as $ke=>$lang){
                    $subcatlang = new SubCategoryLanguage();
                    $subcatlang->name = $subCat[$ke];
                    $subcatlang->language_id = $lang->id;
                    $subcatlang->sub_category_id = $subCate->id;
                    $subcatlang->save();
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
