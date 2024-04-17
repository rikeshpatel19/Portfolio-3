-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2024 at 11:46 AM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_230118588_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pid` int UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `phase` enum('design','development','testing','deployment','complete') DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `uid` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `title`, `start_date`, `end_date`, `phase`, `description`, `uid`) VALUES
(1, 'Title', '2024-04-14', '2024-05-14', 'complete', 'A short description', 1),
(2, 'Title 2', '2024-04-14', '2024-04-21', 'design', 'A short description', 2),
(3, 'Title 3', '2024-04-18', '2024-04-25', 'testing', 'A short description', 3),
(4, 'Title 4', '2024-04-20', '2024-04-27', 'development', 'A short description', 4),
(5, 'Title 5', '2024-04-28', '2024-05-05', 'development', 'A short description', 5),
(6, 'Title 6', '2024-04-22', '2024-04-29', 'testing', 'A short description', 6),
(7, 'Title 7', '2024-05-04', '2024-05-11', 'complete', 'A short description', 7),
(8, 'Title 8', '2024-05-31', '2024-06-07', 'deployment', 'A short description', 8),
(9, 'Title 9', '2024-04-29', '2024-05-06', 'development', 'A short description', 1),
(10, 'Title 10', '2024-04-29', '2024-05-06', 'complete', 'A short description', 2),
(11, 'Title 11', '2024-04-29', '2024-05-06', 'development', 'A short description', 3),
(12, 'Title 12', '2024-04-28', '2024-05-05', 'complete', 'A short description', 4),
(13, 'Title 13', '2024-04-12', '2024-04-19', 'design', 'A short description', 5),
(14, 'Title 14', '2024-04-17', '2024-05-03', 'design', 'A short description', 6),
(15, 'Title 15', '2024-04-17', '2024-05-03', 'design', 'A short description', 7),
(16, 'Title 16', '2024-04-28', '2024-05-08', 'testing', 'A short description', 8),
(17, 'Title 17', '2024-04-17', '2024-04-19', 'deployment', 'A short description', 1),
(18, 'Title 18', '2024-04-16', '2024-04-16', 'deployment', 'A short description', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`) VALUES
(1, 'Rikesh', '$2y$10$3zBMOo3uCc3RSi/tp0FvTe07W2dByz7UbWEG.SypWB1HUBcIzwzpu', 'rkpatel1738@gmail.com'),
(2, 'Om', '$2y$10$4AZznX6qehHGy8p5YZsUUeaTSF3SVyYJgm/rYLRsp.6LsPhJ1mshW', 'omp@gmail.com'),
(3, 'Tilak', '$2y$10$Oy1zz4i/0Fn3II40J2Mp2.jNqmzdhKal2L0iCampAkWYl4tkgiOT6', 'tilak2@gmail.com'),
(4, 'Robiul', '$2y$10$wC2maEP4G4.ALhtzb5x0Oe4ah7G.zHNxwzrt42Ucmr5a7zu0Zjtra', 'rmiah@gmail.com'),
(5, 'Tommy', '$2y$10$e7qWHL6gt8Onjr8wB1mcleotj564i/Wk7swKB1n0Wefg75ecHPnra', 'tommy1@gmail.com'),
(6, 'James', '$2y$10$/mS7OFbXB6KUmYzsPY3fAurzIdFu1yS4J5h/jFzU8cMQeNqfHl6w.', 'james2@gmail.com'),
(7, 'Tariq', '$2y$10$BPGg6.rHRFEcpDJcdtR5OuNzU2jAtkqOEV1JvfDMaWxgd0UJpIk2S', 'tariq3@gmail.com'),
(8, 'Kanan', '$2y$10$nDcO8dLzYSVFXmK3LU4oLOZ4/Fk7hdJct4f5EtiC3rRz/L5q6PFb2', 'kanan4@gmail.com');

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
  MODIFY `pid` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
