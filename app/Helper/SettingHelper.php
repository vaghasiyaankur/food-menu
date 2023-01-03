<?php
namespace App\Helper;

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingHelper{

    /* Choose language */
    public static function systemLang()
    {
        $setting = Setting::whereUserId(Auth::id())->first('language_id');

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

    public static function managerLanguage()
    {
        $lang = Language::whereName('English')->first();

        return $lang->id;
    }
}
?>
