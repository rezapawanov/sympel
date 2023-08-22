<div class="col-lg-8">
    <?php if ($buka) { ?>
        <?php if (empty($no_ujian)) { ?>
            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-file-user"></i> CEK PENGUMUMAN ANDA</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url(); ?>portal/cek_pengumuman" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <b>INPUT NOMOR UJIAN</b>
                        <div class="card-danger card-outline mb-2"></div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control"  placeholder=" Nomor Ujian" name="no_ujian" required>
                                <font size="1" style="text-shadow: 2px 2px 4px #827e7e"><i>*Pastikan nomor yang anda masukan benar</i></font>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-info"><i class="fas fa-search"></i> <b>PERIKSA</b></button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        <?php } ?>

        <?php if (!empty($no_ujian)) { ?>
            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-file-user"></i> HASIL PENGUMUMAN</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <div class="card-body">
                    <?php
                    $get = $this->db->query("SELECT * FROM ppdb_kelulusan WHERE no_ujian = '$no_ujian'");
                    if ($get->num_rows() > 0) {
                        $d = $get->row();
                    ?>
                        <div id="xpengumuman">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Nomor Ujian</strong></td>
                                        <td><b><?php echo $d->no_ujian; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Siswa</strong></td>
                                        <td><b><?php echo strtoupper($d->nama_siswa); ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php if ($d->keterangan == 'LULUS' || $d->keterangan == 'Lulus') { ?>
                                <div class="alert alert-success bg-navy" role="alert"><center><strong><i class="fas fa-grin-stars" style="font-size: 48px;"></i><br>SELAMAT !</strong><br><strong>ANDA DINYATAKAN LULUS<br> TES TERTULIS</strong></center><br>

								<div class="col-md-12 mt-3">
					                <div class="card bg-light">
					                    <div class="card-footer bg-danger">
					                        <div class="text-center">
					                            <b>INFORMASI PENTING</b>
					                        </div>
					                    </div>
					                    <div class="card-body pt-0">
					                        <div class="row">
					                            <div class="col-12">
					                              <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/upload/cfd.jpg'; ?>" class="img-rounded elevation-2" style="width:100%;" alt="User Image"></div>  
					                           </div>
					                    </div>
                                        <center>
                                        <font size="1" style="text-shadow: 2px 2px 4px #827e7e"><i>*Untuk Informasi Lebih Lanjut Silakan Hubungi Sekolah. Terimakasih.</i></font><br><button type="button" class="btn bg-navy btn-flat mt-2 mb-2" onclick="history.back();">KEMBALI</button></strong></center>

					                </div>
					            </div>

                                </div>
                            <?php } else {  ?>
                                <div class="alert alert-danger" role="alert"><center><strong><i class="fas fa-smile-wink" style="font-size: 48px;"></i><br>MAAF !</strong><br><strong>ANDA BELUM LULUS<br><font size="1" style="text-shadow: 2px 2px 4px #827e7e"><i>*Tetap Semangat, Tetap Ceria Meraih Cita-cita.</i></font></strong><br><br>
                                <button type="button" class="btn bg-navy btn-flat" onclick="history.back();">KEMBALI</button></center></div>
                            <?php } ?>
                        </div>
                    <?php } else {
                        echo '<div class="callout callout-danger"><center>
                                <i class="fas fa-meh text-danger" style="font-size: 48px;"></i>
                                <h5 style="text-shadow: 2px 2px 4px #827e7e">MAAF!</h5>
                                <p style="text-shadow: 2px 2px 4px #827e7e">Nomor yang anda masukan tidak terdaftar.
                                <br style="text-shadow: 2px 2px 4px #827e7e">Silakan Cek Kembali Nomor Anda </p>
                                <button type="button" class="btn btn-outline-danger btn-flat" onclick="history.back();">KEMBALI</button></center>
                                </div>';
                    }
                    ?>
                </div>

                <!-- /.card-body -->
            </div>
        <?php } ?>

    <?php } else { ?>
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info"></i> MAAF PENGUMUMAN BELUM DI BUKA</h3>
            </div>
        </div>
    <?php } ?>
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