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
            <h5>Exam Attempts</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#"><span class="right badge badge-secondary">Go Back</span></a></li>-->
               <li class="breadcrumb-item"><a href="{{route('adminShowStudentAssignments')}}">Go Back</a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Attempts</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--section>-->
    <section class="content">
         <div class="container-fluid">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table>
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phonenumber</th>
                            <th>Delete User</th>
                            <th>Score</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if(!empty($studentAttempts))

                                @foreach($studentAttempts as $key=>$attempt)
                                   <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$attempt->user->user_firstname}} {{$attempt->user->user_secondname}} {{$attempt->user->user_surname}}</td>
                                      <td>{{$attempt->user->email}}</td>
                                      <td>{{$attempt->user->user_phonenumber}}</td>
                                      <td>
                                         <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteStudent{{$attempt->id}}">Delete User</button>
                                      </td>
                                      <td>
                                         <?php
                                             $user_id=$attempt->user_id;
                                             $student_assignment_id=$attempt->student_assignment_id;
                                             $totalMarks=StudentAssignmentQuestion::where('student_assignment_id',$student_assignment_id)->sum('question_mark');
                                             $studentMarks=StudentAnswer::where('student_assignment_id',$student_assignment_id)->where('user_id',$user_id)->sum('student_score');
                                            ?>
                                              {{$studentMarks}}/{{$totalMarks}}
                                            <?php
                                         ?>
                                        
                                      </td>
                                      <td>
                                        <!--<a href="{{url('/adminViewStudentAnswers/'.$attempt->user_id)}}"class="btn btn-sm btn-success"><i class="fa fa-eye"></i>View Answers</a>-->

                                        <a href="{{ url('/adminViewStudentAnswers/' . $attempt->user_id . '/' . $attempt->student_assignment_id) }}"class="btn btn-sm btn-success"><i class="fa fa-eye"></i>View Answers</a>
                                      </td>

                                      <td>
                                          <form method="POST" action="{{route('deleteStudentAttempt')}}">
                                            @csrf
                                              <lavel>User_id</label> 
                                              <input type="text" name="user_id" value="{{$attempt->user_id}}">

                                              <lavel>Assignment_id</label> 
                                              <input type="text" name="student_assignment_id" value="{{$attempt->student_assignment_id}}">
                                              <button type="submit">Delete</button>
                                          </form>
                                      </td>
                                   </tr>





                                    





                                @endforeach

                            @endif
                        </tbody>
                    </table>
                    
                </div>
            </div>
         </div>
    </section>
<!--endsection>-->
@endsection