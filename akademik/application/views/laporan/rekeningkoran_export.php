<?php
header("Content-type: application/vnd-ms-excel");
$tgl = date("d-m-Y");
$judul = "LAPORAN_REKENING_KORAN_".$bulan."_".$tahun.".xls";
header("Content-Disposition: attachment; filename=$judul");

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
                <p>Laporan Penagihan <?php if($bulan != 'ALL') echo $bulan_arr[$bulan].' '.$tahun; else echo ' SEMUA BULAN '.$tahun; ?></p>
                <table class="table table-bordered" style="width:100%;">
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
                          <td><?php echo $data['tanggal']; ?></td>
                          <td><?php echo $data['deskripsi']; ?></td>
                          <td><?php echo $data['debit']; ?></td>
                          <td><?php echo $data['kredit']; ?></td>
                          <td><?php echo $data['saldo_akhir']; ?></td>
                        </tr>
                  <?php  } ?>
                  </tbody>
                </table>