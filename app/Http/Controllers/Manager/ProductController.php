<?php

namespace App\Http\Controllers\Manager;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addSubCategory(Request $req)
    {
        $pro = new Product();
        $pro->name = $req->name;
        $pro->price = $req->price;
        $pro->sub_category_id = $req->sub_category_id;
        $pro->save();

        return response()->json(['success'=>'Product Added Successfully.']);
    }

    public function getCategoryProduct($id)
    {
        $lang_id = SettingHelper::getlanguage();
        $products = Category::with(['subCategory' => function($q){
            $q->whereHas('products');
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
        $sub_product = SubCategory::with(['products' => function($q) use ($req){
            $q->where('name','LIKE','%'.$req->search.'%');
        }])->whereHas('products',function($q) use ($req){
            $q->where('name','LIKE','%'.$req->search.'%');
        })->get();
        return response()->json($sub_product);
    }

    public function editProduct($id){
        $products = Product::find($id);
        return response()->json($products);
    }

    public function updateProduct(Request $req)
    {
        $pro = Product::find($req->id);
        $pro->name = $req->name;
        $pro->price = $req->price;
        $pro->sub_category_id = $req->sub_category_id;
        $pro->save();

        return response()->json(['success'=>'Product Updated Successfully.']);
    }

    public function deleteProduct(Request $req)
    {
        Product::find($req->id)->delete();
        return response()->json(['success'=>'Product Deleted Successfully.']);
    }

}
