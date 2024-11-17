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

                   <!--<div class="btn-group1" style="float:right">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addDepartmentModal">Add New Payment</button>
                    </div>-->
                   
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped" id="example1">
                        <center><h5>Payment Details</h5></center>
                        <thead>
                          
                            <th>#</th>
                            <th>Date Paid</th>
                            <th>Payment Method</th>
                            <th>Transaction ID</th>
                            <th>Amount Paid (Ksh)</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                             @if(!empty($payments))
                                @foreach($payments as $key=>$payment)
                                  <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$payment->date_paid}}</td>
                                      <td>{{$payment->payment_method}}</td>
                                      <td>{{$payment->payment_ref_no}}</td>
                                      <td>{{$payment->amount_paid}}.00</td>
                                      <td>
                                          <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#viewReceipt{{$payment->id}}"><i class="fa fa-print" aria-hidden="true"></i> Print Receipt</button>
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
                                                                <img src="{{asset('logo/logo1.jpeg')}}" style="width:50%">
                                                            </div>
                                                            <div class="col-sm-6" style="padding-top:20px;padding-right:20px;">
                                                                <p style="text-align:right;font-size:30px;color:#339966;"><b>PAID</b></p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                  <p style="text-align:left;font-size:20px;color:#339966;"><b>RECEIPT NO: #G567HEGE</b></p>
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
                                                                <b>TECHSPHERE TRAINING INSTITUTE</b>
                                                                 <br> P. O. Box 1334-00618, Nairobi View Park Towers 17th Floor<br>
                                                                Web: <a href="https://techsphereinstitute.co.ke" style="color:blue">https://techsphereinstitute.co.ke</a> <br> Email: <span style="color:blue">Info@techsphereinstitute.co.ke </span> <br>
                                                                Phone: <span style="color:#3ccccc">+254768919307</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                 <p><center><b>PAYMENT DETAILS</b></center></p>
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
                                                                <p>NOTE</p>
                                                                <p>Make payment through Mpesa or Bank and send payment details to<b> +254768919307</b> or email <b>info@techsphereinstitute.co.ke</b></p>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6" style="padding:30px">
                                                                <p>MPESA:</p>
                                                                <ol>
                                                                    <li> 1. Bs Name: <b>Techsphere Institute</b></li>
                                                                    <li> 2. Paybill No: <b>522533</b></li>
                                                                    <li> 3. Account No: <b>7855887</b></li>
                                                                </ol>
                                                            </div>
                                                        
                                                            <div class="col-sm-6" style="padding:30px">

                                                                <p>BANK</p>
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