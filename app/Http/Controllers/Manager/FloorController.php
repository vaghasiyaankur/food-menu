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
}
