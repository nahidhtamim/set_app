-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 08:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `set`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockers`
--

CREATE TABLE `lockers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locker_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locker_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locker_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locker_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lockers`
--

INSERT INTO `lockers` (`id`, `locker_name`, `locker_size`, `locker_description`, `locker_status`, `created_at`, `updated_at`) VALUES
(1, 'Pro', '3 Feet', '<p>&nbsp;SET <strong>Locker</strong> Description</p>\r\n\r\n<p>&nbsp;</p>', 1, '2022-04-12 17:04:58', '2022-04-23 11:58:29'),
(2, 'Basic', '1 Feet', '<p>SET Locker Description</p>', 1, '2022-04-16 14:11:35', '2022-04-23 11:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_04_08_193721_create_services_table', 2),
(9, '2022_04_11_193737_create_places_table', 3),
(10, '2022_04_12_225658_create_lockers_table', 4),
(11, '2022_04_18_180815_create_sports_table', 5),
(12, '2022_04_23_181931_create_place_lockers_table', 6),
(13, '2022_04_26_181048_create_place_services_table', 7),
(14, '2022_05_24_172837_create_orders_table', 8),
(15, '2022_06_06_190500_create_online_statuses_table', 9),
(16, '2022_06_08_110632_create_notifications_table', 10),
(17, '2022_06_08_112419_create_order_payments_table', 10),
(18, '2022_06_15_184732_create_online_statuses_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_statuses`
--

CREATE TABLE `online_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `online_status` tinyint(4) NOT NULL,
  `customer_id` tinyint(4) NOT NULL,
  `read_at` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_statuses`
--

INSERT INTO `online_statuses` (`id`, `online_status`, `customer_id`, `read_at`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 0, '2022-06-15 13:49:27', '2022-06-15 13:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` tinyint(4) NOT NULL,
  `sport_id` tinyint(4) NOT NULL,
  `place_id` tinyint(4) NOT NULL,
  `service_id` tinyint(4) NOT NULL,
  `locker_id` tinyint(4) NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `sport_id`, `place_id`, `service_id`, `locker_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `billing_name`, `billing_address`, `billing_phone`, `billing_email`, `message`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 11, 'Demo Customer', 'Demo Address', '123456789123', 'demo@gmail.com', 'Demo Customer', 'Demo Address', '123456789123', 'pohuistmc@gmailpro.cf', 'ADsadas', 1, '2022-05-31 10:30:47', '2022-06-06 13:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` tinyint(4) NOT NULL,
  `order_id` tinyint(4) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `customer_id`, `order_id`, `month`, `year`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '1', '2022', '2022-06-08 13:41:05', '2022-06-08 13:41:05'),
(7, 2, 1, '2', '2022', '2022-06-08 14:22:53', '2022-06-08 14:22:53'),
(9, 2, 1, '3', '2022', '2022-06-08 14:34:41', '2022-06-08 14:34:41'),
(10, 2, 1, '6', '2022', '2022-06-08 14:46:44', '2022-06-08 14:46:44'),
(13, 2, 1, '10', '2022', '2022-06-08 14:56:10', '2022-06-08 14:56:10'),
(14, 2, 1, '12', '2022', '2022-06-08 14:58:25', '2022-06-08 14:58:25'),
(15, 2, 1, '6', '2022', '2022-06-08 14:58:49', '2022-06-08 14:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `place_name`, `place_description`, `place_status`, `created_at`, `updated_at`) VALUES
(1, 'Stuttgart', '<h1>Stuttgart</h1>\r\n\r\n<p><em><strong>Description</strong></em></p>', 1, '2022-04-11 13:57:51', '2022-04-11 13:57:51'),
(2, 'Frankfurt', '<h1>Frankfurt</h1>\r\n\r\n<p><cite><span dir=\"ltr\"><tt>Description</tt></span></cite></p>', 1, '2022-04-11 13:59:12', '2022-04-11 13:59:12'),
(3, 'Munich', '<p>Munich</p>', 1, '2022-04-16 14:12:05', '2022-04-16 14:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `place_lockers`
--

CREATE TABLE `place_lockers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_id` tinyint(4) NOT NULL,
  `service_id` tinyint(4) NOT NULL,
  `locker_id` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `place_lockers`
--

INSERT INTO `place_lockers` (`id`, `place_id`, `service_id`, `locker_id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(11, 1, 1, 2, 'SBBasic1', 'SBB1', 1, NULL, NULL),
(12, 1, 1, 2, 'SBBasic2', 'SBB2', 1, NULL, NULL),
(13, 1, 2, 1, 'SBPro1', 'SBP1', 1, NULL, NULL),
(14, 1, 2, 1, 'SBPro2', 'SBP2', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `place_services`
--

CREATE TABLE `place_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_id` tinyint(4) NOT NULL,
  `service_id` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `place_services`
--

INSERT INTO `place_services` (`id`, `place_id`, `service_id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'StuBasic', 'SB001', 1, NULL, NULL),
(2, 1, 2, 'StuDemo', 'SD002', 1, NULL, NULL),
(3, 1, 3, 'StuDummy', 'SD003', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_price` int(11) NOT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_price`, `service_image`, `short_desc`, `long_desc`, `service_status`, `created_at`, `updated_at`) VALUES
(1, 'SET Basic', 20, '1650129299.jpg', 'IT is a basic level service', '<p>IT is a basic level service</p>', 1, '2022-04-08 13:46:26', '2022-04-16 11:14:59'),
(2, 'Demo', 50, '1650130390.jpg', 'IT is a demo level service', '<p><em>Demo</em><strong> Description</strong></p>', 1, '2022-04-08 14:05:45', '2022-04-16 11:33:10'),
(3, 'Dummy', 50, '1650130411.jpg', 'IT is a Dummy level service', '<p><strong>SET Service Description</strong></p>', 1, '2022-04-11 12:45:51', '2022-04-16 11:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `sport_name`, `sport_description`, `sport_status`, `created_at`, `updated_at`) VALUES
(1, 'Football', '<p><strong>Football</strong></p>', 1, '2022-04-18 12:16:34', '2022-04-18 12:16:34'),
(2, 'Boxing', '<p><strong>Boxing</strong></p>', 1, '2022-04-18 12:16:52', '2022-04-18 12:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `online_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_as`, `image`, `address`, `phone`, `status`, `online_status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2022-06-01 17:59:51', '$2y$10$.E4aCVu3xipgZHEGMx.FiuBKUUG9xy1dwe8tuLaq6laNgIULuS/rW', 'NUjEViqYNyZLoUKy6iGvp9EVOwj9lTBPGQ329EWlIyDtfDtHfj0Nesy5u6BA', 1, 'avatar.png', '', 0, 1, 0, '2022-04-05 12:00:43', '2022-04-05 12:00:43'),
(2, 'customer', 'customer@gmail.com', '2022-06-16 18:03:40', '$2y$10$rwwJGlj985yT6peq1vVQr.WuzyKAQ02yMyKnSwZWdnCOPyoOQ0joe', 'GgxcrcYZmzoWGfpj28z4yEpwqf7M6NjHsrqb5DOgEfuVPEI5aVinR6Ay1W2B', 0, '1654372135.jpg', 'Germany', 123456789, 1, 1, '2022-04-05 12:10:20', '2022-06-07 11:40:15'),
(3, 'nhtamim', 'nahidhtamim@gmail.com', '2022-06-17 12:02:24', '$2y$10$NK5iVXQzYbE2pA06EeFSwuj.F32v/bcXTA48lk3Tgxp7GTynBSUS2', NULL, 0, 'avatar.png', 'Dhaka, Bangladesh', 12345678, 1, 0, '2022-06-17 12:01:44', '2022-06-17 12:02:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lockers`
--
ALTER TABLE `lockers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_statuses`
--
ALTER TABLE `online_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_lockers`
--
ALTER TABLE `place_lockers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_services`
--
ALTER TABLE `place_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `place_services_code_unique` (`code`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockers`
--
ALTER TABLE `lockers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_statuses`
--
ALTER TABLE `online_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `place_lockers`
--
ALTER TABLE `place_lockers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `place_services`
--
ALTER TABLE `place_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
