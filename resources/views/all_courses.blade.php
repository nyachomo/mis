@extends('layouts.frontend')
@section('content')

<!-- Page Title -->
<section class="page-title" style="height:30px;background-color:#000033;padding-top:15px">
    <div class="auto-container">
        <h2>Courses</h2>
        <ul class="bread-crumb clearfix">
            <li><a href="index.html">Home</a></li>
            <li>Courses</li>
        </ul>
    </div>
</section>
<!-- End Page Title -->


<!-- Services One -->
<section class="services-one" style="padding-top:20px;padding-bottom:10px">
    <div class="auto-container">
       
        <div class="row clearfix">

           
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
				<div class="team-two_block" >
					<div class="team-two_block-inner" style="border-radius:10px">
						<div class="team-two_block-image">
							<a href="#"><img src="{{asset('images/web.jpg')}}" alt="" /></a>
						</div>
						<div class="team-two_block-content-1" style="padding-left:20px;padding-top:20px">
							<center>
                                <h6><b style="color:#fe730c">Fullstack Web Development</b></h6>
                                Price
                            </center>
							<p>
                                Full cost <b>KES <del>100,000</del></b> Discounted <b class="text-success">KES 45,000</b>
                            </p>
                            <p><center>This 3-month training program arms you with the tools for crafting modern, interactive and responsive web applications.</center></p>
							
                            <p><center><b style="color:#fe730c">Learn More -></b></center></p>
						</div>
                        <div class="team-two_block-image" style="background-color:#000033;padding-top:10px;padding-bottom:10px">
                            <center>
                                  <a href="{{route('apply')}}" class="btn btn-success courseApplyBtn">Apply Now</a>
                            </center>
                        </div>
					</div>
				</div>

            </div>

            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
				<div class="team-two_block" >
					<div class="team-two_block-inner" style="border-radius:10px">
						<div class="team-two_block-image">
							<a href="#"><img src="{{asset('images/web.jpg')}}" alt="" /></a>
						</div>
						<div class="team-two_block-content-1" style="padding-left:20px;padding-top:20px">
							<center>
                                <h6><b style="color:#fe730c">Android App Developemt</b></h6>
                                Price
                            </center>
							<p>
                                Full cost <b>KES <del>100,000<del></b> Discounted <b class="text-success">KES 45,000</b>
                            </p>
                            <p><center>Learn how to design, develop, test and maintain mobile applications using the latest tools and technologies in the field.</center></p>
							
                            <p><center><b style="color:#fe730c">Learn More -></b></center></p>
						</div>
                        <div class="team-two_block-image" style="background-color:#000033;padding-top:10px;padding-bottom:10px">
                            <center>
                                  <a href="{{route('apply')}}" class="btn btn-success courseApplyBtn">Apply Now</a>
                            </center>
                        </div>
					</div>
				</div>

            </div>

           
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
				<div class="team-two_block" >
					<div class="team-two_block-inner" style="border-radius:10px">
						<div class="team-two_block-image">
							<a href="#"><img src="{{asset('images/web.jpg')}}" alt="" /></a>
						</div>
						<div class="team-two_block-content-1" style="padding-left:20px;padding-top:20px">
							<center>
                                <h6><b style="color:#fe730c">Cyber Security</b></h6>
                                Price
                            </center>
							<p>
                                Full cost <b>KES <del>100,000<del></b> Discounted <b class="text-success">KES 45,000</b>
                            </p>
                            <p><center>A comprehensive programme designed to equip learners with the essential skills and knowledge to excel in cybersecurity field.</center></p>
							
                            <p><center><b style="color:#fe730c">Learn More -></b></center></p>
						</div>
                        <div class="team-two_block-image" style="background-color:#000033;padding-top:10px;padding-bottom:10px">
                            <center>
                                  <a href="{{route('apply')}}" class="btn btn-success courseApplyBtn">Apply Now</a>
                            </center>
                        </div>
					</div>
				</div>

            </div>


            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
				<div class="team-two_block" >
					<div class="team-two_block-inner" style="border-radius:10px">
						<div class="team-two_block-image">
							<a href="#"><img src="{{asset('images/web.jpg')}}" alt="" /></a>
						</div>
						<div class="team-two_block-content-1" style="padding-left:20px;padding-top:20px">
							<center>
                                <h6><b style="color:#fe730c">Digital Marketing</b></h6>
                                  Price
                            </center>
							<p>
                                Full cost <b>KES <del>100,000<del></b> Discounted <b class="text-success">KES 45,000</b>
                            </p>
                            <p><center>You will learn a wide range of strategies and channels to promote products or services online which includes techniques like search engine optimization (SEO)</center></p>
							
                            <p><center><b style="color:#fe730c">Learn More -></b></center></p>
						</div>
                        <div class="team-two_block-image" style="background-color:#000033;padding-top:10px;padding-bottom:10px">
                            <center>
                                  <a href="{{route('apply')}}" class="btn btn-success courseApplyBtn">Apply Now</a>
                            </center>
                        </div>
					</div>
				</div>

            </div>


            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
				<div class="team-two_block" >
					<div class="team-two_block-inner" style="border-radius:10px">
						<div class="team-two_block-image">
							<a href="#"><img src="{{asset('images/web.jpg')}}" alt="" /></a>
						</div>
						<div class="team-two_block-content-1" style="padding-left:20px;padding-top:20px">
							<center>
                                <h6><b style="color:#fe730c">Data Analysis</b></h6>
                                  Price
                            </center>
							<p>
                                Full cost <b>KES <del>100,000<del></b> Discounted <b class="text-success">KES 45,000</b>
                            </p>
                            <p><center>Learn data analysis, machine learning, AI and data visualization to extract knowledge from vast amounts of information.</center></p>
							
                            <p><center><b style="color:#fe730c">Learn More -></b></center></p>
						</div>
                        <div class="team-two_block-image" style="background-color:#000033;padding-top:10px;padding-bottom:10px">
                            <center>
                                  <a href="{{route('apply')}}" class="btn btn-success courseApplyBtn">Apply Now</a>
                            </center>
                        </div>
					</div>
				</div>

            </div>

          
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
				<div class="team-two_block" >
					<div class="team-two_block-inner" style="border-radius:10px">
						<div class="team-two_block-image">
							<a href="#"><img src="{{asset('images/web.jpg')}}" alt="" /></a>
						</div>
						<div class="team-two_block-content-1" style="padding-left:20px;padding-top:20px">
							<center>
                                <h6><b style="color:#fe730c">Python Programming</b></h6>
                                  Price
                            </center>
							<p>
                                Full cost <b>KES <del>100,000<del></b> Discounted <b class="text-success">KES 45,000</b>
                            </p>
                            <p><center> Python has a rich ecosystem of libraries and frameworks, making it ideal for web development, data analysis, artificial intelligence, and more</center></p>
							
                            <p><center><b style="color:#fe730c">Learn More -></b></center></p>
						</div>
                        <div class="team-two_block-image" style="background-color:#000033;padding-top:10px;padding-bottom:10px">
                            <center>
                                  <a href="{{route('apply')}}" class="btn btn-success courseApplyBtn">Apply Now</a>
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