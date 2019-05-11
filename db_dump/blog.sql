-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2019 at 12:49 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `subject`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'My First Post testing done', 'My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post.', 1, '2019-05-11 08:47:45', '2019-05-11 03:17:45'),
(2, 1, 'My First Post Testing 2', 'My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post.', 1, '2019-05-11 10:43:51', '2019-05-11 05:13:51'),
(3, 1, 'My First Post Post admin', 'My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post.', 1, '2019-05-11 09:05:55', '2019-05-11 03:35:55'),
(4, 1, 'My First Post', 'My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. My First Post. ', 1, '2019-05-11 10:46:55', '2019-05-11 05:16:55'),
(5, 1, 'asdsaf testing', 'sdfasdfasadfsadf', 1, '2019-05-11 08:47:33', '2019-05-11 03:17:33'),
(6, 2, 'asdsaf', 'sdfasdfasadfsadf', 1, '2019-05-11 08:08:23', '2019-05-11 02:28:31'),
(7, 1, 'testing new post', 'testing new post.', 1, '2019-05-11 10:47:30', '2019-05-11 05:17:30'),
(8, 2, 'admin posts', 'testing', 0, '2019-05-11 10:47:02', '2019-05-11 05:17:02'),
(9, 2, 'admin psot 22', 'testing', 1, '2019-05-11 03:29:23', '2019-05-11 03:29:23'),
(10, 2, 'testing my job', 'tetsing post', 1, '2019-05-11 03:30:08', '2019-05-11 03:30:08'),
(11, 2, 'Testing Post from admin now', 'testig from admin', 1, '2019-05-11 10:46:09', '2019-05-11 05:16:09'),
(12, 1, 'Last testing admin', 'testingaafadaf', 1, '2019-05-11 10:45:16', '2019-05-11 05:15:16'),
(13, 2, 'asdsaf testing', 'sfdasfd sa f asfsaf', 0, '2019-05-11 10:47:11', '2019-05-11 05:17:11'),
(14, 4, 'testing new post', 'sadfa asdf aasf', 0, '2019-05-11 10:48:15', '2019-05-11 05:18:15'),
(15, 4, 'post for delete', 'post for delete', 0, '2019-05-11 10:48:36', '2019-05-11 05:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sunny', 'sunny@gmail.com', '2019-04-30 18:30:00', '$2y$10$TleNP6bf8HwWDBdZRcGN9.X9yc4ekTTD1gRrWU.j3SQ7tA0obVZZa', 1, NULL, '2019-05-10 18:30:00', '2019-05-10 18:30:00'),
(2, 'Admin', 'admin@gmail.com', '2019-04-30 18:30:00', '$2y$10$TleNP6bf8HwWDBdZRcGN9.X9yc4ekTTD1gRrWU.j3SQ7tA0obVZZa', 2, NULL, '2019-05-10 18:30:00', '2019-05-10 18:30:00'),
(3, 'testing', 'testing@test.com', NULL, '123456', 1, NULL, '2019-05-11 04:45:52', '2019-05-11 04:45:52'),
(4, 'testing', 'test1@gmail.com', NULL, '$2y$10$7XUseKaT6YKYDrfj/BFNHePmNIzF9kcd64lD0FMCzCkP7srYnk6hC', 1, NULL, '2019-05-11 04:48:11', '2019-05-11 04:48:11'),
(5, 'testing', 'sunny2@gmail.com', NULL, '$2y$10$PekeYWXKxjlMzm43MbuBT.3XqBClBIKYG2xSOnNdUApRFZnu5AS9q', 1, NULL, '2019-05-11 05:16:30', '2019-05-11 05:16:30'),
(6, 'sunny admin', 'admin2@gmail.com', NULL, '$2y$10$60OSZndn5foogn.7G4INkem3OKVBpoVQRCDaTHS8F50XzEfddf4f2', 2, NULL, '2019-05-11 05:16:48', '2019-05-11 05:16:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
