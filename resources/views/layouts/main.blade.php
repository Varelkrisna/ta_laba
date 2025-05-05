<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TRISNA MOTOR | {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<!-- Favicons -->
<link href="{{ asset('assets/img/card.jpg') }}" rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">TRISNA MOTOR</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  </header><!-- End Header -->


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : 'collapsed' }}" href="/dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Stok</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="icons-nav" class="nav-content collapse {{ Request::is('tambahkategori','inputstok', 'stokopname', 'pembelian', 'penjualan') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <li>
                <a href="/tambahkategori" class="{{ Request::is('tambahkategori') ? 'active' : '' }}">
                  <i class="bi bi-circle"></i><span>Tambah Kategori</span>
                </a>
              </li>
            <li>
              <a href="/inputstok" class="{{ Request::is('inputstok') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Tambah Produk Baru</span>
              </a>
            </li>
            <li>
              <a href="/stokopname" class="{{ Request::is('stokopname') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Stok Opname</span>
              </a>
            </li>
            <li>
              <a href="/pembelian" class="{{ Request::is('pembelian') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Pembelian</span>
              </a>
            </li>
            <li>
              <a href="/penjualan" class="{{ Request::is('penjualan') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Penjualan</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('tambahsupplier') ? 'active' : 'collapsed' }}" href="/tambahsupplier">
              <i class="bi bi-plus-circle"></i>
              <span>Tambah Supplier </span>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('cosct') || Request::is('cosctbiaya') || Request::is('cosctgaji') || Request::is('listmekanik') || Request::is('formtambahkar') || Request::is('inputgaji') || Request::is('daftarcosctbiaya') || Request::is('tambahkategoribiaya')  ? 'active' : 'collapsed' }}" href="/cosct">
                <i class="bi bi-person"></i>
            <span>Biaya</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('report') ? 'active' : 'collapsed' }}" href="/report">
            <i class="bi bi-question-circle"></i>
            <span>Laporan</span>
          </a>
        </li>
      </ul>
      <!-- End F.A.Q Page Nav -->

    </ul>
  </aside><!-- End Sidebar-->





  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  @include('layouts.header')
</body>
@stack('scripts')

</html>
