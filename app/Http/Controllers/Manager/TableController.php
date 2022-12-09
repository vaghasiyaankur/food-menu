<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Table;
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
        $tables = Table::with('color')->with('orders')->get();
        
        return response()->json([ 'tables' => $tables ] , 200);
    }

}
