<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Blog </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/blog') ?>">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <?php $form_attributes = array('enctype'=>'multipart/form-data' ,'class' => 'pt-3');?>
          <?php echo form_open(base_url('admin/add/blog'), $form_attributes); ?>
            <div class="form-group">
              <label for="exampleInputName1">Post Type</label>
              <select name="post_type" class="form-control form-control-sm">
                <option selected value="<?= NEW_BLOG ?>">New Blog</option>
                <option value="<?= WIZ_EVENT ?>">Wiz Events of the Week</option>
              </select>
              <small class="text-danger"><?=  form_error('post_type') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Post Title</label>
              <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Post Title" name="post_title" value="<?= set_value('post_title'); ?>">
              <small class="text-danger"><?=  form_error('post_title') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Date</label>
              <input type="date" class="form-control" id="exampleInputPassword4" value="<?= date('Y-m-d') ?>" name="post_date" value="<?= set_value('post_date'); ?>" >
              <small class="text-danger"><?=  form_error('post_date') ?></small>
            </div>
            <div class="form-group">
              <label>File upload</label><br>
              <input type="file" multiple accept="image/*,.mp4 ,.webm,.ogg" required name="post_file[]" class="btn btn-info">
              <small class="text-danger"><?=  form_error('post_file[]') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Description</label>
              <textarea style="max-height: 216px;" name="description"  class="form-control" id="text-editor" rows="2"><?= set_value('description'); ?></textarea>
              <small class="text-danger"><?=  form_error('description') ?></small>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
            <button type="submit" name="save-as-draft" class="btn btn-light">Save as Draft</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
