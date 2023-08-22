<?php
$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
?>
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<!-- /.content -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <?php echo "Copyright © " . "2014 -" . (int) date('Y'); ?> PPDB | <?php echo $sekolah->nama_sekolah; ?>
</footer>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
  $("input").attr("autocomplete", "off");
</script>

<script>
    $(document).ready(function() {
        $(".tglcalendar").datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd-mm-yyyy"
        });
    });
</script>
</body>

</html>