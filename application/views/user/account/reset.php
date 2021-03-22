<div class="container">
      <main class="register-page">
        <h1>Reset Password</h1>
        <div class="register-form">
          <?php $form_attributes = array('class' => 'form');?>
          <?php echo form_open(base_url('reset/').$code, $form_attributes); ?>
            <div class="form__input floating__input">
              <input value="" class="form-control" id="password" type="password" name="password" onkeyup="this.setAttribute('value', this.value);" />
              <label for="password">Password</label>
            </div>
            <div class="form__input floating__input">
              <input value="" class="form-control" id="re-password" type="password" name="co-password" onkeyup="this.setAttribute('value', this.value);" />
              <label for="re-password">Confirm Password</label>
            </div>
            <button class="btn btn-danger btn-block mt-4">Send</button>
          </form>
        </div>
      </main>
    </div>
