-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2022 pada 06.58
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
-- Database: `db_lldikti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `no_registrasi` varchar(50) NOT NULL,
  `nm_dosen` varchar(60) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_dosen` date NOT NULL,
  `jenis_ikatan` varchar(50) NOT NULL,
  `status_dosen` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `angka_kredit` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_pt` int(11) NOT NULL,
  `last_edu` varchar(4) NOT NULL,
  `tahun_lulus` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `foto`, `nip`, `no_registrasi`, `nm_dosen`, `tempat_lahir`, `tgl_lahir`, `tmp_dosen`, `jenis_ikatan`, `status_dosen`, `jabatan`, `angka_kredit`, `id_prodi`, `id_pt`, `last_edu`, `tahun_lulus`, `created_at`, `deleted`) VALUES
(1, '1674724237.JPG', '98872638746', '98273536', 'Kristianto, S.Kom', 'Cirebon', '1998-11-11', '2022-07-08', '', 'Aktif', 'Rektor Kepala', 144, 1, 3, 'S1', '2020', '2022-07-02 10:41:49', 0),
(2, '45008854.JPG', '9845794', '3298759348', 'dr. Ikhlasul Amal, S.Kom', 'Palembang', '1999-07-05', '2022-07-19', '', 'Aktif', 'Asisten Ahli', 144, 1, 1, 'S1', '2022', '2022-07-02 10:42:21', 0),
(3, '390993429.JPG', '20893874983', '98345693', 'M.Rizky Firdaus, A.Md,Kom', 'Palembang', '1998-08-08', '2022-07-21', '', 'Aktif', 'Asisten Ahli', 124, 1, 2, 'S1', '2022', '2022-07-02 10:42:05', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `kode_fakultas` varchar(50) NOT NULL,
  `nm_fakultas` varchar(60) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `kode_fakultas`, `nm_fakultas`, `deleted`) VALUES
(1, '0001', 'Fakultas Teknologi Informasi', 0),
(2, '0002', 'Fakultas Pendidikan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
(1, 'Asisten Ahli'),
(2, 'Rektor Kepala'),
(3, 'Lektor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_ikatan`
--

CREATE TABLE `jenis_ikatan` (
  `id_ikatan` int(11) NOT NULL,
  `nm_ikatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_ikatan`
--

INSERT INTO `jenis_ikatan` (`id_ikatan`, `nm_ikatan`) VALUES
(1, 'Dosen dengan Perjanjian Kerja'),
(2, 'Dosen Tetap'),
(3, 'Dosen PNS DPK'),
(4, 'JFT (Jabatan Fungsional Tertentu)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pt`
--

CREATE TABLE `jenis_pt` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pt`
--

INSERT INTO `jenis_pt` (`id_jenis`, `nm_jenis`) VALUES
(1, 'Universitas'),
(2, 'Institute'),
(3, 'Sekolah Tinggi'),
(4, 'Akademi'),
(5, 'Politeknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_request` varchar(50) NOT NULL,
  `id_pt` int(11) NOT NULL,
  `tgl_notifikasi` datetime NOT NULL,
  `is_read` int(11) NOT NULL,
  `notif_to` varchar(50) NOT NULL,
  `status_request` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_request`, `id_pt`, `tgl_notifikasi`, `is_read`, `notif_to`, `status_request`) VALUES
(1, '62c0480d169d3', 0, '2022-07-02 20:28:45', 1, 'admin', 'New'),
(2, '62c052f81d6e3', 0, '2022-07-02 21:15:20', 1, 'admin', 'New'),
(3, '62c05406ee961', 0, '2022-07-02 21:19:50', 1, 'admin', 'New'),
(4, '62c073e5cc608', 0, '2022-07-02 23:35:49', 1, 'admin', 'New'),
(5, '62c0e1956a396', 0, '2022-07-03 07:23:49', 1, 'admin', 'New'),
(6, '62c0e626285d0', 0, '2022-07-03 07:43:18', 1, 'admin', 'New'),
(7, '62c0e98d20494', 0, '2022-07-03 07:57:49', 1, 'admin', 'New'),
(8, '62c0f5d229526', 0, '2022-07-03 08:50:10', 1, 'admin', 'New'),
(9, '62c0fc47b0cd9', 0, '2022-07-03 09:17:43', 1, 'admin', 'New'),
(10, '62c103fe26320', 0, '2022-07-03 09:50:38', 1, 'admin', 'New'),
(11, '62c0fc47b0cd9', 0, '2022-07-03 10:59:41', 0, '', 'Request-Accept'),
(12, '62c11594ac514', 0, '2022-07-03 11:05:40', 1, 'admin', 'New'),
(13, '62c11594ac514', 1, '2022-07-03 11:06:13', 1, '', 'Request-Accept'),
(14, '62c11594ac514', 0, '2022-07-03 11:19:19', 1, 'admin', 'Reject'),
(15, '62c05406ee961', 3, '2022-07-03 11:24:49', 1, '', 'Request-Accept'),
(16, '62c05406ee961', 0, '2022-07-03 11:27:41', 1, 'admin', 'Reject'),
(17, '62c0fc47b0cd9', 0, '2022-07-03 11:29:36', 0, 'admin', 'Accept'),
(18, '62c11b52a6ce8', 0, '2022-07-03 11:30:10', 1, 'admin', 'New'),
(19, '62c11b52a6ce8', 3, '2022-07-03 11:30:29', 0, '', 'Request-Accept'),
(20, '62c11cc7c76d2', 0, '2022-07-03 11:36:23', 1, 'admin', 'New'),
(21, '62c11cc7c76d2', 3, '2022-07-03 11:46:06', 0, '', 'Request-Reject');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perguruan_tinggi`
--

CREATE TABLE `perguruan_tinggi` (
  `id_pt` int(11) NOT NULL,
  `kode_pt` varchar(50) NOT NULL,
  `nm_pt` varchar(50) NOT NULL,
  `jenis_pt` varchar(25) NOT NULL,
  `status_pt` varchar(20) NOT NULL,
  `lokasi` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perguruan_tinggi`
--

INSERT INTO `perguruan_tinggi` (`id_pt`, `kode_pt`, `nm_pt`, `jenis_pt`, `status_pt`, `lokasi`, `deleted`) VALUES
(1, '0001', 'Politeknik Negeri Sriwijaya', 'Politeknik', 'Aktif', 'Palembang', 0),
(2, '0002', 'Universitas Negeri Sriwijaya', 'Universitas', 'Aktif', 'Palembang', 0),
(3, '0003', 'Universitas CIC', 'Sekolah Tinggi', 'Aktif', 'Cirebon', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(50) NOT NULL,
  `nm_prodi` varchar(60) NOT NULL,
  `deleted` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `jenjang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nm_prodi`, `deleted`, `id_fakultas`, `jenjang`) VALUES
(1, '0001', 'Teknik Informatika', 0, 1, 'S1'),
(2, '0002', 'Pendidikan Bahasa Inggris', 0, 2, 'S1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_dosen`
--

CREATE TABLE `request_dosen` (
  `id_request` varchar(50) NOT NULL,
  `nm_request` varchar(50) NOT NULL,
  `id_pt` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `dosen_specialist_id` int(11) NOT NULL,
  `tgl_request` date NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request_dosen`
--

INSERT INTO `request_dosen` (`id_request`, `nm_request`, `id_pt`, `id_dosen`, `dosen_specialist_id`, `tgl_request`, `keterangan`, `file`, `status`, `tgl_dibuat`, `note`) VALUES
('62c0480d169d3', 'Permohonan Dosen S1 Teknik Informatika', 3, 2, 1, '2022-07-02', 'Saat ini Universitas CIC membutuhkan Dosen Teknik Informatika untuk program Sarjana', '62c0480d169d3.pdf', 'Accept', '2022-07-03 05:57:45', ''),
('62c052f81d6e3', 'Permohonan Dosen S1 Teknik Informatika 2', 3, 0, 1, '2022-07-02', 'dnkjsbd aks', '62c052f81d6e3.pdf', 'Request-Reject', '2022-07-03 06:36:11', ''),
('62c05406ee961', 'Permohonan Dosen S2 Teknik Informatika', 3, 2, 1, '2022-07-02', 'Permohonan Dosen S2 Teknik Informatika', '1354453059.pdf', 'Reject', '2022-07-03 11:27:41', ''),
('62c073e5cc608', 'Permohonan Dosen S1 Teknik Informatika', 3, 1, 1, '2022-07-02', 'Heheheh', 'default.png', 'Accept', '2022-07-03 07:40:00', 'Catatan Pemohon : Kami tidak cocok dengan dosen yang direkomendasikan'),
('62c0e626285d0', 'Permohonan Ulang Dosen Baru', 3, 3, 1, '2022-07-03', 'Permohonan Ulang Dosen Baru', '679383580.pdf', 'Reject', '2022-07-03 07:51:41', 'Dosen Gacocok'),
('62c0e98d20494', 'Politeknik Sriwijaya Membutuhkan Dosen TI', 1, 1, 1, '2022-07-03', 'Politeknik Sriwijaya Membutuhkan Dosen TI', 'default.png', 'Accept', '2022-07-03 07:59:11', ''),
('62c0f5d229526', 'Minta Dosen', 1, 2, 1, '2022-07-03', 'Kekek', '2132135173.pdf', 'Accept', '2022-07-03 08:54:09', 'sasasas'),
('62c0fc47b0cd9', 'Mau minta dosen TI baru dong', 3, 2, 1, '2022-07-03', 'UPDATE notifikasi SET notif_to=\'62b8556487642\'', 'default.png', 'Accept', '2022-07-03 11:28:28', ''),
('62c103fe26320', 'Permohonan Dosen Teknik Informatika Polsri', 1, 0, 1, '2022-07-03', 'Permohonan Dosen Polsri', 'default.png', 'Accept', '2022-07-03 11:02:36', ''),
('62c11594ac514', 'Test', 1, 1, 1, '2022-07-03', 'Test', 'default.png', 'Reject', '2022-07-03 11:19:19', 'Tidak sesuai'),
('62c11b52a6ce8', 'Tets lagi', 3, 2, 1, '2022-07-03', 'test kagi', 'default.png', 'Request-Accept', '2022-07-03 11:30:29', ''),
('62c11cc7c76d2', 'Test Test Lagi', 3, 0, 1, '2022-07-03', 'Test Lagi', 'default.png', 'Request-Reject', '2022-07-03 11:46:06', '');

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
  `foto` varchar(20) NOT NULL,
  `id_pt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_user`, `level`, `foto`, `id_pt`) VALUES
('62b8556487642', 'manda', '$2y$10$Yu1ziUFIrjktqeBPpLtfiO5mWh9XXdhdwHIpYT8ThaGTXl13NJa1q', 'Manda Alamanda', 'Administrator', '1.jpg', 0),
('62bef995eb55e', 'amal', '$2y$10$BS5qZOs/Xk9wCeQIgbdpE.QnqCPKcKXOGP5qbYeu0ilR7YRzRuaMS', 'Ikhlasul Amal', 'Perguruan Tinggi', '1.jpg', 1),
('62bfaf0240edb', 'kris', '$2y$10$6eU.LhkAHee4bmlv96NEoO/195eOY9Mn8OAzprCOLU4OzTAfp/yOC', 'Kristianto', 'Perguruan Tinggi', '1.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_ikatan`
--
ALTER TABLE `jenis_ikatan`
  ADD PRIMARY KEY (`id_ikatan`);

--
-- Indeks untuk tabel `jenis_pt`
--
ALTER TABLE `jenis_pt`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indeks untuk tabel `perguruan_tinggi`
--
ALTER TABLE `perguruan_tinggi`
  ADD PRIMARY KEY (`id_pt`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `request_dosen`
--
ALTER TABLE `request_dosen`
  ADD PRIMARY KEY (`id_request`);

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
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_ikatan`
--
ALTER TABLE `jenis_ikatan`
  MODIFY `id_ikatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_pt`
--
ALTER TABLE `jenis_pt`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `perguruan_tinggi`
--
ALTER TABLE `perguruan_tinggi`
  MODIFY `id_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
