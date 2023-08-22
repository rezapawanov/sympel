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
 <center>
              <div class="tab-content">
                                        <div class="col-xs-3">
                                            <?php if (empty($foto)) { ?>
                                                <img class="profile-user-img img-responsive" src="<?php echo base_url(); ?>upload/noimage.jpg" />
                                            <?php } else { ?>
                                                <img class="profile-user-img img-responsive" src="<?php echo base_url(); ?>/upload/siswa/<?php echo $foto; ?>" />
                                            <?php } ?>
                                        </div>
                                            </center>
                            <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">Nama Siswa</td>
                                        <td style="width:10px;">:</td>
                                        <td><?php echo $nama_siswa; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelas</td>
                                        <td>:</td>
                                        <td><?php echo $nama_kelas; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Alamat</td>
                                        <td>:</td>
                                        <td><?php echo $alamat_jalan . ' ' . $kelurahan . ' ' . $kecamatan . ' ' . $kode_pos; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No.Telp Siswa</td>
                                        <td>:</td>
                                        <td><?php echo $hp; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No.Telp Ayah</td>
                                        <td>:</td>
                                        <td><?php echo $no_hp_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No.Telp Ibu</td>
                                        <td>:</td>
                                        <td><?php echo $no_hp_ibu; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                            <div class="col-xs-12">
                                <h3 class="page-header">Daftar Pelanggaran Siswa</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Pelanggaran</th>
                                            <th class="text-center">Poin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $total_poin = 0;
                                        foreach ($pelanggaran_siswa->result_array() as $data) { ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['tanggal']; ?></td>
                                                <td><?php echo $data['nama_poin_pelanggaran']; ?></td>
                                                <td class="text-right"><?php echo $data['poin_minus']; ?></td>
                                            </tr>
                                            <?php $no++;
                                            $total_poin += $data['poin_minus'];
                                        } ?>
                                        <tr>
                                            <td colspan="3" class="text-center"><b>Total Poin</b></td>
                                            <td class="text-right"><b><?php echo $total_poin; ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>