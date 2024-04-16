<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductLanguage;
use App\Models\RestaurantLanguage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addProduct(Request $req)
    {
        $pro = new Product();
        $pro->price = $req->price;
        $pro->sub_category_id = $req->sub_category_id;
        $langs = Language::whereStatus(1)->get();
        if($pro->save()){
            $name = explode(',',$req->name);
            foreach ($langs as $key => $lang) {
                $pro_lang = new ProductLanguage();
                $pro_lang->product_id = $pro->id;
                $pro_lang->language_id = $lang->id;
                $pro_lang->name = $name[$lang->id];
                $pro_lang->save();
            }
        }

        return response()->json(['success'=>'Product Added Successfully.']);
    }

    public function getCategoryProduct($id)
    {
        $lang_id = SettingHelper::getlanguage();
        $restaurant_id = SettingHelper::getUserIdUsingQrcode();
        $restaurant_id = $restaurant_id ? $restaurant_id : Auth::user()->restaurant_id;
        $products = Category::with(['subCategory' => function($q) use($restaurant_id){
            $q->where('restaurant_id', $restaurant_id)->whereHas('products');
        },
        'subCategory.products' => function($q) use($restaurant_id){
            $q->where('restaurant_id', $restaurant_id)->whereHas('productLanguage');
        },
        'subCategory.subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'subCategory.products.productLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereRestaurantId($restaurant_id)->find($id);

        return response()->json($products);
    }

    public function getProductss(Request $req)
    {
        $lang_id = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();

        $categoryId = $req->categoryId != 0 ? intval($req->categoryId) : '';
        $subcategoryId = $req->subcategoryId != 0 ? intval($req->subcategoryId) : '';

        $category_name = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->find($req->categoryId);

        $subCategories = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->where('category_id',$req->categoryId)->get();
        $subCategory = [];
        foreach ($subCategories as $key => $sub_category) {
            $subCategory[$sub_category->id] = $sub_category->subCategoryLanguage[0]->name;
        }

        $sub_product = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'products' => function($q) use ($req,$lang_id) {
            $q->whereHas('productLanguage',function($q) use ($req,$lang_id){
                $q->where('language_id',$lang_id);
                $q->where('name','LIKE','%'.$req->search.'%');
            });
        },'products.productLanguage'])
        ->whereHas('products.productLanguage',function($q) use ($req,$lang_id){
            $q->where('language_id',$lang_id);
            $q->where('name','LIKE','%'.$req->search.'%');
        })
        ->whereHas('subCategoryLanguage')->whereHas('products');

        if ($categoryId) {
            $sub_product = $sub_product->whereCategoryId($categoryId);
        }

        if ($subcategoryId) {
            $sub_product = $sub_product->whereId($subcategoryId);
        }

        $sub_product = $sub_product->whereRestaurantId($restaurantId)->paginate(6);

        return response()->json(['sub_category_product' => $sub_product,'sub_category' => $subCategory,'category_name' =>  $category_name]);
    }

    public function getProducts(Request $req){

        $langId = SettingHelper::managerLanguage();
        $restaurantId = CustomerHelper::getRestaurantId();
        $restaurantLanguageId = RestaurantLanguage::where('language_id', $langId)
                                ->where('restaurant_id', $restaurantId)
                                ->value('id');

        $products = Product::with(['productRestaurantLanguages' => function ($query) use ($restaurantLanguageId, $req) {
            $query->where('restaurant_language_id', $restaurantLanguageId);
            $query->where('name', 'LIKE', '%' . $req->search . '%');
        }, 'subCategory'])->whereHas('productRestaurantLanguages',function($q) use ($req,$restaurantLanguageId){
            $q->where('restaurant_language_id',$restaurantLanguageId);
            $q->where('name','LIKE','%'.$req->search.'%');
        });

        if($req->subCategory){
            $products = $products->where('sub_category_id', $req->subCategory);
        }
        
        if($req->category){
            $products = $products->whereHas('subCategory',function($q) use ($req){
                $q->where('category_id', $req->category);
            });
        }
        
        $products = $products->where('restaurant_id', $restaurantId)->get();

        $products->transform(function ($category) use ($req) {
            $name = $category->productRestaurantLanguages->isEmpty() ? null : $category->productRestaurantLanguages->first()->name;
            return [
                'id' => $category->id,
                'image' => $category->image,
                'status' => $category->status,
                'type' => $category->type,
                'name' => $name,
            ];
        });

        return response()->json(['products' => $products]);


        $restaurant_id = CustomerHelper::getRestaurantId();
        
        $lang_id = SettingHelper::managerLanguage();

        $products = Product::with(['productLanguage' => function ($query) use ($lang_id) {
            $query->where('language_id', $lang_id);
        }]);
        
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $products->whereHas('productLanguage', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->subCatId) {
            $subCatId = $request->subCatId;
            $products = $products->where('sub_category_id', $subCatId);
        }

        $products = $products->where('restaurant_id', $restaurant_id)->get();
        $products->transform(function ($product) {
            $name = $product->productLanguage->isEmpty() ? null : $product->productLanguage->first()->name;
            return [
                'id' => $product->id,
                'price' => number_format($product->price, 2),
                'food_type' => $product->food_type,
                'name' => $name,
                'image' => $product->image,
            ];
        });
        $productCount = $products->count();
        return response()->json(['products' => $products, 'count'=>$productCount]);
    }

    public function editProduct($id){
        $products = Product::with('productLanguage')->find($id);
        return response()->json($products);
    }

    public function updateProduct(Request $req)
    {
        $pro = Product::find($req->id);
        $pro->price = $req->price;
        $pro->sub_category_id = $req->sub_category_id;
        $name = explode(',',$req->name);
        $langs = Language::whereStatus(1)->get();
        if($pro->save()){
            foreach ($langs as $key => $lang) {
                productLanguage::where('product_id',$req->id)->where('language_id',$lang->id)->update(['name'=>$name[$lang->id]]);
            }
        }

        return response()->json(['success'=>'Product Updated Successfully.']);
    }

    public function deleteProduct(Request $req)
    {
        $product = Product::find($req->id);
        $product->delete();
        return response()->json(['success'=>'Product Deleted Successfully.']);
    }

    public function getSubCategoryProduct($id)
    {
        $lang_id = SettingHelper::managerLanguage();
        $subCategories = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereCategoryId($id)->whereUserId(Auth::id())->get();
        $subCategory = [];
        foreach ($subCategories as $key => $sub_category) {
            $subCategory[$sub_category->id] = $sub_category->subCategoryLanguage[0]->name;
        }

        $products = Product::with('productLanguage')->get();

        return response()->json(['sub_category' => $subCategory]);
    }

    public function getCategoryWiseProduct($id)
    {
        $lang_id = SettingHelper::managerLanguage();
        $products = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereRestaurantId(Auth::user()->restaurant_id)->find($id);
        return response()->json($products);
    }

    public function getSubcategoryWiseProduct($subCatId){

        $restaurant_id = CustomerHelper::getRestaurantId();
        
        $lang_id = SettingHelper::managerLanguage();

        $products = Product::with(['productLanguage' => function ($query) use ($lang_id) {
            $query->where('language_id', $lang_id);
        }]);
        
        if($subCatId){
            $products = $products->where('sub_category_id', $subCatId);
        }

        $products = $products->where('restaurant_id', $restaurant_id)->get();
        $products->transform(function ($product) {
            $name = $product->productLanguage->isEmpty() ? null : $product->productLanguage->first()->name;
            return [
                'id' => $product->id,
                'price' => number_format($product->price, 2),
                'food_type' => $product->food_type,
                'name' => $name,
                'image' => $product->image,
            ];
        });
        $productCount = $products->count();
        return response()->json(['products' => $products, 'count'=>$productCount]);
    }


}
