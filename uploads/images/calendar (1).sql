-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2020 pada 03.23
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `task_desc` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `priority` varchar(25) DEFAULT NULL,
  `reference_type` varchar(30) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `approve` varchar(25) DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `target_date` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `meeting_desc` varchar(255) DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_06_064549_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit articles', 'web', '2020-03-06 00:10:34', '2020-03-06 00:10:34'),
(2, 'create articles', 'web', '2020-03-06 00:11:16', '2020-03-06 00:11:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'writer', 'web', '2020-03-06 00:10:26', '2020-03-06 00:10:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `task_desc` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `priority` varchar(25) DEFAULT NULL,
  `reference_type` varchar(30) DEFAULT NULL,
  `assign_to` varchar(255) DEFAULT NULL,
  `assign_by` varchar(255) DEFAULT NULL,
  `deadline` date NOT NULL,
  `target_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`id`, `name`, `task_desc`, `pic`, `priority`, `reference_type`, `assign_to`, `assign_by`, `deadline`, `target_date`, `start_date`, `end_date`, `created_at`, `updated_at`, `user_id`) VALUES
(6, 'Coba Task 1', 'Percobaan Task 1', 'Angga', 'Medium', 'Task', '1', '1', '2020-03-07', '2020-03-05', '2020-03-04', '2020-03-14', '2020-03-06 08:27:30', '2020-03-03 19:24:14', 1),
(7, 'Task 2', 'Percobaan 2', 'Memet', 'High', 'Event', '1', '1', '2020-03-06', '2020-03-07', '2020-03-05', '2020-03-14', '2020-03-06 08:27:28', '2020-03-04 21:15:30', 1),
(8, 'Task 3', 'Coba Task 3', 'Alim', 'Low', 'Task', '1', '1', '2020-03-12', '2020-03-13', '2020-03-07', '2020-03-06', '2020-03-06 08:27:25', '2020-03-04 21:20:46', 1),
(9, 'Task 4', 'Task Desc', 'Memet', 'High', 'Task', '1', '1', '2020-03-08', '2020-03-06', '2020-03-07', '2020-03-06', '2020-03-06 08:27:24', '2020-03-05 19:19:58', 1),
(10, 'Tekno 1', '12345', 'Angga', 'High', 'Task', '1', '1', '2020-03-13', '2020-03-21', '2020-03-06', '2020-03-14', '2020-03-06 08:27:22', '2020-03-05 21:02:07', 2),
(11, 'Task 5', 'Description Task 7', 'Angga', 'High', 'Task', '9', '1', '2020-03-09', '2020-03-07', '2020-03-08', '2020-03-09', '2020-03-06 01:22:41', '2020-03-06 01:22:41', 1),
(12, 'Outside Test', 'Test untuk outside calendar', 'Angga', 'High', 'Event', '1', '1', '2020-05-29', '2020-05-22', '2020-05-08', '2020-06-12', '2020-03-06 02:27:51', '2020-03-06 02:27:51', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `dept`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@material.com', '2020-02-14 02:47:35', '$2y$10$UXTxrbcECExxAmfIwS3dJe8XgBVMrCN5P19JdqOH3byhzdF8ArA6e', '', NULL, '2020-02-14 02:47:35', '2020-02-14 02:47:35'),
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$/I5aSVb.3ErGRqhJP0bx0eaj1PXSt6hqwAgdtZDeP8c0a8ZJmHWCK', '', NULL, '2020-02-14 02:49:32', '2020-02-14 02:49:32'),
(3, 'Lula Fay', 'oberbrunner.zita@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '2Y3cKTdvBB', '2020-03-03 20:28:32', '2020-03-03 20:28:32'),
(5, 'Jada Lind I', 'brando.paucek@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'DTmJuLSbvI', '2020-03-03 20:28:32', '2020-03-03 20:28:32'),
(6, 'Miss Tamia Frami', 'kaylee.funk@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'zQvW6qPeXe', '2020-03-03 20:28:33', '2020-03-03 20:28:33'),
(7, 'Gaylord Klein', 'uprohaska@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'Frm2gROqWY', '2020-03-03 20:28:33', '2020-03-03 20:28:33'),
(8, 'Armando Greenholt', 'oboyer@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'lX0wKcj4JY', '2020-03-03 20:28:33', '2020-03-03 20:28:33'),
(9, 'Elouise Johnston', 'bernier.david@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '7mu9j6EYEU', '2020-03-03 20:28:33', '2020-03-03 20:28:33'),
(10, 'Odie Mayer', 'dora66@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'fnXVyiWy7Q', '2020-03-03 20:28:33', '2020-03-03 20:28:33'),
(11, 'Alia Ernser', 'cassandra.oconner@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '40n6lfusCV', '2020-03-03 20:28:33', '2020-03-03 20:28:33'),
(12, 'Orval Ferry', 'palma.towne@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '1dgtwsATYC', '2020-03-03 20:28:33', '2020-03-03 20:28:33'),
(13, 'Rosalind Armstrong II', 'bahringer.korey@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'xrifo5sODe', '2020-03-03 20:28:34', '2020-03-03 20:28:34'),
(14, 'Savanna Pacocha', 'hauck.jaquelin@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'hsXpuRoGKJ', '2020-03-03 20:28:34', '2020-03-03 20:28:34'),
(15, 'Hector Sawayn', 'kemmer.hailee@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'cDbOi1nUi0', '2020-03-03 20:28:34', '2020-03-03 20:28:34'),
(17, 'Prof. Wallace Ortiz III', 'shanon39@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'TMTeb0zRRN', '2020-03-03 20:28:34', '2020-03-03 20:28:34'),
(18, 'Tom Cole', 'nolan.jefferey@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'ArARvALrLm', '2020-03-03 20:28:34', '2020-03-03 20:28:34'),
(19, 'Mr. Donnie Zulauf II', 'xrogahn@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'QiOQove0tV', '2020-03-03 20:28:34', '2020-03-03 20:28:34'),
(20, 'Jovani Hagenes', 'libbie10@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'TlXk9skqe2', '2020-03-03 20:28:35', '2020-03-03 20:28:35'),
(21, 'Darron Johnson', 'adele.baumbach@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'egZL95ORfM', '2020-03-03 20:28:35', '2020-03-03 20:28:35'),
(22, 'Mrs. Asa Torphy', 'lowell95@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'EKbcdyNx6r', '2020-03-03 20:28:35', '2020-03-03 20:28:35'),
(23, 'Mr. Barton Murphy', 'gloria80@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'vkQs2TgviY', '2020-03-03 20:28:36', '2020-03-03 20:28:36'),
(24, 'Nestor Hayes', 'prudence17@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'zd25h40hz8', '2020-03-03 20:28:36', '2020-03-03 20:28:36'),
(25, 'Merl Wintheiser DVM', 'xgleason@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'LB2UBRMqS3', '2020-03-03 20:28:36', '2020-03-03 20:28:36'),
(26, 'Mr. Freeman Corkery DVM', 'abshire.nickolas@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '3fAueosxRs', '2020-03-03 20:28:36', '2020-03-03 20:28:36'),
(27, 'Dr. Mckenna Rath', 'pfeffer.aracely@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '9jS2vTXNc2', '2020-03-03 20:28:36', '2020-03-03 20:28:36'),
(28, 'Ms. Anahi Lowe', 'brooklyn.von@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'FGDGakXhCJ', '2020-03-03 20:28:36', '2020-03-03 20:28:36'),
(29, 'Ms. Anais Johnston II', 'jordan.frami@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'ib1MDHU28i', '2020-03-03 20:28:37', '2020-03-03 20:28:37'),
(30, 'Pablo Strosin', 'qritchie@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'q2m3efMFDR', '2020-03-03 20:28:37', '2020-03-03 20:28:37'),
(31, 'Jaden Labadie', 'macey.hermiston@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '7So2Vu1hp2', '2020-03-03 20:28:37', '2020-03-03 20:28:37'),
(32, 'Prof. Reuben Ziemann', 'orn.domenico@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'MRuwmtsrB7', '2020-03-03 20:28:37', '2020-03-03 20:28:37'),
(33, 'Katlyn Mayer', 'canderson@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'en5n7wI9CU', '2020-03-03 20:28:37', '2020-03-03 20:28:37'),
(34, 'Dylan Tremblay', 'daniel.zoie@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'YatOpv84am', '2020-03-03 20:28:38', '2020-03-03 20:28:38'),
(35, 'Delfina Watsica MD', 'phegmann@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'MSqqfLYd21', '2020-03-03 20:28:38', '2020-03-03 20:28:38'),
(36, 'Dr. Jackeline Corwin MD', 'aritchie@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'UbQQWXRtP3', '2020-03-03 20:28:38', '2020-03-03 20:28:38'),
(37, 'Mr. Ronaldo Schroeder', 'albert92@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'oaCzSR5zr0', '2020-03-03 20:28:38', '2020-03-03 20:28:38'),
(38, 'Coy Conn', 'pmedhurst@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'eEERcuLs1g', '2020-03-03 20:28:38', '2020-03-03 20:28:38'),
(39, 'Demond Koss', 'cassin.pedro@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'd3QqrasRQ1', '2020-03-03 20:28:39', '2020-03-03 20:28:39'),
(40, 'Wanda Turcotte', 'fbayer@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'wl1KWZQaS6', '2020-03-03 20:28:39', '2020-03-03 20:28:39'),
(41, 'Brant Veum', 'jeffry.hudson@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'W7nIktitDp', '2020-03-03 20:28:39', '2020-03-03 20:28:39'),
(42, 'Juliana Steuber', 'abshire.rosemarie@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'TUPPRBQ8GC', '2020-03-03 20:28:39', '2020-03-03 20:28:39'),
(43, 'Mr. Hoyt Swift', 'shanon00@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'TUokhEobmb', '2020-03-03 20:28:40', '2020-03-03 20:28:40'),
(44, 'Stuart Hoeger', 'mills.ephraim@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'u4puH0djwJ', '2020-03-03 20:28:40', '2020-03-03 20:28:40'),
(45, 'Ashtyn Erdman', 'akerluke@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'NUKrWFp91W', '2020-03-03 20:28:40', '2020-03-03 20:28:40'),
(46, 'Dr. Delta Herzog', 'hmaggio@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '9aUYVyrYbi', '2020-03-03 20:28:41', '2020-03-03 20:28:41'),
(47, 'Hermann Wuckert', 'nkeeling@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '3OQnRbVOTs', '2020-03-03 20:28:41', '2020-03-03 20:28:41'),
(48, 'Mrs. Corene Runolfsson Sr.', 'makenzie45@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'xn7k02Fw5K', '2020-03-03 20:28:41', '2020-03-03 20:28:41'),
(49, 'Karley Macejkovic MD', 'cora06@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'l2tL3YE9mT', '2020-03-03 20:28:41', '2020-03-03 20:28:41'),
(50, 'Greyson Schoen Jr.', 'hal.larson@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'GzuvVNSn00', '2020-03-03 20:28:42', '2020-03-03 20:28:42'),
(51, 'Lacey Streich', 'esmeralda26@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'O3VoAghDku', '2020-03-03 20:28:42', '2020-03-03 20:28:42'),
(52, 'Thora Brakus', 'wjohns@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'C1EuxCxGkT', '2020-03-03 20:28:42', '2020-03-03 20:28:42'),
(53, 'Brigitte Lynch', 'jconn@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '01P2xyVIbi', '2020-03-03 20:28:42', '2020-03-03 20:28:42'),
(54, 'Justina McGlynn', 'kdicki@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'hs9Taq8H1E', '2020-03-03 20:28:43', '2020-03-03 20:28:43'),
(55, 'Eveline Mueller', 'wintheiser.kasandra@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'Wb2g7V8S0d', '2020-03-03 20:28:43', '2020-03-03 20:28:43'),
(56, 'Mr. Destin Beier MD', 'bosco.issac@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'vKE5B72YLJ', '2020-03-03 20:28:43', '2020-03-03 20:28:43'),
(57, 'Prof. Lavonne Mann DVM', 'fwuckert@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '2DwGxNUIvG', '2020-03-03 20:28:43', '2020-03-03 20:28:43'),
(58, 'Nelle Homenick DVM', 'danika54@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'IQyeK8e6Ct', '2020-03-03 20:28:43', '2020-03-03 20:28:43'),
(59, 'Felix Treutel', 'trinity84@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '3Hb042XV4I', '2020-03-03 20:28:43', '2020-03-03 20:28:43'),
(60, 'Dr. Garett Gulgowski', 'royal.carroll@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'W3me0Xw0Zz', '2020-03-03 20:28:44', '2020-03-03 20:28:44'),
(61, 'Chadd Larkin', 'dana60@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'fj6roqqash', '2020-03-03 20:28:44', '2020-03-03 20:28:44'),
(62, 'Dr. Amelia Hills DDS', 'sporer.judy@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'Z4wLB4rVmf', '2020-03-03 20:28:44', '2020-03-03 20:28:44'),
(63, 'Verner Stoltenberg', 'dannie.treutel@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'SK22GvGvW4', '2020-03-03 20:28:44', '2020-03-03 20:28:44'),
(64, 'Mona Heller', 'gilda.sporer@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'MTPSIHh7mZ', '2020-03-03 20:28:44', '2020-03-03 20:28:44'),
(65, 'Wilburn Ebert', 'hoppe.viola@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '30DpO13hKX', '2020-03-03 20:28:44', '2020-03-03 20:28:44'),
(66, 'Reyna Littel', 'jeffry94@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '6KyMag56HD', '2020-03-03 20:28:45', '2020-03-03 20:28:45'),
(67, 'Talon Dickens', 'jenifer.stracke@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '4t5LGgukcf', '2020-03-03 20:28:45', '2020-03-03 20:28:45'),
(68, 'Aryanna Wisozk I', 'ole07@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'DdQfxB63z6', '2020-03-03 20:28:45', '2020-03-03 20:28:45'),
(69, 'Destiny Sanford', 'dina69@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'jDhl7qWBRf', '2020-03-03 20:28:45', '2020-03-03 20:28:45'),
(70, 'Ashlynn Schoen', 'hilario11@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '9rqQgCwj9B', '2020-03-03 20:28:45', '2020-03-03 20:28:45'),
(71, 'Destinee Haley MD', 'antonetta.jerde@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'kELn2KBd2X', '2020-03-03 20:28:46', '2020-03-03 20:28:46'),
(72, 'Dr. Carter Schimmel I', 'david94@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'Xv3ABlYbG6', '2020-03-03 20:28:46', '2020-03-03 20:28:46'),
(73, 'Lily Hudson', 'elisabeth77@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'fzHuq4tbDl', '2020-03-03 20:28:46', '2020-03-03 20:28:46'),
(74, 'Frederic Wilderman', 'brook.koss@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '0MmddJdFqR', '2020-03-03 20:28:46', '2020-03-03 20:28:46'),
(75, 'Meredith McClure', 'kiehn.maya@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'r1WwXkg9cu', '2020-03-03 20:28:46', '2020-03-03 20:28:46'),
(76, 'Miss Jany Quitzon', 'ejenkins@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'pzlw0aKrVP', '2020-03-03 20:28:47', '2020-03-03 20:28:47'),
(77, 'Estella Howell', 'cummerata.krystal@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'pXGl0xE7h2', '2020-03-03 20:28:47', '2020-03-03 20:28:47'),
(78, 'Eloy Kuhn III', 'kara.toy@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '7wiJYFEAVa', '2020-03-03 20:28:47', '2020-03-03 20:28:47'),
(79, 'Violet Gutkowski', 'archibald05@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '5wpWl1yQYu', '2020-03-03 20:28:47', '2020-03-03 20:28:47'),
(80, 'Mrs. Dovie Koelpin DVM', 'gwendolyn37@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'CKkiw03gvX', '2020-03-03 20:28:48', '2020-03-03 20:28:48'),
(81, 'Brandi Dooley', 'urodriguez@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'mxgea9P6KD', '2020-03-03 20:28:48', '2020-03-03 20:28:48'),
(82, 'Mr. Hector Rath', 'reinhold.murazik@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '0vLR4Q7PJn', '2020-03-03 20:28:48', '2020-03-03 20:28:48'),
(83, 'Miss Joannie Bahringer', 'antonio.runolfsson@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '4XmyBODzpH', '2020-03-03 20:28:48', '2020-03-03 20:28:48'),
(84, 'Carlotta O\'Connell', 'kilback.jedediah@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'goDXrVUSLg', '2020-03-03 20:28:48', '2020-03-03 20:28:48'),
(85, 'Abel Torp', 'smitham.walker@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'qwFoaMTeeF', '2020-03-03 20:28:48', '2020-03-03 20:28:48'),
(86, 'Earl Grady I', 'deondre48@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'Q0nKxWka19', '2020-03-03 20:28:49', '2020-03-03 20:28:49'),
(87, 'Jacinto Kuhic', 'langosh.daija@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '6bxuuwKMLw', '2020-03-03 20:28:49', '2020-03-03 20:28:49'),
(88, 'Joanie Raynor', 'casper.margarete@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'DaLqvJbKse', '2020-03-03 20:28:49', '2020-03-03 20:28:49'),
(89, 'Prof. Mackenzie Crona', 'kdicki@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '0KJJ6OWEzI', '2020-03-03 20:28:49', '2020-03-03 20:28:49'),
(90, 'Prof. Marques Shanahan', 'eldred.heidenreich@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'REAivEd4jb', '2020-03-03 20:28:50', '2020-03-03 20:28:50'),
(91, 'Jacklyn Bashirian', 'rusty04@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'peGTP9CyL5', '2020-03-03 20:28:50', '2020-03-03 20:28:50'),
(92, 'Prof. Brett Ebert Jr.', 'gottlieb.burley@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'rLSa3N7E8x', '2020-03-03 20:28:50', '2020-03-03 20:28:50'),
(93, 'Prof. Lennie Reichel V', 'xjaskolski@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'dugEGLSC7B', '2020-03-03 20:28:50', '2020-03-03 20:28:50'),
(94, 'Dr. Tara Gutkowski', 'hcassin@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '22mIsZx4fM', '2020-03-03 20:28:51', '2020-03-03 20:28:51'),
(95, 'Newell Langworth', 'conroy.sabryna@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '8Zt5kp8juw', '2020-03-03 20:28:51', '2020-03-03 20:28:51'),
(96, 'Joyce Langosh', 'isabel.luettgen@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'Z8vzEFofXf', '2020-03-03 20:28:51', '2020-03-03 20:28:51'),
(97, 'Mrs. Eunice Jacobi', 'ssauer@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'GVhoy2c9NH', '2020-03-03 20:28:51', '2020-03-03 20:28:51'),
(98, 'Leo Reynolds', 'ametz@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'jRfE76CQ53', '2020-03-03 20:28:52', '2020-03-03 20:28:52'),
(99, 'Prof. Colten Halvorson I', 'cstrosin@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '8t8QI7nt3v', '2020-03-03 20:28:52', '2020-03-03 20:28:52'),
(100, 'Darren Keebler', 'kiehn.tyler@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '0XjuELxWVy', '2020-03-03 20:28:52', '2020-03-03 20:28:52'),
(101, 'Clemmie Schuster', 'lebsack.kyla@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'neSFwQuPpl', '2020-03-03 20:28:53', '2020-03-03 20:28:53'),
(102, 'Arlie Schinner', 'hunter.wilkinson@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'SO5dszBQ6x', '2020-03-03 20:28:53', '2020-03-03 20:28:53'),
(103, 'Mr. Flavio Brown', 'burdette.cruickshank@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'vcg47ruKiR', '2020-03-03 20:28:53', '2020-03-03 20:28:53'),
(104, 'Velma Legros', 'rashad.roob@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'FK9hqe8fmf', '2020-03-03 20:28:53', '2020-03-03 20:28:53'),
(105, 'Dr. Scottie Monahan', 'erick81@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'ghDAfmxs7Z', '2020-03-03 20:28:54', '2020-03-03 20:28:54'),
(106, 'Mustafa Ritchie', 'casper.kadin@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'SQTrMvqDDr', '2020-03-03 20:28:54', '2020-03-03 20:28:54'),
(107, 'Katharina Dach', 'wisozk.ardella@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'steUhCGKBB', '2020-03-03 20:28:54', '2020-03-03 20:28:54'),
(108, 'Toby Rau', 'jewel78@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'BqzsaDa39G', '2020-03-03 20:28:55', '2020-03-03 20:28:55'),
(109, 'Miss Rahsaan Thiel', 'grant.fay@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'T852Cq8FV1', '2020-03-03 20:28:55', '2020-03-03 20:28:55'),
(110, 'Julio Dickinson Jr.', 'marlee.fisher@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'ofkpMqBrol', '2020-03-03 20:28:55', '2020-03-03 20:28:55'),
(111, 'Efrain Lowe MD', 'hank66@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'zbVPL5aF1G', '2020-03-03 20:28:55', '2020-03-03 20:28:55'),
(112, 'Kiel Flatley', 'ybartell@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'XHKA3do50C', '2020-03-03 20:28:56', '2020-03-03 20:28:56'),
(113, 'Eric Flatley', 'cristal74@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'qo9oXSrcKg', '2020-03-03 20:28:56', '2020-03-03 20:28:56'),
(114, 'Dr. Emmitt McClure', 'schimmel.derick@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'oWxEHafPTF', '2020-03-03 20:28:56', '2020-03-03 20:28:56'),
(115, 'Mr. Paolo Shanahan', 'herzog.rosella@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'E4dpmD2e8I', '2020-03-03 20:28:56', '2020-03-03 20:28:56'),
(116, 'Deron Gislason', 'haley.amelia@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '36DguNzl7A', '2020-03-03 20:28:57', '2020-03-03 20:28:57'),
(117, 'Ms. Sallie Howe DVM', 'maryse.bogisich@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'I3LZHWwql3', '2020-03-03 20:28:57', '2020-03-03 20:28:57'),
(118, 'Gennaro Gutmann', 'elnora.beer@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '8ShEIiHjUN', '2020-03-03 20:28:57', '2020-03-03 20:28:57'),
(119, 'Helen Kuvalis', 'shane.hilpert@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'saMTxTyNWi', '2020-03-03 20:28:57', '2020-03-03 20:28:57'),
(120, 'Augustus Lakin', 'delmer.hackett@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'kTrkWsmejC', '2020-03-03 20:28:57', '2020-03-03 20:28:57'),
(121, 'Frederique Halvorson DDS', 'hilario.ernser@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'cPs5FsPWwO', '2020-03-03 20:28:58', '2020-03-03 20:28:58'),
(122, 'Connor Rowe', 'jed85@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'C8yBBITozl', '2020-03-03 20:28:58', '2020-03-03 20:28:58'),
(123, 'Isaac Abshire', 'colby50@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '4NMJaoXgfM', '2020-03-03 20:28:58', '2020-03-03 20:28:58'),
(124, 'Madyson Streich MD', 'tia.ankunding@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'vCbODimrYe', '2020-03-03 20:28:59', '2020-03-03 20:28:59'),
(125, 'Mrs. Marcelle Walsh', 'manuela35@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '1XkheRg3Sj', '2020-03-03 20:28:59', '2020-03-03 20:28:59'),
(126, 'Prof. Enrico Jones', 'ivory.turcotte@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'SEINutkzYp', '2020-03-03 20:28:59', '2020-03-03 20:28:59'),
(127, 'Kyra Ullrich', 'jmann@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '4bqEqYPr7v', '2020-03-03 20:28:59', '2020-03-03 20:28:59'),
(128, 'Julio Crooks DDS', 'jfranecki@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'v15xWtBYet', '2020-03-03 20:29:00', '2020-03-03 20:29:00'),
(129, 'Christiana Bashirian', 'andre16@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'VspGcovPzU', '2020-03-03 20:29:00', '2020-03-03 20:29:00'),
(130, 'Rhianna Koss', 'isabel.vandervort@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'EFYjfLKnqs', '2020-03-03 20:29:01', '2020-03-03 20:29:01'),
(131, 'Chad Schamberger', 'rahul.gorczany@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'R5UUTgMN4B', '2020-03-03 20:29:01', '2020-03-03 20:29:01'),
(132, 'Prof. Savion Wintheiser V', 'zmante@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'uMaU3m95ed', '2020-03-03 20:29:01', '2020-03-03 20:29:01'),
(133, 'Prof. Ebony Runolfsdottir IV', 'rupton@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'WlGLFUAn8i', '2020-03-03 20:29:02', '2020-03-03 20:29:02'),
(134, 'Letha Stehr', 'faustino.walker@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '4BZJBGTbhu', '2020-03-03 20:29:02', '2020-03-03 20:29:02'),
(135, 'Nelson Hansen', 'bednar.kiara@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '1TTd2fujjz', '2020-03-03 20:29:03', '2020-03-03 20:29:03'),
(136, 'Juston Bode', 'murazik.stephania@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '0cRnDd2UBY', '2020-03-03 20:29:04', '2020-03-03 20:29:04'),
(137, 'Ms. Jennyfer Gibson PhD', 'uriel73@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'gNsryR6mPB', '2020-03-03 20:29:05', '2020-03-03 20:29:05'),
(138, 'Ronny Herzog', 'tromp.finn@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'jby87wk26M', '2020-03-03 20:29:05', '2020-03-03 20:29:05'),
(139, 'Nakia Carroll DVM', 'koch.dolores@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'z62mQR5wCK', '2020-03-03 20:29:05', '2020-03-03 20:29:05'),
(140, 'Ozella Padberg', 'jhane@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '4P8mwWjzcc', '2020-03-03 20:29:05', '2020-03-03 20:29:05'),
(141, 'Dr. Jenifer Kerluke Jr.', 'keaton81@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'ayfL81xGTG', '2020-03-03 20:29:06', '2020-03-03 20:29:06'),
(142, 'Nikki Ward', 'nschmeler@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'gQ4fpbFw01', '2020-03-03 20:29:07', '2020-03-03 20:29:07'),
(143, 'Robb Mante', 'gutmann.kimberly@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'YUyGUs2pJa', '2020-03-03 20:29:08', '2020-03-03 20:29:08'),
(144, 'Ms. Zola Larson', 'cturcotte@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'uA8f4CdOP2', '2020-03-03 20:29:08', '2020-03-03 20:29:08'),
(145, 'Treva Mante', 'elmira22@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'fT014GXRHZ', '2020-03-03 20:29:08', '2020-03-03 20:29:08'),
(146, 'Josie Beatty', 'cruz.herzog@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '8I2R2whajG', '2020-03-03 20:29:09', '2020-03-03 20:29:09'),
(147, 'Lelah Dach', 'dana.leffler@example.org', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'VFFUC2l6SX', '2020-03-03 20:29:09', '2020-03-03 20:29:09'),
(148, 'Elyssa Kohler', 'romaguera.adonis@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'eMmbsVD0TG', '2020-03-03 20:29:09', '2020-03-03 20:29:09'),
(149, 'Ubaldo Emard', 'bharris@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'GIhvuuxYeu', '2020-03-03 20:29:10', '2020-03-03 20:29:10'),
(150, 'Fernando Barton', 'ssmitham@example.net', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '27rMBemjNk', '2020-03-03 20:29:10', '2020-03-03 20:29:10'),
(151, 'Rae Smitham DDS', 'dparisian@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', 'z4e0S52KKE', '2020-03-03 20:29:11', '2020-03-03 20:29:11'),
(152, 'Miss Frieda Pouros', 'wilfred83@example.com', '2020-03-03 20:28:32', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '2XmUDrmHyD', '2020-03-03 20:29:11', '2020-03-03 20:29:11'),
(153, 'Angga Pradipta', 'angga@gmail.com', NULL, '$2y$10$OHew1av6v2uRlzNp4vWlduEMvS5Sn/62J43bR77mHQrupm.SAbWIu', NULL, NULL, '2020-03-05 19:58:09', '2020-03-05 19:58:09'),
(157, 'nisya', 'nisya@gspe.com', NULL, '$2y$10$wPq2Rq5QSRlr5IYp8ui5.usYao3ya6ebg3kGwIs5Ae9EYvldSrdeW', NULL, NULL, '2020-03-05 23:58:02', '2020-03-05 23:58:02'),
(158, 'Annisyah', 'nisya@iot.com', NULL, '$2y$10$/BBzSGf5csV8o3v/M0aX4uilKo8qXfuk1He5hJQVhE.goRXSgLLga', 'admin', NULL, '2020-03-06 00:07:55', '2020-03-06 00:07:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
