<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $language = new Language();
        $language->id = 1;
        $language->name = 'English';
        $language->save();

        $language = new Language();
        $language->id = 2;
        $language->name = 'Gujarati';
        $language->save();

        $language = new Language();
        $language->id = 3;
        $language->name = 'Hindi';
        $language->save();
    }
}
