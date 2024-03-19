<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QrCodeToken;
use Carbon\Carbon;
use ParagonIE\ConstantTime\Encoding;

class QrCodeTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Carbon::now()->daysInMonth == '31') $duration = [8,8,8,7];
        else if(Carbon::now()->daysInMonth == '30') $duration = [8,8,7,7];
        else if(Carbon::now()->daysInMonth == '29') $duration = [8,7,7,7];
        else $duration = [7,7,7,7];

        $user_ids = [1,2];

        foreach ($user_ids as $key => $user_id) {
            foreach($duration as $key=>$dur){

                $cal_of_start = 0;
                if($key != 0) $cal_of_start = $key * $duration[$key - 1];
                $startDate = Carbon::now()->startOfMonth()->addDays($cal_of_start);
                $startDuration = Carbon::now()->startOfMonth()->addDays($cal_of_start);

                $endDuration = $startDate->addDays($dur - 1);

                $data = random_bytes(32);
                $encode = Encoding::base64Encode($data);

                $qr = new QrCodeToken();
                $qr->start_date = date('Y-m-d', strtotime($startDuration));
                $qr->end_date = date('Y-m-d', strtotime($endDuration));
                $qr->token = str_replace("+", "0", $encode);
                $qr->restaurant_id = $user_id;
                $qr->save();
            }
        }
    }
}
