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
            ['short_cut' => 'F0(Non-Ac)', 'name' => 'Ground Floor(Non Ac)','restaurant_id' => 1],
            ['short_cut' => 'F1(Ac)', 'name' => 'First Floor(Ac)','restaurant_id' => 1],
            ['short_cut' => 'F2(Ac)', 'name' => 'Second Floor(Ac)','restaurant_id' => 1],
            ['short_cut' => 'F3(Ac)', 'name' => 'Third Floor(Ac)','restaurant_id' => 1],
            ['short_cut' => 'F4(Ac)', 'name' => 'Forth Floor(Ac)','restaurant_id' => 1],
            ['short_cut' => 'F5(Ac)', 'name' => 'Fifth Floor(Ac)','restaurant_id' => 1],

            ['short_cut' => 'F0(Non-Ac)', 'name' => 'Ground Floor(Non Ac)','restaurant_id' => 2],
            ['short_cut' => 'F1(Ac)', 'name' => 'First Floor(Ac)','restaurant_id' => 2],
            ['short_cut' => 'F2(Ac)', 'name' => 'Second Floor(Ac)','restaurant_id' => 2],
            ['short_cut' => 'F3(Ac)', 'name' => 'Third Floor(Ac)','restaurant_id' => 2],
            ['short_cut' => 'F4(Ac)', 'name' => 'Forth Floor(Ac)','restaurant_id' => 2],
        ];



        foreach ($floors as $f_key => $floor) {
            $fl = new Floor();
            $fl->short_cut = $floor['short_cut'];
            $fl->name = $floor['name'];
            $fl->restaurant_id = $floor['restaurant_id'];
            $fl->save();
        }
        
    }
}
