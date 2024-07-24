<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Handles AJAX requests to retrieve a list of users for a specified restaurant.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance containing the restaurant ID.
     * @return \Illuminate\Http\JsonResponse A JSON response containing the user list formatted for DataTables.
     *
     */
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $restaurantId = $request->input('restaurant_id');
            $data = User::where('restaurant_id', $restaurantId)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($userRow){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm editUser fw-bolder" data-id="' . $userRow->id . '" style="margin-right: 10px;">Edit</a>';
                    $btn .= '<a href="'.route('user.delete').'" class="delete btn btn-danger btn-sm fw-bolder deleteUser" style="margin-right: 10px;">Delete</a>';
                    $btn .= '<a href="'.route('user.simulation', ['user' => $userRow->id, 'role' => $userRow->role]).'" class="btn btn-info btn-sm userSimulation fw-bolder" data-user-role="' . $userRow->role . '" data-user-id="' . $userRow->id . '">Simulation</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Returns the details of a specified user in JSON format.
     *
     * @param \App\Models\User $user The User model instance representing the user to be edited.
     * @return \Illuminate\Http\JsonResponse A JSON response containing the user's details and a status indicator.
     *
     */
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

    /**
     * Creates or updates a user based on the provided request data.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance containing user data.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating the success or failure of the operation.
     *
    */
    public function userCreateUpdate(Request $request)
    {
        $rules = [
            'name'          =>  'required',
            'email'         =>  'required|email',
            'mobile_number' =>  'required|digits:10',
            'role'          =>  'required',
            'lock_pin'      =>  'required|digits:4'
        ];

        if(request()->get('user_id')) {
            $rules['password'] = 'confirmed';
        }else{
            $rules['password'] = 'required|confirmed';
        }

        $validatedData = Validator::make($request->all(), $rules);
        
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

    /**
     * Deletes a user based on the provided user ID.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance containing the user ID and restaurant ID.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the 'super-admin.user' route with the restaurant ID.
     *
    */
    public function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if($user) {
            $user->delete();
            return to_route('super-admin.user', ['restaurant_id' => $request->restaurant_id]);
        }
    }

    /**
     * Log in as the specified user and redirect based on the given role.
     *
     * @param int $user The ID of the user to log in as.
     * @param string $role The role to redirect to.
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException If the role is invalid.
    */
    public function changeUserSimulation($user, $role)
    {
        $user = User::findOrFail($user);

        $routes = ['manager' => 'pos','waiter'  => 'manager','admin'   => 'admin'];

        if (array_key_exists($role, $routes)) {
            Auth::loginUsingId($user->id);
            return redirect()->route($routes[$role]);
        }
        abort(404, 'Role not found');
    }

    /**
     * Retrieve and return the profile details for the authenticated user.
     *
     * @return \Illuminate\View\View|null
    */
    public function getProfileDetail()
    {
        $user = Auth::user();
        if($user && $user->role == 'super_admin') {
            return view('admin.page.profile', compact('user'));
        }
    }

    /**
     * Update the user's profile information.
     *
     * This function validates the incoming request data, ensuring that all required fields are present
     * and meet specific validation criteria. It then finds the user by their ID, updates the user's 
     * information with the validated data, and redirects the user back with a success message.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request containing the profile data.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects back to the previous page with a success message.
    */
    public function updateProfile(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email,'.$user->id,
            'mobile_number' => 'required|digits:10',
            'role'          => 'required',
            'lock_pin'      => 'required|digits:4',
        ]);

        if($user) {
            $user->update($request->all());
            return redirect()->back()->with('success', 'Profile Updated Successfully.');
        }
    }
}
