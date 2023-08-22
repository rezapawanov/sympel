<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_PEMINJAMAN_BUKU.xls";
header("Content-Disposition: attachment; filename=$judul");
?>
<h2 style="margin:0;">Laporan Peminjaman Buku </h2>
<p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Jumlah</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th>Telat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $now = strtotime(date("Y-m-d"));
        foreach ($peminjaman->result_array() as $data) {

            $your_date = strtotime($data['tanggal_kembali']);
            $datediff = $now - $your_date;
            $telat = round($datediff / (60 * 60 * 24));
            ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama_siswa']; ?></td>
            <td><?php echo $data['kode_buku']; ?></td>
            <td><?php echo $data['judul_buku']; ?></td>
            <td><?php echo $data['jumlah']; ?></td>
            <td><?php echo date("d-m-Y", strtotime($data['tanggal_pinjam'])); ?></td>
            <td><?php
                    if ($data['status_pinjam_dt'] == 0) {
                        echo date("d-m-Y", strtotime($data['tanggal_kembali']));
                    } else {
                        echo date("d-m-Y", strtotime($data['tanggal_kembali_asli']));
                    } ?></td>
            <td><?php if ($data['status_pinjam_dt'] == 0) echo 'Dipinjam';
                    else echo 'Kembali'; ?></td>
            <td><?php if ($telat > 0) echo $telat;
                    else echo '-'; ?></td>

        </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>