<ul class="nav nav-tabs mt-3 ml-2" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#tab_1" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Data Diri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_2" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Pekerjaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_2" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Kuliah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_3" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Wirausaha</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_4" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Quisioner</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#tab_5" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Informasi Akun</a>
              </li>
            </ul>
            <div class="tab-custom-content ml-2">
              <p class="lead mb-0 text-info">Data Informasi Diri</p>
            </div>
            <div class="tab-content ml-2 mr-2" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
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
              <div class="tab-pane fade show active" id="tab_2" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Apakah Anda pernah bekerja setelah lulus dari SMK Farmasi Cendikia Farma Husada <span style="color:red;">*</span></label>
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
                        <input type="checkbox" name="info_kerja_1" <?php if ($info_kerja_1 == 'SMK Farmasi Cendikia Farma Husada') echo 'checked'; ?> value="SMK Farmasi Cendikia Farma Husada" disabled>
                        <label for="checkboxSuccess1">SMK Farmasi Cendikia Farma Husada
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
                    <label  class="col-sm-12 col-form-label">Berapa jumlah gaji yang Anda terima sebagai lulusan SMK Farmasi Cendikia Farma Husada?</label>
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
              <div class="tab-pane fade show active" id="tab_3" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Aktivitas Perkuliahan</label>
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
                        <input type="checkbox" name="info_kerja_1" <?php if ($info_kerja_1 == 'SMK Farmasi Cendikia Farma Husada') echo 'checked'; ?> value="SMK Farmasi Cendikia Farma Husada" disabled>
                        <label for="checkboxSuccess1">SMK Farmasi Cendikia Farma Husada
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
              </div>
            </div>
            </div>