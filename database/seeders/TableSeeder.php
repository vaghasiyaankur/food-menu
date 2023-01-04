<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $colors = [1, 2, 3, 4, 5, 6, 7, 4, 7, 4 ,10 ,11 ,12 ,1 ,2 ,5 ,6 ,4 ,8 ,9,1,2,3,4,5,6,7,8];

        // $c_o_p = ['04', '02', '06', '08', '12', '10', '26', '08', '26', '08', '10', '12', '14', '16', '18', '20', '22', '24', '06', '04', '02', '06', '08', '10', '12','14','16','18'];

        // $floor = [1,1,1,1,2,2,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,9,10,10,11,11,11];

        // $fot = [20, 15, 30, 35, 45, 40, 80, 35, 80, 35, 40, 45, 50, 55, 60, 65, 70, 75, 30, 20, 15, 30, 35, 40, 45, 50, 55, 60];

        // $user_ids = [1, 2, 3, 4, 5];

        // foreach($user_ids as $key=>$user_id){

        //     foreach($colors as $key=>$color){
        //         $table = new Table();
        //         $table->table_number = $key + 1;
        //         $table->capacity_of_person = $c_o_p[$key];
        //         $table->floor_id = $floor[$key];
        //         $table->color_id = $color;
        //         $table->status = ($key == 1 || $key == 5 ? 0 : 1);
        //         $table->finish_order_time = $fot[$key];
        //         $table->user_id = $user_id;
        //         $table->save();
        //     }
        // }

        $tables = [
            ['color_id' => 1, 'capacity_of_person' => 04,'user_id' => 1,'floor_id' => 1,'finish_order_time' => 20],
            ['color_id' => 2, 'capacity_of_person' => '02','user_id' => 1,'floor_id' => 1,'finish_order_time' => 15],
            ['color_id' => 3, 'capacity_of_person' => '06','user_id' => 1,'floor_id' => 1,'finish_order_time' => 25],

            ['color_id' => 4, 'capacity_of_person' => '12','user_id' => 1,'floor_id' => 2,'finish_order_time' => 30],
            ['color_id' => 5, 'capacity_of_person' => '14','user_id' => 1,'floor_id' => 2,'finish_order_time' => 35],
            ['color_id' => 6, 'capacity_of_person' => '08','user_id' => 1,'floor_id' => 2,'finish_order_time' => 40],

            ['color_id' => 7, 'capacity_of_person' => '18','user_id' => 1,'floor_id' => 3,'finish_order_time' => 35],
            ['color_id' => 8, 'capacity_of_person' => '06','user_id' => 1,'floor_id' => 3,'finish_order_time' => 40],

            ['color_id' => 9, 'capacity_of_person' => '16','user_id' => 1,'floor_id' => 4,'finish_order_time' => 30],
            ['color_id' => 10, 'capacity_of_person' => '10','user_id' => 1,'floor_id' => 4,'finish_order_time' => 40],

            ['color_id' => 11, 'capacity_of_person' => '20','user_id' => 1,'floor_id' => 5,'finish_order_time' => 60],

            ['color_id' => 12, 'capacity_of_person' => '06','user_id' => 1,'floor_id' => 6,'finish_order_time' => 55],
            ['color_id' => 13, 'capacity_of_person' => '08','user_id' => 1,'floor_id' => 6,'finish_order_time' => 60],

            ['color_id' => 14, 'capacity_of_person' => '06','user_id' => 2,'floor_id' => 7,'finish_order_time' => 20],
            ['color_id' => 15, 'capacity_of_person' => '08','user_id' => 2,'floor_id' => 7,'finish_order_time' => 15],
            ['color_id' => 16, 'capacity_of_person' => '10','user_id' => 2,'floor_id' => 7,'finish_order_time' => 25],

            ['color_id' => 17, 'capacity_of_person' => '12','user_id' => 2,'floor_id' => 8,'finish_order_time' => 30],
            ['color_id' => 18, 'capacity_of_person' => '14','user_id' => 2,'floor_id' => 8,'finish_order_time' => 35],

            ['color_id' => 19, 'capacity_of_person' => '08','user_id' => 2,'floor_id' => 9,'finish_order_time' => 40],
            ['color_id' => 20, 'capacity_of_person' => '18','user_id' => 2,'floor_id' => 9,'finish_order_time' => 35],
            ['color_id' => 1, 'capacity_of_person' => '06','user_id' => 2,'floor_id' => 9,'finish_order_time' => 40],

            ['color_id' => 2, 'capacity_of_person' => '16','user_id' => 2,'floor_id' => 10,'finish_order_time' => 30],

            ['color_id' => 3, 'capacity_of_person' => '10','user_id' => 2,'floor_id' => 11,'finish_order_time' => 40],
            ['color_id' => 4, 'capacity_of_person' => '20','user_id' => 2,'floor_id' => 11,'finish_order_time' => 60],

            ['color_id' => 5, 'capacity_of_person' => '06','user_id' => 3,'floor_id' => 12,'finish_order_time' => 20],
            ['color_id' => 6, 'capacity_of_person' => '08','user_id' => 3,'floor_id' => 12,'finish_order_time' => 15],

            ['color_id' => 7, 'capacity_of_person' => '10','user_id' => 3,'floor_id' => 13,'finish_order_time' => 25],
            ['color_id' => 8, 'capacity_of_person' => '12','user_id' => 3,'floor_id' => 13,'finish_order_time' => 30],
            ['color_id' => 9, 'capacity_of_person' => '14','user_id' => 3,'floor_id' => 13,'finish_order_time' => 35],

            ['color_id' => 10, 'capacity_of_person' => '08','user_id' => 3,'floor_id' => 14,'finish_order_time' => 40],
            ['color_id' => 11, 'capacity_of_person' => '18','user_id' => 3,'floor_id' => 14,'finish_order_time' => 35],

            ['color_id' => 12, 'capacity_of_person' => '06','user_id' => 3,'floor_id' => 15,'finish_order_time' => 40],
            ['color_id' => 13, 'capacity_of_person' => '16','user_id' => 3,'floor_id' => 15,'finish_order_time' => 30],

            ['color_id' => 14, 'capacity_of_person' => '04','user_id' => 4,'floor_id' => 16,'finish_order_time' => 20],
            ['color_id' => 15, 'capacity_of_person' => '02','user_id' => 4,'floor_id' => 16,'finish_order_time' => 15],
            ['color_id' => 16, 'capacity_of_person' => '06','user_id' => 4,'floor_id' => 16,'finish_order_time' => 25],

            ['color_id' => 17, 'capacity_of_person' => '12','user_id' => 4,'floor_id' => 17,'finish_order_time' => 30],
            ['color_id' => 18, 'capacity_of_person' => '14','user_id' => 4,'floor_id' => 17,'finish_order_time' => 35],
            ['color_id' => 19, 'capacity_of_person' => '08','user_id' => 4,'floor_id' => 17,'finish_order_time' => 40],

            ['color_id' => 20, 'capacity_of_person' => '18','user_id' => 4,'floor_id' => 18,'finish_order_time' => 35],
            ['color_id' => 1, 'capacity_of_person' => '06','user_id' => 4,'floor_id' => 18,'finish_order_time' => 40],

            ['color_id' => 2, 'capacity_of_person' => '16','user_id' => 4,'floor_id' => 19,'finish_order_time' => 30],
            ['color_id' => 3, 'capacity_of_person' => '10','user_id' => 4,'floor_id' => 19,'finish_order_time' => 40],

            ['color_id' => 4, 'capacity_of_person' => '20','user_id' => 4,'floor_id' => 20,'finish_order_time' => 60],

            ['color_id' => 5, 'capacity_of_person' => '06','user_id' => 4,'floor_id' => 21,'finish_order_time' => 55],
            ['color_id' => 6, 'capacity_of_person' => '08','user_id' => 4,'floor_id' => 21,'finish_order_time' => 60],

            ['color_id' => 7, 'capacity_of_person' => '06','user_id' => 5,'floor_id' => 22,'finish_order_time' => 20],
            ['color_id' => 8, 'capacity_of_person' => '08','user_id' => 5,'floor_id' => 22,'finish_order_time' => 15],
            ['color_id' => 9, 'capacity_of_person' => '10','user_id' => 5,'floor_id' => 22,'finish_order_time' => 25],

            ['color_id' => 10, 'capacity_of_person' => '12','user_id' => 5,'floor_id' => 23,'finish_order_time' => 20],
            ['color_id' => 12, 'capacity_of_person' => '08','user_id' => 5,'floor_id' => 23,'finish_order_time' => 15],
            ['color_id' => 13, 'capacity_of_person' => '10','user_id' => 5,'floor_id' => 23,'finish_order_time' => 25],

            ['color_id' => 14, 'capacity_of_person' => '12','user_id' => 5,'floor_id' => 24,'finish_order_time' => 30],
            ['color_id' => 15, 'capacity_of_person' => '14','user_id' => 5,'floor_id' => 24,'finish_order_time' => 35],

            ['color_id' => 16, 'capacity_of_person' => '08','user_id' => 5,'floor_id' => 25,'finish_order_time' => 40],
            ['color_id' => 17, 'capacity_of_person' => '18','user_id' => 5,'floor_id' => 25,'finish_order_time' => 35],
            ['color_id' => 18, 'capacity_of_person' => '06','user_id' => 5,'floor_id' => 25,'finish_order_time' => 40],

            ['color_id' => 19, 'capacity_of_person' => '16','user_id' => 5,'floor_id' => 26,'finish_order_time' => 30],
            ['color_id' => 20, 'capacity_of_person' => '10','user_id' => 5,'floor_id' => 26,'finish_order_time' => 40],
            ['color_id' => 1, 'capacity_of_person' => '20','user_id' => 5,'floor_id' => 26,'finish_order_time' => 60],
        ];


        foreach($tables as $key => $table){
            $tbl = new Table();
            $tbl->table_number = $key + 1;
            $tbl->capacity_of_person = $table['capacity_of_person'];
            $tbl->floor_id = $table['floor_id'];
            $tbl->color_id = $table['color_id'];
            $tbl->status = 1;
            $tbl->finish_order_time = $table['finish_order_time'];
            $tbl->user_id = $table['user_id'];
            $tbl->save();
        }

    }
}
