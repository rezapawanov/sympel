<?php
header("Content-type: application/vnd-ms-excel");
$tgl = date("d-m-Y");
$judul = "DATA_BUKU_" . $tgl . ".xls";
header("Content-Disposition: attachment; filename=$judul");

?>
<h2>Data Buku Per Tanggal <?php echo $tgl; ?></h2>
<table id="datatb" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Jumlah</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($book->result_array() as $data) { 
            $stok = $this->db->query("SELECT COALESCE(SUM(jumlah),0) as hitung FROM peminjaman_buku_dt WHERE id_buku = '$data[id_buku]' AND status_pinjam_dt = '0'")->row();
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['kode_buku']; ?></td>
                <td><?php echo $data['judul_buku']; ?></td>
                <td><?php echo $data['pengarang']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>

            </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>