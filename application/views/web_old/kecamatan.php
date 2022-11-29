<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">

    <!-- <link rel="stylesheet" href="fonts/icomoon/style.css"> -->

    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/aos.css">
    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/rangeslider.css">

    <link rel="stylesheet" href="<?= base_url("assets/template_2/") ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url("assets/img/kecamatan/test.jpg") ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">

                    <div class="col-md-10">

                        <div class="row justify-content-center mb-4">
                            <div class="col-md-10 text-center">
                                <h1 data-aos="fade-up" class="mb-5" style="animation-name: fadeInLeft;font-family: 'Rajdhani', sans-serif !important;">Kecamatan Demo </h1>
                                <button href="#" class="btn btn-primary btn-pill btn-sm"><i class="fa fa-angle-down"></i></button>
                                <!-- <button href="#" class="btn btn-primary btn-pill btn-sm" style="width: 150px;">PIC</button> -->
                                <!-- <p data-aos="fade-up" data-aos-delay="100"><a href="#" class="btn btn-primary btn-pill">Get Started</a></p> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mb-5" data-aos="fade">
                        <div class="p-5 bg-white" style="margin-top: -150px;">
                            <div>
                                <h5><strong>Batas Wilayah</strong></h5>
                                <p><?= $data_kecamatan['batas_wilayah'] ?? "-" ?></p>
                            </div>
                            <hr>
                            <div>
                                <h5><strong>Letak</strong></h5>
                                <p><?= $data_kecamatan['letak'] ?? "-" ?></p>
                            </div>
                            <hr>
                            <div>
                                <h5><strong>Geologi</strong></h5>
                                <p><?= $data_kecamatan['geologi'] ?? "-" ?></p>
                            </div>
                            <hr>
                            <div>
                                <h5><strong>Iklim</strong></h5>
                                <p><?= $data_kecamatan['iklim' ?? "-"] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" data-aos="fade" data-aos-delay="100">
                        <div class="p-4 mb-3 bg-white">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tentang</a>
                                    <!-- <a class="nav-item nav-link" id="nav-kelurahan-tab" data-toggle="tab" href="#nav-kelurahan" role="tab" aria-controls="nav-kelurahan" aria-selected="true">Kelurahan</a>
                                    <a class="nav-item nav-link" id="nav-pic-tab" data-toggle="tab" href="#nav-pic" role="tab" aria-controls="nav-pic" aria-selected="true">Pic</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Peta</a> -->
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="mt-3">
                                        <!-- <div style="font-size:.8em; display: flex; justify-content: space-between; align-items: center; padding: 3px; border-bottom: 1px solid gray; margin-bottom: 3px;">
                                            <strong>NAMA IBUKOTA KECAMATAN</strong>
                                            <label for="">90,9</label>
                                        </div> -->
                                        <div style="font-size:.8em; display: flex; justify-content: space-between; align-items: center; padding: 3px; border-bottom: 1px solid gray; margin-bottom: 3px;">
                                            <strong>LUAS WILAYAH</strong>
                                            <label for=""><?= $data_kecamatan['luas_wilayah'] ?></label>
                                        </div>
                                        <div style="font-size:.8em; display: flex; justify-content: space-between; align-items: center; padding: 3px; border-bottom: 1px solid gray; margin-bottom: 3px;">
                                            <strong>JUMLAH KELURAHAN/DESA</strong>
                                            <label for="">10</label>
                                        </div>
                                        <div style="font-size:.8em; display: flex; justify-content: space-between; align-items: center; padding: 3px; border-bottom: 1px solid gray; margin-bottom: 3px;">
                                            <strong>JUMLAH PENDUDUK</strong>
                                            <label for="">99,0</label>
                                        </div>
                                        <div style="font-size:.8em; display: flex; justify-content: space-between; align-items: center; padding: 3px; border-bottom: 1px solid gray; margin-bottom: 3px;">
                                            <strong>LAJU PERTUMBUHAN</strong>
                                            <label for=""><?= $data_kecamatan['laju_pertumbuhan'] ?></label>
                                        </div>
                                        <!-- <div style="font-size:.8em; display: flex; justify-content: space-between; align-items: center; padding: 3px; border-bottom: 1px solid gray; margin-bottom: 3px;">
                                            <strong>PRESENTASE PENDUDUK</strong>
                                            <label for="">00</label>
                                        </div>
                                        <div style="font-size:.8em; display: flex; justify-content: space-between; align-items: center; padding: 3px; border-bottom: 1px solid gray; margin-bottom: 3px;">
                                            <strong>KEPADATAN PENDUDUK km2</strong>
                                            <label for="">00</label>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-kelurahan" role="tabpanel" aria-labelledby="nav-kelurahan-tab">
                                    <div class="mt-3">
                                        <div style="font-size:.8em; display: flex; justify-content: space-between; align-items: center; padding: 3px; border-bottom: 1px solid gray; margin-bottom: 3px;">
                                            <strong>NAMA IBUKOTA KECAMATAN</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-pic" role="tabpanel" aria-labelledby="nav-pic-tab">...</div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                            </div>
                        </div>
                        <!-- <div class="p-4 mb-3 bg-white">

                            map

                        </div> -->



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url("assets/template_2/") ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/jquery-ui.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/popper.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/jquery.stellar.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/jquery.countdown.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/jquery.animateNumber.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/jquery.waypoints.min.js"></script>

    <script src="<?= base_url("assets/template_2/") ?>js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/aos.js"></script>
    <script src="<?= base_url("assets/template_2/") ?>js/rangeslider.min.js"></script>


    <script src="<?= base_url("assets/template_2/") ?>js/typed.js"></script>
    <script>
        var typed = new Typed('.typed-words', {
            strings: ["pain", " stress", " fatigue"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        });
    </script>

    <script src="<?= base_url("assets/template_2/") ?>js/main.js"></script>

</body>

</html>