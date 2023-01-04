<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $orders = [
        //     ['customer_id' => 1, 'table_id' => 1, 'person' => 4, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 2, 'table_id' => 2, 'person' => 2, 'role' => 'Manager', 'finish_time' => 15, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 3, 'table_id' => 3, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 4, 'table_id' => 4, 'person' => 8, 'role' => 'Guest', 'finish_time' => 35, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 5, 'table_id' => 5, 'person' => 10, 'role' => 'Guest', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 1, 'table_id' => 1, 'person' => 4, 'role' => 'Guest', 'finish_time' => 20],
        //     ['customer_id' => 2, 'table_id' => 2, 'person' => 2, 'role' => 'Manager', 'finish_time' => 15],
        //     ['customer_id' => 3, 'table_id' => 3, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30],
        //     ['customer_id' => 4, 'table_id' => 4, 'person' => 8, 'role' => 'Guest', 'finish_time' => 35],
        //     ['customer_id' => 5, 'table_id' => 5, 'person' => 10, 'role' => 'Guest', 'finish_time' => 45],
        //     ['customer_id' => 1, 'table_id' => 25, 'person' => 12, 'role' => 'Guest', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 2, 'table_id' => 23, 'person' => 07, 'role' => 'Manager', 'finish_time' => 35, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 3, 'table_id' => 18, 'person' => 24, 'role' => 'Guest', 'finish_time' => 75, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 4, 'table_id' => 13, 'person' => 14, 'role' => 'Guest', 'finish_time' => 50, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 5, 'table_id' => 15, 'person' => 17, 'role' => 'Guest', 'finish_time' => 60, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 1, 'table_id' => 17, 'person' => 22, 'role' => 'Guest', 'finish_time' => 70, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 2, 'table_id' => 21, 'person' => 2, 'role' => 'Manager', 'finish_time' => 15, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 3, 'table_id' => 22, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30, 'start_time' => \Carbon\Carbon::now()],
        //     ['customer_id' => 4, 'table_id' => 17, 'person' => 22, 'role' => 'Guest', 'finish_time' => 70],
        //     ['customer_id' => 5, 'table_id' => 14, 'person' => 15, 'role' => 'Guest', 'finish_time' => 55, 'start_time' => \Carbon\Carbon::now()]
        // ];

        // $user_ids = [1,2,3,4,5];

        // foreach ($user_ids as $key => $user_id) {
        //     foreach ($orders as $order) {
        //         $ord = new Order();
        //         $ord->customer_id = $order['customer_id'];
        //         $ord->table_id = $order['table_id'];
        //         $ord->person = $order['person'];
        //         $ord->role = $order['role'];
        //         $ord->start_time = @$order['start_time'];
        //         $ord->finished = 0;
        //         $ord->finish_time = $order['finish_time'];
        //         $ord->user_id = $user_id;
        //         $ord->save();
        //     }
        // }

        $orders = [
            ['customer_id' => 1, 'user_id' => 1, 'table_id' => 1, 'person' => 4, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 2, 'user_id' => 1, 'table_id' => 1, 'person' => 4, 'role' => 'Manager', 'finish_time' => 20],
            ['customer_id' => 3, 'user_id' => 1, 'table_id' => 3, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 4, 'user_id' => 1, 'table_id' => 3, 'person' => 6, 'role' => 'Guest', 'finish_time' => 35],
            ['customer_id' => 5, 'user_id' => 1, 'table_id' => 4, 'person' => 12, 'role' => 'Manager', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 1, 'user_id' => 1, 'table_id' => 5, 'person' => 14, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],

            ['customer_id' => 1, 'user_id' => 2, 'table_id' => 14, 'person' => 6, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 2, 'user_id' => 2, 'table_id' => 14, 'person' => 6, 'role' => 'Manager', 'finish_time' => 15],
            ['customer_id' => 3, 'user_id' => 2, 'table_id' => 15, 'person' => 8, 'role' => 'Guest', 'finish_time' => 30, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 4, 'user_id' => 2, 'table_id' => 15, 'person' => 8, 'role' => 'Guest', 'finish_time' => 35],
            ['customer_id' => 5, 'user_id' => 2, 'table_id' => 16, 'person' => 10, 'role' => 'Manager', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 1, 'user_id' => 2, 'table_id' => 17, 'person' => 12, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],

            ['customer_id' => 1, 'user_id' => 3, 'table_id' => 28, 'person' => 12, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 2, 'user_id' => 3, 'table_id' => 29, 'person' => 14, 'role' => 'Manager', 'finish_time' => 15, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 3, 'user_id' => 3, 'table_id' => 30, 'person' => 8, 'role' => 'Guest', 'finish_time' => 30, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 4, 'user_id' => 3, 'table_id' => 32, 'person' => 6, 'role' => 'Guest', 'finish_time' => 35, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 5, 'user_id' => 3, 'table_id' => 27, 'person' => 10, 'role' => 'Manager', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],

            ['customer_id' => 1, 'user_id' => 4, 'table_id' => 34, 'person' => 4, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 2, 'user_id' => 4, 'table_id' => 35, 'person' => 2, 'role' => 'Manager', 'finish_time' => 15, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 3, 'user_id' => 4, 'table_id' => 36, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 4, 'user_id' => 4, 'table_id' => 37, 'person' => 12, 'role' => 'Guest', 'finish_time' => 35, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 5, 'user_id' => 4, 'table_id' => 38, 'person' => 14, 'role' => 'Manager', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],

            ['customer_id' => 1, 'user_id' => 5, 'table_id' => 47, 'person' => 6, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 2, 'user_id' => 5, 'table_id' => 53, 'person' => 12, 'role' => 'Manager', 'finish_time' => 15, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 3, 'user_id' => 5, 'table_id' => 16, 'person' => 18, 'role' => 'Guest', 'finish_time' => 30, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 4, 'user_id' => 5, 'table_id' => 58, 'person' => 16, 'role' => 'Guest', 'finish_time' => 35, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 5, 'user_id' => 5, 'table_id' => 60, 'person' => 20, 'role' => 'Manager', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],
        ];

        foreach ($orders as $order) {
            $ord = new Order();
            $ord->customer_id = $order['customer_id'];
            $ord->table_id = $order['table_id'];
            $ord->person = $order['person'];
            $ord->role = $order['role'];
            $ord->start_time = @$order['start_time'];
            $ord->finished = 0;
            $ord->finish_time = $order['finish_time'];
            $ord->user_id = $order['user_id'];
            $ord->save();
        }
    }
}
