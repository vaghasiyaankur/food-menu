<?php

namespace App\Helper;

use App\Models\Content;
use App\Models\Customer;
use App\Models\Language;
use App\Models\Restaurant;
use App\Models\RestaurantLanguage;
use App\Models\Setting;

/**
 * Class LanguageHelper
 *
 * This class provides helper functions related to languages.
 */
class LanguageHelper
{
    /**    
     * Retrieve an array of language IDs.
     *
     * @return array
     */
    public static function languageIdArray()
    {
        return Language::whereStatus(1)
                        ->pluck('id')
                        ->toArray();
    }

    public static function setLanguagesApprovedRestaurant($restaurantId)
    {
        $languages = Language::all();
        $seederContents = self::getLanguageSeederContent();
        $restaurant = Restaurant::find($restaurantId);

        Setting::create([
            'member_capacity'   =>  45,
            'language_id'       =>  1,
            'bill_header'       =>  $restaurant->name,
            'bill_footer'       =>  $restaurant->name,
            'restaurant_id'     =>  $restaurantId,
            'currency_name'     =>  'Indian',
            'currency_code'     =>  'INR',
            'currency_symbol'   => '₹'
        ]);

        $languages->each(function($language) use ($restaurantId) {
            RestaurantLanguage::create([
                'restaurant_id' => $restaurantId,
                'language_id'   => $language->id,
                'status'        => 1,
            ]);
        });

        collect($seederContents)->each(function($seederContent) use ($restaurantId) {
            $restaurantLangId = RestaurantLanguage::where('restaurant_id', $restaurantId)
                                    ->where('language_id', $seederContent['language_id'])->value('id');
        
            Content::create([
                'title'    => $seederContent['title'],
                'content'  => $seederContent['content'],
                'restaurant_language_id' => $restaurantLangId,
            ]);
        });
    }

    public static function getLanguageSeederContent()
    {

        $contentsArray = [
            1 => [
                ['title' => 'enter_name', 'content' => 'Enter Your Name'],
                ['title' => 'phone_number', 'content' => 'Phone Number'],
                ['title' => 'enter_email', 'content' => 'Enter Your Email'],
                ['title' => 'family_member', 'content' => 'Family Member'],
                ['title' => 'agree_condition', 'content' => 'I agree with the terms & conditions'],
                ['title' => 'check_time', 'content' => 'Check Time'],
                ['title' => 'no_waiting_time', 'content' => 'You have no waiting time.'],
                ['title' => 'registration', 'content' => 'Registration'],
                ['title' => 'book_table', 'content' => 'Book Table'],
                ['title' => 'menu', 'content' => 'Menu'],
                ['title' => 'food_menu', 'content' => 'Food Menu'],
                ['title' => 'my_favourite', 'content' => 'My Favourite'],
                ['title' => 'favourite_title', 'content' => 'See your favorite food list and place order'],
                ['title' => 'favourite_error', 'content' => 'Empty Favourite Menu List'],
                ['title' => 'back', 'content' => 'Back'],
                ['title' => 'number_error', 'content' => 'Your Phone Number is wrong please add correct number'],
                ['title' => 'reservation_error', 'content' => 'Please enter all the required details'],
                ['title' => 'conformation_message', 'content' => 'Are you sure you want to make a reservation? Your waiting time is appropriate @waiting.'],
                ['title' => 'success', 'content' => 'Your Reservation Successfully placed!'],
                ['title' => 'waiting_time', 'content' => 'Waiting Time'],
                ['title' => 'open_menu', 'content' => 'Open Menu'],
                ['title' => 'cancel_reservation', 'content' => 'Cancel Reservation'],
                ['title' => 'cancel_conformation_message', 'content' => 'Are you sure cancel registration?'],
                ['title' => 'view', 'content' => 'View'],
                ['title' => 'terms_conditions', 'content' => 'Terms & Conditions'],
                ['title' => 'agree', 'content' => 'Agree'],
                ['title' => 'capacity_error', 'content' => 'order create must be @person member or less than @person member.'],
                ['title' => 'capacity_error', 'content' => "We don't have a table for that many people. Please contact the restaurant manager."],
                ['title' => 'ok', 'content' => 'Ok'],
                ['title' => 'cancel', 'content' => 'Cancel'],
                ['title' => 'earlier', 'content' => 'As soon as earlier'],
                ['title' => 'empty_menu', 'content' => 'Empty Food Menu List'],
                ['title' => 'time', 'content' => 'Time'],
                ['title' => 'hour_and', 'content' => 'hour and'],
                ['title' => 'min_left', 'content' => 'min. left'],
                ['title' => 'second_left', 'content' => 'seconds left'],
                ['title' => 'number_guest', 'content' => 'No. of Guest'],
                ['title' => 'date_time', 'content' => 'Date & Time'],
                ['title' => 'floor_no', 'content' => 'Floor No.'],
                ['title' => 'table_no', 'content' => 'Table No.'],
                ['title' => 'capacity', 'content' => 'Capacity'],
                ['title' => 'accept_term_cond', 'content' => 'Please accept our term & condition'],
                ['title' => 'no_waiting_message', 'content' => 'Are you sure you want to make a reservation? You have no waiting queue.'],
                ['title' => 'your_turn', 'content' => "Now It's your turn"],
                ['title' => 'booked', 'content' => "Booked"],
                ['title' => 'select_floor', 'content' => "Please select floor."],
            ],
            2 => [
                ['title' => 'enter_name', 'content' => 'તમારું નામ દાખલ કરો'],
                ['title' => 'phone_number', 'content' => 'ફોન નંબર'],
                ['title' => 'enter_email', 'content' => 'તમારું ઈમેલ દાખલ કરો'],
                ['title' => 'family_member', 'content' => 'પરિવારના સભ્ય'],
                ['title' => 'agree_condition', 'content' => 'હું નિયમો અને શરતો સાથે સંમત છું'],
                ['title' => 'check_time', 'content' => 'સમય તપાસો'],
                ['title' => 'no_waiting_time', 'content' => 'તમારે રાહ જોવાની જરૂર નથી.'],
                ['title' => 'registration', 'content' => 'નોંધણી'],
                ['title' => 'book_table', 'content' => 'ટેબલ બુક કરો'],
                ['title' => 'menu', 'content' => 'મેનુ'],
                ['title' => 'food_menu', 'content' => 'ખોરાક મેનુ'],
                ['title' => 'my_favourite', 'content' => 'મારી પસંદ'],
                ['title' => 'favourite_title', 'content' => 'તમારી મનપસંદ ખોરાક લિસ્ટ જુઓ અને ઓર્ડર આપો'],
                ['title' => 'favourite_error', 'content' => 'ખાલી મનપસંદ મેનુ યાદી'],
                ['title' => 'back', 'content' => 'પાછળ'],
                ['title' => 'number_error', 'content' => 'તમારો ફોન નંબર ખોટો છે, કૃપા કરીને સાચો નંબર ઉમેરો'],
                ['title' => 'reservation_error', 'content' => 'કૃપા કરીને બધી જરૂરી વિગતો દાખલ કરો'],
                ['title' => 'conformation_message', 'content' => 'શું તમે ખરેખર આરક્ષણ કરવા માંગો છો? તમારો રાહ જોવાનો સમય યોગ્ય @waiting છે.'],
                ['title' => 'success', 'content' => 'તમારું આરક્ષણ સફળતાપૂર્વક મૂકવામાં આવ્યું!            '],
                ['title' => 'waiting_time', 'content' => 'રાહ સમય'],
                ['title' => 'open_menu', 'content' => 'મેનુ ખોલો'],
                ['title' => 'cancel_reservation', 'content' => 'નોંધણી રદ કરો'],
                ['title' => 'cancel_conformation_message', 'content' => 'શું તમે ખરેખર નોંધણી રદ કરો છો?'],
                ['title' => 'view', 'content' => 'જુઓ'],
                ['title' => 'terms_conditions', 'content' => 'શરતો અને નિયમો'],
                ['title' => 'agree', 'content' => 'સંમત'],
                ['title' => 'capacity_error', 'content' => 'ઓર્ડર બનાવવા માટે @person સભ્યો અથવા @person કરતા ઓછા સભ્યો હોવા જોઈએ.'],
                ['title' => 'capacity_error', 'content' => 'અમારી પાસે આટલા બધા લોકો માટે ટેબલ નથી. કૃપા કરીને રેસ્ટોરન્ટ મેનેજરનો સંપર્ક કરો.'],
                ['title' => 'ok', 'content' => 'બરાબર'],
                ['title' => 'cancel', 'content' => 'રદ કરો'],
                ['title' => 'earlier', 'content' => 'વહેલી તકે'],
                ['title' => 'empty_menu', 'content' => 'ખાલી ખોરાક મેનુ યાદી'],
                ['title' => 'time', 'content' => 'સમય'],
                ['title' => 'hour_and', 'content' => 'કલાક અને'],
                ['title' => 'min_left', 'content' => 'મિનિટ બાકી'],
                ['title' => 'second_left', 'content' => 'સેકન્ડ બાકી'],
                ['title' => 'number_guest', 'content' => 'મહેમાનની સંખ્યા'],
                ['title' => 'date_time', 'content' => 'તારીખ અને સમય'],
                ['title' => 'floor_no', 'content' => 'માળ નં.'],
                ['title' => 'table_no', 'content' => 'ટેબલ નંબર'],
                ['title' => 'capacity', 'content' => 'ક્ષમતા'],
                ['title' => 'accept_term_cond', 'content' => 'કૃપા કરીને અમારી શરતો સ્વીકારો'],
                ['title' => 'no_waiting_message', 'content' => 'શું તમે ખરેખર આરક્ષણ કરવા માંગો છો? તમારી પાસે રાહ જોવાની કતાર નથી.'],
                ['title' => 'your_turn', 'content' => 'હવે તમારો વારો છે'],
                ['title' => 'booked', 'content' => 'બુક કરેલ'],
                ['title' => 'select_floor', 'content' => 'કૃપા કરીને ફ્લોર પસંદ કરો.'],
            ],
            3 => [
                ['title' => 'enter_name', 'content' => 'अपना नाम दर्ज करें'],
                ['title' => 'phone_number', 'content' => 'फ़ोन नंबर'],
                ['title' => 'enter_email', 'content' => 'अपना ईमेल दर्ज करें'],
                ['title' => 'family_member', 'content' => 'परिवार के सदस्य'],
                ['title' => 'agree_condition', 'content' => 'मैं नियमों और शर्तों से सहमत हूं'],
                ['title' => 'check_time', 'content' => 'समय की जांच करें'],
                ['title' => 'no_waiting_time', 'content' => 'आपको प्रतीक्षा करने की आवश्यकता नहीं है।'],
                ['title' => 'registration', 'content' => 'पंजीकरण'],
                ['title' => 'book_table', 'content' => 'टेबल बुक करें'],
                ['title' => 'menu', 'content' => 'मेन्यू'],
                ['title' => 'food_menu', 'content' => 'भोजन का मेन्यू'],
                ['title' => 'my_favourite', 'content' => 'मेरा पसंदीदा'],
                ['title' => 'favourite_title', 'content' => 'अपनी पसंदीदा भोजन सूची देखें और ऑर्डर दें'],
                ['title' => 'favourite_error', 'content' => 'खाली पसंदीदा मेनू सूची'],
                ['title' => 'back', 'content' => 'पीछे'],
                ['title' => 'number_error', 'content' => 'आपका फोन नंबर गलत है कृपया सही नंबर जोड़ें'],
                ['title' => 'reservation_error', 'content' => 'कृपया सभी आवश्यक विवरण दर्ज करें'],
                ['title' => 'conformation_message', 'content' => 'क्या आप वाकई आरक्षण करना चाहते हैं? आपका प्रतीक्षा समय उपयुक्त @waiting है|'],
                ['title' => 'success', 'content' => 'आपका आरक्षण सफलतापूर्वक रखा गया!'],
                ['title' => 'waiting_time', 'content' => 'इंतजार का समय'],
                ['title' => 'open_menu', 'content' => 'मेनू खोलें'],
                ['title' => 'cancel_reservation', 'content' => 'पंजीकरण रद्द करें'],
                ['title' => 'cancel_conformation_message', 'content' => 'क्या आप सुनिश्चित हैं कि पंजीकरण रद्द करें?'],
                ['title' => 'view', 'content' => 'दृश्य'],
                ['title' => 'terms_conditions', 'content' => 'नियम एवं शर्तें'],
                ['title' => 'agree', 'content' => 'सहमत'],
                ['title' => 'capacity_error', 'content' => 'ऑर्डर सृजन @person सदस्य या @person सदस्य से कम होना चाहिए।'],
                ['title' => 'capacity_error', 'content' => 'हमारे पास इतने लोगों के लिए टेबल नहीं है। कृपया रेस्टोरेंट प्रबंधक से संपर्क करें।'],
                ['title' => 'ok', 'content' => 'ठीक है'],
                ['title' => 'cancel', 'content' => 'रद्द करें'],
                ['title' => 'earlier', 'content' => 'जितनी जल्दी हो सके'],
                ['title' => 'empty_menu', 'content' => 'खाली भोजन मेनू सूची'],
                ['title' => 'time', 'content' => 'समय'],
                ['title' => 'hour_and', 'content' => 'घंटा और'],
                ['title' => 'min_left', 'content' => 'मिनट शेष'],
                ['title' => 'second_left', 'content' => 'सेकंड शेष'],
                ['title' => 'number_guest', 'content' => 'अतिथि की संख्या'],
                ['title' => 'date_time', 'content' => 'तिथि और समय'],
                ['title' => 'floor_no', 'content' => 'मंजिल नं.'],
                ['title' => 'table_no', 'content' => 'मेज संख्या'],
                ['title' => 'capacity', 'content' => 'क्षमता'],
                ['title' => 'accept_term_cond', 'content' => 'कृपया हमारे नियमों और शर्तों को स्वीकार करें'],
                ['title' => 'no_waiting_message', 'content' => 'क्या आप वाकई आरक्षण करना चाहते हैं? आपके पास कोई प्रतीक्षा कतार नहीं है।'],
                ['title' => 'your_turn', 'content' => 'अब आपकी बारी है'],
                ['title' => 'booked', 'content' => 'बुक'],
                ['title' => 'select_floor', 'content' => 'कृपया मंजिल का चयन करें.'],
            ]
        ];

        return $contentsArray;
    }
}
