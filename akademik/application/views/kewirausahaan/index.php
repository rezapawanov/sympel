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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah
                </button>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <form name="form-search">
                  <div class="row mb-2">
                    <div class="col-6">
                      <input type="hidden" name="id_siswa" value="<?=isset($id_siswa) ? $id_siswa : ''?>">

                      <label for="start_dt">Tanggal Awal</label>
                      <input type="date" name="start_dt" class="form-control" value="<?=date('Y-m-d', time())?>">
                    </div>
                    <div class="col-6">
                      <label for="end_dt">Tanggal Akhir</label>
                      <input type="date" name="end_dt" class="form-control"  value="<?=date('Y-m-d', time())?>">
                    </div>
                  </div>
                  <button type="submit" name="search" class="btn btn-primary">Cari</button>
                </form>

                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>ID</th>
                      <th>ID siswa</th>
                      <th>Tanggal</th>
                      <th>Nama Siswa</th>
                      <th>Program Keahlian</th>
                      <th>Nama Usaha</th>
                      <th>Jenis Usaha</th>
                      <th>Omset</th>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="program_keahlian">Program Keahlian</label>
              <input type="text" class="form-control" name="program_keahlian" placeholder="Program keahlian">
            </div>

            <div class="form-group">
              <label for="nama_usaha">Nama Usaha</label>
              <input type="text" class="form-control" name="nama_usaha" placeholder="Nama Usaha">
            </div>

            <div class="form-group">
              <label for="jenis_usaha">Jenis Usaha</label>
              <input type="text" class="form-control" name="jenis_usaha" placeholder="Jenis Usaha">
            </div>

            <div class="form-group">
              <label for="nib">NIB</label>
              <input type="text" class="form-control" name="nib" placeholder="Nib">
            </div>

            <div class="form-group">
              <label for="omset">Omset</label>
              <input type="number" class="form-control" name="omset" placeholder="Omset">
            </div>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="save" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?=base_url('assets/js/_kewirausahaan.js')?>" defer></script>