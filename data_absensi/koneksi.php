<?php 
 
$host = "localhost";
$user = "maalmaun_asis";
$password = "maalmaun_asis";
$database = "maalmaun_asis";
 
$koneksi = mysqli_connect($host,$user,$password,$database);
 
if($koneksi->connect_error){
	die("Koneksi gagal");
}
 
?>