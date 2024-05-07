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
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
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
            $roleWiseUsers['all'] = $users;

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

    public function saveUserData(UserRequest $request) {
        $data = $request->toArray();
        $data['lock_enable'] = $data['lock_enable'] ?? 0;
        $data['restaurant_id'] = Auth::user()->restaurant_id;
        $data['password'] = $data['password'] ? Hash::make($data['password']) : '';

        if (isset($data['id']) && $data['id'] != '' && $data['password'] == '') {
            unset($data['password']);
        }
        unset($data['confirm_password']);

        User::updateOrCreate(['id' => $data['id']], $data);

        return response()->json(['success' => "User changes added successfully."]);
    }

    public function deleteUserData(User $user) {
        $user->delete();
        return response()->json(['success' => "User deleted successfully."]);
    }

}
