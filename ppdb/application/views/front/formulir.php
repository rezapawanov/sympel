<div class="col-lg-8">
    <div class="card card-teal">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-file-user"></i> FORMULIR PENERIMAAN PESERTA DIDIK BARU</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="<?php echo base_url(); ?>portal/formulir_save" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <b>DATA PESERTA DIDIK</b>
                <div class="card-danger card-outline mb-2"></div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pendaftaran <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select class="select2 form-control select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="jenis_pendaftaran" required>
                            <option>Baru</option>
                            <option>Pindahan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jalur Pendaftaran <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="jalur_pendaftaran" required>
                            <option>Prestasi</option>
                            <option>Umum</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Hobi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="hobi" name="hobi">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cita-cita</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  name="cita_cita" placeholder="Cita-cita">
                    </div>
                </div>
                <!-- DATA PRIBADI -->
                <b>DATA PRIBADI</b>
                <div class="card-orange card-outline mb-2"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_siswa" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select id="Jenis Kelamin" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="jenis_kelamin" required>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NIK <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nomor Induk Penduduk" name="nik" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tempat Lahir <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Lahir <text class="text-danger">*</text></label>
                    <div class="input-group col-sm-9">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control tglcalendar" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Agama <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select id="Agama" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="agama" required>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                            <option>Protestan</option>
                            <option>Katolik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat Jalan <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control"  placeholder="alamat" name="alamat" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">RT </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="RT" name="rt">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">RW </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  placeholder="RW" name="rw">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Dusun </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Nama Dusun" name="dusun">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Kelurahan / Desa </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Nama Kelurahan / Desa" name="kelurahan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kabupaten </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Kabupaten" name="kabupaten">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kode POS </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  placeholder="Kode POS" name="kode_pos">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Tinggal <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select id="Tempat Tinggal" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="tempat_tinggal" required>
                            <option>Asrama</option>
                            <option>Rumah Sendiri</option>
                            <option>Kos</option>
                            <option>Panti Asuhan</option>
                            <option>Wali</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Transportasi <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select id="Transportasi" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="transportasi" required>
                            <option>Jalan Kaki</option>
                            <option>Abodemen</option>
                            <option>Kendaraan Pribadi</option>
                            <option>Kendaraan Umum</option>
                            <option>Gojek/Grab/Maxim</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nomor HP <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Nomor HP" name="no_hp" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">E-mail Pribadi <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control"  placeholder="E-mail Pribadi" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kewarganegaraan <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select id="Kewarganegaraan" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="kewarganegaraan" required>
                            <option>Warga Negara Indonesia (WNI)</option>
                            <option>Warga Negara Asing (WNA)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="foto" required>
                                <label class="custom-file-label" for="exampleInputFile">Cari Foto</label>
                            </div>
                        </div>
                        <font size="1"><i class="text-danger">Foto harus JPG dan ukuran file maksimal 1 Mb</i></font>
                    </div>
                </div>

                <!-- DATA PERIODIK -->
                <b>DATA PERIODIK</b>
                <div class="card-cyan card-outline mb-2"></div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Tinggi Badan (Cm) <text class="text-danger">*</text></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Tinggi Badan (Cm)" name="tinggi_badan" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Berat Badan (Kg) <text class="text-danger">*</text></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  placeholder="Berat Badan (Kg)" name="berat_badan" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Jarak Tempat Tinggal ke Sekolah (Km) <text class="text-danger">*</text></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Jarak Tempat Tinggal ke Sekolah (Km)" name="jarak_ke_sekolah" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Waktu Tempuh ke Sekolah (Menit) <text class="text-danger">*</text></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  placeholder="Waktu Tempuh ke Sekolah (Menit)" name="waktu_tempuh_ke_sekolah" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Jumlah Saudara Kandung
                        <text class="text-danger">*</text></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" 
                       placeholder="Jumlah Saudara Kandung" name="jumlah_saudara" required>
                    </div>
                </div>
                
                <b>DATA SEKOLAH ASAL</b>
                <div class="card-danger card-outline mb-2"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Sekolah Asal
                        <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Nama Asal Sekolah" name="asal_sekolah" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat Sekolah Asal
                        <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Alamat Sekolah Asal" name="alamat_sekolah_asal" required>
                    </div>
                </div>

                <!-- DATA AYAH KANDUNG -->
                <b>DATA AYAH KANDUNG</b>
                <div class="card-success card-outline mb-2"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Ayah Kandung
                        <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Nama Ayah Kandung" name="nama_ayah" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tahun Lahir
                        <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Tahun Lahir" name="tahun_lahir_ayah" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select  class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pendidikan_ayah" required>
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                            <option>D4/S1</option>
                            <option>S2</option>
                            <option>S3</option>
                            <option>SD Sederajat</option>
                            <option>SMP Sederajat</option>
                            <option>SMA Sederajat</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select  class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pekerjaan_ayah" required>
                            <option>Buruh</option>
                            <option>Karyawan Swasta</option>
                            <option>Nelayan</option>
                            <option>Pedagang Besar</option>
                            <option>Pedagan Kecil</option>
                            <option>Pensiunan</option>
                            <option>Petani</option>
                            <option>Peternak</option>
                            <option>PNS/POLRI/TNI</option>
                            <option>Wiraswasta</option>
                            <option>Wirausaha</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select  class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="penghasilan_ayah" required>
                            <option>1 Juta - 1.999.999 Juta</option>
                            <option>2 Juta - 4.999.999</option>
                            <option>5 Juta - 20 Juta</option>
                            <option>500.000 Ribu - 999.999</option>
                            <option>Kurang Dari 500.000</option>
                            <option>Lebih Dari 10 Juta</option>
                        </select>
                    </div>
                </div>

                <!-- DATA IBU KANDUNG -->
                <b>DATA IBU KANDUNG</b>
                <div class="card-blue card-outline mb-2"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Ibu Kandung
                        <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nama Ibu Kandung" name="nama_ibu" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tahun Lahir
                        <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Tahun Lahir" name="tahun_lahir_ibu" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select  class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pendidikan_ibu" required>
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                            <option>D4/S1</option>
                            <option>S2</option>
                            <option>S3</option>
                            <option>SD Sederajat</option>
                            <option>SMP Sederajat</option>
                            <option>SMA Sederajat</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select  class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pekerjaan_ibu" required>
                            <option>Buruh</option>
                            <option>Karyawan Swasta</option>
                            <option>Nelayan</option>
                            <option>Pedagang Besar</option>
                            <option>Pedagan Kecil</option>
                            <option>Pensiunan</option>
                            <option>Petani</option>
                            <option>Peternak</option>
                            <option>PNS/POLRI/TNI</option>
                            <option>Wiraswasta</option>
                            <option>Wirausaha</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan <text class="text-danger">*</text>
                    </label>
                    <div class="col-sm-9">
                        <select  class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="penghasilan_ibu" required>
                            <option>1 Juta - 1.999.999 Juta</option>
                            <option>2 Juta - 4.999.999</option>
                            <option>5 Juta - 20 Juta</option>
                            <option>500.000 Ribu - 999.999</option>
                            <option>Kurang Dari 500.000</option>
                            <option>Lebih Dari 10 Juta</option>
                        </select>
                    </div>
                </div>

                <!-- DATA Wali  -->
                <b>DATA WALI </b>
                <div class="card-yellow card-outline mb-2"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Wali</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"
                       placeholder="Nama Wali Kandung" name="nama_wali">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tahun Lahir</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" 
                       placeholder="Tahun Lahir" name="tahun_lahir_wali">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pendidikan
                    </label>
                    <div class="col-sm-9">
                        <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pendidikan_wali">
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                            <option>D4/S1</option>
                            <option>S2</option>
                            <option>S3</option>
                            <option>SD Sederajat</option>
                            <option>SMP Sederajat</option>
                            <option>SMA Sederajat</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pekerjaan
                    </label>
                    <div class="col-sm-9">
                        <select  class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="pekerjaan_wali">
                            <option>Buruh</option>
                            <option>Karyawan Swasta</option>
                            <option>Nelayan</option>
                            <option>Pedagang Besar</option>
                            <option>Pedagan Kecil</option>
                            <option>Pensiunan</option>
                            <option>Petani</option>
                            <option>Peternak</option>
                            <option>PNS/POLRI/TNI</option>
                            <option>Wiraswasta</option>
                            <option>Wirausaha</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Penghasilan 
                    </label>
                    <div class="col-sm-9">
                        <select  class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="penghasilan_wali">
                            <option>1 Juta - 1.999.999 Juta</option>
                            <option>2 Juta - 4.999.999</option>
                            <option>5 Juta - 20 Juta</option>
                            <option>500.000 Ribu - 999.999</option>
                            <option>Kurang Dari 500.000</option>
                            <option>Lebih Dari 10 Juta</option>
                        </select>
                    </div>
                </div>

                <!-- Pernyataan  -->
                <b>PERNYATAAN DAN KEAMANAN </b>
                <div class="card-red card-outline mb-2"></div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pernyataan
                        <text class="text-danger">*</text></label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" required>
                            <label class="form-check-label">Saya menyatakan dengan sesungguhnya bahwa isian data dalam formulir ini adalah benar. Apabila ternyata data tersebut tidak benar / palsu, maka saya bersedia menerima sanksi berupa Pembatalan sebagai Calon Peserta Didik <b class="text-danger"><?php echo $nama_sekolah; ?></b></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-block btn-info"><i class="fas fa-file-user"></i> <b>SIMPAN FORMULIR PENDAFTARAN</b></button>
            </div>
            <!-- /.card-footer -->
        </form>
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