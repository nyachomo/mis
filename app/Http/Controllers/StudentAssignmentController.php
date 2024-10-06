<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAssignment;
use App\Models\StudentAnswer;
use App\Models\StudentCat;
use App\Models\Exam;
use App\Models\Department;
use App\Models\Clas;
use App\Models\Course;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAssignmentQuestion;

class StudentAssignmentController extends Controller
{
    //
    public function adminShowStudentAssignments(){
        $totalexams=StudentAssignment::with(['course','department','clas'])->get();
        $publishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Published')->where('is_assignment','Yes')->get();
        $notpublishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Not Published')->where('is_assignment','Yes')->get();
        $archivedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Archived')->where('is_assignment','Yes')->get();
        $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_assignment','Yes')->orderBy('id','DESC')->get();
        $departments=Department::where('department_status','Active')->get();
        $courses=Course::where('course_status','Active')->get();
        $clases=Clas::where('clas_status','Active')->get();
        return view('admin.studentassignments.adminShowStudentAssignments',compact(['exams','archivedexams','notpublishedexams','publishedexams','courses','departments','clases']));
    }

    public function adminShowStudentCats(){
        $totalexams=StudentAssignment::with(['course','department','clas'])->get();
        $publishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Published')->where('is_cat','Yes')->get();
        $notpublishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Not Published')->where('is_cat','Yes')->get();
        $archivedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Archived')->where('is_cat','Yes')->get();
        $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_cat','Yes')->orderBy('id','DESC')->get();
        $departments=Department::where('department_status','Active')->get();
        $courses=Course::where('course_status','Active')->get();
        $clases=Clas::where('clas_status','Active')->get();
        return view('admin.studentassignments.adminShowStudentCats',compact(['exams','archivedexams','notpublishedexams','publishedexams','courses','departments','clases']));
    }

    public function adminShowStudentFinalExam(){
        $totalexams=StudentAssignment::with(['course','department','clas'])->get();
        $publishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Published')->where('is_final_exam','Yes')->get();
        $notpublishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Not Published')->where('is_final_exam','Yes')->get();
        $archivedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Archived')->where('is_final_exam','Yes')->get();
        $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_final_exam','Yes')->orderBy('id','DESC')->get();
        $departments=Department::where('department_status','Active')->get();
        $courses=Course::where('course_status','Active')->get();
        $clases=Clas::where('clas_status','Active')->get();
        return view('admin.studentassignments.adminShowStudentFinalExam',compact(['exams','archivedexams','notpublishedexams','publishedexams','courses','departments','clases']));
    }

    public function adminAddStudentAssignments(Request $request){
        $save=StudentAssignment::create($request->all());
        if($save){
            alert()->success('success','Exam saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateStudentAssignments(Request $request){
        $id=$request->id;
        $update=StudentAssignment::find($id)->update($request->all());
        if($update){
            alert()->success('success','Cats updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminArchiveStudentAssignments(Request $request){
        $id=$request->id;
        $update=StudentAssignment::find($id)->update(['exam_status'=>'Archived']);
        if($update){
            alert()->success('success','Exam updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }


    public function adminPublishedStudentAssignments(Request $request){
        $id=$request->id;
        $update=StudentAssignment::find($id)->update(['exam_status'=>'Published']);
        if($update){
            alert()->success('success','Exam published succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminRecoverStudentAssignments(Request $request){
        $id=$request->id;
        $update=StudentAssignment::find($id)->update(['exam_status'=>'Not Published']);
        if($update){
            alert()->success('success','Exam published succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminExportStudentAssignmentsAsPdf(Request $request){

        $studentAssignments=StudentAssignment::with(['course','department','clas'])->get();
       
        $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
       
        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.studentassignments.adminExportStudentAssignmentAsPdf', [
            'studentAssignments'=>$studentAssignments,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'landscape')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('studentAssignmentquestions.pdf');


    }


    public function traineeViewAssignments(){
        if(Auth::check()&&Auth::user()->is_trainee=='Yes'){
            $clas_id=Auth::user()->clas_id;
            $department_id=Auth::user()->department_id;
            $clas=Clas::where('id',$clas_id)->first();
            $department=Department::where('id', $department_id)->first();
            $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_assignment','Yes')->where('clas_id',$clas_id)->orderBy('id','DESC')->get();
            return view('admin.studentassignments.traineeViewAssignments',compact(['exams','clas','department']));
        }
        //$totalexams=StudentAssignment::with(['course','department','clas'])->get();
       // $publishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Published')->where('is_assignment','Yes')->get();
        //$notpublishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Not Published')->where('is_assignment','Yes')->get();
        //$archivedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Archived')->where('is_assignment','Yes')->get();
       
        //$departments=Department::where('department_status','Active')->get();
        //$courses=Course::where('course_status','Active')->get();
        //$clases=Clas::where('clas_status','Active')->get();
       
    }

    public function traineeViewCats(){
        if(Auth::check()&&Auth::user()->is_trainee=='Yes'){
            $clas_id=Auth::user()->clas_id;
            $department_id=Auth::user()->department_id;
            $clas=Clas::where('id',$clas_id)->first();
            $department=Department::where('id', $department_id)->first();
            $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_cat','Yes')->where('clas_id',$clas_id)->orderBy('id','DESC')->get();
            return view('admin.studentassignments.traineeViewCats',compact(['exams','clas','department']));
        }
        //$totalexams=StudentAssignment::with(['course','department','clas'])->get();
       // $publishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Published')->where('is_assignment','Yes')->get();
        //$notpublishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Not Published')->where('is_assignment','Yes')->get();
        //$archivedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Archived')->where('is_assignment','Yes')->get();
       
        //$departments=Department::where('department_status','Active')->get();
        //$courses=Course::where('course_status','Active')->get();
        //$clases=Clas::where('clas_status','Active')->get();
       
    }

    public function traineeViewFinalExam(){
        if(Auth::check()&&Auth::user()->is_trainee=='Yes'){
            $clas_id=Auth::user()->clas_id;
            $department_id=Auth::user()->department_id;
            $clas=Clas::where('id',$clas_id)->first();
            $department=Department::where('id', $department_id)->first();
            $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_final_exam','Yes')->where('clas_id',$clas_id)->orderBy('id','DESC')->get();
            return view('admin.studentassignments.traineeViewFinalExam',compact(['exams','clas','department']));
        }
        //$totalexams=StudentAssignment::with(['course','department','clas'])->get();
       // $publishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Published')->where('is_assignment','Yes')->get();
        //$notpublishedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Not Published')->where('is_assignment','Yes')->get();
        //$archivedexams=StudentAssignment::with(['course','department','clas'])->where('exam_status','Archived')->where('is_assignment','Yes')->get();
       
        //$departments=Department::where('department_status','Active')->get();
        //$courses=Course::where('course_status','Active')->get();
        //$clases=Clas::where('clas_status','Active')->get();
       
    }

    public function traineeViewQuestions($id){
        if(Auth::check()&&Auth::user()->is_trainee=='Yes'){
            $user_id=Auth::user()->id;
            $studentAssignment=StudentAssignment::with(['course','department','clas'])->where('id',$id)->first();
            $activeStudentAssignmentQuestions=StudentAssignmentQuestion::where('question_status','Active')->where('student_assignment_id',$id)->get();
            $archivedstudentAssignmentQuestions=StudentAssignmentQuestion::where('question_status','Archived')->where('student_assignment_id',$id)->get();
            $totalQuestionMarks = StudentAssignmentQuestion::where('question_status','Active')->where('student_assignment_id',$id)->sum('question_mark');
            return view('admin.studentassignments.traineeViewQuestions',compact(['user_id','studentAssignment','activeStudentAssignmentQuestions','archivedstudentAssignmentQuestions','totalQuestionMarks']));
        }else{
            return redirect()->route('login');
        }
    }

    public function traineeAnserQuestions(Request $request){
      $create=StudentAnswer::create($request->all());
        if($create){
            alert()->success('success','Answer Submited successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not submit');
            return redirect()->back();
        }
    }

    public function traineeUpdateAnswer(Request $request){
       $question_id=$request->student_assignment_question_id;
       $user_id=$request->user_id;
       $update=StudentAnswer::where('student_assignment_question_id',$question_id)->where('user_id', $user_id)->update([
        'student_answer'=>$request->student_answer
       ]);

           if($update){
                alert()->success('success','Answer Updated successfully');
                return redirect()->back();
            }else{
                alert()->error('Failed','Could not Update');
                return redirect()->back();
            }

    }

}
