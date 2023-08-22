<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark"><i class="far fa-book-medical nav-icon text-info"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/dokumen"><?php echo $judul; ?></a></li>
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
          <div class="animated fadeInLeft col-md-8">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> Detail <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
                          <?php if($this->session->flashdata('success')) { ?>
					      <div class="alert alert-info" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
					      </div>
					      <?php } ?>
                                <?php if (!empty($foto)) { ?>
                                    <img class="img-responsive" src="<?php echo base_url() . 'upload/siswa/' . $foto; ?>" alt="<?php echo $nama_siswa; ?>">
                                <?php } else { ?>
                                    <img class="img-responsive" src="<?php echo base_url() . 'asset/img/noimage.jpg'; ?>" alt="<?php echo $nama_siswa; ?>">
                                <?php } ?>
                            </div>
                            <div class="col-xs-9">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"></a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"></a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                    <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                <tr>
                                                <td style="background:#000;color:#fff" colspan="3">Data Siswa</td>
                                            </tr>                           
                <tr>
                                                <td style="width:200px;font-weight:bold;">NIS</td>
                                                <td style="width:10px;">:</td>
                                                <td><?php echo $nis; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">NISN</td>
                                                <td>:</td>
                                                <td><?php echo $nisn; ?></td>
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
                                                <td style="font-weight:bold;">Tempat, Tanggal Lahir</td>
                                                <td>:</td>
                                                <td><?php echo $tempat_lahir . ', ' . $tanggal_lahir; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">No Handphone</td>
                                                <td>:</td>
                                                <td><?php echo $hp; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Telepon</td>
                                                <td>:</td>
                                                <td><?php echo $telepon; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Email</td>
                                                <td>:</td>
                                                <td><?php echo $email; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Alamat</td>
                                                <td>:</td>
                                                <td><?php echo $alamat_jalan; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Kelurahan</td>
                                                <td>:</td>
                                                <td><?php echo $kelurahan; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Kecamatan</td>
                                                <td>:</td>
                                                <td><?php echo $kecamatan; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Agama</td>
                                                <td>:</td>
                                                <td><?php echo $agama; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Angkatan</td>
                                                <td>:</td>
                                                <td><?php echo $angkatan; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Kelas</td>
                                                <td>:</td>
                                                <td><?php echo $nama_kelas; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Status</td>
                                                <td>:</td>
                                                <td><?php if ($aktif_siswa == '1') echo 'AKTIF';
                                                    else echo 'TIDAK AKTIF'; ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="tab-pane " id="tab_2">
                                        <table id="datatb" class="table table-bordered table-hover">
                                        <tr>
                                                <td style="background:#000;color:#fff" colspan="3">Data Sekolah</td>
                                            </tr>    
                                        <tr>
                                                <td style="width:200px;font-weight:bold;">Nama Sekolah</td>
                                                <td style="width:10px;">:</td>
                                                <td><?php echo $nama_sekolah; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Status Sekolah</td>
                                                <td>:</td>
                                                <td><?php echo $status_sekolah; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Alamat Sekolah</td>
                                                <td>:</td>
                                                <td><?php echo $alamat_sekolah; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Tahun Lulus</td>
                                                <td>:</td>
                                                <td><?php echo $tahun_lulus; ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="tab-pane " id="tab_3">
                                        <table id="datatb" class="table table-bordered table-hover">
                                            <tr>
                                                <td style="background:#000;color:#fff" colspan="3">Data Ayah</td>
                                            </tr>
                                            <tr>
                                                <td style="width:200px;font-weight:bold;">Nama</td>
                                                <td style="width:10px;">:</td>
                                                <td><?php echo $nama_ayah; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Pendidikan</td>
                                                <td>:</td>
                                                <td><?php echo $pendidikan_ayah; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Pekerjaan</td>
                                                <td>:</td>
                                                <td><?php echo $pekerjaan_ayah; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">No Handphone</td>
                                                <td>:</td>
                                                <td><?php echo $no_hp_ayah; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="background:#000;color:#fff" colspan="3">Data Ibu</td>
                                            </tr>
                                            <tr>
                                                <td  style="font-weight:bold;">Nama</td>
                                                <td>:</td>
                                                <td><?php echo $nama_ibu; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Pendidikan</td>
                                                <td>:</td>
                                                <td><?php echo $pendidikan_ibu; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Pekerjaan</td>
                                                <td>:</td>
                                                <td><?php echo $pekerjaan_ibu; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">No Handphone</td>
                                                <td>:</td>
                                                <td><?php echo $no_hp_ibu; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="background:#000;color:#fff" colspan="3">Data Wali</td>
                                            </tr>
                                            <tr>
                                                <td  style="font-weight:bold;">Nama</td>
                                                <td>:</td>
                                                <td><?php echo $nama_wali; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Pendidikan</td>
                                                <td>:</td>
                                                <td><?php echo $pendidikan_wali; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Pekerjaan</td>
                                                <td>:</td>
                                                <td><?php echo $pekerjaan_wali; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">No Handphone</td>
                                                <td>:</td>
                                                <td><?php echo $no_hp_wali; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() . 'siswa/siswa_edit/' . $id_siswa; ?>" class="btn btn-primary btn-block"><b><i class="fa fa-edit"> </i> Ubah Data</b></a>

                        <a href="<?php echo base_url() . 'siswa/siswa/'; ?>" class="btn btn-success btn-block"><b><i class="fa fa-arrow-left"> </i> Kembali</b></a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>