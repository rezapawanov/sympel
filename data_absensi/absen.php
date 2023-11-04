<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data dari mikrokontroller using $_POST
    $tag = $_POST["tag"];
    $ket = $_POST["ket"];

    $query = "INSERT INTO rfid (tag, ket) VALUES ('$tag', '$ket')";
    mysqli_query($koneksi, $query);
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request method.";
}
?>
