@extends('layouts.master')
@section('content')
<?php
use App\Models\TraineeCourse;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

$user_id=Auth::user()->id;
$mycourses=TraineeCourse::with('course')->where('user_id',$user_id)->get();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><span class="right badge badge-info">Go Back</span> </a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Courses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
   <div class="container-fliud">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i> Alert!</h5>
           You have enrol for 
           <span style="font-size:30px"> {{$mycourses->count()}}</span>Courses <button class="btn btn-success" data-toggle="modal" data-target="#studentViewEnrolCourses">Click to view</button>

        </div>
   </div>
</section>

@if(Auth::check())
<section class="content">
  <div class="container-fliud">
          <div class="card">
                 <div class="card-header">


                    <div class="btn-group1" style="float:right">
                        @if(Auth::user()->is_trainee=='Yes')
                         <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#enrol_to_course"><i class="las la-plus"></i>Enrol New Course</button>
                        @endif
                        @if(Auth::user()->is_admin=='Yes')
                        <!--<button class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#uploadCoursesModal"><i class="las la-plus"></i>Upload Courses</button>-->
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCourse"><i class="las la-plus"></i>Add New Course</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#archiveCourses"><i class="las la-plus"></i>{{$archivedcourses->count()}}Archive</button>
                        <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </button>
                        <ul class="dropdown-menu">
                            <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                            <li><a class="dropdown-item"  href="{{route('adminExportCoursesAsPdf')}}"> <i class="fa fa-download las1" aria-hidden="true"></i>Export Pdf</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item"  href="{{route('adminExportCoursesAsExcel')}}"><i class="fa fa-file-excel-o las3" aria-hidden="true"></i> Export Excel</a></li>
                           
                        </ul>
                        @endif
                    </div>
                   
                   
                 </div>

             <div class="card-body">
                
                <table class="table table-sm table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <!--<th scope="col">Image</th>-->
                            <th scope="col">Name</th>
                            <th scope="col">Level</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Department</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($courses))
                            @foreach($courses as $key=>$course)
                            <tr>
                                <td>{{$key+1}}</td>  
                               <!-- <td><img src="uploads/course_images/{{$course->course_image}}" style="width:50%"></td>-->
                                <td><a href="{{url('/admin/View/Notes/'.$course->id)}}">{{$course->course_name}}</a></td>
                                <td>{{$course->course_level}}</td>
                                <td>{{$course->course_duration}}</td>
                                <td>{{$course->department->department_name}}</td>
                                <td>{{$course->course_price}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                            @if(Auth::user()->is_admin=='Yes')
                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#update_course{{$course->id}}" href="#"> <i class="fa fa-edit las1"></i> Edit</a></li>
                                            <div class="dropdown-divider"></div>

                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#update_course_image{{$course->id}}" href="#"> <i class="fa fa-edit las1"></i> Update Course Image</a></li>
                                            <div class="dropdown-divider"></div>

                                            <li><a class="dropdown-item"  href="{{url('/admin/View/Notes/'.$course->id)}}"> <i class="fa fa-edit las1"></i>Add/View Notes</a></li>
                                            <div class="dropdown-divider"></div>

                                            

                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#archive_course{{$course->id}}" href="#"> <i class="fa fa-edit las2"></i> Archive</a></li>
                                            <div class="dropdown-divider"></div>
                                            @endif
                                            @if(Auth::user()->is_trainee=='Yes')
                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#enrol_for_course{{$course->id}}" href="#"> <i class="fa fa-plus text-success" aria-hidden="true"></i> Enrol for this course</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>

                            </tr>

                           



                            <!--add student modal-->
                            <div class="modal  fade " id="update_course{{$course->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Update Course</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" method="POST" action="{{route('adminUpdateCourses')}}">
                                            @csrf
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                              <input type="text" name="id" value="{{$course->id}}" class="form-control">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                               <div class="form-group">
                                                                    <label>Department</label>
                                                                    <select class="form-control" required name="department_id">
                                                                        <option value="{{$course->department_id}}">{{$course->department->department_name}}</option>
                                                                        @if(!empty($departments))
                                                                        @foreach($departments as $department)
                                                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                                        @endforeach
                                                                        @else
                                                                        @endif
                                                                    </select>
                                                                </div>

                                                    </div>

                                                    <div class="col-sm-6">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Course Name<sup>*</sup></label>
                                                                <input type="text" class="form-control" name="course_name" value="{{$course->course_name}}" required>
                                                            </div>
                                                        </div>

                                                        

                                                </div>

                                                <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Course Introductory Text</label>
                                                                <input type="text" name="course_intoduction_text" value="{{$course->course_intoduction_text}}" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label>Course Description</label>
                                                            <textarea class="form-control" name="course_description"  col="6">{{$course->course_description}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label>What to learn</label>
                                                            <textarea name="what_to_learn" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                           <?php echo$course->what_to_learn;?>
                                                           </textarea> 
                                                        </div>
                                                    </div>
                    
                                                    

                                                    <div class="row">

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Level<sup>*</sup></label>
                                                                <select name="course_level" class="form-control" required>
                                                                    <option value="{{$course->course_level}}">{{$course->course_level}}</option>
                                                                    <option value="Basic Level">Basic Level</option>
                                                                    <option value="Intermediary Level">Intermediary Level</option>
                                                                    <option value="Advance Level">Advance Level</option>
                                                                </select>
                                                            </div>


                                                        </div>


                                                        <div class="col-sm-4">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Course Duration (In Months)<sup>*</sup></label>
                                                                <input type="number" class="form-control" name="course_duration" value="{{$course->course_duration}}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label>Course Price (Ksh)<sup>*</sup></label>
                                                                <input type="number" class="form-control" name="course_price" value="{{$course->course_price}}" required min="1">
                                                            </div>

                                                        </div>


                                                    </div> 

                                                

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Course Two likes</label>
                                                                <input type="number" name="course_two_like" value="{{$course->course_two_like}}" class="form-control" min="1" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Course one likes</label>
                                                                <input type="number" name="course_one_like" value="{{$course->course_one_like}}" class="form-control" min="1" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Course Dislike</label>
                                                                <input type="number" name="course_not_interested" value="{{$course->course_not_interested}}" class="form-control" min="1" required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                                <label>How Many Leaners already enrolled for this course</label>
                                                                <input type="number" name="course_leaners_already_enrolled" value="{{$course->course_leaners_already_enrolled}}" class="form-control" min="1" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                        <div class="form-group">
                                                                <label>Course Publisher Name</label>
                                                                <input type="text" name="course_publisher_name" value="{{$course->course_publisher_name}}" class="form-control" >
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="row">

                                                        <div class="col-sm-12">
                                                        <div class="form-group">
                                                                <label>Course Publisher Description</label>
                                                                <textarea name="course_publisher_description" class="form-control" row="6">{{$course->course_publisher_description}} </textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            <!-- /.modal-dialog -->
                            </div>
                            <!--end add student modal-->







                            <!--add student modal-->
                                <div class="modal  fade " id="update_course_image{{$course->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Update Image</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('updateCourseImage')}}" enctype="multipart/form-data">
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                       <input type="text" name="id" value="{{$course->id}}" hidden="true"> 
                                                       <input type="file" name="course_image" class="form-control">
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-trash"></i>Send</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </div>
                            <!--end add student modal-->


                            <!--add student modal-->
                               <div class="modal  fade " id="archive_course{{$course->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Are you Sure you Want to delete this record ?</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('adminArchiveCourses')}}">
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                       <input type="text" name="id" value="{{$course->id}}" hidden="true"> 
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-trash"></i>Archive</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </div>
                            <!--end add student modal-->


                             <!--add student modal-->
                             <div class="modal  fade " id="enrol_for_course{{$course->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!--<div class="modal-header">
                                                <h6 class="modal-title">Are you Sure you Want to enrol for this course ?</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>-->
                                            <form role="form" method="POST" action="{{route('enrolTraineeToCourse')}}">
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="modal-body">

                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                                    Your are about to enrol for <b>{{$course->course_name}}</b> . Ksh {{$course->course_price}} will be debited in your account.
                                                    If you agree click enrol button to add this course to your basket
                                                </div>

                                                       <input type="text" name="course_id" value="{{$course->id}}" hidden="true"> 
                                                       <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden="true">
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-trash"></i>Enrol</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </div>
                            <!--end add student modal-->




                            @endforeach
                        @else
                        @endif
                    </tbody> 
                
              
                </table>    

             </div>

          </div>
  </div>
</section>
@endif



<!--add student modal-->
<div class="modal  fade " id="enrol_to_course">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Enrol To Course</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('enrolTraineeToCourse')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">

                   <div class="row">
                      <div class="col-sm-12">
                          <div class="form-group">
                            <label>Courses</label>
                              <select class="form-control" required name="course_id">
                                <option value="">Select .. </option>
                                 @if(!empty($courses))
                                   @foreach($courses as $course)
                                      <option value="{{$course->id}}">{{$course->course_name}} -{{$course->course_level}} <b>(Ksh {{$course->course_price}})</b></option>
                                   @endforeach
                                 @else
                                 @endif
                              </select>
                          </div>
                      </div>
                   </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_id" value="{{Auth::user()->id}}" hidden="true">
                            </div>
                        </div>

                    </div>  

            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Add</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->

<!--add student modal-->
<div class="modal  fade " id="addCourse">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Add New Course</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddCourses')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">

                   <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Department</label>
                              <select class="form-control" required name="department_id">
                                <option value="">Select .. </option>
                                 @if(!empty($departments))
                                   @foreach($departments as $department)
                                      <option value="{{$department->id}}">{{$department->department_name}}</option>
                                   @endforeach
                                 @else
                                 @endif
                              </select>
                          </div>
                      </div>

                      <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="course_name" required>
                            </div>
                        </div>

                        

                   </div>

                   <div class="row">
                        <div class="col-sm-12">
                             <div class="form-group">
                                 <label>Course Introductory Text</label>
                                 <input type="text" name="course_intoduction_text" class="form-control" required>
                             </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label>Course Description</label>
                            <textarea class="form-control" name="course_description" col="6"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label>What to learn</label>
                            <textarea name="what_to_learn" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        
                        </textarea> 
                        </div>
                    </div>
                    

                    <div class="row">

                       <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Level<sup>*</sup></label>
                                <select name="course_level" class="form-control" required>
                                      <option value="">Select ..</option>
                                      <option value="Basic Level">Basic Level</option>
                                      <option value="Intermediary Level">Intermediary Level</option>
                                      <option value="Advance Level">Advance Level</option>
                                </select>
                            </div>

                        </div>


                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Duration (In Months)<sup>*</sup></label>
                                <input type="number" class="form-control" name="course_duration" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Price (Ksh)<sup>*</sup></label>
                                <input type="number" class="form-control" name="course_price" required min="1">
                            </div>

                        </div>


                    </div> 

                   

                    <div class="row">
                        <div class="col-sm-4">
                             <div class="form-group">
                                 <label>Course Two likes</label>
                                 <input type="number" name="course_two_like" class="form-control" min="1" required>
                             </div>
                        </div>

                        <div class="col-sm-4">
                             <div class="form-group">
                                 <label>Course one likes</label>
                                 <input type="number" name="course_one_like" class="form-control" min="1" required>
                             </div>
                        </div>

                        <div class="col-sm-4">
                             <div class="form-group">
                                 <label>Course Dislike</label>
                                 <input type="number" name="course_not_interested" class="form-control" min="1" required>
                             </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                                <label>How Many Leaners already enrolled for this course</label>
                                <input type="number" name="course_leaners_already_enrolled" class="form-control" min="1" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="form-group">
                                <label>Course Publisher Name</label>
                                <input type="text" name="course_publisher_name" class="form-control" >
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                           <div class="form-group">
                                <label>Course Publisher Description</label>
                                <textarea name="course_publisher_description" class="form-control" row="6"> </textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" name="course_image" value="course_image.jpg" class="form-control" hidden="true">
                        </div>
                    </div>

                    
                    
                   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Add</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->

<!--add student modal-->
<div class="modal  fade " id="studentViewEnrolCourses">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">My Courses</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      
            <div class="modal-body">

                    <div class="row">
                         <div class="col-sm-12">
                            <table class="table table-sm table-bordered">
                                <thead>
                                     <th>#</th>
                                     <th>Name</th>
                                     <th>Level</th>
                                     <th>Duration</th>
                                     <th>Cost</th>
                                </thead>
                                <tbody>
                                    <?php
                                      $user_id=Auth::user()->id;
                                      $mycourses=TraineeCourse::with('course')->where('user_id',$user_id)->get()
                                      ?>
                                        @if(!empty($mycourses))
                                          @foreach($mycourses as $key=>$mycourse)
                                           <tr>
                                              <td>{{$key+1}}</td>
                                              <td>{{$mycourse->course->course_name}}</td>
                                              <td>{{$mycourse->course->course_level}}</td>
                                              <td>{{$mycourse->course->course_duration}}</td>
                                              <td>{{$mycourse->course->course_price}}</td>
                                           </tr>
                                          @endforeach
                                        @endif
                                      <?php
                                    ?>
                                </tbody>
                            </table>
                         </div>
                    </div>  

                        
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Add</button>
            </div>
       
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->





<!--add student modal-->
<div class="modal  fade " id="archiveCourses">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Archived Courses</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                   
            <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price</th>
                                <th scope="col">Department</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead> 

                        <tbody>
                              @if(!empty($archivedcourses))
                                  @foreach($archivedcourses as $key=>$course)
                                  <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$course->course_name}}</td>
                                        <td>{{$course->course_level}}</td>
                                        <td>{{$course->course_duration}}</td>
                                        <td>{{$course->course_price}}</td>
                                        <td>{{$course->department->department_name}}</td>
                                        <td><span class="right badge badge-danger">{{$course->course_status}}</span></td>
                                      
                                        <td>
                                            <form method="POST" action="{{route('adminRecoverArchiveCourses')}}">
                                                @csrf
                                                <input type="text" name="recover_id" value="{{$course->id}}"  class="form-control" hidden="true">
                                                <button type="submit" name="submit" class="btn btn-sm btn-success">Recover</button>
                                            </form>
                                        </td>
                                  </td>
                                  @endforeach
                              @endif
                        </tbody>

                 </table>     


                    
                   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="las la-times"></i>Close</button>
               
            </div>
       
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->

<!--add student modal-->
<div class="modal  fade " id="uploadCoursesModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Upload Users</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('adminImportCourses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-sm-12">

                                    <div class="input-group">
                                        <div class="custom-file">
                                        
                                            <input type="file" class="form-control" id="exampleInputFile" name="course_file">
                                           
                                        </div>
                                        <div class="input-group-append">
                                           <button type="submit" class="btn btn-secondary">Import</button>
                                        </div>
                                    </div>
                            </div>
                        </div> 
                    </form>  
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                
            </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->


@endsection