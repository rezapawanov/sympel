<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
        <li><a href="<?php echo base_url(); ?>master/box"><?php echo $judul; ?></a></li>
        <li class="active"><?php echo $judul2; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
                <div class="box">
                    <form role="form" action="<?php echo base_url(); ?>master/sumber_save" method="post">


					      <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
					      </div>
					      <?php } ?>

                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_sumber" value="<?php echo $id_sumber; ?>">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Sumber Buku</label>
                                        <input type="text" class="form-control" name="nama_sumber" value="<?php echo $nama_sumber; ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>master/sumber"><i class="fa fa-arrow-left"> </i> Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>