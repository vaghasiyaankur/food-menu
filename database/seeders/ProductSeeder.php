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
            [
                'name' => 'Rice',
                'price' => 70,
                'sub_category_id' => 1
            ],
            [
                'name' => 'Chhas',
                'price' => 10,
                'sub_category_id' => 1
            ]
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
