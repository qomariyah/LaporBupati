-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2018 at 04:33 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblapor_bupati`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` char(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `thumbnail` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` enum('Super Admin','Administrator','Admin OPD','Bupati') NOT NULL,
  `aktif` int(1) NOT NULL,
  `online` int(1) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime NOT NULL,
  `terakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_admin`, `jk`, `tmp_lahir`, `tgl_lahir`, `no_telepon`, `email`, `foto`, `thumbnail`, `alamat`, `level`, `aktif`, `online`, `dibuat`, `diubah`, `terakhir`) VALUES
('ADM001', 'erikwibowo', '$2y$10$QSOnKNOt37QmNlZTcULM4.6jdah.5ui3DCcMvPAS0WGYo9NlLSeJC', 'Erik Wibowo', 'L', '', '0000-00-00', '081510815414', 'erik@gmail.com', 'admin_1516264955.jpg', 'admin_1516264955_thumb.jpg', 'kajen', 'Super Admin', 1, 0, '2018-01-18 06:58:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ADM002', 'qomariyah', '$2y$10$nkdMo0x3V6ZYQlEEBwW0J.IekFjGivzWJC/OC8joBQ.QC9Sbjnyeu', 'Qomariyah', 'P', '', '0000-00-00', '081510815414', 'qomariyah@gmail.com', 'admin_1519476440.jpg', 'admin_1519476440_thumb.jpg', 'Kajen', 'Super Admin', 1, 0, '2018-01-26 03:29:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ADM003', 'rokhmawan', '$2y$10$RJiaGnlS2J4mM/XCDk.5Pe2OhmVoxCsDc8WLebjc0wonzl0KmPfIC', 'ROKHMAWAN, S.S, M.Ec. Dev', 'L', '', '0000-00-00', '081510815414', 'rokhmawan@gmail.com', 'admin_1516937932.jpg', 'admin_1516937932_thumb.jpg', 'Kajen', 'Admin OPD', 1, 0, '2018-01-26 03:38:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ADM004', 'asipkholbihi', '$2y$10$bwBmoygDCebNFxGMsyOrBuc6/a4UOi1.mUdl3IkhEl2ufBs25soS.', 'Asip Kholbihi, S. H. M.Si.', 'L', '', '0000-00-00', '081510815414', 'asipkholbihi@gmail.com', 'admin_1518868347.jpg', 'admin_1518868347_thumb.jpg', 'Pekalongan', 'Bupati', 1, 0, '2018-02-17 11:52:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aduan`
--

CREATE TABLE `tb_aduan` (
  `id_aduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sektor` int(11) NOT NULL,
  `aduan` text NOT NULL,
  `kategori` enum('Infrastruktur','Non Infrastruktur') NOT NULL,
  `lampiran` varchar(30) NOT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('masuk','diverifikasi','didisposisikan','penanganan','bukan kewenangan','selesai') NOT NULL,
  `rahasia` int(1) NOT NULL,
  `dibaca` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aduan`
--

INSERT INTO `tb_aduan` (`id_aduan`, `id_user`, `id_sektor`, `aduan`, `kategori`, `lampiran`, `longitude`, `latitude`, `dibuat`, `status`, `rahasia`, `dibaca`) VALUES
(85, 6, 0, 'Selamat malam admin, saya mau melaporkam bahwa aplikasi lapor bupati sedang dalam perbaikan.', 'Infrastruktur', 'aduan_1522250430.jpg', NULL, NULL, '2018-03-28 15:20:30', 'didisposisikan', 0, 0),
(86, 6, 0, 'Selamat malam min, saya mau mencoba aduan rahasia untuk pengetesan apakah berhasil atau tidak.', 'Non Infrastruktur', '', NULL, NULL, '2018-03-28 16:16:15', 'didisposisikan', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_admin` char(6) NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dibaca` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `id_admin`, `aktivitas`, `dibuat`, `dibaca`) VALUES
(71, 'ADM001', 'Membuat sektor baru bernama Erik Wibowo', '2018-03-26 08:35:27', 0),
(72, 'ADM002', 'Menghapus sektor Erik Wibowo', '2018-03-26 08:36:43', 0),
(73, 'ADM001', 'Membuat sektor baru bernama Perdagangan', '2018-03-26 16:46:33', 0),
(74, 'ADM001', 'Membuat sektor baru bernama Pariwisata', '2018-03-26 16:46:41', 0),
(75, 'ADM001', 'Membuat sektor baru bernama Perindustrian', '2018-03-26 16:46:59', 0),
(76, 'ADM001', 'Membuat sektor baru bernama Pendidikan', '2018-03-26 16:47:06', 0),
(77, 'ADM001', 'Membuat sektor baru bernama Kesehatan', '2018-03-26 16:47:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `id_opd` char(6) NOT NULL,
  `id_admin` char(6) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`id_disposisi`, `id_aduan`, `id_opd`, `id_admin`, `dibuat`) VALUES
(7, 69, 'OPD001', 'ADM001', '2018-02-16 13:43:31'),
(8, 68, 'OPD004', 'ADM001', '2018-02-17 12:03:38'),
(9, 72, 'OPD003', 'ADM001', '2018-02-22 15:06:07'),
(10, 80, 'OPD001', 'ADM002', '2018-03-26 09:15:00'),
(11, 80, 'OPD003', 'ADM002', '2018-03-26 09:29:10'),
(12, 80, 'OPD007', 'ADM002', '2018-03-26 09:33:47'),
(13, 81, 'OPD005', 'ADM002', '2018-03-26 09:36:00'),
(14, 82, 'OPD008', 'ADM002', '2018-03-26 09:53:56'),
(15, 84, 'OPD002', 'ADM001', '2018-03-26 17:32:46'),
(16, 85, 'OPD001', 'ADM001', '2018-03-28 15:21:24'),
(17, 86, 'OPD007', 'ADM001', '2018-03-28 16:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_admin` char(6) NOT NULL,
  `id_opd` char(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `role` int(1) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_admin`, `id_opd`, `id_user`, `id_aduan`, `komentar`, `foto`, `role`, `dibuat`, `diubah`) VALUES
(1, 'ADM001', '', 0, 68, 'Aduan anda telah diverivikasi oleh admin Lapor Bupati', '', 1, '2018-02-16 14:08:25', '0000-00-00 00:00:00'),
(3, 'ADM001', '', 0, 65, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-02-16 14:57:49', '0000-00-00 00:00:00'),
(4, 'ADM001', '', 0, 67, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-02-17 12:02:38', '0000-00-00 00:00:00'),
(5, 'ADM001', '', 0, 66, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-02-17 12:02:52', '0000-00-00 00:00:00'),
(6, 'ADM001', '', 0, 71, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-02-19 01:15:58', '0000-00-00 00:00:00'),
(7, 'ADM001', '', 0, 72, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-02-22 15:03:50', '0000-00-00 00:00:00'),
(9, 'ADM001', '', 0, 73, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-02-22 16:07:28', '0000-00-00 00:00:00'),
(10, 'ADM001', '', 0, 74, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-02-26 07:47:12', '0000-00-00 00:00:00'),
(11, 'ADM001', '', 0, 75, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-03-07 14:22:42', '0000-00-00 00:00:00'),
(12, 'ADM001', '', 0, 76, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-03-07 14:23:51', '0000-00-00 00:00:00'),
(13, 'ADM001', '', 0, 77, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 1, '2018-03-13 02:46:11', '0000-00-00 00:00:00'),
(14, 'ADM001', '', 0, 77, 'Aduan anda telah didisposisikan ke BAPPEDA', '', 1, '2018-03-17 18:28:10', '0000-00-00 00:00:00'),
(15, 'ADM001', '', 0, 77, 'Aduan anda sedang kami tangani', '', 1, '2018-03-17 18:32:27', '0000-00-00 00:00:00'),
(16, 'ADM001', '', 0, 77, 'Aduan anda sudah kami tangani dan telah selesai. Berikut buktinya. Terima kasih.', 'aduan.jpg', 1, '2018-03-17 18:32:27', '0000-00-00 00:00:00'),
(17, 'ADM001', '', 0, 77, 'Terima kasih atas penanganannya yang maksimal, puas banget dengan pelayanan pemerintah kabupaten Pekalongan yang sekarang :)', '', 2, '2018-03-17 18:35:02', '0000-00-00 00:00:00'),
(18, 'ADM002', '', 0, 80, 'Aduan telah diverivikasi oleh Administrator', '', 1, '2018-03-26 09:33:47', '0000-00-00 00:00:00'),
(19, 'ADM002', '', 0, 80, 'Aduan telah didisposisikan ke DINDUKCAPIL', '', 1, '2018-03-26 09:33:47', '0000-00-00 00:00:00'),
(20, 'ADM002', '', 0, 81, 'Aduan telah diverifikasi oleh Administrator', '', 1, '2018-03-26 09:35:59', '0000-00-00 00:00:00'),
(21, 'ADM002', '', 0, 81, 'Aduan telah didisposisikan ke DINSOS', '', 1, '2018-03-26 09:36:00', '0000-00-00 00:00:00'),
(22, 'ADM002', '', 0, 82, 'Aduan telah diverifikasi oleh Administrator', '', 1, '2018-03-26 09:53:56', '0000-00-00 00:00:00'),
(23, 'ADM002', '', 0, 82, 'Aduan telah didisposisikan ke DINPERINDAGKOP', '', 1, '2018-03-26 09:53:56', '0000-00-00 00:00:00'),
(24, 'ADM001', '', 0, 85, 'Aduan telah diverifikasi oleh Administrator', '', 1, '2018-03-28 15:21:23', '0000-00-00 00:00:00'),
(25, 'ADM001', '', 0, 85, 'Aduan telah didisposisikan ke DINDIKBUD', '', 1, '2018-03-28 15:21:23', '0000-00-00 00:00:00'),
(26, 'ADM001', '', 0, 86, 'Aduan telah diverifikasi oleh Administrator', '', 1, '2018-03-28 16:19:21', '0000-00-00 00:00:00'),
(27, 'ADM001', '', 0, 86, 'Aduan telah didisposisikan ke DINDUKCAPIL', '', 1, '2018-03-28 16:19:21', '0000-00-00 00:00:00'),
(28, 'ADM001', '', 0, 87, 'Aduan diverivikasi oleh admin Lapor Bupati', '', 0, '2018-03-28 16:30:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masukan`
--

CREATE TABLE `tb_masukan` (
  `id_masukan` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `masukan` text NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_opd`
--

CREATE TABLE `tb_opd` (
  `id_opd` char(6) NOT NULL,
  `nama_opd` varchar(150) NOT NULL,
  `singkatan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `nama_kepala` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `thumb` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `website` varchar(50) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime NOT NULL,
  `id_admin` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_opd`
--

INSERT INTO `tb_opd` (`id_opd`, `nama_opd`, `singkatan`, `deskripsi`, `nama_kepala`, `alamat`, `foto`, `thumb`, `no_telp`, `email`, `fax`, `website`, `dibuat`, `diubah`, `id_admin`) VALUES
('OPD001', 'DINAS PENDIDIKAN DAN KEBUDAYAAN', 'DINDIKBUD', 'Dinas Pendidikan dan Kebudayaan (DINDIKBUD) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang pendidikan dan kebudayaan berdasarkan asas otonomi dan tugas pembantuan.', 'Sumarwati, S.Pd., MAP', 'Jl. Sumbing No.3 Kajen', '', '', '(0285) 382037', 'dindikbud@pekalongankab.go.id', '', 'dindikbud.pekalongankab.go.id', '2018-01-22 23:44:22', '0000-00-00 00:00:00', 'ADM001'),
('OPD002', 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 'DPU TARU', 'Dinas Pekerjaan Umum dan Penataan Ruang (DPU TARU) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang pekerjaan umum dan penataan ruang berdasarkan asas otonomi dan tugas pembantuan.', 'Wahyu Kuncoro, ST., MT', 'Jl. Singosari No. 1 Kajen', '', '', '(0285) 381710', 'dputaru@pekalongankab.go.id', '', 'dputaru.pekalongankab.go.id', '2018-01-23 00:50:00', '0000-00-00 00:00:00', 'ADM001'),
('OPD003', 'DINAS PERUMAHAN RAKYAT, KAWASAN PERMUKIMAN DAN LINGKUNGAN HIDUP', 'DINAS PERKIM DAN LH', 'Dinas Perumahan Rakyat, Kawasan Permukiman dan Lingkungan Hidup (PERKIM DAN LH) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang perumahan, pemukiman dan lingkungan hidup berdasarkan asas otonomi dan tugas pembantuan.', 'Ir. Trinanto Agus Maryono, M.Si', 'Jl. Mayjend Sutoyo S. No.62 Wiradesa', '', '', '(0285) 4417 233', 'dinasperkimlh@pekalongankab.go.id', '', 'dinasperkimlh.pekalongankab.go.id', '2018-01-23 00:52:35', '0000-00-00 00:00:00', 'ADM001'),
('OPD004', 'DINAS KESEHATAN', 'DINKES', 'Dinas Kesehatan (DINKES) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang kesehatan berdasarkan asas otonomi dan tugas pembantuan.', 'dr. Sutanto Setiabudi, M. Kes', 'Jl. Rinjani No. 2 Kajen', '', '', '(0285) 381774', 'dinkes@pekalongankab.go.id', '', 'dinkes.pekalongankab.go.id', '2018-01-23 01:17:27', '0000-00-00 00:00:00', 'ADM001'),
('OPD005', 'DINAS SOSIAL', 'DINSOS', 'Dinas Sosial (DINSOS) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang sosial berdasarkan asas otonomi dan tugas pembantuan.', 'Drs. Yoyon Ustar H, M.Si', 'Jl. Krakatau No. 4 Kajen', '', '', '(0285) 381506', 'dinsos@pekalongankab.go.id', '', 'dinsos.pekalongankab.go.id', '2018-01-23 01:18:57', '0000-00-00 00:00:00', 'ADM001'),
('OPD006', 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK DAN PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', 'DINAS PMD P3A DAN PPKB', 'Dinas Pemberdayaan Masyarakat dan Desa, Pemberdayaan Perempuan dan Perlindungan Anak dan Pengendalian Penduduk dan Keluarga Berencana (PMD P3A DAN PPKB) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang pemberdayaan masyarakat dan desa, pemberdayaan perempuan dan perlindungan anak, pengendalian penduduk dan keluarga berencana berdasarkan asas otonomi dan tugas pembantuan.', 'Muhammad Afib, S.Sos ', 'Jl. Krakatau No. 5 Kajen', 'ppkb.jpg', 'ppkb.jpg', '(0285) 381739', 'dinaspmdp3adanppkb@pekalongankab.go.id', '', 'dinaspmdp3adanppkb.pekalongankab.go.id', '2018-01-23 01:23:05', '0000-00-00 00:00:00', 'ADM001'),
('OPD007', 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', 'DINDUKCAPIL', 'Dinas Kependudukan dan Pencatatan Sipil  (DINDUKCAPIL) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang administrasi kependudukan dan pencatatan sipil berdasarkan asas otonomi dan tugas pembantuan.', 'Risnoto, S.H, M.Si', 'Jl. Sindoro No. 5 Kajen', '', '', '0285 381921', 'dindukcapil@pekalongankab.go.id', '', 'dindukcapil.pekalongankab.go.id', '2018-02-01 00:10:32', '0000-00-00 00:00:00', 'ADM001'),
('OPD008', 'DINAS PERINDUSTRIAN, PERDAGANGAN, KOPERASI DAN USAHA KECIL DAN MENENGAH', 'DINPERINDAGKOP', 'Dinas Perindustrian, Perdagangan, Koperasi dan Usaha Kecil dan Menengah (DINPERINDAGKOP UKM) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang perindustrian, perdagangan, pengelolaan pasar, koperasi, usaha mikro, kecil dan menengah berdasarkan asas otonomi dan tugas pembantuan.', 'Ir. Hurip Budi Riyantini', 'Jl. Krakatau No. 6 Kajen', 'opd_1517646552.jpg', 'opd_1517646552_thumb.jpg', '(0285) 3830922', 'dinperindagkop@pekalongankab.go.id', '(0285) 3830922', 'dinperindagkop.pekalongankab.go.id', '2018-02-03 01:29:15', '0000-00-00 00:00:00', 'ADM003'),
('OPD009', 'DINAS KELAUTAN DAN PERIKANAN', 'DINLUTKAN', 'Dinas Kelautan dan Perikanan (DINLUTKAN) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang kelautan dan perikanan berdasarkan asas otonomi dan tugas pembantuan.', 'Drs. Sirhan', 'Jl. Sindoro No.6 Kajen', 'opd_1517646712.jpg', 'opd_1517646712_thumb.jpg', '(0285) 4416626', 'dinlutkan@pekalongankab.go.id', '', 'dinlutkan.pekalongankab.go.id', '2018-02-03 01:31:55', '0000-00-00 00:00:00', 'ADM003'),
('OPD010', 'DINAS PERHUBUUNGAN', 'DINHUB', 'Dinas Perhubungan (DINHUB) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang perhubungan berdasarkan asas otonomi dan tugas pembantuan.', 'Drs. Achmad Muchlisin', 'Jl. Sindoro No.4 Kajen', 'opd_1517646841.jpg', 'opd_1517646841_thumb.jpg', '(0285) 381776', 'dinhub@pekalongankab.go.id', '', 'dinhub.pekalongankab.go.id', '2018-02-03 01:34:05', '0000-00-00 00:00:00', 'ADM003'),
('OPD011', 'DINAS KETAHANAN PANGAN DAN PERTANIAN', 'DKPP', 'Dinas Ketahanan Pangan dan Pertanian (DKPP) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang pangan dan pertanian berdasarkan asas otonomi dan tugas pembantuan.', 'Ir. Siswanto', 'Jl. Sindoro No.2 Kajen', 'opd_1517646958.jpg', 'opd_1517646958_thumb.jpg', '(0285) 381776', 'dkpp@pekalongankab.go.id', '', 'dkpp.pekalongankab.go.id', '2018-02-03 01:36:01', '0000-00-00 00:00:00', 'ADM003'),
('OPD012', 'DINAS KEPEMUDAAN DAN OLAHRAGA DAN PARIWISATA', 'DINPORAPAR', 'Dinas Kepemudaan dan Olahraga dan Pariwisata (DINPORAPAR) merupakan unsur pelaksana urusan pemerintahan yang menjadi kewenangan Pemerintahan Daerah di bidang kepemudaan, olahraga dan pariwisata berdasarkan asas otonomi dan tugas pembantuan.', 'Ir. M. Bambang Irianto, M.Si', 'Jl. Sindoro No.2 Kajen', 'opd_1517647184.jpg', 'opd_1517647184_thumb.jpg', '(0285) 381783', 'dinporapar@pekalongankab.go.id', '', 'dinporapar-pekalongankab.web.id', '2018-02-03 01:39:47', '0000-00-00 00:00:00', 'ADM003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemberitahuan`
--

CREATE TABLE `tb_pemberitahuan` (
  `id_pemberitahuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemberitahuan` varchar(100) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemberitahuan`
--

INSERT INTO `tb_pemberitahuan` (`id_pemberitahuan`, `id_user`, `pemberitahuan`, `dibuat`) VALUES
(1, 6, 'Ada aduan anda yang diverifikasi oleh admin', '2018-02-18 06:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id_pengaturan` int(1) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `maps` text NOT NULL,
  `logo` varchar(30) NOT NULL,
  `metatext` varchar(150) NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sektor`
--

CREATE TABLE `tb_sektor` (
  `id_sektor` int(11) NOT NULL,
  `sektor` varchar(50) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime NOT NULL,
  `id_admin` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sektor`
--

INSERT INTO `tb_sektor` (`id_sektor`, `sektor`, `dibuat`, `diubah`, `id_admin`) VALUES
(1, 'Perdagangan', '2018-03-26 16:46:34', '0000-00-00 00:00:00', 'ADM001'),
(2, 'Pariwisata', '2018-03-26 16:46:41', '0000-00-00 00:00:00', 'ADM001'),
(3, 'Perindustrian', '2018-03-26 16:47:00', '0000-00-00 00:00:00', 'ADM001'),
(4, 'Pendidikan', '2018-03-26 16:47:06', '0000-00-00 00:00:00', 'ADM001'),
(5, 'Kesehatan', '2018-03-26 16:47:14', '0000-00-00 00:00:00', 'ADM001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `thumb` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `bio` varchar(150) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diubah` datetime NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `no_ktp`, `nama_user`, `jk`, `tmp_lahir`, `tgl_lahir`, `password`, `email`, `no_telepon`, `foto`, `thumb`, `alamat`, `bio`, `dibuat`, `diubah`, `aktif`) VALUES
(6, '1234567890123423', 'Erik Wibowo', 'L', 'Pekalongan', '1995-06-30', 'erik', 'erikwibo@gmail.com', '081510815414', 'user_1518498483.jpg', 'user_1518498483_thumb.jpg', 'Desa Kebonagung 01/07 Kecamatan Kajen', 'Menuju tak terbatas dan melampauinya', '2018-02-12 22:08:04', '0000-00-00 00:00:00', 1),
(8, '332120000000', 'Qomariyah', '', '', '0000-00-00', 'kokom', 'qomariyah@gmail.com', '085741908343', '', '', '', '', '2018-02-13 03:29:52', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_aduan`
--
ALTER TABLE `tb_aduan`
  ADD PRIMARY KEY (`id_aduan`,`id_user`,`id_sektor`);

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`,`id_admin`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`,`id_aduan`,`id_opd`,`id_admin`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`,`id_admin`,`id_opd`,`id_user`,`id_aduan`);

--
-- Indexes for table `tb_masukan`
--
ALTER TABLE `tb_masukan`
  ADD PRIMARY KEY (`id_masukan`);

--
-- Indexes for table `tb_opd`
--
ALTER TABLE `tb_opd`
  ADD PRIMARY KEY (`id_opd`,`id_admin`);

--
-- Indexes for table `tb_pemberitahuan`
--
ALTER TABLE `tb_pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`,`id_user`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `tb_sektor`
--
ALTER TABLE `tb_sektor`
  ADD PRIMARY KEY (`id_sektor`,`id_admin`,`sektor`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aduan`
--
ALTER TABLE `tb_aduan`
  MODIFY `id_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_masukan`
--
ALTER TABLE `tb_masukan`
  MODIFY `id_masukan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pemberitahuan`
--
ALTER TABLE `tb_pemberitahuan`
  MODIFY `id_pemberitahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `id_pengaturan` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sektor`
--
ALTER TABLE `tb_sektor`
  MODIFY `id_sektor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
