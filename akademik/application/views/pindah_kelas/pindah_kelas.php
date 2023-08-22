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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="color:black;">
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icon icon-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('success'); ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icon icon-remove"></i>
                                </button>
                                <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                            </div>
                        <?php } ?>
                        <section class="content animated fadeInUp ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                                <form role="form" action="<?php echo base_url(); ?>siswa/proses_tampil_pindah_kelas" method="post">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select class="form-control select2" name="id_kelas" required>
                                                <?php echo $combo_kelas; ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" placeholder="Angkatan" name="angkatan" value="<?php echo $angkatan; ?>">
                                        </div>
                                        <div class="col-xs-3">
                                            <button class="btn btn-primary" name="tampil"><i class="fa fa-search"> </i> Tampilkan Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-6 text-left">
                                Silahkan pilih siswa yang ingin di pindah kelas
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->

                        </div></div></div>
                    
                    <form role="form" action="<?php echo base_url(); ?>siswa/pindah_kelas_save" method="post">
                        <div class="box-body">
                               <!-- /.card-header -->
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
                                        <th style="text-align:center;"><input class="pindahAll" type="checkbox"></th>
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
                                                <td><?php if (!empty($data['tanggal_lahir'])) echo date("d-m-Y", strtotime($data['tanggal_lahir'])); ?></td>
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
                                                    <input class="pilihSiswa" type="checkbox" name="id_siswa[]" value="<?php echo $data['id_siswa']; ?>">
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
                        <section class="content animated fadeInUp ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-12">
            <div class="card card-info card-outline">
              <div class="card-header">

                                    <input type="hidden" name="dari_kelas" value="<?php echo $id_kelas; ?>">
                                    <input type="hidden" name="tahun_ajaran" value="<?php echo $angkatan; ?>">
                                    <div class="row">

                                    <div class="col-xs-4">
                                            <select class="form-control select2" name="kelas_tujuan" required>
                                                <?php echo $combo_kelas_pindah; ?>
                                            </select>
                                        </div>

                                        <div class="col-xs-4">
                                            <button style="btn btn-primary" class="btn btn-primary" name="tampil"><i class="fa fa-edit"> </i> Pindah Kelas</button>
                                        </div>

                                    </div>
                                    <label>Silahkan Pilih Kelas Tujuan</label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('.pindahAll').on('click',function(){
        if(this.checked){
            $('.pilihSiswa').each(function(){
                this.checked = true;
            });
        }else{
             $('.pilihSiswa').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.pilihSiswa').on('click',function(){
        if($('.pilihSiswa:checked').length == $('.pilihSiswa').length){
            $('.pindahAll').prop('checked',true);
        }else{
            $('.pindahAll').prop('checked',false);
        }
    });
});
</script>