<html>
<head>
<title>Hal 5 - Raport Siswa</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/printer.css">
</head>
<body >

    <table width=100%>
        <tr><td width=130px>Nama Sekolah</td> <td> : <?php echo $nama_sekolah; ?> </td>       <td width=130px>Kelas </td>   <td>: <?php echo $nama_kelas; ?></td></tr>
        <tr><td>Alamat</td>                   <td> : <?php echo $alamat; ?> </td>     <td>Semester </td> <td>: <?php echo $semester; ?></td></tr>
        <tr><td>Nama Siswa</td>       <td> : <b><?php echo $nama_siswa; ?></b> </td>           <td>Tahun Ajaran </td> <td>: <?php echo $tahun_ajaran; ?></td></tr>
        <tr><td>No Induk</td>            <td> : <?php echo $nis; ?></td>        <td></td></tr>
    </table><br>

DESKRIPSI PENGETAHUAN DAN KETERAMPILAM
<table id='tablemodul1' width=100% style='margin-top:2px' border=1>
          <tr>
            <th width='160px' colspan='2'>Mata Pelajaran</th>
            <th width='140px'>Aspek</th>
            <th>Deskripsi</th>
          </tr>
    <?php
       $kelompok = $this->db->query("SELECT * FROM mst_kelompok_pelajaran WHERE aktif_kelompok_pelajaran = 1");  
       foreach($kelompok->result_array() as $k) {
      echo "<tr>
            <td colspan='7'><b>$k[nama_kelompok_pelajaran]</b></td>
          </tr>";
          $mapel = $this->db->query("SELECT nama_mapel,kode_mapel,id_jadwal_pelajaran FROM jadwal_pelajaran 
          INNER JOIN mst_mapel ON jadwal_pelajaran.id_mapel = mst_mapel.id_mapel 
          WHERE id_kelas = $id_kelas AND id_tahun_ajaran = $id_tahun_ajaran AND id_kelompok_pelajaran = $k[id_kelompok_pelajaran]");
          $no = 1;
        foreach($mapel->result_array() as $m) {                                 
     $nilai_raport = $this->db->query("SELECT * FROM nilai_raport WHERE id_siswa = $id_siswa")->row();
        echo "<tr>
                <td width='30px' rowspan=2 align=center>$no</td>
                <td width='160px' rowspan=2>$m[nama_mapel]</td>
                <td>Pengetahuan</td>
                <td>$nilai_raport->deskripsi_pengetahuan</td>
            </tr>
            <tr>
                <td>Keterampilan</td>
                <td>$nilai_raport->deskripsi_keterampilan</td>
            </tr>";
        $no++;
        }
      }

        echo "</table><br/>";
?>
    <script>
    window.print();
    window.close();
    </script>
</body>
</html>