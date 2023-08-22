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

                <a><i class="fa fa-file-search text-info"> </i> Laporan Jurnal Umum</a>
                <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_jurnal" method="post">
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
                                <div class="form-group">
                                    <label>Cari Data Laporan</label>
                                    <div class="input-group mb-3">
                                    <button class="btn btn-info"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                  </div>
                                    
                                </div>
                            </div>
                                
                        </form>
              </div>
              <!-- /.card-header -->
           <?php if (!empty($penerimaan) && !empty($pengeluaran)) { ?>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header text-right mt-2 mr-2">
                            <div class="btn-group btn-group-sm">
                            <a class="btn btn-warning" href="<?php echo base_url() . 'laporan/jurnal_excel/' . $tgl_awal . '/' . $tgl_akhir; ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                            <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div id="cetak" class="box-body">

                            <center>
                                <h2 style="margin:0;" class="text-uppercase">Laporan Jurnal Umum </h2>
                                <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                            </center>
                            <br>
                            <div class="table-responsive">
                            <table class="table table-striped table-bordered ">
                                <thead>
                                    <tr class="bg-teal">
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Penerimaan</th>
                                        <th>Pengeluaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $total_penerimaan = 0;
                                        $total_pengeluaran = 0;
                                        foreach ($penerimaan->result_array() as $data) {
                                            $total_penerimaan += $data['jumlah'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['jumlah']); ?></td>
                                            <td style="text-align:right;">-</td>
                                        </tr>
                                    <?php $no++;
                                        } ?>

                                    <?php
                                        foreach ($pengeluaran->result_array() as $data) {
                                            $total_pengeluaran += $data['jumlah'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td style="text-align:right;">-</td>
                                            <td style="text-align:right;">Rp <?php echo number_format($data['jumlah']); ?></td>
                                        </tr>
                                    <?php $no++;
                                        } ?>
                                        <tr>
                                        <td style="text-align:center;font-weight:bold;" colspan="3">Total</td>
                                        <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_penerimaan); ?></td>
                                        <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_pengeluaran); ?></td>
                                    </tr>
                                </tbody>
                            </table></div>
                            <br><br>
                            <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?>)</p>
                            <p style="margin:0;">Mengetahui</p>
                            <br><br><br><br><br>
                            <p style="margin:0;">(___________________)</p>
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