  <?php
  $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
  $pengaturan = $this->db->query("SELECT * FROM pengaturan_kelulusan WHERE id = 1")->row();
  ?>

  <?php 
  $Dd= date("D");
  $bln= date ("M");
  if ($Dd=="Sun"){$hari="Minggu, ";}
  else if ($Dd=="Mon"){$hari="Senin, ";}
  else if ($Dd=="Tue"){$hari="Selasa, ";}
  else if ($Dd=="Wed"){$hari="Rabu, ";}
  else if ($Dd=="Thu"){$hari="Kamis, ";}
  else if ($Dd=="Fri"){$hari="Jum'at, ";}
  else if ($Dd=="Sat"){$hari="Sabtu, ";}
  else{$hari=$Dd;}
  if($bln=='Jan'){$bln = "Januari ";}
  elseif($bln=='Feb'){$bln = "Februari ";}
  elseif($bln=='Mar'){$bln = "Maret ";}
  elseif($bln=='Apr'){$bln = "April";}
  elseif($bln=='May'){$bln = "Mei ";}
  elseif($bln=='Jun'){$bln = "Juni ";}
  elseif($bln=='Jul'){$bln = "Juli ";}
  elseif($bln=='Aug'){$bln = "Agustus ";}
  elseif($bln=='Sep'){$bln = "September ";}
  elseif($bln=='Oct'){$bln = "Oktober ";}
  elseif($bln=='Nov'){$bln = "November";}
  elseif($bln=='Dec'){$bln = "Desember ";}
  else{$bln=$bln;}
  ?>
  <?php
  $timestamp = strtotime($tanggal_pengumuman);
  //echo $timestamp;
  ?>
  <!DOCTYPE html>
  <!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
  -->
  <html lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>ASIS | Aplikasi Sistem Sekolah
      </title>
      <link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/master/upload/'.$sekolah->logo; ?>" type="image/x-icon">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/fontawesome-free/css/all.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Animate -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/animate.css-master/animate.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/summernote/summernote-bs4.css">
      <!-- Font Awesome Pro -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/fontawesome-free/css/all.css">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
      <!-- Bootstrap4 Duallistbox -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
      <!-- Bootstrap Color Picker -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
      <!-- Theme style -->
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/dist/css/adminlte.min.css">
      <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
      <link href="<?php echo base_url();  ?>assets/dist/css/fullcalendar.css" rel="stylesheet">
      <!-- jQuery -->
      <script src="<?php echo base_url();  ?>assets/plugins/jquery/jquery.min.js">
      </script>
      <script type="text/javascript" src="<?php echo base_url();  ?>asset/typeahead.js">
      </script>
      <script src="https://code.highcharts.com/highcharts.js">
      </script>
      <script src="<?php echo base_url();  ?>assets/dist/js/fullcalendar.js">
      </script>
      <style>
        video {
          max-width: 100%;
          height: auto;
        }
      </style>
    </head>
    <body class="hold-transition layout-top-nav sidebar-mini layout-header-fixed layout-footer-fixed">
      <div class="wrapper">
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info" style="background: url('<?php echo base_url() . 'upload/' . $pengaturan->banner_header; ?>') center center; height: 300px" >
                <br>
                <br>
                <br>
                <div class="widget-user-image">
                  <img class="profile-user-img  elevation-2" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/master/upload/'.$sekolah->logo; ?>" alt="User Image">
                </div>
                <br>
                <br>
                <br>
                <div class="description-block mt-4">
                  <h4 class="m-0 text-white" style="text-shadow: 2px 2px 4px #black;">
                    <b>
                      <?php echo $nama_sekolah; ?>
                    </b>
                  </h4>
                  <span class="description-text">
                    <b>SISTEM INFORMASI KELULUSAN
                      <br>TAHUN 
                      <?php echo $tahun; ?>
                    </b>
                  </span>
                </div>
              </div>
              <div class="card-body" >
                <div id="clock" class="lead text-uppercase" style="font-weight:bold;color:red;">
                </div>
                <div class="row"id="xpengumuman" >
                  <div class="col-md-12">
                    <?php
                      if(isset($_REQUEST['submit'])){
                      //tampilkan hasil queri jika ada
                      $no_ujian = $_REQUEST['nomor'];
                      $hasil = $this->db->query("SELECT * FROM kelulusan_siswa WHERE no_ujian = '$no_ujian'");
                      if($hasil->num_rows() > 0){
                      $data = $hasil->row();
                      ?>
                    <div class="row">
                      <div class="col-md-4">
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="card-footer p-0">
                          <ul class="nav flex-column ">
                            <li class="nav-item bg-navy">
                              <a href="#" class="nav-link">
                                <i class="fad fa-bookmark"></i>
                                <b>INFORMASI</b>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link text-danger">
                                <?php echo $informasi_kelulusan; ?> 
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <?php echo $informasi_lain; ?> 
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>

                        <a class="btn btn-danger btn-block float-right" href="<?php echo base_url() . 'portal'; ?>"><i class="fa fa-undo"> </i> Kembali</a>
                        <!-- /.widget-user -->
                      </div>
                      <div class="col-md-8">
                            <table class="table table-bordered table-hover table-striped dataTable no-footer responsive">
                              <tr>
                                <td>
                                  <b>Nomor Ujian</b>
                                    </td>
                                <td>
                                  <b>
                                    <?php echo $data->no_ujian; ?></b>
                                    </td>
                              </tr>
                              <tr>
                                <td>
                                  <b>Nama Siswa</b>
                                    </td>
                                <td><b>
                                  <?php echo $data->nama_siswa; ?></b>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <b>Jurusan</b>
                                    </td>
                                <td class="text-uppercase"><b>
                                  <?php echo $data->jurusan; ?></b>
                                </td>
                              </tr>
                            </table>
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped dataTable no-footer ">
                              <thead>
                                <tr class="bg-navy text-center">
                                  <th colspan="4">HASIL NILAI UN
                                  </th>
                                </tr>
                                <tr class="bg-info text-center">
                                  <th>Bahasa Indonesia
                                  </th>
                                  <th>Bahasa Inggris
                                  </th>
                                  <th>Matematika
                                  </th>
                                  <th>Kejuruan
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="text-center text-navy">
                                <td class="text-danger">
                                  <b><?php echo $data->nilai_indo; ?></b>
                                </td>
                                <td class="text-danger">
                                  <b><?php echo $data->nilai_eng; ?></b>
                                </td>
                                <td class="text-danger">
                                  <b><?php echo $data->nilai_mtk; ?></b>
                                </td>
                                <td class="text-danger">
                                  <b><?php echo $data->nilai_kejurusan; ?></b>
                                </td>
                              </tbody>
                            </table>
                            </div>
                            <?php
                        if( $data->status === 'LULUS' ){
                        echo '<div class="alert alert-success" role="alert"><strong><center>SELAMAT !<br></strong> Anda dinyatakan <b>LULUS</b>.</center></div><br><br>';
                        } else {
                        echo '<br><div class="alert alert-danger" role="alert"><strong><center>MAAF !</strong><br> Anda dinyatakan TIDAK LULUS.</center></div><br>';
                        } 
                        ?>
                                              <?php
                        } else {
                        echo '<center><div class="col-md-4"><div class="card card-widget widget-user"><div class="widget-user-header bg-info"><h3 class="widget-user-username"><b>MAAF</b></h3><h5 class="widget-user-desc text-navy">
                        </b><b>NOMOR TIDAK TERDAFTAR</b></h5></div><div class="widget-user-image"><img class="img-rounded elevation-2" src="../upload/ggl.png" alt="User Avatar"></div><div class="card-footer"><font size="3" class="text-danger text-uppercase" style="text-shadow: 2px 2px 4px #827e7e">Silakan Cek Ulang Nomor Yang Di Masukan<br></font><div class="row"><a class="btn btn-danger text-white btn-block float-right" onclick="history.back(-1)"><i class="fa fa-undo"> </i> Kembali</a></div></div></div></div></center>';
                        //tampilkan pop-up dan kembali tampilkan form
                        }
                        } else {
                        //tampilkan form input nomor ujian
                        ?>
                      <div class="row">
                      <div class="col-md-4">
                      </div> 
                      <div class="col-md-4">
                        <div class="card card-widget widget-user">
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">
                              <b>DATA INFORMASI KELULUSAN
                              </b>
                            </h3>
                            <h5 class="widget-user-desc">
                              <hr>
                            </h5>
                          </div>
                          <div class="widget-user-image">
                            <img class="img-rounded elevation-2" src="<?php echo base_url(); ?>../upload/user.jpg" alt="User Avatar">
                          </div>
                          <br>
                          <div class="card-footer">
                            <div class="row">
                              <form class="lockscreen-credentials">
                                <div class="input-group">
                                  <input type="text" name="nomor" class="form-control bg-navy text-white btn-lg" data-mask="9-99-99-99-9999-9999-9" placeholder="Nomor Ujian" required>
                                  <div class="input-group-append">
                                    <button type="submit" name="submit" class="btn bg-warning ">
                                      <i class="fas fa-arrow-right text-muted">
                                      </i>
                                    </button>
                                  </div>
                                </div>
                                <font size="1" class="text-navy" style="text-shadow: 2px 2px 4px #827e7e">
                                  <i>*  Silakan Masukan Nomor Peserta Ujian 
                                  </i>
                                </font>
                                <br>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                      </div> 
                    </div>
                      </div>

                    </div>
                    
                    <?php
                      }
                      ?>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <hr>
              <div class="row" >
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-2" >
          </div>
        </div>
        <footer class="main-footer text-center" >
          <?php echo "Copyright © " ."2015 -". (int)date('Y');?> 
          <a href="http://almairastudio.com" target="_blank">
            <b>ASIS
            </b>
          </a>.All rights reserved. Version. 1.1.3
        </footer>
      </div>
      <!-- ./wrapper -->
      <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js">
      </script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js">
      </script>
      <!-- overlayScrollbars -->
      <script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
      </script>
      <!-- Select2 -->
      <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js">
      </script>
      <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js">
      </script>
      <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js">
      </script>
      <!-- DataTables -->
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js">
      </script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js">
      </script>
      <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
      </script>
      <script src="<?php echo base_url(); ?>assets/theme-kelulusan/js/jquery.min.js">
      </script>
      <script src="<?php echo base_url(); ?>assets/theme-kelulusan/js/jquery.countdown.min.js">
      </script>
      <script src="<?php echo base_url(); ?>assets/theme-kelulusan/js/bootstrap.min.js">
      </script>
      <script src="<?php echo base_url(); ?>assets/theme-kelulusan/js/jasny-bootstrap.min.js">
      </script>
      <script type="text/javascript">
        var skrg = Date.now();
        $('#clock').countdown("<?php echo $tanggal_pengumuman; ?>", {
          elapse: true}
                             )
          .on('update.countdown', function(event) {
          var $this = $(this);
          if (event.elapsed) {
            $( "#xpengumuman" ).show();
            $( "#clock" ).hide();
          }
          else {
            $this.html(event.strftime('<center><div class="col-md-4"><div class="card card-widget widget-user"><div class="widget-user-header bg-info"><h3 class="widget-user-username"><b>MAAF PENGUMUMAN KELULUSAN</b></h3><h5 class="widget-user-desc text-navy"><b>BELUM DIBUKA</b></h5></div><div class="widget-user-image"><img class="img-rounded elevation-2" src="<?php echo base_url(); ?>../upload/user.jpg" alt="User Avatar"></div><div class="card-footer"><font size="1" class="text-navy" style="text-shadow: 2px 2px 4px #827e7e">pengumuman akan segera di buka dalam waktu</font><div class="row"><div class="col-sm-4 border-right"><div class="description-block"><h5 class="description-header">%H</h5><span class="description-text">JAM</span></div></div><div class="col-sm-4 border-right"><div class="description-block"><h5 class="description-header">%M</h5><span class="description-text">MENIT</span></div></div><div class="col-sm-4"><div class="description-block"><h5 class="description-header">%S</h5><span class="description-text">DETIK</span></div></div></div></div></div></div></center>'));
            $( "#xpengumuman" ).hide();
          }
        }
             );
      </script>
      <script type="text/javascript">
        <!--
          function showTime() {
          var a_p = "";
          var today = new Date();
          var curr_hour = today.getHours();
          var curr_minute = today.getMinutes();
          var curr_second = today.getSeconds();
          if (curr_hour < 12) {
            a_p = "AM";
          }
          else {
            a_p = "PM";
          }
          if (curr_hour == 0) {
            curr_hour = 12;
          }
          if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
          }
          curr_hour = checkTime(curr_hour);
          curr_minute = checkTime(curr_minute);
          curr_second = checkTime(curr_second);
          document.getElementById('clock2').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }
        function checkTime(i) {
          if (i < 10) {
            i = "0" + i;
          }
          return i;
        }
        setInterval(showTime, 500);
        //-->
      </script>
    </body>
  </html>
