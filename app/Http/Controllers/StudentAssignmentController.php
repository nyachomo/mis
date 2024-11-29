<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAssignment;
use App\Models\StudentAnswer;
use App\Models\StudentCat;
use App\Models\Exam;
use App\Models\Department;
use App\Models\Clas;
use App\Models\User;
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
            $studentId=Auth::user()->id;
            $clas_id=Auth::user()->clas_id;
            $department_id=Auth::user()->department_id;
            $clas=Clas::where('id',$clas_id)->first();
            $department=Department::where('id', $department_id)->first();
            $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_assignment','Yes')->where('clas_id',$clas_id)->orderBy('id','DESC')->get();

            $cumulativeMarks =StudentAnswer::where('user_id', Auth::user()->id)->sum('student_score');
            $questionIds = StudentAnswer::where('user_id', Auth::user()->id) // Ensure you filter by student ID
            ->pluck('student_assignment_question_id'); // Get the question_id column

            $totalMarks = StudentAssignmentQuestion::whereIn('id', $questionIds) // Filter by question IDs
            ->sum('question_mark');

            //$avgScore=($cumulativeMarks/ $totalMarks)*30;

       
            return view('admin.studentassignments.traineeViewAssignments',compact(['exams','clas','department','studentId']));
        }
       
       
    }

    public function traineeViewCats(){

        if(Auth::check()&&Auth::user()->is_trainee=='Yes'){
            $studentId=Auth::user()->id;
            $clas_id=Auth::user()->clas_id;
            $department_id=Auth::user()->department_id;
            $clas=Clas::where('id',$clas_id)->first();
            $department=Department::where('id', $department_id)->first();
            $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_cat','Yes')->where('clas_id',$clas_id)->orderBy('id','DESC')->get();

            $cumulativeMarks =StudentAnswer::where('user_id', Auth::user()->id)->sum('student_score');
            $questionIds = StudentAnswer::where('user_id', Auth::user()->id) // Ensure you filter by student ID
            ->pluck('student_assignment_question_id'); // Get the question_id column

            $totalMarks = StudentAssignmentQuestion::whereIn('id', $questionIds) // Filter by question IDs
            ->sum('question_mark');

           // $avgScore=($cumulativeMarks/ $totalMarks)*30;
            return view('admin.studentassignments.traineeViewCats',compact(['exams','clas','department',]));
        }


       
    }

    public function traineeViewFinalExam(){
       
        if(Auth::check()&&Auth::user()->is_trainee=='Yes'){
            $studentId=Auth::user()->id;
            $clas_id=Auth::user()->clas_id;
            $department_id=Auth::user()->department_id;
            $clas=Clas::where('id',$clas_id)->first();
            $department=Department::where('id', $department_id)->first();
            $exams=StudentAssignment::with(['course','department','clas'])->where('exam_status','!=','Archived')->where('is_final_exam','Yes')->where('clas_id',$clas_id)->orderBy('id','DESC')->get();

            $cumulativeMarks =StudentAnswer::where('user_id', Auth::user()->id)->sum('student_score');
            $questionIds = StudentAnswer::where('user_id', Auth::user()->id) // Ensure you filter by student ID
            ->pluck('student_assignment_question_id'); // Get the question_id column

            $totalMarks = StudentAssignmentQuestion::whereIn('id', $questionIds) // Filter by question IDs
            ->sum('question_mark');

            //$avgScore=($cumulativeMarks/ $totalMarks)*30;
            return view('admin.studentassignments.traineeViewFinalExam',compact(['exams','clas','department']));
        }
       
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
        $user_id=$request->user_id;
        $student_assignment_question_id=$request->student_assignment_question_id;
        $student_assignment_id=$request->student_assignment_id;

        $question_answer=$request->question_answer;
        $student_answer=$request->student_answer;
        $question_mark=$request->question_mark;

        if($student_answer!=$question_answer){

            $create=StudentAnswer::create([
                'user_id'=>$user_id,
                'student_assignment_id'=>$student_assignment_id,
                'student_assignment_question_id'=>$student_assignment_question_id,
                'student_answer'=>$student_answer,
                'student_score'=>0,
            ]);

            if($create){
                alert()->success('success','Answer submited successfully');
                return redirect()->back();
            }else{
                alert()->success('Failed','Could not submit');
                return redirect()->back(); 
            }

        }else{
            $create=StudentAnswer::create([
                'user_id'=>$user_id,
                'student_assignment_id'=>$student_assignment_id,
                'student_assignment_question_id'=>$student_assignment_question_id,
                'student_answer'=>$student_answer,
                'student_score'=> $question_mark,
            ]);

            if($create){
                alert()->success('success','Answer submited successfully');
                return redirect()->back();
            }else{
                alert()->success('Failed','Could not submit');
                return redirect()->back(); 
            }
           
        }

        /*
       $create=StudentAnswer::create($request->all());
        if($create){
            alert()->success('success','Answer Submited successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not submit');
            return redirect()->back();
        }
             
        */


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


    public function adminAwardTraineeMark(Request $request){
       $id=$request->id;
   
       $update=StudentAnswer::where('id',$id)->update(['student_score'=>$request->student_score]);
            if($update){
                 alert()->success('success','Marks saved successfully');
                 return redirect()->back();
             }else{
                 alert()->error('Failed','Could not save');
                 return redirect()->back();
             }

        
 
     }


    public function adminViewAssignmentAttempts($id){
        $exam_id=$id;
        $studentAttempts = StudentAnswer::with('user')
       ->where('student_assignment_id', $exam_id)
       ->select('user_id','student_assignment_id') // Only select the fields you need
       ->distinct() // This ensures you're only getting unique combinations of the selected fields
       ->get();
        return view('admin.studentassignments.adminViewAssignmentAttempts',compact('studentAttempts'));

    }

    public function adminViewStudentAnswers($user_id,$student_assignment_id){
      
        $user=User::with('department','clas')->where('id',$user_id)->select('user_firstname','user_secondname','user_surname','department_id','clas_id')->first();
        $studentAnswers=StudentAnswer::with(['studentassignmentquestion'])->where('user_id',$user_id)->where('student_assignment_id',$student_assignment_id)->get();
        $totalScore=StudentAnswer::where('user_id',$user_id)->where('student_assignment_id',$student_assignment_id)->sum('student_score');
        //$assignment=StudentAnswer::where('user_id',$user_id)->first();
       // $student_assignment_id=$assignment->student_assignment_id;
        $totalMarks=StudentAssignmentQuestion::where('student_assignment_id',$student_assignment_id)->sum('question_mark');

       
      
        /*
        $studentAnswers = StudentAnswer::with(['user','studentassignmentquestion'])
       ->where('user_id', $id)
       ->select('student_assignment_id','student_answer') // Only select the fields you need
       ->get();

       */
       
        return view('admin.studentassignments.adminViewStudentAnswers',compact('studentAnswers','user','totalScore','totalMarks'));


    }

}
