<style>
	form label{
		font-size: 100% !important;
        padding-left: 0px !important;
	}
	.form-control{
		font-size: 18px !important;
	}
</style>

<div class="container">
	<main class="register-page">
		<h1 class="font-weight-bold">Sign Up</h1>
		<p class="font-weight-bold">Already a WiZ Member? <a class="text-danger ml-1"
				href="<?= base_url('login') ?>">Log In</a></p>
		<div class="register-form">
			<?php $form_attributes = array('class' => 'form submit_form');?>
			<?php echo form_open(base_url('signup/request'), $form_attributes); ?>
			<div class="form__input floating__input">
				<input value="" class="form-control" id="name" type="text" name="name"
					onkeyup="this.setAttribute('value', this.value);" />
				<label for="name">First Name</label>
			</div>
			<div class="form__input floating__input">
				<input value="" class="form-control" id="name" type="text" name="name"
					onkeyup="this.setAttribute('value', this.value);" />
				<label for="name">Last Name</label>
			</div>
			<div class="form__input floating__input">
				<input value="" class="form-control" id="email" type="email" name="email"
					onkeyup="this.setAttribute('value', this.value);" />
				<label for="email">Email</label>
			</div>
			<div class="form__input floating__input">
				<input value="" class="form-control" id="phone_no" type="number" name="phone_no"
					onkeyup="this.setAttribute('value', this.value);" />
				<label for="phone_no">Phone Number</label>
			</div>
			<div class="form__input floating__input">
				<select class="form-control" name="identity" id="identity">
					<option disabled selected>Role/Identity</option>
					<?php foreach ($identity as $key => $info): ?>
					<option data-industry="<?= $info["is_industry"] ?>" value="<?= $info["public_key"] ?>">
						<?= $info["name"] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form__input floating__input">
				<select class="custom-select border-0" id="industry" name="industry[]" data-select-category="true"
					multiple="multiple" placeholder="Select Industry">
					<?php foreach ($industry as $key => $info): ?>
					<option value="<?= $info["public_key"] ?>"><?= $info["name"] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form__input floating__input">
				
				<input id="password-field" type="password" class="form-control" name="password" placeholder="Password" onkeyup="this.setAttribute('value', this.value);">
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
			</div>
			<div class="form__input floating__input">
              <input id="re_password" type="password" class="form-control" name="verify-password" placeholder="Confirm Password" onkeyup="this.setAttribute('value', this.value);">
              <span toggle="#re_password" class="fa fa-fw fa-eye field-icon re_password"></span>
			</div>
			<div class="form__input floating__input">
				<input class="" type="checkbox" name="verify-password" />
				I agree to the <a class="hover-underline" href="<?=base_url('')?>" target="_blank">Terms of Service</a>.<br>
				<input class="" type="checkbox" name="verify-password" />
				Subscribe to our Mailing List.
			</div>
			<button class="btn btn-danger btn-block mt-4">Create Account</button>
			</form>
			<!-- <button class="mt-4 mb-2 btn btn-facebook btn-block"><i class="icon fab fa-facebook-square"></i>Sign up with Facebook</button>
      <button class="mt-2 mb-4 btn btn-google btn-block"><i class="icon fab fa-google"></i>Sign up with Google</button> -->
			<!-- <div class="line-under"><span>or</span></div>
      <button class="my-4 btn btn-outline-primary btn-block">Sign up with Email</button> -->
		</div>
	</main>
</div>
<script>
	$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

$(".re_password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});


</script>