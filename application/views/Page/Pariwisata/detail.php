<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Detail Pariwisata</strong>
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
                                        <th>Type Penginapan</th>
                                        <th><?= $val['nama_jenis_pariwisata'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Jenis Fasilitas</th>
                                        <th><?= $val['kepemilikan'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nama Fasilitas</th>
                                        <th><?= $val['nama_tempat_pariwisata'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <th><?= $val['alamat_tempat_pariwisata'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Perizinan</th>
                                        <th><?= $val['perizinan'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Kamar</th>
                                        <th><?= $val['jumlah_pengunjung_rata'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nama Pemilik</th>
                                        <th><?= $val['nama_pemilik'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>No telpon</th>
                                        <th><?= $val['no_telp'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Alamat Web</th>
                                        <th><?= $val['alamat_website'] ?? "" ?></th>
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
                    <a href="<?= base_url(); ?>pariwisata" class="btn btn-primary float-right btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ sample-page ] end -->