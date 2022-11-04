<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <strong>Master Data Pendidikan</strong>
                        <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m-crud"><i class="fa fa-plus"></i> Tambah Data</button> -->
                        <button class="btn btn-info trigger"><i class="fa fa-plus"></i> Tambah Data</button>
                    </div>


                </div>
                <div class="card-body">
                    <div class="w-100">
                        <table id="example" class="display nowrap cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope=" col">No</th>
                                    <th scope="col">Jenis Pendidikan</th>
                                    <th scope="col">Jenjang Pendidkan</th>
                                    <th scope="col">Nama Pendidikan</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Jumlah Tenaga Pendidik</th>
                                    <th scope="col">Nama Pimpinan</th>
                                    <th scope="col">Alamat Pendidikan</th>
                                    <th scope="col">Web Pendidikan</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th scope=" col">No</th>
                                    <th scope="col">Jenis Pendidikan</th>
                                    <th scope="col">Jenjang Pendidkan</th>
                                    <th scope="col">Nama Pendidikan</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Jumlah Tenaga Pendidik</th>
                                    <th scope="col">Nama Pimpinan</th>
                                    <th scope="col">Alamat Pendidikan</th>
                                    <th scope="col">Web Pendidikan</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                                foreach ($result as  $val) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $no++ ?></td>
                                        <td><?= $val['jenis_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['nama_jenjang'] ?? "" ?></td>
                                        <td><?= $val['nama_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['perizinan_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['jumlah_tenaga_pendidik'] ?? "" ?></td>
                                        <td><?= $val['nama_pimpinan'] ?? "" ?></td>
                                        <td><?= $val['alamat_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['website_pendidikan'] ?? "" ?></td>
                                        <td><?= $val['gambar'] ?? "" ?></td>
                                        <td>
                                            <a href="<?= base_url('pendidikan/detail/') . $val['id_pendidikan']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['id_pendidikan']; ?>" class="btn btn-primary btn-sm trigger edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_pendidikan']; ?>"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="paging-container">
                        <?= $this->pagination->create_links(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- [ sample-page ] end -->
<div class="costum-modal">
    <div class="costum-modal-content mb-auto">
        <div class="card mb-0 p-3">
            <div class="card-head ">
                <span class="costum-close-button">&times;</span>
                <strong>Input Data Pendidikan</strong>
            </div>
            <hr>
            <div class="">
                <form action="<?= base_url('pendidikan/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenjang Pendidikan</label>
                                <select class="form-control form-control-sm" id="jenjang_pendidikan_id" name="jenjang_pendidikan_id" require>
                                    <option value="">pilih</option>
                                    <?php foreach ($jenjang as $val) : ?>
                                        <option value="<?= $val['jenjang_pendidikan_id'] ?>"><?= $val['nama_jenjang'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Pendidikan</label>
                                <select class="form-control form-control-sm" id="jenis_pendidikan" name="jenis_pendidikan" require>
                                    <option>NEGERI</option>
                                    <option>SWASTA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pendidikan</label>
                                <input type="text" class="form-control form-control-sm" name="nama_pendidikan" id="nama_pendidikan" placeholder="Nama Pendidikan" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Perizinan</label>
                                <input type="text" class="form-control form-control-sm" name="perizinan_pendidikan" id="perizinan_pendidikan" placeholder="Perizinan" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Tenaga Pendidik</label>
                                <input type="text" class="form-control form-control-sm" name="jumlah_tenaga_pendidik" id="jumlah_tenaga_pendidik" placeholder="Jumlah Tenaga" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pimpinan</label>
                                <input type="text" class="form-control form-control-sm" name="nama_pimpinan" id="nama_pimpinan" placeholder="Nama Pimpinan" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Website</label>
                                <input type="text" class="form-control form-control-sm" name="website_pendidikan" id="website_pendidikan" placeholder="Alamat Web">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">latitude</label>
                                        <input type="text" class="form-control form-control-sm" name="latitude" id="latitude" placeholder="Kordinat" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">langitude</label>
                                        <input type="text" class="form-control form-control-sm" name="longitude" id="longitude" placeholder="Kordinat" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea class="form-control form-control-sm" id="alamat_pendidikan" name="alamat_pendidikan" rows="3" placeholder="Alamat Pendidikan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control form-control-sm" name="gambar" id="gambar" placeholder="Gambar">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary costum-model-close btn-sm">Batal</button>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>