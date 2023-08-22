-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 01:53 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tentang` text,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `google` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `nama`, `tentang`, `alamat`, `telpon`, `email`, `facebook`, `twitter`, `youtube`, `google`, `gambar`) VALUES
(1, 'Kids Life', 'Happy Kids Life comes with powerful theme options, which empowers you to quickly and easily build incredible store.', '4318 Mansion House, Greenland \r\nUnited States', '(000) 233 - 3236', 'kontak@perlubantuan.com', 'https://www.facebook.com/', 'https://twitter.com/', 'https://youtube.com/', 'https://google.com/', 'ddf3b76bf908fb08a2ff8757236ed12a.png');

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(11) DEFAULT NULL,
  `keterangan` enum('SAKIT','IZIN','ALPA') DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tanggal_absen` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_siswa`, `id_kelas`, `tahun_ajaran`, `keterangan`, `alasan`, `id_guru`, `tanggal_absen`) VALUES
(2, 1, 1, '2022/2023', 'SAKIT', 'ksjdks', NULL, '2021-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `icon` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `judul`, `keterangan`, `icon`, `gambar`, `tgl_mulai`) VALUES
(7, 'English Summer Camp', 'Nam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....', 'fa fa-glass', '8c6d515af3a9b9141ef9d3d32e93fdee.jpg', '2016-05-01'),
(8, 'Sports Camp', 'English Summer Camp\r\nNam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....\r\nDrawing & Painting\r\nNam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....\r\nSwimming Camp\r\nNam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....\r\nSports Camp\r\nNam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....', 'fa fa-tachometer', '8625a6cfd405fe576f42b94db12ad100.jpg', '0000-00-00'),
(9, 'Drawing & Painting', 'Nam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....', 'fa fa-pencil', 'c1f9de3cee60042a796d90f63bce9a6a.jpg', '0000-00-00'),
(10, 'Swimming Camp', 'Nam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....', 'fa fa-bullseye', '2d446d19d367c776110b5120226a03f6.jpg', '0000-00-00'),
(11, 'Personalizing', 'Nam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....', 'fa fa-magic', 'af1acac30f709473b2bc93d7410fba75.jpg', '0000-00-00'),
(12, 'Sing & Dance', 'Nam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, inst tibulum nisl ligula....', 'fa fa-music', 'da415da6aa86552768d63876fa1225c7.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `agenda_display`
--

CREATE TABLE `agenda_display` (
  `id_agenda` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `nama_agenda` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `keterangan` text,
  `url` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `keterangan`, `url`, `gambar`, `aktif`) VALUES
(3, 'sgsgx', 'sdgsgc', 'af406bf6c044f54e074b6b094b69c26f.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `barangsita_siswa`
--

CREATE TABLE `barangsita_siswa` (
  `id_barangsita_siswa` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `keterangan_sita` varchar(200) DEFAULT NULL,
  `tanggal_sita` date DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `id_penginput` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `belanja_siswa`
--

CREATE TABLE `belanja_siswa` (
  `id_belanja_siswa` int(11) NOT NULL,
  `harga` int(54) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `id_penginput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belanja_siswa`
--

INSERT INTO `belanja_siswa` (`id_belanja_siswa`, `harga`, `id_siswa`, `id_kelas`, `tanggal`, `tahun_ajaran`, `id_penginput`) VALUES
(18, 0, 1, 1, '2021-09-20', '2022/2023', 1),
(19, 0, 1, 1, '2021-09-21', '2022/2023', 1),
(20, 0, 1, 1, '2021-09-21', '2022/2023', 1),
(21, 1000, 1, 1, '2021-09-21', '2022/2023', 1),
(22, 1000, 1, 1, '2021-09-22', '2022/2023', 19),
(23, 10000, 1, 1, '2021-09-22', '2022/2023', 20),
(24, 1000, 1, 1, '2021-09-22', '2022/2023', 20),
(25, 1000, 1, 1, '2021-09-22', '2022/2023', 20),
(26, 10000, 1, 1, '2021-09-22', '2022/2023', 20);

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan_siswa`
--

CREATE TABLE `bimbingan_siswa` (
  `id_bimbingan_siswa` int(11) NOT NULL,
  `jenis_bimbingan_siswa` text,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `perihal` text,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `id_absen` int(11) DEFAULT NULL,
  `id_penginput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan_siswa`
--

INSERT INTO `bimbingan_siswa` (`id_bimbingan_siswa`, `jenis_bimbingan_siswa`, `id_siswa`, `id_kelas`, `perihal`, `tanggal`, `tahun_ajaran`, `id_absen`, `id_penginput`) VALUES
(1, 'Layanan Konseling Kelompok', 1, 1, 'jdksjdks', '2021-09-17', '2022/2023', NULL, 1),
(2, 'Layanan Konseling Individu', 1, 1, 'jdksjdkjs', '2021-09-17', '2022/2023', NULL, 1),
(3, 'Layanan Informasi', 1, 1, '`kslasla', '2021-09-22', '2022/2023', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id_tamu` int(11) NOT NULL,
  `nama_tamu` varchar(100) DEFAULT NULL,
  `asal` varchar(250) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `keperluan` varchar(250) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_akademik`
--

CREATE TABLE `calendar_akademik` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_akademik`
--

INSERT INTO `calendar_akademik` (`id`, `title`, `start`, `end`, `year`) VALUES
(1, 'Rapat', '2020-04-02', '2020-04-02', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_arsip`
--

CREATE TABLE `calendar_arsip` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_keuangan`
--

CREATE TABLE `calendar_keuangan` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_perpustakaan`
--

CREATE TABLE `calendar_perpustakaan` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_poinpelanggaran`
--

CREATE TABLE `calendar_poinpelanggaran` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_poinpelanggaran`
--

INSERT INTO `calendar_poinpelanggaran` (`id`, `title`, `start`, `end`, `year`) VALUES
(2, 'sielvi febriana, tengku anggun, vicky, wahyu dan farisya dian terlambat mengumpulkan handphone', '2019-08-01', '2019-08-01', '2019'),
(3, 'Adenia izin pulang sekolah karena radangnya kambuh', '2019-08-13', '2019-08-13', '2019'),
(4, 'razia atribut', '2019-08-14', '2019-08-14', '2019'),
(5, 'pengecekan atribut sekolah setelah apel', '2019-08-26', '2019-08-26', '2019'),
(6, 'LIBUR', '2020-04-07', '2020-04-07', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `das`
--

CREATE TABLE `das` (
  `id_das` int(11) NOT NULL,
  `id_das_kategori` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `total` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `das_bendahara`
--

CREATE TABLE `das_bendahara` (
  `id_das_bendahara` int(11) NOT NULL,
  `id_das_kategori` int(11) DEFAULT NULL,
  `kegiatan` text,
  `total` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `das_kategori`
--

CREATE TABLE `das_kategori` (
  `id_das_kategori` int(11) NOT NULL,
  `jenis_dana` varchar(50) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `dana` double DEFAULT NULL,
  `sisa_dana` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `das_sisa`
--

CREATE TABLE `das_sisa` (
  `id_das_sisa` int(11) NOT NULL,
  `jenis_dana` text,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `dana` double DEFAULT NULL,
  `sisa_dana` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `das_sisa_output`
--

CREATE TABLE `das_sisa_output` (
  `id_das_sisa_output` int(11) NOT NULL,
  `id_das_sisa` int(11) DEFAULT NULL,
  `keterangan` text,
  `jumlah` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ada_nota` char(1) NOT NULL DEFAULT '0',
  `ada_bku` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `das_sisa_output`
--
DELIMITER $$
CREATE TRIGGER `das_sisa_delete` AFTER DELETE ON `das_sisa_output` FOR EACH ROW BEGIN
	UPDATE das_sisa SET sisa_dana = sisa_dana + OLD.jumlah WHERE id_das_sisa = OLD.id_das_sisa;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `das_sisa_insert` AFTER INSERT ON `das_sisa_output` FOR EACH ROW BEGIN
	UPDATE das_sisa SET sisa_dana = sisa_dana - NEW.jumlah WHERE id_das_sisa = NEW.id_das_sisa;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `das_sumber_dana`
--

CREATE TABLE `das_sumber_dana` (
  `id_das_sumber_dana` int(11) NOT NULL,
  `jenis_dana_masuk` varchar(100) DEFAULT NULL,
  `jumlah_dana` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `das_user`
--

CREATE TABLE `das_user` (
  `id_das_user` int(11) NOT NULL,
  `id_das` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `total_terima` double DEFAULT NULL,
  `sisa_saldo` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_das` varchar(25) NOT NULL,
  `status_das_user` char(1) NOT NULL DEFAULT '0',
  `open` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `das_user_bendahara`
--

CREATE TABLE `das_user_bendahara` (
  `id_das_user_bendahara` int(11) NOT NULL,
  `id_das_bendahara` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `total_terima` double DEFAULT NULL,
  `sisa_saldo` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_das` varchar(25) DEFAULT NULL,
  `status_das_user` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `das_user_bendahara_output`
--

CREATE TABLE `das_user_bendahara_output` (
  `id_das_user_bendahara_output` int(11) NOT NULL,
  `id_das_user_bendahara` int(11) DEFAULT NULL,
  `jenis_das` varchar(15) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ada_nota` char(1) DEFAULT '0',
  `ada_bku` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `das_user_bendahara_output`
--
DELIMITER $$
CREATE TRIGGER `das_bendahara_delete` AFTER DELETE ON `das_user_bendahara_output` FOR EACH ROW BEGIN
UPDATE das_user_bendahara SET sisa_saldo = sisa_saldo + OLD.jumlah WHERE id_das_user_bendahara = OLD.id_das_user_bendahara;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `das_bendahara_insert` AFTER INSERT ON `das_user_bendahara_output` FOR EACH ROW BEGIN
UPDATE das_user_bendahara SET sisa_saldo = sisa_saldo - NEW.jumlah WHERE id_das_user_bendahara = NEW.id_das_user_bendahara;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `das_user_output`
--

CREATE TABLE `das_user_output` (
  `id_das_user_output` int(11) NOT NULL,
  `id_das_user` int(11) DEFAULT NULL,
  `jenis_das` varchar(50) NOT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ada_nota` char(1) NOT NULL DEFAULT '0',
  `ada_bku` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `das_user_output`
--
DELIMITER $$
CREATE TRIGGER `das_saya_delete` AFTER DELETE ON `das_user_output` FOR EACH ROW BEGIN
	UPDATE das_user SET sisa_saldo = sisa_saldo + OLD.jumlah WHERE id_das_user = OLD.id_das_user;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `das_saya_insert` AFTER INSERT ON `das_user_output` FOR EACH ROW BEGIN
UPDATE das_user SET sisa_saldo = sisa_saldo - NEW.jumlah WHERE id_das_user = NEW.id_das_user;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_jenis_dokumen` int(11) DEFAULT NULL,
  `id_lemari` int(11) NOT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `id_box` int(11) DEFAULT NULL,
  `id_map` int(11) DEFAULT NULL,
  `id_urut` int(11) DEFAULT NULL,
  `nomor_dokumen` varchar(30) DEFAULT NULL,
  `nama_dokumen` varchar(150) DEFAULT NULL,
  `deskripsi` text,
  `file_dokumen` varchar(100) DEFAULT NULL,
  `tanggal_dokumen` date NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_tabungan_siswa`
--

CREATE TABLE `dt_tabungan_siswa` (
  `id_tabungan_siswa` int(11) NOT NULL,
  `saldo` int(54) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `pengeluaran` int(52) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `id_absen` int(11) DEFAULT NULL,
  `id_penginput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_tabungan_siswa`
--

INSERT INTO `dt_tabungan_siswa` (`id_tabungan_siswa`, `saldo`, `id_siswa`, `id_kelas`, `pengeluaran`, `tanggal`, `tahun_ajaran`, `id_absen`, `id_penginput`) VALUES
(14, 100, 1, 1, NULL, '2021-09-21', '2022/2023', NULL, 1),
(15, 10000, 1, 1, NULL, '2021-09-21', '2022/2023', NULL, 1),
(16, 10000000, 1, 1, NULL, '2021-09-21', '2022/2023', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `id_kategori` int(11) DEFAULT NULL,
  `lokasi` varchar(250) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `tgl_posting` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `judul`, `keterangan`, `tgl_posting`) VALUES
(1, 'bisnis ajax', 'haha c', '2016-04-30'),
(2, 'hmm', 'haha', '2016-05-05'),
(3, 'ahah', 'dfhfd', '2016-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal_pelajaran` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal_pelajaran`, `id_guru`, `id_mapel`, `id_kelas`, `id_tahun_ajaran`) VALUES
(1, 1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sholat`
--

CREATE TABLE `jadwal_sholat` (
  `id` int(11) NOT NULL,
  `subuh` varchar(5) DEFAULT NULL,
  `dzuhur` varchar(5) DEFAULT NULL,
  `ashar` varchar(5) DEFAULT NULL,
  `magrib` varchar(5) DEFAULT NULL,
  `isya` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_sholat`
--

INSERT INTO `jadwal_sholat` (`id`, `subuh`, `dzuhur`, `ashar`, `magrib`, `isya`) VALUES
(1, '04:45', '12:15', '18:10', '18:10', '19:30');

-- --------------------------------------------------------

--
-- Table structure for table `katamutiara`
--

CREATE TABLE `katamutiara` (
  `id_katamutiara` int(11) NOT NULL,
  `kata` varchar(250) DEFAULT NULL,
  `penemu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katamutiara`
--

INSERT INTO `katamutiara` (`id_katamutiara`, `kata`, `penemu`) VALUES
(4, 'Sesungguhnya yang takut kepada Allah di antara hamba-hamba-Nya, hanyalah para ulama (orang-orang yang berilmu).', '(Q.S Fathir: 28)');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_file`
--

CREATE TABLE `kategori_file` (
  `id_kategori` int(11) NOT NULL,
  `kategori_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_file`
--

INSERT INTO `kategori_file` (`id_kategori`, `kategori_file`) VALUES
(10, 'Ebook'),
(11, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_post`
--

CREATE TABLE `kategori_post` (
  `id_kategori` int(11) NOT NULL,
  `kategori_post` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_post`
--

INSERT INTO `kategori_post` (`id_kategori`, `kategori_post`) VALUES
(1, 'Play School'),
(2, 'Competition');

-- --------------------------------------------------------

--
-- Table structure for table `kelulusan_siswa`
--

CREATE TABLE `kelulusan_siswa` (
  `id_kelulusan` int(11) NOT NULL,
  `no_ujian` varchar(30) DEFAULT NULL,
  `nama_siswa` varchar(70) DEFAULT NULL,
  `jurusan` varchar(100) NOT NULL,
  `nilai_indo` double DEFAULT NULL,
  `nilai_mtk` double DEFAULT NULL,
  `nilai_eng` double DEFAULT NULL,
  `nilai_kejurusan` double DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelulusan_siswa`
--

INSERT INTO `kelulusan_siswa` (`id_kelulusan`, `no_ujian`, `nama_siswa`, `jurusan`, `nilai_indo`, `nilai_mtk`, `nilai_eng`, `nilai_kejurusan`, `status`) VALUES
(17, '4-19-12-01-0160-0001-8', 'ADELIA SUKMAWATI', 'Farmasi', 70, 80, 90, 85, 'LULUS'),
(18, '4-19-12-01-0160-0002-7', 'AFIFA OCTIARA', 'TI', 89, 80, 98, 78, 'LULUS'),
(19, '4-19-12-01-0160-0002-3', 'HENDI', 'IPA', 45, 45, 45, 5, 'LULUS'),
(20, '4-19-12-01-0160-0002-6', 'CICA', 'IPS', 4, 44, 4, 4, 'TIDAK LULUS');

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `ipaddress` varchar(25) DEFAULT NULL,
  `hak_akses` varchar(55) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `saldo` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id`, `username`, `ipaddress`, `hak_akses`, `tanggal`, `saldo`) VALUES
(3, 'Admin Utama', '::1', 'admin', '2020-04-02 16:27:08', 0),
(4, 'Admin Utama', '::1', 'admin', '2020-04-02 16:43:07', 0),
(5, 'Admin Utama', '::1', 'admin', '2020-04-02 17:01:04', 0),
(6, 'Admin Utama', '::1', 'admin', '2020-04-03 00:46:01', 0),
(7, 'Admin Utama', '::1', 'admin', '2020-04-03 03:56:26', 0),
(8, 'Admin Utama', '::1', 'admin', '2020-04-03 04:41:03', 0),
(9, 'Admin Utama', '::1', 'admin', '2020-04-03 04:41:19', 0),
(10, 'Admin Utama', '::1', 'admin', '2020-04-03 04:51:11', 0),
(11, 'Waka Kesiswaan', '::1', 'das', '2020-04-03 04:51:26', 0),
(12, 'Admin Utama', '::1', 'admin', '2020-04-03 04:51:36', 0),
(13, 'Admin Utama', '::1', 'admin', '2020-04-03 04:55:44', 0),
(14, 'Admin Utama', '::1', 'admin', '2020-04-03 05:14:30', 0),
(15, 'Admin Utama', '::1', 'admin', '2020-04-03 08:11:01', 0),
(16, 'Admin Utama', '::1', 'admin', '2020-04-04 00:49:15', 0),
(17, 'Admin Utama', '::1', 'admin', '2020-04-04 13:13:17', 0),
(18, 'Admin Utama', '127.0.0.1', 'admin', '2021-08-30 19:07:18', 0),
(19, 'jkjk', '127.0.0.1', 'siswa', '2021-08-30 19:10:18', 0),
(20, 'Admin Utama', '127.0.0.1', 'admin', '2021-08-30 19:10:37', 0),
(21, 'jkjk', '127.0.0.1', 'siswa', '2021-08-30 19:13:14', 0),
(22, 'Admin Utama', '127.0.0.1', 'admin', '2021-08-30 19:14:03', 0),
(23, 'Admin Utama', '127.0.0.1', 'admin', '2021-08-30 19:14:33', 0),
(24, 'Bendahara', '127.0.0.1', 'bendahara', '2021-08-30 19:14:58', 0),
(25, 'Admin Utama', '127.0.0.1', 'admin', '2021-08-30 19:16:28', 0),
(26, 'Admin Utama', '127.0.0.1', 'admin', '2021-08-31 16:43:25', 0),
(27, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-01 03:38:16', 0),
(28, 'jkjk', '127.0.0.1', 'siswa', '2021-09-01 03:46:37', 0),
(29, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-01 03:47:38', 0),
(30, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-01 05:19:28', 0),
(31, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-04 15:55:20', 0),
(32, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-04 17:14:59', 0),
(33, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-04 17:33:28', 0),
(34, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-04 18:02:35', 0),
(35, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-05 07:35:35', 0),
(36, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-05 20:06:35', 0),
(37, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-17 16:10:44', 0),
(38, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-17 16:13:43', 0),
(39, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-17 16:28:00', 0),
(40, 'ahmad', '127.0.0.1', 'guru', '2021-09-17 20:07:08', 0),
(41, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-17 20:07:33', 0),
(42, 'jkjk', '127.0.0.1', 'siswa', '2021-09-17 20:08:18', 0),
(43, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-17 20:10:55', 0),
(44, 'jkjk', '127.0.0.1', 'siswa', '2021-09-17 20:11:35', 0),
(45, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-17 20:16:46', 0),
(46, 'jkjk', '127.0.0.1', 'siswa', '2021-09-17 20:17:55', 0),
(47, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-17 20:31:21', 0),
(48, 'jkjk', '127.0.0.1', 'siswa', '2021-09-17 20:38:52', 0),
(49, 'jkjk', '127.0.0.1', 'siswa', '2021-09-17 20:41:47', 0),
(50, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-17 20:52:13', 0),
(51, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-18 17:15:03', 0),
(52, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-18 17:17:14', 0),
(53, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-18 17:29:13', 0),
(54, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-18 17:53:08', 0),
(55, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-18 18:14:37', 0),
(56, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-18 19:14:53', 0),
(57, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-20 15:25:13', 0),
(58, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 18:18:11', 0),
(59, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 19:47:35', 0),
(60, 'Kasir Kantin', '127.0.0.1', 'admin', '2021-09-21 19:52:59', 0),
(61, 'Kasir Kantin', '127.0.0.1', 'kantin', '2021-09-21 19:54:06', 0),
(62, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 19:57:00', 0),
(63, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 20:03:47', 0),
(64, 'yanto', '127.0.0.1', 'kantin', '2021-09-21 20:04:28', 0),
(65, 'yanto', '127.0.0.1', 'kantin', '2021-09-21 20:34:52', 9000),
(66, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 20:35:11', 0),
(67, 'Bendahara', '127.0.0.1', 'bendahara', '2021-09-21 20:36:17', 0),
(68, 'yanto', '127.0.0.1', 'kantin', '2021-09-21 20:38:47', 9000),
(69, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 20:39:05', 0),
(70, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 20:39:16', 0),
(71, 'yanto', '127.0.0.1', 'kantin', '2021-09-21 20:39:41', 9000),
(72, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 20:45:00', 0),
(73, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 20:46:38', 0),
(74, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 20:46:54', 0),
(75, 'yanto', '127.0.0.1', 'kantin', '2021-09-21 20:49:09', 9000),
(76, 'Admin Utama', '127.0.0.1', 'admin', '2021-09-21 20:57:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `posisi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `url`, `id_parent`, `posisi`) VALUES
(1, 'Home', 'http://localhost/supercms/', 0, 1),
(3, 'kontak', 'http://localhost/supercms/web/kontak', 0, 7),
(4, 'Direktori Guru', 'http://localhost/ass/webpanel/web/staff', 20, 1),
(5, 'Gallery', 'http://localhost/supercms/web/gallery', 0, 4),
(6, 'download', '#', 0, 6),
(7, 'berita', 'http://localhost/ass/webpanel/web/berita', 0, 5),
(14, 'visi dan misi', 'http://localhost/supercms/web/page/detail/2/visi-dan-misi', 17, 2),
(17, 'profil', '#', 0, 2),
(19, 'struktur organisasi', 'http://localhost/supercms/web/page/detail/1/struktur-organisasi', 17, 3),
(20, 'direktori', '#', 0, 3),
(21, 'profile singkat', 'http://localhost/supercms/web/page/detail/3/profile-singkat', 17, 1),
(28, 'Ebook', 'http://localhost/supercms/Web/download/detail/10/Ebook', 6, 0),
(29, 'Anggota', 'http://localhost/supercms/Web/download/detail/11/Anggota', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_admin`
--

CREATE TABLE `mst_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tipe` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_admin`
--

INSERT INTO `mst_admin` (`id`, `nama`, `username`, `password`, `tipe`) VALUES
(1, 'Admin Utama', 'admin', 'admin', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `mst_alumni`
--

CREATE TABLE `mst_alumni` (
  `id_alumni` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `tahun_lulus` varchar(4) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `aktivitas_1` varchar(50) DEFAULT NULL,
  `aktivitas_2` varchar(50) DEFAULT NULL,
  `aktivitas_3` varchar(50) DEFAULT NULL,
  `aktivitas_4` varchar(50) DEFAULT NULL,
  `pernah_bekerja` varchar(15) DEFAULT NULL,
  `lama_dapat_kerja` varchar(25) DEFAULT NULL,
  `bidang_pekerjaan` varchar(50) DEFAULT NULL,
  `tingkat_kemudahan` varchar(50) DEFAULT NULL,
  `jumlah_gaji` float DEFAULT NULL,
  `nama_tempat_kerja` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` varchar(150) DEFAULT NULL,
  `kabupaten_perusahaan` varchar(50) DEFAULT NULL,
  `tanggal_mulai_kerja` date DEFAULT NULL,
  `tanggal_selesai_kerja` date DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `aktivitas_kuliah` varchar(25) DEFAULT NULL,
  `status_perguruan_tinggi` varchar(25) DEFAULT NULL,
  `nama_perguruan_tinggi` varchar(80) DEFAULT NULL,
  `jenjang_pendidikan` varchar(50) DEFAULT NULL,
  `program_studi` varchar(50) DEFAULT NULL,
  `jalur_masuk` varchar(50) DEFAULT NULL,
  `mulai_kuliah` date DEFAULT NULL,
  `biaya_semester` float DEFAULT NULL,
  `status_kuliah` varchar(15) DEFAULT NULL,
  `nama_perusahaan_wirausaha` varchar(50) DEFAULT NULL,
  `jenis_usaha_1` varchar(50) DEFAULT NULL,
  `jenis_usaha_2` varchar(50) DEFAULT NULL,
  `jenis_usaha_3` varchar(50) DEFAULT NULL,
  `jenis_usaha_4` varchar(50) DEFAULT NULL,
  `mulai_usaha` date DEFAULT NULL,
  `status_wirausaha` varchar(25) DEFAULT NULL,
  `kesesuaiaan_pengetahuan` varchar(50) DEFAULT NULL,
  `bidang_kompetesi_1` varchar(50) DEFAULT NULL,
  `bidang_kompetesi_2` varchar(50) DEFAULT NULL,
  `bidang_kompetesi_3` varchar(50) DEFAULT NULL,
  `bidang_kompetesi_4` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_1` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_2` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_3` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_4` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_5` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_6` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_7` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_8` varchar(50) DEFAULT NULL,
  `bidang_kefarmasian_9` varchar(50) DEFAULT NULL,
  `bidang_pengetahuan_1` varchar(50) DEFAULT NULL,
  `bidang_pengetahuan_2` varchar(50) DEFAULT NULL,
  `bidang_pengetahuan_3` varchar(50) DEFAULT NULL,
  `bidang_pengetahuan_4` varchar(50) DEFAULT NULL,
  `bidang_pengetahuan_5` varchar(50) DEFAULT NULL,
  `bidang_pengetahuan_6` varchar(50) DEFAULT NULL,
  `bidang_pengetahuan_7` varchar(50) DEFAULT NULL,
  `bidang_pengetahuan_8` varchar(50) DEFAULT NULL,
  `materi_ditingkatkan` varchar(50) DEFAULT NULL,
  `info_kerja_1` varchar(50) DEFAULT NULL,
  `info_kerja_2` varchar(50) DEFAULT NULL,
  `info_kerja_3` varchar(50) DEFAULT NULL,
  `info_kerja_4` varchar(50) DEFAULT NULL,
  `info_kerja_5` varchar(50) DEFAULT NULL,
  `info_loker` varchar(40) DEFAULT NULL,
  `saran` varchar(50) DEFAULT NULL,
  `kesan` varchar(50) DEFAULT NULL,
  `status_aktif` char(1) NOT NULL DEFAULT '0',
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `angkatan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_alumni`
--

INSERT INTO `mst_alumni` (`id_alumni`, `nama`, `email`, `password`, `hp`, `tahun_lulus`, `jenis_kelamin`, `aktivitas_1`, `aktivitas_2`, `aktivitas_3`, `aktivitas_4`, `pernah_bekerja`, `lama_dapat_kerja`, `bidang_pekerjaan`, `tingkat_kemudahan`, `jumlah_gaji`, `nama_tempat_kerja`, `alamat_perusahaan`, `kabupaten_perusahaan`, `tanggal_mulai_kerja`, `tanggal_selesai_kerja`, `jabatan`, `aktivitas_kuliah`, `status_perguruan_tinggi`, `nama_perguruan_tinggi`, `jenjang_pendidikan`, `program_studi`, `jalur_masuk`, `mulai_kuliah`, `biaya_semester`, `status_kuliah`, `nama_perusahaan_wirausaha`, `jenis_usaha_1`, `jenis_usaha_2`, `jenis_usaha_3`, `jenis_usaha_4`, `mulai_usaha`, `status_wirausaha`, `kesesuaiaan_pengetahuan`, `bidang_kompetesi_1`, `bidang_kompetesi_2`, `bidang_kompetesi_3`, `bidang_kompetesi_4`, `bidang_kefarmasian_1`, `bidang_kefarmasian_2`, `bidang_kefarmasian_3`, `bidang_kefarmasian_4`, `bidang_kefarmasian_5`, `bidang_kefarmasian_6`, `bidang_kefarmasian_7`, `bidang_kefarmasian_8`, `bidang_kefarmasian_9`, `bidang_pengetahuan_1`, `bidang_pengetahuan_2`, `bidang_pengetahuan_3`, `bidang_pengetahuan_4`, `bidang_pengetahuan_5`, `bidang_pengetahuan_6`, `bidang_pengetahuan_7`, `bidang_pengetahuan_8`, `materi_ditingkatkan`, `info_kerja_1`, `info_kerja_2`, `info_kerja_3`, `info_kerja_4`, `info_kerja_5`, `info_loker`, `saran`, `kesan`, `status_aktif`, `tanggal_daftar`, `angkatan`) VALUES
(2, 'Hendi', 'coba@gmail.com', '123', NULL, NULL, NULL, 'Kerja', 'Kuliah', 'Wirausaha', 'Lainnya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2020-04-03 05:24:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_barang`
--

CREATE TABLE `mst_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_box`
--

CREATE TABLE `mst_box` (
  `id_box` int(11) NOT NULL,
  `nama_box` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_box`
--

INSERT INTO `mst_box` (`id_box`, `nama_box`) VALUES
(1, 'A1231'),
(2, 'C.131');

-- --------------------------------------------------------

--
-- Table structure for table `mst_buku`
--

CREATE TABLE `mst_buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(25) DEFAULT NULL,
  `judul_buku` varchar(100) DEFAULT NULL,
  `pengarang` varchar(80) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` char(4) DEFAULT NULL,
  `tempat_terbit` varchar(80) DEFAULT NULL,
  `total_halaman` int(6) DEFAULT NULL,
  `tinggi_buku` float DEFAULT NULL,
  `ddc` varchar(50) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `no_inventaris` varchar(25) DEFAULT NULL,
  `lokasi` varchar(15) DEFAULT NULL,
  `deskripsi_buku` text,
  `foto_buku` varchar(100) DEFAULT NULL,
  `id_sumber` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_bulan`
--

CREATE TABLE `mst_bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_bulan`
--

INSERT INTO `mst_bulan` (`id_bulan`, `nama_bulan`) VALUES
(2, 'Agustus'),
(10, 'April'),
(6, 'Desember'),
(8, 'Febuari'),
(7, 'Januari'),
(1, 'Juli'),
(12, 'Juni'),
(9, 'Maret'),
(11, 'Mei'),
(5, 'November'),
(4, 'Oktober'),
(3, 'September');

-- --------------------------------------------------------

--
-- Table structure for table `mst_guru`
--

CREATE TABLE `mst_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nuptk` varchar(30) DEFAULT NULL,
  `nama_guru` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('ISLAM','KATOLIK','PROTESTAN','HINDU','BUDHA','KONGHUCU') NOT NULL,
  `alamat_jalan` varchar(255) NOT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` int(10) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `aktif_guru` char(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_guru`
--

INSERT INTO `mst_guru` (`id_guru`, `nip`, `nik`, `nuptk`, `nama_guru`, `password`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat_jalan`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kode_pos`, `telepon`, `hp`, `email`, `kewarganegaraan`, `foto`, `id_jabatan`, `aktif_guru`) VALUES
(1, '839283928', '839283928', '839283928', 'ahmad', '839283928', 'Laki-Laki', '839283928', '2021-09-01', 'ISLAM', '839283928', '32', '43', '839283928', '839283928', 839283928, '839283928', '839283928', 'sjdkjks@gmail.com', 'WNI', '', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `mst_informasi_keuangan`
--

CREATE TABLE `mst_informasi_keuangan` (
  `id_informasi` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(100) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_jabatan`
--

CREATE TABLE `mst_jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `hak_akses` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jabatan`
--

INSERT INTO `mst_jabatan` (`id_jabatan`, `nama_jabatan`, `keterangan`, `hak_akses`) VALUES
(2, 'Guru Mapel', '', 'guru'),
(3, 'Guru BK', '', 'gurubk'),
(7, 'Staff TU', '', 'staff'),
(8, 'Administrasi', '', 'kasir'),
(9, 'Admin Akademik', '', 'admin'),
(10, 'Admin Keuangan', '', 'admin'),
(11, 'Bendahara', '', 'bendahara'),
(12, 'Kepala Sekolah', '', 'das'),
(13, 'Wakasek Kesiswaan', '', 'das'),
(14, 'Wakasek Akademik', '', 'das'),
(15, 'Wakasek Sarpas', '', 'das'),
(16, 'Wakasek Humas', '', 'das'),
(17, 'Kapala Kejuruan', '', 'das'),
(18, 'Yayasan Cendikia', '', 'dasview'),
(19, 'Kepala Sekolah (DAS)', '', 'dasview'),
(20, 'Admin Perpustakaan', '', 'admin'),
(21, 'Admin Alumni', '', 'admin'),
(22, 'Admin Buku Tamu', '', 'admin'),
(23, 'Admin PPDB', '', 'admin'),
(24, 'Admin Kelulusan', '', 'admin'),
(25, 'Admin Kantin', '', 'kantin');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jenis_dokumen`
--

CREATE TABLE `mst_jenis_dokumen` (
  `id_jenis_dokumen` int(11) NOT NULL,
  `nama_jenis_dokumen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jenis_dokumen`
--

INSERT INTO `mst_jenis_dokumen` (`id_jenis_dokumen`, `nama_jenis_dokumen`) VALUES
(1, 'Surat Keluar'),
(2, 'Surat Masuk'),
(3, 'Ijazah');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jenis_pembayaran`
--

CREATE TABLE `mst_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL,
  `id_pos_keuangan` int(11) DEFAULT NULL,
  `tipe_pembayaran` enum('Bulanan','Bebas') DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `aktif_jenis_pembayaran` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jenis_pembayaran`
--

INSERT INTO `mst_jenis_pembayaran` (`id_jenis_pembayaran`, `id_pos_keuangan`, `tipe_pembayaran`, `tahun_ajaran`, `aktif_jenis_pembayaran`) VALUES
(4, 2, 'Bebas', '2022/2023', '1'),
(5, 3, 'Bulanan', '2022/2023', '1'),
(6, 4, 'Bulanan', '2022/2023', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jurusan`
--

CREATE TABLE `mst_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(15) DEFAULT NULL,
  `nama_jurusan` varchar(70) DEFAULT NULL,
  `aktif_jurusan` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jurusan`
--

INSERT INTO `mst_jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`, `aktif_jurusan`) VALUES
(1, 'K01', 'MI', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kategori`
--

CREATE TABLE `mst_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kategori`
--

INSERT INTO `mst_kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'English1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kategori_barang`
--

CREATE TABLE `mst_kategori_barang` (
  `id_kategori_barang` int(11) NOT NULL,
  `nama_kategori_barang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_kelas`
--

CREATE TABLE `mst_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(15) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `aktif_kelas` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kelas`
--

INSERT INTO `mst_kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `aktif_kelas`) VALUES
(1, 'k01', 'kko', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kelompok_pelajaran`
--

CREATE TABLE `mst_kelompok_pelajaran` (
  `id_kelompok_pelajaran` int(11) NOT NULL,
  `nama_kelompok_pelajaran` varchar(70) DEFAULT NULL,
  `aktif_kelompok_pelajaran` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kelompok_pelajaran`
--

INSERT INTO `mst_kelompok_pelajaran` (`id_kelompok_pelajaran`, `nama_kelompok_pelajaran`, `aktif_kelompok_pelajaran`) VALUES
(1, 'UMUM', '1'),
(2, 'WAJIB', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kepala_sekolah`
--

CREATE TABLE `mst_kepala_sekolah` (
  `id_kepala_sekolah` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_kepala_sekolah` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `aktif_kepala_sekolah` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_lemari`
--

CREATE TABLE `mst_lemari` (
  `id_lemari` int(11) NOT NULL,
  `nama_lemari` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_lemari`
--

INSERT INTO `mst_lemari` (`id_lemari`, `nama_lemari`) VALUES
(2, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `mst_loker`
--

CREATE TABLE `mst_loker` (
  `id_loker` int(11) NOT NULL,
  `judul_loker` varchar(200) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(200) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_map`
--

CREATE TABLE `mst_map` (
  `id_map` int(11) NOT NULL,
  `nama_map` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_mapel`
--

CREATE TABLE `mst_mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_kelompok_pelajaran` int(11) DEFAULT NULL,
  `kode_mapel` varchar(25) DEFAULT NULL,
  `nama_mapel` varchar(50) DEFAULT NULL,
  `kkm` int(2) DEFAULT NULL,
  `aktif_mapel` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_mapel`
--

INSERT INTO `mst_mapel` (`id_mapel`, `id_kelompok_pelajaran`, `kode_mapel`, `nama_mapel`, `kkm`, `aktif_mapel`) VALUES
(1, 1, 'K01', 'BAHASA ARAB', 90, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_merk`
--

CREATE TABLE `mst_merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_pengumuman_alumni`
--

CREATE TABLE `mst_pengumuman_alumni` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(200) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(200) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_poin_pelanggaran`
--

CREATE TABLE `mst_poin_pelanggaran` (
  `id_poin_pelanggaran` int(11) NOT NULL,
  `nama_poin_pelanggaran` text,
  `poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_poin_pelanggaran`
--

INSERT INTO `mst_poin_pelanggaran` (`id_poin_pelanggaran`, `nama_poin_pelanggaran`, `poin`) VALUES
(1, '  z', 100);

-- --------------------------------------------------------

--
-- Table structure for table `mst_pos_keuangan`
--

CREATE TABLE `mst_pos_keuangan` (
  `id_pos_keuangan` int(11) NOT NULL,
  `nama_pos_keuangan` varchar(100) DEFAULT NULL,
  `aktif_pos_keuangan` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pos_keuangan`
--

INSERT INTO `mst_pos_keuangan` (`id_pos_keuangan`, `nama_pos_keuangan`, `aktif_pos_keuangan`) VALUES
(1, 'BUKU', '1'),
(2, 'SPP', '1'),
(3, 'DPP', '1'),
(4, 'Seragam', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_predikat`
--

CREATE TABLE `mst_predikat` (
  `id_predikat` int(11) NOT NULL,
  `dari_nilai` float DEFAULT NULL,
  `sampai_nilai` float DEFAULT NULL,
  `grade` char(1) DEFAULT NULL,
  `keterangan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_predikat`
--

INSERT INTO `mst_predikat` (`id_predikat`, `dari_nilai`, `sampai_nilai`, `grade`, `keterangan`) VALUES
(1, 1, 49, 'D', 'Kurang'),
(2, 50, 69, 'C', 'Cukup'),
(3, 70, 84, 'B', 'Baik'),
(4, 85, 100, 'A', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `mst_rak`
--

CREATE TABLE `mst_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_ruangan`
--

CREATE TABLE `mst_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_sanksi`
--

CREATE TABLE `mst_sanksi` (
  `id_sanksi` int(11) NOT NULL,
  `dari_poin` int(3) DEFAULT NULL,
  `sampai_poin` int(3) DEFAULT NULL,
  `sanksi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_sanksi`
--

INSERT INTO `mst_sanksi` (`id_sanksi`, `dari_poin`, `sampai_poin`, `sanksi`) VALUES
(1, 10, 29, 'Teguran lisan ke siswa'),
(2, 30, 49, 'Teguran tertulis ke Orang Tua'),
(3, 50, 74, 'Panggilan Orang Tua ke-1 '),
(4, 75, 99, 'Panggilan Orang Tua ke-2, dan siswa disekors selama 3 hari'),
(5, 76, 100, 'Pemanggilan Orang Tua ke-3, dan siswa disekors selama 7 hari'),
(6, 101, 125, 'Pemanggilan Orang Tua ke-4, dan siswa disekors selama 10 hari'),
(7, 126, 150, 'Dikembalikan kepada orang tua (Drop Out).');

-- --------------------------------------------------------

--
-- Table structure for table `mst_sekolah`
--

CREATE TABLE `mst_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `npsn` varchar(50) DEFAULT NULL,
  `nss` varchar(50) DEFAULT NULL,
  `alamat` text,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kodepos` varchar(15) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `wa` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `ig` varchar(150) NOT NULL,
  `youtube` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_sekolah`
--

INSERT INTO `mst_sekolah` (`id`, `nama_sekolah`, `npsn`, `nss`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `no_telepon`, `website`, `email`, `logo`, `wa`, `fb`, `ig`, `youtube`) VALUES
(1, 'SEKOLAHKU', '12345678', '12345678', 'Jl. Pangeran Asis Aplikasi Sistem Sekolah', 'ASIS', 'ASIS', 'ASIS', NULL, '12345', '082289663344', 'www.sekolahku.my.id', 'almairastudio@gmail.com', '68ed80301b398a57e32f38bf35ed6055.png', '6282289663344', 'https://www.facebook.com/groups/181558652941070/', 'https://www.instagram.com/almairastudio/', 'https://www.youtube.com/channel/UCvxUcrQCxs9INxRknnQZ7FA');

-- --------------------------------------------------------

--
-- Table structure for table `mst_siswa`
--

CREATE TABLE `mst_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Katolik','Protestan','Budha','Hindu','Konghucu') DEFAULT NULL,
  `alamat_jalan` varchar(200) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `pendidikan_ayah` varchar(25) DEFAULT NULL,
  `pekerjaan_ayah` varchar(25) DEFAULT NULL,
  `no_hp_ayah` varchar(15) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pendidikan_ibu` varchar(25) DEFAULT NULL,
  `pekerjaan_ibu` varchar(25) DEFAULT NULL,
  `no_hp_ibu` varchar(15) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `pendidikan_wali` varchar(25) DEFAULT NULL,
  `pekerjaan_wali` varchar(25) DEFAULT NULL,
  `no_hp_wali` varchar(15) DEFAULT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `status_sekolah` varchar(15) DEFAULT NULL,
  `alamat_sekolah` varchar(250) DEFAULT NULL,
  `tahun_lulus` varchar(4) DEFAULT NULL,
  `aktif_siswa` char(1) DEFAULT '1',
  `email_ortu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_siswa`
--

INSERT INTO `mst_siswa` (`id_siswa`, `nis`, `nisn`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat_jalan`, `kelurahan`, `kecamatan`, `kode_pos`, `telepon`, `hp`, `email`, `foto`, `angkatan`, `id_kelas`, `password`, `nama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `no_hp_ayah`, `nama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `no_hp_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `no_hp_wali`, `nama_sekolah`, `status_sekolah`, `alamat_sekolah`, `tahun_lulus`, `aktif_siswa`, `email_ortu`) VALUES
(1, '832883298', NULL, 'jkjk', 'Perempuan', 'ndsjkdjsk', '1970-01-01', 'Islam', 'dslkdl', 'klk', 'lk', NULL, '898', '8989', 'dsjkdjsk@gmail.com', 'f0e66e57a499e24cf844e9cdd25fef9e.png', '2021', 1, '832883298', 'jdksjdkjk', 'Tidak Sekolah', 'dsdsds', '8989898989', 'dsjdksj', 'SD', 'dkslkdls', '0787878', 'dksjkdsjk', 'SD', 'dsdskjdk', '78878787878', 'xjsjdksj', 'NEGERI', 'kjkkjk', '2021', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_slideshow`
--

CREATE TABLE `mst_slideshow` (
  `id_slideshow` int(11) NOT NULL,
  `file_gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_slideshow`
--

INSERT INTO `mst_slideshow` (`id_slideshow`, `file_gambar`) VALUES
(5, '44585c956406393e3eeb3037790577ee.jpg'),
(6, '7019017315d295f6b02790c8053ccbe3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_staff`
--

CREATE TABLE `mst_staff` (
  `id_staff` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_staff` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('ISLAM','KATOLIK','PROTESTAN','HINDU','BUDHA','KONGHUCU') DEFAULT NULL,
  `alamat_jalan` varchar(255) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` int(10) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `aktif_staff` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_sumber`
--

CREATE TABLE `mst_sumber` (
  `id_sumber` int(11) NOT NULL,
  `nama_sumber` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_sumber`
--

INSERT INTO `mst_sumber` (`id_sumber`, `nama_sumber`) VALUES
(4, 'Dinas Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tahun_ajaran`
--

CREATE TABLE `mst_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_ajaran` char(9) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `aktif_tahun_ajaran` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_tahun_ajaran`
--

INSERT INTO `mst_tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `semester`, `aktif_tahun_ajaran`) VALUES
(1, '2018/2019', 1, '0'),
(2, '2019/2020', 1, '0'),
(3, '2019/2020', 2, '0'),
(4, '2022/2023', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_urut`
--

CREATE TABLE `mst_urut` (
  `id_urut` int(11) NOT NULL,
  `nama_urut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_urut`
--

INSERT INTO `mst_urut` (`id_urut`, `nama_urut`) VALUES
(1, '001'),
(2, '002'),
(3, '003');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `level` char(1) DEFAULT '1',
  `saldo` int(12) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `nama`, `username`, `password`, `id_jabatan`, `level`, `saldo`, `foto`) VALUES
(2, 'Rini Yulianti', '12', '12', 2, '1', 0, ''),
(4, 'Yusuf Kurniawan', 'yusuf', '123', 9, '1', 0, ''),
(5, 'Nini Ninu', 'nini', '123', 10, '1', 0, ''),
(6, 'Admin BK', 'bk', 'bk', 3, '1', 0, ''),
(7, 'Admin KASIR', 'kasir', 'kasir', 8, '1', 0, ''),
(8, 'Admin Akademik', 'akademik', '19112014', 14, '1', 0, ''),
(9, 'Waka Kesiswaan', 'hendi', '123', 13, '1', 0, ''),
(10, 'Waka Humas', 'idrus', 'idrus', 16, '1', 0, ''),
(11, 'Yayasan', 'yayasan', '123', 18, '1', 0, ''),
(12, 'Kejuruan', 'kejuruan', 'kejuruan', 17, '1', 0, ''),
(13, 'Sarpras', 'sarpras', '123', 15, '1', 0, ''),
(14, 'Bendahara', 'bendahara', '456', 11, '1', 0, ''),
(15, 'Kepses', 'kepsek', '212', 19, '1', 0, ''),
(16, 'Admin Perpus', 'perpus', '123456', 20, '1', 0, ''),
(17, 'Admin Alumni', 'alumni', '123', 21, '1', 0, ''),
(18, 'Admin PPDB', 'adminppdb', '123456', 23, '1', 0, ''),
(19, 'Kasir Kantin', 'kantin', 'kantin', 25, '1', 0, ''),
(20, 'yanto', 'yanto', 'yanto', 25, '1', 9000, '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_walikelas`
--

CREATE TABLE `mst_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_walikelas`
--

INSERT INTO `mst_walikelas` (`id_walikelas`, `id_guru`, `id_kelas`, `tahun_ajaran`) VALUES
(1, 1, 1, '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_capaian_hasil_belajar`
--

CREATE TABLE `nilai_capaian_hasil_belajar` (
  `id_nilai_capaian_hasil_belajar` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL,
  `spiritual_predikat` char(1) DEFAULT NULL,
  `spiritual_deskripsi` text,
  `sosial_predikat` char(1) DEFAULT NULL,
  `sosial_deskripsi` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekstrakulikuler`
--

CREATE TABLE `nilai_ekstrakulikuler` (
  `id_nilai_ekstrakulikuler` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL,
  `kegiatan` text,
  `nilai` float DEFAULT NULL,
  `deskripsi` text,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_harian`
--

CREATE TABLE `nilai_harian` (
  `id_nilai_harian` int(11) NOT NULL,
  `kategori` varchar(200) DEFAULT NULL,
  `keterangan` text,
  `tanggal` date DEFAULT NULL,
  `id_jadwal_pelajaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_harian_detail`
--

CREATE TABLE `nilai_harian_detail` (
  `id_nilai_harian_detail` int(11) NOT NULL,
  `id_nilai_harian` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_prestasi`
--

CREATE TABLE `nilai_prestasi` (
  `id_nilai_prestasi` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL,
  `kegiatan` text,
  `keterangan` text,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_prestasi`
--

INSERT INTO `nilai_prestasi` (`id_nilai_prestasi`, `id_siswa`, `id_kelas`, `id_tahun_ajaran`, `kegiatan`, `keterangan`, `tanggal`) VALUES
(1, 1, 1, 4, NULL, NULL, '2021-09-05 20:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_raport`
--

CREATE TABLE `nilai_raport` (
  `id_nilai_raport` int(11) NOT NULL,
  `id_jadwal_pelajaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `kkm` float DEFAULT NULL,
  `nilai_pengetahuan` float DEFAULT NULL,
  `predikat_pengetahuan` char(1) DEFAULT NULL,
  `deskripsi_pengetahuan` text,
  `nilai_keterampilan` float DEFAULT NULL,
  `predikat_keterampilan` char(1) DEFAULT NULL,
  `deskripsi_keterampilan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_uts`
--

CREATE TABLE `nilai_uts` (
  `id_nilai_uts` int(11) NOT NULL,
  `id_jadwal_pelajaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `kkm` int(2) DEFAULT NULL,
  `nilai_pengetahuan` float DEFAULT NULL,
  `nilai_keterampilan` float DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `nama`, `keterangan`, `gambar`) VALUES
(3, 'Music Class', 'Decor ostdcaer urabitur ultrices posuere mattis. Nam ullamcorper, diam sit amet euismod pelleontesque, eros risus rhoncus libero, invest tibulum nisl ligula', '09f8de51cd97016a829a1f46e2565d06.jpg'),
(4, 'Yoga Class', 'Rabitur ultrices posuere mattis. Nam ullamcorper, diam sit euismod pelleo ntesque, eros risus rhoncus libero, invest tibulum nisl gedretu osterftra ligula', '2ec08abb9d6c977f7dd568cbab1ba54c.jpg'),
(5, 'Kung fu Class', 'Curabitur ultrices posuere mattis. Nam ullamcorper, diam sit amet euismod pelleo ntesque, eros risus rhoncus libero, invest tibulum nisl ligula', '7cd0722772411a2a6b9e5943ddf953b3.jpg'),
(6, 'Active Learning', 'Curabitur ultrices posuere mattis. Nam ullamcorper, diam sit amet euismod pelleo ntesque, eros risus rhoncus libero, invest tibulum nisl ligula', 'e6269a6f6f8f1360bb7d8ef79d6a19d5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text,
  `author` varchar(50) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `judul`, `isi`, `author`, `tgl_posting`) VALUES
(1, 'Struktur Organisasi', '<p><img alt=\"\" src=\"/supercms/asset/plugins/kcfinder/upload/images/Struktur%20Organisasi.png\" style=\"height:290px; width:1039px\" /></p>\r\n', 'admin', '2016-05-09'),
(2, 'Visi dan Misi', '<h2 style=\"text-align:center\"><strong>VISI</strong></h2>\r\n\r\n<h2 style=\"text-align:center\"><strong>MENJADI SEKOLAH ISLAMI DAN UNGGUL</strong></h2>\r\n\r\n<h2 style=\"text-align:center\"><strong>MISI</strong></h2>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px; text-align:center\">Mewujudkan nilai-nilai islam melalui penyelenggaraan sekolah.</div>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px; text-align:center\">Menumbuhkan kesadaran siswa untuk mengaplikasikan nilai-nilai islam dalam kehidupan sehari-hari</div>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px; text-align:center\">Menumbuhkan semangat membaca dan menghafal Al Qur&rsquo;an.</div>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px; text-align:center\">Melaksanakan pembelajaran dan bimbingan yang islami secara efektif sehingga setiap siswa berkembang secara optimal sesuai dengan potensi yang dimiliki.</div>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px; text-align:center\">Menumbuhkan semangat siswa untuk berkompetisi dan berdaya saing</div>\r\n\r\n<div style=\"background:transparent; border:0px; padding:0px; text-align:center\">Menumbuhkan semangat keunggulan secara intensif kepada seluruh warga sekolah</div>\r\n', 'admin', '2016-05-09'),
(3, 'Profil Singkat', '<p style=\"text-align:justify\"><strong>Profil Sekolah SDIT Permata Bunda II</strong></p>\r\n\r\n<p style=\"text-align:justify\">SDIT Permata Bunda II adalah SIT ( Sekolah Islam Terpadu ) pertama yang berada di kecamatan Teluk Betung Selatan. SDIT Permata Bunda II berdiri sejak tanggal 12 Juli 2010 dan merupakan cabang dari SDIT Permata Bunda I Rajabasa. Sekolah ini sudah mendapat izin operasional sejak tahun 2012 dan mendapatkan Bantuan Operasional Sekolah (BOS) pada tahun 2013.</p>\r\n\r\n<p style=\"text-align:justify\">Latar belakang didirikan sekolah ini adalah untuk memenuhi kebutuhan masyarakat yang berdomilisi di wilayah Teluk dan sekitarnya yang ingin menyekolahkan anaknya di Sekolah Islam Terpadu (SIT).</p>\r\n\r\n<p style=\"text-align:justify\">SDIT Permata Bunda II berada di lokasi yang strategis, sangat dekat dengan pusat kota dan perkantoran, walaupun belum ada akses fasilitas kendaraan umum yang melintas dijalan sekitar sekolah. Animo masyarakat untuk menyekolahkan anaknya di SDIT Peramata Bunda II sangat tinggi. Hal ini terbukti dengan meningkatnya pendaftaran calon siswa baru di setiap tahunnya.</p>\r\n\r\n<p style=\"text-align:justify\">Saat ini, SDIT Permata Bunda II sudah memasuki tahun ke- 5, dan sudah ada 5 jenjang kelas dan mulai meluluskan siswa kelas VI ditahun 2016</p>\r\n\r\n<p style=\"text-align:justify\"><strong>&ldquo; Menjadi Sekolah Islami Dan Unggul&rdquo;</strong>&nbsp;menjadi visi sekolah saat ini, dan harapannya bias menjadi ruh seluruh warga sekolah untuk selalu menjadi sekolah islami dan unggul. Sekolah masih dalam kondisi pembangunan yang dilaksanakan secara bertahap, sudah banyak prestasi sekolah yang diraih, baik dari tingkat kecamatan, kabupaten, hingga tingkat propinsi, dalam bidang akademik, pidato, tahfidz, olahraga, dan seni.</p>\r\n\r\n<p style=\"text-align:justify\">Program unggulan di SDIT Permata Bunda II adalah program Tahsin- Tahfidz dengan target bias membaca alquran dengan baik dan benar dan hafalan 2 juz (juz 29 dan 30).</p>\r\n', 'admin', '2016-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_siswa`
--

CREATE TABLE `pelanggaran_siswa` (
  `id_pelanggaran_siswa` int(11) NOT NULL,
  `id_poin_pelanggaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `poin_minus` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `id_absen` int(11) DEFAULT NULL,
  `id_penginput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggaran_siswa`
--

INSERT INTO `pelanggaran_siswa` (`id_pelanggaran_siswa`, `id_poin_pelanggaran`, `id_siswa`, `id_kelas`, `poin_minus`, `tanggal`, `tahun_ajaran`, `id_absen`, `id_penginput`) VALUES
(1, 1, 1, 1, 100, '2021-09-17', '2022/2023', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_bebas`
--

CREATE TABLE `pembayaran_bebas` (
  `id_pembayaran_bebas` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `tagihan` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_bebas`
--

INSERT INTO `pembayaran_bebas` (`id_pembayaran_bebas`, `id_jenis_pembayaran`, `id_siswa`, `id_kelas`, `tagihan`) VALUES
(4, 4, 1, 1, 300000),
(5, 6, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_bebas_dt`
--

CREATE TABLE `pembayaran_bebas_dt` (
  `id_pembayaran_bebas_dt` int(11) NOT NULL,
  `id_pembayaran_bebas` int(11) DEFAULT NULL,
  `bayar` float DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_bebas_dt`
--

INSERT INTO `pembayaran_bebas_dt` (`id_pembayaran_bebas_dt`, `id_pembayaran_bebas`, `bayar`, `tanggal`) VALUES
(2, 4, 150000, '2021-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_bulanan`
--

CREATE TABLE `pembayaran_bulanan` (
  `id_pembayaran_bulanan` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `bulan` varchar(15) DEFAULT NULL,
  `tagihan` float DEFAULT NULL,
  `bayar` float DEFAULT '0',
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_bulanan`
--

INSERT INTO `pembayaran_bulanan` (`id_pembayaran_bulanan`, `id_jenis_pembayaran`, `id_siswa`, `id_kelas`, `bulan`, `tagihan`, `bayar`, `tanggal`) VALUES
(25, 5, 1, 1, 'Juli', 980000, 980000, '2021-09-01'),
(26, 5, 1, 1, 'Agustus', 980000, 980000, '2021-09-01'),
(27, 5, 1, 1, 'September', 980000, 980000, '2021-09-05'),
(28, 5, 1, 1, 'Oktober', 980000, 0, '0000-00-00'),
(29, 5, 1, 1, 'November', 980000, 0, '0000-00-00'),
(30, 5, 1, 1, 'Desember', 980000, 0, '0000-00-00'),
(31, 5, 1, 1, 'Januari', 980000, 0, '0000-00-00'),
(32, 5, 1, 1, 'Febuari', 980000, 0, '0000-00-00'),
(33, 5, 1, 1, 'Maret', 980000, 0, '0000-00-00'),
(34, 5, 1, 1, 'April', 980000, 0, '0000-00-00'),
(35, 5, 1, 1, 'Mei', 980000, 0, '0000-00-00'),
(36, 5, 1, 1, 'Juni', 980000, 0, '0000-00-00'),
(37, 6, 1, 1, 'Juli', 200000, 0, '0000-00-00'),
(38, 6, 1, 1, 'Agustus', 300000, 0, '0000-00-00'),
(39, 6, 1, 1, 'September', 100000, 0, '0000-00-00'),
(40, 6, 1, 1, 'Oktober', 100000, 0, '0000-00-00'),
(41, 6, 1, 1, 'November', 100000, 0, '0000-00-00'),
(42, 6, 1, 1, 'Desember', 100000, 0, '0000-00-00'),
(43, 6, 1, 1, 'Januari', 100000, 0, '0000-00-00'),
(44, 6, 1, 1, 'Febuari', 100000, 0, '0000-00-00'),
(45, 6, 1, 1, 'Maret', 100000, 0, '0000-00-00'),
(46, 6, 1, 1, 'April', 100000, 0, '0000-00-00'),
(47, 6, 1, 1, 'Mei', 100000, 0, '0000-00-00'),
(48, 6, 1, 1, 'Juni', 100000, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman` int(11) NOT NULL,
  `no_peminjaman` varchar(15) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `status_input` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku_dt`
--

CREATE TABLE `peminjaman_buku_dt` (
  `id_peminjaman_dt` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `tanggal_kembali_asli` date DEFAULT NULL,
  `telat` int(11) DEFAULT NULL,
  `denda` float DEFAULT NULL,
  `status_input_dt` char(1) DEFAULT '0',
  `status_pinjam_dt` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_piket`
--

CREATE TABLE `peminjaman_piket` (
  `id_peminjaman_piket` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `keterangan_pinjam` text,
  `tanggal_pinjam` date DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_siswa`
--

CREATE TABLE `peminjaman_siswa` (
  `id_peminjaman_siswa` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `keterangan_pinjam` text,
  `tanggal_pinjam` date DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `id_penginput` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_penerimaan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jumlah` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_kelulusan`
--

CREATE TABLE `pengaturan_kelulusan` (
  `id` int(11) NOT NULL,
  `banner_header` varchar(150) NOT NULL,
  `tanggal_pengumuman` datetime DEFAULT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  `informasi_kelulusan` text NOT NULL,
  `informasi_lain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_kelulusan`
--

INSERT INTO `pengaturan_kelulusan` (`id`, `banner_header`, `tanggal_pengumuman`, `tahun`, `informasi_kelulusan`, `informasi_lain`) VALUES
(1, '8196a77a4e3ad335d28efe136d00c1ce.png', '2021-03-13 20:17:00', '2020', 'Contohxasasasa', 'Contohasasa');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_perpus`
--

CREATE TABLE `pengaturan_perpus` (
  `id` int(11) NOT NULL,
  `denda` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_perpus`
--

INSERT INTO `pengaturan_perpus` (`id`, `denda`) VALUES
(1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jumlah` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(80) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(100) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(5, 'Tes Informasi Pengumuman', 'ini bagian deskripsi\r\nini deskripsi sebelum gambar', '8bdeafeb00a515fc88faa5778a5f8885.jpg', '2020-03-08 06:31:03'),
(6, 'Tes no Gambar', 'oke lah kalau begitu', NULL, '2020-03-08 06:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung_perpus`
--

CREATE TABLE `pengunjung_perpus` (
  `id_pengunjung` int(11) NOT NULL,
  `nis` varchar(25) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `keperluan` varchar(80) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_admin`
--

CREATE TABLE `pesan_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subjek` varchar(250) DEFAULT NULL,
  `message` text,
  `tgl_kirim` date DEFAULT NULL,
  `baca` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text,
  `author` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `visited` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `isi`, `author`, `gambar`, `id_kategori`, `tgl_posting`, `visited`) VALUES
(5, 'Activities Improves Mind', '<p>Roin bibendum nibhsds. Nuncsdsd fermdada msit ametadasd consequat. Praes porr nulla sit amet dui lobortis, id venenatis nibh accums. Proin lobortis tempus odio eget venenatis. Proin fermentum ut massa at bibendum. Proin bibendum non est quis egestas. Pellentesque at enim id enim tempus placerat. Etiam tempus gravida leo, et gravida justo bibendum non. Suspendisse vitae fermentum sapien.</p>\r\n', 'admin', 'af8a9fed4ae770914e7a8133f555baf4.jpg', 1, '2016-04-30', '12'),
(6, 'MUNAQOSAH HIFZIL QURAN', '<p>SDIT Permata Bunda II mengadakan MUNAQOSAH HIFZIL QURAN JUZ 30 &nbsp;yang dilaksanakan pada pada hari Sabtu tanggal 5 Maret dan 12 Maret 2016 kemarin, dengan jumlah peserta 108 siswa yang terdiri dari &nbsp;siswa-siswi&nbsp; kelas 3, 4, 5, dan 6 &nbsp;yang mengajukan diri mengikuti munaqosah melalui pendaftaran yang dilakukan oleh panitia munaqosah.</p>\r\n\r\n<p>Sudah menjadi salah satu target kelulusan sekolah bahwa siswa-siswi SDIT Permata Bunda bisa memiliki hafalan Quran sebanyak 2 juz yaitu juz 29 dan juz 30 setelah mereka lulus&nbsp; dengan kualitas hafalan yang baik. Namun untuk mencapai itu semua tidaklah mudah, diperlukan program yang mendukung serta kerjasama yang baik antara guru dan orangtua di rumah.</p>\r\n\r\n<p>Salah satu program yang digulirkan sekolah dalam rangka menjaga &nbsp;hafalan yang sudah dicapai siswa-siswi SDIT Permata Bunda II adalah Munaqosah Hifzil Quran Juz 30.&nbsp; Dalam kegiatan munaqosah ini peserta akan diuji hafalannya mulai dari surat An Naas sampai surat An Naba oleh dua orang guru penguji. Nilai minimum kelulusan munaqosah adalah 75 dari seluruh rata-rata nilai ujian hafalan juz 30 yang diambil dengan predikat&nbsp;<em>jayyid</em>&nbsp;sedang nilai tertinggi mendapat predikat&nbsp;<em>mumtaz</em>. Siswa yang &nbsp;mendapat nilai di bawah 75 maka dinyatakan tidak lulus dan diharuskan mengikuti munaqosah periode berikutnya.</p>\r\n\r\n<p>Orangtua siswa dalam kegiatan ini juga diajak kerjasama dengan membimbing dan memotivasi putra-putrinya untuk mengulang-ulang hafalan juz 30 di rumah yang &nbsp;dikontrol melalui kartu kendali yang dibagikan dari sekolah. Sehingga siswa benar-benar mempersiapkan dengan baik hafalan Qurannya sebelum mengikuti munaqosah.</p>\r\n', 'admin', 'dc8b43062cd9a67924955aec6d7bb361.jpg', 1, '2016-05-02', '15'),
(7, '4 LANGKAH CARA CEPAT BELAJAR MEMBACA AL QURAN', '<h3><span style=\"font-size:13px; line-height:1.6em\">Adalah luar biasa, jika Anda mau membaca artikel Cara Cepat Belajar Membaca Al Quran ini. Tahukah Anda, 60% penduduk Indonesia masih belum bisa membaca Al Quran. Miris memang, padahal Indonesia adalah negara Muslim terbesar di dunia.</span></h3>\r\n\r\n<p>Anda tidak perlu malu, jika saat ini masih belum bisa membaca Al Quran, selama Anda masih mau belajar. Yang perlu malu adalah mereka yang tidak punya niat dalam hatinya mau belajar membaca al Quran. Membuka facebook setiap hari, tepi membuka al Quran begitu jarangnya. Membeli hand phone mahal bisa, membuku Al Quran dan buku cara membaca Al Quran begitu berat.</p>\r\n\r\n<p>Kenapa?</p>\r\n\r\n<p>Niat yang tidak ada. Saya yakin, jika ada niat, dia akan mampu.</p>\r\n\r\n<p>Saya yakin, jika Anda membaca artikel ini, Anda punya niat untuk bisa membaca Al Quran atau punya niat ingin mengajarkan membaca Al Quran. Saya menghargai niat Anda. Baik Anda yang mau belajar atau Anda mau mengajarkan kepada orang lain, maka langkah pertama yang perlu kita tanamkan ke hati orang yang mau belajar adalah memiliki niat yang kuat. Dan terpenting, niat yang ikhlas karena Allah semata.</p>\r\n\r\n<h3>Langkah Kedua Cara Cepat Belajar Membaca Al Quran Adalah Memahami Kebaikannya</h3>\r\n\r\n<p>Mungkin, motivasi orang yang kecil untuk belajar membaca al Quran adalah karena belum memahami kebaikan yang akan dia dapatkan jika mau membaca Al Quran.</p>\r\n\r\n<p>Coba kita simak, beberapa hadist yang menjelaskan kebaikan yang akan didapatkan bagi pembaca Al Quran:</p>\r\n\r\n<p>Sabda Nabi Muhammad saw: &ldquo;<em>Sebaik-baik kalian adalah siapa yang memperlajari al-Qur&rsquo;an dan mengamalkannya</em>.&rdquo; (HR. Bukhari)</p>\r\n\r\n<p>Sabda Nabi Muhammad saw: &ldquo;<em>Siapa saja membaca satu huruf dari Kitab Allah (Al-Qur&rsquo;an), maka baginya satu kebaikan, dan satu kebaikan itu dibalas dengan sepuluh kali lipatnya</em>.&rdquo; (HR. At-Tirmidzi).</p>\r\n\r\n<p>Sabda Nabi Muhammad saw: &ldquo;<em>Perumpamaan orang yang membaca al-Qur&rsquo;an sedang ia hafal dengannya bersama para malaikat yang suci dan mulia, sedang perumpamaan orang yang membaca al-Qur&rsquo;an sedang ia senantiasa melakukannya meskipun hal itu sulit baginya maka baginya dua pahala</em>.&rdquo; (Muttafaq &lsquo;alaih).</p>\r\n\r\n<p>&ldquo;<em>Siapa saja membaca al-Qur&rsquo;an, mempelajarinya dan mengamalkannya, maka dipakaikan kepada kedua orang tuanya pada hari kiamat mahkota dari cahaya dan sinarnya bagaikan sinar matahari, dan dikenakan pada kedua orang tuanya dua perhiasan yang nilainya tidak tertandingi oleh dunia. Keduanya pun bertanya, &lsquo;bagaimana dipakaikan kepda kami semuanya itu?&rsquo; Dijawab, &lsquo;karena anakmu telah membawa al-Qur&rsquo;an</em>&rdquo;. (HR. Al-Hakim).</p>\r\n\r\n<p>Sabda Nabi Muhammad saw: &ldquo;<em>Bacalah al-Qur&rsquo;an karena ia akan datang pada hari kiamat sebagai pemberi syafa&rsquo;at kepada para ahlinya</em>.&rdquo; (HR. Muslim) Dan sabda beliau Nabi Muhammad saw: &ldquo;<em>Puasa dan Al-Qur&rsquo;an keduanya akan memberikan syafa&rsquo;at kepada seorang hamba pada hari kiamat</em>&hellip;&rdquo; (HR. Ahmad dan Al-Hakim).</p>\r\n\r\n<p>Dan masih banyak lagi, baik Hadist maupun ayat Al Quran yang jika dibahas semua disini akan sangat panjang. Saya cukupkan dulu beberapa hadist yang sudah menggambarkan bagaimana manfaat dari membaca Al Quran.</p>\r\n\r\n<p>Nah, ingat-ingat manfaat ini, hujamkan dalam hati supaya kita mendapatkannya.</p>\r\n\r\n<p>Bukan karena malu, bukan karena ini mendapatkan pujian, tetapi karena ingin mendapatkan balasan dan ridha Allah semata.</p>\r\n\r\n<p>Malu harus. Tapi bukan malu kepada manusia, tetapi malu kepada Allah dimana kita diberikan mata, kemampuan membaca, dan kemampuan secara ekonomi (semua itu nikmat dari Allah) tapi masih belum bisa membaca Al Quran.</p>\r\n\r\n<h3>Langkah Ketiga: Luangkan Waktu Yang Cukup</h3>\r\n\r\n<p>Ironis memang, mengapa banyak orang yang &ldquo;tidak punya waktu&rdquo; untuk belajar membaca al Quran. Padahal waktu yang kita miliki adalah nikmat dari Allah tetapi begitu sulit menyisihkan waktu untuk belajar membaca Al Quran.</p>\r\n\r\n<p>Mungkin Anda berkata, saya membutuhkan metode Cara Cepat Belajar Membaca Al Quran karena waktu saya yang sempit. Ya, tentu saja.</p>\r\n\r\n<p>Mari kita renungkan, waktu milik Allah, diri kita milik Allah, tapi mengapa waktu untuk membaca kalam Allah begitu sulit?</p>\r\n\r\n<p>OK, nanti kita akan bahas cara atau metode agar kita bisa belajar secara cepat. Namun yang terpenting adalah, apakah setelah bisa nanti ada waktu untuk membacanya secara rutin?</p>\r\n\r\n<p>Sebenarnya, bukan tidak ada waktu. Tapi, sejauh mana Anda memprioritaskan hal ini. Jika Anda masih mengatakan tidak ada waktu untuk belajar dan membaca Al Quran, artinya aktivitas lain jauh lebih penting. Sebenarnya&nbsp;<a href=\"http://www.motivasi-islami.com/anda-punya-waktu/\" target=\"_blank\">Anda punya waktu</a>.</p>\r\n\r\n<p>Anda akan lebih cepat pintar atau pandai membaca Al Quran jika waktu yang dialokasikan cukup. Semakin banyak waktu yang dialokasikan, akan semakin cepat lancar atau fasih.</p>\r\n\r\n<h3>Langkah Keempat: Gunakan Metode Cara Cepat Membaca Al Quran</h3>\r\n\r\n<p>Perkembangan teknologi dan ilmu pengetahuan saat ini, sangat memungkinkan untuk melahirkan sebuah metode atau cara yang mempercepat proses belajar membaca. Saya tidak menafikan metode lama, yang saya lakukan waktu masih kecil dulu. Terbukti efektif dan hasilnya cukup melekat.</p>\r\n\r\n<p>Kita juga tidak perlu alergi dengan metode baru, hasil pengembangan ilmu pengetahuan dan teknologi yang memungkinkan kita bisa belajar dengan cepat. Sekarang sudah banyak dikembangkan teknik, cara, metode&nbsp; atau apa pun namanya yang bisa mempermudah cara kita belajar membaca Al Quran.</p>\r\n\r\n<p>Salah satu yang fenomenal adalah metode Iqra. Kemudian dikembangkan lagi menjadi berbagai metode lagi seperti metode Ummi dan metode Albana. Semuanya untuk mempermudah (bukan menyulitkan) umat Islam untuk membaca Al Quran. Kenapa harus alergi?</p>\r\n\r\n<p>Menurut sepengetahuan saya, metode Iqra, Albana, dan Ummi adalah sebuah metode yang memberikan penanaman kebiasaan yang baik dan benar dalam membaca Al Quran. Hasilnya luar biasa, banyak sekolah yang sudah menerapkan metode ini. Anak saya di sekolahnya menggunakan metode Ummi.</p>\r\n\r\n<p>Termasuk yang terbaru adalah metode Rubaiyat. Agak berbeda dengan metode sebelumnya yang fokus menanamkan kebiasaan dan konsistensi, metode Rubaiyat adalah fokusnya pada kecepatan dan kemudahan untuk segera bisa membaca. Nah, jika Anda orang dewasa yang cukup sibuk, metode ini cocok untuk Anda.</p>\r\n\r\n<p>Metode Rubaiyat sudah diuji selama 15 tahun dan baru diluncurkan beberapa tahun ini, bisa menjadi alternatif bagi Anda yang sibut dan ingin cepat bisa membaca Al Quran. Keunggulan lainnya adalah Anda bisa belajar secara mandiri.</p>\r\n\r\n<p>Memang, tidak akan langsung lancar dan fasih benar. Target utamanya adalah bisa dulu. Tentu harus dilanjutkan belajarnya dengan tahsin agar bacaanya tartil, tapi bukan ini tujuan utama metode rubaiyat. Jika Anda mau menggunakan metode rubaiyat, Anda bisa belajar mandiri dengan buku dan video yang bisa Anda putar di rumah.</p>\r\n\r\n<p>Anda bisa memesan&nbsp;<a href=\"http://www.langitcerah.com/buku-rubaiyat.html\" target=\"_blank\">Buku dan DVD Metode Rubaiyat disini</a>&nbsp;jika mau.</p>\r\n\r\n<h3>Penutup</h3>\r\n\r\n<p>Rasulullah saw bersabda: &ldquo;<em>Barang siapa yang membaca satu huruf kitab Allah, maka ia akan mendapatkan satu kebaikan dengan huruf itu, dan satu kebaikan akan dilipatgandakan menjadi sepuluh. Aku tidaklah mengatakan Alif Laam Miim itu satu huruf, tetapi alif satu huruf, lam satu huruf dan Mim satu huruf</em>.&rdquo; (HR. Tirmidzi).</p>\r\n\r\n<p>Bagi yang sudah biasa membaca Al Quran, pertahankan dan tingkatkan. Bagi yang belum biasa, yuk biasakan. Bagi yang belum bisa, yuk kita mulai belajar membaca al Quran.</p>\r\n\r\n<p>Mudah-mudahan artikel 4 Langkah Cara Cepat Belajar Membaca Al Quran ini bermanfaat untuk Anda.</p>\r\n', 'admin', '11af7e5efab467a51663c8f557956237.jpg', 2, '2016-05-02', '0'),
(8, 'Kegiatan Sholat Berjamaah ', '<p>Shalat berjamaah merupakan syiar Islam yang sangat agung, menyerupai shafnya malaikat ketika mereka beribadah, dan ibarat pasukan dalam suatu peperangan. Ia merupakan sebab terjadinya saling mencintai sesama muslim, saling mengenal, saling mengasihi, saling menyayangi, menampakkan kekuatan, dan kesatuan.</p>\r\n\r\n<p>Alhamdulillah sholat berjamaah menjadi agenda penting dan utama di SDIT Permata Bunda II. Shalat berjamaah menjadi bagian dari alur belajar sekolah yang dilaksanakan di seluruh jenjang kelas. Bagi siswa kelas bawah (kelas 1, 2, dan 3), mereka melakukan shalat berjamaah di kelas, dengan dibimbing oleh dua guru kelas. Setiap siswa diwajibkan membawa perlengkapan sholat sendiri dan bertanggung jawab untuk merapikan kembali perlengkapan shalatnya sendiri.</p>\r\n\r\n<p>Untuk siswa kelas atas (kelas 4, 5, dan6), mereka mulai dibiasakan untuk melaksanakan shalat berjamah di masjid bersama bapak dan ibu guru. Kebiasaan untuk tertib saat di masjid sudah dimulai dari mereka berjalan menuju masjid, meletakkan sepatu/sandal dengan rapi, masuk masjid, berwudu, dan di dalam masjid. Seluruh siswa menerapkan &quot;silent operation&quot; yaitu bersikap tenang dan tidak banyak bicara saat beraktivitas di masjid baik&nbsp; dalam persiapan shalat maupun sesudah shalat.</p>\r\n\r\n<p>Shalat berjamaah diharapkan dapat membangun karakter siswa menjadi manusia yang disiplin,tertib, bertanggung jawab, dan berakhlak mulia Insyaallah.</p>\r\n', 'admin', '0fd559cb48d2df65cca8f0ca2a801e6f.jpg', 1, '2016-05-02', '0'),
(9, 'Sisg', '<p>sgsg</p>\r\n', 'admin', 'f00bd74069bd2dc6642c8abda559d975.jpg', 1, '2016-05-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_banner`
--

CREATE TABLE `ppdb_banner` (
  `id_banner` int(11) NOT NULL,
  `file_gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_banner`
--

INSERT INTO `ppdb_banner` (`id_banner`, `file_gambar`) VALUES
(4, '5ec43f10a825cb006f98131b1549cd05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_kelulusan`
--

CREATE TABLE `ppdb_kelulusan` (
  `id_kelulusan` int(11) NOT NULL,
  `no_ujian` varchar(25) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `nilai_tpa` varchar(5) DEFAULT NULL,
  `nilai_tpd` varchar(5) DEFAULT NULL,
  `keterangan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_pengaturan`
--

CREATE TABLE `ppdb_pengaturan` (
  `id` int(11) NOT NULL,
  `banner_header` varchar(150) DEFAULT NULL,
  `tentang` text,
  `prosedur` varchar(250) DEFAULT NULL,
  `pengumuman` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_pengaturan`
--

INSERT INTO `ppdb_pengaturan` (`id`, `banner_header`, `tentang`, `prosedur`, `pengumuman`) VALUES
(1, '800e9f8e5750f50d1a5e104a3f599917.png', 'INFO PPDB', 'e0b019067e3abff4ad6a9fefb8b31ba2.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_siswa`
--

CREATE TABLE `ppdb_siswa` (
  `id_ppdb` int(11) NOT NULL,
  `no_pendaftaran` varchar(30) DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `jenis_pendaftaran` varchar(25) DEFAULT NULL,
  `jalur_pendaftaran` varchar(25) DEFAULT NULL,
  `hobi` varchar(55) DEFAULT NULL,
  `cita_cita` varchar(55) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(55) DEFAULT NULL,
  `tanggal_lahir` varchar(15) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `alamat` varchar(155) DEFAULT NULL,
  `rt` varchar(4) DEFAULT NULL,
  `rw` varchar(4) DEFAULT NULL,
  `dusun` varchar(55) DEFAULT NULL,
  `kelurahan` varchar(55) DEFAULT NULL,
  `kabupaten` varchar(55) DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL,
  `tempat_tinggal` varchar(55) DEFAULT NULL,
  `transportasi` varchar(15) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `kewarganegaraan` varchar(15) DEFAULT NULL,
  `foto` varchar(155) DEFAULT NULL,
  `tinggi_badan` varchar(3) DEFAULT NULL,
  `berat_badan` varchar(3) DEFAULT NULL,
  `jarak_ke_sekolah` varchar(4) DEFAULT NULL,
  `waktu_tempuh_ke_sekolah` varchar(4) DEFAULT NULL,
  `jumlah_saudara` varchar(2) DEFAULT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `alamat_sekolah_asal` varchar(255) NOT NULL,
  `nama_ayah` varchar(55) DEFAULT NULL,
  `tahun_lahir_ayah` varchar(4) DEFAULT NULL,
  `pendidikan_ayah` varchar(15) DEFAULT NULL,
  `pekerjaan_ayah` varchar(55) DEFAULT NULL,
  `penghasilan_ayah` varchar(55) DEFAULT NULL,
  `nama_ibu` varchar(55) DEFAULT NULL,
  `tahun_lahir_ibu` varchar(4) DEFAULT NULL,
  `pendidikan_ibu` varchar(15) DEFAULT NULL,
  `pekerjaan_ibu` varchar(55) DEFAULT NULL,
  `penghasilan_ibu` varchar(55) DEFAULT NULL,
  `nama_wali` varchar(55) DEFAULT NULL,
  `tahun_lahir_wali` varchar(4) DEFAULT NULL,
  `pendidikan_wali` varchar(15) DEFAULT NULL,
  `pekerjaan_wali` varchar(55) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  `tanggal_daftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_siswa`
--

INSERT INTO `ppdb_siswa` (`id_ppdb`, `no_pendaftaran`, `nik`, `jenis_pendaftaran`, `jalur_pendaftaran`, `hobi`, `cita_cita`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kabupaten`, `kode_pos`, `tempat_tinggal`, `transportasi`, `no_hp`, `email`, `kewarganegaraan`, `foto`, `tinggi_badan`, `berat_badan`, `jarak_ke_sekolah`, `waktu_tempuh_ke_sekolah`, `jumlah_saudara`, `asal_sekolah`, `alamat_sekolah_asal`, `nama_ayah`, `tahun_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nama_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `status`, `tanggal_daftar`) VALUES
(1, 'PPDB.20200404.001', '12345545', 'Baru', 'Prestasi', 'Makan', 'Presiden', 'ASIS', 'Laki-laki', 'ASIS', '04-04-2020', 'Islam', 'ASIS', '', '', '', '', '', '', 'Asrama', 'Jalan Kaki', '082289663344', 'asis@gmail.com', 'Warga Negara In', '747afdddfc696f1fd95dd644aae06763.jpg', '25', '25', '25', '25', '2', 'ABC', 'BCA', 'AA', '1956', 'D1', 'Buruh', '1 Juta - 1.999.999 Juta', 'BC', '1588', 'D1', 'Buruh', '1 Juta - 1.999.999 Juta', '', '', 'D1', 'Buruh', '1 Juta - 1.999.999 Juta', '1', '2020-04-04 13:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_slideshow`
--

CREATE TABLE `ppdb_slideshow` (
  `id_slideshow` int(11) NOT NULL,
  `file_gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_slideshow`
--

INSERT INTO `ppdb_slideshow` (`id_slideshow`, `file_gambar`) VALUES
(4, '0b01214b952e23773ebfbf0213d15e37.jpg'),
(6, '05506443543680df3bf4b35b07592375.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `keterangan`, `gambar`, `tgl_upload`) VALUES
(3, 'Slide 2', '55130a42732029bbea6e494aaec5a0b6.jpg', '2016-05-02'),
(4, 'Slide 1', 'b98fa376e178a39ca8d950dc7e5b67aa.jpg', '2016-05-02'),
(5, 'Slide 3', 'bb3c3421eeea4f946e881975293d9b53.jpg', '2016-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `nama`, `jabatan`, `keterangan`, `gambar`, `aktif`) VALUES
(2, 'Jack Daniels', 'Senior Supervisor', 'Phasellus lorem augue, vulputate vel orci id, ultricies aliquet risus.', 'af30df2029a96bd9843ad451bca54bff.jpg', 'Y'),
(3, 'Linda Glendell', 'Teaching Professor', 'Phasellus lorem augue, vulputate vel orci id, ultricies aliquet risus.', '7aa98284a5351d3bbc9effc486970c4b.jpg', 'Y'),
(4, 'Kate Dennings', 'Children Diet', 'Phasellus lorem augue, vulputate vel orci id, ultricies aliquet risus.', '256a56c3a3ca96b6c08b7b87bc662004.jpg', 'Y'),
(5, 'Kristof Slinghot', 'Management', 'hasellus lorem augue, vulputate vel orci id, ultricies aliquet risus.', 'f4fcba66aa0852f2d9f608f5bbdd591f.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan_siswa`
--

CREATE TABLE `tabungan_siswa` (
  `id_tabungan_siswa` int(11) NOT NULL,
  `saldo` int(54) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `pengeluaran` int(52) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `id_absen` int(11) DEFAULT NULL,
  `id_penginput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabungan_siswa`
--

INSERT INTO `tabungan_siswa` (`id_tabungan_siswa`, `saldo`, `id_siswa`, `id_kelas`, `pengeluaran`, `tanggal`, `tahun_ajaran`, `id_absen`, `id_penginput`) VALUES
(21, 0, 100, 1, NULL, '2021-09-21', '2022/2023', NULL, 1),
(23, -23001, 1, 1, NULL, '2021-09-21', '2022/2023', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tentang_web`
--

CREATE TABLE `tentang_web` (
  `id` int(11) NOT NULL,
  `nama_situs` varchar(100) DEFAULT NULL,
  `tentang` text,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','tes') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_display`
--

CREATE TABLE `video_display` (
  `id_video` int(11) NOT NULL,
  `judul_video` varchar(100) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_ajar_guru`
--

CREATE TABLE `vw_ajar_guru` (
  `nama_mapel` varchar(50) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `tahun_ajaran` char(9) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_jadwal_pelajaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_bayar_siswa`
--

CREATE TABLE `vw_bayar_siswa` (
  `id_pembayaran_bulanan` int(11) DEFAULT NULL,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `tagihan` float DEFAULT NULL,
  `bayar` float DEFAULT NULL,
  `bulan` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_pos_keuangan` varchar(100) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `tipe_pembayaran` enum('Bulanan','Bebas') DEFAULT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_bayar_siswa_bebas`
--

CREATE TABLE `vw_bayar_siswa_bebas` (
  `nama_pos_keuangan` varchar(100) DEFAULT NULL,
  `id_pembayaran_bebas` int(11) DEFAULT NULL,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `tipe_pembayaran` enum('Bulanan','Bebas') DEFAULT NULL,
  `tagihan` float DEFAULT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_guru`
--

CREATE TABLE `vw_guru` (
  `id_guru` int(11) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama_guru` varchar(150) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `aktif_guru` char(1) DEFAULT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_guru_dt`
--

CREATE TABLE `vw_guru_dt` (
  `nip` varchar(30) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nuptk` varchar(30) DEFAULT NULL,
  `nama_guru` varchar(150) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('ISLAM','KATOLIK','PROTESTAN','HINDU','BUDHA','KONGHUCU') DEFAULT NULL,
  `alamat_jalan` varchar(255) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` int(10) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `aktif_guru` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_jadwal_pelajaran`
--

CREATE TABLE `vw_jadwal_pelajaran` (
  `id_jadwal_pelajaran` int(11) DEFAULT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL,
  `tahun_ajaran` char(9) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `nama_guru` varchar(150) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `nama_mapel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_jenis_bayar`
--

CREATE TABLE `vw_jenis_bayar` (
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `tipe_pembayaran` enum('Bulanan','Bebas') DEFAULT NULL,
  `aktif_jenis_pembayaran` char(1) DEFAULT NULL,
  `nama_pos_keuangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_kepala_sekolah`
--

CREATE TABLE `vw_kepala_sekolah` (
  `id_kepala_sekolah` int(11) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama_kepala_sekolah` varchar(60) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `aktif_kepala_sekolah` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_kepala_sekolah_dt`
--

CREATE TABLE `vw_kepala_sekolah_dt` (
  `id_kepala_sekolah` int(11) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama_kepala_sekolah` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `aktif_kepala_sekolah` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_mapel`
--

CREATE TABLE `vw_mapel` (
  `id_mapel` int(11) DEFAULT NULL,
  `kode_mapel` varchar(25) DEFAULT NULL,
  `nama_mapel` varchar(50) DEFAULT NULL,
  `aktif_mapel` char(1) DEFAULT NULL,
  `kkm` int(2) DEFAULT NULL,
  `nama_kelompok_pelajaran` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_pelanggaran_siswa`
--

CREATE TABLE `vw_pelanggaran_siswa` (
  `nama_siswa` varchar(200) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `nama_poin_pelanggaran` text,
  `id_pelanggaran_siswa` int(11) DEFAULT NULL,
  `id_penginput` int(11) DEFAULT NULL,
  `id_poin_pelanggaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `poin_minus` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_siswa`
--

CREATE TABLE `vw_siswa` (
  `nis` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `aktif_siswa` char(1) DEFAULT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_siswa_dt`
--

CREATE TABLE `vw_siswa_dt` (
  `id_kelas` int(11) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Katolik','Protestan','Budha','Hindu','Konghucu') DEFAULT NULL,
  `alamat_jalan` varchar(200) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(15) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `pendidikan_ayah` varchar(25) DEFAULT NULL,
  `pekerjaan_ayah` varchar(25) DEFAULT NULL,
  `no_hp_ayah` varchar(15) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pendidikan_ibu` varchar(25) DEFAULT NULL,
  `pekerjaan_ibu` varchar(25) DEFAULT NULL,
  `no_hp_ibu` varchar(15) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `pendidikan_wali` varchar(25) DEFAULT NULL,
  `pekerjaan_wali` varchar(25) DEFAULT NULL,
  `no_hp_wali` varchar(15) DEFAULT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `status_sekolah` varchar(15) DEFAULT NULL,
  `alamat_sekolah` varchar(250) DEFAULT NULL,
  `tahun_lulus` varchar(4) DEFAULT NULL,
  `aktif_siswa` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_staff`
--

CREATE TABLE `vw_staff` (
  `id_staff` int(11) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_staff` varchar(150) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `aktif_staff` char(1) DEFAULT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_staff_dt`
--

CREATE TABLE `vw_staff_dt` (
  `id_staff` int(11) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_staff` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('ISLAM','KATOLIK','PROTESTAN','HINDU','BUDHA','KONGHUCU') DEFAULT NULL,
  `alamat_jalan` varchar(255) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kode_pos` int(10) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `aktif_staff` char(1) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_tarif_kelas`
--

CREATE TABLE `vw_tarif_kelas` (
  `nis` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_tarif_kelas2`
--

CREATE TABLE `vw_tarif_kelas2` (
  `nis` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `tagihan` float DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vw_walikelas`
--

CREATE TABLE `vw_walikelas` (
  `nama_kelas` varchar(50) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_walikelas` int(11) DEFAULT NULL,
  `nama_guru` varchar(150) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda_display`
--
ALTER TABLE `agenda_display`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangsita_siswa`
--
ALTER TABLE `barangsita_siswa`
  ADD PRIMARY KEY (`id_barangsita_siswa`);

--
-- Indexes for table `belanja_siswa`
--
ALTER TABLE `belanja_siswa`
  ADD PRIMARY KEY (`id_belanja_siswa`);

--
-- Indexes for table `bimbingan_siswa`
--
ALTER TABLE `bimbingan_siswa`
  ADD PRIMARY KEY (`id_bimbingan_siswa`);

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `calendar_akademik`
--
ALTER TABLE `calendar_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_arsip`
--
ALTER TABLE `calendar_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_keuangan`
--
ALTER TABLE `calendar_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_perpustakaan`
--
ALTER TABLE `calendar_perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_poinpelanggaran`
--
ALTER TABLE `calendar_poinpelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `das`
--
ALTER TABLE `das`
  ADD PRIMARY KEY (`id_das`);

--
-- Indexes for table `das_bendahara`
--
ALTER TABLE `das_bendahara`
  ADD PRIMARY KEY (`id_das_bendahara`);

--
-- Indexes for table `das_kategori`
--
ALTER TABLE `das_kategori`
  ADD PRIMARY KEY (`id_das_kategori`);

--
-- Indexes for table `das_sisa`
--
ALTER TABLE `das_sisa`
  ADD PRIMARY KEY (`id_das_sisa`);

--
-- Indexes for table `das_sisa_output`
--
ALTER TABLE `das_sisa_output`
  ADD PRIMARY KEY (`id_das_sisa_output`);

--
-- Indexes for table `das_sumber_dana`
--
ALTER TABLE `das_sumber_dana`
  ADD PRIMARY KEY (`id_das_sumber_dana`);

--
-- Indexes for table `das_user`
--
ALTER TABLE `das_user`
  ADD PRIMARY KEY (`id_das_user`);

--
-- Indexes for table `das_user_bendahara`
--
ALTER TABLE `das_user_bendahara`
  ADD PRIMARY KEY (`id_das_user_bendahara`);

--
-- Indexes for table `das_user_bendahara_output`
--
ALTER TABLE `das_user_bendahara_output`
  ADD PRIMARY KEY (`id_das_user_bendahara_output`);

--
-- Indexes for table `das_user_output`
--
ALTER TABLE `das_user_output`
  ADD PRIMARY KEY (`id_das_user_output`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `dt_tabungan_siswa`
--
ALTER TABLE `dt_tabungan_siswa`
  ADD PRIMARY KEY (`id_tabungan_siswa`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal_pelajaran`);

--
-- Indexes for table `jadwal_sholat`
--
ALTER TABLE `jadwal_sholat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katamutiara`
--
ALTER TABLE `katamutiara`
  ADD PRIMARY KEY (`id_katamutiara`);

--
-- Indexes for table `kategori_file`
--
ALTER TABLE `kategori_file`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_post`
--
ALTER TABLE `kategori_post`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelulusan_siswa`
--
ALTER TABLE `kelulusan_siswa`
  ADD PRIMARY KEY (`id_kelulusan`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `mst_admin`
--
ALTER TABLE `mst_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_alumni`
--
ALTER TABLE `mst_alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `mst_barang`
--
ALTER TABLE `mst_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mst_box`
--
ALTER TABLE `mst_box`
  ADD PRIMARY KEY (`id_box`);

--
-- Indexes for table `mst_buku`
--
ALTER TABLE `mst_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `mst_bulan`
--
ALTER TABLE `mst_bulan`
  ADD PRIMARY KEY (`id_bulan`),
  ADD UNIQUE KEY `nama_bulan` (`nama_bulan`);

--
-- Indexes for table `mst_guru`
--
ALTER TABLE `mst_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `mst_informasi_keuangan`
--
ALTER TABLE `mst_informasi_keuangan`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `mst_jenis_dokumen`
--
ALTER TABLE `mst_jenis_dokumen`
  ADD PRIMARY KEY (`id_jenis_dokumen`);

--
-- Indexes for table `mst_jenis_pembayaran`
--
ALTER TABLE `mst_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `mst_jurusan`
--
ALTER TABLE `mst_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `mst_kategori`
--
ALTER TABLE `mst_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mst_kategori_barang`
--
ALTER TABLE `mst_kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indexes for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mst_kelompok_pelajaran`
--
ALTER TABLE `mst_kelompok_pelajaran`
  ADD PRIMARY KEY (`id_kelompok_pelajaran`);

--
-- Indexes for table `mst_kepala_sekolah`
--
ALTER TABLE `mst_kepala_sekolah`
  ADD PRIMARY KEY (`id_kepala_sekolah`);

--
-- Indexes for table `mst_lemari`
--
ALTER TABLE `mst_lemari`
  ADD PRIMARY KEY (`id_lemari`);

--
-- Indexes for table `mst_loker`
--
ALTER TABLE `mst_loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `mst_map`
--
ALTER TABLE `mst_map`
  ADD PRIMARY KEY (`id_map`);

--
-- Indexes for table `mst_mapel`
--
ALTER TABLE `mst_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mst_merk`
--
ALTER TABLE `mst_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `mst_pengumuman_alumni`
--
ALTER TABLE `mst_pengumuman_alumni`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `mst_poin_pelanggaran`
--
ALTER TABLE `mst_poin_pelanggaran`
  ADD PRIMARY KEY (`id_poin_pelanggaran`);

--
-- Indexes for table `mst_pos_keuangan`
--
ALTER TABLE `mst_pos_keuangan`
  ADD PRIMARY KEY (`id_pos_keuangan`);

--
-- Indexes for table `mst_predikat`
--
ALTER TABLE `mst_predikat`
  ADD PRIMARY KEY (`id_predikat`);

--
-- Indexes for table `mst_rak`
--
ALTER TABLE `mst_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `mst_ruangan`
--
ALTER TABLE `mst_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `mst_sanksi`
--
ALTER TABLE `mst_sanksi`
  ADD PRIMARY KEY (`id_sanksi`);

--
-- Indexes for table `mst_sekolah`
--
ALTER TABLE `mst_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_siswa`
--
ALTER TABLE `mst_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `mst_slideshow`
--
ALTER TABLE `mst_slideshow`
  ADD PRIMARY KEY (`id_slideshow`);

--
-- Indexes for table `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `mst_sumber`
--
ALTER TABLE `mst_sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `mst_tahun_ajaran`
--
ALTER TABLE `mst_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `mst_urut`
--
ALTER TABLE `mst_urut`
  ADD PRIMARY KEY (`id_urut`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `mst_walikelas`
--
ALTER TABLE `mst_walikelas`
  ADD PRIMARY KEY (`id_walikelas`);

--
-- Indexes for table `nilai_capaian_hasil_belajar`
--
ALTER TABLE `nilai_capaian_hasil_belajar`
  ADD PRIMARY KEY (`id_nilai_capaian_hasil_belajar`);

--
-- Indexes for table `nilai_ekstrakulikuler`
--
ALTER TABLE `nilai_ekstrakulikuler`
  ADD PRIMARY KEY (`id_nilai_ekstrakulikuler`);

--
-- Indexes for table `nilai_harian`
--
ALTER TABLE `nilai_harian`
  ADD PRIMARY KEY (`id_nilai_harian`);

--
-- Indexes for table `nilai_harian_detail`
--
ALTER TABLE `nilai_harian_detail`
  ADD PRIMARY KEY (`id_nilai_harian_detail`),
  ADD KEY `id_nilai_harian` (`id_nilai_harian`);

--
-- Indexes for table `nilai_prestasi`
--
ALTER TABLE `nilai_prestasi`
  ADD PRIMARY KEY (`id_nilai_prestasi`);

--
-- Indexes for table `nilai_raport`
--
ALTER TABLE `nilai_raport`
  ADD PRIMARY KEY (`id_nilai_raport`);

--
-- Indexes for table `nilai_uts`
--
ALTER TABLE `nilai_uts`
  ADD PRIMARY KEY (`id_nilai_uts`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  ADD PRIMARY KEY (`id_pelanggaran_siswa`);

--
-- Indexes for table `pembayaran_bebas`
--
ALTER TABLE `pembayaran_bebas`
  ADD PRIMARY KEY (`id_pembayaran_bebas`);

--
-- Indexes for table `pembayaran_bebas_dt`
--
ALTER TABLE `pembayaran_bebas_dt`
  ADD PRIMARY KEY (`id_pembayaran_bebas_dt`),
  ADD KEY `id_pembayaran_bebas` (`id_pembayaran_bebas`);

--
-- Indexes for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  ADD PRIMARY KEY (`id_pembayaran_bulanan`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `peminjaman_buku_dt`
--
ALTER TABLE `peminjaman_buku_dt`
  ADD PRIMARY KEY (`id_peminjaman_dt`);

--
-- Indexes for table `peminjaman_piket`
--
ALTER TABLE `peminjaman_piket`
  ADD PRIMARY KEY (`id_peminjaman_piket`);

--
-- Indexes for table `peminjaman_siswa`
--
ALTER TABLE `peminjaman_siswa`
  ADD PRIMARY KEY (`id_peminjaman_siswa`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `pengaturan_kelulusan`
--
ALTER TABLE `pengaturan_kelulusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_perpus`
--
ALTER TABLE `pengaturan_perpus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `pengunjung_perpus`
--
ALTER TABLE `pengunjung_perpus`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `pesan_admin`
--
ALTER TABLE `pesan_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_banner`
--
ALTER TABLE `ppdb_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `ppdb_kelulusan`
--
ALTER TABLE `ppdb_kelulusan`
  ADD PRIMARY KEY (`id_kelulusan`);

--
-- Indexes for table `ppdb_pengaturan`
--
ALTER TABLE `ppdb_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_siswa`
--
ALTER TABLE `ppdb_siswa`
  ADD PRIMARY KEY (`id_ppdb`);

--
-- Indexes for table `ppdb_slideshow`
--
ALTER TABLE `ppdb_slideshow`
  ADD PRIMARY KEY (`id_slideshow`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabungan_siswa`
--
ALTER TABLE `tabungan_siswa`
  ADD PRIMARY KEY (`id_tabungan_siswa`);

--
-- Indexes for table `tentang_web`
--
ALTER TABLE `tentang_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_display`
--
ALTER TABLE `video_display`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `agenda_display`
--
ALTER TABLE `agenda_display`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barangsita_siswa`
--
ALTER TABLE `barangsita_siswa`
  MODIFY `id_barangsita_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `belanja_siswa`
--
ALTER TABLE `belanja_siswa`
  MODIFY `id_belanja_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `bimbingan_siswa`
--
ALTER TABLE `bimbingan_siswa`
  MODIFY `id_bimbingan_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar_akademik`
--
ALTER TABLE `calendar_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendar_arsip`
--
ALTER TABLE `calendar_arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar_keuangan`
--
ALTER TABLE `calendar_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar_perpustakaan`
--
ALTER TABLE `calendar_perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar_poinpelanggaran`
--
ALTER TABLE `calendar_poinpelanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `das`
--
ALTER TABLE `das`
  MODIFY `id_das` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_bendahara`
--
ALTER TABLE `das_bendahara`
  MODIFY `id_das_bendahara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_kategori`
--
ALTER TABLE `das_kategori`
  MODIFY `id_das_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_sisa`
--
ALTER TABLE `das_sisa`
  MODIFY `id_das_sisa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_sisa_output`
--
ALTER TABLE `das_sisa_output`
  MODIFY `id_das_sisa_output` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_sumber_dana`
--
ALTER TABLE `das_sumber_dana`
  MODIFY `id_das_sumber_dana` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_user`
--
ALTER TABLE `das_user`
  MODIFY `id_das_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_user_bendahara`
--
ALTER TABLE `das_user_bendahara`
  MODIFY `id_das_user_bendahara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_user_bendahara_output`
--
ALTER TABLE `das_user_bendahara_output`
  MODIFY `id_das_user_bendahara_output` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `das_user_output`
--
ALTER TABLE `das_user_output`
  MODIFY `id_das_user_output` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_tabungan_siswa`
--
ALTER TABLE `dt_tabungan_siswa`
  MODIFY `id_tabungan_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_sholat`
--
ALTER TABLE `jadwal_sholat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `katamutiara`
--
ALTER TABLE `katamutiara`
  MODIFY `id_katamutiara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_file`
--
ALTER TABLE `kategori_file`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_post`
--
ALTER TABLE `kategori_post`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelulusan_siswa`
--
ALTER TABLE `kelulusan_siswa`
  MODIFY `id_kelulusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mst_admin`
--
ALTER TABLE `mst_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_alumni`
--
ALTER TABLE `mst_alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_barang`
--
ALTER TABLE `mst_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_box`
--
ALTER TABLE `mst_box`
  MODIFY `id_box` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_buku`
--
ALTER TABLE `mst_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_bulan`
--
ALTER TABLE `mst_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mst_guru`
--
ALTER TABLE `mst_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_informasi_keuangan`
--
ALTER TABLE `mst_informasi_keuangan`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mst_jenis_dokumen`
--
ALTER TABLE `mst_jenis_dokumen`
  MODIFY `id_jenis_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_jenis_pembayaran`
--
ALTER TABLE `mst_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_jurusan`
--
ALTER TABLE `mst_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_kategori`
--
ALTER TABLE `mst_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_kategori_barang`
--
ALTER TABLE `mst_kategori_barang`
  MODIFY `id_kategori_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_kelompok_pelajaran`
--
ALTER TABLE `mst_kelompok_pelajaran`
  MODIFY `id_kelompok_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_kepala_sekolah`
--
ALTER TABLE `mst_kepala_sekolah`
  MODIFY `id_kepala_sekolah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_lemari`
--
ALTER TABLE `mst_lemari`
  MODIFY `id_lemari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_loker`
--
ALTER TABLE `mst_loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_map`
--
ALTER TABLE `mst_map`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_mapel`
--
ALTER TABLE `mst_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_merk`
--
ALTER TABLE `mst_merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_pengumuman_alumni`
--
ALTER TABLE `mst_pengumuman_alumni`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_poin_pelanggaran`
--
ALTER TABLE `mst_poin_pelanggaran`
  MODIFY `id_poin_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_pos_keuangan`
--
ALTER TABLE `mst_pos_keuangan`
  MODIFY `id_pos_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_predikat`
--
ALTER TABLE `mst_predikat`
  MODIFY `id_predikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_rak`
--
ALTER TABLE `mst_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_ruangan`
--
ALTER TABLE `mst_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_sanksi`
--
ALTER TABLE `mst_sanksi`
  MODIFY `id_sanksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_sekolah`
--
ALTER TABLE `mst_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_siswa`
--
ALTER TABLE `mst_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_slideshow`
--
ALTER TABLE `mst_slideshow`
  MODIFY `id_slideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_sumber`
--
ALTER TABLE `mst_sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_tahun_ajaran`
--
ALTER TABLE `mst_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_urut`
--
ALTER TABLE `mst_urut`
  MODIFY `id_urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mst_walikelas`
--
ALTER TABLE `mst_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_capaian_hasil_belajar`
--
ALTER TABLE `nilai_capaian_hasil_belajar`
  MODIFY `id_nilai_capaian_hasil_belajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_ekstrakulikuler`
--
ALTER TABLE `nilai_ekstrakulikuler`
  MODIFY `id_nilai_ekstrakulikuler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_harian`
--
ALTER TABLE `nilai_harian`
  MODIFY `id_nilai_harian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_harian_detail`
--
ALTER TABLE `nilai_harian_detail`
  MODIFY `id_nilai_harian_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_prestasi`
--
ALTER TABLE `nilai_prestasi`
  MODIFY `id_nilai_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_raport`
--
ALTER TABLE `nilai_raport`
  MODIFY `id_nilai_raport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_uts`
--
ALTER TABLE `nilai_uts`
  MODIFY `id_nilai_uts` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  MODIFY `id_pelanggaran_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran_bebas`
--
ALTER TABLE `pembayaran_bebas`
  MODIFY `id_pembayaran_bebas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran_bebas_dt`
--
ALTER TABLE `pembayaran_bebas_dt`
  MODIFY `id_pembayaran_bebas_dt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  MODIFY `id_pembayaran_bulanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_buku_dt`
--
ALTER TABLE `peminjaman_buku_dt`
  MODIFY `id_peminjaman_dt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_piket`
--
ALTER TABLE `peminjaman_piket`
  MODIFY `id_peminjaman_piket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_siswa`
--
ALTER TABLE `peminjaman_siswa`
  MODIFY `id_peminjaman_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan_kelulusan`
--
ALTER TABLE `pengaturan_kelulusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaturan_perpus`
--
ALTER TABLE `pengaturan_perpus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengunjung_perpus`
--
ALTER TABLE `pengunjung_perpus`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan_admin`
--
ALTER TABLE `pesan_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ppdb_banner`
--
ALTER TABLE `ppdb_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ppdb_kelulusan`
--
ALTER TABLE `ppdb_kelulusan`
  MODIFY `id_kelulusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppdb_pengaturan`
--
ALTER TABLE `ppdb_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ppdb_siswa`
--
ALTER TABLE `ppdb_siswa`
  MODIFY `id_ppdb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ppdb_slideshow`
--
ALTER TABLE `ppdb_slideshow`
  MODIFY `id_slideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabungan_siswa`
--
ALTER TABLE `tabungan_siswa`
  MODIFY `id_tabungan_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tentang_web`
--
ALTER TABLE `tentang_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_display`
--
ALTER TABLE `video_display`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_harian_detail`
--
ALTER TABLE `nilai_harian_detail`
  ADD CONSTRAINT `nilai_harian_detail_ibfk_1` FOREIGN KEY (`id_nilai_harian`) REFERENCES `nilai_harian` (`id_nilai_harian`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran_bebas_dt`
--
ALTER TABLE `pembayaran_bebas_dt`
  ADD CONSTRAINT `pembayaran_bebas_dt_ibfk_1` FOREIGN KEY (`id_pembayaran_bebas`) REFERENCES `pembayaran_bebas` (`id_pembayaran_bebas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
