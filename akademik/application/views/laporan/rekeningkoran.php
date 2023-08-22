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
                  <a class="btn btn-danger" href="<?php echo base_url().'laporan/rekeningkoran_export/'.$bulan.'/'.$tahun; ?>" target="_blank">Export to Excel</a>
                </div>
            </div>
            <br>
            <div class="row-fluid" style="margin: 0;">
              <div class="span12">
                <form action="<?php echo base_url(); ?>laporan/cari_rekening" method="post">
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
               
                <button style="margin: 0;"  class="btn btn-primary">Tampilkan Data</button> 
                </form>
              </div>
            </div>
              

            <div class="widget-box">
              <div class="widget-content nopadding">
                     
              </div>
                     
                <table class="table table-bordered data-table">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Deskripsi </th>
                      <th>Debit</th>
                      <th>Kredit</th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    foreach($rekeningkoran->result_array() as $data) { ?>
                        <tr>
                          <td style="text-align:center;"><?php echo date("d-m-Y",strtotime($data['tanggal'])); ?></td>
                          <td><?php echo $data['deskripsi']; ?></td>
                          <td style="text-align:right;"><?php echo number_format($data['debit']); ?></td>
                          <td  style="text-align:right;"><?php echo number_format($data['kredit']); ?></td>
                          <td  style="text-align:right;"><?php echo number_format($data['saldo_akhir']); ?></td>
                        </tr>
                  <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
</div> 