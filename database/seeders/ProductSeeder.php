<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Product;
use App\Models\ProductLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

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
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Jini Dosa','જીની ડોસા','जिनी डोसा'],
            ],
            [
                'price' => '120.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Cheese Paneer Chilli Dosa','ચીઝ પનીર મરચા ડોસા','पनीर पनीर चिली डोसा'],
            ],
            [
                'price' => '120.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Paneer jini Dosa','પનીર જીની ડોસા','पनीर जिनी डोसा'],
            ],
            [
                'price' => '145.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Pav Bhaji Dosa','પાવભાજી ડોસા','पाव भाजी डोसा'],
            ],
            [
                'price' => '126.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Pizza Dosa','પિઝા ડોસા','पिज्जा डोसा'],
            ],
            [
                'price' => '100.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Masala Dosa','મસાલા ઢોસા','मसाला डोसा'],
            ],
            [
                'price' => '80.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Sada Dosa','સાદા ડોસા','सादा डोसा'],
        ],
            [
                'price' => '115.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Mysore Masala Dosa','મૈસુર મસાલા ડોસા','मैसूर मसाला डोसा'],
            ],
            [
                'price' => '135.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Neer Dosa','નીર ડોસા','नीर डोसा'],
            ],
            [
                'price' => '145.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Oats Dosa','ઓટ્સ ડોસા','ओट्स डोसा'],
            ],
            [
                'price' => '150.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Instant Moong Dal Dosa','ઇન્સ્ટન્ટ મૂંગ દાળ ડોસા','झटपट मूंग दाल डोसा'],
            ],
            [
                'price' => '120.00',
                'category_id' => 1,
                'restaurant_id' => 1,
                'name' => ['Palak Paneer Dosa','પાલક પનીર ડોસા','पालक पनीर डोसा'],
            ],

            [
                'price' => '50.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Rice','ભાત','चावल'],
            ],
            [
                'price' => '50.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Dal','દાળ','दाल'],
            ],
            [
                'price' => '10.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Roti','રોટી','रोटी'],
            ],
            [
                'price' => '110.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Pavbhaji','પાવભાજી','पाव भाजी'],
            ],
            [
                'price' => '110.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Rice Papad','ચોખાના પાપડ','चावल का पापड़'],
            ],
            [
                'price' => '110.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Khaman','ખમણ','खमन'],
            ],
            [
                'price' => '110.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Basundi','બાસુંદી','बासुंदी'],
            ],
            [
                'price' => '110.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Undhiyu','ઉંધીયુ','उंधियु'],
            ],
            [
                'price' => '110.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Juwar Rotla','જુવારના રોટલા','जुवार का रोटला'],
            ],
            [
                'price' => '10.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Thepla','થેપલા','थेपला'],
            ],
            [
                'price' => '25.00',
                'category_id' => 2,
                'restaurant_id' => 1,
                'name' => ['Ghooghra','ઘૂઘરા','घूघरा'],
            ],



            [
                'price' => '249.00',
                'category_id' => 3,
                'restaurant_id' => 2,
                'name' => ['Mix Veg Curry with Tandoori Naan(OR) Tandoori Roti','તંદૂરી નાન (અથવા) તંદૂરી રોટી સાથે વેજ કરી મિક્સ કરો','तंदूरी नान (या) तंदूरी रोटी के साथ वेज करी मिलाएं'],
            ],
            [
                'price' => '249.00',
                'category_id' => 3,
                'restaurant_id' => 2,
                'name' => ['Kadai Veg with Tandoori Naan (OR Tandoori Roti','તંદૂરી નાન સાથે કડાઈ વેજ (અથવા તંદૂરી રોટી)','तंदूरी नान के साथ कड़ाही वेज (या तंदूरी रोटी)'],
            ],
            [
                'price' => '299.00',
                'category_id' => 3,
                'restaurant_id' => 2,
                'name' => ['Paneer Butter Masala with Tandooi Naan (OR) Tandoori Roti','તંદૂઈ નાન (અથવા) તંદૂરી રોટી સાથે પનીર બટર મસાલા','तंदूई नान (OR) तंदूरी रोटी के साथ पनीर बटर मसाला'],
            ],
            [
                'price' => '299.00',
                'category_id' => 3,
                'restaurant_id' => 2,
                'name' => ['Palak Paneer with with Tandoori Naan (OR) Tandoori Roti','તંદૂરી નાન (OR) તંદૂરી રોટી સાથે પલક પનીર','तंदूरी नान (या) तंदूरी रोटी के साथ पालक पनीर'],
            ],
            [
                'price' => '299.00',
                'category_id' => 3,
                'restaurant_id' => 2,
                'name' => ['Paneer Butter Masala with Basmat Pulao','બાસમત પુલાવ સાથે પનીર બટર મસાલો','बासमत पुलाव के साथ पनीर बटर मसाला'],
            ],
            [
                'price' => '299.00',
                'category_id' => 3,
                'restaurant_id' => 2,
                'name' => ['PaneKadai Paneer with Basmati Pulao','બાસમતી પુલાવ સાથે પનીકડાઈ પનીર','बासमती पुलाव के साथ पैनकड़ाई पनीर'],
            ],


            [
                'price' => '349.00',
                'category_id' => 4,
                'restaurant_id' => 2,
                'name' => ['Kaju Kari','કાજુ કારી','काजू कारी'],
            ],
            [
                'price' => '349.00',
                'category_id' => 4,
                'restaurant_id' => 2,
                'name' => ['Kaju Paneer','કાજુ પનીર','काजू पनीर'],
            ],
            [
                'price' => '349.00',
                'category_id' => 4,
                'restaurant_id' => 2,
                'name' => ['Kaju Bhurji','કાજુ ભુર્જી','काजू भुर्जी'],
            ],
            [
                'price' => '349.00',
                'category_id' => 4,
                'restaurant_id' => 2,
                'name' => ['Kaju Kadai','કાજુ કડાઈ','काजू कड़ाही'],
            ],
            [
                'price' => '349.00',
                'category_id' => 4,
                'restaurant_id' => 2,
                'name' => ['Paneer Tika','પનીર ટિક્કા','पनीर टिक्का'],
            ],

        ];

        foreach ($products as $product) {
            $pro = new Product();
            $pro->price = $product['price'];
            $pro->category_id = $product['category_id'];
            $pro->restaurant_id = $product['restaurant_id'];
            $pro->slug = Str::slug($product['name'][0]);
            if($pro->save()){
                $langs = Language::whereStatus(1)->get();
                foreach ($langs as $key => $lang) {
                    $pro_lang = new ProductLanguage();
                    $pro_lang->language_id = $lang->id;
                    $pro_lang->product_id = $pro->id;
                    $pro_lang->name = $product['name'][$key];
                    $pro_lang->save();
                }
            }
        }
    }
}
