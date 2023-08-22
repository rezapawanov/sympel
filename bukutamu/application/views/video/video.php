  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
              <i class="nav-icon fas fa-tv-music text-purple"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/video"><?php echo $judul; ?></a></li>
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
               <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>video/video_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Judul</th>
                      <th>Link</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  $no = 1;
                  foreach($video->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['judul_video']; ?></td>
                      <td><?php echo $data['link']; ?></td>
                      <td style="text-align:center;">
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url().'video/video_edit/'.$data['id_video']; ?>"><i class="fa fa-edit"> </i> Edit </a>

                        <a class="btn btn-danger btn-sm" href="<?php echo base_url().'video/video_hapus/'.$data['id_video']; ?>" onclick="return confirm('yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> Hapus </a>
                      </td>
                    </tr>
                  <?php $no++; } ?>
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