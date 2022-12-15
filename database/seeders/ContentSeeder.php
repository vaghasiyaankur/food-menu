<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            
            ['language_id' => 1, 'title' => 'enter_name', 'content' => 'Enter Your Name'],
            ['language_id' => 2, 'title' => 'enter_name', 'content' => 'તમારું નામ દાખલ કરો'],
            ['language_id' => 3, 'title' => 'enter_name', 'content' => 'अपना नाम दर्ज करें'],

            ['language_id' => 1, 'title' => 'phone_number', 'content' => 'Phone Number'],
            ['language_id' => 2, 'title' => 'phone_number', 'content' => 'ફોન નંબર'],
            ['language_id' => 3, 'title' => 'phone_number', 'content' => 'फ़ोन नंबर'],

            ['language_id' => 1, 'title' => 'family_member', 'content' => 'Family Member'],
            ['language_id' => 2, 'title' => 'family_member', 'content' => 'પરિવારના સભ્ય'],
            ['language_id' => 3, 'title' => 'family_member', 'content' => 'परिवार के सदस्य'],

            ['language_id' => 1, 'title' => 'agree_condition', 'content' => 'I agree with the terms & conditions'],
            ['language_id' => 2, 'title' => 'agree_condition', 'content' => 'હું નિયમો અને શરતો સાથે સંમત છું'],
            ['language_id' => 3, 'title' => 'agree_condition', 'content' => 'मैं नियमों और शर्तों से सहमत हूं'],

            ['language_id' => 1, 'title' => 'check_time', 'content' => 'Check Time'],
            ['language_id' => 2, 'title' => 'check_time', 'content' => 'સમય તપાસો'],
            ['language_id' => 3, 'title' => 'check_time', 'content' => 'समय की जांच करें'],

            ['language_id' => 1, 'title' => 'registration', 'content' => 'Registration'],
            ['language_id' => 2, 'title' => 'registration', 'content' => 'નોંધણી'],
            ['language_id' => 3, 'title' => 'registration', 'content' => 'पंजीकरण'],

            ['language_id' => 1, 'title' => 'book_table', 'content' => 'Book Table'],
            ['language_id' => 2, 'title' => 'book_table', 'content' => 'ટેબલ બુક કરો'],
            ['language_id' => 3, 'title' => 'book_table', 'content' => 'टेबल बुक करें'],
            
            ['language_id' => 1, 'title' => 'menu', 'content' => 'Menu'],
            ['language_id' => 2, 'title' => 'menu', 'content' => 'મેનુ'],
            ['language_id' => 3, 'title' => 'menu', 'content' => 'मेन्यू'],

            ['language_id' => 1, 'title' => 'food_menu', 'content' => 'Food Menu'],
            ['language_id' => 2, 'title' => 'food_menu', 'content' => 'ખોરાક મેનુ'],
            ['language_id' => 3, 'title' => 'food_menu', 'content' => 'भोजन का मेन्यू'],

            ['language_id' => 1, 'title' => 'my_favourite', 'content' => 'My Favourite'],
            ['language_id' => 2, 'title' => 'my_favourite', 'content' => 'મારી પસંદ'],
            ['language_id' => 3, 'title' => 'my_favourite', 'content' => 'मेरा पसंदीदा'],

            ['language_id' => 1, 'title' => 'favourite_title', 'content' => 'See your favorite food list and place order'],
            ['language_id' => 2, 'title' => 'favourite_title', 'content' => 'તમારી મનપસંદ ફૂડ લિસ્ટ જુઓ અને ઓર્ડર આપો'],
            ['language_id' => 3, 'title' => 'favourite_title', 'content' => 'अपनी पसंदीदा भोजन सूची देखें और ऑर्डर दें'],

            ['language_id' => 1, 'title' => 'favourite_title', 'content' => 'Empty Favourite Menu List'],
            ['language_id' => 2, 'title' => 'favourite_title', 'content' => 'ખાલી મનપસંદ મેનુ યાદી'],
            ['language_id' => 3, 'title' => 'favourite_title', 'content' => 'खाली पसंदीदा मेनू सूची'],

            ['language_id' => 1, 'title' => 'back', 'content' => 'Back'],
            ['language_id' => 2, 'title' => 'back', 'content' => 'પાછળ'],
            ['language_id' => 3, 'title' => 'back', 'content' => 'पीछे'],
        ];

        
        foreach ($contents as $content) {
            $cnt = new Content();
            $cnt->language_id = $content['language_id'];
            $cnt->title = $content['title'];
            $cnt->content = $content['content'];
            $cnt->save();
        }
    }
}
