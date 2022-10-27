<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Detail Data Pendidikan</strong>
    </div>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-6">
            <div class="card">

                <div class="card-header bg-primary text-white">
                    <h5>Detail Data</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <table class="table table-bordered">
                                <tbody>
                                        <tr>
                                            <th>Jenis Pendidikan</th>
                                            <th><?= $val['jenis_pendidikan'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Jenjang Pendidikan</th>
                                            <th><?= $val['jenjang_pendidikan'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Nama Pendidikan</th>
                                            <th><?= $val['nama_pendidikan'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Perizinan</th>
                                            <th><?= $val['perizinan_pendidikan'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Pendidik</th>
                                            <th><?= $val['jumlah_tenaga_pendidik'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Peserta Didik</th>
                                            <th><?= $val['jumlah_peserta_pendidik'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <th><?= $val['alamat_pendidikan'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Nama Pimpinan</th>
                                            <th><?= $val['nama_pimpinan'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>No Hp/Telepon</th>
                                            <th><?= $val['No_hp'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Alamat Website</th>
                                            <th><?= $val['website_pendidikan'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Koordinat</th>
                                            <th><?= $val['koordinat_pendidikan'] ?? "" ?></th>
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
                <div class="card-footer mt-3 bg-secondary ">
                    <a href="<?= base_url(); ?>Pendidikan" class="btn btn-primary float-right btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ sample-page ] end -->