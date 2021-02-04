<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Point of Sale</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <div class="sidebar-heading mt-5" style="color: white;">
        <?= session('role'); ?>
    </div>
    <!-- Nav Item - Dashboard -->
    <?php if (session('role') == 'Admin') : ?>
        <li class="nav-item <?= ($title == 'Dashboard Admin') ? 'active' : '';  ?>">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Data User') ? 'active' : '';  ?>">
            <a class="nav-link " href="/user">
                <i class="fas fa-fw fa-users"></i>
                <span>Data User</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Data Pelanggan') ? 'active' : '';  ?>">
            <a class="nav-link" href="/pelanggan">
                <i class="fas fa-id-badge"></i>
                <span>Data Pelanggan</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Data Pemasok') ? 'active' : '';  ?>">
            <a class="nav-link" href="/pemasok">
                <i class="fas fa-parachute-box"></i>
                <span>Data Pemasok</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Data Produk') ? 'active' : '';  ?>">
            <a class="nav-link" href="/produk">
                <i class="fab fa-product-hunt"></i>
                <span>Data Produk</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Transaksi') ? 'active' : '';  ?>">
            <a class=" nav-link" href="/transaksi">
                <i class="fas fa-cart-plus"></i>
                <span>Transaksi</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Laporan') ? 'active' : '';  ?>">
            <a class=" nav-link" href="/laporan">
                <i class="fas fa-bookmark"></i>
                <span>Laporan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login/logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
    <?php endif; ?>

    <?php if (session('role') == 'Manajer') : ?>
        <li class="nav-item <?= ($title == 'Dashboard Manajer') ? 'active' : '';  ?>">
            <a class="nav-link" href="/manajer">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Laporan') ? 'active' : '';  ?>">
            <a class="nav-link" href="/laporan">
                <i class="fas fa-bookmark"></i>
                <span>Laporan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login/logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
    <?php endif; ?>

    <?php if (session('role') == 'Kasir') : ?>
        <li class="nav-item <?= ($title == 'Dashboard Kasir') ? 'active' : '';  ?>">
            <a class="nav-link" href="/kasir.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Data User') ? 'active' : '';  ?>">
            <a class="nav-link " href="/user">
                <i class="fas fa-fw fa-users"></i>
                <span>Data User</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Data Pelanggan') ? 'active' : '';  ?>">
            <a class="nav-link" href="/pelanggan">
                <i class="fas fa-id-badge"></i>
                <span>Data Pelanggan</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Data Pemasok') ? 'active' : '';  ?>">
            <a class="nav-link" href="/pemasok">
                <i class="fas fa-parachute-box"></i>
                <span>Data Pemasok</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Data Produk') ? 'active' : '';  ?>">
            <a class="nav-link" href="/produk">
                <i class="fab fa-product-hunt"></i>
                <span>Data Produk</span></a>
        </li>
        <li class="nav-item <?= ($title == 'Transaksi') ? 'active' : '';  ?>">
            <a class="nav-link" href="/transaksi">
                <i class="fas fa-cart-plus"></i>
                <span>Transaksi</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login/logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
    <?php endif; ?>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->