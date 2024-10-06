<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    //

    public function adminShowSchools(){
        $schools=School::all();
        return view('admin.schools.adminShowSchools',compact('schools'));
    }

    public function adminAddSchools(Request $request){
        $save=School::create($request->all());
        if($save){
            alert()->success('Success','Data saved successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed', 'Could not saved');
            return redirect()->back();
        }
    }
}
