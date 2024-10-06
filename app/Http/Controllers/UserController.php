<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Exports\UsersDataExport;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TrainersImport;
use App\Imports\TraineeImport;
use App\Models\Department;
use App\Models\Clas;
use App\Models\TraineeCourse;
use App\Models\Course;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    
  
    

    public function adminShowManagement(){
      //$totalUsers=User::all();
      $users = User::where(function($query) {$query->where('is_principal', 'Yes')->orWhere('is_deputy_principal', 'Yes')->orWhere('is_registrar', 'Yes');})->where('user_status', 'Active')->get();
      $archivedUsers = User::where(function($query) {$query->where('is_principal', 'Yes')->orWhere('is_deputy_principal', 'Yes')->orWhere('is_registrar', 'Yes');})->where('user_status', 'Archived')->get();
      $suspendedUsers = User::where(function($query) {$query->where('is_principal', 'Yes')->orWhere('is_deputy_principal', 'Yes')->orWhere('is_registrar', 'Yes');})->where('user_status', 'Suspended')->get();

      return view('admin.users.adminShowManagement',compact(['users','archivedUsers','suspendedUsers']));
    }

    public function adminShowUsers(){
      $users = User::where(function($query) {$query->where('is_exam_officer', 'Yes')->orWhere('is_data_clerk', 'Yes');})->where('user_status', 'Active')->get();
      $archivedUsers = User::where(function($query) {$query->where('is_exam_officer', 'Yes')->orWhere('is_data_clerk', 'Yes');})->where('user_status', 'Archived')->get();
      $suspendedUsers = User::where(function($query) {$query->where('is_exam_officer', 'Yes')->orWhere('is_data_clerk', 'Yes');})->where('user_status', 'Suspended')->get();
      
      return view('admin.users.showUsers',compact(['users','archivedUsers','suspendedUsers']));
    }

    public function adminShowTrainers(Request $request){

      $departments=Department::where('department_status','Active')->get();
      $users = User::with(['department'])->where(function($query) {$query->where('is_hod', 'Yes')->orWhere('is_trainer', 'Yes');})->where('user_status', 'Active')->get();
      $archivedUsers = User::with(['department'])->where(function($query) {$query->where('is_hod', 'Yes')->orWhere('is_trainer', 'Yes');})->where('user_status', 'Archived')->get();
      $suspendedUsers = User::with(['department'])->where(function($query) {$query->where('is_hod', 'Yes')->orWhere('is_trainer', 'Yes');})->where('user_status', 'Suspended')->get();
      return view('admin.users.adminShowTrainers',compact(['users','archivedUsers','suspendedUsers','departments']));
    }

    public function adminShowHighSchoolTeachers(Request $request){
      $schools=School::all();
      $departments=Department::where('department_status','Active')->get();
      $users = User::with(['school'])->where(function($query) {$query->where('is_high_school_teacher', 'Yes');})->where('user_status', 'Active')->get();
      $archivedUsers = User::with(['department'])->where(function($query) {$query->where('is_high_school_teacher', 'Yes');})->where('user_status', 'Archived')->get();
      $suspendedUsers = User::with(['department'])->where(function($query) {$query->where('is_high_school_teacher', 'Yes');})->where('user_status', 'Suspended')->get();
      return view('admin.users.adminShowHighSchoolTeachers',compact(['users','schools','archivedUsers','suspendedUsers','departments']));
    }

    public function adminShowTrainees(){
      $courses=Course::where('course_status','Active')->get();
      $clases=Clas::where('clas_status','Active')->get();
      $departments=Department::where('department_status','Active')->get();
      $users = User::with(['department','clas'])->where(function($query) {$query->where('is_trainee', 'Yes');})->where('user_status', 'Active')->get();
      $archivedUsers = User::with(['department','clas'])->where(function($query) {$query->where('is_trainee', 'Yes');})->where('user_status', 'Archived')->get();
      $suspendedUsers = User::with(['department','clas'])->where(function($query) {$query->where('is_trainee', 'Yes');})->where('user_status', 'Suspended')->get();
      return view('admin.users.adminShowTrainees',compact(['courses','clases','users','archivedUsers','suspendedUsers','departments']));
    }

    public function  enrolTraineeToCourse(Request $request){
      $create=TraineeCourse::create($request->all());
      if($create){
        alert()->success('success','Data updated succesfully');
              return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminAddUsers(Request $request){
      
        $user=new User();
        $password="12345678";
        $user->user_firstname=$request->user_firstname;
        $user->user_secondname=$request->user_secondname;
        $user->user_surname=$request->user_surname;
        $user->user_phonenumber=$request->user_phonenumber;
        $user->is_principal=$request->is_principal;
        $user->is_deputy_principal=$request->is_deputy_principal;
        $user->is_registrar=$request->is_registrar;
        $user->is_data_clerk=$request->is_data_clerk;
        $user->is_exam_officer=$request->is_exam_officer;
        $user->is_trainer=$request->is_trainer;
        $user->is_hod=$request->is_hod;
        $user->department_id=$request->department_id;
        $user->clas_id=$request->clas_id;
        $user->is_trainee=$request->is_trainee;
        $user->user_status="Active";
        $user->email=$request->email;
        $user->is_high_school_teacher=$request->is_high_school_teacher;
        $user->school_id=$request->school_id;
        $user->password=Hash::make($password);
        $save=$user->save(); 

        if($save){
          alert()->success('success','Data saved succesfully');
              return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }


    public function adminUpdateUsers(Request $request){
      $id=$request->id;
      $update=User::find($id)->update($request->all());
      if($update){
      alert()->success('success','Data updated succesfully');
            return redirect()->back();
      }else{
          alert()->error('Failed','Could not update');
          return redirect()->back();
      }

    }

    public function adminArchiveUsers(Request $request){
        $id=$request->id;
        $archive=User::find($id)->update(['user_status'=>'Archived']);
        if($archive){
            alert()->success('success','Data archived succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not archived');
            return redirect()->back();
        }
    }
  
    public function adminRecoverArchiveUsers(Request $request){
        $id=$request->id;
        $recoverArchive=User::find($id)->update(['user_status'=>'Active']);
        if($recoverArchive){
            alert()->success('success','Data recoverd succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not recover');
            return redirect()->back();
        }
    }

    public function adminRevokeUsersRoles(Request $request){
      $id=$request->id;
      $update=User::find($id)->update($request->all());
      if($update){
      alert()->success('success','Roles Updated Successfully');
            return redirect()->back();
      }else{
          alert()->error('Failed','Could not update');
          return redirect()->back();
      }
    }

    public function adminAddUsersRoles(Request $request){
      $id=$request->id;
      $update=User::find($id)->update($request->all());
      if($update){
      alert()->success('success','Roles Updated Successfully');
            return redirect()->back();
      }else{
          alert()->error('Failed','Could not update');
          return redirect()->back();
      }
    }

    public function adminSuspendUser(Request $request){
        $id=$request->id;
        $suspendUser=User::find($id)->update(['user_status'=>'Suspended']);
        if($suspendUser){
            alert()->success('success','User Suspended succesfully');
            return redirect()->back();
        }else{
            alert()->error('Failed','Could not suspend');
            return redirect()->back();
        }
    }

    

    //export excel

    public function exportUser(){
      return Excel::download(new UsersDataExport, 'users.xlsx');
    }
   //

   //EXPORT USERS AS PDF
   public function adminExportUsersAsPdf(){

       $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        // Fetch data from the database
        $users = User::all();

        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.users.adminExportUsersAsPdf', [
            'users' => $users,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'portrait')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('users.pdf');

   }
   //EXPORT USERS AS PDF

   //IMPORT USERS DATA
   public function adminImportUsersDataAsFromexcel(Request $request){
        $request->validate([
          'user_file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the department_id from the request
        $departmentId = $request->input('department_id');
       
        //Excel::import(new UsersImport($departmentId), $request->file('file'));

        $file = $request->file('user_file');
        
        // Import the data
        Excel::import(new TrainersImport($departmentId), $file);

      return redirect()->back()->with('success', 'Departments imported successfully!');

   }
   //END OF IMPORT USERS DATA

   public function adminImportTraineesFromExcel(Request $request){
    $request->validate([
      'user_file' => 'required|mimes:xlsx,xls',
    ]);
    // Get the department_id from the request
    $departmentId = $request->input('department_id');
    $classId = $request->input('clas_id');
    $file = $request->file('user_file');
     // Import the data
    $import=Excel::import(new TraineeImport($departmentId,$classId), $file);
    if($import){
      alert()->success('success','Data uploaded successfully');
            return redirect()->back();
      }else{
          alert()->error('Failed','Could not Import');
          return redirect()->back();
      }
    
   }

   public function adminUpdateUserPassword(Request $request){

    $oldPassword = $request->old_password;
    $newPassword = $request->new_password;
    $confirmPassword = $request->confirm_new_password;

      // Check if the old password matches the hashed password in the database
      if (!Hash::check($request->old_password, Auth::user()->password)) {
          return back()->withErrors(['old_password' => 'The provided password does not match your current password.']);
      }else{
        if ($newPassword !== $confirmPassword) {
          return back()->withErrors(['confirm_new_password' => 'The new password confirmation does not match.']);
        }else{
          // Update the new password
          Auth::user()->update([
            'password' => Hash::make($request->new_password),
          ]);

          return redirect()->back()->with('status', 'Password updated successfully!'); 
        }
      } 

   }


   //STUDENT UPDATE PROFILE IMAGE
    public function adminUpdateUserPicture(Request $request){

      if($request->hasfile('user_picture')){
          $file=$request->file('user_picture');
          $extension=$file->getClientOriginalExtension();
          $fileName=time().'.'.$extension;
          $file->move('uploads/images/',$fileName);
          $id=$request->id;
          $user=User::find($id);
          $user->user_picture=$fileName;
          $user->update();
          return redirect()->back()->with('status', 'Image updated successfully');


      }else{
        echo"Image id Blank";
      }
    }

  //TRAIEE VIEWING ASSESMENT
  public function traineeViewAssesment(){
    return view('studentassignments.traineeViewAssesment');
  }



   public function showUserProfile(){
    return view('admin.users.showUserProfile');
   }



    public function index(){
        return view('admin.users.index');
    }

    //add course
     public function adduser(Request $request){
        $request->validate(
         [
           'name'=>'required|max:191',
           'email'=>'required|unique:users|email|max:191',
           'phone'=>'required|max:191',
           'role'=>'required|max:191',
           'status'=>'required|max:191',
         ],
 
         [
             'name.required'=>' name is required',
             'email.required'=>' email is required',
             'phone.required'=>' phonenumber is required',
             'role.required'=>'role is required',
             'status.required'=>'Status is required',
           ]
       );
 
       //add course
       $user=new User();
       $password="12345678";
       $user->name=$request->name;
       $user->email=$request->email;
       $user->phone=$request->phone;
       $user->role=$request->role;
       $user->status=$request->status;
       $user->password=Hash::make($password);
       $user->password_plain_text=$password;
       $user->save();
       return response()->json([
         'status'=>200,
       ]);
 
     }

    public function fetchusers(){
        $users = User::all();
        return response()->json([
            'users'=>$users,
            ]);
    }

    //edit student
    public function edituser($id){
        $user=User::find($id);
        if($user)
        {
           return response()->json([
               'status'=>200,
               'user'=>$user,
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

    //edit student
    public function updateuser(Request $request,$id){
      $validator=Validator::make($request->all(),[
        'name'=>'required|max:191',
        'level'=>'required|max:191',
        'duration'=>'required|max:191',
        'price'=>'required|max:191',
      ]);

      //check for validation
    if($validator->fails())
      {
        return response()->json([
        'status'=>400,
        'errors'=>$validator->messages(),
        ]);
      }
      else
      {
       $user=User::find($id);
       if($user){
        $password="12345678";
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->role=$request->role;
        $user->status=$request->status;
        $user->password=Hash::make($password);
        $user->update();
        return response()->json([
          'status'=>200,
        ]);

       }
      }
      
   }
  //end of edit student

//search student
public function searchuser(Request $request){
       
  $users=User::where('name','Like','%'.$request->search.'%')
  ->orWhere('email','Like','%'.$request->search.'%')
  ->orWhere('phone','Like','%'.$request->search.'%')
  ->orWhere('role','Like','%'.$request->search.'%')
  ->orWhere('status','Like','%'.$request->search.'%')->get();

  return response()->json([
      'users'=>$users,
  ]);

  
 }
//end of search student



}
