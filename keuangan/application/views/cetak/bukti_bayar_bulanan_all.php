 <?php
 $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pembayaran</title>

    <style>
        @media print {

            html,
            body {

                display: block;
                font-family: "Tahoma";
                margin: 0;
                font-size: 12px;
            }

            table {
                font-size: 12px;
                width: 100%;
                letter-spacing: 1px;
            }

            .table {
                width: 100%;
                border: solid #000 !important;
                border-width: 1px 1px 1px 1px !important;
            }

            .table td,
            .table th {
                font-weight: 100;
                /* border:solid #000 !important; */
                border-width: 0 1px 1px 0 !important;
                padding: 3px;
            }

            .table td.tf {
                font-weight: bold;
                border: solid #000 !important;
                border-width: 1px 0 0 0 !important;
            }

            .table th.th {
                font-weight: bold;
                border: solid #000 !important;
                border-width: 0 0 1px 0 !important;
            }


            @page {
                21.59cm 13.97cm;
            }
        }
    </style>

</head>

<body>
    <div style="float:left;width:450px;">
        <?php
        if (empty($logo)) {
            $logo = "noimage.jpg";
        }
        ?>
        <img style="float:left;width:80px;height:80px;" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/asispanel/upload/'.$sekolah->logo; ?>">
        <h3 style="margin:0;"><?php echo $nama_sekolah; ?></h3>
        <p style="margin:0;"><?php echo $alamat; ?> </p>
        <p style="margin:0;">Telp. <?php echo $no_telepon;  ?></p>
        <p style="margin:0;">E-mail : <?php echo $email; ?></p>
    </div>
    <div style="float:right;">
        <table>
            <tr>
                <td>Tanggal </td>
                <td><?php echo date("d-m-Y"); ?></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td><?php echo $nis; ?></td>
            </tr>
            <tr>
                <td>Nama </td>
                <td><?php echo $nama_siswa; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><?php echo $nama_kelas; ?></td>
            </tr>

        </table>


    </div>
    <div style="clear:both"></div>

    <br>


    <div style="float:left;">
        <?php

        function bulan_kode($nama_bulan){
            $dataarr = array (
                'Januari' =>   '01',
                'Februari' =>   '02',
                'Maret' =>   '03',
                'April' =>   '04',
                'Mei' =>   '05',
                'Juni' =>   '06',
                'Juli' =>   '07',
                'Agustus' =>   '08',
                'September' =>   '09',
                'Oktober' =>   '10',
                'November' =>   '11',
                'Desember' =>   '12'
            );
            return $dataarr[$nama_bulan];
        }

        $pembayaran_bulananx = $this->db->query("SELECT bulan FROM pembayaran_bulanan WHERE id_pembayaran_bulanan IN($id_pembayaran_bulanan)");
        foreach($pembayaran_bulananx->result_array() as $databulan) {
            $data[] = bulan_kode($databulan['bulan']);
        }
        $databulan = implode(".",$data);
        ?>
        <table>

            <tr>
                <td style="font-size:14px;">BUKTI PEMBAYARAN : <b>INV.<?php echo date("y").'.'.$databulan.'.'.$id_siswa; ?></b></td>
            </tr>
        </table>
    </div>


    <div style="clear:both"></div>
    <br>
    <table class="table" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th class="th" style="text-align:left;">No</th>
                <th class="th" style="text-align:left;">Pembayaran</th>
                <th class="th" style="text-align:left;">Total Tagihan</th>
                <th class="th">Jumlah Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total_bayar = 0;
            $pembayaran_bulanan = $this->db->query("SELECT bulan,nama_pos_keuangan,tahun_ajaran,tagihan,bayar,tanggal,tahun_ajaran FROM pembayaran_bulanan 
                    INNER JOIN mst_jenis_pembayaran ON pembayaran_bulanan.id_jenis_pembayaran = mst_jenis_pembayaran.id_jenis_pembayaran 
                    INNER JOIN mst_pos_keuangan ON mst_jenis_pembayaran.id_pos_keuangan = mst_pos_keuangan.id_pos_keuangan  WHERE id_pembayaran_bulanan IN($id_pembayaran_bulanan)");

            foreach ($pembayaran_bulanan->result_array() as $data) {
                $total_bayar += $data['bayar'];
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran'] . ' - ' . $data['bulan']; ?></td>
                    <td>Rp <?php echo number_format($data['tagihan']); ?></td>
                    <td style="text-align:right;">Rp <?php echo number_format($data['bayar']); ?></td>
                </tr>
                <?php $no++;
            }  ?>

            <tr>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf" style="text-align:left;">Total Pembayaran</td>
                <td class="tf" style="text-align:right;">Rp <?php echo number_format($total_bayar); ?></td>
            </tr>
            <tr>
                <td class="tf" colspan="4" style="text-align:right;font-style:italic;"><?php echo terbilang($total_bayar); ?> Rupiah</td>
            </tr>
        </tbody>
    </table>


    <br><br>
    <div style="float:left;width:350px;">
        <p style="margin:0;">Ttd<p><br><br><br><br>
                <p style="margin:0;text-transform:uppercase;"></p>
                <p style="margin:0;">(<?php echo $nama_siswa; ?> )</p>
    </div>

    <div style="float:left;width:350px;">
        <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?> </p>
        <p style="margin:0;">Mengetahui</p>
        <br><br><br><br><br>
        <p style="margin:0;text-transform:uppercase;"></p>
        <p style="margin:0;">(<?php echo $this->session->userdata("nama"); ?>)</p>
    </div>



</body>

</html>

<script>
    window.print();
    window.onafterprint = function() {
        document.location.href = "pembayaran_siswa_detail/<?php echo $id_jenis_pembayaran; ?>/<?php echo $id_siswa; ?>";
    }
</script>