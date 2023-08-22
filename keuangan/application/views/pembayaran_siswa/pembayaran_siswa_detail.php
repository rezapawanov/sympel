  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
              <i class="fas fa-hand-holding-usd nav-icon text-info"></i> <?php echo $judul; ?></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/box"><?php echo $judul; ?></a></li>
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
          <div class="animated fadeInLeft  col-md-5">
            <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title">Informasi Tagihan Siswa</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <tbody>
                    <tr>
                      <td class="text-xs">Nama Siswa</td>
                      <td class="text-xs">:</td>
                      <td class="text-xs"><?php echo $nama_siswa; ?></td>
                    </tr>
                    <tr>
                      <td class="text-xs">Kelas</td>
                      <td class="text-xs">:</td>
                      <td class="text-xs"><?php echo $nama_kelas; ?></td>
                    </tr>
                    <tr>
                      <td class="text-xs">NIS</td>
                      <td class="text-xs">:</td>
                      <td class="text-xs"><?php echo $nis; ?></td>
                    </tr>
                    <tr>
                      <td class="text-xs" style="width:100px;">Jenis Pembayaran</td>
                      <td class="text-xs" style="width:5px;">:</td>
                      <td class="text-xs"><?php echo $nama_pos_keuangan; ?></td>
                    </tr>
                    <tr>
                      <td class="text-xs">Total Tagihan</td>
                      <td class="text-xs">:</td>
                      <td class="text-xs text-danger">Rp. <?php echo number_format($total_tagihan);  ?></td>
                    </tr>
                  </tbody>
                </table>
                <a class="btn btn-danger btn-flat" href="<?php echo base_url() . 'pembayaran/pembayaran_siswa/' . $tahun_ajaran . '/' . $nis; ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="callout callout-danger">
              <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
              <ol>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs btn-danger"><span class="fa fa-check"></span> Bayar </button>
                  untuk menambahkan <b><?php echo $judul; ?></b>.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs btn-success"><span class="fas fa-times-square"></span> Hapus </button>
                  untuk Merubah <b><?php echo $judul; ?></b>.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs bg-navy"><span class="fa fa-print"></span> Print </button>
                  untuk Mencetak Laporan <b><?php echo $judul; ?></b>.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs bg-red"><span class="fa fa-arrow-left"></span> Kembali </button>
                  untuk kembali ke halaman <b><?php echo $judul; ?></b>.
                </li>
              </ol>
              <p>
                Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
              </p>
            </div>
          </div>
          <div class="animated fadeInRight col-md-7">
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h3 class="card-title">Informasi Tagihan Siswa</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <form action="<?php echo base_url(); ?>pembayaran/cetak_bukti_bulanan_all" method="post">
                <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
                <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>">
                <div class="text-right mt-1 mr-2">
                  <button class="btn bg-navy"><i class="fa fa-print"> </i> Cetak yang dipilih</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                  <table id="datatb" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr class=" text-xs">
                        <th></th>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tagihan</th>
                        <th>Status</th>
                        <th>Bayar</th>
                        <th>Cetak</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($pembayaran_bulanan_detail->result_array() as $data) {

                        $bulan = $data['bulan'];
                        if ($data['tagihan'] == $data['bayar']) {
                          $disable = '';
                          $status = 'Lunas';
                          $color = 'style="color:green;"';
                          $icon = " <i class='fas fa-times-square'></i> ";
                          $button = 'btn bg-success';
                          $confirm = 'Anda akan menghapus pembayaran bulan ' . $bulan;
                          $url = base_url() . 'pembayaran/pembayaran_bulanan_hapus/' . $data['id_pembayaran_bulanan'] . '/' . $data['id_siswa'];
                          $toggle = '';
                        } else {
                          $disable = 'disabled';
                          $status = 'Belum Lunas';
                          $color = 'style="color:red;"';
                          $icon = " <i class='fa fa-check'> </i> ";
                          $button = 'btn-danger bayar-bulanan';
                          $confirm = 'Anda akan melakukan pembayaran bulan ' . $bulan;
                          $url = '#';
                          $toggle = 'data-toggle="modal" data-target="#modalAdd" data-id_pembayaran_bulanan = "' . $data['id_pembayaran_bulanan'] . '" data-id_siswa = "' . $data['id_siswa'] . '"';
                        }
                      ?>
                        <tr <?php echo $color; ?> class='text-sm'>
                          <td><input type="checkbox" name="id_pembayaran_bulanan[]" value="<?php echo $data['id_pembayaran_bulanan']; ?>" <?php echo $disable; ?>></td>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['bulan']; ?></td>
                          <td>Rp. <?php echo number_format($data['tagihan']); ?></td>
                          <td>
                            <?php
                            echo $status;
                            ?>
                          </td>
                          <td class="text-center">
                            <a class="btn <?php echo $button; ?> btn-xs" href="<?php echo $url; ?>" <?php echo $toggle; ?> onclick="return confirm('<?php echo $confirm; ?>');">
                              <?php echo $icon; ?> </a>
                          </td>
                          <td class="text-center">
                            <?php if ($data['tagihan'] == $data['bayar']) { ?>
                              <a class="btn bg-navy btn-xs" href="<?php echo base_url() . 'pembayaran/cetak_bukti_bulanan/' . $data['id_pembayaran_bulanan'] . '/' . $data['id_siswa']; ?>" target="_blank"><i class="fa fa-print"> </i> </a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </form>
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
      <div class="modal-content bg-teal">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pembayaran / Cicilan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div id="info"></div>
          <form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bulanan_save" method="post">
            <input class="id_pembayaran_bulanan" type="hidden" name="id_pembayaran_bulanan" readonly>
            <input class="id_siswa" type="hidden" name="id_siswa" readonly>

            <div class="form-group">
              <label>Tanggal Bayar</label>
              <input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button  class="btn btn-outline-light bg-navy btn-block"><i class="nav-icon fas fa-money-check-alt text-white"> </i> Lakukan Bayar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->



  <script>
    $(".bayar-bulanan").click(function() {
      $(".id_pembayaran_bulanan").val($(this).attr('data-id_pembayaran_bulanan'));
      $(".id_siswa").val($(this).attr('data-id_siswa'));
    });
  </script>

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