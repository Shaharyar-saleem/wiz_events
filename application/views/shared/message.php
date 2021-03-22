<?php if ($this->session->flashdata('user_info') || !empty(validation_errors())): ?>
  <?php
      $status = ($this->session->flashdata('user_info'))?$this->session->flashdata('user_info')["status"]:DE_ACTIVE;
      $message = ($this->session->flashdata('user_info'))?$this->session->flashdata('user_info')["message"]:validation_errors();
   ?>
   <script type="text/javascript">
   $.toast().reset('all');
          $.toast({
              heading: '<?= ($status == DE_ACTIVE)?'Error':'Info' ?>',
              text: `<?= $message ?>`,
              position: 'top-right',
              loaderBg: '<?= ($status == DE_ACTIVE)?'#f33923':'#f33923' ?>',
              icon: '<?= ($status == DE_ACTIVE)?'error':'success' ?>',
              hideAfter: 4500,
              stack: 6
          });
   </script>
<?php endif; ?>
