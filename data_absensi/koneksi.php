<?php 
 
$host = "localhost";
$user = "ashabuly_asis";
$password = "ashabuly_asis";
$database = "ashabuly_asis";
 
$koneksi = mysqli_connect($host,$user,$password,$database);
 
if($koneksi->connect_error){
	die("Koneksi gagal");
}
 
?>