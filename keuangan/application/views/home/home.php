  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInDown">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <div class="card card-info card-outline">
              <center>
                <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-desktop-alt mt-2"></i> <br>DAFTAR LAYOUT INFORMASI KEUANGAN</h1>
              </center>
              <hr>
              <div class="container-fluid">
                <div class="row">
                <?php if ($this->session->userdata("hak_akses") != 'kantin') { ?>
 <!-- DATA KELAS -->
 <div class="col-md-8">
                    <div class="card card-info card-outline animated fadeInLeft">
                      <div class="card-header">
                        <h3 class="card-title text-info"><i class="fas fa-hand-holding-usd nav-icon text-info"></i> Riwayat Transaksi Terakhir</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <table class="table table-striped table-sm table-responsive">
                          <thead>
                            <tr class="bg-navy">
                              <th class="text-sm" style="width: 10px">No.</th>
                              <th class="text-sm">Nama Siswa</th>
                              <th class="text-sm">Kelas</th>
                              <th class="text-sm">Tanggal</th>
                              <th class="text-sm">Jenis Pembayaran</th>
                              <th class="text-sm">Biaya Pembayaran</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($daftar_pembayaran_bulanan->result_array() as $data) {
                            ?>
                              <tr>
                                <td class="text-sm text-navy"><?php echo $no; ?></td>
                                <td class="text-sm text-danger"><b><?php echo $data['nama_siswa']; ?></b></td>
                                <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                                <td class="text-sm"><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                <td class="text-sm text-indigo"><b><?php echo $data['nama_pos_keuangan'] . ' ' . $data['bulan']; ?></b></td>
                                <td class="text-sm">Rp. <?php echo number_format($data['bayar']); ?></td>
                              </tr>
                            <?php $no++;
                            } ?>

                            <?php
                            foreach ($daftar_pembayaran_bebas->result_array() as $data) {
                            ?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td class="text-sm text-success"><b><?php echo $data['nama_siswa']; ?></b></td>
                                <td><?php echo $data['nama_kelas']; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                <td class="text-sm text-maroon"><b><?php echo $data['nama_pos_keuangan']; ?></b></td>
                                <td>Rp. <?php echo number_format($data['bayar']); ?></td>
                              </tr>
                            <?php $no++;
                            } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                
<?php }else{ ?>                
                <!-- DATA KELAS -->
                  <div class="col-md-8">
                    <div class="card card-info card-outline animated fadeInLeft">
                      <div class="card-header">
                        <h3 class="card-title text-info"><i class="fas fa-hand-holding-usd nav-icon text-info"></i> Riwayat Transaksi Terakhir</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <table class="table table-striped table-sm table-responsive">
                          <thead>
                            <tr class="bg-navy">
                              <th class="text-sm" style="width: 10px">No.</th>
                              <th class="text-sm">Nama Siswa</th>
                              <th class="text-sm">Kelas</th>
                              <th class="text-sm">Tanggal</th>
                              <th class="text-sm">Jumlah Belanja</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($belanja_siswa->result_array() as $data) {
                            ?>
                              <tr>
                                <td class="text-sm text-navy"><?php echo $no; ?></td>
                                <td class="text-sm text-danger"><b><?php echo $data['nama_siswa']; ?></b></td>
                                <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                                <td class="text-sm"><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                <td class="text-sm">Rp. <?php echo number_format($data['harga']); ?></td>
                              </tr>
                            <?php $no++;
                            } ?>

                          
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

<?php } ?>

                  <div class="col-md-4">
                    <div class="card card-info card-outline animated fadeInRight">
                      <div class="card-header">
                        <h3 class="card-title text-info"><i class="fas fa-money-check-alt"></i> Data Keuangan</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="row mt-3 ml-1 mr-1">
                          <?php if ($this->session->userdata("hak_akses") != 'das') { ?>
                            <?php if ($this->session->userdata("hak_akses") != 'kasir') { ?>
                              <div class="col-12 col-sm-6 col-md-12">
                                <a style="color:black;">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-graduation-cap"></i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text text-purple"><b>Total Dana (RABS)</b></span>
                                      <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">Rp. <?php echo number_format($hitung_das_total); ?></span>
                                    </div>
                                  </div>
                                </a>
                              </div>

                              <div class="col-12 col-sm-6 col-md-12">
                                <a style="color:black;">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-address-card"></i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text text-pink"><b>Sisa Dana (RABS)</b></span>
                                      <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">Rp. <?php echo number_format($hitung_das_sisa); ?></span>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            <?php } ?>
                            <div class="col-12 col-sm-6 col-md-12">
                              <a style="color:black;">
                                <div class="info-box">
                                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-donate"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text text-success"><b>PENERIMAAN HARI INI</b></span>
                                    <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">Rp. <?php echo number_format($penerimaan); ?></span>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-12 col-sm-6 col-md-12">
                              <a style="color:black;">
                                <div class="info-box">
                                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-hand-holding-usd"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text text-danger"><b>PENGELUARAN HARI INI</b></span>
                                    <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">Rp. <?php echo number_format($pengeluaran); ?></span>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-12 col-sm-6 col-md-12">
                              <a style="color:black;">
                                <div class="info-box">
                                  <span class="info-box-icon bg-cyan elevation-1"><i class="far fa-money-check-alt"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text text-cyan"><b>TOTAL PENERIMAAN</b></span>
                                    <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">Rp. <?php echo number_format($penerimaan_all); ?></span>
                                  </div>
                                </div>
                              </a>
                            </div>
                          <?php } else {  ?>
                            <div class="col-12 col-sm-6 col-md-12">
                              <a style="color:black;">
                                <div class="info-box">
                                  <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-graduation-cap"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text text-purple"><b>Total Dana (RABS)</b></span>
                                    <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">Rp. <?php echo number_format($hitung_das_total); ?></span>
                                  </div>
                                </div>
                              </a>
                            </div>

                            <div class="col-12 col-sm-6 col-md-12">
                              <a style="color:black;">
                                <div class="info-box">
                                  <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-address-card"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text text-pink"><b>Sisa Dana (RABS)</b></span>
                                    <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e">Rp. <?php echo number_format($hitung_das_sisa); ?></span>
                                  </div>
                                </div>
                              </a>
                            </div>
                          <?php } ?>

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
      <section class="animated fadeInLeft content">
        <div class="container-fluid">
          <!-- Info boxes -->

          <!-- /.row -->
          <div class="row">
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-md-6">
              <div class="card card-info card-outline animated fadeInRight">
                <div class="card-header">
                  <h3 class="card-title text-info" style="text-shadow: 2px 2px 4px #827e7e;"><i class="fad fa-calendar-check"></i> Catatan Agenda Atau Kegiatan</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>

                  </div>
                </div>
                <div class="card-body p-0 ml-2 mr-2 mb-2">
                  <div id="calendar"></div>
                </div>
              </div>
              <!-- /.card -->
            </div>

          </div>

          <!-- /.row -->
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php if ($this->session->userdata("hak_akses") != 'das') { ?>
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
  </div>
  <?php } ?>

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