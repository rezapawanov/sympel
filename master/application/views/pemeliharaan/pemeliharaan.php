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
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>app/password"><?php echo $judul; ?></a></li>
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
                  <div class="animated fadeInLeft col-md-8">
                      <div class="card card-info">
                          <div class="card-header">
                              <h3 class="card-title"><i class="fas fa-ballot"></i> Proses <?php echo $judul; ?></h3>
                          </div>
                         <div class="card-body">
                  <a class="btn bg-navy" href="<?php echo base_url(); ?>backup/direct" target="_blank"><i class="fa fa-database"> </i> Backup Database</a>
              </div>
                      </div>
                  </div>
                  <div class="animated fadeInRight col-md-4">
                      <div class="callout callout-info">
                          <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
                          <ol>
                              <li>
                                  Gunakan <i>button</i>
                                  <button class="btn btn-xs bg-navy"><span class="fa fa-save"></span> Backup Database </button>
                                  untuk <b><?php echo $judul; ?></b>.
                              </li>
                          </ol>
                          <p>
                              Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
                          </p>

                      </div>
                  </div>
              </div>

          </div>
      </section>
      <!-- /.content -->
  </div>