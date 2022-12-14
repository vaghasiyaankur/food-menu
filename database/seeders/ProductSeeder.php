<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [

            ['name' => 'Jini Dosa','price' => '110.00', 'sub_category_id' => 1],
            ['name' => 'Cheese Paneer Chilli Dosa','price' => '120.00', 'sub_category_id' => 1],
            ['name' => 'Paneer jini Dosa','price' => '120.00', 'sub_category_id' => 1],
            ['name' => 'Pav Bhaji Dosa','price' => '145.00', 'sub_category_id' => 1],
            ['name' => 'Pizza Dosa','price' => '126.00', 'sub_category_id' => 1],
            ['name' => 'Masala Dosa','price' => '100.00', 'sub_category_id' => 1],
            ['name' => 'Sada Dosa','price' => '80.00', 'sub_category_id' => 1],
            ['name' => 'Mysore Masala Dosa','price' => '115.00', 'sub_category_id' => 1],
            ['name' => 'Neer Dosa','price' => '135.00', 'sub_category_id' => 1],
            ['name' => 'Oats Dosa','price' => '145.00', 'sub_category_id' => 1],
            ['name' => 'Instant Moong Dal Dosa','price' => '150.00', 'sub_category_id' => 1],
            ['name' => 'Palak Paneer Dosa','price' => '120.00', 'sub_category_id' => 1],

            ['name' => 'Rice','price' => '50.00', 'sub_category_id' => 2],
            ['name' => 'Dal','price' => '50.00', 'sub_category_id' => 2],
            ['name' => 'Roti','price' => '10.00', 'sub_category_id' => 2],
            ['name' => 'Pavbhaji','price' => '110.00', 'sub_category_id' => 2],
            ['name' => 'Rice Papad','price' => '110.00', 'sub_category_id' => 2],
            ['name' => 'Khaman','price' => '110.00', 'sub_category_id' => 2],
            ['name' => 'Basundi','price' => '110.00', 'sub_category_id' => 2],
            ['name' => 'Undhiyu','price' => '110.00', 'sub_category_id' => 2],
            ['name' => 'Juwar Rotla','price' => '110.00', 'sub_category_id' => 2],
            ['name' => 'Thepla','price' => '10.00', 'sub_category_id' => 2],
            ['name' => 'Ghooghra','price' => '25.00', 'sub_category_id' => 2],



            ['name' => 'Mix Veg Curry with Tandoori Naan(OR) Tandoori Roti','price' => '249.00', 'sub_category_id' => 3],
            ['name' => 'Kadai Veg with Tandoori Naan (OR Tandoori Roti','price' => '249.00', 'sub_category_id' => 3],
            ['name' => 'Paneer Butter Masala with Tandooi Naan (OR) Tandoori Roti','price' => '299.00', 'sub_category_id' => 3],
            ['name' => 'Palak Paneer with with Tandoori aan (OR) Tandoori Roti','price' => '299.00', 'sub_category_id' => 3],
            ['name' => 'Paneer Butter Masala with Basmat Pulao','price' => '299.00', 'sub_category_id' => 3],
            ['name' => 'PaneKadai Paneer with Basmati Pulao','price' => '299.00', 'sub_category_id' => 3],


            ['name' => 'Kaju Kari','price' => '349.00', 'sub_category_id' => 4],
            ['name' => 'Kaju Paneer','price' => '349.00', 'sub_category_id' => 4],
            ['name' => 'Kaju Bhurji','price' => '349.00', 'sub_category_id' => 4],
            ['name' => 'Kaju Kadai','price' => '349.00', 'sub_category_id' => 4],
            ['name' => 'Paneer Tika','price' => '349.00', 'sub_category_id' => 4],

        ];

        foreach ($products as $product) {
            $pro = new Product();
            $pro->name = $product['name'];
            $pro->price = $product['price'];
            $pro->sub_category_id = $product['sub_category_id'];
            $pro->save();
        }
    }
}
