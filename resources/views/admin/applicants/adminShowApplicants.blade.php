@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Applicants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><span class="right badge badge-info">Go Back</span> </a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Applicants</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->




@if(session('success'))
        <section class="content">
            <div class="container-fliud">

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Success!</h5>
                   {{ session('success') }}
                </div>

            </div>
        </section>
       
    @endif

    @if(session('error'))
        <section class="content">
            <div class="container-fliud">

                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Failed!</h5>
                   {{ session('error') }}
                </div>

            </div>
        </section>
       
    @endif


<!-- Content Header (Page header) -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header">

                   


                   
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <thead>
                          
                            <th>#</th>
                            <th>Name</th>
                            <th>Phonenumber</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Has Paid Reg Fee</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                             @if(!empty($applicants))
                                @foreach($applicants as $key=>$applicant)
                                   <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$applicant->user_firstname}} {{$applicant->user_secondname}} {{$applicant->user_surname}}</td>
                                        <td>{{$applicant->user_phonenumber}}</td>
                                        <td>{{$applicant->email}}</td>
                                        @if(!empty($applicant->course->course_name))
                                           <td>{{$applicant->course->course_name}}</td>
                                        @else
                                        <td>No Course Selected</td>
                                        @endif
                                       
                                        <td>
                                            @if($applicant->has_paid_reg_fee!='Yes')
                                               No
                                            @else
                                               {{$applicant->has_paid_reg_fee}}
                                            @endif
                                        </td>

                                        <td>

                                        <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#update_department{{$applicant->id}}" href="#"> <i class="fa fa-edit las1"></i> Mark As Paid Reg Fee</a></li>
                                                    <div class="dropdown-divider"></div>
                                                    <li><a class="dropdown-item" data-toggle="modal" data-target="#archive_department{{$applicant->id}}" href="#"> <i class="fa fa-edit las2"></i> Delete</a></li>
                                                </ul>
                                            </div>

                                        </td>
 
                                   </tr>


                                    <!--update department modal-->
                                    <div class="modal  fade " id="update_department{{$applicant->id}}">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Confirm that {{$applicant->user_firstname}} {{$applicant->user_secondname}} {{$applicant->user_surname}} has paid Reg Fee</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('adminUpdateUsers')}}">
                                                    @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="id" value="{{$applicant->id}}" hidden="true">
                                                                        <input type="text" name="has_paid_reg_fee" value="Yes" class="form-control" hidden="true">
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>No</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Yes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update department modal-->

                                    <!--update department modal-->
                                    <div class="modal  fade " id="archive_department{{$applicant->id}}">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Are You sure you want to delete this record</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('deleteApplicant')}}">
                                                    @csrf
                                                   
                                                        
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="id" value="{{$applicant->id}}" hidden="true"> 
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                  

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-trash"></i>Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update department modal-->

                                @endforeach
                               
                             @else
                             @endif
                        </tbody>
                    </table>
                </div>
             </div>
          </div>
        </div>
      </div>
</section>
<!-- /.container-fluid -->


@endsection