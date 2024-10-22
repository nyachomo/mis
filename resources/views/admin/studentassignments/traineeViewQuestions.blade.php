@extends('layouts.master')
@section('content')
<?php
 use App\Models\StudentAnswer;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h5>Questions</h5>
            </div>
        
          <div class="col-sm-8">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('adminShowStudentAssignments')}}">Go Back</a></li>
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Questions</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--header section-->
<section class="content">
    <div class="container-fliud">
        <div class="card">
            <div class="card-body">
            <center>
               
               <center><img src="{{asset('logo/logo1.jpeg')}}" alt="Logo" width="30%"></center>
               <p style="border-bottom:3px solid #000033">
               @if(!empty($studentAssignment)) 
                  Assesment Name : <b>{{$studentAssignment->exam_name}}</b>
                  Department : <b>{{$studentAssignment->department->department_name}}</b>
                  Class Name : <b>{{$studentAssignment->clas->clas_name}}</b><br>
                  Course Name :<b>{{$studentAssignment->course->course_name}}</b>
                @endif
                
               </p>
           </center>
            </div>
        </div>
    </div>
</section>
<!--end of header section-->

@if(!empty($activeStudentAssignmentQuestions))
    @foreach($activeStudentAssignmentQuestions as $key=>$question)
    <section class="content">
        <div class="container-fliud">

            <div class="card">
                <div class="card-body">
                  <label>{{$key+1}} .<?php echo$question->question_name?> <b>({{$question->question_mark}}Mks)</b></label>
                  <textarea name="student_answer" class="question"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    <?php
                        $question_id=$question->id;
                       
                        $student_answer=StudentAnswer::where('student_assignment_question_id',$question_id)->where('user_id',$user_id)->first();
                        if(!empty($student_answer)){
                            echo$student_answer->student_answer;
                        }else{

                        } 
                    ?>
                 </textarea>
                    <p style="font-size:20px">
                        
                        <?php
                            $question_id=$question->id;
                           
                            $student_answer=StudentAnswer::with('studentassignmentquestion')->where('student_assignment_question_id',$question_id)->where('user_id',$user_id)->first();
                            if(!empty($student_answer)){
                                ?>
                                   My Score :<b style="color:red"> {{$student_answer->student_score}}/{{$student_answer->studentassignmentquestion->question_mark}}</b>
                                <?php
                            }else{
                                ?>
                                 My Score :<b style="color:red"> 0/{{$question->question_mark}}</b>
                               <?php
                            }
                        ?>
                       
                    </p>
                
                </div>
                <div class="card-footer" style="background0color:white;border:1px solid white">

                    <?php
                        $question_id=$question->id;
                        $student_answer=StudentAnswer::where('student_assignment_question_id',$question_id)->where('user_id',$user_id)->first();
                        if(!empty($student_answer)){
                            ?>
                                   
                                        <a href="#" class="btn btn-success" style="float:right" href="#" data-toggle="modal" data-target="#update_answer{{$question->id}}">
                                            <i class="fa fa-edit las3"></i> Update Your Answer
                                        </a>

                               
                            <?php
                        }else{
                            ?>
                               
                                    <a href="#" class="btn btn-secondary"  data-toggle="modal" data-target="#answer_question{{$question->id}}">
                                        <i class="fa fa-edit las1"></i> Answer Questions
                                    </a>
                              

                            <?php
                        } 
                    ?>

                </div>
            </div>

            <!--modals-->


            <!--add student modal-->
            <div class="modal  fade " id="answer_question{{$question->id}}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Update Questions</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form role="form" method="POST" action="{{route('traineeAnswerQuestions')}}">
                            @csrf
                            <!-- /.card-header -->
                            <div class="card-body">
                                
                               <!-- <label>Question id</label> -->
                                <input type="text" name="student_assignment_question_id" value="{{$question->id}}" hidden="true">
                               <!-- <lable>User id</label>-->
                                <input type="text" name="user_id" value="{{$user_id}}" hidden="true">
                                <input type="text" name="student_assignment_id" value="{{$studentAssignment->id}}" hidden="true">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><?php echo$question->question_name?> <b>({{$question->question_mark}}Mks) </b></label>
                                            <textarea name="student_answer" class="question"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                
                                            </textarea>
                                        </div>
                                    </div>
                                </div> 


                            </div>
                            <!-- /.card-body -->

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
            <!-- /.modal-dialog -->
            </div>
            <!--end add student modal-->

            <!--add student modal-->
            <div class="modal  fade " id="update_answer{{$question->id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Update Your Answer</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form role="form" method="POST" action="{{route('traineeUpdateAnswer')}}">
                        @csrf
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!--<label>Question id</label>-->
                            <input type="text" name="student_assignment_question_id" value="{{$question->id}}" hidden="true">
                            <!--<lable>User id</label>-->
                            <input type="text" name="user_id" value="{{$user_id}}" hidden="true">
                           
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>{{$key+1}}. <?php echo$question->question_name?> <b>({{$question->question_mark}}Mks) </b></label>
                                        <textarea name="student_answer" class="question"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            <?php
                                                $question_id=$question->id;
                                                $student_answer=StudentAnswer::where('student_assignment_question_id',$question_id)->where('user_id',$user_id)->first();
                                                if(!empty($student_answer)){
                                                    echo$student_answer->student_answer;
                                                }else{

                                                } 
                                            ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div> 


                        </div>
                        <!-- /.card-body -->

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                            <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
            <!--end add student modal-->

            <!--end modals-->
        </div>
    </section>  
    @endforeach
@endif


@endsection