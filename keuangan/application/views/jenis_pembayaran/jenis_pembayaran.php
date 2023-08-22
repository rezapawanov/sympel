  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
              <i class="fas fa-hands-usd nav-icon text-info"></i> <?php echo $judul; ?></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/jenis_pembayaran"><?php echo $judul; ?></a></li>
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
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>master/jenis_pembayaran_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Nama POS</th>
                      <th>Tipe</th>
                      <th>Tahun Ajaran</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <?php
                    $no = 1;
                    foreach ($jenis_pembayaran->result_array() as $data) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_pos_keuangan']; ?></td>
                        <td><?php echo $data['tipe_pembayaran']; ?></td>
                        <td><?php echo $data['tahun_ajaran']; ?></td>
                        <td style="text-align:center;"><?php
                                                        if ($data['aktif_jenis_pembayaran'] == '1') {
                                                          echo '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-success btn-icon-split" style="text-shadow: 2px 2px 4px black;">AKTIF</a>';
                                                        } else {
                                                          echo '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-danger btn-icon-split" style="text-shadow: 2px 2px 4px black;"><b>TIDAK AKTIF</b></a>';
                                                        }
                                                        ?>
                        </td>
                        <td style="text-align:center;">
                          <div class="btn-group btn-group-sm">
                            <a class="btn btn-info btn-xs" style="text-shadow: 2px 2px 4px black;" href="<?php echo base_url() . 'master/tarif_pembayaran/' . $data['id_jenis_pembayaran']; ?>"><i class="nav-icon fas fa-money-check-edit-alt"> </i> Terapkan Tarif</a>
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'master/jenis_pembayaran_edit/' . $data['id_jenis_pembayaran']; ?>"><i class="fa fa-edit"> </i> Edit</a>
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