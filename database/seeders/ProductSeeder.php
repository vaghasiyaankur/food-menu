<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Product;
use App\Models\ProductLanguage;
use App\Models\ProductRestaurantLanguage;
use App\Models\RestaurantLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            ['name' => ['Undhiyu','ઊંધિયું','उंधियू'], 'price' => '10', 'sub_category_id' => 1],
            ['name' => ['Sev Tamatar','સેવ ટમાટર','सेव टमाटर'], 'price' => '8', 'sub_category_id' => 1],
            ['name' => ['Dhokli Sabji','ઢોકલી સબજી','ढोकली सब्जी'], 'price' => '7', 'sub_category_id' => 1],
            ['name' => ['Urad Dal','ઉડીદ દાળ','उड़द दाल'], 'price' => '5', 'sub_category_id' => 1],
            ['name' => ['Chana Masala','ચણા મસાલા','चना मसाला'], 'price' => '6', 'sub_category_id' => 1],
            ['name' => ['Onion','કાંદો','प्याज'], 'price' => '2', 'sub_category_id' => 1],
            ['name' => ['Aloo Matar','આલૂ મટર','आलू मटर'], 'price' => '6', 'sub_category_id' => 1],
            ['name' => ['Bhindi Masala','ભીંડી મસાલા','भिंडी मसाला'], 'price' => '7', 'sub_category_id' => 1],
            ['name' => ['Baingan Bhartha','બૈંગન ભરથા','बैंगन भर्ता'], 'price' => '7', 'sub_category_id' => 1],
            ['name' => ['Plain Roti','સાદો રોટલો','सादा रोटी'], 'price' => '0.50', 'sub_category_id' => 2],
            ['name' => ['Bajri Rotlo','બાજરી રોટલો','बाजरी रोटलो'], 'price' => '1', 'sub_category_id' => 2],
            ['name' => ['Juvar Rotlo','જુવાર રોટલો','जुवार रोटलो'], 'price' => '1', 'sub_category_id' => 2],
            ['name' => ['Makai Rotlo','મકાઇ રોટલો','मकई रोटलो'], 'price' => '1', 'sub_category_id' => 2],
            ['name' => ['Thepla','થેપલા','थेपला'], 'price' => '1', 'sub_category_id' => 2],
            ['name' => ['Rice Roti','ચોખાનું રોટલો','चावल की रोटी'], 'price' => '1', 'sub_category_id' => 2],
            ['name' => ['Moong Dal Papad','મૂંગ દાળ પાપડ','मूंग दाल पापड़'], 'price' => '3', 'sub_category_id' => 3],
            ['name' => ['Urad Dal Papad','ઉડીદ દાળ પાપડ','उड़द दाल पापड़'], 'price' => '3', 'sub_category_id' => 3],
            ['name' => ['Jeera Rice Papad','જીરા રાઇસ પાપડ','जीरा चावल पापड़'], 'price' => '3', 'sub_category_id' => 3],
            ['name' => ['Masala Papad','મસાલા પાપડ','मसाला पापड़'], 'price' => '3', 'sub_category_id' => 3],
            ['name' => ['Kadhi Khichdi','કઢી ખીચડી','कढ़ी खिचड़ी'], 'price' => '8', 'sub_category_id' => 4],
            ['name' => ['Dal Dhokli','દાળ ઢોકળી','दाल ढोकली'], 'price' => '7', 'sub_category_id' => 4],
            ['name' => ['Khandvi','ખંડવી','खांडवी'], 'price' => '6', 'sub_category_id' => 4],
            ['name' => ['Handvo','હંડવો','हांडवो'], 'price' => '8', 'sub_category_id' => 4],
            ['name' => ['Patra','પત્રા','पत्रा'], 'price' => '7', 'sub_category_id' => 4],
            ['name' => ['Muthiya Dhokla','મૂથિયા ઢોકળા','मूथिया ढोकला'], 'price' => '7', 'sub_category_id' => 4],
            ['name' => ['Lilva Kachori','લીલવા કચોરી','लिलवा कचौड़ी'], 'price' => '2', 'sub_category_id' => 4],
            ['name' => ['Khichu','ખીચુ','खीचू'], 'price' => '4', 'sub_category_id' => 4],
            ['name' => ['Khaman/Dhokla','ખમણ/ઢોકળા','खमन/ढोकला'], 'price' => '5', 'sub_category_id' => 4],
            ['name' => ['Locho','લોચો','लोचो'], 'price' => '6', 'sub_category_id' => 4],
            ['name' => ['Bateta Bhungla','બટેટા ભુંગળા','बटेटा भुंगला'], 'price' => '6', 'sub_category_id' => 4],
            ['name' => ['Bhajiya','ભજીયા','भजिया'], 'price' => '5', 'sub_category_id' => 4],
            ['name' => ['Ghughra','ઘુઘરા','घुघरा'], 'price' => '2', 'sub_category_id' => 4],
            ['name' => ['Bread Pakora','બ્રેડ પકોરા','ब्रेड पकोड़ा'], 'price' => '1', 'sub_category_id' => 4],

            ['name' => ['Veg Manchow Soup','વેજ મંચો સૂપ','वेज मंचाउ सूप'], 'price' => '4.99', 'sub_category_id' => 5],
            ['name' => ['Mushroom Soup','મશરૂમ સૂપ','मशरूम सूप'], 'price' => '4.49', 'sub_category_id' => 5],
            ['name' => ['Tomato Soup','ટમેટો સૂપ','टमाटर सूप'], 'price' => '3.99', 'sub_category_id' => 5],
            ['name' => ['Carrot Soup','ગાજર સૂપ','गाजर सूप'], 'price' => '4.29', 'sub_category_id' => 5],
            ['name' => ['Vegetable Soup','વેજિટેબલ સૂપ','सब्जी सूप'], 'price' => '4.49', 'sub_category_id' => 5],
            ['name' => ['Broccoli Soup','બ્રોકોલી સૂપ','ब्रोकोली सूप'], 'price' => '4.99', 'sub_category_id' => 5],
            ['name' => ['Sweet Corn Veg Soup','સ્વીટ કોર્ન વેજ સૂપ','मीठा मकई वेज सूप'], 'price' => '4.29', 'sub_category_id' => 5],
            ['name' => ['Veg Fried Rice','વેજ ફ્રાઇડ રાઈસ','वेज फ्राइड राइस'], 'price' => '7.99', 'sub_category_id' => 6],
            ['name' => ['Mushroom Fried Rice','મશરૂમ ફ્રાઇડ રાઈસ','मशरूम फ्राइड राइस'], 'price' => '8.49', 'sub_category_id' => 6],
            ['name' => ['Paneer Fried Rice','પનીર ફ્રાઇડ રાઈસ','पनीर फ्राइड राइस'], 'price' => '9.99', 'sub_category_id' => 6],
            ['name' => ['Schezwan Fried Rice','સ્ચેઝવાન ફ્રાઇડ રાઈસ','स्चेजवान फ्राइड राइस'], 'price' => '8.99', 'sub_category_id' => 6],
            ['name' => ['Hakka Noodles','હક્કા નૂડલ્સ','हक्का नूडल्स'], 'price' => '7.49', 'sub_category_id' => 7],
            ['name' => ['Schezwan Noodles','સ્ચેઝવાન નૂડલ્સ','स्चेजवान नूडल्स'], 'price' => '7.99', 'sub_category_id' => 7],
            ['name' => ['Singapuri Noodles','સિંગાપુરી નૂડલ્સ','सिंगापुरी नूडल्स'], 'price' => '8.29', 'sub_category_id' => 7],
            ['name' => ['Burnt Garlic Noodles','બર્ન્ટ ગાર્લિક નૂડલ્સ','जले हुए लहसुन नूडल्स'], 'price' => '7.79', 'sub_category_id' => 7],
            ['name' => ['Crispy Noodles','ક્રિસ્પી નૂડલ્સ','क्रिस्पी नूडल्स'], 'price' => '6.99', 'sub_category_id' => 7],
            ['name' => ['Hong Kong Noodles','હોંગ કોંગ નૂડલ્સ','हांग कांग नूडल्स'], 'price' => '8.49', 'sub_category_id' => 7],
            ['name' => ['Penne Pasta','પેન્ને પાસ્તા','पेने पास्ता'], 'price' => '8.99', 'sub_category_id' => 8],
            ['name' => ['Creamy Garlic Penne Pasta','ક્રીમી ગાર્લિક પેન્ને પાસ્તા','क्रीमी लहसुन पेने पास्ता'], 'price' => '9.49', 'sub_category_id' => 8],
            ['name' => ['Ravioli Pasta','રાવિયોલી પાસ્તા','रवियोली पास्ता'], 'price' => '10.99', 'sub_category_id' => 8],
            ['name' => ['Pesto Pasta','પેસ્ટો પાસ્તા','पेस्टो पास्ता'], 'price' => '9.79', 'sub_category_id' => 8],
            ['name' => ['Plain Maggi','પ્લેન માગી','प्लेन मैगी'], 'price' => '3.49', 'sub_category_id' => 8],
            ['name' => ['Macaroni Cheese Pasta','મેકરોની ચીઝ પાસ્તા','मैकरोनी चीज पास्ता'], 'price' => '8.29', 'sub_category_id' => 8],
            ['name' => ['Vegetable Maggi','વેજિટેબલ માગી','सब्जी मैगी'], 'price' => '4.29', 'sub_category_id' => 8],
            ['name' => ['Cheese Maggi','ચીઝ માગી','चीज मैगी'], 'price' => '4.49', 'sub_category_id' => 8],
            ['name' => ['Corn Maggi','કોર્ન માગી','मकई मैगी'], 'price' => '4.29', 'sub_category_id' => 8],
            ['name' => ['Cheese Corn Maggi','ચીઝ કોર્ન માગી','चीज कॉर्न मैगी'], 'price' => '4.99', 'sub_category_id' => 8],
            ['name' => ['Veg Manchurian Grevy','વેજ મંચુરિયન ગ્રેવી','वेज मंचूरियन ग्रेवी'], 'price' => '10.49', 'sub_category_id' => 9],
            ['name' => ['Veg Manchurian Dry','વેજ મંચુરિયન ડ્રાય','वेज मंचूरियन ड्राई'], 'price' => '9.99', 'sub_category_id' => 9],
            ['name' => ['Paneer Manchurian','પનીર મંચુરિયન','पनीर मंचूरियन'], 'price' => '11.49', 'sub_category_id' => 9],
            ['name' => ['Paneer Chilli','પનીર ચિલી','पनीर चिल्ली'], 'price' => '10.99', 'sub_category_id' => 9],
            ['name' => ['Schezwan Paneer','સ્ચેઝવાન પનીર','स्चेजवान पनीर'], 'price' => '11.29', 'sub_category_id' => 9],
            ['name' => ['Mushroom Schezwan','મશરૂમ સ્ચેઝવાન','मशरूम स्चेजवान'], 'price' => '10.49', 'sub_category_id' => 9],
            ['name' => ['Mushroom Chilli','મશરૂમ ચિલી','मशरूम चिल्ली'], 'price' => '9.99', 'sub_category_id' => 9],
            ['name' => ['Taiwan Gravy','તાઇવાન ગ્રેવી','ताइवान ग्रेवी'], 'price' => '10.79', 'sub_category_id' => 9],
            ['name' => ['Thai Curry','થાઈ કરી','थाई करी'], 'price' => '11.99', 'sub_category_id' => 9],
            ['name' => ['Green Curry','ગ્રીન કરી','हरी करी'], 'price' => '12.49', 'sub_category_id' => 9],

            ['name' => ['Kaju Curry','કાજૂ કરી','काजू करी'], 'price' => '8.99', 'sub_category_id' => 10],
            ['name' => ['Kaju Paneer','કાજુ પનીર','काजू पनीर'], 'price' => '9.99', 'sub_category_id' => 10],
            ['name' => ['Paneer Tikka Masala','પનીર ટિક્કા મસાલા','पनीर टिक्का मसाला'], 'price' => '10.99', 'sub_category_id' => 10],
            ['name' => ['Paneer Bhurji','પનીર ભુર્જી','पनीर भुर्जी'], 'price' => '8.49', 'sub_category_id' => 10],
            ['name' => ['Paneer Tufani','પનીર તુફાની','पनीर तुफानी'], 'price' => '9.49', 'sub_category_id' => 10],
            ['name' => ['Paneer Handi','પનીર હાંડી','पनीर हांडी'], 'price' => '11.99', 'sub_category_id' => 10],
            ['name' => ['Paneer Shahi Korma','પનીર શાહી કોરમા','पनीर शाही कोरमा'], 'price' => '12.49', 'sub_category_id' => 10],
            ['name' => ['Paneer Patiyala','પનીર પટિયાલા','पनीर पटियाला'], 'price' => '9.99', 'sub_category_id' => 10],
            ['name' => ['Paneer Palak','પનીર પાલક','पनीर पालक'], 'price' => '10.49', 'sub_category_id' => 10],
            ['name' => ['Paneer Kadai','પનીર કડાઇ','पनीर कडाई'], 'price' => '9.99', 'sub_category_id' => 10],
            ['name' => ['Paneer Butter Masala','પનીર બટર મસાલા','पनीर बटर मसाला'], 'price' => '11.99', 'sub_category_id' => 10],
            ['name' => ['Paneer Mutter','પનીર મટર','पनीर मटर'], 'price' => '10.99', 'sub_category_id' => 10],
            ['name' => ['Paneer Afghani','પનીર અફગાની','पनीर अफगानी'], 'price' => '12.99', 'sub_category_id' => 10],
            ['name' => ['Paneer Angara','પનીર અંગારા','पनीर अंगारा'], 'price' => '11.49', 'sub_category_id' => 10],
            ['name' => ['Paneer Pasanda','પનીર પસંદા','पनीर पसंदा'], 'price' => '12.49', 'sub_category_id' => 10],
            ['name' => ['Chapati','ચપાતી','चपाती'], 'price' => '0.50', 'sub_category_id' => 11],
            ['name' => ['Butter Chapati','બટર ચપાતી','बटर चपाती'], 'price' => '0.75', 'sub_category_id' => 11],
            ['name' => ['Plain Paratha','પ્લેન પરોઠા','प्लेन पराठा'], 'price' => '1.25', 'sub_category_id' => 11],
            ['name' => ['Garlic Butter Paratha','લસણ બટર પરોઠા','लहसुन बटर पराठा'], 'price' => '1.50', 'sub_category_id' => 11],
            ['name' => ['Gobi Paratha','ગોબી પરોઠા','गोभी पराठा'], 'price' => '1.75', 'sub_category_id' => 11],
            ['name' => ['Aloo Paratha','આલુ પરોઠા','आलू पराठा'], 'price' => '1.99', 'sub_category_id' => 11],
            ['name' => ['Methi Paratha','મેથી પરોઠા','मेथी पराठा'], 'price' => '1.75', 'sub_category_id' => 11],
            ['name' => ['Beetroot Paratha','બીટરુટ પરોઠા','बीटरूट पराठा'], 'price' => '1.99', 'sub_category_id' => 11],
            ['name' => ['Cheese Paratha','ચીઝ પરોઠા','चीज़ पराठा'], 'price' => '2.25', 'sub_category_id' => 11],
            ['name' => ['Broccoli Paratha','બ્રોકોલી પરોઠા','ब्रोकोली पराठा'], 'price' => '2.49', 'sub_category_id' => 11],
            ['name' => ['Pizza Paratha','પિઝા પરોઠા','पिज़्ज़ा पराठा'], 'price' => '2.99', 'sub_category_id' => 11],
            ['name' => ['Tandoori Roti','તંદૂરી રોટી','तंदूरी रोटी'], 'price' => '0.75', 'sub_category_id' => 12],
            ['name' => ['Tandoori Butter Roti','તંદૂરી બટર રોટી','तंदूरी बटर रोटी'], 'price' => '1.00', 'sub_category_id' => 12],
            ['name' => ['Tandoori Plain Naan','તંદૂરી પ્લેન નાન','तंदूरी प्लेन नान'], 'price' => '1.25', 'sub_category_id' => 12],
            ['name' => ['Tandoori Butter Naan','તંદૂરી બટર નાન','तंदूरी बटर नान'], 'price' => '1.50', 'sub_category_id' => 12],
            ['name' => ['Tandoori Kulcha','તંદૂરી કુલચા','तंदूरी कुलचा'], 'price' => '1.75', 'sub_category_id' => 12],
            ['name' => ['Tandoori Butter Kulcha','તંદૂરી બટર કુલચા','तंदूरी बटर कुलचा'], 'price' => '2.00', 'sub_category_id' => 12],
            ['name' => ['Plain Rice','પ્લેન રાઇસ','प्लेन चावल'], 'price' => '2.99', 'sub_category_id' => 13],
            ['name' => ['Jeera Rice','જીરા રાઇસ','जीरा चावल'], 'price' => '3.49', 'sub_category_id' => 13],
            ['name' => ['Veg Biryani','વેજ બિરયાની','वेज बिरयानी'], 'price' => '8.99', 'sub_category_id' => 13],
            ['name' => ['Masala Rice','મસાલા રાઇસ','मसाला चावल'], 'price' => '3.99', 'sub_category_id' => 13],
            ['name' => ['Green Peas Pulav','હરા વટાણા પુલાવ','हरी मटर पुलाव'], 'price' => '4.49', 'sub_category_id' => 13],
            ['name' => ['Paneer Pulav','પનીર પુલાવ','पनीर पुलाव'], 'price' => '7.99', 'sub_category_id' => 13],
            ['name' => ['Kashmiri Pulav','કશ્મીરી પુલાવ','कश्मीरी पुलाव'], 'price' => '5.49', 'sub_category_id' => 13],
            ['name' => ['Veg Hydrabadi Biryani','વેજ હૈદરાબાદી બિરયાની','वेज हैदराबादी बिरयानी'], 'price' => '9.49', 'sub_category_id' => 13],
            ['name' => ['Veg Pulav','વેજ પુલાવ','वेज पुलाव'], 'price' => '6.99', 'sub_category_id' => 13],
            ['name' => ['Punjabi Khichdi','પંજાબી ખીચડી','पंजाबी खिचड़ी'], 'price' => '5.99', 'sub_category_id' => 13],
            ['name' => ['Butter Milk','બટર મિલ્ક','बटर मिल्क'], 'price' => '1.99', 'sub_category_id' => 14],
            ['name' => ['Punjabi Lassi','પંજાબી લસ્સી','पंजाबी लस्सी'], 'price' => '2.49', 'sub_category_id' => 14],
            ['name' => ['Mango Lassi','મેંગો લસ્સી','आम लस्सी'], 'price' => '2.99', 'sub_category_id' => 14],
            ['name' => ['Gulab Lassi','ગુલાબ લસ્સી','गुलाब लस्सी'], 'price' => '3.49', 'sub_category_id' => 14],
            ['name' => ['Kesar Pista Lassi','કેસર પિસ્તા લસ્સી','केसर पिस्ता लस्सी'], 'price' => '3.99', 'sub_category_id' => 14],
            ['name' => ['Strawberry Lassi','સ્ટ્રોબેરી લસ્સી','स्ट्रॉबेरी लस्सी'], 'price' => '3.49', 'sub_category_id' => 14],
            ['name' => ['Green Salad','હરા સલાડ','हरा सलाद'], 'price' => '4.99', 'sub_category_id' => 14],
            ['name' => ['Masala Papad','મસાલા પાપડ','मसाला पापड़'], 'price' => '1.99', 'sub_category_id' => 14],
            ['name' => ['Papad','પાપડ','पापड़'], 'price' => '0.99', 'sub_category_id' => 14],

            ['name' => ['Vanilla','વેનિલા','वेनिला'], 'price' => '3.50', 'sub_category_id' => 15],
            ['name' => ['Chocolate','ચોકલેટ','चॉकलेट'], 'price' => '3.50', 'sub_category_id' => 15],
            ['name' => ['Strawberry','સ્ટ્રોબેરી','स्ट्रॉबेरी'], 'price' => '3.50', 'sub_category_id' => 15],
            ['name' => ['Tender Coconut','ટેન્ડર નારિયલ','टेंडर कोकोनट'], 'price' => '4.00', 'sub_category_id' => 15],
            ['name' => ['Mango','કેરી','आम'], 'price' => '4.00', 'sub_category_id' => 15],
            ['name' => ['Guava','જામફળ','अमरूद'], 'price' => '3.00', 'sub_category_id' => 15],
            ['name' => ['Black Grapes','બ્લેક અંગૂર','काली अंगूर'], 'price' => '3.50', 'sub_category_id' => 15],
            ['name' => ['Kaju Kishmish','કાજુ કિશમિશ','काजू किशमिश'], 'price' => '4.50', 'sub_category_id' => 15],
            ['name' => ['Kesar Pista','કેસર પિસ્તા','केसर पिस्ता'], 'price' => '4.50', 'sub_category_id' => 15],
            ['name' => ['Anjeer','અંજીર','अंजीर'], 'price' => '4.50', 'sub_category_id' => 15],
            ['name' => ['Butter Scotch','બટર સ્કોચ','बटर स्कॉच'], 'price' => '3.50', 'sub_category_id' => 15],
            ['name' => ['Pineapple Cake','પાઈનેપ્પલ કેક','पाइनएप्पल केक'], 'price' => '25.00', 'sub_category_id' => 16],
            ['name' => ['Black Forest Cake','બ્લેક ફોરેસ્ટ કેક','ब्लैक फॉरेस्ट केक'], 'price' => '30.00', 'sub_category_id' => 16],
            ['name' => ['Strawberry Cake','સ્ટ્રોબેરી કેક','स्ट्रॉबेरी केक'], 'price' => '28.00', 'sub_category_id' => 16],
            ['name' => ['Butter Scotch Cake','બટર સ્કોચ કેક','बटर स्कॉच केक'], 'price' => '27.00', 'sub_category_id' => 16],
            ['name' => ['Mix Fruit Cake','મિક્સ ફ્રુટ કેક','मिक्स फ्रूट केक'], 'price' => '30.00', 'sub_category_id' => 16],
            ['name' => ['Choco Vanilla Cake','ચોકો વનીલા કેક','चोको वनिला केक'], 'price' => '28.00', 'sub_category_id' => 16],
            ['name' => ['Choco Chips Cake','ચોકો ચિપ્સ કેક','चोको चिप्स केक'], 'price' => '28.00', 'sub_category_id' => 16],
            ['name' => ['White Forest Cake','વ્હાઇટ ફોરેસ્ટ કેક','व्हाइट फॉरेस्ट केक'], 'price' => '30.00', 'sub_category_id' => 16],
            ['name' => ['Cheese Cake','ચીઝ કેક','चीज़ केक'], 'price' => '32.00', 'sub_category_id' => 16],
            ['name' => ['Red Velvet Cake','રેડ વેલ્વેટ કેક','रेड वेलवेट केक'], 'price' => '35.00', 'sub_category_id' => 16],
            ['name' => ['Brownie Cake','બ્રાઉની કેક','ब्राउनी केक'], 'price' => '30.00', 'sub_category_id' => 16],
            ['name' => ['Blueberry Cake','બ્લૂબેરી કેક','ब्लूबेरी केक'], 'price' => '32.00', 'sub_category_id' => 16],
            ['name' => ['Chocolate Cake','ચોકલેટ કેક','चॉकलेट केक'], 'price' => '30.00', 'sub_category_id' => 16],
            ['name' => ['Walnut Cake','વોલનટ કેક','अखरोट केक'], 'price' => '32.00', 'sub_category_id' => 16],
            ['name' => ['Cherry Cake','ચેરી કેક','चेरी केक'], 'price' => '32.00', 'sub_category_id' => 16],
            ['name' => ['Chocolate Chunk','ચોકલેટ ચંક','चॉकलेट चंक'], 'price' => '2.50', 'sub_category_id' => 17],
            ['name' => ['Peanut Butter Chip','પીનટ બટર ચિપ','पीनट बटर चिप'], 'price' => '2.50', 'sub_category_id' => 17],
            ['name' => ['Almond Milk Cookies','બદામ મિલ્ક કુકીઝ','बादाम मिल्क कुकीज़'], 'price' => '3.00', 'sub_category_id' => 17],
            ['name' => ['Salted Caramel','સોલ્ટેડ કૅરમેલ','सॉल्टेड कैरेमल'], 'price' => '2.50', 'sub_category_id' => 17],
            ['name' => ['Atta Biscuit','આટા બિસ્કીટ','आटा बिस्किट'], 'price' => '3.00', 'sub_category_id' => 17],
            ['name' => ['Butter Cashew Cookies','બટર કાજુ કુકીઝ','बटर काजू कुकीज़'], 'price' => '3.50', 'sub_category_id' => 17],
            ['name' => ['Dry Fruit Cookies','ડ્રાય ફ્રૂટ કુકીઝ','ड्राई फ्रूट कुकीज़'], 'price' => '3.50', 'sub_category_id' => 17],
            ['name' => ['Walnut Cookies','વોલનટ કુકીઝ','अखरोट कुकीज़'], 'price' => '3.50', 'sub_category_id' => 17],
            ['name' => ['Multigrain Cookies','મલ્ટીગ્રેન કુકીઝ','मल्टीग्रेन कुकीज़'], 'price' => '3.00', 'sub_category_id' => 17],
            ['name' => ['Salty Delight Cookies','સોલ્ટી ડિલાઇટ કુકીઝ','सॉल्टी डिलाइट कुकीज़'], 'price' => '3.00', 'sub_category_id' => 17],
            ['name' => ['Vanilla Biscuit Cookies','વેનિલા બિસ્કિટ કુકીઝ','वेनिला बिस्किट कुकीज़'], 'price' => '2.50', 'sub_category_id' => 17],
            ['name' => ['French Heart','ફ્રેંચ હાર્ટ','फ्रेंच हार्ट'], 'price' => '2.50', 'sub_category_id' => 17],
            ['name' => ['Marori Jeera','મરોરી જીરા','मरोरी जीरा'], 'price' => '2.50', 'sub_category_id' => 17],
            ['name' => ['Chocolate Shake','ચોકલેટ શેક','चॉकलेट शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Oreo Shake','ઓરીઓ શેક','ओरियो शेक'], 'price' => '5.50', 'sub_category_id' => 18],
            ['name' => ['Strawberry Shake','સ્ટ્રોબેરી શેક','स्ट्रॉबेरी शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Kit Kat Shake','કિટકેટ શેક','किटकैट शेक'], 'price' => '5.50', 'sub_category_id' => 18],
            ['name' => ['Mango Shake','કેરી શેક','आम शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Vanilla Shake','વેનિલા શેક','वेनिला शेक'], 'price' => '4.50', 'sub_category_id' => 18],
            ['name' => ['Butter Scotch Shake','બટર સ્કોચ શેક','बटर स्कॉच शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Pineapple Shake','પાઇનએપ્પલ શેક','पाइनएप्पल शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Apple Shake','એપલ શેક','सेब शेक'], 'price' => '4.50', 'sub_category_id' => 18],
            ['name' => ['Green Apple','ગ્રીન એપલ','हरा सेब'], 'price' => '4.00', 'sub_category_id' => 18],
            ['name' => ['Fig Shake','અંજીર શેક','अंजीर शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Litchi Shake','લીચી શેક','लीची शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Avocado Shake','એવોકાડો શેક','एवोकाडो शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Blueberry Shake','બ્લૂબેરી શેક','ब्लूबेरी शेक'], 'price' => '5.00', 'sub_category_id' => 18],
            ['name' => ['Vanilla Falooda','વેનિલા ફાલૂદા','वेनिला फालूदा'], 'price' => '4.00', 'sub_category_id' => 19],
            ['name' => ['Rose Falooda','રોઝ ફાલૂદા','गुलाब फालूदा'], 'price' => '4.00', 'sub_category_id' => 19],
            ['name' => ['Kesar Pista','કેસર પિસ્તા','केसर पिस्ता'], 'price' => '4.50', 'sub_category_id' => 19],
            ['name' => ['Shahi Badam','શાહી બાદામ','शाही बादाम'], 'price' => '5.00', 'sub_category_id' => 19],
            ['name' => ['Rajbhog','રાજભોગ','राजभोग'], 'price' => '5.50', 'sub_category_id' => 19],
            ['name' => ['Royal Nuts','રોયલ નટ્સ','रॉयल नट्स'], 'price' => '6.00', 'sub_category_id' => 19],

            ['name' => ['Upma','ઉપમા','उपमा'], 'price' => '3.50', 'sub_category_id' => 20],
            ['name' => ['Rice Idli','રાઇસ ઈડલી','चावल की इडली'], 'price' => '1.50', 'sub_category_id' => 20],
            ['name' => ['Dahi Idli','દહી ઈડલી','दही इडली'], 'price' => '2.00', 'sub_category_id' => 20],
            ['name' => ['Rava Idli','રવા ઈડલી','रवा इडली'], 'price' => '1.75', 'sub_category_id' => 20],
            ['name' => ['Kanchi Puram','કાંચી પુરમ','कांची पुरम'  ], 'price' => '4.00', 'sub_category_id' => 20],
            ['name' => ['Plain Vada','સરસ વડા','सादा वड़ा'], 'price' => '1.25', 'sub_category_id' => 21],
            ['name' => ['Sambar Vada','સાંબર વડા','सांभर वड़ा'], 'price' => '1.50', 'sub_category_id' => 21],
            ['name' => ['Rasam Vada','રસમ વડા','रसम वड़ा'], 'price' => '1.75', 'sub_category_id' => 21],
            ['name' => ['Dahi Vada','દહી વડા','दही वड़ा'], 'price' => '2.25', 'sub_category_id' => 21],
            ['name' => ['Onion Vada','ડુંગળી વડા','प्याज का वड़ा'  ], 'price' => '1.50', 'sub_category_id' => 21],
            ['name' => ['Dal Vada','દાળ વડા','दाल का वड़ा'  ], 'price' => '1.75', 'sub_category_id' => 21],
            ['name' => ['Mysore Bonda','મયસૂર બોન્ડા','मैसूर बोंडा'], 'price' => '2.50', 'sub_category_id' => 21],
            ['name' => ['Mix Veg. Vada','મિક્સ વેજ વડા','मिक्स वेज वड़ा'], 'price' => '2.00', 'sub_category_id' => 21],
            ['name' => ['Jini Dosa','જિની ડોસા','जिनी डोसा'], 'price' => '5.00', 'sub_category_id' => 22],
            ['name' => ['Pav Bhaji Dosa','પાવ ભાજી ડોસા','पाव भाजी डोसा'], 'price' => '4.50', 'sub_category_id' => 22],
            ['name' => ['Paneer jini Dosa','પનીર જિની ડોસા','पनीर जिनी डोसा'], 'price' => '6.00', 'sub_category_id' => 22],
            ['name' => ['Cheese Paneer Chilli Dosa','ચીઝ પનીર ચિલ્લી ડોસા','चीज़ पनीर चिल्ली डोसा'], 'price' => '6.50', 'sub_category_id' => 22],
            ['name' => ['Pizza Dosa','પિઝા ડોસા','पिज़्ज़ा डोसा'], 'price' => '7.00', 'sub_category_id' => 22],
            ['name' => ['Masala Dosa','મસાલા ડોસા','मसाला डोसा'], 'price' => '4.00', 'sub_category_id' => 22],
            ['name' => ['Plain Dosa','સરસ ડોસા','सादा डोसा'], 'price' => '3.00', 'sub_category_id' => 22],
            ['name' => ['Mysore Masala Dosa','મયસૂર મસાલા ડોસા','मैसूर मसाला डोसा'], 'price' => '4.50', 'sub_category_id' => 22],
            ['name' => ['Neer Dosa','નીર ડોસા','नीर डोसा'], 'price' => '2.50', 'sub_category_id' => 22],
            ['name' => ['Oats Dosa','ઓટ્સ ડોસા','ओट्स डोसा'], 'price' => '3.50', 'sub_category_id' => 22],
            ['name' => ['Palak Paneer Dosa','પાલક પનીર ડોસા','पालक पनीर डोसा'], 'price' => '5.00', 'sub_category_id' => 22],
            ['name' => ['Instant Moong Dal Dosa','તત્કાલ મૂંગ દાળ ડોસા','तत्काल मूंग दाल डोसा'  ], 'price' => '3.25', 'sub_category_id' => 22],
            ['name' => ['Jowar Dosa','જોવાર ડોસા','ज्वार डोसा'], 'price' => '3.00', 'sub_category_id' => 22],
            ['name' => ['Bajra Dosa','બાજરા ડોસા','बाजरा डोसा'], 'price' => '3.25', 'sub_category_id' => 22],
            ['name' => ['Ragi Dosa','રાગી ડોસા','रागी डोसा'], 'price' => '3.00', 'sub_category_id' => 22],
            ['name' => ['Plain Uttapam','સરસ ઉત્તપમ','सादा उत्तपम'], 'price' => '3.00', 'sub_category_id' => 23],
            ['name' => ['Onion Uttapam','ડુંગળી ઉત્તપમ','प्याज उत्तपम'], 'price' => '3.50', 'sub_category_id' => 23],
            ['name' => ['Onion Tomato Uttapam','ડુંગળી ટમેટું ઉત્તપમ','प्याज टमाटर उत्तपम'], 'price' => '3.75', 'sub_category_id' => 23],
            ['name' => ['Coconut Uttapam','નારિયેળ ઉત્તપમ','नारियल उत्तपम'], 'price' => '4.00', 'sub_category_id' => 23],
            ['name' => ['Tomato Uttapam','ટમેટું ઉત્તપમ','टमाटर उत्तपम'], 'price' => '3.50', 'sub_category_id' => 23],
            ['name' => ['Mix Veg. Uttapam','મિક્સ વેજ ઉત્તપમ','मिक्स वेज उत्तपम'  ], 'price' => '4.00', 'sub_category_id' => 23],
            ['name' => ['Pudina Paneer Uttapam','પુદીના પનીર ઉત્તપમ','पुदीना पनीर उत्तपम'], 'price' => '4.50', 'sub_category_id' => 23],
            ['name' => ['Rava Plain Dosa','રવા સરસ ડોસા','रवा सादा डोसा'  ], 'price' => '3.25', 'sub_category_id' => 24],
            ['name' => ['Rava Masala Dosa','રવા મસાલા ડોસા','रवा मसाला डोसा'], 'price' => '4.00', 'sub_category_id' => 24],
            ['name' => ['Onion Rava Dosa','ડુંગળી રવા ડોસા','प्याज रवा डोसा'], 'price' => '3.50', 'sub_category_id' => 24],
            ['name' => ['Butter Rava Dosa','બટર રવા ડોસા','मक्खन रवा डोसा'], 'price' => '3.75', 'sub_category_id' => 24],
            ['name' => ['Butter Onion Rava Dosa','બટર ડુંગળી રવા ડોસા','मक्खन प्याज रवा डोसा'], 'price' => '4.00', 'sub_category_id' => 24],
            ['name' => ['Mysore Rava Dosa','મયસૂર રવા ડોસા','मैसूर रवा डोसा'], 'price' => '4.50', 'sub_category_id' => 24],
            ['name' => ['Coconut Rava Dosa','નારિયેળ રવા ડોસા','नारियल रवा डोसा'], 'price' => '4.00', 'sub_category_id' => 24],
            ['name' => ['Veg. Rava Dosa','વેજ રવા ડોસા','वेज रवा डोसा'], 'price' => '3.75', 'sub_category_id' => 24],
            ['name' => ['Mysore Onion Rava Dosa','મયસૂર ડુંગળી રવા ડોસા','मैसूर प्याज रवा डोसा'], 'price' => '4.00', 'sub_category_id' => 24],

            ['name' => ['Veg. Mayo Sandwich','વેજ મેયો સેન્ડવિચ','वेज मेयो सैंडविच'], 'price' => '4.50', 'sub_category_id' => 25],
            ['name' => ['Veg. Salad Sandwich','વેજ સલાડ સેન્ડવિચ','वेज सलाद सैंडविच'], 'price' => '5.00', 'sub_category_id' => 25],
            ['name' => ['Veg. Cutlet Sandwich','વેજ કટલેટ સેન્ડવિચ','वेज कटलेट सैंडविच'], 'price' => '4.75', 'sub_category_id' => 25],
            ['name' => ['Veg. Grilled Sandwich','વેજ ગ્રિલ્ડ સેન્ડવિચ','वेज ग्रिल्ड सैंडविच'], 'price' => '5.25', 'sub_category_id' => 25],
            ['name' => ['Cheese Mayo Sandwich','ચીઝ મેયો સેન્ડવિચ','चीज़ मेयो सैंडविच'], 'price' => '5.50', 'sub_category_id' => 25],
            ['name' => ['Margherita','માર્ગરીટા','मार्गरीटा'], 'price' => '8.00', 'sub_category_id' => 26],
            ['name' => ['Penne Pasta Pizza','પેન પાસ્તા પિઝા','पेने पास्ता पिज़्ज़ा'], 'price' => '10.50', 'sub_category_id' => 26],
            ['name' => ['Mexican Green Wave','મેક્સિકન ગ્રીન વેવ','मैक्सिकन ग्रीन वेव'], 'price' => '9.75', 'sub_category_id' => 26],
            ['name' => ['Veggie Fiesta','વેજી ફિએસ્ટા','वेजी फिएस्ता'], 'price' => '9.00', 'sub_category_id' => 26],
            ['name' => ['Cheese n Corn','ચીઝ અને કોર્ન','चीज़ एन कॉर्न'], 'price' => '8.50', 'sub_category_id' => 26],
            ['name' => ['Triple Veg Delight','ટ્રિપલ વેજ ડેલાઇટ','ट्रिपल वेज डिलाइट'], 'price' => '10.00', 'sub_category_id' => 26],
            ['name' => ['Double Cheese Margherita','ડબલ ચીઝ માર્ગરીટા','डबल चीज़ मार्गरीटा'], 'price' => '9.50', 'sub_category_id' => 26],
            ['name' => ['Cheesy 7 Pizza','ચીઝી 7 પિઝા','चीज़ी 7 पिज़्ज़ा'], 'price' => '11.25', 'sub_category_id' => 26],
            ['name' => ['Tandoori Paneer','તંદૂરી પનીર','तंदूरी पनीर'], 'price' => '10.75', 'sub_category_id' => 26],
            ['name' => ['New York Style','ન્યૂયોર્ક સ્ટાઇલ','न्यूयॉर्क स्टाइल'], 'price' => '11.00', 'sub_category_id' => 26],
            ['name' => ['Paneer Spice Supreme','પનીર સ્પાઇસ સુપ્રીમ','पनीर स्पाइस सुप्रीम'], 'price' => '10.25', 'sub_category_id' => 26],
            ['name' => ['Italian Style','ઇટાલિયન સ્ટાઇલ','इटैलियन स्टाइल'], 'price' => '9.75', 'sub_category_id' => 26],
            ['name' => ['Veggie Fiesta Burger','વેજી ફિએસ્ટા બર્ગર','वेजी फिएस्ता बर्गर'], 'price' => '6.50', 'sub_category_id' => 27],
            ['name' => ['Tikki Double Patty Burger','ટિક્કી ડબલ પેટી બર્ગર','टिक्की डबल पैटी बर्गर'], 'price' => '7.00', 'sub_category_id' => 27],
            ['name' => ['Veggie Double Patty Burger','વેજી ડબલ પેટી બર્ગર','वेजी डबल पैटी बर्गर'], 'price' => '7.25', 'sub_category_id' => 27],
            ['name' => ['Ham Burger','હેમ બર્ગર','हैम बर्गर'], 'price' => '7.50', 'sub_category_id' => 27],
            ['name' => ['Spicy Deluxe Paneer Burger','સ્પાઈસી ડિલક્સ પનીર બર્ગર','स्पाइसी डीलक्स पनीर बर्गर'], 'price' => '8.00', 'sub_category_id' => 27],
            ['name' => ['Corn & Cheese Burger','કોર્ન અને ચીઝ બર્ગર','कॉर्न और चीज़ बर्गर'], 'price' => '6.75', 'sub_category_id' => 27],
            ['name' => ['Black Bean Veggie Burger','બ્લેક બીન વેજી બર્ગર','ब्लैक बीन वेजी बर्गर'], 'price' => '7.75', 'sub_category_id' => 27],
            ['name' => ['Aloo Tikki Burger','આલૂ ટિક્કી બર્ગર','आलू टिक्की बर्गर'], 'price' => '6.25', 'sub_category_id' => 27],
            ['name' => ['Cheese Burger Veg','ચીઝ બર્ગર વેજ','चीज़ बर्गर वेज'], 'price' => '7.00', 'sub_category_id' => 27],
            ['name' => ['Pani Puri','પાણી પુરી','पानी पूरी'], 'price' => '3.50', 'sub_category_id' => 28],
            ['name' => ['Dahi Puri','દહી પુરી','दही पूरी'], 'price' => '3.75', 'sub_category_id' => 28],
            ['name' => ['Sev Puri','સેવ પુરી','सेव पूरी'], 'price' => '3.25', 'sub_category_id' => 28],
            ['name' => ['Samosa Chaat','સમોસા ચાટ','समोसा चाट'], 'price' => '4.00', 'sub_category_id' => 28],
            ['name' => ['Ragda Patties','રગડા પટીસ','रगड़ा पैटीज़'], 'price' => '4.50', 'sub_category_id' => 28],
            ['name' => ['Bhel Puri','ભેલ પુરી','भेल पूरी'], 'price' => '3.00', 'sub_category_id' => 28],
            ['name' => ['Masala Puri','મસાલા પુરી','मसाला पूरी'], 'price' => '3.25', 'sub_category_id' => 28],
            ['name' => ['Aloo Chaat','આલૂ ચાટ','आलू चाट'], 'price' => '4.25', 'sub_category_id' => 28],
            ['name' => ['Dabeli','દાબેલી','दाबेली'], 'price' => '4.50', 'sub_category_id' => 29],
            ['name' => ['Vada Pav','વડા પાવ','वडा पाव'], 'price' => '3.00', 'sub_category_id' => 29],
            ['name' => ['Samosa','સમોસા','समोसा'], 'price' => '2.50', 'sub_category_id' => 29],
            ['name' => ['Spring Rolls','સ્પ્રિંગ રોલ્સ','स्प्रिंग रोल्स'], 'price' => '5.00', 'sub_category_id' => 29],
            ['name' => ['French Fries','ફ્રેંચ ફ્રાઇઝ','फ्रेंच फ्राइज़'], 'price' => '3.50', 'sub_category_id' => 29],
            ['name' => ['Peri Peri Fries','પેરી પેરી ફ્રાઇઝ','पेरी पेरी फ्राइज़'], 'price' => '4.00', 'sub_category_id' => 29],
            ['name' => ['Sev Rolls','સેવ રોલ્સ','सेव रोल्स'], 'price' => '3.25', 'sub_category_id' => 29],
            ['name' => ['Veg Hot Dog','વેજ હોટ ડોગ','वेज हॉट डॉग'], 'price' => '4.25', 'sub_category_id' => 29],
            ['name' => ['Pav Bhaji','પાવ ભાજી','पाव भाजी'], 'price' => '5.50', 'sub_category_id' => 29],
            ['name' => ['Ghughra','ઘુઘરા','घुघरा'], 'price' => '4.75', 'sub_category_id' => 29],

        ];


        $restaurantData = [
            ['id' => 1, 'added_by' => 1, 'start_sub_cat' => 0],
            ['id' => 2, 'added_by' => 4, 'start_sub_cat' => 29]
        ];


        $check_folder= is_dir(public_path('storage/product'));
        if(!$check_folder) mkdir(public_path('storage/product'));

        foreach($restaurantData as $restaurant){
            foreach ($products as $key=>$product) {
                $restaurant_id = $restaurant['id'];
                $newKey = $key + 1;
                $sourcePath = public_path('assets/images/seederImages/product/'.$newKey.'.webp');
                $destinationPath = public_path('storage/product/'.$restaurant_id.'-'.$newKey.'.webp');
                if (File::exists($sourcePath)) {
                    if(!File::exists($destinationPath)){
                        File::copy($sourcePath, $destinationPath);
                    }
                }
                $pro = new Product();
                $pro->image = 'product/'.$restaurant_id.'-'.$newKey.'.webp';
                $pro->price = $product['price'];
                $pro->sub_category_id = $restaurant['start_sub_cat'] + $product['sub_category_id'];
                $pro->restaurant_id = $restaurant_id;
                $pro->added_by_id = $restaurant['added_by'];
                if($pro->save()){
                    $langs = Language::whereHas('RestaurantLanguages', function ($query) use($restaurant_id) {
                        $query->where('restaurant_id', $restaurant_id)->where('status', 1);
                    })->get();
                    foreach ($langs as $k => $lang) {
                        $nameSlug = Str::slug($product['name'][0]);

                        $restaurantLanguage = RestaurantLanguage::where('restaurant_id', $restaurant_id)->where('language_id', $lang->id)->first();
                        $pro_lang = new ProductRestaurantLanguage();
                        $pro_lang->restaurant_language_id = $restaurantLanguage->id;
                        $pro_lang->product_id = $pro->id;
                        $pro_lang->name = $product['name'][$k];
                        $pro_lang->slug = $nameSlug.'-'.$restaurant_id.'-'.$k;
                        $pro_lang->save();
                    }
                }
            }
        }
    }
}
