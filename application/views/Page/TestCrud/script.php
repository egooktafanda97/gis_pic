 <!-- tambahdata -->
 <?php if (!empty($this->session->flashdata("success"))): ?>
      <script>
        swal({
          title : "Berhasil",
          text : "<?= $this->session->flashdata("success") ?>",
          icon : "success",
          button : "ok",

        })
      </script>
      <?php endif ?>
      <?php if (!empty($this->session->flashdata("error"))): ?>
      <script>
        swal({
          title : "Opppss",
          text : "<?= $this->session->flashdata("error") ?>",
          icon : "error",
          button : "ok",

        })
        </script>
      <?php endif ?>