<section class="section">
    <div class="mt-1 text-white mb-4">
        <strong>Detail Map Config</strong>
    </div>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-6">
            <div class="card">

                <div class="card-header bg-primary text-white">
                    <h5>Detail Map Config</h5>
                </div>
                <div class="card-body justify-content">
                    <div class="row">
                        <div class="col-12">

                            <table class="table table-bordered">
                                <tbody>
                                    <?php foreach ($result as $val) : ?>
                                        <tr>
                                            <th>Config Key</th>
                                            <th><?= $val['config_key'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Config Value</th>
                                            <th><?= $val['config_value'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Table Config</th>
                                            <th><?= $val['table_config'] ?? "" ?></th>
                                        </tr>
                                        <tr>
                                            <th>Forenkey Id</th>
                                            <th><?= $val['forenkey_id'] ?? "" ?></th>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-3 bg-secondary">
                    <a href="<?= base_url(); ?>map_config" class="btn btn-primary float-right btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ sample-page ] end -->