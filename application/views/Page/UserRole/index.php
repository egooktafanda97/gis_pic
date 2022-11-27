<div class="row">
    <div class="col-md-3">

        <div class="wrapper">
            <!-- navs 2 - Vertical left -->
            <nav class="navs navs2">
                <a href="<?= base_url('Marker'); ?>" class="navs-item" data-color="#663399">Pengaturan Marker</a>
                <a href="<?= base_url('Kecamatan'); ?>" class="navs-item" data-color="#446A46">Data Kecamatan</a>
                <a href="<?= base_url('Info_grafis'); ?>" class="navs-item" data-color="#446A46">Informasi</a>
                <a href="<?= base_url('UserRole'); ?>" class="navs-item act" data-color="#446A46">User</a>
            </nav>
            <!-- navs 2 - Vertical left -->
        </div>
    </div>
    <div class="col-md-9">
        <section class="section">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="flex-space-between w-100">
                                <strong>Data User Akun</strong>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m-crud"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="w-100">
                                <table id="example" class="display nowrap cell-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">level</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">level</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($users as $val) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $val['nama'] ?></td>
                                                <td><?= $val['username'] ?></td>
                                                <td><?= $val['role'] ?></td>
                                                <td>
                                                    <button type="button" data-id="<?= $val['id']; ?>" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#m-crud">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm delete" data-id="<?= $val['id']; ?>"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="m-crud" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form action="<?= base_url('UserRole/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="Nama" type="text" class="form-control" name="nama" tabindex="1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username" tabindex="1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Password</label>
                                <input id="password" type="password" class="form-control" name="password" tabindex="1" required>
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