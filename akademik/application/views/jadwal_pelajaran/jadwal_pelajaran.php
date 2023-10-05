<style>
  .nav-item button.nav-link.active{
    background-color: #4287f5;
    color: white;
    font-weight: 600;
  }
  tr.text-info{
    border-top: 5px solid white;
  }
</style>

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
                        <?php if($hak_akses !== 'siswa'):?>
                        <a class="btn btn-success" href="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
                        <?php endif ?>
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
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Akhir</th>
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
                        <td><?php echo $data['hari']; ?></td>
                        <td><?php echo $data['start_time']; ?></td>
                        <td><?php echo $data['end_time']; ?></td>
                        <td style="text-align:center;">
                        <?php if($this->session->userdata('hak_akses') == 'admin') :?>
                          <a class="btn btn-danger btn-xs" href="<?php echo base_url().'jadwal_pelajaran/jadwal_pelajaran_edit/'.$data['id_jadwal_pelajaran']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                        <?php endif ?>
                      </td>
                    </tr>
				    <?php $no++; } ?>

                    <?php } else { echo '<tr><td colspan="9">Silahkan Pilih Tahun Ajaran & Semester Terlebih Dahulu</td></tr>'; } ?> 
                </tbody>
              </table>




              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="senin-tab" data-toggle="tab" data-target="#senin" type="button" role="tab" aria-controls="senin" aria-selected="true">senin</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="selasa-tab" data-toggle="tab" data-target="#selasa" type="button" role="tab" aria-controls="selasa" aria-selected="false">selasa</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="rabu-tab" data-toggle="tab" data-target="#rabu" type="button" role="tab" aria-controls="rabu" aria-selected="false">rabu</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="kamis-tab" data-toggle="tab" data-target="#kamis" type="button" role="tab" aria-controls="kamis" aria-selected="false">kamis</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="jumat-tab" data-toggle="tab" data-target="#jumat" type="button" role="tab" aria-controls="jumat" aria-selected="false">jumat</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="senin" role="tabpanel" aria-labelledby="senin-tab">
                  <table id="seninTable" class="table table-hover table-striped mt-3">
                    <thead>
                      <tr class="text-info">
                          <th>No</th>
                          <th>Mapel</th>
                          <th>Guru</th>
                          <th>Kelas</th>
                          <th>Tahun Ajaran</th>
                          <th>Semester</th>
                          <th>Hari</th>
                          <th>Jam Mulai</th>
                          <th>Jam Akhir</th>
                          <th></th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="tab-pane fade" id="selasa" role="tabpanel" aria-labelledby="selasa-tab">...</div>
                <div class="tab-pane fade" id="rabu" role="tabpanel" aria-labelledby="rabu-tab">...</div>
                <div class="tab-pane fade" id="kamis" role="tabpanel" aria-labelledby="kamis-tab">...</div>
                <div class="tab-pane fade" id="jumat" role="tabpanel" aria-labelledby="jumat-tab">...</div>
              </div>

            </div>
            <!-- /.box-body -->

      

          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
</div>