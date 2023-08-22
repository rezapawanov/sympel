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
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="animated fadeInUp col-12">
            <div class="card card-navy card-outline">
              <div class="card-header">
               <form role="form" action="<?php echo base_url(); ?>siswa/proses_tampil_siswa" method="post">
                            <div class="row">
                                <div class="form-group col-3">
                                    <select class="form-control select2 text-navy" name="id_kelas" required>
                                        <?php echo $combo_kelas; ?>
                                    </select>
                                </div>
                                <div class="col-xs-6 ml-3">
                                    <button class="btn bg-navy" name="tampil"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>
                            </div>
                        </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-info bg-navy" style="text-align:center;">
                      <th>No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Kelas</th>
                        <th>Angkatan</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  if(!empty($siswa)) {
                  $no = 1;
                  foreach($siswa->result_array() as $data) { ?>
                    <tr style="text-align:center;">
                      <td class="text-sm" ><?php echo $no; ?></td>
                      <td class="text-sm"><?php echo $data['nis']; ?></td>
                      <td class="text-sm" style="text-align:left;"><?php echo $data['nama_siswa']; ?></td>
                      <td class="text-sm"><?php echo $data['jenis_kelamin']; ?></td>
                      <td class="text-sm"><?php echo date("d-m-Y",strtotime($data['tanggal_lahir'])); ?></td>
                      <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                      <td class="text-sm" style="text-align:center;"><?php echo $data['angkatan']; ?></td>
                      <td style="text-align:center;">
                        <a class="btn bg-navy btn-xs" href="<?php echo base_url().'siswa/siswa_detail/'.$data['nis']; ?>"><i class="fa fa-search"> </i> Detail</a>
                      </td>
                    </tr>
                  <?php $no++; } ?>
                  <?php } else { echo '<tr><td colspan="9">Silahkan Pilih Kelas Terlebih Dahulu</td></tr>'; } ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

