<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_REKAPITULASI_PEMBAYARAN_SISWA.xls";
header("Content-Disposition: attachment; filename=$judul");
?>

<?php if (!empty($rekapitulasi)) { ?>
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div id="cetak" class="box-body">

                <center>
                    <h2 style="margin:0;">Laporan Rekapitulasi</h2>
                    <h3 style="margin:0;"><?php echo $nama_pos . ' - ' . $tahun_ajaran; ?></h3>
                </center>
                <br>
                <?php
                if ($tipe_pembayaran == 'Bulanan') {
                    $q_bulan = $this->db->query("SELECT bulan FROM pembayaran_bulanan WHERE id_jenis_pembayaran = '$id_jenis_pembayaran' GROUP BY bulan ORDER BY id_pembayaran_bulanan");
                    ?>
                    <div style="overflow-x:scroll">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
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
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
<?php } ?>