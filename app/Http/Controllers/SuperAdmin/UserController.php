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
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function createUser(Request $request)
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
            return redirect()->back()
                ->withErrors($validatedData->errors());
        }
        
        $userDetail = $request->all();
        $userDetail['password'] = Hash::make($request->password);
        $userDetail['lock_enable'] = $request->has('lock_enable') ? 1 : 0;

        $user = User::create($userDetail);
        return redirect()->route('super-admin.user', ['restaurant_id' => $user->restaurant_id])->with('success', 'User Create Successfully');
    }

    public function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if($user) {
            $user->delete();
            return redirect()->route('super-admin.user', ['restaurant_id' => $request->restaurant_id])->with('message', 'User Deleted Successfully');
        }
    }
}
