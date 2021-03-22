
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="<?= base_url('admin/dashboard') ?>">
      <span class="font-weight-bold" style="font-size:36px">WiZ</span> <img src="<?= base_url() ?>assets/img/logo.webp" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="<?= base_url('admin/dashboard') ?>">
      <img src="<?= base_url() ?>assets/img/logo.webp" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <?php $image_path = (!empty($login_info["profile_pic"]))?$login_info["profile_pic"]:"assets/img/user-icon.png" ?>
            <img src="<?= base_url($image_path) ?>" alt="image">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black"><?= $login_info["name"] ?></p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="<?= base_url('admin/update/profile') ?>">
            <i class="mdi mdi-cached mr-2 text-success"></i> Update Profile </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('admin/logout') ?>">
            <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
        </div>
      </li>
      <li class="nav-item d-none d-lg-block full-screen-link">
        <a class="nav-link">
          <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
        </a>
      </li>
      <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="<?= base_url('admin/logout') ?>">
          <i class="mdi mdi-power"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
