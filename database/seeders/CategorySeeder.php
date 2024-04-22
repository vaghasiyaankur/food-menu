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
                'name' => ['Gujarati Dish','ગુજરાતી વાનગી','गुजराती डिश'],
                'image' => '/category/indian_dish.png',
                'sub_categories' => [
                    ['Sabji', 'સબજી', 'सब्जी'],
                    ['Roti', 'રોટી', 'रोटी'],
                    ['Papad', 'પાપડ', 'पापड़'],
                    ['Other items', 'અન્ય વસ્તુઓ', 'अन्य सामाग्री']
                ],
                'category_type' => 1
            ],
            [
                'name' => ['Chinese', 'ચાઈનીઝ','चीनी'],
                'image' => '/category/chinese.png',
                'sub_categories' => [
                    ['Soup', 'સૂપ', 'सूप'],
                    ['Fried Rice', 'ફ્રાઇડ રાઇસ', 'फ्राइड राइस'],
                    ['Noodles', 'નૂડલ્સ', 'नूडल्स'],
                    ['Maggie & Pasta', 'મેગી અને પાસ્તા', 'मैगी और पास्ता'],
                    ['Gravy Dishes', 'ગ્રેવી ડિશેસ', 'ग्रेवी डिशेस']
                ],
                'category_type' => 1
            ],
            [
                'name' => ['Panjabi', 'પંજાબી','पंजाबी'],
                'image' => '/category/panjabi_dish.png',
                'sub_categories' => [
                    ['Paneer & Kaju', 'પનીર અને કાજુ', 'पनीर और काजू'],
                    ['Chapati & Paratha', 'ચપાતી અને પરોઠા', 'चपाती और पराठा'],
                    ['Roti', 'રોટી', 'रोटी'],
                    ['Rice & Pulav', 'ચોખા અને પુલાવ', 'चावल और पुलाव'],
                    ['Something Extra', 'કંઈક વિશેષ', 'कुछ अतिरिक्त']
                ],
                'category_type' => 1
            ],
            [
                'name' => ['Dessert', 'મીઠાઈ','मिठाई'],
                'image' => '/category/dessert-1.png',
                'sub_categories' => [
                    ['Ice Cream', 'આઈસ્ક્રીમ', 'आइसक्रीम'],
                    ['Cakes', 'કેક', 'केक'],
                    ['Cookies', 'કૂકીઝ', 'कुकीज़'],
                    ['Milk Shake', 'મિલ્ક શેક', 'मिल्कशेक'],
                    ['Falooda', 'ફાલુદા', 'फालूदा']
                ],
                'category_type' => 1
            ],
            [
                'name' => ['South Indian', 'દક્ષિણ ભારતીય','दक्षिण भारतीय'],
                'image' => '/category/south_indian.png',
                'sub_categories' => [
                    ['Idli', 'ઈડલી', 'इडली'],
                    ['Vada', 'વડા', 'वड़ा'],
                    ['Dosa', 'ડોસા', 'डोसा'],
                    ['Uttapam', 'ઉત્તપમ', 'उत्तपम'],
                    ['Rava Dosa', 'રવા ડોસા', 'रवा डोसा']
                ],
                'category_type' => 1
            ],
            [
                'name' => ['Fast Food', 'ફાસ્ટ ફૂડ','फास्ट फूड'],
                'image' => '/category/fast_food-1.png',
                'sub_categories' => [
                    ['Sandwiches', 'સેન્ડવીચ', 'सैंडविच'],
                    ['Pizza', 'પિઝા', 'पिज़्ज़ा'],
                    ['Burger', 'બર્ગર', 'बर्गर'],
                    ['Chaats', 'ચાટ્સ', 'चाट'],
                    ['Other Food', 'અન્ય ખોરાક', 'अन्य भोजन']
                ],
                'category_type' => 1
            ]
        ];

        $check_folder= is_dir(storage_path('app/public/category'));
        if(!$check_folder) mkdir(storage_path('app/public/category'));

        $check_folder= is_dir(storage_path('app/public/sub_category'));
        if(!$check_folder) mkdir(storage_path('app/public/sub_category'));

        $languages = Language::all();

        $restaurantData = [
            ['id' => 1, 'added_by' => 1],
            ['id' => 2, 'added_by' => 4]
        ];

        foreach($restaurantData as $restData) {

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
                $cat->added_by_id = $restData['added_by'];
                $cat->restaurant_id = $restData['id'];
                $cat->save();
    
                foreach($languages as $lan_key=>$lan){
                    $catlan = new CategoryLanguage();
                    $catlan->language_id = $lan->id;
                    $catlan->category_id = $cat->id;
                    $catlan->name = $cate['name'][$lan_key];
                    $catlan->save();
    
    
                    $restaurantLanguage = RestaurantLanguage::where('restaurant_id', $restData['id'])->where('language_id', $lan->id)->first();
    
                    $subCatRestLang = new CategoryRestaurantLanguage();
                    $subCatRestLang->name = $cate['name'][$lan_key];
                    $subCatRestLang->restaurant_language_id = $restaurantLanguage->id;
                    $subCatRestLang->category_id = $cat->id;
                    $subCatRestLang->save();
                }
    
                foreach ($cate['sub_categories'] as $key => $subCat) {
                    
                    $value = $subCat[0];
                    // Remove special characters
                    $value = preg_replace('/[^A-Za-z0-9\s]/', ' ', $value);
                    // Remove double spaces
                    $value = preg_replace('/\s+/', ' ', $value);
                    // Replace spaces with underscores and convert to lowercase
                    $value = strtolower(str_replace(' ', '_', $value));

                    // if($subCat[0] == 'Dosa') $imageName = 'dosa';
                    // else if($subCat[0] == 'Gujarati Dish') $imageName = 'gujarati_dish';
                    // else if($subCat[0] == 'Sabji') $imageName = 'sabji';
                    // else if($subCat[0] == 'Naan Or Roti') $imageName = 'naan_roti';
    
                    $sourcePath = public_path('assets/images/seederImages/sub_category/'.$value.'.webp');
                    $destinationPath = storage_path('app/public/sub_category/'.$restData['id'].'-'.$k.'-'.$key.'.webp');
                    if (File::exists($sourcePath)) {
                        if(!File::exists($destinationPath)){
                            File::copy($sourcePath, $destinationPath);
                        }
                    }
                    $subCate = new SubCategory();
                    $subCate->image = 'sub_category/'.$restData['id'].'-'.$k.'-'.$key.'.webp';
                    $subCate->category_id = $cat->id;
                    $subCate->added_by_id = $restData['added_by'];
                    $subCate->restaurant_id = $restData['id'];
                    $subCate->save();
                    foreach($languages as $ke=>$lang){
                        $subCatLang = new SubCategoryLanguage();
                        $subCatLang->name = $subCat[$ke];
                        $subCatLang->language_id = $lang->id;
                        $subCatLang->sub_category_id = $subCate->id;
                        $subCatLang->save();
    
                        $restaurantLanguage = RestaurantLanguage::where('restaurant_id', $restData['id'])->where('language_id', $lang->id)->first();
                        $subCatRestLang = new SubcategoryRestaurantLanguage();
                        $subCatRestLang->name = $subCat[$ke];
                        $subCatRestLang->restaurant_language_id = $restaurantLanguage->id;
                        $subCatRestLang->sub_category_id = $subCate->id;
                        $subCatRestLang->save();
                    }
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
