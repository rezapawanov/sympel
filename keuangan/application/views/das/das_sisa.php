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
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#"><?php echo $judul; ?></a></li>
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
               <a class="btn bg-navy btn-flat btn-sm" href="#" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                                    <th>No</th>
                                    <th>Jenis Dana</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Total Dana</th>
                                    <th>Sisa Dana</th>
                                    <th>Tanggal</th>

                                    <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-sm">
                    <?php
                                $no = 1;
                                foreach ($das_sisa->result_array() as $data) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['jenis_dana']; ?></td>
                                    <td><?php echo $data['tahun_ajaran']; ?></td>
                                    <td>Rp. <?php echo number_format($data['dana']); ?></td>
                                    <td>RP. <?php echo number_format($data['sisa_dana']); ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                    <td style="text-align:center;">
                                        
                                        <?php if($data['status'] == 0) { ?>
                                          <div class="btn-group btn-group-sm">
                                            <a class="btn btn-info  btn-xs" href="<?php echo base_url() . 'das/das_sisa_kelola/' . $data['id_das_sisa']; ?>"><i class="fa fa-edit"> </i> Kelola</a>
                                    <a class="btn bg-navy btn-xs" href="<?php echo base_url() . 'das/das_sisa_tutup/' . $data['id_das_sisa']; ?>" onclick="return confirm('Yakin ingin menutup DAS ini ?');"><i class="fad fa-lock-alt"></i> Tutup</a>
                                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'das/das_sisa_hapus/' . $data['id_das_sisa']; ?>" onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> Hapus</a>
                                        <?php } else {  ?>
                                            <a class="btn bg-maroon btn-xs" href="<?php echo base_url() . 'das/das_sisa_kelola/' . $data['id_das_sisa']; ?>"><i class="fa fa-list-alt"> </i> Detail</a></div>
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

  <div class="modal fade" id=modalAdd>
  <div class="modal-dialog modal-lg ">
    <div class="modal-content ">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tambah Sisa RABS</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" aria-label="Close" data-dismiss="modal"><i class="fas fa-times"></i>
                  </button>
                </div>

                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="info"></div>
        <form role="form" action="<?php echo base_url(); ?>das/das_sisa_save" method="post">
                    <input class="id_das_sisa" type="hidden" name="id_das_sisa" readonly>
                    <input class="tipe" type="hidden" name="tipe" value="add" readonly>

                    <div class="form-group">

                        <label>Tahun Ajaran</label>
                        <select class="select2 form-control tahun_ajaran" name="tahun_ajaran" required>
                            <?php echo $combo_tahun_ajaran; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Dana</label>
                        <input type="text" class="form-control" name="jenis_dana"  required>
                    </div>

                    <div class="form-group">
                    <label>Jumlah Dana</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-danger">Rp.</span>
                      </div>
                        <input type="text" class="form-control rupiah" name="dana"  value="" required="">
                    </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
                    </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>
        </form>
      </div>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
  </div>
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