<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data dari mikrokontroller using $_POST
    $tag = $_POST["tag"];
    $ket = $_POST["ket"];

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

    
   
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request method.";
}
?>
