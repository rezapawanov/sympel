<?php $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row(); ?>
<head>
<title>Cover Raport Siswa</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/printer.css">
</head>
<body >
    <h1 align=center>RAPORT SISWA <br>SEKOLAH MENENGAH ATAS <br> (SMA)</h1>
    <center>
        <img width='170px' src='<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/master/upload/'.$sekolah->logo; ?>'><br><br><br><br><br><br><br><br>
        Nama Siswa :<br>
        <h3 style='border:1px solid #000; width:82%; padding:6px'><?php echo $nama_siswa; ?></h3><br><br>

        NIS / NISN<br>
        <h3 style='border:1px solid #000; width:82%; padding:3px'><?php echo $nis; ?></h3><br><br><br><br><br><br>

        <p style='font-size:22px'>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>REPUBLIK INDONESIA</p>
    </center>

    <script>
    window.print();
    window.close();
    </script>
</body>
</html>