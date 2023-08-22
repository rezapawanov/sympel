<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judulx; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Informasi Keuangan </a></li>
        <li><a href="<?php echo base_url(); ?>jurnal/informasi"><?php echo $judul; ?></a></li>
        <li class="active"><?php echo $judul2; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
                <div class="box box-success">
                    <form role="form" action="<?php echo base_url(); ?>app/informasi_save" method="post" enctype="multipart/form-data">


					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
					      </div>
					      <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_informasi" value="<?php echo $id_informasi; ?>">
                        <input type="hidden" name="gambar_lama" value="<?php echo $gambar; ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="judul" value="<?php echo $judul; ?>" required>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" name="isi" value="<?php echo $isi; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="gambar">
                                        <p class="help-block">Format File Harus .jpg atau .png</p>
                                        <?php if(!empty($gambar)) { ?>
                                            <img src="<?php echo base_url().'upload/informasi/'.$gambar; ?>" style="width:100px;height:100px;">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-default" href="<?php echo base_url(); ?>app/informasi"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>