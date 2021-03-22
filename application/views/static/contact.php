
<?php $form_attributes = array('class' => 'form');?>
<?php echo form_open(base_url('contact'), $form_attributes); ?>
<style type="text/css">
	::placeholder { 
  font-size: 15px;
}
</style>
<div class="container mb-5">
	<div class="row mt-5">
		<div class="col d-flex justify-content-center contact-heading">
			<h1 class="text-center font-weight-bold ">Contact Us</h1>
			<div class="contact__icon">
				<svg preserveAspectRatio="xMidYMid meet" data-bbox="14.026 30 171.974 140"
					viewBox="14.026 30 171.974 140" xmlns="http://www.w3.org/2000/svg" data-type="color" role="img">
					<g>
						<path
							d="M186 92c0-17-13.3-30.9-30.2-30.9l-4.7-.1v-8H185l-12.3-11.3L185 30h-41.9v31l-69.7.1c-17 0-31 13.9-31 30.9v33H20.5v22h90.8v23l24.8-.2.1-22.8H186V92zM50.4 92c0-12.7 10.4-23.1 23-23.1s22.9 10.3 22.9 23l-.1 33.1H50.4V92zm45.8 47H28.4v-6h67.8v6zm32 23h-9v-15h9v15zm49.8-23h-73.8l-.1-47.1c0-9.1-4-17.3-10.4-23l49.4.1v9c-2.8 1.4-4.4 4.6-4.4 8 0 4.7 3.8 8.6 8.6 8.6s8.6-3.8 8.6-8.6c0-3.3-1.9-6.5-4.7-8v-9l4.7-.1c12.7 0 22.2 10.5 22.2 23.1l-.1 47z"
							fill="#fed257" data-color="1"></path>
						<path fill="#fed257" d="M52.8 36.9l7.5-2 4.2 15.5-7.5 2-4.2-15.5z" data-color="1"></path>
						<path fill="#fed257" d="M28.6 53.3l5.5-5.5 11.4 11.4-5.5 5.5-11.4-11.4z" data-color="1"></path>
						<path fill="#fed257" d="M15.6 79.7l2-7.5 15.5 4.1-2 7.6-15.5-4.2z" data-color="1"></path>
						<path fill="#fed257" d="M29.96 96.187l1.116 7.72-15.934 2.305-1.116-7.72 15.934-2.305z"
							data-color="1"></path>
					</g>
				</svg></div>
		</div>
	</div>
	<div class="row mb-5 justify-content-center">
		<div class="col-12 col-md-6 text-center contact__text">
			<p>Our goal is to provide you with the tools you need to make the most out of your WiZ experience.</p>
			<p>Please submit a form below so we can discuss any problems that you are experiencing.</p>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-md-6 px-0 d-flex justify-content-center">
			<input name="first_name" required class="contact__input  border-bottom-0 border-right-0 form-control"
				type="text" placeholder="First Name" />
			<input name="last_name" required class="contact__input  border-bottom-0 form-control" type="text"
				placeholder="Last Name" />
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-md-6 px-0 d-flex justify-content-center">
			<input name="email" required class="contact__input  border-bottom-0 border-right-0 form-control"
				type="email" placeholder="Email" />
			<input name="phone" class="contact__input border-bottom-0 form-control" type="text"
				placeholder="Phone Number" />
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 px-0 col-md-6 d-flex justify-content-center">
			<textarea name="message" required class="contact__input contact__textarea custom-textarea form-control" type="text"
				placeholder="Type your message here"></textarea>
		</div>
	</div>
	<div class="row mt-4 contact__btn-sec">
		<div class="col text-center">
			<button class="btn contact__btn">Submit</button>
		</div>
	</div>
</div>

</form>