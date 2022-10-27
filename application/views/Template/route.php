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
                <li><a class="nav-link" href="<?= base_url('Industri'); ?>"><i class="fas fa-industry"></i> <span>Industri</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Pic_industri'); ?>"><i class="fas fa-industry"></i> <span>Pic</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Sektor_industri'); ?>"><i class="fas fa-industry"></i> <span>Sektor</span></a></li>
                <li><a class="nav-link" href="<?= base_url('Sub_sektor'); ?>"><i class="fas fa-industry"></i> <span>Sub Sektor</span></a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fa fa-cog"></i><span>Setting</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('Map_config'); ?>"><i class="fas fa-industry"></i> <span>Map Config</span></a></li>
            </ul>
        </li>

        <li><a class="nav-link" href="<?= base_url('Pendidikan'); ?>"><i class="fas fa-school"></i> <span>Pendidikan</span></a></li>
    </ul>
</aside>