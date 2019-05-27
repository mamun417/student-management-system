-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for school_management_system
CREATE DATABASE IF NOT EXISTS `school_management_system` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `school_management_system`;

-- Dumping structure for table school_management_system.attendances
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint(20) unsigned NOT NULL,
  `class_id` bigint(20) unsigned NOT NULL,
  `student_id` bigint(20) unsigned NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.attendances: ~4 rows (approximately)
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
INSERT INTO `attendances` (`id`, `teacher_id`, `class_id`, `student_id`, `attendance_date`, `attendance_status`, `created_at`, `updated_at`) VALUES
	(2, 3, 3, 6, '2019-05-25', 1, '2019-05-25 09:03:36', '2019-05-25 09:03:36'),
	(3, 3, 3, 7, '2019-05-26', 0, '2019-05-25 09:35:25', '2019-05-25 17:44:46'),
	(5, 2, 2, 8, '2019-05-26', 1, '2019-05-25 15:24:09', '2019-05-26 09:34:38'),
	(6, 2, 2, 8, '2019-05-10', 1, '2019-05-26 09:33:27', '2019-05-26 09:33:27'),
	(7, 5, 2, 8, '2019-05-23', 1, '2019-05-27 08:57:04', '2019-05-27 08:57:04'),
	(8, 5, 3, 3, '2019-05-29', 0, '2019-05-27 09:25:06', '2019-05-27 09:25:06'),
	(9, 5, 2, 7, '2019-05-22', 1, '2019-05-27 09:36:38', '2019-05-27 09:36:38'),
	(10, 5, 3, 4, '2019-05-14', 1, '2019-05-27 10:44:56', '2019-05-27 10:44:56'),
	(11, 5, 2, 7, '2019-05-28', 0, '2019-05-27 10:46:37', '2019-05-27 10:46:37');
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;

-- Dumping structure for table school_management_system.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.classes: ~5 rows (approximately)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
	(1, 'One', 'Class one note goes here.....', '2019-05-22 05:51:59', '2019-05-22 05:51:59'),
	(2, 'Two', NULL, '2019-05-22 05:52:06', '2019-05-22 05:52:06'),
	(3, 'Three', NULL, '2019-05-22 05:52:12', '2019-05-22 05:52:12'),
	(4, 'Four', NULL, '2019-05-25 13:44:44', '2019-05-25 15:23:27'),
	(5, 'Five', NULL, '2019-05-25 13:44:48', '2019-05-25 15:23:32');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Dumping structure for table school_management_system.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_05_17_175755_create_teachers_table', 1),
	(6, '2019_05_21_135119_create_students_table', 1),
	(8, '2019_05_17_045546_create_classes_table', 2),
	(9, '2019_05_21_064049_create_parents_table', 3),
	(10, '2019_05_24_095454_create_attendances_table', 4),
	(11, '2019_05_26_120112_create_permission_tables', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table school_management_system.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table school_management_system.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.model_has_roles: ~19 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 1),
	(2, 'App\\User', 4),
	(2, 'App\\User', 14),
	(2, 'App\\User', 15),
	(2, 'App\\User', 17),
	(2, 'App\\User', 18),
	(2, 'App\\User', 19),
	(2, 'App\\User', 29),
	(2, 'App\\User', 30),
	(2, 'App\\User', 32),
	(5, 'App\\User', 9),
	(5, 'App\\User', 21),
	(5, 'App\\User', 37),
	(6, 'App\\User', 6),
	(6, 'App\\User', 12),
	(6, 'App\\User', 22),
	(6, 'App\\User', 24),
	(6, 'App\\User', 25),
	(6, 'App\\User', 26);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table school_management_system.parents
CREATE TABLE IF NOT EXISTS `parents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parents_phone_unique` (`phone`),
  KEY `parents_user_id_index` (`user_id`),
  CONSTRAINT `parents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.parents: ~9 rows (approximately)
/*!40000 ALTER TABLE `parents` DISABLE KEYS */;
INSERT INTO `parents` (`id`, `user_id`, `phone`, `age`, `gender`, `address`, `created_at`, `updated_at`) VALUES
	(1, 4, '01750800764', 45, 'male', 'pangsha, rajbari', '2019-05-22 06:16:16', '2019-05-22 06:16:16'),
	(3, 14, '12345689745', 65, 'male', 'pangsha, rajbari', '2019-05-22 14:13:51', '2019-05-22 14:13:51'),
	(4, 15, '546345634536', 45, 'female', 'pangsha, rajbari', '2019-05-22 14:14:59', '2019-05-22 14:14:59'),
	(6, 17, '576786578637', 26, 'female', NULL, '2019-05-22 14:15:45', '2019-05-22 14:15:45'),
	(7, 18, '5763763736', 76837, 'male', '7866786378678', '2019-05-22 14:16:11', '2019-05-22 14:16:11'),
	(8, 19, '786578657867', 18, 'female', '678678687678', '2019-05-22 14:16:36', '2019-05-22 14:16:36'),
	(12, 29, '5435', NULL, NULL, NULL, '2019-05-25 10:31:36', '2019-05-25 10:31:36'),
	(13, 30, '6456', NULL, NULL, NULL, '2019-05-25 10:35:16', '2019-05-25 10:35:16'),
	(15, 32, '0284298743265464', NULL, NULL, NULL, '2019-05-25 10:38:53', '2019-05-25 10:38:53');
/*!40000 ALTER TABLE `parents` ENABLE KEYS */;

-- Dumping structure for table school_management_system.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table school_management_system.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.permissions: ~4 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'attendance-list', 'web', '2019-05-26 13:31:57', '2019-05-26 14:00:18'),
	(3, 'attendance-create', 'web', '2019-05-26 14:29:43', '2019-05-26 14:32:40'),
	(4, 'attendance-edit', 'web', '2019-05-26 14:31:53', '2019-05-26 14:32:32'),
	(5, 'attendance-delete', 'web', '2019-05-26 14:33:11', '2019-05-26 14:33:11');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table school_management_system.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2019-05-27 12:34:50', '2019-05-27 12:34:52'),
	(2, 'parent', 'web', '2019-05-26 15:06:05', '2019-05-26 15:06:05'),
	(5, 'teacher', 'web', '2019-05-26 16:39:34', '2019-05-26 16:40:03'),
	(6, 'student', 'web', '2019-05-26 16:39:56', '2019-05-26 16:39:56');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table school_management_system.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.role_has_permissions: ~2 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 5),
	(1, 6),
	(3, 5),
	(4, 5),
	(5, 5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table school_management_system.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `parent_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `roll_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_roll_number_unique` (`roll_number`),
  UNIQUE KEY `students_phone_unique` (`phone`),
  KEY `students_user_id_index` (`user_id`),
  CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.students: ~6 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `user_id`, `parent_id`, `class_id`, `roll_number`, `phone`, `parent_phone`, `age`, `gender`, `date_of_birth`, `address`, `created_at`, `updated_at`) VALUES
	(1, 6, 1, 2, '2323', '01750800764', '75675', '18', 'male', '1995-06-29', 'pangsha, rajbari', '2019-05-22 06:58:46', '2019-05-22 14:09:19'),
	(3, 12, 8, 3, '7675', '02842987432', '75675', '45', 'male', '1989-05-24', NULL, '2019-05-22 11:07:47', '2019-05-23 14:27:12'),
	(4, 22, 3, 3, '553454', '4535', '75675', '50', 'male', NULL, NULL, '2019-05-25 08:16:03', '2019-05-25 08:16:03'),
	(6, 24, 8, 3, '5453', '6575765', '54353', '45', 'male', NULL, NULL, '2019-05-25 08:18:13', '2019-05-25 08:18:13'),
	(7, 25, 8, 2, '76868', '67757576', '654657', '50', 'female', '1979-05-16', 'pangsha, rajbari', '2019-05-25 08:19:09', '2019-05-25 08:19:09'),
	(8, 26, 15, 2, '12', '756867', '53454356', '54', 'male', NULL, NULL, '2019-05-25 08:20:25', '2019-05-27 09:12:36');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table school_management_system.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_phone_unique` (`phone`),
  KEY `teachers_user_id_index` (`user_id`),
  CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.teachers: ~3 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`id`, `user_id`, `phone`, `subject`, `address`, `created_at`, `updated_at`) VALUES
	(2, 9, '4535', 'test', 'Masaripur', '2019-05-22 07:06:26', '2019-05-22 07:07:28'),
	(3, 21, '5435', 'test', 'pangsha, rajbari', '2019-05-24 13:48:34', '2019-05-24 13:48:34'),
	(5, 37, '553453', NULL, NULL, '2019-05-26 17:55:59', '2019-05-26 17:55:59');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- Dumping structure for table school_management_system.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table school_management_system.users: ~19 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@test.com', NULL, '$2y$10$FHdepjn482Lp6Wn7foNzo.WqSkhWxdGVWfxbIITH5ua.ksLYwoRNm', NULL, '2019-05-27 12:36:29', '2019-05-27 12:36:30'),
	(4, 'Abdullah al mamun', 'aalmamun417@gmail.com', NULL, '$2y$10$FHdepjn482Lp6Wn7foNzo.WqSkhWxdGVWfxbIITH5ua.ksLYwoRNm', 'YAM9WCzvUCGFHlZDJRVaOEcLhVZdzVl0PsUPwAAoWVSZmFw2k9z0l46gY6sx', '2019-05-22 06:16:16', '2019-05-26 10:56:54'),
	(6, 'Khairul islam', 'dfsn417@gmail.com', NULL, '$2y$10$CFCJVZAFav2w4UM.i7pCruntQ8w2OwiFLgwO8Kh0kueutxhUBEOrW', NULL, '2019-05-22 06:58:46', '2019-05-22 11:01:05'),
	(9, 'Khairul islam', 'afdg@gmail.com', NULL, '$2y$10$r12fheKgPUHfbNrJ13rxjegcMzGSvuXaWDK83pPhIuU/YvvfOfaEW', NULL, '2019-05-22 07:06:26', '2019-05-22 07:06:26'),
	(12, 'test', 'hhg417@gmail.com', NULL, '$2y$10$kyr0Ji90NFRAM.VFHeFnbeLksVnLGKytyLZqz9jdIfWx9iFrnSVC6', NULL, '2019-05-22 11:07:47', '2019-05-22 11:07:47'),
	(14, 'lal babu', 'afdgdfbh7@gmail.com', NULL, '$2y$10$sBDjBwQSWYXijzy3SfExtu4wiJjapnfZ19.Tky4S4nIOKketlqRk.', NULL, '2019-05-22 14:13:51', '2019-05-22 14:13:51'),
	(15, 'sobus', 'ffffffun417@gmail.com', NULL, '$2y$10$EeJL2kxxOUVDE2rEnMSxeu.2dypMd0nnhWWEVqg0s5gSbT7svg1de', NULL, '2019-05-22 14:14:59', '2019-05-26 17:57:58'),
	(17, 'Shoel rana', 'fujtfyjfje@gmail.com', NULL, '$2y$10$rFaEttWDWicPdnh9HvOcVOrEc9felpdLEt3fOmPpDhyq/8j9TJMwy', NULL, '2019-05-22 14:15:44', '2019-05-22 16:35:31'),
	(18, 'Kamal', 'fsefrerfwf@gmail.com', NULL, '$2y$10$1TB7hp9ik/57mts/50D8hOjoYIdEPy5FESkPU62bRIHHL9/DlULXm', NULL, '2019-05-22 14:16:11', '2019-05-22 16:35:21'),
	(19, 'Jamal', 'rewr417@gmail.com', NULL, '$2y$10$rIL3N7oNgFmcDMXFEVA4geBRk8wVrR0d6TSn44vR04/lIN1EkkpBu', NULL, '2019-05-22 14:16:36', '2019-05-26 17:57:49'),
	(21, 'Abdullah al mamun', 'agdgfdn417@gmail.com', NULL, '$2y$10$E0uEKXx1v60H0J9kxfEkQePXBA/FSpX.iC05fvxrf2EGq7gYqFnOq', NULL, '2019-05-24 13:48:34', '2019-05-24 13:48:34'),
	(22, 'Saiful islam', 'saiful@gmail.com', NULL, '$2y$10$9fScYhrZ5JJnjOH/XHG92e35eJHJZRwn5aup87JnWAEptBO.L5iCS', NULL, '2019-05-25 08:16:03', '2019-05-25 08:16:03'),
	(24, 'Jamal', 'jamal@gmail.com', NULL, '$2y$10$pPXY0gzRhC3ASWuVWE.cRebl8RrzjeK.QZSLOCxsT5lYnd4ztI0P.', NULL, '2019-05-25 08:18:13', '2019-05-25 08:18:13'),
	(25, 'Student', 'student@test.com', NULL, '$2y$10$HxEtHL16SFxAUFXEaVZ4X.T2kPmyJyDkQUXgzp7ienD9bKEVeoq4W', NULL, '2019-05-25 08:19:09', '2019-05-27 09:29:18'),
	(26, 'Hasan', 'hasan@gmail.com', NULL, '$2y$10$mQBtR9zew9CXywTGctBRjuxq5UAShoRP9Bb9Nskk5igyPUidcLvCS', NULL, '2019-05-25 08:20:25', '2019-05-25 08:20:25'),
	(29, 'Khairul islam', '5543ul@gmail.com', NULL, '$2y$10$i7yQhLgPdemJJSMAOHEQgONbzlnyQF9BX02e5rPpVxyoXmXntmpn2', NULL, '2019-05-25 10:31:36', '2019-05-25 10:31:36'),
	(30, 'yrty', 'yrytr@gmail.com', NULL, '$2y$10$vFROhjxJ/6lCt7pIGI7nV.GGO1etu9p4pFdnAqwg8tgNRrpHdk4/a', NULL, '2019-05-25 10:35:16', '2019-05-25 10:35:16'),
	(32, 'parent', 'parent@test.com', NULL, '$2y$10$BnGIV/Uch8kkIozGxHwd1O9GTPrMKy0vv.0qTSuAdPIey37i87j5S', NULL, '2019-05-25 10:38:53', '2019-05-27 09:02:06'),
	(37, 'Teacher', 'teacher@test.com', NULL, '$2y$10$.Dnynm6FpBF.8C43LbUGs.gKOeM99.Ijo7IhK7CvvOZifxBOVOg4u', NULL, '2019-05-26 17:55:59', '2019-05-27 09:02:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
