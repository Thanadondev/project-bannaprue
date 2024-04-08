-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 08:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bannaprue_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'daow', 'kammin', 'thanadon.hcyp@gmail.com', '$2y$10$SX51sajZH6ISa0BfxoExP.3CzsSreXM0RHSWL1Yiruq/AT7aTSq0u', 'admin'),
(2, 'qweee', 'rqwr', 'daow@asd.com', '$2y$10$E16pDUJeYylNP3KOYO5Bgufosi8CM9ctimW1HgyeuPcDulkRvLimG', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `images`, `created_at`) VALUES
(12, 'gwghHw', 'HHSEDHs', '../../uploads/img-7YSACXRS7btArDDnJwCen.jpeg', '2024-04-08 11:42:03'),
(13, 'qgwqgqwg', 'qgqgwqgq', '../../uploads/img-AEk9sBgx5HbKPVyXP8oOU.jpeg', '2024-04-08 11:43:21'),
(14, 'gwqhwqhwq', 'hwqhwhwrqhqrwehwqr', '../../uploads/img-yUBTTqshPSnQpoJYBReJh.jpeg', '2024-04-08 11:50:36'),
(15, 'hejwejwej', 'wjwgjwgjwg', '../../uploads/img-Vaggx26THsb0k7xDPMdYZ.jpeg', '2024-04-08 11:52:28'),
(16, 'hwqhdshDS', 'HshHDSHSH', '../../uploads/img-qE6xXI4a29LkfKTNiXvrc.png', '2024-04-08 11:53:10'),
(17, 'whwh', 'hsahshs', '../../uploads/thumbnail.png', '2024-04-08 11:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `otp_table`
--

CREATE TABLE `otp_table` (
  `id` int(11) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `expire_time` datetime NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `otp_table`
--

INSERT INTO `otp_table` (`id`, `tel`, `otp`, `expire_time`, `used`) VALUES
(1, '+66971597192', '727224', '2024-04-08 10:49:23', 0),
(2, '+66971597192', '840037', '2024-04-08 10:56:53', 0),
(3, '+66971597192', '416495', '2024-04-08 11:08:39', 0),
(4, '+66971597192', '105899', '2024-04-08 10:05:37', 0),
(5, '+66971597192', '554691', '2024-04-08 16:03:23', 0),
(6, '66971597192', '234157', '2024-04-08 16:22:17', 0),
(7, '66971597192', '573079', '2024-04-08 16:46:28', 0),
(8, '+66971597192', '927613', '2024-04-08 16:50:11', 0),
(9, '+66971597192', '614999', '2024-04-08 16:54:46', 0),
(10, '1231231233', '796753', '2024-04-08 16:55:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reset_passwords`
--

CREATE TABLE `reset_passwords` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expire_time` datetime NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `reset_passwords`
--

INSERT INTO `reset_passwords` (`id`, `user_id`, `token`, `expire_time`, `used`) VALUES
(1, 25, 'ee0eacabc6fd2921b464796f0ce14d46', '2024-04-08 09:47:31', 0),
(2, 25, 'f1c40141e8c8fc74bffb61f00ae50fae', '2024-04-08 09:49:23', 0),
(3, 25, '6cd19363d48a0a5cf926c25a30ac8752', '2024-04-08 09:49:29', 0),
(4, 25, 'f3e82366628f5a1dd81c60f90f56ca4a', '2024-04-08 09:51:52', 0),
(5, 25, 'b4a22034c8bdcb9f2a5e5c2348dea323', '2024-04-08 09:52:16', 0),
(6, 25, '8a19ee64674912463b6b392b8c3251e5', '2024-04-08 10:08:40', 0),
(7, 27, 'e997f65b9986abb092feb7787784c571', '2024-04-08 10:11:26', 0),
(8, 25, '684c39fcca80ac3d8034d883640a4ff6', '2024-04-08 10:34:23', 0),
(9, 25, 'ee2c47ad449833f0aebe90e2c1953e31', '2024-04-08 10:38:56', 0),
(10, 25, '728290386270670ffb1d4d20495c4a71', '2024-04-08 10:39:00', 0),
(11, 25, '153a539bdf722fb84602bf15c849554f', '2024-04-08 10:55:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skilled`
--

CREATE TABLE `skilled` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `skilled`
--

INSERT INTO `skilled` (`id`, `name`, `description`, `images`, `created_at`) VALUES
(1, 'traindata1', '123', '../../uploads/hero-1.jpg', '2024-04-04 13:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `lineid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `address`, `tel`, `password`, `lineid`, `created_at`) VALUES
(20, 'wrwe', 'kammin', 'qwrqw@fsfa.com', '2 bangkok fasfsa', '8888888888', '$2y$10$UCaOrTFlXqVW3YtqmhqKuOo2B570o4Y/nk//MNTuYMnT7oFffuYQy', 'asffasf1', '2024-04-05 11:56:06'),
(23, 'daow', 'twtwetwe', 'thanadon.hcyp@gmail.com', '2 bangkok', '1231235554', '$2y$10$k832j.cisGCayqdbDDb5jeq9kq/xSsvfXBMndZEJZ.WcO9aCsCmV2', 'asffasf1', '2024-04-05 12:50:52'),
(24, 'daow', 'kammin', 's6506021411051@email.kmutnb.ac.th', '2 bangkok fasfsa', '1231235554', '$2y$10$Wg2YVLrZC0Wx6VS1g4T5WerfDEmWUwmilR48OAFl2kytB9TvGIwSW', 'baw221', '2024-04-05 14:31:53'),
(25, 'Thanadon', 'hanchaiyaphum', 'bomkehe512@gmail.com', '32/6 M.2 Ratniyom Sainoi Nonthaburi 11150', '+66971597192', '$2y$10$4bJjrmk4yAOEQkAWdTXwNuSqeLHANuERP/R0utMi7jNnYCQ4rpP.e', 'sosadogs', '2024-04-07 19:20:30'),
(26, 'tgatat', 'taqtqgyq', 'daow@asd.com', '2 bangkok', '1231231233', '$2y$10$1V4GPfLpOeAU4Jpp5uB5A.dtxr74V9VH9sbd7az0RepU8YbTMVI9G', 'rqrww123', '2024-04-07 19:20:46'),
(27, 'wrwe', 'twtwetwe', 'thanadon152@gmail.com', '2 bangkok fasfsat', '0863249571', '$2y$10$38bTHYz/2WzIDBjxiAF93uwiFoupzqzEFi4TGHodjGFsvqz9S.eXe', 'baw221', '2024-04-08 07:41:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_table`
--
ALTER TABLE `otp_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skilled`
--
ALTER TABLE `skilled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `otp_table`
--
ALTER TABLE `otp_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `skilled`
--
ALTER TABLE `skilled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD CONSTRAINT `reset_passwords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
