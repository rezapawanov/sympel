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
                  <div class=" col-12">
                      <div class="card card-purple card-outline">
                          <div class="card-header">
                              <a class="btn bg-purple btn-sm" href="<?php echo base_url(); ?>pengumuman/pengumuman_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-2">
                              <table id="datatb" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr class="bg-purple">
                                          <th width="20px">No</th>
                                          <th>Judul</th>
                                          <th>Tanggal Publish</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($pengumuman->result_array() as $data) { ?>
                                          <tr>
                                              <td><?php echo $no; ?></td>
                                              <td><?php echo $data['judul_pengumuman']; ?></td>
                                              <td><?php echo date("d-m-Y H:i", strtotime($data['tanggal'])); ?></td>
                                              <td style="text-align:center;width:80px;">
                                                  <a class="btn bg-purple btn-xs" href="<?php echo base_url() . 'pengumuman/pengumuman_edit/' . $data['id_pengumuman']; ?>"><i class="fa fa-edit"> </i> </a> |

                                                  <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'pengumuman/pengumuman_hapus/' . $data['id_pengumuman']; ?>" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> </a>
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
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modalImport">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-purple"><i class="far fa-upload"></i></i> Import Data Poin Pelanggaran</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?php echo base_url(); ?>master/poin_import" method="post" enctype="multipart/form-data">
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
                      <p style="margin:0;">- Format Data Poin Pelanggarah di unduh <a href="<?php echo base_url(); ?>upload/format/poin_import.xlsx" target="_blank"> <i class="fal fa-download"></i> DISINI</a></a>
                  </div>
              </form>
              <div class="modal-footer">
                  <button type="button" class="btn btn-info"><i class="far fa-upload"></i> Simpan</button>
              </div>
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