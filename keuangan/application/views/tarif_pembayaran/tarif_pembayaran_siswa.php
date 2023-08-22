  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8 mt-2">
            <h5 class="m-0 text-dark" >
              <i class="fas fa-hands-usd nav-icon text-info"></i> <?php echo $judul.' 
              <div class="btn-group btn-group-sm"><a href="#" class="btn btn-info btn-icon-split" style="text-shadow: 2px 2px 4px black;"><b>'.$nama_pos_keuangan.'</b> </a> <a href="#" class="btn btn-danger btn-icon-split" style="text-shadow: 2px 2px 4px black;"><b>'.$tahun_ajaran.'</b></a> <a href="#" class="btn btn-warning btn-icon-split text-uppercase" style="text-shadow: 2px 2px 4px white;"><b>('.$tipe_pembayaran.')</b></a></div>'; ?></h5>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/jenis_dokumen"><?php echo $judul; ?></a></li>
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
        <?php if ($tipe_pembayaran == 'Bulanan') { ?>
        <!-- Left -->
        <div class="animated fadeInLeft col-md-3">
            <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Terapkan Tarif Semua Bulan</label>
                    <div class="col-sm-12 ">
                    <input class="form-control rupiah tarif-all" type="text"required placeholder="Terapkan Tarif Semua Bulan">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-block float-right ml-3 btn-all" name="btn-all"><i class="fas fa-money-check-alt"></i> <b>TERAPKAN TARIF</b></button>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <!-- Center -->
        <div class="animated fadeInUp col-md-5">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>master/tarif_siswa_save2" method="post">
                <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>" readonly>
                <div class="card-body">
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-12">
                        <select id="id_kelas" class="form-control select2 select2-info id_kelas" data-dropdown-css-class="select2-info" style="width: 100%; " name="id_kelas">
                        <?php echo $combo_kelas; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Nama Siswa</label>
                    <div class="col-sm-12">
                        <select id="id_siswa" class="form-control select2 select2-info combo-siswa" data-dropdown-css-class="select2-info" style="width: 100%; " name="id_siswa">
                        <?php echo $combo_siswa; ?>
                      </select>
                    </div>
                  </div>
                  <?php
                $q_bulan = $this->db->query("SELECT * FROM mst_bulan ORDER BY id_bulan ASC");
                foreach ($q_bulan->result_array() as $d_bulan) { ?>
                  <div class="form-group row">
                    <label  class="col-sm-12 col-form-label"><?php echo $d_bulan['nama_bulan']; ?> (Rp)</label>
                    <div class="col-sm-12 ">
                    <input class="form-control" type="hidden" name="nama_bulan_<?php echo $d_bulan['nama_bulan']; ?>" value="<?php echo $d_bulan['nama_bulan']; ?>" readonly required>
                    <input class="form-control rupiah tagihan" type="text" name="tagihan_<?php echo $d_bulan['nama_bulan']; ?>" placeholder="Tarif" required>
                    </div>
                  </div><?php } ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer ">
                  <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>master/tarif_pembayaran/<?php echo $id_jenis_pembayaran; ?>"><i class="fa fa-undo"> </i> Kembali</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
        <!-- Right -->
        <div class="animated fadeInRight col-md-4">
           <div class="callout callout-info">
              <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
              <ol>
                <li>
                    Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
                </li>
                <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-info"><span class="fas fa-money-check-alt"></span> Terapkan Tarif </button>menerapkan pembayaran semua <b><?php echo $judul; ?></b>.
                </li>
                <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-info"><span class="fas fa-save"></span> Simpan </button>untuk menyimpan pembayaran  <b><?php echo $judul; ?></b>.
                </li>
                <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-danger"><span class="fa fa-undo"></span> Kembali </button>untuk kembali ke <b><?php echo $judul; ?></b>.
                </li>
              </ol>
                <p>
                    Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
                </p>
          </div>
        </div>
        <?php } else { ?>
        <div class="animated fadeInUp col-md-8  ">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>master/tarif_kelas_save2" method="post">

                <div class="card-body">
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-12">
                    <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>" readonly>
                        <select id="id_kelas" class="form-control select2 select2-info id_kelas"  data-dropdown-css-class="select2-info" style="width: 100%; " name="id_kelas">
                        <?php echo $combo_kelas; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Nama Siswa</label>
                    <div class="col-sm-12">
                        <select id="id_siswa" class="form-control select2 select2-info combo-siswa" data-dropdown-css-class="select2-info" style="width: 100%; " name="id_siswa">
                        <?php echo $combo_siswa; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-12 col-form-label">Tarif (Rp)</label>
                    <div class="col-sm-12 ">
                    <input class="form-control rupiah" type="text" name="tagihan" placeholder="Tarif" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer ">
                  <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>master/tarif_pembayaran/<?php echo $id_jenis_pembayaran; ?>"><i class="fa fa-undo"> </i> Kembali</a>
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
                    <button class="btn btn-xs btn-info"><span class="fas fa-save"></span> Simpan </button>untuk menyimpan pembayaran  <b><?php echo $judul; ?></b>.
                </li>
                <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-danger"><span class="fa fa-undo"></span> Kembali </button>untuk kembali ke <b><?php echo $judul; ?></b>.
                </li>
              </ol>
                <p>
                    Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
                </p>
          </div>
        </div>
        <?php } ?>
      </div>

    </div>
    </section>
    <!-- /.content -->
  </div>

<script>
    $(".btn-all").click(function() {
        var tarif = $(".tarif-all").val();
        $(".tagihan").val(tarif);
    });
</script>

<script>
    $(".id_kelas").change(function() {
      var id_kelas = $(".id_kelas").val();
      $.get("<?php echo base_url(); ?>master/ajax_combo_siswa",{id_kelas:id_kelas}, function(data) {
          $(".combo-siswa").html(data);
      });
    });
</script>