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
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="animated fadeInUp col-12">
            <div class="card card-info card-outline">
              <div class="card-header">
               <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>master/sumber_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-info bg-navy">
                      <th>No</th>
                      <th>Sumber Buku</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                                $no = 1;
                                foreach ($sumber->result_array() as $data) { ?>
                                    <tr>
                                        <td  style="text-align:center;width:20px;"><?php echo $no; ?></td>
                                        <td><?php echo $data['nama_sumber']; ?></td>
                                        <td style="text-align:center;width:150px;">
                                            <div class="btn-group btn-group-sm">
                                            <a class="btn bg-navy btn-xs" href="<?php echo base_url() . 'master/sumber_edit/' . $data['id_sumber']; ?>"><i class="fa fa-edit"> </i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'master/sumber_hapus/' . $data['id_sumber']; ?>" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> Hapus </a>
                                        </div>
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

      <!-- /.modal -->