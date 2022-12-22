<?php

namespace App\Http\Controllers\Manager;

use App\Helper\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryLanguage;
use Illuminate\Http\Request;
use App\Models\Language;

class SubCategoryController extends Controller
{
    public function addSubCategory(Request $req)
    {
        $subCat = new SubCategory();
        $subCat->category_id = $req->category_id;
        $langs = Language::whereStatus(1)->get();
        if($subCat->save()){
            $name = explode(',',$req->name);
            foreach ($langs as $key => $lang) {
                $cat_lang = new SubCategoryLanguage();
                $cat_lang->sub_category_id = $subCat->id;
                $cat_lang->language_id = $lang->id;
                $cat_lang->name = $name[$lang->id];
                $cat_lang->save();
            }
        }

        return response()->json(['success'=>'Sub Category Added Successfully.']);
    }

    public function getSubCategories(Request $req)
    {
        $lang_id = SettingHelper::managerLanguage();
        $subCategories = Category::with(['categoryLanguages' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        },'subCategory.subCategoryLanguage' => function($q) use ($req,$lang_id){
            $q->where('name','LIKE','%'.$req->search.'%')->where('language_id',$lang_id);
        }])->whereHas('subCategory.subCategoryLanguage',function($q) use ($req,$lang_id){
            $q->where('name','LIKE','%'.$req->search.'%')->where('language_id',$lang_id);
        })->get();
        return response()->json($subCategories);
    }

    public function getSubCategory($id)
    {
        $subCategories = SubCategory::with('subCategoryLanguage')->find($id);
        return response()->json($subCategories);
    }

    public function updateSubCategory(Request $req)
    {
        $subCat = SubCategory::find($req->id);
        $subCat->category_id = $req->category_id;
         if($subCat->save()){
            $langs = Language::whereStatus(1)->get();
            $name = explode(',',$req->name);
            foreach ($langs as $key => $lang) {
                SubCategoryLanguage::where('sub_category_id',$req->id)->where('language_id',$lang->id)->update(['name'=>$name[$lang->id]]);
            }
        }

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
        $lang_id = SettingHelper::managerLanguage();

        $subCategories = SubCategory::with(['subCategoryLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->get();

        $subCat = [];
        foreach ($subCategories as $key => $sub) {
            $subCat[$sub->id] = $sub->subCategoryLanguage[0]->name;
        }

        return response()->json($subCat);
    }
}
