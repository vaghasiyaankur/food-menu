<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $restaurantId = $request->input('restaurant_id');
            $data = User::where('restaurant_id', $restaurantId)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($userRow){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm editUser" data-id="' . $userRow->id . '" style="margin-right: 10px;">Edit</a>';
                    $btn .= '<a href="'.route('user.delete').'" class="delete btn btn-danger btn-sm deleteUser">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function editUser(User $user)
    {
        if($user) {
            $userResponse = [
                'status'    =>  true,
                'user'      =>  $user
            ];
            return response()->json($userResponse);
        }
    }

    public function userCreateUpdate(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name'          =>  'required',
            'email'         =>  'required|email',
            'mobile_number' =>  'required|digits:10',
            'password'      =>  'required|confirmed',
            'role'          =>  'required',
            'lock_pin'      =>  'required|digits:4'
        ]);
        
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 422);
        }
        
        $userDetail = $request->all();

        if (is_null($userDetail['user_id'])) {
            unset($userDetail['user_id']);
        }

        $userDetail['password'] = Hash::make($request->password);
        $userDetail['lock_enable'] = $request->has('lock_enable') ? 1 : 0;
        unset($userDetail['confirm_password']);

        User::updateOrCreate(['id' => $request->user_id], $userDetail);
        return response()->json([
            'success'   =>  'Changes Save Successfully.',
            'status'    =>  true
        ], 200);
    }

    public function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if($user) {
            $user->delete();
            return redirect()->route('super-admin.user', ['restaurant_id' => $request->restaurant_id]);
        }
    }
}
