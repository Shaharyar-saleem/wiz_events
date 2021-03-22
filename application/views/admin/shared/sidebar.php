
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="<?= base_url('admin/update/profile') ?>" class="nav-link">
        <div class="nav-profile-image">
          <?php $image_path = (!empty($login_info["profile_pic"]))?$login_info["profile_pic"]:"assets/img/user-icon.png" ?>
          <img src="<?= base_url($image_path) ?>" alt="profile">
          <span class="login-status online"></span>
          <!-- change to offline or busy as needed -->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2"><?= $login_info["name"] ?></span>
          <span class="text-secondary text-small"><?= $login_info["group_name"] ?></span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Blog</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi mdi-blogger menu-icon"></i>
      </a>
      <div class="collapse" id="blog">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/blog') ?>">Blog List</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/add/blog') ?>">Add Blog</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#permission" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Permission</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi mdi mdi-key menu-icon"></i>
      </a>
      <div class="collapse" id="permission">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/group') ?>">Group</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/manage/permission') ?>">Manage Privileages</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#admin-user" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Admin User</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi  mdi-account-box menu-icon"></i>
      </a>
      <div class="collapse" id="admin-user">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/user') ?>">User</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/add/user') ?>">Add User</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#wiz-user" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Wiz-User</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi  mdi-account-box menu-icon"></i>
      </a>
      <div class="collapse" id="wiz-user">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/wiz-user') ?>">Wiz User</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#wiz-event" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Wiz-Event</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi  mdi-account-box menu-icon"></i>
      </a>
      <div class="collapse" id="wiz-event">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/wiz-event') ?>">Wiz Event</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
