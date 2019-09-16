-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2019 at 07:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `induk` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `nama_menu`, `link`, `icon`, `induk`) VALUES
(1, 'DATAbase SISWA', 'siswa', 'metismenu-icon pe-7s-user', 0),
(2, 'DATAbase GURU', 'guru', 'metismenu-icon pe-7s-study', 0),
(3, 'Data Sekolah', 'sekolah', 'metismenu-icon pe-7s-culture', 0),
(9, 'Master Data', '#', 'metismenu-icon pe-7s-display2', 0),
(10, 'Mata Pelajaran', 'mapel', 'metismenu-icon pe-7s-albums', 9),
(11, 'Ruangan Kelas', 'ruang', 'metismenu-icon pe-7s-display1', 9),
(12, 'Jurusan', 'jurusan', 'metismenu-icon pe-7s-news-papper', 9),
(13, 'Tahun Akademik', 'tahunakademik', 'metismenu-icon pe-7s-date', 9),
(14, 'Jadwal pelajaran', 'jadwal', 'metismenu-icon pe-7s-browser', 0),
(15, 'Kelompok Belajar', 'kelompok', 'metismenu-icon pe-7s-users', 9),
(16, 'laporan nilai', 'nilai', 'metismenu-icon pe-7s-note', 0),
(17, 'Pengguna sistem', 'users', 'metismenu-icon pe-7s-config', 0),
(19, 'Kurikulum', 'kurikulum', 'metismenu-icon pe-7s-notebook', 9),
(20, 'Wali Kelas', 'wali', 'metismenu-icon pe-7s-add-user', 0),
(21, 'form pembayaran', 'keuangan/form', 'metismenu-icon pe-7s-wallet', 0),
(22, 'Peserta Didik', 'siswa/siswa_didik', 'metismenu-icon pe-7s-id', 0),
(23, 'jenis pembayaran', 'jenis_pembayaran', 'metismenu-icon pe-7s-cash', 0),
(24, 'setup biaya', 'keuangan/setup', 'metismenu-icon pe-7s-calculator', 0),
(25, 'Raport Online', 'raport', 'metismenu-icon pe-7s-note2', 0),
(26, 'SMS GATEWAY', 'sms', 'metismenu-icon pe-7s-comment', 0),
(27, 'phonebook', 'sms_group', 'metismenu-icon pe-7s-call', 26),
(28, 'form sms', 'sms', 'metismenu-icon pe-7s-chat', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gender` enum('P','W') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `kd_agama` varchar(2) NOT NULL,
  `foto` text NOT NULL,
  `id_kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nim`, `nama`, `gender`, `tanggal_lahir`, `tempat_lahir`, `kd_agama`, `foto`, `id_kelompok`) VALUES
('201581211', 'Joko Rusyanto', 'P', '2019-08-07', 'Jepara', '01', 'team-39.jpg', 2),
('201581222', 'Manahati', 'W', '2019-08-28', 'Bangkok', '01', 'team-4.jpg', 5),
('231232112', 'Aminudin', 'P', '2019-09-12', 'Demak', '01', 'team-112.jpg', 3),
('231232142', 'Bambang Susanto', 'P', '2019-08-09', 'Jepara', '01', 'team-33.jpg', 3),
('TKJ11232434', 'Alamudin', 'P', '2019-09-10', 'Denak', '01', 'team-110.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
