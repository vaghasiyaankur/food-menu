<?php

namespace Database\Seeders;

use App\Models\Floor;
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
            ['number' => '0', 'name' => 'Ground' , 'ac' => 0],
            ['number' => '1', 'name' => 'First' , 'ac' => 1],
            ['number' => '2', 'name' => 'Second' , 'ac' => 1],
            ['number' => '3', 'name' => 'Third' , 'ac' => 0],
            ['number' => '4', 'name' => 'Fourth' , 'ac' => 1],
            ['number' => '5', 'name' => 'Fifth' , 'ac' => 0],
            ['number' => '6', 'name' => 'Sixth' , 'ac' => 1],
            ['number' => '7', 'name' => 'Seventh' , 'ac' => 0],
            ['number' => '8', 'name' => 'Eighth' , 'ac' => 1],
            ['number' => '9', 'name' => 'Ninth' , 'ac' => 0],
            ['number' => '10', 'name' => 'Tenth' , 'ac' => 1],
        ];

        foreach ($floors as $floor) {
            $fl = new Floor();
            $fl->number = $floor['number'];
            $fl->name = $floor['name'];
            $fl->ac = $floor['ac'];
            $fl->save();
        }
    }
}
