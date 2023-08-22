<div class="col-lg-8">
    <div class="card card-teal">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-file-user"></i> CETAK FORMULIR PENDAFTARAN</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="<?php echo base_url(); ?>portal/cetak_formulir" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <b>INPUT NO PENDAFTARAN</b>
                <div class="card-danger card-outline mb-2"></div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" " placeholder=" No Pendaftaran" name="no_pendaftaran" required>
                    </div>
                </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-block btn-info"><i class="fas fa-print"></i> <b>CETAK</b></button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
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