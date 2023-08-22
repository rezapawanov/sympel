<?php
$tahun_ajaran = $this->db->query("SELECT tahun_ajaran, semester FROM mst_tahun_ajaran WHERE aktif_tahun_ajaran = 1")->row();

$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();

?>
 <footer class="main-footer">
     <?php echo "Copyright © " ."2021 -". (int)date('Y');?> <a href="#" target="_blank"><b><?php echo $sekolah->nama_sekolah; ?> </b></a>.All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- PAGE PLUGINS -->
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>

<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<?php if($this->uri->segment(2) == 'tarif_pembayaran_kelas' || $this->uri->segment(2) == 'tarif_pembayaran_siswa' || $this->uri->segment(2) == 'pembayaran_siswa' || $this->uri->segment(2) == 'penerimaan_tambah' || $this->uri->segment(2) == 'penerimaan_edit' || $this->uri->segment(2) == 'pengeluaran_edit' || $this->uri->segment(2) == 'pengeluaran_tambah' ) { ?>
<script src="<?php echo base_url(); ?>asset/jquery.inputmask.bundle.js"></script>
<?php } else { ?>
<script src="<?php echo base_url(); ?>asset/plugins/input-mask/jquery.inputmask.js"></script>
<?php } ?>
<script>
  $(function () {
    $('#datatb').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>
<script>
$(document).ready(function(){
  $(".tgl").inputmask("99-99-9999");  
  $(".tahun_ajaran").inputmask("9999/9999");  
  $(".jam").inputmask("99:99");  
  $('.select2').select2();
  $('.rupiah').inputmask('decimal', {allowMinus:false, autoGroup: true, groupSeparator: '.', rightAlign: false, autoUnmask: true, removeMaskOnSubmit: true});
  $(".tglcalendar").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "dd-mm-yyyy"
  });  
});
</script>

<script>
        function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
        }
</script>

<script type="text/javascript">
    $("input").attr("autocomplete", "off");
</script>

</body>
</html>
