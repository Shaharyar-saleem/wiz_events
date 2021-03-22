<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
<style>

.event_details{
    border: 1px solid black;
    height: 300px;
}
form textarea{
    width: 100% !important;
    margin-top: 11px !important;
}
.carousel-inner img{
    width: 60% !important;
    height: 48% !important;
}
.slick-slide {
    margin: 0px 20px;
}
@media screen and (max-width: 992px){
  .carousel-inner img{
    width: 31% !important;
    height: 45% !important;
}
.event_form h4{
  margin-left: 0px !important;
}
}
@media screen and (max-width: 600px){
  .contact{
    width: 100% !important;
  }
  .carousel-inner img{
  width: 43% !important;
    height: 44% !important;
}
}
</style>

<div class="container-fluid pt-4">
  <form action="">
      <div class="row mt-2 no-gutters">
         <div class="col-lg-4 col-md-12 mt-2 mr-2">
            <div class="input-with-icon border"><i class="icon fas fa-search"></i>
               <input class="form-control2 border-0" id="place-search" type="text" placeholder="Enter a location">
           </div>
       </div>
       <div class="col-lg-5 col-md-12 d-flex mt-2">
        <select class="border custom-select mr-2" name="Radius" style="-webkit-appearance: none;">
           <option>Radius : Any</option>
       </select>
       <select class="border custom-select" name="Category" style="-webkit-appearance: none;">
           <option>Category : All</option>
       </select>
       <div class="border ml-2 custom-select2 d-flex" name="Following">
           Following&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="mt-2 ml-2">


       </div>
   </div>
   <div class="offset-md-4"></div>
</div>
</form>

<div class="row">
  <div class="col">
     <div class="map" id="map"></div>
 </div>
</div>


<div class="row mx-lg-2 event_form mt-3 pb-3">
  <div class="col-md-12 mr-5 ml-lg-5 mt-3">
     <h4>Event Finder> Fogwear Pop-Up Shop</h4>
 </div>
</div>


<div class="row ml-lg-2">

  <div class="col-lg-9 col-md-12 mr-lg-5 ml-lg-5 border_black">

   <div class="row border_bottom2">
       <div class="col-md-4 col-sm-4 pt-2 d-flex profile_name">
           <img src="assets/img/user-icon.png" width="55px" height="55px"><span class="pl-3 pt-2"><b>Fogwear</b></span>
       </div>
       <div class="col-md-8">
         <div class="row">

       <div class="col-6 text-center pt-3 preview_title d-flex justify-content-center">
           <h4>Fogwear Pop-Up Shop</h4>
       </div>
       <div class="col-6 preview_title d-flex justify-content-end">
           <span class="pt-4 pr-2">18</span><i class="fas fa-heart pt-4 pr-2"></i>
           <a href="" class="btn py-1 px-md-4 checked_btn mt-3 mb-3">Checked In</a>
           <span class="pt-4 pl-2"><a href=""><i class="fas fa-ellipsis-v"></i></a></span>
       </div>
       </div>
       </div>
      
   </div>
   
   <div class="container slider_border mt-3">
    <div class="row m-auto" style="width: 96.5%">
        <div class="col-md-12 text-center slider_border2 position-relative slider_icon">
            <h4 class="pt-1">Media</h4>
        </div>
    </div>
     <section class="customer-logos slider">
      <div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
      <div class="slide"><img src="http://www.webcoderskull.com/img/logo.png"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg"></div>
   </section>

</div>


<div class="row">
 <div class="col-md-4 px-4">
    <ul class="preview_time mt-3">
        <li class="mt-2"><i class="far fa-calendar-minus"></i><span>3/8/20 to 3/9/20</span></li>
        <li class="mt-2"><i class="far fa-clock"></i><span>3:00pm to 7:30pm</span></li>
        <li class="mt-2 pl-1"><i class="fas fa-map-marker-alt"></i><a href=" ">5998 Alcalá Park San Diego, CA 92110</a></li>
        <li class="mt-2 pl-1"><i class="fas fa-globe"></i><a href=" ">Wizevents.online</a></li>
    </ul>

    <div class="Categories px-4 py-2 mt-3">
        <h3>Categories</h3>
        <ul class="px-2">
          <li>Arts & Entertainment</li>
          <li>Networking</li>
          <li>Promotional</li>
          <li>Other</li>
      </ul>

  </div>
  <div class="contact mt-3" style="height: 177px">
    <h3 class="pt-3">Contact</h3>
    <ul class="px-1">
      <li class="mt-3"><i class="fas fa-phone-alt"></i><span>831-521-3101</span></li>
      <li class="mt-3"><i class="fas fa-envelope"></i><span>dameee7@gmail.com</span></li>
  </ul>

</div>
</div>
<div class="col-md-8">
    <div class="event_detail mt-4 position-relative" style="border: 1px solid black; height: 285px">
        <h4 class="pt-2 pb-2">Event Details</h4>
        <p>This is where the event details will be.</p>
        <span><i>75 Members Checked-In</i></span>
    </div>
    <div class="mt-4">
    <div class="row review_form_border">
        <div class="col-6 d-flex justify-content-end">
            <h3 class="pt-3"><b>Write a Review</b></h3>
        </div>
        <div class="col-6 py-0 pt-2 d-flex justify-content-md-end justify-content-sm-start">
            <fieldset class="rating">
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
        </div>
    </div>
       
    <div class="review_form mt-1">
       
    <form action="">
      <div class="form-group">
        <textarea name="" id="" cols="30" rows="7" placeholder="Put in a good word and let the world know why they should follow them!"></textarea>
    </div>
    <div class="d-flex justify-content-end">
      <button type="submit" class="btn btn-success align-content-lg-center">Submit</button>
    </div>
</form>
</div>
</div>
</div>
</div>

<div class="row mt-5 pt-2">
   <div class="col-md-12 border_bottom">
       <h3><b>Reviews: 4</b></h3>
   </div>
</div>
<div class="row mt-2">
   <div class="offset-md-6"></div>
   <div class="col-md-6">
    <div class="recent float-right mr-5">
        <div class="dropdown">
            <span class="ml-2 mt-2">Sort By:</span>
            <select class="recent_button"> 
                <option>Most Recent</option> 
                <option value="1">All</option>  
                <option value="2">Latest</option>  
            </select>

        </div>
    </div>
</div>
</div>
<div class="row">
   <div class="col-md-12">
       <div class="container"><br>
        <div class="feedback">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="media py-3 pl-3">
                        <img src="assets/img/user-icon.png" alt="John Doe" class="rounded-circle" style="width:60px;">
                        <div class="media-body ml-2">
                            <h6><b>​Troy Loper</b></h6>
                            <p>​1/27/20</p>
                            <ul>
                                <li><span class="mr-1">14</span><i class="fa fa-heart" id="heart2"></i></li>
                                <li><span class="mr-1">14</span><a href=""><i class="far fa-comment-alt"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <a href="" class="comment_btn btn">View Comments</a>
                </div>
                <div class="col-lg-9 col-md-8">
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

 
</div>
</div>
<div class="row mt-3">
    <div class="col-md-12 d-flex justify-content-center align-content-center">
        <a href="" class="btn btn-success py-1 px-5 show_more_button">Show More</a>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12 share_caption">
        <h2><b>Share With Others</b></h3>
    </div>
    <div class="col-md-12 Share_icon">
         <ul>
    <li><a href=""><img src="assets/img/facebook.png" alt=""></a></li>
    <li><a href=""><img src="assets/img/twitter.png" alt=""></a></li>
    <li><a href=""><img src="assets/img/insta.png" alt=""></a></li>
</ul>
    </div>
</div>
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
           <div class="carousel-item active justify-content-center text-center  p-5 blog_inner">

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
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
    });
});
</script>
