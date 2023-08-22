  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated bounceIn">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-2">
            <div class="card card-info card-outline">
              <center><h1 class="m-0 text-dark mt-2" style="text-shadow: 2px 2px 4px #17a2b8;"><i class="fal fa-tv-alt fa-2x"></i> <br>INFORMASI PENGUMUMAN<br><?php echo $judul_pengumuman; ?></h1> </center>
              <hr>
              <img style="width:60%;margin:0 auto;" class="img-responsive" src="<?php echo base_url() . 'upload/' . $gambar; ?>">  <hr>
              <p class="mr-2 m-lg-5"><?php echo nl2br($isi); ?></p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  </div>
