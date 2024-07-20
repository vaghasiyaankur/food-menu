<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    public function getRestaurants(Request $request)
    {
        if($request->ajax()) {
            $restaurantList = Restaurant::all();

            return DataTables::of($restaurantList)
                ->addIndexColumn()
                ->addColumn('action', function($restaurantRow) {
                    $userRoute = route('super-admin.user', ['restaurant_id' => $restaurantRow->id]);
                    $branchRoute = route('super-admin.branch', ['restaurant_id' => $restaurantRow->id]);
                    $btn = '<a href="'.$userRoute.'" class="user btn btn-warning btn-sm text-white fw-bolder" style="margin-right: 10px;">Users</a>';
                    $btn .= '<a href="'.$branchRoute.'" class="branch btn btn-info btn-sm text-white fw-bolder">Branch</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getBranch(Request $request)
    {
        if($request->ajax()) {
            $restaurantId = $request->input('restaurant_id');
            $branchList = Branch::whereRestaurantId($restaurantId)->get();

            return DataTables::of($branchList)
                ->addIndexColumn()
                ->addColumn('action', function($branchRow) {
                    $deleteRoute = route('branch.delete');
                    $btn = '<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#backDropModal" class="user btn btn-info btn-sm text-white fw-bolder" style="margin-right: 10px;">Edit</a>';
                    $btn .= '<a href="'.$deleteRoute.'" class="branch btn btn-danger btn-sm text-white fw-bolder deleteBranch">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function createBranch(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'branch_name'   =>  'required',
            'owner_name'    =>  'required|string',
            'email'         =>  'required|email',
            'mobile_number' =>  'required'
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData->errors());
        }

        $image_name = '';
        if($request->file('logo')){
            $directory = storage_path('app/public/branch_logo/');

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $imageFile = $request->file('logo');
            $image_name = 'branch_logo/'.rand(10000000,99999999).".".$imageFile->GetClientOriginalExtension();
            $imageFile->move(storage_path('app/public/branch_logo/'),$image_name);
        }

        $branchFormData = $request->all();
        $branchFormData['logo'] = $image_name;

        $branch = Branch::create($branchFormData);
        return redirect()->route('super-admin.branch', ['restaurant_id' => $branch->restaurant_id])->with('success', 'Branch Create Successfully');
    }

    public function deleteBranch(Request $request)
    {
        $branch = Branch::findOrFail($request->branch_id);
        if($branch) {
            $branch->delete();
            return redirect()->route('super-admin.branch', ['restaurant_id' => $request->restaurant_id])->with('message', 'Branch Deleted Successfully');
        }
    }
}
