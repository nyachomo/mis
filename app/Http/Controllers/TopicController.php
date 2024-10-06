<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
Use App\Models\Subject;
use App\Models\Department;

class TopicController extends Controller
{
    //
    public function adminShowTopics(){
        $topics=Topic::with('subject.course.department')->get();
        $subjects=Subject::all();
        return view('admin.topics.showTopics',compact(['topics','subjects']));
    }

    public function adminAddTopic(Request $request){
        $save=Topic::create($request->all());
        if($save){
            alert()->success('success','Subject saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateTopic(Request $request){
        $id=$request->id;
        $update=Topic::find($id)->update($request->all());
        if($update){
            alert()->success('success','Subject deleted succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        }

    }

    public function adminDeleteTopic(Request $request){
        $id=$request->id;
        $delete=Topic::find($id)->delete();
        if($delete){
            alert()->success('success','Subject deleted succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        }
    }


    public function testEditor(){
        $topics=Topic::all();
        return view('testEditor',compact(['topics']));
    }
}
