@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(!empty($user))
            <h5>{{$user->course->course_name}} (Course Outline)</h5>
            @endif
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--<li class="breadcrumb-item"><a href="{{route('traineeViewAllCourses')}}">Courses</a></li>-->
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Course Outline</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

 <!--<section class="content" style="padding-left:22px">
 <div class="container-fliud">
    <div class="row">

    <div class="col-sm-6">
        <div class="alert alert-success alert-dismissible">
            <h5><b>Course Outline</b></h5>
            <b><a href="#" data-toggle="modal" data-target="#course_outline" style="color:black">View</a></b>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="alert alert-danger alert-dismissible">
            <h5><b>Notes</b> </h5>
            <b><a href="#" data-toggle="modal" data-target="#notes" style="color:black">View</a></b>
        </div>
    </div>
   
    </div>
 </div>
</section>-->


<!--second section-->
<section class="content">
    <div class="container-fliud">
       
          @if(!empty($user))
            
               <div class="col-sm-12">
                  <div class="card">
                        <div class="card-body"> 
                            <?php echo$user->course->what_to_learn?>
                        </div>
                  </div>
               </div>
            @endif
    </div> 


   



</section>
<!--end of second section-->



@endsection