<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>GIS</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url("assets/website/apps/public/") ?>assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url("assets/website/apps/public/") ?>assets/img/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/website/apps/public/") ?>assets/img/favicons/favicon-16x16.png" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url("assets/website/apps/public/") ?>assets/img/favicons/favicon.ico" />
    <!-- <link rel="manifest" href="assets/img/favicons/manifest.json" /> -->
    <!-- <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png" /> -->
    <meta name="theme-color" content="#ffffff" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?= base_url("assets/website/apps/public/") ?>assets/css/theme.css" rel="stylesheet" />

</head>

<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root"></div>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <script>
        const base_url = "<?= base_url("") ?>";
        window.base_url = base_url;
        window.web_url = base_url + 'assets/website/apps/dist/';
        window.web_public = base_url + 'assets/website/apps/public/';
    </script>

    <!-- ===============================================-->
    <script src="<?= base_url("assets/website/apps/dist/main.bundle.js") ?>"></script>
    <script src="<?= base_url("assets/website/apps/public/") ?>vendors/@popperjs/popper.min.js"></script>
    <script src="<?= base_url("assets/website/apps/public/") ?>vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url("assets/website/apps/public/") ?>vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?= base_url("assets/website/apps/public/") ?>vendors/fontawesome/all.min.js"></script>
    <script src="<?= base_url("assets/website/apps/public/") ?>assets/js/theme.js"></script>


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap" rel="stylesheet" />
</body>

</html>