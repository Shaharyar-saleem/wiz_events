<style>
  .form__input label{
    position: absolute;
    top: 50%;
    transition: transform 0.5s;
    left: -25px;
  }
</style>
<div class="container">
      <main class="register-page">
        <h1>Forget Password</h1>
        <p>New to this site? <a class="text-danger" href="<?= base_url('signup') ?>">Sign Up</a></p>
        <div class="register-form">
          <?php $form_attributes = array('class' => 'form submit_form');?>
          <?php echo form_open(base_url('forget/request'), $form_attributes); ?>
            <div class="form__input floating__input">
              <input value onkeyup="this.setAttribute('value', this.value);" class="form-control" id="email" type="email" name="email" />
              <label for="email">Email Address</label>
            </div>
            <button class="btn btn-danger btn-block mt-4" data-toggle="modal" data-target="#exampleModalCenter">Send</button>
          </form>
        </div>
        <p class="forget_message">We will send you a link via email to set up a new password.</p>
      </main>
    </div>


 

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Thank You For Your Submission!</h1>
         <p class="mt-5">You should be receiving a notification on your email address for submit a new password.</p>
         <p class="mt-2"> <b>Thank you and take care!</b></p>
      </div>
      
    </div>
  </div>
</div>