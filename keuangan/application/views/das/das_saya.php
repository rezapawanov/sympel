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
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> DAS</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>das/das_saya"><?php echo $judul; ?></a></li>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                  <table id="datatb" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr class="text-sm bg-navy">
                                    <th>No</th>
                                    <th>Jenis Dana</th>
                                    <th>Kode Anggaran</th>
                                    <th>Nama Daftar Anggaran</th>
                                    <th>Total Dana</th>
                                    <th>Sisa Saldo</th>
                                    <th>Tanggal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $no = 1;
                                foreach ($das_saya->result_array() as $data) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['jenis_dana'] . ' - ' . $data['tahun_ajaran']; ?></td>
                                        <td><?php echo $data['no_das']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
                                        <td>Rp. <?php echo number_format($data['total_terima']); ?></td>
                                        <td>RP. <?php echo number_format($data['sisa_saldo']); ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                        <td style="text-align:center;">
                                            <?php if ($data['open'] == '0') { ?>
                                                <a class="btn bg-maroon btn-xs" href="<?php echo base_url() . 'das/request_kelola/' . $data['id_das_user']; ?>" onClick="return confirm('Yakin ingin melakukan request dana ?');"><i class="fa fa-key"> </i> Request Kelola</a>
                                            <?php } else if ($data['open'] == '2') { ?>
                                                <span class="text-red">Menunggu Konfirmasi Bendahara</span>
                                            <?php } else { ?>
                                                <a class="btn bg-info btn-xs" href="<?php echo base_url() . 'das/das_saya_kelola/' . $data['id_das_user']; ?>"><i class="fa fa-edit"> </i> Kelola</a>
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