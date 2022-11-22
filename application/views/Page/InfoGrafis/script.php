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
                    window.location.href = "<?= base_url('Info_grafis/deleted/'); ?>" + id
                }
            });
    })
    //  data

    $(document).on('click', '.edit', function() {
        toggleModal();
        const dataid = $(this).data('id');
        async function getdata(id) {
            const requestdata = await axios.get('<?= base_url('Info_grafis/getById/') ?>' + id).catch((err) => {
                console.log(err.response)
            });
            if (requestdata?.status ?? 400 == 200) {

                const data = requestdata.data;
                $("#kode_kecamatan").val(data?.kode_kecamatan ?? "");
                $("#tahun").val(data?.tahun ?? "");
                $("#tanggal").val(data?.tanggal ?? "");
                $("#faktor").val(data?.faktor ?? "");
                $("#sub_faktor").val(data?.sub_faktor ?? "");
                $("#nama").val(data?.nama ?? "");
                $("#keterangan").val(data?.keterangan ?? "");
                $("#formmodal").attr('action', '<?= base_url('Info_grafis/update/') ?>' + id)
            };

        }
        getdata(dataid)
    });
    async function getCoreDataInfoGrafis() {
            const get = await axios.get(`<?= api_url("sqlite/") ?>`).catch((err) => {
                console.log(err.response)
            });
            if (get) {
                $("[name='faktor']")
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">pilih faktor</option>')
                let html = ``;
                get?.data?.map((_) => {
                    html += /*html*/ `
                    <option value="${_?.faktor}">${_?.faktor}</option>
                    `;
                })
                $("[name='faktor']").append(html);

                $("[name='faktor']").change(function() {
                    const avengers = get?.data?.filter(v => v?.faktor === $(this).val());
                    if (avengers) {
                        let ht = ``;
                        avengers[0]?.sub_faktor?.map((__) => {
                            ht += /*html*/ `
                            <option value="${__}">${__}</option>
                            `;
                        });
                        $("[name='sub_faktor']")
                            .find('option')
                            .remove()
                            .end()
                            .append('<option value="">pilih sub faktor</option>')
                        $("[name='sub_faktor']").append(ht);
                    }

                })
            }

        }
        (function() {
            getCoreDataInfoGrafis()
        })();
</script>