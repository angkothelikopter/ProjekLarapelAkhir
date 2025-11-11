-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table inventaris_lab.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.cache: ~0 rows (approximately)

-- Dumping structure for table inventaris_lab.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.cache_locks: ~0 rows (approximately)

-- Dumping structure for table inventaris_lab.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table inventaris_lab.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `laboratory_id` bigint(20) unsigned NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `status` enum('tersedia','rusak','hilang') NOT NULL DEFAULT 'tersedia',
  `tanggal_masuk` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `items_kode_barang_unique` (`kode_barang`),
  KEY `items_laboratory_id_foreign` (`laboratory_id`),
  CONSTRAINT `items_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.items: ~2 rows (approximately)
INSERT INTO `items` (`id`, `laboratory_id`, `kode_barang`, `nama_barang`, `kategori`, `status`, `tanggal_masuk`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
	(2, 3, '12345653211', 'Headset Robot', 'Aksesoris Komputer', 'tersedia', '2000-05-31', 45, 'diambil Fadil satu', '2025-11-10 06:45:35', '2025-11-10 22:27:25'),
	(3, 3, '12334432', 'Headset Robot', 'qqqq', 'hilang', '2000-05-31', 10, 'Ilang', '2025-11-10 22:28:05', '2025-11-10 22:53:18');

-- Dumping structure for table inventaris_lab.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.jobs: ~0 rows (approximately)

-- Dumping structure for table inventaris_lab.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.job_batches: ~0 rows (approximately)

-- Dumping structure for table inventaris_lab.laboratories
CREATE TABLE IF NOT EXISTS `laboratories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_lab` varchar(255) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penanggung_jawab` varchar(255) DEFAULT NULL,
  `foto_penanggung_jawab` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.laboratories: ~5 rows (approximately)
INSERT INTO `laboratories` (`id`, `nama_lab`, `lokasi`, `deskripsi`, `created_at`, `updated_at`, `penanggung_jawab`, `foto_penanggung_jawab`) VALUES
	(3, 'Lab Desain Komunikasi Visual', 'Samping Kantin', 'Kalcer', '2025-11-10 06:23:13', '2025-11-10 23:31:11', 'Junaedi S.Pd', 'penanggung_jawab/TdeTOVd0HXx0DfvIC4nf0Gsgdt7XBo7v9zJ8dxt3.png'),
	(4, 'Lab Rekayasa Perangkat Lunak', 'Samping Ruang Guru', 'Buka 09:00 - 17:00', '2025-11-10 06:29:34', '2025-11-10 23:07:33', 'M Karim S.Pd', 'penanggung_jawab/EInFtdoecki9Ne37O2jyA6wsJVzdaswr7cN8pdWI.png'),
	(5, 'Lab Tata Boga', 'Samping Lapangan', 'Buka 07:00-16:00', '2025-11-10 06:30:30', '2025-11-10 23:16:44', 'M Syariffudin S.St', 'penanggung_jawab/oO8IJKfLGd7YGjuQkMYhUqhkRKjfTjyuGEUVWxmh.png'),
	(9, 'Lab Komputer Keras', 'Samping Kamar Mandi Guru', 'Banyak debunya', '2025-11-10 23:22:14', '2025-11-10 23:26:20', 'M. Hadi Hartadiali S.Kom', 'penanggung_jawab/qg4Oq7xdttWdDc5vlGQAMxE4zxRkEcfjgaxuVtS8.png');

-- Dumping structure for table inventaris_lab.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.migrations: ~5 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_11_10_120451_create_laboratories_table', 1),
	(5, '2025_11_10_120611_create_items_table', 1),
	(6, '2025_11_10_124031_add_penanggung_jawab_to_laboratories_table', 2);

-- Dumping structure for table inventaris_lab.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table inventaris_lab.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('uLe3bko6aiTu4gp47O9lrTUnO91d7kGh8ThB9hjl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXBMNzZBTTF5cDFuSkl5MU9sOVNEMXVNcHZHVE42TWxKbElGend5QiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYWJvcmF0b3JpZXMvY3JlYXRlIjtzOjU6InJvdXRlIjtzOjE5OiJsYWJvcmF0b3JpZXMuY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1762843271);

-- Dumping structure for table inventaris_lab.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris_lab.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
