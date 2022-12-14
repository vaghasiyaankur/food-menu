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
        $colors = [1, 2, 3, 4, 5, 6, 7, 4, 7, 4 ,10 ,11 ,12 ,1 ,2 ,5 ,6 ,4 ,8 ,9,1,2,3,4,5,6,7,8];

        $c_o_p = ['04', '02', '06', '08', '12', '10', '26', '08', '26', '08', '10', '12', '14', '16', '18', '20', '22', '24', '06', '04', '02', '06', '08', '10', '12','14','16','18'];

        $floor = [1,1,1,1,2,2,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,9,10,10,11,11,11];

        $fot = [20, 15, 30, 35, 45, 40, 80, 35, 80, 35, 40, 45, 50, 55, 60, 65, 70, 75, 30, 20, 15, 30, 35, 40, 45,50,55,60];

        foreach($colors as $key=>$color){
            $table = new Table();
            $table->id = $key + 1;
            $table->table_number = $key + 1;
            $table->capacity_of_person = $c_o_p[$key];
            $table->floor_id = $floor[$key];
            $table->color_id = $color;
            $table->status = ($key == 1 || $key == 5 ? 0 : 1);
            $table->finish_order_time = $fot[$key];
            $table->save();
        }
    }
}
