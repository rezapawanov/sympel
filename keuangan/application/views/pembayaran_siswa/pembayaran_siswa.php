<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
            <i class="nav-icon fas fa-cash-register text-success"></i> <?php echo $judul; ?></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/jenis_pembayaran"><?php echo $judul; ?></a></li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title"><b><i class="nav-icon fas fa-cash-register"></i> TRANSAKSI PEMBAYARAN SISWA</b></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <div class="card-body">
      <section class="content">
        <!-- LT1 -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-info card-outline">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <form action="<?php echo base_url(); ?>pembayaran/proses_cari_siswa" class="form-horizontal" method="post">
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
                                <select class="form-control select2" name="tahun_ajaran" required>
                                  <?php echo $combo_tahun_ajaran; ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-6 text-right">
                              <div class="input-group input-group">
                                <span class="input-group-append">
                                  <button type="button" type="submit" class="btn btn-danger btn-flat">Cari Berdasarkan</button>
                                </span>
                                <input id="cari-siswa" type="text" class="form-control" autofocus="" name="nis" placeholder="Nama Siswa" required>
                                <span class="input-group-append">
                                  <button type="submit" class="btn btn-info btn-flat">Cari</button>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if (!empty($tampil)) {
          $tahun_ajaran_url = str_replace("/", "-", $tahun_ajaran);
        ?>
          <!-- /.container-fluid -->
          <!-- LT2 -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Data Pembayaran Siswa</h3>
                    <div class="card-tools">
                      <span class="input-group-append">
                        <button type="button" type="submit" class="btn btn-warning btn-xs btn-flat"><i class="fad fa-print"></i></button>
                        <a type="button" type="submit" class="btn btn-danger btn-xs btn-flat" href="<?php echo base_url() . 'pembayaran/cetak_semua_tagihan/' . $tahun_ajaran_url . '/' . $id_siswa; ?>" target="_blank">Print Semua Tagihan Siswa</a>
                        <button type="button" class="btn btn-light btn-xs btn-flat" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </span>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <div class="card-body card-outline-tabs">
                    <ul class="nav nav-tabs " id="custom-content-below-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill" href="#data-siswa" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Informasi Data Siswa</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#data-transaksi" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Transaksi Trakhir</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                      <div class="tab-pane fade active show" id="data-siswa" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                        <div class="row">
                          <div class="col-3 mt-3 ml-3">
                            <?php if (empty($foto)) { ?>
                              <img class="img-rounded elevation-2" style="width:150px;height:180px;" alt="User Image" src="../../../../upload/noimage.jpg">
                            <?php } else { ?>
                              <img class="img-rounded elevation-2" style="width:150px;height:180px;" alt="User Image" src="<?php echo '../../../../akademik/upload/siswa/' . $foto; ?>" alt="<?php echo $nama_siswa; ?>">
                            <?php } ?>
                          </div>
                          <div class="col-8 mt-3 ml-3">
                            <table class="table table-bordered table-hover table-striped" style="width:100%">
                              <tbody>
                                <tr>
                                  <td>Nama Siswa</td>
                                  <td>:</td>
                                  <td><?php echo $nama_siswa; ?></td>
                                </tr>
                                <tr>
                                  <td class="text-sm">NIS</td>
                                  <td class="text-sm">:</td>
                                  <td class="text-sm"><?php echo $nis; ?></td>
                                </tr>
                                <tr>
                                  <td class="text-sm">Kelas</td>
                                  <td class="text-sm">:</td>
                                  <td class="text-sm"><?php echo $nama_kelas; ?></td>
                                </tr>
                                <tr>
                                  <td class="text-sm">Tahun Ajaran</td>
                                  <td class="text-sm">:</td>
                                  <td class="text-sm"><?php echo $tahun_ajaran; ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                        </div>
                      </div>
                      <div class="tab-pane fade" id="data-transaksi" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                        <div style="overflow-y:scroll;height:200px;">
                          <table class="table table-bordered table-hover table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th class="text-sm">Pembayaran</th>
                                <th class="text-sm">Bayar</th>
                                <th class="text-sm">Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($pembayaran_bulanan_terakhir->result_array() as $data) { ?>
                                <tr>
                                  <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                                  <td>Rp. <?php echo number_format($data['bayar']); ?></td>
                                  <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                </tr>
                              <?php } ?>

                              <?php foreach ($pembayaran_bebas_terakhir->result_array() as $data) { ?>
                                <tr>
                                  <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                                  <td>Rp. <?php echo number_format($data['bayar']); ?></td>
                                  <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Cetak Bukti Pembayaran</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="display: block;">
                    <form action="<?php echo base_url() . 'pembayaran/cetak_bukti/'; ?>" method="GET">
                      <input type="hidden" name="nis" value="<?php echo $nis; ?>">
                      <input type="hidden" name="kelas" value="<?php echo $nama_kelas; ?>">
                      <div class="form-group">
                        <span class="input-group-append">
                          <button type="button" type="submit" class="btn btn-danger btn-flat btn-block">Tanggal Transaksi</button>
                        </span>
                        <div class="input-group text-center">
                          <input class="form-control tglcalendar text-center" type="text" name="tanggal" value="<?php echo date("d-m-Y"); ?>" required>
                        </div>
                      </div>
                      <button class="btn btn-info btn-flat btn-block" formtarget="_blank" type="submit"><i class="fad fa-print"></i> <b>CETAK</b></button>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- /.col -->
            </div>
          </div>
          <!-- LT3 -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Tagihan Pembayaran</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#bulanan" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Bulanan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#bebas" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Bebas</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                      <div class="tab-pane fade active show mt-2" id="bulanan" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                        <?php foreach ($jenis_pembayaran_bulanan->result_array() as $data) {
                          $q_tagihan = $this->db->query("SELECT * FROM pembayaran_bulanan WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa");
                          $sisa_tagihan = $this->db->query("SELECT SUM(tagihan) as hitung FROM pembayaran_bulanan WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa AND bayar = 0")->row();
                        ?>
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" style="white-space: nowrap;">
                              <thead>
                                <tr>
                                  <th class="text-sm">Nama Pembayaran</th>
                                  <th class="text-sm">Sisa Tagihan</th>
                                  <?php foreach ($q_tagihan->result_array() as $d_tagihan) { ?>
                                    <th class="text-sm"><?php echo $d_tagihan['bulan']; ?></th>
                                  <?php } ?>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                                  <td class="text-sm" style="background-color: yellow">Rp <?php echo number_format($sisa_tagihan->hitung); ?></td>
                                  <?php foreach ($q_tagihan->result_array() as $d_tagihan) {
                                    if ($d_tagihan['bayar'] == 0) {
                                      $style = 'style="background:red;color:#fff;"';
                                      $class = 'class="bayar-bulanan"';
                                      $confirm = 'Yakin Ingin Melakukan Pembayaran Pada Bulan Ini ?';
                                      $tagihan = 'Rp ' . number_format($d_tagihan['tagihan']);
                                    } else {
                                      $style = 'style="background:green;color:#fff;"';
                                      $class = 'class="hapus-bulanan"';
                                      $tagihan = date("d/m/Y", strtotime($d_tagihan['tanggal']));
                                      $confirm = 'Yakin Ingin Menghapus Pembayaran Pada Bulan Ini ?';
                                    }
                                  ?>
                                    <td class="text-sm" <?php echo $style; ?>><a style="color:#fff;" <?php echo $class; ?> data-id_pembayaran_bulanan="<?php echo $d_tagihan['id_pembayaran_bulanan']; ?>" data-nis="<?php echo $nis; ?>" data-tahun_ajaran="<?php echo $tahun_ajaran; ?>" data-tagihan="<?php echo $d_tagihan['tagihan']; ?>" href=""><?php echo $tagihan; ?></a></td>
                                  <?php } ?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <hr>
                        <?php } ?>
                      </div>
                      <div class="tab-pane" id="bebas">
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Pembayaran</th>
                                <th>Sisa Tagihan</th>
                                <th>Dibayar</th>
                                <th>Status Bayar</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              foreach ($jenis_pembayaran_bebas->result_array() as $data) {
                                $q_tagihan = $this->db->query("SELECT * FROM pembayaran_bebas WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa")->row();
                                $bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $q_tagihan->id_pembayaran_bebas")->row();
                                $sisa_tagihan = $q_tagihan->tagihan - $bayar->hitung;
                                if ($sisa_tagihan > 0) {
                                  $status = '<a href="" style="color:red;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '">Belum Lunas  <i class="fa fa-list-alt"> </i> </a>';
                                  $class = 'style="color:red;"';
                                } else {
                                  $status = '<a href="" style="color:green;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"> Lunas <i class="fa fa-list-alt"> </i> </a>';
                                  $class = 'style="color:green;"';
                                }
                              ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                                  <td <?php echo $class; ?>>Rp <?php echo number_format($sisa_tagihan); ?></td>
                                  <td <?php echo $class; ?>>Rp <?php echo number_format($bayar->hitung); ?></td>
                                  <td <?php echo $class; ?>>
                                    <?php
                                    echo $status;
                                    ?>
                                  </td>
                                  <td <?php echo $class; ?>>
                                    <?php if ($sisa_tagihan > 0) { ?>
                                      <a class="btn btn-success btn-xs bayar-bebas" href="" data-toggle="modal" data-target="#modalAdd" data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>" data-nis="<?php echo $nis; ?>" data-tahun_ajaran="<?php echo $tahun_ajaran; ?>" data-tagihan="<?php echo $sisa_tagihan; ?>" data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>" data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'] . ' - ' . $tahun_ajaran; ?>"><i class="fa fa-money"> </i> Bayar </a>
                                    <?php } ?>
                                  </td>
                                  <td>
                                    <?php if ($bayar->hitung > 0) { ?>
                                      <a class="btn btn-xs btn-danger" href="<?php echo base_url() . 'pembayaran/cetak_bukti_bayar_bebas/' . $data['id_pembayaran_bebas'] . '/' . $id_siswa; ?>" target="_blank"><i class="fa fa-print"> </i> Cetak </a>
                                    <?php } ?>
                                  </td>

                                </tr>
                              <?php $no++;
                              } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
          <!-- LT4 -->
          <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tagihan Bulanan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-sm">No</th>
                      <th class="text-sm">Nama Pembayaran</th>
                      <th class="text-sm">Total Tagihan</th>
                      <th class="text-sm">Sudah Dibayar</th>
                      <th class="text-sm text-center">Status</th>
                      <th class="text-sm text-center">Bayar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($pembayaran_bulanan->result_array() as $data) {
                      $q_total = $this->db->query("SELECT SUM(tagihan) as hitung_tagihan, SUM(bayar) as hitung_bayar FROM pembayaran_bulanan WHERE id_jenis_pembayaran = '$data[id_jenis_pembayaran]' AND id_siswa = '$data[id_siswa]'")->row();
                    ?>
                      <tr>
                        <td class="text-sm"><?php echo $no; ?></td>
                        <td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' ' . $data['tahun_ajaran']; ?></td>
                        <td class="text-sm">Rp. <?php echo number_format($q_total->hitung_tagihan); ?></td>
                        <td class="text-sm">Rp. <?php echo number_format($q_total->hitung_bayar); ?></td>
                        <td class="text-sm text-center">
                          <?php
                          if ($q_total->hitung_tagihan == $q_total->hitung_bayar) {
                            echo '<text style="color:green">Lunas</text>';
                          } else {
                            echo '<text style="color:red"> Belum Lunas</text>';
                          }
                          ?>
                        </td>
                        <td class="text-sm text-center">
                          <a class="btn btn-info btn-xs btn-flat" href="<?php echo base_url() . 'pembayaran/pembayaran_siswa_detail/' . $data['id_jenis_pembayaran'] . '/' . $data['id_siswa']; ?>"><i class="nav-icon fas fa-money-check-alt text-white"> </i> Bayar</a>
                        </td>
                      </tr>
                    <?php $no++;
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- LT5 -->
          <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tagihan Lainnya</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-sm">No</th>
                      <th class="text-sm">Nama Pembayaran</th>
                      <th class="text-sm">Sisa Tagihan</th>
                      <th class="text-sm">Dibayar</th>
                      <th class="text-sm">Status Bayar</th>
                      <th class="text-sm">Bayar</th>
                      <th class="text-sm">Cetak</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($pembayaran_bebas->result_array() as $data) {
                      $q_tagihan = $this->db->query("SELECT * FROM pembayaran_bebas WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa")->row();
                      $bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $q_tagihan->id_pembayaran_bebas")->row();
                      $sisa_tagihan = $q_tagihan->tagihan - $bayar->hitung;
                      if ($sisa_tagihan > 0) {
                        $status = '<a href="" style="color:red;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"><span class="input-group-append">
                  <button type="button" class="btn btn-danger btn-xs btn-flat">Belum Lunas</button>
                  <button type="button" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-list-alt"></i> Lihat Detail</button>
                  </span> </a>';
                        $class = 'style="color:red;"';
                      } else {
                        $status = '<a href="" style="color:green;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"> <span class="input-group-append">
                  <button type="button" class="btn btn-success btn-xs btn-flat">Lunas</button>
                  <button type="button" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-list-alt"></i> Lihat Detail</button>
                  </span> </a>';
                        $class = 'style="color:green;"';
                      }
                    ?>
                      <tr>
                        <td class="text-sm"><?php echo $no; ?></td>
                        <td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                        <td class="text-sm" <?php echo $class; ?>>Rp <?php echo number_format($sisa_tagihan); ?></td>
                        <td class="text-sm" <?php echo $class; ?>>Rp <?php echo number_format($bayar->hitung); ?></td>
                        <td class="text-sm text-center" <?php echo $class; ?>>
                          <?php
                          echo $status;
                          ?>
                        </td>
                        <td class="text-sm text-center" <?php echo $class; ?>>
                          <?php if ($sisa_tagihan > 0) { ?>
                            <a class="btn btn-info btn-flat btn-xs bayar-bebas" href="" data-toggle="modal" data-target="#modalAdd" data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>" data-nis="<?php echo $nis; ?>" data-tahun_ajaran="<?php echo $tahun_ajaran; ?>" data-tagihan="<?php echo $sisa_tagihan; ?>" data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>" data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'] . ' - ' . $tahun_ajaran; ?>"><i class="fa fa-money"> </i> Bayar </a>
                          <?php } ?>
                        </td>
                        <td class="text-sm text-center">
                          <?php if ($bayar->hitung > 0) { ?>
                            <a class="btn btn-xs btn-flat btn-danger" href="<?php echo base_url() . 'pembayaran/cetak_bukti_bayar_bebas/' . $data['id_pembayaran_bebas'] . '/' . $id_siswa; ?>" target="_blank"><i class="fa fa-print"> </i> Cetak </a>
                          <?php } ?>
                        </td>

                      </tr>
                    <?php $no++;
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <?php } ?>
      </section>
    </div>
  </div>
</div>

<div class="modal fade" id="modalView">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Lihat Pembayaran / Cicilan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="tempat-view"></div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalAdd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pembayaran / Cicilan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="info"></div>
        <form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_save" method="post" onsubmit="return cek_bayar(this);">
          <input class="id_pembayaran_bebas" type="hidden" name="id_pembayaran_bebas" readonly>
          <input class="nis" type="hidden" name="nis" readonly>
          <input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
          <input class="tagihan" type="hidden" name="tagihan" readonly>
          <div class="form-group">
            <label>Nama Pembayaran</label>
            <input type="text" class="form-control nama_pembayaran" name="nama_pembayaran" readonly>
          </div>
          <div class="form-group">
            <label>Sisa Tagihan (Rp)</label>
            <input type="text" class="form-control sisa_tagihan" name="sisa_tagihan" readonly>
          </div>
          <div class="form-group">
            <label>Tanggal Bayar</label>
            <input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
          </div>
          <div class="form-group">
            <label>Jumlah Bayar (Rp)</label>
            <input type="text" class="form-control rupiah bayar" name="bayar" required>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>

        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Pembayaran / Cicilan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="info"></div>
        <form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_saveedit" method="post" onsubmit="return cek_bayar(this);">
          <input class="id_pembayaran_bebas_dt" type="hidden" name="id_pembayaran_bebas_dt" readonly>
          <input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
          <input class="nis" type="hidden" name="nis" readonly>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="text" class="form-control tanggal" name="tanggal" readonly>
          </div>
          <div class="form-group">
            <label>Jumlah Bayar (Rp)</label>
            <input type="text" class="form-control rupiah bayar" name="bayar" required>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php if ($this->session->flashdata('success')) {
    echo '<script>
                    toastr.options.timeOut = 2000;
                    toastr.success("' . $this->session->flashdata('success') . '");
                    </script>';
  } ?>

  <?php if ($this->session->flashdata('error')) {
    echo '<script>
       toastr.options.timeOut = 2000;
       toastr.error("' . $this->session->flashdata('error') . '");
       </script>';
  } ?>

<script>
  $(document).ready(function() {
    $('#cari-siswa').typeahead({
      source: function(query, result) {
        $.ajax({
          url: "<?php echo base_url(); ?>pembayaran/ajax_siswa",
          data: 'query=' + query,
          dataType: "json",
          type: "POST",
          success: function(data) {
            result($.map(data, function(item) {
              return item;
            }));
          }
        });
      }
    });

    $(".bayar-bebas").click(function() {
      $(".id_pembayaran_bebas").val($(this).attr('data-id_pembayaran_bebas'));
      $(".nis").val($(this).attr('data-nis'));
      $(".tahun_ajaran").val($(this).attr('data-tahun_ajaran'));
      $(".tagihan").val($(this).attr('data-tagihan'));
      $(".sisa_tagihan").val($(this).attr('data-sisa_tagihan'));
      $(".nama_pembayaran").val($(this).attr('data-nama_pos_keuangan'));
    });

    $(document).on("click", ".edit-bayar", function() {
      $(".id_pembayaran_bebas_dt").val($(this).attr('data-id_pembayaran_bebas_dt'));
      $(".nis").val($(this).attr('data-nis'));
      $(".tahun_ajaran").val($(this).attr('data-tahun_ajaran'));
      $(".tanggal").val($(this).attr('data-tanggal'));
      $(".bayar").val($(this).attr('data-bayar'));
    });


    $(".history-bayar").click(function() {
      var id_pembayaran_bebas = $(this).attr('data-id_pembayaran_bebas');
      var nis = $(this).attr('data-nis');
      var id_siswa = $(this).attr('data-id_siswa');
      var tahun_ajaran = $(this).attr('data-tahun_ajaran');
      $.get("<?php echo base_url(); ?>pembayaran/ajax_history_bayar", {
        id_pembayaran_bebas: id_pembayaran_bebas,
        nis: nis,
        tahun_ajaran: tahun_ajaran,
        id_siswa: id_siswa
      }, function(data) {
        $("#tempat-view").html(data);
      });
    });
  });

  function cek_bayar(form) {
    var tagihan = $(".tagihan").val();
    var bayar = $(".bayar").val();


    if (parseInt(bayar) > parseInt(tagihan)) {
      var alert = ' <div class="alert alert-danger">' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<i class="fa fa-remove"></i>' +
        '</button>' +
        '<span style="text-align: left;">Jumlah Bayar Tidak Boleh Lebih Dari Sisa Tagihan</span>' +
        '</div>';
      $("#info").html(alert);
      return false;
    } else {
      return true;
    }
  }


  $(".bayar-bulanan").click(function() {
    var conf = confirm('Yakin Ingin Melakukan Pembayaran ?');
    if (conf) {
      var id_pembayaran_bulanan = $(this).attr('data-id_pembayaran_bulanan');
      var nis = $(this).attr('data-nis');
      var tahun_ajaran = $(this).attr('data-tahun_ajaran');
      var tagihan = $(this).attr('data-tagihan');

      $.post("<?php echo base_url(); ?>pembayaran/ajax_post_bayar_bulanan", {
        nis: nis,
        id_pembayaran_bulanan: id_pembayaran_bulanan,
        tahun_ajaran: tahun_ajaran,
        tagihan: tagihan
      }, function(data) {
        var res = JSON.parse(data);
        toastr.options.timeOut = 2000;
        toastr.success("Berhasil Melakukan Pembayaran");
        //window.location.reload(true)
        document.location.href = "<?php echo base_url(); ?>pembayaran/pembayaran_siswa/" + res.tahun_ajaran + "/" + nis;
      });
    }

  });


  $(".hapus-bulanan").click(function() {
    var conf = confirm('Yakin Ingin Menghapus Pembayaran ?');
    if (conf) {
      var id_pembayaran_bulanan = $(this).attr('data-id_pembayaran_bulanan');
      var nis = $(this).attr('data-nis');
      var tahun_ajaran = $(this).attr('data-tahun_ajaran');
      var tagihan = $(this).attr('data-tagihan');

      $.post("<?php echo base_url(); ?>pembayaran/ajax_hapus_bayar_bulanan", {
        nis: nis,
        id_pembayaran_bulanan: id_pembayaran_bulanan,
        tahun_ajaran: tahun_ajaran,
        tagihan: tagihan
      }, function(data) {
        var res = JSON.parse(data);
        toastr.options.timeOut = 2000;
        toastr.success("Berhasil Menghapus Pembayaran");
        // window.location.reload(true)
        document.location.href = "<?php echo base_url(); ?>pembayaran/pembayaran_siswa/" + res.tahun_ajaran + "/" + nis;
      });
    }
  });
</script>