-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 03:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simonkelor`
--

-- --------------------------------------------------------

--
-- Table structure for table `beban_gardus`
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
-- Table structure for table `beban_kit`
--

CREATE TABLE `beban_kit` (
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pltu_bolok1` double NOT NULL,
  `pltu_bolok2` double NOT NULL,
  `pltu_ipp_kupangbaru1` double NOT NULL,
  `pltu_ipp_kupangbaru2` double NOT NULL,
  `pltd_cogindo(plant)` double NOT NULL,
  `pltmg_kpng_peaker(plant)` double NOT NULL,
  `plts_ipp_kupang` double NOT NULL,
  `plts_ipp_atambua` double NOT NULL,
  `ulpl_kupang_nigata(plant)` double NOT NULL,
  `ulpl_kupang_mak(plant)` double NOT NULL,
  `ulpl_atambua_cat2` int(11) NOT NULL,
  `ulpl_atambua_mwm` int(11) NOT NULL,
  `ulpl_atambua_swd(plant)` int(11) NOT NULL,
  `pltu_timor1_unit1` int(11) NOT NULL,
  `pltu_timor1_unit2` int(11) NOT NULL,
  `beban_sistem` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_documentation` varchar(255) NOT NULL,
  `file_documentation` varchar(255) NOT NULL,
  `size_documentation` bigint(20) NOT NULL,
  `format_documentation` varchar(255) NOT NULL,
  `jenis_documentation` varchar(255) NOT NULL,
  `periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `monitoring_realtimes`
--

CREATE TABLE `monitoring_realtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `value` double(15,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitoring_realtimes`
--

INSERT INTO `monitoring_realtimes` (`id`, `parameter`, `value`, `date`) VALUES
(1869, 'Beban Pembangkit', 197.00, '2023-03-29 17:50:02'),
(1870, 'Frequency', 34.00, '2023-03-29 17:49:42'),
(1871, 'Losses', 45.00, '2023-03-29 17:49:48'),
(1872, 'Fuelmix', 32.00, '2023-03-29 16:34:32'),
(1873, 'Fuelcost', 1400.00, '2023-03-29 16:34:32'),
(1874, 'BPP', 2200.00, '2023-03-29 16:34:32'),
(1875, 'PLTU BOLOK   UNIT 1', 57.00, '2023-03-29 17:49:58'),
(1876, 'PLTU BOLOK   UNIT 2', 56.00, '2023-03-29 17:50:02'),
(1877, 'PLTU IPP KUPANG BARU   UNIT 1', 15.00, '2023-03-29 17:09:18'),
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
(1893, 'ULPL KUPANG NIGATA(PLANT)', 0.00, '2023-03-29 16:34:32'),
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
-- Table structure for table `pembangkits`
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
-- Dumping data for table `pembangkits`
--

INSERT INTO `pembangkits` (`id_pembangkit`, `nama_pembangkit`, `jenis_pembangkit`, `kepemilikan_aset`, `energi_primer`, `kapasitas`, `DMN`, `created_at`, `updated_at`) VALUES
(3, 'ULPL KUPANG NIGATA 1', 'PLTD', 'PLN', 'B30', 2.50, 1.50, '2023-03-29 21:28:29', '2023-03-29 21:36:54'),
(4, 'ULPL KUPANG NIGATA 2', 'PLTD', 'PLN', 'B30', 2.50, 1.50, '2023-03-29 21:31:43', '2023-03-29 21:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `tegangans`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nip` char(25) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `role` enum('Super Admin','Admin Dispacher','Admin Pembangkit','Pegawai') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama_user`, `nip`, `instansi`, `role`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nurafiif', 'V3921024', 'Universitas Sebelas Maret', 'Super Admin', 'nurafiif@gmail.com', '$2y$10$w/xd.8UeXuFfd0J1uAKgSu/D5O0fvAqssXsrLWkMZ45/Iw1S4hPBi', NULL, NULL),
(2, 'Rayya', 'V3921029', 'Universitas Sebelas Maret', 'Admin Dispacher', 'rayya@gmail.com', '$2y$10$gplL1NwQSNhLVZB7yyX8eOITkVHzawn44TwaCfqXRQsD1bFbYwLuO', NULL, '2023-03-15 16:48:13'),
(8, 'syauqi', 'V3921038', 'Universitas Sebelas Maret', 'Admin Pembangkit', 'syauqi@gmail.com', '$2y$10$RQhAzMyfouu43BiXkovEYuQEikAHhARybSG3SK0IZ8ER.0Waz/Wi2', '2023-03-16 05:47:48', '2023-03-31 00:17:04'),
(9, 'Rizky', 'V3921032', 'Universitas Sebelas Maret', 'Pegawai', 'aditya@gmail.com', '$2y$10$G36pVx4IXR8YILFSn2qQBua7vkz17jo.DUfZLGTyjADW/koTjrQzK', '2023-03-29 12:32:40', '2023-03-31 00:13:04'),
(11, 'aaaaaaaaaa', 'aa', 'aa', 'Pegawai', 'admin@gmail.com', '$2y$10$6Q79.y3NdroYq8aY2awtau4T4P/36klH3q0CWc4CGdUG.zgVjTcuq', '2023-03-31 01:07:11', '2023-03-31 01:07:11'),
(12, 'Syauqi Nur Hibatullah', '6342363463', 'Universitas Sebelas Maret', 'Super Admin', 'syauqisnh@gmail.com', '$2y$10$HcROTKv7JQXEDHHrsSIsXu97CAWOxHO1apfhpZfbX9sRs.CWkh1UW', '2023-04-09 07:57:00', '2023-04-09 08:01:11'),
(13, 'nurafiifalmas', 'V3921024', 'UNS', 'Pegawai', 'nurafiifalmas@gmail.com', '$2y$10$D8S.MsT5LWnIOrNtbRRjS.7k7RN6/p6.xkFsUf93msVuMYKm8hNqy', '2023-04-11 19:28:36', '2023-04-11 19:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_registrasis`
--

CREATE TABLE `user_registrasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nip` char(25) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `role` enum('Super Admin','Admin Dispacher','Admin Pembangkit','Pegawai') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_registrasis`
--

INSERT INTO `user_registrasis` (`id`, `nama_user`, `nip`, `instansi`, `role`, `email`, `password`, `created_at`, `updated_at`) VALUES
(14, 'Syauqi', 'V3921038', 'Universitas Sebelas Maret', 'Admin Pembangkit', 'nusrafiif@gmail.com', '12345678', '2023-03-31 00:40:02', '2023-03-31 00:40:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beban_kit`
--
ALTER TABLE `beban_kit`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_realtimes`
--
ALTER TABLE `monitoring_realtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembangkits`
--
ALTER TABLE `pembangkits`
  ADD PRIMARY KEY (`id_pembangkit`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_registrasis`
--
ALTER TABLE `user_registrasis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_registrasis_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `monitoring_realtimes`
--
ALTER TABLE `monitoring_realtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1988;

--
-- AUTO_INCREMENT for table `pembangkits`
--
ALTER TABLE `pembangkits`
  MODIFY `id_pembangkit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_registrasis`
--
ALTER TABLE `user_registrasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
