-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 09:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asppi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `noanggota` varchar(32) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notlp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `alamatp` varchar(255) NOT NULL,
  `noper` varchar(15) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `bidusaha` varchar(100) NOT NULL,
  `tglmasuk` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `noanggota`, `nik`, `nama`, `ttl`, `jk`, `alamat`, `notlp`, `email`, `perusahaan`, `alamatp`, `noper`, `jabatan`, `bidusaha`, `tglmasuk`, `foto`) VALUES
(1, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'Jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(2, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'Jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(3, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(4, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(5, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(6, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(7, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(8, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(9, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg'),
(10, 'No. Anggota', '9[', 'Nama', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Alamat', '9<=2WG0GX<8', 'O\"-0', 'Perusahaan', 'Alamat Perusahaan', 'Telepon Perusah', 'jabatan', 'Bidang Usaha', 'Tanggal Masuk', 'nopicture.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(9, 'user', '$2y$10$D0lIZZIZS2JlIneRWxwx9uzw5SHaUs4WF.VX6PRR7cbKVmA3/SsL6', 'user'),
(13, 'user2', '$2y$10$BPRICqVLA2T4k5rsVJIdzuVfpUNNhNOafynN69kckxM.SQUr1Ua.u', 'user'),
(16, 'admin', '$2y$10$pd4Xuh8uHL6goQOD.JA7UO/Gg.oyaMJFfdzGawIbv1SmgSNlerTPO', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
