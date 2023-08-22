  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-school text-info"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-school text-info"></i> Data</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/identitas_sekolah_save"><?php echo $judul; ?></a></li>
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
          <div class="animated fadeInLeft   col-md-8">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-school "></i> Input <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>master/identitas_sekolah_save" method="post" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $nama_sekolah; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NPSN</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="npsn" value="<?php echo $npsn; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NSS</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="nss" value="<?php echo $nss; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kode Pos</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="kodepos" value="<?php echo $kodepos; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kelurahan</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="kelurahan" value="<?php echo $kelurahan; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kecamatan</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kabupaten</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="kabupaten" value="<?php echo $kabupaten; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No Telepon</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="no_telepon" value="<?php echo $no_telepon; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Website</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="website" value="<?php echo $website; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-12">
                      <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Whatsapp</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="wa" value="<?php echo $wa; ?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Instagram</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="ig" value="<?php echo $ig; ?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Facebook</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="fb" value="<?php echo $fb; ?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Youtube</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="youtube" value="<?php echo $youtube; ?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-12 control-label">Logo Sekolah/Yayasan :</label>
                    <div class="col-sm-4">
                      <div class="card card-info">
                        <div class="card-header">
                          <i class="card-title"></i> Logo Saat ini
                        </div>
                        <div class="card-body">

                          <?php
                          if (!empty($logo)) {
                            echo '<center><img style="width:150px;150px;" src="' . base_url() . 'upload/' . $logo . '" class="img-responsive img-thumbnail"></center>';
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="card card-info">
                        <div class="card-header ">
                          <h3 class="card-title"><i class="fa fa-hand-o-left"></i> Ganti Logo Saat ini</h3>
                        </div>
                        <div class="input-group mt-2 mb-2">
                          <div class="custom-file ml-2 mr-2">
                            <input type="file" name="logo" class="custom-file-input form-control" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Cari file..</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> S I M P A N</button>
                  <a href="index.php"><button type="button" class="btn btn-danger"><i class="fa fa-undo (alias)"></i> B A T A L</button></a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <div class="animated fadeInRight col-md-4 ">
            <div class="callout callout-info">
              <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
              <ol>
                <li>
                  Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs btn-info"><span class="fa fa-save"></span> Simpan </button>
                  untuk mengubah <b><?php echo $judul; ?></b>.
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