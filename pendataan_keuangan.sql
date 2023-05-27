-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pendataan_keuangan
CREATE DATABASE IF NOT EXISTS `pendataan_keuangan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pendataan_keuangan`;

-- Dumping structure for table pendataan_keuangan.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendataan_keuangan.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pendataan_keuangan.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('pendapatan','pengeluaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendataan_keuangan.kategori: ~5 rows (approximately)
INSERT INTO `kategori` (`id`, `kategori`, `tipe`, `created_at`, `updated_at`) VALUES
	(1, 'kendaraan', 'pengeluaran', NULL, NULL),
	(2, 'makanan', 'pengeluaran', NULL, NULL),
	(3, 'gadget', 'pengeluaran', NULL, NULL),
	(4, 'gaji', 'pendapatan', NULL, NULL),
	(5, 'kiriman', 'pendapatan', NULL, NULL);

-- Dumping structure for table pendataan_keuangan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendataan_keuangan.migrations: ~7 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2023_05_24_044220_create_transaksi_table', 1),
	(5, '2023_05_24_044746_create_rekening_table', 1),
	(6, '2023_05_24_044757_create_kategori_table', 1),
	(7, '2023_05_24_074624_fk_transaksi_table', 1);

-- Dumping structure for table pendataan_keuangan.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendataan_keuangan.password_resets: ~0 rows (approximately)

-- Dumping structure for table pendataan_keuangan.rekening
CREATE TABLE IF NOT EXISTS `rekening` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendataan_keuangan.rekening: ~5 rows (approximately)
INSERT INTO `rekening` (`id`, `rekening`, `created_at`, `updated_at`) VALUES
	(1, 'BNI', NULL, NULL),
	(2, 'ShoppePay', NULL, NULL),
	(3, 'Gopay', NULL, NULL),
	(4, 'Dompet', NULL, NULL),
	(5, 'LinkAja', NULL, NULL);

-- Dumping structure for table pendataan_keuangan.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint unsigned NOT NULL,
  `rekening_id` bigint unsigned NOT NULL,
  `jumlah` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_rekening_id_foreign` (`rekening_id`),
  KEY `transaksi_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `transaksi_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`),
  CONSTRAINT `transaksi_rekening_id_foreign` FOREIGN KEY (`rekening_id`) REFERENCES `rekening` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendataan_keuangan.transaksi: ~3 rows (approximately)
INSERT INTO `transaksi` (`id`, `kategori_id`, `rekening_id`, `jumlah`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 66000, 'Test Dari Seeder #1', '2023-05-27 04:26:54', '2023-05-26 21:26:54', '2023-05-26 21:26:54'),
	(2, 2, 2, 91100, 'Test Dari Seeder #2', '2023-05-27 04:26:54', '2023-05-26 21:26:54', '2023-05-26 21:26:54'),
	(3, 2, 2, 123, 'test update data', '2023-05-25 09:11:00', '2023-05-26 21:38:33', '2023-05-26 21:42:06');

-- Dumping structure for table pendataan_keuangan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendataan_keuangan.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
