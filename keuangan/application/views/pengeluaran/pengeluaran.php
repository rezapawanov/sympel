  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
              <i class="fas fa-hands-usd nav-icon text-info"></i> <?php echo $judul; ?></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Jurnal</a></li>
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
               <a class="btn bg-navy btn-flat btn-sm" href="<?php echo base_url(); ?>jurnal/pengeluaran_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Pengeluaran</th>
                  <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <?php
                  $no = 1;
                  foreach($pengeluaran->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo date("d-m-Y",strtotime($data['tanggal'])); ?></td>
                      <td><?php echo $data['keterangan']; ?></td>
                      <td>Rp <?php echo number_format($data['jumlah']); ?></td>
                      <td style="text-align:center;">
                        <div class="btn-group btn-group-sm">
                        <a class="btn btn-info btn-xs"style="text-shadow: 2px 2px 4px black;"  href="<?php echo base_url().'jurnal/pengeluaran_edit/'.$data['id_pengeluaran']; ?>"><i class="fa fa-edit"> </i> Edit</a>
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'jurnal/pengeluaran_hapus/'.$data['id_pengeluaran']; ?>" onclick="return confirm('Yakin Ingin Hapus Data ?');"><i class="fa fa-trash"> </i> Hapus</a>
                      </div>
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