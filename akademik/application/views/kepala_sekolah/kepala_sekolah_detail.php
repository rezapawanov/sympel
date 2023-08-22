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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/dokumen"><?php echo $judul; ?></a></li>
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
                <h3 class="card-title"><i class="fas fa-ballot"></i> Detail <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
                          <?php if($this->session->flashdata('success')) { ?>
					      <div class="alert alert-info" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
					      </div>
					      <?php } ?>
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'upload/kepala_sekolah/'.$foto; ?>" alt="<?php echo $nama_kepala_sekolah; ?>">
                    <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                        <tr>
                            <td style="width:200px;font-weight:bold;">NIP</td>
                            <td style="width:10px;">:</td>
                            <td><?php echo $nip; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">NIK</td>
                            <td>:</td>
                            <td><?php echo $nik; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Nama Kepala Sekolah</td>
                            <td>:</td>
                            <td><?php echo $nama_kepala_sekolah; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">No Handphone</td>
                            <td>:</td>
                            <td><?php echo $hp; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Email</td>
                            <td>:</td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Status</td>
                            <td>:</td>
                            <td><?php if($aktif_kepala_sekolah == '1') echo 'AKTIF'; else echo 'TIDAK AKTIF'; ?></td>
                        </tr>
                    </table>
                    <a href="<?php echo base_url().'pengguna/kepala_sekolah_edit/'.$id_kepala_sekolah; ?>" class="btn btn-primary btn-block"><b><i class="fa fa-edit"> </i> Ubah Data</b></a>

                    <a href="<?php echo base_url().'pengguna/kepala_sekolah/'; ?>" class="btn btn-success btn-block"><b><i class="fa fa-arrow-left"> </i> Kembali</b></a>
                </div>
                </div>
                <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->
    </section>
</div>