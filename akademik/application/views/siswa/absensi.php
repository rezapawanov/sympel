<style>#empTable_filter{display: none;}</style>

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

                        <div class="tab-content p-3" style="overflow-x: auto;">
                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Tanggal Awal</label>
                                        <div class="col-sm-8">
                                            <input class="form-control form-control-sm" type="date" name="start" placeholder="Masukan Tanggal Awal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Tanggal Akhir</label>
                                        <div class="col-sm-8">
                                            <input class="form-control form-control-sm" type="date" name="end" placeholder="Masukan Tanggal Awal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                                        <div class="col-sm-6">
                                            <select class="form-control form-control-sm" name="keterangan">
                                                <option value="">ALL</option>
                                                <option value="MASUK">MASUK</option>
                                                <option value="IZIN">IZIN</option>
                                                <option value="SAKIT">SAKIT</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-sm btn-primary" id="cari">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
    var id_siswa = '<?=$id_siswa?>';

    $(document).ready(function(){
        var table = $('#empTable').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url':BASE_URL+"siswa/get_absensi",
                data: {
                    id_siswa: id_siswa
                }
            },
            'columns': [
                { 
                    data: 'nama_kelas' 
                },
                { 
                    data: 'tahun_ajaran' 
                },
                { 
                    data: 'keterangan' 
                },
                { 
                    data: 'waktu_absen',
                    class: 'text-center',
                    render(data, type, row, meta){
                        return moment(data).format('DD MMM YYYY, HH:mm');
                    }
                },
            ]
        });

        $('#cari').on('click', function(){
            start = $('input[name="start"]').val();
            end = $('input[name="end"]').val();
            keterangan = $('select[name="keterangan"]').val();

            table.column(0).search(start).draw();
            table.column(1).search(end).draw();
            table.column(2).search(keterangan).draw();
        });
    });
</script>