<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Helper\ImageHelper;
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
                    $btn = '<a href="javascript:void(0)" data-id="' . $branchRow->id . '" class="user btn btn-info btn-sm text-white fw-bolder editBranch" style="margin-right: 10px;">Edit</a>';
                    $btn .= '<a href="'.$deleteRoute.'" class="branch btn btn-danger btn-sm text-white fw-bolder deleteBranch">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function createUpdateBranch(Request $request)
    {
        $rules = [
            'branch_name'   =>  'required',
            'owner_name'    =>  'required|string',
            'email'         =>  'required|email',
            'mobile_number' =>  'required|digits:10'
        ];
        
        if(request()->get('branch_id')) {
            $rules['logo'] = 'image|mimes:jpg,png,jpeg,webp';
        }else{
            $rules['logo'] = 'required|image|mimes:jpg,png,jpeg,webp';
        }

        $validatedData = Validator::make($request->all(), $rules);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 422);
        }
        
        $branchFormData = $request->all();
        if (is_null($branchFormData['branch_id'])) {
            unset($branchFormData['branch_id']);
        }

        if(array_key_exists('branch_id', $branchFormData)) {
            $branch = Branch::findOrFail($branchFormData['branch_id']);
            $image_name = $branch->logo;

            if($request->file('logo'))  ImageHelper::removeImage($branch->logo);
        }

        if($request->file('logo')){
            
            $directory = storage_path('app/public/branch_logo/');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            $image_name = ImageHelper::storeImage($request->file('logo'), 'branch_logo');
        }
        $branchFormData['logo'] = $image_name;

        Branch::updateOrCreate(['id' => $request->branch_id ], $branchFormData);
        return response()->json([
            'success'   =>  'Changes Save Successfully.',
            'status'    =>  true
        ], 200);
    }

    public function editBranch(Branch $branch)
    {
        if($branch) {
            $branchResponse = [
                'status' => true,
                'branch' => $branch
            ];
            return response()->json($branchResponse);
        }
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
