<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {

        return view('themes.default.index');
    }

    public function about_us(){
        return view('themes.default.index');
    }
}
