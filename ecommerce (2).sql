-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 05:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `kdadmin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namaadmin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aktif` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `groupuser` varchar(20) NOT NULL DEFAULT 'administrator',
  PRIMARY KEY (`kdadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kdadmin`, `namaadmin`, `alamat`, `email`, `nohp`, `jenis`, `aktif`, `pwd`, `groupuser`) VALUES
('admin', 'admin', '-', 'admin', '-', 'L', '1', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
('agung', 'agung', '-', 'agung', '-', 'L', '1', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `kdbarang` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `namabarang` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `hargabeli` double DEFAULT NULL,
  `hargajual` double NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kdkategori` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `f_fitur` varchar(1) NOT NULL DEFAULT '0',
  `f_aktif` varchar(1) DEFAULT '1',
  `jmlview` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kdbarang`, `namabarang`, `deskripsi`, `berat`, `stok`, `hargabeli`, `hargajual`, `foto`, `kdkategori`, `f_fitur`, `f_aktif`, `jmlview`, `created_at`, `updated_at`) VALUES
('A002', 'Aquascape Bukit Cinta', 'Bahan Kaca 5mm\r\nDimensi 60x30x30\r\nfull set :\r\nlampu, filter, konten', 400, 97, 400000, 400000, '1705537068.jpg', 'AQUASTORE', '0', '1', 226, NULL, '2024-01-18 07:26:42'),
('A003', 'Paludarium Mini Konsep Tebing', 'Bahan akilik\r\ndimensi 20x20x15cm\r\nfullset', 400, 98, 150000, 250000, '1705537080.jpg', 'AQUASTORE', 'N', '1', 517, NULL, '2024-01-22 21:45:20'),
('A004', 'Paludarium Mini Konsep Tebing', 'Bahan Akrilik\r\ndimensi 25x20x15 cm\r\nfull set', 400, 100, 150000, 250000, '1705537091.jpg', 'AQUASTORE', '1', '1', 630, NULL, '2024-01-18 20:46:34'),
('A01', 'Aquascape Water Fall', 'Bahan Akrilik\r\nDimensi: 15x15x25cm\r\nkonsep waterfall', 400, 94, 100000, 200000, '1705537103.jpg', 'AQUASTORE', '1', '1', 240, NULL, '2024-01-22 21:49:39'),
('L001', 'Ikan Hias Laut', 'Sedia ikan hias air laut. Nemo, cicit, Kepe, Terumbu Karang dll', 400, 100, 10000, 25000, '1705537120.jpg', 'AQUASTORE', '1', '1', 202, NULL, '2024-01-17 17:18:40'),
('L002', 'Polip Matahari', 'Jenis : Anemon Polip Matahari <br>\r\nWarna : merah orange', 400, 100, 15000, 60000, '1705537129.jpg', 'AQUASTORE', '1', '1', 221, NULL, '2024-01-17 17:18:49'),
('L003', 'Siwalan Orange', 'Jenis : Anemon Siwalan Orange<br>\r\nWarna : Orange', 400, 100, 65000, 150000, '1705537140.jpg', 'AQUASTORE', '1', '1', 264, NULL, '2024-01-17 17:19:00'),
('L004', 'Batu Hiu/Batu Jeruk', 'Jenis : Anemon Batu Hiu<br>\r\nWarna : Hijau', 400, 90, 15000, 45000, '1705537150.jpg', 'AQUASTORE', 'Y', '1', 401, NULL, '2024-01-22 21:49:39'),
('L005', 'Karang Otak Hijau', 'Jenis : Anemon Katang Otak Hijau <br>\r\nWarna : Hijau', 400, 100, 35000, 210000, '1705537159.jpg', 'AQUASTORE', '0', '1', 354, NULL, '2024-01-17 17:19:19'),
('L006', 'Karang Daging Hijau', 'Jenis : Anemon Karang Daging Hijau<br>\r\nWarna : Hijau', 400, 100, 35000, 90000, '1705537169.jpg', 'AQUASTORE', '0', '1', 194, NULL, '2024-01-17 17:19:29'),
('L007', 'Piring Hijau', 'Jenis : Anemon Piring Hijau <br>\r\nWarna : Hijau', 400, 100, 45000, 120000, '1705537179.jpg', 'AQUASTORE', '0', '1', 171, NULL, '2024-01-17 17:19:39'),
('L008', 'Angel BK', 'warna : Biru Kuning', 400, 98, 15000, 45000, '1705537189.jpg', 'AQUASTORE', '0', '1', 214, NULL, '2024-01-22 21:49:39'),
('L010', 'Balong Merah', 'Warna Merah dengan Strip Putih', 400, 100, 9000, 25000, 'balong merah.jpg', 'AQUASTORE', '0', '1', 163, NULL, '2023-01-17 13:30:57'),
('L011', 'Negro Size M', 'Warna Hitam dengan strip putih', 400, 100, 9000, 25000, 'negro.jpg', 'AQUASTORE', '0', '1', 302, NULL, '2023-01-15 14:17:04'),
('L012', 'Polimas Size S', 'Warna dominan hitam dengan strip putih dan orange di siripnya', 400, 100, 9000, 25000, 'polimas.jpg', 'AQUASTORE', '0', '1', 242, NULL, '2023-01-13 14:44:20'),
('L013', 'Nemo Sedang', 'Warna dominan orange dengan strip putih', 400, 100, 10000, 30000, 'Clown Fish.jpg', 'AQUASTORE', '0', '1', 248, NULL, '2023-01-14 18:46:56'),
('L014', 'Dasi Biru Kecil', 'Warna silver dengan biru di sirip atas dan kuning di sirip bawah', 400, 100, 5000, 15000, 'dasi biru.jpg', 'AQUASTORE', '0', '1', 178, NULL, '2023-01-16 09:27:07'),
('L015', 'Blueband', 'warna Hitam degan Strip Biru', 400, 100, 5000, 15000, 'BlueBand.jpg', 'AQUASTORE', '0', '1', 196, NULL, '2023-01-16 17:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `detorder`
--

DROP TABLE IF EXISTS `detorder`;
CREATE TABLE IF NOT EXISTS `detorder` (
  `kdetorder` int(11) NOT NULL AUTO_INCREMENT,
  `kdorder` varchar(10) NOT NULL,
  `kdbarang` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL,
  `f_header` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdetorder`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `detorder`
--

INSERT INTO `detorder` (`kdetorder`, `kdorder`, `kdbarang`, `qty`, `harga`, `jumlah`, `f_header`, `created_at`, `updated_at`) VALUES
(7, 'O00000002', 'A003', 1, 250000, 250000, '1', '2023-11-28 06:27:34', '2023-11-28 06:27:34'),
(14, 'O00000007', 'L004', 2, 45000, 90000, '1', '2024-01-17 20:35:15', '2024-01-17 20:35:15'),
(15, 'O00000008', 'A01', 1, 200000, 200000, '1', '2024-01-17 21:05:55', '2024-01-17 21:05:55'),
(16, 'O00000009', 'L004', 1, 45000, 45000, '1', '2024-01-17 21:08:37', '2024-01-17 21:08:37'),
(17, 'O00000010', 'A01', 1, 200000, 200000, '1', '2024-01-17 21:14:59', '2024-01-17 21:14:59'),
(18, 'O00000011', 'A01', 1, 200000, 200000, '1', '2024-01-18 06:38:24', '2024-01-18 06:38:24'),
(19, 'O00000012', 'L004', 1, 45000, 45000, '1', '2024-01-20 22:28:45', '2024-01-20 22:28:45'),
(20, 'O00000012', 'A002', 3, 400000, 1200000, '0', '2024-01-20 22:28:45', '2024-01-20 22:28:45'),
(21, 'O00000013', 'A01', 2, 200000, 400000, '1', '2024-01-22 21:43:20', '2024-01-22 21:43:20'),
(22, 'O00000013', 'L008', 1, 45000, 45000, '0', '2024-01-22 21:43:20', '2024-01-22 21:43:20'),
(23, 'O00000013', 'L004', 1, 45000, 45000, '0', '2024-01-22 21:43:20', '2024-01-22 21:43:20');

--
-- Triggers `detorder`
--
DROP TRIGGER IF EXISTS `batalorder`;
DELIMITER $$
CREATE TRIGGER `batalorder` AFTER DELETE ON `detorder` FOR EACH ROW BEGIN
UPDATE barang set stok=stok+OLD.qty
where kdbarang=OLD.kdbarang;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `penjualan`;
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `detorder` FOR EACH ROW BEGIN
UPDATE barang set stok=stok-NEW.qty
where kdbarang=NEW.kdbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fotobarang`
--

DROP TABLE IF EXISTS `fotobarang`;
CREATE TABLE IF NOT EXISTS `fotobarang` (
  `kdfoto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) NOT NULL,
  `kdbarang` varchar(20) NOT NULL,
  PRIMARY KEY (`kdfoto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `fotobarang`
--

INSERT INTO `fotobarang` (`kdfoto`, `foto`, `kdbarang`) VALUES
(1, 'Screenshot 2020-07-14 at 01.26.11.png', 'A01'),
(4, 'Screenshot 2020-07-14 at 01.40.35.png', 'A003'),
(5, 'Screenshot 2020-07-14 at 01.40.48.png', 'A003'),
(6, 'Screenshot 2020-07-14 at 01.41.01.png', 'A003'),
(7, 'Screenshot 2020-07-14 at 01.44.34.png', 'A004'),
(8, 'Screenshot 2020-07-14 at 01.44.47.png', 'A004'),
(9, 'Screenshot 2020-07-14 at 01.44.59.png', 'A004'),
(10, 'Screenshot 2020-07-14 at 01.48.50.png', 'L001'),
(11, 'Screenshot 2020-07-14 at 01.49.00.png', 'L001'),
(12, 'Screenshot 2020-07-14 at 01.49.12.png', 'L001'),
(13, 'halaman homepage.JPG', '11');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kdkategori` varchar(10) NOT NULL,
  `namakategori` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kdkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kdkategori`, `namakategori`, `icon`) VALUES
('AQUASTORE', 'Aquatic Store', 'cat-1.jpg'),
('DF', 'Dried Fruit', 'cat-2.jpg'),
('DFT', 'drink fruits', 'cat-4.jpg'),
('DP', 'Souvenir dan Craft', 'cat-5.jpg'),
('VG', 'Vegetables', 'cat-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `kdkomentar` int(11) NOT NULL AUTO_INCREMENT,
  `komentar` text NOT NULL,
  `kdbarang` varchar(10) NOT NULL,
  `kdmember` varchar(10) NOT NULL,
  PRIMARY KEY (`kdkomentar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `kdmember` varchar(10) NOT NULL,
  `namamember` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aktif` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `groupuser` varchar(20) NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdmember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kdmember`, `namamember`, `alamat`, `email`, `nohp`, `aktif`, `pwd`, `groupuser`, `created_at`, `updated_at`) VALUES
('M00000001', 'pepep', 'alamatnya', 'pepep@gmail.com', '081', '1', 'ok', 'member', '2021-01-31 05:17:39', '2021-01-31 05:17:39'),
('M00000002', 'Zilfana Falahi', 'Kudus Jawa Tengah', 'zilfanafalahi45@gmail.com', '089652662784', '1', 'ezy16-09-1998', 'member', '2021-09-30 20:45:59', '2021-09-30 20:45:59'),
('M00000003', 'Sugiyatno, S.Kom', 'Gg. Musola No. 4', 'berandainformatika@gmail.com', '082227131797', '1', 'ok', 'member', '2021-09-30 20:49:45', '2021-09-30 20:49:45'),
('M00000004', 'paijo', 'alamat', 'paijo@gmail.com', '082286265758', '1', 'ok', 'member', '2023-11-28 02:05:36', '2023-11-28 02:05:36'),
('M00000005', 'pepep', 'sadsadsa', 'ok@gmail.com', '822862657582', '1', 'ok', 'member', '2024-01-18 06:37:40', '2024-01-18 06:37:40'),
('M00000006', 'sdsds', 'qqqq', 'qq@gmail.com', '082286265758', '1', 'ok', 'member', '2024-01-20 22:10:45', '2024-01-20 22:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tglnotifikasi` date DEFAULT NULL,
  `kdmember` varchar(20) NOT NULL,
  `kdorder` varchar(20) NOT NULL,
  `isinotifikasi` text NOT NULL,
  `f_baca` varchar(1) DEFAULT '0',
  `f_admbaca` varchar(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `tglnotifikasi`, `kdmember`, `kdorder`, `isinotifikasi`, `f_baca`, `f_admbaca`, `created_at`, `updated_at`) VALUES
(1, '2006-02-21', 'M00000001', 'O00000003', 'Pesanan Dikirim<br>Pesanan O00000003 telah dikirimkan pada tanggal 2021-02-06 09:05:18', '0', '1', '2021-02-06 02:05:18', '2021-02-08 08:52:39'),
(2, '2008-02-21', 'M00000001', 'O00000002', 'Pesanan Dikirim<br>Pesanan O00000002 telah dikirimkan pada tanggal 2021-02-08 09:25:21', '0', '1', '2021-02-08 02:25:21', '2021-02-08 08:52:40'),
(3, '2028-11-23', 'M00000004', 'O00000002', 'Pesanan Dikirim<br>Pesanan O00000002 telah dikirimkan pada tanggal 2023-11-28 13:58:30', '1', '0', '2023-11-28 06:58:30', '2024-01-18 08:09:37'),
(4, '2023-01-24', 'M00000004', 'O00000007', 'Pesanan Dikirim<br>Pesanan O00000007 telah dikirimkan pada tanggal 2024-01-23 04:46:23', '0', '0', '2024-01-22 21:46:23', '2024-01-22 21:46:23'),
(5, '2023-01-24', 'M00000004', 'O00000013', 'Pesanan Dikirim<br>Pesanan O00000013 telah dikirimkan pada tanggal 2024-01-23 04:49:49', '0', '0', '2024-01-22 21:49:49', '2024-01-22 21:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `transaction_id` varchar(100) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `transaction_status` varchar(20) DEFAULT NULL,
  `fraud_status` varchar(20) DEFAULT NULL,
  `pdf_url` varchar(100) DEFAULT NULL,
  `finish_redirect_url` varchar(100) DEFAULT NULL,
  `batas_pembayaran` varchar(100) DEFAULT NULL,
  `payment_code` varchar(20) DEFAULT NULL,
  `permata_va_number` varchar(20) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `bill_key` varchar(20) DEFAULT NULL,
  `va_number` varchar(20) DEFAULT NULL,
  `biller_code` varchar(20) DEFAULT NULL,
  `bca_va_number` varchar(20) DEFAULT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`transaction_id`, `order_id`, `gross_amount`, `payment_type`, `transaction_time`, `transaction_status`, `fraud_status`, `pdf_url`, `finish_redirect_url`, `batas_pembayaran`, `payment_code`, `permata_va_number`, `bank`, `bill_key`, `va_number`, `biller_code`, `bca_va_number`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
('2ec08f20-422e-40db-8bf7-430582706c53', '6024c7f5163eb', 15000, 'gopay', '2021-02-11 13:00:29', 'pending', 'accept', '-', 'http://example.com?order_id=6024c7f5163eb&status_code=201&transaction_status=pending', '2021-02-12 13:00:29', '-', '-', '-', '-', '-', '-', '-', 'O00000003', '0', '2021-02-10 23:00:35', '2021-02-10 23:00:35'),
('c40ad743-ac08-4087-8b37-7c051dbc368a', '6021023688c57', 21000, 'echannel', '2021-02-08 16:20:17', 'pending', 'accept', 'https://app.midtrans.com/snap/v1/transactions/2c4b4e6c-19ea-4e94-b86a-f54a46c05a0b/pdf', 'http://example.com?order_id=6021023688c57&status_code=201&transaction_status=pending', '2021-02-09 16:20:17', '-', '-', '-', '214548190209', '-', '70012', '-', 'O00000002', '1', '2021-02-08 02:20:16', '2021-02-08 02:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'member', '2020-12-22 09:12:09', '2020-12-22 09:12:09'),
(10, 'admin', '2020-12-22 09:12:09', '2020-12-22 09:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

DROP TABLE IF EXISTS `tborder`;
CREATE TABLE IF NOT EXISTS `tborder` (
  `kdorder` varchar(10) NOT NULL,
  `tglorder` date DEFAULT NULL,
  `total` double NOT NULL,
  `tglverifikasi` date DEFAULT NULL,
  `tglkirim` date DEFAULT NULL,
  `tglterima` date DEFAULT NULL,
  `kdadmin` varchar(10) DEFAULT NULL,
  `kdmember` varchar(10) NOT NULL,
  `totberat` int(11) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `alamatpenerima` text DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `kurir` varchar(100) DEFAULT NULL,
  `va` varchar(50) DEFAULT NULL,
  `noresi` varchar(100) DEFAULT NULL,
  `f_proses` varchar(1) NOT NULL DEFAULT '0',
  `f_status` varchar(1) NOT NULL DEFAULT '0',
  `f_cancel` varchar(1) NOT NULL DEFAULT '0',
  `f_bayar` varchar(1) NOT NULL DEFAULT '0',
  `filebukti` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdorder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`kdorder`, `tglorder`, `total`, `tglverifikasi`, `tglkirim`, `tglterima`, `kdadmin`, `kdmember`, `totberat`, `penerima`, `alamatpenerima`, `ongkir`, `kurir`, `va`, `noresi`, `f_proses`, `f_status`, `f_cancel`, `f_bayar`, `filebukti`, `created_at`, `updated_at`) VALUES
('O00000002', '2023-11-28', 250000, NULL, '2023-11-28', NULL, NULL, 'M00000004', 400, 'paijo', 'alamat', 0, 'Kirim Langsung', NULL, '1121', '2', '1', '0', '1', '1701179210.jpg', '2023-11-28 06:27:34', '2024-01-22 21:45:20'),
('O00000007', '2024-01-18', 126000, NULL, '2024-01-23', NULL, NULL, 'M00000004', 800, 'paijo', 'alamat', 36000, 'jne', NULL, '1121', '2', '1', '0', '1', '1705985065.png', '2024-01-17 20:35:15', '2024-01-22 21:46:23'),
('O00000008', '2024-01-18', 200000, NULL, NULL, NULL, NULL, 'M00000004', 400, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', NULL, '2024-01-17 21:05:55', '2024-01-17 21:05:55'),
('O00000009', '2024-01-18', 45000, NULL, NULL, NULL, NULL, 'M00000004', 400, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', NULL, '2024-01-17 21:08:37', '2024-01-17 21:08:37'),
('O00000010', '2024-01-18', 208000, NULL, NULL, NULL, NULL, 'M00000004', 400, 'paijo', 'alamat', 8000, 'jne', NULL, NULL, '0', '0', '0', '0', NULL, '2024-01-17 21:14:59', '2024-01-17 21:20:04'),
('O00000011', '2024-01-18', 200000, NULL, NULL, NULL, NULL, 'M00000004', 400, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', NULL, '2024-01-18 06:38:24', '2024-01-18 06:38:24'),
('O00000012', '2024-01-21', 1265000, NULL, NULL, NULL, NULL, 'M00000006', 1600, 'sdsds', 'qqqq', 20000, 'pos', NULL, NULL, '0', '0', '0', '0', NULL, '2024-01-20 22:28:45', '2024-01-20 22:29:26'),
('O00000013', '2024-01-23', 516000, NULL, '2024-01-23', '2024-01-23', NULL, 'M00000004', 1600, 'paijo', 'alamat', 26000, 'jne', NULL, '1121', '3', '3', '0', '1', '1705985350.png', '2024-01-22 21:43:20', '2024-01-22 21:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `troly`
--

DROP TABLE IF EXISTS `troly`;
CREATE TABLE IF NOT EXISTS `troly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdmember` varchar(10) NOT NULL,
  `kdbarang` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trolystok`
--

DROP TABLE IF EXISTS `trolystok`;
CREATE TABLE IF NOT EXISTS `trolystok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `tgltransaksi` date NOT NULL,
  `kdbarang` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trolystok`
--

INSERT INTO `trolystok` (`id`, `email`, `tgltransaksi`, `kdbarang`, `qty`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(16, 'admin@gmail.com', '2023-11-28', 'A002', 100, 150000, 15000000, '2023-11-28 07:00:34', '2023-11-28 07:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `trstok`
--

DROP TABLE IF EXISTS `trstok`;
CREATE TABLE IF NOT EXISTS `trstok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgltransaksi` date NOT NULL,
  `kdbarang` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `trstok`
--
DROP TRIGGER IF EXISTS `pembelian`;
DELIMITER $$
CREATE TRIGGER `pembelian` AFTER INSERT ON `trstok` FOR EACH ROW BEGIN
UPDATE barang set stok=stok+NEW.qty
where kdbarang=NEW.kdbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `kdmember` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `kdmember`, `access_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 10, 'admin', 'admin@gmail.com', '2020-12-26 22:30:49', '$2y$10$tH4j2/.E43JRJD/BDhr5hOLN8IyEUsIqyq.FH1wyWMcFhE0chiFLm', '202100000002', NULL, NULL, '2020-12-26 22:30:49', '2021-07-27 05:33:18'),
(158, 1, 'Paijo', 'paijo@gmail.com', '2023-11-28 02:05:36', '$2y$10$a8IdgwTepOp.zIhor3RP1e6fwRHS36BMLxZ0ZALeqc5W8Fuk2atFm', 'M00000004', NULL, NULL, '2023-11-28 02:05:36', '2023-11-28 02:05:36'),
(159, 1, 'Pepep', 'ok@gmail.com', '2024-01-18 06:37:40', '$2y$10$3pv3YOBMNn2Z6wLh4Pd/n.O963ILd9LYBBU5S1PF3dkYJOxFoDjAK', 'M00000005', NULL, NULL, '2024-01-18 06:37:40', '2024-01-18 06:37:40'),
(160, 1, 'Sdsds', 'qq@gmail.com', '2024-01-20 22:10:45', '$2y$10$VzFAhC9NL29pEONMBPRRaes3EmHXhgYUPRiV5SKMWpxI5aIKeFab.', 'M00000006', NULL, NULL, '2024-01-20 22:10:45', '2024-01-20 22:10:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
