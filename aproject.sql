-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 05:09 PM
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
-- Database: `aproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pid` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `phase` enum('design','development','testing','deployment','complete') DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `uid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `title`, `start_date`, `end_date`, `phase`, `description`, `uid`) VALUES
(1, 'Title', '2024-04-14', '2024-05-14', 'complete', 'A short description', 1),
(2, 'Title 2', '2024-04-14', '2024-04-21', 'design', 'A short description', 2),
(3, 'Title 3', '2024-04-18', '2024-04-25', 'testing', 'A short description', 3),
(4, 'Title 4', '2024-04-20', '2024-04-27', 'development', 'A short description', 1),
(5, 'Title 5 ', '2024-04-28', '2024-05-05', 'development', 'A short description', 2),
(6, 'Title 6', '2024-04-22', '2024-04-29', 'testing', 'A short description', 3),
(7, 'Title 7', '2024-05-04', '2024-05-11', 'complete', 'A short description', 1),
(8, 'Title 8', '2024-05-31', '2024-06-07', 'deployment', 'A short description', 2),
(9, 'Title 9', '2024-04-29', '2024-05-06', 'deployment', 'A short description', 3),
(10, 'Title 10', '2024-04-29', '2024-05-06', 'complete', 'A short description', 1),
(11, 'Title 11', '2024-04-29', '2024-05-06', 'development', 'A short description', 2),
(12, 'Title 12', '2024-04-28', '2024-05-05', 'complete', 'A short description', 3),
(13, 'Title 13', '2024-04-12', '2024-04-19', 'design', 'A short description', 1),
(14, 'Title 14', '2024-04-17', '2024-05-03', 'design', 'A short description', 2),
(15, 'Title 15', '2024-04-17', '2024-05-03', 'design', 'A short description', 3),
(16, 'Title 16', '2024-04-28', '2024-05-08', 'testing', 'A short description', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`) VALUES
(1, 'Rikesh', '$2y$10$.EP.t6fqW7XtCjPamHwWdust2ZytYeJYyJYYZqnPqjnwyOhSHo2mW', 'rkpatel1738@gmail.com'),
(2, 'Om', '$2y$10$8WPK4Vpdk.rBSpkqMZvTBe5MqHMXbRBDtFBK530.0DIm7Xeam5s9G', 'omp@gmail.com'),
(3, 'Tilak', '$2y$10$ms2bECoNWCP3Z95MtPYNwebaOuwRjVHrrD83mxBjncTeaUiMXwGp2', 'tilak2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
