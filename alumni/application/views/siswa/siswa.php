<div class="content-wrapper">
	<section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Siswa</a></li>
        <li class="active"><?php echo $judul; ?></li>
      </ol>
    </section>
	<section class="content">
      <!-- Main row -->
      <div class="row">
			<div class="col-xs-12">
          <div class="box">
			<div class="box-header">
                <div class="row">
                    <div class="col-xs-4">
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatb" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Kelas</th>
                        <th>Angkatan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
					<?php
        if(!empty($siswa)) { 
                    $no = 1;
					foreach($siswa->result_array() as $data) { ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['nis']; ?></td>
						<td><?php echo $data['nama_siswa']; ?></td>
						<td><?php echo $data['jenis_kelamin']; ?></td>
						<td><?php if(!empty($data['tanggal_lahir'])) echo date("d-m-Y",strtotime($data['tanggal_lahir'])); ?></td>
						<td><?php echo $data['nama_kelas']; ?></td>
            <td><?php echo $data['angkatan']; ?></td>
            <td style="text-align:center;">
              <a class="btn btn-primary btn-xs" href="<?php echo base_url().'siswa/siswa_detail/'.$data['nis']; ?>"><i class="fa fa-search"> </i> Detail</a>
            </td>
          </tr>
				    <?php $no++; } ?>

                    <?php } else { echo '<tr><td colspan="9">Silahkan Pilih Kelas Terlebih Dahulu</td></tr>'; } ?> 
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