<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_DAS_BENDAHARA.xls";
header("Content-Disposition: attachment; filename=$judul");
?>

<center>
    <h2 style="margin:0;">Laporan DAS Bendahara</h2>
</center>
<br>
<?php foreach ($laporan_das->result_array() as $dt) {
    $total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user_bendahara WHERE id_das_bendahara = '$dt[id_das_bendahara]'")->row();
    ?>
    <div class="row" style="background:#ccc;">
        <div class="col-xs-6">
            <p style="margin:0;font-weight:bold;"><?php echo $dt['nama'] . ' - ' . $dt['nama_jabatan']; ?></p>
            <p style="margin:0;font-weight:bold;"><?php echo $dt['jenis_dana'] . ' - ' . $dt['tahun_ajaran']; ?></p>
        </div>
        <div class="col-xs-6 text-right">
            <p style="margin:0;font-weight:bold;">Total Dana : Rp. <?php echo number_format($dt['total']); ?></p>
            <p style="margin:0;font-weight:bold;">Sisa Dana : Rp. <?php echo number_format($dt['saldo'] - ($total->hitung_terima - $total->hitung)); ?></p>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Anggaran</th>
                <th>Nama Daftar Anggaran</th>
                <th>Anggaran</th>
                <th>Terpakai</th>
                <th>Sisa Anggaran</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $total_penerimaan = 0;
                $total_terpakai = 0;
                $sisa_penerimaan = 0;
                $q = $this->db->query("SELECT * FROM das_user_bendahara 
							 WHERE id_das_bendahara = '$dt[id_das_bendahara]' ORDER BY id_das_user_bendahara DESC");
                foreach ($q->result_array() as $data) {
                    $total_penerimaan += $data['total_terima'];
                    $sisa_penerimaan += $data['sisa_saldo'];
                    $total_terpakai += $data['total_terima'] - $data['sisa_saldo'];
                    ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['no_das']; ?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td><?php echo 'Rp. ' . number_format($data['total_terima']); ?></td>
                    <td><?php echo 'Rp. ' . number_format($data['total_terima'] - $data['sisa_saldo']); ?></td>
                    <td><?php echo 'Rp. ' . number_format($data['sisa_saldo']); ?></td>
                    <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                <?php $no++;
                    } ?>
        </tbody>
        <tfoot>
            <tr>
                <td style="font-weight:bold;text-align:center;" colspan="3">Total</td>
                <td style="font-weight:bold;">Rp. <?php echo number_format($total_penerimaan); ?></td>
                <td style="font-weight:bold;">Rp. <?php echo number_format($total_terpakai); ?></td>
                <td style="font-weight:bold;">Rp. <?php echo number_format($sisa_penerimaan); ?></td>
                <td></td>
            </tr>
    </table>
    <hr />
<?php } ?>