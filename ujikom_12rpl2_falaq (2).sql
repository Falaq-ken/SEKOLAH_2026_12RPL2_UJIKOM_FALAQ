-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2026 pada 14.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_12rpl2_falaq`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_aspirasi`
--

CREATE TABLE `input_aspirasi` (
  `id_pelapor` int(11) NOT NULL,
  `nis` varchar(225) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `lokasi` varchar(225) NOT NULL,
  `ket` varchar(225) NOT NULL,
  `status` enum('menunggu','proses','selesai') NOT NULL DEFAULT 'menunggu',
  `feedback` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `input_aspirasi`
--

INSERT INTO `input_aspirasi` (`id_pelapor`, `nis`, `id_kategori`, `tanggal`, `lokasi`, `ket`, `status`, `feedback`) VALUES
(15, '2222', 1, '2026-02-26 10:55:53', 'kelas', 'bocor', 'menunggu', 'gamawuu'),
(16, '2222', 1, '2026-02-27 09:28:55', 'sekolah', '123', 'selesai', 'okee kitaa amanin '),
(17, '1234', 4, '2026-03-06 22:19:38', 'kelas', 'rusak', 'menunggu', NULL),
(22, '1234', 3, '2026-04-03 11:32:49', 'kelas ', 'kipas kelas rusak', 'menunggu', NULL),
(29, '2222', 3, '2026-04-07 00:00:00', 'dadad', 'da', 'menunggu', NULL),
(30, '2222', 3, '2026-04-07 18:30:41', 'sdaddd', 'dadad', 'menunggu', NULL),
(31, '2222', 3, '2026-04-07 18:38:57', 'asasa', 'terbaru', 'menunggu', NULL),
(33, '2222', 4, '2026-04-08 19:42:17', 'sekarang', 'sekarang', 'selesai', 'okee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `ket_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `ket_kategori`) VALUES
(1, 'lokasi'),
(3, 'elektronik'),
(4, 'fasilitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','siswa') NOT NULL DEFAULT 'siswa',
  `nis` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `nis`, `kelas`) VALUES
(1, 'falaq', '123', 'admin', NULL, NULL),
(2, 'roksen', '123', 'siswa', '2222', 'rpl2'),
(8, 'pedie', '123', 'siswa', '1234', 'mpl');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  ADD PRIMARY KEY (`id_pelapor`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `nis` (`nis`) USING BTREE;

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  MODIFY `id_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  ADD CONSTRAINT `input_aspirasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `input_aspirasi_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `user` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
