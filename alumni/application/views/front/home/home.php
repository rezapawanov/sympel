<?php
$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content --><br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
			
            <!-- Profile Image -->
            <div class="card card-purple">
            	<div class="card-header">
            	<center>
                  <img class="profile-user-img img-fluid img-circle elevation-2" style="width: 60px; height: 60px;"
                       src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/asispanel/upload/'.$sekolah->logo; ?>"
                       alt="User profile picture ">
                
                <h4 class="m-0 text-white" style="text-shadow: 2px 2px 4px white; ">Form Login Alumni</h4></center>
              </div>
              <div class="card-body box-profile">
              	<form action="<?php echo base_url(); ?>app/save_login" method="post">
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  	<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope text-purple"></i></span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                  	<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-eye text-purple"></i></span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                  </li>
                </ul>

                <button class="btn bg-purple btn-block"> <i class="fad fa-sign-in"></i><b> L O G I N</b></button>
                <a class="nav-link 	text-muted text-right" href="#settings" data-toggle="tab"><i class="fa fa-user text-purple"> </i> Registrasi Alumni</a>
            </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Pengumuman</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Lowongan Kerja</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Registrasi Alumni</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <?php foreach ($pengumuman->result_array() as $data) { ?>
                    <!-- Post -->
                    <div class="post">
                      <center><h3><?php echo $data['judul_pengumuman']; ?></h3></center>
                      <p style="font-size:12px;font-weight:normal;" class="float-right text-purple">
                        Tanggal Posting : <?php echo date("d-m-Y H:i",strtotime($data['tanggal'])); ?>
                      </p>
                      <?php
                      if(!empty($data['gambar'])) {
                          
                        echo '<div class="card-body">
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="'.base_url().'upload/'.$data['gambar'].'"> </div>
                        </div> </div>';
                        
                      }
                      ?>
                      <p style="font-weight:normal;">
                        <?php echo $data['isi']; ?>
                      </p>
                    </div>
                    <?php } ?>
     
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <?php foreach ($loker->result_array() as $data) { ?>
                    <!-- Post -->
                    <div class="post">
                      <center><h3><?php echo $data['judul_loker']; ?></h3></center>
                      <p style="font-size:12px;font-weight:normal;" class="float-right text-purple">
                        Tanggal Posting : <?php echo date("d-m-Y H:i",strtotime($data['tanggal'])); ?>
                      </p>
                      <?php
                      if(!empty($data['gambar'])) {
                          echo '<div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="'.base_url().'upload/'.$data['gambar'].'"> </div>
                        </div>';
                      }
                      ?>
                      <p style="font-weight:normal;">
                        <?php echo $data['isi']; ?>
                      </p>
                    </div>
                    <?php } ?>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>app/save_registrasi" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                          <input type="hidden" class="id_kelas" name="id_kelas">
                          <input class="form-control " type="text" name="nama" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input class="form-control " type="email" name="email" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input class="form-control " type="password" name="password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-3 col-form-label">Aktivitas Saat ini</label>
                        <div class="col-sm-9">
                          <label>
								<input type="checkbox" name="aktivitas_1" value="Kerja"> Kerja
							</label>&nbsp;
							<label>
								<input type="checkbox" name="aktivitas_2" value="Kuliah"> Kuliah
							</label>&nbsp;
							<label>
								<input type="checkbox" name="aktivitas_3"  value="Wirausaha"> Wirausaha
							</label>&nbsp;
							<label>
								<input type="checkbox" name="aktivitas_4" value="Lainnya"> Lainnya
							</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-8 col-sm-4">
                          <button type="submit" class="btn bg-purple btn-block"><i class="fa fa-save"> </i> DAFTAR</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <div class="col-md-3">
          	<div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title"><i class="fad fa-bullhorn"></i> Informasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body text-purple">
                <strong><i class="fas fa-school mr-1"></i> Data Sekolah</strong>

                <p class="text-muted"><center>
                	<h6><strong><?php echo $nama_sekolah ?> <br>	
                  	NPSN : <?php echo $npsn ?></strong></h6>	</center>
                </p>

                <hr>
                
                <strong><i class="fas fa-address-book"></i> Contact</strong>
                <p class="text-muted">
                  <a class="text-muted" href="#" target="_blank"><i class="fas fa-phone-office text-warning"></i> <?php echo $no_telepon ?></a><br>
                  <a class="text-muted" href="https://wa.me/<?php echo $wa; ?>" target="_blank"><i class="fab fa-whatsapp text-success"></i> WhatsApp</a><br>	
                  <a class="text-muted" href="<?php echo $fb; ?>" target="_blank"><i class="fab fa-facebook-square text-blue"></i> Facebook</a><br>	
                  <a class="text-muted" href="<?php echo $youtube; ?>" target="_blank"><i class="fab fa-youtube text-danger"></i> Youtube</a><br>
                  <a class="text-muted" href="#" target="_blank"><i class="fas fa-envelope text-purple"></i> <?php echo $email ?></a><br>
                  <a class="text-muted" href="#" target="_blank"><i class="fab fa-internet-explorer text-purple"></i> <?php echo $website ?></a><br>	
                </p>

                <hr>
				<strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted"><?php echo $alamat_sekolah.' | '.$kodepos; ?></p>
                
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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