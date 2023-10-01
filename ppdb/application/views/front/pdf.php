<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();

?>
<style>
.ttd p {
    font-size: 18px;
}
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}


table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

h1 {
    margin: 0;
    font-size: 24px;
    text-align: center;line-height:35px;
}
p {
    font-weight:400;
    margin: 0;
    font-size: 14px;
    text-align: center;
}
</style>
<body>
<div style="display:inline-block;vertical-align:middle;">
<!-- <img style="vertical-align:middle;width:70px;margin:0 auto;" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/sympel/master/upload/'.$sekolah->logo; ?>"> -->
<img style="vertical-align:middle;width:70px;margin:0 auto;" src="../master/upload/<?php echo $sekolah->logo; ?>">

</div>
<div style="display:inline-block;vertical-align:middle;">
<h1><?php echo $nama_sekolah; ?></h1>
<p><?php echo $alamat_sekolah; ?></p>
<p><?php echo $kontak_sekolah; ?></p>
</div>
<hr>
<div class="row mb-2" >
          <div class="col-sm-12">
             <div class="container-fluid">
                <div class="row">
                  <!-- DATA KELAS -->
                  <div class="col-md-8">

                    <div class="card card-info card-outline">

                      <div class="card-header">
                                <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-ballot"></i><center> DATA CALON SISWA BARU</center></h3>
                        </div>
                        <table class="table table-striped table-sm">
                                        <tr>
                                            <td style="width:200px;font-weight:bold;">No Pendaftaran</td>
                                            <td style="width:10px;">:</td>
                                            <td class="text-uppercase" style="font-weight:bold;"><?php echo $no_pendaftaran; ?></td>
                                            <td><b><center><b>FOTO SISWA</b></center></b></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Jenis Pendaftaran</td>
                                            <td>:</td>
                                            <td><?php echo $jenis_pendaftaran; ?></td>
                                            <td style="width:150px;" rowspan="6"><img align="center" class="profile-user-img  elevation-2" style="width:150px;height:200px;margin:0 auto;" src="../ppdb/upload/<?php echo $foto; ?>"></td>


                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Jalur Pendaftaran</td>
                                            <td>:</td>
                                            <td><?php echo $jalur_pendaftaran; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Nama Siswa</td>
                                            <td>:</td>
                                            <td><?php echo $nama_siswa; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?php echo $jenis_kelamin; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Tempat , Tanggal Lahir
                                            <td>:</td>
                                            <td><?php echo $tempat_lahir . ', ' . date("d-m-Y", strtotime($tanggal_lahir)); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Agama</td>
                                            <td>:</td>
                                            <td><?php echo $agama; ?></td>
                                        </tr>
                      </table>
                    </div>
                  </div>                 
                 
              
              <div class="col-md-12">
                    <div class="card card-danger card-outline">
                      <div class="card-header">
                        <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-ballot"></i><center> DATA LENGKAP CALON SISWA BARU</center></h3>
                        <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                        </div>
                      </div>
                          <div class="card-body p-0">
                        <table class="table table-striped table-sm">
                                        <tr>
                                            <td style="font-weight:bold;">NIK</td>
                                            <td>:</td>
                                            <td><?php echo $nik; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Hobi</td>
                                            <td>:</td>
                                            <td><?php echo $hobi; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Cita-cita</td>
                                            <td>:</td>
                                            <td><?php echo $cita_cita; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Alamat</td>
                                            <td>:</td>
                                            <td><?php echo $alamat; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">RT</td>
                                            <td>:</td>
                                            <td><?php echo $rt; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">RW</td>
                                            <td>:</td>
                                            <td><?php echo $rw; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Dusun</td>
                                            <td>:</td>
                                            <td><?php echo $dusun; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Kelurahan</td>
                                            <td>:</td>
                                            <td><?php echo $kelurahan; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Kabupaten</td>
                                            <td>:</td>
                                            <td><?php echo $kabupaten; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Kode Pos</td>
                                            <td>:</td>
                                            <td><?php echo $kode_pos; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Tempat Tinggal</td>
                                            <td>:</td>
                                            <td><?php echo $tempat_tinggal; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Transportasi</td>
                                            <td>:</td>
                                            <td><?php echo $transportasi; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">No Telp</td>
                                            <td>:</td>
                                            <td><?php echo $no_hp; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Email</td>
                                            <td>:</td>
                                            <td><?php echo $email; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Kewarganegaraan</td>
                                            <td>:</td>
                                            <td><?php echo $kewarganegaraan; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Tinggi Badan</td>
                                            <td>:</td>
                                            <td><?php echo $tinggi_badan . 'cm'; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Berat Badan</td>
                                            <td>:</td>
                                            <td><?php echo $berat_badan . 'kg'; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Waktu Tempuh</td>
                                            <td>:</td>
                                            <td><?php echo $waktu_tempuh_ke_sekolah . 'Menit';?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Jumlah Saudara</td>
                                            <td>:</td>
                                            <td><?php echo $jumlah_saudara . 'Orang'; ?></td>
                                        </tr>
                                        <tr border="0">
                                            <td colspan="3" class="text-danger text-center bg-danger"><b>DATA SEKOLAH ASAL</b></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Nama Sekolah Asal</td>
                                            <td>:</td>
                                            <td><?php echo $asal_sekolah;?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Alamat Sekolah Asal</td>
                                            <td>:</td>
                                            <td><?php echo $alamat_sekolah_asal; ?></td>
                                        </tr>
                                        <tr border="0">
                                            <td colspan="3" class="text-danger text-center bg-navy"><b>DATA AYAH</b></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Nama Ayah</td>
                                            <td>:</td>
                                            <td><?php echo $nama_ayah; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Tahun Lahir Ayah</td>
                                            <td>:</td>
                                            <td><?php echo $tahun_lahir_ayah; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Pendidikan Ayah</td>
                                            <td>:</td>
                                            <td><?php echo $pendidikan_ayah; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Pekerjaan Ayah</td>
                                            <td>:</td>
                                            <td><?php echo $pekerjaan_ayah; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Penghasilan Ayah</td>
                                            <td>:</td>
                                            <td><?php echo $penghasilan_ayah; ?></td>
                                        </tr>
                                        <tr border="0">
                                            <td colspan="3" class="text-danger text-center bg-info"><b>DATA IBU</b></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Nama Ibu</td>
                                            <td>:</td>
                                            <td><?php echo $nama_ibu; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Tahun Lahir Ibu</td>
                                            <td>:</td>
                                            <td><?php echo $tahun_lahir_ibu; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Pendidikan Ibu</td>
                                            <td>:</td>
                                            <td><?php echo $pendidikan_ibu; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Pekerjaan Ibu</td>
                                            <td>:</td>
                                            <td><?php echo $pekerjaan_ibu; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Penghasilan Ibu</td>
                                            <td>:</td>
                                            <td><?php echo $penghasilan_ibu; ?></td>
                                        </tr>
                                        <tr border="0">
                                            <td colspan="3" class="text-danger text-center bg-teal"><b>DATA WALI</b></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Nama Wali</td>
                                            <td>:</td>
                                            <td><?php echo $nama_wali; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Tahun Lahir Wali</td>
                                            <td>:</td>
                                            <td><?php echo $tahun_lahir_wali; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Pendidikan Wali</td>
                                            <td>:</td>
                                            <td><?php echo $pendidikan_wali; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Pekerjaan Wali</td>
                                            <td>:</td>
                                            <td><?php echo $pekerjaan_wali; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Penghasilan Wali</td>
                                            <td>:</td>
                                            <td><?php echo $penghasilan_wali; ?></td>
                                        </tr>


                      </table>
                    
                    </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div><!-- /.col -->
        </div>
<br><br>
<div class="ttd" style="float:right;text-align:left !important;">
<p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?> </p>
<br><br><br><br><br>
<p style="margin:0;">(<?php echo $nama_siswa; ?>)</p>
</div>

</body>