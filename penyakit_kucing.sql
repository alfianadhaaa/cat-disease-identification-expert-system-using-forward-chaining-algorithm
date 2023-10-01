-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2023 pada 00.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyakit_kucing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Admin', ''),
(2, 'Pengguna', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'vetopet@gmail.com', 2, '2023-08-28 11:10:46', 1),
(2, '::1', 'vetopet@gmail.com', 2, '2023-08-28 11:31:14', 1),
(3, '::1', 'vetopet@gmail.com', 2, '2023-08-28 11:47:12', 1),
(4, '::1', 'vetopet@gmail.com', 2, '2023-08-28 12:13:38', 1),
(5, '::1', 'vetopet@gmail.com', 2, '2023-08-28 12:27:05', 1),
(6, '::1', 'vetopet@gmail.com', 2, '2023-08-28 13:00:25', 1),
(7, '::1', 'mawar@gmail.com', 4, '2023-08-28 15:35:58', 1),
(8, '::1', 'vetopet@gmail.com', 2, '2023-08-28 15:39:41', 1),
(9, '::1', 'mawar@gmail.com', 4, '2023-08-28 15:40:05', 1),
(10, '::1', 'vetopet@gmail.com', 2, '2023-08-28 15:40:35', 1),
(11, '::1', 'mawar@gmail.com', 4, '2023-08-28 15:45:38', 1),
(12, '::1', 'vetopet@gmail.com', 2, '2023-08-28 15:46:15', 1),
(13, '::1', 'admin', NULL, '2023-08-28 15:47:41', 0),
(14, '::1', 'admin', NULL, '2023-08-28 15:47:50', 0),
(15, '::1', 'admin', 1, '2023-08-28 15:48:36', 0),
(16, '::1', 'vetopet@gmail.com', 2, '2023-08-28 15:54:18', 1),
(17, '::1', 'mawar@gmail.com', 4, '2023-08-28 15:55:22', 1),
(18, '::1', 'vetopet@gmail.com', 2, '2023-08-28 15:58:27', 1),
(19, '::1', 'mawar@gmail.com', 4, '2023-08-28 16:07:03', 1),
(20, '::1', 'mawar@gmail.com', 4, '2023-08-28 16:07:40', 1),
(21, '::1', 'vetopet@gmail.com', 2, '2023-08-28 16:57:39', 1),
(22, '::1', 'mawar@gmail.com', 4, '2023-08-28 16:58:25', 1),
(23, '::1', 'mawar@gmail.com', 4, '2023-08-28 22:47:44', 1),
(24, '::1', 'mawar@gmail.com', 4, '2023-08-29 01:48:45', 1),
(25, '::1', 'vetopet@gmail.com', 2, '2023-08-29 01:48:57', 1),
(26, '::1', 'mawar@gmail.com', 4, '2023-08-29 01:50:44', 1),
(27, '::1', 'vetopet@gmail.com', 2, '2023-08-29 03:27:38', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode`, `gejala`) VALUES
(1, 'G01', 'Bersin'),
(2, 'G02', 'Pilek'),
(3, 'G03', 'Batuk'),
(5, 'G04', 'Mata Berair'),
(6, 'G05', 'Demam'),
(7, 'G06', 'Feses Encer'),
(8, 'G07', 'Muntah - Muntah'),
(9, 'G08', 'Lemas'),
(10, 'G09', 'Kehilangan Nafsu Makan'),
(11, 'G10', 'Gatal - Gatal'),
(12, 'G11', 'Iritasi Kulit'),
(14, 'G12', 'Bulu Rontok'),
(15, 'G13', 'Penurunan Berat Badan'),
(16, 'G14', 'Perubahan Perilaku'),
(17, 'G15', 'Mulut Berbusa'),
(18, 'G16', 'Kejang'),
(19, 'G17', 'Air Mata Berlebihan'),
(20, 'G18', 'Gatal - Gatal Pada Mata'),
(21, 'G19', 'Kemerahan Pada Mata'),
(22, 'G20', 'Bercak Pada Kornea'),
(23, 'G21', 'Keropeng (Koreng)'),
(24, 'G22', 'Lesi (benjolan, bercak, luka)'),
(25, 'G23', 'Buang Air Kecil Berlebihan'),
(26, 'G24', 'Haus Yang Berlebihan'),
(27, 'G25', 'Kelelahan'),
(28, 'G26', 'Sesak Napas'),
(29, 'G27', 'Sering Buang Air Kecil'),
(30, 'G28', 'Benjolan Tumor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosis`
--

CREATE TABLE `hasil_diagnosis` (
  `id_diagnosis` varchar(50) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `nama_kucing` varchar(100) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_diagnosis`
--

INSERT INTO `hasil_diagnosis` (`id_diagnosis`, `nama_pemilik`, `nama_kucing`, `penyakit`, `created_at`, `updated_at`) VALUES
('DG000001', 'Panjul', 'Kiko', 'Infeksi Saluran Pernapasan Atas (ISPA)', '2023-08-27 11:02:22', '2023-08-27 11:02:22'),
('DG000002', 'Jono', 'Juha', 'Infeksi Saluran Pernapasan Atas (ISPA), Penyakit jantung', '2023-08-27 11:31:33', '2023-08-27 11:31:33'),
('DG000003', 'Tono', 'Vios', 'Penyakit mata', '2023-08-28 03:32:33', '2023-08-28 03:32:33'),
('DG000004', 'Syamsul', 'Hour', 'Infeksi Saluran Pernapasan Atas (ISPA), Penyakit jantung', '2023-08-28 05:11:06', '2023-08-28 05:11:06'),
('DG000005', 'Juan', 'Gio', 'Rabies', '2023-08-28 05:27:23', '2023-08-28 05:27:23'),
('DG000006', 'Vino', 'Vion', 'Penyakit kulit, Kutu', '2023-08-28 07:35:27', '2023-08-28 07:35:27'),
('DG000007', 'Vonzy', 'law', 'Infeksi Saluran Pernapasan Atas (ISPA)', '2023-08-29 00:49:39', '2023-08-29 00:49:39'),
('DG000008', 'Wahyu', 'Born', 'Penyakit Ginjal Kronis (CKD), Diabetes Mellitus', '2023-08-29 02:00:00', '2023-08-29 02:00:00'),
('DG000009', 'Sony', 'Slovy', 'Penyakit Ginjal Kronis (CKD), Diabetes Mellitus', '2023-08-29 03:28:49', '2023-08-29 03:28:49'),
('DG000010', 'Ronal', 'Vansy', 'Diare, Cacingan', '2023-08-29 03:37:59', '2023-08-29 03:37:59'),
('DG000011', 'Zaenab', 'Cipli', 'Penyakit mata', '2023-08-29 03:48:47', '2023-08-29 03:48:47'),
('DG000012', 'Saeful', 'Pras', 'Penyakit mata', '2023-08-29 03:49:50', '2023-08-29 03:49:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1693219582, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id` int(11) NOT NULL,
  `gejala` varchar(255) DEFAULT NULL,
  `penyakit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`id`, `gejala`, `penyakit`) VALUES
(1, 'Bersin', 'Infeksi Saluran Pernapasan Atas (ISPA)'),
(2, 'Pilek', 'Infeksi Saluran Pernapasan Atas (ISPA)'),
(3, 'Batuk', 'Infeksi Saluran Pernapasan Atas (ISPA)'),
(4, 'Mata berair', 'Infeksi Saluran Pernapasan Atas (ISPA)'),
(5, 'Demam', 'Infeksi Saluran Pernapasan Atas (ISPA)'),
(6, 'Feses Encer', 'Diare'),
(7, 'Muntah - Muntah', 'Diare'),
(8, 'Lemas', 'Diare'),
(9, 'Kehilangan Nafsu Makan', 'Diare'),
(10, 'Gatal-gatal', 'Kutu'),
(11, 'Iritasi Kulit', 'Kutu'),
(12, 'Rambut Rontok', 'Kutu'),
(13, 'Feses Encer', 'Cacingan'),
(14, 'Muntah', 'Cacingan'),
(15, 'Penurunan Berat Badan', 'Cacingan'),
(16, 'Perubahan perilaku', 'Rabies'),
(17, 'Mulut berbusa', 'Rabies'),
(18, 'Kejang', 'Rabies'),
(19, 'Air mata berlebihan', 'Penyakit mata'),
(20, 'Gatal-gatal', 'Penyakit mata'),
(21, 'Kemerahan', 'Penyakit mata'),
(22, 'Bercak pada kornea', 'Penyakit mata'),
(23, 'Keropeng (Koreng)', 'Penyakit kulit'),
(24, 'Lesi (benjolan, bercak, luka)', 'Penyakit kulit'),
(25, 'Gatal - Gatal', 'Penyakit kulit'),
(26, 'Iritasi Kulit', 'Penyakit kulit'),
(27, 'Buang Air Berlebihan', 'Penyakit Ginjal Kronis (CKD)'),
(28, 'Haus Yang Berlebihan', 'Penyakit Ginjal Kronis (CKD)'),
(29, 'Penurunan Berat Badan', 'Penyakit Ginjal Kronis (CKD)'),
(30, 'Kelelahan', 'Penyakit jantung'),
(31, 'Sesak Nafas', 'Penyakit Jantung'),
(32, 'Batuk', 'Penyakit jantung'),
(33, 'Buang Air Lebih Sering', 'Diabetes Mellitus'),
(34, 'Haus Yang Berlebihan', 'Diabetes Mellitus'),
(35, 'Penurunan Berat Badan', 'Diabetes Mellitus'),
(36, 'Benjolan Tumor', 'Tumor'),
(37, 'Lemas', 'Cacingan'),
(38, 'Kehilangan Nafsu Makan', 'Cacingan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `penyebab` longtext NOT NULL,
  `solusi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode`, `penyakit`, `penyebab`, `solusi`) VALUES
(1, 'P01', 'Infeksi Saluran Pernapasan Atas (ISPA)', 'Virus dan Bakteri', 'Obat anti-virus, Obat anti-bakteri, Obat batuk, dan Obat demam'),
(3, 'P02', 'Diare', 'Infeksi bakteri, Infeksi virus, Parasit, dan Makanan yang tidak cocok', 'Obat anti-bakteri, Obat anti-virus, Obat anti-parasit, dan Obat diare'),
(4, 'P03', 'Kutu', 'Kutu', 'Obat Kutu'),
(5, 'P04', 'Cacingan', 'Cacing', 'Obat Cacing'),
(6, 'P05', 'Rabies', 'Virus Rabies', 'Vaksin Rabies'),
(7, 'P06', 'Penyakit Mata', 'Infeksi, Iritasi, dan Trauma', 'Obat tetes mata, Obat antibiotik, dan Obat anti-inflamasi'),
(8, 'P07', 'Penyakit Kulit', 'Infeksi, Alergi, dan Parasit', 'Obat anti-jamur, Obat anti-bakteri, Obat anti-alergi, dan Obat anti-parasit'),
(9, 'P08', 'Penyakit Ginjal Kronis (CKD)', 'Dapat terjadi pada kucing segala usia, tetapi lebih sering terjadi pada kucing yang lebih tua', 'tidak dapat disembuhkan, tetapi dapat diobati dengan obat-obatan dan perubahan pola makan'),
(10, 'P09', 'Penyakit Jantung', 'Kondisi yang melemahkan jantung dan membuatnya sulit memompa darah. Penyakit jantung dapat terjadi pada kucing segala usia, tetapi lebih sering terjadi pada kucing yang lebih tua', 'Penyakit jantung dapat diobati dengan obat-obatan dan perubahan pola makan'),
(11, 'P10', 'Diabetes Mellitus', 'Penyakit yang menyebabkan tubuh tidak dapat menggunakan insulin dengan benar. Insulin adalah hormon yang membantu tubuh menggunakan gula. Diabetes mellitus dapat terjadi pada kucing segala usia, tetapi lebih sering terjadi pada kucing yang lebih tua', 'Diabetes mellitus dapat diobati dengan insulin'),
(12, 'P11', 'Tumor', 'Tumor adalah pertumbuhan abnormal pada sel. Tumor dapat terjadi pada kucing segala usia, tetapi lebih sering terjadi pada kucing yang lebih tua', 'Tumor dapat diobati dengan operasi, kemoterapi, atau radiasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$MzRfK/rH9iJ9cCOAnQasg.FKtLPjiLLJ.76D2gKoVmU.jvwGdW5/e', NULL, NULL, NULL, '7d7c93543eef9f5d5ab298970a757365', NULL, NULL, 0, 0, '2023-08-28 11:03:21', '2023-08-28 11:03:21', NULL),
(2, 'vetopet@gmail.com', 'admin123', '$2y$10$3wi9jwehjnYPdbNjnOZCoem9BrAJQOtxyMtxcsvsGVOe3lu6xStnm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-08-28 11:10:31', '2023-08-28 11:10:31', NULL),
(3, 'kurniawan@gmail.com', 'kurniawan', '$2y$10$SwcEQYxYGJGapo/a03f2NuxOHRNatXkpgEGh71o4YftBXym5AGHQC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-08-28 15:22:03', '2023-08-28 15:22:03', NULL),
(4, 'mawar@gmail.com', 'mawar', '$2y$10$p0N3ICDDOxnHvYuUa8kd3eIyu125fFNzNcLWRg1ttQqyK3jYHKFHG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-08-28 15:26:31', '2023-08-28 15:26:31', NULL),
(5, 'joyboy@gmail.com', 'joyboy', '$2y$10$FNIN6TiLG/xqGFN42kIAQ.yC/8hRj4yyjg20d2d637UtMoNFZfJBi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-08-28 15:29:12', '2023-08-28 15:29:12', NULL),
(6, 'kiansantang@gmail.com', 'kiansantang', '$2y$10$Lk09t.B6P5/U6PQv5z8/Xuq8tPL9WQdOWU8CWm5qoXUQxxfcW01pi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-08-28 15:31:09', '2023-08-28 15:31:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
