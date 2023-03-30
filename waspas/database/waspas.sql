-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2023 pada 10.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `combine`
--

CREATE TABLE `combine` (
  `id` int(11) NOT NULL,
  `kodetoko` varchar(255) NOT NULL,
  `kodekrit` varchar(255) NOT NULL,
  `kodesub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `combine`
--

INSERT INTO `combine` (`id`, `kodetoko`, `kodekrit`, `kodesub`) VALUES
(105, 'T01', 'K01', 500),
(106, 'T01', 'K02', 505),
(107, 'T01', 'K03', 509),
(108, 'T01', 'K04', 530),
(109, 'T02', 'K01', 501),
(110, 'T02', 'K02', 507),
(111, 'T02', 'K03', 509),
(112, 'T02', 'K04', 532),
(113, 'T03', 'K01', 504),
(114, 'T03', 'K02', 506),
(115, 'T03', 'K03', 509),
(116, 'T03', 'K04', 531),
(133, 'T04', 'K01', 504),
(134, 'T04', 'K02', 506),
(135, 'T04', 'K03', 509),
(136, 'T04', 'K04', 532);

-- --------------------------------------------------------

--
-- Struktur dari tabel `krit`
--

CREATE TABLE `krit` (
  `kodekrit` varchar(255) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `krit`
--

INSERT INTO `krit` (`kodekrit`, `kriteria`, `jenis`, `bobot`) VALUES
('K01', 'Kriteria 1', 'Benefit', 4),
('K02', 'Kriteria 2', 'Cost', 2),
('K03', 'Kriteria 3', 'Benefit', 2),
('K04', 'Kriteria 4', 'Benefit', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkrit`
--

CREATE TABLE `subkrit` (
  `kodesub` int(11) NOT NULL,
  `kodekrit` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subkrit`
--

INSERT INTO `subkrit` (`kodesub`, `kodekrit`, `keterangan`, `nilai`) VALUES
(500, 'K01', 'Sub 1', 1),
(501, 'K01', 'Sub 2', 2),
(503, 'K01', 'Sub 3', 3),
(504, 'K01', 'Sub 4', 4),
(505, 'K02', 'Sub 1', 1),
(506, 'K02', 'Sub 2', 2),
(507, 'K02', 'Sub 3', 3),
(508, 'K02', 'Sub 4', 4),
(509, 'K03', 'Sub 1', 1),
(510, 'K03', 'Sub 2', 2),
(511, 'K03', 'Sub 3', 3),
(512, 'K03', 'Sub 4', 4),
(530, 'K04', 'Sub 1', 1),
(531, 'K04', 'Sub 2', 2),
(532, 'K04', 'Sub 3', 3),
(533, 'K04', 'Sub 4', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `kodetoko` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`kodetoko`, `nama`, `alamat`) VALUES
('T01', 'Toko 1', 'Alamat'),
('T02', 'Toko 2', 'Alamat'),
('T03', 'Toko 3', 'Alamat'),
('T04', 'Toko 4', 'Alamat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('manager', 'manager', 'manager'),
('sales', 'sales', 'sales');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `combine`
--
ALTER TABLE `combine`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `krit`
--
ALTER TABLE `krit`
  ADD PRIMARY KEY (`kodekrit`);

--
-- Indeks untuk tabel `subkrit`
--
ALTER TABLE `subkrit`
  ADD PRIMARY KEY (`kodesub`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`kodetoko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `combine`
--
ALTER TABLE `combine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `subkrit`
--
ALTER TABLE `subkrit`
  MODIFY `kodesub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
