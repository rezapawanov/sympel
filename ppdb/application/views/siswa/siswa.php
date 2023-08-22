  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
              <i class="fas fa-books nav-icon text-info"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/siswa"><?php echo $judul; ?></a></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.row -->
          <div class="animated fadeInLeft col-md-12">
            <div class="card card-info card-outline">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info bg-navy">
                      <th>No</th>
                      <th>No Pendaftaran</th>
                      <th>Nama</th>
                      <th>Jenis Pendaftaran</th>
                      <th>Tanggal Daftar</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa->result_array() as $data) { ?>
                      <tr class="table-sm">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['no_pendaftaran']; ?></td>
                        <td><?php echo $data['nama_siswa']; ?></td>
                        <td><?php echo $data['jenis_pendaftaran']; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal_daftar'])); ?></td>
                        <td><?php
                            if ($data['status'] == '1') {
                              echo 'Dikonfirmasi';
                            } else if ($data['status'] == '0') {
                              echo 'Menunggu Konfirmasi';
                            } else {
                              echo 'Ditolak';
                            }
                            ?>
                        </td>
                        <td style="text-align:center;">
                            <div class="btn-group btn-group-sm">
                          <a class="btn bg-info btn-sm btn-flat" href="<?php echo base_url() . 'siswa/siswa_detail/' . $data['id_ppdb']; ?>"><i class="fa fa-eye"> </i> Detail </a>
                          <a class="btn bg-navy btn-sm btn-flat" href="<?php echo base_url() . 'portal/download/' . $data['no_pendaftaran']; ?>" target="_blank"><i class="fa fa-download"> </i> Download </a>
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'siswa/hapus_siswa/' . $data['id_ppdb']; ?>"><i class="fa fa-trash"> </i>  </a>
                          </div>
                        </td>
                      </tr>
                    <?php $no++;
                    } ?>
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