<style>
  .form-control{
        font-size: 16px !important;
  }
</style>

<?php
$this->ci = &get_instance();
$blog_likes = $this->ci->NewsM->get_total_like();
?>
<?php foreach ($blog_info as $key => $info): ?>
  <div class="event-item border mt-3">
    <div class="row">
      <div class="col-12 col-sm-6">
         <?php $path= explode(',' ,$info['file_paths']) ?>
        <img class="img-fluid img-fit event-img" src="<?= base_url($path[0]) ?>" alt=""/>
      </div>
      <div class="col-12 col-sm-6 d-flex flex-column justify-content-between px-5">
        <div class="pt-4">
          <div class="event-user d-flex">
            <img src="<?= base_url($info["blogger_pic"]) ?>" alt=""/>
            <div class="info">
              <h6><?= $info["blogger_name"] ?></h6>
              <p><?= $info["post_date"] ?></p>
            </div>
          </div>
          <div class="event-details pb-4">
            <h3><?= $info["post_title"] ?></h3>
          </div>
          <p class="event-description"><?= tease($info["description"] ,5) ?></p>
        </div>
        <div class="event-comment border-top py-4 d-flex justify-content-between pr-3">
          <div class="d-flex">
            <span class="views">9 views </span>
            <a class="write-comment ml-3" href="">Write a comment</a>
          </div>
          <?php
              $total_likes = 0;
              foreach ($blog_likes as $key => $l_info) {
                if ($l_info["blog_id"] == $info["blog_id"]) {
                  $total_likes =  $l_info["total_like"];
                }
              }
              $like_class = 'far';
              if (!empty($this->session->user_login["public_key"]) && !empty($info["blog_id_like"]) && $info["blog_id_like"] == $info["blog_id"] && $info["blog_user_like_id"] == $this->session->user_login["public_key"]) {
                $like_class = ($info["blog_like"] == LIKE)?'fa':'far';
              }
            ?>
          <span class="like-btn"> <span class="total_like"><?= ($total_likes > 0)?$total_likes:'' ?></span>
          <?php if (!empty($this->session->user_login["public_key"])): ?>
            <i class="like-icon <?= $like_class ?> fa-heart blog_like" is-like="<?= true ?>" blog-id="<?= $info["blog_id"] ?>"></i>
          <?php else: ?>
            <i class="like-icon <?= $like_class ?> fa-heart " data-toggle="tooltip" data-placement="top" title="An account is required" is-like="<?= true ?>" blog-id="<?= $info["blog_id"] ?>"></i>
          <?php endif; ?>
        </span>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<script type="text/javascript">
var API_URL = '<?= base_url() ?>'
  $('body').on('click', '.blog_like', function(event) {
    event.preventDefault();
    $(this).toggleClass('fa far');;
    // $(this).parent('span').text(2)
    var totalCount = $(this).parent('span').text();
    if ($(this).hasClass('fa')) {
      $(this).parent('span').find('.total_like').text(++totalCount);
    }else {
      $(this).parent('span').find('.total_like').text(--totalCount);
    }
    var blog_id = $(this).attr('blog-id');
    $.ajax({
      type: "POST",
      url: API_URL + "blog-like",
      data: {'blog_id':blog_id},
      dataType: 'json'
    }).done(function() {

    })
    .fail(function() {

    });
  });
</script>
