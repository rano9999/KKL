-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2019 pada 08.35
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psikotes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `kelompok` mediumint(20) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `jk` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`id`, `nim`, `kategori`, `kelompok`, `periode`, `jk`) VALUES
(1, '16110130', 'Dominant', 1, '2019', 'L'),
(2, '17110209', 'Dominant', 2, '2019', 'L'),
(3, '16110081', 'Dominant', 3, '2019', 'L'),
(4, '17110018', 'Dominant', 4, '2019', 'L'),
(5, '17110044', 'Dominant', 5, '2019', 'L'),
(6, '16110237', 'Dominant', 6, '2019', 'L'),
(7, '16110338', 'Influencing', 7, '2019', 'L'),
(8, '16110337', 'Influencing', 8, '2019', 'L'),
(9, '16110315', 'Influencing', 9, '2019', 'L'),
(10, '17110020', 'Influencing', 10, '2019', 'L'),
(11, '17110042', 'Influencing', 11, '2019', 'L'),
(12, '17110014', 'Influencing', 12, '2019', 'L'),
(13, '17110046', 'Influencing', 13, '2019', 'L'),
(14, '17110091', 'Influencing', 1, '2019', 'L'),
(15, '16120085', 'Influencing', 2, '2019', 'L'),
(16, '16120063', 'Influencing', 3, '2019', 'L'),
(17, '16120057', 'Influencing', 4, '2019', 'L'),
(18, '16120018', 'Influencing', 5, '2019', 'L'),
(19, '17110273', 'Influencing', 6, '2019', 'L'),
(20, '17110263', 'Influencing', 7, '2019', 'L'),
(21, '16120027', 'Influencing', 8, '2019', 'L'),
(22, '17110229', 'Influencing', 9, '2019', 'L'),
(23, '16110268', 'Influencing', 10, '2019', 'L'),
(24, '16110127', 'Influencing', 11, '2019', 'L'),
(25, '16110026', 'Influencing', 12, '2019', 'L'),
(26, '16110216', 'Influencing', 13, '2019', 'L'),
(27, '16110172', 'Influencing', 1, '2019', 'L'),
(28, '16110174', 'Influencing', 2, '2019', 'L'),
(29, '16110255', 'Influencing', 3, '2019', 'L'),
(30, '16110044', 'Influencing', 4, '2019', 'L'),
(31, '17110162', 'Steadiness', 5, '2019', 'L'),
(32, '16120074', 'Steadiness', 6, '2019', 'L'),
(33, '16120087', 'Steadiness', 7, '2019', 'L'),
(34, '17110059', 'Steadiness', 8, '2019', 'L'),
(35, '17110056', 'Steadiness', 9, '2019', 'L'),
(36, '17110186', 'Steadiness', 10, '2019', 'L'),
(37, '17110191', 'Steadiness', 11, '2019', 'L'),
(38, '16120023', 'Steadiness', 12, '2019', 'L'),
(39, '16120002', 'Steadiness', 13, '2019', 'L'),
(40, '17110297', 'Steadiness', 1, '2019', 'L'),
(41, '16110060', 'Steadiness', 2, '2019', 'L'),
(42, '17110245', 'Steadiness', 3, '2019', 'L'),
(43, '16110058', 'Steadiness', 4, '2019', 'L'),
(44, '17110247', 'Steadiness', 5, '2019', 'L'),
(45, '17110244', 'Steadiness', 6, '2019', 'L'),
(46, '17110242', 'Steadiness', 7, '2019', 'L'),
(47, '16110105', 'Steadiness', 8, '2019', 'L'),
(48, '16120139', 'Steadiness', 9, '2019', 'L'),
(49, '17110050', 'Steadiness', 10, '2019', 'L'),
(50, '17110243', 'Steadiness', 11, '2019', 'L'),
(51, '17110008', 'Steadiness', 12, '2019', 'L'),
(52, '16120062', 'Steadiness', 13, '2019', 'L'),
(53, '17110004', 'Steadiness', 1, '2019', 'L'),
(54, '17110002', 'Steadiness', 2, '2019', 'L'),
(55, '16110223', 'Steadiness', 3, '2019', 'L'),
(56, '16120216', 'Steadiness', 4, '2019', 'L'),
(57, '16110316', 'Steadiness', 5, '2019', 'L'),
(58, '16110232', 'Steadiness', 6, '2019', 'L'),
(59, '16110310', 'Steadiness', 7, '2019', 'L'),
(60, '17110006', 'Steadiness', 8, '2019', 'L'),
(61, '17110016', 'Steadiness', 9, '2019', 'L'),
(62, '17110017', 'Steadiness', 10, '2019', 'L'),
(63, '17110047', 'Steadiness', 11, '2019', 'L'),
(64, '16110152', 'Steadiness', 12, '2019', 'L'),
(65, '16120175', 'Steadiness', 13, '2019', 'L'),
(66, '17110032', 'Steadiness', 1, '2019', 'L'),
(67, '17110030', 'Steadiness', 2, '2019', 'L'),
(68, '16120180', 'Steadiness', 3, '2019', 'L'),
(69, '17110024', 'Steadiness', 4, '2019', 'L'),
(70, '16110191', 'Steadiness', 5, '2019', 'L'),
(71, '16110208', 'Steadiness', 6, '2019', 'L'),
(72, '16110011', 'Compliance', 7, '2019', 'L'),
(73, '16110002', 'Compliance', 8, '2019', 'L'),
(74, '16120028', 'Compliance', 9, '2019', 'L'),
(75, '16120017', 'Compliance', 10, '2019', 'L'),
(76, '17110029', 'Compliance', 11, '2019', 'L'),
(77, '17110038', 'Compliance', 12, '2019', 'L'),
(78, '17110055', 'Compliance', 13, '2019', 'L'),
(79, '17110104', 'Compliance', 1, '2019', 'L'),
(80, '17110126', 'Compliance', 2, '2019', 'L'),
(81, '17110158', 'Compliance', 3, '2019', 'L'),
(82, '17110171', 'Compliance', 4, '2019', 'L'),
(83, '17110048', 'Compliance', 5, '2019', 'L'),
(84, '16110096', 'Compliance', 6, '2019', 'L'),
(85, '17110248', 'Compliance', 7, '2019', 'L'),
(86, '16110063', 'Compliance', 8, '2019', 'L'),
(87, '16120013', 'Compliance', 9, '2019', 'L'),
(88, '16110228', 'Compliance', 10, '2019', 'L'),
(89, '16120213', 'Dominant', 13, '2019', 'P'),
(90, '16120058', 'Dominant', 12, '2019', 'P'),
(91, '16120137', 'Dominant', 11, '2019', 'P'),
(92, '16120088', 'Influencing', 10, '2019', 'P'),
(93, '16120064', 'Influencing', 9, '2019', 'P'),
(94, '16120124', 'Influencing', 8, '2019', 'P'),
(95, '16120128', 'Influencing', 7, '2019', 'P'),
(96, '16120155', 'Influencing', 6, '2019', 'P'),
(97, '16120160', 'Influencing', 5, '2019', 'P'),
(98, '16120198', 'Influencing', 4, '2019', 'P'),
(99, '17110252', 'Influencing', 3, '2019', 'P'),
(100, '16120197', 'Influencing', 2, '2019', 'P'),
(101, '16110270', 'Influencing', 1, '2019', 'P'),
(102, '17110005', 'Influencing', 13, '2019', 'P'),
(103, '17110015', 'Influencing', 12, '2019', 'P'),
(104, '16120223', 'Steadiness', 11, '2019', 'P'),
(105, '16120147', 'Steadiness', 10, '2019', 'P'),
(106, '16110098', 'Steadiness', 9, '2019', 'P'),
(107, '16120165', 'Steadiness', 8, '2019', 'P'),
(108, '16120167', 'Steadiness', 7, '2019', 'P'),
(109, '16120194', 'Steadiness', 6, '2019', 'P'),
(110, '17110001', 'Steadiness', 5, '2019', 'P'),
(111, '16110074', 'Steadiness', 4, '2019', 'P'),
(112, '16120200', 'Steadiness', 3, '2019', 'P'),
(113, '17110180', 'Steadiness', 2, '2019', 'P'),
(114, '16120141', 'Steadiness', 1, '2019', 'P'),
(115, '16120106', 'Steadiness', 13, '2019', 'P'),
(116, '16120136', 'Steadiness', 12, '2019', 'P'),
(117, '16110282', 'Steadiness', 11, '2019', 'P'),
(118, '16120109', 'Steadiness', 10, '2019', 'P'),
(119, '17110283', 'Steadiness', 9, '2019', 'P'),
(120, '16120016', 'Steadiness', 8, '2019', 'P'),
(121, '17110066', 'Steadiness', 7, '2019', 'P'),
(122, '16120059', 'Steadiness', 6, '2019', 'P'),
(123, '17110012', 'Steadiness', 5, '2019', 'P'),
(124, '16120221', 'Compliance', 4, '2019', 'P'),
(125, '16120192', 'Compliance', 3, '2019', 'P'),
(126, '16120090', 'Compliance', 2, '2019', 'P'),
(127, '16120098', 'Compliance', 1, '2019', 'P'),
(128, '16120103', 'Compliance', 13, '2019', 'P'),
(129, '16120149', 'Compliance', 12, '2019', 'P'),
(130, '16110045', 'Compliance', 11, '2019', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `jml_kel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `periode`, `aktif`, `jml_kel`) VALUES
(1, '2017', 'Tidak', 12),
(2, '2018', 'Tidak', 26),
(3, '2019', 'Ya', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `periode` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tipe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nim`, `nama`, `jk`, `periode`, `kategori`, `tipe`) VALUES
('16110002', 'FAJAR NUZULUR ROCHMAN', 'L', '2019', 'Compliance', 4),
('16110011', 'SIDIQ ARIEF PRASETYO', 'L', '2019', 'Compliance', 4),
('16110026', 'RESA ICHSANUDIN', 'L', '2019', 'Influencing', 2),
('16110044', 'AVIV ZULFI', 'L', '2019', 'Influencing', 2),
('16110045', 'SINDI ROSITA MULYANI', 'P', '2019', 'Compliance', 4),
('16110058', 'AGUNG TRI WIBOWO', 'L', '2019', 'Steadiness', 3),
('16110060', 'YOYO SETIAWAN', 'L', '2019', 'Steadiness', 3),
('16110063', 'AKHMAD YUSUF FAUZI', 'L', '2019', 'Compliance', 4),
('16110074', 'SITI HANIFAH', 'P', '2019', 'Steadiness', 3),
('16110081', 'GAGAS AJI PRATOMO', 'L', '2019', 'Dominant', 1),
('16110096', 'ANJASMARA', 'L', '2019', 'Compliance', 4),
('16110098', 'TIKA OKTAVIA', 'P', '2019', 'Steadiness', 3),
('16110105', 'LUSTIYONO PRASETYO NUGROHO', 'L', '2019', 'Steadiness', 3),
('16110127', 'LUTFI NUGROHO', 'L', '2019', 'Influencing', 2),
('16110130', 'OBI HARI SUTRISNO', 'L', '2019', 'Dominant', 1),
('16110152', 'IBRAHIM ZANI', 'L', '2019', 'Steadiness', 3),
('16110172', 'AGUNG SAPUTRA', 'L', '2019', 'Influencing', 2),
('16110174', 'AGUNG PURWANTO', 'L', '2019', 'Influencing', 2),
('16110191', 'BOSSI BANI MAJID', 'L', '2019', 'Steadiness', 3),
('16110208', 'AJIB AL HAKIM RAJO MEDAN', 'L', '2019', 'Steadiness', 3),
('16110216', 'UTOMO BUDI SANTOSO', 'L', '2019', 'Influencing', 2),
('16110223', 'FATHAN MUBINAN HARTONO', 'L', '2019', 'Steadiness', 3),
('16110228', 'SUBAYU', 'L', '2019', 'Compliance', 4),
('16110232', 'AHMAD BAGUS NOVIAN', 'L', '2019', 'Steadiness', 3),
('16110237', 'ROBERT BETAICA CIPTOSAKTI', 'L', '2019', 'Dominant', 1),
('16110255', 'PANDU SETYA SUNARTO', 'L', '2019', 'Influencing', 2),
('16110268', 'WIDI SANTOSA PUTRA', 'L', '2019', 'Influencing', 2),
('16110270', 'WITRA DWI KUNTORO', 'P', '2019', 'Influencing', 2),
('16110282', 'AGIA HANA LESTARI', 'P', '2019', 'Steadiness', 3),
('16110310', 'KEVIN ESA SAPUTRA', 'L', '2019', 'Steadiness', 3),
('16110315', 'NIZAR MIRZA AFFANDI', 'L', '2019', 'Influencing', 2),
('16110316', 'IBNU ISWANTORO PRABOWO SUDIBYO', 'L', '2019', 'Steadiness', 3),
('16110337', 'CAHYA NUR SIDIQ', 'L', '2019', 'Influencing', 2),
('16110338', 'ANANG AJI WIBOWO', 'L', '2019', 'Influencing', 2),
('17110001', 'DITA FERDIAN BAYU KUSUMA', 'P', '2019', 'Steadiness', 3),
('17110002', 'RIZQI MUSTHOFA', 'L', '2019', 'Steadiness', 3),
('17110004', 'LABIB FAUZI RAMADAN', 'L', '2019', 'Steadiness', 3),
('17110005', 'NANA SABRINA', 'P', '2019', 'Influencing', 2),
('17110006', 'BIMA RASENDRIYA INDRASTOTO', 'L', '2019', 'Steadiness', 3),
('17110008', 'AZIZAN NURHAKIM', 'L', '2019', 'Steadiness', 3),
('17110012', 'LAELATUL ROFIDA', 'P', '2019', 'Steadiness', 3),
('17110014', 'SEPTIAN PRIMANSYAH', 'L', '2019', 'Influencing', 2),
('17110015', 'DEBI INDARTO', 'P', '2019', 'Influencing', 2),
('17110016', 'ARIEF KURNIA RAMADHANI', 'L', '2019', 'Steadiness', 3),
('17110017', 'YUSUF SUPRIYATNA', 'L', '2019', 'Steadiness', 3),
('17110018', 'KURNIAWAN SAPUTRA', 'L', '2019', 'Dominant', 1),
('17110020', 'AFIF MA\'RUF ESKA', 'L', '2019', 'Influencing', 2),
('17110024', 'ASEP SETIAJI', 'L', '2019', 'Steadiness', 3),
('17110029', 'AHMAD ALWI RAHMAN', 'L', '2019', 'Compliance', 4),
('17110030', 'ENTUK AJI NUGROHO', 'L', '2019', 'Steadiness', 3),
('17110032', 'AFFAN AZ ZARQONI', 'L', '2019', 'Steadiness', 3),
('17110038', 'NURAZIS ADHIRAMA PAMUNGKAS', 'L', '2019', 'Compliance', 4),
('17110042', 'AFREL PUTRA MAHENDRA', 'L', '2019', 'Influencing', 2),
('17110044', 'ARIF SUPRIYONO', 'L', '2019', 'Dominant', 1),
('17110046', 'ADAM AMIRUDIN', 'L', '2019', 'Influencing', 2),
('17110047', 'ABDUL GHOFUR', 'L', '2019', 'Steadiness', 3),
('17110048', 'ARI NUR RIZKI', 'L', '2019', 'Compliance', 4),
('17110050', 'FIQRI OCKAS PERDANA', 'L', '2019', 'Steadiness', 3),
('17110055', 'ZURNAEN EVAN ZIZA RIADHI', 'L', '2019', 'Compliance', 4),
('17110056', 'FAISAL ISKA UKHRIZA', 'L', '2019', 'Steadiness', 3),
('17110059', 'SONY GUNAWAN ZEN', 'L', '2019', 'Steadiness', 3),
('17110066', 'LISNA YANUAR MUKHLIS', 'P', '2019', 'Steadiness', 3),
('17110091', 'GHAUSHIL BADRI AMIN', 'L', '2019', 'Influencing', 2),
('17110104', 'CAROKO WASESO YEKTI', 'L', '2019', 'Compliance', 4),
('17110126', 'MUHAMMAD RIZA FAUZILLAH', 'L', '2019', 'Compliance', 4),
('17110158', 'YUDHISTIRA JANICE AL SAVA', 'L', '2019', 'Compliance', 4),
('17110162', 'MOHAMMAD RIZALDI PRADANA', 'L', '2019', 'Steadiness', 3),
('17110171', 'DANANG RIKIYANTO', 'L', '2019', 'Compliance', 4),
('17110180', 'UTAMI DINI PUSPITA', 'P', '2019', 'Steadiness', 3),
('17110186', 'MUHAMAD MACHFUDZ ALDIANSYAH', 'L', '2019', 'Steadiness', 3),
('17110191', 'GILANG RIZKY MUSTOFA', 'L', '2019', 'Steadiness', 3),
('17110209', 'MUFLIH DZULFIAN', 'L', '2019', 'Dominant', 1),
('17110229', 'ALFIAN KUKUH ADITAMA', 'L', '2019', 'Influencing', 2),
('17110242', 'DIMAS AJI PRASETYO', 'L', '2019', 'Steadiness', 3),
('17110243', 'ADIT TRI SEPTIAWAN', 'L', '2019', 'Steadiness', 3),
('17110244', 'WAHYU SURYO NUROHMAN', 'L', '2019', 'Steadiness', 3),
('17110245', 'PURBO DWI ANGGORO', 'L', '2019', 'Steadiness', 3),
('17110247', 'WHISNU ADAM FATHURROKHMAN', 'L', '2019', 'Steadiness', 3),
('17110248', 'RIJAL AMRI MAJID', 'L', '2019', 'Compliance', 4),
('17110252', 'LAELI NUR HIDAYATI', 'P', '2019', 'Influencing', 2),
('17110263', 'FIKRI RAMADHAN', 'L', '2019', 'Influencing', 2),
('17110273', 'WAWA MAISA FINANTO', 'L', '2019', 'Influencing', 2),
('17110283', 'SUSI SULISTYANINGSIH', 'P', '2019', 'Steadiness', 3),
('17110297', 'SETYO PRIMA AJI', 'L', '2019', 'Steadiness', 3),
('16120002', 'IKE ANTIKA DEWI', 'L', '2019', 'Steadiness', 3),
('16120013', 'MUHAMMAD SYAFIQ IZZAUDIN', 'L', '2019', 'Compliance', 4),
('16120016', 'ROSDIANA PUTRI PANGESTU', 'P', '2019', 'Steadiness', 3),
('16120017', 'ZELIN ARIF KRISNA MURTI', 'L', '2019', 'Compliance', 4),
('16120018', 'DIMAS SETIA HARTADI', 'L', '2019', 'Influencing', 2),
('16120023', 'DHIKA AULIA ATHHUR', 'L', '2019', 'Steadiness', 3),
('16120027', 'FIRMAN FAOZI', 'L', '2019', 'Influencing', 2),
('16120028', 'KRIS TRIO SATRIYONO', 'L', '2019', 'Compliance', 4),
('16120057', 'KRIS JULIYANTO', 'L', '2019', 'Influencing', 2),
('16120058', 'WANODYA DWI HANA W', 'P', '2019', 'Dominant', 1),
('16120059', 'VIKI CAHYANI', 'P', '2019', 'Steadiness', 3),
('16120062', 'BAYU NAVANTO SADIQ', 'L', '2019', 'Steadiness', 3),
('16120063', 'ANGGER SEFTIYAN BAGUS BAHARI', 'L', '2019', 'Influencing', 2),
('16120064', 'INTAN MARTILIA SYAFANGATUN', 'P', '2019', 'Influencing', 2),
('16120074', 'ADE AGAM', 'L', '2019', 'Steadiness', 3),
('16120085', 'HANIF SATRIA NUGRAHA', 'L', '2019', 'Influencing', 2),
('16120087', 'KEVIN ADIYANSAH', 'L', '2019', 'Steadiness', 3),
('16120088', 'SEPTI UJI LESTARI', 'P', '2019', 'Influencing', 2),
('16120090', 'LU\'LU ATUN NI\'MAH', 'P', '2019', 'Compliance', 4),
('16120098', 'WIWIT PURWIYATNI', 'P', '2019', 'Compliance', 4),
('16120103', 'ALFINA RIZQIYA AUGUSTIN', 'P', '2019', 'Compliance', 4),
('16120106', 'WILA AUDINA', 'P', '2019', 'Steadiness', 3),
('16120109', 'CHOIRUNNISA KUSUMAWARDANI', 'P', '2019', 'Steadiness', 3),
('16120124', 'ASIH UDIANTI', 'P', '2019', 'Influencing', 2),
('16120128', 'LENNY AMELIA INDRIYANTI', 'P', '2019', 'Influencing', 2),
('16120136', 'KRISIANA RUPIADI', 'P', '2019', 'Steadiness', 3),
('16120137', 'TITA KUSUMA WARDANI', 'P', '2019', 'Dominant', 1),
('16120139', 'M. MIFTAHUDIN', 'L', '2019', 'Steadiness', 3),
('16120141', 'BELINA INDAH MIANTI', 'P', '2019', 'Steadiness', 3),
('16120147', 'ESTRIANA KRISDIANTARI', 'P', '2019', 'Steadiness', 3),
('16120149', 'TRI MURNIATI', 'P', '2019', 'Compliance', 4),
('16120155', 'RETA DWI ANGGRAENI', 'P', '2019', 'Influencing', 2),
('16120160', 'WIWIT KURNIA FATHIA', 'P', '2019', 'Influencing', 2),
('16120165', 'TRIANA NUR SYAMSIYAH', 'P', '2019', 'Steadiness', 3),
('16120167', 'ANING WAHYUNI', 'P', '2019', 'Steadiness', 3),
('16120175', 'DUMAWAN NUR SETYADI', 'L', '2019', 'Steadiness', 3),
('16120180', 'ABDUL AZIZ', 'L', '2019', 'Steadiness', 3),
('16120192', 'RINDA UTARI', 'P', '2019', 'Compliance', 4),
('16120194', 'FIKA ZULFA', 'P', '2019', 'Steadiness', 3),
('16120197', 'DITA KUSUMA', 'P', '2019', 'Influencing', 2),
('16120198', 'LUTFIA WAHYU ROMADHONI', 'P', '2019', 'Influencing', 2),
('16120200', 'FARKHANAH SITI FAJAR', 'P', '2019', 'Steadiness', 3),
('16120213', 'VEGA DELIA YUSI VEBRIANI', 'P', '2019', 'Dominant', 1),
('16120216', 'RESTA RAMADANI', 'L', '2019', 'Steadiness', 3),
('16120221', 'PUJI SULIS STIAWATI', 'P', '2019', 'Compliance', 4),
('16120223', 'DWI SEPTI RAHAYU PRATIWI', 'P', '2019', 'Steadiness', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(8, 'dita', 'dita', 'e6b047aa9378bce37a5260a949d1ea3e', 'operator'),
(1, 'Yovie Fesya Pratama', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'admin'),
(9, 'dita1', 'dita1', 'e6b047aa9378bce37a5260a949d1ea3e', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
