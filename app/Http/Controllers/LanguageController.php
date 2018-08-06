<?php
/**
 * Created By DhanPris
 *
 * @Filename     LanguageController.php
 * @LastModified 6/9/18 11:38 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLang($locale){

        //Create Languange Session
        Session::put('locale', $locale);

        return back();
    }
}
