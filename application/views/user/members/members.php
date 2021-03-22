<!-- <div class="container pt-5">
	<div class="row justify-content-between my-3">
		<div class="col-12 col-sm-6 dropdown d-flex">
			<select id="sort_member" class="border-top-0 border-left-0 border-right-0 border-bottom custom-select"
				name="type">
				<option value="1">Default</option>
				<option value="3">Newest to oldest</option>
				<option value="4">oldest to newest</option>
			</select>
		</div>
		<div class="col-12 col-sm-6 mt-2">
			<div class="row">
				<div class="col-sm-4 text-center"><i class="fas fa-list mr-3 pointer"></i><i
						class="fas fa-th pointer"></i></div>
				<div class="input-with-icon col-sm-8"><i class="icon fas fa-search"></i>
					<input class="form-control" type="text" id="search-text" placeholder="Search" />
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="member" id="list-member">
				<?= $member_list ?>
			</div>
		</div>
	</div>
</div> -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
	.form-control{
		font-size: 12px !important;
	}
	

</style>

<div class="members_container mt-5">
	<div class="row">
		<div class="col-lg-7 col-md-8 mt-3">
          <select name="" id="" class="border custom-select" style="-webkit-appearance: none; width: 35%;">
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
			<span>Sort By:</span><select name="" id="" class="sort_member selectpicker" data-width="fit">
				<option value="">Default</option>
				<option value="">No. of followers</option>
				<option value="">Most Events</option>
				<option value="">Most Reviews</option>
			</select>
		</div>
		<div class="col-lg-5 col-md-4 mt-2">
			  <div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" class="form-control" placeholder="Find a member">
    <span class="form-control-feedback members_numbers">117</span>
  </div>
		</div>
	</div>

	<div class="row mb-5">
		<div class="col-md-4 mt-5">
			<div class="member_card">
				<a href="">
				<img src="assets/img/add3.jpg" alt="" width="100%" height="145px">
			    </a>
				<div class="member_card_body position-relative text-center">
					<div class="profile_dp d-flex justify-content-center position-relative">
						<img src="assets/img/person1.jpg" alt="" class="rounded-circle">
					</div>
						<h5 class="mt-5 pt-3"><b><a href="">WiZ Events</a></b></h5>
			            <p>Followers: <span>25</span> | Following: <span>4</span></p>
			            <p>Make it happen</p>
			            <button type="button" class="btn mb-3 mt-3" id="myBtn" onclick="follow()">Follow</button>
				   <div class="dropdown">
                         <i class="fas fa-ellipsis-v"></i>
                   <div id="myDropdown" class="dropdown-content" style="margin-left: -120px;">
                   	     <ul>
                   	     	<li><i class="fas fa-share-square"></i><a href="#home"> Share</a></li>
                   	     	<li><i class="far fa-flag"></i><a href="#home"> Report</a></li>
                   	     </ul>
                         
                   </div>

                  </div>
				</div>
			</div>
		</div>
		<div class="col-md-4 mt-5">
			<div class="member_card">
				<img src="assets/img/add3.jpg" alt="" width="100%" height="145px">
				<div class="member_card_body position-relative text-center">
					<div class="profile_dp d-flex justify-content-center position-relative">
						<img src="assets/img/person1.jpg" alt="" class="rounded-circle">
					
					</div>
						<h5 class="mt-5 pt-3"><b>WiZ Events</b></h5>
			            <p>Followers: <span>25</span> | Following: <span>4</span></p>
			            <p>Make it happen</p>
			            <button type="button" class="btn mb-3 mt-3" id="myBtn" onclick="follow()">Follow</button>
				    <div class="dropdown">
                         <i class="fas fa-ellipsis-v"></i>
                   <div id="myDropdown" class="dropdown-content" style="margin-left: -120px;">
                         <a href="#home">Report</a>
                   </div>

                  </div>
				</div>
			</div>
		</div>
		<div class="col-md-4 mt-5">
			<div class="member_card">
				<img src="assets/img/add3.jpg" alt="" width="100%" height="145px">
				<div class="member_card_body position-relative text-center">
					<div class="profile_dp d-flex justify-content-center position-relative">
						<img src="assets/img/person1.jpg" alt="" class="rounded-circle">
					</div>
						<h5 class="mt-5 pt-3"><b>WiZ Events</b></h5>
			            <p>Followers: <span>25</span> | Following: <span>4</span></p>
			            <p>Make it happen</p>
			            <button type="button" class="btn mb-3 mt-3" id="myBtn" onclick="follow()">Follow</button>
				    <div class="dropdown">
                         <i class="fas fa-ellipsis-v"></i>
                   <div id="myDropdown" class="dropdown-content" style="margin-left: -120px;">
                         <a href="#home">Report</a>
                   </div>

                  </div>
				</div>
			</div>
		</div>
	</div>
	
</div>



<!-- <script type="text/javascript">
var URL = '<?= base_url() ?>'
$('#sort_member').change(function(event) {
	get_record($("#sort_member").val())
});
timeoutID = null;
$('#search-text').keyup(function(e) {
	clearTimeout(timeoutID);
	timeoutID = setTimeout(() => get_record($("#sort_member").val(), e.target.value),
		1000);
});

function get_record(sort_member, search_text = '') {
	$.ajax({
		type: "post",
		url: URL + 'search-list-of-members',
		data: {
			'sort_member': sort_member,
			'search_text': search_text
		},
		success: function(response) {
			response = JSON.parse(response)
			$('#list-member').html('');
			if (response["status"] == 1) {
				$("#list-member").hide()
				$("#list-member").append(response["data"]['member_list'])
				$("#list-member").fadeIn('slow', function() {

				});
			} else {
				$.toast({
					heading: 'Info',
					text: 'No Record Found',
					position: 'top-right',
					loaderBg: '#f33923',
					icon: 'error',
					hideAfter: 3500,
					stack: 6
				});
			}
		},
		error: function(error) {

		},
		complete: function() {

		}
	});
}
</script> -->

<script>
	function follow() {
  var x = document.getElementById("myBtn");
  if (x.innerHTML === "Follow") {
    x.innerHTML = "Following";
    document.getElementById("myBtn").style.background = "green";
  } else {
    x.innerHTML = "Follow";
    document.getElementById("myBtn").style.background = "black";
  }
}
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>