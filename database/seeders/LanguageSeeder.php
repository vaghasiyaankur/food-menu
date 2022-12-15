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
        $language->name = 'English';
        $language->status = 1;
        $language->save();

        $language = new Language();
        $language->name = 'Gujarati';
        $language->status = 1;
        $language->save();

        $language = new Language();
        $language->name = 'Hindi';
        $language->status = 1;
        $language->save();
    }
}
