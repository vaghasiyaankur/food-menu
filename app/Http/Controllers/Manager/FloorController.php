<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function getFloors()
    {
        $floors = Floor::all();

        return response()->json($floors);
    }

    public function addFloor(Request $req)
    {
        $fl = new Floor();
        $fl->short_cut = $req->short_cut;
        $fl->name = $req->floor_name;
        $fl->save();

        return response()->json(['success'=>'Floor Added Successfully.']);

    }
}
