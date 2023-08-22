  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
              <i class="fas fa-books nav-icon text-info"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/siswa"><?php echo $judul; ?></a></li>
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
          <div class="animated fadeInLeft col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalImport"><i class="fas fa-file-excel"> </i> Import Excel</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-info bg-navy text-center">
                      <th>No</th>
                      <th>No Ujian</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Matematika</th>
                      <th>B.Indo</th>
                      <th>B.Ingg</th>
                      <th>Kejuruan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa->result_array() as $data) { ?>
                      <tr class="text-center">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['no_ujian']; ?></td>
                        <td><?php echo $data['nama_siswa']; ?></td>
                        <td><?php echo $data['jurusan']; ?></td>
                        <td class="bg-danger text-center"><?php echo $data['nilai_mtk']; ?></td>
                        <td class="bg-info text-center"><?php echo $data['nilai_indo']; ?></td>
                        <td class="bg-purple text-center"><?php echo $data['nilai_eng']; ?></td>
                        <td class="bg-pink text-center"><?php echo $data['nilai_kejurusan']; ?></td>
                        <td><?php echo $data['status'];  ?> </td>
                        <td style="text-align:center;">
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url() . 'siswa/hapus/' . $data['id_kelulusan']; ?>"><i class="fa fa-trash"> </i>  </a>
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

  <div class="modal fade" id="modalImport">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-info"><i class="far fa-upload"></i></i> Import Data Kelulusan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(); ?>siswa/kelulusan_import" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <table class="table-form">
              <tbody>
                <tr>
                  <td class="tblabel">Pilih File :&nbsp;<i class="fas fa-file-excel fa-2x text-success"> </i></i> </th>
                  <td><input class="form-control" name="file_import" type="file" required /></td>
                </tr>
              </tbody>
            </table>
            <br>
            <p style="margin:0;">- Ukuran Maks <b>5MB</b> dan Format File <b><i class="fas fa-file-excel fa-2x text-success"> </i></i>.xlsx</b>.</p>
            <p style="margin:0;">- Format Data Kelulusan di unduh <a href="<?php echo base_url(); ?>upload/format/kelulusan_import.xlsx" target="_blank"> <i class="fal fa-download"></i> DISINI</a></a>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info"><i class="far fa-upload"></i> Simpan</button>
          </div>

        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

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