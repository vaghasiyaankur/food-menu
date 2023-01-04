<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FloorController extends Controller
{
    public function getFloors()
    {
        $floors = Floor::whereUserId(Auth::id())->paginate(10);
        return response()->json($floors);
    }

    public function addFloor(Request $req)
    {
        Floor::updateOrCreate(
            ['id' => $req->id],
            ['short_cut' => $req->short_cut,'name' => $req->floor_name,'user_id' => Auth::id()]
        );

        if($req->id == 0) $message = 'Added';
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
        $floors = Floor::whereUserId(Auth::id())->pluck('name','id');

        return response()->json($floors);
    }
}
