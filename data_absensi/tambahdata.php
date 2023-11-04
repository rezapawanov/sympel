<?php
include 'koneksi.php';
$tag     = $_GET['tag'];
$hasil  = mysqli_query($koneksi, "select * from tambah");
$row        = mysqli_fetch_array($hasil);
?>

<html>
<head>
    <title>Form Tambah Data</title>
	     <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css" media="screen">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
		}
				h2 {
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
    </style>
</head>
<body>
    <center>
      <h1>SISTEM ABSENSI</h1>
	  <h2>MENGGUNAKAN RFID DENGAN ESP32</h2>
    </center>
<!-- Navbar (sit on top) -->
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href='index.html' class="w3-bar-item w3-button"><b>CT </b> CAPASITORTECH</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href='update.php' class="w3-bar-item w3-button">Tambahkan Data Baru</a>
      <a href='absensi.php' class="w3-bar-item w3-button">Absensi Karyawan</a>
	  <a href='datasiswa.php' class="w3-bar-item w3-button">Data Karyawan</a>
    </div>
  </div>
<form method="POST" action="act-inputdata.php" >
    <table class="data-table">
	<center>
		<caption class="title">Form Tambah Data Karyawan</caption>
        <tr height="46">
         <td> </td>
		 <td> Nomer Kartu : </td> <td> <textarea name="tag" cols="40" rows="1" ><?php echo $row['tag'];?></textarea></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>Nama :</td>
            <td><input type="text" name="nama" size="50" maxlength="30" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>Distrik :</td>
            <td><select name="distrik">
                    <option value="-">- Pilih Distrik -
                    <option value="KEUANGAN">KEUANGAN
                    <option value="TEKNIK">TEKNIK
					<option value="UMUM">UMUM
					<option value="PRODUKSI">PRODUKSI
					<option value="OPERATOR">OPERATOR
                </select></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td> </td>
            <td><input type="submit" name="Submit" value="Submit">   
                <input type="reset" name="reset" value="Cancel"></td>
        </tr>
		</center>
    </table>
</form>
</body>
</html>