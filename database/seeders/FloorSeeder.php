<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floors = [
            ['short_cut' => 'F0(Non-Ac)', 'name' => 'Ground Floor(Non Ac)' ],
            ['short_cut' => 'F1(Ac)', 'name' => 'First Floor(Ac)' ],
            ['short_cut' => 'F2(Ac)', 'name' => 'Second Floor(Ac)' ],
            ['short_cut' => 'F3(Ac)', 'name' => 'Third Floor(Ac)' ],
            ['short_cut' => 'F4(Ac)', 'name' => 'Forth Floor(Ac)' ],
            ['short_cut' => 'F5(Ac)', 'name' => 'Fifth Floor(Ac)' ],
        ];

        $colors = [1, 2, 3, 4, 5, 6 , 7];

        $c_o_p = ['04', '02', '06', '08', '12', '06' , '10'];

        $fot = [20, 15, 30, 35, 45, 50, 55];

        $table_floor = [1,2,3,4,6,1,5];

        $orders = [
            ['customer_id' => 1, 'table_id' => 1, 'person' => 4, 'role' => 'Guest', 'finish_time' => 20, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 2, 'table_id' => 2, 'person' => 2, 'role' => 'Manager', 'finish_time' => 15, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 3, 'table_id' => 3, 'person' => 6, 'role' => 'Guest', 'finish_time' => 30, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 4, 'table_id' => 4, 'person' => 8, 'role' => 'Guest', 'finish_time' => 35, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 5, 'table_id' => 5, 'person' => 10, 'role' => 'Guest', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 1, 'table_id' => 4, 'person' => 6, 'role' => 'Guest', 'finish_time' => 35, 'start_time' => \Carbon\Carbon::now()],
            ['customer_id' => 2, 'table_id' => 5, 'person' => 10, 'role' => 'Guest', 'finish_time' => 45, 'start_time' => \Carbon\Carbon::now()],
        ];

        $user_ids = [1,2,3,4,5];
        foreach ($user_ids as $key => $user_id) {
            foreach ($floors as $f_key => $floor) {
                $fl = new Floor();
                $fl->short_cut = $floor['short_cut'];
                $fl->name = $floor['name'];
                $fl->user_id = $user_id;
                $fl->save();
            }
            foreach($colors as $c_key=>$color){
                $table = new Table();
                $table->table_number = $c_key + 1;
                $table->capacity_of_person = $c_o_p[$c_key];
                $table->floor_id = $table_floor[$c_key];
                $table->color_id = $color;
                $table->status = ($c_key == 1 || $c_key == 5 ? 0 : 1);
                $table->finish_order_time = $fot[$c_key];
                $table->user_id = $user_id;
                $table->save();
            }
            foreach ($orders as $order) {
                $ord = new Order();
                $ord->customer_id = $order['customer_id'];
                $ord->table_id = $order['table_id'];
                $ord->person = $order['person'];
                $ord->role = $order['role'];
                $ord->start_time = @$order['start_time'];
                $ord->finished = 0;
                $ord->finish_time = $order['finish_time'];
                $ord->user_id = $user_id;
                $ord->save();
            }
        }
    }
}
