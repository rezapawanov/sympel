  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i></i> <?php echo $judul; ?>
          </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#"><?php echo $judul; ?></a></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <form action="<?php echo base_url(); ?>app/save_biodata" method="post" enctype="multipart/form-data">
      <div class="container-fluid">
        <div class="row">
        <!-- /.row -->
        <div class="animated fadeInLeft col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
                <a class="btn btn-danger float-right" href="<?php echo base_url() . 'app/biodata_edit/' . $id_alumni; ?>"><i class="fa fa-edit"> </i> Ubah Data</a>
              </div>
              <!-- /.card-header -->
            <div class="row ml-2" >
              <ul class="nav nav-tabs col-md-10 mt-3 ml-2" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#tab_1" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Data Diri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_2" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Pekerjaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_3" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Kuliah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_4" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Wirausaha</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_5" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Quisioner</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_6" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Informasi Akun</a>
              </li>

            </ul>
            <div class="tab-content ml-2 mr-2" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active mt-1" id="tab_1" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-12">
                       <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">No Handphone</label>
                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="hp" value="<?php echo $hp; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Tahun Masuk</label>
                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="angkatan" value="<?php echo $angkatan; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="tahun_lulus" value="<?php echo $tahun_lulus; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="jenis_kelamin" disabled>
                        <option value>PILIH</option>
                        <option value="Laki-Laki" <?php if ($jenis_kelamin == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Aktivitas Saat Ini</label>
                    <div class="col-sm-12">
                      <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="aktivitas_1" <?php if ($aktivitas_1 == 'Kerja') echo 'checked'; ?> value="Kerja" disabled>
                        <label for="checkboxSuccess1">KERJA
                        </label>
                      </div>&nbsp;
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="aktivitas_2" <?php if ($aktivitas_2 == 'Kuliah') echo 'checked'; ?> value="Kuliah" disabled>
                        <label for="checkboxSuccess2">KULIAH
                        </label>
                      </div>&nbsp;
                      <div class="icheck-info d-inline">
                        <input type="checkbox" name="aktivitas_3" <?php if ($aktivitas_3 == 'Wirausaha') echo 'checked'; ?> value="Wirausaha" disabled>
                        <label for="checkboxSuccess3">
                          WIRAUSAHA
                        </label>
                      </div>&nbsp;
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="aktivitas_4" <?php if ($aktivitas_4 == 'Yang Lain') echo 'checked'; ?> value="Yang Lain" disabled>
                        <label for="checkboxSuccess3">
                          LAINNYA
                        </label>
                      </div>
                    </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="tab_2" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Apakah Anda pernah bekerja setelah lulus dari SMK <span style=color:red;><?php echo $nama_sekolah ?></span></label>
                    <div class="col-sm-12">
                       <select class="form-control" name="pernah_bekerja" disabled>
                                                        <option value>Pilih</option>
                                                        <option value="Ya, Pernah" <?php if ($pernah_bekerja == 'Ya, Pernah') echo 'selected'; ?>>Ya, Pernah</option>
                                                        <option value="Ya, masih bekerja sampai sekarang" <?php if ($pernah_bekerja == 'Ya, masih bekerja sampai sekarang') echo 'selected'; ?>>Ya, masih bekerja sampai sekarang</option>
                                                        <option value="Tidak Pernah" <?php if ($pernah_bekerja == 'Tidak Pernah') echo 'selected'; ?>>Tidak Pernah</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Setelah lulus, berapa lama waktu yang Anda butuhkan untuk mendapatkan pekerjaan?</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="lama_dapat_kerja" disabled>
                                                        <option value>Pilih</option>
                                                        <option value="1 < Bulan" <?php if ($lama_dapat_kerja == '1 < Bulan') echo 'selected'; ?>>1 < Bulan</option> <option value="1 - 3 Bulan" <?php if ($lama_dapat_kerja == '1 - 3 Bulan') echo 'selected'; ?>>1 - 3 Bulan</option>
                                                        <option value="3 - 6 Bulan" <?php if ($lama_dapat_kerja == '3 - 6 Bulan') echo 'selected'; ?>>3 - 6 Bulan</option>
                                                        <option value="6-12 bulan" <?php if ($lama_dapat_kerja == '6-12 bulan') echo 'selected'; ?>>6-12 bulan</option>
                                                        <option value="1 - 2 Tahun" <?php if ($lama_dapat_kerja == '1 - 2 Tahun') echo 'selected'; ?>>1 - 2 Tahun</option>
                                                        <option value="> 2 Tahun" <?php if ($lama_dapat_kerja == '> 2 Tahun') echo 'selected'; ?>>> 2 Tahun</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Bidang pekerjaan apa yang Anda tekuni saat ini?</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="bidang_pekerjaan" disabled>
                                                        <option value>Pilih</option>
                                                        <option value="Bidang Farmasi" <?php if ($bidang_pekerjaan == 'Bidang Farmasi') echo 'selected'; ?>>Bidang Farmasi</option>
                                                        <option value="Bidang Kesehatan Non Farmasi" <?php if ($bidang_pekerjaan == 'Bidang Kesehatan Non Farmasi') echo 'selected'; ?>>Bidang Kesehatan Non Farmasi</option>
                                                        <option value="Non Kesehatan" <?php if ($bidang_pekerjaan == 'Non Kesehatan') echo 'selected'; ?>>Non Kesehatan</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Bagaimana tingkat kemudahan Anda dalam mendapatkan pekerjaan?</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="tingkat_kemudahan" disabled>
                                                        <option value>Pilih</option>
                                                        <option value="Mudah sekali" <?php if ($tingkat_kemudahan == 'Mudah sekali') echo 'selected'; ?>>Mudah sekali</option>
                                                        <option value="Mudah" <?php if ($tingkat_kemudahan == 'Mudah') echo 'selected'; ?>>Mudah</option>
                                                        <option value="Sedang-sedang saja" <?php if ($tingkat_kemudahan == 'Sedang-sedang saja') echo 'selected'; ?>>Sedang-sedang saja</option>
                                                        <option value="Sulit" <?php if ($tingkat_kemudahan == 'Sulit') echo 'selected'; ?>>Sulit</option>
                                                        <option value="Sulit Sekali" <?php if ($tingkat_kemudahan == 'Sulit Sekali') echo 'selected'; ?>>Sulit Sekali</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Darimana Anda mendapatkan informasi lowongan pekerjaaan?</label>
                    <div class="col-sm-12">
                      <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="info_kerja_1" <?php if ($info_kerja_1 == 'SMK <span style=color:red;><?php echo $nama_sekolah ?></span>') echo 'checked'; ?> value="SMK <span style=color:red;><?php echo $nama_sekolah ?></span>" disabled>
                        <label for="checkboxSuccess1">SMK <span style=color:red;><?php echo $nama_sekolah ?></span>
                        </label>
                      </div><br>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="info_kerja_2" <?php if ($info_kerja_2 == 'Wirausaha') echo 'checked'; ?> value="Wirausaha" disabled>
                        <label for="checkboxSuccess2">TEMAN SESAMA ALUMNI
                        </label>
                      </div><br>
                      <div class="icheck-info d-inline">
                        <input type="checkbox" name="info_kerja_3" <?php if ($info_kerja_3 == 'Internet') echo 'checked'; ?> value="Internet" disabled>
                        <label for="checkboxSuccess3">
                          INTERNET
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="info_kerja_4" <?php if ($info_kerja_4 == 'Saudara') echo 'checked'; ?> value="Saudara" disabled>
                        <label for="checkboxSuccess3">
                          SAUDARA
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="info_kerja_5" <?php if ($info_kerja_5 == ' Yang Lain') echo 'checked'; ?> value=" Yang Lain" disabled>
                        <label for="checkboxSuccess3">
                          YANG LAINNYA
                        </label>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Berapa jumlah gaji yang Anda terima sebagai lulusan SMK <span style=color:red;><?php echo $nama_sekolah ?></span>?</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="jumlah_gaji" disabled>
                                                        <option value>Pilih</option>
                                                        <option value="< Rp 500.000" <?php if ($jumlah_gaji == '< Rp 500.000') echo 'selected'; ?>>
                                                            < Rp 500.000</option> <option value="Rp 500.000 - 1.000.000" <?php if ($jumlah_gaji == 'Rp 500.000 - 1.000.000') echo 'selected'; ?>>Rp 500.000 - 1.000.000
                                                        </option>
                                                        <option value="Rp 1.000.000 - 1.500.000" <?php if ($jumlah_gaji == 'Rp 1.000.000 - 1.500.000') echo 'selected'; ?>>Rp 1.000.000 - 1.500.000</option>
                                                        <option value="Rp 1.500.000 - 2.000.000" <?php if ($jumlah_gaji == 'Rp 1.500.000 - 2.000.000') echo 'selected'; ?>>Rp 1.500.000 - 2.000.000</option>
                                                        <option value="> Rp 2.000.000" <?php if ($jumlah_gaji == '> Rp 2.000.000') echo 'selected'; ?>>> Rp 2.000.000</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Dimana tempat Anda pernah bekerja atau tempat Anda bekerja saat ini? (Nama Perusahaan)</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="nama_tempat_kerja" value="<?php echo $nama_tempat_kerja; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Alamat Perusahaan</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="alamat_perusahaan" value="<?php echo $alamat_perusahaan; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Kabupaten / Kota Perusahaan</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="kabupaten_perusahaan" value="<?php echo $kabupaten_perusahaan; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Sejak kapan Anda bekerja pada Perusahaan tersebut?</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control tglcalendar" name="tanggal_mulai_kerja" value="<?php echo $tanggal_mulai_kerja; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Sampai Dengan</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control tglcalendar" name="tanggal_selesai_kerja" value="<?php echo $tanggal_selesai_kerja; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Sebutkan posisi jabatan Anda pada Perusahaan tersebut</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="jabatan" value="<?php echo $jabatan; ?>" disabled>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade show" id="tab_3" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Aktivitas Perkuliahan</label>
                    <div class="col-sm-12">
                       <select class="form-control select2" name="aktivitas_kuliah" disabled>
                                                        <option value>Pilh</option>
                                                        <option value="Kuliah" <?php if ($aktivitas_kuliah == 'Kuliah') echo 'selected'; ?>>Kuliah</option>
                                                        <option value="Kuliah Sambil Kerja" <?php if ($aktivitas_kuliah == 'Kuliah Sambil Kerja') echo 'selected'; ?>>Kuliah Sambil Kerja</option>
                                                        <option value="Sudah lulus kuliah" <?php if ($aktivitas_kuliah == 'Sudah lulus kuliah') echo 'selected'; ?>>Sudah lulus kuliah</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Status Perguruan Tinggi</label>
                    <div class="col-sm-12">
                      <select class="form-control select2" name="status_perguruan_tinggi" disabled>
                                                        <option value>Pilh</option>
                                                        <option value="Negeri" <?php if ($status_perguruan_tinggi == 'Negeri') echo 'selected'; ?>>Negeri</option>
                                                        <option value="Swasta" <?php if ($status_perguruan_tinggi == 'Swasta') echo 'selected'; ?>>Swasta</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Nama Perguruan Tinggi</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="nama_perguruan_tinggi" value="<?php echo $nama_perguruan_tinggi; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Jenjang Pendidikan</label>
                    <div class="col-sm-12">
                      <select class="form-control select2" name="jenjang_pendidikan" disabled>
                                                        <option value>Pilh</option>
                                                        <option value="D1" <?php if ($jenjang_pendidikan == 'D1') echo 'selected'; ?>>D1</option>
                                                        <option value="D2" <?php if ($jenjang_pendidikan == 'D2') echo 'selected'; ?>>D2</option>
                                                        <option value="D3" <?php if ($jenjang_pendidikan == 'D3') echo 'selected'; ?>>D3</option>
                                                        <option value="D4" <?php if ($jenjang_pendidikan == 'D4') echo 'selected'; ?>>D4</option>
                                                        <option value="S1" <?php if ($jenjang_pendidikan == 'S1') echo 'selected'; ?>>S1</option>
                                                        <option value="Profesi" <?php if ($jenjang_pendidikan == 'Profesi') echo 'selected'; ?>>Profesi</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Jurusan/Program Studi</label>
                    <div class="col-sm-12">
                     <input type="text" class="form-control" name="program_studi" value="<?php echo $program_studi; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Jalur Masuk Perguruan Tinggi</label>
                    <div class="col-sm-12">
                     <select class="form-control select2" name="jalur_masuk" disabled>
                                                        <option value>Pilh</option>
                                                        <option value="SNMPTN" <?php if ($jalur_masuk == 'SNMPTN') echo 'selected'; ?>>SNMPTN</option>
                                                        <option value="SBMPTN" <?php if ($jalur_masuk == 'SBMPTN') echo 'selected'; ?>>SBMPTN</option>
                                                        <option value="PMPAP" <?php if ($jalur_masuk == 'PMPAP') echo 'selected'; ?>>PMPAP</option>
                                                        <option value="SIPENMARU / Poltekkes" <?php if ($jalur_masuk == 'SIPENMARU / Poltekkes') echo 'selected'; ?>>SIPENMARU / Poltekkes</option>
                                                        <option value="Jalur Prestasi" <?php if ($jalur_masuk == 'Jalur Prestasi') echo 'selected'; ?>>Jalur Prestasi</option>
                                                        <option value="Ujian Mandiri" <?php if ($jalur_masuk == 'Ujian Mandiri') echo 'selected'; ?>>Ujian Mandiri</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Mulai Kuliah</label>
                    <div class="col-sm-12">
                     <input type="text" class="form-control tglcalendar" name="mulai_kuliah" value="<?php echo $mulai_kuliah; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Biaya Per Semester</label>
                    <div class="col-sm-12">
                     <input type="number" class="form-control" name="biaya_semester" value="<?php echo $biaya_semester; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Status Kuliah</label>
                    <div class="col-sm-12">
                     <select class="form-control" name="status_kuliah" disabled>
                                                        <option value>Pilh</option>
                                                        <option value="Aktif" <?php if ($status_kuliah == 'Aktif') echo 'selected'; ?>>Aktif</option>
                                                        <option value="Non Aktif" <?php if ($status_kuliah == 'Non Aktif') echo 'selected'; ?>>Non Aktif</option>
                                                    </select>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade mr-2" id="tab_4" role="tabpanel" aria-labelledby="custom-content-above-settings-tab">
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-12">
                     <input type="text" class="form-control" name="nama_perusahaan_wirausaha" value="<?php echo $nama_perusahaan_wirausaha; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Jenis Usaha</label>
                    <div class="col-sm-12">
                      <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="jenis_usaha_1" <?php if ($jenis_usaha_1 == 'Jasa') echo 'checked'; ?> value="Jasa" disabled>
                        <label for="checkboxSuccess1">Jasa
                        </label>
                      </div>&nbsp;
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="jenis_usaha_2" <?php if ($jenis_usaha_2 == 'Barang') echo 'checked'; ?> value="Barang" disabled>
                        <label for="checkboxSuccess2">Barang
                        </label>
                      </div>&nbsp;
                      <div class="icheck-info d-inline">
                        <input type="checkbox" name="jenis_usaha_3" <?php if ($jenis_usaha_3 == 'Bidang Farmasi') echo 'checked'; ?> value="Bidang Farmasi" disabled>
                        <label for="checkboxSuccess3">
                          Bidang Farmasi
                        </label>
                      </div>&nbsp;
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="jenis_usaha_4" <?php if ($jenis_usaha_4 == 'Yang Lain') echo 'checked'; ?> value="Yang Lain" disabled>
                        <label for="checkboxSuccess3">
                          Lainya
                        </label>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Mulai Usaha</label>
                    <div class="col-sm-12">
                     <input type="text" class="form-control tglcalendar" name="mulai_usaha" value="<?php echo $mulai_usaha; ?>" disabled>
                    </div>
                </div>
                 <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Status Wirausaha</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="status_wirausaha" disabled>
                                                        <option value>Pilh</option>
                                                        <option value="Aktif" <?php if ($status_wirausaha == 'Aktif') echo 'selected'; ?>>Aktif</option>
                                                        <option value="Non Aktif" <?php if ($status_wirausaha == 'Non Aktif') echo 'selected'; ?>>Non Aktif</option>
                                                    </select>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade mr-2" id="tab_5" role="tabpanel" aria-labelledby="custom-content-above-settings-tab">
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Bagaimana kesesuaian Pengetahuan dan Keterampilan yang Anda peroleh dari SMK <span style=color:red;><?php echo $nama_sekolah ?></span> dengan tuntutan pekerjaan Anda? <span style="color:red;">*</span></label>
                    <div class="col-sm-12">
                     <select class="form-control" name="kesesuaiaan_pengetahuan" disabled>
                                                        <option value>Pilh</option>
                                                        <option value="Tidak Sesuai" <?php if ($kesesuaiaan_pengetahuan == 'Tidak Sesuai') echo 'selected'; ?>>Tidak Sesuai</option>
                                                        <option value="Kurang Sesuai" <?php if ($kesesuaiaan_pengetahuan == 'Kurang Sesuai') echo 'selected'; ?>>Kurang Sesuai</option>
                                                        <option value="Cukup Sesuai" <?php if ($kesesuaiaan_pengetahuan == 'Cukup Sesuai') echo 'selected'; ?>>Cukup Sesuai</option>
                                                        <option value="Sangat Sesuai" <?php if ($kesesuaiaan_pengetahuan == 'Sangat Sesuai') echo 'selected'; ?>>Sangat Sesuai</option>
                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Bidang Kompetensi apa yang sudah diberikan oleh SMK <span style=color:red;><?php echo $nama_sekolah ?></span> dalam menunjang kinerja Anda dalam bekerja? <span style="color:red;">*</label>
                    <div class="col-sm-12">
                      <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_kompetesi_1" <?php if ($bidang_kompetesi_1 == 'Kompetensi Bidang Kefarmasian') echo 'checked'; ?> value="Kompetensi Bidang Kefarmasian" disabled>
                        <label for="checkboxSuccess1">Kompetensi Bidang Kefarmasian
                        </label>
                      </div><br>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="bidang_kompetesi_2" <?php if ($bidang_kompetesi_2 == 'Kompetensi Bidang Pengetahuan Umum') echo 'checked'; ?> value="Kompetensi Bidang Pengetahuan Umum" disabled>
                        <label for="checkboxSuccess2">Kompetensi Bidang Pengetahuan Umum
                        </label>
                      </div><br>
                      <div class="icheck-info d-inline">
                        <input type="checkbox" name="bidang_kompetesi_3" <?php if ($bidang_kompetesi_3 == 'Kompetensi Bidang Sikap dan Perilaku') echo 'checked'; ?> value="Kompetensi Bidang Sikap dan Perilaku" disabled>
                        <label for="checkboxSuccess3">
                          Kompetensi Bidang Sikap dan Perilaku
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="bidang_kompetesi_4" <?php if ($bidang_kompetesi_4 == 'Kompetensi Bidang Religius') echo 'checked'; ?> value="Kompetensi Bidang Religius" disabled>
                        <label for="checkboxSuccess3">
                          Kompetensi Bidang Religius
                        </label>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Dalam Kompetensi Bidang Kefarmasian, Materi apa saja yang sangat menunjang kinerja Anda di dunia kerja? <span style="color:red;">*</label>
                    <div class="col-sm-12">
                      <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_kefarmasian_1" <?php if ($bidang_kefarmasian_1 == 'Ilmu Resep & Praktikum') echo 'checked'; ?> value="Ilmu Resep & Praktikum" disabled>
                        <label for="checkboxSuccess1">Ilmu Resep & Praktikum
                        </label>
                      </div><br>
                      <div class="icheck-success d-inline">
                        <input type="checkbox" name="bidang_kefarmasian_2" <?php if ($bidang_kefarmasian_2 == 'Farmakologi') echo 'checked'; ?> value="Farmakologi" disabled>
                        <label for="checkboxSuccess2">Farmakologi
                        </label>
                      </div><br>
                      <div class="icheck-info d-inline">
                        <input type="checkbox" name="bidang_kefarmasian_3" <?php if ($bidang_kefarmasian_3 == 'Farmakognosi') echo 'checked'; ?> value="Farmakognosi" disabled>
                        <label for="checkboxSuccess3">
                          Farmakognosi
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="bidang_kefarmasian_4" <?php if ($bidang_kefarmasian_4 == 'Manajemen Farmasi') echo 'checked'; ?> value="Manajemen Farmasi" disabled>
                        <label for="checkboxSuccess3">
                          Manajemen Farmasi
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="bidang_kefarmasian_5" <?php if ($bidang_kefarmasian_5 == 'Kimia Farmasi Analisis') echo 'checked'; ?> value="Kimia Farmasi Analisis" disabled> 
                        <label for="checkboxSuccess3">
                          Kimia Farmasi Analisis
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="bidang_kefarmasian_6" <?php if ($bidang_kefarmasian_6 == 'Peraturan Perundang-undangan') echo 'checked'; ?> value="Peraturan Perundang-undangan" disabled>
                        <label for="checkboxSuccess3">
                          Peraturan Perundang-undangan
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="bidang_kefarmasian_7" <?php if ($bidang_kefarmasian_7 == 'IKM') echo 'checked'; ?> value="IKM" disabled>
                        <label for="checkboxSuccess3">
                          IKM
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                        <input type="checkbox" name="bidang_kefarmasian_8" <?php if ($bidang_kefarmasian_8 == 'Sinonim') echo 'checked'; ?> value="Sinonim" disabled>
                        <label for="checkboxSuccess3">
                          Sinonim
                        </label>
                      </div><br>
                      <div class="icheck-warning d-inline">
                       <input type="checkbox" name="bidang_kefarmasian_9" <?php if ($bidang_kefarmasian_9 == 'Yang lain') echo 'checked'; ?> value="Yang lain" disabled>
                        <label for="checkboxSuccess3">
                          Lainya
                        </label>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Dalam Kompetensi Bidang Pengetahuan Umum, Materi apa saja yang sangat menunjang kinerja Anda di dunia kerja? <span style="color:red;">*</label>
                    <div class="col-sm-12">
                      <div class="form-group clearfix">
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_pengetahuan_1" <?php if ($bidang_pengetahuan_1 == 'Matematika') echo 'checked'; ?> value="Matematika" disabled>
                        <label for="checkboxSuccess1">Matematika
                        </label>
                      </div><br>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_pengetahuan_2" <?php if ($bidang_pengetahuan_2 == 'Bahasa Inggris') echo 'checked'; ?> value="Bahasa Inggris" disabled>
                        <label for="checkboxSuccess1">Bahasa Inggris
                        </label>
                      </div><br>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_pengetahuan_3" <?php if ($bidang_pengetahuan_3 == 'Bahasa Indonesia') echo 'checked'; ?> value="Bahasa Indonesia" disabled>
                        <label for="checkboxSuccess1">Bahasa Indonesia
                        </label>
                      </div><br>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_pengetahuan_4" <?php if ($bidang_pengetahuan_4 == 'Fisika') echo 'checked'; ?> value="Fisika" disabled>
                        <label for="checkboxSuccess1">Fisika
                        </label>
                      </div><br>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_pengetahuan_5" <?php if ($bidang_pengetahuan_5 == 'Kimia') echo 'checked'; ?> value="Kimia" disabled>
                        <label for="checkboxSuccess1">Kimia
                        </label>
                      </div><br>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_pengetahuan_6" <?php if ($bidang_pengetahuan_6 == 'Biologi') echo 'checked'; ?> value="Biologi" disabled>
                        <label for="checkboxSuccess1">Biologi
                        </label>
                      </div><br>
                      <div class="icheck-danger d-inline">
                        <input type="checkbox" name="bidang_pengetahuan_7" <?php if ($bidang_pengetahuan_7 == 'PPKn') echo 'checked'; ?> value="PPKn" disabled>
                        <label for="checkboxSuccess1">PPKn
                        </label>
                      </div><br>
                      <div class="icheck-danger d-inline">
                       <input type="checkbox" name="bidang_pengetahuan_8" <?php if ($bidang_pengetahuan_8 == 'Yang lain') echo 'checked'; ?> value="Yang lain" disabled>
                        <label for="checkboxSuccess1">Lainya
                        </label>
                      </div><br>
                      
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Menurut Anda, Materi atau bidang kompetensi apa yang harus ditingkatkan SMK <span style=color:red;><?php echo $nama_sekolah ?></span> agar lulusannya lebih siap di dunia kerja?</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="materi_ditingkatkan" value="<?php echo $materi_ditingkatkan; ?>" disabled>
                    </div>
                </div>
                 <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Apakah SMK <span style=color:red;><?php echo $nama_sekolah ?></span> memberikan Informasi lowongan pekerjaan yang mudah diakses?</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="info_loker" disabled>
                                                        <option value>Pilh</option>
                                                        <option value="Ya" <?php if ($info_loker == 'Ya') echo 'selected'; ?>>Ya</option>
                                                        <option value="Tidak" <?php if ($info_loker == 'Tidak') echo 'selected'; ?>>Tidak</option>

                                                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Apa saran Anda terhadap SMK <span style=color:red;><?php echo $nama_sekolah ?></span> agar menjadi lebih baik?</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="saran" value="<?php echo $saran; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Sebutkan 3 kata Kesan Anda untuk SMK <span style=color:red;><?php echo $nama_sekolah ?></span></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="kesan" value="<?php echo $kesan; ?>" disabled>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade mr-2" id="tab_6" role="tabpanel" aria-labelledby="custom-content-above-settings-tab">
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Email</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Password</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" disabled>
                    </div>
                </div>
              </div>
            </div>
            </div>
            </div>
        </div>
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
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