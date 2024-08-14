<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logoP3L.png') }}" alt="Logo P3L" style="height: 50px; width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">Atma Kitchen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/mo') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/penitip') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-width="2"
                    d="M16 12c2.374 1.183 4 3.65 4 7v4H4v-4c0-3.354 1.631-5.825 4-7m4 1a6 6 0 1 0 0-12a6 6 0 0 0 0 12Zm6-6c-1.5 0-3 .36-5-2c-2 2.36-4.5 3-7 2m1 6l5.025 5.257L17 13m-5 5v5" />
            </svg>
            <span>Data Penitip</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/beliBahan') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M13.707 3.293A.996.996 0 0 0 13 3H4a1 1 0 0 0-1 1v9c0 .266.105.52.293.707l8 8a.997.997 0 0 0 1.414 0l9-9a.999.999 0 0 0 0-1.414zM12 19.586l-7-7V5h7.586l7 7z" />
                <circle cx="8.496" cy="8.495" r="1.505" fill="currentColor" />
            </svg>
            <span>Pembelian Bahan Baku</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/pengeluaran_lain') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024">
                <path fill="currentColor"
                    d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64m0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372m47.7-395.2l-25.4-5.9V348.6c38 5.2 61.5 29 65.5 58.2c.5 4 3.9 6.9 7.9 6.9h44.9c4.7 0 8.4-4.1 8-8.8c-6.1-62.3-57.4-102.3-125.9-109.2V263c0-4.4-3.6-8-8-8h-28.1c-4.4 0-8 3.6-8 8v33c-70.8 6.9-126.2 46-126.2 119c0 67.6 49.8 100.2 102.1 112.7l24.7 6.3v142.7c-44.2-5.9-69-29.5-74.1-61.3c-.6-3.8-4-6.6-7.9-6.6H363c-4.7 0-8.4 4-8 8.7c4.5 55 46.2 105.6 135.2 112.1V761c0 4.4 3.6 8 8 8h28.4c4.4 0 8-3.6 8-8.1l-.2-31.7c78.3-6.9 134.3-48.8 134.3-124c-.1-69.4-44.2-100.4-109-116.4m-68.6-16.2c-5.6-1.6-10.3-3.1-15-5c-33.8-12.2-49.5-31.9-49.5-57.3c0-36.3 27.5-57 64.5-61.7zM534.3 677V543.3c3.1.9 5.9 1.6 8.8 2.2c47.3 14.4 63.2 34.4 63.2 65.1c0 39.1-29.4 62.6-72 66.4" />
            </svg>
            <span>Pengeluaran Lain</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/terimaPesanan') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Update Status</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/terimaPesanan1') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>List Bahan Kurang</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/presensiKaryawan') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Data Presensi Karyawan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/gantiPasswordview') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Ganti Password</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/konfirmasiProses') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Pemrosesan</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
