<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Blog List </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blog List</li>
      </ol>
    </nav>
  </div>

  <div class="">
    <?php foreach ($blog_info as $key => $info): ?>
      <?php if (!empty($info['title'])): ?>
        <div class="card mb-3 position-relative">
          <?php $file_info = explode(',',$info["file_paths"]); ?>
          <div class="card-body">
            <div class="position-absolute menu-option">
              <li class="nav-item dropdown">
                <a class="nav-link mdi mdi-dots-vertical" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('admin/update/blog/').$info["blog_id"] ?>">Edit</a>
                  <a class="dropdown-item" href="<?= base_url('admin/archive/blog/').$info["blog_id"] ?>">Archive</a>
                </div>
              </li>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <img class="card-img-top h-100"  src="<?= base_url($file_info[0]) ?>" alt="Card image cap">
              </div>
              <div class="col-lg-9">
                <div class="d-flex">
                  <h5 class="card-title"><?= $info["title"] ?></h5>
                </div>
                <p class="card-text"><?= tease($info["description"])." ..."; ?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>

 </div>

</div>
