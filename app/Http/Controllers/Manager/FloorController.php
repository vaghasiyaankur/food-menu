<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FloorController extends Controller
{
    public function getFloors()
    {
        $floors = Floor::whereRestaurantId(Auth::user()->restaurant_id)->paginate(10);
        return response()->json($floors);
    }

    public function addFloor(Request $request)
    {
            $rules = [
                'name' => 'required',
            'short_cut' => 'required'
        ];
    
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Floor::updateOrCreate(
            ['id' => $request->id],
            ['short_cut' => $request->short_cut,'name' => $request->name,'restaurant_id' => Auth::user()->restaurant_id]
        );

        if($request->id == 0) $message = 'Added';
        else $message = "Updated";

        return response()->json(['success'=>'Floor '.$message.' Successfully.']);

    }

    public function editFloorDetail($id)
    {
        $floor = Floor::find($id);
        return response()->json($floor);
    }

    public function deleteFloor(Request $req)
    {
        Floor::find($req->id)->delete();

        return response()->json(['success'=>'Floor Deleted Successfully.']);
    }

    public function getFloorsData()
    {
        $floors = Floor::whereRestaurantId(Auth::user()->restaurant_id)->pluck('name','id');

        return response()->json($floors);
    }
}
