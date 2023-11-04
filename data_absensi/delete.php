<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$No  = $_GET['No'];
// query SQL untuk insert data
$query="DELETE from siswa where No='$No'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:datasiswa.php");
?>