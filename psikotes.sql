-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2017 at 04:49 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(5) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(5, 'TI 2014 E'),
(4, 'TI 2014 D'),
(3, 'TI 2014 C'),
(2, 'TI 2014 B'),
(1, 'TI 2014 A'),
(6, 'TI 2014 F'),
(7, 'SI 2014 A'),
(8, 'SI 2014 B'),
(9, 'SI 2014 C'),
(10, 'SI 2014 D');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_ujian`
--

CREATE TABLE `kelas_ujian` (
  `id_ujian` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_ujian`
--

INSERT INTO `kelas_ujian` (`id_ujian`, `id_kelas`, `aktif`) VALUES
(84, 22, 'N'),
(1, 22, 'Y'),
(1, 21, 'Y'),
(84, 21, 'N'),
(84, 1, 'N'),
(1, 28, 'Y'),
(83, 22, 'N'),
(83, 21, 'N'),
(84, 43, 'N'),
(84, 28, 'N'),
(77, 21, 'Y'),
(77, 1, 'N'),
(77, 22, 'N'),
(77, 28, 'N'),
(77, 43, 'N'),
(81, 21, 'N'),
(1, 43, 'Y'),
(86, 21, 'Y'),
(85, 21, 'Y'),
(83, 28, 'N'),
(81, 22, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_ujian` int(5) NOT NULL,
  `acak_soal` text NOT NULL,
  `jawaban` text NOT NULL,
  `sisa_waktu` varchar(10) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nilaiD` int(100) NOT NULL,
  `nilaiI` int(11) NOT NULL,
  `nilaiS` int(11) NOT NULL,
  `nilaiC` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `id_ujian`, `acak_soal`, `jawaban`, `sisa_waktu`, `kategori`, `nilaiD`, `nilaiI`, `nilaiS`, `nilaiC`) VALUES
(98, '14110307', 0, '103,102,100,101,99', '3,1,4,2,1', 'NaN:NaN', 'Conscientiousness', 2, 1, 1, 1),
(100, '14110298', 0, '119,118,116,117,115,114,113,112,111,109,110,108,107,105,106,104,103,102,100,101,99,120,121,122', '3,1,1,1,3,1,3,2,2,2,4,2,4,4,3,3,1,4,4,4,3,1,3,2', 'NaN:NaN', 'Steadiness', 6, 5, 7, 6),
(92, '14110227', 0, '103,102,100,101,99', '2,1,3,3,4', 'NaN:NaN', 'Influencing', 1, 1, 2, 1),
(94, '14110281', 0, '103,102,100,101,99', '4,1,2,3,2', 'NaN:NaN', 'Steadiness', 1, 2, 1, 1),
(101, '14110291', 0, '119,118,116,117,115,114,113,112,111,109,110,108,107,105,106,104,103,102,100,101,99,120,121,122', '1,2,1,3,4,3,2,4,4,2,3,3,1,3,3,3,3,1,1,1,1,4,4,3', 'NaN:NaN', 'Steadiness', 7, 3, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nim`, `nama`, `password`, `id_kelas`, `status`) VALUES
('14110307', 'Titik Rosiani', '2c87ee6a9efb3b2587196c21dec0f593', 7, 'off'),
('14110227', 'Desi Rahmawati', '32d4b1c1d519704379402e28fdb99e87', 9, 'off'),
('15110284', 'Rilas Agung', 'f86194e5108223325e2c43aa0997bb80', 8, 'off'),
('14110281', 'Endra Saputra', 'ad991d32eb17e17007e63268f19944b6', 8, 'off'),
('14110300', 'Rizky Agung', '9f75e281cbe6072bd91a286e64fb6f0d', 5, 'login'),
('14110283', 'Sholehudin', '2e6366e071e041f3f82c509832783e15', 2, 'off'),
('14110266', 'Gilang Ramadhan', '69db5264ec7a1ac4b8d56eb11bb9d47b', 5, 'login'),
('14110301', 'Yohanes Kristanto', '3a0092394aff4908f62eff1f8730d3d4', 4, 'off'),
('14110293', 'Agustianto', '13fe574ca0b106d51ffa7991b530b3ee', 3, 'off'),
('14110298', 'Praditans', '10e47d97180f06fff48dea638bf66077', 2, 'login'),
('14110226', 'Dian restiani', '11f984d3ebfe3f36f88afde6ea344685', 2, 'login'),
('14110304', 'Meirza Arif', '57b289b3aea71744fa6236a5984019d0', 1, 'off'),
('14110291', 'Lusiana', '09c79cff71d2b5acd7bf043a2bec2bb6', 7, 'off');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(5) NOT NULL,
  `id_ujian` int(5) NOT NULL,
  `soal` text NOT NULL,
  `pilihan_1` text NOT NULL,
  `pilihan_2` text NOT NULL,
  `pilihan_3` text NOT NULL,
  `pilihan_4` text NOT NULL,
  `kunci` int(2) NOT NULL,
  `kunci2` int(2) NOT NULL,
  `kunci3` int(2) NOT NULL,
  `kunci4` int(2) NOT NULL,
  `urut` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_ujian`, `soal`, `pilihan_1`, `pilihan_2`, `pilihan_3`, `pilihan_4`, `kunci`, `kunci2`, `kunci3`, `kunci4`, `urut`) VALUES
(119, 0, '<p>Mana yang sesuai dengan diri anda....</p>', '<p>penuh semangat</p>', '<p>pandai bergaul</p>', '<p>tidak mudah cemas akan segala sesuatu</p>', '<p>bertingkah laku baik / &nbsp;bersikap sewajarnya</p>', 1, 2, 3, 4, 0),
(118, 0, '<p>mana yang tidak sesuai dengan diri anda....</p>', '<p>suka berdebat</p>', '<p>berwatak gembira</p>', '<p>tidak terlalu serius</p>', '<p>mengerjakan sesuatu dengan perintah</p>', 1, 2, 3, 4, 0),
(116, 0, '<p>Mana yang sesuai dengan diri anda....</p>', '<p>bertekad mencapai hasil</p>', '<p>menunjukan penghargaan</p>', '<p>baik hati</p>', '<p>pasrah</p>', 1, 2, 3, 4, 0),
(117, 0, '<p>Mana yang tidak sesuai dengan diri anda....</p>', '<p>suka mengambil kesempatan</p>', '<p>selalu berpikir positif</p>', '<p>mengerjakan sesuatu untuk sesama</p>', '<p>menunjukan rasa hormat</p>', 1, 2, 3, 4, 0),
(115, 0, '<p>Mana yang tidak sesuai dengan diri anda....</p>', '<p>menyelesaikan tugas</p>', '<p>ceria</p>', '<p>bersedia berbagi dengan orang lain</p>', '<p>patuh pada peraturan</p>', 1, 2, 3, 4, 0),
(114, 0, '<p>Mana yang tidak sesuai dengan diri anda....</p>', '<p>berani mempertahankan hak</p>', '<p>percaya pada kemampuan diri sendiri</p>', '<p>prihatin terhadap sesama</p>', '<p>penuh perhatian terhadap sesama</p>', 1, 2, 3, 4, 0),
(113, 0, '<p>Mana yang sesuai dengan diri anda....</p>', '<p>bersemangat</p>', '<p>berkeinginan kuat</p>', '<p>bersedia membantu orang lain</p>', '<p>mudah menyetujui / penurut</p>', 1, 2, 3, 4, 0),
(112, 0, '<p>Mana yang tidak sesuai dengan diri anda...</p>', '<p>siaga / siap berbuat sesuatu</p>', '<p>dapat meyakinkan orang lain terhadap pandangannya</p>', '<p>berkemauan keras / bersungguh-sungguh</p>', '<p>menghindari kesulitan</p>', 1, 2, 3, 4, 0),
(111, 0, '<p>Mana yang tidak sesuai dengan diri anda...</p>', '<p>memaksa diri berbuat sesuatu</p>', '<p>periang</p>', '<p>mudah memanfaatkan peluang</p>', '<p>takut mengambil keputusan</p>', 1, 2, 3, 4, 0),
(109, 0, '<p>Mana yang tidak sesuai dengan diri anda....</p>', '<p>suka mengambil keputusan</p>', '<p>suka berbicara</p>', '<p>pengendalian diri</p>', '<p>bekerja sesuai dengan kebiasaan</p>', 1, 2, 3, 4, 0),
(110, 0, '<p>Mana yang tidak sesuai dengan diri anda....</p>', '<p>Pemberani</p>', '<p>bertata krama</p>', '<p>merasa puas</p>', '<p>hati - hati untuk tidak menyakiti orang lain</p>', 1, 2, 3, 4, 0),
(108, 0, '<p>Mana yang sesuai dengan diri anda....</p>', '<p>mau mengambil resiko</p>', '<p>baik dan tulus hati</p>', '<p>tenang</p>', '<p>mudah menerima saran</p>', 1, 2, 3, 4, 0),
(107, 0, '<p>Mana yang tidak sesuai dengan anda....</p>', '<p>tergantung pada diri sendiri, mandiri</p>', '<p>suka bergaul dan bersahabat</p>', '<p>dapat menunggu dengan sabar</p>', '<p>berbicara dengan lembut</p>', 1, 2, 3, 4, 0),
(105, 0, '<p>Mana yang sesuai dengan anda...</p>', '<p>ingin selalu menang</p>', '<p>suka bergurau</p>', '<p>patuh pada perintah</p>', '<p>ingin segalanya tepat dan akurat</p>', 1, 2, 3, 4, 0),
(106, 0, '<p>Mana yang sesuai dengan anda....</p>', '<p>ingin selalu menang</p>', '<p>suka bergurau</p>', '<p>patuh pada perintah</p>', '<p>ingin segalanya tepat dan akurat</p>', 1, 2, 3, 4, 0),
(104, 0, '<p>Mana yang tidak sesuai dengan anda....</p>', '<p>menyukai tantangan</p>', '<p>menyenangkan hati / riang gembira</p>', '<p>penuh pemikiran / perhatian</p>', '<p>mudah bergaul</p>', 1, 2, 3, 4, 0),
(103, 0, '<p>Mana yang tidak sesuai dengan diri anda...</p>', '<p>memiliki keberanian</p>', '<p>suka menyenangkan orang lain</p>', '<p>tidak mudah kecewa</p>', '<p>bekerja dengan tepat dan cermat</p>', 1, 2, 3, 4, 0),
(102, 0, '<p>mana yang tidak sesuai dengan diri anda....</p>', '<p>pantang menyerah</p>', '<p>periang</p>', '<p>berusaha menyenangkan orang lain</p>', '<p>mau menerima gagasan baru</p>', 1, 2, 3, 4, 0),
(100, 0, '<p>Mana yang tidak sesuai dengan diri anda...</p>', '<p>suka pada gagasan sendiri</p>', '<p>ramah kepada orang lain</p>', '<p>baik hati</p>', '<p>mau berkejasama</p>', 1, 2, 3, 4, 0),
(101, 0, '<p>Mana yang sesuai dengan diri anda...</p>', '<p>berani</p>', '<p>ramah dan menyenangkan</p>', '<p>dapat diandalkan</p>', '<p>mengikuti gagasan orang lain</p>', 1, 2, 3, 4, 0),
(99, 0, '<p>Mana yang sesuai dengan diri anda...</p>', '<p>mengerjakan sesuatu secara berbeda</p>', '<p>dapat memperngaruhi orang lain untuk setuju</p>', '<p>lemah lembut</p>', '<p>malu</p>', 1, 2, 3, 4, 0),
(120, 0, '<p>Mana yang tidak sesuai dengan diri anda...</p>', '<p>mengatakan apa yang dipikirkan</p>', '<p>suka berkawan</p>', '<p>berhati-hati untuk tidak terlibat</p>', '<p>ingin segala sesuatu berjalan dengan benar</p>', 1, 2, 3, 4, 0),
(121, 0, '<p>Mana yang sesuai dengan diri anda....</p>', '<p>mudah merasa bosan&nbsp;</p>', '<p>ingin disukai</p>', '<p>senang membantu teman</p>', '<p>berusaha mengerjakan apa yang diperintahkan</p>', 1, 2, 3, 4, 0),
(122, 0, '<p>Mana yang tidak sesuai dengan diri anda...</p>', '<p>bersikap baik pada orang lain</p>', '<p>percaya pada orang lain</p>', '<p>puas terhadapa diri sendiri</p>', '<p>tidak suka bersilang pendapat / berdebat</p>', 1, 2, 3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` int(5) NOT NULL,
  `jml_soal` int(3) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `judul`, `tanggal`, `waktu`, `jml_soal`, `id_user`) VALUES
(1, 'Ujian Psikotes 2', '0000-00-00', 5, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(8, 'dita', 'dita', 'e6b047aa9378bce37a5260a949d1ea3e', 'operator'),
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
