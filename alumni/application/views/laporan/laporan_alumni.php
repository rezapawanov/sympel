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
                
               <a><i class="fa fa-file-search text-info"> </i> Cari Berdasarkan</a>
               <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Angkatan</label>
                   <input class="form-control" type="text" name="angkatan" placeholder="Contoh : 2010">
                  </div>
                </div>
                <div class="col-md-3">
                  <label>Aktvitas Alumni</label>
                  <div class="form-group">
                    <select class="form-control select2" type="text" name="aktivitas">
                      <option value="all">[ SEMUA AKTIVITAS ]</option>
                                            <option value="Kuliah">Kuliah</option>
                                            <option value="Kerja">Kerja</option>
                                            <option value="Wirausaha">Wirausaha</option>
                                            <option value="Yang Lain">Yang Lain</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <label>&nbsp;</label>
                <div class="form-group">
                <a class="btn btn-info" href=""><i class="fa fa-search "> </i> Tampilkan Data</a>
                </div>
                </div>

                <div class="col-md-3">
                  <label>&nbsp;</label>
                <div class="form-group ">
                  <button class="btn btn-danger float-right" onclick="printDiv('cetak')"><i class="fa fa-print "> </i> Print Data</button>
                </div>
                </div>
              </div>
              </div>
              <!-- /.card-header -->
              <!-- TABLE: LATEST ORDERS -->
            <?php if (!empty($laporan_alumni)) { ?>  
            <div class="card" id="cetak">
              <div class="card-header border-transparent">
                <center><h3>Laporan Alumni</h3>
                 <p style="margin:0;">Angkatan : <?php if (empty($angkatan)) echo 'Semua Angkatan';
                                                                    else echo $angkatan; ?></p>
                            </center></center>
                <div class="card-tools">
           
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive" >
                  <table class="table m-0 table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                        <th>Tahun Masuk</th>
                        <th>Tahun Lulus</th>
                        <th>Aktivitas</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                                        $no = 1;
                                        foreach ($laporan_alumni->result_array() as $data) {

                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['jenis_kelamin']; ?></td>
                                            <td><?php echo $data['hp']; ?></td>
                                            <td><?php echo $data['angkatan']; ?></td>
                                            <td><?php echo $data['tahun_lulus']; ?></td>
                                            <td><?php echo $data['aktivitas_1'] . ', ' . $data['aktivitas_2'] . ', ' . $data['aktivitas_3'] . ', ' . $data['aktivitas_4']; ?></td>
                                        </tr>
                                    <?php $no++;
                                        } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            <?php } ?>
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