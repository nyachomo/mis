<?php

namespace App\Http\Controllers;
use App\Models\ScholarshipLetter;
use Illuminate\Http\Request;

class ScholarshipLetterController extends Controller
{
    //
    public function adminViewScholarshiLetters(){
        $letters=ScholarshipLetter::all();
        return view('admin.scholarship_letters.adminViewScholarshipLetters',compact('letters'));
    }

    public function adminAddScholarshiLetters(Request $request){
        $letters=ScholarshipLetter::create($request->all());
       
    }
}
