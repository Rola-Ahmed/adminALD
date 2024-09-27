<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    //
        // public function index(Request $request,$locale) {
        //     app()->setLocale($locale);
            
        //     echo trans('lang.msg');
        //  }

        public function switchLang($locale)
        {
            // Validate the language
            if (in_array($locale, ['en', 'ar'])) {

                \Session::put('locale', $locale);
                if (session()->has('locale')) {
                    app()->setLocale(session('locale'));
                }
            }
    
            return redirect()->back();
        }
}
