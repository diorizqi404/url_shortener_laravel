-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Jun 2024 pada 14.19
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url_shortener`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `links`
--

CREATE TABLE `links` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `original_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortened_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clicks` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `links`
--

INSERT INTO `links` (`id`, `user_id`, `original_url`, `shortened_url`, `clicks`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://skilvul.com/courses/javascript-dasar', 's-vulrge', 0, '2024-02-20 21:50:24', '2024-02-21 18:33:51'),
(3, 2, 'https://whimsical.com/', 'whimsi', 3, '2024-02-20 22:34:00', '2024-02-21 06:15:19'),
(4, 2, 'https://smkn2sby.sch.id/', 'smk2', 1, '2024-02-20 22:45:06', '2024-02-20 22:45:10'),
(5, 1, 'https://smkn2sby.sch.id/', 'KAjRoki', 1, '2024-02-21 06:46:07', '2024-02-21 07:01:54'),
(6, 1, 'https://whimsical.com/', 'whimissssss', 0, '2024-02-21 06:51:17', '2024-02-21 19:59:35'),
(7, 1, 'https://tailwindcss.com/docs/scroll-margin', 'zoPWpfH', 0, '2024-02-21 06:51:29', '2024-02-21 06:51:29'),
(8, 2, 'https://fonts.google.com/icons?preview.text=Selamat%20Datang&classification=Monospace&sort=popularity&selected=Material+Symbols+Outlined:schedule:FILL@0;wght@400;GRAD@0;opsz@24&icon.query=clock', 'gfont', 0, '2024-02-21 17:03:40', '2024-02-21 17:03:40'),
(9, 1, 'https://fonts.google.com/icons?preview.text=Selamat%20Datang&classification=Monospace&sort=popularity&selected=Material+Symbols+Outlined:schedule:FILL@0;wght@400;GRAD@0;opsz@24&icon.query=clock', 'ruok', 1, '2024-02-21 17:52:32', '2024-02-21 17:53:14'),
(10, 1, 'https://skilvul.com/courses/javascript-dasar', 's-vu', 0, '2024-02-21 18:12:49', '2024-02-21 18:12:49'),
(11, 1, 'https://skilvul.com/courses/javascript-dasar', 's-vullllll', 0, '2024-02-21 18:31:52', '2024-02-21 18:31:52'),
(12, 1, 'https://skilvul.com/courses/javascript-dasar', 's-ul', 0, '2024-02-21 18:32:53', '2024-02-21 18:32:53'),
(13, 1, 'https://skilvul.com/courses/javascript-dasar', 'sgrg-vul', 0, '2024-02-21 18:33:05', '2024-02-21 18:33:05'),
(14, 1, 'https://divohtytam.com', 'kontoI', 0, '2024-02-21 21:16:27', '2024-02-21 21:16:27'),
(15, 4, 'https://smkn2sby.sch.id/', 'apalah', 1, '2024-06-08 06:41:56', '2024-06-08 06:45:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_21_041015_create_links_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$12$Q0EsnhgbzsfR6Molk34pzeSfTrcRbNoWRESizg6jpKbQkQ6Y.nrce', 'Ic1LaK9ZNKaENuR9P9zDZ5H7R1zFP6K2bzyiRVSpdDaCugOC10p13Pa8k020', '2024-02-20 21:20:00', '2024-02-20 21:20:00'),
(2, 'admin2', 'admin2@admin.com', '$2y$12$n0GObXrnzbaGa/UOtmN/zumtyP0w4/S.0QjAyjyWbXamjlvswcOHe', NULL, '2024-02-20 22:30:18', '2024-02-20 22:30:18'),
(3, 'Kontraktol', 'divoishen@gmail.com', '$2y$12$3/t7Avodj4Yt2KVgV/KDTOALk44xox7WiJlm47zC/Ff4BLxA7G6iO', NULL, '2024-02-21 21:18:13', '2024-02-21 21:18:13'),
(4, 'Dio Rizqi', 'rizqiii.dio@gmail.com', '$2y$12$cHTll.9Z.WiGdBST5BCJWe/84NDu22diMDFayPSpTvWhL.29hqSza', NULL, '2024-06-08 06:38:11', '2024-06-08 06:38:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `links_shortened_url_unique` (`shortened_url`),
  ADD KEY `links_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
