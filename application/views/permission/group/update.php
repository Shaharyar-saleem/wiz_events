<!-- Add Group -->
<div class="modal fade" id="update_group<?= $info["public_key"] ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <?php $form_attributes = array('class' => 'submit_form pt-3');?>
  <?php echo form_open(base_url('admin/update/group/').$info["public_key"], $form_attributes); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Group <?= $info["name"] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputName1">Group Name</label>
            <input type="text" class="form-control"   placeholder="Group Name" name="group_name" value="<?= set_value('group_name' , $info["name"]); ?>">
            <small class="text-danger"><?=  form_error('group_name') ?></small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Group Description</label>
            <textarea name="group_description" class="form-control" rows="3" cols="80"><?= $info["description"] ?></textarea>
            <small class="text-danger"><?=  form_error('group_description') ?></small>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="all_page_access" <?= ($info["group_type"] == FULL_ACCESS)?"checked":"" ?> value="all_page_access" class="form-check-input"> All Page Access </label>
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
