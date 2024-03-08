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
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>absen/absen_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <form name="form-search">
                  <div class="row mb-2">
                    <div class="col-6">
                      <label for="start_dt">Tanggal Awal</label>
                      <input type="date" name="start_dt" class="form-control" value="<?=date('Y-m-d', time())?>">
                    </div>
                    <div class="col-6">
                      <label for="end_dt">Tanggal Akhir</label>
                      <input type="date" name="end_dt" class="form-control"  value="<?=date('Y-m-d', time())?>">
                    </div>
                    <div class="col-6">
                      <label for="id_kelas">Kelas</label>
                      <select class="form-control" name="id_kelas" id="id_kelas">
                        <option value="">All</option>
                        <?php foreach($kelas as $val): ?>
                          <option value="<?=$val['id_kelas']?>"><?=$val['nama_kelas']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <button type="submit" name="search" class="btn btn-primary">Cari</button>
                </form>

                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Masuk</th>
                      <th>Keluar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  
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
  <!-- /.content-wrapper -->

  <script src="<?=base_url('assets/js/_absen_harian.js')?>" defer></script>