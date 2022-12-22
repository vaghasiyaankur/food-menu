<?php
namespace App\Helper;

use App\Models\Language;
use App\Models\Setting;

class SettingHelper{

    /* Choose language */
    public static function systemLang()
    {
        $setting = Setting::first('language_id');

        return $setting->language_id;
    }

    public static function getlanguage()
    {
        $langs = Language::whereStatus(1)->pluck('id')->toarray();
        $langId = request()->session()->get('lang');
        if ($langId && in_array($langId, $langs)) {
            return $langId;
        }else{
            return SettingHelper::systemLang();
        }
    }
}
?>
