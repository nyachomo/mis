<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;

class SubjectController extends Controller
{
    //

    public function adminShowSubjects(){
        $courses=Course::where('course_status','Active')->get();
        //$subjects=Subject::with('course')->where('subject_status','Active')->get();
        $subjects=Subject::with('course.department')->where('subject_status','Active')->get();
        $archivesubjects=Subject::with('course.department')->where('subject_status','Archived')->get();
        return view('admin.subjects.adminShowSubjects',compact(['courses','subjects','archivesubjects']));
    }

    public function adminAddSubject(Request $request){
            $save=Subject::create($request->all());
            if($save){
                   alert()->success('success','Subject saved succesfully');
                   return redirect()->back();
            }else{
                  alert()->error('Failed','Could not saved');
                  return redirect()->back();
            }

    }

    public function adminUpdateSubject(Request $request){
            $id=$request->id;
            $update=Subject::find($id)->update($request->all());
            if($update){
                alert()->success('success','Data updated successfully');
                return redirect()->back();
            }else{
                alert()->error('Failed','Could not update');
                return redirect()->back();
            }
    }

    public function adminArchiveSubject(Request $request){
        $id=$request->id;
        $archive=Subject::find($id)->update(['subject_status'=>'Archived']);
        if($archive){
            alert()->success('success','Data deleted successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        }
    }

    public function adminRecoverSubject(Request $request){
        $id=$request->id;
        $recover=Subject::find($id)->update(['subject_status'=>'Active']);
        if($recover){
            alert()->success('success','Unit recoverd successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not recover');
            return redirect()->back();
        }
    }


}
