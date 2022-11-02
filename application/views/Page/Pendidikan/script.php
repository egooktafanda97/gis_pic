<!-- tambahdata -->
<?php if (!empty($this->session->flashdata("success"))) : ?>
  <script>
    swal({
      title: "Berhasil",
      text: "<?= $this->session->flashdata("success") ?>",
      icon: "success",
      button: "ok",

    })
  </script>
<?php endif ?>
<?php if (!empty($this->session->flashdata("error"))) : ?>
  <script>
    swal({
      title: "Opppss",
      text: "<?= $this->session->flashdata("error") ?>",
      icon: "error",
      button: "ok",

    })
  </script>

<?php endif ?>
<!-- Hapuss -->

<script>
  $(document).ready(function() {
    $("#example").DataTable({
      responsive: {
        details: {
          type: "column",
          target: "tr",
        },
      },
      columnDefs: [{
        className: "control",
        orderable: false,
        targets: 0,
      }, ],
      paging: false,
      ordering: false,
      info: false,
      "searching": false
    });
  });
</script>

<script>
  $(document).on("click", ".delete", function() {
    const id = $(this).data("id");
    swal({
        title: "Apa kamu yakin?",
        text: "Data ini akan di hapus!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = "<?= base_url('pendidikan/deleted/'); ?>" + id
        }
      });
  })
  //  data

  $(document).on('click', '.edit', function() {
    toggleModal();
    const dataid = $(this).data('id');
    async function getdata(id) {
      const requestdata = await axios.get('<?= base_url('pendidikan/getById/') ?>' + id).catch((err) => {
        console.log(err.response)
      });
      if (requestdata?.status ?? 400 == 200) {

        const data = requestdata.data;
        $("#jenis_pendidikan").val(data?.jenis_pendidikan ?? "");
        $("#jenjang_pendidikan_id").val(data?.jenjang_pendidikan_id ?? "");
        $("#nama_pendidikan").val(data?.nama_pendidikan ?? "");
        $("#perizinan_pendidikan").val(data?.perizinan_pendidikan ?? "");
        $("#jumlah_tenaga_pendidik").val(data?.jumlah_tenaga_pendidik ?? "");
        $("#nama_pimpinan").val(data?.nama_pimpinan ?? "");
        $("#alamat_pendidikan").val(data?.alamat_pendidikan ?? "");
        $("#website_pendidikan").val(data?.website_pendidikan ?? "");
        $("#latitude").val(data?.latitude ?? "");
        $("#longitude").val(data?.longitude ?? "");
        $("#formmodal").attr('action', '<?= base_url('pendidikan/update/') ?>' + id)
      };

    }
    getdata(dataid)
  })
</script>