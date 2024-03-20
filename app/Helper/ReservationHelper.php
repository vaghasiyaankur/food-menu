<?php
namespace App\Helper;
use App\Models\Table;
use App\Models\Order;
use App\Models\QrCodeToken;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationHelper{

    /**
     * Choose a Table for Reservation
     *
     * @param int|null $floor
     * @param int $person
     * @param int $restaurant_id
     * @return int|mixed
     */
    public static function takeTable($floor, $person, $restaurant_id)
    {
        // Fetch available table IDs based on floor and restaurant
        $tableIds = Table::where('status', 1)->where('restaurant_id', $restaurant_id);
        if ($floor) {
            $tableIds->where('floor_id', $floor);
        }

        // Calculate capacity range based on the number of persons
        $from_cap = intval($person);
        if ($from_cap < 4) {
            $to_cap = intval(ceil($person * 2));
        } else {
            $to_cap = intval(ceil($person * 1.5));
        }

        // Filter tables based on capacity range
        $tableIds->where('capacity_of_person', '>=', $from_cap)
                ->where('capacity_of_person', '<=', $to_cap);

        // Check if there are existing orders for tables matching the capacity
        $orderExists = Order::with(['table' => function ($q) use ($from_cap, $restaurant_id) {
            $q->where('capacity_of_person', $from_cap)->where('restaurant_id', $restaurant_id);
        }])
        ->whereNotNull('start_time')->where('finished', 0)->doesntExist();

        // Fetch ordered table IDs with matching capacity
        $order_tableId = Table::where('status', 1)->where('restaurant_id', $restaurant_id);
        if ($floor) {
            $order_tableId->where('floor_id', $floor);
        }
        $order_tableId->orderBy('capacity_of_person','ASC')->where('capacity_of_person', $from_cap);

        // If no table found, return 0
        if (!$tableIds->count()) {
            return 0;
        } else {
            $ordersTableIds = Order::whereIn('table_id', $tableIds->pluck('id'))->where('finished', 0)->pluck('table_id')->toArray();

            // Find the first available table
            foreach ($tableIds->pluck('id') as $tableId) {
                if (!in_array($tableId, $ordersTableIds)) {
                    return $tableId;
                }
            }

            // Calculate time for each table and return the table with the minimum time
            $time = [];
            $tables_time_wise = [];
            foreach ($tableIds->pluck('id') as $tableId) {
                $allOrder = Order::where('table_id', $tableId)->where('finished', 0)->select('id', 'table_id', 'start_time', 'finish_time', 'finished')->get();
                $calculateTime = 0;
                foreach ($allOrder as $order) {
                    if ($order->start_time) {
                        $start  = new Carbon($order->start_time);
                        $end    = new Carbon();
                        $calculateTime += $order->finish_time - $start->diffInMinutes($end);
                    } else {
                        $calculateTime += $order->finish_time;
                    }
                    $tables_time_wise[$tableId] = $calculateTime;
                }
                array_push($time, $calculateTime);
            }

            // Find the table with the minimum time
            $table_id = array_search(min($time), $tables_time_wise);
            return $table_id;
        }
    }

    /**
     * Check Permission for Adding Reservation
     *
     * @param string $role
     * @param string|null $qrToken
     * @return array
     */
    public static function checkPermissionForAdd($role,$qrToken){
        $reservationPermission = 0;
        $response = [];
        if ($role == 'Guest' && $qrToken !== 'undefined') {
            $qrCodeToken = $qrToken;
            $date = now()->format('Y-m-d');
            $qrCode = QrCodeToken::whereToken($qrCodeToken)
                ->where('start_date', '<=', $date)
                ->where('end_date', '>=', $date)
                ->first();
        
            if (!$qrCode) {
                $response['status'] = false;
                $response['message'] = 'Invalid or expired QR Code. Please check and try again.';
            } else {
                $restaurant_id = $qrCode->restaurant_id;
                $reservationPermission = 1;
            }
        } elseif ($role == 'Manager') {
            $restaurant_id = Auth::user()->restaurant_id;
            $reservationPermission = 1;
        }

        if($reservationPermission){
            $response['status'] = true;
            $response['restaurant_id'] = $restaurant_id;
        }else{
            $response['status'] = false;
            $response['message'] = 'Reservation Fail.';
        }

        return $response;
    }
}
?>
