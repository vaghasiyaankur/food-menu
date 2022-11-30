<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
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
                'name' => 'Indian',
                'image' => '/category/indian_dish.png',
                'sub_categories' => ['Kathiyavadi Thali','Roti','Dal']
            ],
            [
                'name' => 'Panjabi',
                'image' => '/category/panjabi_dish.png',
                'sub_categories' => ['Paratha','Punjabi Sabji']
            ]
        ];

        foreach ($categories as $cate) {
            $cat = new Category();
            $cat->name = $cate['name'];
            $cat->image = $cate['image'];
            $cat->save();

            File::copy(public_path('images'.$cate['image']), storage_path('app/public'. $cate['image']));

            foreach ($cate['sub_categories'] as $subCat) {
                $subCate = new SubCategory();
                $subCate->name = $subCat;
                $subCate->category_id = $cat->id;
                $subCate->save();
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
