-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for allcatholicmedia
CREATE DATABASE IF NOT EXISTS `allcatholicmedia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `allcatholicmedia`;

-- Dumping structure for table allcatholicmedia.activations
CREATE TABLE IF NOT EXISTS `activations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `code` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activations_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.activations: ~1 rows (approximately)
REPLACE INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
	(1, 1, '4lkwp5kz5e9gWd4OPSGMkARJ8fRhNvy6', 1, '2025-12-24 07:30:13', '2025-12-24 07:30:13', '2025-12-24 07:30:13');

-- Dumping structure for table allcatholicmedia.admin_notifications
CREATE TABLE IF NOT EXISTS `admin_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.admin_notifications: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.ads
CREATE TABLE IF NOT EXISTS `ads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` datetime DEFAULT NULL,
  `location` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clicked` bigint(20) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT '0',
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `open_in_new_tab` tinyint(1) NOT NULL DEFAULT '1',
  `tablet_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_adsense_slot_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ads_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.ads: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.ads_translations
CREATE TABLE IF NOT EXISTS `ads_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tablet_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`ads_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.ads_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.announcements
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_action` tinyint(1) NOT NULL DEFAULT '0',
  `action_label` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_url` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_open_new_tab` tinyint(1) NOT NULL DEFAULT '0',
  `dismissible` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.announcements: ~3 rows (approximately)
REPLACE INTO `announcements` (`id`, `name`, `content`, `has_action`, `action_label`, `action_url`, `action_open_new_tab`, `dismissible`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Announcement 1', 'Cyber Monday: Save big on the Creative Cloud All Apps plan for individuals through 2 Dec', 0, NULL, NULL, 0, 1, '2025-12-24 14:30:27', NULL, 1, '2025-12-24 07:30:27', '2025-12-24 07:30:27'),
	(2, 'Announcement 2', 'Students and teachers save a massive 71% on Creative Cloud All Apps', 0, NULL, NULL, 0, 1, '2025-12-24 14:30:27', NULL, 1, '2025-12-24 07:30:27', '2025-12-24 07:30:27'),
	(3, 'Announcement 3', 'Black Friday and Cyber Monday 2023 Deals for Motion Designers, grab it now!', 0, NULL, NULL, 0, 1, '2025-12-24 14:30:27', NULL, 1, '2025-12-24 07:30:27', '2025-12-24 07:30:27');

-- Dumping structure for table allcatholicmedia.announcements_translations
CREATE TABLE IF NOT EXISTS `announcements_translations` (
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcements_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `action_label` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`announcements_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.announcements_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.audit_histories
CREATE TABLE IF NOT EXISTS `audit_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Botble\\ACL\\Models\\User',
  `module` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` longtext COLLATE utf8mb4_unicode_ci,
  `action` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actor_id` bigint(20) unsigned NOT NULL,
  `actor_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Botble\\ACL\\Models\\User',
  `reference_id` bigint(20) unsigned NOT NULL,
  `reference_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audit_histories_user_id_index` (`user_id`),
  KEY `audit_histories_module_index` (`module`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.audit_histories: ~35 rows (approximately)
REPLACE INTO `audit_histories` (`id`, `user_id`, `user_type`, `module`, `request`, `action`, `user_agent`, `ip_address`, `actor_id`, `actor_type`, `reference_id`, `reference_name`, `type`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Botble\\ACL\\Models\\User', 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'System Admin', 'info', '2026-03-27 22:30:53', '2026-03-27 22:30:53'),
	(2, 1, 'Botble\\ACL\\Models\\User', 'of the system', '[]', 'logged out', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'System Admin', 'info', '2026-03-27 22:46:38', '2026-03-27 22:46:38'),
	(3, 1, 'Botble\\ACL\\Models\\User', 'from the admin panel', NULL, 'logged out', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'System Admin', 'info', '2026-03-27 22:46:38', '2026-03-27 22:46:38'),
	(4, 1, 'Botble\\ACL\\Models\\User', 'to the system', NULL, 'logged in', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'System Admin', 'info', '2026-03-27 22:54:17', '2026-03-27 22:54:17'),
	(5, 1, 'Botble\\ACL\\Models\\User', 'user', '{"step":"3","email":"babu313136@gmail.com"}', 'updated profile', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'System Admin', 'info', '2026-03-27 22:59:33', '2026-03-27 22:59:33'),
	(6, 1, 'Botble\\ACL\\Models\\User', 'user', '{"step":"3","email":"babu313136@gmail.com"}', 'changed password', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'System Admin', 'danger', '2026-03-27 22:59:33', '2026-03-27 22:59:33'),
	(7, 1, 'Botble\\ACL\\Models\\User', 'user', '{"step":"3","email":"babu313136@gmail.com"}', 'has updated his profile', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'System Admin', 'primary', '2026-03-27 22:59:34', '2026-03-27 22:59:34'),
	(8, 1, 'Botble\\ACL\\Models\\User', 'menu_location', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'ID: 1', 'info', '2026-03-27 23:02:34', '2026-03-27 23:02:34'),
	(9, 1, 'Botble\\ACL\\Models\\User', 'menu', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'Main menu', 'primary', '2026-03-27 23:02:34', '2026-03-27 23:02:34'),
	(10, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 24, 'Home', 'primary', '2026-03-27 23:02:34', '2026-03-27 23:02:34'),
	(11, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 25, 'Channels', 'primary', '2026-03-27 23:02:34', '2026-03-27 23:02:34'),
	(12, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 26, 'Live', 'primary', '2026-03-27 23:02:34', '2026-03-27 23:02:34'),
	(13, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 27, 'News', 'primary', '2026-03-27 23:02:34', '2026-03-27 23:02:34'),
	(14, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":null,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 28, 'Contact', 'primary', '2026-03-27 23:02:34', '2026-03-27 23:02:34'),
	(15, 1, 'Botble\\ACL\\Models\\User', 'menu_location', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'ID: 1', 'info', '2026-03-27 23:02:53', '2026-03-27 23:02:53'),
	(16, 1, 'Botble\\ACL\\Models\\User', 'menu', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'Main menu', 'primary', '2026-03-27 23:02:53', '2026-03-27 23:02:53'),
	(17, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 24, 'Home', 'primary', '2026-03-27 23:02:53', '2026-03-27 23:02:53'),
	(18, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 25, 'Channels', 'primary', '2026-03-27 23:02:53', '2026-03-27 23:02:53'),
	(19, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 26, 'Live Now', 'primary', '2026-03-27 23:02:53', '2026-03-27 23:02:53'),
	(20, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 27, 'News', 'primary', '2026-03-27 23:02:53', '2026-03-27 23:02:53'),
	(21, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"News\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 28, 'Contact', 'primary', '2026-03-27 23:02:53', '2026-03-27 23:02:53'),
	(22, 1, 'Botble\\ACL\\Models\\User', 'menu_location', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'ID: 1', 'info', '2026-03-27 23:03:08', '2026-03-27 23:03:08'),
	(23, 1, 'Botble\\ACL\\Models\\User', 'menu', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'Main menu', 'primary', '2026-03-27 23:03:08', '2026-03-27 23:03:08'),
	(24, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 24, 'Home', 'primary', '2026-03-27 23:03:08', '2026-03-27 23:03:08'),
	(25, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 25, 'Channels', 'primary', '2026-03-27 23:03:08', '2026-03-27 23:03:08'),
	(26, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 26, 'Live Now', 'primary', '2026-03-27 23:03:08', '2026-03-27 23:03:08'),
	(27, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 27, 'Listen', 'primary', '2026-03-27 23:03:08', '2026-03-27 23:03:08'),
	(28, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Contact\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Contact","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 28, 'Contact', 'primary', '2026-03-27 23:03:08', '2026-03-27 23:03:08'),
	(29, 1, 'Botble\\ACL\\Models\\User', 'menu_location', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Read\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Read","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'created', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'ID: 1', 'info', '2026-03-27 23:03:21', '2026-03-27 23:03:21'),
	(30, 1, 'Botble\\ACL\\Models\\User', 'menu', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Read\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Read","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 1, 'Main menu', 'primary', '2026-03-27 23:03:21', '2026-03-27 23:03:21'),
	(31, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Read\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Read","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 24, 'Home', 'primary', '2026-03-27 23:03:21', '2026-03-27 23:03:21'),
	(32, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Read\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Read","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 25, 'Channels', 'primary', '2026-03-27 23:03:21', '2026-03-27 23:03:21'),
	(33, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Read\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Read","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 26, 'Live Now', 'primary', '2026-03-27 23:03:21', '2026-03-27 23:03:21'),
	(34, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Read\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Read","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 27, 'Listen', 'primary', '2026-03-27 23:03:22', '2026-03-27 23:03:22'),
	(35, 1, 'Botble\\ACL\\Models\\User', 'menunode', '{"name":"Main menu","deleted_nodes":null,"menu_nodes":"[{\\"menuItem\\":{\\"id\\":24,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/\\",\\"icon_font\\":\\"\\",\\"position\\":0,\\"title\\":\\"Home\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":25,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/videos\\",\\"icon_font\\":\\"\\",\\"position\\":1,\\"title\\":\\"Channels\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":26,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/live\\",\\"icon_font\\":\\"\\",\\"position\\":2,\\"title\\":\\"Live Now\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":27,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/blog\\",\\"icon_font\\":\\"\\",\\"position\\":3,\\"title\\":\\"Listen\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}},{\\"menuItem\\":{\\"id\\":28,\\"menu_id\\":1,\\"parent_id\\":0,\\"reference_id\\":0,\\"reference_type\\":null,\\"url\\":\\"\\/contact\\",\\"icon_font\\":\\"\\",\\"position\\":4,\\"title\\":\\"Read\\",\\"css_class\\":\\"\\",\\"target\\":\\"_self\\",\\"has_child\\":0,\\"children\\":[]}}]","menu_id":"1","title":"Read","url":"\\/contact","icon_image":null,"css_class":null,"target":"_self","locations":["main-menu"],"submitter":"apply","language":"en_US","status":"published"}', 'updated', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:149.0) Gecko/20100101 Firefox/149.0', '127.0.0.1', 1, 'Botble\\ACL\\Models\\User', 28, 'Read', 'primary', '2026-03-27 23:03:22', '2026-03-27 23:03:22');

-- Dumping structure for table allcatholicmedia.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.cache: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.cache_locks: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `author_id` bigint(20) unsigned DEFAULT NULL,
  `author_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Botble\\ACL\\Models\\User',
  `icon` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) unsigned NOT NULL DEFAULT '0',
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `is_default` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_status_index` (`status`),
  KEY `categories_created_at_index` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.categories: ~10 rows (approximately)
REPLACE INTO `categories` (`id`, `name`, `parent_id`, `description`, `status`, `author_id`, `author_type`, `icon`, `order`, `is_featured`, `is_default`, `created_at`, `updated_at`) VALUES
	(1, 'Vatican News', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 0, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(2, 'Parish Life', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(3, 'Saints & Feast Days', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(4, 'Catholic Culture', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(5, 'World News', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(6, 'Opinion & Commentary', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(7, 'Spirituality', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(8, 'Catholic Education', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(9, 'Videos', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(10, 'Live Streams', 0, '', 'published', 1, 'Botble\\ACL\\Models\\User', NULL, 0, 1, 0, '2025-12-24 07:30:21', '2026-03-27 23:27:12');

-- Dumping structure for table allcatholicmedia.categories_translations
CREATE TABLE IF NOT EXISTS `categories_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`categories_id`),
  KEY `idx_categories_trans_categories_id` (`categories_id`),
  KEY `idx_categories_trans_category_lang` (`categories_id`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.categories_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.community_groups
CREATE TABLE IF NOT EXISTS `community_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `creator_id` bigint(20) unsigned NOT NULL,
  `members_count` int(10) unsigned NOT NULL DEFAULT '1',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `community_groups_slug_unique` (`slug`),
  KEY `community_groups_creator_id_foreign` (`creator_id`),
  KEY `community_groups_status_index` (`status`),
  CONSTRAINT `community_groups_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.community_groups: ~3 rows (approximately)
REPLACE INTO `community_groups` (`id`, `name`, `slug`, `description`, `cover_image`, `privacy`, `creator_id`, `members_count`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Rosary Confraternity', 'rosary-confraternity', 'We pray the Rosary together daily and share intentions. All are welcome regardless of experience level.', NULL, 'public', 1, 5, 'published', '2026-03-28 00:02:51', '2026-03-28 00:50:17'),
	(2, 'Traditional Latin Mass Community', 'traditional-latin-mass-community', 'For those who love the TLM — share resources, find locations.', NULL, 'public', 1, 6, 'published', '2026-03-28 00:03:25', '2026-03-28 00:50:17'),
	(3, 'Catholic Parents Network', 'catholic-parents-network', 'A community for Catholic parents to share resources and faith formation.', NULL, 'public', 1, 4, 'published', '2026-03-28 00:03:25', '2026-03-28 00:50:17');

-- Dumping structure for table allcatholicmedia.community_group_members
CREATE TABLE IF NOT EXISTS `community_group_members` (
  `group_id` bigint(20) unsigned NOT NULL,
  `member_id` bigint(20) unsigned NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`,`member_id`),
  KEY `community_group_members_member_id_foreign` (`member_id`),
  CONSTRAINT `community_group_members_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `community_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `community_group_members_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.community_group_members: ~15 rows (approximately)
REPLACE INTO `community_group_members` (`group_id`, `member_id`, `role`, `joined_at`) VALUES
	(1, 1, 'admin', '2026-03-28 00:03:25'),
	(1, 2, 'member', '2026-03-26 00:50:17'),
	(1, 3, 'member', '2026-02-02 00:50:17'),
	(1, 4, 'member', '2026-02-12 00:50:17'),
	(1, 5, 'member', '2026-01-27 00:50:17'),
	(2, 1, 'admin', '2026-03-28 00:03:25'),
	(2, 2, 'member', '2026-02-18 00:50:17'),
	(2, 3, 'member', '2026-03-01 00:50:17'),
	(2, 4, 'member', '2026-03-24 00:50:17'),
	(2, 5, 'member', '2026-02-05 00:50:17'),
	(2, 6, 'member', '2026-01-28 00:50:17'),
	(3, 1, 'admin', '2026-03-28 00:03:25'),
	(3, 2, 'member', '2026-02-22 00:50:17'),
	(3, 3, 'member', '2026-02-02 00:50:17'),
	(3, 4, 'member', '2026-02-24 00:50:17');

-- Dumping structure for table allcatholicmedia.community_posts
CREATE TABLE IF NOT EXISTS `community_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) unsigned NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes_count` int(10) unsigned NOT NULL DEFAULT '0',
  `comments_count` int(10) unsigned NOT NULL DEFAULT '0',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `community_posts_member_id_created_at_index` (`member_id`,`created_at`),
  KEY `community_posts_status_index` (`status`),
  CONSTRAINT `community_posts_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.community_posts: ~14 rows (approximately)
REPLACE INTO `community_posts` (`id`, `member_id`, `type`, `content`, `media_url`, `link_url`, `link_title`, `link_image`, `likes_count`, `comments_count`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'text', 'The Rosary is the most excellent form of prayer. Praying for all in our community today.', NULL, NULL, NULL, NULL, 0, 0, 'published', '2026-03-28 00:03:25', '2026-03-28 00:03:25'),
	(2, 1, 'text', 'Just attended the most beautiful TLM this morning. Grateful for the gift of our liturgical heritage.', NULL, NULL, NULL, NULL, 0, 0, 'published', '2026-03-28 00:03:25', '2026-03-28 00:03:25'),
	(3, 1, 'text', 'Just finished a beautiful Holy Hour at our parish adoration chapel. The peace that comes from time with Our Lord in the Blessed Sacrament is indescribable. I encourage everyone to find a nearby adoration chapel and try it if you haven\'t. ✝️', NULL, NULL, NULL, NULL, 35, 12, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(4, 2, 'text', 'Today\'s Gospel really struck me — "Come to me, all you who are weary and burdened, and I will give you rest." (Matthew 11:28) Sharing this with anyone who needs it today. You are not alone in your struggles.', NULL, NULL, NULL, NULL, 34, 8, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(5, 3, 'text', 'Reminder: the Feast of All Saints is coming up! Don\'t forget it\'s a Holy Day of Obligation. A perfect opportunity to honor the whole company of heaven and ask for their intercession. Which saint is your patronal feast day?', NULL, NULL, NULL, NULL, 21, 2, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(6, 4, 'text', 'Our parish just started a new men\'s group that meets early on Friday mornings for Mass, breakfast, and faith sharing. It\'s been running for three weeks and we already have 15 guys. If your parish doesn\'t have something like this — start it! The need is real.', NULL, NULL, NULL, NULL, 5, 5, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(7, 5, 'text', 'Reading through the Catechism of the Catholic Church for the first time (I know, I know — it should have been sooner!). The section on the Liturgy is absolutely stunning. Has anyone done a full read-through? Best way to do it — cover to cover or topic by topic?', NULL, NULL, NULL, NULL, 20, 11, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(8, 6, 'text', 'Asking for prayers for my mother who was just diagnosed with cancer. She is a woman of deep faith and faces this with incredible courage, but please lift her up to Our Lady of Lourdes and all the healing saints. Thank you, AllCatholicMedia community. 🙏', NULL, NULL, NULL, NULL, 42, 10, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(9, 7, 'text', 'Beautiful quote from St. Augustine I came across today in my morning reading: "Our heart is restless until it rests in You." After 20 years of searching, that describes my journey to the Church perfectly. If you\'re in the RCIA process, welcome home — it is worth everything.', NULL, NULL, NULL, NULL, 34, 4, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(10, 8, 'text', 'Pro-life tip: the 40 Days for Life campaign begins soon. Even one hour of peaceful, prayerful vigil outside an abortion clinic makes a difference — spiritually and practically. Many locations across the country. Find yours at 40daysforlife.com.', NULL, NULL, NULL, NULL, 3, 4, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(11, 1, 'text', 'Has anyone been watching the Vatican\'s streaming of papal audiences on YouTube? The quality has improved enormously and it\'s a beautiful way to feel connected to the universal Church when you can\'t be in Rome. Pope Francis speaks with such warmth.', NULL, NULL, NULL, NULL, 37, 3, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(12, 2, 'text', 'Family Rosary update: we\'ve been praying the family Rosary every evening for 30 days now. Some nights it\'s chaotic with young kids, some nights it\'s peaceful, but we have not missed a day. The grace of perseverance is real. Anyone else doing the family Rosary?', NULL, NULL, NULL, NULL, 26, 3, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(13, 3, 'text', 'The Divine Mercy Chaplet at 3pm today. Stopping to remember what hour it is and Who suffered for us at this hour is one of the most profound practices I know. "Eternal Father, I offer you the Body and Blood, Soul and Divinity of Your dearly beloved Son..."', NULL, NULL, NULL, NULL, 31, 8, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(14, 4, 'text', 'Book recommendation: "The Story of a Soul" by St. Thérèse of Lisieux. I\'ve read it three times and wept every time. Her "Little Way" — doing ordinary things with extraordinary love — is within reach of every one of us. Truly one of the greatest spiritual autobiographies ever written.', NULL, NULL, NULL, NULL, 45, 6, 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17');

-- Dumping structure for table allcatholicmedia.community_post_likes
CREATE TABLE IF NOT EXISTS `community_post_likes` (
  `post_id` bigint(20) unsigned NOT NULL,
  `member_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`,`member_id`),
  KEY `community_post_likes_member_id_foreign` (`member_id`),
  CONSTRAINT `community_post_likes_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  CONSTRAINT `community_post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `community_posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.community_post_likes: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_fields` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.contacts: ~10 rows (approximately)
REPLACE INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `subject`, `content`, `custom_fields`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'John Smith', 'john.smith@example.com', '+1 (555) 123-4567', '123 Main Street, New York, NY 10001', 'General Inquiry', 'Hello, I am interested in learning more about your services. Could you please provide me with additional information about pricing and availability? I would appreciate a prompt response. Thank you for your time.', NULL, 'read', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(2, 'Emily Johnson', 'emily.johnson@example.com', '+1 (555) 234-5678', '456 Oak Avenue, Los Angeles, CA 90001', 'Partnership Opportunity', 'I represent a company that would like to explore potential partnership opportunities with your organization. We believe there could be mutual benefits from collaboration. Please let me know if you would be interested in scheduling a call to discuss further.', NULL, 'unread', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(3, 'Michael Brown', 'michael.brown@example.com', '+1 (555) 345-6789', '789 Pine Road, Chicago, IL 60601', 'Technical Support', 'I am experiencing some technical difficulties with your platform. The login feature seems to be not working properly on mobile devices. Could you please assist me in resolving this issue? I have attached screenshots for reference.', NULL, 'read', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(4, 'Sarah Davis', 'sarah.davis@example.com', '+1 (555) 456-7890', '321 Elm Street, Houston, TX 77001', 'Feedback and Suggestions', 'I wanted to share some feedback about your website. Overall, I find it user-friendly, but I think the navigation could be improved. Additionally, it would be great if you could add more filtering options to the search feature.', NULL, 'unread', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(5, 'James Wilson', 'james.wilson@example.com', '+1 (555) 567-8901', '654 Maple Drive, Phoenix, AZ 85001', 'Service Request', 'I would like to request a custom service package for my business. We have specific requirements that may not be covered by your standard offerings. Could we schedule a meeting to discuss our needs in detail?', NULL, 'read', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(6, 'Jennifer Taylor', 'jennifer.taylor@example.com', '+1 (555) 678-9012', '987 Cedar Lane, Philadelphia, PA 19101', 'Account Assistance', 'I am having trouble accessing my account. I have tried resetting my password multiple times, but I am still unable to log in. Could you please help me regain access to my account? My username is jennifer_t.', NULL, 'unread', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(7, 'David Anderson', 'david.anderson@example.com', '+1 (555) 789-0123', '135 Birch Boulevard, San Antonio, TX 78201', 'Product Information', 'I am interested in your premium product line and would like to receive a detailed brochure or catalog. Could you also provide information about bulk order discounts? Thank you for your assistance.', NULL, 'read', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(8, 'Lisa Martinez', 'lisa.martinez@example.com', '+1 (555) 890-1234', '246 Walnut Street, San Diego, CA 92101', 'Event Sponsorship', 'Our organization is hosting a charity event next month and we are looking for sponsors. Would your company be interested in participating? This would be a great opportunity for brand visibility and community engagement.', NULL, 'unread', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(9, 'Robert Garcia', 'robert.garcia@example.com', '+1 (555) 901-2345', '357 Spruce Court, Dallas, TX 75201', 'Career Opportunities', 'I am interested in exploring career opportunities at your company. I have over 5 years of experience in the industry and believe I could be a valuable addition to your team. Please find my resume attached for your review.', NULL, 'read', '2025-12-24 07:30:13', '2025-12-24 07:30:13'),
	(10, 'Jessica Rodriguez', 'jessica.rodriguez@example.com', '+1 (555) 012-3456', '468 Ash Avenue, San Jose, CA 95101', 'Media Inquiry', 'I am a journalist working on a story about innovative companies in the tech industry. I would love to feature your company in my upcoming article. Could we arrange an interview with a company representative at your earliest convenience?', NULL, 'unread', '2025-12-24 07:30:13', '2025-12-24 07:30:13');

-- Dumping structure for table allcatholicmedia.contact_custom_fields
CREATE TABLE IF NOT EXISTS `contact_custom_fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeholder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '999',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.contact_custom_fields: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.contact_custom_fields_translations
CREATE TABLE IF NOT EXISTS `contact_custom_fields_translations` (
  `contact_custom_fields_id` bigint(20) unsigned NOT NULL,
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeholder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`contact_custom_fields_id`),
  KEY `idx_contact_cf_trans_cf_id` (`contact_custom_fields_id`),
  KEY `idx_contact_cf_trans_cf_lang` (`contact_custom_fields_id`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.contact_custom_fields_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.contact_custom_field_options
CREATE TABLE IF NOT EXISTS `contact_custom_field_options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `custom_field_id` bigint(20) unsigned NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '999',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.contact_custom_field_options: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.contact_custom_field_options_translations
CREATE TABLE IF NOT EXISTS `contact_custom_field_options_translations` (
  `contact_custom_field_options_id` bigint(20) unsigned NOT NULL,
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`contact_custom_field_options_id`),
  KEY `idx_contact_cfo_trans_cfo_id` (`contact_custom_field_options_id`),
  KEY `idx_contact_cfo_trans_cfo_lang` (`contact_custom_field_options_id`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.contact_custom_field_options_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.contact_replies
CREATE TABLE IF NOT EXISTS `contact_replies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.contact_replies: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.dashboard_widgets
CREATE TABLE IF NOT EXISTS `dashboard_widgets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.dashboard_widgets: ~7 rows (approximately)
REPLACE INTO `dashboard_widgets` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'widget_total_themes', '2026-03-27 22:30:54', '2026-03-27 22:30:54'),
	(2, 'widget_total_users', '2026-03-27 22:30:55', '2026-03-27 22:30:55'),
	(3, 'widget_total_plugins', '2026-03-27 22:30:55', '2026-03-27 22:30:55'),
	(4, 'widget_total_pages', '2026-03-27 22:30:55', '2026-03-27 22:30:55'),
	(5, 'widget_posts_recent', '2026-03-27 22:30:55', '2026-03-27 22:30:55'),
	(6, 'widget_audit_logs', '2026-03-27 22:30:57', '2026-03-27 22:30:57'),
	(7, 'widget_request_errors', '2026-03-27 22:30:57', '2026-03-27 22:30:57');

-- Dumping structure for table allcatholicmedia.dashboard_widget_settings
CREATE TABLE IF NOT EXISTS `dashboard_widget_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned NOT NULL,
  `widget_id` bigint(20) unsigned NOT NULL,
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard_widget_settings_user_id_index` (`user_id`),
  KEY `dashboard_widget_settings_widget_id_index` (`widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.dashboard_widget_settings: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.device_tokens
CREATE TABLE IF NOT EXISTS `device_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_version` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `device_tokens_token_unique` (`token`),
  KEY `device_tokens_user_type_user_id_index` (`user_type`,`user_id`),
  KEY `device_tokens_platform_is_active_index` (`platform`,`is_active`),
  KEY `device_tokens_is_active_index` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.device_tokens: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.fob_comments
CREATE TABLE IF NOT EXISTS `fob_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reply_to` bigint(20) unsigned DEFAULT NULL,
  `author_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint(20) unsigned DEFAULT NULL,
  `reference_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` bigint(20) unsigned DEFAULT NULL,
  `reference_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fob_comments_author_type_author_id_index` (`author_type`,`author_id`),
  KEY `fob_comments_reference_type_reference_id_index` (`reference_type`,`reference_id`),
  KEY `fob_comments_reply_to_index` (`reply_to`),
  KEY `fob_comments_reference_url_index` (`reference_url`),
  KEY `fob_comments_status_index` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.fob_comments: ~47 rows (approximately)
REPLACE INTO `fob_comments` (`id`, `reply_to`, `author_type`, `author_id`, `reference_type`, `reference_id`, `reference_url`, `name`, `email`, `website`, `content`, `status`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Botble\\Member\\Models\\Member', 2, 'Botble\\Blog\\Models\\Post', 10, 'http://localhost', 'John Smith', 'john.smith@example.com', 'https://friendsofbotble.com', 'This is really helpful, thank you!', 'approved', '192.168.1.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-15 07:30:28', '2025-12-24 07:30:28'),
	(2, NULL, 'Botble\\Member\\Models\\Member', 4, 'Botble\\Blog\\Models\\Post', 15, 'http://localhost', 'Emily Johnson', 'emily.johnson@example.com', 'https://friendsofbotble.com', 'I found this article to be quite informative.', 'approved', '192.168.1.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-11-29 07:30:28', '2025-12-24 07:30:28'),
	(3, NULL, 'Botble\\Member\\Models\\Member', 3, 'Botble\\Blog\\Models\\Post', 14, 'http://localhost', 'Michael Brown', 'michael.brown@example.com', 'https://friendsofbotble.com', 'Wow, I never knew about this before!', 'approved', '192.168.1.3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-13 07:30:28', '2025-12-24 07:30:28'),
	(4, NULL, 'Botble\\Member\\Models\\Member', 7, 'Botble\\Blog\\Models\\Post', 4, 'http://localhost', 'Sarah Davis', 'sarah.davis@example.com', 'https://friendsofbotble.com', 'Great job on explaining such a complex topic.', 'approved', '192.168.1.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-21 07:30:28', '2025-12-24 07:30:28'),
	(5, NULL, 'Botble\\Member\\Models\\Member', 5, 'Botble\\Blog\\Models\\Post', 9, 'http://localhost', 'James Wilson', 'james.wilson@example.com', 'https://friendsofbotble.com', 'I have a question about the third paragraph.', 'approved', '192.168.1.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-22 07:30:28', '2025-12-24 07:30:28'),
	(6, NULL, 'Botble\\Member\\Models\\Member', 1, 'Botble\\Blog\\Models\\Post', 3, 'http://localhost', 'Jennifer Taylor', 'jennifer.taylor@example.com', 'https://friendsofbotble.com', 'This article changed my perspective entirely.', 'approved', '192.168.1.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-11-27 07:30:28', '2025-12-24 07:30:28'),
	(7, NULL, 'Botble\\Member\\Models\\Member', 0, 'Botble\\Blog\\Models\\Post', 11, 'http://localhost', 'David Anderson', 'david.anderson@example.com', 'https://friendsofbotble.com', 'I appreciate the effort you put into this.', 'approved', '192.168.1.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-03 07:30:28', '2025-12-24 07:30:28'),
	(8, NULL, 'Botble\\Member\\Models\\Member', 3, 'Botble\\Blog\\Models\\Post', 17, 'http://localhost', 'Lisa Martinez', 'lisa.martinez@example.com', 'https://friendsofbotble.com', 'This is exactly what I was looking for, thank you!', 'approved', '192.168.1.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-17 07:30:28', '2025-12-24 07:30:28'),
	(9, NULL, 'Botble\\Member\\Models\\Member', 4, 'Botble\\Blog\\Models\\Post', 20, 'http://localhost', 'Robert Garcia', 'robert.garcia@example.com', 'https://friendsofbotble.com', 'I disagree with some points mentioned here, though.', 'approved', '192.168.1.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-23 07:30:28', '2025-12-24 07:30:28'),
	(10, NULL, 'Botble\\Member\\Models\\Member', 6, 'Botble\\Blog\\Models\\Post', 7, 'http://localhost', 'Jessica Rodriguez', 'jessica.rodriguez@example.com', 'https://friendsofbotble.com', 'Could you provide more examples to illustrate your point?', 'approved', '192.168.1.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-20 07:30:28', '2025-12-24 07:30:28'),
	(11, NULL, 'Botble\\Member\\Models\\Member', 3, 'Botble\\Blog\\Models\\Post', 13, 'http://localhost', 'John Smith', 'john.smith@example.com', 'https://friendsofbotble.com', 'I wish there were more articles like this out there.', 'approved', '192.168.1.11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-15 07:30:28', '2025-12-24 07:30:28'),
	(12, NULL, 'Botble\\Member\\Models\\Member', 5, 'Botble\\Blog\\Models\\Post', 18, 'http://localhost', 'Emily Johnson', 'emily.johnson@example.com', 'https://friendsofbotble.com', 'I\'m bookmarking this for future reference.', 'approved', '192.168.1.12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-14 07:30:28', '2025-12-24 07:30:28'),
	(13, NULL, 'Botble\\Member\\Models\\Member', 5, 'Botble\\Blog\\Models\\Post', 16, 'http://localhost', 'Michael Brown', 'michael.brown@example.com', 'https://friendsofbotble.com', 'I\'ve shared this with my friends, they loved it!', 'approved', '192.168.1.13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-14 07:30:28', '2025-12-24 07:30:28'),
	(14, NULL, 'Botble\\Member\\Models\\Member', 3, 'Botble\\Blog\\Models\\Post', 13, 'http://localhost', 'Sarah Davis', 'sarah.davis@example.com', 'https://friendsofbotble.com', 'This article is a must-read for everyone interested in the topic.', 'approved', '192.168.1.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-20 07:30:28', '2025-12-24 07:30:28'),
	(15, NULL, 'Botble\\Member\\Models\\Member', 6, 'Botble\\Blog\\Models\\Post', 9, 'http://localhost', 'James Wilson', 'james.wilson@example.com', 'https://friendsofbotble.com', 'Thank you for shedding light on this important issue.', 'approved', '192.168.1.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-12 07:30:28', '2025-12-24 07:30:28'),
	(16, NULL, 'Botble\\Member\\Models\\Member', 6, 'Botble\\Blog\\Models\\Post', 4, 'http://localhost', 'Jennifer Taylor', 'jennifer.taylor@example.com', 'https://friendsofbotble.com', 'I\'ve been searching for information on this topic, glad I found this article.', 'approved', '192.168.1.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-05 07:30:28', '2025-12-24 07:30:28'),
	(17, NULL, 'Botble\\Member\\Models\\Member', 4, 'Botble\\Blog\\Models\\Post', 19, 'http://localhost', 'David Anderson', 'david.anderson@example.com', 'https://friendsofbotble.com', 'I\'m blown away by the insights shared in this article.', 'approved', '192.168.1.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-21 07:30:28', '2025-12-24 07:30:28'),
	(18, NULL, 'Botble\\Member\\Models\\Member', 7, 'Botble\\Blog\\Models\\Post', 2, 'http://localhost', 'Lisa Martinez', 'lisa.martinez@example.com', 'https://friendsofbotble.com', 'This article tackles a complex topic with clarity.', 'approved', '192.168.1.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-13 07:30:28', '2025-12-24 07:30:28'),
	(19, NULL, 'Botble\\Member\\Models\\Member', 2, 'Botble\\Blog\\Models\\Post', 10, 'http://localhost', 'Robert Garcia', 'robert.garcia@example.com', 'https://friendsofbotble.com', 'I\'m going to reflect on the ideas presented in this article.', 'approved', '192.168.1.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-10 07:30:28', '2025-12-24 07:30:28'),
	(20, NULL, 'Botble\\Member\\Models\\Member', 7, 'Botble\\Blog\\Models\\Post', 16, 'http://localhost', 'Jessica Rodriguez', 'jessica.rodriguez@example.com', 'https://friendsofbotble.com', 'The author\'s passion for the subject shines through in this article.', 'approved', '192.168.1.20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-11-28 07:30:28', '2025-12-24 07:30:28'),
	(21, NULL, 'Botble\\Member\\Models\\Member', 0, 'Botble\\Blog\\Models\\Post', 19, 'http://localhost', 'John Smith', 'john.smith@example.com', 'https://friendsofbotble.com', 'This article challenged my preconceptions in a thought-provoking way.', 'approved', '192.168.1.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-02 07:30:28', '2025-12-24 07:30:28'),
	(22, NULL, 'Botble\\Member\\Models\\Member', 4, 'Botble\\Blog\\Models\\Post', 3, 'http://localhost', 'Emily Johnson', 'emily.johnson@example.com', 'https://friendsofbotble.com', 'I\'ve added this article to my reading list, it\'s worth revisiting.', 'approved', '192.168.1.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-22 07:30:28', '2025-12-24 07:30:28'),
	(23, NULL, 'Botble\\Member\\Models\\Member', 4, 'Botble\\Blog\\Models\\Post', 20, 'http://localhost', 'Michael Brown', 'michael.brown@example.com', 'https://friendsofbotble.com', 'This article offers practical advice that I can apply in real life.', 'approved', '192.168.1.23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-16 07:30:28', '2025-12-24 07:30:28'),
	(24, NULL, 'Botble\\Member\\Models\\Member', 6, 'Botble\\Blog\\Models\\Post', 17, 'http://localhost', 'Sarah Davis', 'sarah.davis@example.com', 'https://friendsofbotble.com', 'I\'m going to recommend this article to my study group.', 'approved', '192.168.1.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-18 07:30:28', '2025-12-24 07:30:28'),
	(25, NULL, 'Botble\\Member\\Models\\Member', 2, 'Botble\\Blog\\Models\\Post', 6, 'http://localhost', 'James Wilson', 'james.wilson@example.com', 'https://friendsofbotble.com', 'The examples provided really helped me understand the concept better.', 'approved', '192.168.1.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-06 07:30:28', '2025-12-24 07:30:28'),
	(26, NULL, 'Botble\\Member\\Models\\Member', 3, 'Botble\\Blog\\Models\\Post', 1, 'http://localhost', 'Jennifer Taylor', 'jennifer.taylor@example.com', 'https://friendsofbotble.com', 'I resonate with the ideas presented here.', 'approved', '192.168.1.26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-23 07:30:28', '2025-12-24 07:30:28'),
	(27, NULL, 'Botble\\Member\\Models\\Member', 4, 'Botble\\Blog\\Models\\Post', 4, 'http://localhost', 'David Anderson', 'david.anderson@example.com', 'https://friendsofbotble.com', 'This article made me think critically about the topic.', 'approved', '192.168.1.27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-11-25 07:30:28', '2025-12-24 07:30:28'),
	(28, NULL, 'Botble\\Member\\Models\\Member', 5, 'Botble\\Blog\\Models\\Post', 12, 'http://localhost', 'Lisa Martinez', 'lisa.martinez@example.com', 'https://friendsofbotble.com', 'I\'ll definitely come back to this article for reference.', 'approved', '192.168.1.28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-11 07:30:28', '2025-12-24 07:30:28'),
	(29, NULL, 'Botble\\Member\\Models\\Member', 0, 'Botble\\Blog\\Models\\Post', 11, 'http://localhost', 'Robert Garcia', 'robert.garcia@example.com', 'https://friendsofbotble.com', 'I\'ve shared this on social media, it\'s too good not to share.', 'approved', '192.168.1.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-11-29 07:30:28', '2025-12-24 07:30:28'),
	(30, NULL, 'Botble\\Member\\Models\\Member', 1, 'Botble\\Blog\\Models\\Post', 13, 'http://localhost', 'Jessica Rodriguez', 'jessica.rodriguez@example.com', 'https://friendsofbotble.com', 'This article presents a balanced view on a controversial topic.', 'approved', '192.168.1.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-23 07:30:28', '2025-12-24 07:30:28'),
	(31, NULL, 'Botble\\Member\\Models\\Member', 5, 'Botble\\Blog\\Models\\Post', 15, 'http://localhost', 'John Smith', 'john.smith@example.com', 'https://friendsofbotble.com', 'I\'m glad I stumbled upon this article, it\'s a gem.', 'approved', '192.168.1.31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-08 07:30:28', '2025-12-24 07:30:28'),
	(32, NULL, 'Botble\\Member\\Models\\Member', 6, 'Botble\\Blog\\Models\\Post', 17, 'http://localhost', 'Emily Johnson', 'emily.johnson@example.com', 'https://friendsofbotble.com', 'I\'ve been struggling with this, your article helped a lot.', 'approved', '192.168.1.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-02 07:30:28', '2025-12-24 07:30:28'),
	(33, NULL, 'Botble\\Member\\Models\\Member', 2, 'Botble\\Blog\\Models\\Post', 11, 'http://localhost', 'Michael Brown', 'michael.brown@example.com', 'https://friendsofbotble.com', 'I\'ve learned something new today, thanks to this article.', 'approved', '192.168.1.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-23 07:30:28', '2025-12-24 07:30:28'),
	(34, NULL, 'Botble\\Member\\Models\\Member', 6, 'Botble\\Blog\\Models\\Post', 2, 'http://localhost', 'Sarah Davis', 'sarah.davis@example.com', 'https://friendsofbotble.com', 'Kudos to the author for a well-researched piece.', 'approved', '192.168.1.34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-15 07:30:28', '2025-12-24 07:30:28'),
	(35, NULL, 'Botble\\Member\\Models\\Member', 0, 'Botble\\Blog\\Models\\Post', 16, 'http://localhost', 'James Wilson', 'james.wilson@example.com', 'https://friendsofbotble.com', 'I\'m impressed by the depth of knowledge demonstrated here.', 'approved', '192.168.1.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-22 07:30:28', '2025-12-24 07:30:28'),
	(36, NULL, 'Botble\\Member\\Models\\Member', 7, 'Botble\\Blog\\Models\\Post', 15, 'http://localhost', 'Jennifer Taylor', 'jennifer.taylor@example.com', 'https://friendsofbotble.com', 'This article challenged my assumptions in a good way.', 'approved', '192.168.1.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-11-26 07:30:28', '2025-12-24 07:30:28'),
	(37, NULL, 'Botble\\Member\\Models\\Member', 1, 'Botble\\Blog\\Models\\Post', 3, 'http://localhost', 'David Anderson', 'david.anderson@example.com', 'https://friendsofbotble.com', 'I\'ve shared this with my colleagues, it\'s worth discussing.', 'approved', '192.168.1.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-06 07:30:28', '2025-12-24 07:30:28'),
	(38, NULL, 'Botble\\Member\\Models\\Member', 0, 'Botble\\Blog\\Models\\Post', 4, 'http://localhost', 'Lisa Martinez', 'lisa.martinez@example.com', 'https://friendsofbotble.com', 'The information presented here is very valuable.', 'approved', '192.168.1.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-22 07:30:28', '2025-12-24 07:30:28'),
	(39, NULL, 'Botble\\Member\\Models\\Member', 1, 'Botble\\Blog\\Models\\Post', 18, 'http://localhost', 'Robert Garcia', 'robert.garcia@example.com', 'https://friendsofbotble.com', 'You have a talent for explaining complex topics clearly.', 'approved', '192.168.1.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-10 07:30:28', '2025-12-24 07:30:28'),
	(40, NULL, 'Botble\\Member\\Models\\Member', 4, 'Botble\\Blog\\Models\\Post', 15, 'http://localhost', 'Jessica Rodriguez', 'jessica.rodriguez@example.com', 'https://friendsofbotble.com', 'I\'m inspired to learn more about this after reading your article.', 'approved', '192.168.1.40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-18 07:30:28', '2025-12-24 07:30:28'),
	(41, NULL, 'Botble\\Member\\Models\\Member', 7, 'Botble\\Blog\\Models\\Post', 5, 'http://localhost', 'John Smith', 'john.smith@example.com', 'https://friendsofbotble.com', 'This article deserves wider recognition.', 'approved', '192.168.1.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-11-24 07:30:28', '2025-12-24 07:30:28'),
	(42, NULL, 'Botble\\Member\\Models\\Member', 2, 'Botble\\Blog\\Models\\Post', 10, 'http://localhost', 'Emily Johnson', 'emily.johnson@example.com', 'https://friendsofbotble.com', 'I\'m grateful for the insights shared in this piece.', 'approved', '192.168.1.42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-18 07:30:28', '2025-12-24 07:30:28'),
	(43, NULL, 'Botble\\Member\\Models\\Member', 5, 'Botble\\Blog\\Models\\Post', 10, 'http://localhost', 'Michael Brown', 'michael.brown@example.com', 'https://friendsofbotble.com', 'The author presents a balanced view on a controversial topic.', 'approved', '192.168.1.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-14 07:30:28', '2025-12-24 07:30:28'),
	(44, NULL, 'Botble\\Member\\Models\\Member', 3, 'Botble\\Blog\\Models\\Post', 20, 'http://localhost', 'Sarah Davis', 'sarah.davis@example.com', 'https://friendsofbotble.com', 'I\'m glad I stumbled upon this article, it\'s', 'approved', '192.168.1.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-22 07:30:28', '2025-12-24 07:30:28'),
	(45, NULL, 'Botble\\Member\\Models\\Member', 3, 'Botble\\Blog\\Models\\Post', 7, 'http://localhost', 'James Wilson', 'james.wilson@example.com', 'https://friendsofbotble.com', 'I\'ve been searching for information on this topic, glad I found this article. It\'s incredibly insightful and provides a comprehensive overview of the subject matter. I appreciate the effort put into researching and writing this piece. It\'s truly eye-opening and has given me a new perspective. Thank you for sharing your knowledge with us!', 'approved', '192.168.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-23 07:30:28', '2025-12-24 07:30:28'),
	(46, NULL, 'Botble\\Member\\Models\\Member', 0, 'Botble\\Blog\\Models\\Post', 7, 'http://localhost', 'Jennifer Taylor', 'jennifer.taylor@example.com', 'https://friendsofbotble.com', 'This article is a masterpiece! It dives deep into the topic and offers valuable insights that are both thought-provoking and enlightening. The author\'s expertise is evident throughout, making it a compelling read from start to finish. I\'ll definitely be coming back to this for reference in the future.', 'approved', '192.168.1.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-03 07:30:28', '2025-12-24 07:30:28'),
	(47, NULL, 'Botble\\Member\\Models\\Member', 0, 'Botble\\Blog\\Models\\Post', 9, 'http://localhost', 'David Anderson', 'david.anderson@example.com', 'https://friendsofbotble.com', 'I\'m amazed by the depth of analysis in this article. It covers a wide range of aspects related to the topic, providing a comprehensive understanding. The clarity of explanation is commendable, making complex concepts easy to grasp. This article has enriched my understanding and sparked further curiosity. Kudos to the author!', 'approved', '192.168.1.47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2025-12-02 07:30:28', '2025-12-24 07:30:28');

-- Dumping structure for table allcatholicmedia.forum_categories
CREATE TABLE IF NOT EXISTS `forum_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `order_column` int(11) NOT NULL DEFAULT '0',
  `topics_count` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `forum_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.forum_categories: ~7 rows (approximately)
REPLACE INTO `forum_categories` (`id`, `name`, `slug`, `description`, `order_column`, `topics_count`, `created_at`, `updated_at`) VALUES
	(1, 'Vatican & Pope', 'vatican-pope', 'Papal announcements, Vatican news, and magisterial teachings.', 1, 2, '2026-03-28 00:02:51', '2026-03-28 00:50:16'),
	(2, 'Prayer & Spirituality', 'prayer-spirituality', 'Discussion on prayer forms, retreats, and spiritual direction.', 2, 5, '2026-03-28 00:02:51', '2026-03-28 00:50:16'),
	(3, 'Sacraments & Liturgy', 'sacraments-liturgy', 'Questions and discussion on the sacraments and Mass.', 3, 4, '2026-03-28 00:02:51', '2026-03-28 00:50:17'),
	(4, 'Catholic Culture', 'catholic-culture', 'Art, music, film, literature, and Catholic traditions.', 4, 2, '2026-03-28 00:02:51', '2026-03-28 00:50:17'),
	(5, 'Apologetics', 'apologetics', 'Defending the Faith — answers to common questions and objections.', 5, 2, '2026-03-28 00:02:51', '2026-03-28 00:50:17'),
	(6, 'Catholic Family Life', 'catholic-family', 'Marriage, parenting, and raising children in the faith.', 6, 1, '2026-03-28 00:02:51', '2026-03-28 00:50:17'),
	(7, 'Catholic Life & Culture', 'catholic-life-culture', 'Art, music, film, literature, and Catholic traditions.', 4, 1, '2026-03-28 00:03:25', '2026-03-28 00:50:17');

-- Dumping structure for table allcatholicmedia.forum_replies
CREATE TABLE IF NOT EXISTS `forum_replies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` bigint(20) unsigned NOT NULL,
  `member_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_replies_member_id_foreign` (`member_id`),
  KEY `forum_replies_topic_id_status_created_at_index` (`topic_id`,`status`,`created_at`),
  CONSTRAINT `forum_replies_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  CONSTRAINT `forum_replies_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `forum_topics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.forum_replies: ~42 rows (approximately)
REPLACE INTO `forum_replies` (`id`, `topic_id`, `member_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Praying for all healthcare workers and the sick. God bless you all.', 'published', '2026-03-28 00:02:51', '2026-03-28 00:02:51'),
	(2, 2, 1, 'The "Extraordinary Form" missal from Baronius Press is excellent — it has the Latin and English side by side. Also check out FSSP.com for resources.', 'published', '2026-03-28 00:02:51', '2026-03-28 00:02:51'),
	(3, 3, 6, 'The encyclicals are beautiful in their theology of creation. The key insight for me is that care for the earth is an extension of care for the poor — the two issues are inseparable.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(4, 3, 2, 'I appreciate the ecological message but think some of the specific policy prescriptions go beyond the Church\'s competence. The principles are solid; the applications require prudential judgment.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(5, 3, 3, 'Laudato Si\' changed how I think about my daily choices — what I eat, how I commute, how I spend money. It\'s deeply practical once you engage with it seriously.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(6, 4, 6, 'Infallibility is defined as applying only when the Pope speaks ex cathedra — formally defining a matter of faith or morals for the universal Church with the explicit intention of binding the faithful. It has only been used twice since Vatican I: the Immaculate Conception (1854) and the Assumption (1950).', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(7, 4, 2, 'What many people miss is that ordinary papal teaching, even in encyclicals, is not infallible — but it still demands a "religious submission of intellect and will" from Catholics. That\'s a higher standard than mere silence, but lower than assent of faith.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(8, 5, 6, 'What you\'re describing sounds like what St. John of the Cross called the "dark night of the senses." It\'s actually a sign of spiritual growth — God is weaning you from consolations so you can love Him for Himself, not for the good feelings He gives.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(9, 5, 2, 'I went through something similar. What helped me was lectio divina — slow, meditative reading of Scripture. Instead of trying to feel something, I just listened. It took months but the life slowly returned.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(10, 5, 3, 'Talk to a spiritual director! This is exactly what they\'re for. A good director can help you discern whether this is spiritual aridity, depression, or something else entirely.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(11, 5, 1, 'St. Teresa of Ávila writes extensively about this in The Interior Castle. She says perseverance through dryness is worth more to God than consoled prayer — it\'s a purer form of love.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(12, 6, 6, 'The best introduction I know is "Lectio Divina: Renewing the Ancient Practice of Praying the Scriptures" by M. Basil Pennington. Short, clear, and practical.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(13, 6, 2, 'The Pray as You Go app from the Jesuits is excellent — it guides you through a short lectio divina session each day using the daily Mass readings. Free and beautifully done.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(14, 6, 3, 'Don\'t overthink it. The four movements are: Read (lectio), Reflect (meditatio), Respond (oratio), Rest (contemplatio). Start with 10 minutes and a single paragraph of the Gospels.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(15, 7, 6, 'The 3 o\'clock hour prayer changed my life. I pray it every day now, even if just a brief moment. The promise attached to that hour is extraordinary.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(16, 7, 2, 'A beautiful aspect of Divine Mercy is that it\'s not just a personal devotion — it\'s a theological affirmation that God\'s mercy is greater than any sin. St. John Paul II had a special devotion to it and canonized Sr. Faustina in 2000.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(17, 8, 6, 'We read "My Jesus and I" with our children — a beautifully illustrated children\'s book on the Eucharist. Also, we started taking them to Eucharistic Adoration early so they understood Communion and Adoration are the same Jesus.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(18, 8, 2, 'The most important thing is taking your child to Mass consistently and explaining what\'s happening. Children absorb so much liturgically when we narrate it for them.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(19, 8, 3, 'Bishop Barron has a wonderful children\'s catechism series. Also, having your daughter go to Confession before First Communion — even if the parish doesn\'t require it formally — prepares her heart beautifully.', 'published', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(20, 9, 6, 'Spiritual directors do not need to be priests — many excellent directors are laypeople or religious sisters with proper formation. What matters is their training, their own prayer life, and their faithfulness to Church teaching.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(21, 9, 2, 'Ask your diocese — most have a list of trained spiritual directors. Also, monasteries and retreat centers often have directors available to the laity.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(22, 9, 3, 'Start with a retreat. Many retreat centers build in time with a director as part of the experience. That way you can discern whether the relationship is a good fit before committing.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(23, 10, 6, '"Silence" by Shusaku Endo is one of the most profound novels I\'ve ever read. It deals unflinchingly with apostasy and the silence of God in suffering. Deeply Catholic in the best sense.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(24, 10, 2, 'Flannery O\'Connor is essential. Her short stories hit like a fist — grotesque and violent on the surface, but underneath there\'s the grace of God breaking through every page. "A Good Man Is Hard to Find" is a masterpiece.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(25, 10, 3, '"The Power and the Glory" by Graham Greene — the "whisky priest" is one of the most compelling characters in Catholic literature. An imperfect man who continues to administer the sacraments under persecution.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(26, 10, 1, 'Don\'t overlook Walker Percy! "The Moviegoer" and "Love in the Ruins" are brilliant explorations of alienation and Catholic faith in modern America.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(27, 11, 6, 'The Church has clear teaching in Sacrosanctum Concilium and the document "Sing to the Lord." Gregorian chant has "pride of place" (article 116). The ideal is chant, polyphony, and other sacred music — not entertainment-style music.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(28, 11, 2, 'Even a small schola of 4–6 trained singers can transform a parish\'s liturgical life. The key is not a big choir but a committed, well-formed group.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(29, 11, 3, 'Our parish introduced one chanted psalm at every Mass. The congregation learned it over about six weeks. It was a manageable step that immediately improved the liturgical atmosphere.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(30, 12, 6, 'I usually agree with the premise and then push further: yes, the Church is made of sinners — that\'s precisely the point. Christ founded it not for the righteous but for sinners. The Church doesn\'t claim to be perfect in its members, but in its doctrine and sacraments.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(31, 12, 2, 'The historical argument is powerful: if the Church were merely human, how did it survive 2,000 years? Voltaire predicted it would collapse; Napoleon tried to destroy it. Every human institution that size and age has collapsed. The Church shouldn\'t exist by purely human logic.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(32, 12, 3, '"You might be right that the Church has sinful members — but has the Catholic Church ever formally taught that sin is good? Has it ever officially endorsed what it condemned before? The magisterium\'s faithfulness to moral truth through history is remarkable."', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(33, 13, 6, '"The Lamb\'s Supper" by Scott Hahn is the best popular-level treatment I know — it connects the Mass to the Book of Revelation in a way that makes the Eucharist\'s cosmic significance viscerally real.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(34, 13, 2, 'Bishop Barron\'s Word on Fire has a lot of short videos on the Eucharist. Perfect for sharing on social media with Catholic friends who may be wavering.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(35, 13, 3, 'Go back to John 6. Read it slowly, in context, noting how many disciples left after Jesus said "unless you eat my flesh and drink my blood." He didn\'t call them back and soften the language — He let them go. That\'s the most powerful argument.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(36, 14, 6, 'We\'ve been using the Creighton Model for eight years. It requires commitment to the learning curve but once you\'re fluent in it, it\'s genuinely empowering — especially since Creighton can also be used to diagnose and treat underlying health issues (NaProTechnology).', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(37, 14, 2, 'The Sympto-Thermal Method has a lot of research behind it. The Couple to Couple League offers excellent instruction. The key is doing a proper course — don\'t just use an app without training.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(38, 14, 3, 'The hardest part is the abstinence during fertile times if you have a serious reason to postpone pregnancy. It requires communication, prayer, and mutual sacrifice. But many couples report that NFP actually strengthened their marriage by requiring ongoing communication.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(39, 15, 6, 'The home is the primary school of faith — always. What happens at your kitchen table, at family prayer, and in how you live your daily life matters far more than what happens in any school.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(40, 15, 2, 'We make sure our kids can articulate why they believe what they believe. "Because Mom said so" doesn\'t hold up under peer pressure. "Because this is what human nature requires and the Church teaches why" is much more robust.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(41, 15, 3, 'Find a good parish youth group or a Catholic homeschool co-op that your kids can participate in. Community with other Catholic young people is indispensable.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(42, 15, 1, 'We do a 10-minute family faith conversation over dinner most evenings — just reading a short passage of the Catechism or a saint\'s life. Small and consistent beats intensive and sporadic.', 'published', '2026-03-28 00:50:17', '2026-03-28 00:50:17');

-- Dumping structure for table allcatholicmedia.forum_topics
CREATE TABLE IF NOT EXISTS `forum_topics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `member_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `replies_count` int(10) unsigned NOT NULL DEFAULT '0',
  `is_pinned` tinyint(1) NOT NULL DEFAULT '0',
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `last_reply_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `forum_topics_slug_unique` (`slug`),
  KEY `forum_topics_member_id_foreign` (`member_id`),
  KEY `forum_topics_category_id_status_created_at_index` (`category_id`,`status`,`created_at`),
  CONSTRAINT `forum_topics_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `forum_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `forum_topics_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.forum_topics: ~15 rows (approximately)
REPLACE INTO `forum_topics` (`id`, `category_id`, `member_id`, `title`, `slug`, `content`, `views`, `replies_count`, `is_pinned`, `is_locked`, `status`, `last_reply_at`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 'Daily Rosary Intentions — Share Yours', 'daily-rosary-intentions', 'Let us pray together. Please share your intentions for today\'s Rosary. I will carry them with me during the Joyful Mysteries this morning.\\n\\nMy intention: For the unborn and all vulnerable to abortion.', 0, 0, 0, 0, 'published', '2026-03-28 00:02:51', '2026-03-28 00:02:51', '2026-03-28 00:03:25'),
	(2, 3, 1, 'Traditional Latin Mass Resources for Beginners', 'traditional-latin-mass-resources', 'I recently started attending the TLM and would love recommendations for missals, guides, and YouTube channels that explain the prayers and rubrics.', 0, 1, 0, 0, 'published', '2026-03-28 00:02:51', '2026-03-28 00:02:51', '2026-03-28 00:02:51'),
	(3, 1, 6, 'What do you think of Pope Francis\'s recent encyclical on ecology?', 'what-do-you-think-of-pope-franciss-recent-encyclical-on-ecology-ca8ee1', 'Laudato Si\' and Laudate Deum have generated much discussion. I\'d love to hear what the community thinks about the theological foundations of Catholic environmentalism and how we should live it out in our daily lives.', 141, 3, 0, 0, 'published', '2026-03-28 00:41:16', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(4, 1, 3, 'Understanding papal infallibility — what it is and what it is not', 'understanding-papal-infallibility-what-it-is-and-what-it-is-not-7bc97f', 'There\'s so much misunderstanding about papal infallibility, both from Catholics and from non-Catholics. Let\'s have a clear theological discussion. The First Vatican Council defined it very precisely. What are the conditions, and why is it actually invoked very rarely?', 300, 2, 0, 0, 'published', '2026-03-28 00:11:16', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(5, 2, 7, 'Struggling with dryness in prayer — has anyone experienced this?', 'struggling-with-dryness-in-prayer-has-anyone-experienced-this-3f5eb6', 'I\'ve been a practicing Catholic for 15 years but lately my prayer life feels dry and empty. Mass feels routine, the Rosary feels like going through the motions. Is this spiritual dryness? How do the saints and spiritual directors address it?', 294, 4, 0, 0, 'published', '2026-03-28 00:15:16', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(6, 2, 7, 'Best resources for learning Lectio Divina', 'best-resources-for-learning-lectio-divina-91c57f', 'I\'ve heard a lot about Lectio Divina and want to start practicing it but I\'m not sure where to begin. Are there any books, apps, or guides that you\'d recommend for someone completely new to this form of prayer?', 174, 3, 0, 0, 'published', '2026-03-28 00:02:16', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(7, 2, 1, 'Divine Mercy devotion: sharing testimonies and questions', 'divine-mercy-devotion-sharing-testimonies-and-questions-91ce4e', 'The Divine Mercy devotion given to St. Faustina has been a powerful force in my prayer life. I wanted to open a thread for people to share their experiences, ask questions, or discuss the theology behind this devotion. The Chaplet, the Image, the Feast — all are worth discussing.', 90, 2, 0, 0, 'published', '2026-03-28 00:37:16', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(8, 3, 8, 'Preparing children for First Holy Communion — advice and experiences', 'preparing-children-for-first-holy-communion-advice-and-experiences-6505c8', 'My daughter will make her First Communion next spring and I want to supplement what her parish CRE program offers. How have other parents approached this? What resources, practices, or conversations have been most helpful?', 246, 3, 0, 0, 'published', '2026-03-28 00:07:16', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(9, 3, 5, 'How to find a good spiritual director — practical advice', 'how-to-find-a-good-spiritual-director-practical-advice-635445', 'I know I need a spiritual director but I don\'t know how to find one or what to look for. My parish priest is wonderful but very busy. Is it acceptable to work with a spiritual director who is not a priest? How do I even start?', 199, 3, 0, 0, 'published', '2026-03-27 23:52:17', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(10, 4, 5, 'Catholic fiction recommendations — books that sustained your faith', 'catholic-fiction-recommendations-books-that-sustained-your-faith-e8fcca', 'I\'ve been reading more Catholic fiction lately and it\'s been wonderful for my faith. Authors like Shusaku Endo, Graham Greene, Flannery O\'Connor, and Walker Percy write fiction that takes Catholicism seriously without being saccharine. What have you read and loved?', 125, 4, 0, 0, 'published', '2026-03-27 23:59:17', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(11, 4, 7, 'Sacred music in the parish — what\'s the ideal?', 'sacred-music-in-the-parish-whats-the-ideal-a21e4b', 'The quality of sacred music varies enormously from parish to parish. What does the Church actually teach about music at Mass? And practically speaking, how can average parishes improve their music without enormous resources?', 108, 3, 0, 0, 'published', '2026-03-28 00:07:17', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(12, 5, 2, 'How do you respond to the "the Church is just a human institution" objection?', 'how-do-you-respond-to-the-the-church-is-just-a-human-institution-objection-d86581', 'When I share my faith with non-Catholic friends and family, I often hear "the Church is just a human institution full of sinful people — why would I trust it?" How do you engage with this argument charitably and persuasively?', 320, 3, 0, 0, 'published', '2026-03-27 23:59:17', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(13, 5, 5, 'Resources for understanding the Real Presence — for myself and to share', 'resources-for-understanding-the-real-presence-for-myself-and-to-share-25f93a', 'A recent survey found that most self-identified Catholics don\'t believe in the Real Presence of Christ in the Eucharist. I want to deepen my own understanding and also be equipped to share this teaching clearly. What resources have you found most helpful?', 395, 3, 0, 0, 'published', '2026-03-28 00:29:17', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(14, 7, 5, 'NFP — natural family planning experiences and questions', 'nfp-natural-family-planning-experiences-and-questions-ac71cd', 'My wife and I are engaged and taking a marriage prep course that touches on NFP. We have honest questions about how it works practically, what the different methods are, and how Catholic couples have integrated this into their marriage. Open discussion welcome.', 227, 3, 0, 0, 'published', '2026-03-28 00:38:17', '2026-03-28 00:50:17', '2026-03-28 00:50:17'),
	(15, 6, 3, 'Raising Catholic children in a secular school environment', 'raising-catholic-children-in-a-secular-school-environment-187153', 'My children attend public school and face constant pressure from peers and sometimes teachers that implicitly (and sometimes explicitly) contradicts Catholic values. How do other Catholic families handle this? We can\'t afford Catholic school.', 151, 4, 0, 0, 'published', '2026-03-28 00:43:17', '2026-03-28 00:50:17', '2026-03-28 00:50:17');

-- Dumping structure for table allcatholicmedia.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.galleries: ~20 rows (approximately)
REPLACE INTO `galleries` (`id`, `name`, `description`, `is_featured`, `order`, `image`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Perfect', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/1.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(2, 'New Day', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/2.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(3, 'Happy Day', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/3.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(4, 'Nature', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/4.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(5, 'Morning', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/5.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(6, 'Sunset', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/6.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(7, 'Ocean Views', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/7.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(8, 'Adventure Time', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/8.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(9, 'City Lights', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/9.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(10, 'Dreamscape', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/10.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(11, 'Enchanted Forest', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/11.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(12, 'Golden Hour', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/12.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(13, 'Serenity', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/13.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(14, 'Eternal Beauty', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/14.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(15, 'Moonlight Magic', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/15.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(16, 'Starry Night', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/16.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(17, 'Hidden Gems', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/17.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(18, 'Tranquil Waters', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/18.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(19, 'Urban Escape', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/19.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(20, 'Twilight Zone', 'A beautiful collection of images showcasing memorable moments and stunning visuals.', 0, 0, 'main/news/20.jpg', 1, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26');

-- Dumping structure for table allcatholicmedia.galleries_translations
CREATE TABLE IF NOT EXISTS `galleries_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleries_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`galleries_id`),
  KEY `idx_galleries_trans_galleries_id` (`galleries_id`),
  KEY `idx_galleries_trans_gallery_lang` (`galleries_id`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.galleries_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.gallery_meta
CREATE TABLE IF NOT EXISTS `gallery_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `images` text COLLATE utf8mb4_unicode_ci,
  `reference_id` bigint(20) unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_meta_reference_id_index` (`reference_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.gallery_meta: ~20 rows (approximately)
REPLACE INTO `gallery_meta` (`id`, `images`, `reference_id`, `reference_type`, `created_at`, `updated_at`) VALUES
	(1, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 1, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(2, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 2, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(3, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 3, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(4, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 4, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(5, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 5, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(6, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 6, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(7, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 7, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(8, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 8, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(9, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 9, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(10, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 10, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(11, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 11, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(12, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 12, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(13, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 13, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(14, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 14, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(15, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 15, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(16, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 16, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(17, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 17, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(18, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 18, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(19, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 19, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(20, '[{"img":"main\\/news\\/1.jpg","description":""},{"img":"main\\/news\\/2.jpg","description":""},{"img":"main\\/news\\/3.jpg","description":""},{"img":"main\\/news\\/4.jpg","description":""},{"img":"main\\/news\\/5.jpg","description":""},{"img":"main\\/news\\/6.jpg","description":""},{"img":"main\\/news\\/7.jpg","description":""},{"img":"main\\/news\\/8.jpg","description":""},{"img":"main\\/news\\/9.jpg","description":""},{"img":"main\\/news\\/10.jpg","description":""},{"img":"main\\/news\\/11.jpg","description":""},{"img":"main\\/news\\/12.jpg","description":""},{"img":"main\\/news\\/13.jpg","description":""},{"img":"main\\/news\\/14.jpg","description":""},{"img":"main\\/news\\/15.jpg","description":""},{"img":"main\\/news\\/16.jpg","description":""},{"img":"main\\/news\\/17.jpg","description":""},{"img":"main\\/news\\/18.jpg","description":""},{"img":"main\\/news\\/19.jpg","description":""},{"img":"main\\/news\\/20.jpg","description":""}]', 20, 'Botble\\Gallery\\Models\\Gallery', '2025-12-24 07:30:26', '2025-12-24 07:30:26');

-- Dumping structure for table allcatholicmedia.gallery_meta_translations
CREATE TABLE IF NOT EXISTS `gallery_meta_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_meta_id` bigint(20) unsigned NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`gallery_meta_id`),
  KEY `idx_gallery_meta_trans_gm_id` (`gallery_meta_id`),
  KEY `idx_gallery_meta_trans_gm_lang` (`gallery_meta_id`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.gallery_meta_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.jobs: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_flag` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_is_default` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `lang_order` int(11) NOT NULL DEFAULT '0',
  `lang_is_rtl` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  KEY `lang_locale_index` (`lang_locale`),
  KEY `lang_code_index` (`lang_code`),
  KEY `lang_is_default_index` (`lang_is_default`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.languages: ~1 rows (approximately)
REPLACE INTO `languages` (`lang_id`, `lang_name`, `lang_locale`, `lang_code`, `lang_flag`, `lang_is_default`, `lang_order`, `lang_is_rtl`) VALUES
	(1, 'English', 'en', 'en_US', 'us', 1, 0, 0);

-- Dumping structure for table allcatholicmedia.language_meta
CREATE TABLE IF NOT EXISTS `language_meta` (
  `lang_meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lang_meta_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_meta_origin` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` bigint(20) unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`lang_meta_id`),
  KEY `language_meta_reference_id_index` (`reference_id`),
  KEY `meta_code_index` (`lang_meta_code`),
  KEY `meta_origin_index` (`lang_meta_origin`),
  KEY `meta_reference_type_index` (`reference_type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.language_meta: ~7 rows (approximately)
REPLACE INTO `language_meta` (`lang_meta_id`, `lang_meta_code`, `lang_meta_origin`, `reference_id`, `reference_type`) VALUES
	(1, 'en_US', '001fcc084e868b136aafe2aec8c3e989', 1, 'Botble\\Menu\\Models\\MenuLocation'),
	(2, 'en_US', 'f98c5f3fcb1218b82dfbffdc0f3410d5', 1, 'Botble\\Menu\\Models\\Menu'),
	(3, 'en_US', '778a5c112cf7f2cb405a34334bdc8a77', 24, 'Botble\\Menu\\Models\\MenuNode'),
	(4, 'en_US', '0b81640b562b12e6eb461b249c393570', 25, 'Botble\\Menu\\Models\\MenuNode'),
	(5, 'en_US', 'dfe5e9bb85d7c109d6632b6f3134b36f', 26, 'Botble\\Menu\\Models\\MenuNode'),
	(6, 'en_US', 'f4de7ce1b4fe587802a87a39748f920f', 27, 'Botble\\Menu\\Models\\MenuNode'),
	(7, 'en_US', 'bf3cc3e1068d2adf3f9965123abdd979', 28, 'Botble\\Menu\\Models\\MenuNode');

-- Dumping structure for table allcatholicmedia.live_streams
CREATE TABLE IF NOT EXISTS `live_streams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `embed_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_live` tinyint(1) NOT NULL DEFAULT '0',
  `scheduled_at` datetime DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int(11) NOT NULL DEFAULT '0',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.live_streams: ~4 rows (approximately)
REPLACE INTO `live_streams` (`id`, `title`, `description`, `embed_url`, `source_name`, `location`, `is_live`, `scheduled_at`, `thumbnail`, `order_column`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Daily Mass — Vatican', NULL, 'https://www.youtube.com/watch?v=KkM5U3uFbLc', 'Vatican News', 'Vatican City', 1, NULL, NULL, 0, 'published', '2026-03-27 23:50:01', '2026-03-27 23:50:01'),
	(2, 'Sunday Mass — St. Patrick\'s Cathedral', NULL, 'https://www.youtube.com/watch?v=uBtBekb4rOg', 'St. Patrick\'s Cathedral', 'New York, USA', 0, '2026-03-28 02:50:01', NULL, 0, 'published', '2026-03-27 23:50:01', '2026-03-27 23:50:01'),
	(3, 'Holy Rosary — World Mission Rosary', NULL, 'https://www.youtube.com/watch?v=B4yIBk4BQJA', 'EWTN', 'Irondale, Alabama, USA', 0, '2026-03-28 05:50:01', NULL, 0, 'published', '2026-03-27 23:50:01', '2026-03-27 23:50:01'),
	(4, 'Papal Audience — General Audience', NULL, 'https://www.youtube.com/watch?v=gNMvJSPCDMM', 'Vatican News', 'Vatican City', 0, '2026-03-29 00:50:01', NULL, 0, 'published', '2026-03-27 23:50:01', '2026-03-27 23:50:01');

-- Dumping structure for table allcatholicmedia.media_files
CREATE TABLE IF NOT EXISTS `media_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `mime_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibility` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  PRIMARY KEY (`id`),
  KEY `media_files_user_id_index` (`user_id`),
  KEY `media_files_index` (`folder_id`,`user_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.media_files: ~78 rows (approximately)
REPLACE INTO `media_files` (`id`, `user_id`, `name`, `alt`, `folder_id`, `mime_type`, `size`, `url`, `options`, `created_at`, `updated_at`, `deleted_at`, `visibility`) VALUES
	(1, 0, 'about-1', 'about-1', 2, 'image/png', 8467, 'main/general/about-1.png', '[]', '2025-12-24 07:30:11', '2025-12-24 07:30:11', NULL, 'public'),
	(2, 0, 'about-2', 'about-2', 2, 'image/png', 8467, 'main/general/about-2.png', '[]', '2025-12-24 07:30:11', '2025-12-24 07:30:11', NULL, 'public'),
	(3, 0, 'about-video-1', 'about-video-1', 2, 'image/png', 20777, 'main/general/about-video-1.png', '[]', '2025-12-24 07:30:11', '2025-12-24 07:30:11', NULL, 'public'),
	(4, 0, 'ads-banner', 'ads-banner', 2, 'image/png', 75705, 'main/general/ads-banner.png', '[]', '2025-12-24 07:30:11', '2025-12-24 07:30:11', NULL, 'public'),
	(5, 0, 'app-downloads', 'app-downloads', 2, 'image/png', 7092, 'main/general/app-downloads.png', '[]', '2025-12-24 07:30:11', '2025-12-24 07:30:11', NULL, 'public'),
	(6, 0, 'blog-3', 'blog-3', 2, 'image/png', 5919, 'main/general/blog-3.png', '[]', '2025-12-24 07:30:11', '2025-12-24 07:30:11', NULL, 'public'),
	(7, 0, 'blog-4', 'blog-4', 2, 'image/png', 5919, 'main/general/blog-4.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(8, 0, 'blog-5', 'blog-5', 2, 'image/png', 8614, 'main/general/blog-5.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(9, 0, 'blog-shape-image', 'blog-shape-image', 2, 'image/png', 1181, 'main/general/blog-shape-image.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(10, 0, 'favicon', 'favicon', 2, 'image/png', 736, 'main/general/favicon.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(11, 0, 'logo-dark', 'logo-dark', 2, 'image/png', 2096, 'main/general/logo-dark.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(12, 0, 'logo', 'logo', 2, 'image/png', 2684, 'main/general/logo.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(13, 0, 'newsletter-image', 'newsletter-image', 2, 'image/png', 21532, 'main/general/newsletter-image.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(14, 0, 'newsletter-popup', 'newsletter-popup', 2, 'image/png', 24175, 'main/general/newsletter-popup.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(15, 0, 'signature', 'signature', 2, 'image/png', 2438, 'main/general/signature.png', '[]', '2025-12-24 07:30:12', '2025-12-24 07:30:12', NULL, 'public'),
	(16, 0, '1', '1', 3, 'image/png', 9803, 'main/members/1.png', '[]', '2025-12-24 07:30:13', '2025-12-24 07:30:13', NULL, 'public'),
	(17, 0, '2', '2', 3, 'image/png', 9803, 'main/members/2.png', '[]', '2025-12-24 07:30:13', '2025-12-24 07:30:13', NULL, 'public'),
	(18, 0, '3', '3', 3, 'image/png', 9803, 'main/members/3.png', '[]', '2025-12-24 07:30:13', '2025-12-24 07:30:13', NULL, 'public'),
	(19, 0, '4', '4', 3, 'image/png', 9803, 'main/members/4.png', '[]', '2025-12-24 07:30:13', '2025-12-24 07:30:13', NULL, 'public'),
	(20, 0, '5', '5', 3, 'image/png', 9803, 'main/members/5.png', '[]', '2025-12-24 07:30:13', '2025-12-24 07:30:13', NULL, 'public'),
	(21, 0, '6', '6', 3, 'image/png', 9803, 'main/members/6.png', '[]', '2025-12-24 07:30:14', '2025-12-24 07:30:14', NULL, 'public'),
	(22, 0, '7', '7', 3, 'image/png', 9803, 'main/members/7.png', '[]', '2025-12-24 07:30:14', '2025-12-24 07:30:14', NULL, 'public'),
	(23, 0, '8', '8', 3, 'image/png', 9803, 'main/members/8.png', '[]', '2025-12-24 07:30:14', '2025-12-24 07:30:14', NULL, 'public'),
	(24, 0, '1', '1', 4, 'image/jpeg', 33268, 'main/news/1.jpg', '[]', '2025-12-24 07:30:16', '2025-12-24 07:30:16', NULL, 'public'),
	(25, 0, '10', '10', 4, 'image/jpeg', 33268, 'main/news/10.jpg', '[]', '2025-12-24 07:30:16', '2025-12-24 07:30:16', NULL, 'public'),
	(26, 0, '11', '11', 4, 'image/jpeg', 33268, 'main/news/11.jpg', '[]', '2025-12-24 07:30:16', '2025-12-24 07:30:16', NULL, 'public'),
	(27, 0, '12', '12', 4, 'image/jpeg', 33268, 'main/news/12.jpg', '[]', '2025-12-24 07:30:16', '2025-12-24 07:30:16', NULL, 'public'),
	(28, 0, '13', '13', 4, 'image/jpeg', 33268, 'main/news/13.jpg', '[]', '2025-12-24 07:30:17', '2025-12-24 07:30:17', NULL, 'public'),
	(29, 0, '14', '14', 4, 'image/jpeg', 33268, 'main/news/14.jpg', '[]', '2025-12-24 07:30:17', '2025-12-24 07:30:17', NULL, 'public'),
	(30, 0, '15', '15', 4, 'image/jpeg', 33268, 'main/news/15.jpg', '[]', '2025-12-24 07:30:17', '2025-12-24 07:30:17', NULL, 'public'),
	(31, 0, '16', '16', 4, 'image/jpeg', 33268, 'main/news/16.jpg', '[]', '2025-12-24 07:30:17', '2025-12-24 07:30:17', NULL, 'public'),
	(32, 0, '17', '17', 4, 'image/jpeg', 33268, 'main/news/17.jpg', '[]', '2025-12-24 07:30:18', '2025-12-24 07:30:18', NULL, 'public'),
	(33, 0, '18', '18', 4, 'image/jpeg', 33268, 'main/news/18.jpg', '[]', '2025-12-24 07:30:18', '2025-12-24 07:30:18', NULL, 'public'),
	(34, 0, '19', '19', 4, 'image/jpeg', 33268, 'main/news/19.jpg', '[]', '2025-12-24 07:30:18', '2025-12-24 07:30:18', NULL, 'public'),
	(35, 0, '2', '2', 4, 'image/jpeg', 33268, 'main/news/2.jpg', '[]', '2025-12-24 07:30:18', '2025-12-24 07:30:18', NULL, 'public'),
	(36, 0, '20', '20', 4, 'image/jpeg', 33268, 'main/news/20.jpg', '[]', '2025-12-24 07:30:19', '2025-12-24 07:30:19', NULL, 'public'),
	(37, 0, '3', '3', 4, 'image/jpeg', 33268, 'main/news/3.jpg', '[]', '2025-12-24 07:30:19', '2025-12-24 07:30:19', NULL, 'public'),
	(38, 0, '4', '4', 4, 'image/jpeg', 33268, 'main/news/4.jpg', '[]', '2025-12-24 07:30:19', '2025-12-24 07:30:19', NULL, 'public'),
	(39, 0, '5', '5', 4, 'image/jpeg', 33268, 'main/news/5.jpg', '[]', '2025-12-24 07:30:19', '2025-12-24 07:30:19', NULL, 'public'),
	(40, 0, '6', '6', 4, 'image/jpeg', 33268, 'main/news/6.jpg', '[]', '2025-12-24 07:30:20', '2025-12-24 07:30:20', NULL, 'public'),
	(41, 0, '7', '7', 4, 'image/jpeg', 33268, 'main/news/7.jpg', '[]', '2025-12-24 07:30:20', '2025-12-24 07:30:20', NULL, 'public'),
	(42, 0, '8', '8', 4, 'image/jpeg', 33268, 'main/news/8.jpg', '[]', '2025-12-24 07:30:20', '2025-12-24 07:30:20', NULL, 'public'),
	(43, 0, '9', '9', 4, 'image/jpeg', 33268, 'main/news/9.jpg', '[]', '2025-12-24 07:30:20', '2025-12-24 07:30:20', NULL, 'public'),
	(44, 0, 'audio', 'audio', 5, 'audio/mpeg', 239584, 'main/audio/audio.mp3', '[]', '2025-12-24 07:30:21', '2025-12-24 07:30:21', NULL, 'public'),
	(45, 0, '1', '1', 7, 'image/jpeg', 33268, 'politics/news/1.jpg', '[]', '2025-12-24 07:30:21', '2025-12-24 07:30:21', NULL, 'public'),
	(46, 0, '10', '10', 7, 'image/jpeg', 33268, 'politics/news/10.jpg', '[]', '2025-12-24 07:30:21', '2025-12-24 07:30:21', NULL, 'public'),
	(47, 0, '11', '11', 7, 'image/jpeg', 33268, 'politics/news/11.jpg', '[]', '2025-12-24 07:30:21', '2025-12-24 07:30:21', NULL, 'public'),
	(48, 0, '12', '12', 7, 'image/jpeg', 33268, 'politics/news/12.jpg', '[]', '2025-12-24 07:30:22', '2025-12-24 07:30:22', NULL, 'public'),
	(49, 0, '13', '13', 7, 'image/jpeg', 33268, 'politics/news/13.jpg', '[]', '2025-12-24 07:30:22', '2025-12-24 07:30:22', NULL, 'public'),
	(50, 0, '14', '14', 7, 'image/jpeg', 33268, 'politics/news/14.jpg', '[]', '2025-12-24 07:30:22', '2025-12-24 07:30:22', NULL, 'public'),
	(51, 0, '15', '15', 7, 'image/jpeg', 33268, 'politics/news/15.jpg', '[]', '2025-12-24 07:30:22', '2025-12-24 07:30:22', NULL, 'public'),
	(52, 0, '16', '16', 7, 'image/jpeg', 33268, 'politics/news/16.jpg', '[]', '2025-12-24 07:30:23', '2025-12-24 07:30:23', NULL, 'public'),
	(53, 0, '17', '17', 7, 'image/jpeg', 33268, 'politics/news/17.jpg', '[]', '2025-12-24 07:30:23', '2025-12-24 07:30:23', NULL, 'public'),
	(54, 0, '18', '18', 7, 'image/jpeg', 33268, 'politics/news/18.jpg', '[]', '2025-12-24 07:30:23', '2025-12-24 07:30:23', NULL, 'public'),
	(55, 0, '19', '19', 7, 'image/jpeg', 33268, 'politics/news/19.jpg', '[]', '2025-12-24 07:30:23', '2025-12-24 07:30:23', NULL, 'public'),
	(56, 0, '2', '2', 7, 'image/jpeg', 33268, 'politics/news/2.jpg', '[]', '2025-12-24 07:30:24', '2025-12-24 07:30:24', NULL, 'public'),
	(57, 0, '20', '20', 7, 'image/jpeg', 33268, 'politics/news/20.jpg', '[]', '2025-12-24 07:30:24', '2025-12-24 07:30:24', NULL, 'public'),
	(58, 0, '3', '3', 7, 'image/jpeg', 33268, 'politics/news/3.jpg', '[]', '2025-12-24 07:30:24', '2025-12-24 07:30:24', NULL, 'public'),
	(59, 0, '4', '4', 7, 'image/jpeg', 33268, 'politics/news/4.jpg', '[]', '2025-12-24 07:30:24', '2025-12-24 07:30:24', NULL, 'public'),
	(60, 0, '5', '5', 7, 'image/jpeg', 33268, 'politics/news/5.jpg', '[]', '2025-12-24 07:30:25', '2025-12-24 07:30:25', NULL, 'public'),
	(61, 0, '6', '6', 7, 'image/jpeg', 33268, 'politics/news/6.jpg', '[]', '2025-12-24 07:30:25', '2025-12-24 07:30:25', NULL, 'public'),
	(62, 0, '7', '7', 7, 'image/jpeg', 33268, 'politics/news/7.jpg', '[]', '2025-12-24 07:30:25', '2025-12-24 07:30:25', NULL, 'public'),
	(63, 0, '8', '8', 7, 'image/jpeg', 33268, 'politics/news/8.jpg', '[]', '2025-12-24 07:30:25', '2025-12-24 07:30:25', NULL, 'public'),
	(64, 0, '9', '9', 7, 'image/jpeg', 33268, 'politics/news/9.jpg', '[]', '2025-12-24 07:30:26', '2025-12-24 07:30:26', NULL, 'public'),
	(65, 0, 'blog-category-bg', 'blog-category-bg', 8, 'image/png', 1616, 'politics/backgrounds/blog-category-bg.png', '[]', '2025-12-24 07:30:26', '2025-12-24 07:30:26', NULL, 'public'),
	(66, 0, 'slider-bg', 'slider-bg', 8, 'image/png', 26471, 'politics/backgrounds/slider-bg.png', '[]', '2025-12-24 07:30:26', '2025-12-24 07:30:26', NULL, 'public'),
	(67, 0, 'favicon', 'favicon', 9, 'image/png', 2174, 'politics/general/favicon.png', '[]', '2025-12-24 07:30:26', '2025-12-24 07:30:26', NULL, 'public'),
	(68, 0, 'logo', 'logo', 9, 'image/png', 1992, 'politics/general/logo.png', '[]', '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL, 'public'),
	(69, 0, 'newsletter-image', 'newsletter-image', 9, 'image/png', 17789, 'politics/general/newsletter-image.png', '[]', '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL, 'public'),
	(70, 0, 'breadcrumb', 'breadcrumb', 10, 'image/png', 109184, 'main/backgrounds/breadcrumb.png', '[]', '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL, 'public'),
	(71, 0, 'newsletter-bg', 'newsletter-bg', 10, 'image/png', 15423, 'main/backgrounds/newsletter-bg.png', '[]', '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL, 'public'),
	(72, 0, '1', '1', 11, 'image/png', 1455, 'main/blog-categories/1.png', '[]', '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL, 'public'),
	(73, 0, '2', '2', 11, 'image/png', 1455, 'main/blog-categories/2.png', '[]', '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL, 'public'),
	(74, 0, '3', '3', 11, 'image/png', 1455, 'main/blog-categories/3.png', '[]', '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL, 'public'),
	(75, 0, '4', '4', 11, 'image/png', 1455, 'main/blog-categories/4.png', '[]', '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL, 'public'),
	(76, 0, '5', '5', 11, 'image/png', 1455, 'main/blog-categories/5.png', '[]', '2025-12-24 07:30:28', '2025-12-24 07:30:28', NULL, 'public'),
	(77, 0, 'breaking-news-icon', 'breaking-news-icon', 12, 'image/png', 1116, 'main/icons/breaking-news-icon.png', '[]', '2025-12-24 07:30:28', '2025-12-24 07:30:28', NULL, 'public'),
	(78, 1, 'Header', 'Header', 0, 'image/png', 2779, 'header.png', '[]', '2026-03-27 22:58:01', '2026-03-27 22:58:01', NULL, 'public');

-- Dumping structure for table allcatholicmedia.media_folders
CREATE TABLE IF NOT EXISTS `media_folders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_folders_user_id_index` (`user_id`),
  KEY `media_folders_index` (`parent_id`,`user_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.media_folders: ~12 rows (approximately)
REPLACE INTO `media_folders` (`id`, `user_id`, `name`, `color`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 0, 'main', NULL, 'main', 0, '2025-12-24 07:30:11', '2025-12-24 07:30:11', NULL),
	(2, 0, 'general', NULL, 'general', 1, '2025-12-24 07:30:11', '2025-12-24 07:30:11', NULL),
	(3, 0, 'members', NULL, 'members', 1, '2025-12-24 07:30:13', '2025-12-24 07:30:13', NULL),
	(4, 0, 'news', NULL, 'news', 1, '2025-12-24 07:30:15', '2025-12-24 07:30:15', NULL),
	(5, 0, 'audio', NULL, 'audio', 1, '2025-12-24 07:30:21', '2025-12-24 07:30:21', NULL),
	(6, 0, 'politics', NULL, 'politics', 0, '2025-12-24 07:30:21', '2025-12-24 07:30:21', NULL),
	(7, 0, 'news', NULL, 'news', 6, '2025-12-24 07:30:21', '2025-12-24 07:30:21', NULL),
	(8, 0, 'backgrounds', NULL, 'backgrounds', 6, '2025-12-24 07:30:26', '2025-12-24 07:30:26', NULL),
	(9, 0, 'general', NULL, 'general', 6, '2025-12-24 07:30:26', '2025-12-24 07:30:26', NULL),
	(10, 0, 'backgrounds', NULL, 'backgrounds', 1, '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL),
	(11, 0, 'blog-categories', NULL, 'blog-categories', 1, '2025-12-24 07:30:27', '2025-12-24 07:30:27', NULL),
	(12, 0, 'icons', NULL, 'icons', 1, '2025-12-24 07:30:28', '2025-12-24 07:30:28', NULL);

-- Dumping structure for table allcatholicmedia.media_settings
CREATE TABLE IF NOT EXISTS `media_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `media_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.media_settings: ~1 rows (approximately)
REPLACE INTO `media_settings` (`id`, `key`, `value`, `media_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'recent_items', '[{"id":78,"is_folder":false}]', NULL, 1, '2026-03-27 22:58:04', '2026-03-27 22:58:04');

-- Dumping structure for table allcatholicmedia.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_id` bigint(20) unsigned DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `email_verify_token` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.members: ~8 rows (approximately)
REPLACE INTO `members` (`id`, `first_name`, `last_name`, `description`, `gender`, `email`, `password`, `avatar_id`, `dob`, `phone`, `confirmed_at`, `email_verify_token`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'John', 'Smith', 'NOT marked \'poison,\' it is.', NULL, 'member@archielite.com', '$2y$12$OXloF7xmIvAsWc4mXt45..pW45gSJHfQj9vOCiuu2BlnbLX/G4Ncy', 16, '2009-02-05', '(470) 632-4613', '2025-12-24 14:30:14', NULL, NULL, '2025-12-24 07:30:14', '2025-12-24 07:30:14', 'published'),
	(2, 'Blanca', 'Schultz', 'Hi, I’m Blanca Schultz, Your Blogging Journey Guide 🖋️. Writing, one blog post at a time, to inspire, inform, and ignite your curiosity. Join me as we explore the world through words and embark on a limitless adventure of knowledge and creativity. Let’s bring your thoughts to life on these digital pages. 🌟 #BloggingAdventures', NULL, 'duane70@gmail.com', '$2y$12$dH1AudJvyjW1rlBQNSMhwOK0Tw9aapi3JkieJjdwrEEVs00HMl/O2', 17, '1998-07-20', '+1.425.376.2772', '2025-12-24 14:30:14', NULL, NULL, '2025-12-24 07:30:14', '2025-12-24 07:30:14', 'published'),
	(3, 'Julien', 'Friesen', 'Hi, I’m Julien Friesen, Your Blogging Journey Guide 🖋️. Writing, one blog post at a time, to inspire, inform, and ignite your curiosity. Join me as we explore the world through words and embark on a limitless adventure of knowledge and creativity. Let’s bring your thoughts to life on these digital pages. 🌟 #BloggingAdventures', NULL, 'melissa67@rogahn.com', '$2y$12$RouhFdT1y5tKkZvxUoDNIOnBHfBoFJEm6js6MJYiDPKTRE0KUIkx2', 18, '1983-10-10', '+1-629-821-5448', '2025-12-24 14:30:14', NULL, NULL, '2025-12-24 07:30:14', '2025-12-24 07:30:14', 'published'),
	(4, 'Krystal', 'Stokes', 'Hi, I’m Krystal Stokes, Your Blogging Journey Guide 🖋️. Writing, one blog post at a time, to inspire, inform, and ignite your curiosity. Join me as we explore the world through words and embark on a limitless adventure of knowledge and creativity. Let’s bring your thoughts to life on these digital pages. 🌟 #BloggingAdventures', NULL, 'xlang@hotmail.com', '$2y$12$EACZ.6ultHC1ldA3z3a2GuZiouXVNbvP2ZoX/rji1ng7m0fOTzksm', 19, '2011-10-29', '1-580-547-7472', '2025-12-24 14:30:14', NULL, NULL, '2025-12-24 07:30:15', '2025-12-24 07:30:15', 'published'),
	(5, 'Bridget', 'Cruickshank', 'Hi, I’m Bridget Cruickshank, Your Blogging Journey Guide 🖋️. Writing, one blog post at a time, to inspire, inform, and ignite your curiosity. Join me as we explore the world through words and embark on a limitless adventure of knowledge and creativity. Let’s bring your thoughts to life on these digital pages. 🌟 #BloggingAdventures', NULL, 'wkilback@yahoo.com', '$2y$12$85idtosbqQEHMzTd56fb/OyGQXfYdWqFIwN8mMKOU47Tbp70KQ2uK', 20, '2014-08-22', '+1-785-763-3006', '2025-12-24 14:30:14', NULL, NULL, '2025-12-24 07:30:15', '2025-12-24 07:30:15', 'published'),
	(6, 'Kylie', 'Purdy', 'Hi, I’m Kylie Purdy, Your Blogging Journey Guide 🖋️. Writing, one blog post at a time, to inspire, inform, and ignite your curiosity. Join me as we explore the world through words and embark on a limitless adventure of knowledge and creativity. Let’s bring your thoughts to life on these digital pages. 🌟 #BloggingAdventures', NULL, 'carley.cronin@senger.com', '$2y$12$Nq0VsTbpzdZrSZBknBB3EuuZkzqmhQ0hLRjoh.WUfbjRd/69eSUge', 21, '1988-09-01', '+1-559-413-8132', '2025-12-24 14:30:14', NULL, NULL, '2025-12-24 07:30:15', '2025-12-24 07:30:15', 'published'),
	(7, 'Stan', 'Macejkovic', 'Hi, I’m Stan Macejkovic, Your Blogging Journey Guide 🖋️. Writing, one blog post at a time, to inspire, inform, and ignite your curiosity. Join me as we explore the world through words and embark on a limitless adventure of knowledge and creativity. Let’s bring your thoughts to life on these digital pages. 🌟 #BloggingAdventures', NULL, 'noble.quitzon@smith.com', '$2y$12$uQ3TjDkaM6QX85YMiQAqs.aN2BMj2IPIOmGb1hFFmoKDaxJTU5TTm', 22, '2021-07-12', '+1.220.744.2495', '2025-12-24 14:30:14', NULL, NULL, '2025-12-24 07:30:15', '2025-12-24 07:30:15', 'published'),
	(8, 'Elisabeth', 'Gislason', 'Hi, I’m Elisabeth Gislason, Your Blogging Journey Guide 🖋️. Writing, one blog post at a time, to inspire, inform, and ignite your curiosity. Join me as we explore the world through words and embark on a limitless adventure of knowledge and creativity. Let’s bring your thoughts to life on these digital pages. 🌟 #BloggingAdventures', NULL, 'qhuels@zulauf.biz', '$2y$12$xdX8Or1ko3bqVXfg/DjUJOeQwMpoBqHsCw7Jyv6jZFqMM4hUsmRcy', 23, '2020-06-17', '(615) 499-4575', '2025-12-24 14:30:14', NULL, NULL, '2025-12-24 07:30:15', '2025-12-24 07:30:15', 'published');

-- Dumping structure for table allcatholicmedia.member_activity_logs
CREATE TABLE IF NOT EXISTS `member_activity_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `reference_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_activity_logs_member_id_index` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.member_activity_logs: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.member_password_resets
CREATE TABLE IF NOT EXISTS `member_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `member_password_resets_email_index` (`email`),
  KEY `member_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.member_password_resets: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.menus: ~1 rows (approximately)
REPLACE INTO `menus` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Main menu', 'main-menu', 'published', '2025-12-24 07:30:28', '2026-03-27 23:03:21');

-- Dumping structure for table allcatholicmedia.menu_locations
CREATE TABLE IF NOT EXISTS `menu_locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) unsigned NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_locations_menu_id_created_at_index` (`menu_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.menu_locations: ~1 rows (approximately)
REPLACE INTO `menu_locations` (`id`, `menu_id`, `location`, `created_at`, `updated_at`) VALUES
	(1, 1, 'main-menu', '2025-12-24 07:30:28', '2025-12-24 07:30:28');

-- Dumping structure for table allcatholicmedia.menu_nodes
CREATE TABLE IF NOT EXISTS `menu_nodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) unsigned NOT NULL,
  `parent_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `reference_id` bigint(20) unsigned DEFAULT NULL,
  `reference_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_font` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `has_child` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_nodes_menu_id_index` (`menu_id`),
  KEY `menu_nodes_parent_id_index` (`parent_id`),
  KEY `reference_id` (`reference_id`),
  KEY `reference_type` (`reference_type`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.menu_nodes: ~5 rows (approximately)
REPLACE INTO `menu_nodes` (`id`, `menu_id`, `parent_id`, `reference_id`, `reference_type`, `url`, `icon_font`, `position`, `title`, `css_class`, `target`, `has_child`, `created_at`, `updated_at`) VALUES
	(24, 1, 0, 0, NULL, '/', '', 0, 'Home', '', '_self', 0, '2026-03-27 22:28:10', '2026-03-27 23:03:21'),
	(25, 1, 0, 0, NULL, '/videos', '', 1, 'Watch', '', '_self', 0, '2026-03-27 22:28:10', '2026-03-27 23:03:21'),
	(26, 1, 0, 0, NULL, '/live', '', 2, 'Live', '', '_self', 0, '2026-03-27 22:28:10', '2026-03-27 23:03:21'),
	(27, 1, 0, 0, NULL, '/blog', '', 3, 'News', '', '_self', 0, '2026-03-27 22:28:10', '2026-03-27 23:03:22'),
	(28, 1, 0, 0, NULL, '/contact', '', 4, 'Contact', '', '_self', 0, '2026-03-27 22:28:10', '2026-03-27 23:03:22');

-- Dumping structure for table allcatholicmedia.meta_boxes
CREATE TABLE IF NOT EXISTS `meta_boxes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci,
  `reference_id` bigint(20) unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_boxes_reference_id_index` (`reference_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.meta_boxes: ~40 rows (approximately)
REPLACE INTO `meta_boxes` (`id`, `meta_key`, `meta_value`, `reference_id`, `reference_type`, `created_at`, `updated_at`) VALUES
	(1, 'title', '["Chef Marketing Officer"]', 1, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:14', '2025-12-24 07:30:14'),
	(2, 'social_links', '[[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]]', 1, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:14', '2025-12-24 07:30:14'),
	(3, 'title', '["Chef Editor"]', 2, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:14', '2025-12-24 07:30:14'),
	(4, 'social_links', '[[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]]', 2, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:14', '2025-12-24 07:30:14'),
	(5, 'title', '["Chef Marketing Officer"]', 3, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:14', '2025-12-24 07:30:14'),
	(6, 'social_links', '[[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]]', 3, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:14', '2025-12-24 07:30:14'),
	(7, 'title', '["Creative Director"]', 4, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(8, 'social_links', '[[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]]', 4, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(9, 'title', '["Chef Marketing Officer"]', 5, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(10, 'social_links', '[[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]]', 5, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(11, 'title', '["Chef Editor"]', 6, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(12, 'social_links', '[[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]]', 6, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(13, 'title', '["Marketing Director"]', 7, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(14, 'social_links', '[[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]]', 7, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(15, 'title', '["Marketing Director"]', 8, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(16, 'social_links', '[[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]]', 8, 'Botble\\Member\\Models\\Member', '2025-12-24 07:30:15', '2025-12-24 07:30:15'),
	(17, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 2, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(18, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 3, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(19, 'audio', '["main\\/audio\\/audio.mp3"]', 4, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(20, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 5, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(21, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 6, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(22, 'audio', '["main\\/audio\\/audio.mp3"]', 7, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(23, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 8, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(24, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 9, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(25, 'audio', '["main\\/audio\\/audio.mp3"]', 10, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(26, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 11, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(27, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 12, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(28, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 14, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(29, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 15, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(30, 'audio', '["main\\/audio\\/audio.mp3"]', 16, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(31, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 17, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(32, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 18, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(33, 'audio', '["main\\/audio\\/audio.mp3"]', 19, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(34, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=yCh9OVLI0SU"]', 20, 'Botble\\Blog\\Models\\Post', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(35, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=KkM5U3uFbLc"]', 21, 'Botble\\Blog\\Models\\Post', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(36, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=uBtBekb4rOg"]', 22, 'Botble\\Blog\\Models\\Post', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(37, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=B4yIBk4BQJA"]', 23, 'Botble\\Blog\\Models\\Post', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(38, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=7LtYe0b-5do"]', 24, 'Botble\\Blog\\Models\\Post', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(39, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=gNMvJSPCDMM"]', 25, 'Botble\\Blog\\Models\\Post', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(40, 'video_url', '["https:\\/\\/www.youtube.com\\/watch?v=V-H7IXHC3_Q"]', 26, 'Botble\\Blog\\Models\\Post', '2026-03-27 23:28:06', '2026-03-27 23:28:06');

-- Dumping structure for table allcatholicmedia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.migrations: ~99 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000001_create_cache_table', 1),
	(2, '2013_04_09_032329_create_base_tables', 1),
	(3, '2013_04_09_062329_create_revisions_table', 1),
	(4, '2014_10_12_000000_create_users_table', 1),
	(5, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(6, '2015_06_18_033822_create_blog_table', 1),
	(7, '2015_06_29_025744_create_audit_history', 1),
	(8, '2015_08_15_122343_create_notes_table', 1),
	(9, '2016_05_28_112028_create_system_request_logs_table', 1),
	(10, '2016_06_10_230148_create_acl_tables', 1),
	(11, '2016_06_14_230857_create_menus_table', 1),
	(12, '2016_06_17_091537_create_contacts_table', 1),
	(13, '2016_06_28_221418_create_pages_table', 1),
	(14, '2016_10_03_032336_create_languages_table', 1),
	(15, '2016_10_05_074239_create_setting_table', 1),
	(16, '2016_10_07_193005_create_translations_table', 1),
	(17, '2016_10_13_150201_create_galleries_table', 1),
	(18, '2016_11_28_032840_create_dashboard_widget_tables', 1),
	(19, '2016_12_16_084601_create_widgets_table', 1),
	(20, '2017_05_09_070343_create_media_tables', 1),
	(21, '2017_10_04_140938_create_member_table', 1),
	(22, '2017_10_24_154832_create_newsletter_table', 1),
	(23, '2017_11_03_070450_create_slug_table', 1),
	(24, '2019_01_05_053554_create_jobs_table', 1),
	(25, '2019_08_19_000000_create_failed_jobs_table', 1),
	(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(27, '2020_11_18_150916_ads_create_ads_table', 1),
	(28, '2021_02_16_092633_remove_default_value_for_author_type', 1),
	(29, '2021_10_25_021023_fix-priority-load-for-language-advanced', 1),
	(30, '2021_12_02_035301_add_ads_translations_table', 1),
	(31, '2021_12_03_030600_create_blog_translations', 1),
	(32, '2021_12_03_075608_create_page_translations', 1),
	(33, '2021_12_03_082953_create_gallery_translations', 1),
	(34, '2022_04_19_113923_add_index_to_table_posts', 1),
	(35, '2022_04_20_100851_add_index_to_media_table', 1),
	(36, '2022_04_20_101046_add_index_to_menu_table', 1),
	(37, '2022_04_30_034048_create_gallery_meta_translations_table', 1),
	(38, '2022_07_10_034813_move_lang_folder_to_root', 1),
	(39, '2022_08_04_051940_add_missing_column_expires_at', 1),
	(40, '2022_09_01_000001_create_admin_notifications_tables', 1),
	(41, '2022_10_14_024629_drop_column_is_featured', 1),
	(42, '2022_11_18_063357_add_missing_timestamp_in_table_settings', 1),
	(43, '2022_12_02_093615_update_slug_index_columns', 1),
	(44, '2023_01_30_024431_add_alt_to_media_table', 1),
	(45, '2023_02_16_042611_drop_table_password_resets', 1),
	(46, '2023_04_17_062645_add_open_in_new_tab', 1),
	(47, '2023_04_23_005903_add_column_permissions_to_admin_notifications', 1),
	(48, '2023_05_10_075124_drop_column_id_in_role_users_table', 1),
	(49, '2023_07_06_011444_create_slug_translations_table', 1),
	(50, '2023_08_11_060908_create_announcements_table', 1),
	(51, '2023_08_21_090810_make_page_content_nullable', 1),
	(52, '2023_08_29_074620_make_column_author_id_nullable', 1),
	(53, '2023_08_29_075308_make_column_user_id_nullable', 1),
	(54, '2023_09_14_021936_update_index_for_slugs_table', 1),
	(55, '2023_09_14_022423_add_index_for_language_table', 1),
	(56, '2023_10_16_075332_add_status_column', 1),
	(57, '2023_11_07_023805_add_tablet_mobile_image', 1),
	(58, '2023_11_10_080225_migrate_contact_blacklist_email_domains_to_core', 1),
	(59, '2023_11_14_033417_change_request_column_in_table_audit_histories', 1),
	(60, '2023_12_07_095130_add_color_column_to_media_folders_table', 1),
	(61, '2023_12_12_105220_drop_translations_table', 1),
	(62, '2023_12_17_162208_make_sure_column_color_in_media_folders_nullable', 1),
	(63, '2024_01_16_050056_create_comments_table', 1),
	(64, '2024_03_13_042350_migrate_newsletter_data', 1),
	(65, '2024_03_20_080001_migrate_change_attribute_email_to_nullable_form_contacts_table', 1),
	(66, '2024_03_25_000001_update_captcha_settings', 1),
	(67, '2024_03_25_000001_update_captcha_settings_for_contact', 1),
	(68, '2024_03_25_000001_update_captcha_settings_for_newsletter', 1),
	(69, '2024_04_01_043317_add_google_adsense_slot_id_to_ads_table', 1),
	(70, '2024_04_04_110758_update_value_column_in_user_meta_table', 1),
	(71, '2024_04_19_063914_create_custom_fields_table', 1),
	(72, '2024_04_27_100730_improve_analytics_setting', 1),
	(73, '2024_05_12_091229_add_column_visibility_to_table_media_files', 1),
	(74, '2024_07_07_091316_fix_column_url_in_menu_nodes_table', 1),
	(75, '2024_07_12_100000_change_random_hash_for_media', 1),
	(76, '2024_07_30_091615_fix_order_column_in_categories_table', 1),
	(77, '2024_09_30_024515_create_sessions_table', 1),
	(78, '2024_12_01_000000_add_indexes_to_blog_translations_tables', 1),
	(79, '2024_12_01_000000_add_indexes_to_contact_translations_tables', 1),
	(80, '2024_12_01_000000_add_indexes_to_gallery_translations_tables', 1),
	(81, '2024_12_01_000000_add_indexes_to_pages_translations_table', 1),
	(82, '2024_12_01_000000_add_indexes_to_slugs_translations_table', 1),
	(83, '2024_12_01_000000_add_key_prefix_index_to_slugs_table', 1),
	(84, '2024_12_19_000001_create_device_tokens_table', 1),
	(85, '2024_12_19_000002_create_push_notifications_table', 1),
	(86, '2024_12_19_000003_create_push_notification_recipients_table', 1),
	(87, '2024_12_30_000001_create_user_settings_table', 1),
	(88, '2025_01_06_033807_add_default_value_for_categories_author_type', 1),
	(89, '2025_02_11_153025_add_action_label_to_announcement_translations', 1),
	(90, '2025_04_08_040931_create_social_logins_table', 1),
	(91, '2025_04_21_000000_add_tablet_mobile_image_to_ads_translations_table', 1),
	(92, '2025_05_05_000001_add_user_type_to_audit_histories_table', 1),
	(93, '2025_07_06_030754_add_phone_to_users_table', 1),
	(94, '2025_07_31_add_performance_indexes_to_slugs_table', 1),
	(95, '2025_11_07_000001_add_actor_type_to_audit_histories_table', 1),
	(96, '2025_11_10_000000_cleanup_duplicate_widgets', 1),
	(97, '2025_11_30_100000_add_sessions_invalidated_at_to_users_table', 1),
	(98, '2026_03_28_000001_create_live_streams_table', 2),
	(99, '2026_03_28_000001_create_community_tables', 3);

-- Dumping structure for table allcatholicmedia.newsletters
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'subscribed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.newsletters: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `reference_id` bigint(20) unsigned NOT NULL,
  `reference_type` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notes_user_id_index` (`user_id`),
  KEY `notes_reference_id_index` (`reference_id`),
  KEY `notes_created_by_index` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.notes: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.pages: ~10 rows (approximately)
REPLACE INTO `pages` (`id`, `name`, `content`, `user_id`, `image`, `template`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Homepage', '<div>[blog-posts style="style-1" limit="5" text_color="#000000" background_color="#f0f5fa"][/blog-posts]</div><div>[blog-posts enable_lazy_loading="yes" style="style-6" category_ids="1,2,5" title="FEATURED CATHOLIC NEWS" limit="3" title_align="start" text_color="transparent" background_color="transparent"][/blog-posts]</div><div>[blog-posts enable_lazy_loading="yes" style="style-5" title="Latest News" limit="8" title_align="start" text_color="transparent" background_color="transparent" sidebar="custom_sidebar_1"][/blog-posts]</div><div>[blog-posts enable_lazy_loading="yes" style="style-9" limit="6" text_color="transparent" background_color="transparent"][/blog-posts]</div><div>[blog-posts enable_lazy_loading="yes" style="style-12" title="Faith & Spirituality" category_ids="7,3" limit="6" title_align="start" text_color="transparent" background_color="transparent" sidebar="custom_sidebar_2"][/blog-posts]</div>', 1, NULL, 'homepage', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(2, 'About us', '<div>[about-us title="Know our Publication Media & Vision." subtitle="Bring To The Table Win-Win Survival Strategies To Ensure Proactive Domination. At The End Of The Day Going." description="Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the over holistic world view of disruptive innovation via workplace diversity and Bring to the table win-win survival strategies to ensure proactive fin domination. At the end of the day, going forward, a new normal." staff_name="Raihawly Williamson" staff_description="CEO, Echo Publishing Inc." staff_signature="main/general/signature.png" first_image="main/general/about-1.png" second_image="main/general/about-2.png"][/about-us]</div><div>[intro-video image="main/general/about-video-1.png" video_url="https://www.youtube.com/watch?v=Y1t6rjWYNro" play_icon="ti ti-player-play-filled"][/intro-video]</div>', 1, NULL, 'full-width', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(3, 'Contact', '<div>[contact-form title="General Customer Care & Technical Support" description="We’re here to assist you with any questions or technical issues you may have. Please fill out the form below, and our dedicated team will respond promptly to ensure you have a seamless experience with us." button_label="Send Message" button_icon="ti ti-arrow-right" quantity="3" title_1="Location" description_1="The Business Centre132, New York 12401. United States" icon_1="ti ti-map-pin" url_1="" open_in_new_tab_1="yes" title_2="Email Address" description_2="info@yourmail.com" icon_2="ti ti-mail" url_2="mailto:info@yourmail.com" open_in_new_tab_2="yes" title_3="Phone" description_3="(00) 123 456 789 99" icon_3="ti ti-phone" url_3="tel:(00) 123 456 789 99" open_in_new_tab_3="yes"  address="Fortis Downtown Resort"][/contact-form]</div>', 1, NULL, 'full-width', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(4, 'Blog', '---', 1, NULL, 'full-width', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(5, 'Team', '<div>[members title="Meet Our Professional Team" member_ids="1,2,3,4,5,6,7,8"][/members]</div>', 1, NULL, 'full-width', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(6, 'Cookie Policy', '<h3>EU Cookie Consent</h3><p>To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.</p><h4>Essential Data</h4><p>The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.</p><p>- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.</p><p>- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.</p>', 1, NULL, 'default', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(7, 'Terms Of Use', '<h3>EU Cookie Consent</h3><p>To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.</p><h4>Essential Data</h4><p>The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.</p><p>- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.</p><p>- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.</p>', 1, NULL, 'default', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(8, 'Privacy Policy', '<h3>EU Cookie Consent</h3><p>To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.</p><h4>Essential Data</h4><p>The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.</p><p>- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.</p><p>- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.</p>', 1, NULL, 'default', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(9, 'Advertise', '<h3>Random Content</h3><p>This is a random content that will be displayed on the page.</p>', 1, NULL, 'default', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(10, 'FAQ', '<h3>Random Content</h3><p>This is a random content that will be displayed on the page.</p>', 1, NULL, 'default', NULL, 'published', '2025-12-24 07:30:26', '2025-12-24 07:30:26');

-- Dumping structure for table allcatholicmedia.pages_translations
CREATE TABLE IF NOT EXISTS `pages_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`pages_id`),
  KEY `idx_pages_trans_pages_id` (`pages_id`),
  KEY `idx_pages_trans_page_lang` (`pages_id`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.pages_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `author_id` bigint(20) unsigned DEFAULT NULL,
  `author_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `format_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_status_index` (`status`),
  KEY `posts_author_id_index` (`author_id`),
  KEY `posts_author_type_index` (`author_type`),
  KEY `posts_created_at_index` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.posts: ~48 rows (approximately)
REPLACE INTO `posts` (`id`, `name`, `description`, `content`, `status`, `author_id`, `author_type`, `is_featured`, `image`, `views`, `format_type`, `created_at`, `updated_at`) VALUES
	(1, 'Pope Francis Calls for Global Peace at Sunday Angelus', 'Explore the intricate web of international relations and the impact of global alliances on political landscapes. Delve into the nuances that shape diplomatic strategies and geopolitical shifts.', '<p>Our mission is to assist you in achieving better financial shape, not just for today, but for the long term. We believe that financial security and freedom are within reach for everyone, and we’re dedicated to providing the guidance and support you need to get there.</p><div>[content-quote author="Celine Dion" quote="‘‘Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This.’’"][/content-quote]</div><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/6.jpg" image_2="main/news/2.jpg"][/content-image]</div><h3>Better financial shape</h3><p>Our comprehensive range of financial services and expert guidance are designed to empower individuals, families, and businesses to make informed financial decisions. Whether you’re looking to manage debt, build savings, invest wisely, or plan for retirement, our team of seasoned financial professionals is committed to helping you reach your goals. We offer personalized financial assessments, tailored strategies, and cutting-edge tools to maximize your financial well-being. By partnering with us, you gain access to a wealth of knowledge and resources that can transform your financial future.</p><div>[content-listing-style style="style-1" quantity="6" item_1="Diverse Solutions Guidance." item_2="Professionals Assisting You." item_3="Tailored Strategies for Success." item_4="Informed Decisions with Technology." item_5="Health Assessments Provided." item_6="Strategies for Building Prosperity."][/content-listing-style]</div><p>Achieving financial stability and prosperity is a shared goal we all aspire to. At Echo, we understand the significance of being in better financial shape, and we are here to guide you on your journey.</p><br> </br><br> </br>', 'published', 2, 'Botble\\Member\\Models\\Member', 1, 'politics/news/1.jpg', 241, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(2, 'The Daily Rosary: A Guide for Families', 'Trace the evolution of political discourse through the ages, examining how communication styles, rhetoric, and public engagement have shaped the political narrative.', '<p>The title conveys a sense of confidence that the economy will weather the banking crisis without suffering severe damage. The term "banking crisis" likely refers to a situation where financial institutions face significant challenges, such as insolvency, liquidity problems, or other issues that could affect the stability of the financial sector.</p><div>[content-quote style="style-2" quote="Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This" author="Celine Dion" description="Acknowledgment of Life’s Challenges: The quote recognizes that life can be unpredictable and present challenges, obstacles, and hardships that are beyond an individual’s control. It emphasizes that adversity is a natural part of the human experience." top_left_image="main/general/blog-shape-image.png"][/content-quote]</div><h3>I love how relaxed and flowy this dress is and that it has really delicate</h3><p>Indulge in the epitome of comfort and style with our "Relaxed and Flowy" dress, a masterpiece of delicate design and effortless elegance. This dress offers the perfect blend of comfort and sophistication, allowing you to move gracefully through any occasion. Crafted with meticulous attention to detail, its delicate fabric and relaxed silhouette make it a wardrobe essential for those who appreciate both style and comfort. Whether you’re strolling through a garden party or enjoying a serene evening out, this dress will be your trusted companion. Discover the beauty of ease and elegance with this exquisite garment.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/3.jpg" image_2="main/news/7.jpg"][/content-image]</div><div>[content-capitalize text="Step into the world of tranquility and charm with our Relaxed and Flowy dress. Its effortless design is a testament to the beauty of simplicity. The gentle, delicate fabric cascades with every movement, creating a mesmerizing dance of fabric and form. This dress embraces you in a feeling of relaxation and freedom, making it perfect for those serene, carefree moments you cherish"][/content-capitalize]</div><div>[content-capitalize blog_content="This dress has a captivating allure with its relaxed and flowy silhouette that exudes a sense of effortlessness. What truly sets it apart are the exquisite, delicate details that adorn the fabric. The dress strikes a harmonious balance between comfort and sophistication, making it a perfect choice for those who value both the ease of relaxed attire and the subtle, intricate beauty that these delicate features bring to the overall design."][/content-capitalize]</div><p>It encourages taking personal responsibility for one’s responses to life’s trials. Even when faced with difficult circumstances, individuals have the autonomy to choose their emotional and behavioral reactions.</p><br> </br><p>The subtle details and the relaxed fit come together to create an ensemble that effortlessly combines fashion and comfort. Whether you’re attending a summer soirée or savoring a quiet day by the beach, this dress will be your go-to choice for a look that is both relaxed and elegantly delicate. Elevate your style with this captivating dress that celebrates the beauty of flowy, effortless fashion."</p><br> </br><br> </br>', 'published', 3, 'Botble\\Member\\Models\\Member', 1, 'politics/news/2.jpg', 2295, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(3, 'Feast of the Assumption: History and Meaning', 'Investigate the influence of supranational organizations on contemporary politics, analyzing their role in addressing global challenges and fostering cooperation among nations.', '<p>Introducing the Asus ROG Ally, your ultimate gaming companion that won’t compromise your budget. Packed with the high-performance AMD Z1 processor, this gaming laptop redefines what’s possible in the sub-$600 price range. Whether you’re a casual gamer or a hardcore enthusiast, the Asus ROG Ally has you covered with its impressive hardware and affordability.</p><h3>Data Center Loading & Security</h3><p>The Asus ROG Ally: Unleash Gaming Power on a Budget! Starting at just $600, this gaming marvel is powered by the formidable AMD Z1 processor. Get ready for an immersive gaming experience that won’t break the bank, as the Asus ROG Ally combines affordability with cutting-edge technology to ensure you conquer virtual worlds like a true champion.</p><h3>Advance Features</h3><div>[content-listing-style number_of_columns="col-2" quantity="6" item_1="Affordable Gaming Power" item_2="AMD Z1 Processor" item_3="Stylish Design" item_4="High-Refresh-Rate Display" item_5="Expandable Storage and Memory" item_6="Gaming Excellence on a Budget"][/content-listing-style]</div><p>The Asus ROG Ally also offers ample storage and memory options to keep all your games and files within easy reach. You can expand and customize it to meet your specific needs, ensuring you’re always prepared for the latest gaming challenges.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/general/blog-4.png" image_2="main/general/blog-3.png"][/content-image]</div><div>[content-image number_of_columns="col-1" quantity="1" image_1="main/general/blog-5.png"][/content-image]</div><h3>Features & configurations</h3><div>[content-listing-style number_of_columns="col-1" quantity="6" item_1="350-mile range (the bar is 300 miles)" item_2="Your smartphone can be your key to the vehicle" item_3="Reverse charging, so your car can power your house during a power outage" item_4="An impressive 0-60 time of around 3.6 seconds (I like performance)" item_5="A solar panel roof to increase range and supply emergency power" item_6="Convertible-like mode (which really opens the car up)"][/content-listing-style]</div><p>Asus ROG Ally is your ticket to affordable gaming excellence. With a starting price of just $600, it’s a game-changer that will take your gaming adventures to the next level. Whether you’re a student, a professional, or just someone looking for a fantastic gaming experience without breaking the bank, the Asus ROG Ally with AMD Z1 is your ideal companion. Grab yours now and prepare to dominate the gaming world!</p><br> </br>', 'published', 1, 'Botble\\Member\\Models\\Member', 1, 'politics/news/3.jpg', 1782, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(4, 'How Catholic Social Teaching Shapes Modern Policy', 'Uncover the ways in which activism, both offline and online, plays a pivotal role in shaping political movements and influencing policy decisions.', '<p>The title conveys a sense of confidence that the economy will weather the banking crisis without suffering severe damage. The term "banking crisis" likely refers to a situation where financial institutions face significant challenges, such as insolvency, liquidity problems, or other issues that could affect the stability of the financial sector.</p><div>[content-quote style="style-2" quote="Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This" author="Celine Dion" description="Acknowledgment of Life’s Challenges: The quote recognizes that life can be unpredictable and present challenges, obstacles, and hardships that are beyond an individual’s control. It emphasizes that adversity is a natural part of the human experience." top_left_image="main/general/blog-shape-image.png"][/content-quote]</div><h3>I love how relaxed and flowy this dress is and that it has really delicate</h3><p>Indulge in the epitome of comfort and style with our "Relaxed and Flowy" dress, a masterpiece of delicate design and effortless elegance. This dress offers the perfect blend of comfort and sophistication, allowing you to move gracefully through any occasion. Crafted with meticulous attention to detail, its delicate fabric and relaxed silhouette make it a wardrobe essential for those who appreciate both style and comfort. Whether you’re strolling through a garden party or enjoying a serene evening out, this dress will be your trusted companion. Discover the beauty of ease and elegance with this exquisite garment.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/3.jpg" image_2="main/news/7.jpg"][/content-image]</div><div>[content-capitalize text="Step into the world of tranquility and charm with our Relaxed and Flowy dress. Its effortless design is a testament to the beauty of simplicity. The gentle, delicate fabric cascades with every movement, creating a mesmerizing dance of fabric and form. This dress embraces you in a feeling of relaxation and freedom, making it perfect for those serene, carefree moments you cherish"][/content-capitalize]</div><div>[content-capitalize blog_content="This dress has a captivating allure with its relaxed and flowy silhouette that exudes a sense of effortlessness. What truly sets it apart are the exquisite, delicate details that adorn the fabric. The dress strikes a harmonious balance between comfort and sophistication, making it a perfect choice for those who value both the ease of relaxed attire and the subtle, intricate beauty that these delicate features bring to the overall design."][/content-capitalize]</div><p>It encourages taking personal responsibility for one’s responses to life’s trials. Even when faced with difficult circumstances, individuals have the autonomy to choose their emotional and behavioral reactions.</p><br> </br><p>The subtle details and the relaxed fit come together to create an ensemble that effortlessly combines fashion and comfort. Whether you’re attending a summer soirée or savoring a quiet day by the beach, this dress will be your go-to choice for a look that is both relaxed and elegantly delicate. Elevate your style with this captivating dress that celebrates the beauty of flowy, effortless fashion."</p><br> </br><br> </br>', 'published', 1, 'Botble\\Member\\Models\\Member', 1, 'politics/news/4.jpg', 263, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(5, 'Parish Communities Thriving Post-Pandemic', 'Examine the complexities surrounding populism and its impact on democratic institutions, analyzing the challenges posed by charismatic leaders and their populist agendas.', '<p>Introducing the Asus ROG Ally, your ultimate gaming companion that won’t compromise your budget. Packed with the high-performance AMD Z1 processor, this gaming laptop redefines what’s possible in the sub-$600 price range. Whether you’re a casual gamer or a hardcore enthusiast, the Asus ROG Ally has you covered with its impressive hardware and affordability.</p><h3>Data Center Loading & Security</h3><p>The Asus ROG Ally: Unleash Gaming Power on a Budget! Starting at just $600, this gaming marvel is powered by the formidable AMD Z1 processor. Get ready for an immersive gaming experience that won’t break the bank, as the Asus ROG Ally combines affordability with cutting-edge technology to ensure you conquer virtual worlds like a true champion.</p><h3>Advance Features</h3><div>[content-listing-style number_of_columns="col-2" quantity="6" item_1="Affordable Gaming Power" item_2="AMD Z1 Processor" item_3="Stylish Design" item_4="High-Refresh-Rate Display" item_5="Expandable Storage and Memory" item_6="Gaming Excellence on a Budget"][/content-listing-style]</div><p>The Asus ROG Ally also offers ample storage and memory options to keep all your games and files within easy reach. You can expand and customize it to meet your specific needs, ensuring you’re always prepared for the latest gaming challenges.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/general/blog-4.png" image_2="main/general/blog-3.png"][/content-image]</div><div>[content-image number_of_columns="col-1" quantity="1" image_1="main/general/blog-5.png"][/content-image]</div><h3>Features & configurations</h3><div>[content-listing-style number_of_columns="col-1" quantity="6" item_1="350-mile range (the bar is 300 miles)" item_2="Your smartphone can be your key to the vehicle" item_3="Reverse charging, so your car can power your house during a power outage" item_4="An impressive 0-60 time of around 3.6 seconds (I like performance)" item_5="A solar panel roof to increase range and supply emergency power" item_6="Convertible-like mode (which really opens the car up)"][/content-listing-style]</div><p>Asus ROG Ally is your ticket to affordable gaming excellence. With a starting price of just $600, it’s a game-changer that will take your gaming adventures to the next level. Whether you’re a student, a professional, or just someone looking for a fantastic gaming experience without breaking the bank, the Asus ROG Ally with AMD Z1 is your ideal companion. Grab yours now and prepare to dominate the gaming world!</p><br> </br>', 'published', 2, 'Botble\\Member\\Models\\Member', 1, 'politics/news/5.jpg', 655, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(6, 'Climate Care as a Catholic Moral Obligation', 'Evaluate the intersection of science and politics in the formulation of climate change policies, exploring the challenges and opportunities for global environmental governance.', '<p>Our mission is to assist you in achieving better financial shape, not just for today, but for the long term. We believe that financial security and freedom are within reach for everyone, and we’re dedicated to providing the guidance and support you need to get there.</p><div>[content-quote author="Celine Dion" quote="‘‘Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This.’’"][/content-quote]</div><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/6.jpg" image_2="main/news/2.jpg"][/content-image]</div><h3>Better financial shape</h3><p>Our comprehensive range of financial services and expert guidance are designed to empower individuals, families, and businesses to make informed financial decisions. Whether you’re looking to manage debt, build savings, invest wisely, or plan for retirement, our team of seasoned financial professionals is committed to helping you reach your goals. We offer personalized financial assessments, tailored strategies, and cutting-edge tools to maximize your financial well-being. By partnering with us, you gain access to a wealth of knowledge and resources that can transform your financial future.</p><div>[content-listing-style style="style-1" quantity="6" item_1="Diverse Solutions Guidance." item_2="Professionals Assisting You." item_3="Tailored Strategies for Success." item_4="Informed Decisions with Technology." item_5="Health Assessments Provided." item_6="Strategies for Building Prosperity."][/content-listing-style]</div><p>Achieving financial stability and prosperity is a shared goal we all aspire to. At Echo, we understand the significance of being in better financial shape, and we are here to guide you on your journey.</p><br> </br><br> </br>', 'published', 2, 'Botble\\Member\\Models\\Member', 1, 'politics/news/6.jpg', 589, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(7, 'Understanding the Theology of the Body', 'Delve into the dynamics of identity politics, exploring how social identities shape political narratives, policies, and the overall political landscape.', '<p>Introducing the Asus ROG Ally, your ultimate gaming companion that won’t compromise your budget. Packed with the high-performance AMD Z1 processor, this gaming laptop redefines what’s possible in the sub-$600 price range. Whether you’re a casual gamer or a hardcore enthusiast, the Asus ROG Ally has you covered with its impressive hardware and affordability.</p><h3>Data Center Loading & Security</h3><p>The Asus ROG Ally: Unleash Gaming Power on a Budget! Starting at just $600, this gaming marvel is powered by the formidable AMD Z1 processor. Get ready for an immersive gaming experience that won’t break the bank, as the Asus ROG Ally combines affordability with cutting-edge technology to ensure you conquer virtual worlds like a true champion.</p><h3>Advance Features</h3><div>[content-listing-style number_of_columns="col-2" quantity="6" item_1="Affordable Gaming Power" item_2="AMD Z1 Processor" item_3="Stylish Design" item_4="High-Refresh-Rate Display" item_5="Expandable Storage and Memory" item_6="Gaming Excellence on a Budget"][/content-listing-style]</div><p>The Asus ROG Ally also offers ample storage and memory options to keep all your games and files within easy reach. You can expand and customize it to meet your specific needs, ensuring you’re always prepared for the latest gaming challenges.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/general/blog-4.png" image_2="main/general/blog-3.png"][/content-image]</div><div>[content-image number_of_columns="col-1" quantity="1" image_1="main/general/blog-5.png"][/content-image]</div><h3>Features & configurations</h3><div>[content-listing-style number_of_columns="col-1" quantity="6" item_1="350-mile range (the bar is 300 miles)" item_2="Your smartphone can be your key to the vehicle" item_3="Reverse charging, so your car can power your house during a power outage" item_4="An impressive 0-60 time of around 3.6 seconds (I like performance)" item_5="A solar panel roof to increase range and supply emergency power" item_6="Convertible-like mode (which really opens the car up)"][/content-listing-style]</div><p>Asus ROG Ally is your ticket to affordable gaming excellence. With a starting price of just $600, it’s a game-changer that will take your gaming adventures to the next level. Whether you’re a student, a professional, or just someone looking for a fantastic gaming experience without breaking the bank, the Asus ROG Ally with AMD Z1 is your ideal companion. Grab yours now and prepare to dominate the gaming world!</p><br> </br>', 'published', 4, 'Botble\\Member\\Models\\Member', 1, 'politics/news/7.jpg', 185, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(8, 'Technology and the Church: Evangelization in the Digital Age', 'Investigate the impact of technology on political processes, examining how social media, artificial intelligence, and data analytics influence political campaigns and governance.', '<p>Our mission is to assist you in achieving better financial shape, not just for today, but for the long term. We believe that financial security and freedom are within reach for everyone, and we’re dedicated to providing the guidance and support you need to get there.</p><div>[content-quote author="Celine Dion" quote="‘‘Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This.’’"][/content-quote]</div><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/6.jpg" image_2="main/news/2.jpg"][/content-image]</div><h3>Better financial shape</h3><p>Our comprehensive range of financial services and expert guidance are designed to empower individuals, families, and businesses to make informed financial decisions. Whether you’re looking to manage debt, build savings, invest wisely, or plan for retirement, our team of seasoned financial professionals is committed to helping you reach your goals. We offer personalized financial assessments, tailored strategies, and cutting-edge tools to maximize your financial well-being. By partnering with us, you gain access to a wealth of knowledge and resources that can transform your financial future.</p><div>[content-listing-style style="style-1" quantity="6" item_1="Diverse Solutions Guidance." item_2="Professionals Assisting You." item_3="Tailored Strategies for Success." item_4="Informed Decisions with Technology." item_5="Health Assessments Provided." item_6="Strategies for Building Prosperity."][/content-listing-style]</div><p>Achieving financial stability and prosperity is a shared goal we all aspire to. At Echo, we understand the significance of being in better financial shape, and we are here to guide you on your journey.</p><br> </br><br> </br>', 'published', 5, 'Botble\\Member\\Models\\Member', 1, 'politics/news/8.jpg', 839, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(9, 'Catholic Schools: Faith Formation and Academic Excellence', 'Analyze the challenges of crafting economic policies that promote both growth and equality on a global scale, exploring the tensions between competing economic ideologies.', '<p>Introducing the Asus ROG Ally, your ultimate gaming companion that won’t compromise your budget. Packed with the high-performance AMD Z1 processor, this gaming laptop redefines what’s possible in the sub-$600 price range. Whether you’re a casual gamer or a hardcore enthusiast, the Asus ROG Ally has you covered with its impressive hardware and affordability.</p><h3>Data Center Loading & Security</h3><p>The Asus ROG Ally: Unleash Gaming Power on a Budget! Starting at just $600, this gaming marvel is powered by the formidable AMD Z1 processor. Get ready for an immersive gaming experience that won’t break the bank, as the Asus ROG Ally combines affordability with cutting-edge technology to ensure you conquer virtual worlds like a true champion.</p><h3>Advance Features</h3><div>[content-listing-style number_of_columns="col-2" quantity="6" item_1="Affordable Gaming Power" item_2="AMD Z1 Processor" item_3="Stylish Design" item_4="High-Refresh-Rate Display" item_5="Expandable Storage and Memory" item_6="Gaming Excellence on a Budget"][/content-listing-style]</div><p>The Asus ROG Ally also offers ample storage and memory options to keep all your games and files within easy reach. You can expand and customize it to meet your specific needs, ensuring you’re always prepared for the latest gaming challenges.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/general/blog-4.png" image_2="main/general/blog-3.png"][/content-image]</div><div>[content-image number_of_columns="col-1" quantity="1" image_1="main/general/blog-5.png"][/content-image]</div><h3>Features & configurations</h3><div>[content-listing-style number_of_columns="col-1" quantity="6" item_1="350-mile range (the bar is 300 miles)" item_2="Your smartphone can be your key to the vehicle" item_3="Reverse charging, so your car can power your house during a power outage" item_4="An impressive 0-60 time of around 3.6 seconds (I like performance)" item_5="A solar panel roof to increase range and supply emergency power" item_6="Convertible-like mode (which really opens the car up)"][/content-listing-style]</div><p>Asus ROG Ally is your ticket to affordable gaming excellence. With a starting price of just $600, it’s a game-changer that will take your gaming adventures to the next level. Whether you’re a student, a professional, or just someone looking for a fantastic gaming experience without breaking the bank, the Asus ROG Ally with AMD Z1 is your ideal companion. Grab yours now and prepare to dominate the gaming world!</p><br> </br>', 'published', 2, 'Botble\\Member\\Models\\Member', 1, 'politics/news/9.jpg', 1625, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(10, 'Vatican Diplomacy: The Holy See on the World Stage', 'Explore successful instances of diplomatic efforts, analyzing the strategies and negotiations that led to positive outcomes in resolving international conflicts.', '<p>Our mission is to assist you in achieving better financial shape, not just for today, but for the long term. We believe that financial security and freedom are within reach for everyone, and we’re dedicated to providing the guidance and support you need to get there.</p><div>[content-quote author="Celine Dion" quote="‘‘Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This.’’"][/content-quote]</div><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/6.jpg" image_2="main/news/2.jpg"][/content-image]</div><h3>Better financial shape</h3><p>Our comprehensive range of financial services and expert guidance are designed to empower individuals, families, and businesses to make informed financial decisions. Whether you’re looking to manage debt, build savings, invest wisely, or plan for retirement, our team of seasoned financial professionals is committed to helping you reach your goals. We offer personalized financial assessments, tailored strategies, and cutting-edge tools to maximize your financial well-being. By partnering with us, you gain access to a wealth of knowledge and resources that can transform your financial future.</p><div>[content-listing-style style="style-1" quantity="6" item_1="Diverse Solutions Guidance." item_2="Professionals Assisting You." item_3="Tailored Strategies for Success." item_4="Informed Decisions with Technology." item_5="Health Assessments Provided." item_6="Strategies for Building Prosperity."][/content-listing-style]</div><p>Achieving financial stability and prosperity is a shared goal we all aspire to. At Echo, we understand the significance of being in better financial shape, and we are here to guide you on your journey.</p><br> </br><br> </br>', 'published', 3, 'Botble\\Member\\Models\\Member', 1, 'politics/news/10.jpg', 1754, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(11, 'Adoration Hour Guide: Drawing Closer to Christ', 'Examine the influence of media on political processes, analyzing how the media shapes public opinion, frames political discourse, and impacts electoral outcomes.', '<p>Our mission is to assist you in achieving better financial shape, not just for today, but for the long term. We believe that financial security and freedom are within reach for everyone, and we’re dedicated to providing the guidance and support you need to get there.</p><div>[content-quote author="Celine Dion" quote="‘‘Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This.’’"][/content-quote]</div><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/6.jpg" image_2="main/news/2.jpg"][/content-image]</div><h3>Better financial shape</h3><p>Our comprehensive range of financial services and expert guidance are designed to empower individuals, families, and businesses to make informed financial decisions. Whether you’re looking to manage debt, build savings, invest wisely, or plan for retirement, our team of seasoned financial professionals is committed to helping you reach your goals. We offer personalized financial assessments, tailored strategies, and cutting-edge tools to maximize your financial well-being. By partnering with us, you gain access to a wealth of knowledge and resources that can transform your financial future.</p><div>[content-listing-style style="style-1" quantity="6" item_1="Diverse Solutions Guidance." item_2="Professionals Assisting You." item_3="Tailored Strategies for Success." item_4="Informed Decisions with Technology." item_5="Health Assessments Provided." item_6="Strategies for Building Prosperity."][/content-listing-style]</div><p>Achieving financial stability and prosperity is a shared goal we all aspire to. At Echo, we understand the significance of being in better financial shape, and we are here to guide you on your journey.</p><br> </br><br> </br>', 'published', 3, 'Botble\\Member\\Models\\Member', 0, 'politics/news/11.jpg', 1828, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(12, 'Human Dignity at the Heart of Catholic Social Doctrine', 'Investigate the current state of human rights in the political arena, exploring both progress and challenges in the global effort to protect and promote human rights.', '<p>The title conveys a sense of confidence that the economy will weather the banking crisis without suffering severe damage. The term "banking crisis" likely refers to a situation where financial institutions face significant challenges, such as insolvency, liquidity problems, or other issues that could affect the stability of the financial sector.</p><div>[content-quote style="style-2" quote="Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This" author="Celine Dion" description="Acknowledgment of Life’s Challenges: The quote recognizes that life can be unpredictable and present challenges, obstacles, and hardships that are beyond an individual’s control. It emphasizes that adversity is a natural part of the human experience." top_left_image="main/general/blog-shape-image.png"][/content-quote]</div><h3>I love how relaxed and flowy this dress is and that it has really delicate</h3><p>Indulge in the epitome of comfort and style with our "Relaxed and Flowy" dress, a masterpiece of delicate design and effortless elegance. This dress offers the perfect blend of comfort and sophistication, allowing you to move gracefully through any occasion. Crafted with meticulous attention to detail, its delicate fabric and relaxed silhouette make it a wardrobe essential for those who appreciate both style and comfort. Whether you’re strolling through a garden party or enjoying a serene evening out, this dress will be your trusted companion. Discover the beauty of ease and elegance with this exquisite garment.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/3.jpg" image_2="main/news/7.jpg"][/content-image]</div><div>[content-capitalize text="Step into the world of tranquility and charm with our Relaxed and Flowy dress. Its effortless design is a testament to the beauty of simplicity. The gentle, delicate fabric cascades with every movement, creating a mesmerizing dance of fabric and form. This dress embraces you in a feeling of relaxation and freedom, making it perfect for those serene, carefree moments you cherish"][/content-capitalize]</div><div>[content-capitalize blog_content="This dress has a captivating allure with its relaxed and flowy silhouette that exudes a sense of effortlessness. What truly sets it apart are the exquisite, delicate details that adorn the fabric. The dress strikes a harmonious balance between comfort and sophistication, making it a perfect choice for those who value both the ease of relaxed attire and the subtle, intricate beauty that these delicate features bring to the overall design."][/content-capitalize]</div><p>It encourages taking personal responsibility for one’s responses to life’s trials. Even when faced with difficult circumstances, individuals have the autonomy to choose their emotional and behavioral reactions.</p><br> </br><p>The subtle details and the relaxed fit come together to create an ensemble that effortlessly combines fashion and comfort. Whether you’re attending a summer soirée or savoring a quiet day by the beach, this dress will be your go-to choice for a look that is both relaxed and elegantly delicate. Elevate your style with this captivating dress that celebrates the beauty of flowy, effortless fashion."</p><br> </br><br> </br>', 'published', 5, 'Botble\\Member\\Models\\Member', 0, 'politics/news/12.jpg', 1339, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(13, 'Unity and Diversity in the Global Catholic Church', 'Delve into the tensions between nationalism and globalism, analyzing how leaders navigate the balance between prioritizing national interests and participating in global cooperation.', '<p>The title conveys a sense of confidence that the economy will weather the banking crisis without suffering severe damage. The term "banking crisis" likely refers to a situation where financial institutions face significant challenges, such as insolvency, liquidity problems, or other issues that could affect the stability of the financial sector.</p><div>[content-quote style="style-2" quote="Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This" author="Celine Dion" description="Acknowledgment of Life’s Challenges: The quote recognizes that life can be unpredictable and present challenges, obstacles, and hardships that are beyond an individual’s control. It emphasizes that adversity is a natural part of the human experience." top_left_image="main/general/blog-shape-image.png"][/content-quote]</div><h3>I love how relaxed and flowy this dress is and that it has really delicate</h3><p>Indulge in the epitome of comfort and style with our "Relaxed and Flowy" dress, a masterpiece of delicate design and effortless elegance. This dress offers the perfect blend of comfort and sophistication, allowing you to move gracefully through any occasion. Crafted with meticulous attention to detail, its delicate fabric and relaxed silhouette make it a wardrobe essential for those who appreciate both style and comfort. Whether you’re strolling through a garden party or enjoying a serene evening out, this dress will be your trusted companion. Discover the beauty of ease and elegance with this exquisite garment.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/3.jpg" image_2="main/news/7.jpg"][/content-image]</div><div>[content-capitalize text="Step into the world of tranquility and charm with our Relaxed and Flowy dress. Its effortless design is a testament to the beauty of simplicity. The gentle, delicate fabric cascades with every movement, creating a mesmerizing dance of fabric and form. This dress embraces you in a feeling of relaxation and freedom, making it perfect for those serene, carefree moments you cherish"][/content-capitalize]</div><div>[content-capitalize blog_content="This dress has a captivating allure with its relaxed and flowy silhouette that exudes a sense of effortlessness. What truly sets it apart are the exquisite, delicate details that adorn the fabric. The dress strikes a harmonious balance between comfort and sophistication, making it a perfect choice for those who value both the ease of relaxed attire and the subtle, intricate beauty that these delicate features bring to the overall design."][/content-capitalize]</div><p>It encourages taking personal responsibility for one’s responses to life’s trials. Even when faced with difficult circumstances, individuals have the autonomy to choose their emotional and behavioral reactions.</p><br> </br><p>The subtle details and the relaxed fit come together to create an ensemble that effortlessly combines fashion and comfort. Whether you’re attending a summer soirée or savoring a quiet day by the beach, this dress will be your go-to choice for a look that is both relaxed and elegantly delicate. Elevate your style with this captivating dress that celebrates the beauty of flowy, effortless fashion."</p><br> </br><br> </br>', 'published', 2, 'Botble\\Member\\Models\\Member', 0, 'politics/news/13.jpg', 422, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(14, 'The Role of Catholic NGOs in International Development', 'Explore the impact of NGOs on political agendas, examining how these organizations influence policy-making and advocate for social and environmental issues.', '<p>The title conveys a sense of confidence that the economy will weather the banking crisis without suffering severe damage. The term "banking crisis" likely refers to a situation where financial institutions face significant challenges, such as insolvency, liquidity problems, or other issues that could affect the stability of the financial sector.</p><div>[content-quote style="style-2" quote="Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This" author="Celine Dion" description="Acknowledgment of Life’s Challenges: The quote recognizes that life can be unpredictable and present challenges, obstacles, and hardships that are beyond an individual’s control. It emphasizes that adversity is a natural part of the human experience." top_left_image="main/general/blog-shape-image.png"][/content-quote]</div><h3>I love how relaxed and flowy this dress is and that it has really delicate</h3><p>Indulge in the epitome of comfort and style with our "Relaxed and Flowy" dress, a masterpiece of delicate design and effortless elegance. This dress offers the perfect blend of comfort and sophistication, allowing you to move gracefully through any occasion. Crafted with meticulous attention to detail, its delicate fabric and relaxed silhouette make it a wardrobe essential for those who appreciate both style and comfort. Whether you’re strolling through a garden party or enjoying a serene evening out, this dress will be your trusted companion. Discover the beauty of ease and elegance with this exquisite garment.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/3.jpg" image_2="main/news/7.jpg"][/content-image]</div><div>[content-capitalize text="Step into the world of tranquility and charm with our Relaxed and Flowy dress. Its effortless design is a testament to the beauty of simplicity. The gentle, delicate fabric cascades with every movement, creating a mesmerizing dance of fabric and form. This dress embraces you in a feeling of relaxation and freedom, making it perfect for those serene, carefree moments you cherish"][/content-capitalize]</div><div>[content-capitalize blog_content="This dress has a captivating allure with its relaxed and flowy silhouette that exudes a sense of effortlessness. What truly sets it apart are the exquisite, delicate details that adorn the fabric. The dress strikes a harmonious balance between comfort and sophistication, making it a perfect choice for those who value both the ease of relaxed attire and the subtle, intricate beauty that these delicate features bring to the overall design."][/content-capitalize]</div><p>It encourages taking personal responsibility for one’s responses to life’s trials. Even when faced with difficult circumstances, individuals have the autonomy to choose their emotional and behavioral reactions.</p><br> </br><p>The subtle details and the relaxed fit come together to create an ensemble that effortlessly combines fashion and comfort. Whether you’re attending a summer soirée or savoring a quiet day by the beach, this dress will be your go-to choice for a look that is both relaxed and elegantly delicate. Elevate your style with this captivating dress that celebrates the beauty of flowy, effortless fashion."</p><br> </br><br> </br>', 'published', 1, 'Botble\\Member\\Models\\Member', 0, 'politics/news/14.jpg', 1159, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(15, 'Lent and Easter: A Spiritual Renewal Guide', 'Analyze the political implications of the post-pandemic era, exploring how governments worldwide are addressing the challenges of recovery, public health, and economic stability.', '<p>The title conveys a sense of confidence that the economy will weather the banking crisis without suffering severe damage. The term "banking crisis" likely refers to a situation where financial institutions face significant challenges, such as insolvency, liquidity problems, or other issues that could affect the stability of the financial sector.</p><div>[content-quote style="style-2" quote="Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This" author="Celine Dion" description="Acknowledgment of Life’s Challenges: The quote recognizes that life can be unpredictable and present challenges, obstacles, and hardships that are beyond an individual’s control. It emphasizes that adversity is a natural part of the human experience." top_left_image="main/general/blog-shape-image.png"][/content-quote]</div><h3>I love how relaxed and flowy this dress is and that it has really delicate</h3><p>Indulge in the epitome of comfort and style with our "Relaxed and Flowy" dress, a masterpiece of delicate design and effortless elegance. This dress offers the perfect blend of comfort and sophistication, allowing you to move gracefully through any occasion. Crafted with meticulous attention to detail, its delicate fabric and relaxed silhouette make it a wardrobe essential for those who appreciate both style and comfort. Whether you’re strolling through a garden party or enjoying a serene evening out, this dress will be your trusted companion. Discover the beauty of ease and elegance with this exquisite garment.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/3.jpg" image_2="main/news/7.jpg"][/content-image]</div><div>[content-capitalize text="Step into the world of tranquility and charm with our Relaxed and Flowy dress. Its effortless design is a testament to the beauty of simplicity. The gentle, delicate fabric cascades with every movement, creating a mesmerizing dance of fabric and form. This dress embraces you in a feeling of relaxation and freedom, making it perfect for those serene, carefree moments you cherish"][/content-capitalize]</div><div>[content-capitalize blog_content="This dress has a captivating allure with its relaxed and flowy silhouette that exudes a sense of effortlessness. What truly sets it apart are the exquisite, delicate details that adorn the fabric. The dress strikes a harmonious balance between comfort and sophistication, making it a perfect choice for those who value both the ease of relaxed attire and the subtle, intricate beauty that these delicate features bring to the overall design."][/content-capitalize]</div><p>It encourages taking personal responsibility for one’s responses to life’s trials. Even when faced with difficult circumstances, individuals have the autonomy to choose their emotional and behavioral reactions.</p><br> </br><p>The subtle details and the relaxed fit come together to create an ensemble that effortlessly combines fashion and comfort. Whether you’re attending a summer soirée or savoring a quiet day by the beach, this dress will be your go-to choice for a look that is both relaxed and elegantly delicate. Elevate your style with this captivating dress that celebrates the beauty of flowy, effortless fashion."</p><br> </br><br> </br>', 'published', 3, 'Botble\\Member\\Models\\Member', 0, 'politics/news/15.jpg', 864, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(16, 'Protecting Parishes: Cybersecurity for Catholic Organizations', 'Examine the increasing importance of cybersecurity in political landscapes, analyzing the threats posed by cyberattacks and the measures taken to secure electoral systems and government institutions.', '<p>Introducing the Asus ROG Ally, your ultimate gaming companion that won’t compromise your budget. Packed with the high-performance AMD Z1 processor, this gaming laptop redefines what’s possible in the sub-$600 price range. Whether you’re a casual gamer or a hardcore enthusiast, the Asus ROG Ally has you covered with its impressive hardware and affordability.</p><h3>Data Center Loading & Security</h3><p>The Asus ROG Ally: Unleash Gaming Power on a Budget! Starting at just $600, this gaming marvel is powered by the formidable AMD Z1 processor. Get ready for an immersive gaming experience that won’t break the bank, as the Asus ROG Ally combines affordability with cutting-edge technology to ensure you conquer virtual worlds like a true champion.</p><h3>Advance Features</h3><div>[content-listing-style number_of_columns="col-2" quantity="6" item_1="Affordable Gaming Power" item_2="AMD Z1 Processor" item_3="Stylish Design" item_4="High-Refresh-Rate Display" item_5="Expandable Storage and Memory" item_6="Gaming Excellence on a Budget"][/content-listing-style]</div><p>The Asus ROG Ally also offers ample storage and memory options to keep all your games and files within easy reach. You can expand and customize it to meet your specific needs, ensuring you’re always prepared for the latest gaming challenges.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/general/blog-4.png" image_2="main/general/blog-3.png"][/content-image]</div><div>[content-image number_of_columns="col-1" quantity="1" image_1="main/general/blog-5.png"][/content-image]</div><h3>Features & configurations</h3><div>[content-listing-style number_of_columns="col-1" quantity="6" item_1="350-mile range (the bar is 300 miles)" item_2="Your smartphone can be your key to the vehicle" item_3="Reverse charging, so your car can power your house during a power outage" item_4="An impressive 0-60 time of around 3.6 seconds (I like performance)" item_5="A solar panel roof to increase range and supply emergency power" item_6="Convertible-like mode (which really opens the car up)"][/content-listing-style]</div><p>Asus ROG Ally is your ticket to affordable gaming excellence. With a starting price of just $600, it’s a game-changer that will take your gaming adventures to the next level. Whether you’re a student, a professional, or just someone looking for a fantastic gaming experience without breaking the bank, the Asus ROG Ally with AMD Z1 is your ideal companion. Grab yours now and prepare to dominate the gaming world!</p><br> </br>', 'published', 8, 'Botble\\Member\\Models\\Member', 0, 'politics/news/16.jpg', 1499, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(17, 'Bridging Divides: The Church\'s Role in a Polarized World', 'Investigate the root causes of political polarization, exploring strategies to bridge ideological divides and foster constructive dialogue in a polarized political climate.', '<p>The title conveys a sense of confidence that the economy will weather the banking crisis without suffering severe damage. The term "banking crisis" likely refers to a situation where financial institutions face significant challenges, such as insolvency, liquidity problems, or other issues that could affect the stability of the financial sector.</p><div>[content-quote style="style-2" quote="Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This" author="Celine Dion" description="Acknowledgment of Life’s Challenges: The quote recognizes that life can be unpredictable and present challenges, obstacles, and hardships that are beyond an individual’s control. It emphasizes that adversity is a natural part of the human experience." top_left_image="main/general/blog-shape-image.png"][/content-quote]</div><h3>I love how relaxed and flowy this dress is and that it has really delicate</h3><p>Indulge in the epitome of comfort and style with our "Relaxed and Flowy" dress, a masterpiece of delicate design and effortless elegance. This dress offers the perfect blend of comfort and sophistication, allowing you to move gracefully through any occasion. Crafted with meticulous attention to detail, its delicate fabric and relaxed silhouette make it a wardrobe essential for those who appreciate both style and comfort. Whether you’re strolling through a garden party or enjoying a serene evening out, this dress will be your trusted companion. Discover the beauty of ease and elegance with this exquisite garment.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/3.jpg" image_2="main/news/7.jpg"][/content-image]</div><div>[content-capitalize text="Step into the world of tranquility and charm with our Relaxed and Flowy dress. Its effortless design is a testament to the beauty of simplicity. The gentle, delicate fabric cascades with every movement, creating a mesmerizing dance of fabric and form. This dress embraces you in a feeling of relaxation and freedom, making it perfect for those serene, carefree moments you cherish"][/content-capitalize]</div><div>[content-capitalize blog_content="This dress has a captivating allure with its relaxed and flowy silhouette that exudes a sense of effortlessness. What truly sets it apart are the exquisite, delicate details that adorn the fabric. The dress strikes a harmonious balance between comfort and sophistication, making it a perfect choice for those who value both the ease of relaxed attire and the subtle, intricate beauty that these delicate features bring to the overall design."][/content-capitalize]</div><p>It encourages taking personal responsibility for one’s responses to life’s trials. Even when faced with difficult circumstances, individuals have the autonomy to choose their emotional and behavioral reactions.</p><br> </br><p>The subtle details and the relaxed fit come together to create an ensemble that effortlessly combines fashion and comfort. Whether you’re attending a summer soirée or savoring a quiet day by the beach, this dress will be your go-to choice for a look that is both relaxed and elegantly delicate. Elevate your style with this captivating dress that celebrates the beauty of flowy, effortless fashion."</p><br> </br><br> </br>', 'published', 5, 'Botble\\Member\\Models\\Member', 0, 'politics/news/17.jpg', 1042, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(18, 'Women Saints Who Changed the Church', 'Examine the intersection of feminism and politics, analyzing the progress made in achieving gender equality and the ongoing challenges faced by women in political spheres.', '<p>Our mission is to assist you in achieving better financial shape, not just for today, but for the long term. We believe that financial security and freedom are within reach for everyone, and we’re dedicated to providing the guidance and support you need to get there.</p><div>[content-quote author="Celine Dion" quote="‘‘Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This.’’"][/content-quote]</div><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/6.jpg" image_2="main/news/2.jpg"][/content-image]</div><h3>Better financial shape</h3><p>Our comprehensive range of financial services and expert guidance are designed to empower individuals, families, and businesses to make informed financial decisions. Whether you’re looking to manage debt, build savings, invest wisely, or plan for retirement, our team of seasoned financial professionals is committed to helping you reach your goals. We offer personalized financial assessments, tailored strategies, and cutting-edge tools to maximize your financial well-being. By partnering with us, you gain access to a wealth of knowledge and resources that can transform your financial future.</p><div>[content-listing-style style="style-1" quantity="6" item_1="Diverse Solutions Guidance." item_2="Professionals Assisting You." item_3="Tailored Strategies for Success." item_4="Informed Decisions with Technology." item_5="Health Assessments Provided." item_6="Strategies for Building Prosperity."][/content-listing-style]</div><p>Achieving financial stability and prosperity is a shared goal we all aspire to. At Echo, we understand the significance of being in better financial shape, and we are here to guide you on your journey.</p><br> </br><br> </br>', 'published', 4, 'Botble\\Member\\Models\\Member', 0, 'politics/news/18.jpg', 262, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(19, 'The Ethics of Leadership: Lessons from the Papal Tradition', 'Explore the ethical challenges faced by political leaders, examining how moral dilemmas impact decision-making and public trust in government.', '<p>Our mission is to assist you in achieving better financial shape, not just for today, but for the long term. We believe that financial security and freedom are within reach for everyone, and we’re dedicated to providing the guidance and support you need to get there.</p><div>[content-quote author="Celine Dion" quote="‘‘Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This.’’"][/content-quote]</div><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/6.jpg" image_2="main/news/2.jpg"][/content-image]</div><h3>Better financial shape</h3><p>Our comprehensive range of financial services and expert guidance are designed to empower individuals, families, and businesses to make informed financial decisions. Whether you’re looking to manage debt, build savings, invest wisely, or plan for retirement, our team of seasoned financial professionals is committed to helping you reach your goals. We offer personalized financial assessments, tailored strategies, and cutting-edge tools to maximize your financial well-being. By partnering with us, you gain access to a wealth of knowledge and resources that can transform your financial future.</p><div>[content-listing-style style="style-1" quantity="6" item_1="Diverse Solutions Guidance." item_2="Professionals Assisting You." item_3="Tailored Strategies for Success." item_4="Informed Decisions with Technology." item_5="Health Assessments Provided." item_6="Strategies for Building Prosperity."][/content-listing-style]</div><p>Achieving financial stability and prosperity is a shared goal we all aspire to. At Echo, we understand the significance of being in better financial shape, and we are here to guide you on your journey.</p><br> </br><br> </br>', 'published', 8, 'Botble\\Member\\Models\\Member', 0, 'politics/news/19.jpg', 103, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(20, 'Fighting Misinformation: A Catholic Approach to Media Literacy', 'Investigate the dangers of disinformation in democratic processes, exploring strategies to counteract false narratives, promote media literacy, and safeguard the integrity of information in politics.', '<p>The title conveys a sense of confidence that the economy will weather the banking crisis without suffering severe damage. The term "banking crisis" likely refers to a situation where financial institutions face significant challenges, such as insolvency, liquidity problems, or other issues that could affect the stability of the financial sector.</p><div>[content-quote style="style-2" quote="Life Imposes Things On You That You Can’t Control, But You Still Have The Choice Of How You’re Going To Live Through This" author="Celine Dion" description="Acknowledgment of Life’s Challenges: The quote recognizes that life can be unpredictable and present challenges, obstacles, and hardships that are beyond an individual’s control. It emphasizes that adversity is a natural part of the human experience." top_left_image="main/general/blog-shape-image.png"][/content-quote]</div><h3>I love how relaxed and flowy this dress is and that it has really delicate</h3><p>Indulge in the epitome of comfort and style with our "Relaxed and Flowy" dress, a masterpiece of delicate design and effortless elegance. This dress offers the perfect blend of comfort and sophistication, allowing you to move gracefully through any occasion. Crafted with meticulous attention to detail, its delicate fabric and relaxed silhouette make it a wardrobe essential for those who appreciate both style and comfort. Whether you’re strolling through a garden party or enjoying a serene evening out, this dress will be your trusted companion. Discover the beauty of ease and elegance with this exquisite garment.</p><br> </br><div>[content-image number_of_columns="col-2" quantity="2" image_1="main/news/3.jpg" image_2="main/news/7.jpg"][/content-image]</div><div>[content-capitalize text="Step into the world of tranquility and charm with our Relaxed and Flowy dress. Its effortless design is a testament to the beauty of simplicity. The gentle, delicate fabric cascades with every movement, creating a mesmerizing dance of fabric and form. This dress embraces you in a feeling of relaxation and freedom, making it perfect for those serene, carefree moments you cherish"][/content-capitalize]</div><div>[content-capitalize blog_content="This dress has a captivating allure with its relaxed and flowy silhouette that exudes a sense of effortlessness. What truly sets it apart are the exquisite, delicate details that adorn the fabric. The dress strikes a harmonious balance between comfort and sophistication, making it a perfect choice for those who value both the ease of relaxed attire and the subtle, intricate beauty that these delicate features bring to the overall design."][/content-capitalize]</div><p>It encourages taking personal responsibility for one’s responses to life’s trials. Even when faced with difficult circumstances, individuals have the autonomy to choose their emotional and behavioral reactions.</p><br> </br><p>The subtle details and the relaxed fit come together to create an ensemble that effortlessly combines fashion and comfort. Whether you’re attending a summer soirée or savoring a quiet day by the beach, this dress will be your go-to choice for a look that is both relaxed and elegantly delicate. Elevate your style with this captivating dress that celebrates the beauty of flowy, effortless fashion."</p><br> </br><br> </br>', 'published', 3, 'Botble\\Member\\Models\\Member', 0, 'politics/news/20.jpg', 820, NULL, '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(21, 'Daily Mass - Vatican Live Stream', 'Join the daily celebration of Holy Mass from Vatican City, streamed live every morning.', '<p>The Vatican broadcasts daily Mass for Catholics around the world. Join in prayer and receive spiritual nourishment through the Eucharist celebrated by Vatican priests.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 918, 'video', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(22, 'Holy Rosary with the Sorrowful Mysteries', 'Pray the Sorrowful Mysteries of the Holy Rosary. A guided meditation through the Passion of Christ.', '<p>The Rosary is one of the most beloved Catholic prayers. In this video, we meditate on the Sorrowful Mysteries: Agony in the Garden, Scourging at the Pillar, Crowning with Thorns, Carrying of the Cross, and Crucifixion.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 428, 'video', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(23, 'Holy Hour of Eucharistic Adoration', 'A peaceful holy hour of Eucharistic Adoration with sacred music and guided prayers.', '<p>Eucharistic Adoration is a time of quiet prayer before Jesus truly present in the Blessed Sacrament. This holy hour includes sacred music, prayers, and silent contemplation.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 1120, 'video', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(24, 'Divine Mercy Chaplet — Guided Prayer', 'Pray the Divine Mercy Chaplet as revealed by Jesus to St. Faustina. A powerful prayer of trust and mercy.', '<p>The Divine Mercy Chaplet is a powerful prayer revealed by Jesus to Saint Faustina Kowalska. It is prayed on rosary beads and calls on God\'s mercy for sinners and the dying.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 1789, 'video', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(25, 'Traditional Latin Mass — High Mass (Solemn)', 'Experience the beauty and solemnity of the Traditional Latin Mass celebrated in the extraordinary form.', '<p>The Traditional Latin Mass (Extraordinary Form) is the ancient rite of the Roman Catholic Church. This High Mass features Gregorian chant, incense, and the full ceremonial of the pre-Vatican II liturgy.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 601, 'video', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(26, 'Sunday Homily: Love Your Neighbor as Yourself', 'A powerful homily on the greatest commandment — loving God and loving your neighbor.', '<p>In this Sunday homily, the priest reflects on Christ\'s commandment to love God with all your heart and to love your neighbor as yourself. A message of hope and service for our modern world.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 1765, 'video', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(27, 'Understanding the Rosary: A Spiritual Guide for Beginners', 'The Rosary is one of the most beloved Catholic prayers. This guide walks you through each mystery and how to meditate on Christ\'s life.', '<p>The Holy Rosary is a Scripture-based prayer that begins with the Apostles\' Creed, followed by the Our Father, three Hail Marys for an increase of faith, hope, and charity, and the Glory Be. The Rosary focuses on 20 mysteries that reflect on the life of Jesus and Mary.</p><p>Pope John Paul II called the Rosary "a compendium of the Gospel" — a meditation on the great events of salvation history. It is a powerful intercessory prayer and a means of growing in holiness.</p><h3>The Four Sets of Mysteries</h3><p>The Joyful Mysteries focus on the Incarnation and childhood of Jesus. The Sorrowful Mysteries meditate on His Passion and Death. The Glorious Mysteries celebrate His Resurrection and the glory of Mary. The Luminous Mysteries, added by John Paul II, contemplate Christ\'s public ministry.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 2235, NULL, '2026-03-28 00:50:15', '2026-03-28 00:50:15'),
	(28, 'Pope Benedict XVI\'s Enduring Legacy in Catholic Theology', 'Joseph Ratzinger\'s theological contributions shaped the post-conciliar Church in profound ways. We examine his most important works.', '<p>Pope Emeritus Benedict XVI leaves behind a theological legacy of extraordinary depth. His "Introduction to Christianity," written in 1968 as Joseph Ratzinger, remains one of the most important works of 20th-century theology — accessible yet profound, challenging yet comforting.</p><p>His pontificate was marked by an insistence on the "hermeneutic of continuity" in interpreting the Second Vatican Council, arguing that the Council must be read in light of the Church\'s entire tradition, not as a break from it.</p><p>His decision to resign the papacy in 2013 — the first papal resignation in nearly 600 years — demonstrated a profound humility and concern for the good of the universal Church.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 2489, NULL, '2026-03-28 00:50:15', '2026-03-28 00:50:15'),
	(29, 'The New Evangelization: Bringing the Gospel to a Post-Christian World', 'How can Catholics effectively share their faith in an increasingly secular society? Practical strategies and spiritual principles.', '<p>The New Evangelization, a term coined by Pope Saint John Paul II, calls Catholics to renew their proclamation of the Gospel especially in societies that were once Christian but have grown distant from the faith.</p><p>This is not a new Gospel, but the ancient Gospel proclaimed with new ardor, new methods, and new expressions. It begins with the interior conversion of every Catholic — we cannot give what we do not have.</p><p>Practical evangelization takes many forms: inviting neighbors to Mass, sharing Catholic media, bearing witness through charitable works, and engaging in respectful dialogue with those of different beliefs.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 173, NULL, '2026-03-28 00:50:15', '2026-03-28 00:50:15'),
	(30, 'Adoration of the Blessed Sacrament: An Ancient Practice Renewed', 'Eucharistic Adoration is experiencing a remarkable renewal across the world. Discover the theology and practice of this powerful devotion.', '<p>Eucharistic Adoration — spending time in silent prayer before the Body of Christ present in the consecrated Host — has seen a remarkable renewal in recent decades. Perpetual Adoration chapels have multiplied worldwide, drawing thousands to spend time with Jesus in the Blessed Sacrament.</p><p>The theology is straightforward: Catholics believe that Christ is truly, really, and substantially present in the Eucharist. Adoration is simply being with the Lord — listening, speaking, resting in His presence.</p><p>Many saints attributed their holiness to time spent in Adoration. Saint Peter Julian Eymard devoted his life to promoting this devotion and founded the Congregation of the Blessed Sacrament for this purpose.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 1206, NULL, '2026-03-28 00:50:15', '2026-03-28 00:50:15'),
	(31, 'Catholic Social Teaching: A Primer on the Church\'s Vision for Society', 'The Church\'s social doctrine offers a comprehensive vision of the just society. Here is an introduction to its seven key principles.', '<p>Catholic Social Teaching (CST) is a body of doctrine that has developed over more than a century, beginning with Pope Leo XIII\'s landmark encyclical <em>Rerum Novarum</em> in 1891. It addresses the social, political, and economic questions of each age in the light of the Gospel.</p><p>The seven key principles include: the life and dignity of the human person; the call to family, community, and participation; rights and responsibilities; the option for the poor and vulnerable; the dignity of work and the rights of workers; solidarity; and care for God\'s creation.</p><p>CST is a rich treasury often called "the Church\'s best kept secret" — yet it offers the most coherent and comprehensive vision of the just society available in our time.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 2459, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(32, 'St. Teresa of Ávila: Doctor of the Church and Master of Prayer', 'On her feast day, we explore the life and spiritual teachings of this 16th-century mystic and reformer.', '<p>Teresa of Ávila (1515–1582) was a Spanish mystic, Carmelite nun, author, and theologian. In 1970, she and Catherine of Siena became the first women to be declared Doctors of the Church by Pope Paul VI.</p><p>Her two most important works are <em>The Way of Perfection</em>, a guide to prayer and religious life, and <em>The Interior Castle</em> (or <em>The Mansions</em>), a masterful description of the soul\'s journey toward God. The latter uses the image of a castle with seven sets of rooms to describe the stages of prayer and spiritual growth.</p><p>Her famous words remain an encouragement to every Christian: "Let nothing disturb you, let nothing frighten you, all things are passing away: God never changes. Patience obtains all things. Whoever has God lacks nothing; God alone suffices."</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 2649, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(33, 'The Traditional Latin Mass: History, Beauty, and Ongoing Debate', 'The ancient Rite of Mass continues to attract a growing number of Catholics. We explore its history and its place in today\'s Church.', '<p>The Traditional Latin Mass (TLM), also called the Extraordinary Form or the Tridentine Mass, is the form of Mass codified by the Council of Trent in the 16th century and used by the Latin Rite of the Church until the liturgical reforms following the Second Vatican Council in the 1960s.</p><p>The TLM is celebrated primarily in Latin, with the priest facing the altar (ad orientem) for much of the Mass. It is characterized by a profound silence, rich ceremony, and a strong emphasis on the sacrificial nature of the Eucharist.</p><p>Pope Benedict XVI issued <em>Summorum Pontificum</em> in 2007, liberalizing access to the TLM. This decision was partially reversed by Pope Francis in <em>Traditionis Custodes</em> (2021), sparking an ongoing discussion in the Church about liturgical diversity and unity.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 3416, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(34, 'Mercy and Justice: Cardinal Cupich on Prison Ministry', 'Cardinal Blase Cupich of Chicago speaks about the Church\'s commitment to those incarcerated and to restorative justice.', '<p>The Catholic Church has a long history of ministry to prisoners, inspired by Christ\'s words in Matthew 25: "I was in prison and you came to me." From prison chaplains to organizations like Dismas Ministry and Prison Fellowship, Catholics have sought to bring the Gospel behind bars.</p><p>Cardinal Cupich recently spoke at a symposium on restorative justice, emphasizing that the Church must advocate for a criminal justice system that prioritizes rehabilitation and human dignity over punishment alone.</p><p>"We cannot claim to be a Church of mercy," he said, "while remaining indifferent to a system that warehouses human beings and makes rehabilitation nearly impossible."</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 1784, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(35, 'The Liturgy of the Hours: Praying with the Church Throughout the Day', 'The Divine Office is the official prayer of the Catholic Church. Learn how laypeople can participate in this ancient practice.', '<p>The Liturgy of the Hours (also called the Divine Office or the Breviary) is the official prayer of the universal Church, traditionally prayed by priests, deacons, and members of religious orders throughout each day. In recent decades, many laypeople have discovered and embraced this ancient form of prayer.</p><p>The Hours divide the day into moments of prayer: Lauds (Morning Prayer), Daytime Prayer, Vespers (Evening Prayer), and Compline (Night Prayer). The Office of Readings allows for an extended meditation on Scripture and writings of the saints.</p><p>Digital apps like <em>iBreviary</em> and <em>Universalis</em> have made the Liturgy of the Hours more accessible than ever for busy laypeople who wish to unite their prayer with the worldwide Church.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 2418, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(36, 'Youth Ministry in Crisis: How Parishes Are Winning Back Young Catholics', 'Many parishes are finding creative and effective ways to form and retain young people in the faith. Here are their strategies.', '<p>Statistics on young people leaving the Catholic Church are well known and sobering. Yet across the country, vibrant parishes are bucking this trend through intentional, relationship-based youth ministry.</p><p>The most effective programs share common characteristics: they prioritize personal encounter with Jesus Christ over mere information; they involve young people as active participants rather than passive audiences; they connect teens with adult mentors who model authentic Catholic faith; and they provide genuine community where belonging and friendship can grow.</p><p>Organizations like Life Teen, FOCUS (Fellowship of Catholic University Students), and NET Ministries have developed proven methodologies that are transforming parishes and campuses nationwide.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 1523, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(37, 'Confession: Why This Sacrament Is the Greatest Gift for Sinners', 'The Sacrament of Penance is often misunderstood or feared. Discover why the saints called it the greatest sacrament after the Eucharist.', '<p>The Sacrament of Reconciliation (Confession) is one of the most misunderstood sacraments in the Church. Many Catholics have stopped going to Confession, either out of embarrassment, a sense that their sins are not serious enough, or a misunderstanding of the sacrament\'s nature.</p><p>Yet the saints consistently proclaimed Confession as a source of extraordinary grace and healing. Saint John Vianney, the patron of parish priests, spent up to 16 hours a day hearing confessions — the penitents who came to him numbered in the hundreds of thousands annually.</p><p>To receive the sacrament worthily, one needs: an examination of conscience, contrition (sorrow for sin), the intention to avoid future sin, confession of all mortal sins to a priest, and acceptance of a penance. The formula of absolution — "I absolve you from your sins in the name of the Father, and of the Son, and of the Holy Spirit" — are among the most powerful words a human being can hear.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 3175, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(38, 'World Youth Day: Building the Church of Tomorrow', 'From Rome in 1985 to Lisbon in 2023, World Youth Day has been one of the greatest engines of Catholic renewal in the modern era.', '<p>World Youth Day, the international Catholic festival for young people organized by the Holy See, has gathered millions of young Catholics in cities across the world since its founding by Pope John Paul II in 1985.</p><p>The Lisbon 2023 World Youth Day drew an estimated 1.5 million pilgrims for the closing Mass. Pope Francis celebrated with them and offered a message of hope, urging young Catholics to be "protagonists of hope" in a troubled world.</p><p>Many Catholics trace their deepest spiritual experiences to a World Youth Day pilgrimage. The combination of massive communal prayer, catechetical events, encounters with the Pope, and time with Catholics from every nation creates an experience that is genuinely transformative.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 1155, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(39, 'Book Review: "Catholicism" by Bishop Robert Barron', 'Bishop Barron\'s landmark work remains the definitive modern introduction to Catholic faith. A review of its key themes and enduring value.', '<p>Bishop Robert Barron\'s <em>Catholicism: A Journey to the Heart of the Faith</em> (2011) is a masterwork of popular Catholic theology. Written as a companion to his celebrated documentary series of the same name, it distills two thousand years of Catholic thought, art, spirituality, and history into an accessible and beautifully written volume.</p><p>Barron\'s central argument is that Catholicism is a "both/and" tradition: both faith and reason, both Scripture and Tradition, both individual and communal, both the transcendent God and the fully human Jesus. This integration is what makes Catholicism intellectually credible and spiritually nourishing.</p><p>The book is organized around the central affirmations of the Creed, moving from God and creation through Jesus and the Church to Mary and the saints. Each chapter is enriched by references to art, architecture, literature, and the lives of exemplary Catholics.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 2639, NULL, '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(40, 'St. Francis of Assisi — Patron of Animals and Ecology', 'Giovanni di Pietro di Bernardone, known as Francis of Assisi, was an Italian friar, deacon, mystic, and preacher. He founded the Franciscan Order. His feast day is October 4.', '<p>Saint Francis of Assisi (1181/1182 – 1226) is one of the most venerated religious figures in history. Born into a wealthy merchant family in Assisi, Italy, he renounced his inheritance after a dramatic conversion experience and dedicated his life to radical poverty and service to the poor.</p><p>Francis founded the Order of Friars Minor (the Franciscans), the Order of Saint Clare (the Poor Clares) with Saint Clare of Assisi, and the Third Order of Saint Francis. He is known for his love of nature — reflected in his Canticle of the Sun — and for receiving the stigmata, the five wounds of Christ, in 1224.</p><p>Pope John Paul II named him patron of ecology in 1979. Pope Francis chose his papal name in honor of Saint Francis.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 830, NULL, '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(41, 'St. Thomas Aquinas — Doctor Angelicus', 'Thomas Aquinas was an Italian Dominican friar, philosopher, Catholic priest, and Doctor of the Church. His greatest work, the Summa Theologiae, remains a cornerstone of Catholic theology. Feast day: January 28.', '<p>Saint Thomas Aquinas (1225–1274) is widely considered the greatest philosopher and theologian of the medieval period. Born into a noble family in Aquino, Italy, he joined the Dominican Order against his family\'s wishes and went on to produce one of the most comprehensive syntheses of Christian theology and Aristotelian philosophy ever written.</p><p>His masterwork, the <em>Summa Theologiae</em>, organized Catholic doctrine into a coherent whole and addressed the relationship between faith and reason, the existence and nature of God, the sacraments, the virtues, and the moral life. It remains a primary reference for Catholic theology and philosophy.</p><p>Pope Leo XIII, in his encyclical <em>Aeterni Patris</em> (1879), declared Aquinas the foremost Catholic philosopher and recommended his works as the foundation of Catholic intellectual formation.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 920, NULL, '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(42, 'St. Joan of Arc — Maid of Orléans', 'Joan of Arc was a French peasant girl who, claiming divine guidance, led the French army to several important victories during the Hundred Years\' War. She was burned at the stake at age 19. Feast day: May 30.', '<p>Saint Joan of Arc (c. 1412–1431), known as the Maid of Orléans, is one of the most remarkable figures in medieval history. Born to a peasant family in Domrémy, France, she claimed to have received visions from Saint Michael, Saint Catherine of Alexandria, and Saint Margaret from the age of 13, directing her to support the Dauphin Charles VII of France and recover France from English domination.</p><p>She persuaded the Dauphin to allow her to accompany the royal army to Orléans, which was under siege. Her presence reinvigorated French troops, and Orléans was relieved in 1429 — a turning point in the Hundred Years\' War. She was present at the coronation of Charles VII at Reims.</p><p>Captured by the Burgundians and sold to the English, she was tried for heresy and burned at the stake in Rouen on May 30, 1431. She was only about 19 years old. Twenty-five years later, an inquisitorial court authorized by Pope Callixtus III examined the trial, found her innocent, and declared her a martyr. She was canonized by Pope Benedict XV in 1920.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 1703, NULL, '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(43, 'St. John Paul II — The Great Pilgrim Pope', 'Karol Józef Wojtyła served as Pope from 1978 to 2005. He is one of the most influential leaders of the 20th century. His pontificate of nearly 27 years was the third longest in history. Feast day: October 22.', '<p>Saint John Paul II (1920–2005), born Karol Józef Wojtyła, served as Pope of the Catholic Church from October 1978 until his death in April 2005. He was the first non-Italian pope since Adrian VI in 1523 and the first Polish pope.</p><p>His pontificate was one of the most consequential of the modern era. He played a significant role in the collapse of communist regimes in Poland and Eastern Europe. He canonized more saints than any of his predecessors combined — 482 in total — and beatified 1,340 people.</p><p>Among his greatest contributions was the development of the Theology of the Body, a comprehensive theological reflection on human sexuality, marriage, and the human person. He also instituted World Youth Day, which has drawn millions of young Catholics together across the globe since 1985.</p><p>He was beatified by Pope Benedict XVI in 2011 and canonized by Pope Francis on April 27, 2014 — Divine Mercy Sunday.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 742, NULL, '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(44, 'St. Faustina Kowalska — Apostle of Divine Mercy', 'Helena Kowalska, known in religious life as Sister Maria Faustina, was a Polish nun who reported visions of Jesus Christ and wrote the Diary of Divine Mercy. Feast day: October 5.', '<p>Saint Faustina Kowalska (1905–1938), born Helena Kowalska, was a Polish nun and mystic who is venerated in the Catholic Church as the "Apostle of Divine Mercy." Her spiritual diary, written under obedience to her confessor Blessed Michał Sopoćko, describes her mystical experiences and the messages she claimed to have received from Jesus Christ regarding divine mercy.</p><p>The devotion to Divine Mercy that she promoted includes the Divine Mercy image (with the inscription "Jesus, I trust in You"), the Chaplet of Divine Mercy, and the Feast of Divine Mercy (celebrated on the Second Sunday of Easter). Jesus reportedly told her: "I desire that the Feast of Mercy be a refuge and shelter for all souls, and especially for poor sinners."</p><p>She died of tuberculosis at the age of 33 in Kraków. She was beatified by Pope John Paul II in 1993 and canonized by him in Rome on April 30, 2000 — the first Sunday after Easter, which he simultaneously established as Divine Mercy Sunday for the universal Church.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 910, NULL, '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(45, 'St. Augustine of Hippo — Doctor of Grace', 'Aurelius Augustinus Hipponensis was a theologian and philosopher from Roman Africa. One of the most important Church Fathers, his writings profoundly influenced Western Christianity and philosophy. Feast day: August 28.', '<p>Saint Augustine of Hippo (354–430) is one of the most important figures in the development of Western Christianity and philosophy. Born in Thagaste (modern Algeria), he led a dissolute youth before his dramatic conversion to Christianity in Milan in 386, heavily influenced by Saint Ambrose and his own mother, Saint Monica.</p><p>His two most famous works are the <em>Confessions</em> — an autobiographical account of his conversion and a profound meditation on the soul\'s restlessness apart from God — and <em>The City of God</em>, a monumental work of Christian philosophy written in response to the sack of Rome in 410.</p><p>His famous prayer — "Lord, make me chaste, but not yet" — captures the struggle of a soul torn between the world and God. His equally famous insight — "You have made us for yourself, O Lord, and our heart is restless until it rests in You" — remains one of the most quoted lines in spiritual literature.</p><p>He is the patron saint of brewers, printers, theologians, the alleviation of sore eyes, and a number of cities and dioceses.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 136, NULL, '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(46, 'St. Thérèse of Lisieux — The Little Flower', 'Marie-Françoise-Thérèse Martin was a French Carmelite nun. Her autobiography, The Story of a Soul, introduced her "Little Way" of spiritual childhood. She is a Doctor of the Church. Feast day: October 1.', '<p>Saint Thérèse of Lisieux (1873–1897), known as "The Little Flower," was a French Carmelite nun whose autobiography <em>Story of a Soul</em> made her one of the most beloved saints of the modern era. She died of tuberculosis at the age of 24, having never left her convent or performed any remarkable external deeds — yet Pope Pius X called her "the greatest saint of modern times."</p><p>Her "Little Way" — performing ordinary actions with extraordinary love and trust in God — made holiness accessible to everyone. She wrote: "Love proves itself by deeds, so how am I to show my love? Great deeds are forbidden me. The only way I can prove my love is by scattering flowers and these flowers are every little sacrifice, every glance and word, and the doing of the least actions for love."</p><p>She was canonized in 1925, just 28 years after her death. In 1997, Pope John Paul II declared her a Doctor of the Church — making her the third woman (after Teresa of Ávila and Catherine of Siena) to receive this distinction.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 532, NULL, '2026-03-28 01:13:01', '2026-03-28 01:13:01'),
	(47, 'St. Padre Pio — Stigmatist of the 20th Century', 'Francesco Forgione, known as Padre Pio, was an Italian Capuchin friar, priest, and mystic who bore the stigmata for 50 years. He was canonized in 2002. Feast day: September 23.', '<p>Saint Padre Pio of Pietrelcina (1887–1968), born Francesco Forgione, was an Italian Capuchin friar and priest who is venerated in the Catholic Church as a saint. He is well known for bearing the stigmata — the wounds of Christ\'s crucifixion — for 50 years, from 1918 until his death in 1968.</p><p>Padre Pio was reported to have bilocation, the ability to be in two places at once. Numerous accounts attest to his gift of reading souls in confession, prophecy, and healing. He reportedly converted many people and brought countless lapsed Catholics back to the sacraments.</p><p>He founded the Casa Sollievo della Sofferenza (Home for the Relief of Suffering), a hospital in San Giovanni Rotondo, in 1956. Today it is one of the most modern and well-equipped hospitals in Italy.</p><p>Padre Pio\'s most famous saying: "Pray, hope, and don\'t worry. Worry is useless. God is merciful and will hear your prayer."</p><p>He was beatified by Pope John Paul II in 1999 and canonized on June 16, 2002.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 0, NULL, 710, NULL, '2026-03-28 01:13:01', '2026-03-28 01:13:01'),
	(48, 'St. Catherine of Siena — Doctor of the Church', 'Catherine Benincasa was a lay member of the Dominican Order who lived during the 14th century. She is a Doctor of the Church and patron of Italy and Europe. Feast day: April 29.', '<p>Saint Catherine of Siena (1347–1380) was an Italian tertiary of the Dominican Order and a Scholastic philosopher and theologian. She is venerated in the Catholic Church as a Doctor of the Church — one of only four women to hold this title.</p><p>Born the 24th child of a cloth dyer in Siena, she began having visions from the age of six. As a young woman she cared for the poor and sick in Siena before becoming an influential figure in Italian politics and in the Church.</p><p>Her most notable letters were to Pope Gregory XI, whom she addressed bluntly as "Babbo" (father) and urged to return the papacy from Avignon to Rome — which he ultimately did in 1377. Her major work, <em>The Dialogue of Divine Providence</em> (or simply <em>The Dialogue</em>), is a series of conversations between God the Father and a soul who represents Catherine herself.</p><p>She was canonized by Pope Pius II in 1461, proclaimed a Doctor of the Church by Pope Paul VI in 1970, and named a patron of Europe by Pope John Paul II in 1999.</p>', 'published', 1, 'Botble\\ACL\\Models\\User', 1, NULL, 593, NULL, '2026-03-28 01:13:01', '2026-03-28 01:13:01');

-- Dumping structure for table allcatholicmedia.posts_translations
CREATE TABLE IF NOT EXISTS `posts_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`lang_code`,`posts_id`),
  KEY `idx_posts_trans_posts_id` (`posts_id`),
  KEY `idx_posts_trans_post_lang` (`posts_id`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.posts_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.post_categories
CREATE TABLE IF NOT EXISTS `post_categories` (
  `category_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  KEY `post_categories_category_id_index` (`category_id`),
  KEY `post_categories_post_id_index` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.post_categories: ~48 rows (approximately)
REPLACE INTO `post_categories` (`category_id`, `post_id`) VALUES
	(1, 1),
	(7, 2),
	(3, 3),
	(6, 4),
	(2, 5),
	(4, 6),
	(7, 7),
	(4, 8),
	(8, 9),
	(1, 10),
	(7, 11),
	(6, 12),
	(5, 13),
	(5, 14),
	(7, 15),
	(4, 16),
	(6, 17),
	(3, 18),
	(1, 19),
	(4, 20),
	(9, 21),
	(9, 22),
	(9, 23),
	(9, 24),
	(9, 25),
	(9, 26),
	(7, 27),
	(1, 28),
	(8, 29),
	(7, 30),
	(4, 31),
	(3, 32),
	(1, 33),
	(5, 34),
	(7, 35),
	(8, 36),
	(1, 37),
	(5, 38),
	(6, 39),
	(3, 40),
	(3, 41),
	(3, 42),
	(3, 43),
	(3, 44),
	(3, 45),
	(3, 46),
	(3, 47),
	(3, 48);

-- Dumping structure for table allcatholicmedia.post_tags
CREATE TABLE IF NOT EXISTS `post_tags` (
  `tag_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  KEY `post_tags_tag_id_index` (`tag_id`),
  KEY `post_tags_post_id_index` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.post_tags: ~65 rows (approximately)
REPLACE INTO `post_tags` (`tag_id`, `post_id`) VALUES
	(1, 1),
	(2, 2),
	(9, 3),
	(10, 4),
	(1, 5),
	(10, 6),
	(10, 7),
	(10, 8),
	(10, 9),
	(9, 10),
	(3, 11),
	(10, 12),
	(9, 13),
	(10, 14),
	(9, 15),
	(10, 16),
	(10, 17),
	(9, 18),
	(9, 19),
	(10, 20),
	(1, 21),
	(8, 21),
	(2, 22),
	(6, 22),
	(3, 23),
	(4, 24),
	(7, 25),
	(1, 25),
	(5, 26),
	(10, 26),
	(2, 27),
	(6, 27),
	(5, 28),
	(10, 28),
	(1, 29),
	(5, 29),
	(3, 30),
	(1, 30),
	(10, 31),
	(5, 31),
	(9, 32),
	(2, 32),
	(7, 33),
	(1, 33),
	(10, 34),
	(5, 34),
	(2, 35),
	(10, 35),
	(10, 36),
	(5, 36),
	(1, 37),
	(2, 37),
	(9, 38),
	(10, 38),
	(5, 39),
	(10, 39),
	(9, 40),
	(9, 41),
	(9, 42),
	(9, 43),
	(9, 44),
	(9, 45),
	(9, 46),
	(9, 47),
	(9, 48);

-- Dumping structure for table allcatholicmedia.push_notifications
CREATE TABLE IF NOT EXISTS `push_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `target_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` json DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sent',
  `sent_count` int(11) NOT NULL DEFAULT '0',
  `failed_count` int(11) NOT NULL DEFAULT '0',
  `delivered_count` int(11) NOT NULL DEFAULT '0',
  `read_count` int(11) NOT NULL DEFAULT '0',
  `scheduled_at` timestamp NULL DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `push_notifications_type_created_at_index` (`type`,`created_at`),
  KEY `push_notifications_status_scheduled_at_index` (`status`,`scheduled_at`),
  KEY `push_notifications_created_by_index` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.push_notifications: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.push_notification_recipients
CREATE TABLE IF NOT EXISTS `push_notification_recipients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `push_notification_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sent',
  `sent_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `clicked_at` timestamp NULL DEFAULT NULL,
  `fcm_response` json DEFAULT NULL,
  `error_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pnr_notification_user_index` (`push_notification_id`,`user_type`,`user_id`),
  KEY `pnr_user_status_index` (`user_type`,`user_id`,`status`),
  KEY `pnr_user_read_index` (`user_type`,`user_id`,`read_at`),
  KEY `pnr_status_index` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.push_notification_recipients: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.request_logs
CREATE TABLE IF NOT EXISTS `request_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status_code` int(11) DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.request_logs: ~5 rows (approximately)
REPLACE INTO `request_logs` (`id`, `status_code`, `url`, `count`, `user_id`, `referrer`, `created_at`, `updated_at`) VALUES
	(1, 404, 'http://127.0.0.1:8000/storage/main/general/newsletter-popup.png', 27, NULL, NULL, '2026-03-27 21:44:59', '2026-03-28 01:14:02'),
	(2, 404, 'http://127.0.0.1:8000/blog/scientists-make-breakthrough-in-cancer-research', 1, NULL, NULL, '2026-03-27 21:45:41', '2026-03-27 21:45:41'),
	(3, 404, 'http://127.0.0.1:8000/themes/echo/images/shape/feature-bg-shape.png', 5, NULL, NULL, '2026-03-27 22:29:25', '2026-03-27 22:47:17'),
	(4, 404, 'http://127.0.0.1:8000/themes/echo/plugins/fontawesome5/css/fontawesome.min.css?v=1.5.1', 57, NULL, NULL, '2026-03-27 22:30:18', '2026-03-28 01:04:17'),
	(5, 404, 'http://127.0.0.1:8000/videos', 1, NULL, NULL, '2026-03-27 23:04:14', '2026-03-27 23:04:14');

-- Dumping structure for table allcatholicmedia.revisions
CREATE TABLE IF NOT EXISTS `revisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.revisions: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`),
  KEY `roles_created_by_index` (`created_by`),
  KEY `roles_updated_by_index` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.roles: ~1 rows (approximately)
REPLACE INTO `roles` (`id`, `slug`, `name`, `permissions`, `description`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', '{"users.index":true,"users.create":true,"users.edit":true,"users.destroy":true,"roles.index":true,"roles.create":true,"roles.edit":true,"roles.destroy":true,"core.system":true,"core.cms":true,"core.manage.license":true,"systems.cronjob":true,"core.tools":true,"tools.data-synchronize":true,"media.index":true,"files.index":true,"files.create":true,"files.edit":true,"files.trash":true,"files.destroy":true,"folders.index":true,"folders.create":true,"folders.edit":true,"folders.trash":true,"folders.destroy":true,"settings.index":true,"settings.common":true,"settings.options":true,"settings.email":true,"settings.media":true,"settings.admin-appearance":true,"settings.cache":true,"settings.datatables":true,"settings.email.rules":true,"settings.phone-number":true,"settings.others":true,"menus.index":true,"menus.create":true,"menus.edit":true,"menus.destroy":true,"optimize.settings":true,"pages.index":true,"pages.create":true,"pages.edit":true,"pages.destroy":true,"plugins.index":true,"plugins.edit":true,"plugins.remove":true,"plugins.marketplace":true,"sitemap.settings":true,"core.appearance":true,"theme.index":true,"theme.activate":true,"theme.remove":true,"theme.options":true,"theme.custom-css":true,"theme.custom-js":true,"theme.custom-html":true,"theme.robots-txt":true,"settings.website-tracking":true,"widgets.index":true,"ads.index":true,"ads.create":true,"ads.edit":true,"ads.destroy":true,"ads.settings":true,"analytics.general":true,"analytics.page":true,"analytics.browser":true,"analytics.referrer":true,"analytics.settings":true,"announcements.index":true,"announcements.create":true,"announcements.edit":true,"announcements.destroy":true,"announcements.settings":true,"audit-log.index":true,"audit-log.destroy":true,"backups.index":true,"backups.create":true,"backups.restore":true,"backups.destroy":true,"plugins.blog":true,"posts.index":true,"posts.create":true,"posts.edit":true,"posts.destroy":true,"categories.index":true,"categories.create":true,"categories.edit":true,"categories.destroy":true,"tags.index":true,"blog.reports":true,"tags.create":true,"tags.edit":true,"tags.destroy":true,"blog.settings":true,"posts.export":true,"posts.import":true,"captcha.settings":true,"contacts.index":true,"contacts.edit":true,"contacts.destroy":true,"contact.custom-fields":true,"contact.settings":true,"fob-comment.index":true,"fob-comment.comments.index":true,"fob-comment.comments.edit":true,"fob-comment.comments.destroy":true,"fob-comment.comments.reply":true,"fob-comment.settings":true,"galleries.index":true,"galleries.create":true,"galleries.edit":true,"galleries.destroy":true,"languages.index":true,"languages.create":true,"languages.edit":true,"languages.destroy":true,"translations.import":true,"translations.export":true,"property-translations.import":true,"property-translations.export":true,"member.index":true,"member.create":true,"member.edit":true,"member.destroy":true,"member.settings":true,"newsletter.index":true,"newsletter.destroy":true,"newsletter.settings":true,"request-log.index":true,"request-log.destroy":true,"social-login.settings":true,"plugins.translation":true,"translations.locales":true,"translations.theme-translations":true,"translations.index":true,"theme-translations.export":true,"other-translations.export":true,"theme-translations.import":true,"other-translations.import":true,"api.settings":true,"api.sanctum-token.index":true,"api.sanctum-token.create":true,"api.sanctum-token.destroy":true}', 'Admin users role', 1, 1, 1, '2025-12-24 07:30:13', '2025-12-24 07:30:13');

-- Dumping structure for table allcatholicmedia.role_users
CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_users_user_id_index` (`user_id`),
  KEY `role_users_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.role_users: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.sessions: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.settings: ~82 rows (approximately)
REPLACE INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(2, 'api_enabled', '0', NULL, '2026-03-28 00:02:05'),
	(3, 'activated_plugins', '["language","language-advanced","ads","ai-writer","analytics","announcement","audit-log","backup","blog","captcha","contact","cookie-consent","fob-comment","gallery","member","newsletter","note","request-log","rss-feed","social-login","translation","live-stream","community"]', NULL, '2026-03-28 00:02:05'),
	(4, 'ai_writer_proxy_enable', '0', NULL, '2026-03-28 00:02:05'),
	(5, 'ai_writer_proxy_protocol', NULL, NULL, '2026-03-28 00:02:05'),
	(6, 'ai_writer_proxy_ip', NULL, NULL, '2026-03-28 00:02:05'),
	(7, 'ai_writer_proxy_port', NULL, NULL, '2026-03-28 00:02:05'),
	(8, 'ai_writer_proxy_username', NULL, NULL, '2026-03-28 00:02:05'),
	(9, 'ai_writer_proxy_password', NULL, NULL, '2026-03-28 00:02:05'),
	(10, 'ai_writer_prompt_template', '[{"title":"Product Content","content":"You will be a marketer. I will give the information of the product, you will write an introductory article about that product, the article requires google seo standards and is highly persuasive to increase the rate of users closing orders.\\nParameters product:"},{"title":"Post Content","content":"You will be a marketer. Articles about:"}]', NULL, '2026-03-28 00:02:05'),
	(11, 'ai_writer_openai_key', NULL, NULL, '2026-03-28 00:02:05'),
	(12, 'ai_writer_openai_temperature', '1', NULL, '2026-03-28 00:02:05'),
	(13, 'ai_writer_openai_max_tokens', '2000', NULL, '2026-03-28 00:02:05'),
	(14, 'ai_writer_openai_frequency_penalty', '0', NULL, '2026-03-28 00:02:05'),
	(15, 'ai_writer_openai_presence_penalty', '0', NULL, '2026-03-28 00:02:05'),
	(16, 'ai_writer_openai_models', '["gpt-3.5-turbo"]', NULL, '2026-03-28 00:02:05'),
	(17, 'ai_writer_openai_default_model', 'gpt-3.5-turbo', NULL, '2026-03-28 00:02:05'),
	(18, 'ai_writer_spin_template', '[]', NULL, '2026-03-28 00:02:05'),
	(21, 'language_hide_default', '1', NULL, '2026-03-28 00:02:05'),
	(22, 'language_switcher_display', 'dropdown', NULL, '2026-03-28 00:02:05'),
	(23, 'language_display', 'all', NULL, '2026-03-28 00:02:05'),
	(24, 'language_hide_languages', '[]', NULL, '2026-03-28 00:02:05'),
	(25, 'media_random_hash', '75c6b855656305f09bf2467e1f2739cd', NULL, '2026-03-28 00:02:05'),
	(26, 'theme', 'echo-politics', NULL, '2026-03-28 00:02:05'),
	(27, 'show_admin_bar', '1', NULL, '2026-03-28 00:02:05'),
	(28, 'admin_favicon', 'header.png', NULL, '2026-03-28 00:02:05'),
	(29, 'admin_logo', 'header.png', NULL, '2026-03-28 00:02:05'),
	(30, 'permalink-botble-blog-models-post', 'blog', NULL, '2026-03-28 00:02:05'),
	(31, 'permalink-botble-blog-models-category', 'blog', NULL, '2026-03-28 00:02:05'),
	(32, 'theme-echo-politics-site_name', 'Echo - Politics', NULL, '2026-03-28 00:02:05'),
	(33, 'theme-echo-politics-site_title', 'Catholic Media', NULL, '2026-03-28 00:02:05'),
	(34, 'theme-echo-politics-seo_description', 'Echo is a modern, clean, and professional Laravel script that is suitable for news, magazine, blog, and any kind of website.', NULL, '2026-03-28 00:02:05'),
	(35, 'theme-echo-politics-homepage_id', '1', NULL, '2026-03-28 00:02:05'),
	(36, 'theme-echo-politics-logo', 'header.png', NULL, '2026-03-28 00:02:05'),
	(37, 'theme-echo-politics-logo_dark', 'header.png', NULL, '2026-03-28 00:02:05'),
	(38, 'theme-echo-politics-favicon', 'header.png', NULL, '2026-03-28 00:02:05'),
	(39, 'theme-echo-politics-blog_page_id', '4', NULL, '2026-03-28 00:02:05'),
	(40, 'theme-echo-politics-primary_font', 'Inter', NULL, '2026-03-28 00:02:05'),
	(41, 'theme-echo-politics-heading_font', 'DM Sans', NULL, '2026-03-28 00:02:05'),
	(42, 'theme-echo-politics-theme_style', 'dark', NULL, '2026-03-28 00:02:05'),
	(43, 'theme-echo-politics-secondary_color', 'rgb(4, 107, 210)', NULL, '2026-03-28 00:02:05'),
	(44, 'theme-echo-politics-breadcrumb_background_image', 'main/backgrounds/breadcrumb.png', NULL, '2026-03-28 00:02:05'),
	(45, 'theme-echo-politics-breadcrumb_background_color', 'transparent', NULL, '2026-03-28 00:02:05'),
	(46, 'theme-echo-politics-breadcrumb_text_color', 'transparent', NULL, '2026-03-28 00:02:05'),
	(47, 'theme-echo-politics-blog_author_style', 'avatar_start', NULL, '2026-03-28 00:02:05'),
	(48, 'theme-echo-politics-blog_description_style', 'normal', NULL, '2026-03-28 00:02:05'),
	(49, 'theme-echo-politics-copyright', '©%Y Archi Elite JSC. All Rights Reserved.', NULL, '2026-03-28 00:02:05'),
	(50, 'theme-echo-politics-language_switcher_enabled', '1', NULL, '2026-03-28 00:02:05'),
	(51, 'theme-echo-politics-newsletter_popup_enable', '1', NULL, '2026-03-28 00:02:05'),
	(52, 'theme-echo-politics-newsletter_popup_image', 'main/general/newsletter-popup.png', NULL, '2026-03-28 00:02:05'),
	(53, 'theme-echo-politics-newsletter_popup_title', 'Let’s join our newsletter!', NULL, '2026-03-28 00:02:05'),
	(54, 'theme-echo-politics-newsletter_popup_subtitle', 'Weekly Updates', NULL, '2026-03-28 00:02:05'),
	(55, 'theme-echo-politics-newsletter_popup_description', 'Do not worry we don’t spam!', NULL, '2026-03-28 00:02:05'),
	(56, 'theme-echo-politics-social_links', '[[{"key":"name","value":"Facebook"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/www.facebook.com\\/"}],[{"key":"name","value":"Instagram"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/www.instagram.com\\/"}],[{"key":"name","value":"Twitter"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/www.twitter.com\\/"}],[{"key":"name","value":"YouTube"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/www.youtube.com\\/"}],[{"key":"name","value":"Pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/www.pinterest.com\\/"}]]', NULL, '2026-03-28 00:02:05'),
	(57, 'theme-echo-politics-social_sharing', '[[{"key":"social","value":"facebook"},{"key":"icon","value":"ti ti-brand-facebook"}],[{"key":"social","value":"x"},{"key":"icon","value":"ti ti-brand-x"}],[{"key":"social","value":"pinterest"},{"key":"icon","value":"ti ti-brand-pinterest"}],[{"key":"social","value":"linkedin"},{"key":"icon","value":"ti ti-brand-linkedin"}],[{"key":"social","value":"whatsapp"},{"key":"icon","value":"ti ti-brand-whatsapp"}],[{"key":"social","value":"email"},{"key":"icon","value":"ti ti-mail"}]]', NULL, '2026-03-28 00:02:05'),
	(58, 'theme-echo-politics-primary_color', '#046bd2', NULL, '2026-03-28 00:02:05'),
	(59, 'announcement_max_width', '1390', NULL, '2026-03-28 00:02:05'),
	(60, 'announcement_text_color', '#fefefe', NULL, '2026-03-28 00:02:05'),
	(61, 'announcement_background_color', '#ff390e', NULL, '2026-03-28 00:02:05'),
	(62, 'announcement_text_alignment', 'center', NULL, '2026-03-28 00:02:05'),
	(63, 'announcement_dismissible', '1', NULL, '2026-03-28 00:02:05'),
	(64, 'announcement_font_size', '14', NULL, '2026-03-28 00:02:05'),
	(65, 'announcement_font_size_unit', 'px', NULL, '2026-03-28 00:02:05'),
	(99, 'license_activated_at', '2026-03-27T23:34:18+00:00', NULL, '2026-03-28 00:02:05'),
	(100, 'license_last_verified_at', '2026-03-27T23:34:18+00:00', NULL, '2026-03-28 00:02:05'),
	(101, 'license_next_check_at', '2026-04-03T23:34:18+00:00', NULL, '2026-03-28 00:02:05'),
	(102, 'license_verification_count', '1', NULL, '2026-03-28 00:02:05'),
	(103, 'license_purchase_code_hash', '79c684a5b2364e21fc8cd9bfebef211cda5c50e46dd9a4ba26d3567f974ac00b', NULL, '2026-03-28 00:02:05'),
	(104, 'license_server_ip', '2a02:b125:8013:8b08:a1f9:7af0:6732:5d5f', NULL, '2026-03-28 00:02:05'),
	(105, 'license_domain', '127.0.0.1', NULL, '2026-03-28 00:02:05'),
	(106, 'licensed_to', 'codelover138', NULL, '2026-03-28 00:02:05'),
	(108, 'theme-echo-politics-heading_color', 'rgb(30, 41, 59)', '2026-03-27 22:50:14', '2026-03-28 00:02:05'),
	(109, 'theme-echo-politics-text_color', '#475569', '2026-03-27 22:50:14', '2026-03-28 00:02:05'),
	(110, 'theme-echo-politics-footer_background_color', 'rgb(30, 58, 138)', '2026-03-27 22:50:14', '2026-03-28 00:02:05'),
	(111, 'theme-echo-politics-footer_heading_color', '#f8fafc', '2026-03-27 22:50:14', '2026-03-28 00:02:05'),
	(112, 'theme-echo-politics-footer_text_color', '#94a3b8', '2026-03-27 22:50:14', '2026-03-28 00:02:05'),
	(113, 'theme-echo-politics-back_to_top_enabled', '1', '2026-03-27 22:50:14', '2026-03-28 00:02:05'),
	(114, 'theme-echo-politics-footer_background_image', '', '2026-03-27 22:50:14', '2026-03-28 00:02:05'),
	(142, 'theme-echo-politics-admin_logo', 'header.png', NULL, '2026-03-28 00:02:05'),
	(143, 'theme-echo-politics-admin_favicon', 'header.png', NULL, '2026-03-28 00:02:05'),
	(144, 'is_completed_get_started', '1', NULL, '2026-03-28 00:02:05'),
	(145, 'theme-echo-politics-logo_height', '60', NULL, '2026-03-28 00:02:05'),
	(146, 'theme-echo-politics-favicon_type', 'image/png', NULL, '2026-03-28 00:02:06');

-- Dumping structure for table allcatholicmedia.slugs
CREATE TABLE IF NOT EXISTS `slugs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` bigint(20) unsigned NOT NULL,
  `reference_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slugs_reference_id_index` (`reference_id`),
  KEY `slugs_key_index` (`key`),
  KEY `slugs_prefix_index` (`prefix`),
  KEY `slugs_reference_index` (`reference_id`,`reference_type`),
  KEY `idx_key_prefix` (`key`,`prefix`),
  KEY `idx_slugs_reference` (`reference_type`,`reference_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.slugs: ~106 rows (approximately)
REPLACE INTO `slugs` (`id`, `key`, `reference_id`, `reference_type`, `prefix`, `created_at`, `updated_at`) VALUES
	(1, 'smith', 1, 'Botble\\Member\\Models\\Member', 'author', '2025-12-24 07:30:15', '2025-12-24 07:30:28'),
	(2, 'schultz', 2, 'Botble\\Member\\Models\\Member', 'author', '2025-12-24 07:30:15', '2025-12-24 07:30:28'),
	(3, 'friesen', 3, 'Botble\\Member\\Models\\Member', 'author', '2025-12-24 07:30:15', '2025-12-24 07:30:28'),
	(4, 'stokes', 4, 'Botble\\Member\\Models\\Member', 'author', '2025-12-24 07:30:15', '2025-12-24 07:30:28'),
	(5, 'cruickshank', 5, 'Botble\\Member\\Models\\Member', 'author', '2025-12-24 07:30:15', '2025-12-24 07:30:28'),
	(6, 'purdy', 6, 'Botble\\Member\\Models\\Member', 'author', '2025-12-24 07:30:15', '2025-12-24 07:30:28'),
	(7, 'macejkovic', 7, 'Botble\\Member\\Models\\Member', 'author', '2025-12-24 07:30:15', '2025-12-24 07:30:28'),
	(8, 'gislason', 8, 'Botble\\Member\\Models\\Member', 'author', '2025-12-24 07:30:15', '2025-12-24 07:30:28'),
	(9, 'vatican-news', 1, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(10, 'parish-life', 2, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(11, 'saints-feast-days', 3, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(12, 'catholic-culture', 4, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(13, 'world-news', 5, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(14, 'opinion-commentary', 6, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(15, 'spirituality', 7, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(16, 'catholic-education', 8, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(17, 'videos', 9, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(18, 'live-streams', 10, 'Botble\\Blog\\Models\\Category', 'blog', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(19, 'mass', 1, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(20, 'rosary', 2, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(21, 'adoration', 3, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(22, 'divine-mercy', 4, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(23, 'homilies', 5, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(24, 'marian-devotions', 6, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(25, 'traditional-latin-mass', 7, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(26, 'novus-ordo', 8, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(27, 'saints', 9, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(28, 'scripture', 10, 'Botble\\Blog\\Models\\Tag', 'tag', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(29, 'pope-francis-calls-for-global-peace-at-sunday-angelus', 1, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(30, 'the-daily-rosary-a-guide-for-families', 2, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(31, 'feast-of-the-assumption-history-and-meaning', 3, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(32, 'how-catholic-social-teaching-shapes-modern-policy', 4, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(33, 'parish-communities-thriving-post-pandemic', 5, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(34, 'climate-care-as-a-catholic-moral-obligation', 6, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(35, 'understanding-the-theology-of-the-body', 7, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(36, 'technology-and-the-church-evangelization-in-the-digital-age', 8, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(37, 'catholic-schools-faith-formation-and-academic-excellence', 9, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(38, 'vatican-diplomacy-the-holy-see-on-the-world-stage', 10, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(39, 'adoration-hour-guide-drawing-closer-to-christ', 11, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(40, 'human-dignity-at-the-heart-of-catholic-social-doctrine', 12, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(41, 'unity-and-diversity-in-the-global-catholic-church', 13, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(42, 'the-role-of-catholic-ngos-in-international-development', 14, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(43, 'lent-and-easter-a-spiritual-renewal-guide', 15, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(44, 'protecting-parishes-cybersecurity-for-catholic-organizations', 16, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(45, 'bridging-divides-the-churchs-role-in-a-polarized-world', 17, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(46, 'women-saints-who-changed-the-church', 18, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(47, 'the-ethics-of-leadership-lessons-from-the-papal-tradition', 19, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(48, 'fighting-misinformation-a-catholic-approach-to-media-literacy', 20, 'Botble\\Blog\\Models\\Post', 'blog', '2025-12-24 07:30:26', '2026-03-27 23:27:34'),
	(49, 'perfect', 1, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(50, 'new-day', 2, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(51, 'happy-day', 3, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(52, 'nature', 4, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(53, 'morning', 5, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(54, 'sunset', 6, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(55, 'ocean-views', 7, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(56, 'adventure-time', 8, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(57, 'city-lights', 9, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(58, 'dreamscape', 10, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(59, 'enchanted-forest', 11, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(60, 'golden-hour', 12, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(61, 'serenity', 13, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(62, 'eternal-beauty', 14, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(63, 'moonlight-magic', 15, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(64, 'starry-night', 16, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(65, 'hidden-gems', 17, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(66, 'tranquil-waters', 18, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(67, 'urban-escape', 19, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(68, 'twilight-zone', 20, 'Botble\\Gallery\\Models\\Gallery', 'galleries', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(69, 'homepage', 1, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(70, 'about-us', 2, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(71, 'contact', 3, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(72, 'blog', 4, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(73, 'team', 5, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(74, 'cookie-policy', 6, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(75, 'terms-of-use', 7, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(76, 'privacy-policy', 8, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(77, 'advertise', 9, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(78, 'faq', 10, 'Botble\\Page\\Models\\Page', '', '2025-12-24 07:30:26', '2025-12-24 07:30:26'),
	(79, 'daily-mass-vatican-live-stream', 21, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(80, 'holy-rosary-sorrowful-mysteries', 22, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(81, 'holy-hour-eucharistic-adoration', 23, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(82, 'divine-mercy-chaplet-guided-prayer', 24, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(83, 'traditional-latin-mass-high-mass-solemn', 25, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(84, 'sunday-homily-love-your-neighbor', 26, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-27 23:28:06', '2026-03-27 23:28:06'),
	(85, 'understanding-the-rosary-a-spiritual-guide-for-beginners', 27, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:15', '2026-03-28 00:50:15'),
	(86, 'pope-benedict-xvis-enduring-legacy-in-catholic-theology', 28, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:15', '2026-03-28 00:50:15'),
	(87, 'the-new-evangelization-bringing-the-gospel-to-a-post-christian-world', 29, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:15', '2026-03-28 00:50:15'),
	(88, 'adoration-of-the-blessed-sacrament-an-ancient-practice-renewed', 30, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:15', '2026-03-28 00:50:15'),
	(89, 'catholic-social-teaching-a-primer-on-the-churchs-vision-for-society', 31, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(90, 'st-teresa-of-avila-doctor-of-the-church-and-master-of-prayer', 32, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(91, 'the-traditional-latin-mass-history-beauty-and-ongoing-debate', 33, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(92, 'mercy-and-justice-cardinal-cupich-on-prison-ministry', 34, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(93, 'the-liturgy-of-the-hours-praying-with-the-church-throughout-the-day', 35, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(94, 'youth-ministry-in-crisis-how-parishes-are-winning-back-young-catholics', 36, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(95, 'confession-why-this-sacrament-is-the-greatest-gift-for-sinners', 37, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(96, 'world-youth-day-building-the-church-of-tomorrow', 38, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(97, 'book-review-catholicism-by-bishop-robert-barron', 39, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 00:50:16', '2026-03-28 00:50:16'),
	(98, 'st-francis-of-assisi-patron-of-animals-and-ecology', 40, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(99, 'st-thomas-aquinas-doctor-angelicus', 41, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(100, 'st-joan-of-arc-maid-of-orleans', 42, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(101, 'st-john-paul-ii-the-great-pilgrim-pope', 43, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(102, 'st-faustina-kowalska-apostle-of-divine-mercy', 44, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:00', '2026-03-28 01:13:00'),
	(103, 'st-augustine-of-hippo-doctor-of-grace', 45, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:01', '2026-03-28 01:13:01'),
	(104, 'st-therese-of-lisieux-the-little-flower', 46, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:01', '2026-03-28 01:13:01'),
	(105, 'st-padre-pio-stigmatist-of-the-20th-century', 47, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:01', '2026-03-28 01:13:01'),
	(106, 'st-catherine-of-siena-doctor-of-the-church', 48, 'Botble\\Blog\\Models\\Post', 'blog', '2026-03-28 01:13:01', '2026-03-28 01:13:01');

-- Dumping structure for table allcatholicmedia.slugs_translations
CREATE TABLE IF NOT EXISTS `slugs_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugs_id` bigint(20) unsigned NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`lang_code`,`slugs_id`),
  KEY `idx_slugid_key_prefix` (`slugs_id`,`key`,`prefix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.slugs_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.social_logins
CREATE TABLE IF NOT EXISTS `social_logins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `refresh_token` text COLLATE utf8mb4_unicode_ci,
  `token_expires_at` timestamp NULL DEFAULT NULL,
  `provider_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `social_logins_provider_provider_id_unique` (`provider`,`provider_id`),
  KEY `social_logins_user_type_user_id_index` (`user_type`,`user_id`),
  KEY `social_logins_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.social_logins: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) unsigned DEFAULT NULL,
  `author_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.tags: ~10 rows (approximately)
REPLACE INTO `tags` (`id`, `name`, `author_id`, `author_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Mass', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(2, 'Rosary', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(3, 'Adoration', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(4, 'Divine Mercy', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(5, 'Homilies', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(6, 'Marian Devotions', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(7, 'Traditional Latin Mass', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(8, 'Novus Ordo', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(9, 'Saints', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12'),
	(10, 'Scripture', 1, 'Botble\\ACL\\Models\\User', NULL, 'published', '2025-12-24 07:30:21', '2026-03-27 23:27:12');

-- Dumping structure for table allcatholicmedia.tags_translations
CREATE TABLE IF NOT EXISTS `tags_translations` (
  `lang_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_code`,`tags_id`),
  KEY `idx_tags_trans_tags_id` (`tags_id`),
  KEY `idx_tags_trans_tag_lang` (`tags_id`,`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.tags_translations: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_id` bigint(20) unsigned DEFAULT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT '0',
  `manage_supers` tinyint(1) NOT NULL DEFAULT '0',
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `sessions_invalidated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.users: ~1 rows (approximately)
REPLACE INTO `users` (`id`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `username`, `avatar_id`, `super_user`, `manage_supers`, `permissions`, `last_login`, `sessions_invalidated_at`) VALUES
	(1, 'babu313136@gmail.com', NULL, NULL, '$2y$12$DXmeOiEsytJGXC2V/L24ReczwD6WiYk0zKhPcwPF5D6Pcx3P7R2AO', 'XCb3WJhCm4K3rh1HCv2fpGEqQ6vd0II35kmjSopv4e5OsvVrpHnGwC2BWIx2', '2025-12-24 07:30:13', '2026-03-27 22:59:33', 'System', 'Admin', 'admin', NULL, 1, 1, NULL, '2026-03-27 22:54:17', NULL);

-- Dumping structure for table allcatholicmedia.user_meta
CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_meta_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.user_meta: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.user_settings
CREATE TABLE IF NOT EXISTS `user_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_settings_user_type_user_id_key_unique` (`user_type`,`user_id`,`key`),
  KEY `user_settings_user_type_user_id_index` (`user_type`,`user_id`),
  KEY `user_settings_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.user_settings: ~0 rows (approximately)

-- Dumping structure for table allcatholicmedia.widgets
CREATE TABLE IF NOT EXISTS `widgets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `widget_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_id` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `widgets_unique_index` (`theme`,`sidebar_id`,`widget_id`,`position`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table allcatholicmedia.widgets: ~30 rows (approximately)
REPLACE INTO `widgets` (`id`, `widget_id`, `sidebar_id`, `theme`, `position`, `data`, `created_at`, `updated_at`) VALUES
	(1, 'BlogPostsWidget', 'menu_sidebar', 'echo-politics', 1, '{"type":"recent","category_ids":[1,2,3],"limit":3}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(2, 'SocialLinksWidget', 'menu_sidebar', 'echo-politics', 2, '[]', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(3, 'BlogCategoriesWidget', 'primary_sidebar', 'echo-politics', 1, '{"title":"Popular Categories","id":"BlogCategoriesWidget","enable_lazy_loading":"yes","quantity":"5","category_id_1":"1","background_image_1":"main\\/blog-categories\\/1.png","background_color_1":"rgb(174 81 43)","category_id_2":"2","background_image_2":"main\\/blog-categories\\/2.png","background_color_2":"rgb(102 64 165)","category_id_3":"3","background_image_3":"main\\/blog-categories\\/3.png","background_color_3":"rgb(85 163 168)","category_id_4":"4","background_image_4":"main\\/blog-categories\\/4.png","background_color_4":"rgb(83 39 21)","category_id_5":"5","background_image_5":"main\\/blog-categories\\/5.png","background_color_5":"rgb(85 163 168)"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(4, 'BlogPostsWidget', 'primary_sidebar', 'echo-politics', 2, '{"type":"popular","card_style":"default-card","shape":"square","category_ids":[1,3,4],"title":"Top Story","limit":4,"enable_lazy_loading":"yes"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(5, 'FollowUsWidget', 'primary_sidebar', 'echo-politics', 3, '{"id":"FollowUsWidget","items":[[{"key":"title","value":"20K Fans"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/facebook.com"}],[{"key":"title","value":"10K Followers"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/twitter.com"}],[{"key":"title","value":"50K Followers"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/instagram.com"}],[{"key":"title","value":"30K Followers"},{"key":"icon","value":"ti ti-brand-linkedin"},{"key":"url","value":"https:\\/\\/linkedin.com"}],[{"key":"title","value":"30K Followers"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/pinterest.com"}],[{"key":"title","value":"04K Subscribers"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/youtube.com"}]]}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(6, 'FollowUsWidget', 'custom_sidebar_1', 'echo-politics', 1, '{"id":"FollowUsWidget","items":[[{"key":"title","value":"20K Fans"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/facebook.com"}],[{"key":"title","value":"10K Followers"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/twitter.com"}],[{"key":"title","value":"50K Followers"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/instagram.com"}],[{"key":"title","value":"30K Followers"},{"key":"icon","value":"ti ti-brand-linkedin"},{"key":"url","value":"https:\\/\\/linkedin.com"}],[{"key":"title","value":"30K Followers"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/pinterest.com"}],[{"key":"title","value":"04K Subscribers"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/youtube.com"}]]}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(7, 'BlogPostsWidget', 'custom_sidebar_1', 'echo-politics', 2, '{"id":"BlogPostsWidget","title":"Popular Now","style":"default-card","shape":"circle","category_ids":[1,2,3],"enable_lazy_loading":"yes"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(8, 'GalleriesWidget', 'custom_sidebar_1', 'echo-politics', 3, '{"id":"GalleriesWidget","title":"Gallery","limit":4}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(9, 'BlogCategoriesWidget', 'custom_sidebar_2', 'echo-politics', 1, '{"title":"Hot Categories","id":"BlogCategoriesWidget","quantity":"5","category_id_1":"1","background_image_1":"politics\\/backgrounds\\/blog-category-bg.png","background_color_1":"rgb(174 81 43)","category_id_2":"2","background_image_2":"politics\\/backgrounds\\/blog-category-bg.png","background_color_2":"rgb(102 64 165)","category_id_3":"3","background_image_3":"politics\\/backgrounds\\/blog-category-bg.png","background_color_3":"rgb(85 163 168)","category_id_4":"4","background_image_4":"politics\\/backgrounds\\/blog-category-bg.png","background_color_4":"rgb(83 39 21)","category_id_5":"5","background_image_5":"politics\\/backgrounds\\/blog-category-bg.png","background_color_5":"rgb(85 163 168)","enable_lazy_loading":"yes"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(10, 'NewsletterWidget', 'custom_sidebar_2', 'echo-politics', 2, '{"id":"NewsletterWidget","title":"Stay Tuned With Updates","image":"politics\\/general\\/newsletter-image.png"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(11, 'SiteInformationWidget', 'footer_sidebar', 'echo-politics', 1, '{"id":"SiteInformationWidget","title":"Get In Touch","email":"Info@Demomail.Com","hotline":"(00) 236 123 456 88","address":"255 Sheet, New Avanew, NY"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(12, 'Botble\\Widget\\Widgets\\CoreSimpleMenu', 'footer_sidebar', 'echo-politics', 2, '{"id":"Botble\\\\Widget\\\\Widgets\\\\CoreSimpleMenu","name":"Most Popular","style":"2-column","items":[[{"key":"label","value":"Political Systems"},{"key":"url","value":"http:\\/\\/localhost\\/political-systems"}],[{"key":"label","value":"Media and Politics"},{"key":"url","value":"http:\\/\\/localhost\\/media-and-politics"}],[{"key":"label","value":"Elections and Campaigns"},{"key":"url","value":"http:\\/\\/localhost\\/elections-and-campaigns"}],[{"key":"label","value":"Political Ideologies"},{"key":"url","value":"http:\\/\\/localhost\\/political-ideologies"}],[{"key":"label","value":"International Relations"},{"key":"url","value":"http:\\/\\/localhost\\/international-relations"}]]}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(13, 'Botble\\Widget\\Widgets\\CoreSimpleMenu', 'footer_sidebar', 'echo-politics', 3, '{"id":"Botble\\\\Widget\\\\Widgets\\\\CoreSimpleMenu","name":"Help","items":[[{"key":"label","value":"About"},{"key":"url","value":"about-us"}],[{"key":"label","value":"Terms of Use"},{"key":"url","value":"terms-of-use"}],[{"key":"label","value":"Advertise"},{"key":"url","value":"advertise"}],[{"key":"label","value":"Privacy Policy"},{"key":"url","value":"privacy-policy"}],[{"key":"label","value":"FAQ"},{"key":"url","value":"faq"}]]}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(14, 'NewsletterWidget', 'footer_sidebar', 'echo-politics', 4, '{"id":"NewsletterWidget","title":"Newsletter","description":"Register now to get latest updates on promotion & coupons."}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(15, 'ActionButtonsWidget', 'header_sidebar', 'echo-politics', 0, '{"enable_dark_light_switcher_button":true,"enable_search_button":true,"enable_toggle_side_menu_button":true,"alignment":"end"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(16, 'BlogPostsWidget', 'menu_sidebar', 'echo-catholic', 1, '{"type":"recent","category_ids":[1,2,3],"limit":3}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(17, 'SocialLinksWidget', 'menu_sidebar', 'echo-catholic', 2, '[]', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(18, 'BlogCategoriesWidget', 'primary_sidebar', 'echo-catholic', 1, '{"title":"Popular Categories","id":"BlogCategoriesWidget","enable_lazy_loading":"yes","quantity":"5","category_id_1":"1","background_image_1":"main\\/blog-categories\\/1.png","background_color_1":"rgb(174 81 43)","category_id_2":"2","background_image_2":"main\\/blog-categories\\/2.png","background_color_2":"rgb(102 64 165)","category_id_3":"3","background_image_3":"main\\/blog-categories\\/3.png","background_color_3":"rgb(85 163 168)","category_id_4":"4","background_image_4":"main\\/blog-categories\\/4.png","background_color_4":"rgb(83 39 21)","category_id_5":"5","background_image_5":"main\\/blog-categories\\/5.png","background_color_5":"rgb(85 163 168)"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(19, 'BlogPostsWidget', 'primary_sidebar', 'echo-catholic', 2, '{"type":"popular","card_style":"default-card","shape":"square","category_ids":[1,3,4],"title":"Top Story","limit":4,"enable_lazy_loading":"yes"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(20, 'FollowUsWidget', 'primary_sidebar', 'echo-catholic', 3, '{"id":"FollowUsWidget","items":[[{"key":"title","value":"20K Fans"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/facebook.com"}],[{"key":"title","value":"10K Followers"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/twitter.com"}],[{"key":"title","value":"50K Followers"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/instagram.com"}],[{"key":"title","value":"30K Followers"},{"key":"icon","value":"ti ti-brand-linkedin"},{"key":"url","value":"https:\\/\\/linkedin.com"}],[{"key":"title","value":"30K Followers"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/pinterest.com"}],[{"key":"title","value":"04K Subscribers"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/youtube.com"}]]}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(21, 'FollowUsWidget', 'custom_sidebar_1', 'echo-catholic', 1, '{"id":"FollowUsWidget","items":[[{"key":"title","value":"20K Fans"},{"key":"icon","value":"ti ti-brand-facebook"},{"key":"url","value":"https:\\/\\/facebook.com"}],[{"key":"title","value":"10K Followers"},{"key":"icon","value":"ti ti-brand-x"},{"key":"url","value":"https:\\/\\/twitter.com"}],[{"key":"title","value":"50K Followers"},{"key":"icon","value":"ti ti-brand-instagram"},{"key":"url","value":"https:\\/\\/instagram.com"}],[{"key":"title","value":"30K Followers"},{"key":"icon","value":"ti ti-brand-linkedin"},{"key":"url","value":"https:\\/\\/linkedin.com"}],[{"key":"title","value":"30K Followers"},{"key":"icon","value":"ti ti-brand-pinterest"},{"key":"url","value":"https:\\/\\/pinterest.com"}],[{"key":"title","value":"04K Subscribers"},{"key":"icon","value":"ti ti-brand-youtube"},{"key":"url","value":"https:\\/\\/youtube.com"}]]}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(22, 'BlogPostsWidget', 'custom_sidebar_1', 'echo-catholic', 2, '{"id":"BlogPostsWidget","title":"Popular Now","style":"default-card","shape":"circle","category_ids":[1,2,3],"enable_lazy_loading":"yes"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(23, 'GalleriesWidget', 'custom_sidebar_1', 'echo-catholic', 3, '{"id":"GalleriesWidget","title":"Gallery","limit":4}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(24, 'BlogCategoriesWidget', 'custom_sidebar_2', 'echo-catholic', 1, '{"title":"Hot Categories","id":"BlogCategoriesWidget","quantity":"5","category_id_1":"1","background_image_1":"politics\\/backgrounds\\/blog-category-bg.png","background_color_1":"rgb(174 81 43)","category_id_2":"2","background_image_2":"politics\\/backgrounds\\/blog-category-bg.png","background_color_2":"rgb(102 64 165)","category_id_3":"3","background_image_3":"politics\\/backgrounds\\/blog-category-bg.png","background_color_3":"rgb(85 163 168)","category_id_4":"4","background_image_4":"politics\\/backgrounds\\/blog-category-bg.png","background_color_4":"rgb(83 39 21)","category_id_5":"5","background_image_5":"politics\\/backgrounds\\/blog-category-bg.png","background_color_5":"rgb(85 163 168)","enable_lazy_loading":"yes"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(25, 'NewsletterWidget', 'custom_sidebar_2', 'echo-catholic', 2, '{"id":"NewsletterWidget","title":"Stay Tuned With Updates","image":"politics\\/general\\/newsletter-image.png"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(26, 'SiteInformationWidget', 'footer_sidebar', 'echo-catholic', 1, '{"id":"SiteInformationWidget","title":"Get In Touch","email":"Info@Demomail.Com","hotline":"(00) 236 123 456 88","address":"255 Sheet, New Avanew, NY"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(27, 'Botble\\Widget\\Widgets\\CoreSimpleMenu', 'footer_sidebar', 'echo-catholic', 2, '{"id":"Botble\\\\Widget\\\\Widgets\\\\CoreSimpleMenu","name":"Most Popular","style":"2-column","items":[[{"key":"label","value":"Political Systems"},{"key":"url","value":"http:\\/\\/localhost\\/political-systems"}],[{"key":"label","value":"Media and Politics"},{"key":"url","value":"http:\\/\\/localhost\\/media-and-politics"}],[{"key":"label","value":"Elections and Campaigns"},{"key":"url","value":"http:\\/\\/localhost\\/elections-and-campaigns"}],[{"key":"label","value":"Political Ideologies"},{"key":"url","value":"http:\\/\\/localhost\\/political-ideologies"}],[{"key":"label","value":"International Relations"},{"key":"url","value":"http:\\/\\/localhost\\/international-relations"}]]}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(28, 'Botble\\Widget\\Widgets\\CoreSimpleMenu', 'footer_sidebar', 'echo-catholic', 3, '{"id":"Botble\\\\Widget\\\\Widgets\\\\CoreSimpleMenu","name":"Help","items":[[{"key":"label","value":"About"},{"key":"url","value":"about-us"}],[{"key":"label","value":"Terms of Use"},{"key":"url","value":"terms-of-use"}],[{"key":"label","value":"Advertise"},{"key":"url","value":"advertise"}],[{"key":"label","value":"Privacy Policy"},{"key":"url","value":"privacy-policy"}],[{"key":"label","value":"FAQ"},{"key":"url","value":"faq"}]]}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(29, 'NewsletterWidget', 'footer_sidebar', 'echo-catholic', 4, '{"id":"NewsletterWidget","title":"Newsletter","description":"Register now to get latest updates on promotion & coupons."}', '2025-12-24 07:30:28', '2025-12-24 07:30:28'),
	(30, 'ActionButtonsWidget', 'header_sidebar', 'echo-catholic', 0, '{"enable_dark_light_switcher_button":true,"enable_search_button":true,"enable_toggle_side_menu_button":true,"alignment":"end"}', '2025-12-24 07:30:28', '2025-12-24 07:30:28');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
