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
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('danger'); ?></span>
                            </div>
                        <?php } ?>


                        <?php if (!empty($foto)) { ?>
                            <img class="profile-user-img img-responsive" src="<?php echo base_url() . 'upload/guru/' . $foto; ?>" alt="<?php echo $nama_guru; ?>">
                        <?php } else { ?>
                            <img class="profile-user-img img-responsive" src="<?php echo base_url() . 'upload/noimage.jpg'; ?>" alt="<?php echo $nama_guru; ?>">
                        <?php } ?>
                        <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                            <tr>
                                <td style="width:200px;font-weight:bold;">NIPTK</td>
                                <td style="width:10px;">:</td>
                                <td><?php echo $nip; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">NUPTK</td>
                                <td>:</td>
                                <td><?php echo $nuptk; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">NIK</td>
                                <td>:</td>
                                <td><?php echo $nik; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Nama Guru</td>
                                <td>:</td>
                                <td><?php echo $nama_guru; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Jenis Kelamin</td>
                                <td>:</td>
                                <td><?php echo $jenis_kelamin; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Tempat, Tanggal Lahir</td>
                                <td>:</td>
                                <td><?php echo $tempat_lahir . ', ' . $tanggal_lahir; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">No Handphone</td>
                                <td>:</td>
                                <td><?php echo $hp; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Telepon</td>
                                <td>:</td>
                                <td><?php echo $telepon; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Email</td>
                                <td>:</td>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Alamat</td>
                                <td>:</td>
                                <td><?php echo $alamat_jalan; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Kelurahan</td>
                                <td>:</td>
                                <td><?php echo $kelurahan; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Kecamatan</td>
                                <td>:</td>
                                <td><?php echo $kecamatan; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Agama</td>
                                <td>:</td>
                                <td><?php echo $agama; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Kewarganegaraan</td>
                                <td>:</td>
                                <td><?php echo $kewarganegaraan; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Jabatan</td>
                                <td>:</td>
                                <td><?php echo $id_jabatan; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Status</td>
                                <td>:</td>
                                <td><?php if ($aktif_guru == '1') echo 'AKTIF';
                                    else echo 'TIDAK AKTIF'; ?></td>
                            </tr>
                        </table>
                        <a href="<?php echo base_url() . 'pengguna/guru_edit/' . $id_guru; ?>" class="btn btn-success btn-block"><b><i class="fa fa-edit"> </i> Ubah Data</b></a>

                        <a href="<?php echo base_url() . 'pengguna/guru/'; ?>" class="btn btn-default btn-block"><b><i class="fa fa-arrow-left"> </i> Kembali</b></a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>