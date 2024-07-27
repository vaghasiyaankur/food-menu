<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Notifications\RestaurantApprovedDeclinedNotification;

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

                    $btn = '<div class="d-inline-block">
                                <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded bx-md"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                                    <li><a href="javascript:void(0)" data-id="'.$restaurantRow->id.'" class="branch dropdown-item restaurantDetail" style="margin-right: 10px;">Detail</a></li>
                                    <li><a href="'.$userRoute.'" class="dropdown-item">Users</a></li>
                                    <li><a href="'.$branchRoute.'" class="dropdown-item">Branch</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                                    <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Permanent Delete</a></li>
                                </ul>
                            </div>';
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
            $rules['logo'] = 'image|mimes:jpg,png,jpeg,webp|max:1024';
        }else{
            $rules['logo'] = 'required|mimes:jpg,png,jpeg,webp|max:1024';
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
            return redirect()->back()->with('message', 'Branch Deleted Successfully');
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

                    $btn = '<div class="d-inline-block">
                            <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow me-1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded bx-md"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                                <li><a href="javascript:void(0)" data-id="'.$branchRow->id.'" class="branch dropdown-item restaurantDetail" style="margin-right: 10px;">Detail</a></li>
                                <li><button class="dropdown-item requestStatusBtn user" data-restaurant-id="'.$branchRow->id.'" data-request-status="1">Approved</button></li>
                                <div class="dropdown-divider"></div>
                                <li><a data-restaurant-id="'.$branchRow->id.'" data-request-status="0" class="dropdown-item text-danger requestStatusBtn user">Decline</a></li>
                            </ul>
                        </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Handle the approval or declination of a restaurant and send a notification.
     *
     * This method processes the approval or declination of a restaurant based on the 
     * provided request status. It finds the restaurant by its ID, determines the request status,
     * and sends a notification to the associated user. If the restaurant is found, it sends
     * the notification and redirects back. If the restaurant is not found, it throws a 404 error.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming request containing the restaurant ID and request status.
     * @return \Illuminate\Http\RedirectResponse  A redirect response back to the previous page.
    */
    public function restaurantApprovedDeclined(Request $request)
    {   
        $restaurant = Restaurant::findOrFail($request->restaurant_id);
        if($restaurant) {
            $requestStatus = $request->request_status == 1 ? 1 : 0;
            
            $user = User::where('restaurant_id', $restaurant->id)->first();
            $user->notify(new RestaurantApprovedDeclinedNotification($restaurant, $requestStatus));
    
            return redirect()->back();
        }
    }

    public function getRestaurantDetail($id)
    {
        $restaurantDetail = Restaurant::findOrFail($id);
        if($restaurantDetail) {
            return response()->json([
                'status'    =>  true,
                'detail'    =>  $restaurantDetail
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'error'    =>  'Restaurant Detail Found Error.'
            ]);
        }
    }
}
