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
          window.location.href = "<?= base_url('industri/deleted/'); ?>" + id
        }
      });
  })
  //  data

  $(document).on('click', '.edit', function() {
    toggleModal();
    const dataid = $(this).data('id');
    async function getdata(id) {
      const requestdata = await axios.get('<?= base_url('industri/getById/') ?>' + id).catch((err) => {
        console.log(err.response)
      });
      if (requestdata?.status ?? 400 == 200) {

        const data = requestdata.data;
        $("#pic_industri_id").val(data?.pic_industri_id ?? "");
        $("#sektor_industri_id").val(data?.sektor_industri_id ?? "");
        $("#sub_sektor_industri_id").val(data?.sub_sektor_industri_id ?? "");
        $("#nama_industri").val(data?.nama_industri ?? "");
        $("#perizinan_industri").val(data?.perizinan_industri ?? "");
        $("#besar_modal_industri").val(data?.besar_modal_industri ?? "");
        $("#nama_pemilik_industri").val(data?.nama_pemilik_industri ?? "");
        $("#telp_pemilik_industri").val(data?.telp_pemilik_industri ?? "");
        $("#deskripsi_industri").val(data?.deskripsi_industri ?? "");
        $("#alamat_industri").val(data?.alamat_industri ?? "");
        $("#latitude").val(data?.latitude ?? "");
        $("#longitude").val(data?.longitude ?? "");
        $("#formmodal").attr('action', '<?= base_url('industri/update/') ?>' + id)
      };

    }
    getdata(dataid)
  })

</script>