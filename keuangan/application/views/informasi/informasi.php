<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Master</a></li>
        <li class="active"><?php echo $judul; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
          <div class="box">
						<div class="box-header">
              <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>app/informasi_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatb" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
				    <th></th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no = 1;
					foreach($informasi->result_array() as $data) { ?>
				<tr>
					<td><?php echo $no; ?></td>
                    <td><?php if(!empty($data['gambar'])) {  ?><img style="width:80px;height:80px;" src="<?php echo base_url().'upload/informasi/'.$data['gambar'].'"'; ?>"/> <?php } ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo date('d-m-Y H:i:s',strtotime($data['tanggal'])); ?></td>
                    <td style="text-align:center;">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url().'app/informasi_edit/'.$data['id_informasi']; ?>"><i class="fa fa-edit"> </i> Ubah</a>
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url().'app/informasi_hapus/'.$data['id_informasi']; ?>" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> Hapus</a>
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