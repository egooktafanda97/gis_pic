<!DOCTYPE html>
<html lang="en">
<?php $assets = base_url("assets/"); ?>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Pekanbaru</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/css/style.css">
    <link rel="stylesheet" href="<?= $assets ?>template/dist/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
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
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <!-- <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="#" class="needs-validation" id="login" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                        <div style="display: flex;justify-content: flex-start;">
                                            <small style="font-size: .5; color: red;" id="msg-username">

                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div style="display: flex;justify-content: flex-start;">
                                            <small style="font-size: .5; color: red;" id="msg-password">

                                            </small>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block action-btn" id="login-btn" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="auth-register.html">Create One</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; <?= date("Y") ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= $assets ?>template/dist/assets/js/scripts.js"></script>
    <script src="<?= $assets ?>template/dist/assets/js/custom.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#login').submit(function(e) {
                e.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();
                const form_data = new FormData();
                form_data.append('username', username);
                form_data.append('password', password);
                axios.post('<?= base_url("Login/auth") ?>', form_data)
                    .then(function(res) {
                        if (res.data.status == 'error') {
                            if (res.data.result == 'username') {
                                $('#msg-username').html(res.data.msg);

                            } else {
                                $('#msg-password').html(res.data.msg);
                            }
                        } else {
                            localStorage.setItem('auth', JSON.stringify(res.data.result));
                            setTimeout(function() {
                                window.location.href = '<?= base_url("Home") ?>';
                            }, 1000);
                        }
                    }).catch(function(err) {
                        console.log(err);
                    });
            });
        });
    </script>
</body>

</html>