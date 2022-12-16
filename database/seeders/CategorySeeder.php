<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryLanguage;
use App\Models\SubCategory;
use App\Models\Language;
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
                ]
            ],
            [
                'name' => ['Panjabi', 'પંજાબી','पंजाबी'],
                'image' => '/category/panjabi_dish.png',
                'sub_categories' => [
                    ['Naan Or Roti', 'નાન કે રોટી', 'नान या रोटी'],
                    ['Sabji', 'સબજી', 'सब्जी']
                ]
            ]
        ];

        $check_folder= is_dir(storage_path('app/public/category'));
        if(!$check_folder) mkdir(storage_path('app/public/category'));

        $languages = Language::all();

        foreach ($categories as $cate) {
            $cat = new Category();
            $cat->image = $cate['image'];
            $cat->save();

            foreach($languages as $k=>$lan){
                $catlan = new CategoryLanguage();
                $catlan->language_id = $lan->id;
                $catlan->name = $cate['name'][$k];
                $catlan->save();
            }
            
            
            File::copy(public_path('images'.$cate['image']), public_path('storage/'. $cate['image']));

            foreach ($cate['sub_categories'] as $key => $subCat) {
                foreach($languages as $ke=>$lang){
                    $subCate = new SubCategory();
                    $subCate->name = $subCat[$ke];
                    $subCate->category_id = $cat->id;
                    $subCate->language_id = $lang->id;
                    $subCate->save();
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
