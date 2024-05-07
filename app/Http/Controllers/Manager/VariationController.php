<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Helper\SettingHelper;
use App\Models\VariationRestaurantLanguage;
use App\Models\Variation;
use App\Models\Language;
use App\Models\RestaurantLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VariationController extends Controller
{
    public function getVariations(Request $req)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $langId)
                                ->where('restaurant_id', $restaurantId)
                                ->value('id');

        $variations = Variation::with(['variationRestaurantLanguages' => function ($query) use ($restaurantLanguageId, $req) {
            $query->where('restaurant_language_id', $restaurantLanguageId);
            $query->where('name', 'LIKE', '%' . $req->search . '%');
        }])->whereHas('variationRestaurantLanguages',function($q) use ($req,$restaurantLanguageId){
            $q->where('restaurant_language_id',$restaurantLanguageId);
            $q->where('name','LIKE','%'.$req->search.'%');
        })->where('restaurant_id', $restaurantId)->get();

        $variations->transform(function ($variation) use ($req) {
            $name = $variation->variationRestaurantLanguages->isEmpty() ? null : $variation->variationRestaurantLanguages->first()->name;
            return [
                'id' => $variation->id,
                'image' => $variation->image,
                'status' => $variation->status,
                'name' => $name,
            ];
        });

        return response()->json(['variations' => $variations]);
    }

    public function addVariation(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
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
            $directory = storage_path('app/public/variation/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $imageFile = $req->file('image');
            $image_name = '/variation/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/variation/'),$image_name);
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        $ing = new Variation();
        $ing->image = $image_name;
        $ing->restaurant_id = $restaurantId;
        $ing->added_by = Auth::user()->role;
        $ing->added_by_id = Auth::user()->id;
        $ing->status = $req->status;
        if($ing->save()){
            $names = $req->names;
            foreach($resLangs as $resLang){
                $language = Language::where('id', $resLang->language_id)->first();
                $ingResLang = new VariationRestaurantLanguage();
                $ingResLang->restaurant_language_id = $resLang->id;
                $ingResLang->variation_id = $ing->id;
                $ingResLang->name = $names[$language->name];
                $ingResLang->save();
            }
        }
        return response()->json(['success'=>'Variation Added Successfully.']);
    }

    public function getVariation($id)
    {
        $variation = Variation::with('variationRestaurantLanguages.restaurantLanguage')->select('id', 'image', 'status')->find($id);

        if ($variation) {
            $transformedVariation = [
                'id' => $variation->id,
                'image' => $variation->image,
                'status' => $variation->status,
                'ingRestLang' => $variation->variationRestaurantLanguages->map(function ($ingRestLang) {
                    return [
                        'name' => $ingRestLang->name,
                        'language_id' => $ingRestLang->restaurantLanguage->language_id
                    ];
                }),
            ];

            return response()->json($transformedVariation);
        }
    }

    public function updateVariation(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
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

        $variation = Variation::find($req->id);
        $imageName = '';
        if($req->file('image')){
            $path = storage_path()."/app/public/" .@$variation->image;
            $result = File::exists($path);

            if($result)
            {
                File::delete($path);
            }

            $imageFile = $req->file('image');
            $imageName = '/variation/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/variation/'),$imageName);
        }else{
            $imageName = $variation->image;
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        Variation::where('id', $req->id)->update([
            'image' => $imageName,
            'status' => $req->status
        ]);

        $names = $req->names;
        foreach($resLangs as $resLang){
            $language = Language::where('id', $resLang->language_id)->first();
            VariationRestaurantLanguage::where('variation_id', $variation->id)
                                        ->where('restaurant_language_id', $resLang->id)
                                        ->update([
                                            'name' => $names[$language->name]
                                        ]);
        }

        return response()->json(['success'=>'Variation Updated Successfully.']);
    }

    public function deleteVariation(Request $req)
    {
        $variation = Variation::find($req->id);

        $path = storage_path()."/app/public/" .@$variation->image;
        $result = File::exists($path);

        if($result)
        {
            File::delete($path);
        }

        $variation->delete();
        return response()->json(['success'=>'Variation Deleted Successfully.']);
    }
}
