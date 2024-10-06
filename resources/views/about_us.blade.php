@extends('layouts.frontend')
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="height:200px">
        <div class="auto-container">
			<h2>About Us</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="index.html">Home</a></li>
				<li>About Us</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

    <br>

    <!-- About One / Style Two -->
	<section class="slider-four" style="padding-left:20px;padding-right:20px">
        <div class="row clearfix">

           
             <!-- Content Column -->
             <div class="about-one_content-column col-lg-5 col-md-12 col-sm-12" style="background-color:#000033;border-radius:20px;">
                <div class="about-one_content-inner">
                    <!-- Sec Title -->
                    <div class="sec-title">
                        <!--<div class="sec-title_title">About us</div>-->
                        <h2 class="sec-title_heading" style="color:white">Welcome to Techsphere Training Institute</h2>
                    </div>
                    <div class="about-one_text">
                         We offer comprehensive programs in Full Stack Web Development, Data Science, Cyber Security, Graphic Design, and Mobile Web Development. Our high-quality, accessible training is designed to meet the needs of learners at any level, regardless of their background or personal circumstances. With expert instructors and a hands-on approach, we equip emerging tech professionals with the practical skills needed to succeed in the tech industry and adapt as their careers evolve. At Techsphere Training Institute, we are committed to fostering innovation, inclusivity, and excellence, building a community of future tech leaders who will drive Africa's digital transformation.
                    </div>
                   
                </div>
            </div>

            
            <!-- Image Column -->
            <div class="about-one_image-column col-lg-7 col-md-12 col-sm-12">
                <div class="about-one_image-inner">
                    <div class="row">
                        <div class="about-one_image-column col-lg-12 col-md-12 col-sm-12">
                            <img src="{{asset('frontend/images/main-slider/slider5.jpeg')}}">
                        </div>
                    </div>

                    <br>

                    <div class="row clearfix">

                       <center><h3> Our Training Model</h3></center>
                       <br> <br>
                        <!-- Progress Info -->
                        <div class="progress-info col-lg-4 col-md-4 col-sm-12">
                            <div class="progress-info_inner">
                                <div class="progress-info_title">
                                    <span class="progress-info_icon flaticon-shield text-info"></span>
                                    <h6>Hands on skills training</h6>
                                </div>
                                <div class="progress-info_text">
                                    We are offering hands-on skill training designed to equip individuals with practical experience and expertise in various fields
                                    Our programs emphasize real-world applications, allowing participants to engage in interactive learning through collaborative projects. 
                                </div>
                            </div>
                        </div>

                        <!-- Progress Info -->
                        <div class="progress-info col-lg-4 col-md-4 col-sm-12">
                            <div class="progress-info_inner">
                                <div class="progress-info_title">
                                    <span class="progress-info_icon flaticon-profit text-warning"></span>
                                    <h6>Project based attachment</h6>
                                </div>
                                <div class="progress-info_text">
                                    We are offering project-based attachment opportunities that provide participants with the chance to work on real-world projects while gaining valuable industry experience.
                                    This hands-on approach allows individuals to apply their academic knowledge in practical settings,
                                </div>
                            </div>
                        </div>

                         <!-- Progress Info -->
                         <div class="progress-info col-lg-4 col-md-4 col-sm-12">
                            <div class="progress-info_inner">
                                <div class="progress-info_title">
                                    <span class="progress-info_icon flaticon-shield text-success"></span>
                                    <h6>Industry career mentorship</h6>
                                </div>
                                <div class="progress-info_text">We are offering industry career mentorship designed to guide individuals through the complexities of their professional journeys. Our mentorship program connects participants with experienced professionals who provide personalized advice, support, and insights tailored to their career goals</div>
                            </div>
                        </div>

                    </div>


                   
                </div>
            </div>



        </div>
	</section>
	<!-- End About One -->
	 <br>

@endsection