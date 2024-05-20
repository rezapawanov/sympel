<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pembayaran</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="<?=base_url('assets/js/terbilang.min.js')?>"></script>
</head>

<style>
    .line-header {
        border-bottom: 2px solid black;
    }

    .line-user {
        display: inline-block;
        text-align: center;
        border-bottom: 2px solid black;
        width: 200px;
    }

    .detail-bayar .col {
        font-size: 10px;
        font-family: 'Times New Roman', Times, serif;
    }

    .kop-kwitansi {
        font-size: 12px;
        font-family: 'Times New Roman', Times, serif;
    }

    table, p {
        font-size: 12px;
        font-family: 'Times New Roman', Times, serif;
    }
</style>

<body>
    <div class="row mt-5">
        <div class="col-8 ps-5">
            <div class="d-flex flex-row">
                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-3 d-inline-flex px-5">
                    <img src="<?=base_url('upload/logo-ashabulyamin.jpg')?>" alt="" width="125" height="125">
                </div>
                <div class="col-xl-8 col-lg-8 col-md-9 col-sm-9 text-center kop-kwitansi">
                    <p class="fw-bold" style="font-size: 20px;"><?=$nama_sekolah?></p>
                    <p class="fw-bold">Terakreditasi A</p>
                    <p class="lh-1">Jl. KH. Saleh No. 57 A Pabuaran Telp/Fax. 0263 - 267740 Cianjur 43213</p>
                    <p class="lh-1">E-mail: smk_hass@yahoo.co.id Website: www.smkhassashabulyamin.sch.id</p>
                </div>
            </div>
            <div class="line-header"></div>
            <p class="text-center fw-bold" style="font-size: 18px;">KWITANSI</p>

            <table>
                <tr>
                    <td style="width:200px">Telah Terima Dari</td>
                    <td>:</td>
                    <td class="fw-bold"><?=$nama_siswa?></td>
                </tr>
                <tr>
                    <td style="width:200px">Kelas</td>
                    <td>:</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td style="width:200px">Jumlah Uang</td>
                    <td>:</td>
                    <td>Rp. <?=number_format($nominal_harus_bayar)?></td>
                </tr>
                <tr>
                    <td style="width:200px">Bayar</td>
                    <td>:</td>
                    <td>Rp. <?=number_format($bayar)?></td>
                </tr>
                <tr>
                    <td style="width:200px">Terbilang</td>
                    <td>:</td>
                    <td class="terbilang"></td>
                </tr>
                <tr>
                    <td style="width:200px">Kembalian</td>
                    <td>:</td>
                    <td>Rp. <?=number_format($kembalian)?></td>
                </tr>
                <tr>
                    <td style="width:200px">Untuk Pembayaran</td>
                    <td>:</td>
                    <td><?=$notes?></td>
                </tr>
            </table>

            <div class="fw-bold ms-5 mb-3" style="font-size: 20px; font-family: 'Times New Roman', Times, serif;">جَزَاكُمُ اللهُ خَيْرًا كَثِيْرًا</div>

            <div class="row">
                <div class="col-6 text-center">
                    <br>
                    <p>Yang Menyerahkan</p>
                    <br><br>
                    <div class="text-center">
                        <div class="line-user"></div>
                    </div>
                </div>

                <div class="col-6 text-center">
                    <p>Cianjur, <?=date('d-m-Y H:i')?></p>
                    <p>Penerima</p>
                    <br><br>
                    <div class="text-center">
                        <div class="line-user"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-4 detail-bayar">
            <div class="row">
                <div class="col">- U D B</div>
                <div class="col text-right">Rp <?=number_format($uang_dana_bulanan)?></div>
            </div>

            <div class="row">
                <div class="col">- U D T</div>
                <div class="col text-right">Rp <?=number_format($uang_dana_tahunan)?></div>
            </div>
            
            <div class="row">
                <div class="col">- Kegiatan Kesiswaan</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- Prakerin / PKL</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- Kegiatan Perpisahan</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- UN / US</div>
                <div class="col text-right">-</div>
            </div>

            <div class="row">
                <div class="col">- UK / TO</div>
                <div class="col text-right">-</div>
            </div>

            <div class="row">
                <div class="col">- Attribut</div>
                <div class="col text-right">Rp <?=number_format($atribut_topi_dasi_dll)?></div>
            </div>

            <div class="row">
                <div class="col">- Pakaian Olahraga</div>
                <div class="col text-right">Rp <?=number_format($pakaian_olahraga)?></div>
            </div>

            <div class="row">
                <div class="col">- Pakaian Batik</div>
                <div class="col text-right">Rp <?=number_format($pakaian_batik)?></div>
            </div>

            <div class="row">
                <div class="col">- Pakaian Muslim</div>
                <div class="col text-right">Rp <?=number_format($pakaian_koko)?></div>
            </div>

            <div class="row">
                <div class="col">- Jaket Almamater</div>
                <div class="col text-right">Rp <?=number_format($jaket_almamater_sekolah)?></div>
            </div>

            <div class="row">
                <div class="col">- Al-quran, Sampul Rapor</div>
                <div class="col text-right">Rp <?=number_format($buku_sampul_rapor_sttb)?></div>
            </div>
            
            <div class="row">
                <div class="col">- Program keagamaan</div>
                <div class="col text-right">Rp <?=number_format($program_keagamaan)?></div>
            </div>

            <div class="row">
                <div class="col">- Kegiatan Perkemahan Terpadu</div>
                <div class="col text-right">Rp <?=number_format($kegiatan_perkemahan_terpadu)?></div>
            </div>

            <div class="row">
                <div class="col">- PTS / UTS</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- PAS / UAS</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- infaq Bangunan</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- Milad / Qurban</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- Study Tour</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- Mutasi</div>
                <div class="col text-right">-</div>
            </div>
            
            <div class="row">
                <div class="col">- Tunggakan X, XI</div>
                <div class="col text-right">-</div>
            </div>
               
            </table>
        </div>
    </div>

    <script>
        document.querySelector('.terbilang').innerHTML = terbilang(<?=$bayar?>) + ` Rupiah`;
    </script>

</body>
</html>