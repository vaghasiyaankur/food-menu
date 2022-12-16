<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Session;

class LanguageController extends Controller
{
    public function getlangs()
    {
        $langs = Language::whereStatus(1)->get();
        return response()->json(['langs' => $langs]);
    }

    public function getLangTranslation(Request $req)
    {
        $langId = $req->session()->get('lang');
        $setting = Setting::first('language_id');
        $lang = $req->lang_id ? $req->lang_id : $setting->language_id;
        if (!$langId || $langId && $langId != $lang && $req->lang_id) {
            $req->session()->put('lang',$lang);
            $req->session()->save();
            $langId = $req->session()->get('lang');
        }
        $trans = Content::whereLanguageId($langId)->pluck('content','title');
        return response()->json(['translations' => $trans]);
    }
}
