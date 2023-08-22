<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_DAS_HARIAN.xls";
header("Content-Disposition: attachment; filename=$judul");
?>

<center>
    <h2 style="margin:0;">Laporan DAS Harian</h2>
</center>
<br>
<?php foreach ($laporan_das->result_array() as $dt) {

    ?>
    <div class="row" style="background:#ccc;">
        <div class="col-xs-6">
            <p style="margin:0;font-weight:bold;"><?php echo $dt['nama'] . ' - ' . $dt['nama_jabatan']; ?></p>
            <p style="margin:0;font-weight:bold;"><?php echo $dt['jenis_dana'] . ' - ' . $dt['tahun_ajaran']; ?></p>
            <p style="margin:0;font-weight:bold;">Kode Anggaran : <?php echo $dt['no_das']; ?></p>
        </div>
        <div class="col-xs-6 text-right">
            <p style="margin:0;font-weight:bold;">Total Dana : Rp. <?php echo number_format($dt['total_terima']); ?></p>
            <p style="margin:0;font-weight:bold;">Terpakai : Rp. <?php echo number_format($dt['total_terima'] - $dt['sisa_saldo']); ?></p>
            <p style="margin:0;font-weight:bold;">Sisa Dana : Rp. <?php echo number_format($dt['sisa_saldo']); ?></p>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Dana</th>
                <th>Rincian Pengeluaran</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Nota </th>
                <th>Bku</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $total_pengeluaran = 0;
                $q = $this->db->query("SELECT * FROM das_user_output 
							 WHERE id_das_user = '$dt[id_das_user]' ORDER BY id_das_user DESC");
                foreach ($q->result_array() as $data) {
                    $total_pengeluaran += $data['jumlah'] ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <th><?php echo $data['jenis_das']; ?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                    <td><?php echo 'Rp. ' . number_format($data['jumlah']); ?></td>
                    <td><?php if ($data['ada_nota'] == '1') echo '<label class="label label-success">Ada</label>';
                                else echo '<label class="label label-warning">Tidak Ada</label>'; ?></td>
                    <td><?php if ($data['ada_bku'] == '1') echo '<label class="label label-success">Ada</label>';
                                else echo '<label class="label label-warning">Tidak Ada</label>'; ?></td>
                <?php $no++;
                    } ?>
        </tbody>
        <tfoot>
            <tr>
                <td style="font-weight:bold;text-align:center;" colspan="3">Total</td>
                <td style="font-weight:bold;">Rp. <?php echo number_format($total_pengeluaran); ?></td>
                <td colspan="2"></td>
            </tr>
    </table>
    <hr />
<?php } ?>