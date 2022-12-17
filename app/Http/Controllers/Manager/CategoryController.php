<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use File;
use App\Helper\SettingHelper;
use App\Models\CategoryLanguage;
use Validator;

class CategoryController extends Controller
{
    public function getCategories(Request $req)
    {
        $lang_id = SettingHelper::systemLang();
        $categories = Category::with(['categoryLanguages' => function($q) use ($req,$lang_id){
            $q->where('language_id',$lang_id);
            $q->where('name','LIKE','%'.$req->search.'%');
        }])->get();
        return response()->json($categories);
    }

    public function addCategory(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'image' => 'required',
        ]);
         if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 401);
        }

        $image_name = '';
        if($req->file('image')){
            $validatorimage = Validator::make($req->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                ]
            );

            if ($validatorimage->fails()) {
                return response()->json(['error' => $validatorimage->messages()], 401);
            }

            $imageFile = $req->file('image');
            $image_name = '/category/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/category/'),$image_name);
        }
        $name = explode(',',$req->name);
        $cat = new Category();
        $cat->image = $image_name;
        if($cat->save()){
            for ($i=1; $i < count($name); $i++) {
                $cat_lang = new CategoryLanguage();
                $cat_lang->category_id = $cat->id;
                $cat_lang->language_id = $i;
                $cat_lang->name = $name[$i];
                $cat_lang->save();
            }
        }

        return response()->json(['success'=>'category Added Successfully.']);

    }

    public function getCategory($id)
    {
        $category = Category::with('categoryLanguages')->find($id);
        return response()->json($category);
    }

    public function updateCategory(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'image' => 'required',
        ]);
         if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 401);
        }
        $category = Category::find($req->id);
        $image_name = '';
        if($req->file('image')){
            $validatorimage = Validator::make($req->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                ]
            );

            if ($validatorimage->fails()) {
                return response()->json(['error' => $validatorimage->messages()], 401);
            }

            $path = storage_path()."/app/public/" .@$category->image;
            $result = File::exists($path);

            if($result)
            {
                File::delete($path);
            }

            $imageFile = $req->file('image');
            $image_name = '/category/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/category/'),$image_name);
        }else if($req->image){
            $image_name = $req->image;
        }

        $name = explode(',',$req->name);
        $category->image = $image_name;

        if($category->save()){
            for ($i=1; $i < count($name); $i++) {
                CategoryLanguage::where('category_id',$req->id)->where('language_id',$i)->update(['name'=>$name[$i]]);
            }
        }

        return response()->json(['success'=>'category Updated Successfully.']);
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
        return response()->json(['success'=>'category Deleted Successfully.']);
    }

    public function get_categories()
    {
        $category = Category::pluck('name','id');
        return response()->json($category);
    }

    public function getCategoriesList()
    {
        $category = Category::whereHas('subCategory.products')->get();
        return response()->json($category);
    }
}
