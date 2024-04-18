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
</style>

<body>
    <div class="row">
        <div class="col-8 ps-5">
            <div class="d-flex flex-row">
                <div class="d-inline-flex px-5">
                    Logo
                </div>
                <div class="text-center">
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
                    <td class="fw-bold">PUTRI</td>
                </tr>
                <tr>
                    <td style="width:200px">Kelas</td>
                    <td>:</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td style="width:200px">Jumlah Uang</td>
                    <td>:</td>
                    <td>Rp. 300.000</td>
                </tr>
                <tr>
                    <td style="width:200px">Bayar</td>
                    <td>:</td>
                    <td>Rp. 300.000</td>
                </tr>
                <tr>
                    <td style="width:200px">Terbilang</td>
                    <td>:</td>
                    <td class="terbilang"></td>
                </tr>
                <tr>
                    <td style="width:200px">Kembalian</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width:200px">Untuk Pembayaran</td>
                    <td>:</td>
                    <td>Biaya Penyelenggaraan Pendidikan Bulan Desember 2022</td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            detail pembayaran
            detail pembayaran
            detail pembayaran
            detail pembayaran
            detail pembayaran
        </div>
    </div>

    <script>
        document.querySelector('.terbilang').innerHTML = terbilang(150000) + ` Rupiah`;
    </script>

</body>
</html>