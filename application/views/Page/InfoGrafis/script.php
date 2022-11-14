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
                    window.location.href = "<?= base_url('pariwisata/deleted/'); ?>" + id
                }
            });
    })
    //  data

    $(document).on('click', '.edit', function() {
        toggleModal();
        const dataid = $(this).data('id');
        async function getdata(id) {
            const requestdata = await axios.get('<?= base_url('pariwisata/getById/') ?>' + id).catch((err) => {
                console.log(err.response)
            });
            if (requestdata?.status ?? 400 == 200) {

                const data = requestdata.data;
                $("#jenis_pariwisata_id").val(data?.jenis_pariwisata_id ?? "");
                $("#kepemilikan").val(data?.kepemilikan ?? "");
                $("#nama_tempat_pariwisata").val(data?.nama_tempat_pariwisata ?? "");
                $("#alamat_tempat_pariwisata").val(data?.alamat_tempat_pariwisata ?? "");
                $("#perizinan").val(data?.perizinan ?? "");
                $("#jumlah_pengunjung_rata").val(data?.jumlah_pengunjung_rata ?? "");
                $("#nama_pemilik").val(data?.nama_pemilik ?? "");
                $("#no_telp").val(data?.no_telp ?? "");
                $("#alamat_website").val(data?.alamat_website ?? "");
                $("#latitude").val(data?.latitude ?? "");
                $("#longitude").val(data?.longitude ?? "");
                $("#formmodal").attr('action', '<?= base_url('pariwisata/update/') ?>' + id)
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