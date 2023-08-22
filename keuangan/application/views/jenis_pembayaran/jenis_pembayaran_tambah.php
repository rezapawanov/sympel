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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/jenis_pembayaran"><?php echo $judul; ?></a></li>
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
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>master/jenis_pembayaran_save" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">POS Pembayaran</label>
                    <div class="col-sm-12">
                    <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                    <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>">
                        <select id="id_pos_keuangan" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="id_pos_keuangan">
                        <?php echo $combo_pos_keuangan; ?>
                      </select>
                    </div>
                  </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-12">
                    <select id="tahun_ajaran" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="tahun_ajaran">
                        <?php echo $combo_tahun_ajaran; ?>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Tipe Pembayaran</label>
                    <div class="col-sm-12">
                    <select id="tipe_pembayaran" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="tipe_pembayaran">
                        <option value>PILIH</option>
                                            <option value="Bulanan" <?php if($tipe_pembayaran == 'Bulanan') echo 'selected'; ?>>Bulanan</option>
                                            <option value="Bebas" <?php if($tipe_pembayaran == 'Bebas') echo 'selected'; ?>>Bebas</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Tipe Pembayaran</label>
                    <div class="col-sm-12">
                    <select id="aktif_jenis_pembayaran" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="aktif_jenis_pembayaran">
                        <option value="1" <?php if($aktif_jenis_pembayaran == '1') echo 'selected'; ?>>AKTIF</option>
                                            <option value="0" <?php if($aktif_jenis_pembayaran == '0') echo 'selected'; ?>>TIDAK AKTIF</option>
                      </select>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>master/jenis_pembayaran"><i class="fa fa-undo"> </i> Kembali</a>
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