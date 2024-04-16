<?php

namespace App\Http\Controllers;

use App\Helper\SettingHelper;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return $this->redirectIfAuthenticated('manager.any');
    }

    public function manager($slug = '')
    {
        return $this->redirectToView('restaurant_manager', $slug, 'manager');
    }

    public function pos($slug = '')
    {
        return $this->redirectToView('pos', $slug, 'pos');
    }

    private function redirectIfAuthenticated($route)
    {
        if ($user = Auth::user()) {
            if ($user->restaurant) {
                $slug = $user->restaurant->slug;
                return redirect()->route($route, ['any' => $slug]);
            } else {
                Auth::logout();
            }
        }
        return view('login');
    }

    private function redirectToView($view, $slug, $route)
    {
        if ($user = Auth::user()) {
            if ($user->restaurant) {
                if($user->restaurant->slug == $slug)
                    return view($view);
                else
                    return redirect()->route($route . '.any', ['any' => $user->restaurant->slug]);
            } else {
                Auth::logout();
            }
        }
        return redirect()->route('login');
    }

    public function getUsers(){
        $roleWiseUsers = [];
        if($restaurant_id = Auth::user()->restaurant_id){
            $users = User::whereRestaurantId($restaurant_id)->get();

            foreach ($users as $user) {
                // Assuming 'role' is a column in your users table
                $role = $user->role;
                if (!isset($roleWiseUsers[$role])) {
                    $roleWiseUsers[$role] = [];
                }
                $roleWiseUsers[$role][] = $user;
            }
        }
        return response()->json(['users'=>$roleWiseUsers]);
    }
}
