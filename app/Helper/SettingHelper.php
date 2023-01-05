<?php
namespace App\Helper;

use App\Models\Language;
use App\Models\QrCodeToken;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class SettingHelper{

    /* Choose language */
    public static function systemLang()
    {
        $user_id = self::getUserIdUsingQrcode();
        $setting = Setting::whereUserId($user_id)->first('language_id');

        return $setting->language_id;
    }

    public static function getlanguage()
    {
        $langs = Language::whereStatus(1)->pluck('id')->toarray();
        $langId = request()->session()->get('lang');
        if ($langId && in_array($langId, $langs)) {
            return $langId;
        }else{
            return self::systemLang();
        }
    }

    public static function managerLanguage()
    {
        $lang = Language::whereName('English')->first();
        return $lang->id;
    }

    public static function getUserIdUsingQrcode()
    {
        $date = Carbon::now()->format('Y-m-d');
        $qrcode_exstis = explode('?qrcode=',request()->header()['referer'][0]);
        if($qrcode_exstis[1]){
            $qrcode_token = $qrcode_exstis[1];
            $qrcode = QrCodeToken::whereToken($qrcode_token)->where('start_date', '<=', $date)->where('end_date', '>=', $date)->first();
            if($qrcode) return $qrcode->user_id;
        }
    }
}
?>
