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
            ['language_id' => 2, 'title' => 'favourite_title', 'content' => 'તમારી મનપસંદ ખોરાક લિસ્ટ જુઓ અને ઓર્ડર આપો'],
            ['language_id' => 3, 'title' => 'favourite_title', 'content' => 'अपनी पसंदीदा भोजन सूची देखें और ऑर्डर दें'],

            ['language_id' => 1, 'title' => 'favourite_error', 'content' => 'Empty Favourite Menu List'],
            ['language_id' => 2, 'title' => 'favourite_error', 'content' => 'ખાલી મનપસંદ મેનુ યાદી'],
            ['language_id' => 3, 'title' => 'favourite_error', 'content' => 'खाली पसंदीदा मेनू सूची'],

            ['language_id' => 1, 'title' => 'back', 'content' => 'Back'],
            ['language_id' => 2, 'title' => 'back', 'content' => 'પાછળ'],
            ['language_id' => 3, 'title' => 'back', 'content' => 'पीछे'],

            ['language_id' => 1, 'title' => 'number_error', 'content' => 'Your Phone Number is wrong please add correct number'],
            ['language_id' => 2, 'title' => 'number_error', 'content' => 'તમારો ફોન નંબર ખોટો છે, કૃપા કરીને સાચો નંબર ઉમેરો'],
            ['language_id' => 3, 'title' => 'number_error', 'content' => 'आपका फोन नंबर गलत है कृपया सही नंबर जोड़ें'],

            ['language_id' => 1, 'title' => 'reservation_error', 'content' => 'Please enter all the required details'],
            ['language_id' => 2, 'title' => 'reservation_error', 'content' => 'કૃપા કરીને બધી જરૂરી વિગતો દાખલ કરો'],
            ['language_id' => 3, 'title' => 'reservation_error', 'content' => 'कृपया सभी आवश्यक विवरण दर्ज करें'],

            ['language_id' => 1, 'title' => 'conformation_message', 'content' => 'Are you sure you want to make a reservation? Your waiting time is appropriate @waiting.'],
            ['language_id' => 2, 'title' => 'conformation_message', 'content' => 'શું તમે ખરેખર આરક્ષણ કરવા માંગો છો? તમારો રાહ જોવાનો સમય યોગ્ય @waiting છે.'],
            ['language_id' => 3, 'title' => 'conformation_message', 'content' => 'क्या आप वाकई आरक्षण करना चाहते हैं? आपका प्रतीक्षा समय उपयुक्त @waiting है|'],

            ['language_id' => 1, 'title' => 'success', 'content' => 'Successful!'],
            ['language_id' => 2, 'title' => 'success', 'content' => 'સફળ!'],
            ['language_id' => 3, 'title' => 'success', 'content' => 'सफल!'],

            ['language_id' => 1, 'title' => 'waiting_time', 'content' => 'Waiting Time'],
            ['language_id' => 2, 'title' => 'waiting_time', 'content' => 'રાહ સમય'],
            ['language_id' => 3, 'title' => 'waiting_time', 'content' => 'इंतजार का समय'],

            ['language_id' => 1, 'title' => 'open_menu', 'content' => 'Open Menu'],
            ['language_id' => 2, 'title' => 'open_menu', 'content' => 'મેનુ ખોલો'],
            ['language_id' => 3, 'title' => 'open_menu', 'content' => 'मेनू खोलें'],

            ['language_id' => 1, 'title' => 'cancel_reservation', 'content' => 'Cancel Reservation'],
            ['language_id' => 2, 'title' => 'cancel_reservation', 'content' => 'નોંધણી રદ કરો'],
            ['language_id' => 3, 'title' => 'cancel_reservation', 'content' => 'पंजीकरण रद्द करें'],

            ['language_id' => 1, 'title' => 'cancel_conformation_message', 'content' => 'Are you sure cancel registration?'],
            ['language_id' => 2, 'title' => 'cancel_conformation_message', 'content' => 'શું તમે ખરેખર નોંધણી રદ કરો છો?'],
            ['language_id' => 3, 'title' => 'cancel_conformation_message', 'content' => 'क्या आप सुनिश्चित हैं कि पंजीकरण रद्द करें?'],

            ['language_id' => 1, 'title' => 'view', 'content' => 'View'],
            ['language_id' => 2, 'title' => 'view', 'content' => 'જુઓ'],
            ['language_id' => 3, 'title' => 'view', 'content' => 'दृश्य'],

            ['language_id' => 1, 'title' => 'terms_conditions', 'content' => 'Terms & Conditions'],
            ['language_id' => 2, 'title' => 'terms_conditions', 'content' => 'શરતો અને નિયમો'],
            ['language_id' => 3, 'title' => 'terms_conditions', 'content' => 'नियम एवं शर्तें'],

            ['language_id' => 1, 'title' => 'agree', 'content' => 'Agree'],
            ['language_id' => 2, 'title' => 'agree', 'content' => 'સંમત'],
            ['language_id' => 3, 'title' => 'agree', 'content' => 'सहमत'],

            ['language_id' => 1, 'title' => 'capacity_error', 'content' => 'order create must be @person member or less than @person member.'],
            ['language_id' => 2, 'title' => 'capacity_error', 'content' => 'ઓર્ડર બનાવવા માટે @person સભ્યો અથવા @person કરતા ઓછા સભ્યો હોવા જોઈએ.'],
            ['language_id' => 3, 'title' => 'capacity_error', 'content' => 'ऑर्डर सृजन @person सदस्य या @person सदस्य से कम होना चाहिए।'],

            ['language_id' => 1, 'title' => 'ok', 'content' => 'Ok'],
            ['language_id' => 2, 'title' => 'ok', 'content' => 'બરાબર'],
            ['language_id' => 3, 'title' => 'ok', 'content' => 'ठीक है'],

            ['language_id' => 1, 'title' => 'cancel', 'content' => 'Cancel'],
            ['language_id' => 2, 'title' => 'cancel', 'content' => 'રદ કરો'],
            ['language_id' => 3, 'title' => 'cancel', 'content' => 'रद्द करें'],

            ['language_id' => 1, 'title' => 'earlier', 'content' => 'As soon as earlier'],
            ['language_id' => 2, 'title' => 'earlier', 'content' => 'વહેલી તકે'],
            ['language_id' => 3, 'title' => 'earlier', 'content' => 'जितनी जल्दी हो सके'],

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
