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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/sarpras"><?php echo $judul; ?></a></li>
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
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>sarpras/sarpras_save" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id_sarpras; ?>" name="id_sarpras">
                <input type="hidden" value="<?php echo $tipe; ?>" name="tipe">
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
                      <label>Ruangan</label>
                      <select class="form-control select2" name="id_ruangan" required>
                        <?php echo $combo_ruangan;  ?>
                      </select>
                    </div>

                    <div class="form-group col-md-3 mr-2">
                      <label>Lemari</label>
                      <select class="form-control select2" name="id_lemari" required>
                        <?php echo $combo_lemari;  ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3 mr-2">
                      <label>Rak</label>
                      <select class="form-control select2" name="id_rak" required>
                        <?php echo $combo_rak;  ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3 mr-2">
                      <label>Box</label>
                      <select class="form-control select2" name="id_box" required>
                        <?php echo $combo_box;  ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3 mr-2">
                      <label>Map</label>
                      <select class="form-control select2" name="id_map" required>
                        <?php echo $combo_map;  ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3 mr-2">
                      <label>Urut</label>
                      <select class="form-control select2" name="id_urut" required>
                        <?php echo $combo_urut;  ?>
                      </select>
                    </div>
                  </div>
                  <hr>

                  <div class="form-group col-md-6">
                    <label>Tanggal Sarpras</label>
                    <input type="text" class="form-control tglcalendar" name="tanggal_sarpras" value="<?php echo $tanggal_sarpras; ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Jenis Barang</label>
                    <select class="form-control select2" name="id_jenis_barang" required>
                      <?php echo $combo_jenis_barang;  ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nomor Sarpras</label>
                    <input type="text" class="form-control" name="nomor_sarpras" value="<?php echo $nomor_sarpras; ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nama Sarpras</label>
                    <input type="text" class="form-control" name="nama_sarpras" value="<?php echo $nama_sarpras; ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi; ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>File</label>
                    <input type="file" class="form-control" name="file_sarpras">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Tahun Ajaran</label>
                    <select class="form-control select2" name="tahun_ajaran" required>
                      <?php echo $combo_tahun_ajaran;  ?>
                    </select>
                  </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>sarpras"><i class="fa fa-undo"> </i> Kembali</a>
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