<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCat;
use App\Models\StudentCatQuestion;
use Barryvdh\DomPDF\Facade\PDF;
class StudentCatQuestionController extends Controller
{
    //

    public function adminShowCatQuestions($id){
        
        $studentcat=StudentCat::with(['course','department','clas'])->where('id',$id)->first();
        $activestudentcatquestions=StudentCatQuestion::where('question_status','Active')->where('student_cat_id',$id)->get();
        $arcivedStudentAssignmentQuestions=StudentCatQuestion::where('question_status','Archived')->where('student_cat_id',$id)->get();
        $totalQuestionMarks = StudentCatQuestion::where('question_status','Active')->where('student_cat_id',$id)->sum('question_mark');
      
       return view('admin.studentcats.showStudentCatQuestions',compact(['studentcat','activestudentcatquestions','arcivedStudentAssignmentQuestions','totalQuestionMarks']));
    }

    public function adminAddCatQuestions(Request $request){
        $save=StudentCatQuestion::create($request->all());
        if($save){
            alert()->success('success','Question saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateCatQuestions(Request $request){
        $id=$request->id;
        $update=StudentCatQuestion::find($id)->update($request->all());
        if($update){
            alert()->success('success','Question updated succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        } 
    }


    public function adminArchivedCatQuestions(Request $request){
        $id=$request->id;
        $delete=StudentCatQuestion::find($id)->update(['question_status'=>'Archived']);
        if($delete){
            alert()->success('success','Question Archived succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        } 
    }

    public function adminExportCatQuestionsAsPdf(Request $request){
        $id=$request->exam_id;
        $studentcat=StudentCat::with(['course','department','clas'])->where('id',$id)->first();
       
        $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        // Fetch data from the database
        $studentcatquestions=StudentCatQuestion::all();

        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.studentcats.adminExportStudentCatQuestions', [
            'studentcatquestions' =>$studentcatquestions,
            'studentcat'=>$studentcat,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'landscape')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('studentcatquestions.pdf');
    }

    public function adminRecoverCatQuestions(Request $request){
        $id=$request->id;
        $delete=StudentCatQuestion::find($id)->update(['question_status'=>'Active']);
        if($delete){
            alert()->success('success','Question Archived succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        } 
    }
}
