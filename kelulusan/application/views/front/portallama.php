<?php
$timestamp = strtotime($tanggal_pengumuman);
//echo $timestamp;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="aplikasi sederhana untuk menampilkan pengumuman hasil ujian nasional secara online">
    <meta name="author" content="slamet.bsan@gmail.com">
    <title>Pengumuman Kelulusan</title>
    <link href="<?php echo base_url(); ?>assets/theme-kelulusan/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/theme-kelulusan/css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/theme-kelulusan/css/kelulusan.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url(); ?>portal">INFO KELULUSAN <?php echo $nama_sekolah; ?></a>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <h2>Pengumuman Kelulusan <?php echo $tahun; ?></h2>
		<!-- countdown -->
		
		<div id="clock" class="lead" style="font-weight:bold;color:red;"></div>
		
		<div id="xpengumuman">
		<?php
		if(isset($_REQUEST['submit'])){
			//tampilkan hasil queri jika ada
			$no_ujian = $_REQUEST['nomor'];
			$hasil = $this->db->query("SELECT * FROM kelulusan_siswa WHERE no_ujian = '$no_ujian'");
			if($hasil->num_rows() > 0){
				$data = $hasil->row();
				
		?>
			<table class="table table-bordered">
				<tr><td>Nomor Ujian</td><td><?php echo $data->no_ujian; ?></td></tr>
				<tr><td>Nama Siswa</td><td><?php echo $data->nama_siswa; ?></td></tr>
			</table>
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>Bahasa Indonesia</th>
					<th>Bahasa Inggris</th>
					<th>Matematika</th>
					<th>Kejuruan</th>
				</tr>
				</thead>
				<tbody>
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
				echo '<div class="alert alert-danger" role="alert"><strong>MAAF !</strong> Anda dinyatakan TIDAK LULUS.</div>';
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
        <p>Masukkan nomor ujianmu pada form yang disediakan.</p>
        
        <form method="post">
            <div class="input-group">
                <input type="text" name="nomor" class="form-control" data-mask="9-99-99-99-9999-9999-9" placeholder="Nomor Ujian" required>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="submit">Periksa!</button>
                </span>
            </div>
        </form>
		<?php
		}
		?>
		</div>
    </div><!-- /.container -->
	
	<footer class="footer">
		<div class="container">
			<p class="text-muted">&copy; <?php echo $nama_sekolah; ?></p>
		</div>
	</footer>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
		$this.html(event.strftime('Pengumuman dapat dilihat: <span>%H Jam %M Menit %S Detik</span> lagi'));
		$( "#xpengumuman" ).hide();
	}
	});

	</script>
</body>
</html>