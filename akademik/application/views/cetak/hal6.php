
<html>
<head>
<title>Hal 6 - Raport Siswa</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/printer.css">
</head>
<body>
    <table width=100%>
        <tr><td width=130px>Nama Sekolah</td> <td> : <?php echo $nama_sekolah; ?> </td>       <td width=130px>Kelas </td>   <td>: <?php echo $nama_kelas; ?></td></tr>
        <tr><td>Alamat</td>                   <td> : <?php echo $alamat; ?> </td>     <td>Semester </td> <td>: <?php echo $semester; ?></td></tr>
        <tr><td>Nama Siswa</td>       <td> : <b><?php echo $nama_siswa; ?></b> </td>           <td>Tahun Ajaran </td> <td>: <?php echo $tahun_ajaran; ?></td></tr>
        <tr><td>No Induk</td>            <td> : <?php echo $nis; ?></td>        <td></td></tr>
    </table><br>

    <b>C. Extrakulikuler</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='40px'>No</th>
            <th width='30%'>Kegiatan Extrakulikuler</th>
            <th>Nilai</th>
            <th>Deskripsi</th>
          </tr>
        <?php
          $extra = $this->db->query("SELECT * FROM nilai_ekstrakulikuler where id_tahun_ajaran = $id_tahun_ajaran AND id_siswa = $id_siswa AND id_kelas = $id_kelas");
          $no = 1;
          foreach($extra->result_array() as $ex) { 
            echo "<tr>
                    <td>$no</td>
                    <td>$ex[kegiatan]</td>
                    <td style='text-align:center;'>$ex[nilai]</td>
                    <td>$ex[deskripsi]</td>
                  </tr>";
              $no++;
          }
      echo "</table>";

echo "<b>D. Prestasi</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='40px'>No</th>
            <th width='30%'>Jenis Kegiatan</th>
            <th>Keterangan</th>
          </tr>";

          $prestasi = $this->db->query("SELECT * FROM nilai_prestasi where id_tahun_ajaran = $id_tahun_ajaran AND id_siswa = $id_siswa AND id_kelas = $id_kelas");
          $no = 1;
          foreach($prestasi->result_array() as $pr) {
            echo "<tr>
                    <td>$no</td>
                    <td>$pr[kegiatan]</td>
                    <td>$pr[keterangan]</td>
                  </tr>";
              $no++;
          }
      echo "</table>";

echo "<b>E. Ketidakhadiran</b>
      <table id='tablemodul1' width=100% border=1>
        <tr><td width='70%'>Sakit</td>  <td width='10px'> : </td> <td align=center></td> </tr>
        <tr><td>Izin</td>               <td> : </td>              <td align=center></td> </tr>
        <tr><td>Tanpa Keterangan</td>   <td> : </td>              <td align=center></td> </tr>
      </table>";

echo "<b>F. Catatan Wali Kelas</b>
      <table id='tablemodul1' width=100% height=80px border=1>
        <tr><td></td></tr>
      </table>";

echo "<b>G. Tanggapan Orang tua / Wali</b>
      <table id='tablemodul1' width=100% height=80px border=1>
        <tr><td></td></tr>
      </table><br/>";

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