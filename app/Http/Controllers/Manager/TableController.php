<?php

namespace App\Http\Controllers\Manager;

use App\Helper\CustomerHelper;
use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\Customer;
use App\Models\Setting;
use App\Models\Order;
use App\Models\TableShiftHistory;
use App\Models\FloorShiftHistory;
use App\Models\Floor;
use Illuminate\Http\Request;
use App\Helper\ReservationHelper;
use Kutia\Larafirebase\Facades\Larafirebase;
use \Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->first();
        $highlight_time = @$setting->highlight_on_off ? @$setting->highlight_time : 0;
        $highlight_time_on_off = @$setting->highlight_on_off;

        $timing = $highlight_time * 60;

        $groundfloor = Floor::whereRestaurantId(Auth::user()->restaurant_id)->first();
        $groundFloorId = @$groundfloor->id;

        $tables = Table::with(['color','orders.customer', 'floor','orders'=>function($q){
            $q->where('finished', 0)->whereRestaurantId(Auth::user()->restaurant_id)->orderBy('created_at', 'ASC')->orderBy('updated_at', 'ASC');
        }])->withCount([
            'orders' => function ($z){
                $z->where('finished', 0)->whereRestaurantId(Auth::user()->restaurant_id);
            }
        ])->whereRestaurantId(Auth::user()->restaurant_id)->where('floor_id', $groundFloorId)->where('status', 1)->orderBy('orders_count', 'DESC')->get();

        $floorlist = Floor::with(['activetables' => function($q){
            $q->withCount([
                'orders' => function ($z){
                    $z->where('finished', 0)->whereRestaurantId(Auth::user()->restaurant_id);
                }
            ]);
        },'activetables.orders' => function ($q){
            $q->where('finished', 0)->whereRestaurantId(Auth::user()->restaurant_id);
        }])->whereHas('activetables')->whereRestaurantId(Auth::user()->restaurant_id)->select('id', 'name')->get();

        foreach ($floorlist as $f_key => $floors) {
            $floors['time_left'] = false;
            foreach ($floors->activetables as $t_key => $table) {
                $floors['orders_count'] = $floors['orders_count'] + $table->orders_count;
                if(count($table->orders) && $table->orders[0] && $floors['time_left'] == false){
                    $start_time = $table->orders[0]->start_time;
                    $finish_time = $table->orders[0]->finish_time;
                    $start = Carbon::parse($start_time)->addMinute($finish_time);
                    $end = Carbon::now();
                    $floors['time_left'] = $start->diffInMinutes($end) <= 3 || $start < $end;
                }
            }
        }

        foreach($tables as $tkey=>$table){
            foreach($table->orders as $okey=>$order){

                $is_floor_shift = FloorShiftHistory::where('order_id',$order->id)->latest()->first();
                $is_table_shift = TableShiftHistory::where('order_id',$order->id)->latest()->first();
                $floor_start = Carbon::create(@$is_floor_shift->created_at);
                $table_start = Carbon::create(@$is_table_shift->created_at);
                $end = Carbon::now();
                $is_floor_shift = $floor_start->diffInSeconds($end) <  $timing;
                $is_table_shift = $table_start->diffInSeconds($end) <  $timing;

                $tables[$tkey]['orders'][$okey]['is_time_left'] = false;
                if($okey == 0){
                    $start_time = $order->start_time;
                    $finish_time = $order->finish_time;
                    $start = Carbon::parse($start_time)->addMinute($finish_time);
                    $end = Carbon::now();
                    $tables[$tkey]['orders'][$okey]['is_time_left'] = $start->diffInMinutes($end) <= 3 || $start < $end;
                    $tables[$tkey]['orders'][$okey]['time_left'] = $start;
                }
                $tables[$tkey]['orders'][$okey]['reservation_time'] = date('h:i', strtotime($order->created_at));
                $tables[$tkey]['orders'][$okey]['reservation_time_12_format'] = date('g:i a', strtotime($order->created_at));
                $tables[$tkey]['orders'][$okey]['is_ongoing_order'] = $okey == 0;
                $tables[$tkey]['orders'][$okey]['is_new_order_timing'] = $okey != 0 && strtotime($order->created_at) == strtotime($order->updated_at) && $order->created_at->diffInSeconds(Carbon::now()) < ($highlight_time * 60);
                $tables[$tkey]['orders'][$okey]['new_order_timing'] = $order->updated_at->diffInSeconds(Carbon::now());
                $tables[$tkey]['orders'][$okey]['is_order_moved'] = strtotime($order->created_at) != strtotime($order->updated_at) && $order->updated_at->diffInSeconds(Carbon::now()) < ($highlight_time * 60) && ($is_floor_shift || $is_table_shift);
                $tables[$tkey]['orders'][$okey]['order_moved'] = $order->updated_at->diffInSeconds(Carbon::now());
            }
        }

        $total_table_number = Table::whereRestaurantId(Auth::user()->restaurant_id)->where('status', 1)->count();
        $table_list_with_order = Table::whereRestaurantId(Auth::user()->restaurant_id)->select('id')->where('status', 1)->withCount('orders')->get();
        $count = 0;
        foreach($table_list_with_order as $tlwo){
            if($tlwo->orders_count == 0) $count += 1;
        }
        $max_table_cap = Table::whereRestaurantId(Auth::user()->restaurant_id)->where('floor_id', $groundFloorId)->where('status', 1)->max('capacity_of_person');
        $current_capacity = (100 - ($count / $total_table_number * 100));

        return response()->json([ 'tables' => $tables , 'floorlist' => $floorlist, 'current_capacity' => $current_capacity,'max_table_cap'=>$max_table_cap, 'highlight_time' => $highlight_time, 'highlight_time_on_off' => $highlight_time_on_off] , 200);

    }

    /**
     * Order transfer to another table (same floor)
     *
     * @return @json (success message)
     *
     */
    public function changeOrderTable(Request $request)
    {
        $orderExists = Order::where('table_id', $request->table_number)->whereNotNull('start_time')->where('finished', 0)->doesntExist();
        $data = [];
        $data['table_id'] = $request->table_number;
        if ($orderExists) {
            $data['start_time'] = Carbon::now();
        }

        $fromTableId = Order::where('id', $request->id)->first()->table_id;
        $toTableId = $request->table_number;
        $tableShiftHistory = new TableShiftHistory();
        $tableShiftHistory->order_id = @$request->id;
        $tableShiftHistory->from = $fromTableId;
        $tableShiftHistory->to = $toTableId;
        $tableShiftHistory->save();
        $data['created_at'] = Carbon::now()->subSeconds(2);
        $data['updated_at'] = Carbon::now();
        Order::where('id', $request->id)->update($data);

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

        $setting = Setting::whereRestaurantId(Auth::user()->restaurant_id)->first();
        $highlight_time = @$setting->highlight_on_off ? @$setting->highlight_time : 0;
        // $highlight_time_on_off = @$setting->highlight_on_off;

        $tables = Table::with(['color','orders.customer', 'floor','orders'=>function($q){
            $q->where('finished', 0)->whereRestaurantId(Auth::user()->restaurant_id)->orderBy('created_at', 'ASC')->orderBy('updated_at', 'ASC');
        }])->withCount([
            'orders' => function ($z){
                $z->where('finished', 0)->whereRestaurantId(Auth::user()->restaurant_id);
            }
        ])->where('floor_id', $request->id)->whereRestaurantId(Auth::user()->restaurant_id)->where('status', 1)->orderBy('orders_count', 'DESC')->get();
        $timing = $highlight_time * 60;
        foreach($tables as $tkey=>$table){
            foreach($table->orders as $okey=>$order){

                $is_floor_shift = FloorShiftHistory::where('order_id',$order->id)->latest()->first();
                $is_table_shift = TableShiftHistory::where('order_id',$order->id)->latest()->first();
                $floor_start = Carbon::create(@$is_floor_shift->created_at);
                $table_start = Carbon::create(@$is_table_shift->created_at);
                $end = Carbon::now();

                $is_floor_shift = $floor_start->diffInSeconds($end) <  $timing;
                $is_table_shift = $table_start->diffInSeconds($end) <  $timing;

                $tables[$tkey]['orders'][$okey]['is_time_left'] = false;
                if($okey == 0){
                    $start_time = $order->start_time;
                    $finish_time = $order->finish_time;
                    $start = Carbon::parse($start_time)->addMinute($finish_time);
                    $end = Carbon::now();
                    $tables[$tkey]['orders'][$okey]['is_time_left'] = $start->diffInMinutes($end) <= 4 || $start < $end;
                    $tables[$tkey]['orders'][$okey]['time_left'] = $start;
                }

                $tables[$tkey]['orders'][$okey]['reservation_time'] = date('h:i', strtotime($order->created_at));
                $tables[$tkey]['orders'][$okey]['reservation_time_12_format'] = date('g:i a', strtotime($order->created_at));
                $tables[$tkey]['orders'][$okey]['is_ongoing_order'] = $okey == 0;
                $tables[$tkey]['orders'][$okey]['is_new_order_timing'] = $okey != 0 && strtotime($order->created_at) == strtotime($order->updated_at) && $order->created_at->diffInSeconds(Carbon::now()) < ($highlight_time * 60);
                $tables[$tkey]['orders'][$okey]['new_order_timing'] = $order->updated_at->diffInSeconds(Carbon::now());
                $tables[$tkey]['orders'][$okey]['is_order_moved'] = strtotime($order->created_at) != strtotime($order->updated_at) && $order->updated_at->diffInSeconds(Carbon::now()) < ($highlight_time * 60) && ($is_floor_shift || $is_table_shift);
                $tables[$tkey]['orders'][$okey]['order_moved'] = $order->updated_at->diffInSeconds(Carbon::now());
            }
        }

        $floorlist = Floor::with(['activetables' => function($q){
            $q->withCount([
                'orders' => function ($z){
                    $z->whereRestaurantId(Auth::user()->restaurant_id)->where('finished', 0);
                }
            ]);
        },'activetables.orders' => function ($q){
            $q->where('finished', 0)->whereRestaurantId(Auth::user()->restaurant_id);
        }])->whereHas('activetables')->select('id', 'name')->whereRestaurantId(Auth::user()->restaurant_id)->get();

        foreach ($floorlist as $key => $floors) {
            $floors['time_left'] = false;
            foreach ($floors->activetables as $key => $table) {
                $floors['orders_count'] = $floors['orders_count'] + $table->orders_count;
                if($table->orders_count && $floors['time_left'] == false){
                    $start_time = $table->orders[0]->start_time;
                    $finish_time = $table->orders[0]->finish_time;
                    $start = Carbon::parse($start_time)->addMinute($finish_time);
                    $end = Carbon::now();
                    $floors['time_left'] = $start->diffInMinutes($end) <= 4 || $start < $end;
                }
            }
        }

        $total_table_number = Table::whereRestaurantId(Auth::user()->restaurant_id)->where('status', 1)->count();
        $table_list_with_order = Table::whereRestaurantId(Auth::user()->restaurant_id)->select('id')->where('status', 1)->withCount('orders')->get();
        $count = 0;
        foreach($table_list_with_order as $tlwo){
            if($tlwo->orders_count == 0) $count += 1;
        }

        $current_capacity = (100 - ($count / $total_table_number * 100));
        $max_table_cap = Table::whereRestaurantId(Auth::user()->restaurant_id)->where('floor_id', $request->id)->where('status', 1)->max('capacity_of_person');
        return response()->json([ 'tables' => $tables, 'current_capacity' => $current_capacity,'max_table_cap'=>$max_table_cap, 'floorlist' => $floorlist ] , 200);
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
        $restaurant_id = Auth::user()->restaurant_id;
        $table_id = ReservationHelper::takeTable($request->floor_id, $person, $restaurant_id);

        if($table_id == 0) return response()->json([ 'success' => false, 'message' => 'not compatible capacity table in this floor' ] , 200);

        $orderExists = Order::where('table_id', $request->table_number)->whereNotNull('start_time')->where('finished', 0)->doesntExist();
        $data = [];
        $data['table_id'] = $table_id;
        if ($orderExists) {
            $data['start_time'] = Carbon::now();
        }

        $fromTableId = Order::where('id', $request->id)->first()->table_id;
        $fromFloorId = Table::where('id', $fromTableId)->with('floor')->first();
        $toFloorId = Table::where('id', $table_id)->first();

        $floorShiftHistory = new FloorShiftHistory();
        $floorShiftHistory->order_id = @$request->id;
        $floorShiftHistory->from = @$fromFloorId->floor->name;
        $floorShiftHistory->to = @$toFloorId->floor->name;
        $floorShiftHistory->save();

        $data['created_at'] = Carbon::now()->subSeconds(2);
        $data['updated_at'] = Carbon::now();
        Order::where('id', $request->id)->update($data);

        return response()->json([ 'success' => true, 'message' => 'success' ] , 200);
    }

    /**
     * Finish Order And Move to next Order
     *
     * @return @json ($tables)
     *
     */
    public function finishNext(Request $request)
    {
        Order::where('id', $request->id)->update(['finished' => 1,'finish_at' => Carbon::now()]);

        $restaurant_id = Auth::user()->restaurant_id;

        $table_id = Order::where('id', $request->id)->whereRestaurantId($restaurant_id)->first()->table_id;


        $next = Order::where('table_id', $table_id)->whereNull('start_time')->whereRestaurantId($restaurant_id)->where('finished', 0)->orderBy('updated_at', 'ASC')->first();
        $update_date = @$next->updated_at;
        if($next)  $next->update(['start_time' => Carbon::now()]);
        if($next)  $next->update(['updated_at' => $update_date]);

        // $token = $request->session()->get('device_token');
        $customer_id = @$next->customer_id;
        $customer = Customer::where('id', @$customer_id)->first();
        $token = @$customer->device_token;
        if($token){
            // $fcmTokens = ['c16H1_gwueT8jzmm2w_cTn:APA91bGjH092huMhvCN4Cejb84y1Y_CxzdbLrxIwyLucbUCyX4v1gl2O6oYcVaSm0ncnYhD9mbFlKVmvAgVzeePzLN5yhn0PG1esfjo0P1mrR0RUXb_W4sQII_GfcZoXodUmsqc-Kg0m'];
            $fcmTokens = [$token];

            //Notification::send(null,new SendPushNotification($request->title,$request->message,$fcmTokens));

            /* or */

            //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

            /* or */

            // Larafirebase::withTitle('Food-menu Restaurant')
            // ->withBody('Your Turn Now !!!')
            // ->sendMessage($fcmTokens);
           // return redirect()->back()->with('success','Notification Sent Successfully!!');


        }

        try {

         $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
         $client = new \Vonage\Client($basic);
            //  $receiverNumber = ;     link : https://receive-smss.com/sms/447498173567/
                // $receiverNumber = $customer->number;
                $messageNotification = "Food-Menu : Your Turn Now!!";

                // $message = $client->message()->send([
                //     'to' => getenv("NEXMO_DEFAULT_NUMBER"),
                //     'from' => getenv('NEXMO_REGISTER_NUMBER'),
                //     'text' => $messageNotification
                // ]);

         }
         catch (Exception $e) {
             // dd("Error: ". $e->getMessage());
         }

        return response()->json(['success' => true] , 200);
    }

    /**
     * Cancel Order And Move to next Order
     *
     * @return @json ($tables)
     *
     */
    public function cancelNext(Request $request)
    {

        $orderId = $request->id;
        $cancel = $request->cancelled_by ? : 'Manager';
       
        Order::where('id', $request->id)->update(['cancelled_by' => $cancel]);
        
        $restaurant_id = Auth::user()->restaurant_id;

        $table_id = Order::where('id', $request->id)->whereRestaurantId($restaurant_id)->first()->table_id;


        $next = Order::where('table_id', $table_id)->whereNull('start_time')->whereRestaurantId($restaurant_id)->where('finished', 0)->orderBy('updated_at', 'ASC')->first();
        $update_date = @$next->updated_at;
        if($next)  $next->update(['start_time' => Carbon::now()]);
        if($next)  $next->update(['updated_at' => $update_date]);

        // $token = $request->session()->get('device_token');
        $customer_id = @$next->customer_id;
        $customer = Customer::where('id', @$customer_id)->first();
        $token = @$customer->device_token;
        if($token){
            // $fcmTokens = ['c16H1_gwueT8jzmm2w_cTn:APA91bGjH092huMhvCN4Cejb84y1Y_CxzdbLrxIwyLucbUCyX4v1gl2O6oYcVaSm0ncnYhD9mbFlKVmvAgVzeePzLN5yhn0PG1esfjo0P1mrR0RUXb_W4sQII_GfcZoXodUmsqc-Kg0m'];
            $fcmTokens = [$token];

            //Notification::send(null,new SendPushNotification($request->title,$request->message,$fcmTokens));

            /* or */

            //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

            /* or */

            // Larafirebase::withTitle('Food-menu Restaurant')
            // ->withBody('Your Turn Now !!!')
            // ->sendMessage($fcmTokens);
           // return redirect()->back()->with('success','Notification Sent Successfully!!');


        }

        try {

         $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
         $client = new \Vonage\Client($basic);
            //  $receiverNumber = ;     link : https://receive-smss.com/sms/447498173567/
                // $receiverNumber = $customer->number;
                $messageNotification = "Food-Menu : Your Turn Now!!";

                // $message = $client->message()->send([
                //     'to' => getenv("NEXMO_DEFAULT_NUMBER"),
                //     'from' => getenv('NEXMO_REGISTER_NUMBER'),
                //     'text' => $messageNotification
                // ]);

         }
         catch (Exception $e) {
             // dd("Error: ". $e->getMessage());
         }

         Order::where('id', $orderId)->delete();
        return response()->json(['success' => true] , 200);
    }

    /**
     * Use For calculate the time for order turn using ($request->id)
     *
     * @return @json ($time)
     *
     */
    public function getRemainigTime(Request $request)
    {
        $orderId = $request->id;

        $table_id = Order::where('id', $orderId)->first()->table_id;
        $created_at = Order::where('id', $orderId)->first()->created_at;

        $restaurant_id = Auth::user()->restaurant_id;

        if($table_id){
            $allOrder = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->where('finished', 0)->where('created_at', '<=', $created_at)->select('id', 'table_id', 'start_time', 'finish_time', 'finished', 'updated_at')->whereRestaurantId($restaurant_id)->get();

            $calculateTime = 0;

            foreach($allOrder as $order){
                $calculateTime += $order->finish_time;
            }

            $firstOrderTime = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->whereRestaurantId($restaurant_id)->where('finished', 0)->where('created_at', '<=', $created_at)->whereNotNull('start_time')->first();
            if($firstOrderTime){
                $started_time = $firstOrderTime->start_time;
            }else{
                $firstOrderTime = @$allOrder[0];
                $started_time = @$firstOrderTime->created_at;
                return response()->json([ 'success' => true, 'time' => 0 ] , 200);
            }


            $start  = new Carbon($started_time);
            $time_format_date = strtotime(date("H:i:s",strtotime($start)));
            $finalTime = date("H:i:s",strtotime('+'.$calculateTime.' minutes',$time_format_date));

            $start  = new Carbon($finalTime);
            $end    = new Carbon();

            
            $time = ($start->diffInHours($end) * 60) + ($start->diffInMinutes($end) * 60)+ ($start->diffInSeconds($end) * 1000);

            if($start < $end)  return response()->json([ 'success' => true, 'time' => $time, 'time_over' => true] , 200);
            return response()->json([ 'success' => true, 'time' => $time, 'time_over' => false] , 200);
        }else{
            return response()->json([ 'success' => false, 'time' => 0, 'time_over' => false ] , 200);
        }
    }

    public function changeFloorList(Request $req)
    {
        $orderId = $req->order_id;

        $order = Order::where('id', $orderId)->first();

        $tableId = $order->table_id;

        $floor_id = Table::find($tableId)->floor_id;

        $person = $order->person;
        $from_cap = intval($person);
        if($from_cap < 4) $to_cap = intval(ceil($person * 2));
        else $to_cap = intval(ceil($person * 1.5));

        $floorId = Table::where('capacity_of_person','>=',$from_cap)->where('capacity_of_person','<=',$to_cap)->whereRestaurantId(Auth::user()->restaurant_id)->where('floor_id','!=',$floor_id)->pluck('floor_id');

        $floorlist = Floor::with(['activetables' => function($q){
            $q->withCount([
                'orders' => function ($z){
                    $z->where('finished', 0)->whereRestaurantId(Auth::user()->restaurant_id);
                }
            ]);
        }])->whereHas('activetables')->whereRestaurantId(Auth::user()->restaurant_id)->whereIn('id',$floorId)->select('id', 'name')->get();

        foreach ($floorlist as $key => $floors) {
            foreach ($floors->activetables as $key => $table) {
                $floors['orders_count'] = $floors['orders_count'] + $table->orders_count;
            }
        }

        return response()->json(['floorlist' => $floorlist]);
    }

    public function addMinutesInOrder(Request $req)
    {
        $order = Order::find($req->orderId);
        $finish_time = $order->finish_time + $req->minutes;
        $order->update(['finish_time' => $finish_time]);
        return true;
    }

    public function getTableListFloorWise(){
        $restaurantId = CustomerHelper::getRestaurantId();

        $floors = Floor::with(['tables.orders' => function ($query) {
            $query->where('finish_time', '=', null)->where('finished', '=', 0)->latest()->with('kots.kotProducts');
        }, 'tables.color'])
        ->where('restaurant_id', $restaurantId)
        ->get();

        $currentDateTime = now();

        $transformedFloors = $floors->map(function ($floor) use ($currentDateTime) {
            return [
                'id' => $floor->id,
                'name' => $floor->name,
                'short_cut' => $floor->short_cut,
                'tables' => $floor->tables->map(function ($table) use ($currentDateTime) {
                    $orderData = null;
                    if ($table->orders->isNotEmpty()) {
                        $order = $table->orders->first();
                        $orderStartTime = new DateTime($order->start_time); // Convert string to DateTime
                        $orderDuration = $currentDateTime->diff($orderStartTime);
                        
                        if ($orderDuration->h >= 1) {
                            $formattedDuration = $orderDuration->format('%h hrs %i minutes');
                        } elseif ($orderDuration->i >= 1) {
                            $formattedDuration = $orderDuration->format('%i minutes');
                        } else {
                            $formattedDuration = 'just now';
                        }

                        $orderData = [
                            'id' => $order->id,
                            'person' => $order->person,
                            'total_price' => $order->total_price,
                            'start_time' => $orderStartTime->format('H:i'), // Format the start time
                            'duration' => $formattedDuration,
                        ];
                    }
                    $holdKOTDataAvailable = false;
                    if($table->kotHold){
                        $holdKOTDataAvailable = true;
                    }

                    return [
                        'id' => $table->id,
                        'table_number' => $table->table_number,
                        'capacity_of_person' => $table->capacity_of_person,
                        'status' => $table->status,
                        'color' => $table->color->color,
                        'rgb' => $table->color->rgb,
                        'order' => $orderData,
                        'holdKotAvailable' => $holdKOTDataAvailable
                    ];
                }),
            ];
        });
        return response()->json($transformedFloors);

    }

    public function addUpdateTable(Request $req){
        $rules = [];
        $rules['table_number'] = 'required|numeric';
        $rules['capacity_of_person'] = 'required|numeric';
        $rules['status'] = 'required';
        $rules['floor_id'] = 'required';
        $rules['color_id'] = 'required';
        $rules['finish_order_time'] = 'required';

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $requestData = $req->all();
        
        $restaurantId = CustomerHelper::getRestaurantId();
        $requestData['restaurant_id'] = $restaurantId;

        if(isset($requestData['id'])) {
            $table = Table::findOrFail($requestData['id']);
            $table->update($requestData);
        } else {
            Table::create($requestData);
        }
        
        return response()->json(['message' => 'Table added/updated successfully'], 200);
    }

}
