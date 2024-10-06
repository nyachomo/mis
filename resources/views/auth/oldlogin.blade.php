@extends('layouts.frontend')

@section('content')
<!-- About One / Style Two -->
<section class="slider-four" style="padding-left:20px;padding-right:20px">
				<div class="row clearfix">

					<!-- Content Column -->
					<div class="about-one_content-column col-lg-3 col-md-12 col-sm-12"></div>
						
					

					<!-- Image Column -->
					<div class="about-one_image-column col-lg-6 col-md-12 col-sm-12">
						

                        <div class="callback-form_inner" style="background-color:#000033">
                            <div class="sec-title-three light">
                              
                                <h2 class="sec-title-three_heading">Login to continue</h2>
                            </div>

                            <!-- Default Form -->
                            <div class="default-form style-two">
                                <form method="post"  method="POST" action="{{route('login')}}">
                                    @csrf

                                    <div class="form-group">
                                        <span class="field-icon fa-solid fa-user fa-fw"></span>
                                        <input type="email" name="email" placeholder="Your Email" required="">
                                    </div>

                                    <div class="form-group">
                                        <span class="field-icon fa-solid fa-envelope fa-fw"></span>
                                        <input type="password" name="password" placeholder="Your Password" required="">
                                    </div>

                                  

                                    <div class="form-group">
                                        <button type="submit" class="request-btn theme-btn">
                                            Login
                                        </button>
                                    </div>

                                </form>
                            </div>
                            <!-- End Default Form -->

                        </div>

					</div>

                    <div class="about-one_content-column col-lg-3 col-md-12 col-sm-12"></div>

				</div>
	</section>
   
	<!-- End About One -->
@endsection
