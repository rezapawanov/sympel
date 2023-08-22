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
                <p style="color:red;">Klik Pada Kolom Nilai Untuk Melakukan Penginputan, kemudian tekan <b>"Enter" atau "Tab"</b> untuk menyimpan nilai</p>
            </div>
            <!-- /.box-header -->
           <!-- /.card-header -->
           <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                  <th>Dari Nilai</th>
                  <th>Sampai Nilai</th>
                  <th>Grade</th>
                  <th>Keterangan</th>
                  <th style="display:none;">ID</th>
                </tr>
                </thead>
                <tbody>
					<?php
					foreach($mapel->result_array() as $data) { ?>
                    <tr id="<?php echo $data['id_predikat']; ?>">
                        <td><?php echo $data['dari_nilai']; ?></td>
                        <td><?php echo $data['sampai_nilai']; ?></td>
                        <td><?php echo $data['grade']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td style="display:none;"><?php echo $data['id_predikat']; ?></td>
                    </tr>
			    <?php  } ?>
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

<script type="text/javascript">
$('#data-edit').Tabledit({
    deleteButton: false,
    editButton: false,      
    columns: {
      identifier: [4, 'id_predikat'],                    
      editable: [[0, 'dari_nilai'],[1, 'sampai_nilai']]
    },
    hideIdentifier: true,
    url: '<?php echo base_url(); ?>master/predikat_save',
	onSuccess: function(data) {   
        //window.location.reload();
	}
});
</script>