<?php foreach ($all_members as $key => $member_info): ?>
<div class="col member__item">
  <div class="member__item__wrapper border">
    <div class="member__header" style="background-image:url('<?= $member_info['cover_image'] ?>')"></div>
    <div class="member__body px-3">
      <a href="<?= base_url('user-profile/').$member_info["user_id"] ?>">
        <img class="member__img" src="<?= (!empty($member_info["profile_image"]))?base_url($member_info["profile_image"]):base_url("assets/img/no-image.png") ?>" alt=""/>
      </a>
      <p>
        <?= $member_info["name"] ?>
      </p>
      <div class="d-flex">
        <!-- follow btn  -->
        <?php include APPPATH . 'views/user/shared/follow_btn.php'?>

        <?php if (empty($member_info["reporter_user_id"]) || $member_info["reporter_user_id"] != $this->session->user_login["public_key"]): ?>
        <div class="dropdown bottom__hide">
          <button class="btn btn-sm dropdown-toggle caret-none" id="report-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="report-user">
            <!-- Report Btn -->
            <?php include APPPATH . 'views/user/shared/report_btn.php'?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>
<?php include APPPATH . 'views/user/shared/report.php'?>
<?php endforeach; ?>
