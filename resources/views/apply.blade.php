@extends('layouts.frontend')
@section('content')

<!-- Page Title -->
<section class="page-title" style="height:30px;background-color:#000033;padding-top:15px">
    <div class="auto-container">
        <h2>Apply</h2>
        <ul class="bread-crumb clearfix">
            <li><a href="index.html">Home</a></li>
            <li>Apply</li>
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
					<div class="team-two_block-inner" style="border-radius:10px">
						
						<div class="team-two_block-content-1" style="padding:20px">
                            <div class="row">
                           
                                <div class="col-lg-6 form-group">
                                    <label class="formLabel"><b>Firstname </b></label>
                                    <input type="text" name="username" placeholder="John" class="form-control" required="">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="formLabel"> <b>Secondname </b></label>
                                    <input type="text" name="username" placeholder="Doe" class="form-control" required="">
                                </div>
                            </div>

                            <br>
                            <div class="row">

                                <div class="col-lg-6 form-group">
                                    <label class="formLabel"><b>Surname </b></label>
                                    <input type="text" name="username" placeholder="Doe" class="form-control" required="">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="formLabel"><b>Email Address </b></label>
                                    <input type="email" name="username"  placeholder="johndoe@gmail.com" class="form-control" required="">
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-lg-6 form-group">
                                    <label class="formLabel"><b>Phonenumber</b></label>
                                    <input type="text" name="phonenumber"  placeholder="07xxxxxxxx" class="form-control" required="">
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
                                  <a href="#" class="btn btn-success courseApplyBtn">Apply Now</a>
                            </center>
                        </div>
					</div>
				</div>


            </div>


            <!-- Content Column -->
            <div class="about-one_content-column col-lg-6 col-md-12 col-sm-12" style="background-color:#000033;border-radius:20px;">
                <div class="about-one_content-inner" style="padding-top:10px">
                    <h2 class="sec-title_heading" style="color:white">How to pay</h2>
                    <!-- Sec Title -->
                    <div class="about-one_text">
                         <b><h6>Bank Details</h6></b>
                         <br>
                         Bank: Kenya Comercial bank<br>
                         Acc Name: Techsphere Institute<br>
                         Acc No:
                    </div>
                   
                </div>
            </div>




         
        </div>

       

    </div>
</section>
<!-- End Services One -->
@endsection