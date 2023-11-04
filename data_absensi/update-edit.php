<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$No  = $_POST['No'];
$tag           = $_POST['tag'];
$nama           = $_POST['nama'];
$distrik      = $_POST['distrik'];
// query SQL untuk insert data
$query="UPDATE siswa SET tag='$tag',nama='$nama',distrik='$distrik' where No='$No'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:datasiswa.php");
?>