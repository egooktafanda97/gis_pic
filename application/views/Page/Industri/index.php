<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Industri</strong>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <h5>Tabel Industri</h5>
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
                                    <th scope="col">Jenis Industri</th>
                                    <th scope="col">Sub Industri</th>
                                    <th scope="col">Nama Industri</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Besar Modal</th>
                                    <th scope="col">Nama Pemilik</th>
                                    <th scope="col">No Hp Pemilik</th>
                                    <th scope="col">Deskripsi Industri</th>
                                    <th scope="col">Alamat Industri</th>
                                    <th scope="col">Web Industri</th>
                                    <th scope="col">Kordinat</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th scope=" col">No</th>
                                    <th scope="col">Jenis Industri</th>
                                    <th scope="col">Sub Industri</th>
                                    <th scope="col">Nama Industri</th>
                                    <th scope="col">Perizinan</th>
                                    <th scope="col">Besar Modal</th>
                                    <th scope="col">Nama Pemilik</th>
                                    <th scope="col">No Hp Pemilik</th>
                                    <th scope="col">Deskripsi Industri</th>
                                    <th scope="col">Alamat Industri</th>
                                    <th scope="col">Web Industri</th>
                                    <th scope="col">Kordinat</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Icon</th>
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
                                        <td><?= $val['jenis_industri'] ?? "" ?></td>
                                        <td><?= $val['sub_industri'] ?? "" ?></td>
                                        <td><?= $val['nama_industri'] ?? "" ?></td>
                                        <td><?= $val['perizinan_industri'] ?? "" ?></td>
                                        <td><?= $val['besar_modal_industri'] ?? "" ?></td>
                                        <td><?= $val['nama_pemilik_industri'] ?? "" ?></td>
                                        <td><?= $val['telp_pemilik_industri'] ?? "" ?></td>
                                        <td><?= $val['deskripsi_industri'] ?? "" ?></td>
                                        <td><?= $val['alamat_industri'] ?? "" ?></td>
                                        <td><?= $val['alamat_web'] ?? "" ?></td>
                                        <td><?= $val['koordinat_industri'] ?? "" ?></td>
                                        <td><?= $val['gambar'] ?? "" ?></td>
                                        <td><?= $val['icon'] ?? "" ?></td>
                                        <td>
                                            <a href="<?= base_url('industri/detail/') . $val['id_industri']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['id_industri']; ?>" class="btn btn-primary btn-sm trigger edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_industri']; ?>"><i class="fa fa-trash"></i></button>
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
    <div class="costum-modal-content ovY-auto">
        <div class="card mb-0 p-3">
            <div class="card-head ">
                <span class="costum-close-button">&times;</span>
                <strong>Input Data Industri</strong>
            </div>
            <hr>
            <div class="">
                <form action="<?= base_url('Industri/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pic Industri</label>
                                <select class="form-control form-control-sm" id="pic_industri_id" name="pic_industri_id" require>
                                    <option value="">pilih</option>
                                    <?php foreach ($pic as $val) : ?>
                                        <option value="<?= $val['id_pic_industri'] ?>"><?= $val['pic_industry_type_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sektor Industri</label>
                                <select class="form-control form-control-sm" id="sektor_industri_id" name="sektor_industri_id" require>
                                    <option value="">pilih</option>
                                    <?php foreach ($sektor as $val) : ?>
                                        <option value="<?= $val['id_sektor_industri'] ?>"><?= $val['nama_sektor_utama_industri'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sub Sektor Industri</label>
                                <select class="form-control form-control-sm" id="sub_sektor_industri_id" name="sub_sektor_industri_id" require>
                                    <option value="">pilih</option>
                                    <?php foreach ($sub as $val) : ?>
                                        <option value="<?= $val['id_subsektor_industri'] ?>"><?= $val['nama_subsektor_industri'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Industri</label>
                                <input type="text" class="form-control form-control-sm" name="nama_industri" id="nama_industri" placeholder="Nama Industri" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Perizinan</label>
                                <input type="text" class="form-control form-control-sm" name="perizinan_industri" id="perizinan_industri" placeholder="Perizinan" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Besar Modal</label>
                                <input type="text" class="form-control form-control-sm" name="besar_modal_industri" id="besar_modal_industri" placeholder="Besar Modal" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pemilik</label>
                                <input type="text" class="form-control form-control-sm" name="nama_pemilik_industri" id="nama_pemilik_industri" placeholder="Nama Pemilik" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Hp Pemilik</label>
                                <input type="text" class="form-control form-control-sm" name="telp_pemilik_industri" id="telp_pemilik_industri" placeholder="No Hp Pemilik">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat Website</label>
                                <input type="text" class="form-control form-control-sm" name="alamat_web" id="alamat_web" placeholder="Alamat Web">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea class="form-control form-control-sm" id="deskripsi_industri" name="deskripsi_industri" rows="3" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea class="form-control form-control-sm" id="alamat_industri" name="alamat_industri" rows="3" placeholder="Alamat Industri"></textarea>
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
                                <label for="">Icon Map (.png)</label>
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