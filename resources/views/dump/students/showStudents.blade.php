@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>STUDENTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><span class="right badge badge-info">Go Back</span> </a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Managed Students</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->


<!-- Content Header (Page header) -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header">
                    <div class="row">
                         <div class="col-sm-4" style="border-right:1px solid red">
                            <ol>
                                <li>
                                   
                                     Total Students:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$total_students->count()}}
                                    
                                </li>
                                <li>
                                    
                                         Suspended Students:&nbsp;&nbsp;&nbsp;{{$suspendedstudents->count()}} <a href="#"><span class="right badge badge-success" data-toggle="modal" data-target="#suspendedStudentModal">View</span></a>
                                    
                                </li>

                                <li>
                                    
                                         Archive Students:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$archivedstudents->count()}} <a href="#"><span class="right badge badge-danger" data-toggle="modal" data-target="#archivedStudentModal">View</span></a>
                                    
                                </li>

                              
                            </ol>
                         </div>
                         <div class="col-sm-3">
                            

                         <div class="form-group">
                           
                            <select class="form-control" name="department_id" required class="form-control">
                                <option value="">Fileter By Department </option>
                                @if(!empty($departments))
                                   @foreach($departments as $department)
                                     <option value="{{$department->id}}">{{$department->department_name}}</option>
                                   @endforeach
                                @endif
                            </select>
                        </div>


                         </div>
                         <div class="col-sm-5">

                           <div class="btn-group1">
                                <button class="btn btn-success btn-sm " data-toggle="modal" data-target="#addStudentModal"><i class="las la-plus"></i>ADD STUDENT</button>
                                <button class="btn btn-secondary btn-sm "><i class="las la-plus"></i>EXPORT EXCEL</button>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStudentModal"><i class="las la-plus"></i>EXPORT PDF</button>
                                
                                
                            </div>

                         </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-stripped" id="example1">
                        <thead>
                           
                            <th>ADMNO</th>
                            <th>DEPARTMENT</th>
                            <!--<th>IMAGE</th>-->
                            <th>FULLNAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>GENDER</th>
                            <th>COURSE</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                           
                        </thead>
                        <tbody>
                                @if($students->count()>0)
                                   @foreach($students as $student)
                                    <tr>
                                        

                                         <td>{{strtoupper($student->student_admno)}}</td>
                                         <td>{{$student->department->department_name}}</td>
                                          <!--<td><img class="profile-user-img img-fluid img-circle" src="{{asset('uploads/images/'.$student->profile_image)}}" style="width:40px"> </td>-->
                                         <td>{{strtoupper($student->student_fullname)}}</td>
                                         <td>{{strtoupper($student->student_email)}}</td>
                                         <td>{{$student->phone}}</td>
                                         <td>{{strtoupper($student->student_gender)}}</td>
                                        
                                         <td>
                                             @if($student->courses->count()>0)
                                             
                                                <a href="#">{{$student->courses->count()}} <span class="right badge badge-danger" data-toggle="modal" data-target="#courseModal{{$student->id}}">View</span></a>
                                                <!-- Modal -->
                                                     <div class="modal fade" id="courseModal{{$student->id }}" tabindex="-1" role="dialog" >
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="achievementsModalLabel{{$student->id}}"> <i class="las la-graduation-cap las1"></i> ENROL COURSES FOR : {{ $student->student_fullname }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered table-striped table-sm" id="educationAchievements">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ACTION</th>
                                                                                <th>COURSE</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($student->courses as $key => $course)
                                                                                <tr>
                                                                                    
                                                                                    <!--action-->
                                                                                    <td>
                                                                                        <div class="btn-group">
                                                                                               <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#remove_course{{$course->id}}">
                                                                                                   <i class="las la-edit las1"></i> REMOVE/UN ENROL
                                                                                               </button>
                                                                                        </div>

                                                                                        
                                                                                    </td>
                                                                                    <!--end action-->
                                                                                    <td>{{$course->course_name}}</td>
                                                                                </tr>


                                                                                <!--end update-->
                                                                                <div class="modal fade" id="remove_course{{$course->id}}" style="z-index:200">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h6>REMOVE : {{$course->name}} FROM {{$student->student_fullname}}</h6>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">

                                                                                            <form method="post" action="{{route('unenrolCourseFromStudent')}}">
                                                                                                @csrf
                                                                                                <div class="row">
                                                                                                    <input type="text" class="form-control" name="id" value="{{$course->id}}" hidden="true">
                                                                                                   
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer justify-content-between">
                                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                                <button type="submit" class="btn btn-success">
                                                                                                    <i class="las la-trash las1"></i>
                                                                                                      REMOVE
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--delete--data-->

                                                                                 <!--end update-->
                                                                                 <div class="modal fade" id="delete_course{{$course->id}}" style="z-index:300">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h6>Are you sure you want to delete this record ?</h6>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">

                                                                                            <form method="post" action="{{route('deleteAchivement')}}">
                                                                                                @csrf
                                                                                                <div class="row">
                                                                                                    <input type="text" class="form-control" name="id" value="{{$course->id}}">
                                                            
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer justify-content-between">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="las la-trash-alt"></i>Close</button>
                                                                                                <button type="submit" class="btn btn-danger">
                                                                                                    <i class="las la-trash las3"></i>
                                                                                                    Delete
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>

                                                                                        </div>
                                                                                    </div>
                                                                                  </div>
                                                                                <!--delete--data-->



                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <!--modal-footer-->

                                                                     <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-trash-alt"></i> Close</button>
                                                                      
                                                                    </div>

                                                                <!--end modal-footer-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- Modal -->


                                             @else
                                                 <a href="#">{{$student->courses->count()}}</a>
                                             @endif
                                         </td>

                                        <td>
                                            {{$student->student_status}}
                                        </td>

                                        <td>

                                            <div class="btn-group ">
                                                <button type="button" class="btn lightColor btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                     <li><center><a class="dropdown-item" href="#"><b>MORE ACTION</b></a></center></li>
                                                     <li>
                                                        <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#update_student{{$student->id}}">
                                                         <i class="las la-edit las1"></i> UPDATE STUDENT DETAILS
                                                     </a>
                                                    </li>
                                                     <div class="dropdown-divider"></div>
                                                     <li>
                                                        <a href="#" class="dropdown-item" href="#" data-toggle="modal" data-target="#update_profile_image{{$student->id}}">
                                                            <i class="las la-edit las2"></i> UPDATE PROFILE IMAGE
                                                        </a>
                                                     </li>
                                                     <div class="dropdown-divider"></div>
                                                     <li>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#enrol_student{{$student->id}}">
                                                            <i class="las la-eye las3"></i> ENROL STUDENT TO A COURSE
                                                        </a>
                                                     </li>
                                                     <div class="dropdown-divider"></div>
                                                     <li>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#archive_student{{$student->id}}">
                                                            <i class="las la-eye las3"></i> ARCHIVE STUDENTS
                                                        </a>
                                                    
                                                     </li>
                                                     <div class="dropdown-divider"></div>
                                                     <li>

                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#suspend_student{{$student->id}}">
                                                            <i class="las la-eye las3"></i> SUSPEND STUDENTS
                                                        </a>

                                                     </li>
                                                     
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>

                                    <!--update leed-->
                                        <div class="modal fade" id="update_student{{$student->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">UPDATE : {{$student->student_name}} RECORD</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form role="form" method="POST" action="{{route('updateStudent')}}">
                                                        @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                            <div class="row">
                                                            <input type="text" name="id" value="{{$student->id}}" class="form-control" hidden="true">
                                                            <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>STUDENT ADM NO<sup>*</sup></label>
                                                                        <input type="text"  name="student_admno"  class="form-control" value="{{$student->student_admno}}" disabled>
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>STUDENT FULLNAME <sup>*</sup></label>
                                                                        <input type="text"  name="student_fullname"  class="form-control"  value="{{$student->student_fullname}}" required>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <!-- textarea -->
                                                                    <div class="form-group">
                                                                        <label>STUDENT PHONENUMBER <sup>*</sup></label>
                                                                        <input type="text" class="form-control" name="phone" class="form-control" value="{{$student->phone}}" required>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>STUDENT EMAIL</label>
                                                                        <input type="text" class="form-control"  name="student_email" class="form-control" value="{{$student->student_email}}">
                                                                    
                                                                    </div>
                                                                </div>

                                                            
                                                            </div>

                                                            <div class="row">

                                                               


                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>STUDENT GENDER</label>
                                                                        <select class="form-control" name="student_gender"  class="form-control @error('student_gender') is-invalid @enderror"  value="{{ old('student_gender') }}">
                                                                            <option value="MALE">MALE</option>
                                                                            <option VALUE="FEMALE">FEMALE</option>
                                                                        </select>
                                                                        @error('student_gender')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                    </div>
                                                                </div>

                                                            </div>

                                                    </div>
                                                    <!-- /.card-body -->

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                                                            <button type="submit" class="btn btn-success"><i class="las la-edit"></i>UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <!--end update leed-->

                                    <!--update profile image-->
                                    <div class="modal fade" id="update_profile_image{{$student->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">
                                                    UPDATE PROFILE IMAGE
                                                </h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                                <div class="modal-body">
                                                

                                                    <form role="form" method="POST" action="{{route('student.updateprofileimage')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">
                                                        <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                                                        
                                                        <div class="form-group">
                                                        <label for="exampleInputFile">CHOOSE PROFILE IMAGE</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                            <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror"  value="{{ old('profile_image') }}" required autocomplete="profile_image" autofocus>
                                                            
                                                            @error('profile_image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                            </div>
                                                            <div class="input-group-append">
                                                            <button type="submit" name="submit" class="btn btn-secondary">UPLOAD</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.card-body -->

                                                    </form>



                                                </div>

                                                <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                                
                                                </div>
                                            
                                            
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                    <!--end update profile image-->

                                    <!--update profile image-->
                                    <div class="modal fade" id="enrol_student{{$student->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> ENROL {{$student->student_fullname}} TO A COURSE </h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
                                                </div>
                                            
                                                <div class="modal-body">
                                                

                                                    <form role="form" method="POST" action="{{route('enrolStudentToAcourse')}}">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <input type="" class="form-control" value="{{$student->id}}" name="student_id" hidden="true">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>CHOOSE COURSE</label>
                                                                    <select class="form-control" name="course_id" required class="form-control @error('course_id') is-invalid @enderror" required>
                                                                        <option value="">Select .. </option>
                                                                        @if($courses->count()>0)
                                                                            @foreach($courses as $course)
                                                                                <option value="{{$course->id}}">{{$course->course_name}}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    
                                                                    </select>

                                                                    @error('course_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror

                                                                

                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.card-body -->

                                                  



                                                </div>

                                                <div class="modal-footer justify-content-between">
                                                   <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                                   <button type="submit" class="btn btn-success"><i class="las la-plus"></i> ENROL</button>
                                                </div>
                                                </form>
                                            
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                    <!--end update profile image-->

                                    <!--update profile image-->
                                    <div class="modal fade" id="archive_student{{$student->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> ARE YOU SURE YOU WANT TO ARCHIVE THIS STUDENT ?</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
                                                </div>
                                            
                                                <div class="modal-body">
                                                

                                                    <form role="form" method="POST" action="{{route('urchiveStudent')}}">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                                                             <p>Proceed and click archive</p>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.card-body -->

                                                </div>

                                                <div class="modal-footer justify-content-between">
                                                   <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                                   <button type="submit" class="btn btn-success"><i class="las la-send"></i> ARCHIVE</button>
                                                </div>
                                                </form>
                                            
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                    <!--end update profile image-->

                                    <!--update profile image-->
                                    <div class="modal fade" id="suspend_student{{$student->id}}">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> ARE YOU SURE YOU WANT TO SUSPEND THIS STUDENT ?</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
                                                </div>
                                            
                                                <div class="modal-body">
                                                

                                                    <form role="form" method="POST" action="{{route('suspendStudent')}}">
                                                    @csrf
                                                       
                                                            <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                                                </div>

                                                <div class="modal-footer justify-content-between">
                                                   <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                                   <button type="submit" class="btn btn-success"><i class="las la-send"></i> SUSPEND</button>
                                                </div>
                                                </form>
                                            
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                    <!--end update profile image-->




                                   @endforeach
                                @endif
                            </tbody>
                    </table>
                </div>
             </div>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--add student modal-->
<div class="modal fade" id="addStudentModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW STUDENT</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('addStudent')}}">
            @csrf
        <!-- /.card-header -->
        <div class="card-body">
                <div class="row">

                   <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>STUDENT ADM NO<sup>*</sup></label>
                            <input type="text" name="student_admno" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>STUDENT FULLNAME <sup>*</sup></label>
                            <input type="text"  name="student_fullname"  class="form-control @error('student_fullname') is-invalid @enderror"  value="{{ old('student_fullname') }}" required>
                            @error('student_fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>STUDENT PHONENUMBER <sup>*</sup></label>
                            <input type="text" class="form-control" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}"  required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>STUDENT EMAIL</label>
                            <input type="text" class="form-control"  name="student_email" class="form-control @error('student_email') is-invalid @enderror"  value="{{ old('student_email') }}">
                            @error('student_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                   
                </div>

                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>GENDER<sup>*</sup></label>
                            <select class="form-control" name="student_gender"  class="form-control @error('student_gender') is-invalid @enderror"  value="{{ old('student_gender') }}">
                                <option value="MALE">MALE</option>
                                <option VALUE="FEMALE">FEMALE</option>
                            </select>
                            @error('student_gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>DEPARTMENT<sup>*</sup></label>
                            <select class="form-control" name="department_id" required class="form-control @error('department_id') is-invalid @enderror"  value="{{ old('department_id') }}">
                                <option value="">Select .. </option>
                                @if(!empty($departments))
                                   @foreach($departments as $department)
                                     <option value="{{$department->id}}">{{$department->department_name}}</option>
                                   @endforeach
                                @endif
                                
                            </select>
                            @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                </div>

                <div class="row">


                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>CLASS<sup>*</sup></label>
                            <select class="form-control" name="clas_id" required class="form-control @error('clas_id') is-invalid @enderror"  value="{{ old('clas_id') }}">
                                <option value="">Select .. </option>
                                @if(!empty($clases))
                                   @foreach($clases as $clas)
                                     <option value="{{$clas->id}}">{{$clas->clas_name}}</option>
                                   @endforeach
                                @endif
                                
                            </select>
                            @error('clas_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                </div>

        </div>
        <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>ADD</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->


<!--add student modal-->
<div class="modal fade" id="archivedStudentModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-lg">
        <div class="modal-header">
            <h6 class="modal-title">ARCHIVED STUDENTS</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
       
        <!-- /.card-header -->
        <div class="card-body">
                
             <table class="table table-bordered table-striped table-sm">
                 <thead>
                           <th>ADMNO</th>
                            <th>IMAGE</th>
                            <th>FULLNAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>GENDER</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                 </thead>
                 <tbody>
                    @if($archivedstudents->count()>0)
                        @foreach($archivedstudents as $archivedstudent)
                        <tr>
                            <td>{{strtoupper($archivedstudent->student_admno)}}</td>
                            <td><img class="profile-user-img img-fluid img-circle" src="{{asset('uploads/images/'.$archivedstudent->profile_image)}}" style="width:40px"> </td>
                            <td>{{strtoupper($archivedstudent->student_fullname)}}</td>
                            <td>{{strtoupper($archivedstudent->student_email)}}</td>
                            <td>{{$archivedstudent->phone}}</td>
                            <td>{{strtoupper($archivedstudent->student_gender)}}</td>
                            <td>{{strtoupper($archivedstudent->student_status)}}</td>
                            <td>
                                <form method="POST" action="{{route('unarchivedStudent')}}">
                                    @csrf
                                    <input type="text" name="id" value="{{$archivedstudent->id}}" hidden="true">
                                    <button class="btn btn-sm btn-success"><i class="las la-edit"></i>RECOVER</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                 </tbody>
             </table>
        </div>
        <!-- /.card-body -->

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
            
        </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->

<!--add student modal-->
<div class="modal fade" id="suspendedStudentModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-lg">
        <div class="modal-header">
            <h6 class="modal-title">SUSPENDED STUDENTS</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
       
        <!-- /.card-header -->
        <div class="card-body">
                
             <table class="table table-bordered table-striped table-sm">
                 <thead>
                           <th>ADMNO</th>
                           <!-- <th>IMAGE</th>-->
                            <th>FULLNAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>GENDER</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                 </thead>
                 <tbody>
                    @if($suspendedstudents->count()>0)
                        @foreach($suspendedstudents as $archivedstudent)
                        <tr>
                            <td>{{strtoupper($archivedstudent->student_admno)}}</td>
                            <!--<td><img class="profile-user-img img-fluid img-circle" src="{{asset('uploads/images/'.$archivedstudent->profile_image)}}" style="width:40px"> </td>-->
                            <td>{{strtoupper($archivedstudent->student_fullname)}}</td>
                            <td>{{strtoupper($archivedstudent->student_email)}}</td>
                            <td>{{$archivedstudent->phone}}</td>
                            <td>{{strtoupper($archivedstudent->student_gender)}}</td>
                            <td>{{strtoupper($archivedstudent->student_status)}}</td>
                            <td>
                                <form method="POST" action="{{route('activateStudent')}}">
                                    @csrf
                                    <input type="text" name="id" value="{{$archivedstudent->id}}" hidden="true">
                                    <button class="btn btn-sm btn-success"><i class="las la-edit"></i>Activate</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                 </tbody>
             </table>
        </div>
        <!-- /.card-body -->

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
            
        </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->

<!--error-->
@if ($errors->any())
    <div id="flash-message" class="alert alert-danger alert-dismissible position-fixed" style="top: 40px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Faile. Please check the form  for errors
    </div>
@endif

@endsection

<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // setTimeout function to hide the flash message after 5 seconds
        setTimeout(function() {
            $('#flash-message').fadeOut('fast');
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>