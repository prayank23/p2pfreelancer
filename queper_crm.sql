-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 07:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queper_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@queper.com', '$2y$10$.B1r.XniYAsuNNfDq1tez.2DXBVJdbufZhoqc6dRBrJ1rR/rF5yJm', NULL, '2019-11-27 02:37:29', '2019-11-27 04:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_queries`
--

CREATE TABLE `admin_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_queries`
--

INSERT INTO `admin_queries` (`id`, `user_id`, `query`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'hello man', 'pending', '2019-11-26 04:22:57', '2019-11-26 04:22:57'),
(3, 1, 'hello man', 'pending', '2019-11-26 04:22:57', '2019-11-26 04:22:57'),
(4, 1, 'I am looking for laravel developer', 'pending', '2019-11-26 04:25:25', '2019-11-26 23:59:27'),
(6, 5, 'testing once more', 'pending', '2019-11-27 05:01:34', '2019-11-27 05:01:34'),
(7, 6, 'hello its testing', 'pending', '2019-12-05 03:07:32', '2019-12-05 03:07:32'),
(8, 7, 'testing again', 'pending', '2019-12-05 03:12:20', '2019-12-05 03:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `sender`, `reciever`, `created_at`, `updated_at`) VALUES
(7, 1, 5, '2019-12-07 04:53:52', '2019-12-07 04:53:52'),
(8, 5, 1, '2019-12-07 05:22:11', '2019-12-07 05:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `gig_categories`
--

CREATE TABLE `gig_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gig_categories`
--

INSERT INTO `gig_categories` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '0', 'Graphics & Design', '2019-11-27 06:22:35', '2019-11-27 07:01:20'),
(2, '1', 'Logo Design', '2019-11-27 06:25:50', '2019-11-27 06:25:50'),
(3, '1', 'Game Design', '2019-11-27 06:26:19', '2019-11-27 06:26:19'),
(4, '0', 'Digital Marketing', '2019-11-27 06:26:39', '2019-11-27 06:26:39'),
(5, '4', 'SEO', '2019-11-27 06:26:56', '2019-11-27 06:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_id`, `reciever_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(12, 7, 1, 5, 'its my first message to hamza', 0, '2019-12-07 04:53:52', '2019-12-07 04:53:52'),
(13, 7, 5, 1, 'reqlly?', 0, '2019-12-07 04:54:07', '2019-12-07 04:54:07'),
(14, 7, 5, 1, 'oh that\'s great', 0, '2019-12-07 04:55:03', '2019-12-07 04:55:03'),
(15, 7, 1, 5, 'yes', 0, '2019-12-07 04:55:39', '2019-12-07 04:55:39'),
(16, 7, 5, 1, 'what?', 0, '2019-12-07 04:56:07', '2019-12-07 04:56:07'),
(17, 7, 1, 5, 'is it good now?', 0, '2019-12-07 04:56:18', '2019-12-07 04:56:18'),
(18, 7, 5, 1, 'I think , its working for single chat now', 0, '2019-12-07 04:56:36', '2019-12-07 04:56:36'),
(19, 7, 1, 5, 'Yeah, you are right', 0, '2019-12-07 04:56:54', '2019-12-07 04:56:54'),
(20, 7, 5, 1, 'Hello once again', 0, '2019-12-07 04:57:40', '2019-12-07 04:57:40'),
(21, 7, 1, 5, 'yes, m still here', 0, '2019-12-07 04:57:55', '2019-12-07 04:57:55'),
(22, 7, 5, 1, 'hello sir', 0, '2019-12-07 05:07:26', '2019-12-07 05:07:26'),
(23, 7, 1, 5, 'is scroll working?', 0, '2019-12-07 05:07:49', '2019-12-07 05:07:49'),
(24, 7, 5, 1, 'No, not yet', 0, '2019-12-07 05:08:00', '2019-12-07 05:08:00'),
(25, 7, 1, 5, 'hello again?', 0, '2019-12-07 05:08:55', '2019-12-07 05:08:55'),
(26, 7, 5, 1, 'yes', 0, '2019-12-07 05:09:33', '2019-12-07 05:09:33'),
(27, 7, 1, 5, 'not working still?', 0, '2019-12-07 05:09:47', '2019-12-07 05:09:47'),
(28, 7, 5, 1, 'really?', 0, '2019-12-07 05:10:03', '2019-12-07 05:10:03'),
(29, 7, 5, 1, '?', 0, '2019-12-07 05:12:02', '2019-12-07 05:12:02'),
(30, 7, 5, 1, 'now?', 0, '2019-12-07 05:15:22', '2019-12-07 05:15:22'),
(31, 7, 1, 5, 'what?', 0, '2019-12-07 05:15:34', '2019-12-07 05:15:34'),
(32, 7, 5, 1, '?', 0, '2019-12-07 05:15:40', '2019-12-07 05:15:40'),
(33, 7, 1, 5, 'asdas', 0, '2019-12-07 05:15:49', '2019-12-07 05:15:49'),
(34, 7, 1, 5, 'hello', 0, '2019-12-07 05:19:54', '2019-12-07 05:19:54'),
(35, 7, 5, 1, 'yes', 0, '2019-12-07 05:20:00', '2019-12-07 05:20:00'),
(36, 7, 1, 5, 'so, its working now?', 0, '2019-12-07 05:20:10', '2019-12-07 05:20:10'),
(37, 7, 5, 1, 'yes, its perfect noe :)', 0, '2019-12-07 05:20:23', '2019-12-07 05:20:23'),
(38, 8, 5, 1, 'hello', 0, '2019-12-07 05:22:11', '2019-12-07 05:22:11'),
(39, 8, 1, 5, 'yes', 0, '2019-12-07 05:22:26', '2019-12-07 05:22:26'),
(40, 8, 1, 5, 'hello', 0, '2019-12-07 05:43:38', '2019-12-07 05:43:38'),
(41, 8, 1, 5, 'yes', 0, '2019-12-07 05:43:56', '2019-12-07 05:43:56'),
(42, 8, 1, 5, 'what', 0, '2019-12-07 05:44:08', '2019-12-07 05:44:08'),
(43, 8, 1, 5, 'hi', 0, '2019-12-07 05:45:01', '2019-12-07 05:45:01'),
(44, 8, 1, 5, 'u', 0, '2019-12-07 05:46:38', '2019-12-07 05:46:38'),
(45, 7, 1, 5, 'hello', 0, '2019-12-07 05:48:41', '2019-12-07 05:48:41'),
(46, 7, 1, 5, 'hi', 0, '2019-12-07 05:49:34', '2019-12-07 05:49:34'),
(47, 7, 5, 1, 'yes', 0, '2019-12-07 05:49:44', '2019-12-07 05:49:44'),
(48, 8, 1, 5, 'hello', 0, '2019-12-07 05:49:55', '2019-12-07 05:49:55'),
(49, 8, 5, 1, 'yes', 0, '2019-12-07 05:50:04', '2019-12-07 05:50:04'),
(50, 8, 1, 5, 'nothing', 0, '2019-12-07 05:50:15', '2019-12-07 05:50:15'),
(51, 7, 1, 5, 'hello', 0, '2019-12-07 05:51:39', '2019-12-07 05:51:39'),
(52, 7, 5, 1, 'yes', 0, '2019-12-07 05:51:53', '2019-12-07 05:51:53');

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
(3, '2019_11_26_083028_create_admin_queries_table', 2),
(4, '2019_11_27_065311_create_admins_table', 3),
(5, '2019_11_27_111314_create_gig_categories_table', 4),
(7, '2019_12_04_113049_create_messages_table', 5),
(8, '2019_12_06_072932_create_conversations_table', 5);

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
('shoaibafzal768@gmail.com', '$2y$10$3dVMRxEwbLOArZrxHPmqx.tAjewxYslei6Cc.lTwuSPF/DiAtM5uC', '2019-11-26 02:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user_avatar.jpg',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_profile` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `first_name`, `last_name`, `phone`, `skills`, `experience`, `avatar`, `status`, `remember_token`, `current_profile`, `created_at`, `updated_at`, `ip`, `contact`) VALUES
(1, 'shoaib afzal', 'shoaib7688', 'shoaibafzal768@gmail.com', NULL, '$2y$10$70CLmjKLxe7dvLsg.Ga61OEjtQPqvecRsxM33Y/cez09v506dWUO.', 'shoaib', 'afzal', NULL, 'Laravel,php,html,css,javascript', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1575528919_Eddy-Klaus-Unspalsh-1-277x238.jpg', 'active', NULL, 1, '2019-11-19 13:49:13', '2019-12-13 01:25:25', '10', NULL),
(5, 'Hamza Afzal', 'hamza768', 'hamza768@gmail.com', NULL, '$2y$10$hVgODS82aQQnxJfvjlgNIOwv9aVtI6J7hLVjJ1vR3nemEArawo24O', 'Hamza', 'Afzal', '03068805310', 'book keeping,accounting,tax,audit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'user_avatar.jpg', 'active', NULL, 1, '2019-11-27 04:55:47', '2019-11-27 04:55:47', NULL, NULL),
(6, NULL, 'shoaib768', 'shoaib657@hmail.com', NULL, '$2y$10$mpoIhW7qKzEfv5YGBvC4tOQ0aUSyS6uWHzIdR0l2PrLCNFjO6RVxG', NULL, NULL, NULL, NULL, NULL, 'user_avatar.jpg', 'active', NULL, 1, '2019-12-05 02:42:05', '2019-12-05 03:07:05', NULL, NULL),
(7, 'shoaibii', 'shoaib111', 'shoaib@hmail.com', NULL, '$2y$10$0a2sJ.QhSr3lRmUicSExHO.noqMnkbZCTLvLD.W.YlA2msNpsk652', NULL, NULL, NULL, NULL, NULL, 'user_avatar.jpg', 'active', NULL, 1, '2019-12-05 03:09:09', '2019-12-09 07:48:13', '12', '5735435');

-- --------------------------------------------------------

--
-- Table structure for table `user_details_fields`
--

CREATE TABLE `user_details_fields` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details_fields`
--

INSERT INTO `user_details_fields` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'ip', '2019-12-09 12:34:10', '2019-12-09 12:34:10'),
(3, 'contact', '2019-12-09 12:48:04', '2019-12-09 12:48:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_queries`
--
ALTER TABLE `admin_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gig_categories`
--
ALTER TABLE `gig_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);
ALTER TABLE `users` ADD FULLTEXT KEY `fulltext_index` (`skills`,`experience`);

--
-- Indexes for table `user_details_fields`
--
ALTER TABLE `user_details_fields`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_queries`
--
ALTER TABLE `admin_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gig_categories`
--
ALTER TABLE `gig_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_details_fields`
--
ALTER TABLE `user_details_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
