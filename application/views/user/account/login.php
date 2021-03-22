<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="753523058933-l4vrucv46u71jv0fgem1r96nqnumbiqq.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
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
        <h1 class="font-weight-bold">Log In</h1>
        <p class="font-weight-bold">New to this site? <a class="text-danger" href="<?= base_url('signup') ?>">Sign Up</a></p>
        <div class="register-form">
          <?php $form_attributes = array('class' => 'form submit_form');?>
          <?php echo form_open(base_url('login/request'), $form_attributes); ?>
            <div class="form__input floating__input">
              <input value="" onkeyup="this.setAttribute('value', this.value);" class="form-control" id="email" type="email" name="email" />
              <label for="email">Email</label>
            </div>
            <div class="form__input floating__input">
              <input value="" onkeyup="this.setAttribute('value', this.value);" class="form-control" id="password" type="password" name="password" />
              <label for="password">Password</label>
            </div>
            <button class="btn btn-danger font-weight-bold btn-block mt-4">Log In</button>
            <a class="text-blue mt-2 d-block hover-underline" href="<?= base_url('forget') ?>">Forgot Password?</a>
          </form>
          <button class="mt-4 mb-2 btn btn-facebook font-weight-bold btn-block"><i class="icon fab fa-facebook-square"></i>Login with Facebook</button>
          <div id="signin">
            <button  class="mt-2 mb-4 btn btn-google font-weight-bold btn-block"><i class="icon fab fa-google"></i>Login with Google</button>
          </div>
          <!-- <div class="line-under"><span>or</span></div>
          <button class="my-4 btn btn-outline-primary btn-block">Login with Email</button> -->
        </div>
      </main>
    </div>
    
    
<script>
  $("button").on('click', '#signin', function(event) {


  });
  function onSignIn(googleUser) {
  // Useful data for your client-side scripts:
  var profile = googleUser.getBasicProfile();
  console.log("ID: " + profile.getId()); // Don't send this directly to your server!
  console.log('Full Name: ' + profile.getName());
  console.log('Given Name: ' + profile.getGivenName());
  console.log('Family Name: ' + profile.getFamilyName());
  console.log("Image URL: " + profile.getImageUrl());
  console.log("Email: " + profile.getEmail());

  // The ID token you need to pass to your backend:
  var id_token = googleUser.getAuthResponse().id_token;
  console.log("ID Token: " + id_token);
  }
</script>
