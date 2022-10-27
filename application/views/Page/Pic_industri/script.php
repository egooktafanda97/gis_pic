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
          window.location.href = "<?= base_url('pic_industri/deleted/'); ?>"+id
        } 
      });
  })
//  data

  $(document).on('click','.edit',function(){
          const dataid =$(this).data('id');
          async function getdata(id){
            const requestdata = await axios.get('<?= base_url('pic_industri/getById/')?>'+id).catch((err)=>{
              console.log(err.response)
            });
            if (requestdata?.status??400 == 200){
              
              const data = requestdata.data;
              $("#pic_category_name").val(data?.pic_category_name??"");
              $("#pic_industry_type_name").val(data.pic_industry_type_name);
              $("#formmodal").attr('action','<?= base_url('pic_industri/update/')?>'+id)

             

            };

          }
          getdata(dataid)
        })

</script>

