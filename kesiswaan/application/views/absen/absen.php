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
               <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>absen/absen_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Tanggal</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Keterangan</th>
                        <th>Alasan</th>
                        <th>Di Input Oleh</th>
                      <th>Aksi</th>              
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                                $no = 1;
                                foreach ($absen->result_array() as $data) {
                                    if (!empty($data['id_guru'])) {
                                        $get = $this->db->query("SELECT nama_guru FROM mst_guru WHERE id_guru = '$data[id_guru]'")->row();
                                        $diinput = $get->nama_guru;
                                    } else {
                                        $diinput = 'Administrator';
                                     }
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo date("d-m-Y",strtotime($data['tanggal_absen'])); ?></td>
                                        <td><?php echo $data['nama_siswa']; ?></td>
                                        <td><?php echo $data['nama_kelas']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
                                        <td><?php echo $data['alasan']; ?></td>
                                        <td><?php echo $diinput; ?></td>
                                        <td style="text-align:center;width:100px;">
                                            <?php if($this->session->userdata("hak_akses") == 'admin') { ?>
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'absen/absen_hapus/' . $data['id_absen']; ?>" onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> </a>

                                            <?php } else if($this->session->userdata("id") == $data['id_guru']) { ?>
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'absen/absen_hapus/' . $data['id_absen']; ?>" onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> </a>
                                            <?php } ?>
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
  <!-- /.content-wrapper -->