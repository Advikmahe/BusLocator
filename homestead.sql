-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 05:09 PM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE IF NOT EXISTS `buses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `busstop_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `busstop_id`, `created_at`, `updated_at`) VALUES
(1, '63', 1, NULL, NULL),
(2, '63M', 2, NULL, NULL),
(20, '63M', 1, NULL, NULL),
(21, '63M', 1, NULL, NULL),
(22, '66', 3, NULL, NULL),
(23, '65', 4, NULL, NULL),
(24, '22', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `busstop`
--

CREATE TABLE IF NOT EXISTS `busstop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userlocation_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `busstop`
--

INSERT INTO `busstop` (`id`, `name`, `userlocation_id`, `created_at`, `updated_at`) VALUES
(1, ' 71111', 1, NULL, NULL),
(2, '71101', 2, NULL, NULL),
(3, '84009', 3, NULL, NULL),
(4, ' 84359', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_04_09_032555_create_tasks_table', 1),
('2017_04_09_095151_create_items_table', 2),
('2017_04_11_054925_create_bus_location_tables', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlocation`
--

CREATE TABLE IF NOT EXISTS `userlocation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `userlocation`
--

INSERT INTO `userlocation` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Blk 348', NULL, NULL),
(2, 'Blk 721', NULL, NULL),
(3, 'Bedok Int', NULL, NULL),
(4, 'Opp Bedok Ctrl PO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yedhu', 'yedhumohan@gmail.com', '$2y$10$UcT37dSb.1XvGng8o05e.OkiShGcQQGbBVySpGyjWO9WHUWlgckwS', '9do6pQL42cPjgOkYe2Lmy2VDaP7gT4N1T1tTMWZhx0SYChYytoBYrrKnQzyY', '2017-04-11 02:43:42', '2017-04-11 05:02:19'),
(2, 'ss', 'ss@gmail.com', '$2y$10$zdC2E.fbjfTUScY1nFZYUO9ujSYeS0ga9EU.IE42.wHTheeu3TqdW', 'R6sWs5tAyiYxNtj0Hmihjd9omZBbTIVfxu9nEoqd6IZMGPGkFG6YOd71UsCD', '2017-04-11 04:48:58', '2017-04-11 06:22:06'),
(3, 'vv', 'vv@gmail.com', '$2y$10$E8lfLhgdm1NzlS5kpmzXVelPl6ukMCiiBfx0bCiMC8Q0ntmuM/eRC', 'Hdn3qfn2khLn9E4FXiDHTw4rpV6HYutlvlMaHIl1M28d3bORodfHM7PlIul1', '2017-04-11 04:58:51', '2017-04-11 05:08:42'),
(4, 'cc', 'cc@gmail.com', '$2y$10$/6Cb4HoQxbBYxzASQsZM/OXsp2HebQ9CacVnr9CCtK7TK0lvI5gR6', 'zUny4iJPbaQ7STbarukQiWke02VazSztez6MOmMJHrpyu9fYpAXePreyTBkr', '2017-04-11 06:24:54', '2017-04-11 07:00:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
