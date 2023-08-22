<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_KELOLA_DAS.xls";
header("Content-Disposition: attachment; filename=$judul");
?>

<center>
    <h2 style="margin:0;">Laporan Kelola DAS</h2>
</center>
<table class="table">
    <thead style="background:#000;color:#fff;">
        <tr>
            <th>Jenis Dana</th>
            <th>Kode Anggaran</th>
            <th>Keterangan</th>
            <th>Total Dana</th>
            <th>Sisa Saldo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $jenis_dana . ' - ' . $tahun_ajaran; ?></td>
            <td><?php echo $no_das; ?></td>
            <td><?php echo $keterangan; ?></td>
            <td>Rp. <?php echo number_format($total_terima); ?></td>
            <td>Rp. <?php echo number_format($sisa_saldo); ?></td>
        </tr>
    </tbody>
</table>
<br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Dana</th>
            <th>Keterangan</th>
            <th>Jumlah Pengeluaran</th>
            <th>Nota</th>
            <th>BKP</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($das_saya_kelola->result_array() as $data) { ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['jenis_das']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td>Rp. <?php echo number_format($data['jumlah']); ?></td>
                <td><?php if ($data['ada_nota'] == '1') echo '<label class="label label-success">Ada</label>';
                    else echo '<label class="label label-warning">Tidak Ada</label>'; ?></td>
                <td><?php if ($data['ada_bku'] == '1') echo '<label class="label label-success">Ada</label>';
                    else echo '<label class="label label-warning">Tidak Ada</label>'; ?></td>
                <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
            </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>