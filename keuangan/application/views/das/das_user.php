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
                  <a class="btn bg-danger btn-sm" href="<?php echo base_url(); ?>das"><i class="fa fa-arrow-left"> </i> Kembali</a>
                  <?php if ($status == 0) { ?>
                    <a class="btn bg-navy btn-sm" href="#" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"> </i> Tambah Data</a>
                  <?php } ?>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table class="table">
                  <thead>
                    <tr class="text-info text-sm bg-navy">
                      <th>User/Pengguna</th>
                      <th>Jenis Dana</th>
                      <th>Tahun Ajaran</th>
                      <th>Total Dana</th>
                      <th>Sisa Dana</th>
                    </tr>
                  </thead>
                  <tbody class="text-sm bg-maroon">
                    <tr>
                      <td><b><?php echo $nama_user . ' - ' . $nama_jabatan; ?></b></td>
                      <td><?php echo $jenis_dana; ?></td>
                      <td><?php echo $tahun_ajaran; ?></td>
                      <td>Rp. <?php echo number_format($total); ?></td>
                      <td>Rp. <?php echo number_format($saldo); ?></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-sm bg-navy">
                      <th>No</th>
                      <th>Kode Anggaran</th>
                      <th>Nama Daftar Anggaran</th>
                      <th>Total Diberikan</th>
                      <th>Dana Terpakai</th>
                      <th>Sisa Saldo</th>
                      <th>Tanggal</th>
                      <th>
                        <center>TINDAKAN</center>
                      </th>

                      <th class="text-center">Konfirmasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($das_user->result_array() as $data) {
                      $hitung_request = $this->db->query("SELECT COUNT(*) as hitung FROM das_user WHERE open = 2 AND id_das_user = '$data[id_das_user]'")->row();
                    ?>
                      <tr class="text-sm">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['no_das']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td>Rp. <?php echo number_format($data['total_terima']); ?></td>
                        <td>RP. <?php echo number_format($data['total_terima'] - $data['sisa_saldo']); ?></td>
                        <td>RP. <?php echo number_format($data['sisa_saldo']); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                        <td style="text-align:center;">
                          <div class="btn-group btn-group-xs">
                            <a class="btn bg-maroon btn-xs lihat-das-user" href="#" data-toggle="modal" data-target="#modalView" data-id_das="<?php echo $id_das; ?>" data-id_das_user="<?php echo $data['id_das_user']; ?>"><i class="fab fa-elementor"></i> Detail</a>
                            <?php if ($status == 0 && $data['status_das_user'] == 0) { ?>
                              <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'das/das_user_tutup/' . $data['id_das_user'] . '/' . $data['id_das']; ?>" onclick="return confirm('Yakin ingin menutup DAS ini ?');"><i class="fad fa-lock-alt"></i> Tutup</a>

                              <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'das/das_user_hapus/' . $data['id_das_user'] . '/' . $data['id_das']; ?>"><i class="fas fa-trash-alt"></i> Hapus</a>
                            <?php } ?>
                          </div>
                        </td>

                        <td style="text-align:center;">
                          <?php if ($hitung_request->hitung > 0) { ?>
                            <div class="btn-group btn-group-sm">
                              <a class="btn bg-navy btn-xs" href="<?php echo base_url() . 'das/terima_request/' . $data['id_das_user'] . '/' . $id_das; ?>"><i class="fas fa-check-square"></i> Terima</a>
                              <a class="btn bg-danger btn-xs" href="<?php echo base_url() . 'das/tolak_request/' . $data['id_das_user'] . '/' . $id_das; ?>"><i class="fas fa-window-close"></i> Tolak</a>
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

  <div class="modal fade" id="modalAdd">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="card-header">
          <h3 class="card-title">Tambah Rincian Dana</h3>

          <div class="card-tools">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <div class="modal-body">
          <div id="info"></div>
          <form role="form" action="<?php echo base_url(); ?>das/das_user_save" method="post">
            <input class="id_das" type="hidden" name="id_das" value="<?php echo $id_das; ?>" readonly>


            <div class="form-group">
              <label>Kode Anggaran</label>
              <input type="text" class="form-control " name="no_das" required>
            </div>
            <div class="form-group">
              <label>Nama Daftar Anggaran</label>
              <textarea class="form-control keterangan" name="keterangan" required></textarea>
            </div>
            <div class="form-group">
              <label>Jumlah Dana</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text text-danger">Rp.</span>
                </div>
                <input type="text" class="form-control rupiah" name="total_terima" required>
              </div>
            </div>


            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text fa fa-calendar "></span>
                </div>
                <input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
              </div>
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

  <div class="modal fade" id=modalView>
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Rincian Pengeluaran</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" aria-label="Close" data-dismiss="modal"><i class="fas fa-times"></i>
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
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalView2">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="card-header">
          <h3 class="card-title">Rincian Pengeluaran</h3>

          <div class="card-tools">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="modal-body">
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

  <script>
    $(".lihat-das-user").click(function() {
      var id_das = $(this).attr('data-id_das');
      var id_das_user = $(this).attr('data-id_das_user');
      $.get("<?php echo base_url(); ?>das/ajax_das_user", {
        id_das: id_das,
        id_das_user: id_das_user
      }, function(data) {
        $("#tempat-view").html(data);
      });
    });
  </script>