<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Language;
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
        $lang = Language::whereName($req->lang_name)->get();
        if (!$langId || $langId != $req->lang_id ) {
            $req->session()->put('lang',$req->lang_id);
            $req->session()->save();
            $langId = $req->session()->get('lang');
        }
        $trans = Content::whereLanguageId($langId)->pluck('content','title');
        return response()->json(['translations' => $trans]);
    }
}
