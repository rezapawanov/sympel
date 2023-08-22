<div class="row">

	<div class="col-md-3">
            <div class="row">
                  <div class="col-md-12">
            		<div class="panel panel-default"">
            	      	<div class="panel-heading" style="background: #000;color:#fff;font-weight: bold;">
            	       		<h3 class="panel-title">Tahun Register</h3>
            	      	</div>
                  		<div class="panel-body" style="background: #c9ddcd;word-wrap: break-word;table-layout: fixed;">
                  			<?php
                                          $i = 1;
                  				$q = $this->db->query("SELECT * FROM tbl_putusan GROUP BY tahun_register ORDER BY tahun_register DESC");
                  				foreach($q->result_array() as $tahun) {
                  					echo '<a style="font-size:14px;background:#00B16A;margin:10px;" class="label label-danger" href="'.base_url().'web/direktori_tahun/'.$tahun['tahun_register'].'">'.$tahun['tahun_register'].'</a>';

                                                if($i % 3 == 0) { echo '<br><br>'; }
                  				  $i++;
                                          }
                  			?>
                  		</div>
                  	</div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-md-12">
                        <div class="panel panel-default"">
                              <div class="panel-heading" style="background: #000;color:#fff;font-weight: bold;">
                                    <h3 class="panel-title">Jenis Dokumen</h3>
                              </div>
                              <div class="panel-body" style="background: #c9ddcd ">
                                    <?php
                                          $q = $this->db->query("SELECT * FROM tbl_jenis  ORDER BY id_jenis DESC");
                                          foreach($q->result_array() as $data_jenis) {
                                                echo '<a style="font-size:14px;margin:10px;" href="'.base_url().'web/jenis/'.$data_jenis['id_jenis'].'" class="label label-danger" href="">'.$data_jenis['nama_jenis'].'</a><br><br>';
                                          }
                                    ?>
                              </div>
                        </div>
                  </div>
            </div>
	</div>
	<div class="col-md-6">
		<h2 class="page-header" style="margin: 0;border-color: #ccc;">Putusan Terbaru</h2>
		<br>
		<ul class="putusan">
			<?php
      			$q2 = $this->db->query("SELECT * FROM tbl_putusan WHERE para_pihak LIKE '%$nama_pihak%' AND jenis_perkara LIKE '%$jenis_perkara%' AND nomor LIKE '%$no_putusan%' AND tahun_register LIKE '%$tahun_register%' ORDER BY id_putusan DESC");
      			foreach($q2->result_array() as $putusan) { ?>

      				<li>
      					<a href="<?php echo base_url().'web/detail/'.$putusan['id_putusan']; ?>">
      						<p style="font-size: 11px;"><?php echo 'Register : '.$putusan['tahun_register'].' - Putusan : '.date("d-m-Y",strtotime($putusan['tanggal_dibacakan'])).' - Upload :'.date("d-m-Y",strtotime($putusan['tanggal_upload'])); ?>
      						<h5><?php echo 'Putusan Peradilan Tata Usaha Nomor '.$putusan['nomor']; ?></h5>
      						<p><?php echo 'Para Pihak : '.$putusan['para_pihak']; ?>
      					</a>
      				</li>

      		<?php	} ?>
		</ul>
	</div>


      <div class="col-md-3">

            <div class="panel panel-default"">
                  <div class="panel-heading" style="background: #000;color:#fff;font-weight: bold;">
                  <h3 class="panel-title">Cari Dokumen</h3>
                  </div>
                  <div class="panel-body" style="background: #c9ddcd ">
                        <p>Cari Berdasarkan</p>
                        <form action="<?php echo base_url(); ?>web/direktori_cari" method="post">
                              <div class="form-group">
                                    <input class="form-control" type="text" name="cari_pihak" placeholder="Nama Pihak">
                              </div>
                              <div class="form-group">
                                    <input class="form-control" type="text" name="cari_jenis" placeholder="Jenis Perkara">
                              </div>
                              <div class="form-group">
                                    <input class="form-control" type="text" name="cari_no" placeholder="No. Putusan">
                              </div>
                              <div class="form-group">
                                    <input class="form-control" type="number" name="cari_tahun" placeholder="Tahun Register">
                              </div>

                              <div class="form-group text-center">
                                    <button class="btn btn-danger">Cari <i class="fa fa-search"> </i></button>
                              </div>
                        </form>
                  </div>
            </div>

      </div>
</div>