<?php
namespace App\Helper;

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
        return request()->session()->get('lang');

    }
}
?>
