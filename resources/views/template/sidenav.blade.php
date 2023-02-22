<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{ asset('assets/img/GO-LANG.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">GO-LANG</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @if (auth()->user()->level == 'admin')
        <li class="nav-item">
          <a href="{{ route('dashboard.admin') }}" class="nav-link">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @elseif (auth()->user()->level == 'petugas')
        <li class="nav-item">
          <a href="{{ route('dashboard.petugas') }}" class="nav-link">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @elseif (auth()->user()->level == 'masyarakat')
        <li class="nav-item">
          <a href="{{ route('dashboard.masyarakat') }}" class="nav-link">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @endif
        @if (auth()->user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('barang.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">create_new_folder</i>
            </div>
            <span class="nav-link-text ms-1">Data Barang</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route ('lelangadmin.index')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">folder</i>
              </div>
              <span class="nav-link-text ms-1">Data Lelang</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.index')}}" class="nav-link">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person_add</i>
            </div>
            <span class="nav-link-text ms-1">Data Users</span>
            </a>
        </li>
        <li class="nav-header">GENERATE LAPORAN</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Laporan Lelang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Laporan History</p>
              </a>
            </li>
          </ul>
        </li>
        @elseif (auth()->user()->level == 'petugas')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('barang.index') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">create_new_folder</i>
              </div>
              <span class="nav-link-text ms-1">Data Barang</span>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route ('lelangpetugas.index')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">folder</i>
              </div>
              <span class="nav-link-text ms-1">Data Lelang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">folder</i>
              </div>
              <span class="nav-link-text ms-1">Data Penawaran Lelang</span>
            </a>
          </li>
          <li class="nav-header">GENERATE LAPORAN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Laporan Lelang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Laporan History</p>
                </a>
              </li>
            </ul>
            @elseif (auth()->user()->level == 'masyarakat')
            <li class="nav-item">
              <a href="#" class="nav-link">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">sell</i>
              </div>
              <span class="nav-link-text ms-1">Data Penawaran Anda</span>
              </a>
            </li>

        @endif
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('user.editprofile') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('logout-petugas') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
