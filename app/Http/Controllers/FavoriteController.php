<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{
    public function getWishlist(Request $req)
    {
        $wishlist = Product::whereIn('id',$req->wishlist)->get();

        return response()->json($wishlist);
    }
}
