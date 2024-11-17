@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(!empty($user))
            <h5>{{$user->course->course_name}} (Notes)</h5>
            @endif
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--<li class="breadcrumb-item"><a href="{{route('traineeViewAllCourses')}}">Courses</a></li>-->
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Notes</li>
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
        <div class="row">
          @if(!empty($user))
            
              

               <div class="col-sm-12">
                  <div class="card">
                      
                        <div class="card-body">
                           
                            <div class="row">
                              <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                  @if(!empty($user))
                                       <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Course Outline</a>
                                  @endif
                                  
                                  @if(!empty($notes))
                                    @foreach($notes as $key=>$note)
                                        <a class="nav-link" id="vert-tabs-profile-tab{{$note->id}}" data-toggle="pill" href="#vert-tabs-profile{{$note->id}}" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">{{$key+1}}. {{$note->subject_name}}</a>
                                    @endforeach
                                  @endif
                                  
                                </div>
                              </div>
                              <div class="col-7 col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                     <?php
                                        ?>
                                          @if(!empty($user))
                                              <?php echo$user->course->what_to_learn;?>
                                          @endif
                                        <?php
                                        
                                     ?>
                                  </div>

                                  @if(!empty($notes))
                                    @foreach($notes as $key=>$note)

                                      <div class="tab-pane fade" id="vert-tabs-profile{{$note->id}}" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                         <?php echo$note->subject_content;?>
                                      </div>

                                    @endforeach
                                  @endif

                                  
                                  
                                 
                                </div>
                              </div>
                            </div>
                            
                        </div>

                  </div>
               </div>




                 <!--Course Outline-->
                <div class="modal  fade " id="course_outline">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h6 class="modal-title">Course Outline </h6>
                              <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                  
                          </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                   <?php echo$user->course->what_to_learn;?>
                                    
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
                  <!--Course Outline-->






                   <!--Course Outline-->
                <div class="modal  fade " id="notes">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h3 class="modal-title">{{$user->course->course_name}}</h3>
                              <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                  
                          </div>


                          <div class="card-body">
                           
                            <div class="row">
                              <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                  @if(!empty($user))
                                       <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Course Outline</a>
                                  @endif
                                  
                                  @if(!empty($notes))
                                    @foreach($notes as $key=>$note)
                                        <a class="nav-link" id="vert-tabs-profile-tab{{$note->id}}" data-toggle="pill" href="#vert-tabs-profile{{$note->id}}" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">{{$key+1}}. {{$note->subject_name}}</a>
                                    @endforeach
                                  @endif
                                  
                                </div>
                              </div>
                              <div class="col-7 col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                     <?php
                                        ?>
                                          @if(!empty($user))
                                              <?php echo$user->course->what_to_learn;?>
                                          @endif
                                        <?php
                                        
                                     ?>
                                  </div>

                                  @if(!empty($notes))
                                    @foreach($notes as $key=>$note)

                                      <div class="tab-pane fade" id="vert-tabs-profile{{$note->id}}" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                         <?php echo$note->subject_content;?>
                                      </div>

                                    @endforeach
                                  @endif

                                  
                                  
                                 
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          <!-- /.card -->





                              <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                  
                              </div>
                        
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!--Course Outline-->






                      @endif
                    </div>
                </div>
                <!--End of course Outline-->


                


   



</section>
<!--end of second section-->



@endsection