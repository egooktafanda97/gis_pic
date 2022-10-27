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
          window.location.href = "<?= base_url('map_config/deleted/'); ?>"+id
        } 
      });
  })
//  ubah data

  $(document).on('click','.edit',function(){
          const dataid =$(this).data('id');
          async function getdata(id){
            const requestdata = await axios.get('<?= base_url('map_config/getById/')?>'+id).catch((err)=>{
              console.log(err.response)
            });
            if (requestdata?.status??400 == 200){
              
              const data = requestdata.data;
              $("#config_key").val(data?.config_key??"");
              $("#config_value").val(data?.config_value??"");
              $("#table_config").val(data?.table_config??"");
              $("#forenkey_id").val(data?.forenkey_id??"");
              $("#formmodal").attr('action','<?= base_url('map_config/update/')?>'+id)

             

            };

          }
          getdata(dataid)
        })

</script>

