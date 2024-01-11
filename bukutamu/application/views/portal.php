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

    <title>SYMPEL | System Informasi Pelajar</title>

  <link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/master/upload/'.$sekolah->logo; ?>" type="image/x-icon">

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
  <script src="<?php echo base_url();  ?>assets/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();  ?>asset/typeahead.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="<?php echo base_url();  ?>assets/dist/js/fullcalendar.js"></script>
  <style>
video {
    max-width: 100%;
    height: auto;
}
</style>
</head>
<body class="hold-transition layout-top-nav sidebar-mini layout-header-fixed ">
<div class="wrapper">

<!-- HOME -->
<div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 mt-2">
                <div class="card card-info card-outline ">
                  <center>
                    <img class="profile-user-img img-fluid img-circle elevation-2 mt-2" style="width: 60px; height: 60px;" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/master/upload/'.$sekolah->logo; ?>"
                       alt="User profile picture "> 
                    <h2 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><?php echo $nama_sekolah; ?></h2>
                    <p><?php echo $alamat; ?></p>
					<button type="button" class="btn bg-gradient-info btn-flat"><?php echo $hari."&nbsp;" ; echo date('d'). "&nbsp;&nbsp;"; echo $bln."&nbsp;" ; echo date('Y'); ?> - <span class="" id="clock"></button>
                	</center>
                  <hr>
                  <div class="container-fluid">
                    <div class="row">
                      <!-- DATA -->
                      <div class="col-md-4 animated fadeInLeft">
                        <div class="card card-info card-outline">
                          <div class="card-header">
                                <i class="card-title text-sm"></i><center><b>INPUT DATA BUKU TAMU</b></center>
                            </div>
                              <div class="card-body">
                                    <?php if ($this->session->flashdata('success')) { ?>
                                  <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Success</h5>
                                    <?php echo $this->session->flashdata('success'); ?>
                                  </div>
                              <?php } ?>
                                  <form action="<?php echo base_url(); ?>portal/tamu_save" method="post">
                                    <input class="form-control" type="text" name="nama_tamu" placeholder="Nama Lengkap ...">
                                    <input class="form-control mt-3" type="text" name="asal"  placeholder="Asal/Instansi ...">
                                    <input class="form-control mt-3" type="text" name="alamat" placeholder="Alamat ...">
                                    <textarea class="form-control mt-3" type="text" name="keperluan" placeholder="Keperluan ..."></textarea>
                                    <input class="form-control mt-3" type="text" name="no_telepon"  placeholder="Nomor Telepon ...">
                                    <button class="btn btn-info btn-block mt-3">Simpan</button>
                                    </form>
                               </div>
                        </div>
                      </div>
                      <!-- VIDEO -->
                      <div class="col-md-4 animated fadeInUp">
                      <div class="card card-outline card-danger">
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <video id="vid" controls autoplay loop >
                                  <source src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/bukutamu/video/video.mp4' ?>" type="video/mp4">
                                </video>
                                <?php
                                // Replace "YOUR_YOUTUBE_VIDEO_ID" with the actual ID of the YouTube video you want to embed
                                $youtubeVideoID = "bDFuqgvW1pQ&list=RDbDFuqgvW1pQ";
                                ?>
                                
                                <iframe width="560" height="315" src="https://www.youtube.com/v/<?php echo $youtubeVideoID; ?>" frameborder="0"
                                  allowfullscreen></iframe>

                              </div>
                            </div>
                          </div>
                        </div>

                          <div class="card card-info mr-2 ml-2">
                            <div class="card-header">
                                    <i class="card-title"></i><center><b>KATA MUTIARA</b></center>
                            </div>
                            <div class="card-body">
                            <center>
                             <h4><?php echo $kata; ?></h4>
                             <span class="text-danger"><i><?php echo $penemu; ?></i></span> 
                            </center>
                            </div>
                        </div>
                      </div>
                     </div>
                     <!-- MENU -->
                      <div class="col-md-4 animated fadeInRight">
                        <div class="card card-info card-outline">
                         <div class="card-header">
                                <i class="card-title"></i><center><b>AGENDA SEKOLAH</b></center>
                            </div>
                          <div class="card-body p-0">
                          <div class="row ml-1 mr-1">
                           <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                            <th style="width: 10px">No.</th>
                            <th>Tanggal</th>
                            <th>Agenda</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach($agenda->result_array() as $data) { ?>
						<tr>
                            <td class="text-sm"><?php echo $no; ?></td>
                            <td class="text-sm text-danger"><?php echo date("d-m-Y",strtotime($data['tanggal_mulai']))." s/d ".date("d-m-Y",strtotime($data['tanggal_selesai'])); ?></td>
                            <td class="text-sm text-info"><?php echo $data['nama_agenda']; ?></td>
                          </tr>
                          <?php $no++; } ?>
                        </tbody>
                      </table>
                          </div>
                        </div>
                        </div>
                      </div>
                        
                    </div>  

                  </div>
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div>
<!-- FOOTER -->
<footer class="main-footer">
  <div class="row">
                              <div class="col-md-2 col-sm-6 col-12">
                                <div class="info-box bg-info">
                                  <span class="info-box-icon"><i class="fas fa-mosque fa-2x"></i></span>

                                  <div class="info-box-content"><center>
                                    <span class="info-box-text">Waktu Sholat</span>
                                    <span class="info-box-number">ZUHUR</span>

                                    <div class="progress">
                                      <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                      <b><?php echo $dzuhur; ?></b>
                                    </span></center>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-2 col-sm-6 col-12 ml-lg-0">
                                <div class="info-box bg-teal">
                                  <span class="info-box-icon"><i class="fas fa-mosque fa-2x"></i></span>

                                  <div class="info-box-content"><center>
                                    <span class="info-box-text">Waktu Sholat</span>
                                    <span class="info-box-number">ASHAR</span>

                                    <div class="progress">
                                      <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                    <b><?php echo $ashar; ?></b>
                                    </span></center>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-2 col-sm-6 col-12">
                                <div class="info-box bg-success">
                                  <span class="info-box-icon"><i class="fas fa-mosque fa-2x"></i></span>

                                  <div class="info-box-content"><center>
                                    <span class="info-box-text">Waktu Sholat</span>
                                    <span class="info-box-number">MAGRIB</span>

                                    <div class="progress">
                                      <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                    <b><?php echo $magrib; ?></b>
                                    </span></center>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-2 col-sm-6 col-12">
                                <div class="info-box bg-danger">
                                  <span class="info-box-icon"><i class="fas fa-mosque fa-2x"></i></span>

                                  <div class="info-box-content"><center>
                                    <span class="info-box-text">Waktu Sholat</span>
                                    <span class="info-box-number">ISY'A</span>

                                    <div class="progress">
                                      <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                    <b><?php echo $isya; ?></b>
                                    </span></center>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-2 col-sm-6 col-12">
                                <div class="info-box bg-indigo">
                                  <span class="info-box-icon"><i class="fas fa-mosque fa-2x"></i></span>

                                  <div class="info-box-content"><center>
                                    <span class="info-box-text">Waktu Sholat</span>
                                    <span class="info-box-number">SUBUH</span>

                                    <div class="progress">
                                      <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                    <b><?php echo $subuh; ?></b>
                                    </span></center>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
                              <div class="col-md-2 col-sm-6 col-12">
                                <div class="info-box bg-blue">
                                  <span class="info-box-icon"><i class="fas fa-mosque fa-2x"></i></span>

                                  <div class="info-box-content"><center>
                                    <span class="info-box-text">Waktu Sholat</span>
                                    <span class="info-box-number">DUHA</span>

                                    <div class="progress">
                                      <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                      <b>09:00</b>
                                    </span></center>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
  </div>
</footer>
</div>
<script src="<?php echo base_url();  ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();  ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url();  ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();  ?>assets/dist/js/adminlte.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();  ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();  ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url();  ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();  ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();  ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- PAGE PLUGINS -->
<!-- bootstrap color picker -->
<script src="<?php echo base_url();  ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();  ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- jQuery Mapael -->
<script src="<?php echo base_url();  ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();  ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();  ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();  ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();  ?>assets/dist/js/pages/dashboard2.js"></script>

<script src="<?php echo base_url();  ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

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
        } else {
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
     document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
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
