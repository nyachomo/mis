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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
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
                        <div class="col-sm-6">
                            <table class="table table-sm table-stripped table-bordered">
                                 <tr>
                                    <td>COURSE NAME</td>
                                    <td>{{$course->name}}</td>
                                 </tr>

                                 <tr>
                                    <td>EXAM NAME</td>
                                    <td>{{$exam->exam_name}}</td>
                                 </tr>

                                 <tr>
                                    <td>TOTAL SCORE</td>
                                    <td>{{$exam->exam_total_score}}</td>
                                 </tr>

                                 <tr>
                                    <td>TOTAL QUESTIONS</td>
                                    <td>{{$exam->exam_total_score}}</td>
                                 </tr>

                                 <tr>
                                    <td>TOTAL ATTEMPTS</td>
                                    <td>{{$exam->exam_total_score}}</td>
                                 </tr>

                            </table>
                        </div>

                        <div class="col-sm-6">

                            <div class="btn-group">
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_new_question"><i class="las la-plus"></i>ADD NEW QUESTION</button>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-xl"><i class="las la-plus"></i>ARCHIVED</button>
                                <button class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-xl"><i class="las la-plus"></i>DOWNLOAD</button>
                            </div>

                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-stripped" id="example1">
                        <thead>
                            <th>NO</th>
                            <th>QUESTION</th>
                            <th>ANSWER</th>
                            <th>MARKS</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                              @if($questions->count()>0)
                                 @foreach($questions as $key=>$question)
                                 <tr>
                                        <td>{{$key+1}}</td>
                                        <td> <?php echo$question->question_name?> </td>
                                        <td> <?php echo$question->question_answer?> </td>
                                        <td>{{$question->question_mark}}</td> 
                                        <td>
                                              <button type="button" class="btn btn-xs btn-block btn-outline-success" data-toggle="modal" data-target="#edit_question{{$question->id}}"><i class="las la-edit"></i>Edit</button>
                                              <button type="button" class="btn btn-xs btn-block btn-outline-danger" data-toggle="modal" data-target="#delete_question{{$question->id}}"><i class="las la-edit"></i>Delete</button>
                                        </td>
                                 </tr>



                                <!--add student modal-->
                                <div class="modal  fade " id="edit_question{{$question->id}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">UPDATE QUESTIONS</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form method="POST" action="{{route('adminUpdateQuestions')}}">
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                        <input type="text" name="id" class="form-control" value="{{$question->id}}">
                                                        <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" >QUESTION</label>
                                                                    
                                                                        <textarea name="question_name"  class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                          {{$question->question_name}}
                                                                        </textarea> 
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label" >ANSWER</label>
                                                                    
                                                                        <textarea name="question_answer" required class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                             {{$question->question_answer}}
                                                                        </textarea> 
                                                                    </div>
                                                                </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>MARK</label>
                                                                    <input type="number" name="question_mark"  class="form-control" min="1" max="100" value="{{$question->question_mark}}" required>
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
                                </div>
                                <!--end add student modal-->


                                 <!--add student modal-->
                                 <div class="modal  fade " id="delete_question{{$question->id}}">
                                    <div class="modal-dialog xs">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">You are about to delete this record ?</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form method="POST" action="{{route('adminDeleteQuestions')}}">
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                        <input type="text" name="id" class="form-control" value="{{$question->id}}" hidden="true">
                                                        <p>Proceed and Click delete</p>
                                                       
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-trash"></i>DELETE</button>
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
</section>
<!-- /.container-fluid -->

<!--add student modal-->
<div class="modal  fade " id="add_new_question">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">ADD NEW QUESTION</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="{{route('adminAddQuestions')}}">
                @csrf
                <!-- /.card-header -->
                <div class="card-body">
                        
                        

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>COURSE</label>
                                    <input type="text" name="course_id" value="{{$course_id}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>EXAM <sup>*</sup></label>
                                    <input type="text" name="exam_id" value="{{$exam_id}}" class="form-control">
                                    
                                </div>
                            </div>
                        </div>  

                        
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label" >QUESTION</label>
                                    
                                        <textarea name="question_name" required class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                           
                                        </textarea> 
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label" >ANSWER</label>
                                    
                                        <textarea name="question_answer" required class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                           
                                        </textarea> 
                                    </div>
                                </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>MARK</label>
                                    <input type="number" name="question_mark"  class="form-control" min="1" max="100" required>
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