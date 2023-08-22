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
                        <form role="form" action="<?php echo base_url(); ?>jadwal_pelajaran/proses_tampil_jadwal_pelajaran" method="post">
                        <div class="row">
                                <div class="col-xs-8">
                                    <select class="form-control" name="tahun_ajaran" required>
                                        <?php echo $combo_tahun_ajaran; ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <button class="btn btn-primary" name="tampil"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>
                        </form>
                    <div class="col-xs-8 text-right">
                        <a class="btn btn-success" href="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                        <th>No</th>
                        <th>Mapel</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if(!empty($jadwal_pelajaran)) { 
                    $no = 1;
                      foreach($jadwal_pelajaran->result_array() as $data) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_mapel']; ?></td>
                        <td><?php echo $data['nama_guru']; ?></td>
                        <td><?php echo $data['nama_kelas']; ?></td>
                        <td><?php echo $data['tahun_ajaran']; ?></td>
                        <td><?php echo $data['semester']; ?></td>
                        <td style="text-align:center;">
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'jadwal_pelajaran/jadwal_pelajaran_edit/'.$data['id_jadwal_pelajaran']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                      </td>
                    </tr>
				    <?php $no++; } ?>

                    <?php } else { echo '<tr><td colspan="9">Silahkan Pilih Tahun Ajaran & Semester Terlebih Dahulu</td></tr>'; } ?> 
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