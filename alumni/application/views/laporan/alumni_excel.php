<?php
header("Content-type: application/vnd-ms-excel");
$judul = "LAPORAN_DATA_ALUMNI.xls";
header("Content-Disposition: attachment; filename=$judul");
?>
<h2>DATA ALUMNI
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
            <th>Aktivitas</th>
            <th>Apakah Anda pernah bekerja setelah lulus dari SMK Farmasi Cendikia Farma Husada</th>
            <th>Setelah lulus, berapa lama waktu yang Anda butuhkan untuk mendapatkan pekerjaan</th>
            <th>Bidang pekerjaan apa yang Anda tekuni saat ini</th>
            <th>Bagaimana tingkat kemudahan Anda dalam mendapatkan pekerjaan</th>
            <th>Darimana Anda mendapatkan informasi lowongan pekerjaaan</th>
            <th>Berapa jumlah gaji yang Anda terima sebagai lulusan SMK Farmasi Cendikia Farma Husada</th>
            <th>Dimana tempat Anda pernah bekerja atau tempat Anda bekerja saat ini</th>
            <th>Alamat Perusahaan</th>
            <th>Kabupaten / Kota Perusahaan</th>
            <th>Sejak kapan Anda bekerja pada Perusahaan tersebut</th>
            <th>Sampai Dengan</th>
            <th>Sebutkan posisi jabatan Anda pada Perusahaan tersebut</th>
            <th>Aktivitas Perkuliahan</th>
            <th>Status Perguruan Tinggi</th>
            <th>Nama Perguruan Tinggi</th>
            <th>Jenjang Pendidikan</th>
            <th>Jurusan/Program Studi</th>
            <th>Jalur Masuk Perguruan Tinggi</th>
            <th>>Mulai Kuliah</th>
            <th>Biaya Per Semester</th>
            <th>Status Kuilah</th>
            <th>Nama Perusahaan (Wirausaha)</th>
            <th>Jenis Usaha</th>
            <th>Mulai Usaha</th>
            <th>Status Wirausaha</th>
            <th>Bagaimana kesesuaian Pengetahuan dan Keterampilan yang Anda peroleh dari SMK Farmasi Cendikia Farma Husada dengan tuntutan pekerjaan Anda</th>
            <th>Bidang Kompetensi apa yang sudah diberikan oleh SMK Farmasi Cendikia Farma Husada dalam menunjang kinerja Anda dalam bekerja</th>
            <th>Dalam Kompetensi Bidang Kefarmasian, Materi apa saja yang sangat menunjang kinerja Anda di dunia kerja</th>
            <th>Dalam Kompetensi Bidang Pengetahuan Umum, Materi apa saja yang sangat menunjang kinerja Anda di dunia kerja</th>
            <th>Menurut Anda, Materi atau bidang kompetensi apa yang harus ditingkatkan SMK Farmasi Cendikia Farma Husada agar lulusannya lebih siap di dunia kerja</th>
            <th>Apakah SMK Farmasi Cendikia Farma Husada memberikan Informasi lowongan pekerjaan yang mudah diakses</th>
            <th>Apa saran Anda terhadap SMK Farmasi Cendikia Farma Husada agar menjadi lebih baik</th>
            <th>Sebutkan 3 kata Kesan Anda untuk SMK Farmasi Cendikia Farma Husada</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($buku->result_array() as $data) { ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['jenis_kelamin']; ?></td>
            <td><?php echo $data['hp']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['angkatan']; ?></td>
            <td><?php echo $data['tahun_lulus']; ?></td>
            <td><?php echo $data['aktivitas_1'] . ', ' . $data['aktivitas_2'] . ', ' . $data['aktivitas_3'] . ', ' . $data['aktivitas_4']; ?></td>
            <td><?php echo $data['pernah_bekerja']; ?></td>
            <td><?php echo $data['lama_dapat_kerja']; ?></td>
            <td><?php echo $data['bidang_pekerjaan']; ?></td>
            <td><?php echo $data['tingkat_kemudahan']; ?></td>
            <td><?php echo $data['info_kerja_1'] . ', ' . $data['info_kerja_2'] . ', ' . $data['info_kerja_3'] . ', ' . $data['info_kerja_4']. ', ' . $data['info_kerja_5']; ?></td>
            <td><?php echo $data['jumlah_gaji']; ?></td>
            <td><?php echo $data['nama_tempat_kerja']; ?></td>
            <td><?php echo $data['alamat_perusahaan']; ?></td>
            <td><?php echo $data['kabupaten_perusahaan']; ?></td>
            <td><?php echo $data['tanggal_mulai_kerja']; ?></td>
            <td><?php echo $data['tanggal_selesai_kerja']; ?></td>
            <td><?php echo $data['jabatan']; ?></td>
            <td><?php echo $data['aktivitas_kuliah']; ?></td>
            <td><?php echo $data['status_perguruan_tinggi']; ?></td>
            <td><?php echo $data['nama_perguruan_tinggi']; ?></td>
            <td><?php echo $data['jenjang_pendidikan']; ?></td>
            <td><?php echo $data['program_studi']; ?></td>
            <td><?php echo $data['jalur_masuk']; ?></td>
            <td><?php echo $data['mulai_kuliah']; ?></td>
            <td><?php echo $data['biaya_semester']; ?></td>
            <td><?php echo $data['status_kuliah']; ?></td>
            <td><?php echo $data['nama_perusahaan_wirausaha']; ?></td>
            <td><?php echo $data['jenis_usaha_1'] . ', ' . $data['jenis_usaha_2'] . ', ' . $data['jenis_usaha_3'] . ', ' . $data['jenis_usaha_4']; ?></td>
            <td><?php echo $data['mulai_usaha']; ?></td>
            <td><?php echo $data['status_wirausaha']; ?></td>
            <td><?php echo $data['kesesuaiaan_pengetahuan']; ?></td>
            <td><?php echo $data['bidang_kompetesi_1'] . ', ' . $data['bidang_kompetesi_2'] . ', ' . $data['bidang_kompetesi_3'] . ', ' . $data['bidang_kompetesi_4']; ?></td>
            <td><?php echo $data['bidang_kefarmasian_1'] . ', ' . $data['bidang_kefarmasian_2'] . ', ' . $data['bidang_kefarmasian_3'] . ', ' . $data['bidang_kefarmasian_4']. ', '.$data['bidang_kefarmasian_5'] . ', ' . $data['bidang_kefarmasian_6'] . ', ' . $data['bidang_kefarmasian_7'] . ', ' . $data['bidang_kefarmasian_8']. ', '.$data['bidang_kefarmasian_9']; ?></td>
            <td><?php echo $data['bidang_pengetahuan_1'] . ', ' . $data['bidang_pengetahuan_2'] . ', ' . $data['bidang_pengetahuan_3'] . ', ' . $data['bidang_pengetahuan_4']. ', '.$data['bidang_pengetahuan_5'] . ', ' . $data['bidang_pengetahuan_6'] . ', ' . $data['bidang_pengetahuan_7'] . ', ' . $data['bidang_pengetahuan_8']; ?></td>
            <td><?php echo $data['materi_ditingkatkan']; ?></td>
            <td><?php echo $data['info_loker']; ?></td>
            <td><?php echo $data['saran']; ?></td>
            <td><?php echo $data['kesan']; ?></td>
        </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>