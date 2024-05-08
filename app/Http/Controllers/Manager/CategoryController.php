<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Helper\SettingHelper;
use App\Models\CategoryRestaurantLanguage;
use App\Models\Language;
use App\Models\RestaurantLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function getCategories(Request $req)
    {        
        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $langId)
                                ->where('restaurant_id', $restaurantId)
                                ->value('id');

        $categories = Category::with(['categoryRestaurantLanguages' => function ($query) use ($restaurantLanguageId, $req) {
            $query->where('restaurant_language_id', $restaurantLanguageId);
            $query->where('name', 'LIKE', '%' . $req->search . '%');
        }])->whereHas('categoryRestaurantLanguages',function($q) use ($req,$restaurantLanguageId){
            $q->where('restaurant_language_id',$restaurantLanguageId);
            $q->where('name','LIKE','%'.$req->search.'%');
        })->where('restaurant_id', $restaurantId)->get();

        $categories->transform(function ($category) use ($req) {
            $name = $category->categoryRestaurantLanguages->isEmpty() ? null : $category->categoryRestaurantLanguages->first()->name;
            return [
                'id' => $category->id,
                'image' => $category->image,
                'status' => $category->status,
                'type' => $category->type,
                'name' => $name,
            ];
        });

        return response()->json(['categories' => $categories]);
    }

    public function addCategory(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
        $rules['category_type'] = 'required';
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
            $directory = storage_path('app/public/category/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $imageFile = $req->file('image');
            $image_name = '/category/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/category/'),$image_name);
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        $cat = new Category();
        $cat->image = $image_name;
        $cat->restaurant_id = $restaurantId;
        $cat->added_by = Auth::user()->role;
        $cat->category_type = $req->category_type;
        $cat->added_by_id = Auth::user()->id;
        $cat->status = $req->status;
        if($cat->save()){
            $names = $req->names;
            foreach($resLangs as $resLang){
                $language = Language::where('id', $resLang->language_id)->first();
                $catResLang = new CategoryRestaurantLanguage();
                $catResLang->restaurant_language_id = $resLang->id;
                $catResLang->category_id = $cat->id;
                $catResLang->name = $names[$language->name];
                $catResLang->save();
            }
        }
        return response()->json(['success'=>'Category Added Successfully.']);
    }

    public function getCategory($id)
    {
        $category = Category::with('categoryRestaurantLanguages.restaurantLanguage')->select('id', 'image', 'category_type', 'status')->find($id);

        if ($category) {
            $transformedCategory = [
                'id' => $category->id,
                'image' => $category->image,
                'category_type' => $category->category_type,
                'status' => $category->status,
                'catRestLang' => $category->categoryRestaurantLanguages->map(function ($catRestLang) {
                    return [
                        'name' => $catRestLang->name,
                        'language_id' => $catRestLang->restaurantLanguage->language_id
                    ];
                }),
            ];

            return response()->json($transformedCategory);
        }
    }

    public function updateCategory(Request $req)
    {
        $rules = [];
        $languages = $req->language; 
        foreach ($languages as $language) {
            $rules["names.$language"] = 'required';
        }
        $rules['category_type'] = 'required';
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

        $category = Category::find($req->id);
        $imageName = '';
        if($req->file('image')){
            $path = storage_path()."/app/public/" .@$category->image;
            $result = File::exists($path);

            if($result)
            {
                File::delete($path);
            }

            $imageFile = $req->file('image');
            $imageName = '/category/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/category/'),$imageName);
        }else{
            $imageName = $category->image;
        }

        $restaurantId = CustomerHelper::getRestaurantId();
        $resLangs = RestaurantLanguage::where('restaurant_id', $restaurantId)
        ->get();

        Category::where('id', $req->id)->update([
            'image' => $imageName,
            'category_type' => $req->category_type,
            'status' => $req->status
        ]);

        $names = $req->names;
        foreach($resLangs as $resLang){
            $language = Language::where('id', $resLang->language_id)->first();
            CategoryRestaurantLanguage::where('category_id', $category->id)
                                        ->where('restaurant_language_id', $resLang->id)
                                        ->update([
                                            'name' => $names[$language->name]
                                        ]);
        }

        return response()->json(['success'=>'Category Updated Successfully.']);
    }

    public function deleteCategory(Request $req)
    {
        $category = Category::find($req->id);

        $path = storage_path()."/app/public/" .@$category->image;
        $result = File::exists($path);

        if($result)
        {
            File::delete($path);
        }

        $category->delete();
        return response()->json(['success'=>'SubCategory Deleted Successfully.']);
    }

    public function get_categories()
    {
        $lang_id = SettingHelper::managerLanguage();
        $categories = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereRestaurantId(Auth::user()->restaurant_id)->get();
        $category = [];
        foreach ($categories as $key => $cat) {
            $category[$cat->id] = $cat->categoryLanguages[0]->name;
        }
        return response()->json($category);
    }

    public function getCategoriesList()
    {
        $lang_id = SettingHelper::getlanguage();
        $restaurant_id = SettingHelper::getUserIdUsingQrcode();
        $restaurant_id = $restaurant_id ? $restaurant_id : Auth::user()->restaurant_id;
        // $category = Category::with(['categoryLanguages' => function($q) use ($lang_id){
        //     $q->where('language_id',$lang_id);
        // }])->whereRestaurantId($restaurant_id)->get();
        // return response()->json(['category' => $category]);
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $lang_id)
        ->where('restaurant_id', $restaurant_id)
        ->value('id');

        $categories = Category::with(['categoryRestaurantLanguages' => function ($query) use ($restaurantLanguageId) {
            $query->where('restaurant_language_id', $restaurantLanguageId);
        }])->whereHas('categoryRestaurantLanguages',function($q) use ($restaurantLanguageId){
            $q->where('restaurant_language_id',$restaurantLanguageId);
        })->where('restaurant_id', $restaurant_id)->get();

        $categories->transform(function ($category){
            $name = $category->categoryRestaurantLanguages->isEmpty() ? null : $category->categoryRestaurantLanguages->first()->name;
            return [
                'id' => $category->id,
                'image' => $category->image,
                'status' => $category->status,
                'type' => $category->type,
                'name' => $name,
            ];
        });

        return response()->json(['categories' => $categories]);
    }

    public function getCategoryList()
    {
        $lang_id = SettingHelper::managerLanguage();
        $category = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereRestaurantId(Auth::user()->restaurant_id)->get();
        return response()->json($category);
    }
}
