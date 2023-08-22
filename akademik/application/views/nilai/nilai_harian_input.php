  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark"><i class="far fa-book-medical nav-icon text-info"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/dokumen"><?php echo $judul; ?></a></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     
    <!-- Main content -->
    <section class="content animated fadeInUp ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                        <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>nilai/kategori_nilai_harian/<?php echo $id_jadwal_pelajaran; ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
                    </div>
                    <div class="col-xs-9 text-right">
                    <p style="color:red;">Klik Pada Kolom Nilai Untuk Melakukan Penginputan, kemudian tekan <b>"Enter" atau "Tab"</b> untuk menyimpan nilai</p>
                </div>


            <!-- /.box-header -->
            <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Nilai</th>
                        <th>ID</th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if($nilai_siswa->num_rows() > 0 ) { 
                    $no = 1;
					foreach($nilai_siswa->result_array() as $data) { ?>
					<tr id="<?php echo $data['id_nilai_harian_detail']; ?>">
                        <td><?php echo $no; ?></td>
						<td><?php echo $data['nis']; ?></td>
						<td><?php echo $data['nama_siswa']; ?></td>
						<td><?php echo $data['nilai']; ?></td>
            <td><?php echo $data['id_nilai_harian_detail']; ?></td>
                    </tr>
				    <?php  $no++; } ?>

                    <?php } else { echo '<tr><td colspan="6">Data Tidak Ditemukan</td></tr>'; } ?> 
                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
</div>



       

        <script type="text/javascript">
$('#datatb').Tabledit({
    deleteButton: false,
    editButton: false,      
    columns: {
      identifier: [4, 'id_nilai_harian_detail'],                    
      editable: [[3, 'nilai']]
    },
    hideIdentifier: true,
    url: '<?php echo base_url(); ?>nilai/nilai_harian_save',
	onSuccess: function(data) {   
        //window.location.reload();
	}
});
</script>