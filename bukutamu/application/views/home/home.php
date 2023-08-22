  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header animated bounceIn">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-12 mt-2">
                      <div class="card card-info card-outline">
                          <center>
                              <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-school mt-1"></i> <br>DAFTAR LAYOUT INFORMASI BUKUTAMU</h1>
                          </center>
                          <hr>
                          <div class="container-fluid">
                              <div class="row">
                                  

                              <div class="col-md-12">
                                      <div class="card card-info card-outline">
                                          <div class="card-header">
                                              <h3 class="card-title text-info"><i class="fas fa-users-class"></i> DATA KUNJUNGAN</h3>
                                              <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                  </button>
                                              </div>
                                          </div>
                                          <div class="card-body p-0">
                                              <div class="row mt-3 ml-1 mr-1">
                                                  <div class="col-md-12">
                                                      <a style="color:black;">
                                                          <div class="info-box">
                                                              <span class="info-box-icon bg-danger elevation-1"><i class="far fa-user-times"></i></span>
                                                              <div class="info-box-content">
                                                                  <span class="info-box-text text-danger"><b>JUMLAH KUNJUNGAN</b></span>
                                                                  <span class="info-box-number " style="text-shadow: 2px 2px 4px #827e7e"><?php echo $hitung_tamu; ?></span>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="card card-info card-outline">
                                          <div class="card-header">
                                              <h3 class="card-title text-info" style="text-shadow: 2px 2px 4px #fff;"><i class="fas fa-users-class"></i> DAFTAR KUNJUNGAN</h3>
                                              <div class="card-tools">
                                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                  </button>
                                              </div>
                                          </div>
                                          <div class="card-body p-0">
                                              <table class="table table-striped table-sm">
                                                  <thead>
                                                      <tr class="bg-navy">
                                                          <th>No</th>
                                                          <th>Nama</th>
                                                          <th>Asal / Instansi</th>
                                                          <th>Alamat</th>
                                                          <th>Keperluan</th>
                                                          <th>No.Telp</th>
                                                          <th>Tanggal</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                        $no = 1;
                                                        foreach ($tamu->result_array() as $data) {
                                                        ?>
                                                          <tr>
                                                              <td><?php echo $no; ?></td>
                                                              <td><?php echo $data['nama_tamu']; ?></td>
                                                              <td><?php echo $data['asal']; ?></td>
                                                              <td><?php echo $data['alamat']; ?></td>
                                                              <td><?php echo $data['keperluan']; ?></td>
                                                              <td><?php echo $data['no_telepon']; ?></td>
                                                              <td><div style="width:150px"><?php echo date("d-m-Y H:i", strtotime($data['tanggal'])); ?></div></td>
                                                          </tr>
                                                      <?php $no++;
                                                        } ?>
                                                  </tbody>
                                              </table>
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
  </div>