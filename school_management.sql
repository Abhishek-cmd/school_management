-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 09:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

CREATE TABLE `tbl_school` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_location` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_school`
--

INSERT INTO `tbl_school` (`id`, `school_name`, `school_location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test1', '<p>new one added</p>\r\n', '1', '2022-11-05 19:27:56', '2022-11-05 19:54:57'),
(2, 'New one', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(3, 'New 1', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(4, 'New two', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(5, 'New three', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(6, 'New four', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(7, 'New five', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(8, 'New sex', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(9, 'New seven', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(10, 'New eight', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(11, 'New nine', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(12, 'New on', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(13, 'New ten', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(14, 'New eleven', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(15, 'New one', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(16, 'New two', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(17, 'New three', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(18, 'New four', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(19, 'New five', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(20, 'New sex', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(21, 'New seven', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(22, 'New eight', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(23, 'New nine', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(24, 'New one', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(25, 'New ten', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(26, 'New eleven', '<p>added</p>\r\n', '1', '2022-11-05 19:55:12', '0000-00-00 00:00:00'),
(27, 'Qi', '<p>test</p>\r\n', '1', '2022-11-05 21:17:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `visible_password` text NOT NULL,
  `password` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `mobile`, `visible_password`, `password`, `status`, `last_login`, `created_at`) VALUES
(1, 'Abhishek', 'abhi@gmail.com', '8149167341', 'Test@123', 'f925916e2754e5e03f75dd58a5733251', '1', '2022-11-05 19:52:11', '2022-11-03 18:47:38'),
(2, 'Raj', 'raj@gmail.com', '9898989898', 'Test@123', 'f925916e2754e5e03f75dd58a5733251', '1', '2022-11-03 19:30:38', '2022-11-03 18:53:10'),
(3, 'Mangesh', 'mangesh@gmail.com', '8787878878', 'Test@123', 'f925916e2754e5e03f75dd58a5733251', '1', '0000-00-00 00:00:00', '2022-11-03 18:54:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_school`
--
ALTER TABLE `tbl_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
