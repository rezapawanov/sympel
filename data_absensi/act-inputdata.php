<?php

    include "koneksi.php";

    $tag = $_POST['tag'];
    $nama = $_POST['nama'];
    $distrik = $_POST['distrik'];

   $query="INSERT INTO siswa SET  tag='$tag',nama='$nama',distrik='$distrik'";
   $sql="DELETE from tambah where tag='$tag'";
mysqli_query($koneksi, $query);
mysqli_query($koneksi, $sql);
header("location:update.php");
?>