-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2023 pada 17.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simonkelor_native`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentars`
--

CREATE TABLE `komentars` (
  `id_komentar` bigint(20) UNSIGNED NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `file` varchar(250) NOT NULL,
  `type` varchar(14) NOT NULL,
  `path` text NOT NULL,
  `size` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komentars`
--

INSERT INTO `komentars` (`id_komentar`, `id_forum`, `id_user`, `komentar`, `file`, `type`, `path`, `size`, `created_at`, `updated_at`) VALUES
(16, 1, 15, '2', '', '', '', 0, '2023-05-29 23:39:37', '2023-05-29 23:39:37'),
(17, 1, 14, '3', '', '', '', 0, '2023-05-29 23:39:57', '2023-05-29 23:39:57'),
(18, 1, 13, 'Dalam perbaikan di atas, klausa ORDER BY ditempatkan setelah klausa WHERE, sehingga query SQL akan dijalankan dengan benar. Pastikan juga untuk memastikan bahwa $_GET[\'id\'] sudah terdefinisi dan aman untuk digunakan dalam query SQL (misalnya dengan melaku', '', '', '', 0, '2023-05-29 23:52:41', '2023-05-29 23:52:41'),
(19, 1, 15, '6', '', '', '', 0, '2023-05-30 00:19:12', '2023-05-30 00:19:12'),
(20, 1, 14, '7', '', '', '', 0, '2023-05-30 00:20:07', '2023-05-30 00:20:07'),
(21, 1, 15, 'oee', '', '', '', 0, '2023-05-31 03:57:34', '2023-05-31 03:57:34'),
(70, 7, 13, 'aaaa', 'KLEPON.pdf', 'pdf', 'assets/file/KLEPON.pdf', 543951, '2023-06-01 12:02:11', '2023-06-01 12:02:11'),
(71, 7, 13, 'aaa', 'spt kelas bumil la.docx', 'docx', 'assets/file/spt kelas bumil la.docx', 76470, '2023-06-01 12:03:15', '2023-06-01 12:03:15'),
(77, 1, 13, 'aaaaa', 'NURAFIIF ALMAS AZHARI_Judul.pptx', 'pptx', 'assets/file/NURAFIIF ALMAS AZHARI_Judul.pptx', 467951, '2023-06-01 12:26:00', '2023-06-01 12:26:00'),
(78, 1, 15, 'hhh', '3ad3e27b98bec8e9733acc89c8d95660.jpg', 'jpg', 'assets/img/foto/3ad3e27b98bec8e9733acc89c8d95660.jpg', 23466, '2023-06-01 12:28:16', '2023-06-01 12:28:16'),
(79, 1, 13, 'wih ndek ndi iku', '', '', '', 0, '2023-06-01 12:29:50', '2023-06-01 12:29:50'),
(80, 1, 15, 'ndek kene wes', '', '', '', 0, '2023-06-01 12:30:10', '2023-06-01 12:30:10'),
(81, 1, 13, 'sek bariki tak otw', '', '', '', 0, '2023-06-01 12:33:19', '2023-06-01 12:33:19'),
(82, 1, 15, 'okeh', '', '', '', 0, '2023-06-01 12:33:35', '2023-06-01 12:33:35'),
(83, 1, 15, 'aa', '', '', '', 0, '2023-06-01 12:36:45', '2023-06-01 12:36:45'),
(84, 1, 13, 'iye iye', '', '', '', 0, '2023-06-01 12:37:07', '2023-06-01 12:37:07'),
(85, 1, 15, 'oleh ye aku runu', '', '', '', 0, '2023-06-01 12:38:19', '2023-06-01 12:38:19'),
(86, 1, 13, 'olehh', '', '', '', 0, '2023-06-01 12:38:36', '2023-06-01 12:38:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_forum` (`id_forum`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id_komentar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
