<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Detail Data Industri</strong>
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

                                    <tr>
                                        <th>Jenis Penginapan</th>
                                        <th><?= $val['nama_jenis_penginapan'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Kelas Penginapan</th>
                                        <th><?= $val['nama_kelas_penginapan'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nama Penginapan</th>
                                        <th><?= $val['nama_penginapan'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Kamar</th>
                                        <th><?= $val['jumlah_kamar'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Perizinan</th>
                                        <th><?= $val['perizinan'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nama Pemilik</th>
                                        <th><?= $val['nama_pemilik'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Alamat Penginapan</th>
                                        <th><?= $val['alamat_penginapan'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>No telpon</th>
                                        <th><?= $val['no_telp'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Alamat Web</th>
                                        <th><?= $val['alamat_web'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Gambar</th>
                                        <th><?= $val['gambar'] ?? "" ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-3 bg-secondary">
                    <a href="<?= base_url(); ?>penginapan" class="btn btn-primary float-right btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ sample-page ] end -->