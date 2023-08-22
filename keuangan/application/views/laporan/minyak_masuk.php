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
    <section class="content animated fadeInUp ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header col-md-12">

                <a><i class="fa fa-file-search text-info"> </i> Laporan Daftar Pembayaran</a>
                <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_pembayaran" method="post">
                            <div class="row">
                                 <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Dari Tanggal</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                                        <button type="button" class="btn btn-danger"><i class="fal fa-calendar-alt"></i></button>
                                      </div>
                                      <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_awal; ?>" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <label>Sampai Tanggal</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                                      <button type="button" class="btn btn-danger"><i class="fal fa-calendar-alt"></i></button>
                                    </div>
                                    <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Berdasarkan Jenis Pembayaran</label>
                                        <select class="form-control select2" type="text" name="id_jenis_pembayaran">
                                            <?php echo $combo_jenis_pembayaran; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Cari Siswa</label>
                                    <input id="cari-siswa" class="form-control" type="text" name="nis" placeholder="Cari Siswa">
                                  </div>
                                </div>
                                 <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control select2" type="text" name="id_kelas">
                                      <?php echo $combo_kelas; ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Per Angkatan</label>
                                        <input class="form-control" type="number" name="angkatan" placeholder="Angkatan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button class="btn btn-info"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>
                            </div>
                        </form>
              </div>
              <!-- /.card-header -->
           <?php if (!empty($pembayaran_bulanan) && !empty($pembayaran_bebas)) { ?>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header text-right mt-2 mr-2">
                            <div class="btn-group btn-group-sm">
                            <a class="btn btn-warning" href="<?php echo base_url() . 'laporan/pembayaran_excel/' . $tgl_awal . '/' . $tgl_akhir . '/' . $id_jenis_pembayaran . '/' . $kelas . '/' . $nis . '/' . $angkatan; ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                            <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div id="cetak" class="box-body">

                            <center>

                                <h2 style="margin:0;" class="text-uppercase">Laporan Pembayaran Siswa </h2>
                                <p style="margin:0;" class="text-uppercase">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                            </center>
                            <br>
                            <table class="table table-striped table-sm table-responsive">
                                <thead>
                                    <tr class="bg-navy">
                                        <th>No</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Tanggal Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $total = 0;
                                        $no = 1;
                                        foreach ($minyak_masuk->result_array() as $data) {
                                            $total += $data['harga'];
                                            $total_bayar += $data['bayar'];
                                            ?>

                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['mm_tanggal']; ?></td>
                                            <td><?php echo $data['mm_qty']; ?></td>
                                            <td><?php echo $data['mm_harga']; ?></td>
                                            <td><?php echo $data['mm_bayar'] . ' - ' . $data['tahun_ajaran'] . ' - ' . $data['bulan']; ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['tagihan']); ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['bayar']); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                        </tr>
                                    <?php $no++;
                                        } ?>

                                    <?php
                                        foreach ($pembayaran_bebas->result_array() as $data) {
                                            $total_tagihan += $data['tagihan'];
                                            $total_bayar += $data['bayar'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nama_kelas']; ?></td>
                                            <td><?php echo $data['nis']; ?></td>
                                            <td><?php echo $data['nama_siswa']; ?></td>
                                            <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['tagihan']); ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['bayar']); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                        </tr>
                                    <?php $no++;
                                        } ?>

                                    <tr>
                                        <td style="text-align:center;font-weight:bold;" colspan="5">Total</td>
                                        <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_tagihan); ?></td>
                                        <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_bayar); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <div class="col-md-6" style="float:right;">
                                <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?></p>
                                <p style="margin:0;">Mengetahui</p>
                                <br><br><br><br><br>
                                <p style="margin:0;">(Bendahara)</p>
                            </div>
                            <div class="col-md-6" style="float:left">
                                <p style="margin:0;">&nbsp;</p>
                                <p style="margin:0;">&nbsp;</p>
                                <br><br><br><br>
                                <p style="margin:0;"><?php echo $this->session->userdata("nama"); ?></p>
                                <p style="margin:0;">(<?php echo $this->session->userdata("nama_jabatan"); ?>)</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            <?php } ?>
            </div>
            <!-- /.col -->
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
<script>
    $('#cari-siswa').typeahead({
        source: function(query, result) {
            $.ajax({
                url: "<?php echo base_url(); ?>pembayaran/ajax_siswa",
                data: 'query=' + query,
                dataType: "json",
                type: "POST",
                success: function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));
                }
            });
        }
    });
</script>