-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2022 pada 17.54
-- Versi server: 5.7.21-log
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_komoditi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nm_bahan` varchar(100) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nm_bahan`, `foto`, `keterangan`, `deleted`) VALUES
(1, 'Beras', '1.jpg', 'Raskin', 0),
(2, 'Minyak', '398077844.jpg', '', 0),
(4, 'Jagung', '278742210.jpg', '', 0),
(5, 'Telur', '1798071043.jpg', '-', 0),
(6, 'Gula Pasir', '1017205789.jpg', 'manis', 0),
(7, 'Ayam', 'default.jpg', 'bakar', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `nm_distributor` varchar(100) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `id_jenis`, `nm_distributor`, `telpon`, `alamat`, `keterangan`, `deleted`) VALUES
(1, 1, 'nexSOFT', '0928408739', 'Tangerang', '-', 0),
(2, 4, 'test', '089', 'test', 'test', 1),
(3, 4, 'PT Indofood', '089939643', 'Jakarta', 'Distributor', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_distributor`
--

CREATE TABLE `jenis_distributor` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_distributor`
--

INSERT INTO `jenis_distributor` (`id_jenis`, `nm_jenis`, `keterangan`, `deleted`) VALUES
(1, 'Kemasan Merk MM', 'Keterangan Kemasan Merk MM', 0),
(2, 'Tahu Bulat', '-', 1),
(3, 'Kemasan Merk Aqua', '-', 1),
(4, 'Kemasan Merk Aqua', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nm_lokasi` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nm_lokasi`, `keterangan`, `deleted`) VALUES
(1, 'Palembang', '-', 0),
(2, 'Ogan Komelir Ilir', '', 0),
(3, 'Pasar OKI 2', '2', 1),
(4, 'Cirebon', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan`
--

CREATE TABLE `persediaan` (
  `id_persediaan` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `persediaan` int(11) NOT NULL,
  `satuan` varchar(40) NOT NULL,
  `update_persediaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `id_distributor`, `id_lokasi`, `id_bahan`, `persediaan`, `satuan`, `update_persediaan`) VALUES
(1, 1, 1, 1, 100, 'Ton', '2022-06-27'),
(2, 1, 1, 2, 2000, 'Liter', '2022-06-27'),
(3, 1, 1, 4, 200, 'Ton', '2022-06-27'),
(4, 1, 1, 5, 100, 'Kg', '2022-06-27'),
(5, 1, 2, 1, 100, 'Ton', '2022-06-27'),
(6, 1, 2, 2, 124, 'Ton', '2022-06-27'),
(7, 1, 2, 4, 123, 'Ton', '2022-06-27'),
(8, 1, 2, 5, 100, 'Ton', '2022-06-27'),
(9, 3, 1, 1, 100, 'Ton', '2022-06-27'),
(10, 3, 1, 2, 125, 'Ton', '2022-06-27'),
(11, 3, 1, 4, 100, 'Ton', '2022-06-27'),
(12, 3, 1, 5, 125, 'Ton', '2022-06-27'),
(13, 3, 2, 1, 1000, 'Kg', '2022-06-27'),
(14, 3, 2, 2, 1000, 'Liter', '2022-06-27'),
(15, 3, 2, 4, 10, 'Ton', '2022-06-27'),
(16, 3, 2, 5, 250, 'Kg', '2022-06-27'),
(17, 3, 2, 6, 550, 'Kg', '2022-06-27'),
(18, 1, 1, 1, 0, 'Ton', '2022-06-28'),
(19, 1, 1, 2, 0, 'Ton', '2022-06-28'),
(20, 1, 1, 4, 0, 'Ton', '2022-06-28'),
(21, 1, 1, 5, 0, 'Ton', '2022-06-28'),
(22, 1, 1, 6, 0, 'Ton', '2022-06-28'),
(23, 1, 1, 4, 199, 'Ton', '2022-06-29'),
(24, 3, 2, 1, 0, 'Ton', '2022-06-29'),
(25, 3, 2, 2, 0, 'Ton', '2022-06-29'),
(26, 3, 2, 4, 0, 'Ton', '2022-06-29'),
(27, 3, 2, 5, 0, 'Ton', '2022-06-29'),
(28, 3, 2, 6, 0, 'Ton', '2022-06-29'),
(29, 3, 2, 7, 0, 'Ton', '2022-06-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `update_harga`
--

CREATE TABLE `update_harga` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_harga` date NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `update_harga`
--

INSERT INTO `update_harga` (`id`, `id_bahan`, `id_lokasi`, `harga`, `tgl_harga`, `satuan`) VALUES
(9, 1, 1, 12500, '2022-06-27', 'Kg'),
(10, 2, 1, 25000, '2022-06-27', 'Liter'),
(11, 4, 1, 10000, '2022-06-27', 'Kg'),
(12, 5, 1, 13500, '2022-06-27', 'Kg'),
(13, 1, 2, 10000, '2022-06-27', 'Kg'),
(14, 2, 2, 22500, '2022-06-27', 'Liter'),
(15, 4, 2, 10500, '2022-06-27', 'Kg'),
(16, 5, 2, 25000, '2022-06-27', 'Kg'),
(17, 1, 1, 12000, '2022-06-28', 'Kg'),
(18, 2, 1, 13000, '2022-06-28', 'Kg'),
(19, 4, 1, 15000, '2022-06-28', 'Kg'),
(20, 5, 1, 12500, '2022-06-28', 'Kg'),
(21, 6, 1, 30000, '2022-06-28', 'Kg'),
(22, 1, 1, 12000, '2022-06-29', 'Kg'),
(23, 2, 1, 12500, '2022-06-29', 'Kg'),
(24, 4, 1, 12500, '2022-06-29', 'Kg'),
(25, 5, 1, 12000, '2022-06-26', 'Kg'),
(26, 6, 1, 12500, '2022-06-29', 'Kg'),
(27, 5, 1, 13500, '2022-06-25', 'Kg'),
(28, 5, 1, 14500, '2022-06-24', 'Kg'),
(29, 5, 1, 15000, '2022-06-29', 'Kg'),
(30, 5, 1, 13667, '2022-06-30', 'Kg'),
(31, 1, 2, 10000, '2022-06-29', 'Kg'),
(32, 2, 2, 12500, '2022-06-29', 'Kg'),
(33, 4, 2, 13500, '2022-06-29', 'Kg'),
(34, 5, 2, 12000, '2022-06-29', 'Kg'),
(35, 6, 2, 14000, '2022-06-29', 'Kg'),
(36, 7, 2, 15000, '2022-06-29', 'Kg'),
(37, 7, 1, 12500, '2022-06-29', 'Kg'),
(38, 1, 4, 12500, '2022-06-29', 'Kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_user`, `level`, `foto`) VALUES
('62b8556487642', 'manda', '$2y$10$Yu1ziUFIrjktqeBPpLtfiO5mWh9XXdhdwHIpYT8ThaGTXl13NJa1q', 'Manda Alamanda', 'Administrator', '1.jpg'),
('62b8fc3b96103', 'kris', '$2y$10$wbF8XhqQYiEZEXYBNkDD0.Rp.hvYylWcXsJoJEQSGZ7vRN9zpPWh2', 'kris', 'Administrator', '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `jenis_distributor`
--
ALTER TABLE `jenis_distributor`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id_persediaan`);

--
-- Indeks untuk tabel `update_harga`
--
ALTER TABLE `update_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_distributor`
--
ALTER TABLE `jenis_distributor`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_persediaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `update_harga`
--
ALTER TABLE `update_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `distributor_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_distributor` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
