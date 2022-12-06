<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function addSubCategory(Request $req)
    {
        $subCat = new SubCategory();
        $subCat->name = $req->name;
        $subCat->category_id = $req->category_id;
        $subCat->save();

        return response()->json(['sucess'=>'category Added Sucessfully.']);
    }

    public function getSubCategories(Request $req)
    {
        $subCategories = Category::with(['subCategory' => function($q) use ($req){
            $q->where('name','LIKE','%'.$req->search.'%');
        }])->whereHas('subCategory',function($q) use ($req){
            $q->where('name','LIKE','%'.$req->search.'%');
        })->get();
        return response()->json($subCategories);
    }

    public function getSubCategory($id)
    {
        $subCategories = SubCategory::find($id);
        return response()->json($subCategories);
    }

    public function updateSubCategory(Request $req)
    {
        $subCat = SubCategory::find($req->id);
        $subCat->name = $req->name;
        $subCat->category_id = $req->category_id;
        $subCat->save();

        return response()->json(['sucess'=>'category Updated Sucessfully.']);
    }

    public function deleteSubCategory(Request $req)
    {
        $subCat = SubCategory::find($req->id);

        $subCat->delete();

        return response()->json(['sucess'=>'category Deleted Sucessfully.']);
    }

    public function get_Subcategories()
    {
        $subCat = SubCategory::pluck('name','id');

        return response()->json($subCat);
    }
}
