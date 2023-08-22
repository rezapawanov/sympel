  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8 mt-2">
            <h5 class="m-0 text-dark">
              <i class="fas fa-hands-usd nav-icon text-info"></i> <?php echo $judul . ' 
              <div class="btn-group btn-group-sm"><a href="#" class="btn btn-info btn-icon-split" style="text-shadow: 2px 2px 4px black;"><b>' . $nama_pos_keuangan . '</b> </a> <a href="#" class="btn btn-danger btn-icon-split" style="text-shadow: 2px 2px 4px black;"><b>' . $tahun_ajaran . '</b></a> <a href="#" class="btn btn-warning btn-icon-split text-uppercase" style="text-shadow: 2px 2px 4px white;"><b>(' . $tipe_pembayaran . ')</b></a></div>'; ?></h5>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/jenis_pembayaran"><?php echo $judul; ?></a></li>
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
          <div class="animated lightSpeedIn col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <form action="<?php echo base_url(); ?>master/proses_tarif" class="form-horizontal" method="post">
                  <input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-2 text-center">
                        <select id="id_kelas" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%; " name="id_kelas">
                          <?php echo $combo_kelas; ?>
                        </select>
                      </div>
                      <div class="col-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"> </i> Tampilkan</button>
                      </div>
                      <div class="col-7 text-right">
                        <a class="btn btn-info" href="<?php echo base_url() . 'master/tarif_pembayaran_kelas/' . $id_jenis_pembayaran; ?>"><i class="fa fa-plus"> </i> Berdasarkan Kelas</a>
                        <a class="btn btn-warning" href="<?php echo base_url() . 'master/tarif_pembayaran_siswa/' . $id_jenis_pembayaran; ?>"><i class="fa fa-user"> </i> Berdasarkan Siswa</a>
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>master/jenis_pembayaran"><i class="fa fa-repeat"> </i> Kembali</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th class="text-sm">No</th>
                      <th class="text-sm">NIS</th>
                      <th class="text-sm">Nama Siswa</th>
                      <th class="text-sm">Kelas</th>
                      <?php if ($tipe_pembayaran == 'Bebas') { ?>
                        <th class="text-sm">Tarif Pembayaran</th>
                      <?php } ?>
                      <th class="text-sm">
                        <center>Aksi</center>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    if (!empty($siswa)) {
                      foreach ($siswa->result_array() as $data) { ?>
                        <tr>
                          <td class="text-sm"><?php echo $no; ?></td>
                          <td class="text-sm"><?php echo $data['nis']; ?></td>
                          <td class="text-sm"><?php echo $data['nama_siswa']; ?></td>
                          <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                          <?php if ($tipe_pembayaran == 'Bebas') { ?>
                            <td class="text-sm">Rp <?php echo number_format($data['tagihan']); ?></td>
                          <?php } ?>
                          <td style="text-align:center;">
                            <?php if ($tipe_pembayaran == 'Bulanan') { ?>
                              <a class="btn btn-primary btn-xs view-tarif" href="" data-toggle="modal" data-target="#modalView" data-id_kelas="<?php echo $data['id_kelas']; ?>" data-id_jenis_pembayaran="<?php echo $data['id_jenis_pembayaran']; ?>" data-id_siswa="<?php echo $data['id_siswa']; ?>" data-tipe_pembayaran="<?php echo $tipe_pembayaran; ?>"><i class="fa fa-search"> </i> Lihat Tarif </a>
                              <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'master/tarif_pembayaran_hapus/' . $data['id_siswa'] . '/' . $data['id_kelas'] . '/' . $data['id_jenis_pembayaran']; ?>"><i class="fa fa-trash"> </i> Hapus Tarif </a>
                            <?php } else if ($tipe_pembayaran == 'Bebas') {  ?>
                              <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'master/tarif_pembayaran_hapus2/' . $data['id_siswa'] . '/' . $data['id_kelas'] . '/' . $data['id_jenis_pembayaran']; ?>"><i class="fa fa-trash"> </i> Hapus Tarif </a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php $no++;
                      } ?>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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

  <div class="modal fade" id="modalView">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Detail Tarif Pembayaran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div id="tempat-view"></div>
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
    $(".view-tarif").click(function() {
      var id_kelas = $(this).attr('data-id_kelas');
      var id_siswa = $(this).attr('data-id_siswa');
      var id_jenis_pembayaran = $(this).attr('data-id_jenis_pembayaran');
      $.get("<?php echo base_url(); ?>master/ajax_tarif_detail", {
        id_siswa: id_siswa,
        id_kelas: id_kelas,
        id_jenis_pembayaran: id_jenis_pembayaran
      }, function(data) {
        $("#tempat-view").html(data);
      });
    });
  </script>