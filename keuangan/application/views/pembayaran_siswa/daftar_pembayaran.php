  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8 mt-2">
              <h1>
            <?php echo $judul; ?>
        </h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><?php echo $judul; ?></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- /.row -->
        <div class="animated heartBeat col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <form action="<?php echo base_url(); ?>pembayaran/proses_cari_daftar_pembayaran" class="form-horizontal" method="post">
                <div class="card-body">
                <div class="row">
                    <div class="col-6 text-center">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-append">
                            <button type="button" type="submit" class="btn btn-danger btn-flat">Cari Data Siswa</button>
                            </span>
                            <span class="input-group-append">
                            <button type="button" type="submit" class="btn btn-info btn-flat">Tahun Ajaran</button>
                            </span>
                          </div>
                        <select class="form-control select2" name="tahun_ajaran"  required>
                        <?php echo $combo_tahun_ajaran; ?>
                        </select>
                      </div>
                  </div>

                  <div class="col-6 text-right">
                    <div class="input-group input-group">
                      <span class="input-group-append">
                        <button type="button" type="submit" class="btn btn-danger btn-flat">Cari Berdasarkan</button>
                      </span>
                      <input id="cari-siswa" type="text" class="form-control" autofocus="" name="cari" placeholder="NIS / Nama Siswa /  Nama Kelas" value="<?php echo $query; ?>">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">Cari</button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </form> 
              </div>
              <!-- /.card-header -->
              <?php if (!empty($tampil)) {
            ?>
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm" style="width:100%">
                  <thead>
                    <tr class="text-info">
                        <th class="text-sm">No</th>
                        <th class="text-sm">NIS</th>
                        <th class="text-sm">Nama Siswa</th>
                        <th class="text-sm">Kelas</th>
                        <th class="text-sm">Jenis Pembayaran</th>
                        <th class="text-sm">Jumlah Pembayaran</th>
                        <th class="text-sm">Tanggal Pembayaran</th>
                        <th class="text-sm">Aksi</th>                            
                    </tr>
                  </thead>
                  <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($daftar_pembayaran_bulanan->result_array() as $data) {
                                    ?>
                                        <tr>
                                            <td class="text-sm"><?php echo $no; ?></td>
                                            <td class="text-sm"><?php echo $data['nis']; ?></td>
                                            <td class="text-sm"><?php echo $data['nama_siswa']; ?></td>
                                            <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                                            <td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' ' . $data['bulan']; ?></td>
                                            <td class="text-sm">Rp. <?php echo number_format($data['bayar']); ?></td>
                                            <td class="text-sm"><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                            <td class="text-sm">
                                                <a class="btn btn-xs btn-info" href="<?php echo base_url() . 'pembayaran/pembayaran_siswa_detail/' . $data['id_jenis_pembayaran'] . '/' . $data['id_siswa']; ?>" target="_blank"><i class="fa fa-eye"> </i></a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>

                                    <?php
                                    foreach ($daftar_pembayaran_bebas->result_array() as $data) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nis']; ?></td>
                                            <td><?php echo $data['nama_siswa']; ?></td>
                                            <td><?php echo $data['nama_kelas']; ?></td>
                                            <td><?php echo $data['nama_pos_keuangan']; ?></td>
                                            <td>Rp. <?php echo number_format($data['bayar']); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                            <td>
                                                <a class="btn btn-xs btn-danger history-bayar" href="#" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="<?php echo $data['id_pembayaran_bebas']; ?>" data-nis="<?php echo $data['nis']; ?>" data-id_siswa="<?php echo $data['id_siswa']; ?>" data-tahun_ajaran="<?php echo $data['tahun_ajaran']; ?>"><i class="fa fa-list-alt"> </i> Detail </a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> <?php } ?>
          </div>
      </div>

    </div>
    </section>
    <!-- /.content -->
  </div>

<div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Info Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->