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
use App\Models\Content;
use App\Models\QrCodeToken;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Parser\Inline\NewlineParser;
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
        // Check permission for adding reservation
        $checkPermission = ReservationHelper::checkPermissionForAdd($request->role, $request->qrToken);
        if (!$checkPermission['status']) {
            return response()->json(['error' => $checkPermission['message']], 401);
        }

        $restaurant_id = $checkPermission['restaurant_id'];

        $table_id = ReservationHelper::takeTable($request->floor, $request->person, $restaurant_id);

        $orderExists = Order::where('table_id', $table_id)
                        ->whereRestaurantId($restaurant_id)
                        ->whereNotNull('start_time')
                        ->where('finished', 0)
                        ->doesntExist();
                        
        if($table_id){
            $table = Table::where('id', $table_id)->first();
            $register = new Customer();
            $register->name = $request->customer_name;
            $register->number = $request->customer_number;
            $register->agree_condition = $request->agree_condition;
            $register->restaurant_id = $restaurant_id;
            $register->device_token = @$request->session()->get('device_token');
            if($register->save()){
                $order = new Order();
                $order->customer_id = $register->id;
                $order->table_id = $table_id;
                $order->person = $request->person;
                if ($orderExists) {
                    $order->start_time = Carbon::now();
                }
                $order->role = $request->role;
                $order->finish_time = $table->finish_order_time;
                $order->finished = 0;
                $order->restaurant_id = $restaurant_id;
                $order->save();

                broadcast(new NewReservation($order,$restaurant_id))->toOthers();
            }

            $count = Order::where('table_id', $order->table_id)->whereRestaurantId($restaurant_id)->whereNotNull('start_time')->where('finished', 0)->count();
            if(!$count){
                $next = Order::where('table_id', $table_id)->whereRestaurantId($restaurant_id)->whereNull('start_time')->where('finished', 0)->orderBy('updated_at', 'ASC')->first();
                $update_date = @$next->updated_at;
                if($next)  $next->update(['start_time' => \Carbon\Carbon::now()]);
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
            // dd(getenv('NEXMO_DEFAULT_NUMBER'));
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
            }



            // try {

                // $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
                // $client = new \Vonage\Client($basic);

                // $receiverNumber = "447498173567";
                // $message = "Food-Menu : Your Turn Now!!";

                // $message = $client->message()->send([
                //     'to' => $receiverNumber,
                //     'from' => 'Vonage APIs',
                //     'text' => $message
                // ]);

            // } catch (Exception $e) {
            //     dd("Error: ". $e->getMessage());
            // }



            return response()->json(['success' => 'registration added successfully.', 'orderId' => $order->id, 'restaurant_id' => $register->id]);
        }else{
            $langs = Language::whereStatus(1)->pluck('id')->toarray();
            $lang_id = request()->session()->get('lang');
            $langId = in_array($lang_id, $langs) ? $lang_id : SettingHelper::systemLang();
            $content = Content::where('language_id', $langId)->where('title', 'capacity_error')->first();
            $message = $content ? $content->content : "We don't have a table for that many people. Please contact the restaurant manager.";
            return response()->json(['error' => $message], 401);
        }
    }

    /**
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
        $closeReservation = Setting::where('restaurant_id', auth()->user()->restaurant_id)
                            ->value('close_reservation');
                            
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
        // Update close_reservation setting for the current restaurant
        Setting::where('restaurant_id', Auth::user()->restaurant_id)->update(['close_reservation' => $request->reservation]);

        // Fetch the updated close_reservation setting for the current restaurant
        $closeReservation = Setting::where('restaurant_id', Auth::user()->restaurant_id)->value('close_reservation');

        // Return the close_reservation setting in the response
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
        $restaurant_id = Auth::user()->restaurant_id;
        if ($request->qrToken != 'undefined' && $request->role == 'Guest') {
            $qrcode_token = $request->qrToken;
            $date = Carbon::now()->format('Y-m-d');
            $qrcode = QrCodeToken::whereToken($qrcode_token)->where('start_date', '<=', $date)->where('end_date', '>=', $date)->first();
            if (!$qrcode) {
                return response()->json(['error' => 'Reservation Fail.'], 401);
            }else{
                $restaurant_id = $qrcode->restaurant_id;
            }
        }

        $table_id = ReservationHelper::takeTable($request->floor, $request->person, $restaurant_id);

        if($table_id){
            $allOrder = Order::whereRestaurantId($restaurant_id)->where('table_id', $table_id)->where('finished', 0)->select('id', 'table_id', 'start_time', 'finish_time', 'finished')->get();
            $calculateTime = 0;
            foreach($allOrder as $order){
                if($order->start_time){
                    $start  = new Carbon($order->start_time);
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
            $langs = Language::whereStatus(1)->pluck('id')->toarray();
            $lang_id = request()->session()->get('lang');
            $langId = in_array($lang_id, $langs) ? $lang_id : SettingHelper::systemLang();
            $content = Content::where('language_id', $langId)->where('title', 'capacity_error')->first();
            $message = $content ? $content->content : "We don't have a table for that many people. Please contact the restaurant manager.";
            return response()->json(['success' => false, 'message' => $message], 200);
        }
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
            $allOrder = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->where('finished', 0)->where('created_at', '<=', $created_at)->select('id', 'table_id', 'start_time', 'finish_time', 'finished', 'updated_at')->get();
            $calculateTime = 0;
            foreach($allOrder as $order){
                // if($order->start_time){
                //     $start  = new Carbon($order->start_time);
                //     $end    = new Carbon();
                //     $calculateTime += $order->finish_time;
                // }else{
                    $calculateTime += $order->finish_time;
                // }
            }
            $firstOrderTime = Order::where('table_id', $table_id)->where('id', '!=', $orderId)->where('finished', 0)->where('created_at', '<=', $created_at)->whereNotNull('start_time')->first();
            if($firstOrderTime){
                $started_time = $firstOrderTime->start_time;
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

        $reservation = $reservation->select('id','customer_id','person','start_time','finish_time','finished','deleted_at','restaurant_id')->selectRaw('DATE_FORMAT(created_at,"%d, %b %Y / %h:%i %p") as date');

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
            } , 'floorShiftHistory', 'tableShiftHistory'])->select('id','customer_id','person','start_time','finish_time','finished','cancelled_by', 'role','deleted_at')->selectRaw('DATE_FORMAT(created_at,"%d, %b %Y / %h:%i %p") as date')->withTrashed()->findOrFail($request->id);

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
        $setting = Setting::whereRestaurantId($restaurant_id)->first();
        $close_reservation = $setting->close_reservation;
        if ($close_reservation == 0) {
            $open_time = Carbon::create($setting->open_time);
            $close_time = Carbon::create($setting->close_time);
            $current_time = Carbon::now();
            if (!$current_time->isBetween($open_time, $close_time)) {
                $close_reservation = 1;
            }
        }
        return response()->json([ 'close_reservation' => $close_reservation ] , 200);
    }

}
