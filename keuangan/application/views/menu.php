  <?php
  $Dd = date("D");
  $bln = date("M");
  if ($Dd == "Sun") {
    $hari = "Minggu, ";
  } else if ($Dd == "Mon") {
    $hari = "Senin, ";
  } else if ($Dd == "Tue") {
    $hari = "Selasa, ";
  } else if ($Dd == "Wed") {
    $hari = "Rabu, ";
  } else if ($Dd == "Thu") {
    $hari = "Kamis, ";
  } else if ($Dd == "Fri") {
    $hari = "Jum'at, ";
  } else if ($Dd == "Sat") {
    $hari = "Sabtu, ";
  } else {
    $hari = $Dd;
  }

  if ($bln == 'Jan') {
    $bln = "Januari ";
  } elseif ($bln == 'Feb') {
    $bln = "Februari ";
  } elseif ($bln == 'Mar') {
    $bln = "Maret ";
  } elseif ($bln == 'Apr') {
    $bln = "April";
  } elseif ($bln == 'May') {
    $bln = "Mei ";
  } elseif ($bln == 'Jun') {
    $bln = "Juni ";
  } elseif ($bln == 'Jul') {
    $bln = "Juli ";
  } elseif ($bln == 'Aug') {
    $bln = "Agustus ";
  } elseif ($bln == 'Sep') {
    $bln = "September ";
  } elseif ($bln == 'Oct') {
    $bln = "Oktober ";
  } elseif ($bln == 'Nov') {
    $bln = "November";
  } elseif ($bln == 'Dec') {
    $bln = "Desember ";
  } else {
    $bln = $bln;
  }
  $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
  ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-info elevation-4 animated fadeInLeft">
    <!-- Brand Logo -->

    <a href="<?php echo base_url(); ?>" class="brand-link ">
      <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/master/upload/'.$sekolah->logo; ?>" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="text-shadow: 2px 2px 4px #827e7e;"><b>APP KEUANGAN</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php if($this->session->userdata("hak_akses") == 'bendahara' || $this->session->userdata("hak_akses") == 'keuangan') { 
          $id = $this->session->userdata("id");
          $get_foto = $this->db->query("SELECT foto FROM mst_user WHERE id_user = '$id'")->row();


?>
        <div class="image animated fadeInLeft">
          <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/master/upload/user.jpg'; ?>" class="img-rounded elevation-2" style="width:60px;height:70px;" alt="User Image">
        </div>
       
         <?php } else { ?>

        

          <div class="image animated fadeInLeft">
          <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/master/upload/user.jpg'; ?>" class="img-rounded elevation-2" style="width:60px;height:70px;" alt="User Image">
        </div>
        <?php } ?>
        <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata("nama"); ?></a>
          <a href="#" class="d-block">Saldo Rp <?php echo number_format($this->session->userdata("saldo")); ?></a>
          <span class="badge badge-info right "><?php echo ucfirst($this->session->userdata("hak_akses")); ?></span>
          <a href="<?php echo base_url(); ?>logout"><span class="badge badge-danger right ">Logout <i class="nav-icon fas fa-sign-out-alt"></i></span></a>
        </div>

      </div>
      <center>
        <span class="right btn badge badge-danger btn-flat animated fadeInDown"><?php echo $hari . "&nbsp;";
                                                                                echo date('d') . "&nbsp;&nbsp;";
                                                                                echo $bln . "&nbsp;";
                                                                                echo date('Y'); ?></span>
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
          <!-- RABS USER -->
          <?php if ($this->session->userdata("hak_akses") == 'das') { ?>
            <li class="nav-item has-treeview  <?php if ($this->uri->segment(1) == 'das') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'das') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-bill-alt text-info"></i>
                <p>
                  RABS
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_saya" class="nav-link">
                    <i class="nav-icon  fas fa-money-check-edit-alt nav-icon text-danger"></i>
                    <p>Proses Anggaran Dana</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar text-success"></i>
                <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_harian" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>RABS Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>RABS Keseluruhan</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- RABS VIEW ATASAN-->
          <?php } else if ($this->session->userdata("hak_akses") == 'dasview') {  ?>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar text-success"></i>
                <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/pembayaran" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Pembayaran Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/rekapitulasi" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Rekapitulasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/jurnal" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Jurnal Umum</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan RABS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_harian" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan RABS Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Keseluruhan Das</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- RABS BENDAHARA -->
          <?php } else if ($this->session->userdata("hak_akses") == 'bendahara') {  ?>

            <?php
            $hitung_request = $this->db->query("SELECT COUNT(*) as hitung FROM das_user WHERE open = 2")->row();
            ?>


            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'das') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'das') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-bill-alt text-info"></i>
                <p>
                  Pembiayan <span class="badge badge-success"><?php echo $hitung_request->hitung; ?></span>
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_sumber_dana" class="nav-link">
                    <i class="fas fa-wallet nav-icon text-danger"></i>
                    <p>Sumber Dana Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_kategori" class="nav-link">
                    <i class="fas fa-badge-dollar nav-icon text-info"></i>
                    <p>Kategori Dana</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das" class="nav-link">
                    <i class="fas fa-comments-alt-dollar nav-icon text-success"></i>
                    <p>Kelola Dana <span class="badge badge-success"><?php echo $hitung_request->hitung; ?></span></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_sisa" class="nav-link">
                    <i class="fas fa-sack-dollar nav-icon text-purple"></i>
                    <p>Sisa Dana</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_bendahara" class="nav-link">
                    <i class="fas fa-file-invoice-dollar nav-icon text-orange"></i>
                    <p>Kelola Dana Saya</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'jurnal') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'jurnal') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-books text-purple"></i>
                <p>
                  Jurnal Umum
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>jurnal/penerimaan" class="nav-link">
                    <i class="fas fa-download nav-icon text-success"></i>
                    <p>Pemasukan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>jurnal/pengeluaran" class="nav-link">
                    <i class="fas fa-upload nav-icon text-danger"></i>
                    <p>Pengeluaran</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar text-success"></i>
                <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/pembayaran" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Pembayaran Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/rekapitulasi" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Rekapitulasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/jurnal" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Jurnal Umum</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_bendahara" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan RABS Bendahara</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_harian" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan RABS Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Semua RABS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_sisa" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Sisa RABS </p>
                  </a>
                </li>
              </ul>
            </li>

         
         
         
         
         
            <!-- RABS BENDAHARA -->
          <?php } else if ($this->session->userdata("hak_akses") == 'bendahara') {  ?>

            <?php
            $hitung_request = $this->db->query("SELECT COUNT(*) as hitung FROM das_user WHERE open = 2")->row();
            ?>


            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'das') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'das') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-bill-alt text-info"></i>
                <p>
                  Pembiayan <span class="badge badge-success"><?php echo $hitung_request->hitung; ?></span>
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_sumber_dana" class="nav-link">
                    <i class="fas fa-wallet nav-icon text-danger"></i>
                    <p>Sumber Dana Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_kategori" class="nav-link">
                    <i class="fas fa-badge-dollar nav-icon text-info"></i>
                    <p>Kategori Dana</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das" class="nav-link">
                    <i class="fas fa-comments-alt-dollar nav-icon text-success"></i>
                    <p>Kelola Dana <span class="badge badge-success"><?php echo $hitung_request->hitung; ?></span></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_sisa" class="nav-link">
                    <i class="fas fa-sack-dollar nav-icon text-purple"></i>
                    <p>Sisa Dana</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_bendahara" class="nav-link">
                    <i class="fas fa-file-invoice-dollar nav-icon text-orange"></i>
                    <p>Kelola Dana Saya</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'jurnal') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'jurnal') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-books text-purple"></i>
                <p>
                  Jurnal Umum
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>jurnal/penerimaan" class="nav-link">
                    <i class="fas fa-download nav-icon text-success"></i>
                    <p>Pemasukan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>jurnal/pengeluaran" class="nav-link">
                    <i class="fas fa-upload nav-icon text-danger"></i>
                    <p>Pengeluaran</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar text-success"></i>
                <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/pembayaran" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Pembayaran Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/rekapitulasi" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Rekapitulasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/jurnal" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Jurnal Umum</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_bendahara" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan RABS Bendahara</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_harian" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan RABS Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Semua RABS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_sisa" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Sisa RABS </p>
                  </a>
                </li>
              </ul>
            </li>

         
         
         
         
         
            <!-- KEUANGAN KASIR -->
          <?php } else if ($this->session->userdata("hak_akses") == 'kasir') {  ?>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'master') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'master') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-bill-alt text-info"></i>
                <p>
                  Master Pembayaran
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>master/pos_keuangan" class="nav-link">
                    <i class="fas fa-hand-holding-usd nav-icon text-danger"></i>
                    <p>Jenis Pembayaran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>master/jenis_pembayaran" class="nav-link">
                    <i class="fas fa-hands-usd nav-icon text-success"></i>
                    <p>Tarip Pembayaran</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>pembayaran/pembayaran_siswa" class="nav-link">
                <i class="nav-icon fas fa-cash-register text-success"></i>
                <p>
                  Pembayaran Siswa
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>tabungan_siswa" class="nav-link">
                <i class="nav-icon fas fa-cash-register text-success"></i>
                <p>
                  Tabungan Siswa
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>belanja_siswa" class="nav-link">
                <i class="nav-icon fas fa-cash-register text-success"></i>
                <p>
                  Belanja Siswa
                </p>
              </a>
            </li>
            <!--<li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>pembayaran/daftar_pembayaran" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt text-purple"></i>
              <p>
                Data Pembayaran
              </p>
            </a>
          </li>-->
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>siswa/siswa" class="nav-link">
                <i class="nav-icon far fa-address-card text-danger"></i>
                Data Siswa
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar text-success"></i>
                <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/pembayaran" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Pembayaran Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/rekapitulasi" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Laporan Rekapitulasi</p>
                  </a>
                </li>
              </ul>
            </li>


 <!--  KASIR KANTIN-->
 <?php } else if ($this->session->userdata("hak_akses") == 'kantin') {  ?>
            

            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>belanja_siswa" class="nav-link">
                <i class="nav-icon fas fa-cash-register text-success"></i>
                <p>
                  Belanja Siswa
                </p>
              </a>
            </li>
          
          
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar text-success"></i>
                <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/belanja_siswa" class="nav-link">
                    <i class="fas fa-angle-right nav-icon text-info"></i>
                    <p>Belanja Siswa</p>
                  </a>
                </li>
               
              </ul>
            </li>


            <!-- ADMIN KEUANGAN -->
          <?php } else { ?>
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'master') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'master') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-bill-alt text-info"></i>
                <p>
                  Master Pembayaran
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>master/pos_keuangan" class="nav-link">
                    <i class="fas fa-hand-holding-usd nav-icon text-danger"></i>
                    <p>Jenis Pembayaran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>master/jenis_pembayaran" class="nav-link">
                    <i class="fas fa-hands-usd nav-icon text-success"></i>
                    <p>Tarip Pembayaran</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>pembayaran/pembayaran_siswa" class="nav-link">
                <i class="nav-icon fas fa-cash-register text-success"></i>
                <p>
                  Pembayaran Siswa
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>tabungan_siswa" class="nav-link">
                <i class="nav-icon fas fa-cash-register text-success"></i>
                <p>
                  Tabungan Siswa
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>belanja_siswa" class="nav-link">
                <i class="nav-icon fas fa-cash-register text-warning"></i>
                <p>
                  Belanja Siswa
                </p>
              </a>
            </li>
            <!--<li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>pembayaran/daftar_pembayaran" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt text-danger"></i>
              <p>
                Data Pembayaran
              </p>
            </a>
          </li>-->
            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'jurnal') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'jurnal') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-books text-purple"></i>
                <p>
                  Jurnal Umum
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>jurnal/penerimaan" class="nav-link">
                    <i class="fas fa-download nav-icon text-success"></i>
                    <p>Pemasukan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>jurnal/pengeluaran" class="nav-link">
                    <i class="fas fa-upload nav-icon text-danger"></i>
                    <p>Pengeluaran</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php
            $hitung_request = $this->db->query("SELECT COUNT(*) as hitung FROM das_user WHERE open = 2")->row();
            ?>

            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'das') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'das') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-check-edit-alt text-orange"></i>
                <p>
                  Pembiayaan/RABS 
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-success right"><?php echo $hitung_request->hitung; ?></span> </p>
               
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_sumber_dana" class="nav-link">
                    <i class="fas fa-wallet nav-icon text-danger"></i>
                    <p>Sumber Dana Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_kategori" class="nav-link">
                    <i class="fas fa-badge-dollar nav-icon text-info"></i>
                    <p>Kategori Dana</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das" class="nav-link">
                    <i class="fas fa-comments-alt-dollar nav-icon text-success"></i>
                    <p>Kelola Dana <span class="badge badge-success right"><?php echo $hitung_request->hitung; ?></span></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>das/das_sisa" class="nav-link">
                    <i class="fas fa-sack-dollar nav-icon text-purple"></i>
                    <p>Sisa Dana</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header text-info">LAPORAN</li>
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>siswa/siswa" class="nav-link">
                <i class="nav-icon far fa-poll-people text-danger"></i>
                <p>
                  Data Siswa
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'active'; ?> treeview <?php if ($this->uri->segment(1) == 'laporan') echo 'menu-open'; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fad fa-print text-success"></i>
                <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/pembayaran" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Pembayaran Siswa</p>
                  </a>
                </li>
               
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/tabungan_siswa" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Tabungan Siswa</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/belanja_siswa" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Belanja Siswa</p>
                  </a>
                </li>

                
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/rekapitulasi" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Laporan Rekapitulasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/jurnal" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Laporan Jurnal Umum</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_bendahara" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Laporan RABS Bendahara</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_harian" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Laporan RABS Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Laporan Semua RABS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>laporan/das_sisa" class="nav-link">
                    <i class="fas fas fa-file-alt nav-icon text-navy"></i>
                    <p>Laporan Sisa RABS </p>
                  </a>
                </li>
              </ul>
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
            </li>
          <?php } ?>
          <?php if ($this->session->userdata("hak_akses") != 'admin') { ?>
            <li class="nav-header text-info">PENGATURAN</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book text-info"></i>
                <p>
                  Manual Book
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>password" class="nav-link">
                <i class="nav-icon fas fa-lock text-gray"></i>
                <p>
                  Ubah Password
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?php echo base_url(); ?>logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                <p> Logout </p>
              </a>
            </li>
          <?php } ?>
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