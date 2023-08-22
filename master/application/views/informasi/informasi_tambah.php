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
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-images"></i> Galeri</a></li>
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
                <h3 class="card-title"><i class="fas fa-user-plus"></i> Input <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>app/informasi_save" method="post" enctype="multipart/form-data">


               <?php if($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" >
                  <button type="button" class="btn btn-danger swalDefaultError">

                </button>
                  <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                </div>
                <?php } ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-12">
                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_informasi" value="<?php echo $id_informasi; ?>">
                        <input type="hidden" name="gambar_lama" value="<?php echo $gambar; ?>">
                        <input type="text" class="form-control" name="judul" value="<?php echo $judul; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="isi" value="<?php echo $isi; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 control-label">Gambar : <font size="1" style="text-shadow: 2px 2px 4px #827e7e"><i class="text-danger"> (Format File Harus .jpg atau .png)</i></font> </label>
                    <div class="col-sm-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <i class="card-title"></i> Gambar Saat ini
                            </div>
                            <div class="card-body">
                                <?php if(!empty($gambar)) { ?>
                                            <center><img src="<?php echo base_url().'upload/informasi/'.$gambar; ?>" style="width:500;height:200px;" lass="img-responsive img-thumbnail"></center>
                                        <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-info">
                            <div class="card-header ">
                                <h3 class="card-title"><i class="fa fa-hand-o-left"></i> Ganti Gambar</h3>
                            </div>
                            <div class="panel-body">
                                <center>
                                <input type="file" name="gambar" class="form-control">
                                </center>
                            </div>
                        </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"><i class="fa fa-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>app/informasi"><i class="fa fa-undo"> </i> Kembali</a>
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
                    Isi <b>Data Galeri</b> selengkap dan sebenar mungkin.
                </li>
                <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-info"><span class="fa fa-save"></span> Simpan </button>
                    untuk menambahkan <b>Galeri</b>.
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
