<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\TableShiftHistory;
use App\Models\FloorShiftHistory;
use App\Models\Setting;
use App\Models\Table;
use App\Models\Language;
use App\Models\Floor;
use Illuminate\Http\Request;
use App\Helper\ReservationHelper;
use Carbon\Carbon;
use Kutia\Larafirebase\Facades\Larafirebase;
use Validator;
use App\Events\NewReservation;
use App\Helper\SettingHelper;
use App\Helper\CustomerHelper;
use App\Helper\LanguageHelper;
use App\Helper\OrderHelper;
use App\Models\Content;
use App\Models\QrCodeToken;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;

class ReservationController extends Controller
{
    /**
     * Add Reservation
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addReservation(Request $request)
    {
        $checkPermission = ReservationHelper::checkPermissionForAdd($request->role, $request->qrToken);
        if (!$checkPermission['status']) {
            return response()->json(['error' => $checkPermission['message']], 401);
        }

        $restaurantId = $checkPermission['restaurant_id'];

        $tableId = ReservationHelper::takeTable($request->floor, $request->person, $restaurantId);

        $orderExists = Order::where('table_id', $tableId)
                        ->whereRestaurantId($restaurantId)
                        ->whereNotNull('start_at')
                        ->where('finished', 0)
                        ->doesntExist();
        if($tableId){
            $table = Table::where('id', $tableId)->first();

            $customerData = [
                'customer_name' => $request->customer_name,
                'customer_number' => $request->customer_number,
                'agree_condition' => $request->agree_condition,
                'restaurant_id' => $restaurantId,
                'device_token' => $request->session()->get('device_token', null),
            ];
            
            if($register = CustomerHelper::createCustomer($customerData)) {
                $orderData = [
                    'customer_id' => $register->id,
                    'table_id' => $tableId,
                    'person' => $request->person,
                    'email' => $request->email,
                    'orderExists' => $orderExists, 
                    'role' => $request->role,
                    'finish_time' => $table->finish_order_time,
                    'finished' => 0,
                    'restaurant_id' => $restaurantId,
                ];

                $order = OrderHelper::createOrder($orderData);

                if($order)
                    broadcast(new NewReservation($order,$restaurantId))->toOthers();

            }

            $orderExist = OrderHelper::CheckOrderExistParticularTable($order->table_id, $restaurantId); 
            if(!$orderExist){
                $nextOrder = OrderHelper::nextOrder($tableId, $restaurantId);

                $update_date = @$nextOrder->updated_at;

                if($nextOrder)  
                    $nextOrder->update(['start_at' => \Carbon\Carbon::now(), 'updated_at' => $update_date]);


                // $token = $request->session()->get('device_token');
                $customerId = @$nextOrder->customer_id;
                $customer = CustomerHelper::getCustomer($customerId);

                $token = @$customer->device_token;

                if($token){
                    $fcmTokens = [$token];
                    OrderHelper::sendBrowserNotification($fcmTokens, $request->title, $request->message);
                }

                try {
                    $messageNotification = "Food-Menu : Your Turn Now!!";
                    OrderHelper::sendMobileNotification($messageNotification);
                }
                catch (\Exception $e) {
                    // dd("Error: ". $e->getMessage());
                }
            }
            
            return response()->json([
                'success' => 'registration added successfully.', 
                'orderId' => $order->id, 
                'restaurant_id' => $register->id
            ]);

        }else{
            $message = $this->doesNotHaveTableForThatManyPeopleError();
            return response()->json(['error' => $message], 401);
        }
    }

    /**   Testing Purpose
     * Set Notification for order
     *
     * @return @json ($close_reservation = 0 or 1)
     *
     */
    public function notification(Request $request){
        // $request->validate([
        //     'title'=>'required',
        //     'message'=>'required'
        // ]);

        try{
            $token = $request->session()->put('device_token',$request->token);

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
                // dd($test);
                // return redirect()->back()->with('success','Notification Sent Successfully!!');
            }

        }catch(\Exception $e){
            report($e);
            dd($e);
            // return redirect()->back()->with('error','Something goes wrong while sending notification.');
        }
    }

    /**
     * Check Reservation is open or close
     *
     * @return @json ($close_reservation = 0 or 1)
     *
     */
    public function checkReservation()
    {
        $closeReservation = SettingHelper::getData('close_reservation');
                            
        return response()->json(['close_reservation' => $closeReservation], 200);
    }

    /**
     * Check Reservation is open or close
     *
     * @return @json ($close_reservation = 0 or 1)
     *
     */
    public function changeReservation(Request $request)
    {
        
        SettingHelper::updateData(['close_reservation'=> $request->reservation]);

        $closeReservation = SettingHelper::getData('close_reservation');

        return response()->json(['close_reservation' => $closeReservation], 200);
    }

    /**
     * Waiting Time for order
     *
     * @return @json ($time = 1:00)
     *
     */
    public function checkTime(Request $request)
    {
        $restaurant_id = @Auth::user()->restaurant_id;
        if ($request->qrToken != 'undefined' && $request->role == 'Guest') {
            $qrcode_token = $request->qrToken;
            $date = Carbon::now()->format('Y-m-d');
            $qrcode = QrCodeToken::whereToken($qrcode_token)->where('start_date', '<=', $date)->where('end_date', '>=', $date)->first();
            if (!$qrcode && !$restaurant_id) {
                return response()->json(['error' => 'Reservation Fail.'], 401);
            }else{
                $restaurant_id = $qrcode->restaurant_id;
            }
        }

        $table_id = ReservationHelper::takeTable($request->floor, $request->person, $restaurant_id);

        if($table_id){
            $allOrder = Order::whereRestaurantId($restaurant_id)->where('table_id', $table_id)->where('finished', 0)->select('id', 'table_id', 'start_at', 'finish_time', 'finished')->get();
            $calculateTime = 0;
            foreach($allOrder as $order){
                if($order->start_at){
                    $start  = new Carbon($order->start_at);
                    $end    = new Carbon();
                    $calculateTime += $order->finish_time - $start->diffInMinutes($end);
                }else{
                    $calculateTime += $order->finish_time;
                }
            }
            if($calculateTime < 0) $calculateTime = 0;
            $checkTime = date('H', mktime(0,$calculateTime));
            if($checkTime == "0"){
                $hour_min = 'Minutes';
            }else{
                $hour_min = 'Hours';
            }
            $waiting_time = date('H:i', mktime(0,$calculateTime));
            return response()->json([ 'success' => true, 'waiting_time' => $waiting_time , 'hour_min' => $hour_min ] , 200);
        }else{
            $message = $this->doesNotHaveTableForThatManyPeopleError();
            return response()->json(['success' => false, 'message' => $message], 200);
        }
    }

    /**
     * Passed the error message for table not exist for that many people
     *
     * @return @string ($message)
     *
     */
    public function doesNotHaveTableForThatManyPeopleError(){
        $langs = LanguageHelper::languageIdArray();
        $lang_id = request()->session()->get('lang');
        $langId = in_array($lang_id, $langs) ? $lang_id : SettingHelper::systemLang();

        $content = Content::where('language_id', $langId)
                            ->where('title', 'capacity_error')
                            ->first();

        $message = $content->content ?? "We don't have a table for that many people. Please contact the restaurant manager.";
        return $message;
    }

    /**
     * Flor List On Member Capacity
     *
     * @return @json ($floors)
     *
     */
    public function floorAvailable(Request $request)
    {
        // $table_id = ReservationHelper::takeTable($request->floor, $request->person);

        // $table = Table::where('status', 1)->where('capacity_of_person', intval($request->member))->first();
        $from_cap = intval($request->member);

        $restaurant_id = SettingHelper::getUserIdUsingQrcode();
        $restaurant_id = $restaurant_id ? $restaurant_id : Auth::user()->restaurant_id;

        if($from_cap < 4) $to_cap = intval(ceil($request->member * 2));
        else $to_cap = intval(ceil($request->member * 1.5));
        // if(!$table) {
        //     $table = Table::where('status', 1)->orderBy('capacity_of_person','ASC')->where('capacity_of_person', '>' , intval($request->member))->first();
        // }
        // if($table){
        //     $table_capacity = $table->capacity_of_person;
        $floors = Floor::whereHas('tables', function($q) use($from_cap,$to_cap){
                $q->where('capacity_of_person', '>=', $from_cap)->where('capacity_of_person', '<=', $to_cap)->where('status', 1);
            })->whereRestaurantId($restaurant_id)->pluck('name','id');

        return response()->json([ 'success' => true, 'floors' => $floors ] , 200);
        // }else{
        //     return response()->json([ 'success' => true, 'floors' => []] , 200);
        // }
    }

    /**
     *  Show Waiting Time for order for user
     *
     * @return @json ($time)
     *
     */
    public function waitingTime(Request $request)
    {
        // $table_id = ReservationHelper::takeTable($request->floor, $request->person);
        $orderIds = $request->ids;
        $orderId = $orderIds[0];
        $order = Order::where('id', $orderId)->first();
        $table_id = @$order->table_id;
        $created_at = @$order->created_at;
        if($table_id){
            $allOrder = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->where('finished', 0)->where('created_at', '<=', $created_at)->select('id', 'table_id', 'start_at', 'finish_time', 'finished', 'updated_at')->get();
            $calculateTime = 0;
            foreach($allOrder as $order){
                // if($order->start_at){
                //     $start  = new Carbon($order->start_at);
                //     $end    = new Carbon();
                //     $calculateTime += $order->finish_time;
                // }else{
                    $calculateTime += $order->finish_time;
                // }
            }
            $firstOrderTime = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->where('finished', 0)->where('created_at', '<=', $created_at)->whereNotNull('start_at')->first();
            if($firstOrderTime){
                $started_time = $firstOrderTime->start_at;
            }else{
                $firstOrderTime = @$allOrder[0];
                $started_time = @$firstOrderTime->created_at;
            }
            $start  = new Carbon($started_time);
            $time_format_date = strtotime(date("H:i:s",strtotime($start)));
            $finalTime = date("H:i:s",strtotime('+'.$calculateTime.' minutes',$time_format_date));

            $start  = new Carbon($finalTime);
            $end    = new Carbon();
            if($start > $end) $time = ($start->diffInHours($end) * 60) + ($start->diffInMinutes($end) * 60)+ ($start->diffInSeconds($end) * 1000);
            else $time = 0;

            $finish = false;
            if($order->finish_at || $order->deleted_at) $finish = true;

            return response()->json([ 'success' => true, 'time' => $time, 'finish' => $finish, 'table' => $table_id] , 200);
        }else{
            $langs = Language::whereStatus(1)->pluck('id')->toarray();
            $lang_id = request()->session()->get('lang');
            $langId = in_array($lang_id, $langs) ? $lang_id : SettingHelper::systemLang();
            $content = Content::where('language_id', $langId)->where('title', 'capacity_error')->first();
            $message = $content ? $content->content : "We don't have a table for that many people. Please contact the restaurant manager.";
            $finish = true;
            return response()->json(['success' => false, 'message' => $message, 'finish' => $finish], 200);
        }
    }

    /**
     *  Show Waiting Order Data for order for user
     *
     * @return @json ($table)
     *
     */
    public function waitingOrderData(Request $request)
    {
        // $table_id = ReservationHelper::takeTable($request->floor, $request->person);
        $orderIds = $request->ids;
        $orderId = $orderIds[0];
        $table_id = Order::where('id', $orderId)->first()->table_id;
        if($table_id){
            $table = Table::with(['color',
                'floor' => function($q){
                    $q->select('id','name');
                },
                'orders' => function($q) use ($orderId){
                $q->where('id', $orderId);
            }])->where('id', $table_id)->first();
            
            return response()->json([ 'success' => true, 'table' => $table ] , 200);
        }else{
            $langs = Language::whereStatus(1)->pluck('id')->toarray();
            $lang_id = request()->session()->get('lang');
            $langId = in_array($lang_id, $langs) ? $lang_id : SettingHelper::systemLang();
            $content = Content::where('language_id', $langId)->where('title', 'capacity_error')->first();
            $message = $content ? $content->content : "We don't have a table for that many people. Please contact the restaurant manager.";
            return response()->json(['success' => false, 'message' => $message], 200);
        }
    }

    /**
     *  Check Order available in cookie or not
     *
     * @return @json (availableorder (true or false))
     *
     */

    public function checkOrder(Request $request)
    {
        $orderIds = $request->orderIds;
        $orderId = @$orderIds[0];
        if($orderId){
            $order = Order::where('id', @$orderId)->where('finished', 0)->first();

            if($order) $orderremaining = true;
            else $orderremaining = false;

            return response()->json([ 'orderremaining' => $orderremaining ] , 200);
        }else{
            $orderremaining = false;
            return response()->json([ 'orderremaining' => $orderremaining ] , 200);
        }
    }

    /**
     *  Cancel Reservation From user side
     *
     * @return @json (success message)
     *
     */

    public function cancelReservation(Request $request)
    {
        $orderIds = $request->ids;
        $cancel = $request->cancelled_by ? : 'Manager';
        foreach($orderIds as $orderId){
            Order::where('id', $orderId)->update(['cancelled_by' => $cancel]);
            Order::where('id', $orderId)->delete();
            $order = Order::withTrashed()->where('id', $orderId)->first();
            broadcast(new NewReservation($order,$order->restaurant_id))->toOthers();
        }
        return response()->json([ 'success' => true ] , 200);
    }

    /**
     *  Show List reservation (with date and search wise filter)
     *
     * @return @json (success message)
     *
     */

    public function reservationList(Request $request)
    {
        // $from_date = $request->from_date ? date('Y-m-d', strtotime($request->from_date)) : date('Y-m-d', strtotime(Carbon::now()));
        $from_date = $request->from_date ? date('Y-m-d', strtotime($request->from_date)) : '';
        $to_date = $request->to_date ? date('Y-m-d', strtotime($request->to_date)) : $from_date;
        $search = $request->search;

        $reservation = Order::withTrashed()->with(['customer' => function($q) {
            $q->select('id','name', 'number','restaurant_id')->whereRestaurantId(Auth::user()->restaurant_id);
        }]);

        if ($from_date && $to_date) {
            $reservation = $reservation->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date);
        }

        $reservation = $reservation->select('id','customer_id','name', 'phone','person','start_at','finish_time','finished','deleted_at','restaurant_id')->selectRaw('DATE_FORMAT(created_at,"%d, %b %Y / %h:%i %p") as date');

        if($request->search)
        $reservation = $reservation->where('id', $request->search)->orWhere(function ($orWhere) use ($search) {
            $orWhere->orWhereHas('customer',function($products) use ($search) {
                $products->where('name', 'like', '%' . $search . '%');
            });
        });
        $page = $request->page ? : 1;
        $reservation = $reservation->whereRestaurantId(Auth::user()->restaurant_id)->paginate(10);

        return response()->json([ 'reservation' => $reservation ] , 200);
    }

    /**
     *  Hard Remove Reservation through id
     *
     * @return @json (success message)
     *
     */

    public function removeReservation(Request $request)
    {
        FloorShiftHistory::where('order_id', $request->id)->delete();
        TableShiftHistory::where('order_id', $request->id)->delete();
        Order::where('id', $request->id)->forceDelete();
        return response()->json([ 'success' => 'Remove Reservation Successfully' ] , 200);
    }

    /**
     *  Reservation Detail For reservation Page
     *
     * @return @json (reservation details)
     *
     */

    public function reservationDetail(Request $request)
    {
            $order = Order::where('id', $request->id)->with(['customer' => function($q) {
                $q->select('id','name', 'number');
            } , 'floorShiftHistory', 'tableShiftHistory'])->select('id','customer_id','person','start_at','finish_time','finished','cancelled_by', 'role','deleted_at')->selectRaw('DATE_FORMAT(created_at,"%d, %b %Y / %h:%i %p") as date')->withTrashed()->findOrFail($request->id);

            $floorHistory = FloorShiftHistory::where('order_id', $request->id)->select('id','order_id', 'from', 'to', 'updated_at')->selectRaw('DATE_FORMAT(updated_at,"%h:%i:%s %p") as time')->get();

            $tableHistory = TableShiftHistory::where('order_id', $request->id)->select('id','order_id', 'from', 'to', 'updated_at')->selectRaw('DATE_FORMAT(updated_at,"%h:%i:%s %p") as time')->get();

            $reservation['order'] = $order;
            $reservation['floorHistory'] = $floorHistory;
            $reservation['tableHistory'] = $tableHistory;

            return response()->json([ 'reservation' => $reservation ] , 200);
    }

    /**
     *  Store Dvice Token For Notification
     *
     * @return @json (reservation details)
     *
     */

    public function setDeviceToken(Request $request)
    {
        Customer::where('id', $request->restaurant_id)->update(['device_token' => $request->token]);

        return response()->json([ 'success' => true ] , 200);
    }

    public function checkReservationEnabled(Request $request)
    {
        $restaurant_id = Auth::user() ? Auth::user()->restaurant_id : '';
        if ($request->qrcode != 'undefined') {
            $qrcode_token = $request->qrcode;
            $date = Carbon::now()->format('Y-m-d');
            $qrcode = QrCodeToken::whereToken($qrcode_token)->where('start_date', '<=', $date)->where('end_date', '>=', $date)->first();
            if ($qrcode) {
                $restaurant_id = $qrcode->restaurant_id;
            }
        }
        $setting = Setting::with(['restaurant' => function($query) {
            $query->select('id', 'operating_start_hours', 'operating_end_hours');
        }])
        ->whereRestaurantId($restaurant_id)
        ->first();

        $close_reservation = $setting->close_reservation;
        if ($close_reservation == 0) {
            $open_time = Carbon::create($setting->restaurant->operating_start_hours);
            $close_time = Carbon::create($setting->restaurant->operating_end_hours);
            $current_time = Carbon::now();
            if (!$current_time->isBetween($open_time, $close_time)) {
                $close_reservation = 1;
            }
        }
        return response()->json([ 'close_reservation' => $close_reservation ] , 200);
    }

    public function waiterList()
    {
        $waiters = User::whereRestaurantId(Auth::user()->restaurant_id)->whereRole('waiter')->get(['id', 'name']);
        return response()->json(['success' => true, 'waiters' => $waiters], 200);
    }

}
