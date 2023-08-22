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
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>tamu"><?php echo $judul; ?></a></li>
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
                          <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>pengaturan/pengaturan_save" method="post" enctype="multipart/form-data">

                              <?php if ($this->session->flashdata('error')) { ?>
                                  <div class="alert alert-danger">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <i class="fa fa-remove"></i>
                                      </button>
                                      <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                                  </div>
                              <?php } ?>

                              <div class="card-body">

                                  <div class="form-group row">
                                      
                                      <div class="col-sm-12"><center>
                                          <label class="col-sm-5 col-form-label text-uppercase">File Header Banner</label>
                                          <?php
                                            if (!empty($banner_header)) {
                                                echo '<img style="width:600px;height:150px;" src="' . base_url() . 'upload/' . $banner_header . '">';
                                            }
                                            ?>
                                            </center><br>
                                          <input type="file" class="form-control" name="file_banner">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Tanggal Pengumuman</label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" name="tanggal_pengumuman" value="<?php echo $tanggal_pengumuman; ?>" required />
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Tahun Kelulusan</label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" name="tahun" value="<?php echo $tahun; ?>" required />
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Informasi Kelulusan</label>
                                      <div class="col-sm-12">
                                          <textarea type="text" class="form-control" name="informasi_kelulusan"  required /><?php echo $informasi_kelulusan; ?></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Informasi Lainnya</label>
                                      <div class="col-sm-12">
                                          <textarea type="text" class="form-control" name="informasi_lain" required /><?php echo $informasi_lain; ?></textarea>
                                      </div>
                                  </div>



                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>

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