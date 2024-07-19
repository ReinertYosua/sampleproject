-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2024 pada 13.51
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
  `uuid` char(36) DEFAULT NULL,
  `idHasilPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `idJenisPemeriksaan` bigint(20) UNSIGNED NOT NULL,
  `laporan` longtext NOT NULL,
  `jamMulaiAlat` time NOT NULL,
  `jamSelesaiAlat` time NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 1, 167, '18:50:00', '19:50:00', 'ya', 'Approve', '2024-07-19 01:20:06', '2024-07-19 01:20:06'),
(4, 2, 189, '14:10:00', '16:57:00', 'ya', 'Approve', '2024-07-19 01:36:34', '2024-07-19 01:36:34'),
(7, 3, 131, '16:30:00', '17:50:00', 'ya', 'Approve', '2024-07-19 01:45:17', '2024-07-19 01:45:17'),
(10, 4, 188, '12:20:00', '13:54:00', 'tidak', 'Menunggu Approval', '2024-07-19 02:00:19', '2024-07-19 02:00:19'),
(12, 5, 176, '17:25:00', '20:09:00', 'ya', 'Approve', '2024-07-19 02:11:50', '2024-07-19 02:11:50'),
(14, 6, 166, '16:10:00', '18:34:00', 'ya', 'Approve', '2024-07-19 03:02:57', '2024-07-19 03:02:57'),
(16, 7, 161, '14:57:00', '17:57:00', 'ya', 'approve', '2024-07-19 03:10:11', '2024-07-19 03:10:11'),
(18, 8, 184, '09:10:00', '11:50:00', 'ya', 'approve', '2024-07-19 03:16:34', '2024-07-19 03:16:34'),
(20, 9, 202, '15:10:00', '17:07:00', 'ya', 'approve', '2024-07-19 03:20:55', '2024-07-19 03:20:55'),
(22, 10, 202, '08:15:00', '12:54:00', 'ya', 'approve', '2024-07-19 03:26:17', '2024-07-19 03:26:17'),
(24, 11, 144, '17:45:00', '18:45:00', 'ya', 'approve', '2024-07-19 03:59:43', '2024-07-19 03:59:43'),
(27, 12, 201, '14:11:00', '15:30:00', 'ya', 'approved', '2024-07-19 04:12:17', '2024-07-19 04:12:17'),
(28, 12, 161, '15:50:00', '18:11:00', 'ya', 'approved', '2024-07-19 04:12:17', '2024-07-19 04:12:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi_pemeriksaan`
--

CREATE TABLE `detail_transaksi_pemeriksaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
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

INSERT INTO `detail_transaksi_pemeriksaan` (`id`, `uuid`, `idTransaksiPemeriksaan`, `performedInstanceUID`, `idJenisPemeriksaan`, `jamMulaiAlat`, `jamSelesaiAlat`, `ruangan`, `keteranganRadiografer`, `harga`, `diskon`, `hargaTotal`, `status`, `created_at`, `updated_at`) VALUES
(1, '1c14beb3-a74f-4e40-affc-874cf7884681', 1, '1.2.826.0.1.3680043.8.498.21578373939655404106399935542699974624', 167, '18:50:00', '19:50:00', 'R002', 'siap pemeriksaan', 0, 0, 0, '4', '2024-07-19 01:20:07', '2024-07-19 03:54:46'),
(2, '546a83d4-195a-4c11-a8bf-6bc22c892a24', 2, NULL, 189, '14:10:00', '16:57:00', 'R002', 'siap pemeriksaan', 0, 0, 0, '2', '2024-07-19 01:36:34', '2024-07-19 02:39:08'),
(3, '133a00fb-42c5-4a23-aaa3-e2ff71c92fbc', 3, NULL, 131, '16:30:00', '17:50:00', 'R002', 'siap pemeriksaan', 0, 0, 0, '2', '2024-07-19 01:45:17', '2024-07-19 02:39:26'),
(4, 'dc0c2e07-8903-4267-9cc6-f5817747ae55', 4, NULL, 188, '12:20:00', '13:54:00', 'R002', 'siap pemeriksaan', 0, 0, 0, '2', '2024-07-19 01:54:40', '2024-07-19 02:39:42'),
(5, '3a8a780e-8dd1-4acf-84e1-82ce79514ce3', 5, NULL, 176, '17:25:00', '20:09:00', 'R002', 'siap pemeriksaan', 0, 0, 0, '2', '2024-07-19 02:11:50', '2024-07-19 02:39:59'),
(6, 'b137c876-dfed-475e-b537-148bdaaca5ce', 6, NULL, 166, '16:10:00', '18:34:00', '', '', 0, 0, 0, '1', '2024-07-19 03:02:57', '2024-07-19 03:02:57'),
(7, '8d7e730d-3d1a-4dcc-b707-06b47efac62c', 7, NULL, 161, '14:57:00', '17:57:00', '', '', 0, 0, 0, '1', '2024-07-19 03:10:11', '2024-07-19 03:10:11'),
(8, 'bb415103-a333-4fb2-83b0-a3551f77b94b', 8, NULL, 184, '09:10:00', '11:50:00', '', '', 0, 0, 0, '1', '2024-07-19 03:16:34', '2024-07-19 03:16:34'),
(9, 'd2cab94e-e0a3-4680-8916-bde996e4a8a1', 9, NULL, 202, '15:10:00', '17:07:00', '', '', 0, 0, 0, '1', '2024-07-19 03:20:55', '2024-07-19 03:20:55'),
(10, 'faabbf16-9eb3-4bae-b015-d879798098bd', 10, NULL, 202, '08:15:00', '12:54:00', '', '', 0, 0, 0, '1', '2024-07-19 03:26:17', '2024-07-19 03:26:17'),
(11, 'b5429bdc-5d75-4ae0-b342-32df6e8838cd', 11, '1.3.12.2.1107.5.2.30.26266.30000024071902445654600000004', 144, '17:45:00', '18:45:00', 'R002', 'pasien siap diperiksa', 0, 0, 0, '4', '2024-07-19 03:59:43', '2024-07-19 04:07:01'),
(12, '669b3380-2818-4c75-9e41-1997dd76469c', 12, NULL, 201, '14:11:00', '15:30:00', '', '', 0, 0, 0, '1', '2024-07-19 04:12:17', '2024-07-19 04:12:17'),
(13, '0a12078a-1a20-4911-ba8c-7179d989b1be', 12, NULL, 161, '15:50:00', '18:11:00', '', '', 0, 0, 0, '1', '2024-07-19 04:12:17', '2024-07-19 04:12:17');

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
(8, '192.0.0.2', '255.255.255.0', 'send', 'send', 'MRC26266', 80, '2024-07-19 09:12:25', '2024-07-19 09:12:25');

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
(4, 24, 1111111111, 'wanita', 'Sp.Rad', '1992-01-01', 'Jakarta', 'Jakarta', '0', '0', 'no pict', '2024-07-18 22:52:44', '2024-07-18 22:52:44'),
(5, 25, 2222222222, 'wanita', 'Sp.Rad', '1992-01-01', 'Jakarta', 'Jakarta', '0', '0', 'no pict', '2024-07-18 22:53:58', '2024-07-18 22:53:58'),
(6, 26, 3333333333, 'wanita', 'Sp.Rad', '1992-01-01', 'Jakarta', 'Jakarta', '0', '0', 'no pict', '2024-07-18 22:54:53', '2024-07-18 22:54:53'),
(7, 27, 4444444444, 'pria', 'Sp.Rad', '1992-01-01', 'Jakarta', 'Jakarta', '0', '0', 'no pict', '2024-07-18 22:55:38', '2024-07-18 22:55:38');

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
(2, 8, 'SISTEM PENCERNAAN - Oesofagografi', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 8, 'SISTEM PENCERNAAN - Maag Duodenum', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 8, 'SISTEM PENCERNAAN - OMD', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 8, 'SISTEM PENCERNAAN - Follow Through', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 8, 'SISTEM PENCERNAAN - Colon in loop', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 8, 'SISTEM PENCERNAAN - Appendicogram', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 'SISTEM PENCERNAAN - T Tube chclangiografi', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 8, 'SISTEM PENCERNAAN - Loopografi', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 8, 'SISTEM PENCERNAAN - PTC', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 8, 'SISTEM PENCERNAAN - PTBD', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 8, 'SISTEM UROGENITAL - IVP', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 8, 'SISTEM UROGENITAL - Cystografi', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 8, 'SISTEM UROGENITAL - Retrograde Urethrografi', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 8, 'SISTEM UROGENITAL - Urethrocystografi', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 8, 'SISTEM UROGENITAL - Antegradel Retrograde Pyelografi', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 8, 'SISTEM UROGENITAL - Mictio Cysto Urethrografi (MCU)', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 8, 'SISTEM UROGENITAL - Urethrography bipoler', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 8, 'SISTEM UROGENITAL - HSG', 'XP-F', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 4, 'USG - Abdomen *', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 4, 'USG - Ginjal & Buli-buli **', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 4, 'USG - Buli & Prostat **', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 4, 'USG - Ginekologi **', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 4, 'USG - Thyroid', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 4, 'USG - Mammae', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 4, 'USG - Kepala (bayi)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 4, 'USG - Lain-Iain ..............', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 4, 'USG - Hip Joint (bayi & anak)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 4, 'USG - Musculoskeletal', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 4, 'USG - Thorax guided', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 4, 'USG - Abdomen guided', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 4, 'INTERVANSIONAL ULTRASOUND - ABDOMINAL US-GUIDED BIOPSY', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 4, 'INTERVANSIONAL ULTRASOUND - BREAST US-GUIDED BIOPSY', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 4, 'INTERVANSIONAL ULTRASOUND - THYROID US-GUIDED BIOPSY', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 4, 'USG DOPPLER - Carotis (Dex / Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 4, 'USG DOPPLER - Carotis (Dex et Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 4, 'USG DOPPLER - Hepar', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 4, 'USG DOPPLER - Pancreas', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 4, 'USG DOPPLER - Ginjal (Dex / Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 4, 'USG DOPPLER - Ginjal (Dex et Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 4, 'USG DOPPLER - Spleen', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 4, 'USG DOPPLER - Arteri Extremitas atas (Dex / Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 4, 'USG DOPPLER - Arteri Extremitas atas (Dex et Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 4, 'USG DOPPLER - Vena Extremitas atas (Dex / Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 4, 'USG DOPPLER - Vena Extremitas atas (Dex Et Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 4, 'USG DOPPLER - A dan V Extremitas atas (Dex/ Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 4, 'USG DOPPLER - A dan V Extremitas atas (Dex et Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 4, 'USG DOPPLER - Lain-Iain ..........................', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 4, 'USG DOPPLER - Arteri Ekstremitas bawah (Dex/Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 4, 'USG DOPPLER - Arteri Extremitas bawah (Dex et Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 4, 'USG DOPPLER - Vena Extremitas bawah (Dex/Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 4, 'USG DOPPLER - Vena Extremitas bawah\\(Dex et Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 4, 'USG DOPPLER - A dan V Extremitas bawah (Dex/Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 4, 'USG DOPPLER - A dan V Exremitas bawd\\h (Dex et Sin)', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 4, 'USG 4 D / ECHOCARDIOGRAFI - Kehamilan', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 4, 'USG 4 D / ECHOCARDIOGRAFI - Ginekologi', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 4, 'USG 4 D / ECHOCARDIOGRAFI - Echocardiography', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 4, 'USG 4 D / ECHOCARDIOGRAFI - Lain-Iain ...........................', 'USG', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 3, 'MSCT - Brain', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 3, 'MSCT - Brain kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 3, 'MSCT - Brain Axial & Coronal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 3, 'MSCT - Brain Axial & Coronal kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 3, 'MSCT - Brain + Bone set', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 3, 'MSCT - Sinus Paranasalis Coronal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 3, 'MSCT - Sinus Paranasalis Axial & Coronal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 3, 'MSCT - Sinus Paranasalis kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 3, 'MSCT - Mastoid', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 3, 'MSCT - Mastoid kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 3, 'MSCT - Nasopharynx', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 3, 'MSCT - Nasopharynx kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 3, 'MSCT - Larynx', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 3, 'MSCT - Larynx kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 3, 'MSCT - Thyroid', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 3, 'MSCT - Thyroid kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 3, 'MSCT - Mandibula', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 3, 'MSCT - Mandibula kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 3, 'MSCT - Maxilla', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 3, 'MSCT - Maxilla kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 3, 'MSCT - Sella tursica', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 3, 'MSCT - Sella tursica kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 3, 'MSCT - Orbita', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 3, 'MSCT - Orbita kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 3, 'MSCT - Thorax', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 3, 'MSCT - Thorax kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 3, 'MSCT - Abdomen', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 3, 'MSCT - Abdomen kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 3, 'MSCT - Pelvis', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 3, 'MSCT - Pelvis kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 3, 'MSCT - Whole abdomen', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 3, 'MSCT - Whole abdomen kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 3, 'MSCT - Traktus Urinarius', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 3, 'MSCT - Traktus Urinarius kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 3, 'MSCT - Cen/ical', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 3, 'MSCT - Cervical kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 3, 'MSCT - Thoracal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 3, 'MSCT - Thoracal kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 3, 'MSCT - Thoracolumbal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 3, 'MSCT - Thoracolumbal kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 3, 'MSCT - Lumbal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 3, 'MSCT - Lumbal kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 3, 'MSCT - Lumbosacral', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 3, 'MSCT - Lumbosacral kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 3, 'MSCT - Extremitas atas', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 3, 'MSCT - Extremitas atas kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 3, 'MSCT - Extremitas bawah', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 3, 'MSCT - Extremitas bawah kontras', 'CT', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 3, 'MSCT ANGIOGRAFI - Brain CTA', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 3, 'MSCT ANGIOGRAFI - Carotis Neck CTA', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 3, 'MSCT ANGIOGRAFI - Brain CTA + Carotis CTA', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 3, 'MSCT ANGIOGRAFI - Thoracal CTA', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 3, 'MSCT ANGIOGRAFI - Abdominal CTA', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 3, 'MSCT ANGIOGRAFI - Thoracoabdominal CTA', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 3, 'MSCT ANGIOGRAFI - Extremitas atas CTA', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 3, 'MSCT ANGIOGRAFI - Extremitas bawah CTA', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 3, 'MSCT ANGIOGRAFI - Lain-Iain  ........... ..', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 3, '3D - Maxilla & Mandibula', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 3, '3D - Head', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 3, '3D - Face bone', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 3, '3D - Dental', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 3, '3D - Vert. Cervical', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 3, '3D - Vert. Thoracal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 3, '3D - Vert. Lumbal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 3, '3D - Vert. Lumbosacral', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 3, '3D - Pelvis', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 3, '3D - Extremitas atas', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 3, '3D - Extremitas bawah', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 3, 'MSCT CARDIAC - Calcium score', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 3, 'MSCT CARDIAC - CT A Coroner & Calcium score', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 3, 'MSCT WHOLE BODY - Brain, Thorax, Abdominal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 3, 'MSCT WHOLE BODY - Brain, Neck, Thorax, Abdominal', 'CT', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 2, 'MRI KEPALA DAN LEHER - MRI Brain', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 2, 'MRI KEPALA DAN LEHER - MR Perfusi', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 2, 'MRI KEPALA DAN LEHER - MR Spectroscopy', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 2, 'MRI KEPALA DAN LEHER - MRI Brain & Spectroscopy', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 2, 'MRI KEPALA DAN LEHER - MRI Hipoﬁse', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 2, 'MRI KEPALA DAN LEHER - MRI Orbita', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 2, 'MRI KEPALA DAN LEHER - MRI Cochlea', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 2, 'MRI KEPALA DAN LEHER - MRI Sinus Paranasalis', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 2, 'MRI KEPALA DAN LEHER - MRI Nasopharynx', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 2, 'MRI KEPALA DAN LEHER - MRI Mu|ut/ Oropharynx', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 2, 'MRI KEPALA DAN LEHER - MRI Salivary Gland', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 2, 'MRI KEPALA DAN LEHER - MRI Larynx', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 2, 'MRI KEPALA DAN LEHER - MRI Thyroid dan Parathyroid Gland', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 2, 'MRI KEPALA DAN LEHER - MRI Brain', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 2, 'MRI KEPALA DAN LEHER - MR Perfusi', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 2, 'MRI KEPALA DAN LEHER - MR Spectroscopy', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 2, 'MRI KEPALA DAN LEHER - MRI Brain & Spectroscopy', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 2, 'MRI KEPALA DAN LEHER - MRI Hipoﬁse', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 2, 'MRI KEPALA DAN LEHER - MRI Orbita', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 2, 'MRI KEPALA DAN LEHER - MRI Cochlea', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 2, 'MRI KEPALA DAN LEHER - MRI Sinus Paranasalis', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 2, 'MRI KEPALA DAN LEHER - MRI Nasopharynx', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 2, 'MRI KEPALA DAN LEHER - MRI Mu|ut/ Oropharynx', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 2, 'MRI KEPALA DAN LEHER - MRI Salivary Gland', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 2, 'MRI KEPALA DAN LEHER - MRI Larynx', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 2, 'MRI KEPALA DAN LEHER - MRI Thyroid dan Parathyroid Gland', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 2, 'MRI THORAX - MRI Mediastinum', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 2, 'MRI THORAX - MRI Mediastinum', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 2, 'MRI VERTEBRA - MRI Cervical', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 2, 'MRI VERTEBRA - MRI Thoracal', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 2, 'MRI VERTEBRA - MRI Lumbal', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 2, 'MRI VERTEBRA - MRI Sacrococcygis', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 2, 'MRI VERTEBRA - MRI Myelograﬁ', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 2, 'MRI VERTEBRA - MRI Cervicothoracal', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 2, 'MRI VERTEBRA - MRI Thoracolumbal', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 2, 'MRI VERTEBRA - MRI Whole Spine', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 2, 'MRI VERTEBRA - MRI Cervical', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 2, 'MRI VERTEBRA - MRI Thoracal', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 2, 'MRI VERTEBRA - MRI Lumbal', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 2, 'MRI VERTEBRA - MRI Sacrococcygis', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 2, 'MRI VERTEBRA - MRI Myelograﬁ', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 2, 'MRI VERTEBRA - MRI Cervicothoracal', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 2, 'MRI VERTEBRA - MRI Thoracolumbal', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 2, 'MRI VERTEBRA - MRI Whole Spine', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 2, 'MRI ABDOMEN DAN PELVIS - MRI Abdomen atas', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 2, 'MRI ABDOMEN DAN PELVIS - MRI Pelvis', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 2, 'MRI ABDOMEN DAN PELVIS - MRI Abdomen atas dan pelvis', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 2, 'MRI ABDOMEN DAN PELVIS - MRCP', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 2, 'MRI ABDOMEN DAN PELVIS - MRI Abdomen atas', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 2, 'MRI ABDOMEN DAN PELVIS - MRI Pelvis', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 2, 'MRI ABDOMEN DAN PELVIS - MRI Abdomen atas dan pelvis', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 2, 'MRI ABDOMEN DAN PELVIS - MRCP', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 2, 'MRI MUSKULOSKELETAL - MRI TMJ', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 2, 'MRI MUSKULOSKELETAL - MRI Shoulder', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 2, 'MRI MUSKULOSKELETAL - MRI Cubiti', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 2, 'MRI MUSKULOSKELETAL - MRI Wrist Joint', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 2, 'MRI MUSKULOSKELETAL - MRI Hip Joint', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 2, 'MRI MUSKULOSKELETAL - MRI Genu', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 2, 'MRI MUSKULOSKELETAL - MRI Ankle', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 2, 'MRI MUSKULOSKELETAL - MRI Extremitas atas', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 2, 'MRI MUSKULOSKELETAL - MRI Extremitas bawah', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 2, 'MRI MUSKULOSKELETAL - MRI TMJ', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 2, 'MRI MUSKULOSKELETAL - MRI Shoulder', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 2, 'MRI MUSKULOSKELETAL - MRI Cubiti', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 2, 'MRI MUSKULOSKELETAL - MRI Wrist Joint', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 2, 'MRI MUSKULOSKELETAL - MRI Hip Joint', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 2, 'MRI MUSKULOSKELETAL - MRI Genu', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 2, 'MRI MUSKULOSKELETAL - MRI Ankle', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 2, 'MRI MUSKULOSKELETAL - MRI Extremitas atas', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 2, 'MRI MUSKULOSKELETAL - MRI Extremitas bawah', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 2, 'MRI ANGIOGRAFI (MRA) - MRA Brain', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 2, 'MRI ANGIOGRAFI (MRA) - MRI & MRA Brain', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 2, 'MRI ANGIOGRAFI (MRA) - MRA Carotis', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 2, 'MRI ANGIOGRAFI (MRA) - MRI Cervical + MRA Carotis', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 2, 'MRI ANGIOGRAFI (MRA) - MRI + MRA Brain & MRA Carotis', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 2, 'MRI ANGIOGRAFI (MRA) - MRA Thoracal', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 2, 'MRI ANGIOGRAFI (MRA) - MRA Abdominal', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 2, 'MRI ANGIOGRAFI (MRA) - MRA Thoracal & Abdominal', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 2, 'MRI ANGIOGRAFI (MRA) - MRA Extremitas atas', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 2, 'MRI ANGIOGRAFI (MRA) - MRA Extremitas bawah', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 2, 'MRI ANGIOGRAFI (MRA) - MRI, MRA Brain & Spectroscopy', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 2, 'MRI ANGIOGRAFI (MRA) - MRV Brain', 'MR', 'tidak', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 2, 'MRI ANGIOGRAFI (MRA) - MRI & MRA Brain', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 2, 'MRI ANGIOGRAFI (MRA) - MRA Carotis', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 2, 'MRI ANGIOGRAFI (MRA) - MRI Cervical + MRA Carotis', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 2, 'MRI ANGIOGRAFI (MRA) - MRI Brain + MRA Carotis', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 2, 'MRI ANGIOGRAFI (MRA) - MRI + MRA Brain & MRA Carotis', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 2, 'MRI ANGIOGRAFI (MRA) - MRA Thoracal', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 2, 'MRI ANGIOGRAFI (MRA) - MRA Abdominal', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 2, 'MRI ANGIOGRAFI (MRA) - MRA Thoracal & Abdominal', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 2, 'MRI ANGIOGRAFI (MRA) - MRA Extremitas atas', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 2, 'MRI ANGIOGRAFI (MRA) - MRA Extremitas bawah', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 2, 'MRI ANGIOGRAFI (MRA) - MRI, MRA Brain & Spectroscopy', 'MR', 'ya', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(36, '2024_07_02_130316_add_performend_instance_uid_to_detail_transaksi_pemeriksaan', 11),
(37, '2024_07_06_090524_add_uuid_to_detail_transaksi_pemeriksaan_table', 12),
(38, '2024_07_06_092735_add_uuid_to_detail_hasil_pemeriksaan_table', 13);

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
(1, 'AX', 'angiografi', 'Siemens', 'Artis zee floor', '136957', '192.0.0.1', 'R001', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'MR', 'mri', 'Siemens', 'MAGNETOM Avanto', '26266', '192.0.0.2', 'R002', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'CT', 'ctscan', 'Siemens', 'SOMATOM Sensation 64 / Cardiac 64', '54963', '192.0.0.3', 'R003', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'US', 'usg', 'Siemens', 'SONOLINE G60S r10', 'KAZ0557', '192.0.0.4', 'R004', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'US', 'usg', 'Siemens', 'SONOLINE G20 LC, APLA', 'JC00852', '192.0.0.5', 'R005', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'US', 'usg', 'Siemens', 'SONOLINE G20 LC, APLA', 'JC00858', '192.0.0.6', 'R006', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'US', 'usg', 'Siemens', 'SONOLINE G20 LC, APLA', 'JC00871', '192.0.0.7', 'R007', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'XF', 'fluoroskopi', 'Siemens', 'AXIOM Iconos R100_B', '10027', '192.0.0.8', 'R008', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'XP', 'radiografi', 'Siemens', 'POLYMOBIL Plus', '20044', '192.0.0.9', 'R009', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'MM', 'mamografi', 'Siemens', 'MAMMOMAT 1000, Mo/Rh, GE.K.K.', '12015', '192.0.0.10', 'R010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'US', 'usg', 'GE', 'USG Cardiac', '0', '192.0.0.11', 'R011', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(5, 20, 'Jakarta', '1990-06-24', 314124124124, 'KTP', 'wanita', 'Karyawan Swastat', 'Kebon Jeruk', 'Jakarta Barat', 'belumkawin', 'islam', '021214124142', '087812412414', 'Hendro', '08712412414', 'Indonesia', 'Sulfa', 'O+', 170, 75, '1719314344.PNG', '2024-06-25 04:19:04', '2024-06-25 04:19:04'),
(6, 21, 'Jakarta', '1961-07-09', 11111111111111, 'KTP', 'pria', 'Swasta', 'Jakarta', 'Jakarta', 'belumkawin', 'kristen', '123', '123', 'Ani', '123', 'Indonesia', 'Gatal jika makan Seafood', 'O-', 170, 75, '1720271022.PNG', '2024-07-06 06:03:42', '2024-07-06 06:03:42'),
(7, 22, 'Tangerang', '1999-06-02', 3671014802730001, 'Paspor', 'pria', '---', 'Victoria park, Tangerang', 'Tangerang', 'belumkawin', 'kristen', '0', '0', '---', '0', 'WNI', 'Tidak ada', 'A+', 0, 0, 'no pict', '2024-07-18 22:09:55', '2024-07-18 22:09:55'),
(8, 23, 'Jakarta', '1992-01-01', 1111111111, 'KTP', 'wanita', 'Dokter', 'Jakarta', 'Jakarta', 'belumkawin', 'kristen', '0', '0', '---', '0', 'Indonesia', '---', 'A+', 0, 0, 'no pict', '2024-07-18 22:46:04', '2024-07-18 22:46:04'),
(9, 28, 'Jakarta', '1973-08-04', 986537281177363, 'KTP', 'pria', '----', '-----', 'Jakarta', 'kawin', 'katholik', '0', '0', '-----', '0', 'WNI', 'Tidak ada', 'B+', 0, 70, 'no pict', '2024-07-19 01:34:12', '2024-07-19 01:34:12'),
(10, 29, 'Jakarta Timur', '1981-06-04', 87368986542, 'KTP', 'pria', '----', 'Jl. Mustika Ratu, Ciracas, Jakarta Timur', 'Jakarta Timur', 'kawin', 'islam', '0000', '0000000', '------', '000000', 'WNI', 'Tidak ada', 'AB+', 0, 65, 'no pict', '2024-07-19 01:41:56', '2024-07-19 01:41:56'),
(11, 30, 'Jakarta', '1981-09-24', 436542653178, 'KTP', 'pria', '----', 'Apt medit 2 tower gardena', 'Jakarta', 'kawin', 'kristen', '00000', '00000', '------', '0000000', 'WNI', 'Tidak ada', 'O+', 0, 69, 'no pict', '2024-07-19 01:53:01', '2024-07-19 01:53:01'),
(12, 31, 'Tangerang', '1969-09-27', 6848239743, 'KTP', 'pria', '----', 'Grand Duta Cluster chrysocolla', 'Tangerang', 'kawin', 'katholik', '0000', '00000', '--------', '00000', 'WNI', 'Tidak ada', 'O+', 0, 69, 'no pict', '2024-07-19 02:09:37', '2024-07-19 02:09:37'),
(13, 32, 'Medan', '1996-04-27', 7642398742, 'KTP', 'wanita', '------', 'jl latumanten', 'Jakarta', 'belumkawin', 'katholik', '0000', '1111', '-----', '0000', 'WNI', 'Tidak ada', 'A-', 0, 56, 'no pict', '2024-07-19 02:19:46', '2024-07-19 02:19:46'),
(14, 33, 'Jakarta', '1957-12-08', 54788273632, 'KTP', 'wanita', '----', '----', 'jakarta', 'kawin', 'kristen', '000', '000', '---', '0000', 'WNI', 'Tidak ada', 'B+', 0, 67, 'no pict', '2024-07-19 03:07:06', '2024-07-19 03:07:06'),
(15, 34, 'Bangkok', '1969-07-20', 5467890867656, 'Paspor', 'pria', '---', 'jakarta', 'Jakarta', 'kawin', 'budha', '0000', '000', '---', '0000', 'WNA', 'tidak ada', 'O+', 0, 65, 'no pict', '2024-07-19 03:14:19', '2024-07-19 03:14:19'),
(16, 35, 'Vietnam', '1967-11-09', 7647489374683, 'Paspor', 'pria', '---', 'jakarta', 'jakarta', 'kawin', 'hindu', '0000', '0000', '---', '0000', 'WNA', 'tidak ada', 'AB-', 0, 65, 'no pict', '2024-07-19 03:18:55', '2024-07-19 03:18:55'),
(17, 36, 'Jakarta', '1954-10-10', 33456744356, 'KTP', 'wanita', '---', 'jakarta', 'jakarta', 'kawin', 'islam', '00000', '0000', '----', '0000', 'WNI', 'tidak ada', 'AB-', 0, 60, 'no pict', '2024-07-19 03:23:15', '2024-07-19 03:23:15'),
(18, 37, 'Jakarta', '1999-02-15', 53323566877, 'KTP', 'pria', '----', 'jkt', 'Jakarta Barat', 'kawin', 'katholik', '0000', '0000', '----', '0000', 'wna', 'tidak ada', 'A+', 0, 50, 'no pict', '2024-07-19 03:58:34', '2024-07-19 03:58:34'),
(19, 38, 'Jakarta', '1998-09-09', 7865329728930, 'KTP', 'wanita', '-----', 'jakarta', 'Jakarta Barat', 'belumkawin', 'kristen', '00000', '0000', '-----', '0000', '----', 'tidakada', 'A+', 0, 67, 'no pict', '2024-07-19 04:10:19', '2024-07-19 04:10:19');

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
(1, 'REG-20240719-AIABFT', 7, 'Dr. Dian', '1721377027.jpeg', '2024-07-18', '2024-07-19 01:17:07', '2024-07-19 01:17:07'),
(2, 'REG-20240719-XUF55Q', 9, 'Dr. Juliana Sanjaya', '1721378142.jpeg', '2024-07-18', '2024-07-19 01:35:42', '2024-07-19 01:35:42'),
(3, 'REG-20240719-03NSYS', 10, 'dr. Surya', '1721378646.jpeg', '2024-07-18', '2024-07-19 01:44:06', '2024-07-19 01:44:06'),
(4, 'REG-20240719-QZODH6', 11, 'dr. Wulan', '1721379619.jpeg', '2024-07-16', '2024-07-19 01:54:05', '2024-07-19 02:00:19'),
(5, 'REG-20240719-FXPU0F', 12, 'Dr. Juliana Sanjaya', '1721380257.jpeg', '2024-07-18', '2024-07-19 02:10:57', '2024-07-19 02:10:57'),
(6, 'REG-20240719-YU0NIF', 13, 'dr. robert', '1721381335.jpeg', '2024-07-16', '2024-07-19 02:28:55', '2024-07-19 02:28:55'),
(7, 'REG-20240719-BQPNQR', 14, 'dr. yuwono', '1721383762.jpg', '2024-07-17', '2024-07-19 03:09:22', '2024-07-19 03:09:22'),
(8, 'REG-20240719-CSLVVQ', 15, 'dr. Hendradi', '1721384161.jpg', '2024-07-17', '2024-07-19 03:16:01', '2024-07-19 03:16:01'),
(9, 'REG-20240719-8BVLAR', 16, 'dr. yuwono', '1721384423.jpg', '2024-07-16', '2024-07-19 03:20:23', '2024-07-19 03:20:23'),
(10, 'REG-20240719-RKT5IJ', 17, 'dr. Yuwono', '1721384756.jpg', '2024-07-16', '2024-07-19 03:25:56', '2024-07-19 03:25:56'),
(11, 'REG-20240719-EVF8MK', 18, 'Dr Bejo', '1721386763.jpg', '2024-07-19', '2024-07-19 03:59:23', '2024-07-19 03:59:23'),
(12, 'REG-20240719-WGAIPC', 19, 'Dr Bejo', '1721387510.jpg', '2024-07-19', '2024-07-19 04:11:50', '2024-07-19 04:11:50');

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
('8asuPd4GNCKLimKfBYZUrI3uM2hKj1QJ0dSGongc', 32, '172.20.10.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWThINmhBY1RKME5mOWJLdHFEd0RwMGVuTUxRMWRzR2hlN0VoTEdwMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly8xNzIuMjAuMTAuNDo4MDAwL3Bhc2llbi9wZW5kYWZ0YXJhbnBlbWVyaWtzYWFuL2xpc3QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozMjtzOjY6InN0YXR1cyI7czozOiJ5ZXMiO30=', 1721381335),
('8n0aLOygvzI1hAqWdFMmuGCeCE87CrQm5kCrDUAV', 18, '192.168.1.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:128.0) Gecko/20100101 Firefox/128.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiME4zNXFhR1pENDJDb2xxa1RxdUlWUWJ5T0Vua1AwTHVpcXNjZzhObCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly8xOTIuMTY4LjEuMjI3OjgwMDAva2FyeWF3YW4vdHJhbnNha3NpcGVtZXJpa3NhYW4vbGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE4O3M6Njoic3RhdHVzIjtzOjM6InllcyI7fQ==', 1721387685),
('f6rDSJkLfD7JgUOMZ825pahHsMzflXFKPhTJwsut', 18, '172.20.10.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSmJsSTdwbFB3S1JtTmw3QUgzZTRTajM2bkFVZ2x0MDlrNlV1UmhYSSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYyOiJodHRwOi8vMTcyLjIwLjEwLjQ6ODAwMC9rYXJ5YXdhbi9wZW5kYWZ0YXJhbnBlbWVyaWtzYWFuLzYvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE4O3M6Njoic3RhdHVzIjtzOjM6InllcyI7fQ==', 1721381376),
('hgjFWPlzIPUDSPnzROg9Y7gDqaz4i1k6XCeEYytP', 30, '172.20.10.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieDJHc3oxSXl4MjVBSXJZMnNrZVViOTN4S0J6N2pSNFZwWkp6ZlJuQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly8xNzIuMjAuMTAuNDo4MDAwL3Bhc2llbi90cmFuc2Frc2lwZW1lcmlrc2Fhbi9saXN0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MzA7czo2OiJzdGF0dXMiO3M6MzoieWVzIjt9', 1721379622),
('tjvliMdEk3RqKKGqDVbVpTojUFVVTWTzk9x3AAjP', 38, '192.168.1.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZFBpb3kwNHR2Y0VVMUJyNTU3WUFTNGs2WWlEMERTb3lOeUtOaWFWVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly8xOTIuMTY4LjEuMjI3OjgwMDAvcGFzaWVuL3BlbmRhZnRhcmFucGVtZXJpa3NhYW4vbGlzdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM4O3M6Njoic3RhdHVzIjtzOjM6InllcyI7fQ==', 1721387511);

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
(1, 'TRX-20240719-Z8DHK3', 1, 'REG-20240719-AIABFT', 2, 7, '2024-07-18', '-', '-', '2024-07-19 01:20:06', '2024-07-19 03:51:03'),
(2, 'TRX-20240719-Y31QRE', 2, 'REG-20240719-XUF55Q', 2, 5, '2024-07-18', '-', '-', '2024-07-19 01:36:34', '2024-07-19 02:39:08'),
(3, 'TRX-20240719-T0KYPX', 3, 'REG-20240719-03NSYS', 2, 7, '2024-07-18', '-', '-', '2024-07-19 01:45:17', '2024-07-19 02:39:26'),
(4, 'TRX-20240719-5JP7IQ', 4, 'REG-20240719-QZODH6', 2, 6, '2024-07-16', '-', '-', '2024-07-19 01:54:40', '2024-07-19 02:39:42'),
(5, 'TRX-20240719-XX0Q7V', 5, 'REG-20240719-FXPU0F', 2, 5, '2024-07-18', '-', '-', '2024-07-19 02:11:50', '2024-07-19 02:39:59'),
(6, 'TRX-20240719-VVKPS1', 6, 'REG-20240719-YU0NIF', 2, 4, '2024-07-16', NULL, NULL, '2024-07-19 03:02:57', '2024-07-19 03:02:57'),
(7, 'TRX-20240719-DAVVVC', 7, 'REG-20240719-BQPNQR', 2, 4, '2024-07-17', NULL, NULL, '2024-07-19 03:10:11', '2024-07-19 03:10:11'),
(8, 'TRX-20240719-3OA5EJ', 8, 'REG-20240719-CSLVVQ', 2, 5, '2024-07-17', NULL, NULL, '2024-07-19 03:16:34', '2024-07-19 03:16:34'),
(9, 'TRX-20240719-SXWRIX', 9, 'REG-20240719-8BVLAR', 2, 6, '2024-07-16', NULL, NULL, '2024-07-19 03:20:55', '2024-07-19 03:20:55'),
(10, 'TRX-20240719-X06FTW', 10, 'REG-20240719-RKT5IJ', 2, 5, '2024-07-16', NULL, NULL, '2024-07-19 03:26:17', '2024-07-19 03:26:17'),
(11, 'TRX-20240719-3XV5IY', 11, 'REG-20240719-EVF8MK', 2, 4, '2024-07-19', '-', '-', '2024-07-19 03:59:43', '2024-07-19 04:00:21'),
(12, 'TRX-20240719-26LPPA', 12, 'REG-20240719-WGAIPC', 2, 4, '2024-07-19', NULL, NULL, '2024-07-19 04:12:17', '2024-07-19 04:12:17');

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
(1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$Vjgsq4Q7Poqb5LV.82CrfeRDilDu.IJiijI6POaVTUHNXPOqgQyIG', 'active', 'HmKup1YFaQTWqCOvhRHKKu5ljtKUPBinqjTtW0KoldUFFj8yB74oBwMobkzV', '2024-06-13 23:03:41', '2024-06-13 23:03:41'),
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
(20, 'Helga', 'helga@gmail.com', 'pasien', NULL, '$2y$12$DA/6HLQp5f0yDRUFXqAXbO6AG1PkFEHA20RXaFJIp9It0jKbC/Es2', 'active', NULL, '2024-06-25 04:16:24', '2024-06-25 04:16:24'),
(21, 'Philip Leman', 'leman@gmail.com', 'pasien', NULL, '$2y$12$tqHLTK54LvyUbRpS8FgOSOXkF9tYE10YE7j0VWN2Rh0qtVEw0rFby', 'active', NULL, '2024-07-06 06:01:50', '2024-07-06 06:01:50'),
(22, 'OWEN AGITZA JAYA. TN', 'owen@gmail.com', 'pasien', NULL, '$2y$12$zB7nsQyHCrxJduxXFBkeR.yllaYKGQNS7BxRN08G6KiV.p6SwrIEy', 'active', NULL, '2024-07-18 21:59:42', '2024-07-18 21:59:42'),
(23, 'Dian', 'dianutami@gmail.com', 'pasien', NULL, '$2y$12$JsejpOdLNeBvRS67tVsBtuRwTWgSqWia97A6WsT7/Oer4ReLh.cba', 'active', NULL, '2024-07-18 22:42:24', '2024-07-18 22:42:24'),
(24, 'Dian', 'dian@gmail.com', 'dokter', NULL, '$2y$12$sM8CHN.aSmqiFSI9CdAr2ez9mhOJ20gxL5NsrJAanKWRx4FHVOgUO', 'active', '0t2pKHoqWfGn5TWM73EXVqjoqWJtJt2qCRzeh3PQoDGIPT7kwXlzXr5AqiOb', '2024-07-18 22:49:39', '2024-07-18 22:49:39'),
(25, 'Inge', 'inge@gmail.com', 'dokter', NULL, '$2y$12$96mo9.hnfKykA8DdTBH7BuB/5H/dSeRXRsuX4plvmB1b3768NgHyG', 'active', NULL, '2024-07-18 22:50:11', '2024-07-18 22:50:11'),
(26, 'Annisa', 'annisa@gmail.com', 'dokter', NULL, '$2y$12$hlA20ociqNQ8gpeDrROFTO0DppXoV19gtRMxgrV4tmECUhjOWVEJq', 'active', NULL, '2024-07-18 22:50:34', '2024-07-18 22:50:34'),
(27, 'Jefry', 'jefry@gmail.com', 'dokter', NULL, '$2y$12$1L5mJEaYeE8cNRYjbrCsSunQtb8z/2KlCggIai1bhOp2zK1L0D7B2', 'active', NULL, '2024-07-18 22:50:53', '2024-07-18 22:50:53'),
(28, 'SONI KURNIAWAN. TN', 'soni@gmail.com', 'pasien', NULL, '$2y$12$iQn5BZ4Iw.bX86blZt/BAu3XsuS/vmWxs.0MX1FyfoZdlV/WCNoCa', 'active', NULL, '2024-07-19 01:25:46', '2024-07-19 01:25:46'),
(29, 'DODIK HANDOKO. TN', 'dodik@gmail.com', 'pasien', NULL, '$2y$12$7kFslp4sSH/.uA5m9ezNqu14Pyq3yKQC6kuW.u/DZl8295RUDgQb2', 'active', NULL, '2024-07-19 01:39:31', '2024-07-19 01:39:31'),
(30, 'CHRISTIAN ASALI', 'christian@gmail.com', 'pasien', NULL, '$2y$12$AtAY6EDG8QDNhqjTzTg2UeZBvUoonnApziukmjgVuMh8xiCeE7iMq', 'active', NULL, '2024-07-19 01:49:47', '2024-07-19 01:49:47'),
(31, 'ANDREW', 'andrew@gmail.com', 'pasien', NULL, '$2y$12$Ym.XrztsFoo/oUZ7wVXje.7Z.3WlF7FdOxfPhISRvIrdsgFi0MV5u', 'active', NULL, '2024-07-19 02:06:30', '2024-07-19 02:06:30'),
(32, 'ULAN APRIANI MANURUNG. NN', 'ulan@gmail.com', 'pasien', NULL, '$2y$12$JcKIUW9X7FUs93aHkWU72eOP2Amt6jcYVEtudIL7KHyLI6HH9dYxy', 'active', NULL, '2024-07-19 02:16:20', '2024-07-19 02:16:20'),
(33, 'GETRIDA', 'getrida@gmail.com', 'pasien', NULL, '$2y$12$5OoQAZo6QXxyIUslU2piJu6YyCjPP565Py.5vmkP5O36MgtbuacCG', 'active', NULL, '2024-07-19 03:05:10', '2024-07-19 03:05:10'),
(34, 'KANIT PIMTHAISONG', 'kanit@gmail.com', 'pasien', NULL, '$2y$12$3Zm8bqiDMrPVS/0P.VEh1e.0akqqnFXSI3LbWn0lJE2fEXPNJBAiy', 'active', NULL, '2024-07-19 03:11:34', '2024-07-19 03:11:34'),
(35, 'NGUI SAU JIN', 'ngui@gmail.com', 'pasien', NULL, '$2y$12$8srJSjafPo3/QvynOIZ9iOuCA1mIt1vQGoPP1d1GWIwLE84iSF7dq', 'active', NULL, '2024-07-19 03:17:22', '2024-07-19 03:17:22'),
(36, 'LAURA ARDHIANI', 'laura@gmail.com', 'pasien', NULL, '$2y$12$2A1VWv2nT4dVHauL/dwzcOIg/qtbRxGoil4eSauRxWvuV2VLlWJDW', 'active', NULL, '2024-07-19 03:21:50', '2024-07-19 03:21:50'),
(37, 'Phantom', 'phantom@gmail.com', 'pasien', NULL, '$2y$12$pdtCQ.MIO92IqoYF.9RG.e8OmdB0IrlXkVeV67KvQHzDozicPV3Tq', 'active', NULL, '2024-07-19 03:57:14', '2024-07-19 03:57:14'),
(38, 'Phantom 2', 'phantom2@gmail.com', 'pasien', NULL, '$2y$12$2zNH2uPxvSjDmCbpTXfACOgqsjtYYBEpr/U6BKbU1YD3z06lz3/zK', 'active', NULL, '2024-07-19 04:09:16', '2024-07-19 04:09:16');

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
  ADD UNIQUE KEY `detail_hasil_pemeriksaan_uuid_unique` (`uuid`),
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
  ADD UNIQUE KEY `detail_transaksi_pemeriksaan_uuid_unique` (`uuid`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pendaftaran_pemeriksaan`
--
ALTER TABLE `detail_pendaftaran_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi_pemeriksaan`
--
ALTER TABLE `detail_transaksi_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `dicom`
--
ALTER TABLE `dicom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_pemeriksaan`
--
ALTER TABLE `jenis_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `modalitas`
--
ALTER TABLE `modalitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_pemeriksaan`
--
ALTER TABLE `pendaftaran_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
