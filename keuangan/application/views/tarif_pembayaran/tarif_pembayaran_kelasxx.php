<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo $judul . ' - ' . $nama_pos_keuangan . ' - ' . $tahun_ajaran . ' (' . $tipe_pembayaran . ')'; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
      <li class="active"><?php echo $judul; ?></li>
    </ol>
  </section>
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-xs-12">


        <div class="box">
          <div class="box-body">
            <?php if ($tipe_pembayaran == 'Bulanan') { ?>
              <div class="col-xs-2">
                <div class="form-group">
                  <label>Terapkan Tarif Untuk</label>
                  <input class="form-control rupiah" type="text" name="tagihan" required>
                </div>
              </div>
              <div class="col-xs-10">
                <form action="<?php echo base_url(); ?>master/tarif_kelas_save" class="form-horizontal" method="post">
                  <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>" readonly>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="id_kelas">
                      <?php echo $combo_kelas; ?>
                    </select>
                  </div>
                  <?php
                  $q_bulan = $this->db->query("SELECT * FROM mst_bulan ORDER BY id_bulan ASC");
                  foreach ($q_bulan->result_array() as $d_bulan) { ?>
                    <div class="form-group">
                      <label><?php echo $d_bulan['nama_bulan']; ?> (Rp)</label>
                      <input class="form-control" type="hidden" name="nama_bulan_<?php echo $d_bulan['nama_bulan']; ?>" value="<?php echo $d_bulan['nama_bulan']; ?>" readonly required>
                      <input class="form-control rupiah" type="text" name="tagihan_<?php echo $d_bulan['nama_bulan']; ?>" required>
                    </div>
                  <?php } ?>
                  <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                    <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>master/tarif_pembayaran/<?php echo $id_jenis_pembayaran; ?>"><i class="fa fa-repeat"> </i> Kembali</a>
                  </div>
                </form>
              </div>
            <?php } else if ($tipe_pembayaran == 'Bebas') {  ?>
              <div class="col-xs-12">
                <form action="<?php echo base_url(); ?>master/tarif_kelas_save2" class="form-horizontal" method="post">
                  <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>" readonly>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="id_kelas">
                      <?php echo $combo_kelas; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tarif (Rp)</label>
                    <input class="form-control rupiah" type="text" name="tagihan" required>
                  </div>
                  <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                    <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>master/tarif_pembayaran/<?php echo $id_jenis_pembayaran; ?>"><i class="fa fa-repeat"> </i> Kembali</a>
                  </div>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
</div>