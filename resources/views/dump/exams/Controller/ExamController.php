<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Course;
use App\Models\Department;
use App\Models\Clas;
use App\Models\StudentCat;

class ExamController extends Controller
{
    //

    public function adminShowExams(){
        $totalexams=Exam::with(['course','department','clas'])->get();
        $publishedexams=Exam::with(['course','department','clas'])->where('exam_status','Published')->get();
        $notpublishedexams=Exam::with(['course','department','clas'])->where('exam_status','Not Published')->get();
        $archivedexams=Exam::with(['course','department','clas'])->where('exam_status','Archived')->get();
        $exams=Exam::with(['course','department','clas'])->get();
        $departments=Department::where('department_status','Active')->get();
        $courses=Course::where('course_status','Active')->get();
        $clases=Clas::where('clas_status','Active')->get();
        return view('admin.exams.showExams',compact(['exams','archivedexams','notpublishedexams','publishedexams','courses','departments','clases']));
    }

    public function adminAddExams(Request $request){
        $save=Exam::create($request->all());
        if($save){
            alert()->success('success','Exam saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }


    public function adminUpdateExams(Request $request){
        $id=$request->id;
        $update=Exam::find($id)->update($request->all());
        if($update){
            alert()->success('success','Exam updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminArchiveExams(Request $request){
        $id=$request->id;
        $update=Exam::find($id)->update(['exam_status'=>'Archived']);
        if($update){
            alert()->success('success','Exam updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }


    public function adminPublishExams(Request $request){
        $id=$request->id;
        $update=Exam::find($id)->update(['exam_status'=>'Published']);
        if($update){
            alert()->success('success','Exam published succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminRecoverExams(){
        $id=$request->id;
        $update=Exam::find($id)->update(['exam_status'=>'Not Published']);
        if($update){
            alert()->success('success','Exam published succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

   


}
