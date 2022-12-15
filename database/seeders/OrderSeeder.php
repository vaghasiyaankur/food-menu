<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            ['customer_id' => 1, 'table_id' => 1, 'person' => 4, 'role' => 'Guest', 'finish_time' => 20],
            ['customer_id' => 2, 'table_id' => 2, 'person' => 2, 'role' => 'Manager', 'finish_time' => 15],
            ['customer_id' => 3, 'table_id' => 3, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30],
            ['customer_id' => 4, 'table_id' => 4, 'person' => 8, 'role' => 'Guest', 'finish_time' => 35],
            ['customer_id' => 5, 'table_id' => 5, 'person' => 10, 'role' => 'Guest', 'finish_time' => 45],
            ['customer_id' => 1, 'table_id' => 1, 'person' => 4, 'role' => 'Guest', 'finish_time' => 20],
            ['customer_id' => 2, 'table_id' => 2, 'person' => 2, 'role' => 'Manager', 'finish_time' => 15],
            ['customer_id' => 3, 'table_id' => 3, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30],
            ['customer_id' => 4, 'table_id' => 4, 'person' => 8, 'role' => 'Guest', 'finish_time' => 35],
            ['customer_id' => 5, 'table_id' => 5, 'person' => 10, 'role' => 'Guest', 'finish_time' => 45],
            ['customer_id' => 1, 'table_id' => 25, 'person' => 12, 'role' => 'Guest', 'finish_time' => 45],
            ['customer_id' => 2, 'table_id' => 23, 'person' => 07, 'role' => 'Manager', 'finish_time' => 35],
            ['customer_id' => 3, 'table_id' => 18, 'person' => 24, 'role' => 'Guest', 'finish_time' => 75],
            ['customer_id' => 4, 'table_id' => 13, 'person' => 14, 'role' => 'Guest', 'finish_time' => 50],
            ['customer_id' => 5, 'table_id' => 15, 'person' => 17, 'role' => 'Guest', 'finish_time' => 60],
            ['customer_id' => 1, 'table_id' => 17, 'person' => 4, 'role' => 'Guest', 'finish_time' => 70],
            ['customer_id' => 2, 'table_id' => 21, 'person' => 2, 'role' => 'Manager', 'finish_time' => 15],
            ['customer_id' => 3, 'table_id' => 22, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30],
            ['customer_id' => 4, 'table_id' => 17, 'person' => 22, 'role' => 'Guest', 'finish_time' => 70],
            ['customer_id' => 5, 'table_id' => 14, 'person' => 15, 'role' => 'Guest', 'finish_time' => 55]
        ];

        foreach ($orders as $order) {
            $ord = new Order();
            $ord->customer_id = $order['customer_id'];
            $ord->table_id = $order['table_id'];
            $ord->person = $order['person'];
            $ord->role = $order['role'];
            $ord->finished = 0;
            $ord->finish_time = $order['finish_time'];
            $ord->save();
        }
    }
}
