<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_PENGUNJUNG_PERPUSTAKAAN.xls";
header("Content-Disposition: attachment; filename=$judul");
?>
<h2 style="margin:0;">Laporan Pengunjung Perpustakaan</h2>
<p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
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