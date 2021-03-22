<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Timepicker Js -->
<script src="dist/wickedpicker.min.js"></script>
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
	<style>
    
		*[role="form"] {
    max-width: 1100px;
    padding: 15px;
    font-size: 25px;
    background-color: #fff;
    border-radius: 0.3em;
}
::placeholder { 
  font-size: 18px;
}
input[type="file"]{
	font-size: 17px !important;
}
input[type="date"],input[type="time"]{
	font-size: 20px !important;
}
.location_icon i{
	position: absolute !important;
	top: 0 !important;
    right: 0 !important;
}
.carousel-inner img{
     width: 60% !important;
    height: 48% !important;
}
input[type="date"]::-webkit-inner-spin-button{
    margin-right: 10px !important;
}
input[type="date"]::-webkit-calendar-picker-indicator {

    -webkit-appearance: none !important;
}
@media screen and (max-width: 992px){
    .carousel-inner img{
      width: 30% !important;
      height: 45% !important;
    }
}
@media screen and (max-width: 600px){
    ::placeholder { 
  font-size: 11px;
   }
    input[type="file"]{
    font-size: 12px !important;
  }
  input[type="date"],input[type="time"]{
    font-size: 16px !important;
}
.carousel-inner img{
    width: 43% !important;
    height: 44% !important;
}
}

</style>

<div class="container-fluid pt-4">
		<form action="">
		<div class="row mt-4 no-gutters">
			<div class="col-lg-4 col-md-12 mt-2 mr-2">
				<div class="input-with-icon border"><i class="icon fas fa-search"></i>
					<input class="form-control2 border-0" id="place-search" type="text" placeholder="Enter a location">
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


	<div class="row event_form mt-md-3">
		<div class="col-lg-9 col-md-12 mr-5 ml-5 mt-3">
			<div class="row">
				<div class="col-lg-8 col-md-6 col-sm-12">
				<h4>Event Finder > Fogwear Pop-Up Shop</h4>
			    </div>
			<div class="">
				<div class="border custom-select3 d-flex float-left" name="Following">
					<a href="" data-toggle="tooltip" title="Allows you to save the entire format of this post and have it posted again at another time">Blueprints</a><input type="checkbox" class="mt-2 ml-5">
				</div>
			</div>
			<div class="ml-3">
				<div class="border custom-select3 d-flex" name="Following">
					<a href="">Save For Later</a><input type="checkbox" class="mt-2">
				</div>
			</div>
			</div>
			
		</div>
		<div class="col-md-2">
			
		</div>
        <div class="col-md-1"></div>
	</div>
	

	<div class="row form_section_row">

		<div class="col-lg-9 col-md-12 border form_section">
			           <form class="form-horizontal mt-md-2" role="form">
              
                <div class="row form-group mt-md-3">
                    <label for="firstName" class="col-sm-3 control-label mt-2"><sup>*</sup>Event Title</label>
                    <div class="col-sm-9">
                        <input type="text" id="Event Title" placeholder="Event Title" class="form-control" autofocus>
                    </div>
                </div>
                <div class="row form-group mt-md-3">
                	<label for="firstName" class="col-sm-3 control-label mt-2"><sup>*</sup>Location</label>
                    <div class="col-sm-9 location_icon">
                       <input type="text" id="Event Title" placeholder="Submit an Address or Drop the Pin on the Map" class="form-control" autofocus><i class="fas fa-map-marker-alt mt-2"></i>
                    </div>
                 
                </div>
             
                <div class="row form-group mt-md-5">
                    <label for="Event_Details" class="col-sm-3 control-label"><sup>*</sup>Event Details</label>
                    <div class="col-sm-9">
                        <textarea name="Event_Details" id="Event_Details" rows="7" placeholder="What's Your Event About?"></textarea>
                    </div>
                </div>
                 <div class="row form-group mt-md-5">
                    <label for="firstName" class="col-sm-3 control-label mt-2">Website Link</label>
                    <div class="col-sm-9">
                        <input type="url" id="Event Title" placeholder="Redirect Users to Your Website" class="form-control" autofocus>
                    </div>
                </div>
                
                <div class="row form-group mt-md-5">
                    <label class="control-label col-sm-3"><sup>*</sup>Category Tags</label>
                    <div class="col-sm-9 row">
                    	<div class="col-sm-6">
                    		 <div class="checkbox">
                            <label>
                                <input type="checkbox" id="calorieCheckbox" value="Arts & Entertainment">&nbsp;&nbsp;Arts & Entertainment
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="saltCheckbox" value="Causes & Fundraisers">&nbsp;&nbsp;Causes & Fundraisers
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="calorieCheckbox" value="Deals">&nbsp;&nbsp;Deals
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="saltCheckbox" value="Health & Wellness">&nbsp;&nbsp;Health & Wellness
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="calorieCheckbox" value="Networking">&nbsp;&nbsp;Networking
                            </label>
                        </div>
                        
                    	</div>
                    	<div class="col-sm-6">
                    		 <div class="checkbox">
                            <label>
                                <input type="checkbox" id="calorieCheckbox" value="Night Life">&nbsp;&nbsp;Night Life
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="saltCheckbox" value="Online Events">&nbsp;&nbsp;Sports
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="calorieCheckbox" value="Promotional">&nbsp;&nbsp;Promotional
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="saltCheckbox" value="Political">&nbsp;&nbsp;Political
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="calorieCheckbox" value="Religion">&nbsp;&nbsp;Religion
                            </label>
                        </div>
                    	</div>
                    		<div class="col-sm-5">
                    		 <div class="checkbox">
                            <label>
                                <input type="checkbox" id="calorieCheckbox" value="Low calorie">&nbsp;&nbsp;Community
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="saltCheckbox" value="Low salt">&nbsp;&nbsp;Online Events
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="calorieCheckbox" value="Low calorie">&nbsp;&nbsp;School & Education
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="saltCheckbox" value="Low salt">&nbsp;&nbsp;Other
                            </label>
                        </div>
                       
                    	</div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="row form-group mt-md-5">
                    <label for="email" class="col-sm-3 control-label mt-2"><sup>*</sup>Media</label>
                    <div class="col-sm-9 d-flex">
                        <input type="file" id="file" placeholder="Select images" multiple="multiple" class="form-control">
                    </div>
                </div>
                <div class="row form-group mt-4">
                    <label for="birthDate" class="col-sm-3 control-label"><sup>*</sup>Time & Date</label>
                    <div class="col-sm-9 row">
                    	<div class="col-md-2">
                    		<span style="font-size: 27px;" class="event_type">Starts</span>
                    	</div>
                    	<div class="col-md-5">
                    		<input type="date" class="form-control">
                    	</div>
                    	<div class="col-md-5">
                    		<input name="startTime" id="startTime" type="time"class="form-control" required/>
                             
                            
                    	</div>
                    </div>
                </div>
                 <div class="row form-group mt-md-5">
                    <label for="birthDate" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9 row">
                    	<div class="col-md-2">
                    		<span style="font-size: 27px;" class="event_type">Ends</span>
                    	</div>
                    	<div class="col-md-5">
                    		<input type="date" id="birthDate" class="form-control">
                    	</div>
                    	<div class="col-md-5">
                    		<input type="time" id="birthDate" class="form-control">
                    	</div>
                    </div>
                </div>


                 <div class="row form-group mt-md-5">
                 	<div class="col-sm-3">
                 		 <label for="firstName" class="control-label mt-3">Additional Information</label>
                 	</div>
                   
                    <div class="col-sm-9 mt-3">
                    	<div class="row">
                    		<div class="col-lg-3 col-md-4 event_type">
                    		<span style="font-size: 22px;"><a href="#">Open Event</a></span>
                    	</div>
                    	<div class="col-lg-3 col-md-4">
                    		<label class="switch">
                             <input type="checkbox" checked>
  									<span class="slider round"></span>
							</label>
                    	</div>
                    	<div class="offset-lg-6 offset-md-4"></div>
                    	</div>
                    </div>
                </div>
                 <div class="row form-group private_event">
                    <div class="col-sm-3">
                 		 <label for="firstName" class="control-label mt-3"></label>
                 	</div>
                    <div class="col-sm-9">
                    	<div class="row">
                    	<div class="col-lg-3 col-md-4 event_type">
                    		<span style="font-size: 22px;">Private Event</span>
                    	</div>
                    	<div class="col-lg-3 col-md-4">
                    		<label class="switch">
                             <input type="checkbox" checked>
  									<span class="slider round"></span>
							</label>
                    	</div>
                    	<div class="offset-6">
                    		
                    	</div>
                    	</div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3"></div>
                    <div class="col-3">
                        <button class="btn invite_btn float-left px-5">Invite</button>
                    </div>
                    <div class="offset-6"></div>
                </div>
                <div class="row form-group mt-5">
                	
                	
                    <div class="col-md-12 d-flex justify-content-center text-center">
                        <button type="submit" class="next_btn px-4">Next</button>
                    </div>
                </div>
            </form> <!-- /form -->
		</div>
		<div class="col-lg-2 col-md-12">
			<div class="members pb-2">
			<h4>Members Near You</h4>
			<div id="demo" class="carousel slide" data-ride="carousel">

				<!-- The slideshow -->
				<div class="carousel-inner members_inner" style="height: 190px;">
					<div class="carousel-item active justify-content-center text-center">
						<img src="assets/img/user-icon.png" class="mt-2" alt="" width="50px" height="50px">
						<h4 class="mt-1">Mike1</h4>
						<!-- <input type="button" id="myBtn2" value="Follow" onclick="myFunction2()" class="px-4 pt-2 pb-2"> -->
						<button type="button" id="myBtn2" onclick="myFunction2()" class="px-5 mb-2">Follow</button>
					</div>
					<div class="carousel-item justify-content-center text-center">
						<img src="assets/img/user-icon.png" class="mt-2" alt="" width="50px" height="50px">
						<h4 class="mt-1">Mike</h4>
						<button class="px-5 mb-2">Follow</button>
					</div>
					<div class="carousel-item justify-content-center text-center">
						<img src="assets/img/user-icon.png" class="mt-2" alt="" width="50px" height="50px">
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
					<a href="" class="subscribe_button px-3 py-2 mb-3">Subscribe Today</a>
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



<div class="row">
		<div class="col-md-12 bottom_add mt-5">
			<img src="assets/img/add3.jpg" alt="">
		</div>
</div>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

</script>
