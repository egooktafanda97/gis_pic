<!DOCTYPE html>
<html lang="en">
<?php $assets = base_url("assets/"); ?>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?? "" ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/css/style.css">
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/css/components.css">
    <link rel="stylesheet" href="<?= $assets ?>css/style.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?php $this->load->view("Template/nav-top") ?>
            <div class="main-sidebar sidebar-style-2">
                <?php $this->load->view("Template/route") ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?php $this->load->view('/Page/' . $page); ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= $assets ?>template/dist/assets/modules/jquery.min.js"></script>
    <script src="<?= $assets ?>template/dist/assets/modules/popper.js"></script>
    <script src="<?= $assets ?>template/dist/assets/modules/tooltip.js"></script>
    <script src="<?= $assets ?>template/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $assets ?>template/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= $assets ?>template/dist/assets/modules/moment.min.js"></script>
    <script src="<?= $assets ?>template/dist/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <!-- dataTable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= $assets ?>template/dist/assets/js/scripts.js"></script>
    <script src="<?= $assets ?>template/dist/assets/js/custom.js"></script>
    <!-- ------ add script ------------------ -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>


    <script src="<?= base_url("assets/js/script.js") ?>"></script>



    <!-- ------------------------------------ -->

    <?php $this->load->view('/Page/' . $script); ?>

</body>

</html>