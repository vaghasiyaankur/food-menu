<?php

namespace App\Helper;

use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;

/**
 * Helper class for handling orders and notifications.
 */
class OrderHelper
{   
    /**
     * Create a new order.
     *
     * @param array $data
     * @return Order | The created Order object
     */
    public static function createOrder(array $data)
    {
        $customer = Customer::find($data['customer_id']);
        $order = new Order();
        $order->customer_id = $data['customer_id'] ?? null;
        $order->table_id = $data['table_id'] ?? null;
        $order->person = $data['person'] ?? null;
        $order->email = $data['email'] ?? null;
        $order->name = $customer ? $customer->name : null;
        $order->phone = $customer ? $customer->number : null;
        if (isset($data['orderExists']) && $data['orderExists']) {
            $order->start_at = Carbon::now();
        }
        $order->role = $data['role'] ?? null;
        $order->finish_time = $data['finish_time'] ?? null;
        $order->finished = $data['finished'] ?? 0;
        $order->restaurant_id = $data['restaurant_id'] ?? null;
        $order->save();

        return $order;
    }

    /**
     * Check if an order exists for a particular table.
     *
     * @param int $tableId
     * @param int $restaurantId
     * @return count | The Count number of order existing in table
     */
    public static function CheckOrderExistParticularTable($tableId, $restaurantId){
        return Order::where('table_id', $tableId)
                        ->whereRestaurantId($restaurantId)
                        ->whereNotNull('start_at')
                        ->where('finished', 0)
                        ->count();
    }

    /**
     * Get the next order for a table.
     *
     * @param int $tableId
     * @param int $restaurantId
     * @return Order | The next order object for particular table
     */
    public static function nextOrder($tableId, $restaurantId){
        return Order::where('table_id', $tableId)
                        ->whereRestaurantId($restaurantId)
                        ->whereNull('start_at')
                        ->where('finished', 0)
                        ->orderBy('updated_at', 'ASC')
                        ->first();
    }

    /**
     * Send browser notification.
     *
     * @param array $fcmTokens
     * @param string $title
     * @param string $message
     * @return void
     */
    public static function sendBrowserNotification($fcmTokens, $title, $message){

        // Testing Purpose
        // $fcmTokens = ['c16H1_gwueT8jzmm2w_cTn:APA91bGjH092huMhvCN4Cejb84y1Y_CxzdbLrxIwyLucbUCyX4v1gl2O6oYcVaSm0ncnYhD9mbFlKVmvAgVzeePzLN5yhn0PG1esfjo0P1mrR0RUXb_W4sQII_GfcZoXodUmsqc-Kg0m'];


        //Notification::send(null,new SendPushNotification($request->title,$request->message,$fcmTokens));

        /* or */

        //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

        /* or */

        // Larafirebase::withTitle('Food-menu Restaurant')
        // ->withBody('Your Turn Now !!!')
        // ->sendMessage($fcmTokens);
        // return redirect()->back()->with('success','Notification Sent Successfully!!');
    }

    /**
     * Send mobile notification.
     *
     * @param string $messageNotification
     * @return void
     */
    public static function sendMobileNotification($messageNotification){

        $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
        $client = new \Vonage\Client($basic);
        // dd(getenv('NEXMO_DEFAULT_NUMBER'));
        //  $receiverNumber = ;     link : https://receive-smss.com/sms/447498173567/
        // $receiverNumber = $customer->number;
        

        // $message = $client->message()->send([
        //     'to' => getenv("NEXMO_DEFAULT_NUMBER"),
        //     'from' => getenv('NEXMO_REGISTER_NUMBER'),
        //     'text' => $messageNotification
        // ]);



        // Testing Purpose 
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
    }

    public static function orderUpdate($request, $restaurantId, $counter, $table = null)
    {
        $data = ['email' => $request->personEmail];

        $commonData = [
            'person' => $request->numberOfPerson,
            'phone' => $request->personNumber,
            'name' => $request->personName,
            'address' => $request->personAddress,
            'locality' => $request->personLocality,
            'note' => $request->orderNote,
            'waiter_id' => $request->selectWaiter,
            'discount_amount' => $request->discountAmount,
        ];

        $commonArray = [
            'table_id' => $request->tableId,
            'restaurant_id' => $restaurantId,
            'start_at' => date('Y-m-d H:i:s'),
        ];

        switch ($counter) {
            case 4:
                $data = array_merge($data, $commonArray, [ 'finish_time' => $table->finish_order_time ]);
                break;
            case 3:
                $data = array_merge($data, $commonArray);
                break;
            case 11:
                $data = array_merge($data, $commonData, [ 'total_price' => $request->subTotal, 'payable_amount' => $request->payableAmount]);
                break;
            case 12:
                $data = array_merge($data, $commonData, [ 'discount_type' => $request->discountType ?? 'fixed' ]);
                break;
        }
        return Order::updateOrCreate(['email' => $request->personEmail], $data);
    }
}
