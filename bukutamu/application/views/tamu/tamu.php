  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
              <i class="fal fa-book-reader nav-icon text-info"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/tamu"><?php echo $judul; ?></a></li>
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
              <div class="card-header">
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>tamu/tamu_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th class="text-sm">No</th>
                      <th class="text-sm">Nama</th>
                      <th class="text-sm">Asal / Instansi</th>
                      <th class="text-sm">Alamat</th>
                      <th class="text-sm">Keperluan</th>
                      <th class="text-sm">No.Telp</th>
                      <th class="text-sm">Tanggal</th>
                      <th class="text-sm" style="width: 30px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($tamu->result_array() as $data) { ?>
                      <tr>
                        <td class="text-sm"><?php echo $no; ?></td>
                        <td class="text-sm"><?php echo $data['nama_tamu']; ?></td>
                        <td class="text-sm"><?php echo $data['asal']; ?></td>
                        <td class="text-sm"><?php echo $data['alamat']; ?></td>
                        <td class="text-sm"><?php echo $data['keperluan']; ?></td>
                        <td class="text-sm"><?php echo $data['no_telepon']; ?></td>
                        <td class="text-sm"><?php echo date("d-m-Y H:i", strtotime($data['tanggal'])); ?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'tamu/tamu_edit/' . $data['id_tamu']; ?>"><i class="fa fa-edit"> </i></a>

                          <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'tamu/tamu_hapus/' . $data['id_tamu']; ?>" onclick="return confirm('yakin ingin hapus data ?');"><i class="fa fa-trash"></i></a>
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