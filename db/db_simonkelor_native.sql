-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 08.12
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
-- Struktur dari tabel `beban_gardus`
--

CREATE TABLE `beban_gardus` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `load_panaf` double(15,2) NOT NULL,
  `load_tenau` double(15,2) NOT NULL,
  `load_bolok1` double(15,2) NOT NULL,
  `load_bolok2` double(15,2) NOT NULL,
  `load_maulafa1` double(15,2) NOT NULL,
  `load_maulafa2` double(15,2) NOT NULL,
  `load_kefamenanu` double(15,2) NOT NULL,
  `load_nonohonis` double(15,2) NOT NULL,
  `load_naibonat` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beban_kit`
--

CREATE TABLE `beban_kit` (
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pltu_blk1` double(15,2) NOT NULL,
  `pltu_blk2` double(15,2) NOT NULL,
  `pltu_ipp_kpng1` double(15,2) NOT NULL,
  `pltu_ipp_kpng2` double(15,2) NOT NULL,
  `pltd_cogindo` double(15,2) NOT NULL,
  `pltmg_kpng` double(15,2) NOT NULL,
  `plts_ipp_kpng` double(15,2) NOT NULL,
  `plts_ipp_atmb` double(15,2) NOT NULL,
  `ulpl_kpng_ngt` double(15,2) NOT NULL,
  `ulpl_kpng_mak` double(15,2) NOT NULL,
  `ulpl_atmb_cat2` double(15,2) NOT NULL,
  `ulpl_atmb_mwm` double(15,2) NOT NULL,
  `ulpl_atmb_swd` double(15,2) NOT NULL,
  `pltu_timor1` double(15,2) NOT NULL,
  `pltu_timor2` double(15,2) NOT NULL,
  `total_beban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `documentations`
--

CREATE TABLE `documentations` (
  `id_dokumen` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `jenis_dokumen` enum('perencanaan','evaluasi','profil_kelistrikan','sop_pengoperasian','singel_line_diagram') NOT NULL,
  `size_dokumen` bigint(20) NOT NULL,
  `path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forums`
--

CREATE TABLE `forums` (
  `id_pesan` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(250) NOT NULL,
  `judul_forum` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `forums`
--

INSERT INTO `forums` (`id_pesan`, `nama_user`, `judul_forum`, `pesan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Nurafiif Almas', 'Sekolah Baru ', 'aaa', 'default.jpeg', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_03_13_021723_create_monitoring_realtime', 1),
(4, '2023_03_14_142055_create_pembangkit', 1),
(5, '2023_03_14_142251_create_beban_gardu', 1),
(6, '2023_03_14_142321_create_documentation', 1),
(7, '2023_03_14_142345_create_komentar', 1),
(8, '2023_03_14_142412_create_forum', 1),
(9, '2023_03_14_142441_create_tegangan', 1),
(10, '2023_03_14_210806_create_user_registrasi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring_realtimes`
--

CREATE TABLE `monitoring_realtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `value` double(15,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `monitoring_realtimes`
--

INSERT INTO `monitoring_realtimes` (`id`, `parameter`, `value`, `date`) VALUES
(1869, 'Beban Pembangkit', 197.00, '2023-03-29 17:50:02'),
(1870, 'Frequency', 35.00, '2023-06-03 09:54:45'),
(1871, 'Losses', 45.00, '2023-03-29 17:49:48'),
(1872, 'Fuelmix', 32.00, '2023-03-29 16:34:32'),
(1873, 'Fuelcost', 1400.00, '2023-03-29 16:34:32'),
(1874, 'BPP', 2200.00, '2023-03-29 16:34:32'),
(1875, 'PLTU BOLOK   UNIT 1', 58.00, '2023-06-03 08:48:42'),
(1876, 'PLTU BOLOK   UNIT 2', 56.00, '2023-06-03 08:35:57'),
(1877, 'PLTU IPP KUPANG BARU   UNIT 1', 15.00, '2023-06-03 08:49:20'),
(1878, 'PLTU IPP KUPANG BARU   UNIT 2', 15.00, '2023-03-29 16:34:32'),
(1879, 'PLTD COGINDO (PLANT)', 30.00, '2023-03-29 16:34:32'),
(1880, 'PLTD COGINDO   UNIT 1', 6.00, '2023-03-29 16:34:32'),
(1881, 'PLTD COGINDO   UNIT 2', 6.00, '2023-03-29 16:34:32'),
(1882, 'PLTD COGINDO   UNIT 3', 6.00, '2023-03-29 16:34:32'),
(1883, 'PLTD COGINDO   UNIT 4', 6.00, '2023-03-29 16:34:32'),
(1884, 'PLTD COGINDO   UNIT 5', 6.00, '2023-03-29 16:34:32'),
(1885, 'PLTMG KPG PEAKER (PLANT)', 24.00, '2023-03-29 16:34:32'),
(1886, 'PLTMG KPG PEAKER   UNIT 1', 8.00, '2023-03-29 16:34:32'),
(1887, 'PLTMG KPG PEAKER   UNIT 2', 8.00, '2023-03-29 16:34:32'),
(1888, 'PLTMG KPG PEAKER   UNIT 3', 8.00, '2023-03-29 16:34:32'),
(1889, 'PLTMG KPG PEAKER   UNIT 4', 0.00, '2023-03-29 16:34:32'),
(1890, 'PLTMG KPG PEAKER   UNIT 5', 0.00, '2023-03-29 16:34:32'),
(1891, 'PLTS IPP KUPANG', 0.00, '2023-03-29 16:34:32'),
(1892, 'PLTS IPP ATAMBUA', 0.00, '2023-03-29 16:34:32'),
(1893, 'ULPL KUPANG NIGATA(PLANT)', 0.00, '2023-06-03 10:26:48'),
(1894, 'ULPL KUPANG   NIGATA 1', 0.00, '2023-03-29 16:34:32'),
(1895, 'ULPL KUPANG   NIGATA 2', 0.00, '2023-03-29 16:34:32'),
(1896, 'ULPL KUPANG MAK(PLANT)', 0.00, '2023-03-29 16:34:32'),
(1897, 'ULPL KUPANG   MAK 3', 0.00, '2023-03-29 16:34:32'),
(1898, 'ULPL KUPANG   MAK 4', 0.00, '2023-03-29 16:34:32'),
(1899, 'ULPL ATAMBUA   CAT 2', 0.00, '2023-03-29 16:34:32'),
(1900, 'ULPL ATAMBUA   MWM', 0.00, '2023-03-29 16:34:32'),
(1901, 'ULPL ATAMBUA SWD(PLANT)', 0.00, '2023-03-29 16:34:32'),
(1902, 'ULPL ATAMBUA   SWD 1', 0.00, '2023-03-29 16:34:32'),
(1903, 'ULPL ATAMBUA   SWD 2', 0.00, '2023-03-29 16:34:32'),
(1904, 'ULPL ATAMBUA   SWD 3', 0.00, '2023-03-29 16:34:32'),
(1905, 'PLTU TIMOR-1   UNIT 1', 0.00, '2023-03-29 16:34:32'),
(1906, 'PLTU TIMOR-1   UNIT 2', 0.00, '2023-03-29 16:34:32'),
(1907, 'LOAD PANAF', 1.50, '2023-03-29 16:34:32'),
(1908, 'LOAD TENAU', 24.00, '2023-03-29 16:34:32'),
(1909, 'LOAD BOLOK 1', 2.00, '2023-03-29 16:34:32'),
(1910, 'LOAD BOLOK 2', 0.00, '2023-03-29 16:34:32'),
(1911, 'LOAD MAULAFA 1', 21.00, '2023-03-29 16:34:32'),
(1912, 'LOAD MAULAFA 2', 23.00, '2023-03-29 16:34:32'),
(1913, 'LOAD NAIBONAT', 6.00, '2023-03-29 16:34:32'),
(1914, 'LOAD NONOHONIS', 11.00, '2023-03-29 16:34:32'),
(1915, 'LOAD KEFAMENANU', 7.00, '2023-03-29 16:34:32'),
(1916, 'LOAD ATAMBUA', 13.00, '2023-03-29 16:34:32'),
(1917, 'LOAD ATAPUPU', 0.00, '2023-03-29 16:34:32'),
(1918, '150KV PANAF', 152.04, '2023-03-29 16:34:32'),
(1919, '150KV TENAU', 151.94, '2023-03-29 16:34:32'),
(1920, '150KV BOLOK', 151.83, '2023-03-29 16:34:32'),
(1921, '70KV BOLOK', 71.49, '2023-03-29 16:34:32'),
(1922, '70KV MAULAFA', 70.21, '2023-03-29 16:34:32'),
(1923, '70KV NAIBONAT', 69.40, '2023-03-29 16:34:32'),
(1924, '70KV NONOHONIS', 68.75, '2023-03-29 16:34:32'),
(1925, '70KV KEFAMENANU', 66.93, '2023-03-29 16:34:32'),
(1926, '70KV ATAMBUA', 65.32, '2023-03-29 16:34:32'),
(1927, '70KV ATAPUPU', 64.11, '2023-03-29 16:34:33'),
(1928, 'FREQ 0', 49.99, '2023-03-29 16:34:33'),
(1929, 'FREQ 1', 49.98, '2023-03-29 16:34:33'),
(1930, 'FREQ 2', 49.99, '2023-03-29 16:34:33'),
(1931, 'FREQ 3', 49.98, '2023-03-29 16:34:33'),
(1932, 'FREQ 4', 50.02, '2023-03-29 16:34:33'),
(1933, 'FREQ 5', 50.00, '2023-03-29 16:34:33'),
(1934, 'FREQ 6', 49.99, '2023-03-29 16:34:33'),
(1935, 'FREQ 7', 50.01, '2023-03-29 16:34:33'),
(1936, 'FREQ 8', 50.01, '2023-03-29 16:34:33'),
(1937, 'FREQ 9', 49.98, '2023-03-29 16:34:33'),
(1938, 'FREQ 10', 50.02, '2023-03-29 16:34:33'),
(1939, 'FREQ 11', 49.99, '2023-03-29 16:34:33'),
(1940, 'FREQ 12', 50.01, '2023-03-29 16:34:33'),
(1941, 'FREQ 13', 49.99, '2023-03-29 16:34:33'),
(1942, 'FREQ 14', 50.01, '2023-03-29 16:34:33'),
(1943, 'FREQ 15', 50.00, '2023-03-29 16:34:33'),
(1944, 'FREQ 16', 50.01, '2023-03-29 16:34:33'),
(1945, 'FREQ 17', 50.00, '2023-03-29 16:34:33'),
(1946, 'FREQ 18', 50.01, '2023-03-29 16:34:33'),
(1947, 'FREQ 19', 50.00, '2023-03-29 16:34:33'),
(1948, 'FREQ 20', 50.02, '2023-03-29 16:34:33'),
(1949, 'FREQ 21', 49.98, '2023-03-29 16:34:33'),
(1950, 'FREQ 22', 50.02, '2023-03-29 16:34:33'),
(1951, 'FREQ 23', 50.01, '2023-03-29 16:34:33'),
(1952, 'FREQ 24', 50.01, '2023-03-29 16:34:33'),
(1953, 'FREQ 25', 49.98, '2023-03-29 16:34:33'),
(1954, 'FREQ 26', 50.02, '2023-03-29 16:34:33'),
(1955, 'FREQ 27', 49.98, '2023-03-29 16:34:33'),
(1956, 'FREQ 28', 50.00, '2023-03-29 16:34:33'),
(1957, 'FREQ 29', 50.00, '2023-03-29 16:34:33'),
(1958, 'FREQ 30', 50.02, '2023-03-29 16:34:33'),
(1959, 'FREQ 31', 50.01, '2023-03-29 16:34:33'),
(1960, 'FREQ 32', 50.02, '2023-03-29 16:34:33'),
(1961, 'FREQ 33', 49.99, '2023-03-29 16:34:33'),
(1962, 'FREQ 34', 50.01, '2023-03-29 16:34:33'),
(1963, 'FREQ 35', 50.01, '2023-03-29 16:34:33'),
(1964, 'FREQ 36', 50.02, '2023-03-29 16:34:33'),
(1965, 'FREQ 37', 50.01, '2023-03-29 16:34:33'),
(1966, 'FREQ 38', 49.98, '2023-03-29 16:34:33'),
(1967, 'FREQ 39', 50.01, '2023-03-29 16:34:33'),
(1968, 'FREQ 40', 50.01, '2023-03-29 16:34:33'),
(1969, 'FREQ 41', 50.02, '2023-03-29 16:34:33'),
(1970, 'FREQ 42', 50.02, '2023-03-29 16:34:33'),
(1971, 'FREQ 43', 49.99, '2023-03-29 16:34:33'),
(1972, 'FREQ 44', 50.00, '2023-03-29 16:34:33'),
(1973, 'FREQ 45', 50.02, '2023-03-29 16:34:33'),
(1974, 'FREQ 46', 49.99, '2023-03-29 16:34:33'),
(1975, 'FREQ 47', 50.01, '2023-03-29 16:34:33'),
(1976, 'FREQ 48', 50.01, '2023-03-29 16:34:33'),
(1977, 'FREQ 49', 50.00, '2023-03-29 16:34:33'),
(1978, 'FREQ 50', 49.98, '2023-03-29 16:34:33'),
(1979, 'FREQ 51', 49.99, '2023-03-29 16:34:33'),
(1980, 'FREQ 52', 49.98, '2023-03-29 16:34:33'),
(1981, 'FREQ 53', 49.98, '2023-03-29 16:34:33'),
(1982, 'FREQ 54', 49.98, '2023-03-29 16:34:34'),
(1983, 'FREQ 55', 50.02, '2023-03-29 16:34:34'),
(1984, 'FREQ 56', 49.98, '2023-03-29 16:34:34'),
(1985, 'FREQ 57', 50.00, '2023-03-29 16:34:34'),
(1986, 'FREQ 58', 50.02, '2023-03-29 16:34:34'),
(1987, 'FREQ 59', 50.02, '2023-03-29 16:34:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembangkits`
--

CREATE TABLE `pembangkits` (
  `id_pembangkit` bigint(20) UNSIGNED NOT NULL,
  `nama_pembangkit` varchar(255) NOT NULL,
  `jenis_pembangkit` varchar(255) NOT NULL,
  `kepemilikan_aset` varchar(255) NOT NULL,
  `energi_primer` varchar(250) NOT NULL,
  `kapasitas` double(15,2) NOT NULL,
  `DMN` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembangkits`
--

INSERT INTO `pembangkits` (`id_pembangkit`, `nama_pembangkit`, `jenis_pembangkit`, `kepemilikan_aset`, `energi_primer`, `kapasitas`, `DMN`, `created_at`, `updated_at`) VALUES
(3, 'ULPL KUPANG NIGATA 1', 'PLTD', 'PLN', 'B30', 2.50, 1.50, '2023-03-29 21:28:29', '2023-03-29 21:36:54'),
(4, 'ULPL KUPANG NIGATA 2', 'PLTD', 'PLN', 'B30', 2.50, 1.50, '2023-03-29 21:31:43', '2023-03-29 21:34:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tegangans`
--

CREATE TABLE `tegangans` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `150kv_panaf` double(15,2) NOT NULL,
  `150kv_tenau` double(15,2) NOT NULL,
  `150kv_bolok` double(15,2) NOT NULL,
  `70kv_atapupu` double(15,2) NOT NULL,
  `70kv_atabua` double(15,2) NOT NULL,
  `70kv_maulafa` double(15,2) NOT NULL,
  `70kv_bolok` double(15,2) NOT NULL,
  `70kv_kefamenanu` double(15,2) NOT NULL,
  `70kv_nonohonis` double(15,2) NOT NULL,
  `70kv_naibonat` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nip` char(25) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `role` enum('Super Admin','Admin Dispacher','Admin Pembangkit','Pegawai') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `path` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `nama_user`, `nip`, `instansi`, `role`, `email`, `password`, `gambar`, `path`, `created_at`, `updated_at`) VALUES
(14, 'Nurafiif Almas', 'V3921024', 'UNS', 'Super Admin', 'nurafiifalmas@gmail.com', '25d55ad283aa400af464c76d713c07ad', '20180805_080720.jpg', 'assets/img/foto_profil/20180805_080720.jpg', NULL, NULL),
(15, 'Syauqi Nur', 'V3921038', 'UNS', 'Super Admin', 'syauqi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'default_profil.png', '', '2023-06-04 19:36:38', '2023-06-04 19:36:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_registrasis`
--

CREATE TABLE `user_registrasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nip` char(25) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `role` enum('Super Admin','Admin Dispacher','Admin Pembangkit','Pegawai') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `path` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beban_kit`
--
ALTER TABLE `beban_kit`
  ADD PRIMARY KEY (`date`);

--
-- Indeks untuk tabel `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_forum` (`id_forum`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitoring_realtimes`
--
ALTER TABLE `monitoring_realtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembangkits`
--
ALTER TABLE `pembangkits`
  ADD PRIMARY KEY (`id_pembangkit`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_registrasis`
--
ALTER TABLE `user_registrasis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_registrasis_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id_dokumen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `forums`
--
ALTER TABLE `forums`
  MODIFY `id_pesan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id_komentar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `monitoring_realtimes`
--
ALTER TABLE `monitoring_realtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1988;

--
-- AUTO_INCREMENT untuk tabel `pembangkits`
--
ALTER TABLE `pembangkits`
  MODIFY `id_pembangkit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_registrasis`
--
ALTER TABLE `user_registrasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `beban_kit` ON SCHEDULE EVERY 5 SECOND STARTS '2023-06-03 01:23:28' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
  DECLARE pltuBLK1 DOUBLE;
  DECLARE pltuBLK2 DOUBLE;
  DECLARE pltuIPP1 DOUBLE;
  DECLARE pltuIPP2 DOUBLE;
  DECLARE pltd_cogindo DOUBLE;
  DECLARE pltmg_kpng DOUBLE;
  DECLARE plts_ipp_kpng DOUBLE;
  DECLARE plts_ipp_atmb DOUBLE;
  DECLARE ulpl_kpng_ngt DOUBLE;
  DECLARE ulpl_kpng_mak DOUBLE;
  DECLARE ulpl_atmb_cat2 DOUBLE;
  DECLARE ulpl_atmb_mwm DOUBLE;
  DECLARE ulpl_atmb_swd DOUBLE;
  DECLARE pltu_timor1 DOUBLE;
  DECLARE pltu_timor2 DOUBLE;
  DECLARE total_beban DOUBLE;

  SELECT value INTO pltuBLK1 FROM monitoring_realtimes WHERE parameter = 'PLTU BOLOK   UNIT 1';
  SELECT value INTO pltuBLK2 FROM monitoring_realtimes WHERE parameter = 'PLTU BOLOK   UNIT 2';
  SELECT value INTO pltuIPP1 FROM monitoring_realtimes WHERE parameter = 'PLTU IPP KUPANG BARU   UNIT 1';
  SELECT value INTO pltuIPP2 FROM monitoring_realtimes WHERE parameter = 'PLTU IPP KUPANG BARU   UNIT 2';
  SELECT value INTO pltd_cogindo FROM monitoring_realtimes WHERE parameter = 'PLTD COGINDO (PLANT)';
  SELECT value INTO pltmg_kpng FROM monitoring_realtimes WHERE parameter = 'PLTMG KPG PEAKER (PLANT)';
  SELECT value INTO plts_ipp_kpng FROM monitoring_realtimes WHERE parameter = 'PLTS IPP KUPANG';
  SELECT value INTO plts_ipp_atmb FROM monitoring_realtimes WHERE parameter = 'PLTS IPP ATAMBUA';
  SELECT value INTO ulpl_kpng_ngt FROM monitoring_realtimes WHERE parameter = 'ULPL KUPANG NIGATA(PLANT)';
  SELECT value INTO ulpl_kpng_mak FROM monitoring_realtimes WHERE parameter = 'ULPL KUPANG MAK(PLANT)';
  SELECT value INTO ulpl_atmb_cat2 FROM monitoring_realtimes WHERE parameter = 'ULPL ATAMBUA   CAT 2';
  SELECT value INTO ulpl_atmb_mwm FROM monitoring_realtimes WHERE parameter = 'ULPL ATAMBUA   MWM';
  SELECT value INTO ulpl_atmb_swd FROM monitoring_realtimes WHERE parameter = 'ULPL ATAMBUA SWD(PLANT)';
  SELECT value INTO pltu_timor1 FROM monitoring_realtimes WHERE parameter = 'PLTU TIMOR-1   UNIT 1';
  SELECT value INTO pltu_timor2 FROM monitoring_realtimes WHERE parameter = 'PLTU TIMOR-1   UNIT 2';
  SELECT value INTO total_beban FROM monitoring_realtimes WHERE parameter = 'Beban Pembangkit';

  INSERT INTO `beban_kit` (`date`, `pltu_blk1`, `pltu_blk2`, `pltu_ipp_kpng1`, `pltu_ipp_kpng2`, `pltd_cogindo`, `pltmg_kpng`, `plts_ipp_kpng`, `plts_ipp_atmb`, `ulpl_kpng_ngt`, `ulpl_kpng_mak`, `ulpl_atmb_cat2`, `ulpl_atmb_mwm`, `ulpl_atmb_swd`, `pltu_timor1`, `pltu_timor2`, `total_beban`) VALUES (current_timestamp(), pltuBLK1, pltuBLK2, pltuIPP1, pltuIPP2, pltd_cogindo, pltmg_kpng, plts_ipp_kpng, plts_ipp_atmb, ulpl_kpng_ngt, ulpl_kpng_mak, ulpl_atmb_cat2, ulpl_atmb_mwm, ulpl_atmb_swd, pltu_timor1, pltu_timor2, total_beban);
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
