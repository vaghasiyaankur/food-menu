<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Product;
use App\Models\ProductLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
                'price' => '110.00',
                'sub_category_id' => 1,
                'name' => ['Jini Dosa','જીની ડોસા','जिनी डोसा'],
            ],
            [
                'price' => '120.00',
                'sub_category_id' => 1,
                'name' => ['Cheese Paneer Chilli Dosa','ચીઝ પનીર મરચા ડોસા','पनीर पनीर चिली डोसा'],
            ],
            [
                'price' => '120.00',
                'sub_category_id' => 1,
                'name' => ['Paneer jini Dosa','પનીર જીની ડોસા','पनीर जिनी डोसा'],
            ],
            [
                'price' => '145.00',
                'sub_category_id' => 1,
                'name' => ['Pav Bhaji Dosa','પાવભાજી ડોસા','पाव भाजी डोसा'],
            ],
            [
                'price' => '126.00',
                'sub_category_id' => 1,
                'name' => ['Pizza Dosa','પિઝા ડોસા','पिज्जा डोसा'],
            ],
            [
                'price' => '100.00',
                'sub_category_id' => 1,
                'name' => ['Masala Dosa','મસાલા ઢોસા','मसाला डोसा'],
            ],
            [
                'price' => '80.00',
                'sub_category_id' => 1,
                'name' => ['Sada Dosa','સાદા ડોસા','सादा डोसा'],
        ],
            [
                'price' => '115.00',
                'sub_category_id' => 1,
                'name' => ['Mysore Masala Dosa','મૈસુર મસાલા ડોસા','मैसूर मसाला डोसा'],
            ],
            [
                'price' => '135.00',
                'sub_category_id' => 1,
                'name' => ['Neer Dosa','નીર ડોસા','नीर डोसा'],
            ],
            [
                'price' => '145.00',
                'sub_category_id' => 1,
                'name' => ['Oats Dosa','ઓટ્સ ડોસા','ओट्स डोसा'],
            ],
            [
                'price' => '150.00',
                'sub_category_id' => 1,
                'name' => ['Instant Moong Dal Dosa','ઇન્સ્ટન્ટ મૂંગ દાળ ડોસા','झटपट मूंग दाल डोसा'],
            ],
            [
                'price' => '120.00',
                'sub_category_id' => 1,
                'name' => ['Palak Paneer Dosa','પાલક પનીર ડોસા','पालक पनीर डोसा'],
            ],

            [
                'price' => '50.00',
                'sub_category_id' => 2,
                'name' => ['Rice','ભાત','चावल'],
            ],
            [
                'price' => '50.00',
                'sub_category_id' => 2,
                'name' => ['Dal','દાળ','दाल'],
            ],
            [
                'price' => '10.00',
                'sub_category_id' => 2,
                'name' => ['Roti','રોટી','रोटी'],
            ],
            [
                'price' => '110.00',
                'sub_category_id' => 2,
                'name' => ['Pavbhaji','પાવભાજી','पाव भाजी'],
            ],
            [
                'price' => '110.00',
                'sub_category_id' => 2,
                'name' => ['Rice Papad','ચોખાના પાપડ','चावल का पापड़'],
            ],
            [
                'price' => '110.00',
                'sub_category_id' => 2,
                'name' => ['Khaman','ખમણ','खमन'],
            ],
            [
                'price' => '110.00',
                'sub_category_id' => 2,
                'name' => ['Basundi','બાસુંદી','बासुंदी'],
            ],
            [
                'price' => '110.00',
                'sub_category_id' => 2,
                'name' => ['Undhiyu','ઉંધીયુ','उंधियु'],
            ],
            [
                'price' => '110.00',
                'sub_category_id' => 2,
                'name' => ['Juwar Rotla','જુવારના રોટલા','जुवार का रोटला'],
            ],
            [
                'price' => '10.00',
                'sub_category_id' => 2,
                'name' => ['Thepla','થેપલા','थेपला'],
            ],
            [
                'price' => '25.00',
                'sub_category_id' => 2,
                'name' => ['Ghooghra','ઘૂઘરા','घूघरा'],
            ],



            [
                'price' => '249.00',
                'sub_category_id' => 3,
                'name' => ['Mix Veg Curry with Tandoori Naan (OR) Tandoori Roti','તંદૂરી નાન (અથવા) તંદૂરી રોટી સાથે વેજ કરી મિક્સ કરો','तंदूरी नान (या) तंदूरी रोटी के साथ वेज करी मिलाएं'],
            ],
            [
                'price' => '249.00',
                'sub_category_id' => 3,
                'name' => ['Kadai Veg with Tandoori Naan (OR) Tandoori Roti','તંદૂરી નાન સાથે કડાઈ વેજ (અથવા તંદૂરી રોટી)','तंदूरी नान के साथ कड़ाही वेज (या तंदूरी रोटी)'],
            ],
            [
                'price' => '299.00',
                'sub_category_id' => 3,
                'name' => ['Paneer Butter Masala with Tandooi Naan (OR) Tandoori Roti','તંદૂઈ નાન (અથવા) તંદૂરી રોટી સાથે પનીર બટર મસાલા','तंदूई नान (OR) तंदूरी रोटी के साथ पनीर बटर मसाला'],
            ],
            [
                'price' => '299.00',
                'sub_category_id' => 3,
                'name' => ['Palak Paneer with with Tandoori Naan (OR) Tandoori Roti','તંદૂરી નાન (OR) તંદૂરી રોટી સાથે પલક પનીર','तंदूरी नान (या) तंदूरी रोटी के साथ पालक पनीर'],
            ],
            [
                'price' => '299.00',
                'sub_category_id' => 3,
                'name' => ['Paneer Butter Masala with Basmat Pulao','બાસમત પુલાવ સાથે પનીર બટર મસાલો','बासमत पुलाव के साथ पनीर बटर मसाला'],
            ],
            [
                'price' => '299.00',
                'sub_category_id' => 3,
                'name' => ['PaneKadai Paneer with Basmati Pulao','બાસમતી પુલાવ સાથે પનીકડાઈ પનીર','बासमती पुलाव के साथ पैनकड़ाई पनीर'],
            ],


            [
                'price' => '349.00',
                'sub_category_id' => 4,
                'name' => ['Kaju Kari','કાજુ કારી','काजू कारी'],
            ],
            [
                'price' => '349.00',
                'sub_category_id' => 4,
                'name' => ['Kaju Paneer','કાજુ પનીર','काजू पनीर'],
            ],
            [
                'price' => '349.00',
                'sub_category_id' => 4,
                'name' => ['Kaju Bhurji','કાજુ ભુર્જી','काजू भुर्जी'],
            ],
            [
                'price' => '349.00',
                'sub_category_id' => 4,
                'name' => ['Kaju Kadai','કાજુ કડાઈ','काजू कड़ाही'],
            ],
            [
                'price' => '349.00',
                'sub_category_id' => 4,
                'name' => ['Paneer Tika','પનીર ટિક્કા','पनीर टिक्का'],
            ],

        ];

        $check_folder= is_dir(public_path('storage/product'));
        if(!$check_folder) mkdir(public_path('storage/product'));
        //  For Restaurant 1
        foreach ($products as $key=>$product) {
            $restaurant_id = 1;
            $newKey = $key + 1;
            $sourcePath = public_path('assets/images/seederImages/product/'.$newKey.'.webp');
            $destinationPath = public_path('storage/product/'.$restaurant_id.'-'.$newKey.'.webp');
            if (File::exists($sourcePath)) {
                if(!File::exists($destinationPath)){
                    File::copy($sourcePath, $destinationPath);
                }
            }
            $pro = new Product();
            $pro->price = $product['price'];
            $pro->sub_category_id = $product['sub_category_id'];
            $pro->restaurant_id = $restaurant_id;
            $pro->slug = 'product-'.$restaurant_id.'-'.$newKey;
            $pro->image = 'product/'.$restaurant_id.'-'.$newKey.'.webp';
            if($pro->save()){
                $langs = Language::whereHas('RestaurantLanguages', function ($query) use($restaurant_id) {
                    $query->where('restaurant_id', $restaurant_id)->where('status', 1);
                })->get();
                foreach ($langs as $k => $lang) {
                    $name_slug = Str::slug($product['name'][0]);
                    $pro_lang = new ProductLanguage();
                    $pro_lang->language_id = $lang->id;
                    $pro_lang->product_id = $pro->id;
                    $pro_lang->name = $product['name'][$k];
                    $pro_lang->slug = $name_slug.'-'.$restaurant_id.'-'.$k;
                    $pro_lang->save();
                }
            }
        }

        //  For Restaurant 2
        foreach ($products as $key=>$product) {
            $restaurant_id = 2;
            $newKey = $key + 1;
            $sourcePath = public_path('assets/images/seederImages/product/'.$newKey.'.webp');
            $destinationPath = public_path('storage/product/'.$restaurant_id.'-'.$newKey.'.webp');
            if (File::exists($sourcePath)) {
                if(!File::exists($destinationPath)){
                    File::copy($sourcePath, $destinationPath);
                }
            }
            $pro = new Product();
            $pro->price = $product['price'];
            $pro->sub_category_id = 4 + $product['sub_category_id'];
            $pro->restaurant_id = $restaurant_id;
            $pro->slug = 'product-'.$restaurant_id.'-'.$newKey;
            $pro->image = 'product/'.$restaurant_id.'-'.$newKey.'.webp';
            if($pro->save()){
                $langs = Language::whereHas('RestaurantLanguages', function ($query) use($restaurant_id) {
                    $query->where('restaurant_id', $restaurant_id)->where('status', 1);
                })->get();
                foreach ($langs as $k => $lang) {
                    $name_slug = Str::slug($product['name'][0]);
                    $pro_lang = new ProductLanguage();
                    $pro_lang->language_id = $lang->id;
                    $pro_lang->product_id = $pro->id;
                    $pro_lang->name = $product['name'][$k];
                    $pro_lang->slug = $name_slug.'-'.$restaurant_id.'-'.$k;
                    $pro_lang->save();
                }
            }
        }
    }
}
