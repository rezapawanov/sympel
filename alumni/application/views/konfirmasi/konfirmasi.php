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
            <div class="card card-purple card-outline">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-purple bg-purple">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                                $no = 1;
                                foreach ($alumin->result_array() as $data) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo date("d-m-Y H:i", strtotime($data['tanggal_daftar'])); ?></td>

                                        <td class="text-center">
                                            <?php if ($data['status_aktif'] == 0) { ?>
                                              <div class="btn-group btn-group-sm">
                                                <a class="btn bg-purple btn-sm " href="<?php echo base_url() . 'konfirmasi/save_terima/' . $data['id_alumni']; ?>" onclick="return confirm('Yakin ingin konfirmasi terima ?');"><i class="fa fa-thumbs-up"> </i> Terima </a>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'konfirmasi/save_tolak/' . $data['id_alumni']; ?>" onclick="return confirm('Yakin ingin konfirmasi terima ?');"><i class="fa fa-thumbs-down"> </i> Tolak</a>
                                              </div>

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