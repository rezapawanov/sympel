<?php
$bulan_arr = array(
                        '01' => 'JANUARI',
                        '02' => 'FEBRUARI',
                        '03' => 'MARET',
                        '04' => 'APRIL',
                        '05' => 'MEI',
                        '06' => 'JUNI',
                        '07' => 'JULI',
                        '08' => 'AGUSTUS',
                        '09' => 'SEPTEMBER',
                        '10' => 'OKTOBER',
                        '11' => 'NOVEMBER',
                        '12' => 'DESEMBER',
                );


?>


<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" style="font-size: 14px;">Laporan Penagihan</a>
            <a href="#" style="font-size: 14px;"><?php if($bulan != 'ALL') echo $bulan_arr[$bulan].' '.$tahun; else echo ' SEMUA BULAN '.$tahun; ?></a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid" style="margin: 0;">
          <div class="span12">
            <br>
            <div class="row-fluid">
                <div class="span12" style="text-align: center;">
                  <a class="btn btn-danger" href="<?php echo base_url().'laporan/penagihan_export/'.$bulan.'/'.$tahun.'/'.$anggota.'/'.$group.'/'.$jenis.'/'.$status; ?>" target="_blank">Export to Excel</a>
                </div>
            </div>
            <br>
            <div class="row-fluid" style="margin: 0;">
              <div class="span12">
                <form action="<?php echo base_url(); ?>laporan/cari" method="post">
                <select style="margin: 0;width:170px;" name="bulan">
                  <option value="ALL">[ SEMUA BULAN ]</option>
                  <option value="01" <?php if($bulan == '01') echo 'selected'; ?>>JANUARI</option>
                  <option value="02"  <?php if($bulan == '02') echo 'selected'; ?>>FEBRUARI</option>
                  <option value="03" <?php if($bulan == '03') echo 'selected'; ?>>MARET</option>
                  <option value="04" <?php if($bulan == '04') echo 'selected'; ?>>APRIL</option>
                  <option value="05" <?php if($bulan == '05') echo 'selected'; ?>>MEI</option>
                  <option value="06" <?php if($bulan == '06') echo 'selected'; ?>>JUNI</option>
                  <option value="07" <?php if($bulan == '07') echo 'selected'; ?>>JULI</option>
                  <option value="08" <?php if($bulan == '08') echo 'selected'; ?>>AGUSTUS</option>
                  <option value="09" <?php if($bulan == '09') echo 'selected'; ?>>SEPTEMBER</option>
                  <option value="10" <?php if($bulan == '10') echo 'selected'; ?>>OKTOBER</option>
                  <option value="11" <?php if($bulan == '11') echo 'selected'; ?>>NOVEMBER</option>
                  <option value="12" <?php if($bulan == '12') echo 'selected'; ?>>DESEMBER</option>
                </select>
                 <select style="margin: 0;width:100px;" name="tahun">  
                      <?php
            for ($x=date("Y")-10; $x<=date("Y"); $x++)
              {
                if($x == $tahun) {
                  $selected = 'selected';
                } else {
                  $selected = '';
                }
                echo'<option value="'.$x.'" '.$selected.'>'.$x.'</option>'; 
              } 
            ?> 
                </select>
                <select class="select2" style="margin: 0;width:200px;" name="anggota">
                  <?php echo $combo_anggota;  ?>
                </select>
                <select class="select2" style="margin: 0;width:200px;" name="group">
                  <?php echo $combo_group;  ?>
                </select>
                <select class="select2" style="margin: 0;width:200px;" name="jenis">
                  <?php echo $combo_jenis;  ?>
                </select>
                <select style="margin: 0;" name="status">
                  <option value>[SEMUA STATUS BAYAR]</option>
                  <option value="1" <?php if($status == '1') echo 'selected'; ?>>SUDAH BAYAR</option>
                  <option value="2" <?php if($status == '2') echo 'selected'; ?>>BELUM BAYAR</option>
                </select>
                <button style="margin: 0;"  class="btn btn-primary">Tampilkan Data</button> 
                </form>
              </div>
            </div>
              

            <div class="widget-box">
              <div class="widget-content nopadding">
                     
              </div>
                     
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Bulan Tahun</th>
                      <th>Nama Perusahaan </th>
                      <th>Jenis Perusahaan</th>
                      <th>Group</th>
                      <th>Jumlah Tagihan (Rp)</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    foreach($penagihan->result_array() as $data) { 
                        $total += $data['jumlah_bayar'];
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $bulan_arr[date("m", strtotime($data['tanggal_event']))].' '.date("Y",strtotime($data['tanggal_event'])); ?></td>
                      <td><?php echo $data['nama_pt']; ?></td>
                      <td><?php echo $data['nama_jenis']; ?></td>
                      <td><?php echo $data['nama_group']; ?></td>
                      <td style="text-align: right;"><?php echo number_format($data['jumlah_bayar']); ?></td>
                      <td style="text-align: center;"><?php if(!empty($data['tanggal']) && $data['tanggal'] != "0000-00-00") echo $data['tanggal']; ?></td>
                      <td style="text-align: center;">
                          <?php if(!empty($data['tanggal']) && $data['tanggal'] != "0000-00-00") echo 'SUDAH BAYAR'; else echo 'BELUM BAYAR'; ?>
                      </td>
                      </tr>
                        <?php $no++; } ?>
                      <tr>
                        <td colspan="5" style="text-align: right;font-weight: bold;">Total (Rp)</td>
                        <td style="text-align: right;font-weight: bold;"><?php echo number_format($total); ?></td>
                        <td colspan="2"></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
</div> 