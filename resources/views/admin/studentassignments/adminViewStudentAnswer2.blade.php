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

@if(!empty($studentAnswers))
    @foreach($studentAnswers as $key=>$studentanswer)
    <section class="content">
        <div class="container-fliud">

        <form method="post" action="{{route('adminAwardTraineeMark')}}">
        @csrf
            <div class="card">
            
                <div class="card-body">
                  <label>{{$key+1}}. <?php echo$studentanswer->studentassignmentquestion->question_name;?> (<?php echo$studentanswer->studentassignmentquestion->question_mark;?>Mks)</label>
                  <textarea name="student_answer"  class="question" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    <?php echo$studentanswer->student_answer;?>
                 </textarea>
                </div>
                <div class="card-footer" style="border:1px solid white !important;background-color:white">
                    <div class="row">
                        <div class="col-sm-6">
                           
                            @if(!empty($studentanswer->student_score))
                            <label>Score {{$studentanswer->student_score}}/{{$studentanswer->studentassignmentquestion->question_mark}}</label>
                            <input type="number" class="form-control" min="0" max="{{$studentanswer->studentassignmentquestion->question_mark}}" value="{{$studentanswer->student_score}}" name="student_score">
                            @else
                            <label>Score 0/{{$studentanswer->studentassignmentquestion->question_mark}}</label>
                            <input type="number" class="form-control" value="0" min="0" max="{{$studentanswer->studentassignmentquestion->question_mark}}" name="student_score">
                            @endif
                            
                             <input type="text" name="id" value="{{$studentanswer->id}}" class="form-control" hidden="true">
                        </div>
                        <div class="col-sm-6" style="padding-top:35px">
                           
                            <button type="submit" class="btn btn-sm btn-success" style="width:100%">Save</button>
                        </div>
                    </div>
                    
                </div>
               
            </div>
            </form>

           
        </div>
    </section>  
    @endforeach
@endif


@endsection