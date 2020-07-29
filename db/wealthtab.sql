-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2020 at 10:59 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wealthtab`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_models`
--

DROP TABLE IF EXISTS `file_models`;
CREATE TABLE IF NOT EXISTS `file_models` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `access_level` int(10) UNSIGNED NOT NULL COMMENT 'Users access level representation',
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Represents name of the file',
  `file_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Represents uploaded ref. link of the file',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `file_models_access_level_foreign` (`access_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_models`
--

INSERT INTO `file_models` (`id`, `access_level`, `file_name`, `file_link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dummy_admin_pdf', 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf', '2020-07-28 04:58:46', '2020-07-28 04:58:46'),
(2, 2, 'Dummy_user_pdf', 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf', '2020-07-28 04:58:46', '2020-07-28 04:58:46'),
(3, 1, 'Dummy_user_pdf', 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf', '2020-07-29 02:05:20', '2020-07-29 02:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_07_27_235907_create_user_level_models_table', 1),
(3, '2020_07_27_235919_create_users_table', 1),
(4, '2020_07_28_003411_create_file_models_table', 1),
(5, '2020_07_28_020617_add_api_token_fields_in_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` int(10) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`),
  KEY `users_access_level_foreign` (`access_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `access_level`, `email_verified_at`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mayank', 'mayankjariwala1994@gmail.com', 2, '2020-07-28 05:53:36', '$2y$10$dPqiUvgqqi.85WZFZfdCGuUxkBWTKKFB3akY0SH7nHooR7SiTP75S', NULL, NULL, '2020-07-28 05:53:36', '2020-07-29 01:49:26'),
(2, 'Admin', 'admin@wealthta.com', 1, '2020-07-28 05:53:36', '$2y$10$wmXYfIHhxj.IWNAtC/v2e.VNO9SS/oShWWWgx5ocPJX786ExKD07K', '7d5ee9582af44f2c7b68c1dc4b36ce82ecb2dac8f6f0788a4a72946fe1806c68', NULL, '2020-07-28 05:53:37', '2020-07-29 01:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_level_models`
--

DROP TABLE IF EXISTS `user_level_models`;
CREATE TABLE IF NOT EXISTS `user_level_models` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `access_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'This field represents the access name\n            representing what kind of data user can access',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_level_models`
--

INSERT INTO `user_level_models` (`id`, `access_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-07-28 04:58:46', '2020-07-28 04:58:46'),
(2, 'user', '2020-07-28 04:58:46', '2020-07-28 04:58:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_models`
--
ALTER TABLE `file_models`
  ADD CONSTRAINT `file_models_access_level_foreign` FOREIGN KEY (`access_level`) REFERENCES `user_level_models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_access_level_foreign` FOREIGN KEY (`access_level`) REFERENCES `user_level_models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
