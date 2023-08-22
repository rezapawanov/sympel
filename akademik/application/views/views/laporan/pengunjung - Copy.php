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
                <div class="box box-success">
                    <div class="box-header">
                        <h4>Cari Berdasarkan </h4>
                    </div>
                    <div class="box-body">
                        <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_pengunjung" method="post">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Dari Tanggal</label>
                                        <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_awal; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Sampai Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Keperluan</label>
                                        <select class="form-control" type="text" name="keperluan">
                                            <option value="all">[ SEMUA KEPERLUAN ]</option>
                                            <option value="Baca Buku">Baca Buku</option>
                                            <option value="Baca dan Pinjam">Baca dan Pinjam</option>
                                            <option value="Pinjam Buku">Pinjam Buku</option>
                                            <option value="Kembali Buku">Kembali Buku</option>
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

            <?php if (!empty($pengunjung)) { ?>
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header text-right">
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>laporan/pengunjung_excel/<?php echo date('Y-m-d', strtotime($tgl_awal)); ?>/<?php echo date('Y-m-d', strtotime($tgl_akhir)); ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                        <button class="btn btn-sm btn-warning" onclick="printDiv('cetak')"><i class="fa fa-print"> </i> Cetak di web</button>
                    </div>
                    <!-- /.box-header -->
                    <div id="cetak" class="box-body">

                        <center>
                            <h2 style="margin:0;">Laporan Pengunjung Perpus </h2>
                            <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                        </center>
                        <br>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $now = strtotime(date("Y-m-d"));
                                    foreach ($pengunjung->result_array() as $data) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['nama_siswa']; ?></td>
                                    <td><?php echo $data['nama_kelas']; ?></td>
                                    <td><?php echo $data['keperluan']; ?></td>
                                    <td><?php echo date("d-m-Y H:i:s", strtotime($data['tanggal'])); ?></td>
                                </tr>
                                <?php $no++;
                                    } ?>
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