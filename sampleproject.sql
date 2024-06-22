-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2024 pada 19.49
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
('admin@lms.com|127.0.0.1:timer', 'i:1718609214;', 1718609214);

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
(5, 10, 1, '14:32:00', '16:32:00', 'ya', '', '2024-06-20 22:32:47', '2024-06-20 22:32:47'),
(6, 10, 2, '17:32:00', '18:32:00', 'ya', '', '2024-06-20 22:32:47', '2024-06-20 22:32:47'),
(9, 12, 1, '18:19:00', '19:19:00', 'ya', '', '2024-06-21 00:20:00', '2024-06-21 00:20:00'),
(10, 12, 2, '14:19:00', '16:19:00', 'ya', '', '2024-06-21 00:20:00', '2024-06-21 00:20:00'),
(11, 13, 1, '19:26:00', '20:26:00', 'ya', '', '2024-06-21 02:27:32', '2024-06-21 02:27:32'),
(12, 13, 2, '21:26:00', '22:27:00', 'ya', '', '2024-06-21 02:27:32', '2024-06-21 02:27:32'),
(13, 14, 3, '19:38:00', '20:38:00', 'ya', '', '2024-06-21 05:39:19', '2024-06-21 05:39:19'),
(14, 14, 4, '20:38:00', '21:38:00', 'ya', '', '2024-06-21 05:39:19', '2024-06-21 05:39:19'),
(15, 14, 5, '12:38:00', '23:38:00', 'ya', '', '2024-06-21 05:39:19', '2024-06-21 05:39:19'),
(17, 15, 5, '08:26:00', '10:26:00', 'tidak', 'Menunggu Approval', '2024-06-21 20:27:07', '2024-06-21 20:27:07'),
(21, 17, 5, '11:38:00', '12:38:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(22, 17, 4, '01:38:00', '02:38:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(23, 17, 1, '02:38:00', '03:38:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(24, 17, 2, '03:38:00', '04:38:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(25, 17, 3, '04:40:00', '05:40:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(26, 18, 3, '08:00:00', '09:00:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(27, 18, 5, '09:00:00', '10:00:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(28, 18, 1, '10:00:00', '11:00:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(29, 18, 2, '11:00:00', '12:00:00', 'tidak', 'Menunggu Approval', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(47, 19, 3, '18:22:00', '19:22:00', 'tidak', 'Menunggu Approval', '2024-06-22 04:22:45', '2024-06-22 04:22:45'),
(48, 19, 5, '19:22:00', '20:22:00', 'tidak', 'Menunggu Approval', '2024-06-22 04:22:45', '2024-06-22 04:22:45'),
(49, 19, 2, '20:22:00', '21:22:00', 'tidak', 'Menunggu Approval', '2024-06-22 04:22:45', '2024-06-22 04:22:45'),
(50, 20, 3, '09:00:00', '22:00:00', 'tidak', 'Menunggu Approval', '2024-06-22 04:52:18', '2024-06-22 04:52:18'),
(51, 20, 5, '22:30:00', '23:30:00', 'tidak', 'Menunggu Approval', '2024-06-22 04:52:18', '2024-06-22 04:52:18'),
(56, 11, 5, '15:40:00', '16:40:00', 'ya', 'Lanjut Proses', '2024-06-22 06:58:59', '2024-06-22 06:58:59'),
(57, 11, 1, '19:40:00', '21:40:00', 'ya', 'Lanjut Proses pemeriksaan', '2024-06-22 06:58:59', '2024-06-22 06:58:59'),
(58, 16, 1, '08:00:00', '10:00:00', 'ya', 'Lanjut Proses Pemeriksaan', '2024-06-22 07:03:22', '2024-06-22 07:03:22'),
(59, 16, 4, '07:00:00', '08:00:00', 'ya', 'Lanjut Proses Pemeriksaan', '2024-06-22 07:03:22', '2024-06-22 07:03:22'),
(60, 16, 5, '09:00:00', '10:00:00', 'ya', 'Lanjut Proses Pemeriksaan', '2024-06-22 07:03:22', '2024-06-22 07:03:22'),
(61, 16, 2, '11:00:00', '12:00:00', 'ya', 'Lanjut Proses Pemeriksaan', '2024-06-22 07:03:22', '2024-06-22 07:03:22');

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
(2, '234.56.7.23', '255.255.255.33', 'retrieve', 'retrieve', '12333', 2033, '2024-06-17 04:52:25', '2024-06-17 05:04:37');

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
(1, 12, 123456789123456789, 'pria', 'Penyakit Dalam', '1987-11-08', 'Jl Kembangan Raya no3. Kelurahan Sukabumi', 'Jakarta Barat', '0878123456789', '0218873456', '1718592676.jpg', '2024-06-16 19:51:16', '2024-06-16 19:51:16');

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
(18, '2024_06_20_052449_alter_add_no_pendaftaran_pemeriksaan', 5);

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
(1, 'CT123', 'usg', 'Robot23', 'ct123', '12345623', '234.56.7.23', '34523', '2024-06-16 22:02:19', '2024-06-17 02:15:34'),
(2, 'Radio1', 'radiografi', 'Exe', 'Rad1', '12345', '3456789', '23456', '2024-06-16 22:05:03', '2024-06-16 22:05:03'),
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
(2, 14, 'Medan', '2024-06-25', 3123456789123456, 'KTP', 'pria', 'Sales', 'Jl Kenangan Indah 12 Pademangan', 'Jakarta Utara', 'ceraihidup', 'katholik', '0213214525', '087812314145', 'Agus', '1241414251', 'Indonesia', 'Tidak ada', 'A-', 199, 87, '1719027629.jpg', '2024-06-21 20:40:29', '2024-06-21 20:40:29');

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
(11, 'REG-20240621-8GX0ET', 1, 'Dr Bagas Kurniawan', '1719061370.pdf', '2024-06-25', '2024-06-20 23:42:57', '2024-06-22 06:02:51'),
(12, 'REG-20240621-TG1VYL', 1, 'Dr Rusniati', '1718954400.pdf', '2024-07-02', '2024-06-21 00:20:00', '2024-06-21 00:20:00'),
(13, 'REG-20240621-TEMWSY', 1, 'Dr Aniati', '1718962052.pdf', '2024-06-24', '2024-06-21 02:27:32', '2024-06-21 02:27:32'),
(14, 'REG-20240621-JQCYXQ', 1, 'Dr Rusdi', '1718973558.pdf', '2024-06-25', '2024-06-21 05:39:19', '2024-06-21 05:39:19'),
(15, 'REG-20240622-CCNYIS', 1, 'Dr Salim', '1719026827.pdf', '2024-06-30', '2024-06-21 20:27:07', '2024-06-21 20:27:07'),
(16, 'REG-20240622-28KA7I', 2, 'Dr Aniati Sudirman Latif', '1719033093.pdf', '2024-07-05', '2024-06-21 20:42:29', '2024-06-21 22:11:33'),
(17, 'REG-20240622-S5NGPG', 1, 'Dr Karni', '1719031321.pdf', '2024-06-28', '2024-06-21 21:42:02', '2024-06-21 21:42:02'),
(18, 'REG-20240622-E4QRCX', 2, 'Dr Alias', '1719031480.pdf', '2024-07-01', '2024-06-21 21:44:40', '2024-06-21 21:44:40'),
(19, 'REG-20240622-DVWCDL', 1, 'Dr Wijaya', '1719055365.pdf', '2024-06-23', '2024-06-22 04:22:45', '2024-06-22 04:22:45'),
(20, 'REG-20240622-BJ4CBJ', 1, 'Dr Sylvia', '1719057138.pdf', '2024-06-24', '2024-06-22 04:52:18', '2024-06-22 04:52:18');

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
('08s5ZtECGs4dC1XSNTIEwpGRP4cPR7uFcMCrVYgW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidUZEQXJkSlZrSmcxckJiTmxTWjR3YnowVTU5bUxybzJvc3JGNndrayI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2MToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2thcnlhd2FuL3BlbmRhZnRhcmFucGVtZXJpa3NhYW4vMTEvZWRpdCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAva2FyeWF3YW4vcGVuZGFmdGFyYW5wZW1lcmlrc2Fhbi8xMS9lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1719062846),
('1xOdY8D4JlVSCvWs9k3e3m3EbXFugiRUpBmtGllk', 18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic1dlVXhxb3FHY2d2anlaTnJmdXdXZG0xMlVOcDg2RUZYYVpHM0tEeCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAva2FyeWF3YW4vcGVuZGFmdGFyYW5wZW1lcmlrc2Fhbi8xMS9lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTg7fQ==', 1719062296),
('GVEoGKySSt0Qy359p2TqDBIo4s8HGMtFNMtRXClL', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiampOMHNkSU9pOHBiWnpWTHlRRkc0elRVWUtwblkzZHdyeGRPVUhONyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wYXNpZW4vcGVuZGFmdGFyYW5wZW1lcmlrc2Fhbi9saXN0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTQ7czo2OiJzdGF0dXMiO3M6MzoieWVzIjt9', 1719065045),
('PVBGXUAlECOIKm7Z6rhbVV4PNgDDBSz2IseiVI9D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVhvSDgwb2tjYmhrM2pReWhkWHRoVjV3Z2RhSDFDaUJvbmVrUmNWaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719062846),
('zL415Qpi6msoe8RXgm5y9BNQZCHAQ1eTzaVAhjOE', 13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidzJ0R2VodUFPSXlSY1ZuMmtqNGFVVnFvQXEzQmMzRDVxMnBLMDZjdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9rYXJ5YXdhbi9wZW5kYWZ0YXJhbnBlbWVyaWtzYWFuL2xpc3QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMztzOjY6InN0YXR1cyI7czozOiJ5ZXMiO30=', 1719065007);

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
(1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$Vjgsq4Q7Poqb5LV.82CrfeRDilDu.IJiijI6POaVTUHNXPOqgQyIG', 'active', 'vTpfQ0PHgcIz17GBwofj3D8Nz22dkIigeFEoLelFrI55PHx4NABnPGhncuOY', '2024-06-13 23:03:41', '2024-06-13 23:03:41'),
(2, 'Reinert Yosua Rumagit', 'reinertyosuarumagit@gmail.com', 'pasien', NULL, '$2y$12$HRe122h3MIOyK4.lcST2EOx3s7O0jlCQ8OseUyIOA5MqJLYSZjt1O', 'active', NULL, '2024-06-14 00:36:10', '2024-06-14 00:36:10'),
(3, 'Andi Wijaya Sukma', 'andi2@gmail.com', 'dokter', NULL, '$2y$12$nV7pMprj6GphypRSSMpAKOx/6yD8/1NpLiIQx95tyCTJrxsjipLtS', 'active', NULL, '2024-06-14 02:24:51', '2024-06-15 05:17:18'),
(4, 'Richard', 'richard@gmail.com', 'pasien', NULL, '$2y$12$zCbgi3njIxTlXCKvZgsIFutdrgw13a2Hazz8xjiiDd0g7QqacOdva', 'active', 'n3pyUuRHy89EKicESU0BKsnuuve0FEnzRynEk8CExEZvxBSGAmPQNXGBlyk3', '2024-06-15 03:46:22', '2024-06-15 03:46:22'),
(12, 'Agung', 'agung@gmail.com', 'dokter', NULL, '$2y$12$jDlbqlzD9CT4diyhPFqIku9gOGks3IGgUmFeOoBPq4kVfEYbOF7E6', 'active', NULL, '2024-06-15 04:08:14', '2024-06-15 04:08:14'),
(13, 'Ester Wijaya', 'ester@gmail.com', 'karyawan', NULL, '$2y$12$RpKJvxomzMhz6FKISvQo0eU7hjCacsBrj0f7dhamJ90z/Mi2coa.G', 'active', NULL, '2024-06-15 05:58:36', '2024-06-15 05:58:36'),
(14, 'Budi Sukma', 'budi@gmail.com', 'pasien', NULL, '$2y$12$KeM2c9fFMVGMb4AWXR.g9.38loZ8W6WcEJVvjltvgFWIp73Qqa21u', 'active', NULL, '2024-06-15 06:05:51', '2024-06-15 06:05:51'),
(15, 'Joko Sutanto', 'joko@gmail.com', 'dokter', NULL, '$2y$12$g64krfsxCm0/9pNNtgcmlOLO32dQNGGRwAJYpa.M2f7U6OZgCfrw6', 'active', NULL, '2024-06-15 11:33:56', '2024-06-15 11:33:56'),
(16, 'Budi Kusuma', 'budikusuma@gmail.com', 'karyawan', NULL, '$2y$12$ns2kKExdL3FawcMlQ8DDP..YPkEOhZaa7ycLcIjtqMknvHhJY0bqO', 'active', NULL, '2024-06-16 21:14:55', '2024-06-16 21:14:55'),
(17, 'Kevin Sanjaya', 'kevin@gmail.com', 'pasien', NULL, '$2y$12$kWNFgZCvkp9STvB7x2oeCeRVnJ1vTAf3Tas0eifNoQ3OP7n03Sk5.', 'active', NULL, '2024-06-16 21:15:35', '2024-06-16 21:15:35'),
(18, 'Edo Bagus', 'edo@gmail.com', 'karyawan', NULL, '$2y$12$Ogu.ItgqmIigDSEtrFsImeaMUpKkzMBIjIHpvHi0eWUUvKQAG.PNW', 'active', NULL, '2024-06-16 21:17:44', '2024-06-16 21:17:44');

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
-- Indeks untuk tabel `detail_pendaftaran_pemeriksaan`
--
ALTER TABLE `detail_pendaftaran_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pendaftaran_pemeriksaan_iddaftarpemeriksaan_foreign` (`idDaftarPemeriksaan`),
  ADD KEY `detail_pendaftaran_pemeriksaan_idjenispemeriksaan_foreign` (`idJenisPemeriksaan`);

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
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `detail_pendaftaran_pemeriksaan`
--
ALTER TABLE `detail_pendaftaran_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `dicom`
--
ALTER TABLE `dicom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `modalitas`
--
ALTER TABLE `modalitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_pemeriksaan`
--
ALTER TABLE `pendaftaran_pemeriksaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pendaftaran_pemeriksaan`
--
ALTER TABLE `detail_pendaftaran_pemeriksaan`
  ADD CONSTRAINT `detail_pendaftaran_pemeriksaan_iddaftarpemeriksaan_foreign` FOREIGN KEY (`idDaftarPemeriksaan`) REFERENCES `pendaftaran_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pendaftaran_pemeriksaan_idjenispemeriksaan_foreign` FOREIGN KEY (`idJenisPemeriksaan`) REFERENCES `jenis_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
