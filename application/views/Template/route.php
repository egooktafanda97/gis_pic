<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">PIC</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-industry"></i><span>Industri</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link Industri" href="<?= base_url('Industri'); ?>"><i class="fa fa-circle"></i> <span>Industri</span></a></li>
                <li><a class="nav-link Pic_industri" href="<?= base_url('Pic_industri'); ?>"><i class="fa fa-circle"></i> <span>Pic</span></a></li>
                <li><a class="nav-link Sektor_industri" href="<?= base_url('Sektor_industri'); ?>"><i class="fa fa-circle"></i> <span>Sektor</span></a></li>
                <li><a class="nav-link Sub_sektor" href="<?= base_url('Sub_sektor'); ?>"><i class="fa fa-circle"></i> <span>Sub Sektor</span></a></li>
            </ul>
        </li>


        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-school"></i><span>Pendidikan</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link Pendidikan" href="<?= base_url('Pendidikan'); ?>"><i class="fa fa-circle"></i> <span> Master</span></a></li>
                <li><a class="nav-link Jenjang_pendidikan" href="<?= base_url('Jenjang_pendidikan'); ?>"><i class="fa fa-circle"></i> <span> Jenjang</span></a></li>
            </ul>
        </li>

        <!-- <?php if (!empty(auth(auth()['user']['role'])) && auth()['user']['role'] == "SUPER_ADMIN") : ?>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-cog"></i><span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('Setting'); ?>"><i class="fa fa-circle"></i><span>Pengaturan Map</span></a></li>
                </ul>
            </li>
        <?php endif ?> -->

        <li><a class="nav-link Tempat_ibadah" href="<?= base_url('Tempat_ibadah'); ?>"><i class="fa fa-place-of-worship"></i> <span>Tempat Ibadah</span></a></li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hotel"></i><span>Penginapan</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link Penginapan" href="<?= base_url('Penginapan'); ?>"><i class="fa fa-circle"></i> <span>Master</span></a></li>
                <li><a class="nav-link Jenis_penginapan" href="<?= base_url('Jenis_penginapan'); ?>"><i class="fa fa-circle"></i> <span>Jenis Penginapan</span></a></li>
                <li><a class="nav-link Kelas_penginapan" href="<?= base_url('Kelas_penginapan'); ?>"><i class="fa fa-circle"></i> <span>Kelas Penginapan</span></a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-hospital"></i><span>Fasilitas Kesehatan</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link Fasilitas_kesehatan" href="<?= base_url('Fasilitas_kesehatan'); ?>"><i class="fa fa-circle"></i> <span>Master</span></a></li>
                <li><a class="nav-link Jenis_fasilitas_kesehatan" href="<?= base_url('Jenis_fasilitas_kesehatan'); ?>"><i class="fa fa-circle"></i> <span>Jenis Fasilitas</span></a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-mountain"></i><span>Pariwisata</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link Pariwisata" href="<?= base_url('Pariwisata'); ?>"><i class="fa fa-circle"></i> <span>Master</span></a></li>
                <li><a class="nav-link Jenis_pariwisata" href="<?= base_url('Jenis_pariwisata'); ?>"><i class="fa fa-circle"></i> <span>Jenis Pariwisata</span></a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Bank</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link Bank" href="<?= base_url('Bank'); ?>"><i class="fa fa-circle"></i> <span>Master</span></a></li>
                <li><a class="nav-link Jenis_bank" href="<?= base_url('Jenis_bank'); ?>"><i class="fa fa-circle"></i> <span>Jenis Bank</span></a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-gas-pump"></i><span>Spbu</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link Spbu" href="<?= base_url('Spbu'); ?>"><i class="fa fa-circle"></i> <span>Master</span></a></li>
                <li><a class="nav-link Jenis_spbu" href="<?= base_url('Jenis_spbu'); ?>"><i class="fa fa-circle"></i> <span>Jenis Spbu</span></a></li>
            </ul>
        </li>
        <!-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fa fa-globe"></i><span>Info Grafis</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link Info_grafis" href="<?= base_url('Info_grafis'); ?>"><i class="fa fa-globe"></i> <span>Data Info</span></a></li>
            </ul>
        </li>
        <li><a class="nav-link Marker" href="<?= base_url('Marker'); ?>"><i class="fa fa-cog"></i> <span>Seting Marker</span></a></li>
        <li><a class="nav-link Tempat_ibadah" href="<?= base_url('Kecamatan'); ?>"><i class="fa fa-city"></i> <span>Kecamatan</span></a></li>
        <li><a class="nav-link Tempat_ibadah" href="<?= base_url('UserRole'); ?>"><i class="fa fa-user"></i> <span>User</span></a></li> -->
    </ul>
</aside>