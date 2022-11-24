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
          window.location.href = "<?= base_url('marker/deleted/'); ?>" + id
        }
      });
  })
  //  ubah data

  $(document).on('click', '.edit', function() {
    const dataid = $(this).data('id');
    async function getdata(id) {
      const requestdata = await axios.get('<?= base_url('marker/getById/') ?>' + id).catch((err) => {
        console.log(err.response)
      });
      if (requestdata?.status ?? 400 == 200) {

        const data = requestdata.data;
        $("#name").val(data?.name ?? "");
        $("#formmodal").attr('action', '<?= base_url('marker/update/') ?>' + id)
      };
    }
    getdata(dataid)
  });

  $("#typeInput").change(function() {
    const val = $(this).val();
    let html = ``;
    switch (val) {
      case 'file':
        html =
          /*html*/
          `
          <div class="form-group">
            <label>Value</label>
            <input type="file" name="config_value" class="form-control form-control-sm"/>
          </div>
        `;
        $("#typeInputs").html(html);
        break;
      case 'text':
        html =
          /*html*/
          `
          <div class="form-group">
            <label>Value</label>
            <input type="text" name="config_value" class="form-control form-control-sm"/>
          </div>
        `;
        $("#typeInputs").html(html);
        break;
      case 'date':
        html =
          /*html*/
          `
          <div class="form-group">
            <label>Value</label>
            <input type="date" name="config_value" class="form-control form-control-sm"/>
          </div>
        `;
        $("#typeInputs").html(html);
        break;
      case 'color':
        html =
          /*html*/
          `
          <div class="form-group">
            <label>Value</label>
            <input type="color" name="config_value" class="form-control form-control-sm"/>
          </div>
        `;
        $("#typeInputs").html(html);
        break;
      default:
        html =
          /*html*/
          `
          <div class="form-group">
            <label>Value</label>
            <input type="text" name="config_value" class="form-control form-control-sm"/>
          </div>
        `;
        $("#typeInputs").html(html);
        break;
    }
  })
</script>