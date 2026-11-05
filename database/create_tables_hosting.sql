-- ======================================================================
-- Query Pembuatan & Update Tabel Database Hosting
-- Database: u128290195_indobalitour
-- ======================================================================

-- 1. TABEL BOOKINGS (Jika belum ada sama sekali)
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_date` date DEFAULT NULL,
  `total_person` int DEFAULT NULL,
  `details` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2. TABEL JOB_APPLICATIONS (Jika belum ada sama sekali)
CREATE TABLE IF NOT EXISTS `job_applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 3. JIKA TABEL job_applications SUDAH ADA DI HOSTING TAPI KURANG KOLOM
-- Jalankan query ALTER TABLE di bawah ini di tab SQL phpMyAdmin:
ALTER TABLE `job_applications` 
ADD `bahasa` VARCHAR(255) NULL AFTER `position`,
ADD `alamat` VARCHAR(255) NULL AFTER `bahasa`,
ADD `nickname` VARCHAR(255) NULL AFTER `status`,
ADD `social_media` VARCHAR(255) NULL AFTER `nickname`,
ADD `profile_photo_path` VARCHAR(255) NULL AFTER `social_media`;
