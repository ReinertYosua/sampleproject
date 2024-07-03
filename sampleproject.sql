-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2024 pada 06.37
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
-- Database: `sampleproject`
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

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@lms.com|127.0.0.1', 'i:1;', 1718609214),
('admin@lms.com|127.0.0.1:timer', 'i:1718609214;', 1718609214),
('andi@gmail.com|127.0.0.1', 'i:2;', 1719749664),
('andi@gmail.com|127.0.0.1:timer', 'i:1719749664;', 1719749664);

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
-- Struktur dari tabel `detail_hasil_pemeriksaan`
--

CREATE TABLE `detail_hasil_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idHasilPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `idJenisPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `laporan` longtext NOT NULL,
  `jamMulaiAlat` time NOT NULL,
  `jamSelesaiAlat` time NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_hasil_pemeriksaan`
--

INSERT INTO `detail_hasil_pemeriksaan` (`id`, `idHasilPemeriksaan`, `idJenisPemeriksaan`, `laporan`, `jamMulaiAlat`, `jamSelesaiAlat`, `ruangan`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '', '00:00:00', '00:00:00', '', '2024-06-23 11:09:20', '2024-06-23 11:09:20'),
(2, 1, 4, '', '00:00:00', '00:00:00', '', '2024-06-23 11:09:20', '2024-06-23 11:09:20'),
(3, 1, 5, '', '00:00:00', '00:00:00', '', '2024-06-23 11:09:20', '2024-06-23 11:09:20'),
(4, 2, 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', '00:00:00', '00:00:00', '', '2024-06-23 11:14:38', '2024-06-23 11:14:38'),
(5, 2, 5, '', '00:00:00', '00:00:00', '', '2024-06-23 11:14:38', '2024-06-23 11:14:38'),
(6, 3, 5, '', '00:00:00', '00:00:00', '', '2024-06-25 01:07:44', '2024-06-25 01:07:44'),
(7, 3, 1, '', '00:00:00', '00:00:00', '', '2024-06-25 01:07:44', '2024-06-25 01:07:44'),
(8, 4, 3, '', '00:00:00', '00:00:00', '', '2024-06-25 04:50:34', '2024-06-25 04:50:34'),
(9, 4, 4, '', '00:00:00', '00:00:00', '', '2024-06-25 04:50:34', '2024-06-25 04:50:34'),
(10, 4, 5, '', '00:00:00', '00:00:00', '', '2024-06-25 04:50:34', '2024-06-25 04:50:34'),
(11, 5, 1, 'oke 2', '00:00:00', '00:00:00', '', '2024-06-27 04:32:31', '2024-06-30 04:18:31'),
(12, 5, 2, 'oke 3', '00:00:00', '00:00:00', '', '2024-06-27 04:32:31', '2024-06-30 04:18:31'),
(13, 6, 1, 'oke banget 2', '19:26:00', '20:26:00', 'R001', '2024-06-30 03:01:17', '2024-06-30 04:18:55'),
(14, 6, 2, 'oke juga 2', '21:26:00', '22:27:00', '23456', '2024-06-30 03:01:17', '2024-06-30 04:18:55'),
(15, 8, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '07:00:00', '08:00:00', '34523', '2024-06-30 05:17:24', '2024-06-30 05:29:15'),
(16, 8, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '11:00:00', '12:00:00', '23456', '2024-06-30 05:17:24', '2024-06-30 05:29:15'),
(17, 8, 5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '09:00:00', '10:00:00', '23456', '2024-06-30 05:17:24', '2024-06-30 05:29:15'),
(18, 8, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '08:00:00', '10:00:00', 'R001', '2024-06-30 05:17:24', '2024-06-30 05:29:15'),
(19, 9, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '20:22:00', '21:22:00', '23456', '2024-06-30 07:40:04', '2024-06-30 08:13:55'),
(20, 9, 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '10:32:00', '11:32:00', 'R001', '2024-06-30 07:40:04', '2024-06-30 08:13:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pendaftaran_pemeriksaan`
--

CREATE TABLE `detail_pendaftaran_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idDaftarPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `idJenisPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `jamMulai` time NOT NULL,
  `jamSelesai` time NOT NULL,
  `statusKetersediaan` enum('ya','tidak') NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pendaftaran_pemeriksaan`
--

INSERT INTO `detail_pendaftaran_pemeriksaan` (`id`, `idDaftarPemeriksaan`, `idJenisPemeriksaan`, `jamMulai`, `jamSelesai`, `statusKetersediaan`, `keterangan`, `created_at`, `updated_at`) VALUES
(21, 17, 5, '11:38:00', '12:38:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(22, 17, 4, '01:38:00', '02:38:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(23, 17, 1, '02:38:00', '03:38:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(24, 17, 2, '03:38:00', '04:38:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(25, 17, 3, '04:40:00', '05:40:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(26, 18, 3, '08:00:00', '09:00:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(27, 18, 5, '09:00:00', '10:00:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(28, 18, 1, '10:00:00', '11:00:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(29, 18, 2, '11:00:00', '12:00:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(81, 20, 3, '09:00:00', '22:00:00', 'ya', 'Lanjut ke pemeriksaan', '2024-06-23 09:30:02', '2024-06-23 09:30:02'),
(82, 20, 5, '22:30:00', '23:30:00', 'ya', 'Lanjut ke pemeriksaan', '2024-06-23 09:30:02', '2024-06-23 09:30:02'),
(83, 14, 3, '19:38:00', '20:38:00', 'ya', 'ok', '2024-06-23 09:54:58', '2024-06-23 09:54:58'),
(84, 14, 4, '20:38:00', '21:38:00', 'ya', 'ok', '2024-06-23 09:54:58', '2024-06-23 09:54:58'),
(85, 14, 5, '12:38:00', '23:38:00', 'ya', 'ok', '2024-06-23 09:54:58', '2024-06-23 09:54:58'),
(86, 16, 1, '08:00:00', '10:00:00', 'ya', 'Dapat Dilanjutkan', '2024-06-23 09:56:18', '2024-06-23 09:56:18'),
(87, 16, 2, '11:00:00', '12:00:00', 'ya', 'Dapat Dilanjutkan', '2024-06-23 09:56:18', '2024-06-23 09:56:18'),
(88, 16, 4, '07:00:00', '08:00:00', 'ya', 'Dapat Dilanjutkan', '2024-06-23 09:56:18', '2024-06-23 09:56:18'),
(89, 16, 5, '09:00:00', '10:00:00', 'ya', 'Dapat Dilanjutkan', '2024-06-23 09:56:18', '2024-06-23 09:56:18'),
(96, 22, 2, '10:10:00', '11:10:00', 'tidak', 'Menunggu Approval', '2024-06-25 00:14:29', '2024-06-25 00:14:29'),
(97, 22, 3, '07:10:00', '08:10:00', 'tidak', 'Menunggu Approval', '2024-06-25 00:14:29', '2024-06-25 00:14:29'),
(98, 22, 4, '08:10:00', '09:10:00', 'tidak', 'Menunggu Approval', '2024-06-25 00:14:29', '2024-06-25 00:14:29'),
(99, 22, 5, '09:10:00', '10:10:00', 'tidak', 'Menunggu Approval', '2024-06-25 00:14:29', '2024-06-25 00:14:29'),
(100, 11, 5, '16:40:00', '17:40:00', 'ya', 'Oke', '2024-06-25 00:58:25', '2024-06-25 00:58:25'),
(101, 11, 1, '17:40:00', '18:40:00', 'ya', 'Oke', '2024-06-25 00:58:25', '2024-06-25 00:58:25'),
(102, 13, 1, '19:26:00', '20:26:00', 'ya', 'Oke lanjut', '2024-06-25 01:02:49', '2024-06-25 01:02:49'),
(103, 13, 2, '21:26:00', '22:27:00', 'ya', 'Oke Lanjut', '2024-06-25 01:02:49', '2024-06-25 01:02:49'),
(104, 23, 3, '08:48:00', '09:48:00', 'tidak', 'Menunggu Approval', '2024-06-25 03:48:53', '2024-06-25 03:48:53'),
(105, 23, 5, '10:00:00', '11:00:00', 'tidak', 'Menunggu Approval', '2024-06-25 03:48:53', '2024-06-25 03:48:53'),
(109, 24, 3, '07:00:00', '08:00:00', 'ya', 'Menunggu Approval', '2024-06-25 04:30:36', '2024-06-25 04:30:36'),
(110, 24, 4, '09:00:00', '10:00:00', 'ya', 'Menunggu Approval', '2024-06-25 04:30:36', '2024-06-25 04:30:36'),
(111, 24, 5, '08:00:00', '09:00:00', 'ya', 'Menunggu Approval', '2024-06-25 04:30:36', '2024-06-25 04:30:36'),
(112, 12, 1, '18:19:00', '19:19:00', 'ya', 'oke', '2024-06-25 05:00:10', '2024-06-25 05:00:10'),
(113, 12, 2, '14:19:00', '16:19:00', 'ya', 'oke', '2024-06-25 05:00:10', '2024-06-25 05:00:10'),
(121, 10, 1, '14:32:00', '16:32:00', 'ya', 'ok', '2024-06-25 11:00:43', '2024-06-25 11:00:43'),
(122, 10, 2, '17:32:00', '18:32:00', 'ya', 'Belum', '2024-06-25 11:00:43', '2024-06-25 11:00:43'),
(123, 10, 4, '04:54:00', '05:54:00', 'ya', 'oke', '2024-06-25 11:00:43', '2024-06-25 11:00:43'),
(124, 10, 5, '02:54:00', '03:54:00', 'ya', 'oke', '2024-06-25 11:00:43', '2024-06-25 11:00:43'),
(143, 15, 1, '07:23:00', '08:23:00', 'ya', 'Oke', '2024-06-25 12:24:07', '2024-06-25 12:24:07'),
(144, 15, 2, '04:17:00', '05:17:00', 'ya', 'Oke', '2024-06-25 12:24:07', '2024-06-25 12:24:07'),
(145, 15, 3, '07:17:00', '08:17:00', 'ya', 'Oke', '2024-06-25 12:24:07', '2024-06-25 12:24:07'),
(146, 15, 4, '10:21:00', '12:21:00', 'ya', 'Oke', '2024-06-25 12:24:07', '2024-06-25 12:24:07'),
(147, 15, 5, '08:26:00', '10:26:00', 'ya', 'Oke', '2024-06-25 12:24:07', '2024-06-25 12:24:07'),
(155, 26, 3, '07:09:00', '08:09:00', 'ya', 'Oke', '2024-06-26 09:29:34', '2024-06-26 09:29:34'),
(156, 26, 4, '08:09:00', '09:09:00', 'tidak', 'Menunggu Approval', '2024-06-26 09:29:34', '2024-06-26 09:29:34'),
(160, 19, 2, '20:22:00', '21:22:00', 'ya', 'Oke', '2024-06-26 09:33:55', '2024-06-26 09:33:55'),
(161, 19, 1, '10:32:00', '11:32:00', 'ya', 'oke', '2024-06-26 09:33:55', '2024-06-26 09:33:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi_pemeriksaan`
--

CREATE TABLE `detail_transaksi_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idTransaksiPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `performedInstanceUID` varchar(255) DEFAULT NULL,
  `idJenisPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `jamMulaiAlat` time NOT NULL,
  `jamSelesaiAlat` time NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `keteranganRadiografer` text NOT NULL,
  `harga` double NOT NULL,
  `diskon` int(11) NOT NULL,
  `hargaTotal` double NOT NULL,
  `status` enum('1','2','3','4','5','6') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksi_pemeriksaan`
--

INSERT INTO `detail_transaksi_pemeriksaan` (`id`, `idTransaksiPemeriksaan`, `performedInstanceUID`, `idJenisPemeriksaan`, `jamMulaiAlat`, `jamSelesaiAlat`, `ruangan`, `keteranganRadiografer`, `harga`, `diskon`, `hargaTotal`, `status`, `created_at`, `updated_at`) VALUES
(40, 4, NULL, 3, '19:38:00', '20:38:00', '123', 'siap!', 123500, 0, 123500, '5', '2024-06-23 11:09:20', '2024-06-23 11:09:20'),
(41, 4, NULL, 4, '20:38:00', '21:38:00', '234', 'siap!', 250000, 0, 250000, '5', '2024-06-23 11:09:20', '2024-06-23 11:09:20'),
(42, 4, NULL, 5, '12:38:00', '23:38:00', '345', 'Sesiap!dang Periksa', 500000, 0, 500000, '5', '2024-06-23 11:09:20', '2024-06-23 11:09:20'),
(43, 3, NULL, 3, '09:00:00', '22:00:00', '123', 'Hasil siap', 100000, 23, 95000, '5', '2024-06-23 11:14:38', '2024-06-23 11:14:38'),
(44, 3, NULL, 5, '22:30:00', '23:30:00', '234', 'Hasil siap', 100000, 30, 90000, '5', '2024-06-23 11:14:38', '2024-06-23 11:14:38'),
(57, 8, NULL, 3, '07:00:00', '08:00:00', '123', '1', 123500, 0, 123500, '5', '2024-06-25 04:50:34', '2024-06-25 04:50:34'),
(58, 8, NULL, 4, '09:00:00', '10:00:00', '234', '1', 250000, 0, 250000, '5', '2024-06-25 04:50:34', '2024-06-25 04:50:34'),
(59, 8, NULL, 5, '08:00:00', '09:00:00', '345', '1', 500000, 0, 500000, '5', '2024-06-25 04:50:34', '2024-06-25 04:50:34'),
(93, 9, NULL, 1, '18:19:00', '19:19:00', 'R001', '-', 12345690, 0, 12345690, '5', '2024-06-27 04:32:31', '2024-06-27 04:32:31'),
(94, 9, NULL, 2, '14:19:00', '16:19:00', '23456', '-', 23000099, 0, 23000099, '5', '2024-06-27 04:32:31', '2024-06-27 04:32:31'),
(99, 10, NULL, 4, '04:54:00', '05:54:00', '34523', '-', 250000, 0, 250000, '1', '2024-06-27 10:04:39', '2024-06-27 10:04:39'),
(100, 10, NULL, 2, '17:32:00', '18:32:00', '23456', '-', 23000099, 0, 23000099, '3', '2024-06-27 10:04:39', '2024-06-27 10:04:39'),
(101, 10, NULL, 5, '02:54:00', '03:54:00', '23456', '-', 500000, 0, 500000, '3', '2024-06-27 10:04:39', '2024-06-27 10:04:39'),
(102, 10, NULL, 1, '14:32:00', '16:32:00', 'R001', '-', 12345690, 0, 12345690, '3', '2024-06-27 10:04:39', '2024-06-27 10:04:39'),
(103, 11, NULL, 3, '07:17:00', '08:17:00', '34523', '-', 123500, 0, 123500, '3', '2024-06-27 11:13:19', '2024-06-27 11:13:19'),
(104, 11, NULL, 4, '10:21:00', '12:21:00', '34523', '-', 250000, 0, 250000, '4', '2024-06-27 11:13:19', '2024-06-27 11:13:19'),
(105, 11, NULL, 2, '04:17:00', '05:17:00', '23456', '-', 23000099, 0, 23000099, '4', '2024-06-27 11:13:19', '2024-06-27 11:13:19'),
(106, 11, NULL, 5, '08:26:00', '10:26:00', '23456', '-', 500000, 0, 500000, '4', '2024-06-27 11:13:19', '2024-06-27 11:13:19'),
(107, 11, NULL, 1, '07:23:00', '08:23:00', 'R001', '-', 12345690, 0, 12345690, '4', '2024-06-27 11:13:19', '2024-06-27 11:13:19'),
(112, 7, NULL, 1, '19:26:00', '20:26:00', 'R001', 'oke', 12345690, 0, 12345690, '4', '2024-06-30 03:01:17', '2024-06-30 03:01:17'),
(113, 7, NULL, 2, '21:26:00', '22:27:00', '23456', 'oke', 23000099, 0, 23000099, '4', '2024-06-30 03:01:17', '2024-06-30 03:01:17'),
(118, 6, NULL, 5, '16:40:00', '17:40:00', '23456', 'Hasil Sudah Oke', 500000, 0, 500000, '4', '2024-06-30 04:24:27', '2024-06-30 04:24:27'),
(119, 6, NULL, 1, '17:40:00', '18:40:00', 'R001', 'Hasil Sudah Oke', 12345690, 0, 12345690, '4', '2024-06-30 04:24:27', '2024-06-30 04:24:27'),
(132, 5, NULL, 4, '07:00:00', '08:00:00', '34523', '-', 250000, 0, 250000, '5', '2024-06-30 05:17:24', '2024-06-30 05:29:15'),
(133, 5, NULL, 2, '11:00:00', '12:00:00', '23456', '-', 23000099, 0, 23000099, '5', '2024-06-30 05:17:24', '2024-06-30 05:29:15'),
(134, 5, NULL, 5, '09:00:00', '10:00:00', '23456', '-', 500000, 0, 500000, '5', '2024-06-30 05:17:24', '2024-06-30 05:29:15'),
(135, 5, NULL, 1, '08:00:00', '10:00:00', 'R001', '-', 12345690, 0, 12345690, '5', '2024-06-30 05:17:24', '2024-06-30 05:29:15'),
(136, 12, NULL, 2, '20:22:00', '21:22:00', '23456', 'ok', 23000099, 0, 23000099, '6', '2024-06-30 07:40:04', '2024-06-30 08:23:09'),
(137, 12, NULL, 1, '10:32:00', '11:32:00', 'R001', 'ok', 12345690, 0, 12345690, '6', '2024-06-30 07:40:04', '2024-06-30 08:23:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dicom`
--

CREATE TABLE `dicom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alamatIP` varchar(100) NOT NULL,
  `netMask` varchar(100) NOT NULL,
  `layananDICOM` enum('MWL','MPPS','query','send','print','store','retrieve') NOT NULL,
  `peran` enum('SCU','SCP','query','send','print','store','retrieve') NOT NULL,
  `AET` varchar(100) NOT NULL,
  `port` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dicom`
--

INSERT INTO `dicom` (`id`, `alamatIP`, `netMask`, `layananDICOM`, `peran`, `AET`, `port`, `created_at`, `updated_at`) VALUES
(1, '234.56.7.23', '255.255.255.00', 'query', 'query', '123', 230, '2024-06-17 04:40:06', '2024-06-17 04:40:06'),
(2, '234.56.7.23', '255.255.255.33', 'retrieve', 'retrieve', '12333', 2033, '2024-06-17 04:52:25', '2024-06-17 05:04:37'),
(4, '192.168.199.02', '230.230.230.22', 'MWL', 'SCU', '9999', 99, '2024-06-25 03:20:51', '2024-06-25 03:20:51'),
(5, '193.250.152.00', '255.255.255.00', 'MPPS', 'SCP', '88888', 888, '2024-06-25 03:21:10', '2024-06-25 03:21:10'),
(6, '192.168.001.00', '230.230.230.00', 'store', 'SCP', '87877', 87, '2024-06-25 03:21:32', '2024-06-25 03:21:32'),
(7, '34.56.78.9', '30.030.003.003', 'store', 'query', '6767', 67, '2024-06-25 03:21:51', '2024-06-25 03:21:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `idKTP` bigint(20) NOT NULL,
  `jenisKelamin` enum('pria','wanita') NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `noHp` varchar(255) NOT NULL,
  `noTeleponRumah` varchar(255) NOT NULL,
  `filefoto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `idUser`, `idKTP`, `jenisKelamin`, `spesialis`, `tanggalLahir`, `alamat`, `kota`, `noHp`, `noTeleponRumah`, `filefoto`, `created_at`, `updated_at`) VALUES
(1, 12, 123456789123456789, 'pria', 'Penyakit Dalam', '1987-11-08', 'Jl Kembangan Raya no3. Kelurahan Sukabumi', 'Jakarta Barat', '0878123456789', '0218873456', '1718592676.jpg', '2024-06-16 19:51:16', '2024-06-16 19:51:16'),
(2, 3, 1231421215125125, 'pria', 'Penyakit Kulit', '2024-07-01', 'jln Sukma Jaya', 'Denpasar', '08112412414', '021535235', '1719135093.PNG', '2024-06-23 02:31:33', '2024-06-23 02:31:33'),
(3, 15, 1234235235235, 'pria', 'Organ Tubuh', '1993-06-25', 'Jl Sukapanjang', 'Makassar', '0878124124124', '0218741244', '1719135169.png', '2024-06-23 02:32:49', '2024-06-23 02:32:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `draft_laporan_pemeriksaan`
--

CREATE TABLE `draft_laporan_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `idJenisPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `laporanNormal` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `draft_laporan_pemeriksaan`
--

INSERT INTO `draft_laporan_pemeriksaan` (`id`, `idKaryawan`, `idJenisPemeriksaan`, `laporanNormal`, `created_at`, `updated_at`) VALUES
(6, 2, 5, '<p>For faster mobile-friendly development, use responsive display classes for showing and hiding elements by device. Avoid creating entirely different versions of the same site, instead hide elements responsively for each screen size.</p><p>To hide elements simply use the .d-none class or one of the .d-{sm,md,lg,xl,xxl}-none classes for any responsive screen variation.</p>', '2024-06-26 11:33:44', '2024-06-26 11:33:44'),
(7, 2, 5, '<p>Display utility classes that apply to all <a href=\"https://getbootstrap.com/docs/5.2/layout/breakpoints/\">breakpoints</a>, from xs to xxl, have no breakpoint abbreviation in them. This is because those classes are applied from min-width: 0; and up, and thus are not bound by a media query. The remaining breakpoints, however, do include a breakpoint abbreviation.</p>', '2024-06-26 11:34:48', '2024-06-26 11:34:48'),
(8, 2, 2, '<p>Display utility classes that apply to all <a href=\"https://getbootstrap.com/docs/5.2/layout/breakpoints/\">breakpoints</a>, from xs to xxl, have no breakpoint abbreviation in them. This is because those classes are applied from min-width: 0; and up, and thus are not bound by a media query. The remaining breakpoints, however, do include a breakpoint abbreviation.</p>', '2024-06-26 11:35:08', '2024-06-26 11:35:08'),
(9, 2, 4, '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>', '2024-06-26 21:36:46', '2024-06-26 21:36:46');

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
-- Struktur dari tabel `hasil_pemeriksaan`
--

CREATE TABLE `hasil_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idTransaksiPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `no_transaksi_pemeriksaan` varchar(255) NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `idDokter` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_pemeriksaan`
--

INSERT INTO `hasil_pemeriksaan` (`id`, `idTransaksiPemeriksaan`, `no_transaksi_pemeriksaan`, `idKaryawan`, `idDokter`, `created_at`, `updated_at`) VALUES
(1, 4, 'TRX-20240623-IMZHBY', 2, 3, '2024-06-23 11:09:20', '2024-06-23 11:09:20'),
(2, 3, 'TRX-20240623-OSPYTI', 2, 3, '2024-06-23 11:14:38', '2024-06-23 11:14:38'),
(3, 6, 'TRX-20240625-9GHFOF', 2, 1, '2024-06-25 01:07:44', '2024-06-25 01:07:44'),
(4, 8, 'TRX-20240625-H7U6S3', 2, 1, '2024-06-25 04:50:34', '2024-06-25 04:50:34'),
(5, 9, 'TRX-20240625-IIGQXN', 2, 1, '2024-06-27 04:32:31', '2024-06-27 04:32:31'),
(6, 7, 'TRX-20240625-UEA8AG', 2, 1, '2024-06-30 03:01:17', '2024-06-30 03:01:17'),
(8, 5, 'TRX-20240623-QH4W12', 2, 2, '2024-06-30 05:17:24', '2024-06-30 05:17:24'),
(9, 12, 'TRX-20240626-LZGDOO', 2, 2, '2024-06-30 07:40:04', '2024-06-30 07:40:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pemeriksaan`
--

CREATE TABLE `jenis_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idModalitas` bigint(20) UNSIGNED NOT NULL,
  `namaJenisPemeriksaan` varchar(100) NOT NULL,
  `kelompokJenisPemeriksaan` enum('CT','MR','XP-R','XP-F','XP-WH','USG') NOT NULL,
  `pemakaianKontras` enum('ya','tidak') NOT NULL,
  `harga` double NOT NULL,
  `lamaPemeriksaan` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_pemeriksaan`
--

INSERT INTO `jenis_pemeriksaan` (`id`, `idModalitas`, `namaJenisPemeriksaan`, `kelompokJenisPemeriksaan`, `pemakaianKontras`, `harga`, `lamaPemeriksaan`, `created_at`, `updated_at`) VALUES
(1, 5, 'XXXYYY', 'XP-R', 'tidak', 12345690, 12090, '2024-06-17 06:04:26', '2024-06-17 06:32:46'),
(2, 2, 'ZZZZRR', 'USG', 'ya', 23000099, 4099, '2024-06-17 06:04:52', '2024-06-17 06:33:10'),
(3, 1, 'CTScan1', 'CT', 'ya', 123500, 120, '2024-06-21 05:34:41', '2024-06-21 05:34:41'),
(4, 1, 'CTScan2', 'CT', 'tidak', 250000, 120, '2024-06-21 05:35:02', '2024-06-21 05:35:02'),
(5, 2, 'Radiografi1', 'USG', 'ya', 500000, 60, '2024-06-21 05:35:24', '2024-06-21 05:35:24');

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
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `idKTP` bigint(20) NOT NULL,
  `jenisKelamin` enum('pria','wanita') NOT NULL,
  `tanggalLahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `noHp` varchar(255) NOT NULL,
  `noTeleponRumah` varchar(255) NOT NULL,
  `filefoto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `idUser`, `idKTP`, `jenisKelamin`, `tanggalLahir`, `alamat`, `kota`, `noHp`, `noTeleponRumah`, `filefoto`, `created_at`, `updated_at`) VALUES
(1, 13, 33333123456789, 'wanita', '1995-08-23', 'Jl Kebon Jeruk Utasa No.19, Kebon Jeruk', 'Jakarta Barat', '0898123456789', '02155467893', '1718592801.jpg', '2024-06-16 19:53:21', '2024-06-16 19:53:21'),
(2, 18, 123456789123456, 'pria', '2024-06-11', 'Kpg. Bakti No. 63', 'Administrasi Jakarta Timur', '08185766893', '021545678676', '1718599716.jpg', '2024-06-16 21:48:36', '2024-06-16 21:48:36');

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
(4, '2024_06_14_050506_create_pasien_table', 1),
(5, '2024_06_14_050520_create_dokter_table', 1),
(6, '2024_06_14_050525_create_karyawan_table', 1),
(7, '2024_06_14_091747_add_foto_to_users_table', 2),
(12, '2024_06_14_092315_alter_add_foto_user_table', 3),
(13, '2024_06_16_180428_create_modalitas_table', 3),
(14, '2024_06_16_180435_create_dicom_table', 3),
(15, '2024_06_16_180458_create_jenis_pemeriksaan_table', 3),
(16, '2024_06_19_183325_create_pendaftaran_pemeriksaan_table', 4),
(17, '2024_06_19_183337_create_detail_pendaftaran_pemeriksaan_table', 4),
(18, '2024_06_20_052449_alter_add_no_pendaftaran_pemeriksaan', 5),
(27, '2024_06_23_083239_create_transaksi_pemeriksaan_table', 6),
(28, '2024_06_23_084154_create_detail_transaksi_pemeriksaan', 6),
(29, '2024_06_23_170434_create_hasil_pemeriksaan_table', 7),
(30, '2024_06_23_170525_create_detail_hasil_pemeriksaan_table', 7),
(31, '2024_06_23_181120_create_draft_laporan_pemeriksaan_table', 8),
(33, '2024_06_30_095050_alter_detail_hasil_pemeriksaan_table', 9),
(34, '2024_07_02_125810_create_personal_access_tokens_table', 10),
(36, '2024_07_02_130316_add_performend_instance_uid_to_detail_transaksi_pemeriksaan', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modalitas`
--

CREATE TABLE `modalitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaModalitas` varchar(100) NOT NULL,
  `jenisModalitas` enum('ctscan','radiografi','fluoroskopi','angiografi','mamografi','usg','mri') NOT NULL,
  `merekModalitas` varchar(100) NOT NULL,
  `tipeModalitas` varchar(100) NOT NULL,
  `nomorSeriModalitas` varchar(100) NOT NULL,
  `alamatIP` varchar(100) NOT NULL,
  `kodeRuang` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `modalitas`
--

INSERT INTO `modalitas` (`id`, `namaModalitas`, `jenisModalitas`, `merekModalitas`, `tipeModalitas`, `nomorSeriModalitas`, `alamatIP`, `kodeRuang`, `created_at`, `updated_at`) VALUES
(1, 'CT1234', 'usg', 'Robot23', 'ct123', '12345623', '234.56.7.23', '34523', '2024-06-16 22:02:19', '2024-06-26 22:17:58'),
(2, 'Radio1', 'radiografi', 'Exe', 'Rad1', '12345', '34.56.78.9', '23456', '2024-06-16 22:05:03', '2024-06-16 22:05:03'),
(4, 'MRI1', 'mri', 'Exe', 'MRI01', '123456', '192.168.001.00', '123456', '2024-06-16 22:24:06', '2024-06-16 22:24:06'),
(5, 'Fluora', 'fluoroskopi', 'AKA', 'AKA1', '00121233', '192.168.199.02', 'R001', '2024-06-17 04:32:33', '2024-06-17 04:33:28'),
(6, 'Mamo 1', 'mamografi', 'BS01', 'BS001', 'M001', '193.250.152.00', 'R92', '2024-06-17 04:33:17', '2024-06-17 04:33:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `noIdentitas` bigint(20) NOT NULL,
  `tipeIdentitas` enum('KTP','Paspor','SIM') NOT NULL,
  `jenisKelamin` enum('pria','wanita') NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `statusPerkawinan` enum('belumkawin','kawin','ceraihidup','ceraimati') NOT NULL,
  `agama` enum('kristen','katholik','islam','hindu','budha') NOT NULL,
  `noTeleponRumah` varchar(255) NOT NULL,
  `noHp` varchar(255) NOT NULL,
  `namaKontakDarurat` varchar(255) NOT NULL,
  `noKontakDarurat` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `alergi` text NOT NULL,
  `golonganDarah` enum('A+','B+','AB+','O+','A-','B-','AB-','O-') NOT NULL,
  `tinggiBadan` int(11) NOT NULL,
  `beratBadan` int(11) NOT NULL,
  `filefoto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `idUser`, `tempatLahir`, `tanggalLahir`, `noIdentitas`, `tipeIdentitas`, `jenisKelamin`, `pekerjaan`, `alamat`, `kota`, `statusPerkawinan`, `agama`, `noTeleponRumah`, `noHp`, `namaKontakDarurat`, `noKontakDarurat`, `kewarganegaraan`, `alergi`, `golonganDarah`, `tinggiBadan`, `beratBadan`, `filefoto`, `created_at`, `updated_at`) VALUES
(1, 2, 'Jakarta', '1992-11-24', 1234567890123456, 'KTP', 'pria', 'Dosen', 'Jalan Medan Merdeka Barat 3 blok SA1.9 No 3', 'Jakarta Pusat', 'belumkawin', 'kristen', '02123456789', '08123456789', 'Yohanes', '081345678912', 'Indonesia', 'Tidak ada', 'O+', 178, 78, '1718592497.PNG', '2024-06-16 19:48:17', '2024-06-16 19:48:17'),
(2, 14, 'Medan', '2024-06-25', 3123456789123456, 'KTP', 'pria', 'Sales', 'Jl Kenangan Indah 12 Pademangan', 'Jakarta Utara', 'ceraihidup', 'katholik', '0213214525', '087812314145', 'Agus', '1241414251', 'Indonesia', 'Tidak ada', 'A-', 199, 87, '1719027629.jpg', '2024-06-21 20:40:29', '2024-06-21 20:40:29'),
(3, 17, 'Kevin Sanjaya', '2000-06-12', 12345678912345, 'KTP', 'pria', 'IT Spesialis', 'Jalan Sawah Besar 5 No.2', 'Jakarta Pusat', 'belumkawin', 'kristen', '02167873131', '087812312444', 'Ani', '081234141414', 'Indonesia', 'Gatal jika makan Seafood', 'O+', 170, 65, '1719299227.PNG', '2024-06-25 00:07:07', '2024-06-25 00:07:07'),
(4, 19, 'Jakarta', '2024-06-17', 31231414124124124, 'KTP', 'pria', 'Dosen', 'Kebon Jeruk', 'Jakarta Barat', 'kawin', 'kristen', '0214124124', '08123124124', 'Ani', '087123124', 'Indonesia', 'Gatal jika makan Seafood', 'O+', 170, 75, '1719312415.PNG', '2024-06-25 03:46:56', '2024-06-25 03:46:56'),
(5, 20, 'Jakarta', '1990-06-24', 314124124124, 'KTP', 'wanita', 'Karyawan Swastat', 'Kebon Jeruk', 'Jakarta Barat', 'belumkawin', 'islam', '021214124142', '087812412414', 'Hendro', '08712412414', 'Indonesia', 'Sulfa', 'O+', 170, 75, '1719314344.PNG', '2024-06-25 04:19:04', '2024-06-25 04:19:04');

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
-- Struktur dari tabel `pendaftaran_pemeriksaan`
--

CREATE TABLE `pendaftaran_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_pendaftaran` varchar(255) NOT NULL,
  `idPasien` bigint(20) UNSIGNED NOT NULL,
  `namaDokterPengirim` varchar(255) NOT NULL,
  `fileLampiran` varchar(255) NOT NULL,
  `tanggalDaftar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftaran_pemeriksaan`
--

INSERT INTO `pendaftaran_pemeriksaan` (`id`, `no_pendaftaran`, `idPasien`, `namaDokterPengirim`, `fileLampiran`, `tanggalDaftar`, `created_at`, `updated_at`) VALUES
(10, 'REG-20240621-YXTMCR', 1, 'Dr Rudi', '1718947967.pdf', '2024-06-27', '2024-06-20 22:32:47', '2024-06-20 22:32:47'),
(11, 'REG-20240621-8GX0ET', 1, 'Dr Bagas Kurniawan', '1719061370.pdf', '2024-06-26', '2024-06-20 23:42:57', '2024-06-23 03:10:47'),
(12, 'REG-20240621-TG1VYL', 1, 'Dr Rusniati', '1718954400.pdf', '2024-07-02', '2024-06-21 00:20:00', '2024-06-21 00:20:00'),
(13, 'REG-20240621-TEMWSY', 1, 'Dr Aniati', '1718962052.pdf', '2024-06-24', '2024-06-21 02:27:32', '2024-06-21 02:27:32'),
(14, 'REG-20240621-JQCYXQ', 1, 'Dr Rusdi', '1718973558.pdf', '2024-06-25', '2024-06-21 05:39:19', '2024-06-21 05:39:19'),
(15, 'REG-20240622-CCNYIS', 1, 'Dr Salim', '1719026827.pdf', '2024-06-30', '2024-06-21 20:27:07', '2024-06-21 20:27:07'),
(16, 'REG-20240622-28KA7I', 2, 'Dr Aniati Sudirman Latif', '1719033093.pdf', '2024-07-09', '2024-06-21 20:42:29', '2024-06-23 03:35:47'),
(17, 'REG-20240622-S5NGPG', 1, 'Dr Karni', '1719031321.pdf', '2024-06-28', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(18, 'REG-20240622-E4QRCX', 2, 'Dr Alias', '1719031480.pdf', '2024-07-01', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(19, 'REG-20240622-DVWCDL', 1, 'Dr Wijaya', '1719055365.pdf', '2024-06-23', '2024-06-22 04:22:45', '2024-06-22 04:22:45'),
(20, 'REG-20240622-BJ4CBJ', 1, 'Dr Sylvia', '1719057138.pdf', '2024-06-24', '2024-06-22 04:52:18', '2024-06-22 04:52:18'),
(22, 'REG-20240625-J4UCQX', 3, 'Dr Indriati Sukma Wijaya', '1719299669.pdf', '2024-06-29', '2024-06-25 00:12:02', '2024-06-25 00:14:29'),
(23, 'REG-20240625-EKJHF7', 4, 'Dr Sukma', '1719312533.pdf', '2024-06-26', '2024-06-25 03:48:53', '2024-06-25 03:48:53'),
(24, 'REG-20240625-JZYNUJ', 5, 'Dr Agus', '1719314619.pdf', '2024-07-03', '2024-06-25 04:23:39', '2024-06-25 04:23:39'),
(26, 'REG-20240626-R7QHEM', 1, 'Dr Kusuma Wijaya', '1719392997.pdf', '2024-06-28', '2024-06-26 02:09:57', '2024-06-26 09:29:34');

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
  `expires_at` timestamp NULL DEFAULT NULL,
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
('C1c5sZAqz50XD8198RJq5KqdPwN42zGYwu0C8WXz', 18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieXBVWWJYSXhOelM5Mk8zcTFBZHYyTlIxaVpYWXBodTVuWEZLWHpNNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9rYXJ5YXdhbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxODtzOjY6InN0YXR1cyI7czozOiJ5ZXMiO30=', 1719828173),
('Ubps2Bnhfwix2aLLSv20Odtwlb4E7Cw6u0Ewz743', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXJKeWN4YzFGejRyazVMcnBXd0NmalZuODhodG5Qc1dkOHZNRFJDZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719981215);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pemeriksaan`
--

CREATE TABLE `transaksi_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_transaksi_pemeriksaan` varchar(255) NOT NULL,
  `idDaftarPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `no_pendaftaran_pemeriksaan` varchar(255) NOT NULL,
  `idKaryawan` bigint(20) UNSIGNED NOT NULL,
  `idDokter` bigint(20) UNSIGNED NOT NULL,
  `tanggalPemeriksaan` date NOT NULL,
  `diagnosis` text DEFAULT NULL,
  `keteranganDokter` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_pemeriksaan`
--

INSERT INTO `transaksi_pemeriksaan` (`id`, `no_transaksi_pemeriksaan`, `idDaftarPemeriksaan`, `no_pendaftaran_pemeriksaan`, `idKaryawan`, `idDokter`, `tanggalPemeriksaan`, `diagnosis`, `keteranganDokter`, `created_at`, `updated_at`) VALUES
(3, 'TRX-20240623-OSPYTI', 20, 'REG-20240622-BJ4CBJ', 2, 3, '2024-06-24', 'Test diagnosis Oke Bagus', 'Tes keterangan dokter Oke bagus hasilnya', '2024-06-23 09:30:02', '2024-06-23 09:39:19'),
(4, 'TRX-20240623-IMZHBY', 14, 'REG-20240621-JQCYXQ', 2, 3, '2024-06-25', 'oke pegal2 aj', 'Hasil udh baik', '2024-06-23 09:54:58', '2024-06-23 11:04:59'),
(5, 'TRX-20240623-QH4W12', 16, 'REG-20240622-28KA7I', 2, 2, '2024-07-09', 'oke kq', 'gk masalah', '2024-06-23 09:56:18', '2024-06-30 05:16:28'),
(6, 'TRX-20240625-9GHFOF', 11, 'REG-20240621-8GX0ET', 2, 1, '2024-06-26', 'Okeee sudah  siap', 'Oke Sudah Siap Hasil', '2024-06-25 00:58:25', '2024-06-25 01:08:24'),
(7, 'TRX-20240625-UEA8AG', 13, 'REG-20240621-TEMWSY', 2, 1, '2024-06-24', 'gejala alergi makanan krn seafood ok', 'Proses lebih lanjut lagi ok', '2024-06-25 01:02:49', '2024-06-30 03:15:02'),
(8, 'TRX-20240625-H7U6S3', 24, 'REG-20240625-JZYNUJ', 2, 1, '2024-07-03', 'Celpagia', 'Butuh Kontras', '2024-06-25 04:30:36', '2024-06-25 04:49:19'),
(9, 'TRX-20240625-IIGQXN', 12, 'REG-20240621-TG1VYL', 2, 1, '2024-07-02', NULL, NULL, '2024-06-25 05:00:10', '2024-06-25 05:00:10'),
(10, 'TRX-20240625-HAASRW', 10, 'REG-20240621-YXTMCR', 2, 3, '2024-06-27', NULL, NULL, '2024-06-25 11:00:43', '2024-06-25 11:00:43'),
(11, 'TRX-20240625-ZUKOQ7', 15, 'REG-20240622-CCNYIS', 2, 2, '2024-06-30', NULL, NULL, '2024-06-25 12:24:07', '2024-06-25 12:24:07'),
(12, 'TRX-20240626-LZGDOO', 19, 'REG-20240622-DVWCDL', 2, 2, '2024-06-23', NULL, NULL, '2024-06-26 09:33:55', '2024-06-26 09:33:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','dokter','karyawan','pasien') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','notactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$Vjgsq4Q7Poqb5LV.82CrfeRDilDu.IJiijI6POaVTUHNXPOqgQyIG', 'active', 'zyyVuIMXboUYJKYYoOS6LE7tkNBiXZgIe71Xs2fgiQXXyghoiw3zszPm3fme', '2024-06-13 23:03:41', '2024-06-13 23:03:41'),
(2, 'Reinert Yosua Rumagit', 'reinertyosuarumagit@gmail.com', 'pasien', NULL, '$2y$12$HRe122h3MIOyK4.lcST2EOx3s7O0jlCQ8OseUyIOA5MqJLYSZjt1O', 'active', NULL, '2024-06-14 00:36:10', '2024-06-14 00:36:10'),
(3, 'Andi Wijaya Sukma', 'andi2@gmail.com', 'dokter', NULL, '$2y$12$nV7pMprj6GphypRSSMpAKOx/6yD8/1NpLiIQx95tyCTJrxsjipLtS', 'active', NULL, '2024-06-14 02:24:51', '2024-06-15 05:17:18'),
(4, 'Richard', 'richard@gmail.com', 'pasien', NULL, '$2y$12$zCbgi3njIxTlXCKvZgsIFutdrgw13a2Hazz8xjiiDd0g7QqacOdva', 'active', 'n3pyUuRHy89EKicESU0BKsnuuve0FEnzRynEk8CExEZvxBSGAmPQNXGBlyk3', '2024-06-15 03:46:22', '2024-06-15 03:46:22'),
(12, 'Agung', 'agung@gmail.com', 'dokter', NULL, '$2y$12$jDlbqlzD9CT4diyhPFqIku9gOGks3IGgUmFeOoBPq4kVfEYbOF7E6', 'active', NULL, '2024-06-15 04:08:14', '2024-06-15 04:08:14'),
(13, 'Ester Wijaya', 'ester@gmail.com', 'karyawan', NULL, '$2y$12$RpKJvxomzMhz6FKISvQo0eU7hjCacsBrj0f7dhamJ90z/Mi2coa.G', 'active', NULL, '2024-06-15 05:58:36', '2024-06-15 05:58:36'),
(14, 'Budi Sukma', 'budi@gmail.com', 'pasien', NULL, '$2y$12$KeM2c9fFMVGMb4AWXR.g9.38loZ8W6WcEJVvjltvgFWIp73Qqa21u', 'active', NULL, '2024-06-15 06:05:51', '2024-06-15 06:05:51'),
(15, 'Joko Sutanto', 'joko@gmail.com', 'dokter', NULL, '$2y$12$g64krfsxCm0/9pNNtgcmlOLO32dQNGGRwAJYpa.M2f7U6OZgCfrw6', 'active', NULL, '2024-06-15 11:33:56', '2024-06-15 11:33:56'),
(16, 'Budi Kusuma', 'budikusuma@gmail.com', 'karyawan', NULL, '$2y$12$ns2kKExdL3FawcMlQ8DDP..YPkEOhZaa7ycLcIjtqMknvHhJY0bqO', 'active', NULL, '2024-06-16 21:14:55', '2024-06-16 21:14:55'),
(17, 'Kevin Sanjaya', 'kevin@gmail.com', 'pasien', NULL, '$2y$12$kWNFgZCvkp9STvB7x2oeCeRVnJ1vTAf3Tas0eifNoQ3OP7n03Sk5.', 'active', NULL, '2024-06-16 21:15:35', '2024-06-16 21:15:35'),
(18, 'Edo Bagus', 'edo@gmail.com', 'karyawan', NULL, '$2y$12$Ogu.ItgqmIigDSEtrFsImeaMUpKkzMBIjIHpvHi0eWUUvKQAG.PNW', 'active', NULL, '2024-06-16 21:17:44', '2024-06-16 21:17:44'),
(19, 'Daniel', 'daniel@gmail.com', 'pasien', NULL, '$2y$12$CLbKCvoyjOzUN8Jbkxr74OCyZLTAvx8zqPsXtG.xytDTCbs5BlKnC', 'active', NULL, '2024-06-25 03:45:19', '2024-06-25 03:45:19'),
(20, 'Helga', 'helga@gmail.com', 'pasien', NULL, '$2y$12$DA/6HLQp5f0yDRUFXqAXbO6AG1PkFEHA20RXaFJIp9It0jKbC/Es2', 'active', NULL, '2024-06-25 04:16:24', '2024-06-25 04:16:24');

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
-- Indeks untuk tabel `detail_hasil_pemeriksaan`
--
ALTER TABLE `detail_hasil_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_hasil_pemeriksaan_idhasilpemeriksaan_foreign` (`idHasilPemeriksaan`),
  ADD KEY `detail_hasil_pemeriksaan_idjenispemeriksaan_foreign` (`idJenisPemeriksaan`);

--
-- Indeks untuk tabel `detail_pendaftaran_pemeriksaan`
--
ALTER TABLE `detail_pendaftaran_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pendaftaran_pemeriksaan_iddaftarpemeriksaan_foreign` (`idDaftarPemeriksaan`),
  ADD KEY `detail_pendaftaran_pemeriksaan_idjenispemeriksaan_foreign` (`idJenisPemeriksaan`);

--
-- Indeks untuk tabel `detail_transaksi_pemeriksaan`
--
ALTER TABLE `detail_transaksi_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_pemeriksaan_idtransaksipemeriksaan_foreign` (`idTransaksiPemeriksaan`),
  ADD KEY `detail_transaksi_pemeriksaan_idjenispemeriksaan_foreign` (`idJenisPemeriksaan`);

--
-- Indeks untuk tabel `dicom`
--
ALTER TABLE `dicom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dicom_alamatip_foreign` (`alamatIP`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dokter_idktp_unique` (`idKTP`),
  ADD KEY `dokter_iduser_foreign` (`idUser`);

--
-- Indeks untuk tabel `draft_laporan_pemeriksaan`
--
ALTER TABLE `draft_laporan_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `draft_laporan_pemeriksaan_idkaryawan_foreign` (`idKaryawan`),
  ADD KEY `draft_laporan_pemeriksaan_idjenispemeriksaan_foreign` (`idJenisPemeriksaan`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hasil_pemeriksaan_no_transaksi_pemeriksaan_unique` (`no_transaksi_pemeriksaan`),
  ADD KEY `hasil_pemeriksaan_idtransaksipemeriksaan_foreign` (`idTransaksiPemeriksaan`),
  ADD KEY `hasil_pemeriksaan_idkaryawan_foreign` (`idKaryawan`),
  ADD KEY `hasil_pemeriksaan_iddokter_foreign` (`idDokter`);

--
-- Indeks untuk tabel `jenis_pemeriksaan`
--
ALTER TABLE `jenis_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_pemeriksaan_idmodalitas_foreign` (`idModalitas`);

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
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawan_idktp_unique` (`idKTP`),
  ADD KEY `karyawan_iduser_foreign` (`idUser`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modalitas`
--
ALTER TABLE `modalitas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modalitas_alamatip_unique` (`alamatIP`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasien_noidentitas_unique` (`noIdentitas`),
  ADD KEY `pasien_iduser_foreign` (`idUser`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pendaftaran_pemeriksaan`
--
ALTER TABLE `pendaftaran_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftaran_pemeriksaan_no_pendaftaran_unique` (`no_pendaftaran`),
  ADD KEY `pendaftaran_pemeriksaan_idpasien_foreign` (`idPasien`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transaksi_pemeriksaan`
--
ALTER TABLE `transaksi_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksi_pemeriksaan_no_transaksi_pemeriksaan_unique` (`no_transaksi_pemeriksaan`),
  ADD UNIQUE KEY `transaksi_pemeriksaan_no_pendaftaran_pemeriksaan_unique` (`no_pendaftaran_pemeriksaan`),
  ADD KEY `transaksi_pemeriksaan_iddaftarpemeriksaan_foreign` (`idDaftarPemeriksaan`),
  ADD KEY `transaksi_pemeriksaan_idkaryawan_foreign` (`idKaryawan`),
  ADD KEY `transaksi_pemeriksaan_iddokter_foreign` (`idDokter`);

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
-- AUTO_INCREMENT untuk tabel `detail_hasil_pemeriksaan`
--
ALTER TABLE `detail_hasil_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `detail_pendaftaran_pemeriksaan`
--
ALTER TABLE `detail_pendaftaran_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi_pemeriksaan`
--
ALTER TABLE `detail_transaksi_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT untuk tabel `dicom`
--
ALTER TABLE `dicom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `draft_laporan_pemeriksaan`
--
ALTER TABLE `draft_laporan_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_pemeriksaan`
--
ALTER TABLE `jenis_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `modalitas`
--
ALTER TABLE `modalitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_pemeriksaan`
--
ALTER TABLE `pendaftaran_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pemeriksaan`
--
ALTER TABLE `transaksi_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_hasil_pemeriksaan`
--
ALTER TABLE `detail_hasil_pemeriksaan`
  ADD CONSTRAINT `detail_hasil_pemeriksaan_idhasilpemeriksaan_foreign` FOREIGN KEY (`idHasilPemeriksaan`) REFERENCES `hasil_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_hasil_pemeriksaan_idjenispemeriksaan_foreign` FOREIGN KEY (`idJenisPemeriksaan`) REFERENCES `jenis_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pendaftaran_pemeriksaan`
--
ALTER TABLE `detail_pendaftaran_pemeriksaan`
  ADD CONSTRAINT `detail_pendaftaran_pemeriksaan_iddaftarpemeriksaan_foreign` FOREIGN KEY (`idDaftarPemeriksaan`) REFERENCES `pendaftaran_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pendaftaran_pemeriksaan_idjenispemeriksaan_foreign` FOREIGN KEY (`idJenisPemeriksaan`) REFERENCES `jenis_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi_pemeriksaan`
--
ALTER TABLE `detail_transaksi_pemeriksaan`
  ADD CONSTRAINT `detail_transaksi_pemeriksaan_idjenispemeriksaan_foreign` FOREIGN KEY (`idJenisPemeriksaan`) REFERENCES `jenis_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_pemeriksaan_idtransaksipemeriksaan_foreign` FOREIGN KEY (`idTransaksiPemeriksaan`) REFERENCES `transaksi_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dicom`
--
ALTER TABLE `dicom`
  ADD CONSTRAINT `dicom_alamatip_foreign` FOREIGN KEY (`alamatIP`) REFERENCES `modalitas` (`alamatIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `draft_laporan_pemeriksaan`
--
ALTER TABLE `draft_laporan_pemeriksaan`
  ADD CONSTRAINT `draft_laporan_pemeriksaan_idjenispemeriksaan_foreign` FOREIGN KEY (`idJenisPemeriksaan`) REFERENCES `jenis_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `draft_laporan_pemeriksaan_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD CONSTRAINT `hasil_pemeriksaan_iddokter_foreign` FOREIGN KEY (`idDokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_pemeriksaan_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_pemeriksaan_idtransaksipemeriksaan_foreign` FOREIGN KEY (`idTransaksiPemeriksaan`) REFERENCES `transaksi_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_pemeriksaan_no_transaksi_pemeriksaan_foreign` FOREIGN KEY (`no_transaksi_pemeriksaan`) REFERENCES `transaksi_pemeriksaan` (`no_transaksi_pemeriksaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_pemeriksaan`
--
ALTER TABLE `jenis_pemeriksaan`
  ADD CONSTRAINT `jenis_pemeriksaan_idmodalitas_foreign` FOREIGN KEY (`idModalitas`) REFERENCES `modalitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran_pemeriksaan`
--
ALTER TABLE `pendaftaran_pemeriksaan`
  ADD CONSTRAINT `pendaftaran_pemeriksaan_idpasien_foreign` FOREIGN KEY (`idPasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_pemeriksaan`
--
ALTER TABLE `transaksi_pemeriksaan`
  ADD CONSTRAINT `transaksi_pemeriksaan_iddaftarpemeriksaan_foreign` FOREIGN KEY (`idDaftarPemeriksaan`) REFERENCES `pendaftaran_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pemeriksaan_iddokter_foreign` FOREIGN KEY (`idDokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pemeriksaan_idkaryawan_foreign` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pemeriksaan_no_pendaftaran_pemeriksaan_foreign` FOREIGN KEY (`no_pendaftaran_pemeriksaan`) REFERENCES `pendaftaran_pemeriksaan` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
