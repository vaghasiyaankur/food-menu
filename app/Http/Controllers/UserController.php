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
        return view('auth');
    }

    public function signup()
    {
        $test = '1234';
        return view('signup', ['test' => $test]);
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

    public function getUsers(Request $request){
        $restaurant_id = auth()->user()->restaurant_id; // Use a consistent method to retrieve restaurant_id
        $search = $request->input('search', '');
        $filter = $request->input('filter', '');
        $type = $request->input('type', ''); // Assuming you're passing 'type' in the request

        $usersQuery = User::whereRestaurantId($restaurant_id);

        $usersQuery->when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });

        $usersQuery->when($filter, function ($query, $filter) {
            return $query->where('role', $filter);
        });

        $users = $type === 'admin-user' ? $usersQuery->paginate(10) : $usersQuery->get();

        $roleWiseUsers['all'] = $users;

        if ($type !== 'admin-user') {
            foreach ($users as $user) {
                $roleWiseUsers[$user->role][] = $user;
            }
        }

        return response()->json(['users' => $roleWiseUsers]);
    }

    public function saveUserData(UserRequest $request) {
        $data = $request->toArray();
        $data['lock_enable'] = isset($data['lock_enable']) && $data['lock_enable'] == 'on' ? 1 : 0;
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

    public function changeSimulation($id) {
        if($id) {
            Auth::loginUsingId($id);
            return response()->json([
                'status' => true,
                'success'   =>  'User Simulation Changes Successfully.'
            ], 200);
        }
    }

    public function logout() {
        Auth::logout();
        return response()->json([
            'status' => true,
            'success'   =>  'User logout successfully.'
        ], 200);
    }

}
