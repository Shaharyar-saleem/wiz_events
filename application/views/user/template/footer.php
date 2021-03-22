<?php if (empty($hide_navbar)): ?>
<!-- <footer class="footer pt-4 d-flex flex-column align-items-center justify-content-center">
	<ul class="menu">
		<li><a class="avenir-font" target="_blank" href="<?= base_url('contact') ?>">Contact</a></li>
		<li><a class="avenir-font" target="_blank" href="<?= base_url('careers') ?>">Career</a></li>
		<li><a class="avenir-font" target="_blank" href="<?= base_url('news') ?>">News Blog</a></li>
		<li><a class="avenir-font" target="_blank" href="<?= base_url('news') ?>">WiZ Promoted Events</a></li>
		<li><a class="avenir-font" target="_blank" href="<?= base_url('about') ?>">About Us</a></li>
		<li><a class="avenir-font" target="_blank" href="<?= base_url('terms-of-service') ?>">Terms of Service</a></li>
	</ul>
	<ul class="social-icons mt-5 mb-2">
		<li><a href="https://www.facebook.com/WizEventsOnline"  target="_blank"><i class="fab fa-facebook"></i></a></li>
		<li><a href="https://twitter.com/WIZ_EVENT" target="_blank"><i class="fab fa-twitter"></i></a></li>
		<li><a href="https://www.instagram.com/wizeventsig/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a></li>
	</ul>
</footer> -->
<footer class="s-footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-3">
				<h3>Company</h3>
				<ul>
					<li><a href="">About Us</a></li>
					<li><a href="">Careers</a></li>
					<li><a href="">Community Guidelines</a></li>
					<li><a href="">Privacy Policy</a></li>
					<li><a href="">Terms of Service</a></li>
				</ul>
			</div>
			<div class="col-2">
			<h3>Company</h3>
				<ul>
					<li><a href="">Event Finder</a></li>
					<li><a href="">Newsblog</a></li>
					<li><a href="">Members Page</a></li>
				</ul>
			</div>
			<div class="col-4">
			<h3>Subscribe</h3>
				<p>Enter your email address to<br> receive our newsletters</p>
				<form class="subscribe_form">
            <div class="input-group">
               <input type="text" class="form-control" name="email" placeholder="Enter your email">
               <span class="input-group-btn">
                    <button class="btn btn-default" type="button">subscribe</button>
               </span>
            </div>
          </form>
			</div>
			<div class="col-3"></div>
		</div>
	</div>
</footer>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/shortcuts/inview.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/wizard.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script src="<?= base_url() ?>assets/js/ajax_request.js"></script>
<script src="<?= base_url() ?>assets/select2/dist/js/select2.full.min.js"></script>
<script
	src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAfn0186e_Uq5kHupvAXXYrG8ER6kcqP8Y&amp;callback=initMap&amp;libraries=places"
	async="async" defer="defer"></script>
<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAfn0186e_Uq5kHupvAXXYrG8ER6kcqP8Y&amp;callback=initMap"
	async="async" defer="defer"></script> -->
<!-- Dropify -->
<script src="<?= base_url('node_modules/dropify/dist/js/dropify.min.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/initilize_plugin.js') ?>" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.select').select2({
		'maximumSelectionLength': 3,
		placeholder: "Industry",
	});
});
</script>
</body>

</html>