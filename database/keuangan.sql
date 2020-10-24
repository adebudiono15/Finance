-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Okt 2020 pada 22.56
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bank` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `nama_bank`, `created_at`, `updated_at`) VALUES
(4, 'BRI', '2020-10-15 08:55:29', '2020-10-15 08:55:29'),
(9, 'BNI', '2020-10-15 09:30:59', '2020-10-15 09:30:59'),
(10, 'BCA', '2020-10-19 08:58:54', '2020-10-19 08:58:54'),
(11, 'Mandiri', '2020-10-19 08:59:39', '2020-10-19 08:59:39'),
(12, 'Panin', '2020-10-19 08:59:59', '2020-10-19 08:59:59'),
(13, 'Lainnya', '2020-10-21 02:12:53', '2020-10-21 02:13:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `created_at`, `updated_at`) VALUES
(5, 'Dobha 6 ml - Lusin', 110000, '2020-10-19 09:05:55', '2020-10-19 09:05:55'),
(6, 'Dobha 35 ml - Lusin', 276000, '2020-10-19 09:06:27', '2020-10-19 09:06:46'),
(10, 'Parfum Lovely (Kg)', 400000, '2020-10-23 06:26:36', '2020-10-23 06:26:52'),
(15, 'save dari piutang', 1000, '2020-10-24 20:53:46', '2020-10-24 20:53:46'),
(16, 'Save lagi', 2000, '2020-10-24 20:54:09', '2020-10-24 20:54:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_customer` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `contact_person`, `created_at`, `updated_at`) VALUES
(5, 'CS3641', 'Toko Abu Ali', 'Jakarta Timur', '098765432', 'abuali@gmail.com', 'Ibu Syeha', '2020-10-19 09:03:39', '2020-10-21 01:58:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(7, 'IT Dev', '2020-09-21 23:04:04', '2020-10-15 11:09:16'),
(8, 'Purchasing', '2020-09-23 19:12:37', '2020-09-23 19:12:37'),
(9, 'Percetakan', '2020-09-23 19:12:48', '2020-09-23 19:12:48'),
(10, 'Produksi', '2020-09-23 19:12:57', '2020-09-23 19:12:57'),
(12, 'Marketing Online', '2020-09-23 19:13:13', '2020-10-21 02:10:57'),
(13, 'Marhaban Store', '2020-09-23 19:13:54', '2020-09-23 19:13:54'),
(14, 'Marhaban Perfume', '2020-09-23 19:14:10', '2020-09-23 19:14:10'),
(17, 'Trainning', '2020-09-23 19:28:44', '2020-09-23 19:28:44'),
(18, 'Keuangan', '2020-09-23 19:39:58', '2020-09-23 19:39:58'),
(21, 'Manajemen', '2020-10-09 01:12:54', '2020-10-09 01:12:54'),
(22, 'Business Dev', '2020-10-15 11:10:05', '2020-10-15 11:10:05'),
(23, 'Marketing Offline', '2020-10-21 02:10:42', '2020-10-21 02:10:42');

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
-- Struktur dari tabel `history_hutang`
--

CREATE TABLE `history_hutang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hutang` bigint(20) NOT NULL,
  `kode_hutang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `history_hutang`
--

INSERT INTO `history_hutang` (`id`, `hutang`, `kode_hutang`, `total_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 2, 'MT22102091', 320000, '2020-10-22 16:35:24', '2020-10-22 16:35:24'),
(2, 2, 'MT22102091', 500000, '2020-10-22 16:35:39', '2020-10-22 16:35:39'),
(3, 3, 'MT22102011', 662000, '2020-10-22 16:36:33', '2020-10-22 16:36:33'),
(4, 4, 'MT23102040', 20000000, '2020-10-23 06:32:07', '2020-10-23 06:32:07'),
(5, 4, 'MT23102040', 20000000, '2020-10-23 06:32:21', '2020-10-23 06:32:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_piutang`
--

CREATE TABLE `history_piutang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `piutang` bigint(20) NOT NULL,
  `kode_piutang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `history_piutang`
--

INSERT INTO `history_piutang` (`id`, `piutang`, `kode_piutang`, `total_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 31, 'MT22102064', 2000, '2020-10-22 13:55:51', '2020-10-22 13:55:51'),
(2, 31, 'MT22102064', 8000, '2020-10-22 13:57:37', '2020-10-22 13:57:37'),
(3, 31, 'MT22102064', 10000, '2020-10-22 14:18:26', '2020-10-22 14:18:26'),
(4, 31, 'MT22102064', 90000, '2020-10-22 15:58:39', '2020-10-22 15:58:39'),
(5, 33, 'MT23102049', 10000000, '2020-10-23 06:20:40', '2020-10-23 06:20:40'),
(6, 33, 'MT23102049', 3760000, '2020-10-23 06:21:38', '2020-10-23 06:21:38'),
(7, 32, 'MT22102084', 476000, '2020-10-24 11:21:55', '2020-10-24 11:21:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_hutang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_supplier_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisa` bigint(20) DEFAULT NULL,
  `barang` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id`, `tanggal`, `kode_hutang`, `nama_supplier_id`, `sisa`, `barang`, `grand_total`, `created_at`, `updated_at`) VALUES
(2, '2020-10-22', 'MT22102091', 'PT. MANE', 500000, '[\"5\"]', 1320000, '2020-10-21 17:00:00', '2020-10-22 16:35:39'),
(3, '2020-10-22', 'MT22102011', 'PT. MANE', 0, '[\"6\",\"6\",\"5\"]', 662000, '2020-10-21 17:00:00', '2020-10-22 16:36:33'),
(4, '2020-10-23', 'MT23102040', 'PT. MANE', 0, '[\"10\"]', 40000000, '2020-10-22 17:00:00', '2020-10-23 06:32:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang_line`
--

CREATE TABLE `hutang_line` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hutang` bigint(20) NOT NULL,
  `barang` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hutang_line`
--

INSERT INTO `hutang_line` (`id`, `hutang`, `barang`, `harga`, `qty`, `grand_total`, `created_at`, `updated_at`) VALUES
(2, 2, 5, 110000, 12, 1320000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(3, 3, 6, 276000, 1, 276000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(4, 3, 6, 276000, 1, 276000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(5, 3, 5, 110000, 1, 110000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(6, 4, 10, 400000, 100, 40000000, '2020-10-22 17:00:00', '2020-10-22 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pendapatan`
--

CREATE TABLE `jenis_pendapatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_pendapatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_pendapatan`
--

INSERT INTO `jenis_pendapatan` (`id`, `nama_jenis_pendapatan`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Penjualan Tunai', '2', '2020-10-19 09:08:40', '2020-10-19 09:18:07'),
(6, 'Penjualan Bank', 'bank', '2020-10-19 09:08:58', '2020-10-19 09:18:23'),
(7, 'Pendapatan Lain-Lain', 'tunai', '2020-10-19 09:09:47', '2020-10-19 09:09:47'),
(8, 'Pendapatan Piutang', 'tunai', '2020-10-19 09:10:57', '2020-10-19 09:10:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_pengeluaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id`, `nama_jenis_pengeluaran`, `created_at`, `updated_at`) VALUES
(7, 'Purchasing', '2020-10-19 09:11:21', '2020-10-19 09:18:44'),
(8, 'Operasional', '2020-10-19 09:11:42', '2020-10-19 09:18:57'),
(9, 'Penggajian', '2020-10-19 09:19:46', '2020-10-19 09:19:46'),
(10, 'Prive', '2020-10-19 09:20:05', '2020-10-19 09:20:05'),
(11, 'Pembayaran Hutang', '2020-10-19 09:22:13', '2020-10-19 09:22:13');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_10_15_133801_create_bank_table', 1),
(9, '2020_10_15_163517_create_jenis_pengeluaran_table', 2),
(10, '2020_10_15_173400_create_jenis_pendapatan_table', 3),
(11, '2020_10_15_175028_create_divisi_table', 4),
(12, '2020_10_15_181855_create_customer_table', 5),
(13, '2020_10_15_195446_create_supplier_table', 6),
(14, '2020_10_15_210431_create_barang_table', 7),
(15, '2020_10_16_053435_create_pendapatan_bank_table', 8),
(16, '2020_10_17_012611_create_pendapatan_tunai_table', 9),
(17, '2020_10_17_023825_create_pengeluaran_bank_table', 10),
(18, '2020_10_17_025447_create_pengeluaran_tunai_table', 11),
(23, '2020_10_22_001201_create_piutang_table', 12),
(24, '2020_10_22_001429_create_piutang_line_table', 12),
(25, '2020_10_22_190950_create_history_piutang_table', 13),
(26, '2020_10_22_231337_create_hutang_table', 14),
(27, '2020_10_22_231347_create_hutang_line_table', 14),
(28, '2020_10_22_231405_create_history_hutang_table', 14);

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
-- Struktur dari tabel `pendapatan_bank`
--

CREATE TABLE `pendapatan_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pendapatan_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pendapatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pendapatan` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendapatan_bank`
--

INSERT INTO `pendapatan_bank` (`id`, `kode_pendapatan_bank`, `tanggal`, `jenis_pendapatan`, `jumlah_pendapatan`, `keterangan`, `bank`, `divisi`, `created_at`, `updated_at`) VALUES
(18, 'MB19102069', '2020-10-19', 'Pendapatan Lain-lain', 22500000, 'Abdul Hamid', 'BNI', 'Marketing', '2020-10-18 21:58:25', '2020-10-19 23:25:16'),
(19, 'MB21102052', '2020-10-21', 'Penjualan Bank', 10000000, 'Ibrahim', 'Lainnya', 'Marketing Online', '2020-10-21 02:12:33', '2020-10-21 02:13:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan_tunai`
--

CREATE TABLE `pendapatan_tunai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pendapatan_tunai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pendapatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pendapatan` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendapatan_tunai`
--

INSERT INTO `pendapatan_tunai` (`id`, `kode_pendapatan_tunai`, `tanggal`, `jenis_pendapatan`, `jumlah_pendapatan`, `keterangan`, `divisi`, `created_at`, `updated_at`) VALUES
(5, 'MT21102061', '2020-10-21', 'Penjualan Tunai', 2000000, '-', 'Marhaban Perfume', '2020-10-21 02:07:50', '2020-10-21 02:08:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_bank`
--

CREATE TABLE `pengeluaran_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pengeluaran_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengeluaran` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengeluaran_bank`
--

INSERT INTO `pengeluaran_bank` (`id`, `kode_pengeluaran_bank`, `tanggal`, `jenis_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `bank`, `divisi`, `created_at`, `updated_at`) VALUES
(5, 'KB21102087', '2020-10-21', 'Purchasing', 1000000, 'Beli Lem', 'BCA', 'Produksi', '2020-10-21 02:15:23', '2020-10-21 02:15:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_tunai`
--

CREATE TABLE `pengeluaran_tunai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pengeluaran_tunai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengeluaran` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengeluaran_tunai`
--

INSERT INTO `pengeluaran_tunai` (`id`, `kode_pengeluaran_tunai`, `tanggal`, `jenis_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `divisi`, `created_at`, `updated_at`) VALUES
(5, 'KT21102085', '2020-10-21', 'Operasional', 20000, 'Photocopy', 'Percetakan', '2020-10-21 02:14:03', '2020-10-21 02:14:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_piutang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_customer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `sisa` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `piutang`
--

INSERT INTO `piutang` (`id`, `tanggal`, `kode_piutang`, `nama_customer_id`, `barang`, `grand_total`, `sisa`, `created_at`, `updated_at`) VALUES
(31, '2020-10-22', 'MT22102064', 'Toko Abu Ali', '[\"5\"]', 110000, 0, '2020-10-21 17:00:00', '2020-10-22 15:58:39'),
(32, '2020-10-22', 'MT22102084', 'Toko Abu Ali', '[\"5\",\"6\"]', 2476000, 2000000, '2020-10-21 17:00:00', '2020-10-24 11:21:55'),
(33, '2020-10-23', 'MT23102049', 'Toko Abu Ali', '[\"5\",\"6\"]', 13760000, 0, '2020-10-22 17:00:00', '2020-10-23 06:21:38'),
(34, '2020-10-25', 'MT25102068', 'Toko Abu Ali', '[\"10\",\"6\",\"10\",\"6\",\"10\",\"6\",\"5\",\"10\"]', 2538000, 2538000, '2020-10-24 17:00:00', '2020-10-24 19:12:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang_line`
--

CREATE TABLE `piutang_line` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `piutang` bigint(20) NOT NULL,
  `barang` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `piutang_line`
--

INSERT INTO `piutang_line` (`id`, `piutang`, `barang`, `harga`, `qty`, `grand_total`, `created_at`, `updated_at`) VALUES
(3, 30, 5, 110000, 1, 110000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(4, 30, 6, 276000, 1, 276000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(5, 30, 6, 276000, 1, 276000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(6, 31, 5, 110000, 1, 110000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(7, 32, 5, 110000, 20, 2200000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(8, 32, 6, 276000, 1, 276000, '2020-10-21 17:00:00', '2020-10-21 17:00:00'),
(9, 33, 5, 110000, 100, 11000000, '2020-10-22 17:00:00', '2020-10-22 17:00:00'),
(10, 33, 6, 276000, 10, 2760000, '2020-10-22 17:00:00', '2020-10-22 17:00:00'),
(11, 34, 10, 400000, 1, 400000, '2020-10-24 17:00:00', '2020-10-24 17:00:00'),
(12, 34, 6, 276000, 1, 276000, '2020-10-24 17:00:00', '2020-10-24 17:00:00'),
(13, 34, 10, 400000, 1, 400000, '2020-10-24 17:00:00', '2020-10-24 17:00:00'),
(14, 34, 6, 276000, 1, 276000, '2020-10-24 17:00:00', '2020-10-24 17:00:00'),
(15, 34, 10, 400000, 1, 400000, '2020-10-24 17:00:00', '2020-10-24 17:00:00'),
(16, 34, 6, 276000, 1, 276000, '2020-10-24 17:00:00', '2020-10-24 17:00:00'),
(17, 34, 5, 110000, 1, 110000, '2020-10-24 17:00:00', '2020-10-24 17:00:00'),
(18, 34, 10, 400000, 1, 400000, '2020-10-24 17:00:00', '2020-10-24 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_supplier` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat`, `telepon`, `email`, `contact_person`, `created_at`, `updated_at`) VALUES
(4, 'SP8026', 'PT. MANE', 'Jakarta', '08789876543', 'mane@mane.com', 'Peter', '2020-10-19 09:02:02', '2020-10-21 01:58:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'invictus', 'invictus', 'invictus@gmail.com', NULL, '$2y$10$yXOVVyjJRCeXWA2aOzrII.vgpaBd.Tldh.yRrRQHaqj6.OaZDSqVC', NULL, '2020-10-22 16:12:39', '2020-10-22 16:12:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_customer` (`kode_customer`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_hutang`
--
ALTER TABLE `history_hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_piutang`
--
ALTER TABLE `history_piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_hutang` (`kode_hutang`);

--
-- Indeks untuk tabel `hutang_line`
--
ALTER TABLE `hutang_line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pendapatan`
--
ALTER TABLE `jenis_pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pendapatan_bank`
--
ALTER TABLE `pendapatan_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pendapatan_bank` (`kode_pendapatan_bank`);

--
-- Indeks untuk tabel `pendapatan_tunai`
--
ALTER TABLE `pendapatan_tunai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pendapatan_tunai` (`kode_pendapatan_tunai`);

--
-- Indeks untuk tabel `pengeluaran_bank`
--
ALTER TABLE `pengeluaran_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pengeluaran_bank` (`kode_pengeluaran_bank`);

--
-- Indeks untuk tabel `pengeluaran_tunai`
--
ALTER TABLE `pengeluaran_tunai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pengeluaran_tunai` (`kode_pengeluaran_tunai`);

--
-- Indeks untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_piutang` (`kode_piutang`);

--
-- Indeks untuk tabel `piutang_line`
--
ALTER TABLE `piutang_line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
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
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_hutang`
--
ALTER TABLE `history_hutang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `history_piutang`
--
ALTER TABLE `history_piutang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hutang_line`
--
ALTER TABLE `hutang_line`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_pendapatan`
--
ALTER TABLE `jenis_pendapatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pendapatan_bank`
--
ALTER TABLE `pendapatan_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pendapatan_tunai`
--
ALTER TABLE `pendapatan_tunai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_bank`
--
ALTER TABLE `pengeluaran_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_tunai`
--
ALTER TABLE `pengeluaran_tunai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `piutang_line`
--
ALTER TABLE `piutang_line`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
