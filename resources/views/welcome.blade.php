@extends('layouts.frontend')
@section('content')
<!-- Main Slider -->
<section class="slider-four" style="padding-bottom:40px">
	<img src="{{asset('frontend/images/main-slider/advert1.jpg')}}">
</section>
<!-- End Main Slider -->


<!-- About One / Style Two -->
<section class="slider-four" style="padding-left:20px;padding-right:20px">
			<div class="row clearfix">

				<!-- Content Column -->
				<div class="about-one_content-column col-lg-5 col-md-12 col-sm-12" style="background-color:#000033;border-radius:20px;">
					<div class="about-one_content-inner">
						<!-- Sec Title -->
						<div class="sec-title">
							<!--<div class="sec-title_title">About us</div>-->
							<h2 class="sec-title_heading" style="color:white">Start Your digital Skills Career Today</h2>
						</div>
						<div class="about-one_text"> Ready to break into the world of tech? Techsphere Training Institute offers intensive bootcamps designed to equip you with the skills needed to land a fulfilling </div>
						<div class="about-one_text">Our programs cover everything from foundational concepts to industry best practices, preparing you to confidently tackle real-world challenges. </div>
					</div>
				</div>

				<!-- Image Column -->
				<div class="about-one_image-column col-lg-7 col-md-12 col-sm-12">
					<div class="about-one_image-inner">
						<div class="row">
							<div class="about-one_image-column col-lg-6 col-md-12 col-sm-12">
								<img src="{{asset('frontend/images/main-slider/slider5.jpeg')}}">
							</div>
							<div class="about-one_image-column col-lg-6 col-md-12 col-sm-12">
								<img src="{{asset('frontend/images/main-slider/slider6.jpeg')}}">
							</div>
						</div>
						<div class="row" style="padding-top:20px"> 
							<div class="service-block_one col-lg-4 col-md-6 col-sm-12">
								<div class="service-block_one-inner" style="background-color:#3ccccc;border-radius:20px">
									<div class="service-block_one-icon flaticon-website" style="background-color:#000033"></div>
									
									<div class="service-block_one-text" style="color:white;">Learn on demand skills needed by employers and business</div>
								</div>
							</div>

							<div class="service-block_one col-lg-4 col-md-6 col-sm-12">
								<div class="service-block_one-inner" style="background-color:#fe730c;border-radius:20px">
									<div class="service-block_one-icon flaticon-market" style="background-color:#3ccccc"></div>
									
									<div class="service-block_one-text" style="color:white;">No previous coding experience required to join us</div>
								</div>
							</div>

							<div class="service-block_one col-lg-4 col-md-6 col-sm-12">
								<div class="service-block_one-inner" style="background-color:#000033;border-radius:20px">
									<div class="service-block_one-icon flaticon-bank-building-silhouette" style="background-color:#fe730c"></div>
									
									<div class="service-block_one-text" style="color:white;">With the skills, find opportunities and work anywhere</div>
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

	