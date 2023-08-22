<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Siswa</a></li>
            <li><a href="<?php echo base_url(); ?>siswa/siswa"><?php echo $judul; ?></a></li>
            <li class="active"><?php echo $judul2; ?></li>
        </ol>
    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-body box-profile">
                        <div class="row">
                            <div class="col-xs-3">
                                <?php if (!empty($foto)) { ?>
                                    <img class="img-responsive" src="<?php echo '../../../akademik/upload/siswa/' . $foto; ?>" alt="<?php echo $nama_siswa; ?>">
                                <?php } else { ?>
                                    <img class="img-responsive" src="<?php echo '../../../akademik/asset/img/noimage.jpg'; ?>" alt="<?php echo $nama_siswa; ?>">
                                <?php } ?>
                            </div>
                            <div class="col-xs-9">

                                <table id="datatb" class="table table-bordered table-hover">
                                    <tr>
                                        <td style="width:200px;font-weight:bold;">NIS</td>
                                        <td style="width:10px;">:</td>
                                        <td><?php echo $nis; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">NISN</td>
                                        <td>:</td>
                                        <td><?php echo $nisn; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Nama Siswa</td>
                                        <td>:</td>
                                        <td><?php echo $nama_siswa; ?></td>
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
                                        <td style="font-weight:bold;">Angkatan</td>
                                        <td>:</td>
                                        <td><?php echo $angkatan; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Kelas</td>
                                        <td>:</td>
                                        <td><?php echo $nama_kelas; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Status</td>
                                        <td>:</td>
                                        <td><?php if ($aktif_siswa == '1') echo 'AKTIF';
                                            else echo 'TIDAK AKTIF'; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="<?php echo base_url() . 'siswa/siswa/' . $id_kelas; ?>" class="btn btn-default btn-block"><b><i class="fa fa-arrow-left"> </i> Kembali</b></a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>