<?php
$tahun_ajaran = $this->db->query("SELECT tahun_ajaran, semester FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $sekolah->nama_sekolah; ?> </title>
  
  <link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/master/upload/'.$sekolah->logo; ?>" type="image/x-icon">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animate.css-master/animate.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/toastr/build/toastr.min.css" />

  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>node_modules/toastr/build/toastr.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed ">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>


    <ul class="animated fadeInDown navbar-nav ml-auto">
      <div class="btn-group btn-group-sm">
                    <span class="btn bg-red icon text-white-50">
                      <i class="fas fa-calendar-alt text-white"></i>
                    </span>
                    <span class="btn bg-warning brand-text font-weight-light text-white text-uppercase"><b>TP : <?php echo $tahun_ajaran->tahun_ajaran.' | Semester '.$tahun_ajaran->semester; ?></b></span>
                  <a href="<?php echo base_url(); ?>logout" class="btn bg-navy btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="nav-icon fas fa-sign-out-alt text-white"></i>
                    </span>
                    <span class="brand-text font-weight-light text-white text-uppercase"><b>Logout</b></span>
                  </a>
      </div>
    </ul>

  </nav>
  <!-- /.navbar -->