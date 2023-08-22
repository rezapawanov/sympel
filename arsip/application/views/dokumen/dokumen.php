  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
              <i class="far fa-book-medical nav-icon text-info"></i> <?php echo $judul; ?></h1>
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
          <div class="animated fadeInUp col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>dokumen/dokumen_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th class="text-sm">No</th>
                      <th class="text-sm">Jenis Dokumen</th>
                      <th class="text-sm">Lokasi</th>
                      <th class="text-sm">Nomor Dok</th>
                      <th class="text-sm">Nama Dok</th>
                      <th class="text-sm">Tahun Ajaran</th>
                      <th class="text-sm">Tanggal Dokumen</th>
                      <th class="text-sm">Tanggal Upload</th>
                      <th class="text-sm">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($dokumen->result_array() as $data) {
                      $lokasi = $data['nama_ruangan'] . '/' . $data['nama_lemari'] . '/' . $data['nama_rak'] . '/' . $data['nama_box'] . '/' . $data['nama_map'] . '/' . $data['nama_urut']
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td class="text-sm"><?php echo $data['nama_jenis_dokumen']; ?></td>
                        <td class="text-sm"><?php echo $lokasi; ?></td>
                        <td class="text-sm"><?php echo $data['nomor_dokumen']; ?></td>
                        <td class="text-sm"><?php echo $data['nama_dokumen']; ?></td>
                        <td class="text-sm"><?php echo $data['tahun_ajaran']; ?></td>
                        <td class="text-sm"><?php echo date("d-m-Y", strtotime($data['tanggal_dokumen'])); ?></td>
                        <td class="text-sm"><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-success btn-xs lihat-dokumen" href="" data-toggle="modal" data-target="#modalView" data-jenis_dokumen="<?php echo $data['nama_jenis_dokumen']; ?>" data-lokasi="<?php echo $lokasi; ?>" data-tanggal="<?php echo date("d-m-Y", strtotime($data['tanggal'])); ?>" data-tanggal_dokumen="<?php echo date("d-m-Y", strtotime($data['tanggal_dokumen'])); ?>" data-nama_dokumen="<?php echo $data['nama_dokumen']; ?>" data-deskripsi="<?php echo $data['deskripsi']; ?>" data-file_dokumen="<?php echo $data['file_dokumen']; ?>" data-nomor_dokumen="<?php echo $data['nomor_dokumen']; ?>"><i class="fa fa-search"> </i> </a>
                          <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'upload/' . $data['file_dokumen']; ?>" target="_blank"><i class="fa fa-download"> </i> </a>
                          <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'dokumen/dokumen_edit/' . $data['id_dokumen']; ?>"><i class="fa fa-edit"> </i> </a>
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

        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modalView">
    <div class="modal-dialog">
      <div class="modal-content card card-primary card-outline">
        <div class="modal-header">
          <h4 class="modal-title">Detail Document</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tbody>
              <tr>
                <td>Nomor Dokumen</td>
                <td class="nomor_dokumen"></td>
              </tr>
              <tr>
                <td>Jenis Dokumen</td>
                <td class="jenis_dokumen"></td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td class="deskripsi"></td>
              </tr>
              <tr>
                <td>Nama Dokumen</td>
                <td class="nama_dokumen"></td>
              </tr>
              <tr>
                <td>Nama File</td>
                <td class="file_dokumen"></td>
              </tr>
              <tr>
                <td>Tanggal Dokumen</td>
                <td class="tanggal_dokumen"></td>
              </tr>
              <tr>
                <td>Tanggal Upload</td>
                <td class="tanggal"></td>
              </tr>
              <tr>
                <td>Lokasi Penyimpanan</td>
                <td class="lokasi"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <script>
    $(".lihat-dokumen").click(function() {

      var nama_dokumen = $(this).attr('data-nama_dokumen');
      var nomor_dokumen = $(this).attr('data-nomor_dokumen');
      var jenis_dokumen = $(this).attr('data-jenis_dokumen');
      var deskripsi = $(this).attr('data-deskripsi');
      var file_dokumen = $(this).attr('data-file_dokumen');
      var tanggal = $(this).attr('data-tanggal');
      var lokasi = $(this).attr('data-lokasi');
      var tanggal_dokumen = $(this).attr('data-tanggal_dokumen');
      $(".nomor_dokumen").html(nomor_dokumen);
      $(".nama_dokumen").html(nama_dokumen);
      $(".deskripsi").html(deskripsi);
      $(".file_dokumen").html(file_dokumen);
      $(".tanggal").html(tanggal);
      $(".tanggal_dokumen").html(tanggal_dokumen);
      $(".lokasi").html(lokasi);
      $(".jenis_dokumen").html(jenis_dokumen);
    });
  </script>

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