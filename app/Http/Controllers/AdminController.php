<?php

namespace App\Http\Controllers;

use App\Helper\SettingHelper;
use App\Http\Requests\UserRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin(){
        
        return view('admin');
    }
}
