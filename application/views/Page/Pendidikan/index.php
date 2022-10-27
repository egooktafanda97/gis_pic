<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Data Pendidikan</strong>
    </div>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <h5>Tabel Pendidikan</h5>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m-crud"><i class="fa fa-plus"></i> Tambah Data</button>
                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Pendidikan</th>
                                    <th scope="col">Jenjang Pendidikan</th>
                                    <th scope="col">Nama Sekolah/Universitas</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Jumlah Pendidik</th>
                                    <th scope="col">Jumlah Peserta Didik</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nama Pimpinan</th>
                                    <th scope="col">Nomor Telp/Hp</th>
                                    <th scope="col">Alamat Website</th>
                                    <th scope="col">Kordinat</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                                foreach ($result as  $val) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $val['jenis_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['jenjang_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['nama_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['perizinan_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['jumlah_tenaga_pendidik'] ?? "" ?></td>
                                        <td><?= $val['jumlah_peserta_pendidik'] ?? "" ?></td>
                                        <td><?= $val['alamat_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['nama_pimpinan'] ?? "" ?></td>
                                        <td><?= $val['No_hp'] ?? "" ?></td>
                                        <td><?= $val['website_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['koordinat_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['gambar'] ?? "" ?></td>
                                        <td>
                                            <!-- <button type="button" data-id="<?= $val['id_pendidikan']; ?>" class="btn btn-success btn-sm detail" >
                                                <i class="fa-solid fa-list-ul"></i>
                                            </button> -->
                                            <a href="<?= base_url('pendidikan/detail/') . $val['id_pendidikan']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['id_pendidikan']; ?>" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#m-crud">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_pendidikan']; ?>"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- [ sample-page ] end -->
<div class="section-body">
</div>
</section>
<div class="modal fade" id="m-crud" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form action="<?= base_url('pendidikan/created'); ?>" method="post" id="formmodal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Jenis Pendidikan</label>
                                <select class="form-control form-control-sm" id="jenis_pendidikan" name="jenis_pendidikan">
                                    <option>Negeri</option>
                                    <option>Swasta</option>
                                </select>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Jenjang Pendidikan</label>
                                <select class="form-control form-control-sm" id="jenjang_pendidikan" name="jenjang_pendidikan">
                                    <option>SD</option>
                                    <option>SMP / MTS</option>
                                    <option>SMA / MA</option>
                                    <option>Universitas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Nama Pendidikan</label>
                                <input type="text" class="form-control form-control-sm" name="nama_pendidikan" id="nama_pendidikan" placeholder="Nama Pendidikan">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Perizinan</label>
                                <input type="text" class="form-control form-control-sm" name="perizinan_pendidikan" id="perizinan_pendidikan" placeholder="Perizinan">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Jumlah Pendidik</label>
                                <input type="text" class="form-control form-control-sm" name="jumlah_tenaga_pendidik" id="jumlah_tenaga_pendidik" placeholder="Jumlah Pendidik">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Jumlah Peserta Didik</label>
                                <input type="text" class="form-control form-control-sm" name="jumlah_peserta_pendidik" id="jumlah_peserta_pendidik" placeholder="Jumlah Peserta Didik">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control form-control-sm" name="alamat_pendidikan" id="alamat_pendidikan" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Nama Pimpinan</label>
                                <input type="text" class="form-control form-control-sm" name="nama_pimpinan" id="nama_pimpinan" placeholder="Nama Kepala Sekolah / Universitas">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">No Hp/Telepon</label>
                                <input type="text" class="form-control form-control-sm" name="No_hp" id="No_hp" placeholder="Nomor Telp / Hp">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Alamat Website</label>
                                <input type="text" class="form-control form-control-sm" name="website_pendidikan" id="website_pendidikan" placeholder="Alamat Website">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Koordinat</label>
                                <input type="text" class="form-control form-control-sm" name="koordinat_pendidikan" id="koordinat_pendidikan" placeholder="Koordinat">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="text" class="form-control form-control-sm" name="gambar" id="gambar" placeholder="Gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>