@extends('layouts.frontend')
@section('content')

<!-- Page Title -->
<section class="page-title" style="height:200px">
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
<section class="services-one" style="background-image:url(images/background/pattern-2.png)">
    <div class="auto-container">
       
        <div class="row clearfix">

            <!-- Service Block One -->
            <div class="service-block_one col-lg-12 col-md-6 col-sm-12">
               

            <!-- Team Block Two -->
				<div class="team-two_block" >
					<div class="team-two_block-inner" style="border-radius:10px">
						
						<div class="team-two_block-content-1" style="padding:20px">
                            <div class="row">
                           
                                <div class="col-lg-6 form-group">
                                    <label>Firstname *</label>
                                    <input type="text" name="username" placeholder="Jhon Doe" class="form-control" required="">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label>Secondname *</label>
                                    <input type="text" name="username" placeholder="Jhon Doe" class="form-control" required="">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label>Surname *</label>
                                    <input type="text" name="username" placeholder="Jhon Doe" class="form-control" required="">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label>Email Address *</label>
                                    <input type="email" name="username"  class="form-control" required="">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label>Phonenumber *</label>
                                    <input type="text" name="phonenumber"  class="form-control" required="">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select ..</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                               

                                <div class="col-lg-8 form-group">
                                    <label>Which course are you applying for</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select ..</option>
                                        <option value="High School">High School</option>
                                        <option value="Certificate">Certificate</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Degree">Degree</option>
                                        <option value="Master">Master</option>
                                        <option value="Phd">Phd</option>
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

         
        </div>

       

    </div>
</section>
<!-- End Services One -->
@endsection