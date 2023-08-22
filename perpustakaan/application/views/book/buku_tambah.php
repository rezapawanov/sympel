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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/book"><?php echo $judul; ?></a></li>
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
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>master/book_save" method="post" enctype="multipart/form-data">

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
                        <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">
                        <input type="hidden" name="foto_lama" value="<?php echo $foto_buku; ?>">

                <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kode Buku</label>
                                        <input type="text" class="form-control" name="kode_buku" value="<?php echo $kode_buku; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control" name="judul_buku" value="<?php echo $judul_buku; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input type="text" class="form-control" name="pengarang" value="<?php echo $pengarang; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit" value="<?php echo $penerbit; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tahun Terbit</label>
                                        <input type="number" class="form-control" name="tahun_terbit" value="<?php echo $tahun_terbit; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tempat Terbit</label>
                                        <input type="text" class="form-control" name="tempat_terbit" value="<?php echo $tempat_terbit; ?>">
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>DDC Buku</label>
                                        <input type="text" class="form-control" name="ddc" value="<?php echo $ddc; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ISBN Buku</label>
                                        <input type="text" class="form-control" name="isbn" value="<?php echo $isbn; ?>">
                                    </div>
                                </div>
                              
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sumber</label>
                                        <select class="form-control" name="id_sumber" required>
                                            <?php echo $combo_sumber; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="id_kategori" required>
                                            <?php echo $combo_kategori; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="text" class="form-control tgl" name="tanggal_masuk" value="<?php echo $tanggal_masuk; ?>" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Inventaris</label>
                                        <input type="text" class="form-control" name="no_inventaris" value="<?php echo $no_inventaris; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea style="height:150px;" class="form-control" name="deskripsi_buku"><?php echo $deskripsi_buku; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto_buku">
                                        <p class="help-block">Format File Harus .jpg atau .png</p>
                                        <?php if (!empty($foto_buku)) { ?>
                                            <img src="<?php echo base_url() . '/upload/book/' . $foto_buku; ?>" style="width:100px;height:100px;">
                                        <?php } ?>
                                    </div>
                                </div>
                        </div>



                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>File</label>
                                        <input type="file" name="file_buku">
                                        <p class="help-block">Format File Harus .jpg atau .png</p>
                                        <?php if (!empty($file_buku)) { ?>
                                            <img src="<?php echo base_url() . '/upload/book/' . $file_buku; ?>" style="width:100px;height:100px;">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Url Buku</label>
                                        <input type="text" class="form-control" name="url_buku" value="<?php echo $url_buku; ?>" placeholder="Masukkan Url Buku">
                                    </div>
                                </div>
                                </div>

                                


                        </div>




                        
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <div class="btn-group btn-group-sm">
                    <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>master/book"><i class="fa fa-undo"> </i> Kembali</a>
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
