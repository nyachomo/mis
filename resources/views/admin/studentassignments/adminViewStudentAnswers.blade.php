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
                <center><h4>Student Name</h4></center>
            </div>
        </div>
    </div>
</section>
<!--end of student-->

@if(!empty($studentAnswers))
    @foreach($studentAnswers as $key=>$studentanswer)
    <section class="content">
        <div class="container-fliud">

            <div class="card">
                <div class="card-body">
                  <label>{{$key+1}}. <?php echo$studentanswer->studentassignmentquestion->question_name;?> (<?php echo$studentanswer->studentassignmentquestion->question_mark;?>Mks)</label>
                  <textarea name="student_answer"  class="question" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    <?php echo$studentanswer->student_answer?>
                 </textarea>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6">
                             <input type="number" class="form-control" min="0" value="0" >
                             <input type="text" name="id" value="{{$studentanswer->id}}" class="form-control" hidden="true">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-sm btn-success" style="width:100%">Save</button>
                        </div>
                    </div>
                    
                </div>
               
            </div>

           
        </div>
    </section>  
    @endforeach
@endif


@endsection