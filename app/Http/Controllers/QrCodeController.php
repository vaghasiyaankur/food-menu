<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;
use App\Models\QrCodeToken;
use ParagonIE\ConstantTime\Encoding;
use Carbon\Carbon;

class QrCodeController extends Controller
{
    public function index()
    {
        // $start = Carbon::create(2019, 2, 25);

        // $end = Carbon::create(2022, 8, 25);

        // $diff = $start->diffInMonths($end);

        // for($i=0; $i<$diff; $i++){
        //     if($i == 0){
        //         $this->setQrCodeMonthly(date('Y-m-d', strtotime($start)));
        //     }
        //     $date = date('Y-m-d', strtotime($start->addMonth(1)));
        //     $this->setQrCodeMonthly($date);
        // }
                
        $qrcodes = QrCodeToken::paginate(10);
        $qrcodexml = [];
        foreach($qrcodes as $key=>$qr){
            $qrcodexml[$qr->id] = QrCode::size(300)->generate($qr->token);
        }

        return view('qrcode', compact('qrcodes', 'qrcodexml'));
    }


    public function setQrCodeMonthly($date)
    {

        if(Carbon::parse($date)->daysInMonth == '31') $duration = [8,8,8,7];
        else if(Carbon::parse($date)->daysInMonth == '30') $duration = [8,8,7,7];
        else if(Carbon::parse($date)->daysInMonth == '29') $duration = [8,7,7,7];
        else $duration = [7,7,7,7];
        
        foreach($duration as $key=>$dur){

            $cal_of_start = 0;
            if($key != 0) $cal_of_start = $key * $duration[$key - 1];  
            $startDate = Carbon::parse($date)->startOfMonth()->addDays($cal_of_start);
            $startDuration = Carbon::parse($date)->startOfMonth()->addDays($cal_of_start);
            $cal_of_end = ($key + 1) * $dur - 1;  
            $endDuration = $startDate->addDays($dur - 1);

            $data = random_bytes(32);
            $encode = Encoding::base64Encode($data);

            $qr = new QrCodeToken();
            $qr->start_date = date('Y-m-d', strtotime($startDuration));
            $qr->end_date = date('Y-m-d', strtotime($endDuration));
            $qr->token = $encode;
            $qr->save();
        }
    }
}
