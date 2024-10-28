@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>{{$course->course_name}}</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('traineeViewAllCourses')}}">Courses</a></li>
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Courses</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!--second section-->
<section class="content">
    <div class="container-fliud">
        <div class="row">
          @if(!empty($course))
            
               <div class="col-sm-4">
                   <div class="card">
                     
                      <img class="card-img-top" src="{{asset('images/alison.jpg')}}" src="..." alt="Card image cap">
                     
                       <div class="card-body">
                         <h6>{{$course->course_name}}</h6>
                        
                          <div class="row">
                             <div class="col-sm-12">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i> {{$course->course_leaners_already_enrolled}} Already Enrolled
                             </div>
                          </div>

                          <div class="alert alert-success alert-dismissible">

                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$course->course_one_like}}
                                </div>
                                <div class="col-sm-8">
                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> {{$course->course_not_interested}} Not interested
                                </div>
                            </div>

                          </div>
                          

                          <div class="row">
                              <div class="col-sm-12">
                                  <h6>This course include:</h6>
                                  <ul>
                                      <li>1. {{$course->course_duration}}  Months of learning</li>
                                      <li>2. Final Assesment</li> 
                                      <li>3. Certification upon completion</li> 
                                  </ul>
                              </div>
                          </div>
                        
                       </div>

                       <div class="modal-footer justify-content-between">
                       <a  href="{{route('traineeViewAllCourses')}}" class="btn btn-secondary">Back</a>
                        <button type="button" class="btn btn-success" width="100%" data-toggle="modal" data-target="#enrolment{{$course->id}}"><i class="las la-times"></i>Apply</button>
                      </div>

                   </div>
                  

               </div>

               <div class="col-sm-8">
                  <div class="card">
                      <div class="card-body">
                          <h5>{{$course->course_name}}</h5>
                          <p>
                             <b>{{$course->course_intoduction_text}}</b>
                          </p>
                          <p>{{$course->course_description}}</p>
                          <h5>In this course, you will learn how to</h5>
                          <div class="alert alert-success alert-dismissible">
                            <?php echo$course->what_to_learn;?>
                          </div>
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
                            <form role="form" method="POST" action="">
                                @csrf
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="alert alert-success alert-dismissible">
                                    
                                        <h5> <b>Payment Guideline</b></h5>
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
                    </div>
                </div>
                <!--end add student modal-->



            
          @endif
        </div>
    </div>

</section>
<!--end of second section-->

@endsection