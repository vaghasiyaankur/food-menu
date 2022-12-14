<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\Order;
use App\Models\Floor;
use Illuminate\Http\Request;
use App\Helper\ReservationHelper;


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
        $tables = Table::with(['color','orders.customer', 'floor','orders'=>function($q){
            $q->orderBy('updated_at', 'ASC');
        }])->where('floor_id', $groundFloorId)->where('status', 1)->get();

        $floorlist = Floor::select('id', 'name')->withCount('activetables')->get();
        foreach($tables as $tkey=>$table){
            foreach($table->orders as $okey=>$order){
                $tables[$tkey]['orders'][$okey]['reservation_time'] = date('h:i', strtotime($order->updated_at));
                $tables[$tkey]['orders'][$okey]['reservation_time_12_format'] = date('g:i a', strtotime($order->updated_at));
            }
        }

        $total_table_number = Table::where('status', 1)->count();
        $table_list_with_order = Table::select('id')->where('status', 1)->withCount('orders')->get();
        $count = 0;
        foreach($table_list_with_order as $tlwo){
            if($tlwo->orders_count == 0) $count += 1;
        }
        $max_table_cap = Table::where('floor_id', $groundFloorId)->where('status', 1)->max('capacity_of_person');
        $current_capacity = (100 - ($count / $total_table_number * 100));
        return response()->json([ 'tables' => $tables , 'floorlist' => $floorlist, 'current_capacity' => $current_capacity,'max_table_cap'=>$max_table_cap] , 200);
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
        $tables = Table::with(['color','orders.customer', 'floor','orders'=>function($q){
            $q->orderBy('updated_at', 'ASC');
        }])->where('floor_id', $request->id)->where('status', 1)->get();

        foreach($tables as $tkey=>$table){
            foreach($table->orders as $okey=>$order){
                $tables[$tkey]['orders'][$okey]['reservation_time'] = date('h:i', strtotime($order->updated_at));
                $tables[$tkey]['orders'][$okey]['reservation_time_12_format'] = date('g:i a', strtotime($order->updated_at));
            }
        }

        $total_table_number = Table::where('status', 1)->count();
        $table_list_with_order = Table::select('id')->where('status', 1)->withCount('orders')->get();
        $count = 0;
        foreach($table_list_with_order as $tlwo){
            if($tlwo->orders_count == 0) $count += 1;
        }

        $current_capacity = (100 - ($count / $total_table_number * 100));
        $max_table_cap = Table::where('floor_id', $request->id)->where('status', 1)->max('capacity_of_person');
        return response()->json([ 'tables' => $tables, 'current_capacity' => $current_capacity,'max_table_cap'=>$max_table_cap ] , 200);
    }

    /**
     * order transfer to another floor
     *
     * @return @json ($tables)
     *
     */
    public function changeFloorOrder(Request $request)
    {
        $person = Order::where('id', $request->id)->first()->person;

        $table_id = ReservationHelper::takeTable($request->floor_id, $person);

        if($table_id == 0) return response()->json([ 'success' => false, 'message' => 'not compatible capacity table in this floor' ] , 200);

        Order::where('id', $request->id)->update(['table_id' => $table_id]);

        return response()->json([ 'success' => true, 'message' => 'success' ] , 200);
    }

}
