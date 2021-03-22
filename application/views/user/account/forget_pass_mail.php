<div class="container">
      <main class="register-page">
        <h1>Forget Password</h1>
        <p>New to this site? <a class="text-danger" href="<?= base_url('signup') ?>">Sign Up</a></p>
        <div class="register-form">
          <?php $form_attributes = array('class' => 'form submit_form');?>
          <?php echo form_open(base_url('forget/request'), $form_attributes); ?>
            <div class="form__input floating__input">
              <input class="form-control" id="email" type="email" name="email" />
              <label for="email">Email</label>
            </div>
            <button class="btn btn-danger btn-block mt-4">Send</button>
          </form>
        </div>
        <p class="">we will send you a link via email to set up a new password</p>
      </main>
    </div>
