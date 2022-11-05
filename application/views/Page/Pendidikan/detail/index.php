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
                                <div class="item-detail l-title">Jenis Pendidikan</div>
                                <div class="item-detail"><?= $val['jenis_pendidikan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Nama Jenjang</div>
                                <div class="item-detail"><?= $val['nama_jenjang'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Nama Pendidikan</div>
                                <div class="item-detail"><?= $val['nama_pendidikan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Perizinan</div>
                                <div class="item-detail"><?= $val['perizinan_pendidikan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Jumlah Tenaga Pendidik</div>
                                <div class="item-detail"><?= $val['jumlah_tenaga_pendidik'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Alamat Pendidikan</div>
                                <div class="item-detail"><?= $val['alamat_pendidikan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Nama Pimpinan</div>
                                <div class="item-detail"><?= $val['nama_pimpinan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Alamat Web</div>
                                <div class="item-detail"><?= $val['website_pendidikan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail">Kordinat</div>
                                <div class="item-detail"><?= $val['koordinat_pendidikan'] ?? "" ?></div>
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