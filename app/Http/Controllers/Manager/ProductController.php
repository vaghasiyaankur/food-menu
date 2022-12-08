<?php

namespace App\Http\Controllers\Manager;

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

        return response()->json(['sucess'=>'Product Added Sucessfully.']);
    }

    public function getCategoryProduct($id)
    {
        $products = Category::with(['subCategory' => function($q){
            $q->whereHas('products');
        },'subCategory.products'])->whereHas('subCategory')->find($id);
        return response()->json($products);
    }

    public function getProducts(Request $req)
    {
        $sub_product = SubCategory::with(['products' => function($q) use ($req){
            $q->where('name','LIKE','%'.$req->search.'%');
        }])->whereHas('products')->get();
        return response()->json($sub_product);
    }
}