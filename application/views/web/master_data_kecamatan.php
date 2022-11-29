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
                    <h1 class="text-white">Data Kecamatan</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->

    <!-- Start features Area -->
    <section class="features-area" style="margin-top: 50px;" id="news">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("website/master_data?p=tabel") ?>">Data Pic</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url("website/master_data_kecamatan") ?>">Data Kecamatan</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                            <strong style="color: #fff;">DATA KECAMATAN</strong>
                        </div>
                        <div class="card-body">
                            <table id="example" class="display nowrap cell-border" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope=" col">No</th>
                                        <th scope="col">Nama Kecamatan</th>
                                        <th scope="col">Luas Wilayah</th>
                                        <th scope="col">Jumlah Penduduk</th>
                                        <th scope="col">Laju Pertumbuhan Penduduk</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th scope=" col">No</th>
                                        <th scope="col">Nama Kecamatan</th>
                                        <th scope="col">Luas Wilayah</th>
                                        <th scope="col">Jumlah Penduduk</th>
                                        <th scope="col">Laju Pertumbuhan Penduduk</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kecamatan as $value) : ?>
                                        <tr>
                                            <td>#</td>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value['nama_kecamatan'] ?></td>
                                            <td><?= $value['luas_wilayah'] ?></td>
                                            <td><?= $value['jumlah_penduduk'] ?></td>
                                            <td><?= $value['laju_pertumbuhan'] ?></td>
                                            <td scope="col" class="text-center">
                                                <a href="<?= base_url("website/kecamatan/" . $value['kode_kecamatan']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
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