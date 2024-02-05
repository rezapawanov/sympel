<!-- Content Wrapper. Contains page content -->
<?php $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row(); ?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInDown">
        <div class="container-fluid">
            <div class="row mb-2" id="cetak">
                <div class="col-sm-12">
                    <div class="card">
                        <center>
                            <h1 class="m-0 text-dark mt-2" style="text-shadow: 2px 2px 4px #17a2b8;">
                                <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/master/upload/' . $sekolah->logo; ?>"
                                    alt="Logo" class="brand-image img-rounded " style="width:50px;height:50px;">
                                <br>DATA CALON PESERTA DIDIK BARU<br>
                                <?php echo $nama_sekolah ?>
                            </h1>
                            <?php echo $alamat_sekolah ?>
                        </center>
                        <hr>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-info card-outline">
                                        <div class="card-header">
                                            <i class="card-title"></i>
                                            <center><b>FOTO CALON SISWA</b></center>
                                        </div>
                                        <div class="row ml-1 mr-1">
                                            <div class="card-body">
                                                <center>
                                                    <?php
                                                    if (!empty($foto)) {

                                                        echo '<img class="img-rounded elevation-2" style="width:180px;height:250px;" src="' . base_url() . 'upload/' . $foto . '">';
                                                    }
                                                    ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DATA KELAS -->
                                <div class="col-md-9">
                                    <div class="card card-info card-outline">
                                        <div class="card-header">
                                            <i class="card-title"></i>
                                            <center><b>DATA CALON SISWA</b></center>
                                        </div>
                                        <table class="table table-striped">
                                            <tr>
                                                <td style="width:200px;font-weight:bold;">No Pendaftaran</td>
                                                <td style="width:10px;">:</td>
                                                <td class="text-uppercase" style="font-weight:bold;">
                                                    <?php echo $no_pendaftaran; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Jenis Pendaftaran</td>
                                                <td>:</td>
                                                <td>
                                                    <?php echo $jenis_pendaftaran; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Jalur Pendaftaran</td>
                                                <td>:</td>
                                                <td>
                                                    <?php echo $jalur_pendaftaran; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Nama Siswa</td>
                                                <td>:</td>
                                                <td>
                                                    <?php echo $nama_siswa; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Jenis Kelamin</td>
                                                <td>:</td>
                                                <td>
                                                    <?php echo $jenis_kelamin; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Tempat , Tanggal Lahir
                                                <td>:</td>
                                                <td>
                                                    <?php echo $tempat_lahir . ', ' . date("d-m-Y", strtotime($tanggal_lahir)); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;">Agama</td>
                                                <td>:</td>
                                                <td>
                                                    <?php echo $agama; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card card-danger card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i
                                                class="fas fa-ballot"></i> DATA LENGKAP CALON SISWA BARU <b>[
                                                <?php echo $nama_siswa; ?> ]
                                            </b></h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-striped table-sm">
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight:bold;">NIK</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $nik; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Hobi</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $hobi; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Cita-cita</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $cita_cita; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Alamat</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $alamat; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">RT</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $rt; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">RW</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $rw; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Dusun</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $dusun; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Kelurahan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $kelurahan; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Kabupaten</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $kabupaten; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Kode Pos</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $kode_pos; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Tempat Tinggal</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $tempat_tinggal; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Transportasi</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $transportasi; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">No Telp</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $no_hp; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Email</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $email; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Kewarganegaraan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $kewarganegaraan; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Tinggi Badan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $tinggi_badan . 'cm'; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Berat Badan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $berat_badan . 'kg'; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Waktu Tempuh</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $waktu_tempuh_ke_sekolah . 'Menit'; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Jumlah Saudara</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $jumlah_saudara . 'Orang'; ?>
                                                    </td>
                                                </tr>
                                                <tr border="0">
                                                    <td colspan="3" class="text-danger text-center bg-danger"><b>DATA
                                                            SEKOLAH ASAL</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Nama Sekolah Asal</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $asal_sekolah; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Alamat Sekolah Asal</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $alamat_sekolah_asal; ?>
                                                    </td>
                                                </tr>
                                                <tr border="0">
                                                    <td colspan="3" class="text-danger text-center bg-navy"><b>DATA
                                                            AYAH</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Nama Ayah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $nama_ayah; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Tahun Lahir Ayah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $tahun_lahir_ayah; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Pendidikan Ayah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $pendidikan_ayah; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Pekerjaan Ayah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $pekerjaan_ayah; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Penghasilan Ayah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $penghasilan_ayah; ?>
                                                    </td>
                                                </tr>
                                                <tr border="0">
                                                    <td colspan="3" class="text-danger text-center bg-info"><b>DATA
                                                            IBU</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Nama Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $nama_ibu; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Tahun Lahir Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $tahun_lahir_ibu; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Pendidikan Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $pendidikan_ibu; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Pekerjaan Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $pekerjaan_ibu; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Penghasilan Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $penghasilan_ibu; ?>
                                                    </td>
                                                </tr>
                                                <tr border="0">
                                                    <td colspan="3" class="text-danger text-center bg-teal"><b>DATA
                                                            WALI</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Nama Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $nama_wali; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Tahun Lahir Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $tahun_lahir_wali; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Pendidikan Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $pendidikan_wali; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Pekerjaan Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $pekerjaan_wali; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Penghasilan Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo $penghasilan_wali; ?>
                                                    </td>
                                                </tr>
                                                <tr border="0">
                                                    <td colspan="3" class="text-danger text-center bg-purple"><b>STATUS
                                                            CALON SISWA</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">Status Pembayaran Registrasi Calon
                                                        Siswa </td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($status == '1') {
                                                            echo 'Dikonfirmasi (Berhasil Melakukan Pembayaran';
                                                        } else if ($status == '0') {
                                                            echo 'Menunggu Konfirmasi Pembayaran';
                                                        } else {
                                                            echo 'Ditolak (Gagal Melakukan Pembayaran)';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Nominal Harus Dibayar</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar"
                                                            value="<?= (isset($nominal_harus_bayar)) ? str_replace(',', '.', number_format($nominal_harus_bayar)) : 0 ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Uang Dana Bulanan (UDB Bulanan)</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Uang Dana Tahunan (UDT Pertahun)</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Atribut, Topi, Dasi, Sabuk, Dll</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Pakaian Olahraga</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Pakaian Batik</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Pakaian Koko/Muslim-Muslimah</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Program Keagamaan (Pembelian Al-Quran
                                                        & lainnya)</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Jaket Almamater Sekolah</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Buku Sampul / Raport STTB Hard Cover
                                                    </td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Kegiatan Perkemahan Terpadu (Kepramukaan & Keagamaan)</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control"
                                                            name="nominal_harus_dibayar" value="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Terbayar</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" name="bayar"
                                                            value="<?= (isset($total_bayar)) ? str_replace(',', '.', number_format($total_bayar)) : 0 ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold;">Sisa Pembayaran</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" name="sisa_pembayaran"
                                                            readonly
                                                            value="<?= (isset($sisa)) ? str_replace(',', '.', number_format($sisa)) : 0 ?>">
                                                    </td>
                                                </tr>
                                                <?php if ($status == '0') { ?>
                                                <tfoot>
                                                    <tr>
                                                        <td>
                                                            <div class="btn-group btn-group-sm float-right">
                                                                <!-- <a class="btn btn-danger" href="<?php // echo base_url() . 'siswa/siswa_terima/' . $id_ppdb; ?>"><i class="fa fa-thumbs-down"> </i> Gagal Melakukan Pembayaran</a>
                                                  <a class="btn btn-success" href="<?php // echo base_url() . 'siswa/siswa_terima/' . $id_ppdb; ?>"><i class="fa fa-thumbs-up"> </i> Konfirmasi Pembayaran</a> -->
                                                                <a class="btn btn-danger" onclick="simpanPembayaran()"><i
                                                                        class="fa fa-thumbs-down"> </i> Gagal Melakukan
                                                                    Pembayaran</a>
                                                                <a class="btn btn-success" onclick="simpanPembayaran()"><i
                                                                        class="fa fa-thumbs-up"> </i> Konfirmasi
                                                                    Pembayaran</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card-footer mb-2">
            <div class="btn-group btn-group-sm float-right">
                <a class="btn btn-danger float-right" href="<?php echo base_url() . 'siswa'; ?>"><i class="fa fa-undo">
                    </i> Kembali</a>
                <button class="btn bg-navy float-right" onclick="printDiv('cetak')"><i class="fa fa-print"
                        target="_blank"> </i> Cetak</button>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

</div>


<script>
    function simpanPembayaran() {
        let id_ppdb = <?= $id_ppdb ?>

        $.ajax({
            type: "POST",
            url: "<?= base_url('siswa/siswa_terima') ?>",
            data: {
                id_ppdb: id_ppdb,
                nominal_harus_dibayar: $('input[name="nominal_harus_dibayar"]').val(),
                bayar: $('input[name="bayar"]').val(),
            },
            dataType: "JSON",
            success: function (response) {
                if (response.success == true) {
                    window.location.href = '<?= base_url('siswa/siswa_detail/') ?>' + id_ppdb;
                }
            }
        });
    } 
</script>