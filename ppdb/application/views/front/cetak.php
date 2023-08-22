<div class="col-lg-4" style="margin-top:20px">
    <div class="card card-danger card-outline">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-file-user"></i> Informasi Pendaftaran </h3>
        <br>
        </div>
        <div class="card-body">
        <ul>
            <li><code class="highlighter-rouge text-navy">Silakan Download Formulir Terlebih dahulu.<a class="btn bg-maroon btn-xs" href="<?php echo base_url().'portal/download/'.$no_pendaftaran; ?>" target="_blank"><i class="fas fa-file-pdf"></i> Download Formulir Pendaftaran</a></code></li>
            <li><code class="highlighter-rouge text-navy">Silakan Melakukan Pembayaran Pendaftaran Sebesar <b class="text-danger">Rp. 150.000,-</b> ke <b class="text-info">Nomor Rekening :</b>
                <ul><li class="text-info"><b>BANK ABC</b></li>
                    <li class="text-info"><b>13456789</b></li>
                    <li class="text-info"><b>An. ASIS</b></li>
                </ul>
        
                <li>Silakan Lampirkan Bukti Pembayaran </li>
                <li>Informasi Lebih Lanjut bisa hubungi Admin.</li>
                </code></li>

        </ul>
        </div>
        <div class="card-body">
                      <div class="">
                        <img class="d-block w-100" src="<?php echo base_url(); ?>upload/info.jpg" >
                      </div>
              </div>
    </div>
</div>

<div class="col-lg-8" style="margin-top:20px" >
    <div class="card card-teal card-outline">
        <div class="card-header ">
            <h3 class="card-title"><i class="fas fa-id-card-alt"></i> Data Formulir Pendaftaran <b class="text-danger text-uppercase"><?php echo $nama_siswa; ?></b></h3>
            <a class="btn btn-danger rounded-right float-right btn-xs" href="<?php echo base_url().'portal/download/'.$no_pendaftaran; ?>" target="_blank"><i class="fas fa-file-pdf"></i> Download Formulir Pendaftaran</a>
        <!-- /.card-header -->
        <!-- form start -->
        <br>
        </div>
        <br>
        <div class="content-header animated pulse ">
      <div class="container-fluid">
        <div class="row mb-2" >
          <div class="col-sm-12">
             <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                                <i class="card-title"></i><center><b>FOTO SISWA</b></center>
                        </div>
                      <div class="row ml-1 mr-1">
                        <div class="card-body">
                              <center>
                               <?php
                                if (!empty($foto)) {

                                    echo '<img class="img-rounded elevation-2" style="width:160px;height:220px;" src="' . base_url() . 'upload/' . $foto . '">';
                                }
                                ?>
                                </center>
                                </div>
                        </div>
                    </div>
                  </div>
                  <!-- DATA KELAS -->
                  <div class="col-md-8">

                    <div class="card card-info card-outline">

                      <div class="card-header">
                                <i class="card-title"></i><center><b>DATA CALON SISWA</b></center>
                        </div>
                        <table class="table table-striped table-sm">
                                        <tr>
                                            <td style="width:200px;font-weight:bold;">No Pendaftaran</td>
                                            <td style="width:10px;">:</td>
                                            <td class="text-uppercase" style="font-weight:bold;"><?php echo $no_pendaftaran; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Jenis Pendaftaran</td>
                                            <td>:</td>
                                            <td><?php echo $jenis_pendaftaran; ?></td>
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
                        <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-ballot"></i> DATA LENGKAP CALON SISWA BARU <b>[ <?php echo $nama_siswa; ?> ]</b></h3>
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
        </div><!-- /.row -->
        <div class="card-footer mb-2">
          <a class="btn btn-danger rounded-right float-right btn-sm" href="<?php echo base_url().'portal/download/'.$no_pendaftaran; ?>" target="_blank"><i class="fas fa-file-pdf"></i> Download Formulir Pendaftaran</a>
                </div>
      </div><!-- /.container-fluid -->
    </div>
    </div>

</div>

<?php if ($this->session->flashdata('success')) {
    echo '<script>
                    toastr.options.timeOut = 2000;
                    toastr.success("' . $this->session->flashdata('success') . '");
                    </script>';
  } ?>

  <?php if ($this->session->flashdata('error')) {
    echo '<script>
       toastr.options.timeOut = 2000;
       toastr.error("' . $this->session->flashdata('error') . '");
       </script>';
  } ?>