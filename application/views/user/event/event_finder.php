<style>
.carousel-inner img{
	width: 60% !important;
	height: 48% !important;
}
@media screen and (max-width: 992px){
	.carousel-inner img{
	width: 30% !important;
    height: 47% !important;
}
}
@media screen and (max-width: 660px){
	.carousel-inner img{
	width: 43% !important;
    height: 44% !important;
}
.carousel-inner{
	height: 180px;
}
}
</style>
<div class="container-fluid pt-4">
	<form action="">
		<div class="row mt-4 no-gutters">
			<div class="col-lg-4 col-md-12 mt-2 mr-2">
				<div class="input-with-icon border"><i class="icon fas fa-search"></i>
					<input class="form-control2 border-0" id="place-search" type="text" placeholder="Enter a location" />
				</div>
			</div>
			<div class="col-lg-5 col-md-12 d-flex mt-2">
				<select class="border custom-select mr-2" name="Radius" style="-webkit-appearance: none;">
					<option>Radius: Any</option>
					<option>5 Miles</option>
					<option>10 Miles</option>
					<option>15 Miles</option>
					<option>25 Miles</option>
					<option>50 Miles</option>
				</select>
				<select class="border custom-select" name="Category" style="-webkit-appearance: none;">
					<option>Category: All</option>
					<option value="">All Industries</option>
					<option value="">Accounting</option>
					<option value="">Advertising</option>
					<option value="">Agriculture</option>
					<option value="">Artificial Intelligence</option>
					<option value="">Banking</option>
					<option value="">Communications</option>
					<option value="">Construction</option>
					<option value="">Consulting</option>
					<option value="">Design</option>
					<option value="">Education</option>
					<option value="">Entertainment</option>
					<option value="">Engineering</option>
					<option value="">Fashion</option>
					<option value="">Financial Services</option>
					<option value="">Food</option>
					<option value="">Health</option>
					<option value="">Hospitality</option>
					<option value="">Information Technology</option>
					<option value="">Insurance</option>
					<option value="">Investment</option>
					<option value="">Manufacturing</option>
					<option value="">Marketing</option>
					<option value="">Materials</option>
					<option value="">Media</option>
					<option value="">Music</option>
					<option value="">Pharmaceutical</option>
					<option value="">Public Utilities</option>
					<option value="">Publishing</option>
					<option value="">Real Estate</option>
					<option value="">Retail</option>
					<option value="">Space</option>
					<option value="">Technology</option>
					<option value="">Telecommunications</option>
					<option value="">Transportation</option>
				</select>
			</select>
			<div class="border ml-2 custom-select2 d-flex" name="Following">
				Following<input type="checkbox" class="mt-2 ml-2">

			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
</form>

<div class="row">
	<div class="col">
		<div class="map" id="map"></div>
	</div>
</div>

<div class="row mx-2 mt-4 border_bottom2">
	<div class="col-md-12 d-flex event_heading">
		<h1>Event Finder:</h1><h2>
			<select class="border custom-select event_finder_option mt-2" name="Radius" style="-webkit-appearance: none;"></h2> 
				<option>All</option>
				<option>Arts & Entertainment</option>
				<option>Causes & Fundraisers</option>
				<option>Deals</option>
				<option>Health & Wellness</option>
				<option>Networking</option>
				<option>Night Life</option>
				<option>Online Events</option>
				<option>Promotional</option>
				<option>Political</option>
				<option>Religion</option>
				<option>Community</option>
				<option>Sports</option>
				<option>School & Education</option>
				<option>Other</option>
			</select>
		</div>
	</div>
	
	<div class="row mt-3">
		<div class="col-lg-2 col-md-3">
			
		</div>
		<div class="col-lg-8 col-md-8">
			<div class="float-right recent">
				<div class="dropdown">
					<span class="ml-2 mt-2">Sort By:</span>
					<select class="recent_button"> 
						<option value="1">All</option>  
						<option value="2">Latest</option> 
						<option>Most Recent</option> 
						<option>Most Check-in's</option>
					</select>

				</div>
			</div>
		</div>
		<div class="col-lg-2 col-md-2">
			 
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-lg-2 col-md-3">
			<div class="efinder_text pb-5 pt-3 px-2">
				<p>Find, Create, and Network through various events in your area!</p>
			</div>
			<div class="efinder_text py-3 px-2 mt-2">
				<p>Find, Create, and Network through various events in your area!</p>
			</div>
		</div>
		<div class="col-lg-8 col-md-8">
			<div class="row efinder_post">
				<div class="col-md-3">
					<img src="assets/img/slide_img1.jpg" alt="">
				</div>
				<div class="col-md-9 d-flex position-relative">
					<ul class="mt-3 event_details">
						<li class="event_title"><b><a href="#">Church Fundraiser</a></b></li>
						<li><b>2/12/20 - 2/14/20</b></li>
						<li><b>1:30pm - 3:30pm</b></li>
						<li class="event_address"><b><u><a href="#">5998 Alcala Park, San Diego, CA 92110</a></u></b></li>
					</ul>
					<ul class="mt-3 ml-auto check_button">
						<li class="float-right"><button type="button" id="myBtn" onclick="myFunction3()" class="px-4 pt-1 pb-1">Check-In</button></li>
						<li></li>
						<li class="mt-2"><span class="float-right"><i>125 Members Checked-In</i></span></li>
						<li></li>
						<li></li>
					</ul>
					<p class="position-absolute heart_position"><span class="mr-2 mt-2">42</span><i class="fa fa-heart" id="heart"></i></p>
				</div>
			</div>
			<div class="row efinder_post mt-2">
				<div class="col-md-3">
					<img src="assets/img/slide_img1.jpg" alt="">
				</div>
				<div class="col-md-9 d-flex position-relative">
					<ul class="mt-3 event_details">
						<li class="event_title"><b><a href="#">Church Fundraiser</a></b></li>
						<li><b>2/12/20 - 2/14/20</b></li>
						<li><b>1:30pm - 3:30pm</b></li>
						<li class="event_address"><b><u><a href="#">5998 Alcala Park, San Diego, CA 92110</a></u></b></li>
					</ul>
					<ul class="mt-3 ml-auto check_button">
						<li class="float-right"><button type="button" id="myBtn" onclick="myFunction()" class="px-4 pt-1 pb-1">Check-In</button></li>
						<li class="mt-2"><span class="float-right"><i>125 Members Checked-In</i></span></li>
						<li></li>
						<li></li>
					</ul>
					<p class="position-absolute heart_position"><span class="mr-2 mt-2">42</span><i class="fa fa-heart" id="heart"></i></p>
				</div>
			</div>
			<div class="row efinder_post mt-2">
				<div class="col-md-3">
					<img src="assets/img/slide_img1.jpg" alt="">
				</div>
				<div class="col-md-9 d-flex position-relative">
					<ul class="mt-3 event_details">
						<li class="event_title"><b><a href="#">Church Fundraiser</a></b></li>
						<li><b>2/12/20 - 2/14/20</b></li>
						<li><b>1:30pm - 3:30pm</b></li>
						<li class="event_address"><b><u><a href="#">5998 Alcala Park, San Diego, CA 92110</a></u></b></li>
					</ul>
					<ul class="mt-3 ml-auto check_button">
						<li class="float-right"><button type="button" id="myBtn" onclick="myFunction()" class="px-4 pt-1 pb-1">Check-In</button></li>
						<li class="mt-2"><span class="float-right"><i>125 Members Checked-In</i></span></li>
						<li></li>
						<li></li>
					</ul>
					<p class="position-absolute heart_position"><span class="mr-2 mt-2">42</span><i class="fa fa-heart" id="heart"></i></p>
				</div>
			</div>

			<div class="row mt-5 mb-5">
				<div class="col-md-12 d-flex justify-content-center align-content-center">
					<a href="" class="btn btn-success py-2 px-5 show_more_button">Show More</a>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-md-12">
			<div class="members pb-2">
				<h4>Members Near You</h4>
				<div id="demo" class="carousel slide" data-ride="carousel">



					<!-- The slideshow -->
					<div class="carousel-inner members_inner members_slider" style="height: 190px;">
						<div class="carousel-item active justify-content-center text-center">
							<img src="assets/img/user-icon.png" class="mt-2" alt="">
							<h4 class="mt-1">Mike1</h4>
							<button type="button" id="myBtn2" onclick="myFunction2()" class="px-5 mb-2 members_follow">Follow</button>
						</div>
						<div class="carousel-item justify-content-center text-center">
							<img src="assets/img/user-icon.png" class="mt-2" alt="">
							<h4 class="mt-1">Mike</h4>
							<button class="px-5 mb-2">Follow</button>
						</div>
						<div class="carousel-item justify-content-center text-center">
							<img src="assets/img/user-icon.png" class="mt-2" alt="">
							<h4 class="mt-1">Mike</h4>
							<button class="px-5 mb-2">Follow</button>
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="carousel-control-prev ml-3" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next mr-3" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>
			<div class="blog_section pb-2 mt-2">
				<div class="">
					<h4>News Blog</h4>
					<div id="demo2" class="carousel slide" data-ride="carousel">



						<!-- The slideshow -->
						<div class="carousel-inner">
							<div class="carousel-item active justify-content-center text-center bg-primary p-5 blog_inner">

							</div>
							<div class="carousel-item justify-content-center text-center bg-success p-5 blog_inner">

							</div>
							<div class="carousel-item justify-content-center text-center bg-danger p-5 blog_inner">

							</div>
						</div>

						<!-- Left and right controls -->
						<a class="carousel-control-prev ml-3" href="#demo2" data-slide="prev">
							<span class="carousel-control-prev-icon"  style="color: silver; position: absolute; top: 32%;"></span>
						</a>
						<a class="carousel-control-next mr-3" href="#demo2" data-slide="next">
							<span class="carousel-control-next-icon"  style="color: silver; position: absolute; top: 32%;"></span>
						</a>
						<div class="text-center d-flex justify-content-center mt-4">
							<a href="" class="subscribe_button px-2 py-1 mb-3">Subscribe Today</a>
						</div>
					</div>
				</div>

			</div>
			<div class="pb-2 mt-4 social_icon">
				<h2>​Follow Us:</h2>
				<ul>
					<li><a href=""><img src="assets/img/facebook.png" alt=""></a></li>
					<li><a href=""><img src="assets/img/twitter.png" alt=""></a></li>
					<li><a href=""><img src="assets/img/insta.png" alt=""></a></li>
				</ul>
			</div>
		</div>
	</div>
	

	<div class="row mt-5">
		<div class="col-md-12">
			<img src="assets/img/add.jpg" alt="" width="100%" height="400px">
		</div>
	</div>

	<div class="row border_bottom2 mt-5 ml-2 mr-2">
		<div class="col-md-12">
			<h2>WiZ Event of the Week <span><img src="assets/img/logo.png" alt="" class="wiz_logo"></span></h2>
		</div>
	</div>
	<div class="row mt-2 week_event">
		<div class="col-md-6">
			<div class="text_box px-5 py-3">
				<p>Our WiZ Event of the week goes too....</p>
			</div>
		</div>
		<div class="col-md-6 week_event_img">
			<img src="assets/img/presentation1.jpg" alt="" width="100%" height="100%">
		</div>
	</div>

	<div class="row mx-2 mt-5 pt-3 border_bottom2">

		<div class="col-md-12">
			<h2>Reviews & Connections Activity</h2>
		</div>
	</div>
	
	<div class="row mt-2">
		<div class="col-8">
			<ul class="nav nav-tabs ml-lg-5">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home"><h5 style="color: #606060; font-size: 15px;"><b>Reviews</b></h5></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1"><h5 style="color: #606060; font-size: 15px;"><b>Connections</b></h5></a>
				</li>
			</ul>
		</div>
		<div class="col-4">
			<div class="float-right recent mr-5">
				<div class="dropdown">
					<span class="ml-2 mt-2">Sort By:</span>
					<select class="recent_button px-2 py-1" style="border: 1px solid black;"> 
						<option>Most Recent</option>
						<option value="1">All</option>  
						<option value="2">Latest</option>  
					</select>

				</div>
			</div>
		</div>

	</div>

<div class="row mt-4">
		<div class="col-lg-2 col-md-1"></div>
		<div class="col-md-12 col-lg-8 tab-content">
			<div id="home" class="container tab-pane active"><br>
      <div class="feedback">
				<div class="row">
					<div class="col-md-3">
						<div class="media py-3 pl-3">
							<img src="assets/img/user-icon.png" alt="John Doe" class="rounded-circle" style="width:60px;">
							<div class="media-body ml-2">
								<h6><b>​Troy Loper</b></h6>
								<p>1/27/20</p>
								<ul class="mobile_icons">
									<li><span class="mr-1">14</span><i class="fa fa-heart" id="heart2"></i></li>
									<li><span class="mr-1">14</span><a href=""><i class="far fa-comment-alt"></i></a></li>
								</ul>

							</div>
						</div>
						<a href="" class="comment_btn btn">View Comments</a>
					</div>
					<div class="col-md-9">
						<fieldset class="rating ml-auto float-right">
							<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
						<h4 class="pt-2 review_title"><b><a href="">Dance Touranment</a></b></h4>
						Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language.Although most often used to set the visual style of web pages and user interfaces written in HTML and XHTML, the language can be applied to any XML document, including plain XML, SVG and XUL, and is applicable to rendering in speech, or on other media. Along with HTML and JavaScript, CSS is a cornerstone technology used by most websites to create visually engaging webpages, user interfaces for web applications, and user interfaces for many mobile ...<span><button id="toggle" class="mt-3 read_more" style="">Read More</button></span> 
							<div>
  							<br>
 						<span id="text">CSS is designed primarily to enable the separation of document content from document presentation, including aspects such as the layout, colors, and fonts. This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple HTML pages to share formatting by specifying the relevant CSS in a separate .css file, and reduce complexity and repetition in the structural content.
						Separation of formatting and content makes it possible to present the same markup page in different styles for different rendering methods, such as on-screen, in print, by voice (via speech-based </span>
		                       </div>

					</div>
				</div>
			</div>
    </div>
			 <div id="menu1" class="container tab-pane fade"><br>
       <div class="feedback">
				<div class="row">
					<div class="col-md-3">
						<div class="media py-3 pl-3">
							<img src="assets/img/user-icon.png" alt="John Doe" class="rounded-circle" style="width:60px;">
							<div class="media-body ml-2">
								<h6><b>​Troy</b></h6>
								<p>​1/27/20</p>
								<ul>
									<li><span class="mr-1">14</span><i class="fa fa-heart" id="heart2"></i></li>
								
								</ul>

							</div>
						</div>
						
					</div>
					<div class="col-md-9">
						
						<h4 class="pt-2 review_title"><b><a href="">This is the Acknowledgements</a></b></h4>
						Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language.Although most often used to set the visual style of web pages and user interfaces written in HTML and XHTML, the language can be applied to any XML document, including plain XML, SVG and XUL, and is applicable to rendering in speech, or on other media. Along with HTML and JavaScript, CSS is a cornerstone technology used by most websites to create visually engaging webpages, user interfaces for web applications, and user interfaces for many mobile ...<span><button id="toggle" class="mt-3 read_more" style="">Read More</button></span> 
							<div>
  							<br>
 						<span id="text">CSS is designed primarily to enable the separation of document content from document presentation, including aspects such as the layout, colors, and fonts. This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple HTML pages to share formatting by specifying the relevant CSS in a separate .css file, and reduce complexity and repetition in the structural content.
						Separation of formatting and content makes it possible to present the same markup page in different styles for different rendering methods, such as on-screen, in print, by voice (via speech-based </span>
		                       </div>

					</div>
				</div>
			</div>
    </div>
		</div>
		<div class="col-lg-2 col-md-1"></div>
	</div>
	<div class="row mt-5 mb-5">
		<div class="col-md-12 d-flex justify-content-center align-content-center">
			<a href="" class="btn btn-success py-2 px-5 show_more_button">Show More</a>
		</div>
	</div>
	
</div>



<script>
	function myFunction3() {
		var x = document.getElementById("myBtn");
		if (x.innerHTML === "Check-In") {
			x.innerHTML = "Checked-In";
			document.getElementById("myBtn").style.background = "green";
		} else {
			x.innerHTML = "Check-In";
			document.getElementById("myBtn").style.background = "#808080";
		}
	}

	function myFunction2() {
		var x = document.getElementById("myBtn2");
		if (x.innerHTML === "Follow") {
			x.innerHTML = "Following";
			document.getElementById("myBtn2").style.background = "green";
		} else {
			x.innerHTML = "Follow";
			document.getElementById("myBtn2").style.background = "#808080";
		}
	}
	(function() {
		const heart = document.getElementById('heart');
		heart.addEventListener('click', function() {
			heart.classList.toggle('red');
		});
	})();
	

</script>