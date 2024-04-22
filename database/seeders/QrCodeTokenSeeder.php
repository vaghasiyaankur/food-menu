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

        foreach ($user_ids as $user_id) {
            $startDate = Carbon::now()->startOfMonth(); // Reset start date for each user
            foreach ($duration as $dur) {
                $endDuration = $startDate->copy()->addDays($dur - 1); // Calculate end date based on duration
        
                $data = random_bytes(32);
                $encode = Encoding::base64Encode($data);
        
                $qr = new QrCodeToken();
                $qr->start_date = $startDate->toDateString(); // Convert Carbon instance to date string
                $qr->end_date = $endDuration->toDateString(); // Convert Carbon instance to date string
                $qr->token = str_replace("+", "0", $encode);
                $qr->restaurant_id = $user_id;
                $qr->save();
        
                // Move start date to next duration
                $startDate->addDays($dur);
            }
        }
    }
}
