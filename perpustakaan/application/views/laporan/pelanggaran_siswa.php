<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo $judul; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Laporan</a></li>
      <li class="active"><?php echo $judul; ?></li>
    </ol>
  </section>
  <section class="content">
    <!-- Main row -->
    <div class="row">

      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h4>Cari Berdasarkan </h4>
          </div>
          <div class="box-body">
            <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_pelanggaran" method="post">
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Dari Tanggal</label>
                    <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_awal; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Sampai Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-4">
                  <div class="form-group">
                    <input id="cari-siswa" class="form-control" type="text" name="id_siswa" placeholder="Cari Siswa">
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="form-group">
                    <select class="form-control" type="text" name="id_kelas">
                      <?php echo $combo_kelas; ?>
                    </select>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="form-group">
                    <select class="form-control" type="text" name="tahun_ajaran">
                      <?php echo $combo_tahun_ajaran; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <select class="form-control select2" type="text" name="id_poin_pelanggaran">
                      <?php echo $combo_poin_pelanggaran; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 text-center">
                  <button class="btn btn-primary"><i class="fa fa-search"> </i> Tampilkan Data</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.box-header -->
        </div>
        <!-- /.box -->
      </div>

      <?php if (!empty($pelanggaran_siswa)) { ?>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-right">
              <button class="btn btn-sm btn-danger" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak</button>
            </div>
            <!-- /.box-header -->
            <div id="cetak" class="box-body">

              <center>
                <h2 style="margin:0;">Laporan Pelanggaran Siswa </h2>
                <p style="margin:0;">Tahun Ajaran : <?php echo str_replace("-", "/", $tahun_ajaran); ?></p>
                <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
              </center>
              <br>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pelanggaran</th>
                    <th>Sanksi</th>
                    <th class="text-center">Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $total_poin = 0;
                  foreach ($pelanggaran_siswa->result_array() as $data) {
                    $get_interval = $this->db->query("SELECT * FROM mst_sanksi WHERE $data[poin_minus] BETWEEN dari_poin AND sampai_poin");
                    if ($get_interval->num_rows() > 0) {
                      $d_sanksi = $get_interval->row();
                      $sanksi = $d_sanksi->sanksi;
                    } else {
                      $sanksi = '';
                    }

                    $total_poin += $data['poin_minus'];
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                      <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['nama_siswa']; ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td style="width:300px"><?php echo $data['nama_poin_pelanggaran']; ?></td>
                      <td><?php echo $sanksi; ?></td>
                      <td class="text-center"><?php echo $data['poin_minus']; ?></td>
                    </tr>
                    <?php $no++;
                  } ?>
                  <tr>
                    <td colspan="7" class="text-center" style="font-weight:bold;">Total Poin</td>
                    <td style="font-weight:bold;" class="text-center"><?php echo $total_poin; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <?php } ?>

    </div>
    <!-- /.row -->
  </section>
</div>

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