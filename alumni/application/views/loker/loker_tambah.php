  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/pelanggaran_siswa"><?php echo $judul; ?></a></li>
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
            <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>loker/loker_save" enctype="multipart/form-data" method="post">

              <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_loker" value="<?php echo $id_loker; ?>">
                        <input type="hidden" name="old_gambar" value="<?php echo $gambar; ?>">
           

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
                    <label class="col-sm-5 col-form-label">Judul Lowongan Kerja</label>
                    <div class="col-sm-12">
                      <div class="input-group input-group">
                        <input type="text" class="form-control" name="judul_loker" value="<?php echo $judul_loker; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Isi Lowongan Pekerjaan</label>
                    <div class="col-sm-12">
                      <textarea style="height:300px;" class="form-control" name="isi" required><?php echo $isi; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Foto Lowongan Pekerjaan</label>
                    <div class="col-sm-12">
                      <?php if(!empty($gambar)) echo '<img style="width:100px;height:100px;" src="'.base_url().'upload/'.$gambar.'">'; ?>
                      <div class="custom-file ml-2 mr-2">
                                  <input type="file" name="gambar" class="custom-file-input form-control" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Cari file..</label>
                                </div>                                        
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn bg-purple float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>loker"><i class="fa fa-undo"> </i> Kembali</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <div class="animated fadeInRight col-md-4">
            <div class="callout callout-purple">
              <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
              <ol>
                <li>
                  Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
                </li>
                <li>
                  Gunakan <i>button</i>
                  <button class="btn btn-xs bg-purple"><span class="fa fa-save"></span> Simpan </button>
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