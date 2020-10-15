<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="assets/images/favicon_1.png">

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">
  <link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
  <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />

  <!-- Form Select -->
  <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
  <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
  <link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

  <!-- DataTables -->
  <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
  <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
  <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

  <!-- Template -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

  <script src="assets/js/modernizr.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>

</head>


<body class="fixed-left">

  <!-- Begin page -->
  <div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

      <!-- LOGO -->
      <div class="topbar-left">
        <div class="text-center">
          <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a>
        </div>
      </div>

      <!-- Button mobile view to collapse sidebar menu -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="">
            <div class="pull-left">
              <button class="button-menu-mobile open-left waves-effect waves-light">
                <i class="md md-menu"></i>
              </button>
              <span class="clearfix"></span>
            </div>

            <form role="search" class="navbar-left app-search pull-left hidden-xs">
              <input type="text" placeholder="Search..." class="form-control">
              <a href=""><i class="fa fa-search"></i></a>
            </form>


            <ul class="nav navbar-nav navbar-right pull-right">
              <li class="dropdown top-menu-item-xs">
                <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/admin/default_admin.jpg" alt="user-img" class="img-circle"> </a>
                <ul class="dropdown-menu">
                  <li><a href="web.php?<?= url('profile_admin') ?>"><i class="ti-user m-r-10 text-custom"></i>&nbsp;&nbsp; Profile</a></li>
                  <li><a href="web.php?<?= url('data_admin') ?>"><i class="md-lg md-people-outline m-r-10 text-custom"></i> Data Admin</a></li>
                  <li class="divider"></li>
                  <li><a href="config.php?logout=true"><i class="ti-power-off m-r-10 text-danger"></i>&nbsp;&nbsp;Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
          <ul>
           <li class="has_sub" id="home">
            <a href="web.php?<?= url('home') ?>" class="waves-effect">
              <i class="ti-home"></i> Home
            </a>
          </li>

          <li class="has_sub" id="home">
            <a href="web.php?<?= url('reservasi') ?>" class="waves-effect">
              <i class="ti-time"></i> Reservasi
            </a>
          </li>

          <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
              <i class="ti-harddrive"></i> Master Data
              <span class="menu-arrow"></span>
            </a>
            <ul class="list-unstyled">
              <li id="data_booking"><a href="web.php?<?= url('data_booking') ?>"> Data Booking</a></li>
              <li id="cekin_cekout"><a href="web.php?<?= url('data_cekin') ?>"> Data Cek In</a></li>
              <li id="cekin_cekout"><a href="web.php?<?= url('data_cekout') ?>"> Data Cek Out</a></li>
              <li id="cekin_cekout"><a href="web.php?<?= url('data_transaksi') ?>"> Data Transaksi</a></li>
            </ul>
          </li>

          <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
              <i class="ti-layout-column2"></i> Data Kamar 
              <span class="menu-arrow"></span> 
            </a>
            <ul class="list-unstyled">
              <li id="data_kamar">
                <a href="web.php?<?= url('data_kamar') ?>"> Data Kamar</a>
              </li>
              <li id="tipe_kamar">
                <a href="web.php?<?= url('tipe_kamar') ?>"> Tipe Kamar</a>
              </li>
              <li id="fasilitas_kamar">
                <a href="web.php?<?= url('fasilitas_kamar') ?>"> Fasilitas Kamar</a>
              </li>
            </ul>
          </li>

          <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
              <i class="ti-clipboard"></i> Laporan 
              <span class="menu-arrow"></span>
            </a>
            <ul class="list-unstyled">
              <li id="laporan_data_tamu"><a href="web.php?<?= url('laporan_data_tamu') ?>"> Laporan Data Tamu</a></li>
              <li id="laporan_transaksi"><a href="web.php?<?= url('laporan_transaksi') ?>"> Laporan Transaksi</a></li>
              <li id="laporan_transaksi"><a href="web.php?<?= url('laporan_data_kamar') ?>"> Laporan Data Kamar</a></li>
              <li id="laporan_transaksi"><a href="web.php?<?= url('laporan_fasilitas') ?>"> Laporan Fasilitas</a></li>
            </ul>
          </li>

          <!-- <li class="has_sub" id="buku_tamu">
            <a href="javascript:void(0);" class="waves-effect">
              <i class="ti-agenda"></i> Buku Tamu
            </a>
          </li> -->

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- Left Sidebar End -->



  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="content-page">
    <!-- Start content -->
    <div class="content">
      <div class="container" id="content">