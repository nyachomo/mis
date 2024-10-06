<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCat;
use App\Models\StudentAssignment;
use App\Models\StudentAssignmentQuestion;
use Barryvdh\DomPDF\Facade\PDF;

class StudentAssignmentQuestionController extends Controller
{
    //
    public function adminShowAssignmentQuestions($id){
        
        $studentAssignment=StudentAssignment::with(['course','department','clas'])->where('id',$id)->first();
        $activeStudentAssignmentQuestions=StudentAssignmentQuestion::where('question_status','Active')->where('student_assignment_id',$id)->get();
        $archivedstudentAssignmentQuestions=StudentAssignmentQuestion::where('question_status','Archived')->where('student_assignment_id',$id)->get();
        $totalQuestionMarks = StudentAssignmentQuestion::where('question_status','Active')->where('student_assignment_id',$id)->sum('question_mark');
      
       return view('admin.studentassignments.adminShowStudentAssignmentQuestions',compact(['studentAssignment','activeStudentAssignmentQuestions','archivedstudentAssignmentQuestions','totalQuestionMarks']));
    }

    public function adminAddAssignmentQuestions(Request $request){
        $save=StudentAssignmentQuestion::create($request->all());
        if($save){
            alert()->success('success','Question saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateAssignmentQuestions(Request $request){
        $id=$request->id;
        $update=StudentAssignmentQuestion::find($id)->update($request->all());
        if($update){
            alert()->success('success','Question updated succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        } 
    }


    public function adminArchivedAssignmentQuestions(Request $request){
        $id=$request->id;
        $delete=StudentAssignmentQuestion::find($id)->update(['question_status'=>'Archived']);
        if($delete){
            alert()->success('success','Question Archived succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        } 
    }

    public function adminExportAssignmentQuestionsAsPdf(Request $request){
        $id=$request->exam_id;
        $studentcat=StudentAssignment::with(['course','department','clas'])->where('id',$id)->first();
       
        $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        // Fetch data from the database
        $studentcatquestions=StudentAssignmentQuestion::all();

        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.studentassignments.adminExportStudentAssignmentQuestionsAsPdf', [
            'studentcatquestions' =>$studentcatquestions,
            'studentcat'=>$studentcat,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'landscape')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('studentcatquestions.pdf');
    }

    public function adminRecoverAssignmentQuestions(Request $request){
        $id=$request->id;
        $delete=StudentAssignmentQuestion::find($id)->update(['question_status'=>'Active']);
        if($delete){
            alert()->success('success','Question Archived succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        } 
    }
}
