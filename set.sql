-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 09:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.11

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
(1, 'Pro', '3 Feet', '<p>&nbsp;SET <strong>Locker</strong> Description</p>\r\n\r\n<p>&nbsp;</p>', 1, '2022-04-12 17:04:58', '2022-06-09 00:05:13');

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
(14, '2022_05_24_172837_create_orders_table', 7),
(15, '2022_06_06_190500_create_online_statuses_table', 8),
(16, '2022_06_08_110632_create_notifications_table', 8),
(17, '2022_06_08_112419_create_order_payments_table', 8),
(18, '2022_06_15_184732_create_online_statuses_table', 9);

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
(1, 1, 2, 0, '2022-06-16 03:22:46', '2022-06-16 03:22:46'),
(2, 0, 2, 0, '2022-06-16 03:23:13', '2022-06-16 03:23:13'),
(3, 1, 2, 0, '2022-06-16 03:23:19', '2022-06-16 03:23:19'),
(4, 0, 2, 1, '2022-06-16 03:23:25', '2022-06-16 03:23:51'),
(5, 1, 2, 0, '2022-07-25 05:29:36', '2022-07-25 05:29:36'),
(6, 0, 2, 0, '2022-07-25 05:29:52', '2022-07-25 05:29:52'),
(7, 1, 2, 0, '2022-07-25 05:34:31', '2022-07-25 05:34:31'),
(8, 0, 2, 0, '2022-07-25 05:34:34', '2022-07-25 05:34:34'),
(9, 1, 2, 0, '2022-07-26 00:10:39', '2022-07-26 00:10:39'),
(10, 0, 2, 0, '2022-07-26 00:57:51', '2022-07-26 00:57:51');

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
(1, 2, 1, 1, 1, 1, 'Demo Customer', 'Demo Address', '12345678', 'customer@gmail.com', 'Demo Customer', 'Demo Address', '12345678', 'demo@gmail.com', 'AAAAAA', 1, '2022-06-02 05:34:22', '2022-06-08 01:16:51');

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
(1, 2, 1, '6', '2022', '2022-06-08 22:10:45', '2022-06-08 22:10:45');

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
(2, 'Frankfurt', '<h1>Frankfurt</h1>\r\n\r\n<p><cite><span dir=\"ltr\"><tt>Description</tt></span></cite></p>', 1, '2022-04-11 13:59:12', '2022-06-09 00:09:41'),
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
(1, 1, 1, 1, 'Stuttgrart - Basic Locker 01', 'SBL001', 1, NULL, NULL),
(2, 1, 2, 1, 'Stuttgrart - Pro Locker 01', 'SPL001', 1, NULL, '2022-06-09 00:06:11');

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
(1, 1, 1, 'Stuttgrart - Basic 01', 'SB001', 1, NULL, NULL),
(2, 1, 2, 'Stuttgrart - Demo 01', 'SD001', 1, NULL, '2022-06-09 00:20:35'),
(3, 1, 3, 'Stuttgrart - Dummy 01', 'SDM001', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name_ger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_ger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_ger` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_name_ger`, `service_price`, `service_image`, `short_desc`, `short_desc_ger`, `long_desc`, `long_desc_ger`, `service_status`, `created_at`, `updated_at`) VALUES
(1, 'SET Basic', 'SET Basic', '12.99', '1663827227.jpg', 'Basic Services', 'Grundversorgung', '<p>- For the health<br />\r\n- Conscious recreational athlete<br />\r\n- Personal locker<br />\r\n- Includes regular cleaning<br />\r\n- 2x tops<br />\r\n- 2x shorts / sports pants<br />\r\n- 4x towels<br />\r\n- up to 2 pickups per week<br />\r\n- &euro;12.99 / month</p>', '<p>- F&uuml;r den gesundheitsbewussten Freizeitsportler<br />\r\n- Pers&ouml;nliches Schlie&szlig;fach<br />\r\n- Regelm&auml;&szlig;ige Reinigung beinhaltet<br />\r\n- 2x Oberteile<br />\r\n- 2x Shorts / Sporthosen<br />\r\n- 4x Handt&uuml;cher<br />\r\n- Bis zu 2 Abholungen pro Woche<br />\r\n- 12,99&euro; / Monat</p>', 1, '2022-04-08 13:46:26', '2022-09-22 00:13:47'),
(2, 'SET Ambition', 'SET Ambition', '17.99', '1663827539.jpg', 'Ambition Packages', 'Ambition-Pakete', '<p>- For the ambitious athlete<br />\r\n- Personal locker<br />\r\n- Regular cleaning included<br />\r\n- 2x tops<br />\r\n- 2x shorts / sports pants<br />\r\n- 4x towels<br />\r\n- 2x laundry net for socks and underwear<br />\r\n- Up to 4 pickups per week<br />\r\n- &euro;17.99 / month</p>', '<p>- F&uuml;r den Ambitionierten Sportler<br />\r\n- Pers&ouml;nliches Schlie&szlig;fach<br />\r\n- Regelm&auml;&szlig;ige Reinigung beinhaltet<br />\r\n- 2x Oberteile<br />\r\n- 2x Shorts / Sporthosen<br />\r\n- 4x Handt&uuml;cher<br />\r\n- 2x W&auml;schenetz f&uuml;r Socken und Unterw&auml;sche<br />\r\n- Bis zu 4 Abholungen pro Woche<br />\r\n- 17,99&euro; / Monat</p>', 1, '2022-04-08 14:05:45', '2022-09-22 00:18:59'),
(3, 'Set Pro', 'Set Pro', '24.99', '1663829942.jpg', 'Pro Packages', 'Pro-Pakete', '<p>- For the professional athlete<br />\r\n- Large personal locker<br />\r\n- Regular cleaning included<br />\r\n- 2x tops<br />\r\n- 2x shorts / sports pants<br />\r\n- 4x towels<br />\r\n- 2x laundry net for socks and underwear<br />\r\n- Up to 6 pickups per week<br />\r\n- 24.99&euro; / month</p>', '<p>- F&uuml;r den professionellen Sportler<br />\r\n- Gro&szlig;es pers&ouml;nliches Schlie&szlig;fach<br />\r\n- Regelm&auml;&szlig;ige Reinigung beinhaltet<br />\r\n- 2x Oberteile<br />\r\n- 2x Shorts / Sporthosen<br />\r\n- 4x Handt&uuml;cher<br />\r\n- 2x W&auml;schenetz f&uuml;r Socken und Unterw&auml;sche<br />\r\n- Bis zu 6 Abholungen pro Woche<br />\r\n- 24,99&euro; / Monat</p>', 1, '2022-04-11 12:45:51', '2022-09-22 00:59:02'),
(6, 'casd', 'az', '25.00', '1663831542.jpg', 'asdasd', 'asdas', '<p>SET Service Long Descasdsadription</p>', '<p>SET Lange Beschreibung des asdasienstes</p>', 1, '2022-09-22 01:25:42', '2022-09-22 01:25:42'),
(7, 'asd', 'asdasd', '23.123', '1663832731.jpg', 'dasdasd', 'sdas', '<p>SET Service Long Descriasdasdasdption</p>', '<p>SET Lange Beschreibung dasdasdases Dienstes</p>', 1, '2022-09-22 01:41:25', '2022-09-22 01:45:31');

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
(2, 'Boxing', '<p><strong>Boxing</strong></p>', 1, '2022-04-18 12:16:52', '2022-06-09 00:24:08');

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
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `online_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_as`, `image`, `address`, `phone`, `status`, `online_status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2022-09-14 11:48:10', '$2y$10$.E4aCVu3xipgZHEGMx.FiuBKUUG9xy1dwe8tuLaq6laNgIULuS/rW', NULL, 1, 'avatar.png', 'Germany', '096010989804', 1, 0, '2022-04-05 12:00:43', '2022-06-09 00:56:32'),
(2, 'customer', 'customer@gmail.com', '2022-07-20 11:21:43', '$2y$10$rwwJGlj985yT6peq1vVQr.WuzyKAQ02yMyKnSwZWdnCOPyoOQ0joe', 'cX9G9inFk5R0fPWfI3Rk8o411jLFMFFKIJxZM0x0fzkuQp2d0WUuol2sYHSN', 0, '1654168798.png', 'Germany', '123456789', 1, 0, '2022-04-05 12:10:20', '2022-07-26 00:57:51');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `place_services`
--
ALTER TABLE `place_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
