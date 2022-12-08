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
        $colors = [1, 2, 3, 4, 5, 6, 7, 4, 7, 4];

        $c_o_p = ['04', '02', '06', '08', '12', '10', '26', '08', '26', '08'];

        $floor = [1, 2, 3, 4, 4, 2, 3, 4, 3, 4];

        foreach($colors as $key=>$color){
            $table = new Table();
            $table->table_number = $key + 1;
            $table->capacity_of_person = $c_o_p[$key];
            $table->floor_number = $floor[$key];
            $table->color_id = $color;
            $table->status = ($key == 1 || $key == 5 ? 0 : 1);
            $table->save();  
        }
    }
}