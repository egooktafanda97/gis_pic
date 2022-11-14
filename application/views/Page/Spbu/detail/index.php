<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="grids-detail">
                    <div class="child-one-grids-detail">
                        <div style="width: 100%;">
                            <img class="img-grids-detail" src="<?= base_url("assets/img/foto/" . $val['gambar']) ?>" alt="">
                        </div>
                        <div class="card-body">
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Jenis Spbu</div>
                                <div class="item-detail"><?= $val['nama_jenis_spbu'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Nomor Spbu</div>
                                <div class="item-detail"><?= $val['nomor_spbu'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Alamat Spbu</div>
                                <div class="item-detail"><?= $val['alamat'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Perizinan</div>
                                <div class="item-detail"><?= $val['perizinan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Jumlah Jenis Bbm</div>
                                <div class="item-detail"><?= $val['jumlah_jenis_bbm'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Jumlah Kendaraan</div>
                                <div class="item-detail"><?= $val['jumlah_kendaraan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Alamat Web</div>
                                <div class="item-detail"><?= $val['alamat_website'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail">Kordinat</div>
                                <div class="item-detail"><?= $val['koordinat_bank'] ?? "" ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="child-two-grids-detail">
                        <div id="maps"></div>
                        <div id="menu">
                            <input id="satellite-v9" type="radio" name="rtoggle" value="satellite" checked="checked">
                            <label for="satellite-v9">satellite</label>
                            <input id="light-v10" type="radio" name="rtoggle" value="light">
                            <label for="light-v10">light</label>
                            <input id="dark-v10" type="radio" name="rtoggle" value="dark">
                            <label for="dark-v10">dark</label>
                            <input id="streets-v11" type="radio" name="rtoggle" value="streets">
                            <label for="streets-v11">streets</label>
                            <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors">
                            <label for="outdoors-v11">outdoors</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- [ sample-page ] end -->