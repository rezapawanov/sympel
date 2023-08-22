  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header animated bounceIn">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-12 mt-2">
                      <div class="card card-info card-outline">
                          <center>
                              <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-school mt-1"></i> <br>DAFTAR LAYOUT INFORMASI PENDAFTARAN</h1>
                          </center>
                          <hr>
                          <div class="container-fluid">
                              <div class="row">


                                  <div class="col-md-12">
                                      <div class="card card-info card-outline">
                                          <div class="card-header">
                                              <h3 class="card-title text-info"><i class="fas fa-users-class"></i> DATA PENDAFTARAN</h3>
                                              <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                  </button>
                                              </div>
                                          </div>
                                          <div class="card-body p-0">
                                              <div class="row mt-3 ml-1 mr-1">
                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-info elevation-1"><i class="fad fa-users-medical"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>PENDAFTAR</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_daftar; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-navy elevation-1"><i class="fad fa-male"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>JUMLAH LAKI-LAKI</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_pria; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>
                                                  
                                                  <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-pink elevation-1"><i class="fad fa-female"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>JUMLAH PEREMPUAN</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_wanita; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                              </div>
                                              <div class="col-md-3">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-teal elevation-1"><i class="fad fa-shield-check"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>REGISTRASI</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_terima; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-12">
                                      <div class="card card-navy">
                                        <div class="card-header">
                                          <h3 class="card-title">DATA PENDAFTAR PSB</h3>

                                          <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                            </button>
                                          </div>
                                          <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                           <?php
                                                            $res = array();
                                                          $q = $this->db->query("SELECT asal_sekolah FROM ppdb_siswa GROUP BY asal_sekolah");
                                                          foreach($q->result_array() as $data) {
                                                            $hitung = $this->db->query("SELECT COUNT(*) hitung FROM ppdb_siswa WHERE asal_sekolah = '$data[asal_sekolah]'")->row();
                                                          $arr['label'] = $data['asal_sekolah'];
                                                          $arr['y'] = $hitung->hitung;
                                                          $arrs[] = $arr;
                                                          }
                                                          $res = $arrs;
                                                          $json = json_encode($res, JSON_NUMERIC_CHECK);
                                                            ?>
                                        </div>
                                        <!-- /.card-body -->
                                      </div>
                                      <!-- /.card -->
                                    </div>

                              </div>

                          </div>
                      </div>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  </div>
  
  <script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light1", // "light2", "dark1", "dark2"
  animationEnabled: false, // change to true    
  title:{
    text: "DATA SEKOLAH PENDAFTAR PSB"
  },
  axisY: {
    title: "JUMLAH PENDAFTAR",
    suffix: " Orang",
  },
  axisX: {
    title: "NAMA SEKOLAH"
  },
  data: [
  {
    // Change type to "bar", "area", "spline", "pie",etc.
    type: "column",
    dataPoints: <?php echo $json; ?>
  }
  ]
});
chart.render();

}
</script>