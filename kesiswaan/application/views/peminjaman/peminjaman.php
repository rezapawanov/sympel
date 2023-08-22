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
               <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>peminjaman/peminjaman_siswa_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Keterangan Pinjam</th>
                      <th>Tanggal Pinjam</th>
                      <th>Dinput Oleh</th>
                      <th>Aksi</th>              
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach($peminjaman->result_array() as $data) {
                    if(!empty($data['id_penginput'])) { 
                      $get = $this->db->query("SELECT nama_guru FROM mst_guru WHERE id_guru = '$data[id_penginput]'");
                      if($get->num_rows() > 0) {
                        $d_get = $get->row();
                        $nama_penginput = $d_get->nama_guru;
                      } else {
                        $nama_penginput = 'Administrator';
                      }
                    } else {
                      $nama_penginput = '';
                    }
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_siswa']; ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['keterangan_pinjam']; ?></td>
                      <td><?php echo date("d-m-Y",strtotime($data['tanggal_pinjam'])); ?></td>
                      <td><?php echo $nama_penginput; ?></td>
                      <td style="text-align:center;">
                        <a class="btn btn-info btn-xs" href="<?php echo base_url().'peminjaman/peminjaman_siswa_edit/'.$data['id_peminjaman_siswa']; ?>"><i class="fa fa-edit"> </i> Ubah </a>

                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'peminjaman/peminjaman_siswa_hapus/'.$data['id_peminjaman_siswa']; ?>"><i class="fa fa-trash"> </i> Hapus </a>
                      </td>
                    </tr>
                  <?php $no++; } ?>
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