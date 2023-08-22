 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark"><i class="far fa-book-medical nav-icon text-info"></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/dokumen"><?php echo $judul; ?></a></li>
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
                <div class="row">
                     <div class="col-xs-6">
                        <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>nilai/nilai_harian"><i class="fa fa-arrow-left"> </i> Kembali</a>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"> </i> Tambah Kategori Nilai</a>
                    </div>
                </div>
            </div>


            <!-- /.box-header -->
            <div class="box-body">
                        <?php if($this->session->flashdata('error')) { ?>
					      <div class="alert alert-danger" >
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
					        </button>
					        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
					      </div>
					    <?php } ?>

<div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<?php
                    if($nilai_harian_kategori->num_rows() > 0 ) { 
					foreach($nilai_harian_kategori->result_array() as $data) { ?>
					<tr>
						<td><?php echo $data['kategori']; ?></td>
						<td><?php echo $data['keterangan']; ?></td>
						<td><?php echo date("d-m-Y",strtotime($data['tanggal'])); ?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-primary btn-xs" href="<?php echo base_url().'nilai/input_nilai_harian/'.$data['id_nilai_harian']; ?>"><i class="fa fa-edit"> </i> Input Nilai</a>
                            |
                            <a class="btn btn-warning btn-xs" href="<?php echo base_url().'nilai/kategori_hapus/'.$data['id_nilai_harian'].'/'.$id_jadwal_pelajaran; ?>" onclick="return confirm('Yakin Ingin Hapus Data ? ');"><i class="fa fa-trash"> </i> Hapus Nilai</a>
                        </td>
                    </tr>
				    <?php  } ?>

                    <?php } else { echo '<tr><td colspan="9">Silahkan Buat Kategori Nilai Terlebih Terlebih Dahulu</td></tr>'; } ?> 
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
                <h4 class="modal-title">Tambah Kategori Nilai</h4>
              </div>
              <form role="form" action="<?php echo base_url(); ?>nilai/kategori_save" method="post">
                <input type="hidden" name="tipe" value="add" readonly>
                <input type="hidden" name="id_jadwal_pelajaran" value="<?php echo $id_jadwal_pelajaran; ?>" readonly>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori Nilai</label>
                        <input type="text" class="form-control" name="kategori" required>
                   </div>
                   <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button  class="btn btn-primary">Simpan Data</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
