<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function dashboardList()
    {
        $latestCustomer = Customer::orderByDesc('id')->get();
        return response()->json(['status' => true, 'latest_customer' => $latestCustomer], 200);
    }
}
