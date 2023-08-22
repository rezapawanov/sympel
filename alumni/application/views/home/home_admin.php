<?php
$alumni = $this->db->query("SELECT COUNT(*) as hitung FROM mst_alumni WHERE status_aktif = 1")->row();
$get_angkatan = $this->db->query("SELECT * FROM mst_alumni WHERE status_aktif = 1 GROUP BY angkatan");
foreach ($get_angkatan->result_array() as $data_angkatan) {
  $angkatan[] = $data_angkatan['angkatan'];
}
$total_kuliah = 0;
$total_kerja = 0;
$total_wirausaha = 0;
$total_lain = 0;
foreach ($angkatan as $item) {
  $hitung_kerja = $this->db->query("SELECT COUNT(*) as hitung FROM mst_alumni WHERE angkatan = '$item' AND aktivitas_1 = 'Kerja'")->row();
  $hitung_kuliah = $this->db->query("SELECT COUNT(*) as hitung FROM mst_alumni WHERE angkatan = '$item' AND aktivitas_2 = 'Kuliah'")->row();
  $hitung_wirausaha = $this->db->query("SELECT COUNT(*) as hitung FROM mst_alumni WHERE angkatan = '$item' AND aktivitas_3 = 'Wirausaha'")->row();
  $hitung_lain = $this->db->query("SELECT COUNT(*) as hitung FROM mst_alumni WHERE angkatan = '$item' AND aktivitas_3 = 'Yang Lain'")->row();

  $hitung_kosong = $this->db->query("SELECT COUNT(*) as hitung FROM mst_alumni WHERE angkatan = '$item' AND aktivitas_1 IS NULL AND aktivitas_2 IS NULL AND aktivitas_3 IS NULL AND aktivitas_4  IS NULL")->row();

  $total_kuliah += $hitung_kuliah->hitung;
  $total_kerja += $hitung_kerja->hitung;
  $total_wirausaha += $hitung_wirausaha->hitung;
  $total_lain += $hitung_lain->hitung + $hitung_kosong->hitung;

  $aktivitas_kerja[] = $hitung_kerja->hitung;
  $aktivitas_kuliah[] = $hitung_kuliah->hitung;
  $aktivitas_wirausaha[] = $hitung_wirausaha->hitung;
  $aktivitas_yanglain[] = $hitung_lain->hitung + $hitung_kosong->hitung;
}

$angkatan_output = implode(",", $angkatan);
$aktivitas_kerja_output = implode(",", $aktivitas_kerja);
$aktivitas_kuliah_output = implode(",", $aktivitas_kuliah);
$aktivitas_wirausaha_output = implode(",", $aktivitas_wirausaha);
$aktivitas_yanglain_output = implode(",", $aktivitas_yanglain);
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated bounceIn">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-2">
            <div class="card card-purple card-outline">
              <center><h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-school mt-1"></i> <br>DAFTAR INFORMASI ALUMNI</h1> </center>
              <hr>
              <div class="container-fluid">
                <div class="row">
                  <!-- DATA KELAS -->
                  <div class="col-md-6">
                    <div class="card card-purple card-outline">
                      <div class="card-header">
                        <h3 class="card-title text-purple" style="text-shadow: 2px 2px 4px #fff;"><i class="fas fa-users-class"></i> DAFTAR GRAFIK INFORMASI ALUMNI</h3>
                        <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                        </div>
                      </div>
                          <div class="card-body p-0">
                        <div id="grafik1"></div>
                    </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card card-purple card-outline">
                      <div class="card-header">
                        <h3 class="card-title text-purple" style="text-shadow: 2px 2px 4px #fff;"><i class="fas fa-users-class"></i> PENDATAAN ALUMNI</h3>
                        <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                        </div>
                      </div>
                      <div class="card-body p-0">
                      <div class="row mt-3 ml-1 mr-1">
                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users-class"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-danger" ><b>TOTAL ALUMNI</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $alumni->hitung; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-blue elevation-1"><i class="fal fa-user-graduate"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-blue" ><b>KULIAH</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $total_kuliah; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fal fa-hospital-user"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-success" ><b>BEKERJA</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $total_kerja; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-teal elevation-1"><i class="fad fa-people-carry"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-teal" ><b>WIRAUSAHA</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $total_wirausaha; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fad fa-user-shield"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-info" ><b>LAINNYA</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $total_lain; ?></span>
                            </div>
                          </div></a>
                        </div>

                    </div>
                    </div>
                  </div>
                  
                </div>  

              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  </div>

  <script>
  Highcharts.chart('grafik1', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Grafik Informasi Aktivitas Alumni'
    },
    xAxis: {
      categories: [<?php echo $angkatan_output; ?>],
      crosshair: true
    },
    yAxis: {
      allowDecimals: false,
      min: 0,
      title: {
        text: 'Jumlah Alumni'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y} org</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Kerja',
      data: [<?php echo $aktivitas_kerja_output; ?>]

    }, {
      name: 'Kuliah',
      data: [<?php echo $aktivitas_kuliah_output; ?>]

    }, {
      name: 'Wirausaha',
      data: [<?php echo $aktivitas_wirausaha_output; ?>]

    }, {
      name: 'Yang Lain',
      data: [<?php echo $aktivitas_yanglain_output; ?>]

    }]
  });
</script>