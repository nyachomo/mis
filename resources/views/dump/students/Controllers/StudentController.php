<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\User;
use App\Models\EducationExperience;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\ProfessionalSummary;
use App\Models\StudentSkill;
use App\Models\AdmNumber;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\StudentCourse;
use App\Models\WorkExperience;
use App\Models\Referee;
use App\Models\StudentProfileDocument;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Clas;
use App\Models\Department;




class StudentController extends Controller
{
    
    public function showStudents(){ 
      $departments=Department::where('department_status','Active')->get();
      $clases=Clas::where('clas_status','Active')->get();
      // Retrieve unique course_ids from students table
      $uniqueadmnos = Student::pluck('student_admno');
      // Retrieve courses corresponding to these unique course_ids
      $numbers= AdmNumber::whereNotIn('number', $uniqueadmnos)->get();
      $courses=Course::all();
      $total_students=Student::all();
      $students=Student::with(['courses','department','clas'])->where('student_status', 'Active')->orderBy('id','DESC')->get();
      $archivedstudents=Student::with(['courses','department','clas'])->where('student_status','archived')->orderBy('id','DESC')->get();
      $suspendedstudents=Student::with(['courses','department','clas'])->where('student_status','suspended')->orderBy('id','DESC')->get();
      
      return view('admin.students.showStudents',compact(['courses','total_students','students','suspendedstudents','numbers','archivedstudents','departments','clases']));
      
     
    }


    public function addStudent(Request $request){
        $save=Student::create($request->all());
        if($save){
            $user=new User;
            $admNumber=$request->student_admno;
            $user->name=$request->input('student_fullname');
            $user->role="Student";
            $user->phone=$request->input('phone');
            $user->status="Active";
            $user->email=$admNumber . '@techsphere.co.ke';
            $user->password=Hash::make($request->student_admno);
            $user->password_plain_text=$request->student_admno;
            $saveUser=$user->save();
            if($saveUser){
              alert()->success('Success','Data Saved successfully');
              return redirect()->back();
            }else{
              alert()->error('Failed','Could  not save user');
              return redirect()->back();
            }
         
        }else{
          alert()->error('Failed','Could  not data');
          return redirect()->back();
        }
    }

    public function updateStudent(Request $request){
          $id=$request->id;
          
          $update=Student::find($id)->update($request->all());
          if($update){
            Alert::toast('Success','success');
            return redirect()->back();
          }else{
            alert()->error('Failed','Could  not Update');
            return redirect()->back();
          }
     }

     public function urchiveStudent(Request $request){
        $id=$request->id;
        $update=Student::find($id)->update(['student_status'=>'archived']);
        if($update){
            alert()->success('success','Data archived successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not archived');
            return redirect()->back();
        }
     }

     public function unarchivedStudent(Request $request){
        $id=$request->id;
        $update=Student::find($id)->update(['student_status'=>'active']);
        if($update){
            alert()->success('success','Data remove successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not remove');
            return redirect()->back();
        }
    }

    public function suspendStudent(Request $request){
      $id=$request->id;
      $update=Student::find($id)->update(['student_status'=>'suspended']);
      if($update){
          alert()->success('success','Student suspended successfully');
          return redirect()->back();
      }else{
          alert()->error('Failed','Could not suspend');
          return redirect()->back();
      }
    }

    public function activateStudent(Request $request){
      $id=$request->id;
      $update=Student::find($id)->update(['student_status'=>'active']);
      if($update){
          alert()->success('success','Student activated successfully');
          return redirect()->back();
      }else{
          alert()->error('Failed','Could not activate');
          return redirect()->back();
      }
    }


  


     public function enrolStudentToAcourse(Request $request){
          $student_exist=StudentCourse::where('student_id',$request->student_id)->where('course_id',$request->course_id)->get();
          if($student_exist->count()>0){
              alert()->error('Failed','Student already enrol for that course');
              return redirect()->back();
          }else{
               
              $save=StudentCourse::create([
                'student_id'=>$request->student_id,
                'course_id'=>$request->course_id,
              ]);
            
            if($save){
                alert()->success('Success','Student enrol successfully');
                return redirect()->back();
            }else{
              alert()->error('Failed','Could not enrol');
              return redirect()->back();
            }

          }

          
     }



     public function unenrolCourseFromStudent(Request $request){
        $id=$request->id;
        $delete=StudentCourse::where('course_id',$id)->delete();
        if($delete){
          alert()->success('Success','One course removed successfully');
          return redirect()->back();
        }else{
          alert()->error('Failed','Could not remove');
          return redirect()->back();
        }

     }

     public function studentShowCourses(){
        $courses=Course::all();
       return view('students.showCourses',compact(['courses']));
     }

     public function studentShowSubjects($id){
      $subjects=Subject::where('course_id',$id)->get();
      return view('students.showSubjects',compact(['subjects']));
     }

     public function studentShowTopics($id){
      $topics=Topic::where('subject_id',$id)->get();
      return view('students.showTopics',compact(['topics']));
     }

     public function studentShowAssignments(){
      $exam_type="Assignment";
      $exams=Exam::where('exam_type','Like','%'.$exam_type.'%')->get();
      return view('students.showAssignments',compact(['exams']));
     }

     public function studentShowCats(){
      $exam_type="Cat";
      $exams=Exam::where('exam_type','Like','%'.$exam_type.'%')->get();
      return view('students.showCats',compact(['exams']));
     }


     public function studentShowFinalExam(){
      $exam_type="Final Exam";
      $exams=Exam::where('exam_type','Like','%'.$exam_type.'%')->get();
      return view('students.showFinalExam',compact(['exams']));
     }

     public function studentShowExamQuestions($id){
      $exam=Exam::find($id);
      $course_id=$exam->course_id;
      $exam_id=$id;
      $course=Course::where('id',$course_id)->first();
      $questions=Question::with('exam')->where('exam_id',$id)->get();
      return view("students.showExamQuestions",compact(['exam_id','course_id','questions','course','exam']));

     }

    //
    public function profile(){
      if(Auth::check() && Auth::user()->role=='Student'){
        $phone=Auth::user()->phone;
        $student=Student::where('phone',$phone)->first();
        $course=Course::where('id',$student->course_id)->first();
        $professionalSummary=ProfessionalSummary::where('student_id',$student->id)->first();
        $skills=StudentSkill::where('student_id',$student->id)->get();
        return view('students.profile',compact(['phone','student','course','professionalSummary','skills']));

      } 
    }
    //

    //
    public function potfolio(){
      if(Auth::check() && Auth::user()->role=='Student'){
        $phone=Auth::user()->phone;
        $student=Student::where('phone',$phone)->first();
        $course=Course::where('id',$student->course_id)->first();
        $professionalSummary=ProfessionalSummary::where('student_id',$student->id)->first();
        $skills=StudentSkill::where('student_id',$student->id)->get();


        $student=Student::where('phone',$phone)->first();
        $student_id=$student->id;
        $educations=EducationExperience::with('achievements')->where('student_id', $student_id)->orderBy('id','DESC')->get();
        $works=WorkExperience::with('achievements')->where('student_id',$student_id)->orderBy('id','DESC')->get();
        $referees=Referee::where('student_id', $student_id)->orderBy('id','DESC')->get();
        $documents=StudentProfileDocument::where('student_id', $student_id)->orderBy('id','DESC')->get();
        return view('students.potfolio',compact(['phone','referees','documents','student','course','professionalSummary','skills','student_id','educations','student','works']));

      } 
    }
    //


  public function studentUpdateProfile(Request $request){
    $request->validate(
      [
        'name'=>'required|max:191',
        'email'=>'required|email|max:191',
        'phone'=>'required|size:10',
       
      ],

      [
          'name.required'=>'Fullname is required',
          'email.required'=>'Email is required',
          'phone.required'=>'phone is required',
          'phone.size'=>'phonenumber should be 12 digits',
        ]
      );

      $id=$request->id;
      
      $student=Student::find($id);
      $user=User::where('phone',$request->old_phone)->first();

      $student->name=$request->name;
      $student->phone=$request->phone;
      $student->email=$request->email;

      $user->name=$request->name;
      $user->email=$request->email;
      $user->phone=$request->phone;

      $student->update();
      $user->update();

      return redirect()->back();

  }

  public function studentUpdatePassword(Request $request)
  {


    $request->validate(
      [
        'password'=>'required|max:8',
       
      ],

      [
          'password.required'=>'Password is required',
        ]
      );

      
      $user=User::where('phone',$request->old_phone)->first();
      $user->password=Hash::make($request->password);
      $user->password_plain_text=$request->password;
      $user->update();
      return redirect()->back();




  }

  //STUDENT UPDATE PROFILE IMAGE
  public function studentUpdateProfileImage(Request $request){

          if($request->hasfile('profile_image')){
              $file=$request->file('profile_image');
              $extension=$file->getClientOriginalExtension();
              $fileName=time().'.'.$extension;
              $file->move('uploads/images/',$fileName);
              $id=$request->id;
              $student=Student::find($id);
              $student->profile_image=$fileName;
              $student->update();
              return redirect()->back()->with('success', 'Profile image uploaded successfully.');


          }else{
             echo"Image id Blank";
          }
         

  }
  
   
}
