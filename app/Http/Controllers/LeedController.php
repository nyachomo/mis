<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Leed;
use App\Models\Course;
use App\Models\School;
use Barryvdh\DomPDF\Facade\PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Models\LetterHead;

class LeedController extends Controller
{
    //

    public function showLeeds(){
       if(Auth::check()){
            $letterHead=LetterHead::first();
            $leeds=Leed::with('school')->where('school_id',Auth::user()->school_id)->get();
            $school=School::where('id',Auth::user()->school_id)->first();
            $courses=Course::all();
            return view('leeds.showLeed',compact(['leeds','courses','school','letterHead']));
       }else{
        return redirect()->route('login');
       }
               
       
    }

   
    public function addLeed(Request $request){
       

        //$save=Leed::create($request->all());
        $leed=new Leed();
        $randomNumber = rand(1, 9999);

// Format it to be four digits with leading zeros
         $leed->serial_number = str_pad($randomNumber, 4, '0', STR_PAD_LEFT);
         $leed->student_fullname= $request->student_fullname;
         $leed->student_email= $request->student_email;
         $leed->student_phone= $request->student_phone;
         $leed->student_gender= $request->student_gender;
         $leed->student_school=$request->student_school;
         $leed->student_form= $request->student_form;
         $leed->comment= $request->comment;
         $leed->year_data_captured= $request->year_data_captured;
         $leed->parent_name= $request->parent_name;
         $leed->parent_phone=$request->parent_phone;
         $leed->parent_email= $request->parent_email;
         $leed->student_location=$request->student_location;
         $leed->is_form_four=$request->is_form_four;
         $leed->course_id= $request->course_id;
         $leed->school_id =$request->school_id;
         $leed->serial_number = str_pad($randomNumber, 4, '0', STR_PAD_LEFT);
         $leed->course_register_for= $request->course_register_for;
         $save=$leed->save(); 


        if($save){
            alert()->success('Success','Data saved successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed', 'Could not saved');
            return redirect()->back();
        }
    }

    
    public function updateLeed(Request $request){
        $id=$request->id;
        $leed=Leed::find($id);
        $update=$leed->update($request->all());
        if($update){
            alert()->success('Success','Data has been updated successfully');
            return redirect()->back();
        }else{
            alert()->error('Data saved successfully', 'success');
            return redirect()->back();
        }
    }

    public function downloadStudentScholarshipLetter($id){
        $imagePath = public_path('logo/logo1.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;

        $imagePath1 = public_path('images/signature.jpeg');
        $imageData1 = base64_encode(file_get_contents($imagePath1));
        $imageSrc1 = 'data:image/jpeg;base64,' . $imageData1;

        $imagePath2 = public_path('images/stamp.jpeg');
        $imageData2 = base64_encode(file_get_contents($imagePath2));
        $imageSrc2 = 'data:image/jpeg;base64,' . $imageData2;


        $leed=Leed::find($id);

        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        //$pdf = PDF::loadView('leeds.downloadStudentScholarshipLetter', [
           // 'leed' => $leed,
           // 'imageSrc' => $imageSrc,
           // 'imageSrc1' => $imageSrc1,
           // 'imageSrc2' => $imageSrc2
       // ])->setPaper('A4', 'portrait')  // Set paper size and orientation
       // ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        //->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
       // return $pdf->download('Program_Invitation_offer_letter.pdf');

        return view('leeds.downloadStudentScholarshipLetter',compact(['leed','imageSrc','imageSrc1','imageSrc2']));
    }



    public function downloadStudentScholarshipLetterFormFour(){
        $imagePath = public_path('logo/logo1.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;

        $imagePath1 = public_path('images/signature.jpeg');
        $imageData1 = base64_encode(file_get_contents($imagePath1));
        $imageSrc1 = 'data:image/jpeg;base64,' . $imageData1;

        $imagePath2 = public_path('images/stamp.jpeg');
        $imageData2 = base64_encode(file_get_contents($imagePath2));
        $imageSrc2 = 'data:image/jpeg;base64,' . $imageData2;


      

        // $leed=Leed::find($id);

        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
       // $pdf = PDF::loadView('leeds.downloadStudentScholarshipLetterFormFour', [
           // 'leed' => $leed,
           // 'imageSrc' => $imageSrc,
           // 'imageSrc1' => $imageSrc1,
           // 'imageSrc2' => $imageSrc2
       // ])->setPaper('A4', 'portrait')  // Set paper size and orientation
       // ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
       // ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        //return $pdf->download('Program_Invitation_offer_letter.pdf');

        //return view('welcome',compact(['leed','imageSrc','imageSrc1','imageSrc2']));
        return view('leeds.downloadStudentScholarshipLetterFormFour',compact(['leed','imageSrc','imageSrc1','imageSrc2']));
    }

    public function adminViewLeeds(){
        if(Auth::check()){


            /*
            'student_fullname',
            'student_email',
            'student_phone',
            'student_gender',
            'student_school',
            'student_form',
            'comment',
            'year_data_captured',
            'parent_name',
            'parent_phone',
            'parent_email',
            'student_location',
            'is_form_four',
            'course_id',
            'school_id',
            'serial_number',
            'course_register_for',
            'scholarship_letter',
            */


            $letterHead=LetterHead::first();
            $leeds=Leed::with('school')->select( 'student_fullname',
            'student_email',
            'school_id',
            'id',
            'serial_number',
            'student_phone',
            'parent_name',
            'parent_phone',
            'student_gender',
            'student_school',
            'student_form',)->where(['student_form'=>'Form Four'])->get();
            $schools=School::all();
            $courses=Course::all();
            return view('leeds.adminViewLeeds',compact(['leeds','courses','schools','letterHead']));
       }else{
        return redirect()->route('login');
       }
    }
}
