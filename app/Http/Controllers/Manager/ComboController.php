<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Helper\SettingHelper;
use App\Models\ComboRestaurantLanguage;
use App\Models\Combo;
use App\Models\ComboProduct;
use App\Models\Language;
use App\Models\ProductRestaurantLanguage;
use App\Models\RestaurantLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComboController extends Controller
{
    public function getCombos(Request $req)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $langId)
                                ->where('restaurant_id', $restaurantId)
                                ->value('id');

        $combos = Combo::with(['comboRestaurantLanguages' => function ($query) use ($restaurantLanguageId, $req) {
            $query->where('restaurant_language_id', $restaurantLanguageId);
            $query->where('name', 'LIKE', '%' . $req->search . '%');
        }])->whereHas('comboRestaurantLanguages',function($q) use ($req,$restaurantLanguageId){
            $q->where('restaurant_language_id',$restaurantLanguageId);
            $q->where('name','LIKE','%'.$req->search.'%');
        })->where('restaurant_id', $restaurantId)->get();

        $combos->transform(function ($combo) use ($req) {
            $name = $combo->comboRestaurantLanguages->isEmpty() ? null : $combo->comboRestaurantLanguages->first()->name;
            return [
                'id' => $combo->id,
                'image' => $combo->image,
                'status' => $combo->status,
                'price' => $combo->price,
                'food_type' => $combo->food_type,
                'name' => $name,
            ];
        });

        return response()->json(['combos' => $combos]);
    }

    public function addCombo(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
        $rules['food_type'] = 'required';
        $rules['price'] = 'required';
        $rules['status'] = 'required';
        $rules['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg';

        $customMessages = [];
        foreach ($languages as $language) {
            $customMessages["names.$language.required"] = ucfirst($language) . " name is required.";
        }

        $validator = Validator::make($req->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $image_name = '';
        if($req->file('image')){
            $directory = storage_path('app/public/combo/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $imageFile = $req->file('image');
            $image_name = '/combo/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/combo/'),$image_name);
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        $com = new Combo();
        $com->price = $req->price;
        $com->image = $image_name;
        $com->food_type = $req->food_type;
        $com->status = $req->status;
        $com->restaurant_id = $restaurantId;
        $com->added_by = Auth::user()->role;
        $com->added_by_id = Auth::user()->id;
        if($com->save()){
            $names = $req->names;
            foreach($resLangs as $resLang){
                $language = Language::where('id', $resLang->language_id)->first();
                $comResLang = new ComboRestaurantLanguage();
                $comResLang->restaurant_language_id = $resLang->id;
                $comResLang->combo_id = $com->id;
                $comResLang->name = $names[$language->name];
                $comResLang->save();
            }
        }

        if(is_array($req->products)){
            foreach($req->products as $productId){
                $comboProduct = new ComboProduct();
                $comboProduct->product_id = $productId;
                $comboProduct->combo_id = $com->id;
                $comboProduct->save();
            }
        }
        return response()->json(['success'=>'Combo Added Successfully.']);
    }

    public function getCombo($id)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();

        $combo = Combo::with(
                    [
                        'comboRestaurantLanguages.restaurantLanguage',
                        'comboProducts.product',
                    ]
                )
                ->select('id', 'image', 'price', 'food_type', 'status')
                ->find($id);

        if ($combo) {
            $transformedCombo = [
                'id' => $combo->id,
                'image' => $combo->image,
                'price' => $combo->price,
                'food_type' => $combo->food_type,
                'status' => $combo->status,
                'description' => $combo->description,
                'sub_category_id' => $combo->sub_category_id,
                'comRestLang' => $combo->comboRestaurantLanguages->map(function ($comRestLang) {
                    return [
                        'name' => $comRestLang->name,
                        'language_id' => $comRestLang->restaurantLanguage->language_id
                    ];
                }),
                'products' => $combo->comboProducts->map(function ($comPro) use($restaurantId, $langId) {
                    $name = ProductRestaurantLanguage::whereHas('restaurantLanguage', function ($query) use($restaurantId, $langId) {
                        $query->where('restaurant_id', $restaurantId)->where('language_id', $langId);
                    })->where('product_id', $comPro->product_id)
                    ->value('name');

                    return [
                        'id' => $comPro->product->id,
                        'image' => $comPro->product->image,
                        'name' => $name,
                        'type' => $comPro->product->type,
                        'price' => $comPro->product->price,
                        'status' => $comPro->product->status,
                    ];
                }),
            ];

            return response()->json($transformedCombo);
        }
    }

    public function updateCombo(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
        $rules['food_type'] = 'required';
        $rules['price'] = 'required';
        $rules['status'] = 'required';
        if($req->file('image')){
            $rules['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg';
        }

        $customMessages = [];
        foreach ($languages as $language) {
            $customMessages["names.$language.required"] = ucfirst($language) . " name is required.";
        }

        $validator = Validator::make($req->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $combo = Combo::find($req->id);
        $imageName = '';
        if($req->file('image')){
            $path = storage_path()."/app/public/" .@$combo->image;
            $result = File::exists($path);

            if($result)
            {
                File::delete($path);
            }

            $imageFile = $req->file('image');
            $imageName = '/combo/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/combo/'),$imageName);
        }else{
            $imageName = $combo->image;
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        Combo::where('id', $req->id)->update([
            'image' => $imageName,
            'food_type' => $req->food_type,
            'price' => $req->price,
            'status' => $req->status
        ]);

        $names = $req->names;
        foreach($resLangs as $resLang){
            $language = Language::where('id', $resLang->language_id)->first();
            ComboRestaurantLanguage::where('combo_id', $combo->id)
                                        ->where('restaurant_language_id', $resLang->id)
                                        ->update([
                                            'name' => $names[$language->name]
                                        ]);
        }
        $availableProIds = ComboProduct::where('combo_id', $req->id)->pluck('product_id')->toArray();
        $products = [];
        if (is_array($req->products)) {
            $products = $req->products;
            foreach($products as $product){
                if (!in_array($product, $availableProIds)) {
                    ComboProduct::create([
                        'combo_id' => $req->id,
                        'product_id' => $product,
                    ]);
                }
            }
        }
        ComboProduct::where('combo_id', $req->id)
            ->whereNotIn('product_id', $products)
            ->delete();

        return response()->json(['success'=>'Combo Updated Successfully.']);
    }

    public function deleteCombo(Request $req)
    {
        $combo = Combo::find($req->id);

        $path = storage_path()."/app/public/" .@$combo->image;
        $result = File::exists($path);

        if($result)
        {
            File::delete($path);
        }

        $combo->delete();
        return response()->json(['success'=>'Combo Deleted Successfully.']);
    }
}
