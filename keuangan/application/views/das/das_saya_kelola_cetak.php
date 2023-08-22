<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
<center>
    <h3 style="margin:0;">SMK FARMASICENDIKIA HUSADA</h3>
    <h3 style="margin:0;">LAPORAN REALISASI ANGGARAN</h3>
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

<?php if ($this->session->userdata("hak_akses") == "das") { ?>
    <div class="col-md-6" style="float:left">
        <p style="margin:0;">&nbsp;</p>

        <p style="margin:0;">Mengetahui</p>
        <br><br><br><br><br>
        <p style="margin:0;">(Bendahara)</p>
    </div>
    <div class="col-md-6" style="float:right">
        <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?></p>
        <p style="margin:0;">Penyelenggara Anggaran</p>
        <br><br><br><br>
        <p style="margin:0;"><?php echo $this->session->userdata("nama"); ?></p>
        <p style="margin:0;">(<?php echo $this->session->userdata("nama_jabatan"); ?>)</p>
    </div>
<?php } ?>

<script>
    setTimeout(function() {
        window.print();
        window.close();
    }, 250);
</script>