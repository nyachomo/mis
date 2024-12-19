@extends('layouts.master')
@section('content')
<?php
use App\Models\StudentAnswer;
use App\Models\StudentAssignmentQuestion;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Assigments</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="{{route('returnBackUrl')}}"><span class="right badge badge-secondary">Go Back</span></a></li>-->
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Assignments</li>
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
                       
                        
                        <div class="col-sm-12">
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-xl"><i class="las la-plus"></i>ADD NEW EXAM</button>
                              
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       More Reports
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('adminExportStudentAssignmentsAsPdf')}}">Export Pdf</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive2">
                        <table class="table table-sm table-bordered table-striped" id="example1">
                            <thead>
                                <!--<th>Department</th>-->
                               <!--<th>Course</th>-->
                               <th>#</th>
                                <th>Class</th>
                               <!--<th>Exam Type</th>-->
                                <th>Exam Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                               <!-- <th>Duration</th>-->
                               <th>Total Score</th>
                                <th>Exam Status</th>
                                <th>Attempts</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if(!empty($exams))
                                    @foreach($exams as $key=>$exam)
                                    <tr> 
                                           <!-- <td>{{$exam->department->department_name}}</td>-->
                                            <!--<td>{{$exam->course->course_name}}</td>-->
                                            <td>{{$key+1}}</td>
                                            <td>{{$exam->clas->clas_name}}</td>
                                           <!-- <td>{{$exam->exam_type}}</td>-->
                                            <td>{{$exam->exam_name}}</td>  
                                            <td>{{$exam->exam_start_date}}</td>  
                                            <td>{{$exam->exam_end_date}}</td>  
                                            <!--<td>{{$exam->exam_duration}}</td>-->
                                            
                                        
                                            <!--<td>
                                                <a href="{{url('/admin/ShowQuestions/'.$exam->id)}}" type="button" class="btn btn-xs btn-block btn-outline-primary"> 0 View</a>
                                            </td>-->

                                            <td>

                                                <div class="dropdown">
                                                    <button class="btn btn-sm lightColor btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><center><a href="#" class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                        @if($exam->exam_status!="Published")
                                                        <li>
                                                            <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#update_exam{{$exam->id}}">
                                                                <i class="las la-edit las1"></i> UPDATE EXAM
                                                            </a>
                                                        </li>
                                                        <div class="dropdown-divider"></div>
                                                        
                                                        <li>

                                                            <a href="#" class="dropdown-item" href="#" data-toggle="modal" data-target="#publish_exam{{$exam->id}}">
                                                                <i class="las la-edit las2"></i> PUBLISHED EXAM
                                                            </a>

                                                        </li>
                                                        <div class="dropdown-divider"></div>
                                                        <li>
                                                            <a href="#" class="dropdown-item" href="#" data-toggle="modal" data-target="#archive_exam{{$exam->id}}">
                                                                <i class="las la-trash las3"></i> ARCHIVED EXAM
                                                            </a>

                                                        </li>
                                                        <div class="dropdown-divider"></div>
                                                        @endif
                                                        <li>
                                                            <a href="{{url('/adminShowAssignmentQuestions/'.$exam->id)}}" class="dropdown-item" >
                                                                <i class="las la-trash las3"></i> VIEW QUESTIONS
                                                            </a>

                                                        </li>
                                                    
                                                    </ul>
                                                </div>

                                            </td>
                                    </tr>

                                        <!--add student modal-->
                                        <div class="modal  fade " id="update_exam{{$exam->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">UPDATE EXAM</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form role="form" method="POST" action="{{route('adminUpdateStudentAssignments')}}" >
                                                        @csrf
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                                <input type="text" name="id" value="{{$exam->id}}" hidden="true">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label>DEPARTMENT<sup>*</sup></label>
                                                                        <select class="form-control" name="department_id" required>
                                                                            <option value="{{$exam->department_id}}">{{$exam->department->department_name}}</option>
                                                                            @if(!empty($departments))
                                                                                @foreach($departments as $department)
                                                                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <label>PROGRAMM<sup>*</sup></label>
                                                                        <select class="form-control" name="course_id" required>
                                                                            <option value="{{$exam->course_id}}">{{$exam->course->course_name}}</option>
                                                                            @if(!empty($courses))
                                                                                @foreach($courses as $course)
                                                                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                            
                                                                        </select>
                                                                    </div>

                                                                </div>


                                                                <div class="row">

                                                                

                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>ClASS<sup>*</sup></label>
                                                                            <select class="form-control" name="clas_id" required>
                                                                                <option value="{{$exam->clas_id}}">{{$exam->clas->clas_name}}</option>
                                                                                @if(!empty($clases))
                                                                                    @foreach($clases as $clas)
                                                                                        <option value="{{$clas->id}}">{{$clas->clas_name}}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                                
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>TOPIC NAME<sup>*</sup></label>
                                                                            <input type="text"  name="exam_name"  value="{{$exam->exam_name}}" class="form-control @error('exam_name') is-invalid @enderror"  value="{{ old('exam_name') }}" required>
                                                                            @error('exam_name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                
                                                                </div>  


                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>EXAM START DATE<sup>*</sup></label>
                                                                            <input type="date" class="form-control" name="exam_start_date" value="{{$exam->exam_start_date}}"  required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>EXAM END DATE<sup>*</sup></label>
                                                                            <input type="date" class="form-control" name="exam_end_date" required value="{{$exam->exam_end_date}}">
                                                                        </div>

                                                                    </div>


                                                                </div>  


                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>EXAM DURATION (HRS)<sup>*</sup></label>
                                                                            <input type="time" class="form-control" name="exam_duration" required value="{{$exam->exam_duration}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>TOTAL SCORE<sup>*</sup></label>
                                                                            <input type="number" class="form-control" name="exam_total_score" required min="100" max="100" value="100" value="{{$exam->exam_total_score}}">
                                                                        </div>

                                                                    </div>


                                                                </div>  

                                                                
                                                                <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label" >EXAM INSTRUCTION</label>
                                                                            
                                                                                <textarea name="exam_instruction"  class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                                    {{$exam->exam_instruction}}
                                                                                </textarea> 
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                            <button type="submit" class="btn btn-success"><i class="las la-edit"></i>UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <!--end add student modal-->

                                        <!--add student modal-->
                                        <div class="modal  fade " id="add_question{{$exam->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">ADD NEW EXAM</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form role="form" method="POST" >
                                                        @csrf
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            
                                                            

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>COURSE</label>
                                                                            <input type="text" name="course_id" value="{{$exam->course->id}}" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>EXAM <sup>*</sup></label>
                                                                            <input type="text" name="exam_id" value="{{$exam->course->id}}" class="form-control">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>  

                                                                
                                                                <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label" >QUESTION</label>
                                                                            
                                                                                <textarea name="question_name"  class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                                    {{$exam->exam_instruction}}
                                                                                </textarea> 
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>MARK</label>
                                                                            <input type="text" name="question_mark"  class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                            <button type="submit" class="btn btn-success"><i class="las la-edit"></i>UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <!--end add student modal-->



                                        <!--add student modal-->
                                        <div class="modal  fade " id="publish_exam{{$exam->id}}">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">ARE YOU SURE YOU WANT TO PUBLISHED THIS EXAM</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form role="form" method="POST" action="{{route('adminPublishedStudentAssignments')}}" >
                                                        @csrf
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                                <div class="row">
                                                                    <input type="text" name="id" value="{{$exam->id}}" hidden="true">
                                                                </div>  

                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                            <button type="submit" class="btn btn-success"><i class="las la-edit"></i>PUBLISHED</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <!--end add student modal-->

                                        <!--add student modal-->
                                        <div class="modal  fade " id="archive_exam{{$exam->id}}">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">ARE YOU SURE YOU WANT TO ARCHIVE THIS EXAM ?</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form role="form" method="POST" action="{{route('adminArchiveStudentAssignments')}}" >
                                                        @csrf
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                                <div class="row">
                                                                    <input type="text" name="id" value="{{$exam->id}}" hidden="true">
                                                                </div>  

                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                            <button type="submit" class="btn btn-success"><i class="las la-edit"></i>ARCHIVED</button>
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
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--add student modal-->
<div class="modal  fade " id="modal-xl">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW ASSIGNEMT</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddStudentAssignments')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                              <label>DEPARTMENT<sup>*</sup></label>
                              <select class="form-control" name="department_id" required>
                                 <option value="">SELECT..</option>
                                 @if(!empty($departments))
                                     @foreach($departments as $department)
                                         <option value="{{$department->id}}">{{$department->department_name}}</option>
                                     @endforeach
                                 @endif
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label>PROGRAMM<sup>*</sup></label>
                            <select class="form-control" name="course_id" required>
                                 <option value="">SELECT..</option>
                                 @if(!empty($courses))
                                     @foreach($courses as $course)
                                         <option value="{{$course->id}}">{{$course->course_name}}</option>
                                     @endforeach
                                 @endif
                                
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>ClASS<sup>*</sup></label>
                            <select class="form-control" name="clas_id" required>
                                 <option value="">SELECT..</option>
                                 @if(!empty($clases))
                                     @foreach($clases as $clas)
                                         <option value="{{$clas->id}}">{{$clas->clas_name}}</option>
                                     @endforeach
                                 @endif
                                
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>EXAM NAME<sup>*</sup></label>
                                <input type="text"  name="exam_name"  class="form-control @error('exam_name') is-invalid @enderror"  value="{{ old('exam_name') }}" required>
                                @error('exam_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               
                                <input type="text" name="is_cat" class="form-control" value="Yes" hidden="true">

                            </div>
                        </div>

                    </div>

                   
                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>EXAM START DATE<sup>*</sup></label>
                                <input type="date" class="form-control" name="exam_start_date" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>EXAM END DATE<sup>*</sup></label>
                                <input type="date" class="form-control" name="exam_end_date">
                            </div>

                        </div>


                    </div>  


                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>EXAM DURATION (HRS)<sup>*</sup></label>
                                <input type="time" class="form-control" name="exam_duration" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>TOTAL SCORE<sup>*</sup></label>
                                <input type="number" class="form-control" name="exam_total_score" required min="100" max="100" value="100" >
                            </div>

                        </div>


                    </div>  

                    
                    <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label" >EXAM INSTRUCTION</label>
                                  
                                    <textarea name="exam_instruction" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        
                                    </textarea> 
                                </div>
                            </div>
                    </div>
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
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
<div class="modal  fade " id="archiveExamsModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Archive Exams</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
       
            <!-- /.card-header -->
            <div class="card-body">
                  
            
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-stripped" id="example1">
                            <thead>
                                <th>DEPARTMENT</th>
                                <th>COURSE</th>
                                <th>CLASS</th>
                                <th>EXAM TYPE</th>
                                <th>EXAM NAME</th>
                                <th>START_DATE</th>
                                <th>END DATE</th>
                                <th>DURATION</th>
                                <th>TOTAL SCORE</th>
                                <th>EXAM STATUS</th>
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                                @if($archivedexams->count()>0)
                                    @foreach($archivedexams as $key=>$exam)
                                    <tr>
                                            
                                            <td>{{$exam->department->department_name}}</td>
                                            <td>{{$exam->course->course_name}}</td>
                                            <td>{{$exam->clas->clas_name}}</td>
                                            <td>{{$exam->exam_type}}</td>
                                            <td>{{$exam->exam_name}}</td>  
                                            <td>{{$exam->exam_start_date}}</td>  
                                            <td>{{$exam->exam_end_date}}</td>  
                                            <td>{{$exam->exam_duration}}</td>  
                                            <td>{{$exam->exam_total_score}}</td>  
                                            <td>
                                                @if($exam->exam_status=="Published")
                                                    <span class="right badge badge-success">{{$exam->exam_status}}</span>
                                                @else
                                                    <span class="right badge badge-danger">{{$exam->exam_status}}</span>
                                                    
                                                @endif
                                                
                                            </td>  
                                        
                                            <td>

                                                <form action="{{route('adminRecoverStudentAssignments')}}" method="post">
                                                    @csrf
                                                    <input type="text" name="id" class="form-control" value="{{$exam->id}}" hidden="true">
                                                    <button type="submit" class="btn btn-sm btn-success">Recover</button>
                                                </form>

                                            </td>
                                    </tr>

                                 
                                    @endforeach
                                @else
                                @endif
                            </tbody>
                        </table>
                    </div>





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