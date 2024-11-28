<?php

namespace App\Http\Controllers;
use App\Models\ScholarshipLetter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScholarshipLetterController extends Controller
{
    //
    public function adminViewScholarshiLetters(){
        $letters=ScholarshipLetter::all();
        return view('admin.scholarship_letters.adminViewScholarshipLetters',compact('letters'));
    }

    public function adminAddScholarshiLetter(Request $request){
        $create=ScholarshipLetter::create($request->all());
        if($create){
           alert()->success('Success','Data Saved successfully');
           return redirect()->back();
        }else{
            alert()->error('Failed','Could not add');
            return redirect()->back();
        }
       
    }
}
