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
            <h5>My Assigments</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#"><span class="right badge badge-secondary">Go Back</span></a></li>-->
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Assignments</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<!--header section-->
<!--<section class="content">
    <div class="container-fliud">
        <div class="card">
            <div class="card-body">
            <center>
               
               <center><img src="{{asset('logo/logo1.jpeg')}}" alt="Logo" width="30%"></center>
               <p style="border-bottom:3px solid #000033">
              
                  Department : <b>{{$department->department_name}}</b>
                  Class Name : <b>{{$clas->clas_name}}</b><br>
                 
                
               </p>
           </center>
            </div>
        </div>
    </div>
</section>-->
<!--end of header section-->

<!--
<section class="content">
    <div class="containerfliud" style="padding-left:13px;padding-right:13px">
        <div class="row">
            <div class="col-sm-6">
                <div class="alert alert-success">
                    <h5> Total Assesment</h5>
                    
                </div>
            </div>
            <div class="col-sm-6">
                <div class="alert alert-info">
                    <h5>Avarage Score</h5>
                   
                </div>
            </div>
            
           
        </div>
    </div>
-->
                
             

</section>


       


    

<!-- Content Header (Page header) -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
             <div class="card">
               
                <div class="card-body">
                    <div class="table-responsive2">
                        <table class="table table-sm table-bordered table-striped" id="example1">
                            <thead>
                               <!--<th>Department</th>-->
                               <!--<th>Course</th>-->
                               <th>#</th>
                              <!--  <th>Class</th>-->
                               <!--<th>Exam Type</th>-->
                                <th>Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                               <!-- <th>Duration</th>-->
                                <th>Total Marks</th>
                                <th>Student Score</th>
                               <!-- <th>Total Score</th>-->
                                <!--<th>Exam Status</th>-->
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if(!empty($exams))
                                    @foreach($exams as $key=>$exam)
                                    <tr> 
                                           <!-- <td>{{$exam->department->department_name}}</td>-->
                                            <!--<td>{{$exam->course->course_name}}</td>-->
                                            <td>{{$key+1}}</td>
                                           <!-- <td>{{$exam->clas->clas_name}}</td>-->
                                           <!-- <td>{{$exam->exam_type}}</td>-->
                                            <td>{{$exam->exam_name}}</td>  
                                            <td>{{$exam->exam_start_date}}</td>  
                                            <td>{{$exam->exam_end_date}}</td>  
                                            <!--<td>{{$exam->exam_duration}}</td>-->
                                            <td>
                                                <?php
                                                    $totalMarks=StudentAssignmentQuestion::where('student_assignment_id',$exam->id)->sum('question_mark');
                                                    echo $totalMarks;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                   $totalMarks=StudentAssignmentQuestion::where('student_assignment_id',$exam->id)->sum('question_mark');
                                                   $studentScore=StudentAnswer::where('student_assignment_id',$exam->id)->where('user_id',$studentId)->sum('student_score');
                                                  ?>
                                                     
                                                     @if($studentScore==0)
                                                       <p style="color:blue">(Not Yet Attempted)</p>
                                                       @else
                                                       <p><b style="color:red">{{$studentScore}}/{{$totalMarks}}</b></p>
                                                     @endif
                                                  <?php
                                                ?>
                                            </td> 
                                            <!--<td>{{$exam->exam_total_score}}</td>--> 

                                            <!--<td>
                                                @if($exam->exam_status=="Published")
                                                    <span class="right badge badge-success">{{$exam->exam_status}}</span>
                                                @else
                                                    <span class="right badge badge-danger">{{$exam->exam_status}}</span>
                                                    
                                                @endif
                                                
                                            </td>-->
                                        
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
                                                        <li>
                                                            <a href="{{url('/traineeViewQuestions/'.$exam->id)}}" class="dropdown-item" >
                                                            <i class="fa fa-eye las2" aria-hidden="true"></i> View Questions
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </td>
                                    </tr>
 

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

@endsection

