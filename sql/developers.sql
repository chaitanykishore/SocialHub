-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 01:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingstatus`
--

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `created_at` timestamp(5) NOT NULL DEFAULT current_timestamp(5),
  `updated_at` datetime(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `username`, `password`, `fullName`, `gender`, `email`, `mobile`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
(19, 'shambhu', '$2y$10$CtCjOVobJHP0qctMM.x5tOh0DSmRQ6c9urdPgs.moYinpZfWOdL4C', 'shambhu', 'male', 'shambhu@gmail.com', NULL, NULL, 'kailasa', NULL, '2023-08-21 20:53:42.77440', NULL),
(20, 'raja', '$2y$10$spLqZ/CyYfPal9xbJZ5Fj.wFXAHqmT5VLRN7OxvPeo8YjR0SH8d2u', 'raja', 'male', 'raja@gm', NULL, NULL, 'ssm', NULL, '2023-08-21 20:57:20.84612', NULL),
(21, 'manjeet', '$2y$10$M5oY41SY/656RvyoD5FTVOGKL5HNNE010h/6XBskGe2ZbsHDNx7wO', 'manjeet', 'male', 'manjeet@gmail.com', NULL, NULL, 'delhi', NULL, '2023-08-21 22:40:31.80595', NULL),
(22, 'hello', '$2y$10$qBLtgIv6mA6eSdFn7cv9n.Vu/5LlpomJOI5Wxp5fK62U0/KhBb4/W', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-21 23:31:41.77441', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
