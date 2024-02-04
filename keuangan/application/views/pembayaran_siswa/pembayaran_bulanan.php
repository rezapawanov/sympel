<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- data tables -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;">
                    <i class="nav-icon fas fa-cash-register text-success"></i> <?php echo $judul; ?></h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>master/jenis_pembayaran"><?php echo $judul; ?></a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- /.content-header -->
    <div class="card card-info mx-2">
        <div class="card-header">
            <h3 class="card-title"><b><i class="nav-icon fas fa-cash-register"></i> TRANSAKSI PEMBAYARAN SISWA</b></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <div class="card-body">
            <section class="content">
                <div class="row">
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="nis">Jenis Pembayaran</label>
                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control form-control-lg"></select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="nis">No Induk Siswa</label>
                            <input type="text" id="nis" name="nis" class="form-control" value="<?=$siswa['nis']?>" readonly>
                            <input type="hidden" id="id_siswa" name="id_siswa" value="<?=$siswa['id_siswa']?>">
                            <input type="hidden" id="id_kelas" name="id_kelas" value="<?=$siswa['id_kelas']?>">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="<?=$siswa['nama_siswa']?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="border rounded p-3 mt-3">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tagihan">Tagihan</label>
                                <input class="form-control" id="tagihan" name="tagihan" type="number" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" id="bulan" class="form-control form-control-lg"></select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <input class="form-control" id="diskon" name="diskon" type="number">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                <input class="form-control" id="jumlah_bayar" name="jumlah_bayar" type="number">
                            </div>
                        </div>

                    </div>
                        
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" id="simpan">
                        Simpan
                    </button>
                </div>
                

                <!-- CONTENT HISTORY PEMBAYARAN UANG SPP -->
                <div class="border rounded p-3 mt-3">
                    <table class="table table-bordered" id="myTable">
                        <thead class="bg-primary">
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Tagihan</th>
                                <th>Bayar</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-content">
                            
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        var table = new DataTable('#myTable');

        $('select[name="bulan"]').select2();
        $('select[name="jenis_pembayaran"]').select2();

        let month = ['Januari','Februari','Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];
        $('#bulan').append(`<option value="">Pilih Bulan</option>`);
        $.each(month, function (i, val) { 
             $('#bulan').append(`<option value="${val}">${val}</option>`);
        });

        // GET ALL JENIS PEMBAYARAN
        $.ajax({
            type: "GET",
            url: BASE_URL+"pembayaran/getJenisPembayaran",
            data: {},
            dataType: "JSON",
            success: function (response) {
                $('select[name="jenis_pembayaran"]').append(`<option value="">Pilih Pembayaran</option>`);
                $.each(response.jenis_pembayaran, function (i, val) {
                    $('select[name="jenis_pembayaran"]').append(`<option value="${val.id_jenis_pembayaran}">${val.nama_pos_keuangan} - ${val.tipe_pembayaran} - ${val.tahun_ajaran}</option>`);
                });
            }
        });

        // jenis_pembayaran ON CHAGE
        $('#jenis_pembayaran').on('change', function(e){
            let jenisPembayaran = e.target.value;
            $.ajax({
                type: "GET",
                url: BASE_URL+"pembayaran/getJenisPembayaran",
                data: {
                    id: jenisPembayaran,
                    id_siswa: $('#id_siswa').val()
                },
                dataType: "JSON",
                success: function (response) {
                   
                    $('#tagihan').val(parseInt(response.jenis_pembayaran.tagihan));
                    $('#diskon').val(0);
                    $('#jumlah_bayar').val(parseInt(response.jenis_pembayaran.tagihan));

                    $('#table-content').html('');
                    $.each(response.pembayaran_bulanan, function (i, val) { 
                        $('#table-content').append(`<tr>
                            <td>${val.nama_pos_keuangan}</td>
                            <td>${val.bulan}</td>
                            <td>${val.tagihan}</td>
                            <td>${val.bayar}</td>
                            <td>${val.tanggal}</td>
                            <td></td>
                        </tr>`);
                    });
                }
            });
        });
    });

    $('#diskon').on('keyup', function(){
        let diskon = $('#diskon').val();
        let tagihan = $('#tagihan').val();
        $('#jumlah_bayar').val(tagihan-diskon);
    });

    $('#simpan').on('click', function(e){
        $.ajax({
            type: "POST",
            url: BASE_URL+"pembayaran/pembayaran_bulanan",
            data: {
                type: 'simpan',
                jumlah_bayar: $('#jumlah_bayar').val(),
                tagihan: $('#tagihan').val(),
                id_siswa: $('#id_siswa').val(),
                id_kelas: $('#id_kelas').val(),
                id_jenis_pembayaran: $('#jenis_pembayaran').val(),
                bulan: $('#bulan').val()
            },
            dataType: "JSON",
            success: function (response) {
                if(response.success == true){
                    Swal.fire(
                        'Sukses!',
                        `${response.message}`,
                        'success'
                    )
                    // set id_pembayaran
                    $('#id_pembayaran').val(response.id_pembayaran);

                    // sembunyikan button simpan modal
                    $('#simpan').addClass('d-none');
                    $('#cetak').removeClass('d-none');
                }else{
                    Swal.fire(
                        'Gagal!',
                        `${response.message}`,
                        'error'
                    )
                }
            }
        });
    });

    // $('#cetak').on('click', function(e){
    //     window.location.href = BASE_URL+'pembayaran/cetak_bukti_pembayaran_uang_pangkal?id_pembayaran='+$('#id_pembayaran').val();
    // });

</script>