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
          window.location.href = "<?= base_url('tempat_ibadah/deleted/'); ?>" + id
        }
      });
  })
  //  data

  $(document).on('click', '.edit', function() {
    toggleModal();
    const dataid = $(this).data('id');
    async function getdata(id) {
      const requestdata = await axios.get('<?= base_url('tempat_ibadah/getById/') ?>' + id).catch((err) => {
        console.log(err.response)
      });
      if (requestdata?.status ?? 400 == 200) {

        const data = requestdata.data;
        $("#jenis_tempat_ibadah").val(data?.jenis_tempat_ibadah ?? "");
        $("#nama_tempat_ibadah").val(data?.nama_tempat_ibadah ?? "");
        $("#luas_tempat_ibadah").val(data?.luas_tempat_ibadah ?? "");
        $("#perizinan").val(data?.perizinan ?? "");
        $("#alamat").val(data?.alamat ?? "");
        $("#nama_penanggung_jawab").val(data?.nama_penanggung_jawab ?? "");
        $("#no_telp").val(data?.no_telp ?? "");
        $("#alamat_website").val(data?.alamat_website ?? "");
        $("#latitude").val(data?.latitude ?? "");
        $("#longitude").val(data?.longitude ?? "");
        $("#formmodal").attr('action', '<?= base_url('tempat_ibadah/update/') ?>' + id)
      };

    }
    getdata(dataid)
  })
</script>