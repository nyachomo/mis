@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('adminShowStudentAssignments')}}"><span class="right badge badge-secondary">Go Back</span></a></li>
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Assesment</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--Student-->

<section class="content">
    <div class="container-fliud">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-sm-6">
                    <table>
                         <tr>
                            <td>Student Name:</td>
                            <td> {{$user->user_firstname}} {{$user->user_secondname}} {{$user->user_surname}}</td>
                         </tr>

                         <tr>
                             <td>Department:</td>
                             <td>{{$user->department->department_name}}</td>
                         </tr>

                         <tr>
                              <td> Class: </td>
                              <td> {{$user->clas->clas_name}}</td>
                         </tr>

                         <tr>
                             <td> Score:</td>
                             <td>{{$totalScore}}/{{$totalMarks}}</td>
                         </tr>
                    </table>
                    
                  </div>

                  <div class="col-sm-6">
                    <p>Score: M/N</p>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>
<!--end of student-->


<section class="content">
    <div class="container-fliud">
        <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-sm-12">
                    <table>
                         <thead>
                             <th>ID</th>
                             <th>Question </th>
                             <th>Answer</th>
                             <th>Student Answer</th>
                             <th>Student Score</th>
                             <th>Action</th>
                         </thead>
                         <tbody>

                            @if(!empty($studentAnswers))
                                  @foreach($studentAnswers as $key=>$studentanswer)
                                  <tr>
                                      <td>{{$studentanswer->id}}</td>
                                      <td><?php echo$studentanswer->studentassignmentquestion->question_name;?> (<?php echo$studentanswer->studentassignmentquestion->question_mark;?>Mks)</td>
                                      <td><?php echo$studentanswer->studentassignmentquestion->question_answer;?></td>
                                      <td>{{$studentanswer->student_answer}}</td>
                                      <td>{{$studentanswer->student_score}}</td>
                                      <td>
                                           <form method="POST" action="{{route('deleteStudentAttemptQuestions')}}">
                                              @csrf
                                              <input type="text" name="id" value="{{$studentanswer->id}}">
                                              <button type="submit" class="btn btn-danger">Delete</button>
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
        </div>
    </div>
</section>
<!--end of student-->






@endsection