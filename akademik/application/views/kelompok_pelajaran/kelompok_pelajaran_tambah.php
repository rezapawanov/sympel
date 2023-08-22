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
              <form class="form-horizontal"  action="<?php echo base_url(); ?>master/kelompok_pelajaran_save" method="post">



                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_kelompok_pelajaran" value="<?php echo $id_kelompok_pelajaran; ?>">
                        
					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
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
                                        <label>Nama Kelompok Pelajaran</label>
                                        <input type="text" class="form-control" name="nama_kelompok_pelajaran" value="<?php echo $nama_kelompok_pelajaran; ?>" required>
                                    </div>
                                </div>
                               
                            </div>
                       
                            <div class="row">
                             <div class="form-group col-md-3 mr-2">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="aktif_kelompok_pelajaran"  required>
                                            <option value="1" <?php if($aktif_kelompok_pelajaran == '1') echo 'selected'; ?>>AKTIF</option>
                                            <option value="0" <?php if($aktif_kelompok_pelajaran == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <!-- /.box-body -->

                     <!-- /.card-body -->
                     <div class="card-footer">
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>master/kelompok_pelajaran"><i class="fa fa-arrow-left"> </i> Kembali</a>
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