@extends('layouts.frontend')
@section('content')

<!-- Page Title -->
<section class="page-title" style="height:30px;background-color:#000033;padding-top:15px">
    <div class="auto-container">
    <h4 style="color:white">Enrol</h4>
        <ul class="bread-crumb clearfix">
            <li><a href="index.html">Home</a></li>
            <li>Enrol</li>
        </ul>
    </div>
</section>
<!-- End Page Title -->


<!-- Services One -->
<section class="services-one" style="padding-top:20px;padding-bottom:10px">
    <div class="auto-container">
       
        <div class="row clearfix">

            <!-- Service Block One -->
            <div class="service-block_one col-lg-6 col-md-6 col-sm-12">
               

            <!-- Team Block Two -->
				<div class="team-two_block" >
                    <form method="post" action="{{route('register')}}">
                        @csrf
                        <div class="team-two_block-inner" style="border-radius:10px">
                            
                            <div class="team-two_block-content-1" style="padding:20px">
                                <div class="row">
                            
                                    <div class="col-lg-6 form-group">
                                        <label class="formLabel"><b>Firstname </b></label>
                                        <input type="text" name="user_firstname" placeholder="John" class="form-control" required="">
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label class="formLabel"> <b>Secondname </b></label>
                                        <input type="text" name="user_secondname" placeholder="Doe" class="form-control" required="">
                                    </div>
                                </div>

                                <br>
                                <div class="row">

                                    <div class="col-lg-6 form-group">
                                        <label class="formLabel"><b>Surname </b></label>
                                        <input type="text" name="user_surname" placeholder="Doe" class="form-control" required="">
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label class="formLabel"><b>Email Address </b></label>
                                        <input type="email" name="email"  placeholder="johndoe@gmail.com" class="form-control" required="">
                                    </div>

                                     <!--Password-->
                                    <input type="password" name="password"  class="form-control" value="12345678" hidden="true">
                                    <!--end of password-->
                                 

                                </div>

                                <br>

                                <div class="row">

                                    <div class="col-lg-6 form-group">
                                        <label class="formLabel"><b>Phonenumber</b></label>
                                        <input type="text" name="user_phonenumber"  placeholder="07xxxxxxxx" class="form-control" required="">
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label class="formLabel"><b>Gender</b></label>
                                        <select class="form-control" name="gender">
                                            <option value="">Select ..</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                </div>

                                <br>
                                <div class="row">

                                <div class="col-lg-12 form-group">
                                        <label class="formLabel"><b>Which course are you applying for</b></label>
                                        <select class="form-control" name="gender">
                                            <option value="">Select ..</option>
                                            <option value="Fullstack Web Development">Fulstack Web Developemt</option>
                                            <option value="Android App Development">Android App Development</option>
                                            <option value="Cyber Security">Cyber Security</option>
                                            <option value="Digital Marketing">Digital Marketing</option>
                                            <option value="Data Analysis">Data Analysis</option>
                                            <option value="Python Programing">Python Programming</option>
                                        </select>
                                    </div>


                                </div>


                            </div>
                            <div class="team-two_block-image" style="background-color:#000033;padding-top:10px;padding-bottom:10px">
                                <center>
                                    <button type="submit" class="btn btn-success courseApplyBtn" >Enrol Now</button>
                                </center>
                            </div>
                        </div>
                    </form>
				</div>


            </div>


            <!-- Content Column -->
            <div class="about-one_content-column col-lg-6 col-md-12 col-sm-12" style="background-color:#000033;border-radius:20px;">
                <div class="about-one_content-inner" style="padding-top:10px">
                    <center><h4 class="sec-title_heading" style="color:white">How to pay</h4></center>
                    <!-- Sec Title -->
                    <div class="about-one_text">
                         <b><h6>Bank</h6></b>
                         <br>
                         Bank: Kenya Comercial Bank<br>
                         Acc Name: Techsphere Institute<br>
                         Acc No: 1327338564
                    </div>

                    <div class="about-one_text">
                         <b><h6>Mpesa</h6></b>
                         <br>
                         Business Name: Techsphere Training Institute<br>
                         Paybill: 522533<br>
                         Acc No: 7855887
                    </div>
                   
                </div>
            </div>




         
        </div>

       

    </div>
</section>
<!-- End Services One -->
@endsection