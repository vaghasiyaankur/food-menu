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
            ['short_cut' => 'F0(Non-Ac)', 'name' => 'Ground Floor(Non Ac)'],
            ['short_cut' => 'F1(Ac)', 'name' => 'First Floor(Ac)'],
            ['short_cut' => 'F2(Ac)', 'name' => 'Second Floor(Ac)'],
            ['short_cut' => 'F3(Ac)', 'name' => 'Third Floor(Ac)'],
            ['short_cut' => 'F4(Ac)', 'name' => 'Fourth Floor(Ac)'],
            ['short_cut' => 'F5(Ac)', 'name' => 'Fifth Floor(Ac)'],
            ['short_cut' => 'F6(Ac)', 'name' => 'Sixth Floor(Ac)'],
            ['short_cut' => 'F7(Ac)', 'name' => 'Seventh Floor(Ac)'],
            ['short_cut' => 'F8(Ac)', 'name' => 'Eighth Floor(Ac)'],
            ['short_cut' => 'F9(Ac)', 'name' => 'Ninth Floor(Ac)'],
            ['short_cut' => 'F10(Ac)', 'name' => 'Tenth Floor(Ac)'],
        ];

        
        foreach ($floors as $floor) {
            $fl = new Floor();
            $fl->short_cut = $floor['short_cut'];
            $fl->name = $floor['name'];
            $fl->save();
        }
    }
}
