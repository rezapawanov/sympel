<?php
$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ALUMNI | <?php echo $nama_sekolah; ?></title>
    <link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/asispanel/upload/'.$sekolah->logo; ?>" type="image/x-icon">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/toastr/build/toastr.min.css" />
  <!-- Google Font: Source Sans Pro -->
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url(); ?>node_modules/toastr/build/toastr.min.js"></script>
</head>
<body class="hold-transition layout-top-nav sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-purple">
    <div class="container col-md-12">
      
        <span class="brand-text font-weight-light text-white"><b><img class="profile-user-img img-fluid img-circle elevation-2" style="width: 30px; height: 30px;"
                       src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/asispanel/upload/'.$sekolah->logo; ?>"
                       alt="User profile picture "><b> <?php echo ucfirst($nama_sekolah); ?></b></span>   

      <!-- Right navbar links -->
    </div>
  </nav>
  <!-- /.navbar -->