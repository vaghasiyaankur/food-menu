<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['color' => 'Blue','rgb' => '158,203,255'],
            ['color' => 'Lime_Green','rgb' => '15,201,99'],
            ['color' => 'Red','rgb' => '255,97,97'],
            ['color' => 'Orange','rgb' => '252,142,94'],
            ['color' => 'Pink','rgb' => '255,97,154'],
            ['color' => 'Yellow','rgb' => '252,217,94'],
            ['color' => 'Grey','rgb' => '198,198,198'],
            ['color' => 'Pistachio_Green','rgb' => '152,228,200'],
            ['color' => 'Peacock_Blue','rgb' => '42,166,169'],
            ['color' => 'Jade_Green','rgb' => '164,198,146'],
            ['color' => 'Peach','rgb' => '250,188,177'],
            ['color' => 'Cream','rgb' => '245,207,178'],
            ['color' => 'Moccasin','rgb' => '244,184,117'],
            ['color' => 'Green','rgb' => '85,148,98'],
            ['color' => 'Violet','rgb' => '142,120,187'],
            ['color' => 'Periwinkle_Green','rgb' => '115,129,175'],
            ['color' => 'Lavender','rgb' => '216,150,255'],
            ['color' => 'Light pink','rgb' => '255,135,193'],
            ['color' => 'Steel_Blue','rgb' => ' 111,157,177'],
            ['color' => 'Brown','rgb' => '177,143,111']
        ];

        foreach ($colors as $color) {
            $col = new Color();
            $col->color = $color['color'];
            $col->rgb = $color['rgb'];
            $col->save();
        }
    }
}
