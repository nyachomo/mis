<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exam;
use App\Models\Course;

class QuestionController extends Controller
{
    //

    public function adminShowQuestions(Request $request,$id){
              $exam=Exam::find($id);
              $course_id=$exam->course_id;
              $exam_id=$id;
              $course=Course::where('id',$course_id)->first();
              $questions=Question::with('exam')->where('exam_id',$id)->get();
              return view("admin.questions.showQuestions",compact(['exam_id','course_id','questions','course','exam']));
    }

    public function adminAddQuestions(Request $request){
        $save=Question::create($request->all());
       if($save){
           alert()->success('success','Question saved succesfully');
               return redirect()->back();
       }else{
           alert()->error('Failed','Could not saved');
           return redirect()->back();
       }
    }

    public function adminUpdateQuestions(Request $request){
        $id=$request->id;
        $update=Question::find($id)->update($request->all());
        if($update){
            alert()->success('success','Question updated succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminDeleteQuestions(Request $request){
        $id=$request->id;
        $delete=Question::find($id)->delete();
        if($delete){
            alert()->success('success','Question deleted succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        }
    }


}
