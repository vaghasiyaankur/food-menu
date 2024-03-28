<?php

namespace App\Http\Controllers\Manager;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductLanguage;
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

    public function getProducts(Request $req)
    {
        $lang_id = SettingHelper::managerLanguage();

        $categoryId = $req->categoryId != 0 ? intval($req->categoryId) : '';

        $category_name = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->find($req->categoryId);

        $subCategories = Category::with(['CategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->where('category_id',$req->categoryId)->get();
        $subCategory = [];
        foreach ($subCategories as $key => $sub_category) {
            $subCategory[$sub_category->id] = $sub_category->categoryLanguage[0]->name;
        }

        $sub_product = Category::with(['categoryLanguage' => function($q) use ($lang_id){
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
        })->whereHas('products');

        if ($categoryId) {
            $sub_product = $sub_product->whereCategoryId($categoryId);
        }

        $sub_product = $sub_product->whereRestaurantId(Auth::user()->restaurant_id)->paginate(6);

        return response()->json(['sub_category_product' => $sub_product,'sub_category' => $subCategory,'category_name' =>  $category_name]);
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

    public function getCategoryWiseProduct($id)
    {
        $lang_id = SettingHelper::managerLanguage();
        $products = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereRestaurantId(Auth::user()->restaurant_id)->find($id);
        return response()->json($products);
    }

}
