<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function change_lang($lang)
    {
        session()->put('lang', $lang);
        return redirect()->back();
    }
}
