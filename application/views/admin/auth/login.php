<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= PROJECT_TITLE ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/admin/images/favicon.png" />
    <!-- Jquery -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<!-- Toaster -->
  	<link rel="stylesheet" href="<?= base_url('node_modules/jquery-toast-plugin/dist/jquery.toast.min.css') ?>">
  	<script src="<?= base_url('node_modules/jquery-toast-plugin/dist/jquery.toast.min.js') ?>" charset="utf-8"></script>

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <?php $form_attributes = array('class' => 'pt-3 submit_form');?>
                <?php echo form_open(base_url('admin/login/request'), $form_attributes); ?>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="<?= base_url('admin/forget') ?>" class="auth-link text-black">Forgot password?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="<?= base_url() ?>assets/admin/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/misc.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_request.js"></script>
    <!-- endinject -->
  </body>
</html>
