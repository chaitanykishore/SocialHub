-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 02:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28
ALTER TABLE `post` ADD `likes` INT UNSIGNED NOT NULL DEFAULT '0';


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
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `image_id`, `image_name`, `username`, `caption`, `date`) VALUES
(90, NULL, 'download (1).jpg', 'son1', 'b', '2023-09-02'),
(91, NULL, 'download (1).jpg', 'son1', 'm', '2023-09-02'),
(92, NULL, '1117195.jpg', 'son1', 'c', '2023-09-02'),
(93, NULL, '1117195.jpg', 'son1', NULL, '2023-09-02'),
(94, NULL, '_117300535_rob2.jpg', 'son1', NULL, '2023-09-02'),
(95, NULL, '_117300535_rob2.jpg', 'son1', 'c', '2023-09-02'),
(96, NULL, '1117195.jpg', 'son1', 'c', '2023-09-02'),
(97, NULL, 'download (1).jpg', 'son1', 'i', '2023-09-02'),
(98, NULL, 'download (1).jpg', 'son1', 'image saved', '2023-09-02'),
(99, NULL, 'download (1).jpg', 'son1', 'image saved', '2023-09-02'),
(100, NULL, 'download (1).jpg', 'son1', 'image saved', '2023-09-02'),
(101, NULL, 'download (1).jpg', 'son1', 'image saved', '2023-09-02'),
(102, NULL, '_117300535_rob2.jpg', 'son1', 'boy', '2023-09-02'),
(103, NULL, '_117300535_rob2.jpg', 'son1', 'boy', '2023-09-02'),
(104, NULL, '_117300535_rob2.jpg', 'son1', 'boy', '2023-09-02'),
(105, NULL, '_117300535_rob2.jpg', 'son1', 'boy', '2023-09-02'),
(106, NULL, '_117300535_rob2.jpg', 'son1', 'boy', '2023-09-02'),
(107, NULL, 'download.jpg', 'hamunam', 'king of jungle', '2023-09-02'),
(108, NULL, 'download.jpg', 'hamunam', 'king of jungle', '2023-09-02'),
(109, NULL, 'download.jpg', 'hamunam', 'king of jungle', '2023-09-02'),
(110, NULL, 'download.jpg', 'hamunam', 'king of jungle', '2023-09-02'),
(111, NULL, 'download.jpg', 'hamunam', 'king of jungle', '2023-09-02'),
(112, NULL, 'download.jpg', 'hamunam', 'king of jungle', '2023-09-02'),
(113, 113, '1117195.jpg', 'son1', 'b', '2023-09-03'),
(114, 114, '1117195.jpg', 'son1', 'b', '2023-09-03'),
(115, 115, '1117195.jpg', 'son1', 'b', '2023-09-03'),
(116, 116, '1117195.jpg', 'son1', 'b', '2023-09-03'),
(117, 117, '1117195.jpg', 'son1', 'b', '2023-09-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
