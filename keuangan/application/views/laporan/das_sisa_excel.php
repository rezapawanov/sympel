<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_SISA_DANA.xls";
header("Content-Disposition: attachment; filename=$judul");
?>

<center>
    <h2 style="margin:0;">Laporan Dana Sisa</h2>
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
    <table class="table table-bordered">
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