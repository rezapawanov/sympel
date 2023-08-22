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
                <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>pengguna/guru_save" method="post" enctype="multipart/form-data">

                       

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
                        <input type="hidden" name="nip_lama" value="<?php echo $nip; ?>">
                        <input type="hidden" name="foto_lama" value="<?php echo $foto; ?>">
                        <?php if ($this->session->flashdata('error')) { ?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="fa fa-remove"></i>
                    </button>
                    <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                  </div>
                <?php } ?>
                       
                <div class="card-body col-sm-12">
                  <div class="row">
                    <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>NIPTK</label>
                                        <input type="number" class="form-control" name="nip" value="<?php echo $nip; ?>" required>
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>NUPTK</label>
                                        <input type="number" class="form-control" name="nuptk" value="<?php echo $nuptk; ?>" >
                                    </div>
                                </div>

 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="nik" value="<?php echo $nik; ?>" >
                                    </div>
                                </div>
                            </div>



                            <div class="row">
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_guru" value="<?php echo $nama_guru; ?>" required>
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value>PILIH</option>
                                            <option value="Laki-Laki" <?php if($jenis_kelamin == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?php if($jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="row">
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input  type="text" class="form-control tgl" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" placeholder="dd-mm-yyyy" >
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat_jalan" value="<?php echo $alamat_jalan; ?>" >
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan" value="<?php echo $kelurahan; ?>" >
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan; ?>" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="number" class="form-control" name="hp" value="<?php echo $hp; ?>" >
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="number" class="form-control" name="telepon" value="<?php echo $telepon; ?>" >
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control" name="agama" >
                                            <option value>PILIH</option>
                                            <option value="ISLAM" <?php if($agama == 'ISLAM') echo 'selected'; ?>>ISLAM</option>
                                            <option value="KATOLIK" <?php if($agama == 'KATOLIK') echo 'selected'; ?>>KATOLIK</option>
                                            <option value="PROTESTAN" <?php if($agama == 'PROTESTAN') echo 'selected'; ?>>PROTESTAN</option>
                                            <option value="BUDHA" <?php if($agama == 'BUDHA') echo 'selected'; ?>>BUDHA</option>
                                            <option value="HINDU" <?php if($agama == 'HINDU') echo 'selected'; ?>>HINDU</option>
                                            <option value="KONGHUCU" <?php if($agama == 'KONGHUCU') echo 'selected'; ?>>KONGHUCU</option>
                                        </select>
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Kewarganegaraan</label>
                                        <select class="form-control" name="kewarganegaraan" >
                                            <option value>PILIH</option>
                                            <option value="WNI" <?php if($kewarganegaraan == 'WNI') echo 'selected'; ?>>WNI</option>
                                            <option value="WNA" <?php if($kewarganegaraan == 'WNA') echo 'selected'; ?>>WNA</option>
                                        </select>
                                    </div>
                                </div>
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="id_jabatan" required>
                                           <?php echo $combo_jabatan; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="row">
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto">
                                        <p class="help-block">Format .jpg/.png</p>
                                        <?php if(!empty($foto)) { ?>
                                            <img src="<?php echo base_url().'upload/guru/'.$foto; ?>" style="width:100px;height:100px;">
                                        <?php } ?>
                                    </div>
                                </div>  
 <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="aktif_guru"  >
                                            <option value="1" <?php if($aktif_guru == '1') echo 'selected'; ?>>AKTIF</option>
                                            <option value="0" <?php if($aktif_guru == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->


                     <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>pengguna/guru"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <div class="animated fadeInRight col-md-4">
            <div class="callout callout-info">
              <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
              <ol>
                <li>
                  Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs btn-info"><span class="fa fa-save"></span> Simpan </button>
                  untuk menambahkan <b><?php echo $judul; ?></b>.
                </li>
              </ol>
              <p>
                Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
              </p>
            </div>
          </div>
        </div>

      </div>
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