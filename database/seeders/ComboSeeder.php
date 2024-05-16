<?php

namespace Database\Seeders;

use App\Models\Combo;
use App\Models\ComboLanguage;
use App\Models\ComboProduct;
use App\Models\ComboRestaurantLanguage;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class ComboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $combos = [
            [
                'name' => ['Burger Combo','બર્ગર કોમ્બો','बर्गर कॉम्बो'],
                'image' => '/combo/1.png',
                'price' => "100",
                'food_type' => 1,
                'status' => 1,
                'product_ids' => [245,263]
            ],
            [
                'name' => ['Sandwich Combo','સેન્ડવીચ કોમ્બો','सैंडविच कॉम्बो'],
                'image' => '/combo/2.png',
                'price' => "150",
                'food_type' => 1,
                'status' => 1,
                'product_ids' => [226,228]
            ]
        ];

        $languages = Language::all();

        $restaurantData = [
            ['id' => 1, 'added_by' => 1],
            ['id' => 2, 'added_by' => 4]
        ];

        $check_folder= is_dir(storage_path('app/public/combo'));
        if(!$check_folder) mkdir(storage_path('app/public/combo'));

        foreach($restaurantData as $restData) {
            foreach ($combos as $k => $combo) {
                $comboSourcePath = public_path('assets/images/seederImages'.$combo['image']);
                $comboDestinationPath = storage_path('app/public'.$combo['image']);
                if (File::exists($comboSourcePath)) {
                    if(!File::exists($comboDestinationPath)){
                        File::copy($comboSourcePath, $comboDestinationPath);
                    }
                }

                $com = new Combo();
                $com->image = $combo['image'];
                $com->price = $combo['price'];
                $com->added_by_id = $restData['added_by'];
                $com->restaurant_id = $restData['id'];
                $com->added_by = 'manager';
                $com->save();

                foreach($languages as $lan_key=>$lan){
                    $comboLan = new ComboRestaurantLanguage();
                    $comboLan->restaurant_language_id = $lan->id;
                    $comboLan->combo_id = $com->id;
                    $comboLan->name = $combo['name'][$lan_key];
                    $comboLan->save();
                }

                foreach ($combo['product_ids'] as $key => $pro) {
                    $comboPro = new ComboProduct();
                    $comboPro->product_id = $pro;
                    $comboPro->combo_id = $com->id;
                    $comboPro->save();
                }
            }
        }
    }
}
