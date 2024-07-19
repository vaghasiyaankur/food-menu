<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
            $branchList = Branch::all();

            return DataTables::of($branchList)
                ->addIndexColumn()
                ->addColumn('action', function($branchRow) {
                    $userRoute = route('super-admin.user', ['branch_id' => $branchRow->id]);
                    $branchRoute = route('super-admin.branch', ['branch_id' => $branchRow->id]);
                    $btn = '<a href="'.$userRoute.'" class="user btn btn-warning btn-sm text-white fw-bolder" style="margin-right: 10px;">Users</a>';
                    $btn .= '<a href="'.$branchRoute.'" class="branch btn btn-info btn-sm text-white fw-bolder">Branch</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function createBranch(Request $request)
    {
        dd($request);
    }
}
