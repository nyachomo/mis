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
                  
                    
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-stripped" id="example1">
                        <thead>
                            <th>NO</th>
                            <th>QUESTION</th>
                            <th>MARKS</th>
                            <th>Your Answer</th>
                           
                        </thead>
                        <tbody>
                              @if($questions->count()>0)
                                 @foreach($questions as $key=>$question)
                                 <tr>
                                        <td>{{$key+1}}</td>
                                        <td> <?php echo$question->question_name?> </td>
                                        <td>{{$question->question_mark}}</td> 
                                        <td>
                                            <textarea class="addTopic"> </textarea>
                                            <button class="btn btn-block btn-xs btn-success">
                                                <i class="fa fa-send"></i>Submit Answer
                                            </button> 
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