<html>
<head>
<title>Hal 1 - Raport Siswa</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/printer.css">
<style type="text/css">
  td { padding:9px; }
</style>
</head>
<body>
    <h1 align=center>RAPORT <br>SEKOLAH MENENGAH ATAS <br> (SMA)</h1><br>

    <table style='font-size:23px' width='100%'>
        <tr><td width='180px'>Nama Sekolah</td>   <td width='10px'> : </td><td> <?php echo "$nama_sekolah"; ?></td></tr>
        <tr><td width='180px'>NPSN/NSS</td>       <td width='10px'> : </td><td> <?php echo "$npsn"; ?></td></tr>
        <tr><td width='180px'>NSS</td>            <td width='10px'> : </td><td> <?php echo "$nss"; ?></td></tr>
        <tr><td width='180px'>Alamat Sekolah</td> <td width='10px'> : </td><td> <?php echo "$alamat"; ?></td></tr>
        <tr><td width='180px'>Kode POS</td>        <td width='10px'>   </td><td> <?php echo "$kodepos"; ?></td></tr>
        <tr><td width='180px'>Telepon</td>        <td width='10px'>   </td><td> <?php echo "$no_telepon"; ?></td></tr>
        <tr><td width='180px'>Kelurahan</td>      <td width='10px'> : </td><td> <?php echo "$kelurahan"; ?></td></tr>
        <tr><td width='180px'>Kecamatan</td>      <td width='10px'> : </td><td> <?php echo "$kecamatan"; ?></td></tr>
        <tr><td width='180px'>Kabupaten/Kota</td> <td width='10px'> : </td><td> <?php echo "$kabupaten"; ?></td></tr>
        <tr><td width='180px'>Provinsi</td>       <td width='10px'> : </td><td> <?php echo "$provinsi"; ?></td></tr>
        <tr><td width='180px'>Website</td>        <td width='10px'> : </td><td> <?php echo "$website"; ?></td></tr>
        <tr><td width='180px'>E-Mail</td>         <td width='10px'> : </td><td> <?php echo "$email"; ?></td></tr>
    </table>
    <script>
    window.print();
    window.close();
    </script>
</body>
</html>