<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //

    public function about_us(){
        return view('about_us');
    }

    public function all_courses(){
        return view("all_courses");
    }

    public function apply(){
        return view("apply");
    }
}
