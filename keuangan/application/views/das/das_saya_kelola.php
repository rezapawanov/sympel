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
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> DAS</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>das"><?php echo $judul; ?></a></li>
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
          <div class="animated lightSpeedIn col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <div class="btn-group btn-group-sm">
                  <a class="btn bg-red btn-sm" href="<?php echo base_url(); ?>das/das_saya"><i class="fa fa-arrow-left"> </i> Kembali</a>
                  <?php if ($status == 0 && $status_das_user == 0) { ?>
                    <a class="btn bg-navy btn-sm" href="#" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"> </i> Tambah Data</a>
                  <?php } else { ?>
                    <br>
                    <span class="btn btn-xs btn-flat bg-warning"><i class="far fa-engine-warning"></i> Dana Anggaran Sudah Di Tutup Admin</span>
                  <?php } ?>
                </div>
                <div class="btn-group btn-group-sm float-right">
                  <a class="btn btn-info btn-sm pull-right" href="<?php echo base_url() . 'das/das_saya_kelola_excel/' . $id_das_user; ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                  <a style="margin-right:5px" class="btn bg-success btn-sm pull-right" href="<?php echo base_url() . 'das/das_saya_kelola_cetak/' . $id_das_user; ?>" target="_blank"><i class="fa fa-print"> </i> Cetak Di Web</a>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table class="table">
                  <thead>
                    <tr class="text-info text-sm bg-navy">
                      <th>Jenis Dana</th>
                      <th>Kode Anggaran</th>
                      <th>Keterangan</th>
                      <th>Total Dana</th>
                      <th>Sisa Saldo</th>
                    </tr>
                  </thead>
                  <tbody class="text-sm bg-maroon">
                    <tr>
                      <td><?php echo $jenis_dana . ' - ' . $tahun_ajaran; ?></td>
                      <td><?php echo $no_das; ?></td>
                      <td><?php echo $keterangan; ?></td>
                      <td>Rp. <?php echo number_format($total_terima); ?></td>
                      <td>Rp. <?php echo number_format($sisa_saldo); ?></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-sm bg-navy">
                      <th>No</th>
                      <th>Jenis Dana</th>
                      <th>Keterangan</th>
                      <th>Jumlah Pengeluaran</th>
                      <th>Nota</th>
                      <th>BKP</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($das_saya_kelola->result_array() as $data) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['jenis_das']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td>Rp. <?php echo number_format($data['jumlah']); ?></td>
                        <td><?php if ($data['ada_nota'] == '1') echo '<span class="btn btn-xs btn-flat bg-success">Ada</span>';
                            else echo '<span class="btn btn-xs btn-flat bg-red">Tidak Ada</span>'; ?></td>
                        <td><?php if ($data['ada_bku'] == '1') echo '<span class="btn btn-xs btn-flat bg-success">Ada</span>';
                            else echo '<span class="btn btn-xs btn-flat bg-red">Tidak Ada</span>'; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                        <td>
                          <?php if ($status == 0 && $status_das_user == 0) { ?>
                            <a class="btn btn-danger btn-flat btn-xs" href="<?php echo base_url() . 'das/das_user_kelola_hapus2/' . $data['id_das_user_output'] . '/' . $data['id_das_user']; ?>"><i class="fas fa-trash-alt"> Hapus</i></a>
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

  <div class="modal fade" id="modalAdd">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Penggunaan RABS</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="info"></div>
          <form role="form" action="<?php echo base_url(); ?>das/das_saya_kelola_save" method="post">
            <input class="id_das_user" type="hidden" name="id_das_user" value="<?php echo $id_das_user; ?>" readonly>

            <div class="form-group">
              <label>Jenis Dana</label>
              <select class="select2 form-control jenis_das" name="jenis_das" required>
                <option value>Jenis Dana</option>
                <option value="DAS">DAS</option>
                <option value="DAK">DAK</option>
              </select>
            </div>

            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control keterangan" name="keterangan" required></textarea>
            </div>

            <div class="form-group">
              <label>Jumlah (Rp)</label>
              <input type="text" class="form-control rupiah "  name="jumlah" required>
            </div>

            <div class="form-group">
              <label>Tanggal</label>
              <input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
            </div>

            <div class="input-group input-group">
              <span class="btn btn-flat bg-navy">
                <input type="checkbox" value="1" name="ada_nota">
              </span>
              <span class="input-group-append">
                <button type="button" class="btn bg-maroon btn-flat">Ada Nota</button>
              </span>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <span class="btn btn-flat bg-navy">
                <input type="checkbox" value="1" name="ada_bku">
              </span>
              <span class="input-group-append">
                <button type="button" class="btn bg-maroon btn-flat">Ada BKP</button>
              </span>
            </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


  <div class="modal fade" id="modalView">
    <div class="modal-dialog modal-lg">
      <div class="card card-maroon">
        <div class="card-header">
          <h3 class="card-title">Rincian Pengeluaran</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="tempat-view"></div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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