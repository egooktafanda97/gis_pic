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
          window.location.href = "<?= base_url('pendidikan/deleted/'); ?>"+id
        } 
      });
  })
// edit data

  $(document).on('click','.edit',function(){
          const dataid =$(this).data('id');
          async function getdata(id){
            const requestdata = await axios.get('<?= base_url('pendidikan/getById/')?>'+id).catch((err)=>{
              console.log(err.response)
            });
            if (requestdata?.status??400 == 200){
              
              const data = requestdata.data;
              $("#jenis_pendidikan").val(data.jenis_pendidikan);
              $("#jenjang_pendidikan").val(data?.jenjang_pendidikan??"");
              $("#nama_pendidikan").val(data.nama_pendidikan);
              $("#perizinan_pendidikan").val(data.perizinan_pendidikan);
              $("#jumlah_tenaga_pendidik").val(data.jumlah_tenaga_pendidik);
              $("#alamat_pendidikan").val(data.alamat_pendidikan);
              $("#nama_pimpinan").val(data.nama_pimpinan);
              $("#website_pendidikan").val(data.website_pendidikan);
              $("#koordinat_pendidikan").val(data.koordinat_pendidikan);
              $("#gambar").val(data.gambar);
              $("#formmodal").attr('action','<?= base_url('pendidikan/update/')?>'+id)

             

            };

          }
          getdata(dataid)
        })

</script>

