<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
     
    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="box box-danger">
                    <form role="form" action="<?php echo base_url(); ?>password/save" method="post">
                        
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
                            </div>
                        <?php } ?>

                        <div class="box-body">

                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" class="form-control" name="password_lama"  required>
                            </div>

                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" name="password_baru"  required>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-danger btn-lg"><i class="fa fa-save"> </i> Ubah Password</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
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