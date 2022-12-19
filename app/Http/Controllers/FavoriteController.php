<?php

namespace App\Http\Controllers;

use App\Helper\SettingHelper;
use App\Models\Product;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{
    public function getWishlist(Request $req)
    {
        $wishlist = $req->wishlist != null ? $req->wishlist : [];

        $lang_id = SettingHelper::getlanguage();

        $wishlist = Product::with(['productLanguage' => function($q) use ($lang_id){
            $q->where('language_id',$lang_id);
        }])->whereIn('id',$wishlist)->get();

        return response()->json($wishlist);
    }
}
