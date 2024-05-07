<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Language;
use App\Models\Restaurant;
use App\Models\RestaurantLanguage;
use App\Models\SubcategoryRestaurantLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{

    public function getSubCategories(Request $req)
    {
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $langId)
                                ->where('restaurant_id', $restaurantId)
                                ->value('id');

        $subCategories = SubCategory::with(['subCategoryRestaurantLanguages' => function ($query) use ($restaurantLanguageId, $req) {
            $query->where('restaurant_language_id', $restaurantLanguageId);
            $query->where('name', 'LIKE', '%' . $req->search . '%');
        }, 'category'])->whereHas('subCategoryRestaurantLanguages',function($q) use ($req,$restaurantLanguageId){
            $q->where('restaurant_language_id',$restaurantLanguageId);
            $q->where('name','LIKE','%'.$req->search.'%');
        });

        if($req->category){
            $subCategories = $subCategories->where('category_id', $req->category);
        }
        
        
        $subCategories = $subCategories->where('restaurant_id', $restaurantId)->get();
        $subCategories->transform(function ($subCategory) use ($req) {

            $name = $subCategory->subCategoryRestaurantLanguages->isEmpty() ? null : $subCategory->subCategoryRestaurantLanguages->first()->name;
            $type = $subCategory->category ? $subCategory->category->category_type : 1;

            return [
                'id' => $subCategory->id,
                'image' => $subCategory->image,
                'status' => $subCategory->status,
                'type' => $type,
                'name' => $name,
            ];
        });

        return response()->json(['subCategories' => $subCategories]);
    }

    public function addSubCategory(Request $req)
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
            $directory = storage_path('app/public/sub_category/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            
            $imageFile = $req->file('image');
            $image_name = '/sub_category/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/sub_category/'),$image_name);
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        $subCat = new SubCategory();
        $subCat->image = $image_name;
        $subCat->restaurant_id = $restaurantId;
        $subCat->added_by = Auth::user()->role;
        $subCat->added_by_id = Auth::user()->id;
        $subCat->status = $req->status;
        $subCat->category_id = $req->category_id;
        if($subCat->save()){
            $names = $req->names;
            foreach($resLangs as $resLang){
                $language = Language::where('id', $resLang->language_id)->first();
                $subCatResLang = new SubcategoryRestaurantLanguage();
                $subCatResLang->restaurant_language_id = $resLang->id;
                $subCatResLang->sub_category_id = $subCat->id;
                $subCatResLang->name = $names[$language->name];
                $subCatResLang->save();
            }
        }
        return response()->json(['success'=>'Sub Category Added Successfully.']);
    }

    public function getSubCategory($id)
    {
        // $subCategories = SubCategory::with('subCategoryLanguage')->find($id);
        // return response()->json($subCategories);

        $subCategory = SubCategory::with('subCategoryRestaurantLanguages.restaurantLanguage')->select('id', 'image', 'status', 'category_id')->find($id);

        if ($subCategory) {
            $transformedSubCategory = [
                'id' => $subCategory->id,
                'image' => $subCategory->image,
                'status' => $subCategory->status,
                'categoryId' => $subCategory->category_id,
                'subCatRestLang' => $subCategory->subCategoryRestaurantLanguages->map(function ($subCatRestLang) {
                    return [
                        'name' => $subCatRestLang->name,
                        'language_id' => $subCatRestLang->restaurantLanguage->language_id
                    ];
                }),
            ];

            return response()->json($transformedSubCategory);
        }
    }

    public function updateSubCategory(Request $req)
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

        $subCategory = SubCategory::find($req->id);
        $imageName = '';
        if($req->file('image')){
            $path = storage_path()."/app/public/" .@$subCategory->image;
            $result = File::exists($path);

            if($result)
            {
                File::delete($path);
            }

            $imageFile = $req->file('image');
            $imageName = '/sub_category/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/sub_category/'),$imageName);
        }else{
            $imageName = $subCategory->image;
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        SubCategory::where('id', $req->id)->update([
            'image' => $imageName,
            'status' => $req->status,
            'category_id' => $req->category_id
        ]);

        $names = $req->names;
        foreach($resLangs as $resLang){
            $language = Language::where('id', $resLang->language_id)->first();
            SubCategoryRestaurantLanguage::where('sub_category_id', $subCategory->id)
                                        ->where('restaurant_language_id', $resLang->id)
                                        ->update([
                                            'name' => $names[$language->name]
                                        ]);
        }

        return response()->json(['success'=>'Sub Category Updated Successfully.']);
    }

    public function deleteSubCategory(Request $req)
    {
        $subCategory = SubCategory::find($req->id);

        $path = storage_path()."/app/public/" .@$subCategory->image;
        $result = File::exists($path);

        if($result)
        {
            File::delete($path);
        }

        $subCategory->delete();
        return response()->json(['success'=>'SubCategory Deleted Successfully.']);
    }

    public function getSubCategoriesList()
    {
        
        $restaurant_id = CustomerHelper::getRestaurantId();

        $lang_id = SettingHelper::managerLanguage();

        $subCategories = SubCategory::with(['subCategoryLanguage' => function ($query) use ($lang_id) {
            $query->where('language_id', $lang_id);
        }])->withCount('products')->where('restaurant_id', $restaurant_id)->get();

        $subCategories->transform(function ($subCategory) {
            $name = $subCategory->subCategoryLanguage->isEmpty() ? null : $subCategory->subCategoryLanguage->first()->name;
            return [
                'id' => $subCategory->id,
                'image' => $subCategory->image,
                'name' => $name,
                'product_count' => $subCategory->products_count
            ];
        });
        return response()->json(['sub_category' => $subCategories]);
    }

    public function get_Subcategories()
    {
        $lang_id = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();

        $subCategories = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereRestaurantId($restaurantId)->get();

        $subCat = [];
        foreach ($subCategories as $key => $sub) {
            $subCat[$sub->id] = $sub->subCategoryLanguage[0]->name;
        }

        return response()->json($subCat);
    }
}
