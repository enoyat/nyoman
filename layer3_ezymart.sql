-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Jan 2023 pada 07.41
-- Versi server: 5.7.40
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layer3_ezymart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kdadmin`, `namaadmin`, `alamat`, `email`, `nohp`, `jenis`, `aktif`, `pwd`, `groupuser`) VALUES
('admin', 'admin', '-', 'admin', '-', 'L', '1', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
('agung', 'agung', '-', 'agung', '-', 'L', '1', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `kdbarang` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `namabarang` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `hargabeli` double NOT NULL,
  `hargajual` double NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kdkategori` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `f_fitur` varchar(1) NOT NULL DEFAULT '0',
  `f_aktif` varchar(1) DEFAULT '1',
  `jmlview` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kdbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kdbarang`, `namabarang`, `deskripsi`, `berat`, `stok`, `hargabeli`, `hargajual`, `foto`, `kdkategori`, `f_fitur`, `f_aktif`, `jmlview`, `created_at`, `updated_at`) VALUES
('A002', 'Aquascape Bukit Cinta', 'Bahan Kaca 5mm\r\nDimensi 60x30x30\r\nfull set :\r\nlampu, filter, konten\r\n', 400, 0, 400000, 400000, 'Screenshot 2020-07-14 at 01.34.27.png', 'AQUASTORE', '0', '1', 226, NULL, '2023-01-17 05:54:03'),
('A003', 'Paludarium Mini Konsep Tebing', 'Bahan akilik\r\ndimensi 20x20x15cm\r\nfullset ', 400, 0, 150000, 250000, 'Screenshot 2020-07-14 at 01.40.25.png', 'AQUASTORE', '1', '1', 517, NULL, '2023-01-17 10:59:29'),
('A004', 'Paludarium Mini Konsep Tebing', 'Bahan Akrilik\r\ndimensi 25x20x15 cm\r\nfull set', 400, 0, 150000, 250000, 'Screenshot 2020-07-14 at 01.44.15.png', 'AQUASTORE', '1', '1', 630, NULL, '2023-01-16 01:12:07'),
('A01', 'Aquascape Water Fall', 'Bahan Akrilik\r\nDimensi: 15x15x25cm\r\nkonsep waterfall', 400, 0, 100000, 200000, 'Screenshot 2020-07-14 at 01.25.32.png', 'AQUASTORE', '1', '1', 240, NULL, '2023-01-11 18:26:49'),
('L0008', 'Blue Devil', 'ikan ganas, agresif tetapi juga tahan banting.', 400, 0, 0, 12000, '1615024437.jpg', 'AQUASTORE', '1', '0', NULL, '2021-03-06 02:53:57', '2021-03-06 02:53:57'),
('L0009', 'Anemon Pasir', 'berbentuk piringan yang dipenuhi jari-jari', 400, 0, 0, 60000, '1615024551.jpg', 'AQUASTORE', '1', '1', 299, '2021-03-06 02:55:51', '2023-01-17 03:01:32'),
('L001', 'Ikan Hias Laut', 'Sedia ikan hias air laut. Nemo, cicit, Kepe, Terumbu Karang dll', 400, 0, 10000, 25000, 'Screenshot 2020-07-14 at 01.48.37.png', 'AQUASTORE', '0', '1', 202, NULL, '2023-01-17 13:03:44'),
('L0010', 'Hiu Cabang', 'jenis anemon bercabang', 400, 0, 0, 90000, '1615024757.jpg', 'AQUASTORE', '1', '1', 173, '2021-03-06 02:59:17', '2023-01-16 01:29:26'),
('L0011', 'Karang Kopal', 'invertebrata laut yang termasuk dalam kelas Anthozoa dari filum Cnidaria. Mereka biasanya hidup dalam koloni yang padat dari banyak polip individu yang identik', 400, 0, 0, 90000, '1615024892.jpg', 'AQUASTORE', '1', '1', 268, '2021-03-06 03:01:32', '2023-01-15 13:31:42'),
('L0012', 'Siwalan Hijau', 'berwarna hijau', 400, 0, 0, 195000, '1615025018.jpg', 'AQUASTORE', '1', '1', 177, '2021-03-06 03:03:38', '2023-01-10 03:34:39'),
('L002', 'Polip Matahari', 'Jenis : Anemon Polip Matahari <br>\r\nWarna : merah orange', 400, 0, 15000, 60000, 'Polip Matahari.jpg', 'AQUASTORE', '0', '1', 221, NULL, '2023-01-15 13:29:58'),
('L003', 'Siwalan Orange', 'Jenis : Anemon Siwalan Orange<br>\r\nWarna : Orange', 400, 0, 65000, 150000, 'Siwalan Orange.jpg', 'AQUASTORE', '0', '1', 264, NULL, '2023-01-17 02:04:09'),
('L004', 'Batu Hiu/Batu Jeruk', 'Jenis : Anemon Batu Hiu<br>\r\nWarna : Hijau', 400, 0, 15000, 45000, 'anemon batu hiu.jpg', 'AQUASTORE', '0', '1', 401, NULL, '2023-01-17 09:16:30'),
('L005', 'Karang Otak Hijau', 'Jenis : Anemon Katang Otak Hijau <br>\r\nWarna : Hijau', 400, 0, 35000, 210000, 'otak ijo edit.jpg', 'AQUASTORE', '0', '1', 354, NULL, '2023-01-14 21:05:04'),
('L006', 'Karang Daging Hijau', 'Jenis : Anemon Karang Daging Hijau<br>\r\nWarna : Hijau', 400, 0, 35000, 90000, 'Karang daging hijau.jpg', 'AQUASTORE', '0', '1', 194, NULL, '2023-01-11 03:36:49'),
('L007', 'Piring Hijau', 'Jenis : Anemon Piring Hijau <br>\r\nWarna : Hijau', 400, 0, 45000, 120000, 'piring edit.jpg', 'AQUASTORE', '0', '1', 171, NULL, '2023-01-16 07:33:31'),
('L008', 'Angel BK', 'warna : Biru Kuning', 400, 0, 15000, 45000, 'angel bk.jpg', 'AQUASTORE', '0', '1', 214, NULL, '2023-01-14 10:33:21'),
('L009', 'Brown Kelly', 'Warna Coklat dengan Bulatan Putih', 400, 0, 20000, 60000, 'Brown Kelly.jpg', 'AQUASTORE', '0', '1', 315, NULL, '2023-01-17 05:48:41'),
('L010', 'Balong Merah', 'Warna Merah dengan Strip Putih', 400, 0, 9000, 25000, 'balong merah.jpg', 'AQUASTORE', '0', '1', 163, NULL, '2023-01-17 13:30:57'),
('L011', 'Negro Size M', 'Warna Hitam dengan strip putih', 400, 0, 9000, 25000, 'negro.jpg', 'AQUASTORE', '0', '1', 302, NULL, '2023-01-15 14:17:04'),
('L012', 'Polimas Size S', 'Warna dominan hitam dengan strip putih dan orange di siripnya', 400, 0, 9000, 25000, 'polimas.jpg', 'AQUASTORE', '0', '1', 242, NULL, '2023-01-13 14:44:20'),
('L013', 'Nemo Sedang', 'Warna dominan orange dengan strip putih', 400, 0, 10000, 30000, 'Clown Fish.jpg', 'AQUASTORE', '0', '1', 248, NULL, '2023-01-14 18:46:56'),
('L014', 'Dasi Biru Kecil', 'Warna silver dengan biru di sirip atas dan kuning di sirip bawah', 400, 0, 5000, 15000, 'dasi biru.jpg', 'AQUASTORE', '0', '1', 178, NULL, '2023-01-16 09:27:07'),
('L015', 'Blueband', 'warna Hitam degan Strip Biru', 400, 0, 5000, 15000, 'BlueBand.jpg', 'AQUASTORE', '0', '1', 196, NULL, '2023-01-16 17:24:00'),
('L016', 'Kepe Bulan', 'Warna Dominan Putih dengan Strip Kuning dan ada bulatan hitam di badan bagian atas', 400, 0, 12500, 35000, 'kepe monyong.jpg', 'AQUASTORE', '0', '1', 201, NULL, '2023-01-15 14:16:04'),
('L017', 'Angel Marmut', 'Warna Hitam kuning putih', 400, 0, 10000, 25000, 'A. Marmut.jpg', 'AQUASTORE', '0', '1', 294, NULL, '2023-01-14 20:11:30'),
('L018', 'Keranjang Bali Besar', 'Warna : hitam strp putih kuning, <br>\r\nCiri : Jika Sirip dikembangkan bentuk seperti keranjang', 400, 0, 30000, 97500, 'keranjang bali.jpg', 'AQUASTORE', '0', '1', 211, NULL, '2023-01-15 05:26:45'),
('L019', 'Mandarin Asli', '.', 400, 0, 15000, 45000, 'mandarin.jpg', 'AQUASTORE', '0', '1', 221, NULL, '2023-01-14 01:47:22'),
('L020', 'Noknang', 'Warna dominan putih, dan coklat dibagian kepala', 400, 0, 20000, 60000, 'nok nang.jpg', 'AQUASTORE', '0', '1', 164, NULL, '2023-01-14 07:46:58'),
('L021', 'Gadis', 'Warna Pink', 400, 0, 6000, 20000, 'Gadis.jpg', 'AQUASTORE', '0', '1', 171, NULL, '2023-01-15 12:06:14'),
('L022', 'Dakocan', 'Warna dominan Hitam dengan 1 bulatan putih', 400, 0, 3000, 7500, 'dakocan.jpg', 'AQUASTORE', '0', '1', 196, NULL, '2023-01-17 13:50:41'),
('L023', 'Keling Kuning', 'Warna Dominan Kuning dengan 1 bulatan hitam pada sirip atas', 400, 0, 7000, 20000, 'keling kuning.jpg', 'AQUASTORE', '0', '1', 169, NULL, '2023-01-17 13:51:57'),
('L024', 'Capungan Titik Merah', 'Bentuk pipih, warna silver dengan perpaduan srip hitam dan titik merah hingga ekor', 400, 0, 3000, 9000, 'Capungan titik merah.jpg', 'AQUASTORE', '0', '1', 191, NULL, '2023-01-14 21:00:15'),
('L025', 'Bluestar', 'Warna dominan biru dengan semburat kuning pada bagian ekor', 400, 0, 4000, 7500, 'bluestar.png', 'AQUASTORE', '0', '1', 183, NULL, '2023-01-17 13:49:27'),
('L026', 'Samdar cicit Besar', 'Bentuk pipih, warna dominan kuning. Apabila meras terancam warna berubah menjadi hitam dan duri pada bagian sirip atas akan tegak', 400, 0, 22500, 75000, 'Semadar Cicit.jpg', 'AQUASTORE', '0', '1', 245, NULL, '2023-01-14 21:29:46'),
('L027', 'Seawed Extream', 'Merk : Hikari, <br>\r\nJenis : Makanan Ikan, <br>', 400, 0, 30000, 50000, 'makanan ikan.jpg', 'AQUASTORE', '0', '1', 161, NULL, '2023-01-12 21:35:06'),
('L028', 'Coralific Delite', 'Merk : Hikari <br>\r\nJenis : Makanan Coral', 400, 0, 48000, 70000, 'makanan coral.jpg', 'AQUASTORE', '0', '1', 170, NULL, '2023-01-17 03:39:14'),
('L029', 'Anemon Violet Besar', 'Warna : Ungu', 400, 0, 75000, 225000, 'Violet Besar.jpg', 'AQUASTORE', '0', '1', 254, NULL, '2023-01-15 15:39:43'),
('L030', 'Anemon Model Besar', 'Warna Ungu', 400, 0, 35000, 105000, 'Model.jpg', 'AQUASTORE', '0', '1', 212, NULL, '2023-01-14 21:02:27'),
('L031', 'Anemon Pakis', '.', 400, 0, 30000, 90000, 'Pakis.jpg', 'AQUASTORE', '0', '1', 352, NULL, '2023-01-14 11:09:42'),
('L032', 'Cacing Koker', '.', 400, 0, 10000, 30000, 'Cacing Koker.jpg', 'AQUASTORE', '0', '1', 198, NULL, '2023-01-16 18:59:40'),
('L033', 'Koka Buah Putih', '.', 400, 0, 40000, 120000, 'Koka Buah Putih.jpg', 'AQUASTORE', '0', '1', 187, NULL, '2023-01-11 18:52:08'),
('L034', 'Anemon Payungan Bulat', '.', 400, 0, 20000, 60000, 'Payungan Bulat.jpg', 'AQUASTORE', '0', '1', 249, NULL, '2023-01-12 20:24:07'),
('L035', 'Seroja Bali', '.', 400, 0, 20000, 60000, 'Seroja Bali.jpg', 'AQUASTORE', '0', '1', 279, NULL, '2023-01-15 05:25:34'),
('L036', 'Seroja Sutra', '.', 400, 0, 20000, 67500, 'Seroja Sutra.jpg', 'AQUASTORE', '0', '1', 305, NULL, '2023-01-14 10:45:02'),
('L037', 'Anemon Susu Hijau', '.', 400, 0, 30000, 90000, 'Susu Hijau.jpg', 'AQUASTORE', '0', '1', 302, NULL, '2023-01-17 13:15:08'),
('L038', 'Bintang Laut ', '.', 400, 0, 12500, 37500, 'Bintang Merah.jpeg', 'AQUASTORE', '0', '1', 175, NULL, '2023-01-16 17:36:38'),
('L039', 'Akar bahar Ubi', '.', 400, 0, 20000, 60000, 'Akar Bahar Ubi.jpg', 'AQUASTORE', '0', '1', 168, NULL, '2023-01-15 22:43:27'),
('L040', 'Arrow Warna', '.', 400, 0, 35000, 105000, 'Arrow Warna.jpg', 'AQUASTORE', '0', '1', 166, NULL, '2023-01-12 13:24:53'),
('L041', 'Arrow Hijau', '.', 400, 0, 35000, 105000, 'Arrow Hijau.jpg', 'AQUASTORE', '0', '1', 165, NULL, '2023-01-12 22:26:35'),
('L042', 'Arrow Ungu', '.', 400, 0, 35000, 105000, 'Arrow Ungu.jpg', 'AQUASTORE', '0', '1', 190, NULL, '2023-01-13 16:16:31'),
('L043', 'Karang Tanduk', '.', 400, 0, 35000, 105000, 'Karang Tanduk.jpg', 'AQUASTORE', '0', '1', 176, NULL, '2023-01-14 20:43:55'),
('L044', 'Spons Kipas', '.', 400, 0, 20000, 60000, 'Spons Kipas Orange.jpg', 'AQUASTORE', '0', '1', 191, NULL, '2023-01-17 13:02:37'),
('L045', 'Seroja Pahat', '.', 400, 0, 20000, 60000, 'Seroja Pahat.jpg', 'AQUASTORE', '0', '1', 235, NULL, '2023-01-15 04:50:01'),
('L046', 'Botana kasur', '.', 400, 0, 20000, 60000, 'Botana Kasur.jpg', 'AQUASTORE', '0', '1', 228, NULL, '2023-01-17 13:47:30'),
('L047', 'BluStone Koran', '.', 400, 0, 25000, 90000, 'BlueStone B.jpg', 'AQUASTORE', '1', '1', 246, NULL, '2023-01-17 15:10:05'),
('L048', 'Konpele Liris', '.', 400, 0, 7500, 22500, 'Konpele Liris.jpg', 'AQUASTORE', '0', '1', 186, NULL, '2023-01-15 05:23:15'),
('L049', 'konpele Macan', '.', 400, 0, 10000, 30000, 'Konpele Macan.jpg', 'AQUASTORE', '0', '1', 237, NULL, '2023-01-14 01:45:31'),
('L050', 'Roket Antena Ungu', '.', 400, 0, 35000, 105000, 'Roket Anten Ungu.jpg', 'AQUASTORE', '0', '1', 153, NULL, '2023-01-15 03:36:50'),
('L051', 'Udang MP', '.', 400, 0, 5000, 15000, 'Udang MP.jpg', 'AQUASTORE', '0', '1', 180, NULL, '2023-01-13 14:54:45'),
('L052', 'Udang Pecet', '.', 400, 0, 25000, 75000, 'Udang Pacet.jpg', 'AQUASTORE', '0', '1', 173, NULL, '2023-01-15 23:55:21'),
('L053', 'Moris', '.', 400, 0, 10000, 30000, 'Moris.jpeg', 'AQUASTORE', '0', '1', 157, NULL, '2023-01-16 09:12:44'),
('L054', 'Pelet', '.', 400, 0, 9000, 27000, 'pelet.jpeg', 'AQUASTORE', '0', '1', 167, NULL, '2023-01-16 10:22:05'),
('L055', 'Bintang Biru', '.', 400, 0, 10000, 30000, 'Bintang Biru.jpeg', 'AQUASTORE', '0', '1', 176, NULL, '2023-01-15 05:24:26'),
('L056', 'Botana Ekor Putih', '.', 400, 0, 10000, 30000, 'Botana Ekor Putih.jpeg', 'AQUASTORE', '0', '1', 367, NULL, '2023-01-15 22:44:39'),
('L057', 'Botana Zebra', '.', 400, 0, 15000, 45000, 'Botana Zebra.jpeg', 'AQUASTORE', '0', '1', 455, NULL, '2023-01-17 13:28:50'),
('L058', 'Keling Hijau', '.', 400, 0, 7500, 22500, 'Keling Hijau.jpeg', 'AQUASTORE', '0', '1', 170, NULL, '2023-01-15 23:02:49'),
('L059', 'Keling Merah', '.', 400, 0, 15000, 45000, 'Keling Merah.jpeg', 'AQUASTORE', '0', '1', 204, NULL, '2023-01-15 22:20:20'),
('L060', 'Kenari Biru', '.', 400, 0, 5000, 15000, 'Kenari Biru.jpeg', 'AQUASTORE', '0', '1', 185, NULL, '2023-01-17 13:54:33'),
('L061', 'Konpele Terbang', '.', 400, 0, 30000, 90000, 'Konpele Terbang.jpeg', 'AQUASTORE', '0', '1', 165, NULL, '2023-01-11 17:29:20'),
('L062', 'Tompel Besar', '.', 400, 0, 7500, 45000, 'Tompel.jpeg', 'AQUASTORE', '0', '1', 267, NULL, '2023-01-16 18:31:35'),
('L063', 'Triger Motor', '.', 400, 0, 5000, 15000, 'Tiger Motor.jpeg', 'AQUASTORE', '0', '1', 171, NULL, '2023-01-17 03:37:11'),
('L064', 'Udang Madu', '.', 400, 0, 10000, 30000, 'Udang Madu.jpeg', 'AQUASTORE', '0', '1', 169, NULL, '2023-01-14 01:44:32'),
('L065', 'Tambak Kuncir', '.', 400, 0, 75000, 225000, 'Tambak Kuncir.jpeg', 'AQUASTORE', '0', '1', 359, NULL, '2023-01-17 06:46:32'),
('L066', 'Dr. B', '.', 400, 0, 5000, 15000, 'dr B.jpeg', 'AQUASTORE', '0', '1', 167, NULL, '2023-01-12 21:33:28'),
('L067', 'Dori', '.', 400, 0, 140000, 420000, 'dori.jpeg', 'AQUASTORE', '1', '1', 208, NULL, '2023-01-17 03:36:10'),
('L068', 'Keling Tanduk', '.', 400, 0, 10000, 30000, 'keling Tanduk.jpeg', 'AQUASTORE', '0', '1', 213, NULL, '2023-01-17 02:03:08'),
('L069', 'Dasi Biru Besar', '.', 400, 0, 5000, 25000, 'Dasi Biru Besar.jpeg', 'AQUASTORE', '0', '1', 171, NULL, '2023-01-15 22:59:04'),
('L070', 'Cantik', '.', 400, 0, 5000, 15000, 'Cantik.jpeg', 'AQUASTORE', '0', '1', 173, NULL, '2023-01-13 14:11:25'),
('L071', 'Nemo Size M', '.', 400, 0, 10000, 30000, 'Nemo Size M.jpeg', 'AQUASTORE', '0', '1', 164, NULL, '2023-01-14 20:55:32'),
('L072', 'Polimas Size M', '.', 400, 0, 10000, 30000, 'Polimas Size M.jpeg', 'AQUASTORE', '0', '1', 174, NULL, '2023-01-16 19:51:17'),
('L073', 'Polimas Size L', '.', 400, 0, 9000, 35000, 'Polimas size L.jpeg', 'AQUASTORE', '0', '1', 605, NULL, '2023-01-15 14:14:07'),
('L074', 'Negro Size L', '.', 400, 0, 9000, 30000, 'Negro Size L.jpeg', 'AQUASTORE', '0', '1', 169, NULL, '2023-01-16 20:17:45'),
('L075', 'Negro Size S', '.', 400, 0, 9000, 20000, 'Negro size S.jpeg', 'AQUASTORE', '0', '1', 180, NULL, '2023-01-15 13:25:54'),
('L076', 'Piring Putih', '.', 400, 0, 22500, 60000, 'piring putih.jpeg', 'AQUASTORE', '0', '1', 207, NULL, '2023-01-12 11:57:43'),
('L077', 'Koka Kembang Putih Size M', '.', 400, 0, 65000, 195000, 'koka kembang putih medium.jpeg', 'AQUASTORE', '0', '1', 258, NULL, '2023-01-16 18:48:05'),
('L078', 'Botana Naso', '.', 400, 0, 17500, 50000, 'Botana Naso.jpeg', 'AQUASTORE', '0', '1', 203, NULL, '2023-01-12 21:05:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detorder`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Trigger `detorder`
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
-- Struktur dari tabel `fotobarang`
--

DROP TABLE IF EXISTS `fotobarang`;
CREATE TABLE IF NOT EXISTS `fotobarang` (
  `kdfoto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kdbarang` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kdfoto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `fotobarang`
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
-- Struktur dari tabel `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kdkategori` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `namakategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `icon` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`kdkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kdkategori`, `namakategori`, `icon`) VALUES
('AQUASTORE', 'Aquatic Store', 'aquastore.png'),
('DP', 'Souvenir dan Craft', 'digitalprinting.png'),
('RETAIL', 'Retail dan Kelontong', 'iconretail.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
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
-- Struktur dari tabel `member`
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
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`kdmember`, `namamember`, `alamat`, `email`, `nohp`, `aktif`, `pwd`, `groupuser`, `created_at`, `updated_at`) VALUES
('M00000001', 'pepep', 'alamatnya', 'pepep@gmail.com', '081', '1', 'ok', 'member', '2021-01-31 05:17:39', '2021-01-31 05:17:39'),
('M00000002', 'Zilfana Falahi', 'Kudus Jawa Tengah', 'zilfanafalahi45@gmail.com', '089652662784', '1', 'ezy16-09-1998', 'member', '2021-09-30 20:45:59', '2021-09-30 20:45:59'),
('M00000003', 'Sugiyatno, S.Kom', 'Gg. Musola No. 4', 'berandainformatika@gmail.com', '082227131797', '1', 'ok', 'member', '2021-09-30 20:49:45', '2021-09-30 20:49:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `tglnotifikasi`, `kdmember`, `kdorder`, `isinotifikasi`, `f_baca`, `f_admbaca`, `created_at`, `updated_at`) VALUES
(1, '2006-02-21', 'M00000001', 'O00000003', 'Pesanan Dikirim<br>Pesanan O00000003 telah dikirimkan pada tanggal 2021-02-06 09:05:18', '0', '1', '2021-02-06 02:05:18', '2021-02-08 08:52:39'),
(2, '2008-02-21', 'M00000001', 'O00000002', 'Pesanan Dikirim<br>Pesanan O00000002 telah dikirimkan pada tanggal 2021-02-08 09:25:21', '0', '1', '2021-02-08 02:25:21', '2021-02-08 08:52:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`transaction_id`, `order_id`, `gross_amount`, `payment_type`, `transaction_time`, `transaction_status`, `fraud_status`, `pdf_url`, `finish_redirect_url`, `batas_pembayaran`, `payment_code`, `permata_va_number`, `bank`, `bill_key`, `va_number`, `biller_code`, `bca_va_number`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
('2ec08f20-422e-40db-8bf7-430582706c53', '6024c7f5163eb', 15000, 'gopay', '2021-02-11 13:00:29', 'pending', 'accept', '-', 'http://example.com?order_id=6024c7f5163eb&status_code=201&transaction_status=pending', '2021-02-12 13:00:29', '-', '-', '-', '-', '-', '-', '-', 'O00000003', '0', '2021-02-10 23:00:35', '2021-02-10 23:00:35'),
('c40ad743-ac08-4087-8b37-7c051dbc368a', '6021023688c57', 21000, 'echannel', '2021-02-08 16:20:17', 'pending', 'accept', 'https://app.midtrans.com/snap/v1/transactions/2c4b4e6c-19ea-4e94-b86a-f54a46c05a0b/pdf', 'http://example.com?order_id=6021023688c57&status_code=201&transaction_status=pending', '2021-02-09 16:20:17', '-', '-', '-', '214548190209', '-', '70012', '-', 'O00000002', '1', '2021-02-08 02:20:16', '2021-02-08 02:23:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'member', '2020-12-22 09:12:09', '2020-12-22 09:12:09'),
(10, 'admin', '2020-12-22 09:12:09', '2020-12-22 09:12:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tborder`
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
  `alamatpenerima` text COLLATE latin1_general_ci,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `troly`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trolystok`
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trolystok`
--

INSERT INTO `trolystok` (`id`, `email`, `tgltransaksi`, `kdbarang`, `qty`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '2021-03-06', 'L008', 5, 45000, 225000, '2021-03-06 02:34:16', '2021-03-06 02:34:16'),
(2, 'admin@gmail.com', '2021-03-06', 'L013', 20, 30000, 600000, '2021-03-06 02:34:37', '2021-03-06 02:34:37'),
(3, 'admin@gmail.com', '2021-03-06', 'L009', 1, 60000, 60000, '2021-03-06 02:37:10', '2021-03-06 02:37:10'),
(4, 'admin@gmail.com', '2021-03-06', 'L062', 2, 45000, 90000, '2021-03-06 02:38:26', '2021-03-06 02:38:26'),
(5, 'admin@gmail.com', '2021-03-06', 'L066', 5, 15000, 75000, '2021-03-06 02:38:46', '2021-03-06 02:38:46'),
(6, 'admin@gmail.com', '2021-03-06', 'L047', 1, 90000, 90000, '2021-03-06 02:39:04', '2021-03-06 02:39:04'),
(7, 'admin@gmail.com', '2021-03-06', 'L059', 1, 45000, 45000, '2021-03-06 02:39:35', '2021-03-06 02:39:35'),
(8, 'admin@gmail.com', '2021-03-06', 'L018', 1, 97500, 97500, '2021-03-06 02:40:36', '2021-03-06 02:40:36'),
(9, 'admin@gmail.com', '2021-03-06', 'L024', 10, 9000, 90000, '2021-03-06 02:41:32', '2021-03-06 02:41:32'),
(10, 'admin@gmail.com', '2021-03-06', 'L004', 10, 45000, 450000, '2021-03-06 02:42:08', '2021-03-06 02:42:08'),
(11, 'admin@gmail.com', '2021-03-06', 'L033', 1, 120000, 120000, '2021-03-06 02:42:55', '2021-03-06 02:42:55'),
(12, 'admin@gmail.com', '2021-03-06', 'L044', 2, 60000, 120000, '2021-03-06 02:43:25', '2021-03-06 02:43:25'),
(13, 'admin@gmail.com', '2021-03-06', 'L036', 2, 67500, 135000, '2021-03-06 02:44:05', '2021-03-06 02:44:05'),
(14, 'admin@gmail.com', '2021-03-06', 'L076', 2, 75000, 150000, '2021-03-06 02:44:47', '2021-03-06 02:44:47'),
(15, 'admin@gmail.com', '2021-03-06', 'L002', 3, 60000, 180000, '2021-03-06 02:45:24', '2021-03-06 02:45:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trstok`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `trstok`
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
-- Struktur dari tabel `users`
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
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `kdmember`, `access_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 30, 'Adminbtn', 'adminbtn@gmail.com', '2020-12-26 22:32:00', '$2y$10$bHs5lCZfGuM02CobWwgRm.xnObFd5WO9guldrt.UcE4Vc.smMMSd.', '202100000003', 'Mjk2MTM4N2U3OWJmMmExZGQ3YTQ3OWE2OTMzNjBjNzhkMjNlNzNhZg==', NULL, '2020-12-26 22:32:00', '2020-12-26 22:54:31'),
(19, 10, 'admin', 'admin@gmail.com', '2020-12-26 22:30:49', '$2y$10$sfVQqIV3/Su9uf0oFXAFUONiAjLJ5cPikwku6c/yMQIWAZcLrL.9i', '202100000002', NULL, NULL, '2020-12-26 22:30:49', '2021-07-27 05:33:18'),
(155, 1, 'Pepep', 'pepep@gmail.com', '2021-01-31 05:17:39', '$2y$10$wQ.MpmCBZl2WdHGQOczLD.XaAcnCHZgOGX5IgQEEDsZw9S7fzMYoK', 'M00000001', NULL, NULL, '2021-01-31 05:17:39', '2021-01-31 05:17:39'),
(156, 1, 'Zilfana Falahi', 'zilfanafalahi45@gmail.com', '2021-09-30 20:45:59', '$2y$10$4hkXnITNPDyXqbn/T5dzSezIb9WwFkfuZHxnbOMr9UKgIFlxX90nO', 'M00000002', NULL, NULL, '2021-09-30 20:45:59', '2021-09-30 20:45:59'),
(157, 1, 'Sugiyatno, S.kom', 'berandainformatika@gmail.com', '2021-09-30 20:49:45', '$2y$10$kpyoH4nNcHZ0TKS2NJAhh.6dlb65N9f0EVKIi.6.aDgYmc/HBQT2K', 'M00000003', NULL, NULL, '2021-09-30 20:49:45', '2021-09-30 20:49:45');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpengguna`
-- (Lihat di bawah untuk tampilan aktual)
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
-- Struktur untuk view `vpengguna`
--
DROP TABLE IF EXISTS `vpengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`layer3`@`localhost` SQL SECURITY DEFINER VIEW `vpengguna`  AS SELECT `member`.`namamember` AS `namapengguna`, `member`.`email` AS `email`, `member`.`pwd` AS `pwd`, `member`.`groupuser` AS `groupuser` FROM `member` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
