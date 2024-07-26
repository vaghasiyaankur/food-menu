<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboardList()
    {
        $restaurant = new Restaurant();
        $userCount = User::count();

        $restaurantCounts = $restaurant->groupBy('request_status')
            ->selectRaw('request_status, count(*) as count')
            ->get()
            ->keyBy('request_status');

        $approvedRestaurants = $restaurant->where('request_status', 1)->get();
        $declinedRestaurants = $restaurant->where('request_status', 0)->get();
        $pendingRestaurants = $restaurant->where('request_status', 2)->get();

        $dashboardItem = [
            'status' => true,
            'user' => $userCount,
            'approved' => $restaurantCounts->get(1)->count ?? 0,
            'approved_restaurants' => $approvedRestaurants,
            'declined' => $restaurantCounts->get(0)->count ?? 0,
            'declined_restaurants' => $declinedRestaurants,
            'pending' => $restaurantCounts->get(2)->count ?? 0,
            'pending_restaurants' => $pendingRestaurants,
        ];

        return response()->json($dashboardItem);
    }
}
