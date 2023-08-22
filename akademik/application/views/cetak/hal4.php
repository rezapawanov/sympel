<html>
<head>
<title>Hal 4 - Raport Siswa</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/printer.css">
</head>
<body >

    <table width=100%>
        <tr><td width=130px>Nama Sekolah</td> <td> : <?php echo $nama_sekolah; ?> </td>       <td width=130px>Kelas </td>   <td>: <?php echo $nama_kelas; ?></td></tr>
        <tr><td>Alamat</td>                   <td> : <?php echo $alamat; ?> </td>     <td>Semester </td> <td>: <?php echo $semester; ?></td></tr>
        <tr><td>Nama Siswa</td>       <td> : <b><?php echo $nama_siswa; ?></b> </td>           <td>Tahun Ajaran </td> <td>: <?php echo $tahun_ajaran; ?></td></tr>
        <tr><td>No Induk</td>            <td> : <?php echo $nis; ?></td>        <td></td></tr>
    </table><br>

    <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='160px' colspan='2' rowspan='2'>Mata Pelajaran</th>
            <th rowspan='2'>KKM</th>
            <th colspan='2' style='text-align:center'>Pengetahuan</th>
            <th colspan='2' style='text-align:center'>Keterampilan</th>
          </tr>
          <tr>
            <th>Nilai</th>
            <th>Predikat</th>
            <th>Nilai</th>
            <th>Predikat</th>
          </tr>
    <?php    
      $kelompok = $this->db->query("SELECT * FROM mst_kelompok_pelajaran WHERE aktif_kelompok_pelajaran = 1");  
      foreach($kelompok->result_array() as $k) { 
      echo "<tr>
            <td colspan='7'><b>$k[nama_kelompok_pelajaran]</b></td>
          </tr>";
        $mapel = $this->db->query("SELECT nama_mapel,kode_mapel,id_jadwal_pelajaran FROM jadwal_pelajaran 
                                INNER JOIN mst_mapel ON jadwal_pelajaran.id_mapel = mst_mapel.id_mapel 
                                ");
        $no = 1;
        foreach($mapel->result_array() as $m) {                                 
        $nilai_raport = $this->db->query("SELECT * FROM nilai_raport WHERE id_siswa = $id_siswa")->row();

        echo "<tr>
                <td align=center>$no</td>
                <td>$m[nama_mapel]</td>
                <td align=center>77</td>
                <td align=center>".number_format($nilai_raport->nilai_pengetahuan)."</td>
                <td align=center>$nilai_raport->predikat_pengetahuan</td>
                <td align=center>".number_format($nilai_raport->nilai_keterampilan)."</td>
                <td align=center>$nilai_raport->predikat_keterampilan</td>
            </tr>";
        $no++;
        }
      }

        echo "</table><br/>";
        $predikat = $this->db->query("SELECT * FROM mst_predikat");
    
          echo "<center><table width='100%' border=1 id='tablemodul1'>
              <tr>
                  <th colspan='4'>Predikat</th>
              </tr>
              <tr>";
                 foreach($predikat->result_array() as $g) { 
                      echo "<th>$g[grade] = $g[keterangan]</th>";
                  }
              echo "</tr>
              <tr>";
                 foreach($predikat->result_array() as $g) {
                      echo "<th>$g[dari_nilai] - $g[sampai_nilai]</th>";
                  }
              echo "</tr>
          </table></center><br>";
?>

<table border=0 width=100%>
  <tr>
    <td width="260" align="left">Orang Tua / Wali</td>
    <td width="520"align="center">Mengetahui <br> Kepala <?php echo $nama_sekolah; ?></td>
    <td width="260" align="left">Bandar Lampung, <?php echo date("Y-m-d"); ?> <br> Wali Kelas</td>
  </tr>
  <tr>
    <td align="left"><br /><br /><br /><br /><br />
      ................................... <br /><br /></td>

    <td align="center" valign="top"><br /><br /><br /><br /><br />
            <b><?php echo $nama_kepala_sekolah; ?><br>
            NIP : <?php echo $nip_kepala_sekolah; ?></b>
    </td>

    <td align="left" valign="top"><br /><br /><br /><br /><br />
      <b><?php echo $nama_walikelas; ?><br />
      NIP : <?php echo $nip_walikelas; ?></b>
    </td>
  </tr>
</table> 

    <script>
    window.print();
    window.close();
    </script>
</body>
</html>