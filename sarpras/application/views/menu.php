<?php 
$Dd= date("D");
$bln= date ("M");
  if ($Dd=="Sun"){$hari="Minggu, ";}
  else if ($Dd=="Mon"){$hari="Senin, ";}
  else if ($Dd=="Tue"){$hari="Selasa, ";}
  else if ($Dd=="Wed"){$hari="Rabu, ";}
  else if ($Dd=="Thu"){$hari="Kamis, ";}
  else if ($Dd=="Fri"){$hari="Jum'at, ";}
  else if ($Dd=="Sat"){$hari="Sabtu, ";}
  else{$hari=$Dd;}
                
                if($bln=='Jan'){$bln = "Januari ";}
                elseif($bln=='Feb'){$bln = "Februari ";}
                elseif($bln=='Mar'){$bln = "Maret ";}
                elseif($bln=='Apr'){$bln = "April";}
                elseif($bln=='May'){$bln = "Mei ";}
                elseif($bln=='Jun'){$bln = "Juni ";}
                elseif($bln=='Jul'){$bln = "Juli ";}
                elseif($bln=='Aug'){$bln = "Agustus ";}
                elseif($bln=='Sep'){$bln = "September ";}
                elseif($bln=='Oct'){$bln = "Oktober ";}
                elseif($bln=='Nov'){$bln = "November";}
                elseif($bln=='Dec'){$bln = "Desember ";}
                else{$bln=$bln;}
                $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-info elevation-4 animated fadeInLeft">
    <!-- Brand Logo -->
    
    <a href="<?php echo base_url(); ?>" class="brand-link ">
     <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/master/upload/'.$sekolah->logo; ?>" alt="Logo" class="brand-image img-rounded elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="text-shadow: 2px 2px 4px #827e7e;"><b>APP SARPRAS</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image animated fadeInLeft">
          <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/master/upload/user.jpg'; ?>" class="img-rounded elevation-2" style="width:60px;height:70px;" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata("nama"); ?></a>
          <span class="badge badge-info right "><?php echo ucfirst($this->session->userdata("hak_akses")); ?></span>
          <a href="<?php echo base_url(); ?>logout"><span class="badge badge-danger right ">Logout <i class="nav-icon fas fa-sign-out-alt"></i></span></a>
        </div>

      </div>
      <center>
        <span class="right btn badge badge-danger btn-flat animated fadeInDown"><?php echo $hari."&nbsp;" ; echo date('d'). "&nbsp;&nbsp;"; echo $bln."&nbsp;" ; echo date('Y'); ?></span>
        <button class='btn  btn-flat bg-success badge badge-danger animated fadeInUp'><span class="" id="clock"></button>
      </center>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                DAHSBOARD
              </p>
            </a>
          </li>
          <li class="nav-header text-info">DATA MANAJEMEN</li>
          <li class="nav-item has-treeview <?php if($this->uri->segment(1) == 'master') echo 'active'; ?> treeview <?php if($this->uri->segment(1) == 'master') echo 'menu-open'; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-medical text-info"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>master/jenis_barang" class="nav-link">
                  <i class="fas fa-file-alt nav-icon text-danger"></i>
                  <p>Jenis Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>master/ruangan" class="nav-link">
                  <i class="fas fa-building nav-icon text-gray"></i>
                  <p>Ruang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>master/lemari" class="nav-link">
                  <i class="fal fa-tasks-alt nav-icon text-orange"></i>
                  <p>Lemari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>master/rak" class="nav-link">
                  
                  <i class="far fa-cabinet-filing nav-icon text-blue" ></i>
                  <p>Rak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>master/box" class="nav-link">
                  <i class="fas fa-box-open nav-icon text-success"></i>
                  <p>Box</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>master/map" class="nav-link">
                  <i class="fas fa-books nav-icon text-info"></i>
                  <p>Map</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>master/urut" class="nav-link">
                  <i class="fas fa-ballot-check nav-icon text-purple"></i>
                  <p>Urut</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>sarpras" class="nav-link">
              <i class="far fa-book-medical nav-icon text-success"></i>
              <p>
                Input Sarpras
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>tamu" class="nav-link">
              <i class="fal fa-book-reader nav-icon text-danger""></i>
              <p>
                Data Tamu
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>laporan/arsip" class="nav-link">
              <i class="nav-icon fas fa-print text-purple"></i>
              <p>
                Laporan Sarpras
              </p>
            </a>
          </li>

          <li class="nav-header text-info">TUTORIAL</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book text-info"></i>
              <p>
                Manual Book
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p> Logout </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script type="text/javascript">
    <!--
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
     document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }
        
        function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    //-->
    </script>
  