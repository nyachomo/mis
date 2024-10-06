<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmNumber;

class AdmNumberController extends Controller
{
    //

        public function showadmissionNumbers(Request $request){
            $numbers=AdmNumber::all();
            return view('admin.admission_numbers.showAdmissionNumbers',compact('numbers'));
        }

        public function addAdmissionNumbers(Request $request){
            $save=AdmNumber::create($request->all());
            if($save){
                alert()->success('Success','Data saved successfully');
                return redirect()->back();
            }else{
                alert()->error('Failed', 'Could not saved');
                return redirect()->back();
            }
        }


        public function updateAdmissionNumbers(Request $request){
            $id=$request->id;
            $admNumber=AdmNumber::find($id);
            $update=$admNumber->update($request->all());
            if($update){
                alert()->success('Success','Data has been updated successfully');
                return redirect()->back();
            }else{
                alert()->error('Data saved successfully', 'success');
                return redirect()->back();
            }
        }
}
