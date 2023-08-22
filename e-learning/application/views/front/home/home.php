<?php
$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
$pengaturan = $this->db->query("SELECT * FROM ppdb_pengaturan WHERE id = 1")->row();
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
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ASIS | Aplikasi Sistem Sekolah </title>

  <link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/master/upload/'.$sekolah->logo; ?>" type="image/x-icon">

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

    .img {
      
      height: 80px;
      width: 90px;
      position: absolute;
    }

  </style>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">	
  <!-- /.navbar -->
	<div class="row">
          <div class="col-md-12">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><b>PERPUSTAKAAN</b></h3>
                <h6 class="widget-user-desc"><b><?php echo $nama_sekolah; ?></b></h6>
              </div>
              <div class="widget-user-image">
                <img class="img-rounded elevation-2" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/master/upload/'.$sekolah->logo; ?>" alt="User Avatar">
              </div>

              <div class="divTable">
<div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell">&nbsp;</div>
</div>
<div class="divTableRow">
<div class="divTableCell">&nbsp;</div>
</div>
</div>
</div>
              
    


  <div class="card">
    <div id="carouselExampleIndicatorsx" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo base_url() . 'upload/banner.png' ?>">
        </div>
      </div>
  <!-- /.card-body -->
</div>






              <div class="card-footer">
                <div class="row">
                  <div class="col-md-8">
			            <div class="card card-navy">
			              <div class="card-header">
			                <h3 class="card-title"><i class="fad fa-books-medical nav-icon text-white"></i> Katalog Buku Perpustakaan</h3>

			                <div class="card-tools">
			                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
			                  </button>
			                </div>
			                <!-- /.card-tools -->
			              </div>
			              <!-- /.card-header -->
			              <div class="card-body">
			              	<div class="card-body table-responsive p-2">
			                <table id="datatb" class="table table-bordered table-hover table-striped">
									<thead>
										<tr class="bg-navy text-sm">
											<th>No</th>
											<th>Kode Buku</th>
											<th>Judul Buku</th>
											<th>Pengarang</th>
											<th>Stok</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($buku->result_array() as $data) {
											$stok = $this->db->query("SELECT COALESCE(SUM(jumlah),0) as hitung FROM peminjaman_buku_dt WHERE id_buku = '$data[id_buku]' AND status_pinjam_dt = '0'")->row();
											?>
											<tr>
												<td class="text-center"><?php echo $no; ?></td>
												<td><?php echo $data['kode_buku']; ?></td>
												<td><?php echo $data['judul_buku']; ?></td>
												<td><?php echo $data['pengarang']; ?></td>
												<td><?php echo $data['jumlah_buku'] - $stok->hitung; ?></td>
												<td style="text-align:center;">
													<a class="btn bg-navy btn-xs detail-buku" href="#" data-toggle="modal" data-target="#modalView" data-id_buku="<?php echo $data['id_buku']; ?>"><i class="fa fa-search"> </i> Detail</a>
												</td>
											</tr>
										<?php $no++;
										} ?>
									</tbody>
								</table>
							</div>
			              </div>
			              <!-- /.card-body -->
			            </div>
			            <!-- /.card -->
			          </div>
                  <!-- /.col -->






                  <div class="col-md-4">
			            <div class="card card-danger">
			              <div class="card-header">
			                <h3 class="card-title"> <i class="fas fa-book-user"></i> Form Kunjungan</h3>

			                <div class="card-tools">
			                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
			                  </button>
			                </div>
			                <!-- /.card-tools -->
			              </div>
			              <!-- /.card-header -->
			              <div class="card-body">
			                <form action="<?php echo base_url(); ?>app/save_pengunjung" method="post">
								<input type="hidden" class="id_kelas" name="id_kelas">
								<div class="input-group mb-3">
									<input type="text" class="form-control nis" autofocus="" name="nis" placeholder="NIS Siswa" required>
				                  <div class="input-group-prepend">
				                    <a class="btn btn-danger cari-siswa" href="#"><i class="fa fa-search"> </i> </a>
				                  </div>
				                </div>
								<div class="form-group">
									<input class="form-control nama_siswa" type="text" name="nama_siswa" placeholder="Nama " disabled>
								</div>
								<div class="form-group">
									<input class="form-control nama_kelas" type="text" name="nama_kelas" placeholder="Kelas" disabled>
								</div>
								<div class="form-group">
									<select class="form-control" name="keperluan" required>
										<option value>Pilih Keperluan</option>
										<option value="Baca Buku">Baca Buku</option>
										<option value="Baca & Pinjam Buku">Baca & Pinjam Buku</option>
										<option value="Kembali Buku">Kembali Buku</option>
										<option value="Pinjam Buku">Pinjam Puku</option>
									</select>
								</div>

								<div class="form-group text-center">
									<button class="btn btn-danger" style="width:100%;"> <i class="fa fa-save"> </i> Simpan</button>
								</div>
							</form>
			              </div>
			              <!-- /.card-body -->
			            </div>

			            <div class="col-md-12">
				            <div class="card">
				              <div class="card-header bg-info">
				                <h3 class="card-title"><i class="fad fa-book-spells nav-icon text-white"></i> Daftar Buku</h3>
				              </div>
				              <!-- /.card-header -->
				              <div class="card-body">
				                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				                  <ol class="carousel-indicators">
				                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
				                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
				                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				                  </ol>
				                  <div class="carousel-inner">
				                    <div class="carousel-item">
				                      <img class="d-block w-100" src="https://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">
				                    </div>
				                    <div class="carousel-item active">
				                      <img class="d-block w-100" src="https://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">
				                    </div>
				                    <div class="carousel-item">
				                      <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">
				                    </div>
				                  </div>
				                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				                    <span class="sr-only">Previous</span>
				                  </a>
				                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				                    <span class="sr-only">Next</span>
				                  </a>
				                </div>
				              </div>
				              <!-- /.card-body -->
				            </div>
				            </div>
				            </div>







                    <div class="col-md-8">
			            <div class="card card-navy">
			              <div class="card-header">
			                <h3 class="card-title"><i class="fad fa-books-medical nav-icon text-white"></i> Katalog Buku Perpustakaan</h3>

			                <div class="card-tools">
			                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
			                  </button>
			                </div>
			                <!-- /.card-tools -->
			              </div>
			              <!-- /.card-header -->
			              <div class="card-body">
			              	<div class="card-body table-responsive p-2">
			                <table id="datatbc" class="table table-bordered table-hover table-striped">
									<thead>
										<tr class="bg-navy text-sm">
											<th colspan='1'>Daftar Buku</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>

										</tr>
									</thead>
									<tbody>
                  <tr>
                    <?php
                    $kolom = 5;
                                $no = 5;
                                foreach ($book->result_array() as $data ) {
                              
                                    ?>
<?php

if ($no >= $kolom) {
        echo "<tr></tr>";
        $no =0;
    }
    $no++;
?>
                                    <td>
                                    <?php echo '<a href="'.base_url().'/upload/book/'.$data['file_buku'].'" target="_blank"><img style="width:80px;height:120px;border:1px solid #ccc;" src="'.base_url().'/upload/book/'.$data['foto_buku'].'"></a>

'?>
<p>

<?php echo $data['judul_buku']; ?>
<br>
<?php echo $data['deskripsi_buku']; ?>
<br>
<a href="<?php echo $data['url_buku']; ?>">Baca Buku</a>


                                 </td> 
                                
                              
                                <?php
                                } ?>
                                  </tr>
									</tbody>
								</table>
							</div>
			              </div>
			              <!-- /.card-body -->
			            </div>
			            <!-- /.card -->
			          </div>
                  <!-- /.col -->

				            <!-- /.card -->
				          </div>
			            <!-- /.card -->
			          </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
          </div>
        </div>
	

  <!-- Main Footer -->
  <footer class="main-footer text-center" >
        <?php echo "Copyright © " ."2015 -". (int)date('Y');?> 
        <a href="http://asis.my.id" target="_blank">
          <b>ASIS
          </b>
        </a>.All rights reserved. Version. 1.5
      </footer>
</div>
<!-- ./wrapper -->
<div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-teal">
              <h4 class="modal-title"><i class="nav-icon fad fa-books-medical text-white"></i> Detail Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="tempat_buku"></div>
            </div>
          </div>
    </div>
</div>
<!-- REQUIRED SCRIPTS -->

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

    <script>
	$(".cari-siswa").click(function() {
		var nis = $(".nis").val();
		$.getJSON("<?php echo base_url(); ?>app/ajax_siswa", {
			nis: nis
		}, function(data) {
			if (data[0].status == 'ok') {
				$(".nama_siswa").val(data[0].nama_siswa);
				$(".nama_kelas").val(data[0].nama_kelas);
				$(".id_kelas").val(data[0].id_kelas);
			} else {
				alert('Data Siswa Tidak Ditemukan');
				$(".nama_siswa").val("");
				$(".nama_kelas").val("");
				$(".id_kelas").val("");
			}

		});
	});
</script>

<script>
	$(".detail-buku").click(function() {
		var id_buku = $(this).attr("data-id_buku");
		$.get("<?php echo base_url(); ?>master/ajax_detail_buku", {
			id_buku: id_buku
		}, function(data) {
			$(".tempat_buku").html(data);
		});
	});
</script>

<script>
	$(".detail-book").click(function() {
		var id_buku = $(this).attr("data-id_buku");
		$.get("<?php echo base_url(); ?>master/ajax_detail_book", {
			id_buku: id_buku
		}, function(data) {
			$(".tempat_book").html(data);
		});
	});
</script>


<script>
	$(document).ready(function() {
		var barcode = "";
		$(document).keydown(function(e) {

			var code = (e.keyCode ? e.keyCode : e.which);
			if (code == 13) // Enter key hit
			{
				var nis = $(".nis").val();
				$.getJSON("<?php echo base_url(); ?>app/ajax_siswa", {
					nis: nis
				}, function(data) {
					if (data[0].status == 'ok') {
						$(".nama_siswa").val(data[0].nama_siswa);
						$(".nama_kelas").val(data[0].nama_kelas);
						$(".id_kelas").val(data[0].id_kelas);
					} else {
						alert('Data Siswa Tidak Ditemukan');
						$(".nama_siswa").val("");
						$(".nama_kelas").val("");
						$(".id_kelas").val("");
						$(".nis").val("");
						$(".nis").focus();
					}

				});
			} else if (code == 9) // Tab key hit
			{
				var nis = $(".nis").val();
				$.getJSON("<?php echo base_url(); ?>app/ajax_siswa", {
					nis: nis
				}, function(data) {
					if (data[0].status == 'ok') {
						$(".nama_siswa").val(data[0].nama_siswa);
						$(".nama_kelas").val(data[0].nama_kelas);
						$(".id_kelas").val(data[0].id_kelas);
					} else {
						alert('Data Siswa Tidak Ditemukan');
						$(".nama_siswa").val("");
						$(".nama_kelas").val("");
						$(".id_kelas").val("");
						$(".nis").val("");
						$(".nis").focus();
					}

				});
			} else {
				barcode = barcode + String.fromCharCode(code);
			}
		});

	});
</script>

<script type="text/javascript">
        $(document).ready(function(){
          $('input[id="rupiah"').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0}).each;
        });
  </script>

  <script type="text/javascript">
    $('#jam1').datetimepicker({
        format: 'HH:mm'
    });
    $('#jam2').datetimepicker({
        format: 'HH:mm'
    });
  </script>


  <script type="text/javascript">
    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
  </script>



<script>
  $(function () {
    $('#datatb').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });

    $('#datatb2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
       "iDisplayLength": 10
    });
  });


  $(function () {
    $('#datatbc').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });

    $('#datatbc2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
       "iDisplayLength": 10
    });
  });
</script>





  <script type="text/javascript">
    $('#tgl').datetimepicker({ 
      format :"YYYY-MM-DD"
    }); 
    $('#tgl2').datetimepicker({ 
      format :"YYYY-MM-DD"
    }); 
    $('#time').datetimepicker({
    format: 'H:mm'
    }).on('dp.show', function () {
        $('a.btn[data-action="incrementMinutes"], a.btn[data-action="decrementMinutes"]').removeAttr('data-action').attr('disabled', true);
        $('span.timepicker-minute[data-action="showMinutes"]').removeAttr('data-action').attr('disabled', true).text('00');
    }).on('dp.change', function () {
        $(this).val($(this).val().split(':')[0]+':00')
        $('span.timepicker-minute').text('00')
    });
  </script>

  

    <script type="text/javascript">
        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
        }
      </script>


       <script type="text/javascript">
        $(document).ready(function(){
            $("#jenis_bayar").change(function(){
              var id_paket = $("#id_paket").val();
              var jenis_bayar = $("#jenis_bayar").val();
              if(jenis_bayar == "Lunas") {
                $("#total_bayar").attr("readonly","readonly");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url(); ?>web/get_harga",
                  data: "id_paket="+id_paket,
                  cache: false,
                  success: function(msg){
                    $("#total_bayar").val(msg);
                  }
                });
              } else {
                $("#total_bayar").val("");
                $("#total_bayar").removeAttr("readonly");
              }

            });

            $(".pesan_home").on('click', function(){
                $("#id_paket").val($(this).attr('data-id_paket'));
            });
        });
    </script>
</body>
</html>
