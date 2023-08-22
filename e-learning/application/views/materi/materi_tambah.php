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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/Materi"><?php echo $judul; ?></a></li>
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
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>master/materi_save" method="post" enctype="multipart/form-data">

                 <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icon icon-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icon icon-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_materi" value="<?php echo $id_materi; ?>">

                <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Materi</label>
                                        <input type="text" class="form-control" name="judul_materi" value="<?php echo $judul_materi; ?>" required>
                                    </div>
                                </div>
                             
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mapel</label>
                                        <select class="form-control" name="id_mapel" required>
                                            <?php echo $combo_mapel; ?>
                                        </select>
                                    </div>
                                </div>
                              
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" name="id_kelas" required>
                                            <?php echo $combo_kelas; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <select class="form-control" name="id_jurusan" required>
                                            <?php echo $combo_jurusan; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control tgl" name="tanggal_materi" value="<?php echo date("d-m-Y"); ?>" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                               
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea style="height:150px;" class="form-control" name="deskripsi_materi"><?php echo $deskripsi_materi; ?></textarea>
                                    </div>
                                </div>
                            </div>

                          



                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>File</label>
                                        <input type="file" name="file_materi">
                                        <p class="help-block">Format File Video</p>
                                        <?php if (!empty($file_materi)) { ?>
                                            <img src="<?php echo base_url() . '/upload/materi/' . $file_materi; ?>" style="width:100px;height:100px;">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Url Materi</label>
                                        <input type="text" class="form-control" name="url_materi" value="<?php echo $url_materi; ?>" placeholder="Masukkan Url Materi">
                                    </div>
                                </div>
                                </div>

                                


                        </div>




                        
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <div class="btn-group btn-group-sm">
                    <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>master/Materi"><i class="fa fa-undo"> </i> Kembali</a>
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"> </i> Simpan</button>
                  
                    </div>
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
                    <button class="btn btn-md btn-info"><span class="fa fa-save"></span> Simpan </button>
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
