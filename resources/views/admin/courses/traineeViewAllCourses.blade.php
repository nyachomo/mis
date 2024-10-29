@extends('layouts.master')
@section('content')
<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Courses</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->
@if (session('success'))
      <section class="content">
          <div class="container-fliud">


          <div class="alert alert-success alert-dismissible">
              <h6> <i class="icon fas fa-info"></i> <b>Success</b></h6>
                    {{ session('success') }}
          </div>

          </div>
      </section>
  @endif

<!--second section-->
<section class="content">
    <div class="container-fliud">
        <div class="row">
          @if(!empty($courses))
             @foreach($courses as $course)

               <div class="col-sm-3">
                   <div class="card">
                     
                      <img class="card-img-top" src="{{ asset('uploads/course_images/' . $course->course_image) }}">
                     
                       <div class="card-body">
                         <h6>{{$course->course_name}}</h6>
                         <p>{{$course->course_intoduction_text}}</p>
                         <br>
                          <div class="row">
                             <div class="col-sm-6">
                             <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$course->course_one_like}}
                             </div>
                             <div class="col-sm-6">
                             <i class="fa fa-graduation-cap" aria-hidden="true"></i> {{$course->course_leaners_already_enrolled}} 
                             </div>
                          </div>

                          <div class="row">
                             <div class="col-sm-6">
                             <i class="fa fa-clock-o" aria-hidden="true"></i> {{$course->course_duration}} (Months)
                             </div>
                             <div class="col-sm-6">
                             <i class="fa fa-money" aria-hidden="true"></i> Ksh {{$course->course_price}}
                             </div>
                          </div>
                        
                       </div>

                       <div class="modal-footer justify-content-between">
                        <a  href="/traineeViewMoreCourseInfo/{{$course->id}}" class="btn btn-secondary">More Info</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#enrolment{{$course->id}}"><i class="las la-times"></i>Apply</button>
                      </div>

                   </div>
                  

               </div>

                 <!--add student modal-->
                <div class="modal  fade " id="enrolment{{$course->id}}">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Course Enrollment Request</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form role="form" method="POST" action="{{route('sendEnrollmentRequest')}}">
                            @csrf
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="alert alert-success alert-dismissible">
                                
                                    <h5> <b>Alert !</b></h5>
                                    <p>You are about to enroll for {{$course->course_name}} course which takes a learning period of {{$course->course_duration}} (Months). If your request is approved, a debit of Ksh {{$course->course_price}} will be added to your fee structure</p>
                                

                                </div>
                                    
                            </div>
                            <!-- /.card-body -->

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Send Request</button>
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
        </div>
    </div>

</section>
<!--end of second section-->

@endsection