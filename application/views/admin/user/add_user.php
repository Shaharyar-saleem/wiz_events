<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Add User </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/user') ?>">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add User</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <?php $form_attributes = array('enctype'=>'multipart/form-data' ,'class' => 'pt-3');?>
          <?php echo form_open(base_url('admin/add/user'), $form_attributes); ?>
            <div class="form-group">
              <label for="exampleInputName1">Name</label>
              <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Name" name="name" value="<?= set_value('name'); ?>">
              <small class="text-danger"><?=  form_error('name') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Email</label>
              <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
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
            <div class="form-group">
              <select class="form-control" name="permission_group">
                <option selected disabled>Select Group</option>
                <?php foreach ($group_info as $key => $info): ?>
                  <option value="<?= $info["public_key"] ?>"><?= $info["name"] ?></option>
                <?php endforeach; ?>
              </select>
              <small class="text-danger"><?=  form_error('permission_group') ?></small>
            </div>

            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
