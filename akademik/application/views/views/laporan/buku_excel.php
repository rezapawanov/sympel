<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_DATA_BUKU.xls";
header("Content-Disposition: attachment; filename=$judul");
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Penerbit</th>
            <th>Total Halaman</th>
            <th>Tinggi Buku</th>
            <th>DDC</th>
            <th>ISBN</th>
            <th>Jumlah Buku</th>
            <th>Tanggal Masuk</th>
            <th>No Inventaris</th>
            <th>Lokasi Penyimpanan</th>
            <th>Sumber Buku</th>
            <th>Kategori Buku</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($buku->result_array() as $data) { ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['kode_buku']; ?></td>
            <td><?php echo $data['judul_buku']; ?></td>
            <td><?php echo $data['pengarang']; ?></td>
            <td><?php echo $data['tahun_terbit']; ?></td>
            <td><?php echo $data['tempat_terbit']; ?></td>
            <td><?php echo $data['total_halaman']; ?></td>
            <td><?php echo $data['tinggi_buku']; ?></td>
            <td><?php echo $data['ddc']; ?></td>
            <td><?php echo $data['isbn']; ?></td>
            <td><?php echo $data['jumlah_buku']; ?></td>
            <td><?php echo $data['tanggal_masuk']; ?></td>
            <td><?php echo $data['no_inventaris']; ?></td>
            <td><?php echo $data['lokasi']; ?></td>
            <td><?php echo $data['nama_sumber']; ?></td>
            <td><?php echo $data['nama_kategori']; ?></td>
            <td><?php echo $data['deskripsi_buku']; ?></td>
        </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>