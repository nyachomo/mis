<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Imports\CoursesImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF;
use App\Exports\CoursesExport;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    //

    

    public function adminShowCourses(){
      $departments=Department::all();
      $status="Archived";
      $totalCourses=Course::with('department')->get();
      $courses=Course::with('department')->where('course_status','Active')->get();
      $archivedcourses=Course::with('department')->where('course_status','Archived')->get();
      return view('admin.courses.showCourses',compact(['courses','archivedcourses','totalCourses','departments']));
    }

    public function adminAddCourses(Request $request){
       $save=Course::create($request->all());
        if($save){
          alert()->success('success','Data saved succesfully');
              return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateCourses(Request $request){
      $id=$request->id;
      $update=Course::find($id)->update($request->all());
       if($update){
         alert()->success('success','Data saved succesfully');
             return redirect()->back();
       }else{
           alert()->error('Failed','Could not saved');
           return redirect()->back();
       }
    }

    public function updateCourseImage(Request $request){

      if($request->hasfile('course_image')){
        $file=$request->file('course_image');
        $extension=$file->getClientOriginalExtension();
        $fileName=time().'.'.$extension;
        $file->move('uploads/course_images/',$fileName);
        $id=$request->id;
        $course=Course::find($id);
        $course->course_image=$fileName;
        $course->update();
        return redirect()->back()->with('success', 'Success');


    }else{
       echo"Image id Blank";
    }


    }


    public function trainee_View_his_her_course(){
      if(Auth::check()&&Auth::user()->is_trainee=='Yes'){
        $user=User::with('course')->where('id',Auth::user()->id)->first();
        return view('admin.courses.trainee_View_his_her_course',compact('user'));
      }
     
    }


    public function adminArchiveCourses(Request $request){
      $id=$request->id;
      $archive=Course::find($id)->update(['course_status'=>'Archived']);
       if($archive){
         alert()->success('success','Data archived succesfully');
             return redirect()->back();
       }else{
           alert()->error('Failed','Could not saved');
           return redirect()->back();
       }
    }

    public function adminRecoverArchiveCourses(Request $request){
        $id=$request->recover_id;
        $recover=Course::find($id)->update(['course_status'=>'Active']);
        if($recover){
          alert()->success('success','Data recoverd succesfully');
              return redirect()->back();
        }else{
            alert()->error('Failed','Could not recover');
            return redirect()->back();
        } 

    }


    public function adminExportCoursesAsExcel(){
      return Excel::download(new CoursesExport,'Courses.xlsx');
    }




    public function adminExportCoursesAsPdf(){
      $imagePath = public_path('logo/logo.jpeg');
      $imageData = base64_encode(file_get_contents($imagePath));
      $imageSrc = 'data:image/jpeg;base64,' . $imageData;
      // Fetch data from the database
      $courses=Course::with('department')->where('course_status','Active')->get();

      
      $pdf = PDF::loadView('admin.courses.adminExportCoursesAsPdf', [
          'courses' => $courses,
          'imageSrc' => $imageSrc
      ])->setPaper('A4', 'portrait')  // Set paper size and orientation
      ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
      ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
     
      // Download the PDF
      return $pdf->download('Active_courses.pdf');

    }


    //ADMIN IMPORT COURSES
    public function adminImportCourses(Request $request){
      $request->validate([
        'course_file' => 'required|mimes:xlsx,xls',
      ]);

      $file = $request->file('course_file');
      
      // Import the data
      Excel::import(new CoursesImport, $file);

    return redirect()->back()->with('success', 'Departments imported successfully!');
    }


    public function traineeViewAllCourses(Request $request){
      return view('admin.courses.traineeViewAllCourses');
    }

    public function traineeViewMoreCourseInfo($id){
      if(Auth::check()){
        if (Auth::user()->is_trainee == 'Yes' || Auth::user()->is_admin == 'Yes') {
            $user_id=Auth::user()->id;
            $course=Course::where('id',$id)->first();
            return view('admin.courses.traineeViewMoreCourseInfo',compact(['course','user_id']));
          }else{
            return redirect()->back()->with('Failed','Failed');
          }
      }else{
           return redirect()->route('login');
      }
      
    }


    public function index()
    {
       return view('admin.courses.index'); 
    }

    public function fetchcourses(){
      //$courses = Course::orderBy('id', 'DESC')->get();
      $courses = Course::all();
      return response()->json([
          'courses'=>$courses,
        ]);
    }

    //add course
    public function addCourse(Request $request){
       $request->validate(
        [
          'name'=>'required|max:191',
          'level'=>'required|max:191',
          'duration'=>'required|max:191',
          'price'=>'required|max:191',
        ],

        [
            'name.required'=>'Course name is required',
            'level.required'=>'Course level is required',
            'duration.required'=>'Course duration is required',
            'price.required'=>'Course price is required',
          ]
      );

      //add course
      $course=new Course();
      $course->name=$request->name;
      $course->level=$request->level;
      $course->duration=$request->duration;
      $course->price=$request->price;
      $course->save();
      return response()->json([
        'status'=>200,
      ]);

    }

  //edit student
    public function editcourse($id){
      $course=Course::find($id);
      if($course)
      {
         return response()->json([
             'status'=>200,
             'course'=>$course,
            ]);

      }
      else
      {
         return response()->json([
             'status'=>400,
             'message'=>'Course Not Found',
            ]);

      }

   }
  //end of edit student

 public function updatecourse(Request $request,$id){

  $validator=Validator::make($request->all(),[
      'name'=>'required|max:191',
      'level'=>'required|max:191',
      'duration'=>'required|max:191',
      'price'=>'required|max:191',
    ]);

    //check for validation
    if($validator->fails()){
       return response()->json([
        'status'=>400,
        'errors'=>$validator->messages(),
       ]);
    }
    else{
        $course=Course::find($id);
        if($course)
        {
              $course->name=$request->input('name');
              $course->level=$request->input('level');
              $course->duration=$request->input('duration');
              $course->price=$request->input('price');
              $course->update();
  
              return response()->json([
                  'status'=>200,
                  'message'=>'Student Updated Successfully',
                  ]);
        }
        else
        {
           return response()->json([
               'status'=>404,
               'message'=>'Student Not Found',
              ]);

        }


        

    }

 }

 public function deletecourse(Request $request,$id){
    $course=Course::find($id)->delete();
    if($course){
      return response()->json([
        'status'=>200,
        'message'=>'Data deleted successfully',
      ]);
    }else{
      return response()->json([
        'status'=>400,
        'message'=>'Could not delete',
      ]);
    }
    

 }


 //search student
 public function showcourse(Request $request){

  $courses = Course::orderBy('id', 'DESC')->take($request->search)->get();
  $total = count(Course::orderBy('id', 'DESC')->take($request->search)->get());
        return response()->json([
          'courses'=>$courses,
          'total'=>$total,
      ]);

 }
//end of search student

//search student
public function searchcourse(Request $request){
       
  $courses=Course::where('name','Like','%'.$request->search.'%')
  ->orWhere('level','Like','%'.$request->search.'%')
  ->orWhere('duration','Like','%'.$request->search.'%')
  ->orWhere('price','Like','%'.$request->search.'%')->get();

  $total=Course::where('name','Like','%'.$request->search.'%')
  ->orWhere('level','Like','%'.$request->search.'%')
  ->orWhere('duration','Like','%'.$request->search.'%')
  ->orWhere('price','Like','%'.$request->search.'%')->count();

  return response()->json([
      'courses'=>$courses,
      'total'=>$total,
  ]);

  
 }
//end of search student


//search student
public function filtercourse(Request $request){
       
  $courses=Course::where('name','Like','%'.$request->search.'%')
  ->orWhere('level','Like','%'.$request->search.'%')
  ->orWhere('duration','Like','%'.$request->search.'%')
  ->orWhere('price','Like','%'.$request->search.'%')->get();

  $total=Course::where('name','Like','%'.$request->search.'%')
  ->orWhere('level','Like','%'.$request->search.'%')
  ->orWhere('duration','Like','%'.$request->search.'%')
  ->orWhere('price','Like','%'.$request->search.'%')->count();

  return response()->json([
      'courses'=>$courses,
      'total'=>$total,
  ]);

  
 }
//end of search student



}
