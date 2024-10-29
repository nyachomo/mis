@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(!empty($user))
            <h5>{{$user->course->course_name}}</h5>
            @endif
           
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
          @if(!empty($user))
            
               <div class="col-sm-4">
                   <div class="card">
                     
                   <img class="card-img-top" src="{{ asset('uploads/course_images/' . $user->course->course_image) }}">
                     
                       <div class="card-body">
                         <h6>{{$user->course->course_name}}</h6>
                        
                          <div class="row">
                             <div class="col-sm-12">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i> {{$user->course->course_leaners_already_enrolled}} Already Enrolled
                             </div>
                          </div>

                          <div class="alert alert-success alert-dismissible">

                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$user->course->course_one_like}}
                                </div>
                                <div class="col-sm-8">
                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> {{$user->course->course_not_interested}} Not interested
                                </div>
                            </div>

                          </div>
                          

                          <div class="row">
                              <div class="col-sm-12">
                                  <h6>This course include:</h6>
                                  <ul>
                                      <li>1. {{$user->course->course_duration}}  Months of learning</li>
                                      <li>2. Final Assesment</li> 
                                      <li>3. Certification upon completion</li> 
                                  </ul>
                              </div>
                          </div>
                        
                       </div>

                       <div class="modal-footer justify-content-between">
                       <a  href="{{route('traineeViewAllCourses')}}" class="btn btn-secondary">Back</a>
                       
                      </div>

                   </div>
                  

               </div>

               <div class="col-sm-8">
                  <div class="card">
                      <div class="card-body">
                          <h5>{{$user->course->course_name}}</h5>
                          <p>
                             <b>{{$user->course->course_intoduction_text}}</b>
                          </p>
                          <p>{{$user->course->course_description}}</p>
                          <h5>In this course, you will learn how to</h5>
                          <div class="alert alert-success alert-dismissible">
                             <?php echo$user->course->what_to_learn;?>
                          </div>
                      </div>
                  </div>
               </div>


          @endif
        </div>
    </div>

</section>
<!--end of second section-->

@endsection