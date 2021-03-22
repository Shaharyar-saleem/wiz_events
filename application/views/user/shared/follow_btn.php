<?php if (is_login_user($member_info["user_id"])): ?>
  <a href="<?= base_url('user-profile/').$member_info["user_id"] ?>" class="btn btn-success btn-block">Profile</a>
<?php else: ?>
  <?php if (is_login()): ?>
    <?php if ($member_info["following_id"] == $this->session->user_login["public_key"]): ?>
      <a href="<?= base_url('follow/').$member_info["user_id"] ?>" class="btn btn-primary">Following</a>
    <?php else: ?>
      <a title="Un-follow" href="<?= base_url('follow/').$member_info["user_id"] ?>" class="btn btn-primary">Follow</a>
    <?php endif; ?>
  <?php else: ?>
    <button type="button" disabled class="btn btn-primary" >Follow</button>
  <?php endif; ?>
<?php endif; ?>
