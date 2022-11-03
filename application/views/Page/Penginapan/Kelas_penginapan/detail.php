<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Detail Data Kelas Penginapan</strong>
    </div>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-6">
            <div class="card">

                <div class="card-header bg-primary text-white">
                    <h5>Detail Data</h5>
                </div>
                <div class="card-body justify-content">
                    <div class="row">
                        <div class="col-12">

                            <table class="table table-bordered">
                                <tbody>
                                    <?php foreach ($result as $val) : ?>
                                        <tr>
                                            <th>Nama Kelas Penginapan</th>
                                            <th><?= $val['nama_kelas_penginapan'] ?? "" ?></th>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-3 bg-secondary">
                    <a href="<?= base_url(); ?>kelas_penginapan" class="btn btn-primary float-right btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ sample-page ] end -->