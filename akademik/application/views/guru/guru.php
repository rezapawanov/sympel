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
    <section class="content animated fadeInUp ">
     
      <!-- Main row -->
      <div class="container-fluid">
      <div class="row">
          <div class=" col-12">
            <div class="card card-info card-outline">
              <div class="card-header">
              <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>pengguna/guru_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalImport"><i class="fa fa-plus"> </i> Import Excel</a>
            </div>
            <!-- /.box-header -->
            <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                  <th>No</th>
                  <th>NIPTK</th>
                  <th>NIK</th>
                  <th>Nama Guru</th>
                  <th>No Handphone</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($guru->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nip']; ?></td>
                      <td><?php echo $data['nik']; ?></td>
                      <td><?php echo $data['nama_guru']; ?></td>
                      <td><?php echo $data['hp']; ?></td>
                      <td><?php echo $data['id_jabatan']; ?></td>
                      <td style="text-align:center;"><?php
                            if($data['aktif_guru'] == '1') {
                              echo '<label class="label label-success">AKTIF</label>';
                            }  else {
                              echo '<label class="label label-default">TIDAK AKTIF</label>';
                            }
                          ?>
                      </td>
                      <td style="text-align:center;">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url().'pengguna/guru_detail/'.$data['nip']; ?>"><i class="fa fa-search"> </i> Detail</a>
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'pengguna/guru_edit/'.$data['id_guru']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                      </td>
                    </tr>
                  <?php $no++; } ?>
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

<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalUnggahLabel">Import Data Guru</h4>
      </div>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <table class="table-form">
            <tbody>
              <tr>
                <td class="tblabel">Pilih File </th>
                <td><input class="form-control" name="file_excel" type="file" required /></td>
              </tr>
            </tbody>
          </table>
          <br>
          <p style="margin:0;">- Ukuran Maks <b>5MB</b> dan Format File <b>.xlsx</b>.</p>
          <p style="margin:0;">- Format unggah data dapat di unduh <a href="<?php echo base_url(); ?>upload/format/guru_import.xlsx" target="_blank">DISINI</a></a>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" name="btn_import"><i class="fa fa-upload"> </i> Import Data</button>
        </div>
      </form>
    </div>
  </div>
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
    $in['nip'] = $item[0];
    $in['nama_guru'] = $item[1];
    $in['jenis_kelamin'] = $item[2];
    $in['id_jabatan'] = $item[3];
    $this->db->insert("mst_guru", $in);
  }
  echo '<script>
        alert("Berhasil Import Data Siswa");
        document.location.href="' . base_url() . 'pengguna/guru"
        </script>';
}
}
?>