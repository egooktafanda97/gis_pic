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
          window.location.href = "<?= base_url('sub_sektor/deleted/'); ?>"+id
        } 
      });
  })
//  ubah data

  $(document).on('click','.edit',function(){
          const dataid =$(this).data('id');
          async function getdata(id){
            const requestdata = await axios.get('<?= base_url('sub_sektor/getById/')?>'+id).catch((err)=>{
              console.log(err.response)
            });
            if (requestdata?.status??400 == 200){
              
              const data = requestdata.data;
              $("#nama_subsektor_industri").val(data?.nama_subsektor_industri??"");
              $("#formmodal").attr('action','<?= base_url('sub_sektor/update/')?>'+id)

             

            };

          }
          getdata(dataid)
        })

</script>

