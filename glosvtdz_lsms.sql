-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2019 at 09:32 AM
-- Server version: 10.1.40-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glosvtdz_lsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `teacher_id`, `class_id`, `student_id`, `attendance_date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(1, 37, 1, 43, '2019-05-28', 1, '2019-05-28 15:06:26', '2019-05-28 15:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
(1, 'One', 'Class one note goes here.....', '2019-05-22 09:51:59', '2019-05-22 09:51:59'),
(2, 'Two', NULL, '2019-05-22 09:52:06', '2019-05-22 09:52:06'),
(3, 'Three', NULL, '2019-05-22 09:52:12', '2019-05-22 09:52:12'),
(4, 'Four', NULL, '2019-05-25 17:44:44', '2019-05-25 19:23:27'),
(5, 'Five', NULL, '2019-05-25 17:44:48', '2019-05-25 19:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_05_17_175755_create_teachers_table', 1),
(6, '2019_05_21_135119_create_students_table', 1),
(8, '2019_05_17_045546_create_classes_table', 2),
(9, '2019_05_21_064049_create_parents_table', 3),
(10, '2019_05_24_095454_create_attendances_table', 4),
(11, '2019_05_26_120112_create_permission_tables', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 37),
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
(6, 'App\\User', 43);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `user_id`, `phone`, `age`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(1, 4, '01750800764', 45, 'male', 'pangsha, rajbari', '2019-05-22 10:16:16', '2019-05-22 10:16:16'),
(3, 14, '12345689745', 65, 'male', 'pangsha, rajbari', '2019-05-22 18:13:51', '2019-05-22 18:13:51'),
(4, 15, '546345634536', 45, 'female', 'pangsha, rajbari', '2019-05-22 18:14:59', '2019-05-22 18:14:59'),
(6, 17, '576786578637', 26, 'female', NULL, '2019-05-22 18:15:45', '2019-05-22 18:15:45'),
(7, 18, '5763763736', 76837, 'male', '7866786378678', '2019-05-22 18:16:11', '2019-05-22 18:16:11'),
(8, 19, '786578657867', 18, 'female', '678678687678', '2019-05-22 18:16:36', '2019-05-22 18:16:36'),
(12, 29, '5435', NULL, NULL, NULL, '2019-05-25 14:31:36', '2019-05-25 14:31:36'),
(13, 30, '6456', NULL, NULL, NULL, '2019-05-25 14:35:16', '2019-05-25 14:35:16'),
(15, 32, '0284298743265464', NULL, NULL, NULL, '2019-05-25 14:38:53', '2019-05-25 14:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aalmamun417@gmail.com', '$2y$10$kUoLqikPoFUvsk44xfA.M.VxPUGBb6jKk5o7404LUlMjGMHiVwudC', '2019-05-28 17:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'attendance-list', 'web', '2019-05-26 17:31:57', '2019-05-26 18:00:18'),
(3, 'attendance-create', 'web', '2019-05-26 18:29:43', '2019-05-26 18:32:40'),
(4, 'attendance-edit', 'web', '2019-05-26 18:31:53', '2019-05-26 18:32:32'),
(5, 'attendance-delete', 'web', '2019-05-26 18:33:11', '2019-05-26 18:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-05-27 16:34:50', '2019-05-27 16:34:52'),
(2, 'parent', 'web', '2019-05-26 19:06:05', '2019-05-26 19:06:05'),
(5, 'teacher', 'web', '2019-05-26 20:39:34', '2019-05-26 20:40:03'),
(6, 'student', 'web', '2019-05-26 20:39:56', '2019-05-26 20:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 5),
(1, 6),
(3, 5),
(4, 5),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `parent_id`, `class_id`, `roll_number`, `phone`, `parent_phone`, `age`, `gender`, `date_of_birth`, `address`, `created_at`, `updated_at`) VALUES
(10, 43, 32, 1, '2323', '645', '65464', '65', 'female', NULL, NULL, '2019-05-28 13:54:40', '2019-05-28 13:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `phone`, `subject`, `address`, `created_at`, `updated_at`) VALUES
(2, 9, '4535', 'test', 'Masaripur', '2019-05-22 11:06:26', '2019-05-22 11:07:28'),
(3, 21, '5435', 'test', 'pangsha, rajbari', '2019-05-24 17:48:34', '2019-05-24 17:48:34'),
(5, 37, '553453', NULL, NULL, '2019-05-26 21:55:59', '2019-05-26 21:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', NULL, '$2y$10$lN7k6l/qicLjIuBIhURH6eU.kdl7LYnw8Np19oUzuFa.m9CVvWMR6', NULL, '2019-05-27 16:36:29', '2019-05-28 15:57:30'),
(4, 'Abdullah al mamun', 'aalmamun417@gmail.com', NULL, '$2y$10$FHdepjn482Lp6Wn7foNzo.WqSkhWxdGVWfxbIITH5ua.ksLYwoRNm', '5TIEjK2aRjYJCBfbYq4je4Nx0bzuAvBIXq2i62E4ojLGiT0xZCD94ZQ9Vmvp', '2019-05-22 10:16:16', '2019-05-26 14:56:54'),
(9, 'Khairul islam', 'afdg@gmail.com', NULL, '$2y$10$r12fheKgPUHfbNrJ13rxjegcMzGSvuXaWDK83pPhIuU/YvvfOfaEW', NULL, '2019-05-22 11:06:26', '2019-05-22 11:06:26'),
(14, 'lal babu', 'afdgdfbh7@gmail.com', NULL, '$2y$10$sBDjBwQSWYXijzy3SfExtu4wiJjapnfZ19.Tky4S4nIOKketlqRk.', NULL, '2019-05-22 18:13:51', '2019-05-22 18:13:51'),
(15, 'sobus', 'ffffffun417@gmail.com', NULL, '$2y$10$EeJL2kxxOUVDE2rEnMSxeu.2dypMd0nnhWWEVqg0s5gSbT7svg1de', NULL, '2019-05-22 18:14:59', '2019-05-26 21:57:58'),
(17, 'Shoel rana', 'fujtfyjfje@gmail.com', NULL, '$2y$10$rFaEttWDWicPdnh9HvOcVOrEc9felpdLEt3fOmPpDhyq/8j9TJMwy', NULL, '2019-05-22 18:15:44', '2019-05-22 20:35:31'),
(18, 'Kamal', 'fsefrerfwf@gmail.com', NULL, '$2y$10$1TB7hp9ik/57mts/50D8hOjoYIdEPy5FESkPU62bRIHHL9/DlULXm', NULL, '2019-05-22 18:16:11', '2019-05-22 20:35:21'),
(19, 'Jamal', 'rewr417@gmail.com', NULL, '$2y$10$rIL3N7oNgFmcDMXFEVA4geBRk8wVrR0d6TSn44vR04/lIN1EkkpBu', NULL, '2019-05-22 18:16:36', '2019-05-26 21:57:49'),
(21, 'Abdullah al mamun', 'agdgfdn417@gmail.com', NULL, '$2y$10$E0uEKXx1v60H0J9kxfEkQePXBA/FSpX.iC05fvxrf2EGq7gYqFnOq', NULL, '2019-05-24 17:48:34', '2019-05-24 17:48:34'),
(29, 'Khairul islam', '5543ul@gmail.com', NULL, '$2y$10$i7yQhLgPdemJJSMAOHEQgONbzlnyQF9BX02e5rPpVxyoXmXntmpn2', NULL, '2019-05-25 14:31:36', '2019-05-25 14:31:36'),
(30, 'yrty', 'yrytr@gmail.com', NULL, '$2y$10$vFROhjxJ/6lCt7pIGI7nV.GGO1etu9p4pFdnAqwg8tgNRrpHdk4/a', NULL, '2019-05-25 14:35:16', '2019-05-25 14:35:16'),
(32, 'parent', 'parent@test.com', NULL, '$2y$10$vDGsujDa/.jtrqfbGs6xJu3Y0wExsxUO2Pg7iVucpejjzidRFf/SO', NULL, '2019-05-25 14:38:53', '2019-05-28 16:00:48'),
(37, 'Teacher', 'teacher@test.com', NULL, '$2y$10$NajKpYTWdfswCUnc65XrXurvr/w5CjFyqYgpVe.cm9tL1c1Kvf/ce', NULL, '2019-05-26 21:55:59', '2019-05-28 16:00:15'),
(42, 'Abdullah al mamun', '645tyrn@test.com', NULL, '$2y$10$aV7uqIsPYlei0RtyEUJfauLHiqZftqFpHZDbiaeesoTwh7RkBGjp2', NULL, '2019-05-28 13:54:03', '2019-05-28 13:54:03'),
(43, 'Abdullah al mamun', 'student@test.com', NULL, '$2y$10$RikbtGDZi9mkKJyXxTRpd.EM7z/LkGdtSihNhcpxNePV4uAJP3vla', NULL, '2019-05-28 13:54:40', '2019-05-28 16:02:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parents_phone_unique` (`phone`),
  ADD KEY `parents_user_id_index` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_roll_number_unique` (`roll_number`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`),
  ADD KEY `students_user_id_index` (`user_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_phone_unique` (`phone`),
  ADD KEY `teachers_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
