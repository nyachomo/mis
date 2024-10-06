@extends('layouts.master')
@section('content')


<!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PROFILE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">HOME</a></li>
              <li class="breadcrumb-item active">STUDENT PROFILE</li>
            </ol>
          </div>
        </div>
      </div>
  </section>
<!--container-fluid -->

<!--section-->
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

              <!-- Profile Image -->
              <div class="card">
                <div class="card-body box-profile">
                  <div class="text-center">
                    
                    <img class="profile-user-img img-fluid img-circle"src="{{asset('uploads/images/'.$student->profile_image)}}">  
                  </div>

                  <h3 class="profile-username text-center">{{$student->name}}</h3>

                  

                  <table class="table table-striped">
                    <tr>
                        <td>Fullname</td>
                        <td>{{$student->student_fullname}}</td>
                    </tr>

                    <tr>
                        <td>Phonenumber</td>
                        <td>{{$student->phone}}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>{{$student->student_email}}</td>
                    </tr>

                    <tr>
                        <td>Course</td>
                            @if(!empty($course))
                              <td>{{$course->name}}</td>
                            @else
                              <td>NA</td>
                          @endif
                    </tr>

                  </table>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->



           
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Infromation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Update Password</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile Image</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                   
                    <!--update profile image-->
                      <div class="card" id="updatepersonalinfo">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h6 class="modal-title">
                                    Update personal Information
                              </h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            
                              <div class="modal-body">
                                

                                        <form role="form" method="POST" action="{{route('student.updateprofile')}}">
                                          @csrf
                                            <div class="row">

                                              <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                                              <input type="" class="form-control" value="{{$student->phone}}" name="old_phone" hidden="true">
                                              <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                  <label>Fullname</label>
                                                  <input type="text" name="name" value="{{$student->student_fullname}}" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                  @error('name')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror

                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                  <label>Phonenumber [2547xxx]</label>
                                                  <input type="number" value="{{$student->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                                  @error('phone')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror

                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-sm-6">

                                                <label>Email</label>
                                                <input type="email" value="{{$student->student_email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror


                                              </div>
                                              <div class="col-sm-6" style="padding-top:30px;">
                                                <button type="submit" class="btn btn-success" style="width:100%">Update</button>
                                              </div>
                                            </div>
                                        </form>


                              </div>

                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    <!--studentskills-->





                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                 


                      <!--update profile image-->
                        <div class="card">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title">
                                  UPDATE PASSWORD
                                </h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              
                                <div class="modal-body">
                                  

                                    <form role="form" method="POST" action="{{route('student.updatepassword')}}">
                                    @csrf
                                      <div class="row">

                                        <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                                        <input type="" class="form-control" value="{{$student->phone}}" name="old_phone" hidden="true">
                                        
                                        <div class="col-sm-12">
                                          <div class="form-group">
                                            <label>NEW PASSWORD</label>
                                            <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                          </div>
                                        </div>

                                      </div>
                                    
                                  

                                </div>

                                <div class="modal-footer justify-content-between">
                                  
                                    <button type="submit" class="btn btn-success" style="width:100%"><i class="las la-edit las3"></i>UPDATE</button>
                                  
                                </div>
                                </form>
                              
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                      <!--studentskills-->





                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                       
                        <!--update profile image-->
                        <div class="card">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title">
                                    UPDATE PROFILE IMAGE
                                </h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              
                                <div class="modal-body">
                                  

                                    <form role="form" method="POST" action="{{route('student.updateprofileimage')}}" enctype="multipart/form-data">
                                      @csrf
                                      <div class="card-body">
                                        <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                                        
                                        <div class="form-group">
                                          <label for="exampleInputFile">CHOOSE PROFILE IMAGE</label>
                                          <div class="input-group">
                                            <div class="custom-file">
                                              <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror"  value="{{ old('profile_image') }}" required autocomplete="profile_image" autofocus>
                                              
                                              @error('profile_image')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror

                                            </div>
                                            <div class="input-group-append">
                                              <button type="submit" name="submit" class="btn btn-secondary">UPLOAD</button>
                                            </div>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      <!-- /.card-body -->

                                    </form>



                                </div>

                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
                                  
                                </div>
                              
                              
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!--studentskills-->

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<!--section-->

 

<!--profession summary modal-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
         ADD PROFESSIONAL SUMMARY
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('addStudentProfessionalSummary')}}">
        @csrf
        <div class="modal-body">
          <input type="text" name="student_id" value="{{$student->id}}" class="form-control">
          <label>PROFESSIONAL SUMMARY</label>
          <textarea class="form-control" name="professional_summary" required></textarea>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
          <button type="submit" class="btn btn-success"> <i class="las la-plus"></i>ADD</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end of professional summary modal-->

<!--student skills-->
<div class="modal fade" id="addSkill">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
        <i class="las la-plus"></i> ADD SKILL
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('studentAddSkill')}}">
        @csrf
        <div class="modal-body">
          <input type="text" name="student_id" value="{{$student->id}}" class="form-control" hidden="true">
          <label>ADD SKILL</label>
          <input type="text" class="form-control" name="student_skills" required>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
          <button type="submit" class="btn btn-success"> <i class="las la-plus"></i>ADD</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->


<!--update profile image-->
<div class="modal fade" id="updateprofileimage">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
            UPDATE PROFILE IMAGE
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
          

            <form role="form" method="POST" action="{{route('student.updateprofileimage')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                
                <div class="form-group">
                  <label for="exampleInputFile">CHOOSE PROFILE IMAGE</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror"  value="{{ old('profile_image') }}" required autocomplete="profile_image" autofocus>
                      
                      @error('profile_image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    </div>
                    <div class="input-group-append">
                      <button type="submit" name="submit" class="btn btn-secondary">UPLOAD</button>
                    </div>
                  </div>
                </div>
                
              </div>
              <!-- /.card-body -->

            </form>



        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i> CLOSE</button>
          
        </div>
       
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->

<!--update profile image-->
<div class="modal fade" id="updatepassword">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
           UPDATE PASSWORD
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
          

            <form role="form" method="POST" action="{{route('student.updatepassword')}}">
            @csrf
              <div class="row">

                <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                <input type="" class="form-control" value="{{$student->phone}}" name="old_phone" hidden="true">
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>NEW PASSWORD</label>
                    <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>
                </div>

                <div class="col-sm-6" style="padding-top:30px;">
                  <button type="submit" class="btn btn-success" style="width:100%"><i class="las la-edit las3"></i>UPDATE</button>
                </div>


                

              </div>
            
            </form>

        </div>

        <div class="modal-footer justify-content-between">
          
           <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
          
        </div>
       
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->

<!--update profile image-->
<div class="modal fade" id="updatepersonalinfo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
         Update personal Information
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
          

                 <form role="form" method="POST" action="{{route('student.updateprofile')}}">
                    @csrf
                      <div class="row">

                        <input type="" class="form-control" value="{{$student->id}}" name="id" hidden="true">
                        <input type="" class="form-control" value="{{$student->phone}}" name="old_phone" hidden="true">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="name" value="{{$student->name}}" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Phonenumber [2547xxx]</label>
                            <input type="number" value="{{$student->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">

                          <label>Email</label>
                          <input type="email" value="{{$student->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror


                        </div>
                        <div class="col-sm-6" style="padding-top:30px;">
                          <button type="submit" class="btn btn-success" style="width:100%">Update</button>
                        </div>
                      </div>
                  </form>


        </div>

        <div class="modal-footer justify-content-between">
          
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
          
        </div>
       
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->

@endsection