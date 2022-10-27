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
          window.location.href = "<?= base_url('industri/deleted/'); ?>"+id
        } 
      });
  })
//  data

  $(document).on('click','.edit',function(){
          const dataid =$(this).data('id');
          async function getdata(id){
            const requestdata = await axios.get('<?= base_url('industri/getById/')?>'+id).catch((err)=>{
              console.log(err.response)
            });
            if (requestdata?.status??400 == 200){
              
              const data = requestdata.data;
              $("#jenis_industri").val(data?.jenis_industri??"");
              $("#sub_industri").val(data.sub_industri);
              $("#nama_industri").val(data.nama_industri);
              $("#perizinan_industri").val(data.perizinan_industri);
              $("#besar_modal_industri").val(data.besar_modal_industri);
              $("#nama_pemilik_industri").val(data.nama_pemilik_industri);
              $("#telp_pemilik_industri").val(data.telp_pemilik_industri);
              $("#deskripsi_industri").text(data.deskripsi_industri);
              $("#alamat_industri").val(data.alamat_industri);
              $("#koordinat_industri").val(data.koordinat_industri);
              $("#gambar").val(data.gambar);
              $("#formmodal").attr('action','<?= base_url('industri/update/')?>'+id)

             

            };

          }
          getdata(dataid)
        })

</script>

