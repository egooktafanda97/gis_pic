<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="https://bidangsampahdlhpelalawan.com/rest/public/img/users/default.png" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">Admin <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu</label>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("Home/index") ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-industry"></i></span><span class="pcoded-mtext">Industri</span></a>
                    <ul class="pcoded-submenu">
                        <li><a class="nav-link Industri" href="<?= base_url('Industri'); ?>"><i class="fa fa-circle"></i> <span>Industri</span></a></li>
                        <li><a class="nav-link Pic_industri" href="<?= base_url('Pic_industri'); ?>"><i class="fa fa-circle"></i> <span>Pic</span></a></li>
                        <li><a class="nav-link Sektor_industri" href="<?= base_url('Sektor_industri'); ?>"><i class="fa fa-circle"></i> <span>Sektor</span></a></li>
                        <li><a class="nav-link Sub_sektor" href="<?= base_url('Sub_sektor'); ?>"><i class="fa fa-circle"></i> <span>Sub Sektor</span></a></li>
                    </ul>
                </li>


                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-school"></i></span><span class="pcoded-mtext">Pendidikan</span></a>
                    <ul class="pcoded-submenu">
                        <li><a class="nav-link Pendidikan" href="<?= base_url('Pendidikan'); ?>"><i class="fa fa-circle"></i> <span> Master</span></a></li>
                        <li><a class="nav-link Jenjang_pendidikan" href="<?= base_url('Jenjang_pendidikan'); ?>"><i class="fa fa-circle"></i> <span> Jenjang</span></a></li>
                    </ul>
                </li>
                <li class="nav-item tabungan-route">
                    <a href="<?= base_url('Tempat_ibadah'); ?>" class="nav-link "><span class="pcoded-micon"><i class="fa fa-place-of-worship"></i></span><span class="pcoded-mtext">Tempat Ibadah</span></a>
                </li>


                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-hotel"></i></span><span class="pcoded-mtext">Hotel</span></a>
                    <ul class="pcoded-submenu">
                        <li><a class="nav-link Penginapan" href="<?= base_url('Penginapan'); ?>"><i class="fa fa-circle"></i> <span>Hotel</span></a></li>
                        <li><a class="nav-link Jenis_penginapan" href="<?= base_url('Jenis_penginapan'); ?>"><i class="fa fa-circle"></i> <span>Jenis Hotel</span></a></li>
                        <li><a class="nav-link Kelas_penginapan" href="<?= base_url('Kelas_penginapan'); ?>"><i class="fa fa-circle"></i> <span>Kelas Hotel</span></a></li>
                    </ul>
                </li>


                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-hotel"></i></span><span class="pcoded-mtext">Fasilitas Kesehatan</span></a>
                    <ul class="pcoded-submenu">
                        <li><a class="nav-link Fasilitas_kesehatan" href="<?= base_url('Fasilitas_kesehatan'); ?>"><i class="fa fa-circle"></i> <span>Master</span></a></li>
                        <li><a class="nav-link Jenis_fasilitas_kesehatan" href="<?= base_url('Jenis_fasilitas_kesehatan'); ?>"><i class="fa fa-circle"></i> <span>Jenis Fasilitas</span></a></li>
                    </ul>
                </li>


                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-mountain"></i></span><span class="pcoded-mtext">Pariwisata</span></a>
                    <ul class="pcoded-submenu">
                        <li><a class="nav-link Pariwisata" href="<?= base_url('Pariwisata'); ?>"><i class="fa fa-circle"></i> <span>Master</span></a></li>
                        <li><a class="nav-link Jenis_pariwisata" href="<?= base_url('Jenis_pariwisata'); ?>"><i class="fa fa-circle"></i> <span>Jenis Pariwisata</span></a></li>
                    </ul>
                </li>


                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-columns"></i></span><span class="pcoded-mtext">Bank</span></a>
                    <ul class="pcoded-submenu">
                        <li><a class="nav-link Bank" href="<?= base_url('Bank'); ?>"><i class="fa fa-circle"></i> <span>Master</span></a></li>
                        <li><a class="nav-link Jenis_bank" href="<?= base_url('Jenis_bank'); ?>"><i class="fa fa-circle"></i> <span>Jenis Bank</span></a></li>
                    </ul>
                </li>


                <!-- <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fa fa-money"></i></span><span class="pcoded-mtext">Keuangan</span></a>
                    <ul class="pcoded-submenu">
                        <li>
                            <a href="<?= base_url("Keuangan/index") ?>">Keuangan Bank</a>
                        </li>
                    </ul>
                </li> -->

            </ul>

            <!-- <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">Download Pro</h6>
                    <p>Getting more features with pro version</p>
                    <a href="https://1.envato.market/qG0m5" target="_blank" class="btn btn-primary btn-sm text-white m-0">Upgrade Now</a>
                </div>
            </div> -->

        </div>
    </div>
</nav>