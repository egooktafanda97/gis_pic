<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">PIC</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <!-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
            </ul>
        </li> -->
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-industry"></i><span>Industri</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('Industri'); ?>"><i class="fa fa-circle"></i> <span>Industri</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Pic_industri'); ?>"><i class="fa fa-circle"></i> <span>Pic</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Sektor_industri'); ?>"><i class="fa fa-circle"></i> <span>Sektor</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Sub_sektor'); ?>"><i class="fa fa-circle"></i> <span>Sub Sektor</span></a></li>
            </ul>
        </li>


        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-school"></i><span>Pendidikan</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('Pendidikan'); ?>"><i class="fa fa-circle"></i> <span> Master</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Jenjang_pendidikan'); ?>"><i class="fa fa-circle"></i> <span> Jenjang</span></a></li>
            </ul>
        </li>

        <?php if (!empty(auth(auth()['user']['role'])) && auth()['user']['role'] == "SUPER_ADMIN") : ?>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-cog"></i><span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('Setting'); ?>"><i class="fa fa-circle"></i> <span>Pengaturan Map</span></a></li>
                </ul>
            </li>
        <?php endif ?>
    </ul>
</aside>