<?php

namespace App\Http\Controllers;

use App\Helper\ImageHelper;
use App\Helper\SettingHelper;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\User;
use App\Notifications\VerificationNotification;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin(){
        if (Auth::user()->role == 'super_admin') {
            return redirect()->route('super-admin.dashboard');
        } else {
            return view('admin');
        }
    }

    public function registerDetail(Request $request)
    {
        $formDetail = json_decode($request->register_detail, true);

        $userData = $formDetail[0];
        unset($userData[0]['password_confirmation']);

        $user = User::create([
            'name' => $userData[0]['name'],
            'email' => $userData[0]['email'],
            'password' => Hash::make($userData[0]['password']),
            'mobile_number' => $userData[0]['mobile_number'],
            'lock_pin'  =>  $userData[0]['lock_pin'],
            'role'  =>  'admin'
        ]);

        if($user) {

            $restaurantData = $formDetail[1];
            $restaurantCode = $this->generateUniqueRestaurantCode($restaurantData[0]['name']);

            $checkRestaurantCode = Restaurant::pluck('restaurant_code')->toArray();
            if (in_array($restaurantCode, $checkRestaurantCode)) {
                return response()->json(['error' => 'The restaurant already exists.'], 400);
            }

            $slug = Str::slug($restaurantData[0]['name']);
            $baseSlug = $slug;
            $i = 1;

            while (Restaurant::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $i;
                $i++;
            }
            
            $restaurantLogo = "";
            if($request->file('logo')){
                $directory = storage_path('app/public/setting/');
                if (!file_exists($directory)) {
                    mkdir($directory, 0777, true);
                }
            }

            $restaurantLogo = ImageHelper::storeImage($request->file('logo'), 'setting');

            $restaurant = Restaurant::create([
                'name' => $restaurantData[0]['name'],
                'slug'  =>  $slug,
                'email' =>  $restaurantData[0]['email'],
                'location' => $restaurantData[0]['address'],
                'restaurant_code' => $restaurantCode,
                'logo'  =>  $restaurantLogo
            ]);

            if($restaurant) {

                User::where('id', $user->id)->update(['restaurant_id' => $restaurant->id, 'email_verified_at' => now()]);

                $verify_user = User::where('role', 'super_admin')->first();
                if($verify_user) {
                    
                    $verify_user->notify(new VerificationNotification($restaurant,$user));

                    return response()->json([
                        'status'    =>  true,
                        'type'      =>  'restaurant',
                        'message'   =>  'Restaurant Register Successfully.'
                    ], 200);
                }
            }
        }
    }

    private function generateUniqueRestaurantCode($name)
    {
        $prefix = strtoupper(substr($name, 0, 2));
        do {
            $randomNumber = rand(10000000, 99999999);
            $restaurantCode = $prefix . $randomNumber;
        } while (Restaurant::where('restaurant_code', $restaurantCode)->exists());

        return $restaurantCode;
    }

    public function getBranchList(Request $request)
    {
        $search = $request->input('search', '');
        $filter = $request->input('filter', '');

        $branchQuery = Branch::query();
        $restaurant = Restaurant::select('id', 'name')->get();

        $branchQuery->when($search, function ($query, $search) {
            return $query->where('branch_name', 'like', '%' . $search . '%')
                ->orWhere('owner_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        });

        $branchQuery->when($filter, function ($query, $filter) {
            return $query->where('restaurant_id', $filter);
        });

        $branch = $branchQuery->paginate(10);
        return response()->json(['branch' =>  $branch, 'restaurant' => $restaurant], 200);
    }

    public function addUpdateBranch(Request $request)
    {
        $rules = [
            'branch_name'   =>  'required',
            'owner_name'    =>  'required|string',
            'email'         =>  'required|email',
            'mobile_number' =>  'required|digits:10'
        ];
        
        if(request()->get('id')) {
            $rules['logo'] = 'image|mimes:jpg,png,jpeg,webp|max:1024';
        }else{
            $rules['logo'] = 'required|mimes:jpg,png,jpeg,webp|max:1024';
        }
        
        $branchFormData = $request->all();
        $validatedData = Validator::make($request->all(), $rules);
        
        if ($validatedData->fails()) {
            return response()->json([
                'status' =>  false,
                'error'  =>  $validatedData->errors()
            ], 422);
        }
        
        if(array_key_exists('id', $branchFormData)) {
            $branch = Branch::findOrFail($branchFormData['id']);
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
        $branchFormData['restaurant_id'] = Auth::user()->restaurant_id;

        Branch::updateOrCreate(['id' => $request->id ], $branchFormData);
        return response()->json([
            'success'   =>  $request->id ? 'Branch Updated Successfully.' : 'Branch Created Successfully.',
            'status'    =>  true
        ], 200);
    }

    public function removeBranch($id)
    {
        $branch = Branch::findOrFail($id);
        if($branch) {
            $branch->delete();
            return response()->json(['status' => true, 'success' => 'Changes Save Successfully'], 200);
        } else {
            return response()->json(['status' => false, 'error' => 'Branch Not Found'], 404);
        }
    }
    
}
