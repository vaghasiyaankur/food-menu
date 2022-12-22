<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Kutia\Larafirebase\Facades\Larafirebase;
use Notification;
use App\Notifications\SendPushNotification;

class NotificationController extends Controller
{
    public function updateToken(Request $request){
        try{
            // $request->user()->update(['fcm_token'=>$request->token]);
            $request->session()->put('device_token',$request->token);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }

    public function notification(Request $request){
        // $request->validate([
        //     'title'=>'required',
        //     'message'=>'required'
        // ]);
    
        try{
            $token = $request->session()->put('device_token',$request->token);

            if($token){
                $fcmTokens = ['c16H1_gwueT8jzmm2w_cTn:APA91bGjH092huMhvCN4Cejb84y1Y_CxzdbLrxIwyLucbUCyX4v1gl2O6oYcVaSm0ncnYhD9mbFlKVmvAgVzeePzLN5yhn0PG1esfjo0P1mrR0RUXb_W4sQII_GfcZoXodUmsqc-Kg0m'];
        
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

    public function notification1()
    {
        $fcmTokens = ['c16H1_gwueT8jzmm2w_cTn:APA91bGjH092huMhvCN4Cejb84y1Y_CxzdbLrxIwyLucbUCyX4v1gl2O6oYcVaSm0ncnYhD9mbFlKVmvAgVzeePzLN5yhn0PG1esfjo0P1mrR0RUXb_W4sQII_GfcZoXodUmsqc-Kg0m'];
        // dd(new SendPushNotification('$title','$message',$fcmTokens));
        dd(Notification::send(null,new SendPushNotification('$title','$message',$fcmTokens)));

    }
}


?>