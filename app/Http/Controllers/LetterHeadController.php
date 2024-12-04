<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LetterHead;
use RealRashid\SweetAlert\Facades\Alert;

class LetterHeadController extends Controller
{
    //

    public function adminViewLetterHead(Request $request){
       $letterHead=LetterHead::first();
       return view('admin.letterHead.adminViewLetterHead',compact('letterHead'));
    }

    public function adminAddLetterHead(Request $request){
        $create=LetterHead::create($request->all());
        if($create){
            alert()->success('Success','Data has been created successfully');
            return redirect()->back();
        }else{
            alert()->error('Error','Could not add data');
            return redirect()->back();
        }
       
     }

     public function adminUpdateLetterHead(Request $request){
        $id=$request->id;
        $update=LetterHead::where('id',$id)->update(['letter_head'=>$request->letter_head]);
        if($update){
            alert()->success('Success','Data has been updated successfully');
            return redirect()->back();
        }else{
            alert()->error('Error','Could not add data');
            return redirect()->back();
        }
       
     }

    public function adminDeleteLetterHead(Request $request){
        $id=$request->id;
        $delete=LetterHead::where('id',$id)->delete();
        if($delete){
            alert()->success('Success','Data has been deleted successfully');
            return redirect()->back();
        }else{
            alert()->error('Error','Could not delete');
            return redirect()->back();
        }
     }


}
