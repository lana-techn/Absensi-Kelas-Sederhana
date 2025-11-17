-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2024 pada 02.50
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
-- Database: `db_absensiea`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL DEFAULT 0,
  `bangku_tersisa` int(11) NOT NULL DEFAULT 0,
  `rombel` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `name`, `jumlah_siswa`, `bangku_tersisa`, `rombel`, `created_at`, `updated_at`) VALUES
(1, '0G', 0, 19, 19, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(2, '1D', 0, 0, 0, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(3, '9y', 0, 19, 19, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(4, '2t', 0, 31, 31, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(5, '7Q', 0, 39, 39, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(6, '4w', 0, 16, 16, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(7, '5m', 0, 21, 21, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(8, '8y', 0, 10, 10, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(9, '117', 0, 25, 25, '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(10, '6U', 0, 21, 21, '2024-11-14 01:45:24', '2024-11-14 01:45:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logkehadirans`
--

CREATE TABLE `logkehadirans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL DEFAULT '2024-11-14',
  `keterangan` varchar(255) NOT NULL DEFAULT 'belum diabsen',
  `status` varchar(255) NOT NULL DEFAULT 'belum diabsen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_24_061330_create_kelas_table', 1),
(5, '2024_09_24_064220_create_siswas_table', 1),
(6, '2024_09_24_064313_create_pengajars_table', 1),
(7, '2024_09_24_065257_create_log_kehadirans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajars`
--

CREATE TABLE `pengajars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YLeDmGbP1vGqPCqeCbHvFBP3wBiuRuNktERB6hUo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSHFCM0tkNVNLSEgxaU43bW9aNVZGdTNuMGhUT0VLQXJBYXFkcm9ScSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rZWxhcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1731549023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(15) NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nis`, `kelas_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '9422493', NULL, 'Ulya Wulandari', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(2, '6377095', NULL, 'Rusman Budiman', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(3, '3819750', NULL, 'Opung Tedi Hidayanto S.Pd', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(4, '5172976', NULL, 'Zelda Halimah M.M.', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(5, '1908644', NULL, 'Darmaji Jayadi Dongoran', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(6, '9116832', NULL, 'Estiawan Ramadan', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(7, '6230015', NULL, 'Kardi Saputra', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(8, '247012', NULL, 'Oni Halimah', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(9, '7561848', NULL, 'Ozy Mandala', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(10, '4523573', NULL, 'Marsudi Jailani', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(11, '3884654', NULL, 'Wardi Nyoman Hutasoit', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(12, '9659674', NULL, 'Caraka Mahendra', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(13, '4408526', NULL, 'Yessi Melani', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(14, '8354552', NULL, 'Hari Raden Pradipta', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(15, '7171224', NULL, 'Emong Sihotang', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(16, '2372804', NULL, 'Harsaya Wijaya', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(17, '539334', NULL, 'Aisyah Kusmawati', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(18, '9676781', NULL, 'Puspa Tiara Rahmawati S.Pt', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(19, '6483264', NULL, 'Daru Daniswara Wasita S.Sos', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(20, '7364895', NULL, 'Perkasa Najmudin M.M.', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(21, '7219095', NULL, 'Uda Damanik', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(22, '5199831', NULL, 'Usman Widodo', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(23, '2223605', NULL, 'Gawati Wulandari', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(24, '2154222', NULL, 'Chelsea Rahimah', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(25, '9954780', NULL, 'Paris Yuniar S.Sos', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(26, '706821', NULL, 'Anastasia Fathonah Maryati', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(27, '3187634', NULL, 'Kemal Halim', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(28, '9966085', NULL, 'Juli Maryati', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(29, '5484456', NULL, 'Viman Saragih', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(30, '3703609', NULL, 'Damu Waluyo', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(31, '7195331', NULL, 'Harto Wijaya', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(32, '7828839', NULL, 'Ana Agustina', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(33, '7255141', NULL, 'Olivia Nuraini', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(34, '9071134', NULL, 'Iriana Yuniar S.Ked', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(35, '6922896', NULL, 'Rahmat Suryono', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(36, '8443386', NULL, 'Hendra Ardianto', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(37, '1992756', NULL, 'Anom Maryadi M.Farm', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(38, '1054639', NULL, 'Irnanto Saputra', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(39, '1033006', NULL, 'Raina Titi Halimah S.Ked', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(40, '8604464', NULL, 'Yusuf Nashiruddin S.Farm', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(41, '9242066', NULL, 'Mursita Hadi Wijaya S.Psi', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(42, '6780117', NULL, 'Zahra Lidya Pertiwi', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(43, '6970419', NULL, 'Saiful Jailani', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(44, '3652041', NULL, 'Amalia Laksita S.Pd', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(45, '9707314', NULL, 'Leo Mustofa', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(46, '4780843', NULL, 'Aurora Oktaviani', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(47, '6095936', NULL, 'Gaduh Hidayanto', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(48, '1704623', NULL, 'Garan Saefullah', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(49, '9879571', NULL, 'Makuta Pangeran Hidayanto', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(50, '2856415', NULL, 'Eka Hutasoit', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(51, '5507809', NULL, 'Irsad Galih Marbun M.M.', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(52, '5519400', NULL, 'Natalia Andriani S.IP', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(53, '3724175', NULL, 'Hilda Suryatmi', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(54, '8628686', NULL, 'Parman Simanjuntak M.Farm', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(55, '6762016', NULL, 'Padma Zaenab Agustina M.Pd', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(56, '1328987', NULL, 'Rahmi Farida', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(57, '148022', NULL, 'Bakidin Sinaga', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(58, '4499349', NULL, 'Zulaikha Gina Usada', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(59, '8784656', NULL, 'Rahayu Handayani', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(60, '6874153', NULL, 'Okto Gandewa Thamrin S.Sos', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(61, '4594360', NULL, 'Zalindra Laksita', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(62, '117820', NULL, 'Sarah Kuswandari', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(63, '3160629', NULL, 'Eman Adriansyah', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(64, '8113390', NULL, 'Samiah Kuswandari', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(65, '2921776', NULL, 'Karma Wibisono S.E.I', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(66, '3741081', NULL, 'Mila Laksita', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(67, '8901041', NULL, 'Raina Puspasari', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(68, '9768672', NULL, 'Zelaya Yulianti', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(69, '9896454', NULL, 'Tiara Laksmiwati', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(70, '9053970', NULL, 'Gina Ella Pertiwi', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(71, '521383', NULL, 'Bahuwarna Adriansyah', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(72, '6912552', NULL, 'Fathonah Purwanti M.Farm', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(73, '492867', NULL, 'Candra Jailani', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(74, '6045310', NULL, 'Usman Wijaya', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(75, '6825010', NULL, 'Luwes Ramadan', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(76, '2937860', NULL, 'Kamidin Maulana', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(77, '428257', NULL, 'Eka Sinaga', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(78, '4224469', NULL, 'Virman Wibowo', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(79, '3960093', NULL, 'Prakosa Hidayanto', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(80, '3490223', NULL, 'Dina Oktaviani', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(81, '8506925', NULL, 'Endah Betania Astuti', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(82, '4751105', NULL, 'Limar Laswi Wibisono M.Farm', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(83, '200941', NULL, 'Paramita Handayani S.H.', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(84, '6849373', NULL, 'Enteng Jaga Tampubolon S.I.Kom', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(85, '3389074', NULL, 'Shakila Usamah', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(86, '9280250', NULL, 'Cengkal Eluh Waskita S.Pd', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(87, '9794142', NULL, 'Damar Saptono', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(88, '3992915', NULL, 'Marwata Prabowo', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(89, '5777972', NULL, 'Uda Ibrahim Suryono M.M.', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(90, '7883364', NULL, 'Kunthara Sihotang', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(91, '223016', NULL, 'Kasiran Jarwi Gunawan', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(92, '7201716', NULL, 'Paiman Timbul Napitupulu', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(93, '9634828', NULL, 'Jarwa Siregar', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(94, '8648686', NULL, 'Timbul Utama S.Pt', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(95, '783495', NULL, 'Mutia Pudjiastuti', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(96, '655789', NULL, 'Galur Salahudin S.Sos', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(97, '2249892', NULL, 'Puti Nabila Suryatmi', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(98, '6176069', NULL, 'Mutia Padmi Padmasari', '2024-11-14 01:45:24', '2024-11-14 01:45:24'),
(99, '3983447', 2, 'Ade Vanya Yuniar', '2024-11-14 01:45:24', '2024-11-14 01:49:15'),
(100, '1245592', NULL, 'Icha Olivia Palastri S.Psi', '2024-11-14 01:45:24', '2024-11-14 01:45:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(23) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '38301191', 'Natalia Nurdiyanti', 'devi34', '$2y$12$lb4BWbComc5bslkbtR4vUOo3hqI/.CC1LoaPwLxkPnBsN.OXK.3lK', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(2, '15830358', 'Ami Puspa Wahyuni S.I.Kom', 'rwidiastuti', '$2y$12$oxdq7olG5RAZc1bv6mvm0OrMGBeRGk6BpUrTZv2vl0FiC7k0py69G', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(3, '63289714', 'Mahfud Tamba', 'drajat.melani', '$2y$12$WJmKZx9pEKpE7HrG1bUUbu/Uf7NUBqwW08pf5RracPDeFtr0WVDPu', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(4, '37823026', 'Hasta Aslijan Hidayat', 'michelle49', '$2y$12$jRmbKFUUbr4DEOUZqb0q6.cvI3.SlZhXj49TYIvK9GEmCqml9K2ou', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(5, '96113145', 'Maras Sihotang M.Ak', 'farida.maman', '$2y$12$wucw2PZBRCkUGowr.QhyRu0A.qLlNqX/Us7E5Vn4lcix9l9JdArZy', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(6, '93011113', 'Wakiman Labuh Wibowo S.Psi', 'ikhsan18', '$2y$12$9yMybw35oVlCTm5eI7xMUeRAl0leldDLh92sw78qylLCxAENa6oZy', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(7, '70240099', 'Tedi Setiawan S.E.I', 'madriansyah', '$2y$12$KcgIWC46lEOL5wh16GosQ.PDeHmAwTvckW62jNn6E7sOOZ1.Th1yu', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(8, '30819884', 'Halima Wirda Hastuti', 'situmorang.rina', '$2y$12$Y4Ql3WT0a015Tqw.x21r/Ou.v8igCQ7l7/Fqzitypq7m2C2iPOluy', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(9, '87166789', 'Kanda Narpati S.E.I', 'cakrabuana.marpaung', '$2y$12$au1qSGoQhnMn.8JRqPOyg.zmGBzurM/43.lhrUScnys/CQFkUAsCm', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(10, '99586080', 'Tina Pudjiastuti S.Kom', 'darijan.kusumo', '$2y$12$ZhwoPI5uEydsunoT4be30O8LPxiBlIdT6KHkD61eGEudOoY2oletW', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(11, '44517198', 'Darmana Ardianto', 'maryadi.lili', '$2y$12$KHp5mvVcWr0k5F0Q/II0VuN0D0rstC3uAVEnIbI3gTiq0beDAv28m', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(12, '84920090', 'Oman Wasita M.Pd', 'rajata.samsul', '$2y$12$.S.pN2zSMO.JrA6IW8OFqOk7eocAUAH10VSkX3NozGlD5y/6TVIuu', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(13, '94269598', 'Estiawan Suwarno S.Pd', 'wasis14', '$2y$12$H4VXEP8a5jnqQZdpCJajP.cbIbFSBE.UQcFdv1UgVPYBCoiVRMcnK', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(14, '58664919', 'Legawa Simanjuntak', 'darmana75', '$2y$12$BoaA9ddDDasU/5H5soOzCOk7cGYeDRZtPGW9D/jpslPBd1OZXLUM.', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(15, '38080053', 'Ulva Yolanda', 'almira.wijayanti', '$2y$12$bOrBBg.9WuRP2Gt.slQHa.dXyJwzctBVEJniBZCweJeQbXDFMt8kC', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(16, '80346289', 'Ajimin Dongoran', 'hasta51', '$2y$12$fyXxjnsR5awfNOf2qxTl0eWmh14uUCcipJnhrILRii0Q8KgP0DcLS', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(17, '99738358', 'Omar Narpati', 'eli.pranowo', '$2y$12$w0oB8aLwwZKmJQCFWKYr7OtNI1s55TbHgYC4trYnvJ13naU0QAK12', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(18, '16077930', 'Ibrahim Gamani Kuswoyo', 'jhasanah', '$2y$12$b69nLEu9Fjvh9.WBin6Zwuq5djQxHZjYH7NOGWJfikl.CGMG5gq1C', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(19, '92177900', 'Panji Megantara', 'vnasyidah', '$2y$12$J9jazOUDs/pGIuosAiI76eND20kWIcJI7WXpYcu6RAIl5AS0AvI1K', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(20, '63644169', 'Genta Juli Winarsih M.M.', 'ellis18', '$2y$12$wz.tX83ZyYsvbW8kUjcQgeyYAZlmBkyFGszpuzBwr2gHkSpMmwJUi', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(21, '78239138', 'Michelle Agnes Rahayu M.Kom.', 'lanang88', '$2y$12$KnNzi6JL9KyQgT8RoJcx1.s3ff9t4D3ftOUMlyPkj4ejVDLvxuBBy', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(22, '10557498', 'Tami Puspita', 'rahmawati.cindy', '$2y$12$twUp8zdliBHMp/X04zwSkuaj80JxO6B2YnSmFGZvRkKVJDnbzHUYC', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(23, '46939211', 'Fathonah Nasyidah', 'elisa76', '$2y$12$ninXkiMUHOkiV/OxVwkpR.27EoP6YqqZon3yPN1FiyhQOM2v8Dv8i', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(24, '17516345', 'Ridwan Thamrin', 'ayu.yuniar', '$2y$12$FouciC0.5dTpcqDBkG.X4.6wz8y157gmhsZKfw2KtMQ4VR.paYP8O', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(25, '15149042', 'Galak Irawan M.Kom.', 'qprastuti', '$2y$12$QGugYN89RNu/z45OmTJ7/uIIcnSffv0Wf2u5x3.cgD9X5N9QyeeZq', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(26, '76977653', 'Zahra Novitasari', 'jarwadi81', '$2y$12$DoZvxTpVV1Y5qs242RM0T.z6rrHiw9BkxhrJ4H4tpl26e8qsZoOpu', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(27, '77743974', 'Mariadi Maulana', 'nurul.yuniar', '$2y$12$XfrEwNaM3vIMdw3OQgPZc.ITERTnvbVUq2Bm.qrNfRBWie5T94dCu', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(28, '40638091', 'Warji Saptono', 'astuti.himawan', '$2y$12$CcDpXFJ019h3TijPHpri9.ubFdbMiQX7nIT0HevS73eqN2eXv1Xge', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(29, '92901459', 'Baktiadi Hidayanto S.H.', 'hwinarsih', '$2y$12$rIPSR/uRMVyQ52pCMaoize3iYq9X4SvD1TTJlNY4bWqZuto0OQpbW', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(30, '72794709', 'Dagel Sinaga', 'panca.rahmawati', '$2y$12$z8ovf9MmSo854qJvHYmbDe8GjK2z.0MHHj4fwToKgJO3Mvg1sePgm', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(31, '88916506', 'Wahyu Rajata', 'dabukke.embuh', '$2y$12$1UJzcz0nkgp18pkrTbIYzekM/IrRz7zui9qzh6grb8ZgHICTNJfiu', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(32, '81652600', 'Vino Prabawa Rajata S.I.Kom', 'dina04', '$2y$12$eX2re9F7hA6DPHLnQI3zg.Pb4AngYIOFo8j3KILMvAjAGmF6jC1ES', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(33, '84586440', 'Faizah Ida Pratiwi', 'handayani.panji', '$2y$12$7.RckCCY1hLeQZgZqI4LvOI60Tmn3QDYAFdlKN.b4H16ngploOVj2', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(34, '13228668', 'Opan Cager Wacana', 'paris79', '$2y$12$oCVk3EHAvu25oYY1R25zDubntSnUD2Y9XwWZLuf8z5aF0cxo3s1RK', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(35, '62142511', 'Hafshah Lailasari', 'firmansyah.ratih', '$2y$12$ISpjHgzg0k3s73/mkBhvm.VGOEwBy.3CmAMmcC8Pslo7sEgsWrcE2', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(36, '57397677', 'Kamaria Lestari', 'epratama', '$2y$12$DwQlQSL0dBXg422IfC1tAOJfHcKBbyoOFVWQuXXfkA1agPpRhVOJi', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(37, '52392416', 'Nalar Saragih S.Pt', 'mandasari.jane', '$2y$12$Ugdqee.wCnkYO4.85XiM0OvS6jaJKkafQ9X7FG.HpCscb5k/LuFpC', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(38, '18023347', 'Rafid Jasmani Pradana S.Pd', 'tania.dongoran', '$2y$12$3UwwIYWDVVlJHkX4JD3PqecKARr9fjlpS.M37BJU4bPzivIbz8seO', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(39, '95358736', 'Pandu Nugroho', 'jnasyiah', '$2y$12$N.LAplGBZ09E3Jz7gL1uxeDZUG52rsS8oKxvOgb3l64WNg8YiVawO', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(40, '73595761', 'Panca Mustofa M.TI.', 'wsuartini', '$2y$12$u1CxsKOxy/aZQ7JiTXHrG.SU0gWrSy8lvtasbg7PNWGJLK9OecQuS', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(41, '59305561', 'Cemplunk Damanik', 'hidayat.nurul', '$2y$12$wUW.I9xMMx7V2k5KdFTfTuC6HZ.UVsZ50JbBB3WQPBcot7b8XfgJS', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(42, '30827080', 'Olivia Aryani', 'yunita37', '$2y$12$tfunyTxeDAS8.D4imI4MmOe8kHti.KFVdRqpzORBKgDoGc7hkiBzG', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(43, '92213567', 'Tami Melani', 'hendri34', '$2y$12$hEu3sHIPHLWkzoVWkyu50uuysoNpq2t4.aEGay.Wzw9VkyfgMyNgq', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(44, '99007334', 'Michelle Wijayanti S.E.', 'maryanto.mandasari', '$2y$12$RrPsqRWoLUk8zQEiglwYCOvIvBOtFYIVpKKI8okbfdG1V10LOtjkC', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(45, '19860873', 'Mustika Bakianto Wijaya S.Pd', 'caturangga55', '$2y$12$6mxvgavt6.eRwunGC.Z.n.0rblJEj2JVsQjKSqHBtag0XvzDQBf.q', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(46, '16732644', 'Makuta Hari Sinaga S.Sos', 'tiara25', '$2y$12$e1xRu0V7bgkgvhs9/EK2Xur/RCg8gYWVuNpZdgC3kRFS9WqSJ6./i', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(47, '60979626', 'Dina Winarsih', 'hutapea.kajen', '$2y$12$uQhlut90GoMn88eo18qPuOm.HLGSbrN6.c26Wf4byz7zJa/ABCq1G', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(48, '30985037', 'Tasdik Dabukke', 'margana79', '$2y$12$yHHX5w42eVxii6Oox8aWiuxUhoSJye5UK1IHUU1l2L4kYyqBsk/Fa', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(49, '11674755', 'Garang Labuh Ramadan', 'uda92', '$2y$12$J8LvWKkSwUMoq/CxGMA/HuIQ3ViWV7.9fv9WIefDI93I2aMm.9RLK', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(50, '61112463', 'Nyoman Suryono M.Ak', 'zulkarnain.wani', '$2y$12$wHKxe.qwTidvDQe3jp1mxOGcIdugQseJjvAbnxU.4az9lpA6F0Hg6', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(51, '95141600', 'Kania Kezia Rahimah M.Ak', 'elon16', '$2y$12$W2cCHDLl8WB9vn9q/z/iQOLS2Mnl47WlOmXYdTJ2gF3pqZgEkAN3a', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(52, '93153163', 'Asirwada Wibisono', 'nyoman57', '$2y$12$QWUcUMIVL6WyvLkRBMEX4eMxh3TCvCbZLtm33nFjeq/rEpMeIKCfm', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(53, '25664159', 'Ajiman Ardianto', 'simon.utama', '$2y$12$OFcnODj5r1uAzF2g49aR7u1E4oOfGFrac2B33YDZsQia2KTpTo3a2', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(54, '12770383', 'Ani Widiastuti', 'zulaikha93', '$2y$12$jwWYvifmnX13ZfxKa3VbbuCUCTxkCSTUBeyCC608S6hEx5/z9H9IW', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(55, '61223968', 'Dagel Firmansyah S.T.', 'lpradipta', '$2y$12$L4pl3jfGL3jpLea6BvY6f.W1LUvLE8IJMHKihtBCz1xaZUhJ9YuBC', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(56, '40025024', 'Ajeng Wastuti S.E.', 'budiman.farah', '$2y$12$oKPiNSHM/U4RWdW4GPFo6uO7Y866iiyt9lAVnHGq2O4OOsXn8lh5q', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(57, '70711586', 'Yance Wastuti', 'talia84', '$2y$12$FhXeZpi.pLhAx20xiQ8vhOMFObkQZD2sG/kQMFy0beEDq6GCX2WQ.', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(58, '38513574', 'Jasmin Andriani', 'luis.lazuardi', '$2y$12$ynn/xxnibuG07VngL7wtQOj.dJ85lBesZLXxnk9TfC7jVePfpnmXW', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(59, '38705038', 'Utama Nashiruddin', 'lukman.haryanti', '$2y$12$1yUry7fp16U56CVcPDvVK.zQK4hoUv1civIdQPdSxHwM61/C8CykW', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(60, '31841687', 'Elvina Melani M.Pd', 'sihotang.hasan', '$2y$12$WOIF6Fja6BE97oT3.0Aff.Re.JegaCzO8.0qMFMhEGYsukiO/pbTS', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(61, '34698763', 'Syahrini Rini Wulandari', 'kuswandari.novi', '$2y$12$9Oqma.Q.XHPG9WmBVmkKWOrVZT9w8DCVw88GA6FjaXFHrr9lAIyum', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(62, '33396716', 'Kezia Wijayanti S.Kom', 'oliva.kurniawan', '$2y$12$0qg94kfhl2fad2n5juV1ueuNsBHced3jrsU6yOBeIokQBMHZd1u7W', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(63, '73875034', 'Ira Anastasia Usamah', 'bpertiwi', '$2y$12$h.G7Hq87MA85wHSjSh4q4e1MP5GBIieoB3hZWI2gDx5trzK2eXl.O', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(64, '91889430', 'Hamima Puspita', 'simbolon.jasmani', '$2y$12$WYkN0FHNMbo4LS2VJnfWc.mg2ycH9QKS0bemkpLOeNlLWP0bAhp9u', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(65, '77645425', 'Lantar Jaswadi Widodo', 'wijayanti.cinthia', '$2y$12$ytFs0lmzCvHva/ZBBZLD2.lM.dP9o1AG77vSQ/EAG.xhKqwkCopeO', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(66, '63172127', 'Cahyanto Wibisono', 'gantar00', '$2y$12$SXkTGkz..O5ldb8KSzBS5uBmt7L8/bFuLOkFghqVg06JtsqvLSk32', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(67, '93802035', 'Eluh Sihotang', 'harjasa.namaga', '$2y$12$wbIPlrXlAP6w71WSIKNwI.XSJJV1GRsp9ZHd6oTsl8IqFg1s4jPpK', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(68, '30049490', 'Paramita Wulandari', 'utama.galiono', '$2y$12$v1z3.klBtI2JKSXbMZVKue40iXDitVF3gsK68QTWGNc46bmjTK2yW', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(69, '55234279', 'Clara Tantri Winarsih', 'wasita.chelsea', '$2y$12$3N0J1E7VgTYE1KdLCRS51eonMIyBVYODI2PtM5hAMunEa5HSQTYry', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(70, '91018254', 'Salimah Yulianti', 'napitupulu.zizi', '$2y$12$X16tGq1AEnKpaXbJEt/6vuSDeeN2SUBYSvbW.fqX8L8z9mAR04pcS', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(71, '57924375', 'Teguh Waluyo', 'nardi39', '$2y$12$ZTk7aoaXlGzNjQdpPa6WFO4kuc/VAJ.QMisdYQLtXHOPD/jrvplXu', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(72, '34332374', 'Timbul Jail Najmudin M.Kom.', 'saragih.caket', '$2y$12$Ig6Y9HukH.9k5gyrDDMbe.i7ccu/AMcFRhZ/L7WiqmHeXRM8bMPtq', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(73, '91376510', 'Digdaya Lazuardi S.E.I', 'pranawa.manullang', '$2y$12$FSy1qK1UjMH/lFE4xotucuOVlO6yTOOVybRkiAukAbfBeGT7zuBCe', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(74, '86602816', 'Ciaobella Handayani', 'kunthara.rahayu', '$2y$12$v2IRHr0KhipWoqZsHX4QauXlfHHr.ZZpbogeQx3RfsUE3nTEK3sdO', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(75, '87862298', 'Bakiadi Habibi', 'tanggraini', '$2y$12$hwn/fUcS.f22vplk9j6dbe5CFWk8dOXjLqn1Nz4dlFLWed7mUfq4e', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(76, '83903518', 'Jane Hassanah', 'iswahyudi.baktiadi', '$2y$12$CWkHDMVwVuMwnOFZbI0t/.Y8SsasZkVaKbvE.MdCl.m36S5M7c2Pu', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(77, '26106844', 'Harimurti Saptono', 'bakda.maheswara', '$2y$12$NpzV2tlOJ.sLhYVQGk61hOf3P4bKYU.RCcylLyU7afzLC2ZROi.fe', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(78, '38403728', 'Galih Daliono Pradana', 'firgantoro.karimah', '$2y$12$pvsES3Px54.266jnGaDxOeUWY44D69mO.V.FfMw7aFE1w7B6bAREi', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(79, '23340437', 'Patricia Wastuti', 'danuja23', '$2y$12$4inw4onvzfDVpPtIqRCewOlejkz/ujwTiVAa.fJhtuIrgByQ3RiB6', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(80, '84736947', 'Dimas Kuswoyo', 'wibisono.ophelia', '$2y$12$52jFOh4AegsTU0VLeqDOQuMUFJ81mXzDkq.iij0tOs60077mjos8i', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(81, '19317374', 'Rangga Dabukke S.IP', 'lestari.mumpuni', '$2y$12$JFxip.SK/pS.YJpWNb7NPuVbt1JErBQdDbEGXTpTpvg9S8aD9zfQ.', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(82, '59846365', 'Hamima Hartati S.Pd', 'hnurdiyanti', '$2y$12$r1e4/WTRbIenrKrPnnGBX.DbjhwB1IzV7K/ooOy/6042T4DI1uGwO', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(83, '68567310', 'Damu Hutapea', 'lintang.ramadan', '$2y$12$vkSes5Zq3Tyb.bYBVKwiSOmb2prt9HGPpoHvW/x0kfFFGuWkr7XqS', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(84, '99400369', 'Maida Latika Wijayanti', 'haryanti.edi', '$2y$12$SvB3m5.CJi0AefpcKi9IbejKbNPjoEg5CJmVTSF3szOTm5tp8ehMa', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(85, '30903531', 'Chelsea Sari Astuti', 'prayoga.maimunah', '$2y$12$ZM/h5iqcfZdegcc4meXUL.sRzU8ae74WqXBF9r.ebSXtW/j.aHUyq', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(86, '59368907', 'Bella Laras Andriani', 'ira13', '$2y$12$K8nwihpsx6PJaxYXNPo1.O1LVV5RXxneH1JT5m0slIqJQV3C4vDG2', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(87, '87856538', 'Nilam Mardhiyah', 'tampubolon.mila', '$2y$12$6OQIgCqEOrL/1PqxcrsdXuDchwNyESgBvAqIFJvkqJKD7e/Rj33Dm', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(88, '72235791', 'Safina Astuti', 'wpratiwi', '$2y$12$yNU5BxGs/ETzX/UoMXbrROfSEmXOFOhIHMudWXZ.jVkLO/Vq4c8M6', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(89, '47280956', 'Winda Hartati', 'harjaya76', '$2y$12$TvP3ObiMaUZ8d7lCX2g5ye6sGctlKJweNnmKPyF1zO6yUrYZ2FszW', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(90, '64117108', 'Padma Ratih Hariyah S.Ked', 'muhammad.najmudin', '$2y$12$TTSADAFS1unBm5YqxEH4JuzhSjQGeN7HLEVCJHmJ.wiKDw3Nzwi6u', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(91, '55997519', 'Balijan Saefullah', 'gamblang82', '$2y$12$b4hlzbodNuD9Q241cwalwO5VgWigf0BCsc67eYPeZv..ksfis.HYO', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(92, '71522441', 'Silvia Amelia Nurdiyanti M.TI.', 'putra.harjo', '$2y$12$xWzoxh5KTnjfF/s/VH7aqOIZOTbXwJXKciaFRr6kbnrKKzqy8Htua', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(93, '92337686', 'Parman Prayoga', 'putu.mardhiyah', '$2y$12$y5M.Max/bs2IoeKnQurCAuUNmHLKyOS5C1yOtQrcOBv4YosueqGIC', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(94, '29612432', 'Zaenab Kuswandari', 'putri.yolanda', '$2y$12$IdwsFRlBBZmLPBrFfT5vteUfYcBW5jZCf5IXfME91qsWcHZkYL8Fm', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(95, '84954084', 'Bakiono Kawaya Maryadi', 'kbudiyanto', '$2y$12$AjlarglMZqzF0w5O.yp5meQUGmJug7HHL/UFsRmNc9RdAuSUSI7ii', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(96, '95876769', 'Ghaliyati Ulya Kuswandari', 'naradi.ardianto', '$2y$12$uca.j7b56cWABIk2PC.GCuHhCRtUMU4x15DwRnZHYdhnW6AYp.cGm', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(97, '76144763', 'Bakijan Budiyanto', 'whastuti', '$2y$12$kdzzXhXozFObFQ6hwRTxJe/YxptA9Sp4aPzUIdMZ4J8AvIJmIYSGG', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(98, '35800378', 'Aslijan Haryanto', 'najam.permata', '$2y$12$0Sychrxxn3DkBNfZ.C4gJuW4VAPkzv0ChB2Z57K10jepZotq3fo3G', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(99, '92972215', 'Cinthia Pertiwi', 'bakti06', '$2y$12$xoo6rdquI6SsAoOImqGJZO5r8twQa0n1mpZVpuUQmwFpauLedj5QK', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43'),
(100, '73256382', 'Citra Usada S.T.', 'salman94', '$2y$12$5kh8L99yRVPomqaEb5B3X.TuRHgA7EbV/GUZdqAVb6AzjoHU40my.', NULL, '2024-11-14 01:45:43', '2024-11-14 01:45:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logkehadirans`
--
ALTER TABLE `logkehadirans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_user_id` (`guru_id`),
  ADD KEY `log_siswa_id` (`siswa_id`),
  ADD KEY `log_kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengajars`
--
ALTER TABLE `pengajars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajars_guru_id` (`guru_id`),
  ADD KEY `pengajars_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `logkehadirans`
--
ALTER TABLE `logkehadirans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengajars`
--
ALTER TABLE `pengajars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `logkehadirans`
--
ALTER TABLE `logkehadirans`
  ADD CONSTRAINT `log_kelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_siswa_id` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_user_id` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajars`
--
ALTER TABLE `pengajars`
  ADD CONSTRAINT `pengajars_guru_id` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajars_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
