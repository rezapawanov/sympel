<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
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
          <div class="box box-success">
						<div class="box-header with-border">
              <h4 class="box-title">Cari Data Siswa</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo base_url(); ?>pembayaran/proses_cari_siswa" class="form-horizontal" method="post">
              <div class="form-group">						
                <label for="" class="col-sm-2 control-label">Tahun Ajaran</label>
                <div class="col-sm-3">
                  <select class="form-control" name="tahun_ajaran" required>
                    <?php echo $combo_tahun_ajaran; ?>
                  </select>
                </div>
                <label for="" class="col-sm-2 control-label">Cari Siswa</label>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input id="cari-siswa" type="text" class="form-control" autofocus="" name="nis" placeholder="Nama Siswa" required>
                    <span class="input-group-btn">
                      <button class="btn btn-success" type="submit">Cari</button>
                    </span>
                  </div>
                </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <?php if(!empty($tampil)) { ?>
        <div class="col-xs-8">
          <div class="box box-success">
                <div class="box-header with-border">
                  <h4 class="box-title">Informasi Data Siswa</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td width="200">Tahun Ajaran</td>
                        <td width="4">:</td>
                        <td><?php echo $tahun_ajaran; ?></td>
                      </tr>
                      <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td><?php echo $nis; ?></td>
                      </tr>
                      <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td><?php echo $nama_siswa; ?></td>
                      </tr>
                      <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?php echo $nama_kelas; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
          </div>
        </div>

        <div class="col-xs-4">
          <div class="box box-success">
                <div class="box-header with-border">
                  <h4 class="box-title">Cetak Bukti Pembayaran</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <form action="<?php echo base_url().'pembayaran/cetak_bukti/'; ?>" method="GET" >
									<input type="hidden" name="nis" value="<?php echo $nis; ?>">
                  <input type="hidden" name="kelas" value="<?php echo $nama_kelas; ?>">
									<div class="form-group">
										<label>Tanggal Transaksi</label>
										<div class="input-group date " data-date="<?php echo date("Y-m-d"); ?> data-date-format="yyyy-mm-dd">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											<input class="form-control tgl"  type="text" name="tanggal" value="<?php echo date("d-m-Y"); ?>" required>
										</div>
									</div>
									<button class="btn btn-success btn-block" formtarget="_blank" type="submit">Cetak</button>
								  </form>
                </div>
          </div>
        </div>

        <div id="elembayar" class="col-xs-12">
          <div class="box box-success">
                <div class="box-header with-border">
                  <h4 class="box-title">Tagihan Pembayaran</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
								      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Bulanan</a></li>
								      <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Bebas</a></li>
							      </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                        <?php foreach($jenis_pembayaran_bulanan->result_array() as $data) { 
                          $q_tagihan = $this->db->query("SELECT * FROM pembayaran_bulanan WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa");
                          $sisa_tagihan = $this->db->query("SELECT SUM(tagihan) as hitung FROM pembayaran_bulanan WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa AND bayar = 0")->row();
                          ?>
                        <div class="table-responsive">
                          <table class="table table-striped" style="white-space: nowrap;">
                            <thead>
                              <tr>
                                <th>Nama Pembayaran</th>
                                <th>Sisa Tagihan</th>
                                <?php foreach($q_tagihan->result_array() as $d_tagihan) { ?>
                                <th><?php echo $d_tagihan['bulan']; ?></th>
                                <?php } ?>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td><?php echo $data['nama_pos_keuangan'].' - '.$data['tahun_ajaran']; ?></td>
                                  <td>Rp <?php echo number_format($sisa_tagihan->hitung); ?></td>
                                  <?php foreach($q_tagihan->result_array() as $d_tagihan) { 
                                      if($d_tagihan['bayar'] == 0) {
                                        $style = 'class="danger"';
                                        $class = 'class="bayar-bulanan"';
                                        $confirm = 'Yakin Ingin Melakukan Pembayaran Pada Bulan Ini ?';
                                        $tagihan = 'Rp '.number_format($d_tagihan['tagihan']);
                                      } else {
                                        $style = 'class="success"';
                                        $class = 'class="hapus-bulanan"';
                                        $tagihan = date("d/m/Y",strtotime($d_tagihan['tanggal']));
                                        $confirm = 'Yakin Ingin Menghapus Pembayaran Pada Bulan Ini ?';
                                      }
                                    ?>
                                  <td <?php echo $style; ?>><a <?php echo $class; ?> data-id_pembayaran_bulanan="<?php echo $d_tagihan['id_pembayaran_bulanan']; ?>" data-nis="<?php echo $nis; ?>" data-tahun_ajaran="<?php echo $tahun_ajaran; ?>" data-tagihan="<?php echo $d_tagihan['tagihan']; ?>" href="" onclick="return confirm('<?php echo $confirm; ?>'); "><?php echo $tagihan; ?></a></td>
                                  <?php } ?>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                        <hr>
                        <?php } ?>
                      </div>
                      <div class="tab-pane" id="tab_2">
                        <div class="table-responsive">
                          <table class="table table-striped" style="white-space: nowrap;">
                            <thead>
                              <tr>
                                <th>Nama Pembayaran</th>
                                <th>Sisa Tagihan</th>
                                <th>Dibayar</th>
                                <th>Status Bayar</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach($jenis_pembayaran_bebas->result_array() as $data) { 
                              $q_tagihan = $this->db->query("SELECT * FROM pembayaran_bebas WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa")->row();
                              $bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $q_tagihan->id_pembayaran_bebas")->row(); 
                              $sisa_tagihan = $q_tagihan->tagihan - $bayar->hitung; 
                              if($sisa_tagihan > $bayar->hitung) {
                                $status = '<a href="" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="'.$q_tagihan->id_pembayaran_bebas.'" data-nis="'.$nis.'" data-tahun_ajaran="'.$tahun_ajaran.'">Belum Lunas</a>';
                                $class = 'class="danger"';
                              } else {
                                $status = '<a href="" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="'.$q_tagihan->id_pembayaran_bebas.'" data-nis="'.$nis.'" data-tahun_ajaran="'.$tahun_ajaran.'"> Lunas</a>';
                                $class = 'class="success"';
                              }
                            ?>
                                <tr>
                                  <td><?php echo $data['nama_pos_keuangan'].' - '.$data['tahun_ajaran']; ?></td>
                                  <td <?php echo $class; ?>>Rp <?php echo number_format($sisa_tagihan); ?></td>
                                  <td <?php echo $class; ?>>Rp <?php echo number_format($bayar->hitung); ?></td>
                                  <td <?php echo $class; ?>>
                                      <?php
                                        echo $status;
                                      ?>
                                  </td>
                                  <td <?php echo $class; ?>><a class="btn btn-success btn-xs bayar-bebas" href="" data-toggle="modal" data-target="#modalAdd" data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>" data-nis="<?php echo $nis; ?>" data-tahun_ajaran="<?php echo $tahun_ajaran; ?>" data-tagihan="<?php echo $sisa_tagihan; ?>" data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>" data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'].' - '.$tahun_ajaran; ?>"><i class="fa fa-money"> </i> Bayar </a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      <?php } ?>
          
      </div>
      <!-- /.row -->

    </section>
</div>

        <div class="modal fade" id="modalView">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lihat Pembayaran / Cicilan</h4>
              </div>
              <div class="modal-body">
                <div id="tempat-view"></div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modalAdd">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Pembayaran / Cicilan</h4>
              </div>
              <div class="modal-body">
                <div id="info"></div>
                <form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_save" method="post" onsubmit="return cek_bayar(this);">
                  <input class="id_pembayaran_bebas" type="hidden" name="id_pembayaran_bebas" readonly>
                  <input class="nis" type="hidden" name="nis" readonly>
                  <input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
                  <input class="tagihan" type="hidden" name="tagihan" readonly>
                  <div class="form-group">
                    <label>Nama Pembayaran</label>
                    <input type="text" class="form-control nama_pembayaran" name="nama_pembayaran"  readonly>
                  </div>
                  <div class="form-group">
                    <label>Sisa Tagihan (Rp)</label>
                    <input type="text" class="form-control sisa_tagihan" name="sisa_tagihan"  readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Bayar (Rp)</label>
                    <input type="text" class="form-control rupiah bayar" name="bayar"  required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-success"><i class="fa fa-save"> </i> Simpan</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script>

    $(".bayar-bebas").click(function() {
      $(".id_pembayaran_bebas").val($(this).attr('data-id_pembayaran_bebas'));
      $(".nis").val($(this).attr('data-nis'));
      $(".tahun_ajaran").val($(this).attr('data-tahun_ajaran'));
      $(".tagihan").val($(this).attr('data-tagihan'));
      $(".sisa_tagihan").val($(this).attr('data-sisa_tagihan'));
      $(".nama_pembayaran").val($(this).attr('data-nama_pos_keuangan'));
    });


    $(".history-bayar").click(function() {
      var id_pembayaran_bebas = $(this).attr('data-id_pembayaran_bebas');
      var nis = $(this).attr('data-nis');
      var tahun_ajaran = $(this).attr('data-tahun_ajaran');
      $.get("<?php echo base_url(); ?>pembayaran/ajax_history_bayar",{id_pembayaran_bebas:id_pembayaran_bebas,nis:nis,tahun_ajaran:tahun_ajaran}, function(data) {
          $("#tempat-view").html(data);
      }); 
    });

    $(".bayar-bulanan").click(function() {
      var id_pembayaran_bulanan = $(this).attr('data-id_pembayaran_bulanan');
      var nis = $(this).attr('data-nis');
      var tahun_ajaran = $(this).attr('data-tahun_ajaran');
      var tagihan = $(this).attr('data-tagihan');
      
      $.post("<?php echo base_url(); ?>pembayaran/ajax_post_bayar_bulanan",{nis:nis,id_pembayaran_bulanan:id_pembayaran_bulanan,tahun_ajaran:tahun_ajaran,tagihan:tagihan}, function(data) {
          var res = JSON.parse(data);
          document.location.href="<?php echo base_url(); ?>pembayaran/pembayaran_siswa/"+res.tahun_ajaran+"/"+nis;
      }); 
    });


    $(".hapus-bulanan").click(function() {
      var id_pembayaran_bulanan = $(this).attr('data-id_pembayaran_bulanan');
      var nis = $(this).attr('data-nis');
      var tahun_ajaran = $(this).attr('data-tahun_ajaran');
      var tagihan = $(this).attr('data-tagihan');
      
      $.post("<?php echo base_url(); ?>pembayaran/ajax_hapus_bayar_bulanan",{nis:nis,id_pembayaran_bulanan:id_pembayaran_bulanan,tahun_ajaran:tahun_ajaran,tagihan:tagihan}, function(data) {
          var res = JSON.parse(data);
          document.location.href="<?php echo base_url(); ?>pembayaran/pembayaran_siswa/"+res.tahun_ajaran+"/"+nis;
      }); 
    });

    function cek_bayar(form) {
          var tagihan = $(".tagihan").val();
          var bayar = $(".bayar").val();

          
          if(parseInt(bayar) > parseInt(tagihan)) {
            var alert = ' <div class="alert alert-danger">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<i class="fa fa-remove"></i>'+
                          '</button>'+
                          '<span style="text-align: left;">Jumlah Bayar Tidak Boleh Lebih Dari Sisa Tagihan</span>'+
                        '</div>';
            $("#info").html(alert);
            return false;
          } else {
            return true;
          } 
    }
</script>

<script>
    $(document).ready(function () {
        $('#cari-siswa').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "<?php echo base_url(); ?>pembayaran/ajax_siswa",
					          data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                      result($.map(data, function (item) {
                        return item;
                        }));
                    }
                });
            }
        });
    });
</script>