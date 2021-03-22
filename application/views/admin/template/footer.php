<!-- partial:partials/_footer.html -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block ">Copyright © <?= date('Y') ?> <a href="<?= base_url() ?>" target="_blank"><?= PROJECT_TITLE ?></a>. All rights reserved.</span>
    <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> -->
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->

</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->

<!-- endinject -->
<!-- Plugin js for this page -->
<!-- <script src="<?= base_url() ?>assets/admin/vendors/chart.js/Chart.min.js"></script> -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url() ?>assets/admin/js/off-canvas.js"></script>
<script src="<?= base_url() ?>assets/admin/js/hoverable-collapse.js"></script>
<script src="<?= base_url() ?>assets/admin/js/misc.js"></script>
<!-- endinject -->
<script src="<?= base_url() ?>node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
<script src="<?= base_url() ?>node_modules/trumbowyg/dist/plugins/emoji/trumbowyg.emoji.min.js"></script>
<!-- Custom js for this page -->

<script src="<?= base_url() ?>assets/admin/js/todolist.js"></script>
<script src="<?= base_url() ?>assets/js/ajax_request.js"></script>
<!-- End custom js for this page -->
<script type="text/javascript">
  $('#text-editor').trumbowyg({
    btns: [
       ['viewHTML'],
       ['undo', 'redo'], // Only supported in Blink browsers
       ['formatting'],
       ['strong', 'em', 'del'],
       ['superscript', 'subscript'],
       ['link'],
       ['emoji'],
       ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
       ['unorderedList', 'orderedList'],
       ['fullscreen']
   ]
  });
</script>
</body>

</html>
