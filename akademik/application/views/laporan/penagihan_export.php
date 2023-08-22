<?php
header("Content-type: application/vnd-ms-excel");
$tgl = date("d-m-Y");
$judul = "LAPORAN_PENAGIHAN_".$bulan."_".$tahun.".xls";
header("Content-Disposition: attachment; filename=$judul");

$bulan_arr = array(
                        '01' => 'JANUARI',
                        '02' => 'FEBRUARI',
                        '03' => 'MARET',
                        '04' => "APRIL",
                        '05' => 'MEI',
                        '06' => 'JUNI',
                        '07' => 'JULI',
                        '08' => 'AGUSTUS',
                        '09' => "'SEPTEMBER",
                        '10' => "'OKTOBER",
                        '11' => 'NOPEMBER',
                        '12' => 'DESEMBER',
                );

?>
                <p>Laporan Penagihan <?php if($bulan != 'ALL') echo $bulan_arr[$bulan].' '.$tahun; else echo ' SEMUA BULAN '.$tahun; ?></p>
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
                      <td style="text-align: right;"><?php echo $data['jumlah_bayar']; ?></td>
                      <td style="text-align: center;"><?php if(!empty($data['tanggal']) && $data['tanggal'] != "0000-00-00") echo $data['tanggal']; ?></td>
                      <td style="text-align: center;">
                          <?php if(!empty($data['tanggal']) && $data['tanggal'] != "0000-00-00") echo 'SUDAH BAYAR'; else echo 'BELUM BAYAR'; ?>
                      </td>
                      </tr>
                        <?php $no++; } ?>
                      <tr>
                        <td colspan="5" style="text-align: right;font-weight: bold;">Total (Rp)</td>
                        <td style="text-align: right;font-weight: bold;"><?php echo $total; ?></td>
                        <td colspan="2"></td>
                      </tr>
                  </tbody>
                </table>