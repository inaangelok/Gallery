-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2024 at 06:33 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `photo_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`id`, `user_id`, `photo_id`, `created_at`, `updated_at`) VALUES
(90, 8, 12, '2024-06-22 15:03:34', '2024-06-22 15:03:34'),
(91, 8, 13, '2024-06-22 15:03:35', '2024-06-22 15:03:35'),
(100, 9, 12, '2024-06-22 15:29:48', '2024-06-22 15:29:48'),
(101, 9, 13, '2024-06-22 15:29:51', '2024-06-22 15:29:51'),
(102, 9, 26, '2024-06-22 15:29:52', '2024-06-22 15:29:52'),
(103, 9, 25, '2024-06-22 15:29:54', '2024-06-22 15:29:54'),
(104, 9, 30, '2024-06-22 15:29:57', '2024-06-22 15:29:57'),
(105, 9, 32, '2024-06-22 15:30:58', '2024-06-22 15:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(12, 2, 'Hello', '123456789', '1719064510tulip.png', '2024-06-22 13:55:10', '2024-06-22 13:55:10'),
(13, 2, 'Curly Girl', 'A girl with curly hair', '1719066046images (2).jpeg', '2024-06-22 14:20:46', '2024-06-22 14:20:46'),
(25, 2, 'Image', 'A girl with umbrella', '1719069266images.jpeg', '2024-06-22 15:14:26', '2024-06-22 15:14:26'),
(26, 2, 'Colors', 'Mixture of colors', '1719069310download (1).jpeg', '2024-06-22 15:15:10', '2024-06-22 15:15:10'),
(30, 2, 'Colors', 'Mixture of colors', '1719069310download (1).jpeg', '2024-06-22 15:15:10', '2024-06-22 15:15:10'),
(31, 2, 'Hello', '123456789', '1719064510tulip.png', '2024-06-22 13:55:10', '2024-06-22 13:55:10'),
(32, 2, 'Curly Girl', 'A girl with curly hair', '1719066046images (2).jpeg', '2024-06-22 14:20:46', '2024-06-22 14:20:46'),
(33, 2, 'Image', 'A girl with umbrella', '1719069266images.jpeg', '2024-06-22 15:14:26', '2024-06-22 15:14:26'),
(34, 2, 'Colors', 'Mixture of colors', '1719069310download (1).jpeg', '2024-06-22 15:15:10', '2024-06-22 15:15:10'),
(35, 2, 'Colors', 'Mixture of colors', '1719069310download (1).jpeg', '2024-06-22 15:15:10', '2024-06-22 15:15:10'),
(36, 9, 'yojik', 'krasiviy yojik', '1719070323images (1).jpeg', '2024-06-22 15:32:03', '2024-06-22 15:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'noimage.png',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `image`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Angie', 'Kiryan', 'noimage.png', 'angelinakiryan.07@gmail.com', 'a99662122d994206bc0498d8b3f542d012a1592f', 'user', '2024-06-19 22:23:31', '2024-06-19 22:23:31'),
(8, 'User', 'User', 'noimage.png', 'user111@example.com', 'd63fe6f190c15627233789931371e6246e2f39ee', 'user', '2024-06-22 14:28:55', '2024-06-22 14:28:55'),
(9, 'elen', 'ELEN', 'noimage.png', 'anun@gmail.com', '163363342dd9aae8c26c3beb3bb8f3cab5a3f06e', 'user', '2024-06-22 15:05:57', '2024-06-22 15:05:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
