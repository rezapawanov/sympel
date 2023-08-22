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
            <div class="card card-info card-outline">
              <div class="card-header">
                <form role="form" action="<?php echo base_url(); ?>siswa/proses_tampil_siswa" method="post">
                  <div class="row">
                    <div class="col-xs-6">
                      <select class="form-control select2" name="id_kelas" required>
                        <?php echo $combo_kelas; ?>
                      </select>
                    </div>
                    <div class="col-xs-6">
                      <button class="btn btn-primary" name="tampil"><i class="fa fa-search"> </i> Tampilkan Data</button>
                  </div>
                </form>

                <div class="col-xs-8 text-right">
                <a class="btn btn-primary" href="<?php echo base_url().'siswa/siswa_export/'.$id_kelas; ?>" target="_blank"><i class="fa fa-download"> </i> Export Ke Excel</a>
                <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-upload"> </i> Import Dari Excel</a>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>siswa/siswa_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                  <th>No</th>
                  <th>Nis</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th>Kelas</th>
                  <th>Angkatan</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($siswa)) {
                  $no = 1;
                  foreach ($siswa->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['nama_siswa']; ?></td>
                      <td><?php echo $data['jenis_kelamin']; ?></td>
                      <td><?php if(!empty($data['tanggal_lahir'])) echo date("d-m-Y", strtotime($data['tanggal_lahir'])); ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['angkatan']; ?></td>
                      <td style="text-align:center;"><?php
                                                      if ($data['aktif_siswa'] == '1') {
                                                        echo '<label class="label label-success">AKTIF</label>';
                                                      } else {
                                                        echo '<label class="label label-default">TIDAK AKTIF</label>';
                                                      }
                                                      ?>
                      </td>
                      <td style="text-align:center;">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'siswa/siswa_detail/' . $data['nis']; ?>"><i class="fa fa-search"> </i> Detail</a>
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'siswa/siswa_edit/' . $data['id_siswa']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                      </td>
                    </tr>
                    <?php $no++;
                  } ?>

                <?php } else {
                  echo '<tr><td colspan="9">Silahkan Pilih Kelas Terlebih Dahulu</td></tr>';
                } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
</div>

<div class="modal fade" id="modalAdd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Import Data Siswa Dari Excel</h4>
      </div>
      <div class="modal-body">
        <div id="info"></div>
        <form role="form" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>File Excel</label>
            <input type="file" class="form-control" name="file_excel" required>
            <a href="<?php echo base_url(); ?>upload/siswa_import.xls" target="_blank" style="color:#000;text-decoration:underline;font-weight:bold;">Format file dapat didownload disini</a>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" name="btn_import"><i class="fa fa-save"> </i> Import</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php

if (isset($_POST['btn_import'])) {

  require('asset/excell/php-excel-reader/excel_reader2.php');

  require('asset/excell/SpreadsheetReader.php');


  $target_dir = "upload/";

  $name = pathinfo($_FILES['file_excel']['name'], PATHINFO_FILENAME);
  $extension = pathinfo($_FILES['file_excel']['name'], PATHINFO_EXTENSION);

  $increment = '';

  while (file_exists($target_dir . $name . $increment . '.' . $extension)) {
    $increment++;
  }

  $basename = md5($name . $increment) . '.' . $extension;
  $target_file = $target_dir . basename($basename);

  if (move_uploaded_file($_FILES["file_excel"]["tmp_name"], $target_file)) {
    $Reader = new SpreadsheetReader($target_file);


    foreach ($Reader as $row) {
      $datax[] = $row;
    }
    array_shift($datax);
    foreach ($datax as $item) {
      $in['nis'] = $item[0];
      $in['nisn'] = $item[1];
      $in['nama_siswa'] = $item[2];
      $in['id_kelas'] = $item[3];
      $in['jenis_kelamin'] = $item[4];
      $in['angkatan'] = $item[5];
      $in['password'] = $item[0];
      $this->db->insert("mst_siswa", $in);
    }
    echo '<script>
          alert("Berhasil Import Data Siswa");
          document.location.href="' . base_url() . 'siswa/siswa"
          </script>';
  }
}
?>