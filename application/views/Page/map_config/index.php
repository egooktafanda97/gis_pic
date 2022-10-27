<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Map Config</strong>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="flex-space-between w-100">
                        <h5>Tabel Map Configr</h5>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m-crud"><i class="fa fa-plus"></i> Tambah Data</button>
                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Config Key</th>
                                    <th scope="col">Config Value</th>
                                    <th scope="col">Table Config</th>
                                    <th scope="col">Forenkey Id</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                                foreach ($result as  $val) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $val['config_key'] ?? "" ?></td>
                                        <td><?= $val['config_value'] ?? "" ?></td>
                                        <td><?= $val['table_config'] ?? "" ?></td>
                                        <td><?= $val['forenkey_id'] ?? "" ?></td>
                                        <td>
                                            <!-- <button type="button" data-id="<?= $val['id_subsektor_industri']; ?>" class="btn btn-success btn-sm detail" >
                                                <i class="fa-solid fa-list-ul"></i>
                                            </button> -->
                                            <a href="<?= base_url('map_config/detail/') . $val['id_config']; ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i></a>
                                            <button type="button" data-id="<?= $val['id_config']; ?>" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#m-crud">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_config']; ?>"><i class="fa fa-trash"></i></button>
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
        <form action="<?= base_url('map_config/created'); ?>" method="post" id="formmodal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Config Key</label>
                                <input type="text" class="form-control form-control-sm" name="config_key" id="config_key" placeholder="Config Key">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Config Value</label>
                                <input type="text" class="form-control form-control-sm" name="config_value" id="config_value" placeholder="Config Value">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Table Config</label>
                                <input type="text" class="form-control form-control-sm" name="table_config" id="table_config" placeholder="Table Config">
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                <label for="">Forenkey Id</label>
                                <input type="text" class="form-control form-control-sm" name="forenkey_id" id="forenkey_id" placeholder="Forenkey Id">
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