<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <strong>Master Penginapan</strong>
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
                                    <th scope="col">Jenis Penginapan</th>
                                    <th scope="col">Kelas Penginapan</th>
                                    <th scope="col">Nama Penginapan</th>
                                    <th scope="col">Jumlah Kamar</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Nama Pemilik</th>
                                    <th scope="col">Alamat Penginapan</th>
                                    <th scope="col">No Telpon</th>
                                    <th scope="col">Alamat Web</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th scope=" col">No</th>
                                    <th scope="col">Jenis Penginapan</th>
                                    <th scope="col">Kelas Penginapan</th>
                                    <th scope="col">Nama Penginapan</th>
                                    <th scope="col">Jumlah Kamar</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Nama Pemilik</th>
                                    <th scope="col">Alamat Penginapan</th>
                                    <th scope="col">No Telpon</th>
                                    <th scope="col">Alamat Web</th>
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
                                        <td><?= $val['nama_jenis_penginapan'] ?? "" ?></td>
                                        <td><?= $val['nama_kelas_penginapan'] ?? "" ?></td>
                                        <td><?= $val['nama_penginapan'] ?? "" ?></td>
                                        <td><?= $val['jumlah_kamar'] ?? "" ?></td>
                                        <td><?= $val['perizinan'] ?? "" ?></td>
                                        <td><?= $val['nama_pemilik'] ?? "" ?></td>
                                        <td><?= $val['alamat_penginapan'] ?? "" ?></td>
                                        <td><?= $val['no_telp'] ?? "" ?></td>
                                        <td><?= $val['alamat_web'] ?? "" ?></td>
                                        <td><?= $val['gambar'] ?? "" ?></td>
                                        <td>
                                            <a href="<?= base_url('penginapan/detail/') . $val['id_penginapan']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['id_penginapan']; ?>" class="btn btn-primary btn-sm trigger edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_penginapan']; ?>"><i class="fa fa-trash"></i></button>
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
                <strong>Input Data Penginapan</strong>
            </div>
            <hr>
            <div class="">
                <form action="<?= base_url('penginapan/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Penginapan</label>
                                <select class="form-control form-control-sm" id="jenis_penginapan_id" name="jenis_penginapan_id" require>
                                    <option value="">pilih</option>
                                    <?php foreach ($jenis as $val) : ?>
                                        <option value="<?= $val['id_jenis_penginapan'] ?>"><?= $val['nama_jenis_penginapan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kelas Penginapan</label>
                                <select class="form-control form-control-sm" id="kelas_inap_id" name="kelas_inap_id" require>
                                    <option value="">pilih</option>
                                    <?php foreach ($kelas as $val) : ?>
                                        <option value="<?= $val['id_kelas_penginapan'] ?>"><?= $val['nama_kelas_penginapan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Penginapan</label>
                                <input type="text" class="form-control form-control-sm" name="nama_penginapan" id="nama_penginapan" placeholder="Nama Penginapan" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Kamar</label>
                                <input type="text" class="form-control form-control-sm" name="jumlah_kamar" id="jumlah_kamar" placeholder="Jumlah Kamar" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Perizinan</label>
                                <input type="text" class="form-control form-control-sm" name="perizinan" id="perizinan" placeholder="Perizinan" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pemilik</label>
                                <input type="text" class="form-control form-control-sm" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Telpon</label>
                                <input type="text" class="form-control form-control-sm" name="no_telp" id="no_telp" placeholder="No Telpon">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Web</label>
                                <input type="text" class="form-control form-control-sm" name="alamat_web" id="alamat_web" placeholder="Alamat Web">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Penginapan</label>
                                <textarea class="form-control form-control-sm" id="alamat_penginapan" name="alamat_penginapan" rows="3" placeholder="Alamat Penginapan"></textarea>
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
                                <label for="">Gambar</label>
                                <input type="file" class="form-control form-control-sm" name="gambar" id="gambar" placeholder="Gambar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Icon Map</label>
                                <select class="form-control form-control-sm" id="marker_id" name="marker_id" require>
                                    <option value="">pilih</option>
                                    <?php foreach ($mark as $val) : ?>
                                        <option value="<?= $val['id_marker'] ?>"><?= $val['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
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