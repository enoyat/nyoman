-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2021 at 04:42 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `kdadmin` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `namaadmin` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `alamat` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `nohp` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `jenis` char(1) CHARACTER SET utf8mb4 NOT NULL,
  `aktif` char(1) CHARACTER SET utf8mb4 NOT NULL,
  `pwd` text CHARACTER SET utf8mb4 NOT NULL,
  `groupuser` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'administrator',
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
  `hargabeli` double NOT NULL,
  `hargajual` double NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kdkategori` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `f_fitur` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kdbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kdbarang`, `namabarang`, `deskripsi`, `berat`, `stok`, `hargabeli`, `hargajual`, `foto`, `kdkategori`, `f_fitur`) VALUES
('A002', 'Aquascape Bukit Cinta', 'Bahan Kaca 5mm\r\nDimensi 60x30x30\r\nfull set :\r\nlampu, filter, konten\r\n', 400, 5, 400000, 400000, 'Screenshot 2020-07-14 at 01.34.27.png', 'AQUASTORE', '0'),
('A003', 'Paludarium Mini Konsep Tebing', 'Bahan akilik\r\ndimensi 20x20x15cm\r\nfullset ', 400, 5, 150000, 250000, 'Screenshot 2020-07-14 at 01.40.25.png', 'AQUASTORE', '1'),
('A004', 'Paludarium Mini Konsep Tebing', 'Bahan Akrilik\r\ndimensi 25x20x15 cm\r\nfull set', 400, 5, 150000, 250000, 'Screenshot 2020-07-14 at 01.44.15.png', 'AQUASTORE', '1'),
('A01', 'Aquascape Water Fall', 'Bahan Akrilik\r\nDimensi: 15x15x25cm\r\nkonsep waterfall', 400, 5, 100000, 200000, 'Screenshot 2020-07-14 at 01.25.32.png', 'AQUASTORE', '1'),
('L001', 'Ikan Hias Laut', 'Sedia ikan hias air laut. Nemo, cicit, Kepe, Terumbu Karang dll', 400, 50, 10000, 25000, 'Screenshot 2020-07-14 at 01.48.37.png', 'AQUASTORE', '0'),
('L002', 'Polip Matahari', 'Jenis : Anemon Polip Matahari <br>\r\nWarna : merah orange', 400, 1, 15000, 40000, 'Polip Matahari.jpg', 'AQUASTORE', '0'),
('L003', 'Siwalan Orange', 'Jenis : Anemon Siwalan Orange<br>\r\nWarna : Orange', 400, 0, 65000, 150000, 'Siwalan Orange.jpg', 'AQUASTORE', '0'),
('L004', 'Batu Hiu/Batu Jeruk', 'Jenis : Anemon Batu Hiu<br>\r\nWarna : Hijau', 400, 4, 15000, 45000, 'anemon batu hiu.jpg', 'AQUASTORE', '0'),
('L005', 'Karang Otak Hijau', 'Jenis : Anemon Katang Otak Hijau <br>\r\nWarna : Hijau', 400, 0, 35000, 95000, 'otak ijo edit.jpg', 'AQUASTORE', '0'),
('L006', 'Karang Daging Hijau', 'Jenis : Anemon Karang Daging Hijau<br>\r\nWarna : Hijau', 400, 0, 35000, 90000, 'Karang daging hijau.jpg', 'AQUASTORE', '0'),
('L007', 'Piring Hijau', 'Jenis : Anemon Piring Hijau <br>\r\nWarna : Hijau', 400, 0, 45000, 125000, 'piring edit.jpg', 'AQUASTORE', '0'),
('L008', 'Angel BK', 'warna : Biru Kuning', 400, 4, 15000, 45000, 'angel bk.jpg', 'AQUASTORE', '0'),
('L009', 'Brown Kelly', 'Warna Coklat dengan Bulatan Putih', 400, 0, 20000, 60000, 'Brown Kelly.jpg', 'AQUASTORE', '0'),
('L010', 'Balong Merah', 'Warna Merah dengan Strip Putih', 400, 7, 9000, 25000, 'balong merah.jpg', 'AQUASTORE', '0'),
('L011', 'Negro Size M', 'Warna Hitam dengan strip putih', 400, 4, 9000, 25000, 'negro.jpg', 'AQUASTORE', '0'),
('L012', 'Polimas Size S', 'Warna dominan hitam dengan strip putih dan orange di siripnya', 400, 7, 9000, 25000, 'polimas.jpg', 'AQUASTORE', '0'),
('L013', 'Nemo Size S', 'Warna dominan orange dengan strip putih', 400, 20, 10000, 25000, 'Clown Fish.jpg', 'AQUASTORE', '0'),
('L014', 'Dasi Biru Kecil', 'Warna silver dengan biru di sirip atas dan kuning di sirip bawah', 400, 0, 5000, 15000, 'dasi biru.jpg', 'AQUASTORE', '0'),
('L015', 'Blueband', 'warna Hitam degan Strip Biru', 400, 10, 5000, 15000, 'BlueBand.jpg', 'AQUASTORE', '0'),
('L016', 'Kepe Bulan', 'Warna Dominan Putih dengan Strip Kuning dan ada bulatan hitam di badan bagian atas', 400, 0, 12500, 35000, 'kepe monyong.jpg', 'AQUASTORE', '0'),
('L017', 'Angel Marmut', 'Warna Hitam kuning putih', 400, 0, 10000, 25000, 'A. Marmut.jpg', 'AQUASTORE', '0'),
('L018', 'Keranjang Bali Kecil', 'Warna : hitam strp putih kuning, <br>\r\nCiri : Jika Sirip dikembangkan bentuk seperti keranjang', 400, 5, 30000, 90000, 'keranjang bali.jpg', 'AQUASTORE', '0'),
('L019', 'Mandarin Asli', '.', 400, 0, 15000, 45000, 'mandarin.jpg', 'AQUASTORE', '0'),
('L020', 'Noknang', 'Warna dominan putih, dan coklat dibagian kepala', 400, 0, 20000, 60000, 'nok nang.jpg', 'AQUASTORE', '0'),
('L021', 'Gadis', 'Warna Pink', 400, 1, 6000, 20000, 'Gadis.jpg', 'AQUASTORE', '0'),
('L022', 'Dakocan', 'Warna dominan Hitam dengan 1 bulatan putih', 400, 0, 3000, 7500, 'dakocan.jpg', 'AQUASTORE', '0'),
('L023', 'Keling Kuning', 'Warna Dominan Kuning dengan 1 bulatan hitam pada sirip atas', 400, 0, 7000, 20000, 'keling kuning.jpg', 'AQUASTORE', '0'),
('L024', 'Capungan Titik Merah', 'Bentuk pipih, warna silver dengan perpaduan srip hitam dan titik merah hingga ekor', 400, 9, 3000, 7500, 'Capungan titik merah.jpg', 'AQUASTORE', '0'),
('L025', 'Bluestar', 'Warna dominan biru dengan semburat kuning pada bagian ekor', 400, 0, 4000, 7500, 'bluestar.png', 'AQUASTORE', '0'),
('L026', 'Samdar cicit Kecil', 'Bentuk pipih, warna dominan kuning. Apabila meras terancam warna berubah menjadi hitam dan duri pada bagian sirip atas akan tegak', 400, 4, 22500, 40000, 'Semadar Cicit.jpg', 'AQUASTORE', '0'),
('L027', 'Seawed Extream', 'Merk : Hikari, <br>\r\nJenis : Makanan Ikan, <br>', 400, 0, 30000, 50000, 'makanan ikan.jpg', 'AQUASTORE', '0'),
('L028', 'Coralific Delite', 'Merk : Hikari <br>\r\nJenis : Makanan Coral', 400, 0, 48000, 70000, 'makanan coral.jpg', 'AQUASTORE', '0'),
('L029', 'Anemon Violet Besar', 'Warna : Ungu', 400, 0, 75000, 225000, 'Violet Besar.jpg', 'AQUASTORE', '0'),
('L030', 'Anemon Model Besar', 'Warna Ungu', 400, 0, 35000, 105000, 'Model.jpg', 'AQUASTORE', '0'),
('L031', 'Anemon Pakis', '.', 400, 0, 30000, 90000, 'Pakis.jpg', 'AQUASTORE', '0'),
('L032', 'Cacing Koker', '.', 400, 1, 10000, 30000, 'Cacing Koker.jpg', 'AQUASTORE', '0'),
('L033', 'Koka Buah Putih', '.', 400, 2, 40000, 120000, 'Koka Buah Putih.jpg', 'AQUASTORE', '0'),
('L034', 'Anemon Payungan Bulat', '.', 400, 0, 20000, 60000, 'Payungan Bulat.jpg', 'AQUASTORE', '0'),
('L035', 'Seroja Bali', '.', 400, 0, 20000, 60000, 'Seroja Bali.jpg', 'AQUASTORE', '0'),
('L036', 'Seroja Sutra', '.', 400, 2, 20000, 60000, 'Seroja Sutra.jpg', 'AQUASTORE', '0'),
('L037', 'Anemon Susu Hijau', '.', 400, 0, 30000, 90000, 'Susu Hijau.jpg', 'AQUASTORE', '0'),
('L038', 'Bintang Laut ', '.', 400, 0, 12500, 37500, 'Bintang Merah.jpeg', 'AQUASTORE', '0'),
('L039', 'Akar bahar Ubi', '.', 400, 1, 20000, 60000, 'Akar Bahar Ubi.jpg', 'AQUASTORE', '0'),
('L040', 'Arrow Warna', '.', 400, 0, 35000, 105000, 'Arrow Warna.jpg', 'AQUASTORE', '0'),
('L041', 'Arrow Hijau', '.', 400, 2, 35000, 105000, 'Arrow Hijau.jpg', 'AQUASTORE', '0'),
('L042', 'Arrow Ungu', '.', 400, 0, 35000, 105000, 'Arrow Ungu.jpg', 'AQUASTORE', '0'),
('L043', 'Karang Tanduk', '.', 400, 0, 35000, 105000, 'Karang Tanduk.jpg', 'AQUASTORE', '0'),
('L044', 'Spons Kipas', '.', 400, 0, 20000, 60000, 'Spons Kipas Orange.jpg', 'AQUASTORE', '0'),
('L045', 'Seroja Pahat', '.', 400, 1, 20000, 60000, 'Seroja Pahat.jpg', 'AQUASTORE', '0'),
('L046', 'Botana kasur', '.', 400, 0, 20000, 60000, 'Botana Kasur.jpg', 'AQUASTORE', '0'),
('L047', 'BluStone B', '.', 400, 0, 25000, 90000, 'BlueStone B.jpg', 'AQUASTORE', '1'),
('L048', 'Konpele Liris', '.', 400, 2, 7500, 22500, 'Konpele Liris.jpg', 'AQUASTORE', '0'),
('L049', 'konpele Macan', '.', 400, 1, 10000, 30000, 'Konpele Macan.jpg', 'AQUASTORE', '0'),
('L050', 'Roket Antena Ungu', '.', 400, 0, 35000, 105000, 'Roket Anten Ungu.jpg', 'AQUASTORE', '0'),
('L051', 'Udang MP', '.', 400, 0, 5000, 15000, 'Udang MP.jpg', 'AQUASTORE', '0'),
('L052', 'Udang Pecet', '.', 400, 2, 25000, 60000, 'Udang Pacet.jpg', 'AQUASTORE', '0'),
('L053', 'Moris', '.', 400, 0, 10000, 30000, 'Moris.jpeg', 'AQUASTORE', '0'),
('L054', 'Pelet', '.', 400, 0, 9000, 27000, 'pelet.jpeg', 'AQUASTORE', '0'),
('L055', 'Bintang Biru', '.', 400, 0, 10000, 30000, 'Bintang Biru.jpeg', 'AQUASTORE', '0'),
('L056', 'Botana Ekor Putih', '.', 400, 0, 10000, 30000, 'Botana Ekor Putih.jpeg', 'AQUASTORE', '0'),
('L057', 'Botana Zebra', '.', 400, 0, 15000, 45000, 'Botana Zebra.jpeg', 'AQUASTORE', '0'),
('L058', 'Keling Hijau', '.', 400, 0, 7500, 22500, 'Keling Hijau.jpeg', 'AQUASTORE', '0'),
('L059', 'Keling Merah', '.', 400, 1, 15000, 45000, 'Keling Merah.jpeg', 'AQUASTORE', '0'),
('L060', 'Kenari Biru', '.', 400, 0, 5000, 15000, 'Kenari Biru.jpeg', 'AQUASTORE', '0'),
('L061', 'Konpele Terbang', '.', 400, 0, 30000, 90000, 'Konpele Terbang.jpeg', 'AQUASTORE', '0'),
('L062', 'Tompel', '.', 400, 0, 7500, 22500, 'Tompel.jpeg', 'AQUASTORE', '0'),
('L063', 'Triger Motor', '.', 400, 0, 5000, 15000, 'Tiger Motor.jpeg', 'AQUASTORE', '0'),
('L064', 'Udang Madu', '.', 400, 0, 10000, 30000, 'Udang Madu.jpeg', 'AQUASTORE', '0'),
('L065', 'Tambak Kuncir', '.', 400, 0, 75000, 225000, 'Tambak Kuncir.jpeg', 'AQUASTORE', '0'),
('L066', 'Dr. B', '.', 400, 0, 5000, 15000, 'dr B.jpeg', 'AQUASTORE', '0'),
('L067', 'Dori', '.', 400, 0, 140000, 420000, 'dori.jpeg', 'AQUASTORE', '1'),
('L068', 'Keling Tanduk', '.', 400, 3, 10000, 30000, 'keling Tanduk.jpeg', 'AQUASTORE', '0'),
('L069', 'Dasi Biru Besar', '.', 400, 9, 5000, 25000, 'Dasi Biru Besar.jpeg', 'AQUASTORE', '0'),
('L070', 'Cantik', '.', 400, 3, 5000, 15000, 'Cantik.jpeg', 'AQUASTORE', '1'),
('L071', 'Nemo Size M', '.', 400, 13, 10000, 30000, 'Nemo Size M.jpeg', 'AQUASTORE', '0'),
('L072', 'Polimas Size M', '.', 400, 1, 10000, 30000, 'Polimas Size M.jpeg', 'AQUASTORE', '0'),
('L073', 'Polimas Size L', '.', 400, 3, 9000, 35000, 'Polimas size L.jpeg', 'AQUASTORE', '0'),
('L074', 'Negro Size L', '.', 400, 3, 9000, 30000, 'Negro Size L.jpeg', 'AQUASTORE', '0'),
('L075', 'Negro Size S', '.', 400, 4, 9000, 20000, 'Negro size S.jpeg', 'AQUASTORE', '0'),
('L076', 'Piring Putih', '.', 400, 4, 22500, 60000, 'piring putih.jpeg', 'AQUASTORE', '0'),
('L077', 'Koka Kembang Putih Size M', '.', 400, 2, 65000, 175000, 'koka kembang putih medium.jpeg', 'AQUASTORE', '0'),
('L078', 'Botana Naso', '.', 400, 1, 17500, 50000, 'Botana Naso.jpeg', 'AQUASTORE', '0');

-- --------------------------------------------------------

--
-- Table structure for table `detorder`
--

DROP TABLE IF EXISTS `detorder`;
CREATE TABLE IF NOT EXISTS `detorder` (
  `kdetorder` int(11) NOT NULL AUTO_INCREMENT,
  `kdorder` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `kdbarang` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL,
  `f_header` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdetorder`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `detorder`
--

INSERT INTO `detorder` (`kdetorder`, `kdorder`, `kdbarang`, `qty`, `harga`, `jumlah`, `f_header`, `created_at`, `updated_at`) VALUES
(10, 'O00000001', 'L031', 1, 90000, 90000, '1', '2021-02-02 13:06:10', '2021-02-02 13:06:10'),
(11, 'O00000001', 'L017', 1, 25000, 25000, '0', '2021-02-02 13:06:10', '2021-02-02 13:06:10'),
(12, 'O00000001', 'L038', 1, 37500, 37500, '0', '2021-02-02 13:06:10', '2021-02-02 13:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `fotobarang`
--

DROP TABLE IF EXISTS `fotobarang`;
CREATE TABLE IF NOT EXISTS `fotobarang` (
  `kdfoto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kdbarang` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kdfoto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `fotobarang`
--

INSERT INTO `fotobarang` (`kdfoto`, `foto`, `kdbarang`) VALUES
(1, 'Screenshot 2020-07-14 at 01.26.11.png', 'A01'),
(2, 'Screenshot 2020-07-14 at 01.34.11.png', 'A002'),
(3, 'Screenshot 2020-07-14 at 01.33.58.png', 'A002'),
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
  `kdkategori` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `namakategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `icon` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`kdkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kdkategori`, `namakategori`, `icon`) VALUES
('AQUASTORE', 'Aquatic Store', 'aquastore.png'),
('DP', 'Digital Printing', 'digitalprinting.png'),
('EL', 'Elektronika', 'elektronik.png'),
('ITPRD', 'Produk IT', 'produk.png'),
('TRAINING', 'Training', 'training.png');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `kdkomentar` int(11) NOT NULL AUTO_INCREMENT,
  `komentar` text COLLATE latin1_general_ci NOT NULL,
  `kdbarang` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `kdmember` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kdkomentar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `kdmember` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `namamember` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `nohp` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `aktif` char(1) CHARACTER SET utf8mb4 NOT NULL,
  `pwd` text CHARACTER SET utf8mb4 NOT NULL,
  `groupuser` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdmember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kdmember`, `namamember`, `alamat`, `email`, `nohp`, `aktif`, `pwd`, `groupuser`, `created_at`, `updated_at`) VALUES
('M00000001', 'pepep', 'alamatnya', 'pepep@gmail.com', '081', '1', 'ok', 'member', '2021-01-31 05:17:39', '2021-01-31 05:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tglnotifikasi` date NOT NULL,
  `kdmember` varchar(20) NOT NULL,
  `kdorder` varchar(20) NOT NULL,
  `isinotifikasi` text NOT NULL,
  `f_baca` varchar(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `tglnotifikasi`, `kdmember`, `kdorder`, `isinotifikasi`, `f_baca`, `created_at`, `updated_at`) VALUES
(1, '2021-02-03', 'M00000001', 'O000000001', 'Pembayaran terkorfimasi', '1', NULL, '2021-02-04 12:31:56'),
(2, '2021-02-03', 'M00000001', 'O000000001', 'Produk dikirimkan', '1', NULL, '2021-02-04 12:45:28'),
(3, '2021-02-03', 'M00000001', 'O000000001', 'Produk dikirimkan mas', '1', NULL, NULL),
(4, '2021-02-03', 'M00000001', 'O000000001', 'Produk dikirimkan mas', '1', NULL, NULL),
(5, '2021-02-03', 'M00000001', 'O000000001', 'Produk dikirimkan mas', '1', NULL, NULL),
(6, '2021-02-03', 'M00000001', 'O000000001', 'Produk dikirimkan mas', '1', NULL, NULL),
(7, '2021-02-03', 'M00000001', 'O000000001', 'Produk dikirimkan mas', '1', NULL, NULL),
(8, '2021-02-03', 'M00000001', 'O000000001', 'Produk dikirimkan mas', '1', NULL, NULL),
(9, '2021-02-03', 'M00000001', 'O000000001', 'Produk dikirimkan', '0', NULL, NULL),
(10, '2021-02-03', 'M00000001', 'O000000001', 'Pembayaran terkorfimasi', '0', NULL, NULL),
(11, '2021-02-03', 'M00000001', 'O000000001', 'Pembayaran terkorfimasi', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `transaction_id` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `order_id` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `transaction_time` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `transaction_status` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `fraud_status` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `pdf_url` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `finish_redirect_url` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `batas_pembayaran` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `payment_code` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `permata_va_number` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `bank` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `bill_key` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `va_number` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `biller_code` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `bca_va_number` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `id_user` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`transaction_id`, `order_id`, `gross_amount`, `payment_type`, `transaction_time`, `transaction_status`, `fraud_status`, `pdf_url`, `finish_redirect_url`, `batas_pembayaran`, `payment_code`, `permata_va_number`, `bank`, `bill_key`, `va_number`, `biller_code`, `bca_va_number`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
('0e65f884-d158-4a0d-a18e-673f7201d227', '601995b26698b', 120000, 'bank_transfer', '2021-02-03 01:11:07', 'pending', 'accept', 'https://app.sandbox.midtrans.com/snap/v1/transactions/cbb7547c-21ce-41ac-9bd0-5449dfb4c7f7/pdf', 'http://example.com?order_id=601995b26698b&status_code=201&transaction_status=pending', '2021-02-04 01:11:07', '-', '-', 'bca', '-', '81807034150', '-', '81807034150', 'O00000001', '0', '2021-02-02 11:11:11', '2021-02-02 11:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `kdorder` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `tglorder` date DEFAULT NULL,
  `total` double NOT NULL,
  `tglverifikasi` date DEFAULT NULL,
  `tglkirim` date DEFAULT NULL,
  `tglterima` date DEFAULT NULL,
  `kdadmin` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `kdmember` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `totberat` int(11) DEFAULT NULL,
  `penerima` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `alamatpenerima` text COLLATE latin1_general_ci DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `kurir` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `va` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `noresi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `f_proses` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `f_status` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `f_cancel` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdorder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`kdorder`, `tglorder`, `total`, `tglverifikasi`, `tglkirim`, `tglterima`, `kdadmin`, `kdmember`, `totberat`, `penerima`, `alamatpenerima`, `ongkir`, `kurir`, `va`, `noresi`, `f_proses`, `f_status`, `f_cancel`, `created_at`, `updated_at`) VALUES
('O00000001', '2021-02-02', 152500, NULL, NULL, NULL, NULL, 'M00000001', 1200, 'pepep', 'alamatnya', 0, 'Kirim Langsung', '81807997552', 'JP8180997552', '2', '0', '0', '2021-02-02 13:06:10', '2021-02-02 13:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `troly`
--

DROP TABLE IF EXISTS `troly`;
CREATE TABLE IF NOT EXISTS `troly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdmember` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `kdbarang` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `troly`
--

INSERT INTO `troly` (`id`, `kdmember`, `kdbarang`, `qty`, `created_at`, `updated_at`) VALUES
(43, 'M00000001', 'L070', 1, '2021-02-02 13:53:11', '2021-02-02 13:53:11'),
(44, 'M00000001', 'L067', 1, '2021-02-02 13:53:15', '2021-02-02 13:53:15'),
(45, 'M00000001', 'A003', 1, '2021-02-02 13:53:33', '2021-02-02 13:53:33'),
(46, 'M00000001', 'L034', 1, '2021-02-02 13:53:36', '2021-02-02 13:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdmember` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `kdmember`, `access_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 30, 'Adminbtn', 'adminbtn@gmail.com', '2020-12-26 22:32:00', '$2y$10$bHs5lCZfGuM02CobWwgRm.xnObFd5WO9guldrt.UcE4Vc.smMMSd.', '202100000003', 'Mjk2MTM4N2U3OWJmMmExZGQ3YTQ3OWE2OTMzNjBjNzhkMjNlNzNhZg==', NULL, '2020-12-26 22:32:00', '2020-12-26 22:54:31'),
(19, 10, 'admin', 'admin@gmail.com', '2020-12-26 22:30:49', '$2y$10$9OdHgEhtPr27lgcjp/Et4.cla7t1uHonBZM0XVH9dPLssRhEfT3IO', '202100000002', NULL, NULL, '2020-12-26 22:30:49', '2020-12-26 22:30:49'),
(155, 1, 'Pepep', 'pepep@gmail.com', '2021-01-31 05:17:39', '$2y$10$wQ.MpmCBZl2WdHGQOczLD.XaAcnCHZgOGX5IgQEEDsZw9S7fzMYoK', 'M00000001', NULL, NULL, '2021-01-31 05:17:39', '2021-01-31 05:17:39');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpengguna`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vpengguna`;
CREATE TABLE IF NOT EXISTS `vpengguna` (
`namapengguna` varchar(100)
,`email` varchar(100)
,`pwd` text
,`groupuser` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `vpengguna`
--
DROP TABLE IF EXISTS `vpengguna`;

DROP VIEW IF EXISTS `vpengguna`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpengguna`  AS SELECT `member`.`namamember` AS `namapengguna`, `member`.`email` AS `email`, `member`.`pwd` AS `pwd`, `member`.`groupuser` AS `groupuser` FROM `member` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
