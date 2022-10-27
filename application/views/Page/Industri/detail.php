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
                                            <th>Jenis Industri</th>
                                            <th><?= $val['jenis_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Sub Industri</th>
                                            <th><?= $val['sub_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Nama Industri</th>
                                            <th><?= $val['nama_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Perizinan</th>
                                            <th><?= $val['perizinan_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Besar Modal Industri</th>
                                            <th><?= $val['besar_modal_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Nama Pemilik Industri</th>
                                            <th><?= $val['nama_pemilik_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>No Hp Pemilik</th>
                                            <th><?= $val['telp_pemilik_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th><?= $text['deskripsi_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Alamat Pemilik</th>
                                            <th><?= $val['alamat_industri'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Alamat Web</th>
                                            <th><?= $val['alamat_web'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Kordinat</th>
                                            <th><?= $val['koordinat_industri'] ?? "" ?></th>
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
                    <a href="<?= base_url(); ?>Industri" class="btn btn-primary float-right btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ sample-page ] end -->