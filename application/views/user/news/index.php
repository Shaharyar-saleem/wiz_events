<div class="container news pt-5">
  <div class="row">
    <div class="col-md-8 news-menu-list">
      <ul>
        <li><a href="<?= base_url('news') ?>" class="<?= (empty($post_type))?"active":"" ?>">All Posts</a></li>
        <li><a href="<?= base_url('news/news-blog') ?>" class="<?= ($post_type == NEW_BLOG)?"active":"" ?>">News Blog</a></li>
        <li><a href="<?= base_url('news/wiz-event') ?>" class="<?= ($post_type == WIZ_EVENT)?"active":"" ?>">Wiz Events of the Week</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <div class="input-with-icon"><i class="icon fas fa-search"></i>
        <input class="form-control" type="text" placeholder="Search"/>
      </div>
    </div>
  </div>
    <?= $news_list ?>
</div>
