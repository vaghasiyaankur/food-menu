<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Mail\RestaurantApprovedDeclined;
use App\Models\Branch;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Fetches a list of restaurants and returns it in a DataTable format.
     *
     * This method handles AJAX requests to retrieve all restaurant records from the database
     * and formats them for display in a DataTable. It adds an index column and an 'action' column
     * with buttons for managing users and branches associated with each restaurant. The buttons
     * link to routes for user and branch management, using the restaurant's ID in the URL.
     *
     * @param \Illuminate\Http\Request $request The incoming request instance.
     * 
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response The DataTable formatted JSON response.
     */
    public function getRestaurants(Request $request)
    {
        if($request->ajax()) {
            $restaurantList = Restaurant::where('request_status', 1)->get();

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

    /**
     * Retrieves and formats a list of branches for a given restaurant, specifically for AJAX requests.
     *
     * @param \Illuminate\Http\Request $request The request instance containing the restaurant ID.
     * @return \Illuminate\Http\JsonResponse A JSON response with formatted branch data for DataTables.
     *
     */
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

    /**
     * Handles the creation or update of a branch record based on the provided request data.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance containing branch data.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating success or validation errors.
     *
     */
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
            $rules['logo'] = 'required|mimes:jpg,png,jpeg,webp';
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

    /**
     * Handles requests to retrieve the details of a specific branch for editing.
     *
     * @param \App\Models\Branch $branch The branch model instance to be edited.
     * @return \Illuminate\Http\JsonResponse A JSON response containing the branch details.
     *
     */
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

    /**
     * Deletes a branch based on the provided branch ID and redirects to the branch management page.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance containing the branch ID and restaurant ID.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the branch management page with a success message.
     *
     */
    public function deleteBranch(Request $request)
    {
        $branch = Branch::findOrFail($request->branch_id);
        if($branch) {
            $branch->delete();
            return redirect()->route('super-admin.branch', ['restaurant_id' => $request->restaurant_id])->with('message', 'Branch Deleted Successfully');
        }
    }

    /**
     * Handle AJAX request to fetch and display a list of restaurant requests with a request_status of 2.
     * This function is used to generate a DataTable with an action column containing buttons
     * for approving or declining each restaurant request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
    */
    public function restaurantRequestList(Request $request)
    {
        if ($request->ajax()) {
            $restaurantRequest = Restaurant::where('request_status', 2)->get();

            return DataTables::of($restaurantRequest)
                ->addIndexColumn()
                ->addColumn('action', function($branchRow) {
                    $btn = '<button data-restaurant-id="'.$branchRow->id.'" data-request-status="1"
                            class="requestStatusBtn user btn btn-primary btn-sm text-white fw-bolder" style="margin-right: 10px;">
                                Approved
                            </button>';
                    $btn .= '<button data-restaurant-id="'.$branchRow->id.'" data-request-status="0"
                            class="requestStatusBtn user btn btn-danger btn-sm text-white fw-bolder" style="margin-right: 10px;">
                                Decline
                            </button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Update the request status of a restaurant and send an email notification.
     *
     * @param  int  $restaurant  The ID of the restaurant to update.
     * @param  int  $request_status  The status to set (1 for approved, 0 for declined).
     * @return \Illuminate\Http\RedirectResponse  Redirect back with a success message.
     */
    public function restaurantApprovedDeclined(Request $request)
    {   
        $requestStatus = $request->request_status == 1 ? 1 : 0;

        Restaurant::where('id', $request->restaurant_id)->update(['request_status' => $requestStatus]);

        $user = User::where('restaurant_id', $request->restaurant_id)->value('email');
        Mail::to($user)->send(new RestaurantApprovedDeclined($request->restaurant_id));

        return redirect()->back();
    }
}
