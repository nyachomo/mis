@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->

<!-- Content Header (Page header) -->
@if(Auth::check()&&Auth::user()->is_admin=='Yes')
<section class="content">
      <div class="container-fluid">
       
      <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                
                <a href="{{route('adminShowUsers')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>


          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <div class="info-box-content">
                <span class="info-box-text">Trainees</span>
                
                <a href="{{route('adminShowTrainees')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>


          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <div class="info-box-content">
                <span class="info-box-text">Trainers</span>
                
                <a href="{{route('adminShowTrainers')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <div class="info-box-content">
                <span class="info-box-text" style="color:white">Department</span>
                
                <a href="{{route('adminShowDepartments')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>


          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <div class="info-box-content">
                <span class="info-box-text" style="color:white">Training Program</span>
                
                <a href="{{route('adminShowCourses')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <div class="info-box-content">
                <span class="info-box-text">Training Clases</span>
                <a href="{{route('adminShowClas')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <div class="info-box-content">
                <span class="info-box-text" style="color:white">Manage Units</span>
                <a href="{{route('adminShowSubjects')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>

          
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <div class="info-box-content">
                <span class="info-box-text" style="color:white">Assesments</span>
                <a href="{{route('adminShowStudentAssignments')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>

        </div>
        
      </div>

    
</section>
@endif
<!-- /.container-fluid -->

@if(Auth::check()&&Auth::user()->is_trainee=='Yes')
<section class="content">
      <div class="container-fliud">
        
    
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h6><i class="icon fas fa-info"></i> <b>Alert!</b> Please make sure the following information are upto date.</h6>
              <ol>
                  <li> 1. Gender</li>
                  <li> 2. Date of birth</li>
                  <li> 3. Religion</li>
                  <li> 4. Academic documents</li>
                  <li> 4. Religion</li>
              </ol>
              <a href="{{route('showUserProfile')}}" class="btn btn-success"  style="border-radius:50px;text-decoration: none;">Update data</a>
          </div>


      
     
        <div class="alert alert-danger alert-dismissible">
          <h6> <i class="icon fas fa-info"></i> <b>Hello {{Auth::user()->user_firstname}} {{Auth::user()->user_secondname}} {{Auth::user()->user_surname}}</b></h6>
           You have fee balance of Ksh 23,000
           Pay 16 
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#payfee" style="width:100px;border-radius:50px">Pay</button>
        </div>

     

     
        <div class="alert alert-success alert-dismissible">
          <i class="icon fas fa-info"></i>
           You have 4 assesment that requires your action
        </div>
    
      </div>
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <div class="info-box-content">
                <span class="info-box-text">Total Debit</span>
                
                <a href="{{route('adminShowUsers')}}"><span class="info-box-number" style="color:white;font-size:25px">56000</span></a>
              </div>
            </div>
          </div>


          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <div class="info-box-content">
                <span class="info-box-text">Amount Paid</span>
                
                <a href="{{route('adminShowTrainees')}}"><span class="info-box-number" style="color:white;font-size:25px">33000</span></a>
              </div>
            </div>
          </div>


          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <div class="info-box-content">
                <span class="info-box-text">Enrol Program</span>
                
                <a href="{{route('adminShowTrainers')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <div class="info-box-content">
                <span class="info-box-text" style="color:white">Department</span>
                
                <a href="{{route('adminShowDepartments')}}"><span class="info-box-number" style="color:white;font-size:25px">678</span></a>
              </div>
            </div>
          </div>

        </div>

      </div>


      <!--add student modal-->
      <div class="modal  fade " id="payfee">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h6 class="modal-title">Fee Payment</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <form role="form" method="POST" action="">
                  @csrf
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="alert alert-danger alert-dismissible">
                      
                        <h5> <b>Payment Guideline</b></h5>
                        <ol>
                            <li>1. Enter phonenumber which you want to pay from</li>
                            <li>2. Enter amount you want to pay</li>
                            <li>3. Click pay button to start transaction</li>
                            <li>4. Mpesa Stk push will be sent to your phonenumber</li>
                            <li>5. Enter Mpesa pin to complete the transaction</li>
                        </ol>
                    

                      </div>


                          <div class="row">
                            <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label>Enter phonenumber<sup>*</sup></label>
                                      <input type="text" class="form-control" name="user_phonenumber" required>
                                  </div>
                              </div>
                              

                              

                          </div>  

                          <div class="row">

                            <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                      <label>Enter Ampunt to pay</label>
                                      <input type="number" class="form-control" name="user_surname">
                                  </div>
                              </div> 

                          </div> 

                          
                        
                  </div>
                  <!-- /.card-body -->

                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                      <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Pay</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--end add student modal-->



</section>

<section class="content">
   <div class="container-fliud">
         <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">News</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Events</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <table class="table">
                          <thead>
                                <th>Event</th>
                                <th>Posted by</th>
                                <th>Description</th>
                          </thead>
                    </table>
                    
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">

                    <table class="table">
                          <thead>
                                <th>News</th>
                                <th>Posted by</th>
                                <th>Description</th>
                          </thead>
                    </table>
                  
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">

                
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
   </div>
</section>
@endif


@if(Auth::check()&&Auth::user()->is_high_school_teacher=='Yes')
<section class="content">
      <div class="container-fliud">
        
    
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h6> <i class="icon fas fa-info"></i> <b>Hello {{Auth::user()->user_firstname}} {{Auth::user()->user_secondname}} {{Auth::user()->user_surname}}</b> Please make sure the following student information are captured correctly</h6>
              <ol>
                  <li> 1. Fullname</li>
                  <li> 2. Email</li>
                  <li> 3. Phonenumber</li>
                  <li> 4. Gender</li>
                  <li> 4. School</li>
              </ol>
              <a href="{{route('showLeeds')}}" class="btn btn-success"  style="border-radius:50px;text-decoration: none;">Register Student</a>
          </div>

</section>


@endif



@endsection
