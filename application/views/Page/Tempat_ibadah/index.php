<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <strong>Tempat Ibadah</strong>
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
                                    <th scope="col">Jenis Tempat Ibadah</th>
                                    <th scope="col">Nama Tempat Ibadah</th>
                                    <th scope="col">Luas Tempat Ibadah</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nama Penanggung Jawab</th>
                                    <th scope="col">No Telpon</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longtitude</th>
                                    <th scope="col">Alamat Website</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th scope=" col">No</th>
                                    <th scope="col">Jenis Tempat Ibadah</th>
                                    <th scope="col">Nama Tempat Ibadah</th>
                                    <th scope="col">Luas Tempat Ibadah</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nama Penanggung Jawab</th>
                                    <th scope="col">No Telpon</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longtitude</th>
                                    <th scope="col">Alamat Website</th>
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
                                        <td><?= $val['jenis_tempat_ibadah'] ?? "" ?></td>
                                        <td><?= $val['nama_tempat_ibadah'] ?? "" ?></td>
                                        <td><?= $val['luas_tempat_ibadah'] ?? "" ?></td>
                                        <td><?= $val['perizinan'] ?? "" ?></td>
                                        <td><?= $val['alamat'] ?? "" ?></td>
                                        <td><?= $val['nama_penanggung_jawab'] ?? "" ?></td>
                                        <td><?= $val['no_telp'] ?? "" ?></td>
                                        <td><?= $val['latitude'] ?? "" ?></td>
                                        <td><?= $val['longitude'] ?? "" ?></td>
                                        <td><?= $val['alamat_website'] ?? "" ?></td>
                                        <td><?= $val['gambar'] ?? "" ?></td>
                                        <td>
                                            <a href="<?= base_url('tempat_ibadah/detail/') . $val['id_tempat_ibadah']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['id_tempat_ibadah']; ?>" class="btn btn-primary btn-sm trigger edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_tempat_ibadah']; ?>"><i class="fa fa-trash"></i></button>
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
                <strong>Input Data</strong>
            </div>
            <hr>
            <div class="">
                <form action="<?= base_url('tempat_ibadah/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Tempat Ibadah</label>
                                <select class="form-control" id="jenis_tempat_ibadah" name="jenis_tempat_ibadah">
                                    <option value="Masjid">Masjid</option>
                                    <option value="Gereja">Gereja</option>
                                    <option value="Pura">Pura</option>
                                    <option value="Wihara">Wihara</option>
                                    <option value="Kelenteng">Kelenteng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Tempat Ibadah</label>
                                <input type="text" class="form-control form-control-sm" name="nama_tempat_ibadah" id="nama_tempat_ibadah" placeholder="Nama Tempat Ibadah" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Luas Tempat Ibadah</label>
                                <input type="text" class="form-control form-control-sm" name="luas_tempat_ibadah" id="luas_tempat_ibadah" placeholder="Luas Tempat Ibadah" require>
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
                                <label for="">Nama Penanggung Jawab</label>
                                <input type="text" class="form-control form-control-sm" name="nama_penanggung_jawab" id="nama_penanggung_jawab" placeholder="Nama Penanggung Jawab" require>
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
                                <label for="">Alamat</label>
                                <textarea class="form-control form-control-sm" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Web</label>
                                <input type="text" class="form-control form-control-sm" id="alamat_website" name="alamat_website" rows="3" placeholder="Alamat Web">
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