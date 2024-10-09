<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>TechSphere Training Institute</title>
<!-- Stylesheets -->
<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&display=swap" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<style>
	.navLink{
		color:#000033 !important;
	}
	.dropdownItem{
		background-color:#000033 !important;
	}
	.dropdownLink{
		color:white !important;
	}

	.dropdownLink:hover{
		color:#3ccccc !important;
	}
	.about-one_text{
		color:white !important
	}

	.courseApplyBtn{
		  border:1px solid #3ccccc;
		  width:200px;
		  border-radius:50px;
		  background-color:#3ccccc !important;
	}

	.formLabel{
		font-size:15px;
		color:#000033;
	}
</style>
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>
	<!-- End Preloader -->

 	<!-- Main Header -->
    <header class="main-header">

		<!-- Header Upper -->
        <div class="header-upper" style="background-color:#000033">
            <div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
					<!-- Logo Box 
					<div class="logo"><a href="#"><img src="{{asset('logo/logo1.jpeg')}}" style="width:200px"></a></div>-->

					<!-- Upper Right -->
					<div class="upper-right d-flex align-items-center flex-wrap">
                        <!-- Info Box -->
						<div class="upper-column info-box">
							<div class="icon-box flaticon-pin" style="color:white"></div>
							<strong style="color:#3ccccc">Address</strong>
                            <span style="color:white">PO BOX 610,NAIROBI</span>
						</div>

						<!-- Info Box -->
						<div class="upper-column info-box">
							<div class="icon-box flaticon-mail" style="color:white"></div>
							<strong style="color:#3ccccc">Mail Us</strong>
							<span style="color:white">info@techsphereinstitute.co.ke</span>
						</div>
                        <!-- Info Box -->
						<div class="upper-column info-box">
							<div class="icon-box flaticon-phone-call" style="color:white"></div>
							<strong style="color:#3ccccc">Call Us</strong>
                            <span style="color:white">+254768919307</span>
						</div>
						<!-- Info Box -->
						<div class="upper-column info-box">
							<div class="icon-box flaticon-clock" style="color:white"></div>
							<strong style="color:#3ccccc">Open</strong>
                            <span style="color:white">Monday-Friday (8:00am - 5:00pm)</span>
						</div>
						
						<!-- Info Box -->
						<div class="upper-column info-box">
							
						</div>
					</div>

				</div>
			</div>
		</div>

        <!-- Header Lower -->
        <div class="header-lower">

			<div class="auto-container">
				<div class="inner-container">

					<div class="nav-outer d-flex justify-content-between align-items-center flex-wrap">
                        
					   <!-- <div class="logo"><a href="#"><img src="{{asset('logo/logo1.jpeg')}}" style="width:200px"></a></div>-->


						<!-- Main Menu -->
						<nav class="main-menu show navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li><a href="{{url('/')}}" class="navLink">Home</a></li>
									<li><a href="{{route('about_us')}}" class="navLink">About Us</a></li>
									<li><a href="{{route('all_courses')}}" class="navLink">Courses</a></li>
									<li><a href="{{route('apply')}}" class="navLink">Enrol</a></li>
									<li><a href="{{route('login')}}" class="navLink">Login</a></li>
								</ul>
							</div>

						</nav>
						<!-- Main Menu End-->

						<div class="outer-box d-flex align-items-center">

							

							<!-- Button Box
							<div class="button-box">
								<a href="{{route('login')}}" class="btn-style-one theme-btn btn-item" href="#" style="background-color: #33cccc;border-radius:5px;">
									<div class="btn-wrap">
										<span class="text-one">Login<i class="fa-solid fa-arrow-right fa-fw"></i></span>
										<span class="text-two">Login<i class="fa-solid fa-arrow-right fa-fw"></i></span>
									</div>
								</a>
							</div>--> 

						</div>

						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

					</div>

				</div>

			</div>
        </div>
        <!-- End Header Lower -->
    </header>
    <!-- End Main Header -->
 @yield('content')
   

	<!-- Footer -->
	<footer class="main-footer" style="background-color:#000033">
		<div class="auto-container">
			<!-- Widgets Section -->
			<div class="widgets-section">
				<div class="row clearfix">

					<!-- Big Column -->
					<div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">

							<!-- Footer Column -->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget logo-widget">
									<div class="logo">
										<a href="index.html"><img src="{{asset('logo/logo1.jpeg')}}" alt="" /></a>
									</div>
									<div class="text">Empowering Mind, Securing Feture</div>
									<!--<a href="#" class="theme-btn about-btn">About us</a>-->
								</div>
							</div>

							<!-- Footer Column -->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget newsletter-widget">
									<h5 style="color:white">Find Us At</h5>
									<p style="border-bottom:3px solid #fe730c;width:118px"></p>
									<ul class="contact-list">
										<li><span class="icon fa fa-map-marker" style="color:#3ccccc"></span> <span style="color:white">View park towers,<br>University way, Nairobi</span></li>
										<li><span class="icon fa fa-phone" style="color:#3ccccc"></span> <span style="color:white">+254768919307</span></li>
										<li><span class="icon fa fa-envelope" style="color:#3ccccc"></span> <span style="color:white">info@techsphereinstitute.co.ke</span></li>
										<li><span class="icon fa fa-mobile" style="color:#3ccccc"></span> <span style="color:white">+254768919307</span></li>
									</ul>
									
								</div>
							</div>

						</div>
					</div>

					<!-- Big Column -->
					<div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">

							<!-- Footer Column -->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget contact-widget">
								<h5 style="color:white">Training Categories</h5>
								<p style="border-bottom:3px solid #fe730c;width:200px"></p>
									<ul class="contact-list">
										<li><span style="color:#3ccccc;font-size:50px">. </span> <span style="color:white">Data</span></li>
										<li><span style="color:#3ccccc;font-size:50px">. </span> <span style="color:white">Software</span></li>
										<li><span style="color:#3ccccc;font-size:50px">. </span> <span style="color:white">Security</span></li>
										<li><span style="color:#3ccccc;font-size:50px">. </span> <span style="color:white">Design</span></li>
										<li><span style="color:#3ccccc;font-size:50px">. </span> <span style="color:white">Marketing</span></li>
									</ul>
									
								</div>
							</div>

							<!-- Footer Column -->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget instagram-widget">
									<!--<h4>Instagram</h4>-->
									<div class="widget-content">
										<div class="images-outer clearfix">
											<div class="card">
												<div class="card-header" style="background-color:#3ccccc">
													<p><b>Post from @techsphereinstitute</b></p>
												</div>
												<div class="card-body">
												   <br>
												   <img src="{{ asset('frontend/images/main-slider/twitter.png')}}" style="width:15%">
												   <br><br>
                                                   <h5><b>Nothing to see <br>here-yet</b></h5>
												   <br><br>
												   <p>When they post, their posts will show up here.</p>

												   <a class="btn btn-lg btn-info" style="color:white;border-radius:50px;">View on X</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<div class="footer-bottom">
				<div class="copyright" style="color:white;">2024 &copy; Copyright 2024 Techsphere Training Institute. All Rights Reserved.</div>
			</div>

		</div>
	</footer>
	<!-- Footer -->

	<!-- Search Popup -->
	<div class="search-popup">
		<div class="color-layer"></div>
		<button class="close-search"><span class="fas fa-times fa-fw"></span></button>
		<form method="post" action="blog.html">
			<div class="form-group">
				<input type="search" name="search-field" value="" placeholder="Search Here" required="">
				<button type="submit"><i class="flaticon-search"></i></button>
			</div>
		</form>
	</div>
	<!-- End Search Popup -->

</div>
<!-- End PageWrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-long-arrow-up fa-fw"></span></div>

<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/appear.js')}}"></script>
<script src="{{asset('frontend/js/owl.js')}}"></script>
<script src="{{asset('frontend/js/wow.js')}}"></script>
<script src="{{asset('frontend/js/odometer.js')}}"></script>
<script src="{{asset('frontend/js/mixitup.js')}}"></script>
<script src="{{asset('frontend/js/knob.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/parallax-scroll.js')}}"></script>
<script src="{{asset('frontend/js/parallax.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</body>
</html>