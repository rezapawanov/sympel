  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6 mt-2">
                      <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i></i> <?php echo $judul; ?></h1>
                      <font size="2"  class="text-danger"><i>Data Pengumuman Tampil di Halaman Siswa</i></font>
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
                              <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>pengumuman/pengumuman_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-2">
                              <table id="datatb" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr class="text-info">
                                          <th width="20px">No</th>
                                          <th>Judul</th>
                                          <th>Tanggal Publish</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($pengumuman->result_array() as $data) { ?>
                                          <tr>
                                              <td><?php echo $no; ?></td>
                                              <td><?php echo $data['judul']; ?></td>
                                              <td><?php echo date("d-m-Y H:i", strtotime($data['tanggal'])); ?></td>
                                              <td style="text-align:center;width:80px;">
                                                  <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'pengumuman/pengumuman_edit/' . $data['id_pengumuman']; ?>"><i class="fa fa-edit"> </i> </a> |

                                                  <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'pengumuman/pengumuman_hapus/' . $data['id_pengumuman']; ?>" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> </a>
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


  <?php if ($this->session->flashdata('success')) {
        echo '<script>
                    toastr.options.timeOut = 2000;
                    toastr.success("' . $this->session->flashdata('success') . '");
                    </script>';
    } ?>

  <?php if ($this->session->flashdata('error')) {
        echo '<script>
       toastr.options.timeOut = 2000;
       toastr.error("' . $this->session->flashdata('error') . '");
       </script>';
    } ?>