<?php

namespace App\Http\Controllers\Manager;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductLanguage;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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
        $products = Category::with(['subCategory' => function($q){
            $q->whereHas('products');
        },
        'subCategory.products' => function($q){
            $q->whereHas('productLanguage');
        },
        'subCategory.subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'subCategory.products.productLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereHas('subCategory')->find($id);
        return response()->json($products);
    }

    public function getProducts(Request $req)
    {
        $lang_id = SettingHelper::managerLanguage();
        $sub_product = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },
        'products' => function($q) use ($req,$lang_id) {
            $q->whereHas('productLanguage',function($q) use ($req,$lang_id){
                $q->where('language_id',$lang_id);
                $q->where('name','LIKE','%'.$req->search.'%');
            });
        },'products.productLanguage'
        ])
        ->whereHas('products.productLanguage',function($q) use ($req,$lang_id){
            $q->where('language_id',$lang_id);
            $q->where('name','LIKE','%'.$req->search.'%');
        })
        ->whereHas('subCategoryLanguage')->whereHas('products')->get();
        return response()->json($sub_product);
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

}
