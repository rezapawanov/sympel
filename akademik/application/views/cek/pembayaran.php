<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark"><i class="far fa-book-medical nav-icon text-info"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/dokumen"><?php echo $judul; ?></a></li>
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
          <div class="animated fadeInLeft col-md-8">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> Detail <?php echo $judul; ?></h3>
              </div>
   
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border text-right">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_4" data-toggle="tab" aria-expanded="true">Informasi Data Siswa</a></li>
                                <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Transaksi Trakhir</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_4">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <?php if (empty($foto)) { ?>
                                                <img class="profile-user-img img-responsive" src="<?php echo base_url(); ?>upload/noimage.jpg" />
                                            <?php } else { ?>
                                                <img class="profile-user-img img-responsive" src="<?php echo base_url(); ?>/upload/siswa/<?php echo $foto; ?>" />
                                            <?php } ?>
                                        </div>
                                           <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td width="95">Tahun Ajaran</td>
                                                        <td width="4">:</td>
                                                        <td><?php echo $tahun_ajaran; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIS</td>
                                                        <td>:</td>
                                                        <td><?php echo $nis; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Siswa</td>
                                                        <td>:</td>
                                                        <td><?php echo $nama_siswa; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelas</td>
                                                        <td>:</td>
                                                        <td><?php echo $nama_kelas; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_5">
                                    <div style="overflow-y:scroll;height:200px;">
                                    <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pembayaran</th>
                                                    <th>Bayar</th>
                                                    <th>Tanggal</th>
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h4 class="box-title">Tagihan Bulanan</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped" style="white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pembayaran</th>
                                    <th>Total Tagihan</th>
                                    <th>Sudah Dibayar</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pembayaran_bulanan->result_array() as $data) {
                                    $q_total = $this->db->query("SELECT SUM(tagihan) as hitung_tagihan, SUM(bayar) as hitung_bayar FROM pembayaran_bulanan WHERE id_jenis_pembayaran = '$data[id_jenis_pembayaran]' AND id_siswa = '$data[id_siswa]'")->row();
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama_pos_keuangan'] . ' ' . $data['tahun_ajaran']; ?></td>
                                        <td>Rp. <?php echo number_format($q_total->hitung_tagihan); ?></td>
                                        <td>Rp. <?php echo number_format($q_total->hitung_bayar); ?></td>
                                        <td>
                                            <?php
                                            if ($q_total->hitung_tagihan == $q_total->hitung_bayar) {
                                                echo 'Lunas';
                                            } else {
                                                echo 'Belum Lunas';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo '
                        <a class="btn btn-success btn-xs history-bulanan" href="" data-toggle="modal" data-target="#modalView2"  data-id_jenis_pembayaran="' . $data['id_jenis_pembayaran'] . '" data-id_siswa="' . $id_siswa . '" data-id_kelas="' . $id_kelas . '"><i class="fa fa-list-alt"> </i> Lihat Detail</a> '; ?>
                                        </td>
                                    </tr>
                                    <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h4 class="box-title">Tagihan Lainnya</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped" style="white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pembayaran</th>
                                    <th>Sisa Tagihan</th>
                                    <th>Dibayar</th>
                                    <th>Status </th>
                                    <th>Detail</th>
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
                                        $status = 'Belum Lunas';
                                    } else {
                                        $status = 'Lunas';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
                                        <td>Rp <?php echo number_format($sisa_tagihan); ?></td>
                                        <td>Rp <?php echo number_format($bayar->hitung); ?></td>
                                        <td>
                                            <?php
                                            echo $status;
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo '
                         <a class="btn btn-success btn-xs history-bayar" href="" data-toggle="modal"  data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"><i class="fa fa-list-alt"> </i> Lihat Detail </a>';
                                            ?>
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
        <!-- /.row -->

    </section>
</div>

<div class="modal fade" id="modalView">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Pembayaran / Cicilan</h4>
            </div>
            <div class="modal-body">
                <div id="tempat-view"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modalView2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Pembayaran Bulanan</h4>
            </div>
            <div class="modal-body">
                <div id="tempat-view2"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<script>
    $(document).ready(function() {

        $(".history-bayar").click(function() {
            var id_pembayaran_bebas = $(this).attr('data-id_pembayaran_bebas');
            var nis = $(this).attr('data-nis');
            var id_siswa = $(this).attr('data-id_siswa');
            var tahun_ajaran = $(this).attr('data-tahun_ajaran');
            $.get("<?php echo base_url(); ?>siswa/ajax_history_bayar", {
                id_pembayaran_bebas: id_pembayaran_bebas,
                nis: nis,
                tahun_ajaran: tahun_ajaran,
                id_siswa: id_siswa
            }, function(data) {
                $("#tempat-view").html(data);
            });
        });
    });

    $(".history-bulanan").click(function() {
        var id_jenis_pembayaran = $(this).attr('data-id_jenis_pembayaran');
        var id_kelas = $(this).attr('data-id_kelas');
        var id_siswa = $(this).attr('data-id_siswa');
        $.get("<?php echo base_url(); ?>siswa/ajax_history_bulanan", {
            id_jenis_pembayaran: id_jenis_pembayaran,
            id_kelas: id_kelas,
            id_siswa: id_siswa
        }, function(data) {
            $("#tempat-view2").html(data);
        });
    });
</script>