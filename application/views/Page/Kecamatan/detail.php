<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="grids-detail">
                    <div class="child-one-grids-detail">
                        <div class="card-body">
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Nama Kecamatan</div>
                                <div class="item-detail"><?= $result['nama_kecamatan'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Luas Wilayah</div>
                                <div class="item-detail"><?= $result['luas_wilayah'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Luas Wilayah</div>
                                <div class="item-detail"><?= $result['luas_wilayah'] ?? "" ?></div>
                            </div>
                            <div class="item-container-detail">
                                <div class="item-detail l-title">Batas Wilayah</div>
                                <?= $result['batas_wilayah'] ?? "" ?>
                            </div>
                            <div class="item-container-detail">
                                <div class="item-detail l-title">Letak dan Luas</div>
                                <?= $result['letak'] ?? "" ?>
                            </div>
                            <div class="item-container-detail">
                                <div class="item-detail l-title">Geologi</div>
                                <?= $result['geologi'] ?? "" ?>
                            </div>
                            <div class="item-container-detail">
                                <div class="item-detail l-title">Iklim</div>
                                <?= $result['iklim'] ?? "" ?>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Jumlah Penduduk</div>
                                <div class="item-detail"><?= $result['jumlah_penduduk'] ?? "" ?></div>
                            </div>
                            <div class="flex-space-between item-container-detail">
                                <div class="item-detail l-title">Laju Pertumbuhan Penduduk</div>
                                <div class="item-detail"><?= $result['laju_pertumbuhan'] ?? "" ?></div>
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