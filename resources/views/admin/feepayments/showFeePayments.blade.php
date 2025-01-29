@extends("layouts.master")
@section('content')
<?php
use App\Models\FeePayment;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Fee Payments</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Fee Payments</li>
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

@if (session('error'))
    <section class="content">
        <div class="container-fliud">


        <div class="alert alert-success alert-dismissible">
            <h6> <i class="icon fas fa-info"></i> <b>Success</b></h6>
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

                   <!--<div class="btn-group1" style="float:right">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addDepartmentModal">Add New Payment</button>
                    </div>-->   
                   
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <thead>
                          
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Debit(Ksh)</th>
                            <th>Credit</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                             @if(!empty($users))
                                @foreach($users as $key=>$user)
                                   <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="{{url('/adminViewStudentFeePayment/'.$user->id)}}">{{$user->user_firstname}} {{$user->user_secondname}} {{$user->user_surname}}</a></td>
                                        <td>{{$user->user_phonenumber}}</td>
                                        <td>{{$user->email}}</td>
                                        @if(!empty($user->course->course_name))
                                             <td>{{$user->course->course_name}}</td>
                                        @else
                                        <td>
                                            No course Assigned
                                        </td>
                                        @endif

                                        @if(!empty($user->course->course_price))
                                             <td>{{$user->course->course_price}}</td>
                                        @else
                                             <td>0</td>
                                        @endif

                                        <td>
                                            <?php
                                              $credit=FeePayment::where('user_id',$user->id)->sum('amount_paid');
                                              echo$credit;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                               $credit=FeePayment::where('user_id',$user->id)->sum('amount_paid');
                                               if(!empty($user->course->course_price)){
                                                $balance=$user->course->course_price-$credit;
                                                echo$balance;
                                               }else{
                                                  echo"0";
                                               }
                                              
                                            ?>
                                        </td>

                                        <td>

                                        <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                                    <!--<li><a class="dropdown-item" data-toggle="modal" data-target="#update{{$user->id}}" href="#"> <i class="fa fa-edit las1"></i>Add Fee Payment</a></li>-->
                                                   
                                                    <li><a class="dropdown-item"  href="{{url('/adminViewStudentFeePayment/'.$user->id)}}"> <i class="fa fa-edit las1"></i> Manage Fee</a></li>
                                                   
                                                </ul>
                                            </div>

                                        </td>
 
                                   </tr>


                                    <!--update department modal-->
                                    <div class="modal  fade " id="update{{$user->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Add Fee Payment</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" method="POST" action="{{route('addFeePayments')}}">
                                                    @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        
                                                          
                                                         <input type="text" name="user_id" value="{{$user->id}}" class="form-control" hidden="true">
                                                                 

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Amount Paid<sup>*</sup></label>
                                                                         <input type="number" name="amount_paid" class="form-control" min="1">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Payment Method<sup>*</sup></label>
                                                                         <input type="text" name="payment_method" class="form-control">
                                                                    </div>
                                                                </div>

                                                            </div>   

             

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Payment Reference No<sup>*</sup></label>
                                                                         <input type="text" name="payment_ref_no" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Date Paid<sup>*</sup></label>
                                                                         <input type="date" name="date_paid" class="form-control" required>
                                                                    </div>
                                                                </div>

                                                            </div>  

                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                        <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Save</button>
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


<!--add student modal-->
<div class="modal  fade " id="addDepartmentModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Add New Payments</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('adminAddDepartments')}}">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Select Student<sup>*</sup></label>
                               
                            </div>
                        </div>
                    </div>   
            </div>
            <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>CLOSE</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>ADD</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--end add student modal-->


@endsection