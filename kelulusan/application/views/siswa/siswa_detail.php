  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6 mt-2">
                      <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;">
                          <i class="fas fa-books nav-icon text-info"></i> <?php echo $judul; ?></h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>siswa"><?php echo $judul; ?></a></li>
                          <li class="breadcrumb-item active"><?php echo $judul2; ?></li>
                      </ol>
                  </div>
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- /.row -->
                  <div class="animated fadeInLeft col-md-10">
                      <div class="card card-info">
                          <div class="card-header">
                              <h3 class="card-title"><i class="fas fa-ballot"></i> <?php echo $judul; ?></h3>
                          </div>
                          <!-- /.card-header -->
                              <table class="table">
                                  <tbody>
                                      <tr>
                                          <td>No Pendaftaran </td>
                                          <td><?php echo $no_pendaftaran; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Nama </td>
                                          <td><?php echo $nama_siswa; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Jenis Kelamin </td>
                                          <td><?php echo $jenis_kelamin; ?></td>
                                      </tr>
                                      <tr>
                                          <td>NIK </td>
                                          <td><?php echo $nik; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Jenis Pendaftaran </td>
                                          <td><?php echo $jenis_pendaftaran; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Jalur Pendaftaran </td>
                                          <td><?php echo $jalur_pendaftaran; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Hobi </td>
                                          <td><?php echo $hobi; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Cita Cita </td>
                                          <td><?php echo $cita_cita; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Tempat Tanggal Lahir </td>
                                          <td><?php echo $tempat_lahir . ', ' . date("d-m-Y", strtotime($tanggal_lahir)); ?></td>
                                      </tr>
                                      <tr>
                                          <td>Agama </td>
                                          <td><?php echo $agama; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Alamat </td>
                                          <td><?php echo $alamat; ?></td>
                                      </tr>
                                      <tr>
                                          <td>RT </td>
                                          <td><?php echo $rt; ?></td>
                                      </tr>
                                      <tr>
                                          <td>RW </td>
                                          <td><?php echo $rw; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Dusun </td>
                                          <td><?php echo $dusun; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Kelurahan </td>
                                          <td><?php echo $kelurahan; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Kabupaten </td>
                                          <td><?php echo $kabupaten; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Kodepos </td>
                                          <td><?php echo $kode_pos; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Tempat Tinggal </td>
                                          <td><?php echo $tempat_tinggal; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Transportasi </td>
                                          <td><?php echo $transportasi; ?></td>
                                      </tr>
                                      <tr>
                                          <td>No Telepon </td>
                                          <td><?php echo $no_hp; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Email </td>
                                          <td><?php echo $email; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Kewarganegaraan </td>
                                          <td><?php echo $kewarganegaraan; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Tinggi Badan </td>
                                          <td><?php echo $tinggi_badan . 'cm'; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Berat Badan </td>
                                          <td><?php echo $berat_badan . 'kg'; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Jarak Ke Sekolah </td>
                                          <td><?php echo $jarak_ke_sekolah . 'km'; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Waktu Tempuh </td>
                                          <td><?php echo $waktu_tempuh_ke_sekolah . 'menit'; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Jumlah Saudara </td>
                                          <td><?php echo $jumlah_saudara . 'org'; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Nama Ayah </td>
                                          <td><?php echo $nama_ayah; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Tahun Lahir Ayah </td>
                                          <td><?php echo $tahun_lahir_ayah; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Pendidikan Ayah </td>
                                          <td><?php echo $pendidikan_ayah; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Pekerjaan Ayah </td>
                                          <td><?php echo $pekerjaan_ayah; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Penghasilan Ayah </td>
                                          <td><?php echo $penghasilan_ayah; ?></td>
                                      </tr>

                                      <tr>
                                          <td>Nama Ibu </td>
                                          <td><?php echo $nama_ibu; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Tahun Lahir Ibu </td>
                                          <td><?php echo $tahun_lahir_ibu; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Pendidikan Ibu </td>
                                          <td><?php echo $pendidikan_ibu; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Pekerjaan Ibu </td>
                                          <td><?php echo $pekerjaan_ibu; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Penghasilan Ibu </td>
                                          <td><?php echo $penghasilan_ibu; ?></td>
                                      </tr>

                                      <tr>
                                          <td>Nama Wali </td>
                                          <td><?php echo $nama_wali; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Tahun Lahir Wali </td>
                                          <td><?php echo $tahun_lahir_wali; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Pendidikan Wali </td>
                                          <td><?php echo $pendidikan_wali; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Pekerjaan Wali </td>
                                          <td><?php echo $pekerjaan_wali; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Penghasilan Wali </td>
                                          <td><?php echo $penghasilan_wali; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Status Calon Siswa </td>
                                          <td><?php
                                                if ($status == '1') {
                                                    echo 'Dikonfirmasi';
                                                } else if ($status == '0') {
                                                    echo 'Menunggu Konfirmasi';
                                                } else {
                                                    echo 'Ditolak';
                                                }
                                                ?>
                                          </td>
                                      </tr>
                                  </tbody>
                                  <?php if ($status == '0') { ?>
                                      <tfoot>
                                          <tr>
                                              <td>
                                                  <a class="btn btn-success" href="<?php echo base_url() . 'siswa/siswa_terima/' . $id_ppdb; ?>"><i class="fa fa-thumbs-up"> </i> Terima</a>
                                                  <a class="btn btn-danger" href="<?php echo base_url() . 'siswa/siswa_terima/' . $id_ppdb; ?>"><i class="fa fa-thumbs-down"> </i> Tolak</a>
                                              </td>
                                          </tr>
                                      </tfoot>
                                  <?php } ?>
                              </table>
                         
                      </div>
                  </div>
                  
                  <div class="col-md-2">
                              <?php
                                if (!empty($foto)) {
                                    echo '<img style="width:100%;" src="' . base_url() . 'upload/' . $foto . '">';
                                }
                                ?>
                    </div>
              </div>

          </div>
      </section>
      <!-- /.content -->
  </div>