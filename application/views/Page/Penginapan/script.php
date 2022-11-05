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
          window.location.href = "<?= base_url('penginapan/deleted/'); ?>" + id
        }
      });
  })
  //  data

  $(document).on('click', '.edit', function() {
    toggleModal();
    const dataid = $(this).data('id');
    async function getdata(id) {
      const requestdata = await axios.get('<?= base_url('penginapan/getById/') ?>' + id).catch((err) => {
        console.log(err.response)
      });
      if (requestdata?.status ?? 400 == 200) {

        const data = requestdata.data;
        $("#jenis_penginapan_id").val(data?.jenis_penginapan_id ?? "");
        $("#kelas_inap_id").val(data?.kelas_inap_id ?? "");
        $("#nama_penginapan").val(data?.nama_penginapan ?? "");
        $("#jumlah_kamar").val(data?.jumlah_kamar ?? "");
        $("#perizinan").val(data?.perizinan ?? "");
        $("#nama_pemilik").val(data?.nama_pemilik ?? "");
        $("#alamat_penginapan").val(data?.alamat_penginapan ?? "");
        $("#no_telp").val(data?.no_telp ?? "");
        $("#alamat_web").val(data?.alamat_web ?? "");
        $("#latitude").val(data?.laritude ?? "");
        $("#longitude").val(data?.logitude ?? "");
        $("#formmodal").attr('action', '<?= base_url('penginapan/update/') ?>' + id)
      };

    }
    getdata(dataid)
  })
</script>