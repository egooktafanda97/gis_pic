<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Detail Kecamatan</strong>
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
                                            <th>Nama Kecamatan</th>
                                            <th><?= $val['nama_kecamatan'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Luas Wilayah</th>
                                            <th><?= $val['luas_wilayah'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Batas Wilayah</th>
                                            <th><?= $val['batas_wilayah'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Letak dan Luas</th>
                                            <th><?= $val['letak'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Geologi</th>
                                            <th><?= $val['geologi'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Iklim</th>
                                            <th><?= $val['iklim'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Penduduk</th>
                                            <th><?= $val['jumlah_penduduk'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Laju Pertumbuhan Penduduk</th>
                                            <th><?= $val['laju_pertumbuhan'] ?? "" ?></th>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-3 bg-secondary">
                    <a href="<?= base_url(); ?>kecamatan" class="btn btn-primary float-right btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ sample-page ] end -->