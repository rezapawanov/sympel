<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul.' - '.$nama_pos_keuangan.' - '.$tahun_ajaran; ?>
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
              <div class="col-xs-12">
              <?php if($tipe_pembayaran == 'Bulanan') { ?>
                <form action="<?php echo base_url(); ?>master/tarif_siswa_save" class="form-horizontal" method="post">
                    <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>" readonly>
                    <div class="form-group">	
                        <label>Kelas</label>		
                        <select class="form-control id_kelas" name="id_kelas">
                            <?php echo $combo_kelas; ?>
                        </select>
                    </div>
                    <div class="form-group">	
                        <label>Siswa</label>		
                        <select  class="form-control combo-siswa" name="id_siswa" required>
                            <?php echo $combo_siswa; ?>
                        </select>
                    </div>
                    <?php
                    $q_bulan = $this->db->query("SELECT * FROM mst_bulan ORDER BY id_bulan ASC");
                    foreach($q_bulan->result_array() as $d_bulan) { ?>
                    <div class="form-group">	
                        <label><?php echo $d_bulan['nama_bulan']; ?> (Rp)</label>
                        <input class="form-control" type="hidden"  name="nama_bulan_<?php echo $d_bulan['nama_bulan']; ?>" value="<?php echo $d_bulan['nama_bulan']; ?>" radonly required>		
                        <input class="form-control rupiah" type="text"  name="tagihan_<?php echo $d_bulan['nama_bulan']; ?>" required>
                    </div>
                    <?php } ?>
                    <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> </i> Simpan</button>
                            <a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>master/tarif_pembayaran/<?php echo $id_jenis_pembayaran; ?>"><i class="fa fa-repeat"> </i> Kembali</a>
                    </div>
                </form>
              <?php } else if($tipe_pembayaran == 'Bebas') {  ?>
                <form action="<?php echo base_url(); ?>master/tarif_siswa_save2" class="form-horizontal" method="post">
                    <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>" readonly>
                    <div class="form-group">	
                        <label>Kelas</label>		
                        <select class="form-control id_kelas" name="id_kelas">
                            <?php echo $combo_kelas; ?>
                        </select>
                    </div>
                    <div class="form-group">	
                        <label>Siswa</label>		
                        <select  class="form-control combo-siswa" name="id_siswa" required>
                            <?php echo $combo_siswa; ?>
                        </select>
                    </div>
                    <div class="form-group">	
                        <label>Tarif (Rp)</label>
                        <input class="form-control rupiah" type="text"  name="tagihan" required>
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


<script>
    $(".id_kelas").change(function() {
      var id_kelas = $(".id_kelas").val();
      $.get("<?php echo base_url(); ?>master/ajax_combo_siswa",{id_kelas:id_kelas}, function(data) {
          $(".combo-siswa").html(data);
      });
    });
</script>