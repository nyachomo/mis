<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Department;
use App\Models\Clas;
use App\Models\Course;
use App\Models\StudentCat;
use App\Models\StudentFinalExam;
use Barryvdh\DomPDF\Facade\PDF;

class StudentFinalExamController extends Controller
{
    //
    public function adminShowStudentFinalExam(){
        $totalexams=StudentCat::with(['course','department','clas'])->get();
        $publishedexams=StudentFinalExam::with(['course','department','clas'])->where('exam_status','Published')->get();
        $notpublishedexams=StudentFinalExam::with(['course','department','clas'])->where('exam_status','Not Published')->get();
        $archivedexams=StudentFinalExam::with(['course','department','clas'])->where('exam_status','Archived')->get();
        $finalexams=StudentFinalExam::with(['course','department','clas'])->where('exam_status','!=','Archived')->orderBy('id','DESC')->get();
        $departments=Department::where('department_status','Active')->get();
        $courses=Course::where('course_status','Active')->get();
        $clases=Clas::where('clas_status','Active')->get();
        return view('admin.studentfinalexams.adminShowStudentFinalExam',compact(['finalexams','archivedexams','notpublishedexams','publishedexams','courses','departments','clases']));
    }

    public function adminAddStudentFinalExam(Request $request){
        $save=StudentFinalExam::create($request->all());
        if($save){
            alert()->success('success','Exam saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateStudentFinalExam(Request $request){
        $id=$request->id;
        $update=StudentFinalExam::find($id)->update($request->all());
        if($update){
            alert()->success('success','Exam updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminArchiveStudentFinalExam(Request $request){
        $id=$request->id;
        $update=StudentFinalExam::find($id)->update(['exam_status'=>'Archived']);
        if($update){
            alert()->success('success','Exam updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminPublishStudentFinalExam(Request $request){
        $id=$request->id;
        $update=StudentFinalExam::find($id)->update(['exam_status'=>'Published']);
        if($update){
            alert()->success('success','Exam published succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminRecoverStudentFinalExam(Request $request){
        $id=$request->id;
        $update=StudentFinalExam::find($id)->update(['exam_status'=>'Not Published']);
        if($update){
            alert()->success('success','Exam published succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminExportStudentFinalExamAsPdf(){
        $studentAssignments=StudentFinalExam::with(['course','department','clas'])->get();
        $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
       
        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.studentfinalexams.adminExportStudentFinalExamAsPdf', [
            'studentAssignments'=>$studentAssignments,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'landscape')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('studentAssignmentquestions.pdf');
    }

}
