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

                <a><i class="fa fa-file-search text-info"> </i> Laporan Rekapitulasi Pembayaran</a>
                <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_rekapitulasi" method="post">
                            <div class="row">
                                 <div class="col-md-3">
                                  <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <select class="form-control select2" type="text" name="tahun_ajaran" required>
                                            <?php echo $combo_tahun_ajaran; ?>
                                        </select>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label>Kelas</label>
                                  <select class="form-control select2" type="text" name="id_kelas" required>
                                            <?php echo $combo_kelas; ?>
                                        </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Berdasarkan Jenis Pembayaran</label>
                                        <select class="form-control select2" type="text" name="id_jenis_pembayaran">
                                            <?php echo $combo_jenis_pembayaran; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Tampil Data</label>
                                    <button class="btn btn-info"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                </div>
                                </div>
                            </div>
                        </form>
              </div>
              <!-- /.card-header -->
           <?php if (!empty($rekapitulasi)) { ?>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header text-right mt-2 mr-2">
                            <div class="btn-group btn-group-sm">
                            <a class="btn btn-warning" href="<?php echo base_url() . 'laporan/rekapitulasi_excel/' . str_replace("/", "-", $tahun_ajaran) . '/' . $kelas . '/' . $id_jenis_pembayaran; ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                            <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak Di Web</button>
                        </div>
                        </div>
                        <!-- /.box-header -->
                        <div id="cetak" class="box-body">

                            <center>
                                <h2 style="margin:0;" class="text-uppercase">Laporan Rekapitulasi</h2>
                                <h3 style="margin:0;" class="text-uppercase"><?php echo $nama_pos . ' - ' . $tahun_ajaran; ?></h3>
                            </center>
                            <br>
                            <?php
                                if ($tipe_pembayaran == 'Bulanan') {
                                    $q_bulan = $this->db->query("SELECT bulan FROM pembayaran_bulanan WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' GROUP BY bulan ORDER BY id_pembayaran_bulanan");
                                    ?>
                                <div style="overflow-x:scroll"> 
                                    <table class="table table-bordered table-sm text-sm table-responsive">
                                        <thead>
                                            <tr class="bg-navy">
                                                <th>No</th>
                                                <th>Kelas</th>
                                                <th>Nama</th>
                                                <?php foreach ($q_bulan->result_array() as $d_bulan) { ?>
                                                    <th><?php echo $d_bulan['bulan']; ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $no = 1;
                                                    foreach ($rekapitulasi->result_array() as $data) {

                                                        $q_tagihan = $this->db->query("SELECT bayar FROM pembayaran_bulanan WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' AND id_siswa = $data[id_siswa] GROUP BY bulan ORDER BY id_pembayaran_bulanan");
                                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td>
                                                        <div style="width:100px;"><?php echo $data['nama_kelas']; ?></div>
                                                    </td>
                                                    <td>
                                                        <div style="width:200px;"><?php echo $data['nama_siswa']; ?></div>
                                                    </td>
                                                    <?php foreach ($q_tagihan->result_array() as $d_tagihan) {
                                                                    if ($d_tagihan['bayar'] > 0) {
                                                                        $style = "style='background:green;color:#fff;'";
                                                                    } else {
                                                                        $style = "style='background:red;color:#fff;'";
                                                                    }
                                                                    ?>
                                                        <td <?php echo $style; ?>>
                                                            <div style="width:70px;">Rp. <?php echo number_format($d_tagihan['bayar']); ?></div>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php $no++;
                                                    } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else { ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Nama</th>
                                            <th>Total Tagihan</th>
                                            <th>Total Bayar</th>
                                            <th>Sisa Tagihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $no = 1;
                                                foreach ($rekapitulasi->result_array() as $data) {
                                                    $bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $data[id_pembayaran_bebas]")->row();

                                                    if ($bayar->hitung >= $data['tagihan']) {
                                                        $style = "style='background:green;color:#fff;'";
                                                    } else {
                                                        $style = "style='background:red;color:#fff;'";
                                                    }
                                                    ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['nama_kelas']; ?></td>
                                                <td><?php echo $data['nama_siswa']; ?></td>
                                                <td <?php echo $style; ?>><?php echo 'Rp. ' . number_format($data['tagihan']); ?></td>
                                                <td <?php echo $style; ?>><?php echo 'Rp. ' . number_format($bayar->hitung); ?></td>
                                                <td <?php echo $style; ?>><?php echo 'Rp. ' . number_format($data['tagihan'] - $bayar->hitung); ?></td>
                                            <?php $no++;
                                                    } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <br><br>
                            <div class="col-md-6" style="float:right">
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