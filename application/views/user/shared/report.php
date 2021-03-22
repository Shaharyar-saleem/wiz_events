<div class="modal fade" id="reportModel<?= $member_info["user_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <?php $form_attributes = array('class' => 'form submit_form');?>
    <?php echo form_open(base_url('report/user/').$member_info["user_id"], $form_attributes); ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <span class="font-weight-bold">Report Member</span> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="font-weight-bold">Help us understand why you’re reporting this member.</p>
            <input type="radio" class="mt-2" name="message" value="Offensive Content">&nbsp &nbsp Offensive Content<br>
            <input type="radio" name="message" value="Offensive Media">&nbsp &nbsp Offensive Media<br>
            <input type="radio" name="message" value="Spam">&nbsp &nbsp Spam<br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Report</button>
        </div>
      </div>
    </form>
  </div>
</div>
