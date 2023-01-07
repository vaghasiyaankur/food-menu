<?php

namespace App\Http\Controllers\Manager;

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
use Illuminate\Support\Facades\Auth;

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
        $setting = Setting::whereUserId(Auth::id())->first();
        $highlight_time = @$setting->highlight_on_off ? @$setting->highlight_time : 0;
        $highlight_time_on_off = @$setting->highlight_on_off;

        $groundFloorId = Floor::whereUserId(Auth::id())->first()->id;

        $tables = Table::with(['color','orders.customer', 'floor','orders'=>function($q){
            $q->where('finished', 0)->whereUserId(Auth::id())->orderBy('updated_at', 'ASC');
        }])->withCount([
            'orders' => function ($z){
                $z->where('finished', 0)->whereUserId(Auth::id());
            }
        ])->whereUserId(Auth::id())->where('floor_id', $groundFloorId)->where('status', 1)->orderBy('orders_count', 'DESC')->get();

        $floorlist = Floor::with(['activetables' => function($q){
            $q->withCount([
                'orders' => function ($z){
                    $z->where('finished', 0)->whereUserId(Auth::id());
                }
            ]);
        }])->whereHas('activetables')->whereUserId(Auth::id())->select('id', 'name')->get();

        foreach ($floorlist as $key => $floors) {
            foreach ($floors->activetables as $key => $table) {
                $floors['orders_count'] = $floors['orders_count'] + $table->orders_count;
            }
        }

        foreach($tables as $tkey=>$table){
            foreach($table->orders as $okey=>$order){
                $tables[$tkey]['orders'][$okey]['reservation_time'] = date('h:i', strtotime($order->updated_at));
                $tables[$tkey]['orders'][$okey]['reservation_time_12_format'] = date('g:i a', strtotime($order->updated_at));
                $tables[$tkey]['orders'][$okey]['is_ongoing_order'] = $okey == 0;
                $tables[$tkey]['orders'][$okey]['is_new_order_timing'] = $okey != 0 && strtotime($order->created_at) == strtotime($order->updated_at) && $order->created_at->diffInSeconds(Carbon::now()) < ($highlight_time * 60);
                $tables[$tkey]['orders'][$okey]['new_order_timing'] = $order->updated_at->diffInSeconds(Carbon::now());
                $tables[$tkey]['orders'][$okey]['is_order_moved'] = strtotime($order->created_at) != strtotime($order->updated_at) && $order->updated_at->diffInSeconds(Carbon::now()) < ($highlight_time * 60);
                $tables[$tkey]['orders'][$okey]['order_moved'] = $order->updated_at->diffInSeconds(Carbon::now());
            }
        }

        $total_table_number = Table::whereUserId(Auth::id())->where('status', 1)->count();
        $table_list_with_order = Table::whereUserId(Auth::id())->select('id')->where('status', 1)->withCount('orders')->get();
        $count = 0;
        foreach($table_list_with_order as $tlwo){
            if($tlwo->orders_count == 0) $count += 1;
        }
        $max_table_cap = Table::whereUserId(Auth::id())->where('floor_id', $groundFloorId)->where('status', 1)->max('capacity_of_person');
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
        $fromTableId = Order::where('id', $request->id)->first()->table_id;
        $toTableId = $request->table_number;
        $tableShiftHistory = new TableShiftHistory();
        $tableShiftHistory->order_id = @$request->id;
        $tableShiftHistory->from = $fromTableId;
        $tableShiftHistory->to = $toTableId;
        $tableShiftHistory->save();

        Order::where('id', $request->id)->update(['table_id' => $request->table_number]);

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

        $setting = Setting::whereUserId(Auth::id())->first();
        $highlight_time = @$setting->highlight_on_off ? @$setting->highlight_time : 0;
        // $highlight_time_on_off = @$setting->highlight_on_off;

        $tables = Table::with(['color','orders.customer', 'floor','orders'=>function($q){
            $q->where('finished', 0)->whereUserId(Auth::id())->orderBy('updated_at', 'ASC');
        }])->withCount([
            'orders' => function ($z){
                $z->where('finished', 0)->whereUserId(Auth::id());
            }
        ])->where('floor_id', $request->id)->whereUserId(Auth::id())->where('status', 1)->orderBy('orders_count', 'DESC')->get();

        foreach($tables as $tkey=>$table){
            foreach($table->orders as $okey=>$order){
                $tables[$tkey]['orders'][$okey]['reservation_time'] = date('h:i', strtotime($order->updated_at));
                $tables[$tkey]['orders'][$okey]['reservation_time_12_format'] = date('g:i a', strtotime($order->updated_at));
                $tables[$tkey]['orders'][$okey]['is_ongoing_order'] = $okey == 0;
                $tables[$tkey]['orders'][$okey]['is_new_order_timing'] = $okey != 0 && strtotime($order->created_at) == strtotime($order->updated_at) && $order->created_at->diffInSeconds(Carbon::now()) < ($highlight_time * 60);
                $tables[$tkey]['orders'][$okey]['new_order_timing'] = $order->updated_at->diffInSeconds(Carbon::now());
                $tables[$tkey]['orders'][$okey]['is_order_moved'] = strtotime($order->created_at) != strtotime($order->updated_at) && $order->updated_at->diffInSeconds(Carbon::now()) < ($highlight_time * 60);
                $tables[$tkey]['orders'][$okey]['order_moved'] = $order->updated_at->diffInSeconds(Carbon::now());
            }
        }

        $floorlist = Floor::with(['activetables' => function($q){
            $q->withCount([
                'orders' => function ($z){
                    $z->whereUserId(Auth::id())->where('finished', 0);
                }
            ]);
        }])->whereHas('activetables')->select('id', 'name')->whereUserId(Auth::id())->get();

        foreach ($floorlist as $key => $floors) {
            foreach ($floors->activetables as $key => $table) {
                $floors['orders_count'] = $floors['orders_count'] + $table->orders_count;
            }
        }

        $total_table_number = Table::whereUserId(Auth::id())->where('status', 1)->count();
        $table_list_with_order = Table::whereUserId(Auth::id())->select('id')->where('status', 1)->withCount('orders')->get();
        $count = 0;
        foreach($table_list_with_order as $tlwo){
            if($tlwo->orders_count == 0) $count += 1;
        }

        $current_capacity = (100 - ($count / $total_table_number * 100));
        $max_table_cap = Table::whereUserId(Auth::id())->where('floor_id', $request->id)->where('status', 1)->max('capacity_of_person');
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

        $table_id = ReservationHelper::takeTable($request->floor_id, $person);

        if($table_id == 0) return response()->json([ 'success' => false, 'message' => 'not compatible capacity table in this floor' ] , 200);

        $fromTableId = Order::where('id', $request->id)->first()->table_id;
        $fromFloorId = Table::where('id', $fromTableId)->with('floor')->first();
        $toFloorId = Table::where('id', $table_id)->first();

        $floorShiftHistory = new FloorShiftHistory();
        $floorShiftHistory->order_id = @$request->id;
        $floorShiftHistory->from = @$fromFloorId->floor->name;
        $floorShiftHistory->to = @$toFloorId->floor->name;
        $floorShiftHistory->save();

        Order::where('id', $request->id)->update(['table_id' => $table_id]);

        return response()->json([ 'success' => true, 'message' => 'success' ] , 200);
    }

    /**
     * order transfer to another floor
     *
     * @return @json ($tables)
     *
     */
    public function finishNext(Request $request)
    {
        Order::where('id', $request->id)->update(['finished' => 1,'finish_at' => Carbon::now()]);

        $userId = Auth::id();

        $table_id = Order::where('id', $request->id)->whereUserId($userId)->first()->table_id;


        $next = Order::where('table_id', $table_id)->whereNull('start_time')->whereUserId($userId)->where('finished', 0)->orderBy('updated_at', 'ASC')->first();
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

            Larafirebase::withTitle('Food-menu Restaurant')
            ->withBody('Your Turn Now !!!')
            ->sendMessage($fcmTokens);
           // // return redirect()->back()->with('success','Notification Sent Successfully!!');

           try {

            $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Vonage\Client($basic);

            $receiverNumber = "447498173567";     // link : https://receive-smss.com/sms/447498173567/
            // $receiverNumber = $customer->number;
            $message = "Food-Menu : Your Turn Now!!";

            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'Food-Menu Restaurent',
                'text' => $message
            ]);

            }
            catch (Exception $e) {
                // dd("Error: ". $e->getMessage());
            }

        }

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
        $updated_at = Order::where('id', $orderId)->first()->updated_at;

        $userId = Auth::id();

        if($table_id){
            $allOrder = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->where('finished', 0)->where('updated_at', '<=', $updated_at)->select('id', 'table_id', 'start_time', 'finish_time', 'finished', 'updated_at')->whereUserId($userId)->get();

            $calculateTime = 0;

            foreach($allOrder as $order){
                $calculateTime += $order->finish_time;
            }

            $firstOrderTime = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->whereUserId($userId)->where('finished', 0)->where('updated_at', '<=', $updated_at)->whereNotNull('start_time')->first();
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

}
