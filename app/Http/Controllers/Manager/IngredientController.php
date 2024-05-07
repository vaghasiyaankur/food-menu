<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Helper\SettingHelper;
use App\Models\IngredientRestaurantLanguage;
use App\Models\Ingredient;
use App\Models\Language;
use App\Models\RestaurantLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IngredientController extends Controller
{
    public function getIngredients(Request $req)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $langId)
                                ->where('restaurant_id', $restaurantId)
                                ->value('id');

        $ingredients = Ingredient::with(['ingredientRestaurantLanguages' => function ($query) use ($restaurantLanguageId, $req) {
            $query->where('restaurant_language_id', $restaurantLanguageId);
            $query->where('name', 'LIKE', '%' . $req->search . '%');
        }])->whereHas('ingredientRestaurantLanguages',function($q) use ($req,$restaurantLanguageId){
            $q->where('restaurant_language_id',$restaurantLanguageId);
            $q->where('name','LIKE','%'.$req->search.'%');
        })->where('restaurant_id', $restaurantId)->get();

        $ingredients->transform(function ($ingredient) use ($req) {
            $name = $ingredient->ingredientRestaurantLanguages->isEmpty() ? null : $ingredient->ingredientRestaurantLanguages->first()->name;
            return [
                'id' => $ingredient->id,
                'image' => $ingredient->image,
                'status' => $ingredient->status,
                'price' => $ingredient->price,
                'type' => $ingredient->type,
                'name' => $name,
            ];
        });

        return response()->json(['ingredients' => $ingredients]);
    }

    public function addIngredient(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
        $rules['type'] = 'required';
        $rules['price'] = 'required';
        $rules['status'] = 'required';
        $rules['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg,webp';

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
            $directory = storage_path('app/public/ingredient/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $imageFile = $req->file('image');
            $image_name = '/ingredient/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/ingredient/'),$image_name);
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        $ing = new Ingredient();
        $ing->image = $image_name;
        $ing->restaurant_id = $restaurantId;
        $ing->added_by = Auth::user()->role;
        $ing->type = $req->type;
        $ing->price = $req->price;
        $ing->added_by_id = Auth::user()->id;
        $ing->status = $req->status;
        if($ing->save()){
            $names = $req->names;
            foreach($resLangs as $resLang){
                $language = Language::where('id', $resLang->language_id)->first();
                $ingResLang = new IngredientRestaurantLanguage();
                $ingResLang->restaurant_language_id = $resLang->id;
                $ingResLang->ingredient_id = $ing->id;
                $ingResLang->name = $names[$language->name];
                $ingResLang->save();
            }
        }
        return response()->json(['success'=>'Ingredient Added Successfully.']);
    }

    public function getIngredient($id)
    {
        $ingredient = Ingredient::with('ingredientRestaurantLanguages.restaurantLanguage')->select('id', 'image', 'type', 'price', 'status')->find($id);

        if ($ingredient) {
            $transformedIngredient = [
                'id' => $ingredient->id,
                'image' => $ingredient->image,
                'type' => $ingredient->type,
                'price' => $ingredient->price,
                'status' => $ingredient->status,
                'ingRestLang' => $ingredient->ingredientRestaurantLanguages->map(function ($ingRestLang) {
                    return [
                        'name' => $ingRestLang->name,
                        'language_id' => $ingRestLang->restaurantLanguage->language_id
                    ];
                }),
            ];

            return response()->json($transformedIngredient);
        }
    }

    public function updateIngredient(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
        $rules['type'] = 'required';
        $rules['price'] = 'required';
        $rules['status'] = 'required';
        if($req->file('image')){
            $rules['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg,webp';
        }

        $customMessages = [];
        foreach ($languages as $language) {
            $customMessages["names.$language.required"] = ucfirst($language) . " name is required.";
        }

        $validator = Validator::make($req->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ingredient = Ingredient::find($req->id);
        $imageName = '';
        if($req->file('image')){
            $path = storage_path()."/app/public/" .@$ingredient->image;
            $result = File::exists($path);

            if($result)
            {
                File::delete($path);
            }

            $imageFile = $req->file('image');
            $imageName = '/ingredient/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/ingredient/'),$imageName);
        }else{
            $imageName = $ingredient->image;
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        Ingredient::where('id', $req->id)->update([
            'image' => $imageName,
            'type' => $req->type,
            'price' => $req->price,
            'status' => $req->status
        ]);

        $names = $req->names;
        foreach($resLangs as $resLang){
            $language = Language::where('id', $resLang->language_id)->first();
            IngredientRestaurantLanguage::where('ingredient_id', $ingredient->id)
                                        ->where('restaurant_language_id', $resLang->id)
                                        ->update([
                                            'name' => $names[$language->name]
                                        ]);
        }

        return response()->json(['success'=>'Ingredient Updated Successfully.']);
    }

    public function deleteIngredient(Request $req)
    {
        $ingredient = Ingredient::find($req->id);

        $path = storage_path()."/app/public/" .@$ingredient->image;
        $result = File::exists($path);

        if($result)
        {
            File::delete($path);
        }

        $ingredient->delete();
        return response()->json(['success'=>'Ingredient Deleted Successfully.']);
    }
}
