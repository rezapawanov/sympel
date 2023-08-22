<div class="row">

	     <div class="col-md-3">
            <div class="row">
                   <div class="col-md-12">
                <div class="panel panel-default"">
                      <div class="panel-heading" style="background: #000;color:#fff;font-weight: bold;">
                        <h3 class="panel-title">Tahun Register</h3>
                      </div>
                      <div class="panel-body" style="background: #c9ddcd ">
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
	<div class="col-md-9">
		<h2 class="page-header" style="margin: 0;border-color: #ccc;"><?php echo 'Putusan Peradilan Tata Usaha Nomor '.$nomor; ?></h2>
		<br>
		<table class="table table-bordered">
                  <tr>
                        <td style="width: 200px;">Nomor</td>
                        <td><?php echo $nomor; ?></td>
                  </tr>      
                  <tr>                        
                        <td>Tingkat Proses</td>
                        <td><?php echo $tingkat_proses; ?></td>
                  </tr> 
                    <tr>                        
                        <td>Tahun Register</td>
                        <td><?php echo $tahun_register; ?></td>
                  </tr> 
                  <tr>
                        <td>Jenis Perkara</td>
                        <td><?php echo $jenis_perkara; ?></td>
                  </tr>
                   <tr>
                        <td>Klasifikasi</td>
                        <td><?php echo $klasifikasi; ?></td>
                  </tr> 
                   <tr>
                        <td>Sub Klasifikasi</td>
                        <td><?php echo $sub_klasifikasi; ?></td>
                  </tr>  
                   <tr>
                        <td>Jenis Lembaga Peradilan</td>
                        <td><?php echo $jenis_lembaga; ?></td>
                  </tr>
                   <tr>
                        <td>Lembaga Peradilan</td>
                        <td><?php echo $lembaga_peradilan; ?></td>
                  </tr>
                  <tr>                        
                        <td>Para Pihak</td>
                        <td><?php echo nl2br($para_pihak); ?></td>
                  </tr> 
                   <tr>
                        <td>Tahun</td>
                        <td><?php echo $tahunx; ?></td>
                  </tr>
                   <tr>
                        <td>Tanggal Musyawarah</td>
                        <td><?php echo date("d-m-Y", strtotime($tanggal_musyawarah)); ?></td>
                  </tr> 
                  <tr>                        
                        <td>Tanggal Dibacakan</td>
                        <td><?php echo date("d-m-Y", strtotime($tanggal_dibacakan)); ?></td>
                  </tr>  

                   <tr>
                        <td>Amar</td>
                        <td><?php echo $amar; ?></td>
                  </tr>

                   <tr>
                        <td>Tim</td>
                        <td><?php echo $tim; ?></td>
                  </tr>

                   <tr>
                        <td>Hakim Majelis</td>
                        <td><?php echo $hakim_majelis; ?></td>
                  </tr>
                  
                  <tr>                        
                        <td>Hakim Ketua</td>
                        <td><?php echo $hakim_ketua; ?></td>
                  </tr>   
                  <tr>                        
                        <td>Hakim Anggota</td>
                        <td><?php echo nl2br($hakim_anggota); ?></td>
                  </tr> 
                   <tr>
                        <td>Panitera</td>
                        <td><?php echo $panitera; ?></td>
                  </tr>
                   <tr>
                        <td>Berkekuatan Hukum Tetap</td>
                        <td><?php echo $berkekuatan_hukum; ?></td>
                  </tr>
            </table>

            <a class="btn btn-primary btn-xs" href="<?php echo base_url().'upload/'.$gambar; ?>" target="_blank">Download PDF<i class="fa fa-download"> </i></a>
	</div>
</div>