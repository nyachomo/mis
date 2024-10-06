@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(!empty($studentfinalExam))
             <h4>Questions for: {{$studentfinalExam->exam_name}}</h4>
            @else
          
            @endif
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><span class="right badge badge-secondary">Go Back</span></a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Student FinalExams Questions</li>
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
                        <div class="col-sm-6" style="border-right:1px solid red">
                            @if(!empty($studentfinalExam))
                            <ol>
                                <li><i class="fa fa-bookmark-o" aria-hidden="true"></i>  <b>Exam Name </b>: {{$studentfinalExam->exam_name}}</li>
                                <li> <b>Department </b>: {{$studentfinalExam->department->department_name}}</li>
                                <li> <b>Course Name </b> : {{$studentfinalExam->course->course_name}}</li>
                                <li> <b>Class Name </b>: {{$studentfinalExam->clas->clas_name}}</li>

                            </ol>
                            @else
                            @endif
                            
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="btn-group1">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNewQuestionModal"><i class="las la-plus"></i>ADD NEW QUESTION</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#archivedQuestionModal"> {{$archivedStudentFinalExamQuestions->count()}} ARCHIVED QUESTIONS </button>
                               
                                
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Export Questions
                                    </button>
                                    <div class="dropdown-menu" style="padding-left:10px">
                                       
                                        <form method="post" action="{{route('adminExportStudentFinalExamQuestionsAsPdf')}}">
                                            @csrf
                                            <input type="text" name="exam_id" value="{{$studentfinalExam->id}}" hidden="true">
                                            <button type="submit" name="submit" class="btn btn-primary">Export As Pdf</button>
                                        </form>
                                    </div>
                                </div>

                                <br><br>
                                    <ol>
                                        <li>Active Questions: {{$activestudentfinalexamquestions->count()}}</li>
                                        <li>Total Marks:  {{$studentfinalExam->exam_total_score}}</li>
                                        <li>Added Marks:  {{$totalQuestionMarks}} </li>
                                    </ol>

                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-stripped" id="example1">
                            <thead>
                            
                                <th>NO</th>
                                <th>QUESTION</th>
                                <th>ANSWER</th>
                                <th>MARK</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                               @if(!empty($activestudentfinalexamquestions))
                                  @foreach($activestudentfinalexamquestions as $key=>$question)
                                      <tr>
                                           <td>{{$key+1}}</td>
                                           <td> <?php echo$question->question_name?> </td>
                                           <td> <?php echo$question->question_answer?> </td>
                                           <td>{{$question->question_mark}}</td>
                                           <td> <span class="right badge badge-success">{{$question->question_status}}</span></td>
                                           <td>

                                                <div class="dropdown">
                                                    <button class="btn btn-sm lightColor btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><center><a href="#" class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                       
                                                        <li>
                                                            <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#update_question{{$question->id}}">
                                                                <i class="las la-edit las1"></i> UPDATE QUESTION
                                                            </a>
                                                        </li>
                                                        <div class="dropdown-divider"></div>

                                                        <li>
                                                            <a href="#" class="dropdown-item" href="#" data-toggle="modal" data-target="#archive_question{{$question->id}}">
                                                                <i class="las la-trash las3"></i> ARCHIVED QUESTION
                                                            </a>

                                                        </li>
                                                        
                                                    </ul>
                                                </div>

                                            </td>
                                           
                                      </tr>


                                    <!--add student modal-->
                                    <div class="modal  fade " id="update_question{{$question->id}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">UPDATE QUESTIONS</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form role="form" method="POST" action="{{route('adminUpdateStudentFinalExamQuestions')}}">
                                                @csrf
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <input type="text" name="id" value="{{$question->id}}">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Question</label>
                                                                <textarea name="question_name" class="question"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                     <?php echo$question->question_name?> 
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div> 

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Answer</label>
                                                                <textarea name="question_answer" class="answer"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                      <?php echo$question->question_answer?>
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div> 

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Mark</label>
                                                                <input type="number" name="question_mark" class="form-control" min="1" max="100" value="{{$question->question_mark}}">
                                                            </div>
                                                        </div>
                                                    </div> 

                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                    <button type="submit" class="btn btn-success"><i class="las la-plus"></i>SAVE</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                    <!--end add student modal-->


                                     <!--add student modal-->
                                     <div class="modal  fade " id="archive_question{{$question->id}}">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Are you sure you want to archived this record</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminArchiveStudentFinalExamQuestions')}}">
                                                    @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <input type="text" name="id" value="{{$question->id}}" class="form-control" hidden="true">
                                                        <p>This action can not be undone</p>

                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!--end add student modal-->



                                  @endforeach
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
<div class="modal  fade " id="addNewQuestionModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ADD NEW QUESTION</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddStudentFinalExamQuestions')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row" hidden="true">
                    <div class="col-sm-4">
                         <input type="text" name="student_final_exam_id" value="{{$studentfinalExam->id}}">
                    </div>
                    <div class="col-sm-4">
                         <input type="text" name="department_id" value="{{$studentfinalExam->department_id}}">
                    </div>
                    <div class="col-sm-4">
                         <input type="text" name="course_id" value="{{$studentfinalExam->course_id}}">
                    </div>

                    <div class="col-sm-4">
                         <input type="text" name="clas_id" value="{{$studentfinalExam->clas_id}}">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Question</label>
                            <textarea name="question_name" class="question"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> </textarea>
                        </div>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Answer</label>
                            <textarea name="question_answer" class="answer"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> </textarea>
                        </div>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Mark</label>
                             <input type="number" name="question_mark" class="form-control" min="1" max="100">
                        </div>
                    </div>
                </div> 

            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>SAVE</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->



<!--add student modal-->
<div class="modal  fade " id="archivedQuestionModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">ARCHIVED QUESTIONS</h6>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
        </div>
       
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-stripped" id="example1">
                            <thead>
                            
                                <th>NO</th>
                                <th>QUESTION</th>
                                <th>ANSWER</th>
                                <th>MARK</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                               @if(!empty($archivedStudentFinalExamQuestions))
                                  @foreach($archivedStudentFinalExamQuestions as $key=>$question)
                                      <tr>
                                           <td>{{$key+1}}</td>
                                           <td> <?php echo$question->question_name?> </td>
                                           <td> <?php echo$question->question_answer?> </td>
                                           <td>{{$question->question_mark}}</td>
                                           <td> 
                                                 <span class="right badge badge-danger">{{$question->question_status}}</span>
                                           </td>
                                           <td>
                                               <form method="post" action="{{route('adminRecoverStudentFinalExamQuestions')}}">
                                                  @csrf
                                                  <input type="text" name="id" value="{{$question->id}}" class="form-control" hidden="true">
                                                  <button type="submit" name="submit"  class="btn btn-success">Recover</button>
                                               </form>
                                           </td>
                                           
                                      </tr>

                                  @endforeach
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

@endsection