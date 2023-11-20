<?php
$tahun_ajaran = $this->db->where('aktif_tahun_ajaran', 1)->get('mst_tahun_ajaran')->row()->id_tahun_ajaran;
$id_guru = $this->session->userdata("id");
$cek = $this->db->query("SELECT nama_kelas FROM mst_walikelas INNER JOIN mst_kelas ON mst_walikelas.id_kelas = mst_kelas.id_kelas WHERE id_guru = $id_guru");
if($cek->num_rows() > 0) {
  $d = $cek->row();
  $walikelas = 'Wali Kelas : '.$d->nama_kelas;
} else {
  $walikelas = '';
}
?>
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
      <span class="brand-text font-weight-light" style="text-shadow: 2px 2px 4px #827e7e;"><b>AKADEMIK</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php if($this->session->userdata("hak_akses") == 'guru' || $this->session->userdata("hak_akses") == 'gurubk') { 
          $id = $this->session->userdata("id");
          $get_foto = $this->db->query("SELECT foto FROM mst_guru WHERE id_guru = '$id'")->row();
          ?>
        <div class="image">
          <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/akademik/upload/guru/' . $get_foto->foto; ?>" class="img-rounded elevation-2" style="width:60px;height:60px;" alt="User Image">
        </div>
         <?php } else { ?>
          <div class="image animated fadeInLeft">
          <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/upload/user.jpg'; ?>" class="img-rounded elevation-2" style="width:60px;height:70px;" alt="User Image">
        </div>
        <?php } ?>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata("nama"); ?></a>
          <span class="badge badge-info right "><?php echo ucfirst($this->session->userdata("hak_akses")); ?></span>
          <a href="<?php echo base_url(); ?>logout"><span class="badge badge-danger right ">Logout <i class="nav-icon fas fa-sign-out-alt"></i></span></a>
        </div>

      </div>
      <!-- Tanggal dan Jam -->
      <center>
      <span class="right btn badge badge-danger btn-flat animated fadeInDown"><?php echo $hari."&nbsp;" ; echo date('d'). "&nbsp;&nbsp;"; echo $bln."&nbsp;" ; echo date('Y'); ?></span>
      <button class='btn  btn-flat bg-success badge badge-danger animated fadeInUp'><span class="" id="clock"></button></center>
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
          <li class="nav-header">MENU NAVIGASI</li>
        
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>jadwal_pelajaran/jadwal_pelajaran/<?=$tahun_ajaran?>" class="nav-link">
            <i class="fa fa-calendar"></i>
            <p>Jadwal Pelajaran</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>Absen/guru" class="nav-link">
            <i class="fa fa-calendar"></i>
            <p>Absensi</p>
          </a>
        </li>

        <li class="nav-item has-treeview  <?php if($this->uri->segment(1) == 'nilai') echo 'active'; ?> treeview <?php if($this->uri->segment(1) == 'nilai') echo 'menu-open'; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-open text-info"></i>
            <p>Input Nilai Siswa <i class="fas fa-angle-left right"></i></p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>nilai/nilai_harian" class="nav-link">
                <i class="fas fa-angle-right nav-icon text-info"></i>
                <p>Nilai Harian</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>nilai/nilai_uts" class="nav-link">
                <i class="fas fa-angle-right nav-icon text-info"></i>
                <p>Nilai UTS</p>
              </a>
            </li>
          </ul>
            <?php if($cek->num_rows() > 0) { ?>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>nilai/nilai_prestasi" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-info"></i>
                  <p>Nilai Prestasi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>nilai/nilai_ekstrakulikuler" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-info"></i>
                  <p>Nilai Ekstrakulikuler</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>nilai/nilai_capaian_hasil_belajar" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-info"></i>
                  <p>Nilai Capaian Hasil Belajar</p>
                </a>
              </li>
            </ul>
            <?php } ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>nilai/nilai_raport" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-info"></i>
                  <p>Nilai Raport</p>
                </a>
              </li>
            </ul>
        </li>


      <?php if($cek->num_rows() > 0) { ?>
        <li class="nav-item has-treeview  <?php if($this->uri->segment(1) == 'cetak') echo 'active'; ?> treeview <?php if($this->uri->segment(1) == 'cetak') echo 'menu-open'; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open text-info"></i>
              <p>
                Cetak Raport
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>cetak/raport" class="nav-link">
                  <i class="fas fa-angle-right nav-icon text-info"></i>
                  <p> Raport</p>
                </a>
              </li>
            </ul>
        </li>
      <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
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

  <script>
    $(document).ready(function(){
      if($('input[name=username]').val().trim()=='') $('input[name=username]').focus();
      else $('input[name=password]').focus();

      $("#show_password").change(function(event) {
        if($(this).is(':checked')){
          $("input[name=password]").prop('type', "text");
        }else{
          $("input[name=password]").prop('type', "password");
        }
      });
    });
  </script>