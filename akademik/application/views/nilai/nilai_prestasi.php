 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	 <!-- Main content -->
   <section class="content animated fadeInUp ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-12">
            <div class="card card-info card-outline">
              <div class="card-header">
              <p>Silahkan Pilih Kelas </p>
            </div>
            <!-- /.box-header -->
            <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if($walikelas->num_rows() > 0) { 
                    $no = 1;
					foreach($walikelas->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['tahun_ajaran']; ?></td>
                        
                      <td style="text-align:center;">
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'nilai/input_nilai_prestasi/'.$data['id_kelas']; ?>"><i class="fa fa-edit"> </i> Kelola Nilai</a>
                      </td>
                    </tr>
				    <?php $no++; } ?>

                    <?php } else { echo '<tr><td colspan="9">Silahkan Input Walikelas Terlebih Dahulu</td></tr>'; } ?> 
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