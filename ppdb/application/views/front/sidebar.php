<div class="col-lg-4">
            <div class="card">
              <div class="card-header bg-teal">
                  <div class="text-center">
                       <b>SLIDESHOW</b>    
                  </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                 $slideshow = $this->db->query("SELECT * FROM ppdb_slideshow ORDER BY id_slideshow DESC");
                 $i = 0;
                 ?>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                  <?php foreach($slideshow->result_array() as $data_slideshow) {  
                       if($i == 1) {
                        $active = 'active';
                      } else {
                        $active = "";
                      }
                      ?>
                      
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i; ?>" class="<?php echo $active; ?>"></li>
                    <?php $i++; } ?>
                  </ol>
                  <div class="carousel-inner">
                    <?php
                   
                    $no  = 1;
                    foreach($slideshow->result_array() as $data_slideshow) { 
                      if($no == 1) {
                        $active = 'active';
                      } else {
                        $active = "";
                      }
                      ?>
                      <div class="carousel-item <?php echo $active; ?>">
                        <img class="d-block w-100" src="<?php echo base_url().'upload/'.$data_slideshow['file_gambar']; ?>" >
                      </div>
                    <?php $no++; } ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header bg-teal">
                  <div class="text-center">
                       <b>BANNER</b>    
                  </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                 $banner = $this->db->query("SELECT * FROM ppdb_banner ORDER BY id_banner DESC");
                 $i = 0;
                 ?>
                <div id="carouselExampleIndicatorsx" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <?php foreach($banner->result_array() as $data_banner) {  
                       if($i == 1) {
                        $active = 'active';
                      } else {
                        $active = "";
                      }
                      ?>
                      
                    <li data-target="#carouselExampleIndicatorsx" data-slide-to="<?php $i; ?>" class="<?php echo $active; ?>"></li>
                    <?php $i++; } ?>
                  </ol>
                  <div class="carousel-inner">
                  <?php
                   $no  = 1;
                    foreach($banner->result_array() as $data_banner) { 
                      if($no == 1) {
                        $active = 'active';
                      } else {
                        $active = "";
                      }
                      ?>
                      <div class="carousel-item <?php echo $active; ?>">
                        <img class="d-block w-100" src="<?php echo base_url().'upload/'.$data_banner['file_gambar']; ?>" >
                      </div>
                    <?php $no++; } ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>