<div class="row">
    <div class="col-md-3">

        <div class="wrapper">
            <!-- Nav 2 - Vertical left -->
            <nav class="nav nav2">
                <a href="<?= base_url('Marker'); ?>" class="nav-item" data-color="#663399">Pengaturan Marker</a>
                <a href="<?= base_url('Kecamatan'); ?>" class="nav-item" data-color="#446A46">Data Kecamatan</a>
                <a href="<?= base_url('Info_grafis'); ?>" class="nav-item act" data-color="#446A46">Informasi</a>
                <a href="<?= base_url('UserRole'); ?>" class="nav-item" data-color="#446A46">User</a>
            </nav>
            <!-- Nav 2 - Vertical left -->
        </div>
    </div>
    <div class="col-md-9">
        <section class="section">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="flex-space-between w-100">
                                <strong>Pengaturan</strong>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m-crud"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="w-100">
                                <table id="example" class="display nowrap cell-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kecamatan</th>
                                            <th scope="col">Faktor</th>
                                            <th scope="col">Sub Faktor</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kecamatan</th>
                                            <th scope="col">Faktor</th>
                                            <th scope="col">Sub Faktor</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($result as $value) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value['nama_kecamatan'] ?? "" ?></td>
                                                <td><?= $value['faktor'] ?? "" ?></td>
                                                <td><?= $value['sub_faktor'] ?? "" ?></td>
                                                <td><?= $value['nama'] ?? "" ?></td>
                                                <td><?= $value['keterangan'] ?? "" ?></td>
                                                <td>
                                                    <button type="button" data-id="<?= $value['id']; ?>" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#m-crud">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm delete" data-id="<?= $value['id']; ?>"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <!-- <?= $this->pagination->create_links(); ?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<!-- [ sample-page ] end -->
<div class="section-body">
</div>
</section>
<div class="modal fade" id="m-crud" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form action="<?= base_url('Info_grafis/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
            <input type="hidden" name="config" value="map">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Kecamatan</label>
                                <select class="form-control form-control-sm" name="kode_kecamatan">
                                    <option value="">pilih</option>
                                    <?php foreach ($kecamatan as $val) : ?>
                                        <option value="<?= $val['kode_kecamatan'] ?>"><?= $val['nama_kecamatan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <select class="form-control form-control-sm" name="tahun">
                                    <option value="">pilih tahun</option>
                                    <?php

                                    $nowYear = date("Y");
                                    $start = 2012;
                                    for ($i = $nowYear; $i > $start; $i--) : ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control form-control-sm" name="tanggal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Faktor</label>
                                <select class="form-control form-control-sm" name="faktor">
                                    <option value="">pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sub Faktor</label>
                                <select class="form-control form-control-sm" name="sub_faktor">
                                    <option value="">pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Keteranagan</label>
                                <input type="text" class="form-control form-control-sm" name="keterangan" id="keterangan" placeholder=" Keterangan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>