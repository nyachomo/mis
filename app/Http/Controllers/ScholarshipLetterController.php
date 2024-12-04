<?php

namespace App\Http\Controllers;
use App\Models\ScholarshipLetter;
use App\Models\LetterHead;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScholarshipLetterController extends Controller
{
    //
    public function adminViewScholarshiLetters(){
        $letterHead=LetterHead::first();
        $letters=ScholarshipLetter::all();
        return view('admin.scholarship_letters.adminViewScholarshipLetters',compact('letters','letterHead'));
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

    public function adminUpdateScholarshiLetter(Request $request){
        $update=ScholarshipLetter::where('id',$request->id)->update(['scholarship_letter'=>$request->scholarship_letter]);
        if($update){
           alert()->success('Success','Data Updated successfully');
           return redirect()->back();
        }else{
            alert()->error('Failed','Could not Update');
            return redirect()->back();
        }
       
    }

    public function adminDeleteScholarshiLetter(Request $request){
        $delete=ScholarshipLetter::where('id',$request->id)->delete();
        if($delete){
           alert()->success('Success','Data Deleted successfully');
           return redirect()->back();
        }else{
            alert()->error('Failed','Could not Delete');
            return redirect()->back();
        }
       
    }

}
