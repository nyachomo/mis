<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCatQuestion;
use App\Models\StudentFinalExamQuestion;
use App\Models\StudentCat;
use App\Models\StudentFinalExam;
use Barryvdh\DomPDF\Facade\PDF;

class StudentFinalExamQuestionController extends Controller
{
    //

    public function adminShowStudentFinalExamQuestions($id){
        $studentfinalExam=StudentFinalExam::with(['course','department','clas'])->where('id',$id)->first();
        $activestudentfinalexamquestions=StudentFinalExamQuestion::where('question_status','Active')->where('student_final_exam_id',$id)->get();
        $archivedStudentFinalExamQuestions=StudentFinalExamQuestion::where('question_status','Archived')->where('student_final_exam_id',$id)->get();
        $totalQuestionMarks = StudentFinalExamQuestion::where('question_status','Active')->where('student_final_exam_id',$id)->sum('question_mark');
        return view('admin.studentfinalexams.adminShowStudentFinalExamQuestions',compact(['studentfinalExam','activestudentfinalexamquestions','archivedStudentFinalExamQuestions','totalQuestionMarks']));
    }

    public function adminAddStudentFinalExamQuestions(Request $request){
        $save=StudentFinalExamQuestion::create($request->all());
        if($save){
            alert()->success('success','Question saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateStudentFinalExamQuestions(Request $request){
        $id=$request->id;
        $update=StudentFinalExamQuestion::find($id)->update($request->all());
        if($update){
            alert()->success('success','Question updated succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        } 
    }

    public function adminArchiveStudentFinalExamQuestions(Request $request){
        $id=$request->id;
        $archive=StudentFinalExamQuestion::find($id)->update(['question_status'=>'Archived']);
        if($archive){
            alert()->success('success','Question Archived succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        } 
    }

    public function adminRecoverStudentFinalExamQuestions(Request $request){
        $id=$request->id;
        $delete=StudentFinalExamQuestion::find($id)->update(['question_status'=>'Active']);
        if($delete){
            alert()->success('success','Question Archived succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        } 
    }

    public function adminExportStudentFinalExamQuestionsAsPdf(Request $request){
        $id=$request->exam_id;
        $studentFinalExam=StudentFinalExam::with(['course','department','clas'])->where('id',$id)->first();
       
        $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        // Fetch data from the database
        $studentfinalexamquestions=StudentFinalExamQuestion::all();

        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.studentfinalexams.adminExportStudentFinalExamQuestionsAsPdf', [
            'studentfinalexamquestions' =>$studentfinalexamquestions,
            'studentFinalExam'=>$studentFinalExam,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'landscape')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('studentcatquestions.pdf');
    }
    
}
