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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>ASIS | Aplikasi Sistem Sekolah</title>

  <link rel="shortcut icon" href="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/assets/logoasis.png'; ?>" type="image/x-icon">

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
<body class="hold-transition layout-top-nav sidebar-mini layout-header-fixed layout-footer-fixed">
<div class="wrapper">

<!-- HOME -->
<div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 mt-2">
                <div class="card card-info card-outline ">
                  <center>
                    <img class="profile-user-img img-fluid img-circle elevation-2 mt-2" style="width: 60px; height: 60px;" src="<?php echo base_url(); ?>../upload/logo.png"
                       alt="User profile picture "> 
                    <h2 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><?php echo $nama_sekolah; ?></h2>
                   
					<button type="button" class="btn bg-gradient-info btn-flat"><?php echo $hari."&nbsp;" ; echo date('d'). "&nbsp;&nbsp;"; echo $bln."&nbsp;" ; echo date('Y'); ?> - <span class="" id="clock2"></button>
                	</center>
                  <hr>
                  <div class="container-fluid">
                    <div class="row">
                      <!-- DATA -->
                      <div class="col-md-2 animated fadeInLeft">
                      </div>
                      <div class="col-md-8 animated fadeInUp " >
                        <div class="card card-info card-outline">
                          <div class="card-header" >
                                <i class="card-title text-sm "></i><center><b><h4 class="text-uppercase">Pengumuman Kelulusan Tahun <?php echo $tahun; ?></h4></b></center>
                            </div>
                            	<div id="clock" class="lead" style="font-weight:bold;color:red;"></div>

                              <div class="card-body" id="xpengumuman">
									<?php
									if(isset($_REQUEST['submit'])){
										//tampilkan hasil queri jika ada
										$no_ujian = $_REQUEST['nomor'];
										$hasil = $this->db->query("SELECT * FROM kelulusan_siswa WHERE no_ujian = '$no_ujian'");
										if($hasil->num_rows() > 0){
											$data = $hasil->row();
											
									?>
										<table class="table table-bordered table-hover table-striped dataTable no-footer">
											<tr><td><b>Nomor Ujian</td><td><?php echo $data->no_ujian; ?></td></tr>
											<tr><td><b>Nama Siswa</td><td><?php echo $data->nama_siswa; ?></td></tr>
										</table>
										<table class="table table-bordered table-hover table-striped dataTable no-footer">
											<thead>
											<tr class="bg-navy text-center">
												<th colspan="4">HASIL NILAI UN</th>
											</tr>
											<tr class="bg-info text-center">
												<th>Bahasa Indonesia</th>
												<th>Bahasa Inggris</th>
												<th>Matematika</th>
												<th>Kejuruan</th>
											</tr>
											</thead>
											<tbody class="text-center text-navy">
												<td><?php echo $data->nilai_indo; ?></td>
												<td><?php echo $data->nilai_eng; ?></td>
												<td><?php echo $data->nilai_mtk; ?></td>
												<td><?php echo $data->nilai_kejurusan; ?></td>
											</tbody>
										</table>
										
										<?php
										if( $data->status === 'LULUS' ){
											echo '<div class="alert alert-success" role="alert"><strong>SELAMAT !</strong> Anda dinyatakan LULUS.</div>';
										} else {
											echo '<br><div class="alert alert-danger" role="alert"><strong><center>MAAF !</strong><br> Anda dinyatakan TIDAK LULUS.</center></div>';
										}	
										?>
										
									<?php
										} else {
											echo 'nomor ujian yang anda inputkan tidak ditemukan! periksa kembali nomor ujian anda.';
											//tampilkan pop-up dan kembali tampilkan form
										}
									} else {
										//tampilkan form input nomor ujian
									?>
								<div class="lockscreen-wrapper">
									<!-- START LOCK SCREEN ITEM -->
									  <div class="lockscreen-item">
									    <!-- lockscreen image -->
									    <div class="lockscreen-image">
									      <img class="profile-user-img  elevation-2" src="<?php echo base_url(); ?>../kelulusan/upload/avatar5.png" alt="User Image">
									    </div>
									    <form class="lockscreen-credentials">
									      <div class="input-group">
									        <input type="text" name="nomor" class="form-control bg-navy text-white" data-mask="9-99-99-99-9999-9999-9" placeholder="Nomor Ujian" required>
									        <div class="input-group-append">
									          <button type="submit" name="submit" class="btn bg-warning "><i class="fas fa-arrow-right text-muted"></i></button>
									        </div>
									      </div>
									    </form>
									    <!-- /.lockscreen credentials -->

									  </div>
									  <!-- /.lockscreen-item -->
									  <div class="help-block text-center">
									    SILAKAN MASUKAN NOMOR PESERTA UJIAN
									  </div>
									</div>
									<?php
									}
									?>
                               </div>
                        </div>
                      </div>
                      <div class="col-md-2 animated fadeInLeft">
                      </div>	                        
                    </div>  

                  </div>
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div>
<!-- FOOTER -->
 <footer class="main-footer">
    <?php echo "Copyright © " ."2015 -". (int)date('Y');?> <a href="http://almairastudio.com" target="_blank"><b>ASIS</b></a>.All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme-kelulusan/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme-kelulusan/js/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme-kelulusan/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/theme-kelulusan/js/jasny-bootstrap.min.js"></script>

<script type="text/javascript">
	var skrg = Date.now();
	$('#clock').countdown("<?php echo $tanggal_pengumuman; ?>", {elapse: true})
	.on('update.countdown', function(event) {
	var $this = $(this);
	if (event.elapsed) {
		$( "#xpengumuman" ).show();
		$( "#clock" ).hide();
	} else {
		$this.html(event.strftime('<center>Pengumuman dapat dilihat: <span>%H Jam %M Menit %S Detik</span> lagi</center>'));
		$( "#xpengumuman" ).hide();
	}
	});

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
