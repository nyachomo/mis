@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>{{$course->course_name}}</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('adminShowCourses')}}">Courses</a></li>
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Notes</li>
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
                    <div class="btn-group1" style="float:right">
                        <button class="btn btn-success btn-sm darkBlue" data-toggle="modal" data-target="#addStudentModal"><i class="las la-plus"></i>Add New Unit</button>
                        <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#archiveSubjectModal"><i class="las la-plus"></i>{{$archivesubjects->count()}} Archive</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <thead>
                         
                            <th>#</th>
                            <th>Department</th>
                            <th>Training Programe</th>
                            <th>Unit Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                              @if(!empty($subjects))
                                 @foreach($subjects as $key=>$subject)
                                 <tr>
                                        
                                        <td>{{$key+1}}</td>
                                        <td>{{$subject->course->department->department_name}}</td>
                                        <td>{{$subject->course->course_name}}</td>
                                        <td>{{$subject->subject_name}}</td>

                                        <td>

                                        <div class="btn-group ">
                                            <button type="button" class="btn lightColor btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                <li>
                                                    <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#update_subject{{$subject->id}}">
                                                    <i class="fa fa-edit las1"></i> Edit
                                                </a>
                                                </li>
                                                <div class="dropdown-divider"></div>
                                                <li>
                                                    <a href="#" class="dropdown-item" href="#" data-toggle="modal" data-target="#archive_subject{{$subject->id}}">
                                                        <i class="fa fa-trash las2"></i>Archive
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        </td>


                                 </tr>


                                 <!--update subject modal-->
                                    <div class="modal fade" id="update_subject{{$subject->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Update Unit</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminUpdateSubject')}}">
                                                    @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                        <div class="row">
                                                          <input type="text" name="id" value="{{$subject->id}}" hidden="true">
                                                           <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group" hidden="true">
                                                                    <label>Training Program<sup>*</sup></label>
                                                                    <select name="course_id" class="form-control" required>
                                                                        <option value="{{$subject->course->id}}">{{$subject->course->course_name}}</option>
                                                                        <!--
                                                                        @foreach($courses as $course)
                                                                            <option value="{{$course->id}}">{{$course->course_name}}</option>
                                                                        @endforeach-->
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Unit Name <sup>*</sup></label>
                                                                    <input type="text"  name="subject_name"  class="form-control @error('subject_name') is-invalid @enderror"  value="{{$subject->subject_name}}" required>
                                                                    @error('subject_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        
                                                        </div>  
                                                        
                                                        <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" >TOPIC CONTENT</label>
                                                                        
                                                                        <textarea name="subject_content" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                            {{$subject->subject_content}}
                                                                        </textarea> 
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
                                 <!--end delete modal-->

                                 <!--delete subject modal-->
                                 <div class="modal fade" id="archive_subject{{$subject->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Are you sure you want to archive this unit ?</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('adminArchiveSubject')}}">
                                                @csrf
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="id" value="{{$subject->id}}" hidden="true">
                                                        </div>
                                                    </div>       
                                            </div>

                                            

                                            <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-trash"></i>Archive</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                <!--end delete modal-->

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
</section>
<!-- /.container-fluid -->

<!--add student modal-->
<div class="modal fade" id="addStudentModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW SUBJECT</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddSubject')}}">
            @csrf
        <!-- /.card-header -->
        <div class="card-body">
                <div class="row">

                    <input type="text" name="course_id" class="form-control" value="{{$id}}" hidden="true">

                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Unit Name <sup>*</sup></label>
                            <input type="text"  name="subject_name"  class="form-control @error('subject_name') is-invalid @enderror"  value="{{ old('subject_name') }}" required>
                            @error('subject_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                </div>   
                
                <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" >TOPIC CONTENT</label>
                                
                                <textarea name="subject_content" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    
                                </textarea> 
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
<div class="modal fade" id="archiveSubjectModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Archive Units</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped table-sm">
                <thead>
                   <th>Id</th>
                   <th>Department</th>
                   <th>Training Programe</th>
                   <th>Unit Name</th>
                   <th>Action</th>
                </thead>
                <tbody>
                    @if($archivesubjects)
                        @foreach($archivesubjects as $key=>$archivesubject)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$archivesubject->course->department->department_name}}</td>
                                <td>{{$archivesubject->course->course_name}}</td>
                                <td>{{$archivesubject->subject_name}}</td>
                                <td>
                                    <form method="POST" action="{{route('adminRecoverSubject')}}">
                                        @csrf
                                        <input type="text" name="id" class="form-control" value="{{$archivesubject->id}}" hidden="true">
                                        <button type="submit" class="btn btn-sm btn-success">Recover</button>
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