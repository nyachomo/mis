@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Profile Management</li>
            </ol>
          </div>
        </div>
      </div>
</section>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div>{{ session('status') }}</div>
@endif

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @auth
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('uploads/images/'.Auth::user()->user_picture)}}">
                  @else
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('uploads/images/prifile.png')}}">
                  @endauth
                       
                </div>

                <h3 class="profile-username text-center">
                    @auth
                         {{Auth::user()->user_firstname}} {{Auth::user()->user_secondname}} {{Auth::user()->user_surname}}
                    @else
                    @endauth
                </h3>
                <table class="table table-striped table-hover">
                    <tr>
                        <td>Name</td>
                        <td>
                             @auth
                               {{Auth::user()->user_firstname}} {{Auth::user()->user_secondname}} {{Auth::user()->user_surname}}
                             @else
                             NA
                             @endauth
                            
                        </td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>
                             @auth
                               {{Auth::user()->email}}
                             @else
                             NA
                             @endauth
                            
                        </td>
                    </tr>

                    <tr>
                        <td>Phonenumber</td>
                        <td>
                             @auth
                               {{Auth::user()->user_phonenumber}}
                             @else
                             NA
                             @endauth
                            
                        </td>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Profile Picture</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                      @auth
                      <form class="form-horizontal" method="POST" action="{{route('adminUpdateUsers')}}">
                        @csrf
                        <input type="text" name="id" value="{{Auth::user()->id}}" hidden="true">

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Firstname</label>
                            <div class="col-sm-9">
                            <input type="text" name="user_firstname" class="form-control" value="{{Auth::user()->user_firstname}}" min="3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Secondname</label>
                            <div class="col-sm-9">
                                  <input type="text" name="user_secondname" class="form-control"  value="{{Auth::user()->user_secondname}}" min="3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Surname</label>
                            <div class="col-sm-9">
                                  <input type="text" name="user_surname" class="form-control" value="{{Auth::user()->user_surname}}" min="3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                  <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" min="3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Phonenumber</label>
                            <div class="col-sm-9">
                            <input type="number" name="user_phonenumber" class="form-control" value="{{Auth::user()->user_phonenumber}}" min="3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>


                      </form>
                      @else
                      @endauth
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">


                    @auth
                      <form class="form-horizontal" method="POST" action="{{route('adminUpdateUserPassword')}}">
                        @csrf
                        <input type="text" name="id" value="{{Auth::user()->id}}" hidden="true">

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Old Password</label>
                            <div class="col-sm-9">
                            <input type="password" name="old_password" class="form-control"  min="3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                  <input type="password" name="new_password" class="form-control" min="3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Confirm New Password</label>
                            <div class="col-sm-9">
                                  <input type="password" name="confirm_new_password" class="form-control"   min="3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>



                      </form>
                    @else
                    @endauth

                      
                   
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">

                  @auth
                      <form class="form-horizontal" method="POST" action="{{route('adminUpdateUserPicture')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{Auth::user()->id}}" hidden="true">

                        <div class="form-group row">
                            <div class="col-sm-9">
                                  <input type="file" name="user_picture" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                              <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>

                      </form>
                    @else
                    @endauth

                  
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection