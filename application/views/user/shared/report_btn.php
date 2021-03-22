<?php if (!is_login_user($member_info["user_id"])): ?>
  <?php if (is_login()): ?>
    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#reportModel<?= $member_info["user_id"]?>">
      Report
    </button>
  <?php else: ?>
    <button type="button" class="dropdown-item" disabled name="button">Report</button>
  <?php endif; ?>
<?php endif; ?>
