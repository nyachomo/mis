@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Topics</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Topics</li>
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
                    <div class="btn-group">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus las2"></i>Add New Topic</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <thead>
                            <th>#</th>
                            <th>Department</th>
                            <th>Training Program</th>
                            <th>Unit Name</th>
                            <th>Topic Name</th>
                            <th>Topic Content</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                              @if(!empty($topics))
                                 @foreach($topics as $key=>$topic)
                                 <tr>
                                        <!--end action-->
                                        <td>{{$key+1}}</td>
                                        <td>{{$topic->subject->course->department->department_name}}</td>
                                        <td>{{$topic->subject->course->course_name}}</td>
                                        <td>{{$topic->subject->subject_name}}</td>
                                        <td>{{$topic->topic_name}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewTopic{{$topic->id}}">View Topic Content</button>
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#update_topic{{$topic->id}}" href="#"> <i class="fa fa-edit las1"></i> Edit</a></li>
                                                    <div class="dropdown-divider"></div>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#delete_topic{{$topic->id}}" href="#"> <i class="fa fa-edit las2"></i> Archive</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        

                                        
                                        
                                 </tr>


                                 <!--update subject modal-->
                                    <div class="modal fade" id="update_topic{{$topic->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">UPDATE TOPIC</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminUpdateTopic')}}">
                                                    @csrf
                                                 <!-- /.card-header -->
                                                    <div class="card-body">
                                                            <div class="row">
                                                              <input type="text" name="id" value="{{$topic->id}}" class="form-control">
                                                            <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>SUBJECT<sup>*</sup></label>
                                                                        <select name="subject_id" class="form-control" required>
                                                                            <option value="{{$topic->subject->id}}">{{$topic->subject->subject_name}}</option>
                                                                            @foreach($subjects as $subject)
                                                                                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>TOPIC NAME<sup>*</sup></label>
                                                                        <input type="text"  name="topic_name"  class="form-control @error('topic_name') is-invalid @enderror"  value="{{$topic->topic_name}}" required>
                                                                        @error('topic_name')
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
                                                                            <textarea name="topic_content" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                                    {{$topic->topic_content}}
                                                                            </textarea>    
                                   
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
                                            <!-- /.modal-content -->
                                        </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                 <!--end delete modal-->



                                 <!--update subject modal-->
                                 <div class="modal fade" id="viewTopic{{$topic->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Topic Content</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminUpdateTopic')}}">
                                                    @csrf
                                                 <!-- /.card-header -->
                                                    <div class="card-body">
                                                            <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <textarea name="topic_content" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                                    {{$topic->topic_content}}
                                                                            </textarea>    
                                   
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                 <!--end delete modal-->





                                 <!--delete subject modal-->
                                 <div class="modal fade" id="delete_topic{{$topic->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title">Are you sure you want to achive this record ?</p>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('adminDeleteTopic')}}">
                                                @csrf
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="id" value="{{$topic->id}}" hidden="true">
                                                        </div>
                                                    </div>       
                                            </div>
                                            <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-trash"></i>DELETE</button>
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
<div class="modal  fade " id="modal-xl">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Add New Topic</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddTopic')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="row">

                    <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>SUBJECT<sup>*</sup></label>
                                <select name="subject_id" class="form-control" required>
                                    <option value="">SELECT..</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>TOPIC NAME<sup>*</sup></label>
                                <input type="text"  name="topic_name"  class="form-control @error('topic_name') is-invalid @enderror"  value="{{ old('topic_name') }}" required>
                                @error('topic_name')
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
                                  
                                    <textarea name="topic_content" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        
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