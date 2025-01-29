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
             
              <li class="breadcrumb-item"><a href="{{route('feePayments')}}">Fee Payments</a></li>

              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
             
              <li class="breadcrumb-item active">Fee Payments</li>
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

<section class="content" style="padding-left:22px">
 <div class="container-fliud">
    <div class="row">

    <div class="col-sm-4">
        <div class="alert alert-success alert-dismissible">
            <h5><b>Debit (Total Fee to be Paid)</b></h5>
            <b>Ksh: {{$debit}}.00</b>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="alert alert-danger alert-dismissible">
            <h5><b>Credit (Total Fee Paid)</b> </h5>
            <b>Ksh: {{$credit}}.00</b>
        </div>
    </div>
   

    <div class="col-sm-4">
        <div class="alert alert-info alert-dismissible">
            <h5><b>Balance</b> </h5>
            <b>Ksh: {{$balance}}.00</b>
        </div>
    </div>

   




    </div>
 </div>
</section>

<!-- Content Header (Page header) -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header">

                   <div class="btn-group1" style="float:right">
                    @if($student->has_paid_reg_fee!='Yes' or $student->date_reg_fee_paid=="")
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addRegFee" href="#"> <i class="fa fa-edit las1"></i> Add Registration Fee</button>
                    @else
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#printRegReceipt"><i class="fa fa-download"></i> Print Registration Payment Receipt</button>
                    @endif
                       
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addRegFeeModal">Add Fee Payment</button>
                        
                    </div>
                   
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <center><h5>Payment Details for ({{$student->user_firstname}} {{$student->user_secondname}} {{$student->user_lastname}})</h5></center>
                        <thead>
                          
                            <th>#</th>
                            <th>Date Paid</th>
                            <th>Payment Method</th>
                            <th>Transaction ID</th>
                            <th>Amount Paid (Ksh)</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                             @if(!empty($fees))
                                @foreach($fees as $key=>$payment)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$payment->date_paid}}</td>
                                      <td>{{$payment->payment_method}}</td>
                                      <td>{{$payment->payment_ref_no}}</td>
                                      <td>{{$payment->amount_paid}}.00</td>
                                      <td>
                                          <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#viewReceipt{{$payment->id}}"><i class="fa fa-print" aria-hidden="true"></i> Print Receipt</button>
                                          <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deletePayment{{$payment->id}}"><i class="fa fa-trash" aria-hidden="true"></i>Delete Payment</button>
                                      </td>

                                     
                                         
                                     

                                  </tr>


                                    <!--update department modal-->
                                    <div class="modal  fade " id="viewReceipt{{$payment->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Receipt</h6>

                                                    <script>
                                                        /*function printPageArea(areaID){
                                                        var printContent=document.getElementById(areaID).innerHTML;
                                                        var originalContent=document.body.innerHTML;
                                                        document.body.innerHTML=printContent;
                                                        window.print();
                                                        //document.body.innerHtml=originalContent;
                                                        // Reload the original content after printing
                                                        window.location.reload();
                                                        }*/

                                                        function printPageArea(areaID) {
                                                            var printContent = document.getElementById(areaID).innerHTML;
                                                            var originalContent = document.body.innerHTML;

                                                            // Replace body content with the print content
                                                            document.body.innerHTML = printContent;

                                                            // Trigger print
                                                            window.print();
                                                            // Restore the original content
                                                            document.body.innerHTML = originalContent;
                                                            window.location.reload();
                                                            window.alert("The page was printed successfully!");

                                                            // Show a success message
                                                            showSuccessMessage("The page was printed successfully!");
                                                        }

                                                        // Function to display a success message
                                                        function showSuccessMessage(message) {
                                                            // Create a div for the message
                                                            var messageDiv = document.createElement("div");
                                                            messageDiv.innerText = message;
                                                            messageDiv.style.position = "fixed";
                                                            messageDiv.style.bottom = "20px";
                                                            messageDiv.style.right = "20px";
                                                            messageDiv.style.backgroundColor = "#28a745";
                                                            messageDiv.style.color = "#fff";
                                                            messageDiv.style.padding = "10px 20px";
                                                            messageDiv.style.borderRadius = "5px";
                                                            messageDiv.style.boxShadow = "0 4px 6px rgba(0,0,0,0.1)";
                                                            messageDiv.style.zIndex = "1000";

                                                            // Append to body
                                                            document.body.appendChild(messageDiv);

                                                            // Remove the message after 3 seconds
                                                            setTimeout(function () {
                                                                document.body.removeChild(messageDiv);
                                                            }, 200000);
                                                        }




                                                    </script>

                                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="printPageArea('wrapper{{ $payment->id }}');"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                                                </div>
                                                    @csrf
                                                    <!-- /.card-header -->
                                                    <div class="card-body" id="wrapper{{$payment->id}}">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <img src="{{asset('logo/logo.jpeg')}}" style="width:50%">
                                                            </div>
                                                            <div class="col-sm-6" style="padding-top:20px;padding-right:20px;">
                                                                <p style="text-align:right;font-size:30px;color:#339966;"><b>PAID</b></p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                  <p style="text-align:left;font-size:20px;color:#339966;"><b>RECEIPT NO: {{$payment->payment_ref_no}}</b></p>
                                                                  <b>FEE PAID TO</b><br>
                                                                  @if(!empty($student))
                                                                  <p>
                                                                    Std Name: <b>{{$student->user_firstname}} {{$student->user_secondname}} {{$student->user_surname}}</b><br>
                                                                    Course: <b>{{$student->course->course_name}}</b><br>
                                                                    Class:<b>{{$student->clas->clas_name}}</b><br>
                                                                  </p>
                                                                  @endif
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <p style="text-align:right">
                                                                <b>Paid To</b><br>
                                                                <b><span style="font-size:22px">TECHSPHERE TRAINING INSTITUTE</span></b>
                                                                 <br> P. O. Box 1334-00618, Nairobi View Park Towers 17th Floor<br>
                                                                <b>Web:</b> <a href="https://techsphereinstitute.co.ke" style="color:blue">https://techsphereinstitute.co.ke</a> <br> 
                                                                <b>Email: </b><span style="color:blue">Info@techsphereinstitute.co.ke </span> <br>
                                                                <b>Phone:</b> <span style="color:#3ccccc">+254768919307</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                 <p style="font-size:20px !important"><center><b><span style="font-size:20px">PAYMENT DETAILS</span></b></center></p>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="border:1px solid black;border-left:1px solid black">
                                                           <div class="col-sm-3" style="border:1px solid black"><b>Date Paid</b></div>
                                                           <div class="col-sm-3" style="border:1px solid black"><b>Payment Method</b></div>
                                                           <div class="col-sm-3" style="border:1px solid black"><b>Transaction ID</b></div>
                                                           <div class="col-sm-3" style="border:1px solid black"><b>Amount Paid (Ksh)</b></div>
                                                        </div>

                                                        <div class="row" style="border:1px solid black">
                                                           <div class="col-sm-3">{{$payment->date_paid}}</div>
                                                           <div class="col-sm-3">{{$payment->payment_method}}</div>
                                                           <div class="col-sm-3">{{$payment->payment_ref_no}}</div>
                                                           <div class="col-sm-3">{{$payment->amount_paid}}.00</div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12" style="padding-right:50px">
                                                                <p style="float:right;font-size:20px"><b>Balance:</b> Ksh {{$balance}}.00</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12" style="padding-left:30px">
                                                                <p><b>NOTE</b></p>
                                                                <p>Make payment through Mpesa or Bank and send payment details to<b> +254768919307</b> or email <b>info@techsphereinstitute.co.ke</b></p>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6" style="padding:30px">
                                                                <p><b>MPESA:</b></p>
                                                                <ol>
                                                                    <li> 1. Bs Name: <b>Techsphere Institute</b></li>
                                                                    <li> 2. Paybill No: <b>522533</b></li>
                                                                    <li> 3. Account No: <b>7855887</b></li>
                                                                </ol>
                                                            </div>
                                                        
                                                            <div class="col-sm-6" style="padding:30px">

                                                                <p><b>BANK</b></p>
                                                                <ol>
                                                                    <li> 1. Bank: <b>Kenya Comercial Bank</b></li>
                                                                    <li> 2. Acc Name: <b>Techsphere Institute</b></li>
                                                                    <li> 3. Account No: <b>1327338564</b></li>
                                                                </ol> 

                                                            </div>
                                                             
                                                         </div>





                                                        
                                                    </div>

                                                   

                                                    
                                                    <!-- /.card-body -->

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                        <button type="submit" class="btn btn-success" onclick="printPageArea('wrapper{{ $payment->id }}');"><i class="las la-plus"></i>Print</button>
                                                    </div>
                                             
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update department modal-->





                                    <!--add student modal-->
                                        <div class="modal  fade " id="deletePayment{{$payment->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title">Are you sure you want to delete this payment ?</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form role="form" method="POST" action="{{route('adminDeeleteStudentFeePayment')}}">
                                                        @csrf
                                                        <!-- /.card-header -->
                                                        <div class="card-body">  
                                                             <input type="text" name="id" value="{{$payment->id}}" hidden="true">
                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                                                            <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    <!--end add student modal-->








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




 <!--update department modal-->
 <div class="modal  fade " id="printRegReceipt">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Receipt</h6>

                <script>
                   

                    function printPageArea(areaID) {
                        var printContent = document.getElementById(areaID).innerHTML;
                        var originalContent = document.body.innerHTML;

                        // Replace body content with the print content
                        document.body.innerHTML = printContent;

                        // Trigger print
                        window.print();
                        // Restore the original content
                        document.body.innerHTML = originalContent;
                        window.location.reload();
                        window.alert("The page was printed successfully!");

                        // Show a success message
                        showSuccessMessage("The page was printed successfully!");
                    }

                    // Function to display a success message
                    function showSuccessMessage(message) {
                        // Create a div for the message
                        var messageDiv = document.createElement("div");
                        messageDiv.innerText = message;
                        messageDiv.style.position = "fixed";
                        messageDiv.style.bottom = "20px";
                        messageDiv.style.right = "20px";
                        messageDiv.style.backgroundColor = "#28a745";
                        messageDiv.style.color = "#fff";
                        messageDiv.style.padding = "10px 20px";
                        messageDiv.style.borderRadius = "5px";
                        messageDiv.style.boxShadow = "0 4px 6px rgba(0,0,0,0.1)";
                        messageDiv.style.zIndex = "1000";

                        // Append to body
                        document.body.appendChild(messageDiv);

                        // Remove the message after 3 seconds
                        setTimeout(function () {
                            document.body.removeChild(messageDiv);
                        }, 200000);
                    }




                </script>

                <button type="button" class="btn btn-outline-success btn-sm" onclick="printPageArea('wrapper{{ $student->id }}');"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
            </div>
                @csrf
                <!-- /.card-header -->
                <div class="card-body" id="wrapper{{$student->id}}">
                    <div class="row">
                        <div class="col-sm-6" style="padding-top:20px;padding-right:20px;">
                            <img src="{{asset('logo/logo.jpeg')}}" style="width:50%">
                        </div>
                        <div class="col-sm-6" style="padding-top:20px;padding-right:20px;">
                            <p style="text-align:right;font-size:30px;color:#339966;"><b>PAID</b></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                                <p style="text-align:left;font-size:20px;color:#339966;"><b>RECEIPT NO: {{$student->reg_fee_reference_no}}</b></p>
                                <b>REGISTRATION FEE PAID TO</b><br>
                                @if(!empty($student))
                                <p>
                                Std Name: <b>{{$student->user_firstname}} {{$student->user_secondname}} {{$student->user_surname}}</b><br>
                                Course: <b>
                                    @if(!empty($student->course->course_name))
                                    {{$student->course->course_name}}
                                    @else
                                    NA
                                    @endif
                                </b><br>
                                Class:<b>
                                @if(!empty($student->clas->clas_name))
                                    {{$student->clas->clas_name}}
                                    @else
                                    NA
                                    @endif

                                    
                                </b><br>
                                </p>
                                @endif
                        </div>
                        <div class="col-sm-7">
                            <p style="text-align:right">
                            <b>Paid To</b><br>
                            <b><span style="font-size:22px">TECHSPHERE TRAINING INSTITUTE</span></b>
                                <br> P. O. Box 1334-00618, Nairobi View Park Towers 17th Floor<br>
                            <b>Web:</b> <a href="https://techsphereinstitute.co.ke" style="color:blue">https://techsphereinstitute.co.ke</a> <br> 
                            <b>Email: </b><span style="color:blue">Info@techsphereinstitute.co.ke </span> <br>
                            <b>Phone:</b> <span style="color:#3ccccc">+254768919307</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                                <p style="font-size:20px !important"><center><b><span style="font-size:20px">PAYMENT DETAILS</span></b></center></p>
                        </div>
                    </div>

                    <div class="row" style="border:1px solid black;border-left:1px solid black">
                        <div class="col-sm-3" style="border:1px solid black"><b>Date Paid</b></div>
                        <div class="col-sm-3" style="border:1px solid black"><b>Payment Method</b></div>
                        <div class="col-sm-3" style="border:1px solid black"><b>Transaction ID</b></div>
                        <div class="col-sm-3" style="border:1px solid black"><b>Amount Paid (Ksh)</b></div>
                    </div>

                    <div class="row" style="border:1px solid black">
                        <div class="col-sm-3">{{$student->date_reg_fee_paid}}</div>
                        <div class="col-sm-3">MPESA</div>
                        <div class="col-sm-3">{{$student->reg_fee_reference_no}}</div>
                        <div class="col-sm-3">1000.00</div>
                    </div>

                    

                    <div class="row">
                        <div class="col-sm-12" style="padding-left:30px">
                            <p><b>NOTE</b></p>
                            <p>Make payment through Mpesa or Bank and send payment details to<b> +254768919307</b> or email <b>info@techsphereinstitute.co.ke</b></p>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-sm-6" style="padding:30px">
                            <p><b>MPESA:</b></p>
                            <ol>
                                <li> 1. Bs Name: <b>Techsphere Institute</b></li>
                                <li> 2. Paybill No: <b>522533</b></li>
                                <li> 3. Account No: <b>7855887</b></li>
                            </ol>
                        </div>
                    
                        <div class="col-sm-6" style="padding:30px">

                            <p><b>BANK</b></p>
                            <ol>
                                <li> 1. Bank: <b>Kenya Comercial Bank</b></li>
                                <li> 2. Acc Name: <b>Techsphere Institute</b></li>
                                <li> 3. Account No: <b>1327338564</b></li>
                            </ol> 

                        </div>
                            
                        </div>





                    
                </div>

                

                
                <!-- /.card-body -->

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="las la-times"></i>Close</button>
                    <button type="submit" class="btn btn-success" onclick="printPageArea('wrapper{{ $student->id }}');"><i class="las la-plus"></i>Print</button>
                </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!--end update department modal-->








<!--update department modal-->
<div class="modal  fade " id="addRegFeeModal">
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
                    
                        
                        <input type="text" name="user_id" value="{{$student->id}}" class="form-control" hidden="true">
                                

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Amount Paid<sup>*</sup></label>
                                        <input type="number" name="amount_paid" class="form-control" min="1" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Payment Method<sup>*</sup></label>
                                        <input type="text" name="payment_method" class="form-control" required>
                                </div>
                            </div>

                        </div>   



                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Payment Reference No<sup>*</sup></label>
                                        <input type="text" name="payment_ref_no" class="form-control" required>
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





 <!--update department modal-->
 <div class="modal  fade " id="addRegFee">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Add Reg Fee</h6>
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
                                    <input type="text" class="form-control" name="id" value="{{$student->id}}" hidden="true">
                                    <label>Registration Fee Reference No</label>
                                    <input type="text" class="form-control" name="reg_fee_reference_no" required>

                                    <label>Date Registration was Paid</label>
                                    <input type="date" name="date_reg_fee_paid" class="form-control" required>

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

@endsection