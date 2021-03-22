
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Update Profile </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <?php $form_attributes = array('enctype'=>'multipart/form-data','class' => 'form submit_form');?>
      <?php echo form_open(base_url('admin/update-image-request'), $form_attributes); ?>
        <label for="">Profile Image</label>
        <input type="file" name="profile-image" class="dropify" data-show-remove="false" data-default-file="<?= base_url($user_info["profile_pic"]) ?>" />
        <button type="submit" class="btn btn-gradient-primary btn-block mt-1" name="button">Update</button>
      </form>
    </div>

    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Information</h4>
          <?php $form_attributes = array('enctype'=>'multipart/form-data' ,'class' => 'pt-3');?>
          <?php echo form_open(base_url('admin/update/profile'), $form_attributes); ?>
            <div class="form-group">
              <label for="exampleInputName1">Name</label>
              <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Name" name="name" value="<?= set_value('name' , $user_info["name"]); ?>">
              <small class="text-danger"><?=  form_error('name') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Email </label>
              <input type="text" class="form-control"  placeholder="Email" name="email" value="<?= set_value('email' ,$user_info["email"]); ?>">
              <small class="text-danger"><?=  form_error('email') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password'); ?>">
              <small class="text-danger"><?=  form_error('password') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Confirm Password</label>
              <input type="password" class="form-control" placeholder="Confirm Password" name="co-password" value="<?= set_value('co-password'); ?>">
              <small class="text-danger"><?=  form_error('co-password') ?></small>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Dropify -->
<link rel="stylesheet" href="<?= base_url('node_modules/dropify/dist/css/dropify.min.css') ?>">
<script src="<?= base_url('node_modules/dropify/dist/js/dropify.min.js') ?>" charset="utf-8"></script>

<script type="text/javascript">
$(".dropify").dropify();
</script>
