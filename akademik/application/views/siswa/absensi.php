<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0 text-dark"><i class="far fa-book-medical nav-icon text-info"></i> <?php echo $judul; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/dokumen"><?php echo $judul; ?></a></li>
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
                <div class="animated fadeInLeft col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-ballot"></i> Detail <?php echo $judul; ?></h3>
                        </div>

                        <div class="tab-content p-3">
                            <table class="table table-bordered" id="empTable">
                                <thead>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Absen</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body-list">
                                    
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    
    </section>
</div>

<script>
    var BASE_URL = '<?=base_url()?>';
    // $.ajax({
    //     type: "POST",
    //     url: BASE_URL+"siswa/get_absensi",
    //     data: {},
    //     dataType: "JSON",
    //     success: function (response) {
            
    //     }
    // });

    $(document).ready(function(){
        $('#empTable').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url':BASE_URL+"siswa/get_absensi"
            },
            'columns': [
                { data: 'id_kelas' },
                { data: 'tahun_ajaran' },
                { data: 'keterangan' },
                { data: 'waktu_absen' },
            ]
        });
    });
</script>