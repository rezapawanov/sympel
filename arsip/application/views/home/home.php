  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInDown">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <div class="card card-info card-outline">
              <center><h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-desktop-alt mt-2"></i> <br>DAFTAR LAYOUT ARSIP</h1> </center>
              <hr>
                <div class="row ml-2 mr-2">

          <div class="col-12 col-sm-6 col-md-3">
            <a style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-danger" ><b>JUMLAH DOKUMEN</b></span>
                <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_dokumen; ?></span>
              </div>
            </div></a>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <a style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-purple elevation-1"><i class="fal fa-tasks-alt nav-icon"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-purple" ><b>JUMLAH RAK</b></span>
                <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_rak; ?></span>
              </div>
            </div></a>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <a style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-cyan elevation-1"><i class="fas fa-box-open nav-icon "></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-cyan" ><b>JUMLAH BOX</b></span>
                <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_box; ?></span>
              </div>
            </div></a>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <a style="color:black;">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-books nav-icon"></i></span>
              <div class="info-box-content">
                <span class="info-box-text text-success" ><b>JUMLAH MAP</b></span>
                <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_map; ?></span>
              </div>
            </div></a>
          </div>

          
          <!-- /.col -->
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
        <!-- Info boxes -->
        
        <!-- /.row -->
        <div class="row">
           <!-- /.col -->
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title text-info"><i class="fas fa-file-alt"></i> Jumlah Dokumen</h3>
                <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      
                    </div>
              </div>
                  <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Jenis Dokumen</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                $no = 1;
                foreach ($data_jenis->result_array() as $data) {
                
                  $hitung_jenis = $this->db->query("SELECT COUNT(*) as hitung FROM dokumen WHERE id_jenis_dokumen = '$data[id_jenis_dokumen]'")->row();
                

                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nama_jenis_dokumen']; ?></td>
                    <td><?php echo $hitung_jenis->hitung; ?></td>
                <?php $no++;
                } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title text-info"><i class="fad fa-calendar-check"></i> Catatan Agenda Atau Kegiatan</h3>
                <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      
                    </div>
                </div>
              <div class="card-body p-0 ml-2 mr-2">
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
  <!-- /.content-wrapper -->
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