<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <strong>Kecamatan</strong>
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
                                    <th scope="col">Nama Kecamatan</th>
                                    <th scope="col">Luas Wilayah</th>
                                    <th scope="col">Batas Wilayah</th>
                                    <th scope="col">Letak dan Luas</th>
                                    <th scope="col">Geologi</th>
                                    <th scope="col">Iklim</th>
                                    <th scope="col">Jumlah Penduduk</th>
                                    <th scope="col">Laju Pertumbuhan Penduduk</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th scope=" col">No</th>
                                    <th scope="col">Nama Kecamatan</th>
                                    <th scope="col">Luas Wilayah</th>
                                    <th scope="col">Batas Wilayah</th>
                                    <th scope="col">Letak dan Luas</th>
                                    <th scope="col">Geologi</th>
                                    <th scope="col">Iklim</th>
                                    <th scope="col">Jumlah Penduduk</th>
                                    <th scope="col">Laju Pertumbuhan Penduduk</th>
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
                                        <td><?= $val['nama_kecamatan'] ?? "" ?></td>
                                        <td><?= $val['luas_wilayah'] ?? "" ?></td>
                                        <td><?= $val['batas_wilayah'] ?? "" ?></td>
                                        <td><?= $val['letak'] ?? "" ?></td>
                                        <td><?= $val['geologi'] ?? "" ?></td>
                                        <td><?= $val['iklim'] ?? "" ?></td>
                                        <td><?= $val['jumlah_penduduk'] ?? "" ?></td>
                                        <td><?= $val['laju_pertumbuhan'] ?? "" ?></td>
                                        <td>
                                            <a href="<?= base_url('kecamatan/detail/') . $val['kode_kecamatan']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['kode_kecamatan']; ?>" class="btn btn-primary btn-sm trigger edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['kode_kecamatan']; ?>"><i class="fa fa-trash"></i></button>
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
                <form action="<?= base_url('kecamatan/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" class="form-control form-control-sm" name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kecamatan" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Luas Wilayah</label>
                                <input type="text" class="form-control form-control-sm" name="luas_wilayah" id="luas_wilayah" placeholder="Luas Wilayah" require>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Batas Wilayah</label>
                                <textarea class="form-control form-control-sm" id="batas_wilayah" name="batas_wilayah" rows="3" placeholder="Batas Wilayah"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">letak</label>
                                <textarea class="form-control form-control-sm" id="letak" name="letak" rows="3" placeholder="Letak"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">geologi</label>
                                <textarea class="form-control form-control-sm" id="geologi" name="geologi" rows="3" placeholder="geologi"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">iklim</label>
                                <textarea class="form-control form-control-sm" id="iklim" name="iklim" rows="3" placeholder="iklim"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Peduduk</label>
                                <input type="text" class="form-control form-control-sm" id="jumlah_penduduk" name="jumlah_penduduk" rows="3" placeholder="Jumlah Penduduk">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Laju Pertumbuhan</label>
                                <input type="text" class="form-control form-control-sm" id="laju_pertumbuhan" name="laju_pertumbuhan" rows="3" placeholder="Laju Pertumbuhan">
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