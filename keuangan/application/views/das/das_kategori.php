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
                    <tr class="text-info">
                      <th>No</th>
                      <th>Jenis Dana</th>
                      <th>Tahun Ajaran</th>
                      <th>Total Dana</th>
                      <th>Sisa Dana</th>
                      <th>Tanggal</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <?php
                    $no = 1;
                    foreach ($das_kategori->result_array() as $data) {
                      $total_das = $this->db->query("SELECT SUM(saldo) as hitung FROM das INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori  WHERE das.id_das_kategori = '$data[id_das_kategori]'")->row();

                      $total_das_bendahara = $this->db->query("SELECT SUM(saldo) as hitung FROM das_bendahara INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori  WHERE das_bendahara.id_das_kategori = '$data[id_das_kategori]'")->row();

                      $total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user 
                                    INNER JOIN das ON das_user.id_das = das.id_das 
                                    INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori  WHERE das.id_das_kategori = '$data[id_das_kategori]'")->row();

                      $total_bendahara = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user_bendahara 
                                    INNER JOIN das_bendahara ON das_user_bendahara.id_das_bendahara = das_bendahara.id_das_bendahara INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori  WHERE das_bendahara.id_das_kategori = '$data[id_das_kategori]'")->row();

                      $total_all = $total_das->hitung - ($total->hitung_terima - $total->hitung);

                      $total_all_bendahara = $total_das_bendahara->hitung - ($total_bendahara->hitung_terima - $total_bendahara->hitung);
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['jenis_dana']; ?></td>
                        <td><?php echo $data['tahun_ajaran']; ?></td>
                        <td>Rp. <?php echo number_format($data['dana']); ?></td>
                        <td>RP. <?php echo number_format($data['sisa_dana'] -  $total_all - $total_all_bendahara); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'das/das_kategori_hapus/' . $data['id_das_kategori']; ?>" onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> Hapus</a>
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
          <h4 class="modal-title">Tambah Kategori RABS</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="info"></div>
          <form role="form" action="<?php echo base_url(); ?>das/das_kategori_save" method="post">
            <input class="id_das_kategori" type="hidden" name="id_das_kategori" readonly>
            <input class="tipe" type="hidden" name="tipe" value="add" readonly>

            <div class="form-group">

              <label>Tahun Ajaran</label>
              <select class="select2 form-control tahun_ajaran" name="tahun_ajaran" required>
                <?php echo $combo_tahun_ajaran; ?>
              </select>
            </div>

            <div class="form-group">
              <label>Jenis Dana</label>
              <input type="text" class="form-control" name="jenis_dana" required>
            </div>

            <div class="form-group">
              <label>Jumlah Dana</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text text-danger">Rp.</span>
                </div>
                <input type="text" class="form-control rupiah" name="dana" value="" required="">
              </div>
            </div>

            <div class="form-group">
              <label>Tanggal</label>
              <input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
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