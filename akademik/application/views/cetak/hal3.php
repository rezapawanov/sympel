<html>
<head>
<title>Hal 3 - Raport Siswa</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/printer.css">
</head>
<body >

<?php
$capaian = $this->db->query("SELECT * FROM nilai_capaian_hasil_belajar WHERE id_siswa = $id_siswa ")->row();
?>  
      <table width=100%>
        <tr><td width=130px>Nama Sekolah</td> <td> : <?php echo $nama_sekolah; ?> </td>       <td width=130px>Kelas </td>   <td>: <?php echo $nama_kelas; ?></td></tr>
        <tr><td>Alamat</td>                   <td> : <?php echo $alamat; ?> </td>     <td>Semester </td> <td>: <?php echo $semester; ?></td></tr>
        <tr><td>Nama Siswa</td>       <td> : <b><?php echo $nama_siswa; ?></b> </td>           <td>Tahun Ajaran </td> <td>: <?php echo $tahun_ajaran; ?></td></tr>
        <tr><td>No Induk</td>            <td> : <?php echo $nis; ?></td>        <td></td></tr>
      </table><br>

      <h2 align=center>CAPAIAN HASIL BELAJAR</h2>
      <b>A. SIKAP</b><br><br>
    <b>1. Sikap Spiritual</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='190px'>Predikat</th>
            <th>Deskripsi</th>
          </tr>
          <tr>
            <th style='padding:60px'><?php echo $capaian->spiritual_predikat; ?></th>
            <th><?php echo $capaian->spiritual_deskripsi; ?></th>
          </tr>
      </table><br/>

    <b>2. Sikap Sosial</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='190px'>Predikat</th>
            <th>Deskripsi</th>
          </tr>
          <tr>
            <th style='padding:60px'><?php echo $capaian->sosial_predikat; ?></th>
            <th><?php echo $capaian->sosial_deskripsi; ?></th>
          </tr>
      </table><br/>
      <script>
    window.print();
    window.close();
    </script>
</body>
</html>