  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated bounceIn">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-2">
            <div class="card card-info card-outline">
              <center><h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-school mt-1"></i> <br>DAFTAR LAYOUT INFORMASI KESISWAAN</h1> </center>
              <hr>
              <div class="container-fluid">
                <div class="row">
                  <!-- DATA KELAS -->
                  <div class="col-md-6">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title text-info" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-users-class"></i> DAFTAR KELAS</h3>
                        <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                        </div>
                      </div>
                          <div class="card-body p-0">
                              <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                            <th style="width: 10px">No.</th>
                            <th>Kelas</th>
                            <th>LK</th>
                            <th>PR</th>
                            <th>Wali Kelas</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach($data_kelas->result_array() as $data) {  
                            $get_walikelas = $this->db->query("SELECT nama_guru FROM mst_walikelas 
                                    INNER JOIN mst_guru ON mst_walikelas.id_guru = mst_guru.id_guru 
                                    INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas WHERE mst_walikelas.id_kelas = $data[id_kelas] AND mst_walikelas.tahun_ajaran = '$tahun_ajaran'");
                            $hitung_pria = $this->db->query("SELECT COUNT(*) as hitung FROM mst_siswa WHERE id_kelas = '$data[id_kelas]' AND jenis_kelamin = 'Laki-Laki'")->row();
                            $hitung_wanita = $this->db->query("SELECT COUNT(*) as hitung FROM mst_siswa WHERE id_kelas = '$data[id_kelas]' AND jenis_kelamin = 'Perempuan'")->row();
                            if($get_walikelas->num_rows() > 0) {
                              $d_walikelas = $get_walikelas->row();
                              $nama_walikelas = $d_walikelas->nama_guru;
                            } else {
                              $nama_walikelas = "";
                            }
                            
                            ?>
                          <tr>
                            <td class="text-sm"><?php echo $no; ?></td>
                            <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                            <td class="text-sm text-purple"><?php echo $hitung_pria->hitung; ?></td>
                            <td class="text-sm text-purple"><?php echo $hitung_wanita->hitung; ?></td>
                            <td class="text-sm text-info"><?php echo $nama_walikelas; ?></td>
                          </tr>
                          <?php $no++; } ?>
                        </tbody>
                      </table></div>
                    </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                        <h3 class="card-title text-info"><i class="fas fa-users-class"></i> DATA KESISWAAN</h3>
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
                            <span class="info-box-icon bg-danger elevation-1"><i class="far fa-user-times"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-danger" ><b>ALFA</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_alpa; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-purple elevation-1"><i class="fad fa-user-secret"></i></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-purple" ><b>PELANGGARAN</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_pelanggaran; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fal fa-hospital-user"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-success" ><b>SAKIT</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_sakit; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-teal elevation-1"><i class="fad fa-people-carry"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-teal" ><b>PEMINJAMAN</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_peminjaman; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fad fa-user-shield"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-info" ><b>IJIN</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_izin; ?></span>
                            </div>
                          </div></a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                          <a style="color:black;">
                          <div class="info-box">
                            <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-person-carry"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text text-navy" ><b>SITAAN</b></span>
                              <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_barangsita; ?></span>
                            </div>
                          </div></a>
                        </div>

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
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="animated fadeInUp content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
           <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"><i class="fad fa-chart-pie"></i> Persentase Kehadiran Siswa</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="pie-absen" style="background:none;height: 400px; width:100%; margin: 0 auto"></div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title text-info" ><i class="fad fa-calendar-check"></i> Catatan Agenda Atau Kegiatan</h3>
                <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      
                    </div>
                </div>
              <div class="card-body p-0 mr-2 ml-2 mb-2">
                  <div id="calendar"></div>
              </div>
            </div>
            <!-- /.card -->
          </div>
         
        </div>

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade in" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php echo base_url(); ?>app/agenda_save" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addModalLabel">Tambah Catatan / Agenda</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="add" value="1">
          <label>Tanggal*</label>
          <p id="labelDate"></p>
          <input type="hidden" name="date" class="form-control" id="inputDate">
          <label>Keterangan*</label>
          <textarea name="info" id="inputDesc" class="form-control"></textarea><br />
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnSimpan" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php echo base_url(); ?>app/agenda_hapus" method="post" accept-charset="utf-8">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Hapus Catatan / Agenda</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="idDel">
          <label>Tahun</label>
          <p id="showYear"></p>
          <label>Tanggal</label>
          <p id="showDate"></p>
          <label>Keterangan*</label>
          <p id="showDesc"></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'prevYear,nextYear',
    },

    events: "<?php echo base_url(); ?>home/get_calendar",

    dayClick: function(date, jsEvent, view) {
     
      var tanggal = date.getDate();
      var bulan = date.getMonth() + 1;
      var tahun = date.getFullYear();
      var fullDate = tahun + '-' + bulan + '-' + tanggal;

      $('#addModal').modal('toggle');
      $('#addModal').modal('show');

      $("#inputDate").val(fullDate);
      $("#labelDate").text(fullDate);
      $("#inputYear").val(date.getFullYear());
      $("#labelYear").text(date.getFullYear());
    },

    eventClick: function(calEvent, jsEvent, view) {
      $("#delModal").modal('toggle');
      $("#delModal").modal('show');
      $("#idDel").val(calEvent.id);
      $("#showYear").text(calEvent.year);

      var tgl = calEvent.start.getDate();
      var bln = calEvent.start.getMonth() + 1;
      var thn = calEvent.start.getFullYear();

      $("#showDate").text(tgl + '-' + bln + '-' + thn);
      $("#showDesc").text(calEvent.title);
    }


  });
</script>

<script>
  Highcharts.chart('pie-absen', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      backgroundColor: 'transparent',
      type: 'pie'
    },
    title: {
      text: ''
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    series: [{
      name: 'Kategori',
      colorByPoint: true,
      data: [{
        name: 'Sakit',
        y: <?php echo $hitung_sakit; ?>
      }, {
        name: 'Izin',
        y: <?php echo $hitung_izin; ?>
      }, {
        name: 'Alpa',
        y: <?php echo $hitung_alpa; ?>
      }]
    }]
  });
</script>