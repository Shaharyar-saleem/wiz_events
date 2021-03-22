<style>
input[type="checkbox"]{
	position: absolute;
    right: 19px;
    top: 40px;
}
@supports (-webkit-appearance: none) or (-moz-appearance: none) {
  input[type='checkbox'],
  input[type='radio'] {
    --active: green;
    --active-inner: #fff;
    --focus: 2px rgba(39, 94, 254, .3);
    --border: #8f8f8f;
    --border-hover: #275EFE;
    --background: #fff;
    --disabled: #F6F8FF;
    --disabled-inner: #E1E6F9;
    -webkit-appearance: none;
    -moz-appearance: none;
    height: 21px;
    outline: none;
    display: inline-block;
    vertical-align: top;
    position: relative;
    margin: 0;
    cursor: pointer;
    border: 1px solid var(--bc, var(--border));
    background: var(--b, var(--background));
    -webkit-transition: background .3s, border-color .3s, box-shadow .2s;
    transition: background .3s, border-color .3s, box-shadow .2s;
  }
  input[type='checkbox']:after,
  input[type='radio']:after {
    content: '';
    display: block;
    left: 0;
    top: 0;
    position: absolute;
    -webkit-transition: opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
    transition: opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
    transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
    transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
  }
  input[type='checkbox']:checked,
  input[type='radio']:checked {
    --b: var(--active);
    --bc: var(--active);
    --d-o: .3s;
    --d-t: .6s;
    --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
  }
  input[type='checkbox']:disabled,
  input[type='radio']:disabled {
    --b: var(--disabled);
    cursor: not-allowed;
    opacity: .9;
  }
  input[type='checkbox']:disabled:checked,
  input[type='radio']:disabled:checked {
    --b: #008000;
    --bc: #008000;
  }
  input[type='checkbox']:disabled + label,
  input[type='radio']:disabled + label {
    cursor: not-allowed;
  }
  input[type='checkbox']:hover:not(:checked):not(:disabled),
  input[type='radio']:hover:not(:checked):not(:disabled) {
    --bc: var(--border-hover);
  }
  input[type='checkbox']:focus,
  input[type='radio']:focus {
    box-shadow: 0 0 0 var(--focus);
  }
  input[type='checkbox']:not(.switch),
  input[type='radio']:not(.switch) {
    width: 21px;
  }
  input[type='checkbox']:not(.switch):after,
  input[type='radio']:not(.switch):after {
    opacity: var(--o, 0);
  }
  input[type='checkbox']:not(.switch):checked,
  input[type='radio']:not(.switch):checked {
    --o: 1;
  }
  input[type='checkbox'] + label,
  input[type='radio'] + label {
    font-size: 14px;
    line-height: 21px;
    display: inline-block;
    vertical-align: top;
    cursor: pointer;
    margin-left: 4px;
  }

  input[type='checkbox']:not(.switch) {
    border-radius: 7px;
  }
  input[type='checkbox']:not(.switch):after {
    width: 5px;
    height: 9px;
    border: 2px solid var(--active-inner);
    border-top: 0;
    border-left: 0;
    left: 7px;
    top: 4px;
    -webkit-transform: rotate(var(--r, 20deg));
            transform: rotate(var(--r, 20deg));
  }
  input[type='checkbox']:not(.switch):checked {
    --r: 43deg;
  }
  input[type='checkbox'].switch {
    width: 38px;
    border-radius: 11px;
  }
  input[type='checkbox'].switch:after {
    left: 2px;
    top: 2px;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    background: var(--ab, var(--border));
    -webkit-transform: translateX(var(--x, 0));
            transform: translateX(var(--x, 0));
  }
  input[type='checkbox'].switch:checked {
    --ab: var(--active-inner);
    --x: 17px;
  }
  input[type='checkbox'].switch:disabled:not(:checked):after {
    opacity: .6;
  }

  input[type='radio'] {
    border-radius: 50%;
  }
  input[type='radio']:after {
    width: 19px;
    height: 19px;
    border-radius: 50%;
    background: var(--active-inner);
    opacity: 0;
    -webkit-transform: scale(var(--s, 0.7));
            transform: scale(var(--s, 0.7));
  }

</style>

<div class="custom_container mt-5">
	<div class="row mt-5 notification_option">
		<div class="col-md-12 notification_title">
			<h3>Privacy Settings</h3>
		</div>
	</div>
	<div class="row notification_option">
		<div class="col-8 py-4">
			<h5>Blog Subscription</h5>
			<p>Receive emails and notifications about news posts and updates.</p>
		</div>
		<div class="col-4 subscribe_btn">
			<button class="btn px-3 py-2 mt-4" id="sub_btn" onclick="subscribe()">Subscribe</button>
		</div>
	</div>
	<div class="row notification_option">
		<div class="col-8 py-4">
			<h5>Email</h5>
			<p>Receive updates on our news blog through email.</p>
		</div>
		<div class="col-4">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>
	<div class="row">
		<div class="col-8 py-4">
			<h5><b>Notifications</b></h5>
			<p>Receive updates on our news blog through notifications.</p>
		</div>
		<div class="col-4">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>
	<div class="row notification_option">
		<div class="col-md-12 pt-5">
			<h3><b>Notifications Settings</b></h3>
		</div>
		
	</div>
	<div class="row notification_option">
		<div class="col-8 py-4">
			<h5>Likes</h5>
			<p>Notify me when members like my posts and comments.</p>
		</div>
		<div class="col-4">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>
	<div class="row">
		<div class="col-8 py-4">
			<h5><b>Comment</b></h5>
			<p>Notify me when there are comments about members I follow.</p>
		</div>
		<div class="col-4">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>
	<div class="row notification_option" style="margin-top: -20px;">
		<div class="col-8 pt-3 pb-4">
			
			<p>Notify me when I receive comments on my reviews.</p>
		</div>
		<div class="col-4" style="margin-top: -20px;">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>
	<div class="row notification_option">
		<div class="col-8 py-4">
			<h5>Connections Post</h5>
			<p>Notify me when I receive connections.</p>
		</div>
		<div class="col-4">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>
	<div class="row">
		<div class="col-8 py-4">
			<h5><b>Follow</b></h5>
			<p>Notify me when I receive a follower.</p>
		</div>
		<div class="col-4">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>

		<div class="row notification_option">
		<div class="col-md-12 pt-5">
			<h3><b>Bookmark Settings</b></h3>
		</div>
		
	</div>
	<div class="row notification_option">
		<div class="col-10 py-4 bookmark">
			<ul>
				<li><img src="assets/img/person1.jpg" alt="" class="rounded-circle"></li>
				<li><p>Shaharyar Saleem</p></li>
			</ul>
		</div>
		<div class="col-2">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>
	<div class="row notification_option">
		<div class="col-10 py-4 bookmark">
			<ul>
				<li><img src="assets/img/person1.jpg" alt="" class="rounded-circle"></li>
				<li><p>Shaharyar Saleem</p></li>
			</ul>
		</div>
		<div class="col-2">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>
	<div class="row">
		<div class="col-10 py-4 bookmark">
			<ul>
				<li><img src="assets/img/person1.jpg" alt="" class="rounded-circle"></li>
				<li><p>Shaharyar Saleem</p></li>
			</ul>
		</div>
		<div class="col-2">
			<input id="s1" type="checkbox" class="switch float-right">
		</div>
	</div>

	<div class="row pb-5 pt-5">
         <div class="col-md-12 d-flex justify-content-center align-content-center">
			<a href="" class="btn btn-success py-1 px-4 show_more_button">Show More</a>
         </div>
	</div>
</div>

<script>
	function subscribe() {
  var x = document.getElementById("sub_btn");
  if (x.innerHTML === "Subscribe") {
    x.innerHTML = "Subscribed";
    document.getElementById("sub_btn").style.background = "green";
  } else {
    x.innerHTML = "Subscribe";
    document.getElementById("sub_btn").style.background = "silver";
  }
}
</script>