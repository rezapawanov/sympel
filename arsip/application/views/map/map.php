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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/map"><?php echo $judul; ?></a></li>
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
          <div class="animated fadeInLeft col-md-8">
            <div class="card card-info card-outline">
              <div class="card-header">
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>master/map_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Map Penyimpanan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($map->result_array() as $data) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_map']; ?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'master/map_edit/' . $data['id_map']; ?>"><i class="fa fa-edit"> </i> Edit </a>
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


          <div class="animated fadeInRight col-md-4">
            <div class="callout callout-info">
              <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
              <ol>
                <li>
                  Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs btn-info"><span class="fa fa-plus"></span> Tambah </button>
                  untuk menambahkan <b><?php echo $judul; ?></b>.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs btn-danger"><span class="fa fa-edit"></span> Edit </button>
                  untuk Merubah <b><?php echo $judul; ?></b>.
                </li>
              </ol>
              <p>
                Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
              </p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-info">
    <div class="modal-dialog">
      <div class="modal-content bg-info">
        <div class="modal-header">
          <h4 class="modal-title">Info Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-light">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

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