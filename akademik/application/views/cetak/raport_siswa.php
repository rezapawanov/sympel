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
   
                <div class="row">
                     <div class="col-xs-3">
                        <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>cetak/raport"><i class="fa fa-arrow-left"> </i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if($raport_siswa->num_rows() > 0 ) { 
                    $no = 1;
					foreach($raport_siswa->result_array() as $data) { ?>
					          <tr>
                        <td><?php echo $no; ?></td>
						            <td><?php echo $data['nis']; ?></td>
						            <td><?php echo $data['nama_siswa']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td style="text-align:center;">
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/cover'; ?>"><i class="fa fa-print"> </i> Cetak Cover</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal1'; ?>"><i class="fa fa-print"> </i> Cetak Hal 1</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal2'; ?>"><i class="fa fa-print"> </i> Cetak Hal 2</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal3'; ?>"><i class="fa fa-print"> </i> Cetak Hal 3</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal4'; ?>"><i class="fa fa-print"> </i> Cetak Hal 4</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal5'; ?>"><i class="fa fa-print"> </i> Cetak Hal 5</a>
                          <a target="_blank" class="btn btn-danger btn-xs" href="<?php echo base_url().'cetak/raport_print/'.$data['id_nilai_raport'].'/hal6'; ?>"><i class="fa fa-print"> </i> Cetak Hal 6</a>
                        </td>
                    </tr>
				    <?php  $no++; } ?>

                    <?php } else { echo '<tr><td colspan="9">Data Tidak Ditemukan</td></tr>'; } ?> 
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

