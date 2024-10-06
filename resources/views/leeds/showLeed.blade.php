@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"> Student Management</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<section>
    <div class="container-fliud" style="padding:10px">
        
        <div class="alert alert-success alert-dismissible">
            <h6> <i class="icon fas fa-info"></i> <b>Alert !</b></h6>
                <ol>
                    <li>1. The field marked <span style="color:red">*</span> are mandatory</li>
                    <li>2. Once a student register, click action button to download the scholarship letter.</li>
                </ol>
                
        </div>


    </div>
</section>

<section class="content">
    <div class="container-fliud">
        <div class="card">
            <div class="card-header">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-success" style="float:right" data-toggle="modal" data-target="#addLeddModal"><i class="fa fa-plus las2"></i>Register New Student</button>
                    </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-striped" id="example1">
                    <thead>
                        <th>#</th>
                        <th>Serial No</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>School</th>
                        <th>Class</th>
                        <th>Action</th>
                        <!--<th>COMMENTS</th>-->
                    </thead>
                    <tbody>
                        @if(!empty($leeds))
                            @foreach($leeds as $key=>$leed)
                            <tr>
                               
                                    <td>{{$key+1}}</td>
                                    <td>{{$leed->serial_number}}</td>
                                    <td>{{$leed->student_fullname}}</td>
                                    <td>{{$leed->student_email}}</td>
                                    <td>{{$leed->student_phone}}</td>
                                    <td>{{$leed->student_gender}}</td>
                                    <td>{{$leed->school->school_name}}</td>
                                    <td>{{$leed->student_form}}</td>

                                <td>

                                <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm  lightColor  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><center><a class="dropdown-item" href="#"><b>More Action</b></a></center></li>
                                            <li><a class="dropdown-item" data-toggle="modal" data-target="#update_leed{{$leed->id}}" href="#"> <i class="fa fa-edit las1"></i> Edit</a></li>
                                            <div class="dropdown-divider"></div>
                                            
                                            @if($leed->student_form=='Form Four')
                                                 <li><a class="dropdown-item" data-toggle="modal" data-target="#scholarshipLetterFormFour{{$leed->id}}" href="#"> <i class="fa fa-eye las2"></i>View Scholarship Letter</a></li>
                                            @else
                                                 <li><a class="dropdown-item" data-toggle="modal" data-target="#scholarshipLetter{{$leed->id}}" href="#"> <i class="fa fa-eye las2"></i>View Scholarship Letter</a></li>
                                            @endif
                                            <div class="dropdown-divider"></div>
                                            @if($leed->student_form=='Form Four')
                                            <li><a class="dropdown-item"  href="/downloadStudentScholarshipLetterFormFour/{{$leed->id}}"> <i class="fa fa-download las2"></i>Download Scholarship Letter</a></li>
                                            @else
                                            <li><a class="dropdown-item"  href="/downloadStudentScholarshipLetter/{{$leed->id}}"> <i class="fa fa-download las2"></i>Download Scholarship Letter</a></li>
                                            
                                            @endif
                                            
                                        </ul>
                                    </div>



                                    <!--update leed-->
                                    <div class="modal fade" id="scholarshipLetter{{$leed->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   <a href="/downloadStudentScholarshipLetter/{{$leed->id}}" class="btn btn-success downloadScholarshipLetterBtn"><i class="fa fa-download"></i> Download</a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <button id="printScholarshipLetter{{$leed->id}}" onclick="printPageArea()" class="btn btn-primary">Print</button>
                                                    
                                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                    <script>
                                                        function printPageArea(){
                                                            var=printContent=document.getElementById('Letter{{$leed->id}}').innerHTML;
                                                            var originalContent=document.body.innerHTML;
                                                            document.body.innerHTML=printContent;
                                                            window.print();
                                                            document.body.innerHTML=originalContent;
                                                        }
                                                
                                                    </script>


                                                </div>
                                                <!-- /.card-header -->
                                                <div class="modal-body" id="Letter{{$leed->id}}">
                                                   
                                               
                                                                
                                                                <center>
                                                                
                                                                    <center><img src="{{asset('logo/logo1.jpeg')}}" alt="Logo" width="30%"></center>
                                                                    <p style="border-bottom:3px solid #000033">
                                                                        <b>
                                                                        View Park Towers 17th Floor, University way | P. O. Box 1334-00618, Nairobi<br>
                                                                        Web: <a href="https://techsphereinstitute.co.ke/stdadm/public/" style="color:blue">https://techsphereinstitute.co.ke/stdadm/public/</a> | Email: <span style="color:blue">Info@techsphereinstitute.co.ke </span>| <br>
                                                                        Phone: <span style="color:#3ccccc">+254768919307</span>
                                                                        </b>
                                                                    </p>
                                                                </center>
                                                            <!-- <h3><b>Dear {{$leed->student_fullname}}</b></h3>-->
                                                                <table>
                                                                    <tr style="border:1px solid white;background-color:white">
                                                                        <td style="border:1px solid white;background-color:white"> <h6><b>Dear {{$leed->student_fullname}}</b></h6></td>
                                                                        <td style="border:1px solid white;background-color:white;text-align:right"> <h6><b>Serial No TTI/NOV/2024/{{$leed->serial_number}}</b></h6></td>
                                                                    </tr>
                                                                </table>
                                                                <p style="text-align:justify">
                                                                    Techsphere Training Institute congratulates you for being shortlisted to be admitted into this year’s 2024 Annual “Skill Pathfinding” training program having passed our assessment.

                                                                </p>
                                                                <p style="text-align:justify">
                                                                    The “Skill Pathfinding” Training Program is an ICT skill nurturing platform for the youth, which is targeting to identify 
                                                                    and mentor close to more than 100 talented youth annually, to acquire and develop specialized tech skills that are high in 
                                                                    demand globally today. This is an effort to be part of the solution to the widening skill gap in the global ICT industry. 
                                                                    Consequently, TTI is set out to develop a futuristic approach to reskilling the nation. 
                                                                    Over time, we have grown to become a multi-stakeholder alliance representing both the academia and the ICT sector. 
                                                                    Our focus is on three areas: lifelong learning and upskilling, future-readiness and youth employability as well as innovation.
                                                                </p>

                                                                <p style="text-align:justify">
                                                                    Having successfully qualified for the program, you will be taken through a series of trainings, mentorship programs, 
                                                                    and project-based learning. This will culminate in developing industry recognized skillsets in your area of specialization 
                                                                    as well as proper mentorship into the tech industry. For the 2024 program, we have selected key courses that are in high demand, 
                                                                    up-to-date and guaranteed to give participants a cutting edge in the ICT industry. To make this dream come true, we have reduced 
                                                                    down our fee charges by almost 40% from the standard charges in order to impact more lives as cost can be a greater barrier to such 
                                                                    a predominant milestone. Attached below is the payable fee structure.
                                                                </p>
                                                            <!-- <h4><b style="border-bottom:3px solid #000033">11<sup>th</sup> November 2024 Upskilling Program</b></h4>-->

                                                                <table class="table table-bordered table-sm">
                                                                    <thead>
                                                                            <th>Training Program</th>
                                                                            <th>Duration</th>
                                                                            <th>Registration Fee (Ksh)</th>
                                                                            <th>Tution Fee (Ksh)</th>
                                                                    </thead>
                                                                    <body>
                                                                        <tr>
                                                                            <td>Web App Development</td>
                                                                            <td>6 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>10,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Android App Development (Kotlin)</td>
                                                                            <td>6 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>10,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Cyber Security</td>
                                                                            <td>6 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>10,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Data Analysis</td>
                                                                            <td>6 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>10,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Graphic Design</td>
                                                                            <td>6 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>10,500</td>
                                                                        </tr>

                                                                        
                                                                            
                                                                    </body>
                                                                </table>

                                                            
                                                            <!-- <h4><b style="border-bottom:3px solid #000033">13<sup>th</sup> January 2025 Upskilling Program</b></h4>-->

                                                                <!--<table class="table table-bordered table-sm">
                                                                    <thead>
                                                                        <th>Training Program</th>
                                                                        <th>Duration</th>
                                                                        <th>Registration Fee (Ksh)</th>
                                                                        <th>Tution Fee (Ksh)</th>
                                                                    </thead>
                                                                    <body>
                                                                        <tr>
                                                                            <td>Web App Development</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,500</td>
                                                                            <td>56,000</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Android App Development (Kotlin)</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,500</td>
                                                                            <td>56,000</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Cyber Security</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,500</td>
                                                                            <td>56,000</td>
                                                                        </tr>

                                                                        <tr>
                                                                        <td>Digital Marketing</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,500</td>
                                                                            <td>56,000</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Graphic Design</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,500</td>
                                                                            <td>56,000</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>UI/UX Design</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,500</td>
                                                                            <td>56,000</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Digital Literacy</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,500</td>
                                                                            <td>56,000</td>
                                                                        </tr>
                                                                    
                                                                            
                                                                    </body>
                                                                </table>-->
                                                            
                                                                <p style="text-align:justify">
                                                                    For this program, select one course from the list above. The program will run for a period of 6 weeks, 2hrs per day (MON-FRI) and a certificate will be issued upon completion. 
                                                                    To accept this partial scholarship, you are required to visit  <a href="https://techsphereinstitute.co.ke">https://techsphereinstitute.co.ke</a> and select <b>“Enroll”</b> to register before the deadline <b> 4 <sup>th</sup> November 2024 </b> which will also be the reporting date. 
                                                                    A non-refundable registration fee of <b>KES. 1000</b> is required to secure a spot on the program but students who have attended the program before will not be required to pay this fee. The starting date for the program is on <b>11 <sup>th</sup> November 2024.</b> 
                                                                    Please note, the program will be run <b>PURELY ONLINE.</b> This will enable students to put focus to both the program and normal school assignments.
                                                                </p>
                                                                <p style="text-align:justify">
                                                                    Kindly call +254768919307 or send an email to <a href="https://techsphereinstitute.co.ke">https://techsphereinstitute.co.ke</a> for any queries or clarifications regarding the program. We look forward to having you join us
                                                                </p>

                                                                <table>
                                                                    <tr style="border:1px solid white;background-color:white">
                                                                        <td style="border:1px solid white;background-color:white">
                                                                            <p>
                                                                                Yours faithfully ,<br>
                                                                                <b>Ibrahim Gichemba  </b>
                                                                                <img src="{{asset('images/signature.jpeg')}}" width="100%"><br>
                                                                                Director Techsphere Training Institute.
                                                                            </p>
                                                                        </td>

                                                                        <td style="border:1px solid white;background-color:white">
                                                                            <p>
                                                                                <img src="{{asset('images/stamp.jpeg')}}" width="100%"><br>
                                                                            </p>
                                                                        </td>

                                                                        
                                                                    </tr>
                                                                </table>

                                                              
                                                                    
                                                                </div>

                                                
                                                </div>
                                                <!-- /.card-body -->

                                               <!-- <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                                                </div>-->
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update leed-->


                                     <!--update leed-->
                                     <div class="modal fade" id="scholarshipLetterFormFour{{$leed->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   <a href="/downloadStudentScholarshipLetterFormFour/{{$leed->id}}" class="btn btn-success downloadScholarshipLetterBtn"><i class="fa fa-download"></i> Download</a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="modal-body" id="lowerSholarShipLetter">
                                                   
                                                <?php
                                                        // Convert image to Base64
                                                        $imagePath = public_path('images/signature.jpeg');
                                                        $imageData = base64_encode(file_get_contents($imagePath));
                                                        $base64Image = 'data:image/jpeg;base64,' . $imageData;
                                                ?>
                                                                
                                                                <center>
                                                                
                                                                    <center><img src="{{asset('logo/logo1.jpeg')}}" alt="Logo" width="30%"></center>
                                                                    <p style="border-bottom:3px solid #000033">
                                                                        <b>
                                                                        View Park Towers 17th Floor, University way | P. O. Box 1334-00618, Nairobi<br>
                                                                        Web: <a href="https://techsphereinstitute.co.ke/stdadm/public/" style="color:blue">https://techsphereinstitute.co.ke/stdadm/public/</a> | Email: <span style="color:blue">Info@techsphereinstitute.co.ke </span>| <br>
                                                                        Phone: <span style="color:#3ccccc">+254768919307</span>
                                                                        </b>
                                                                    </p>
                                                                </center>
                                                           
                                                                <table>
                                                                    <tr style="border:1px solid white;background-color:white">
                                                                        <td style="border:1px solid white;background-color:white"> <h6><b>Dear {{$leed->student_fullname}}</b></h6></td>
                                                                        <td style="border:1px solid white;background-color:white;text-align:right"> <h6><b>Serial No TTI/NOV/2024/{{$leed->serial_number}}</b></h6></td>
                                                                    </tr>
                                                                </table>
                                                                <p style="text-align:justify">
                                                                    Techsphere Training Institute congratulates you for being shortlisted to be admitted into this year’s 2024 Annual “Skill Pathfinding” training program having passed our assessment.

                                                                </p>
                                                                <p style="text-align:justify">
                                                                    The “Skill Pathfinding” Training Program is an ICT skill nurturing platform for the youth, which is targeting to identify 
                                                                    and mentor close to more than 100 talented youth annually, to acquire and develop specialized tech skills that are high in 
                                                                    demand globally today. This is an effort to be part of the solution to the widening skill gap in the global ICT industry. 
                                                                    Consequently, TTI is set out to develop a futuristic approach to reskilling the nation. 
                                                                    Over time, we have grown to become a multi-stakeholder alliance representing both the academia and the ICT sector. 
                                                                    Our focus is on three areas: lifelong learning and upskilling, future-readiness and youth employability as well as innovation.
                                                                </p>

                                                                <p style="text-align:justify">
                                                                    Having successfully qualified for the program, you will be taken through a series of trainings, mentorship programs, 
                                                                    and project-based learning. This will culminate in developing industry recognized skillsets in your area of specialization 
                                                                    as well as proper mentorship into the tech industry. For the 2024 program, we have selected key courses that are in high demand, 
                                                                    up-to-date and guaranteed to give participants a cutting edge in the ICT industry. To make this dream come true, we have reduced 
                                                                    down our fee charges by almost 40% from the standard charges in order to impact more lives as cost can be a greater barrier to such 
                                                                    a predominant milestone. Attached below is the payable fee structure.
                                                                </p>
                                                           
                                                                <table class="table table-bordered table-sm">
                                                                    <thead>
                                                                            <th>Training Program</th>
                                                                            <th>Duration</th>
                                                                            <th>Registration Fee (Ksh)</th>
                                                                            <th>Tution Fee (Ksh)</th>
                                                                    </thead>
                                                                    <body>
                                                                        <tr>
                                                                            <td>Web App Development</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>45,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Android App Development (Kotlin)</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>45,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Cyber Security</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>45,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Data Analysis</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>45,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Graphic Design</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>45,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>UI/UX Design</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>45,500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Digital Marketing</td>
                                                                            <td>18 Weeks</td>
                                                                            <td>1,000</td>
                                                                            <td>45,500</td>
                                                                        </tr>

                                                                        
                                                                            
                                                                    </body>
                                                                </table>

                                                            
                                                           
                                                            
                                                                <p style="text-align:justify">
                                                                    For this program, select one course from the list above. The program will run for a period of 6 weeks, 2hrs per day (MON-FRI) and a certificate will be issued upon completion. 
                                                                    To accept this partial scholarship, you are required to visit  <a href="https://techsphereinstitute.co.ke">https://techsphereinstitute.co.ke</a> and select <b>“Enroll”</b> to register before the deadline <b> 6 <sup> th</sup> January 2025 </b> which will also be the reporting date. 
                                                                    A non-refundable registration fee of <b>KES. 1000</b> is required to secure a slot on the program but students who have attended the program before will not be required to pay this fee. The starting date for the program is on <b>13 <sup>th</sup> January 2025.</b> 
                                                                    Please note, the program will be run <b>PURELY ONLINE.</b> This will enable students to put focus to both the program and normal school assignments.
                                                                </p>
                                                                <p style="text-align:justify">
                                                                    Kindly call +254768919307 or send an email to <a href="https://techsphereinstitute.co.ke">https://techsphereinstitute.co.ke</a> for any queries or clarifications regarding the program. We look forward to having you join us
                                                                </p>

                                                                <table>
                                                                    <tr style="border:1px solid white;background-color:white">
                                                                        <td style="border:1px solid white;background-color:white">
                                                                            <p>
                                                                                Yours faithfully ,<br>
                                                                                <b>Ibrahim Gichemba  </b>
                                                                                <img src="{{ $base64Image }}" width="10%"><br>
                                                                                Director Techsphere Training Institute.
                                                                            </p>
                                                                        </td>

                                                                        <td style="border:1px solid white;background-color:white">
                                                                            <p>
                                                                                <img src="public/images/stamp.jpeg" width="100%"><br>
                                                                            </p>
                                                                        </td>

                                                                        
                                                                    </tr>
                                                                </table>

                                                              
                                                                    
                                                                </div>

                                                
                                                </div>
                                                <!-- /.card-body -->

                                               <!-- <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger"><i class="las la-times"></i>CLOSE</button>
                                                </div>-->
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!--end update leed-->








                                </td>


                                    
                            </tr>

                            <!--update leed-->
                            <div class="modal fade" id="update_leed{{$leed->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Update Student</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form role="form" method="POST" action="{{route('updateLeed')}}">
                                            @csrf
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <input type="text" name="id" value="{{$leed->id}}" hidden="true">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- text input -->
                                                        <div class="form-group">
                                                            <label>Student Fullname <sup>*</sup></label>
                                                            <input type="text"  name="student_fullname"  class="form-control @error('student_fullname') is-invalid @enderror"  value="{{$leed->student_fullname }}" required>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Student Email</label>
                                                            <input type="email" class="form-control"  name="student_email" class="form-control @error('student_email') is-invalid @enderror"  value="{{$leed->student_email }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label>Student Phonenumber<sup>*</sup></label>
                                                            <input type="number" class="form-control" name="student_phone" class="form-control @error('student_phone') is-invalid @enderror"  value="{{$leed->student_phone }}"  required>
                                                            @error('student_phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Student Gender</label>
                                                            <select class="form-control" name="student_gender" name="student_gender" class="form-control @error('student_gender') is-invalid @enderror"  value="{{$leed->student_gender}}">
                                                                <option value="Female">Female</option>
                                                                <option VALUE="Male">Male</option>
                                                                <option VALUE="Other">Other</option>
                                                            </select>
                                                            @error('student_gender')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label>Student School</label>
                                                            <input type="text" class="form-control" name="student_school" value="{{$leed->student_school}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Student Form</label>
                                                            <select class="form-control" name="student_form">
                                                                <option value="{{$leed->student_form}}">{{$leed->student_form}}</option>
                                                                <option VALUE="Form One">Form One</option>
                                                                <option VALUE="Form Two">Form Two</option>
                                                                <option VALUE="Form Three">Form Three</option>
                                                                <option VALUE="Form Three">Form Three</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label>Parent fullname</label>
                                                            <input type="text" class="form-control" name="parent_name" value="{{$leed->parent_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label>Parent Phonenumber</label>
                                                            <input type="text" class="form-control" name="parent_phone" value="{{$leed->parent_phone}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Which Course are you interested in ?<sup>*</sup></label>
                                                            <select class="form-control" name="course_register_for" required>
                                                                <option value="{{$leed->course_register_for}}">{{$leed->course_register_for}}</option>
                                                                <option value="Fullstack Web Development">Fullstack Web Development</option>
                                                                <option value="Android App Development">Android App Development</option>
                                                                <option value="Python Programming">Python Programming</option>
                                                                <option value="Graphic Design">Graphic Design</option>
                                                                <option value="UI/UX Design">UI/UX Design</option>
                                                                <option value="Digital Marketing">Digital Marketing</option>
                                                                <option value="Cyber Security">Cyber Security </option>
                                                                <option value="Data Analysis">Data Analysi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                               <!-- <div class="row">
                                                    <div class="col-sm-6">
                                                       
                                                        <div class="form-group">
                                                            <label>PARENT EMAIL</label>
                                                            <input type="email" class="form-control" name="parent_email" value="{{$leed->parent_email}}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                       
                                                        <div class="form-group">
                                                            <label>STUDENT RESIDENCE</label>
                                                            <input type="text" class="form-control" name="student_location" value="{{$leed->parent_location}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                      
                                                        <div class="form-group">
                                                            <label>COMMENT</label>
                                                            <textarea class="form-control" rows="3" name="comment">{{$leed->comment}}</textarea>
                                                    </div>
                                                    </div>
                                                </div>-->

                                        
                                        </div>
                                        <!-- /.card-body -->

                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger"><i class="las la-times"></i>Close</button>
                                                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                            <!--end update leed-->

                             <!--update leed-->
                             <div class="modal fade" id="scholarshipLetter_old{{$leed->id}}" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Scholarship Letter</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <center>
                                                <img src="{{asset('logo/logo1.jpeg')}}" width="30%">
                                                <p style="border-bottom:3px solid #000033">
                                                    <b>
                                                    View Park Towers 17th Floor, University way | P. O. Box 1334-00618, Nairobi<br>
                                                    Web: <a href="https://techsphereinstitute.co.ke/stdadm/public/" style="color:blue">https://techsphereinstitute.co.ke/stdadm/public/</a> | Email: <span style="color:blue">Info@techsphereinstitute.co.ke </span>| <br>
                                                    Phone: <span style="color:#3ccccc">+254768919307</span>
                                                    </b>
                                                </p>
                                            </center>
                                            <h6><b>Dear {{$leed->student_fullname}}</b></h6>
                                            <p></p>
                                            <h6><b style="border-bottom:3px solid #000033">11<sup>th</sup> November 2024 Upskilling Program</b></h6>
                                          
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger"><i class="las la-times"></i>Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                            <!--end update leed-->


                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!--add modal-->
<!--update profile image-->
<div class="modal fade" id="addLeddModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Add New Student</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form role="form" method="POST" action="{{route('addLeed')}}">
            @csrf
        <!-- /.card-header -->
        <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Student fullname <sup class="supLeed">*</sup></label>
                            <input type="text"  name="student_fullname"  class="form-control @error('student_fullname') is-invalid @enderror"  value="{{ old('student_fullname') }}" required>
                            @error('student_fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Student Email</label>
                            <input type="email" class="form-control"  name="student_email" class="form-control @error('student_email') is-invalid @enderror"  value="{{ old('student_email') }}">
                            @error('student_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Student Phonenumber<sup class="supLeed">*</sup></label>
                            <input type="number" class="form-control" name="student_phone" class="form-control @error('student_phone') is-invalid @enderror"  value="{{ old('student_phone') }}"  required>
                            @error('student_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Student Gender <sup class="supLeed">*</sup></label>
                            <select class="form-control" name="student_gender" name="student_gender" class="form-control @error('student_gender') is-invalid @enderror"  value="{{ old('student_gender') }}">
                                <option value="">Select ..</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('student_gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Student School <sup class="supLeed">*</sup></label>
                            <select class="form-control" name="school_id">
                                <option value="{{$school->id}}">{{$school->school_name}}</option>
                            </select>
                            <!--<input type="text" class="form-control" name="student_school">-->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Student Class <sup class="supLeed">*</sup></label>
                            <select class="form-control" name="student_form" required>
                                <option value="">Select ..</option>
                                <option value="Form one">Form One</option>
                                <option VALUE="Form Two">Form Two</option>
                                <option VALUE="Form Three">Form Three</option>
                                <option VALUE="Form Four">Form Four</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Parent Fullname</label>
                            <input type="text" class="form-control" name="parent_name" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Parent phonenumber</label>
                            <input type="text" class="form-control" name="parent_phone" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Which Course are you interested in ? <sup class="supLeed">*</sup> </label>
                            <select class="form-control" name="course_register_for" required>
                                <option value="">Select ...</option>
                                <option value="Fullstack Web Development">Fullstack Web Development</option>
                                <option value="Android App Development">Android App Development</option>
                                <option value="Python Programming">Python Programming</option>
                                <option value="Graphic Design">Graphic Design</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Cyber Security">Cyber Security </option>
                                <option value="Data Analysis">Data Analysi</option>
                            </select>
                        </div>
                    </div>
                </div>

            
                <!--<div class="row">
                    <div class="col-sm-6">
                       
                        <div class="form-group">
                            <label>PARENT EMAIL</label>
                            <input type="email" class="form-control" name="parent_email" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                       
                        <div class="form-group">
                            <label>STUDENT RESIDENCE</label>
                            <input type="text" class="form-control" name="student_location" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                     
                        <div class="form-group">
                            <label>COMMENT</label>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                      </div>
                    </div>
                </div>-->



                <!-- input states -->
                
           
        </div>
        <!-- /.card-body -->

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger"><i class="las la-times"></i>Close</button>
                <button type="submit" class="btn btn-success"><i class="las la-plus"></i>Save</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--studentskills-->

<!--end add modal-->


<!--error-->
@if ($errors->any())
    <div id="flash-message" class="alert alert-danger alert-dismissible position-fixed" style="top: 40px; right: 20px; z-index: 9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Faile. Please check the form  for errors
    </div>
@endif

@endsection

<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // setTimeout function to hide the flash message after 5 seconds
        setTimeout(function() {
            $('#flash-message').fadeOut('fast');
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>

<script>

$(document).ready(function() {
    $('#printScholarshipLetter{{$leed->id}}').click(function() {
        // Get the content of the modal-body
        var content = $('#scholarshipLetter{{$leed->id}} .modal-body').html();

        // Create a new window for printing
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');
        
        // Wait for the new window to load the content
        printWindow.document.close(); // Close the document
        printWindow.focus(); // Focus on the new window

        // Print the content
        printWindow.print();
        printWindow.close(); // Close the print window after printing
    });
});



</script>