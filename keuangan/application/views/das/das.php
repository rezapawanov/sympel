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
          <div class="animated lightSpeedIn col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <a class="btn bg-navy btn-flat btn-sm" href="#" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info text-sm bg-navy">
                      <th>No</th>
                      <th>Pengguna</th>
                      <th>Jenis Dana</th>
                      <th>Tahun Ajaran</th>
                      <th>Anggaran Dana</th>
                      <th>Sisa Dana</th>
                      <th>Tanggal</th>
                      <th class="text-center">Aksi</th>
                      <th class="text-center">Request</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($das->result_array() as $data) {
                      $total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user WHERE id_das = '$data[id_das]'")->row();
                      $hitung_request = $this->db->query("SELECT COUNT(*) as hitung FROM das_user WHERE open = 2 AND id_das = '$data[id_das]'")->row();
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama'] . ' <br>  ' . $data['nama_jabatan']; ?></td>
                        <td><?php echo $data['jenis_dana']; ?></td>
                        <td><?php echo $data['tahun_ajaran']; ?></td>
                        <td>Rp. <?php echo number_format($data['total']); ?></td>
                        <td>Rp. <?php echo number_format($data['saldo'] - ($total->hitung_terima - $total->hitung)); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                        <td style="text-align:center;">
                          <?php if ($data['status'] == 0) { ?>
                            <div class="btn-group btn-group-sm">
                              <a class="btn bg-navy btn-xs" href="<?php echo base_url() . 'das/das_tutup/' . $data['id_das']; ?>" onclick="return confirm('Yakin ingin menutup DAS ini ?');"><i class="fad fa-lock-alt"></i> Tutup</a>
                              <a class="btn bg-warning btn-xs" href="<?php echo base_url() . 'das/das_user/' . $data['id_das']; ?>"><i class="fab fa-elementor"></i> Kelola</a>
                              <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'das/das_hapus/' . $data['id_das']; ?>"><i class="fas fa-trash-alt"></i> Hapus</a>
                            <?php } else { ?>
                              <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'das/das_user/' . $data['id_das']; ?>"><i class="fa fa-list-alt"> </i> Detail</a>
                            <?php } ?>

                            </div>
                        </td>
                        <td>
                          <?php
                          if ($hitung_request->hitung > 0) {
                            echo "<span class='text-red'>Ada Permintaan Dana</span>";
                          }
                          ?>
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
          <form role="form" action="<?php echo base_url(); ?>das/das_save" method="post">
            <input class="id_das" type="hidden" name="id_das" readonly>
            <input class="tipe" type="hidden" name="tipe" value="add" readonly>


            <div class="form-group">
              <label>User/Pengguna</label>
              <select class="select2 form-control id_user" name="id_user" required>
                <?php echo $combo_user; ?>
              </select>
            </div>

            <div class="form-group">
              <label>Jenis Dana</label>
              <select class="select2 form-control id_das_kategori" name="id_das_kategori" required>
                <?php echo $combo_das_kategori; ?>
              </select>
            </div>

            <div class="form-group">
              <label>Jumlah Dana</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text text-danger">Rp.</span>
                </div>
                <input type="text" class="form-control rupiah " name="total" required="">
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