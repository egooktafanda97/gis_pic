<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <strong>Master Spbu</strong>
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
                                    <th scope="col">Jenis Spbu</th>
                                    <th scope="col">Nomor Spbu</th>
                                    <th scope="col">Alamat Spbu</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Jumlah Jenis Bbm</th>
                                    <th scope="col">Jumlah Kendaraan</th>
                                    <th scope="col">Alamat Web</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th scope=" col">No</th>
                                    <th scope="col">Jenis Spbu</th>
                                    <th scope="col">Nomor Spbu</th>
                                    <th scope="col">Alamat Spbu</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Jumlah Jenis Bbm</th>
                                    <th scope="col">Jumlah Kendaraan</th>
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
                                        <td><?= $val['nama_jenis_spbu'] ?? "" ?></td>
                                        <td><?= $val['nomor_spbu'] ?? "" ?></td>
                                        <td><?= $val['alamat'] ?? "" ?></td>
                                        <td><?= $val['perizinan'] ?? "" ?></td>
                                        <td><?= $val['jumlah_jenis_bbm'] ?? "" ?></td>
                                        <td><?= $val['jumlah_kendaraan'] ?? "" ?></td>
                                        <td><?= $val['alamat_website'] ?? "" ?></td>
                                        <td><?= $val['gambar'] ?? "" ?></td>
                                        <td>
                                            <a href="<?= base_url('spbu/detail/') . $val['id_spbu']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['id_spbu']; ?>" class="btn btn-primary btn-sm trigger edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_spbu']; ?>"><i class="fa fa-trash"></i></button>
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
                <strong>Input Data Spbu</strong>
            </div>
            <hr>
            <div class="">
                <form action="<?= base_url('spbu/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Spbu</label>
                                <select class="form-control form-control-sm" id="jenis_spbu_id" name="jenis_spbu_id" require>
                                    <option value="">pilih</option>
                                    <?php foreach ($jenis as $val) : ?>
                                        <option value="<?= $val['id_jenis_spbu'] ?>"><?= $val['nama_jenis_spbu'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Spbu</label>
                                <input type="text" class="form-control form-control-sm" name="nomor_spbu" id="nomor_spbu" rows="3" placeholder="Nomor Spbu" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Spbu</label>
                                <textarea class="form-control form-control-sm" name="alamat" id="alamat" rows="3" placeholder="Alamat" require></textarea>
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
                                <label for="">Jumlah Jenis Bbm</label>
                                <input type="text" class="form-control form-control-sm" name="jumlah_jenis_bbm" id="jumlah_jenis_bbm" placeholder="Jumlah Jenis Bbm" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Kendaraan</label>
                                <input type="text" class="form-control form-control-sm" name="jumlah_kendaraan" id="jumlah_kendaraan" placeholder="Jumlah Kendaraan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Web</label>
                                <input type="text" class="form-control form-control-sm" name="alamat_website" id="alamat_website" placeholder="Alamat Web">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Latitude</label>
                                        <input type="text" class="form-control form-control-sm" id="latitude" name="latitude" placeholder="Kordinat" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Longitude</label>
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