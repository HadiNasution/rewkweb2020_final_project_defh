-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2021 pada 19.58
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekweb_final_project_defh`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'users', 'Regular User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 00:10:31', 1),
(2, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 00:45:15', 1),
(3, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 01:12:04', 1),
(4, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 01:12:39', 1),
(5, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 01:12:48', 1),
(6, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 01:14:28', 1),
(7, '::1', 'hadinasution2656@gmail.com', 2, '2020-12-27 02:10:47', 1),
(8, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 02:18:00', 1),
(9, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 02:20:44', 1),
(10, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 02:22:12', 1),
(11, '::1', 'hadinasution2656@gmail.com', 2, '2020-12-27 02:25:15', 1),
(12, '::1', 'hadinasution2656@gmail.com', 2, '2020-12-27 02:28:21', 1),
(13, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 02:29:22', 1),
(14, '::1', 'hadinasution2656@gmail.com', 2, '2020-12-27 05:50:57', 1),
(15, '::1', 'hadinasution26@gmail.com', 1, '2020-12-27 06:36:47', 1),
(16, '::1', 'hadinasution2656@gmail.com', 2, '2020-12-27 08:58:36', 1),
(17, '::1', 'hadinasution2656@gmail.com', 2, '2021-01-01 22:38:52', 1),
(18, '::1', 'hadinasution26@gmail.com', 1, '2021-01-01 22:39:09', 1),
(19, '::1', 'hadinasution26@gmail.com', 1, '2021-01-02 23:34:05', 1),
(20, '::1', 'hadinasution26@gmail.com', 1, '2021-01-03 09:25:55', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-product', 'Manage all product'),
(2, 'buy-product', 'buy all product');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(8) NOT NULL,
  `foto` varchar(64) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `category` varchar(64) NOT NULL,
  `harga` int(255) NOT NULL,
  `size` varchar(4) NOT NULL,
  `warna` varchar(32) NOT NULL,
  `jumlah` int(32) NOT NULL,
  `harga_asli` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `foto`, `slug`, `nama`, `category`, `harga`, `size`, `warna`, `jumlah`, `harga_asli`) VALUES
(19, 'c5.jpg', 'hoodie-yellow-butter', 'Hoodie yellow butter', 'clothes', 86, 'M', 'Primsoe Yellow', 1, 86),
(20, 'p2.jpg', 'dimgray-pants', 'Dimgray Pants', 'pants', 170, 'L', 'Black', 2, 85),
(21, 'b5_1.jpg', 'tas-kulit-buaya-darat', 'Tas Kulit Buaya Darat', 'bags', 235, 'L', 'Black', 1, 235);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1609044520, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `foto` varchar(32) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(64) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `foto`, `nama`, `slug`, `category`, `harga`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'c5.jpg', 'Hoodie yellow butter', 'hoodie-yellow-butter', 'clothes', 86, 'Hoodie dengan material import, memiliki 1 kantong di bagian depan dengan tudung kepala.                                                                                                ', NULL, '2020-12-20 10:57:11'),
(2, 'c4.jpg', 'Hoodie Jiper Dark Blue', 'hoodie-jiper-dark-blue', 'clothes', 55, 'Hoodie dengan material import, memiliki resleting dan 4 kantung dibagian depan.                                                                ', NULL, '2020-12-20 10:57:28'),
(6, 'c3.jpg', 'T-shirt White with arm', 't-shirt-white-with-arm', 'clothes', 65, 'Kaos dengan material sejuk dilengkapi dengan sarung lengan berwarna hitam, membuat anda semakin fashionable.                                                        ', '2020-12-20 10:14:39', '2020-12-22 11:41:58'),
(7, 'c2.jpg', 'Sunshine Long T-Shirt', 'sunshine-long-t-shirt', 'clothes', 80, 'Kaos lengan panjang dengan material sejuk dan tebal, sangat nyaman untuk dipakai.                   ', '2020-12-20 10:20:31', '2020-12-20 10:20:31'),
(8, 'c1.jpg', 'Cyan Long T-shirt', 'cyan-long-t-shirt', 'clothes', 88, ' Kaos lengan panjang dengan material import yang sejuk dan nyaman digunakan, memiliki 2 kantung di bagian kanan dan kiri.                                                                                      ', '2020-12-20 11:04:45', '2020-12-20 11:09:26'),
(10, 'p1.jpg', 'Womans Pinky Pants', 'womans-pinky-pants', 'pants', 45, 'Celana dengan bahan tebal dan sejum memiliki 2 kantung di bagian kanan dan kiri, cocok untuk di gunakan sebagai piyama atau setelan olah raga.                  ', '2020-12-20 11:15:40', '2020-12-20 11:15:40'),
(13, 'p2.jpg', 'Dimgray Pants', 'dimgray-pants', 'pants', 85, 'Celana dengan bahan yang sejuk dan tidak berbulu memiliki 2 kantung dibagian depan, cocok digunakan untuk tidur dan ber olahraga.                                                                                        ', '2020-12-21 22:27:03', '2020-12-21 22:27:26'),
(17, 'p5.jpg', 'Denim Roek roek', 'denim-roek-roek', 'pants', 85, 'Celana berbahan denim kualitas premium dengan motif cakaran ayam memiliki 2 saku di bagian depan dan 2 saku di bagian belakang.                                                                                                                        ', '2020-12-21 23:57:07', '2020-12-22 00:27:01'),
(18, 's1.jpg', 'Fancy Vans', 'fancy-vans', 'shoes', 120, 'Sepatu dengan model klasik dan simpel, terbuat dari bahan kain tebal dengan brand Vans.                                                                                                                                                                        ', '2020-12-22 05:40:18', '2020-12-22 07:05:44'),
(20, 's5.jpg', 'Black Converse', 'black-converse', 'shoes', 150, 'Sepatu Converse dengan warna hitam pekat membuat look anda lebih elegan dan kalem.                                                                                                                                                                             ', '2020-12-22 07:07:22', '2020-12-22 07:23:59'),
(22, 'p3_1.jpg', 'Digory Blue Oversize', 'digory-blue-oversize', 'pants', 55, 'celana oversize dengan bahan yang sejuk dan lembut, memiliki 2 kantung dibagian depan.                        ', '2020-12-22 11:18:58', '2020-12-22 11:18:58'),
(23, 'p4_1.jpg', 'Semi Upper Pants', 'semi-upper-pants', 'pants', 95, 'Celana dengan model menyerupai baju, berbahan sejuk dan kuat, tidak memiliki kantung.                        ', '2020-12-22 11:19:55', '2020-12-22 11:19:55'),
(24, 's2_1.jpg', 'Nike Dimblue Sporty', 'nike-dimblue-sporty', 'shoes', 135, 'Sepatu Olahraga Nike dengan material import sangat cocok untuk olahraga lari.                        ', '2020-12-22 11:21:43', '2020-12-22 11:21:43'),
(25, 's3_2.jpg', 'Bloody White Sneakers', 'bloody-white-sneakers', 'shoes', 245, 'Sneakers dengan material import cocok digunakan untuk kuliah atau acara formal.                        ', '2020-12-22 11:23:15', '2020-12-22 11:23:15'),
(26, 's4_1.jpg', 'Airwalk C2', 'airwalk-c2', 'shoes', 250, ' Sepatu dari Airwalk yang memiliki material kuat cocok digunakan untuk acara formal/kuliah.                       ', '2020-12-22 11:24:26', '2020-12-22 11:24:26'),
(27, 'b1_1.jpg', 'Wallet Bag Green Tea', 'wallet-bag-green-tea', 'bags', 95, 'Tas ber ukuran mini dengan material import untuk menyimpan dompet, smarthphone dan barang kecil lainya.                        ', '2020-12-22 11:27:01', '2020-12-22 11:27:01'),
(28, 'b2_1.jpg', 'Straw Bag', 'straw-bag', 'bags', 85, 'Tas ber ukuran sedang dengan material kain mikrofiber untuk menyimpan dompet, smarthphone dan barang berukuran sedang lainya.                                                ', '2020-12-22 11:28:31', '2020-12-22 11:28:31'),
(29, 'b3_1.jpg', 'Tas Kulit Bayawak', 'tas-kulit-bayawak', 'bags', 999, 'Tas ber ukuran mini dengan material kulit bayawak sangat cocok untuk acara formal.                                                                                ', '2020-12-22 11:29:29', '2020-12-26 22:39:23'),
(30, 'b4_1.jpg', 'Casual Sunshine Bag', 'casual-sunshine-bag', 'bags', 65, 'Tas ber ukuran sedang dengan material import sangat cocok untuk menemani acara informal anda.                                           ', '2020-12-22 11:31:58', '2020-12-22 11:31:58'),
(31, 'b5_1.jpg', 'Tas Kulit Buaya Darat', 'tas-kulit-buaya-darat', 'bags', 235, 'Tas dengan bahan kulit buaya darat, cocok untuk acara formal dan informal.                                                ', '2020-12-22 11:33:18', '2020-12-22 11:33:18'),
(32, 'c6.jpg', 'Bluetone Swater Woman', 'bluetone-swater-woman', 'clothes', 75, 'Sweater dengan bahan tebal dan hangat, meterial import dan mudah untuk di cuci. Tidak memiliki kantung.                                                                                        ', '2021-01-03 09:30:08', '2021-01-03 09:42:22');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hadinasution26@gmail.com', 'hadinasution', '$2y$10$ez364N.Ma1y3dwCUQhTx9urqa91dj/U1Li2LXtQUnJeu/agJLXnNW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-27 00:10:23', '2020-12-27 00:10:23', NULL),
(2, 'hadinasution2656@gmail.com', 'user1', '$2y$10$3VW1eL9QkSvk6.G3rp5oKuj4Sf9le8GhelmGgBo64rpSjXgtkZWES', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-27 02:10:35', '2020-12-27 02:10:35', NULL);

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
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
