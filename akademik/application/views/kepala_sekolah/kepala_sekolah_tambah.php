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

              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>pengguna/kepala_sekolah_save" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_kepala_sekolah" value="<?php echo $id_kepala_sekolah; ?>">
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
                    <div class="form-group col-md-4 mr-2">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="number" class="form-control" name="nip" value="<?php echo $nip; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mr-2">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="nik" value="<?php echo $nik; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-8 mr-2">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_kepala_sekolah" value="<?php echo $nama_kepala_sekolah; ?>" required>
                                    </div>
                                </div>
                            </div>
                  
              

                            <div class="row">
                                <div class="form-group col-md-4 mr-2">
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="number" class="form-control" name="hp" value="<?php echo $hp; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mr-2">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                                    </div>
                                </div>
                            </div>

                         
                            <div class="row">
                                <div class="form-group col-md-4 mr-2">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto">
                                        <p class="help-block">Format .jpg/.png</p>
                                        <?php if(!empty($foto)) { ?>
                                            <img src="<?php echo base_url().'upload/kepala_sekolah/'.$foto; ?>" style="width:100px;height:100px;">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mr-2">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="aktif_kepala_sekolah"  required>
                                            <option value="1" <?php if($aktif_kepala_sekolah == '1') echo 'selected'; ?>>AKTIF</option>
                                            <option value="0" <?php if($aktif_kepala_sekolah == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                     <!-- /.card-body -->
                     <div class="card-footer">
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>pengguna/kepala_sekolah"><i class="fa fa-arrow-left"> </i> Kembali</a>
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