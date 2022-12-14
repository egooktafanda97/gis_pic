<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>About</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:400,500" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="<?= base_url("app/public/template/") ?>css/linearicons.css">
    <link rel="stylesheet" href="<?= base_url("app/public/template/") ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url("app/public/template/") ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url("app/public/template/") ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url("app/public/template/") ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url("app/public/template/") ?>css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url("app/public/template/") ?>css/main.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.js"></script>
    <style>
        table {
            font-size: .8em;
        }

        .cards {
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            padding: 5px;
        }

        #myChart {
            height: 300px;
            width: 100%;
        }

        #map {
            height: 300px;
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Start Header Area -->
    <header class="default-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="img/logo.png" alt="" style="height: 20px" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a href="<?= base_url("/website") ?>">Home</a></li>
                        <li><a href="<?= base_url("website/gis") ?>">Peta</a></li>
                        <li><a href="<?= base_url("website/master_data") ?>" class="active">Master Data</a></li>
                        <li><a href="<?= base_url("website/tentang") ?>">Tentang</a></li>
                        <li>
                            <a href="#">Tentang</a>
                        </li>
                        <li>
                            <a href="#">Kontak</a>
                        </li>
                        <!-- <li class="dropdown">
                            <a
                            class="dropdown-toggle"
                            href="#"
                            id="navbardrop"
                            data-toggle="dropdown">
                            Pages
                            </a>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="projects.html">Projects</a>
                            <a class="dropdown-item" href="elements.html">Elements</a>
                            </div>
                        </li> -->
                        <!-- <li><a href="contact.html">Kontak</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header Area -->

    <!-- Start top-section Area -->
    <section class="banner-area relative" style="background-image: url('<?= base_url("app/public/template/img/header-bg3.jpg") ?>');">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-between align-items-center text-center banner-content">
                <div class="col-lg-12">
                    <h1 class="text-white"><?= $data_kecamatan['nama_kecamatan'] ?></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->

    <!-- Start features Area -->
    <section class="features-area" style="margin-top: 50px;" id="news">
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    <!-- All rights reserved | This template is made with -->
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <!-- by -->
                    <a href="https://colorlib.com" target="_blank">
                        <!-- Colorlib -->
                    </a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook-f"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="<?= base_url("app/public/template/") ?>js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="<?= base_url("app/public/template/") ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?= base_url("app/public/template/") ?>js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url("app/public/template/") ?>js/parallax.min.js"></script>
    <script src="<?= base_url("app/public/template/") ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url("app/public/template/") ?>js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url("app/public/template/") ?>js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url("app/public/template/") ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url("app/public/template/") ?>js/jquery.sticky.js"></script>
    <script src="<?= base_url("app/public/template/") ?>js/main.js"></script>


    <!-- data tables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.2.0/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#example").DataTable({
                responsive: {
                    details: {
                        type: "column",
                        target: "tr",
                    },
                },
                columnDefs: [{
                    className: "control",
                    orderable: false,
                    targets: 0,
                }, ],
                paging: false,
                ordering: false,
                info: false,
                "searching": false
            });
        });
    </script>
</body>

</html>