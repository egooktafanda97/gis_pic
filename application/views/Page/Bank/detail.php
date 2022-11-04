<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Detail Bank</strong>
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
                                        <th>Jenis Bank</th>
                                        <th><?= $val['nama_jenis_bank'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nama Bank</th>
                                        <th><?= $val['nama_bank'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Alamat Bank</th>
                                        <th><?= $val['alamat_bank'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Perizinan</th>
                                        <th><?= $val['perizinan'] ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Nasabah</th>
                                        <th><?= $val['jumlah_nasabah'] ?? "" ?></th>
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
                    <a href="<?= base_url(); ?>bank" class="btn btn-primary float-right btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ sample-page ] end -->