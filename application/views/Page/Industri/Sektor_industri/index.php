<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Data Sektor</strong>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <h5>Tabel Sektor</h5>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m-crud"><i class="fa fa-plus"></i> Tambah Data</button>
                    </div>


                </div>
                <div class="card-body">
                    <div class="w-100">
                        <table id="example" class="display nowrap cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Sektor Utama</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                                foreach ($result as  $val) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $val['nama_sektor_utama_industri'] ?? "" ?></td>
                                        <td>
                                            <!-- <button type="button" data-id="<?= $val['id_sektor_industri']; ?>" class="btn btn-success btn-sm detail" >
                                                <i class="fa-solid fa-list-ul"></i>
                                            </button> -->
                                            <a href="<?= base_url('sektor_industri/detail/') . $val['id_sektor_industri']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['id_sektor_industri']; ?>" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#m-crud">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_sektor_industri']; ?>"><i class="fa fa-trash"></i></button>
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
<div class="section-body">
</div>
</section>
<div class="modal fade" id="m-crud" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form action="<?= base_url('sektor_industri/created'); ?>" method="post" id="formmodal">
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
                                <label for="">Nama Sektor Utama</label>
                                <input type="text" class="form-control form-control-sm" name="nama_sektor_utama_industri" id="nama_sektor_utama_industri" placeholder="Nama Sektor Utama">
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