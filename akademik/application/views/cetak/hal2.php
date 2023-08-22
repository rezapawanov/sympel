<html>
<head>
<title>Hal 2 - Raport Siswa</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/printer.css">
<style type="text/css">
  td { padding:2px; }
</style>
</head>
<body>
    <h1 align=center>IDENTITAS PESERTA DIDIK</h1><br>

    <table style='font-size:15px' width='100%'>
        <tr><td width='25px'>1.</td>  <td width='190px'>Nama Lengkap Peserta Didik</td>   <td width='10px'> : </td><td> <?php echo "$nama_siswa"; ?></td></tr>
        <tr><td>2.</td>  <td width='190px'>Nomor Induk Siswa</td>                          <td width='10px'> : </td><td> <?php echo "$nis"; ?></td></tr>
        <tr><td>3.</td>  <td width='190px'>Tempat,Tanggal Lahir</td>                      <td width='10px'> : </td><td> <?php echo "$tempat_lahir, ".date("d-m-Y",strtotime($tanggal_lahir)); ?></td></tr>
        <tr><td>4.</td>  <td width='190px'>Jenis Kelamin</td>                             <td width='10px'> : </td><td> <?php echo "$jenis_kelamin"; ?></td></tr>
        <tr><td>5.</td>  <td width='190px'>Agama</td>                                     <td width='10px'> : </td><td> <?php echo "$agama"; ?></td></tr>
        <tr><td>6.</td>  <td width='190px'>Alamat Peserta Didik</td>                      <td width='10px'> : </td><td> <?php echo "$alamat_jalan"; ?></td></tr>
        <tr><td>7.</td>  <td width='190px'>Nomor Telepon Rumah</td>                       <td width='10px'> : </td><td> <?php echo "$telepon"; ?></td></tr>
        <tr><td>8.</td>  <td width='190px'>Nomor Handphone</td>                           <td width='10px'> : </td><td> <?php echo "$hp"; ?></td></tr>
        <tr><td>9.</td>  <td width='190px'>Email</td>                                       <td width='10px'> : </td><td> <?php echo "$email"; ?></td></tr>
    </table>
    <br><br><br>
    <table width='40%' style='float:right'>
        <tr><td>Bandar Lampung, <?php echo date('Y-m-d'); ?> <br>
                Kepala Sekolah,<br><br><br><br>


                <b><?php echo $nama_kepala_sekolah; ?><br>
                NIP : <?php echo $nip_kepala_sekolah; ?></b></td></tr>
    </table>
    <script>
    window.print();
    window.close();
    </script>
</body>
</html>