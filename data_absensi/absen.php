<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data dari mikrokontroller using $_POST
    $tag = $_POST["tag"];
    $ket = $_POST["ket"];

    $querySiswaCount = "SELECT COUNT(0) as count FROM mst_siswa WHERE rfid = '$tag'";
    $resultSiswaCount = mysqli_query($koneksi, $querySiswaCount);

    $queryGuruCount = "SELECT COUNT(0) as count FROM mst_guru WHERE rfid = '$tag'";
    $resultGuruCount = mysqli_query($koneksi, $queryGuruCount);

    $currentDay = date("N"); // Returns 1 (Monday) through 7 (Sunday)
    $currentHour = date("H:i");

    if ($_SERVER['SERVER_NAME'] == "ashabul-yamin.pijarsolusi.id") {
        //Senin(1)
        //Selasa(2), 
        //Rabu(3) 
        //Kamis(4) 
        //Jumat(5) 
        //Sabtu(6) 
        //Minggu(7) 
        //time is between 09:40 and 10:20
        if (($currentDay == 2 || $currentDay == 3 || $currentDay == 4) && (strtotime($currentHour) >= strtotime("09:40") && strtotime($currentHour) <= strtotime("10:20"))) {
            // Additional variable, e.g., $isTimeToInsert
            $ket = "Dhuha";
        } 
    }

    if ($resultSiswaCount) {
        $rowSiswaCount = mysqli_fetch_assoc($resultSiswaCount);
        $siswaCount = $rowSiswaCount['count'];

        if ($siswaCount > 0) {
            $query = "INSERT INTO rfid (tag, ket) VALUES ('$tag', '$ket')";
            mysqli_query($koneksi, $query);

            $query = "SELECT id_siswa, id_kelas FROM mst_siswa WHERE rfid = '$tag'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $id_siswa = $row['id_siswa'];
                $id_kelas = $row['id_kelas'];
                $currentDate = date("Y-m-d");

                // Now, you can use the retrieved "tag" value in your INSERT query
                $query = "insert into absen(id_siswa, id_kelas, tahun_ajaran, keterangan, tanggal_absen) values ('$id_siswa', '$id_kelas', '2023/2024','$ket','$currentDate') ";
                mysqli_query($koneksi, $query);
            }
        }


    }

    if ($resultGuruCount) {
        $rowGuruCount = mysqli_fetch_assoc($resultGuruCount);
        $guruCount = $rowGuruCount['count'];

        if ($guruCount > 0) {
            $query = "INSERT INTO rfid (tag, ket) VALUES ('$tag', '$ket')";
            mysqli_query($koneksi, $query);

            $query = "SELECT id_guru FROM mst_guru WHERE rfid = '$tag'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $id_guru = $row['id_guru'];
                $id_kelas = 1;
                $id_jadwal_pelajaran = 1;
                $currentDate = date("Y-m-d");

                // Now, you can use the retrieved "tag" value in your INSERT query
                $query = "insert into absen_guru(id_guru, id_kelas, tahun_ajaran, keterangan, id_jadwal_pelajaran,tanggal_absen) values ('$id_guru', '$id_kelas', '2023/2024','$ket','$id_jadwal_pelajaran','$currentDate') ";
                mysqli_query($koneksi, $query);
            }
        }


    }





} else {
    // Handle cases where the request method is not POST
    echo "Invalid request method.";
}
?>