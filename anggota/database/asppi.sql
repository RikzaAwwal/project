-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2022 pada 14.32
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
-- Database: `asppi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `noanggota` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `jk` varchar(32) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notlp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `bidusaha` varchar(32) NOT NULL,
  `tglmasuk` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `noanggota`, `nik`, `nama`, `ttl`, `jk`, `alamat`, `notlp`, `email`, `perusahaan`, `bidusaha`, `tglmasuk`, `foto`) VALUES
(24, '12.07.00001', ' c3+h+c+ l3cccU', 'ABDUL ROZAK', 'Jakarta, 10 Desember 1972', 'Laki-laki', 'Kab. Cirebon', 'ct+ LllL l', '	<z\"q\Z\"\\%l3v\"<<=6<O', 'Diva Tour Organizer', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(25, '12.07.00003', ' c3 t cc+Uccc+', 'NONO WARSONO', 'Cirebon, 25 Maret 1971', 'Laki-laki', 'Kab. Cirebon', 'B', '8<8<=b\"	y<8<v\"<<=6<O', 'Kelapa Manis Resto', 'Restoran/Rumah Makan', '01 Januari 2019', 'nopicture.jpg'),
(26, '12.07.00004', ' c3+hcUchU3cc+c', 'DIDI JUNAEDI', 'Cirebon, 07 Mei 1979', 'Laki-laki', 'Kab. Cirebon', 'B', '8\"G%-%-%-cLhsO\"-0=6<O', 'Diva Tour Organizer', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(27, '12.23.00001', 'B', 'MUHAMMAD TAUFIQ HIDAYAT', 'Cirebon, 01 Januari 1975', 'Laki-laki', 'Kota Cirebon', 'ct++ Lltht+', 'A\"Z-UtsO\"-0=6<O', 'PT Tujuh Garis Wisata', 'Bidang Usaha', '01 Januari 2019', 'nopicture.jpg'),
(28, '12.23.00003', 'B', 'IMAS KURNIAWATI', 'Tasikmalaya, 29 Juni 1989', 'Perempuan', 'Kota Cirebon', 'c +tcc33L', '-O\"y=q	8-\"b\"A-vO\"-0=6<O', 'JASA WISATA TOUR ORGANIZER', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(29, '12.23.00004', ' c3 +l+++Uhcccl', 'TRI NOVIYANTI', 'Cirebon, 21 November 1975', 'Perempuan', 'Kota Cirebon', 'B', '=8<g-v\"8A-sO\"-0=6<O', 'PT Caruban Tomodachi', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(30, '12.23.00005', ' ULchlt++UUccch', 'NOVI ANNISA', 'Sukabumi, 28 November 1977', 'Laki-laki', 'Kota Cirebon', 'c + cU+3l', '\"OX-	<\ZAyv\"<<=6<O', 'Jampiro Travel &amp; Business Service', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(31, '12.23.00006', ' ULc +cUttccch', 'AGUNG HARISUCIPTO', 'Kuningan, 21 Juli 1988', 'Laki-laki', 'Kota Cirebon', 'B', '\"s8sq-0\"Z\"=6<O', 'Kilafa Tour', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(32, '12.23.00007', ' ULclU+cUhcc+', 'UUN UNERIE', 'Cirebon, 27 Oktober 1975', 'Laki-laki', 'Kota Cirebon', 'c +ll+cc', 'G-00=A<	sO\"-0=6<O', 'Ebill Tour', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(33, '12.23.00008', ' ULc++Lct3+ccct', 'RANDY AGUSTIAN A.', 'Cirebon, 14 Agustus 1991', 'Laki-laki', 'Kota Cirebon', 'c +3+UL', '	\"8%v	GsvsO\"-0=6<O', 'SMART TRAVELLING', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(34, '12.23.00010', 'B', 'ARIS IRWANDI', 'Cirebon, 06 September 1983', 'Laki-laki', 'Kota Cirebon', 'B', '\"	-y=-	b\"8%-v\"<<=6<O', 'ELWIS TOUR', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(35, '12.23.00013', ' ULcL+hc+UccccU', 'DAUD MULJANTO', 'Cirebon, 15 Januari 1970', 'Laki-laki', 'Kota Cirebon', 'c + c l ', '%\"%=O0\"8A<v\"<<=6<O', 'TOKO DAUD', 'Pusat Oleh-oleh, Souvenir', '01 Januari 2019', 'nopicture.jpg'),
(37, '12.23.00017', ' ULch+t+ tcccct', 'DENI SUTIADI, SE', 'Cirebon, 18 Desember 1980', 'Laki-laki', 'Kota Cirebon', 'c +ttclU+U', 'v\"	%\"\"A	\"gG0sO\"-0=6<O', 'YARDHAA TOUR AND TRAVEL', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(38, '12.23.00018', ' c3 cL3cUULcc+h', 'N DEDEH DAHLIA', 'Majalengka, 09 Juli 1974', 'Perempuan', 'Kota Cirebon', 'ct 3ULLt', '%%\"0-\"vO\"-0=6<O', 'Dahlia Tour &amp; Travel', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(39, '12.23.00020', ' c3 chlc+l+ccc+', 'ANITA KUSUMAWARDHANI', 'Jakarta, 16 Januari 1961', 'Perempuan', 'Kota Cirebon', 'c +LtUhlL', '\"8-A\"=vyOsO\"-0=6<O', 'PT SEKAR KEDAWUNG LESTARI', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(40, '12.23.00021', ' ULchh3++lUccch', 'ISMAYASARI', 'Garut, 19 November 1967', 'Perempuan', 'Kota Cirebon', 'B', '-yO\"v\"3UsO\"-0=6<O', 'Jamblang Wahid', 'Restoran/Rumah Makan', '01 Januari 2019', 'nopicture.jpg'),
(41, '12.23.00026', 'B', 'EDY RUSMAN PURNAMA', 'Cirebon, 12 Maret 1980', 'Laki-laki', 'Kota Cirebon', 'ct  +Lt+L ', 'G%v\Zb-y\"A\"v\"<<=6<O', 'CV. WISATA TRAVELINDO TOURS &amp; TRAVEL', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg'),
(42, '12.23.00027', ' ULcL 3cUUccch', 'ADI SUCIPTO SUJANTO', 'Cirebon, 29 Maret 1977', 'Laki-laki', 'Kota Cirebon', 'B', '\"y\"8A<ttsO\"-0=6<O', 'CIREBON JOY', 'Pusat Oleh-oleh, Souvenir', '01 Januari 2019', 'nopicture.jpg'),
(43, '12.11.00003', 'B', 'AGENG SUTRISNO', 'Kuningan, 17 September 1991', 'Laki-laki', 'Kab. Kuningan', 'B', '\"sG8s=yA	-y8<+sO\"-0=6<O', 'PESONA LINGGARJATI TOUR TRAVEL', 'Bidang Usaha', '01 Januari 2019', 'nopicture.jpg'),
(44, '12.11.00006', ' ct   c+c3Lccc ', 'PENY NURSYAMSI', 'Kuningan, 20 Oktober 1994', 'Laki-laki', 'Kab. Kuningan', 'c  tl++c t', '8	yv\"Oy-XG8vsO\"-0=6<O', 'CV. BUJANGGA MANIK', 'Biro Perjalanan Wisata', '01 Januari 2019', 'nopicture.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'user', '$2y$10$2RJPAHAdGL9K5.ihGk.RFOa8pC4Ikc4STSDAFlkrA1Ou9MR8NXG0y'),
(2, 'admin', '$2y$10$9ZIFCua.Ud7vzfAogZkxWugRbPaMn0KiHFNie1EsJID9HPubhcZ8i'),
(3, 'asppi', '$2y$10$1ecDzdkcGKO6FiNnPMwSKebC5ujoUfMN/qrNYOYjPnuf0Jkdy5Qo2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
