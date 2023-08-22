<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_JURNAL.xls";
header("Content-Disposition: attachment; filename=$judul");
?>

<table class="table table-striped">
    <thead>
        <tr>
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
</table>