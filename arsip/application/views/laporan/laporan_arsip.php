  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6 mt-2">
                      <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="nav-icon fas fa-th"></i></i> <?php echo $judul; ?></h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                          <li class="breadcrumb-item active"><?php echo $judul; ?></li>
                      </ol>
                  </div>
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content animated fadeInUp ">
          <div class="container-fluid">
              <!-- /.row -->
              <div class="row">
                  <div class=" col-md-12">
                      <div class="card card-info card-outline">
                          <div class="card-header col-md-12">

                              <a><i class="fa fa-file-search text-info"> </i> Cari Data Arsip Berdasarkan</a>
                              <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_arsip" method="post">
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Dari Tanggal</label>
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                                                      <button type="button" class="btn btn-danger"><i class="fal fa-calendar-alt"></i></button>
                                                  </div>
                                                  <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_awal; ?>" required>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <label>Sampai Tanggal</label>
                                          <div class="input-group mb-3">
                                              <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                                                  <button type="button" class="btn btn-danger"><i class="fal fa-calendar-alt"></i></button>
                                              </div>
                                              <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Jenis Dokumen</label>
                                              <select class="form-control select2" type="text" name="jenis_dokumen">
                                                  <?php echo $combo_jenis_dokumen; ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Ruangan</label>
                                              <select class="form-control select2" type="text" name="id_ruangan">
                                                  <?php echo $combo_ruangan; ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Lemari</label>
                                              <select class="form-control select2" type="text" name="id_lemari">
                                                  <?php echo $combo_lemari; ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Rak</label>
                                              <select class="form-control select2" type="text" name="id_rak">
                                                  <?php echo $combo_rak; ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Box</label>
                                              <select class="form-control select2" type="text" name="id_box">
                                                  <?php echo $combo_box; ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Map</label>
                                              <select class="form-control select2" type="text" name="id_map">
                                                  <?php echo $combo_map; ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Urut</label>
                                              <select class="form-control select2" type="text" name="id_urut">
                                                  <?php echo $combo_urut; ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-3">
                                          <label>&nbsp;</label>
                                          <div class="form-group">
                                              <button class="btn btn-info"><i class="fa fa-search "> </i> Tampilkan Data</button>
                                          </div>
                                      </div>

                                      <div class="col-md-3">
                                          <label>&nbsp;</label>
                                          <div class="form-group ">
                                              <button class="btn btn-danger float-right" onclick="printDiv('cetak')"><i class="fa fa-print "> </i> Print Data</button>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <!-- /.card-header -->
                          <!-- TABLE: LATEST ORDERS -->
                          <div class="card" id="cetak">
                              <div class="card-header border-transparent">
                                  <center>
                                      <h3>Laporan Arsip</h3>
                                      <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                                  </center>
                                  <div class="card-tools">

                                  </div>
                              </div>
                              <!-- /.card-header -->
                              <?php if (!empty($laporan_arsip)) { ?>
                                  <div class="card-body p-0">
                                      <div class="table-responsive">
                                          <table class="table m-0 table-hover">
                                              <thead>
                                                  <tr>
                                                      <th>No</th>
                                                      <th>Jenis Dokumen</th>
                                                      <th>Lokasi</th>
                                                      <th>Nomor Dok</th>
                                                      <th>Nama Dok</th>
                                                      <th>Tahun Ajaran</th>
                                                      <th>Tanggal Dokumen</th>
                                                      <th>Tanggal Upload</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php
                                                    $no = 1;

                                                    foreach ($laporan_arsip->result_array() as $data) {
                                                        $lokasi = $data['nama_ruangan'] . '/' . $data['nama_lemari'] . '/' . $data['nama_rak'] . '/' . $data['nama_box'] . '/' . $data['nama_map'] . '/' . $data['nama_urut']
                                                    ?>
                                                      <tr>
                                                          <td><?php echo $no; ?></td>
                                                          <td><?php echo $data['nama_jenis_dokumen']; ?></td>
                                                          <td><?php echo $lokasi; ?></td>
                                                          <td><?php echo $data['nomor_dokumen']; ?></td>
                                                          <td><?php echo $data['nama_dokumen']; ?></td>
                                                          <td><?php echo $data['tahun_ajaran']; ?></td>
                                                          <td><?php echo date("d-m-Y", strtotime($data['tanggal_dokumen'])); ?></td>
                                                          <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                                      </tr>
                                                  <?php $no++;
                                                    } ?>
                                              </tbody>
                                          </table>
                                      </div>
                                      <!-- /.table-responsive -->
                                  </div>
                              <?php } ?>
                              <!-- /.card-body -->
                              <!-- /.card-footer -->
                          </div>
                          <!-- /.card -->
                      </div>
                      <!-- /.col -->
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          </div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->