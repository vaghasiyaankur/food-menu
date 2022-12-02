<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
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

        $cat = new Category();
        $cat->name = $req->name;
        $cat->image = $image_name;
        $cat->save();

        return response()->json($cat);

    }
}
