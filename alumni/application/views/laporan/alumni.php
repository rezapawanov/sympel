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
            <div class="card card-info card-outline">
              <div class="card-header">
                <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>laporan/alumni_excel" target="_blank"><i class="fas fa-file-excel"> </i> Export Excel</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th width="20px">No</th>
                      <th width="150px">Nama</th>
                      <th width="100px">Jenis Kelamin</th>
                      <th width="100px">No Telepon</th>
                      <th>Aktivitas</th>
                      <th width="50px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($alumni->result_array() as $data) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td><?php echo $data['hp']; ?></td>
                        <td><?php echo '[ ' . $data['aktivitas_1'] . ' ] [ ' . $data['aktivitas_2'] . ' ] [ ' . $data['aktivitas_3'] . ' ] [ ' . $data['aktivitas_4'] . ' ]'; ?></td>
                        <td><a class="btn btn-info btn-xs" href="<?php echo base_url() . 'laporan/alumni_detail/' . $data['id_alumni']; ?>"><i class="fa fa-search"> </i> Detail</a></td>
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