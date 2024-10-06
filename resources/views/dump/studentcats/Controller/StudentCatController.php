<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Department;
use App\Models\Clas;
use App\Models\Course;
use App\Models\StudentCat;
use Barryvdh\DomPDF\Facade\PDF;

class StudentCatController extends Controller
{
    //
    public function adminShowStudentCats(){
        $totalexams=StudentCat::with(['course','department','clas'])->get();
        $publishedexams=StudentCat::with(['course','department','clas'])->where('exam_status','Published')->get();
        $notpublishedexams=StudentCat::with(['course','department','clas'])->where('exam_status','Not Published')->get();
        $archivedexams=StudentCat::with(['course','department','clas'])->where('exam_status','Archived')->get();
        $exams=StudentCat::with(['course','department','clas'])->where('exam_status','!=','Archived')->orderBy('id','DESC')->get();
        $departments=Department::where('department_status','Active')->get();
        $courses=Course::where('course_status','Active')->get();
        $clases=Clas::where('clas_status','Active')->get();
        return view('admin.studentcats.showStudentCats',compact(['exams','archivedexams','notpublishedexams','publishedexams','courses','departments','clases']));
    }

    public function adminAddStudentCats(Request $request){
        $save=StudentCat::create($request->all());
        if($save){
            alert()->success('success','Exam saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateStudentCats(Request $request){
        $id=$request->id;
        $update=StudentCat::find($id)->update($request->all());
        if($update){
            alert()->success('success','Cats updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminArchiveStudentCats(Request $request){
        $id=$request->id;
        $update=StudentCat::find($id)->update(['exam_status'=>'Archived']);
        if($update){
            alert()->success('success','Exam updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }


    public function adminPublishedStudentCats(Request $request){
        $id=$request->id;
        $update=StudentCat::find($id)->update(['exam_status'=>'Published']);
        if($update){
            alert()->success('success','Exam published succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminRecoverStudentCats(Request $request){
        $id=$request->id;
        $update=StudentCat::find($id)->update(['exam_status'=>'Not Published']);
        if($update){
            alert()->success('success','Exam published succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }


    public function adminExportStudentCatsAsPdf(){
        $studentAssignments=StudentCat::with(['course','department','clas'])->get();
       
        $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
       
        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.studentcats.adminExportStudentCatsAsPdf', [
            'studentAssignments'=>$studentAssignments,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'landscape')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('studentAssignmentquestions.pdf');
    }

}
