<?php

namespace App\Http\Controllers\Manager;

use App\Helper\SettingHelper;
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

        return response()->json(['success'=>'Sub Category Added Successfully.']);
    }

    public function getSubCategories(Request $req)
    {
        $lang_id = SettingHelper::systemLang();
        $subCategories = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },'subCategory' => function($q) use ($req,$lang_id){
            $q->where('name','LIKE','%'.$req->search.'%')->where('language_id',$lang_id);
        }])->whereHas('subCategory',function($q) use ($req,$lang_id){
            $q->where('name','LIKE','%'.$req->search.'%')->where('language_id',$lang_id);
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

        return response()->json(['success'=>'Sub Category Updated Successfully.']);
    }

    public function deleteSubCategory(Request $req)
    {
        $subCat = SubCategory::find($req->id);

        $subCat->delete();

        return response()->json(['success'=>'Sub Category Deleted Successfully.']);
    }

    public function get_Subcategories()
    {
        $subCat = SubCategory::pluck('name','id');

        return response()->json($subCat);
    }
}
