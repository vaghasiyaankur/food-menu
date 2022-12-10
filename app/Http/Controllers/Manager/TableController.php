<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\Order;
use App\Models\Floor;
use Illuminate\Http\Request;


class TableController extends Controller
{
    /**
    * This controller is used for the Manager Table page
    * in the Manage panel
    */

    /**
     * To pass all table list with order from database to frontend
     *
     * @return @json ($tables)
     *
     */
    public function tableList()
    {   
        $groundFloorId = Floor::first()->id;
        $tables = Table::with('color','orders.customer', 'floor')->where('floor_id', $groundFloorId)->get();

        $floorlist = Floor::select('id', 'name')->withCount('tables')->get();
        // dd($tables);
        return response()->json([ 'tables' => $tables , 'floorlist' => $floorlist] , 200);
    }

    /**
     * Order transfer to another table (same floor)
     * 
     * @return @json (success message)
     * 
     */
    public function changeOrderTable(Request $request)
    {
        $tables = Order::where('id', $request->id)->update(['table_id' => $request->table_number]);
        
        return response()->json([ 'success' => 'Order Transfer Successfully' ] , 200);
    }

    /**
     * To pass all table list with order from database to frontend
     *
     * @return @json ($tables)
     *
     */
    public function tableListFloorWise(Request $request)
    {   
        $tables = Table::with('color','orders.customer', 'floor')->where('floor_id', $request->id)->get();


        return response()->json([ 'tables' => $tables ] , 200);
    }

}
