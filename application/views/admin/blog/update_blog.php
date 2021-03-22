<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Blog </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/blog') ?>">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Blog</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <?php $form_attributes = array('enctype'=>'multipart/form-data' ,'class' => 'pt-3');?>
          <?php echo form_open(base_url('admin/update/blog/').$blog_info["blog_id"], $form_attributes); ?>
            <div class="form-group">
              <label for="exampleInputName1">Post Type</label>
              <select name="post_type" class="form-control form-control-sm">
                <option <?= ($blog_info["post_type"] == NEW_BLOG)?"selected":"" ?> value="<?= NEW_BLOG ?>">New Blog</option>
                <option <?= ($blog_info["post_type"] == WIZ_EVENT)?"selected":"" ?> value="<?= WIZ_EVENT ?>">Wiz Events of the Week</option>
              </select>
              <small class="text-danger"><?=  form_error('post_type') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Post Title</label>
              <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Post Title" name="post_title" value="<?= set_value('post_title' , $blog_info["title"]); ?>">
              <small class="text-danger"><?=  form_error('post_title') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Date</label>
              <input type="date" class="form-control" id="exampleInputPassword4"  name="post_date" value="<?= set_value('post_date' , $blog_info["post_date"]); ?>" >
              <small class="text-danger"><?=  form_error('post_date') ?></small>
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" name="is_draft" class="form-check-input" <?= ($blog_info["status"] == DRAFT)?"checked":"" ?> value="DRAFT"> Draft </label>
              </div>
              <small class="text-danger"><?=  form_error('is_draft') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Description</label>
              <textarea style="max-height: 216px;" name="description"  class="form-control" id="text-editor" rows="2"><?= set_value('description'); ?><?= $blog_info["description"] ?></textarea>
              <small class="text-danger"><?=  form_error('description') ?></small>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
