<?php
$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
$pengaturan = $this->db->query("SELECT * FROM ppdb_pengaturan WHERE id = 1")->row();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PPDB - <?php echo $sekolah->nama_sekolah; ?></title>

  <link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sympel/master/upload/'.$sekolah->logo; ?>" type="image/x-icon">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animate.css-master/animate.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.css">
  <!-- Font Awesome Pro -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Theme style -->
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">


  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <style>
    video {
      max-width: 100%;
      height: auto;
    }

    .responsive-map {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }

    .responsive-map iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
    }
  </style>
</head>

<body class="hold-transition layout-top-nav sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-info">
      <div class="container">
        <a href="<?php echo base_url(); ?>portal/prosedur" class="navbar-brand">
          <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sympel/master/upload/'.$sekolah->logo; ?>" class="brand-image img-circle elevation-3">
          <b class="text-white">PPDB <font size="1" style="text-shadow: 2px 2px 4px #827e7e"><?php echo $sekolah->nama_sekolah; ?></font></b>
        </a>

        <button class="navbar-toggler order-1 collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse order-3 collapse" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/prosedur" class="nav-link text-white <?php if ($this->uri->segment(2) == 'prosedur') echo 'text-white'; ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/formulir" class="nav-link text-white <?php if ($this->uri->segment(2) == 'formulir') echo 'text-white'; ?>" class="nav-link">Pendaftaran</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/cetakformulir" class="nav-link text-white <?php if ($this->uri->segment(2) == 'cetakformulir') echo 'text-white'; ?>" class="nav-link">Cetak Formulir</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/pengumuman" class="nav-link text-white <?php if ($this->uri->segment(2) == 'pengumuman') echo 'text-white'; ?>" class="nav-link">Pengumuman</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>portal/tentang" class="nav-link text-white <?php if ($this->uri->segment(2) == 'tentang') echo 'text-white'; ?> " class="nav-link">Tentang Kami</a>
            </li>
          </ul>

          <!-- SEARCH FORM -->

        </div>

      </div>

    </nav>

    <!-- /.navbar -->

    <div class="card-danger card-outline"></div>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php if ($this->uri->segment(2) != 'cetak') { ?>


        <div class="card">
          <div class="card card-outline card-info">

          </div>
          <!-- /.card-header -->
          <div class="card">
            <div id="carouselExampleIndicatorsx" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?php echo base_url() . 'upload/' . $pengaturan->banner_header; ?>">
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      <?php } ?>


      <div class="content">
        <div class="container">
          <div class="row">