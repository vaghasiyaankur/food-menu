<?php

namespace App\Http\Controllers;

use App\Helper\SettingHelper;
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

    public function getAlllangs()
    {
        $langs = Language::get();
        return response()->json(['langs' => $langs]);
    }

    public function getLangTranslation(Request $req)
    {
        $langs = Language::whereStatus(1)->pluck('id')->toarray();
        $lang_id = request()->session()->get('lang');
        $langId = in_array($lang_id, $langs) ? $lang_id : SettingHelper::systemLang() ;
        $setting = Setting::first('language_id');
        $lang = $req->lang_id ? $req->lang_id : $setting->language_id;
        if (!$langId || $langId && $langId != $lang && $req->lang_id) {
            $req->session()->put('lang',$lang);
            $req->session()->save();
            $langId = $req->session()->get('lang');
        }
        $trans = Content::whereLanguageId($langId)->pluck('content','title');
        return response()->json(['translations' => $trans,'lang_id' => $langId]);
    }

    public function getLangTrans(Request $req,$id)
    {
        $trans = Content::whereLanguageId($id)->where(function($query) use ($req){
                            $query->where('content', 'LIKE', '%'.$req->q.'%')
                                  ->orWhere('title', 'LIKE', '%'.$req->q.'%');
                        })->paginate(10);
        return response()->json(['translations' => $trans]);
    }

    public function updateLangTrans(Request $req)
    {
        $lang_trans = array_filter($req->lang_trans);
        foreach ($lang_trans as $key => $trans) {
            $trans = Content::where('id',$key)->update(['content' => $trans]);
        }
        return response()->json(['success' => 'Traslation Updated successfully.']);
    }

    public function updateLangStatus(Request $req)
    {
        $langs = $req->language;
        foreach ($langs as $key => $lang) {
            Language::where('id',$key)->update(['status' => $lang == true ? 1 : 0]);
        }
        $selectlang = Language::whereStatus(1)->first('id')->id;
        Setting::where('id','1')->update(['language_id' => $selectlang]);
        return response()->json(['success' => 'Language Updated successfully.']);
    }
}
