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
                    <h1 class="text-white">Master Data</h1>
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                            <strong style="color: #fff;">GRAFIK JUMLAH PIC</strong>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?= base_url("website/master_data?p=grafik") ?>" type="button" class="btn btn-secondary btn-sm <?= empty($_GET['p']) || $_GET['p'] == "grafik" ? "active" : "" ?>">Grafik</a>
                                <a href="<?= base_url("website/master_data?p=tabel") ?>" type="button" class="btn btn-secondary btn-sm <?= !empty($_GET['p']) && $_GET['p'] == "tabel" ? "active" : "" ?>">Tabel</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (empty($_GET['p']) || $_GET['p'] == "grafik") : ?>
                                <canvas id="myChart" width="400" height="250"></canvas>
                            <?php endif ?>
                            <?php if (!empty($_GET['p']) && $_GET['p'] == "tabel") : ?>
                                <div class="w-100 mb-2" style="display: flex; justify-content: flex-end;border-bottom: 1px solid gray;margin-bottom: 3px;">
                                    <div class="form-group">
                                        <select name="filter-pic" id="filter-pic" class="form-control form-control-sm">
                                            <option value="industri">Industri</option>
                                            <option value="pendidikan">Pendidikan</option>
                                            <option value="tempat_ibadah">Tempat Ibadah</option>
                                            <option value="penginapan">Penginapan</option>
                                            <option value="fasilitas_kesehatan">Fasilitas Kesehatan</option>
                                            <option value="pariwisata">Pariwisata</option>
                                            <option value="spbu">Spbu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-100" style="overflow-x: auto;">
                                    <table id="example" class="display nowrap cell-border tbl" style="width:100%">

                                    </table>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header bg-info">
                            <strong style="color: #fff;">KETERANGAN</strong>
                        </div>
                        <div class="card-body">
                            <div class="w-100">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Jumlah Kecamatan
                                        <span class="">15</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Jumlah pic
                                        <span class="pic">2</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div id="map"></div>
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
    <script>
        (async function() {
            const getData = await axios.get("<?= base_url("app/api/main/getDataMaster") ?>").catch((err) => {
                console.log(err.response);
            });
            if (getData) {
                const label_key = [];
                const values = [];
                let jml = 0;
                Object.keys(getData).forEach(function(key) {
                    label_key.push(key.replace(/_/g, " "));
                    values.push(getData[key].length);
                    jml++;
                });
                $(".pic").html(jml);

                const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label_key,
                        datasets: [{
                            label: 'data pic',
                            data: values,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        })();

        (async function() {
            const getData_state = await axios.get("<?= base_url("app/api/polygon/pku") ?>").catch((err) => {
                console.log(err.response);
            });
            if (getData_state) {
                mapboxgl.accessToken = 'pk.eyJ1IjoiZWdvb2t0YWZhbmRhOTciLCJhIjoiY2pyN2tobWJuMGZpaDN5cXE3NTdydm8zbiJ9.iLZFxTrH353ju9RuZzX5Jw';
                const map = new mapboxgl.Map({
                    container: 'map', // container ID
                    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                    style: 'mapbox://styles/mapbox/light-v11', // style URL
                    center: [101.4451276040001, 0.532236798000042], // starting position
                    zoom: 9 // starting zoom
                });

                map.on('load', () => {
                    // Add a data source containing GeoJSON data.
                    map.addSource('maine', {
                        'type': 'geojson',
                        'data': getData_state
                    });

                    // Add a new layer to visualize the polygon.
                    map.addLayer({
                        'id': 'maine',
                        'type': 'fill',
                        'source': 'maine', // reference the data source
                        'layout': {},
                        'paint': {
                            'fill-color': '#0080ff', // blue color fill
                            'fill-opacity': 0.1
                        }
                    });
                    // Add a black outline around the polygon.
                    map.addLayer({
                        'id': 'outline',
                        'type': 'line',
                        'source': 'maine',
                        'layout': {},
                        'paint': {
                            'line-color': 'red',
                            'line-width': 1
                        }
                    });
                });
                const getData_circle = await axios.get("<?= base_url("app/api/main/geojson") ?>").catch((err) => {
                    console.log(err.response);
                });


                const colors = [
                    "#1e81b0",
                    "#e28743",
                    "#eab676",
                    "#76b5c5",
                    "#21130d",
                    "#873e23",
                    "#abdbe3",
                    "#063970",
                    "#154c79",
                ];
                const GenerateColorCircle = (arrObj, items) => {
                    var g = arrObj.map((_, i) => {
                        return {
                            item: _,
                            color: colors[i],
                            data: items[_],
                        };
                    });
                    return g;
                };
                if (getData_circle) {
                    const geometri = getData_circle?.geoJson;
                    const jumlhItem = getData_circle?.item;
                    const marker = getData_circle?.marker;
                    var ItemKey = Object.keys(jumlhItem);
                    const configureItem = GenerateColorCircle(ItemKey, jumlhItem);


                    const CircleMarker = (geoJson, circleColors) => {
                        const arr = ["match", ["get", "ethnicity"]];
                        circleColors.map((x) => {
                            arr.push(x?.item);
                            arr.push(x?.color);
                        });
                        arr.push("#000");
                        map.addSource("marker_data", {
                            type: "geojson",
                            data: geoJson,
                        });
                        const mode_circle_radius_config = {
                            mode_1: {
                                property: "sqrt",
                                stops: [
                                    [{
                                        zoom: 8,
                                        value: 250
                                    }, 10],
                                    // [{ zoom: 8, value: 250 }, 0],
                                    [{
                                        zoom: 11,
                                        value: 250
                                    }, 20],
                                    // [{ zoom: 11, value: 250 }, 20],
                                    [{
                                        zoom: 15,
                                        value: 250
                                    }, 0],
                                    [{
                                        zoom: 20,
                                        value: 0
                                    }, 0],
                                ],
                            },
                            mode_2: {
                                base: 50,
                                stops: [
                                    [12, 3],
                                    [40, 180],
                                ],
                            },
                        };
                        map.addLayer({
                            id: "circle",
                            type: "circle",
                            source: "marker_data",
                            layout: {
                                // Make the layer visible by default.
                                visibility: "visible",
                            },
                            paint: {
                                "circle-radius-transition": {
                                    duration: 300
                                },
                                "circle-color": "#F98200",
                                "circle-stroke-color": "#595655",
                                "circle-stroke-opacity": 0.5,
                                "circle-radius": mode_circle_radius_config.mode_2,
                                "circle-color": arr,
                            },
                        });
                    }
                    CircleMarker(getData_circle?.geoJson, configureItem);



                    function createTable(data, selection) {
                        var heed = ``;
                        var bd = ``;

                        var no = 1;
                        data?.map((res, i) => {

                            if (selection == res?.properties?.ethnicity) {
                                var __data = `<tr>`;
                                __data += `<td scope="col">${no}</td>`
                                res?.properties?.data?.map((izz, X) => {
                                    if (no == 1) {
                                        heed += `<th scope="col">${izz?.label?.toUpperCase()}</th>`;
                                    }
                                    __data += `<td scope="col">${izz?.value}</td>`;
                                })
                                __data += `<td scope="col" class="text-center">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                                            </td></tr>`;
                                bd += __data;
                                no++;
                            }

                        });


                        var headers = `<thead>
                                        <tr>
                                        <th scope="col">No</th>
                                            ${heed}
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>`;
                        var footers = `<tfoot>
                                        <tr>
                                        <th scope="col">No</th>
                                            ${heed}
                                            <th scope="col">#</th>
                                        </tr>
                                    </tfoot>`;

                        var tBody = `<tbody>
                                    ${bd}
                                </tbody>`;

                        return headers + footers + bd;

                    }
                    if ($("#filter-pic").val() == 'industri') {
                        var results = createTable(getData_circle?.geoJson?.features, $("#filter-pic").val());
                        $(".tbl").html(results)
                    }


                    $("#filter-pic").change(function() {
                        var results = createTable(getData_circle?.geoJson?.features, $(this).val());
                        $(".tbl").html(results)
                        // console.log(getData_circle?.geoJson?.features)

                    })


                }

            }
        })();
    </script>
</body>

</html>