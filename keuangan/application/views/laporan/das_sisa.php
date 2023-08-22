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
    <section class="content animated fadeInRight ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header col-md-12">

                <a><i class="fa fa-file-search text-info"> </i> Data Sisa DAS</a>
                <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_das" method="post">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Cari Data</label>
                        <div class="form-group">
                          <select class="form-control select2" type="text" name="tahun_ajaran">
                            <?php echo $combo_tahun_ajaran; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label>&nbsp;</label>
                      <div class="form-group">
                        <button class="btn btn-info"><i class="fa fa-search "> </i> Tampilkan Data</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header text-right mt-2 mr-2">
                        <div class="btn-group btn-group-sm">
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url() . 'laporan/das_sisa_excel/' . str_replace("/", "-", $tahun_ajaran); ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                        <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div id="cetak" class="card-body">

                        <center>
                            <h3 style="margin:0;">SMK FARMASI CENDIKIA HUSADA</h3>
                            <h3 style="margin:0;">LAPORAN SISA DANA</h3>
                        </center>
                        <br>
                        <?php foreach ($laporan_das_sisa->result_array() as $dt) {

                            ?>
                            <div class="row" style="background:#ccc;">
                                <div class="col-xs-6">
                                    <p style="margin:0;font-weight:bold;"><?php echo $dt['jenis_dana'] . ' - ' . $dt['tahun_ajaran']; ?></p>
                                    <p style="margin:0;font-weight:bold;"><?php echo date("d-m-Y", strtotime($dt['tanggal'])); ?></p>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p style="margin:0;font-weight:bold;">Total Dana : Rp. <?php echo number_format($dt['dana']); ?></p>
                                    <p style="margin:0;font-weight:bold;">Sisa Dana : Rp. <?php echo number_format($dt['sisa_dana']); ?></p>
                                </div>
                            </div>
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah Pengeluaran</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $total = 0;
                                        $q = $this->db->query("SELECT * FROM das_sisa_output 
                             WHERE id_das_sisa = '$dt[id_das_sisa]' ORDER BY id_das_sisa_output DESC");
                                        foreach ($q->result_array() as $data) {
                                            $total += $data['jumlah'];
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td><?php echo 'Rp. ' . number_format($data['jumlah']); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                        <?php $no++;
                                            } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td style="font-weight:bold;text-align:center;" colspan="2">Total</td>
                                        <td style="font-weight:bold;">Rp. <?php echo number_format($total); ?></td>
                                    </tr>
                            </table>
                            <hr />
                        <?php } ?>
                        <br><br>
                        <div class="col-md-6" style="float:left">
                            <p style="margin:0;">&nbsp;</p>

                            <p style="margin:0;">Mengetahui</p>
                            <br><br><br><br><br>
                            <p style="margin:0;">(Bendahara)</p>
                        </div>
                        <div class="col-md-6" style="float:right">
                            <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?></p>
                            <p style="margin:0;">Penyelenggara Anggaran</p>
                            <br><br><br><br>
                            <p style="margin:0;"><?php echo $this->session->userdata("nama"); ?></p>
                            <p style="margin:0;">(<?php echo $this->session->userdata("nama_jabatan"); ?>)</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
              <!-- /.card -->
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
    $(document).ready(function() {
      $('#cari-siswa').typeahead({
        source: function(query, result) {
          $.ajax({
            url: "<?php echo base_url(); ?>pelanggaran_siswa/ajax_siswa",
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
    });
  </script>