<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_PEMBAYARAN_SISWA.xls";
header("Content-Disposition: attachment; filename=$judul");
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Pembayaran</th>
            <th>Tagihan</th>
            <th>Jumlah Bayar</th>
            <th>Tanggal Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_tagihan = 0;
        $total_bayar = 0;
        $no = 1;
        foreach ($pembayaran_bulanan->result_array() as $data) {
            $total_tagihan += $data['tagihan'];
            $total_bayar += $data['bayar'];
            ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_kelas']; ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama_siswa']; ?></td>
                <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran'] . ' - ' . $data['bulan']; ?></td>
                <td style="text-align:right;">Rp <?php echo number_format($data['tagihan']); ?></td>
                <td style="text-align:right;">Rp <?php echo number_format($data['bayar']); ?></td>
                <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
            </tr>
        <?php $no++;
        } ?>

        <?php
        foreach ($pembayaran_bebas->result_array() as $data) {
            $total_tagihan += $data['tagihan'];
            $total_bayar += $data['bayar'];
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_kelas']; ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama_siswa']; ?></td>
                <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                <td style="text-align:right;">Rp <?php echo number_format($data['tagihan']); ?></td>
                <td style="text-align:right;">Rp <?php echo number_format($data['bayar']); ?></td>
                <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
            </tr>
        <?php $no++;
        } ?>

        <tr>
            <td style="text-align:center;font-weight:bold;" colspan="5">Total</td>
            <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_tagihan); ?></td>
            <td style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total_bayar); ?></td>
        </tr>
    </tbody>
</table>