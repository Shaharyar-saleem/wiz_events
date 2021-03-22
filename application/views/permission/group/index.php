  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Group </h3>
      <div class="text-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".add_group">Add Group</button>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Group Name </th>
                  <th> Group description </th>
                  <th> Group Access </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($group_info as $key => $info): ?>
                  <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $info["name"] ?></td>
                    <td><?= $info["description"] ?></td>
                    <td><?= ($info["group_type"] == FULL_ACCESS)?"Permission All Page":"Custom Permissiom" ?></td>
                    <td>
                      <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#update_group<?= $info["public_key"] ?>">Edit</button>
                    </td>
                  </tr>
                  <?php require APPPATH . 'views/permission/group/update.php';?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Add Group -->
<div class="modal fade add_group"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <?php $form_attributes = array('class' => 'submit_form pt-3');?>
  <?php echo form_open(base_url('admin/add/group'), $form_attributes); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputName1">Group Name</label>
            <input type="text" class="form-control"  placeholder="Group Name" name="group_name" value="<?= set_value('group_name'); ?>">
            <small class="text-danger"><?=  form_error('group_name') ?></small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Group Description</label>
            <textarea name="group_description" class="form-control" rows="3" cols="80"></textarea>
            <small class="text-danger"><?=  form_error('group_description') ?></small>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="all_page_access" value="all_page_access" class="form-check-input"> All Page Access </label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
