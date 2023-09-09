-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2023 at 02:40 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuln-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `appinfo`
--

CREATE TABLE `appinfo` (
  `id` int NOT NULL,
  `Roles` varchar(250) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appinfo`
--

INSERT INTO `appinfo` (`id`, `Roles`, `username`, `password`) VALUES
(1, 'super admin', 'superadmin', 'superAdmin'),
(2, 'IT', 'infotech', 'infoTech'),
(3, 'buisiness', '', 'b/s'),
(4, 'trev', '', 'b/s team'),
(5, 'buisiness team', 'trev', 'b/s team'),
(6, 'buisiness team', 'trev', 'b/s team'),
(7, '', '', ''),
(8, 'buisiness team', 'trev', 'b/s team'),
(9, 'buisiness', '', 'b/s');

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `flags_id` int NOT NULL,
  `vulnerability` varchar(500) NOT NULL,
  `flag` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`flags_id`, `vulnerability`, `flag`) VALUES
(1, 'bola', 'ZmxhZ3tCcm9rZW5PYmozY3RMZXYzbEF1dGh9'),
(2, 'brokenAuth', 'ZmxhZ3tCcjBrZW5BdXRofQ=='),
(3, 'Bopa', 'ZmxhZ3tCcjBrZW4wYmplY3RMZXZlbFByMHAzcnR5QXV0aH0='),
(4, 'unrestrictedResourceConsumption', 'ZmxhZ3tVbjRlc3RyaWN0M2RSZXNvdXJjZUMwbnN1bXB0aW9ufQ=='),
(5, 'bfla', 'ZmxhZ3tCNG9rZW5GdW5jdGlvbkwzdmVsQXV0aDByaXphdGkwbn0='),
(6, 'ssrf', 'ZmxhZ3tTM3J2ZXJTaWRlNGVxdWVzdEYwZzNyeX0='),
(11, 'securityMisconfig', 'ZmxhZ3tTM2N1cml0eU1pc2MwbmZpZ3VyYXQxMG59'),
(12, 'AutoThreats', 'ZmxhZ3tBdXRvVGhyZWF0c1RvV2ViQXBwbGljYXRpb259'),
(13, 'improperAssetMngmt', 'ZmxhZ3sxbXByb3BlckFzc2V0TWFuNGdlbWU5dH0='),
(14, 'unsafeApiConsumption', 'ZmxhZ3tVbnNhZmVBcGlDb25zdW1wdGlvbn0=');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `date`, `amount`, `user_id`) VALUES
(6, '2023-07-24 21:06:32', 222, 7),
(7, '2023-07-24 21:06:32', 333, 9),
(8, '2023-07-24 21:06:32', 444, 13),
(9, '2023-07-24 21:06:32', 555, 5),
(10, '2023-06-23 08:58:30', 758585, 4),
(11, '2023-07-24 21:06:32', 111, 8),
(12, '2023-07-24 21:06:32', 222, 7),
(13, '2023-07-24 21:06:32', 333, 9),
(14, '2023-07-24 21:06:32', 444, 13),
(15, '2023-07-24 21:06:32', 555, 5),
(16, '2023-06-23 08:58:30', 758585, 4),
(17, '2023-07-24 21:06:32', 111, 8),
(18, '2023-07-24 21:06:32', 222, 7),
(19, '2023-07-24 21:06:32', 333, 9),
(20, '2023-07-24 21:06:32', 444, 13),
(21, '2023-07-24 21:06:32', 555, 5),
(22, '2023-06-23 08:58:30', 758585, 4),
(23, '2023-07-24 21:06:32', 111, 8),
(24, '2023-07-24 21:06:32', 222, 7),
(25, '2023-07-24 21:06:32', 333, 9),
(26, '2023-07-24 21:06:32', 444, 13),
(27, '2023-07-24 21:06:32', 555, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `firstname`, `lastname`, `email`, `password`) VALUES
(3, 'trev', 'Raphael', 'Crosby', 'sodet@mailinator.com', 'Pa$$w0rd!'),
(4, 'joe', 'Althea', 'Hopkins', 'qumigy@mailinator.com', 'Pa$$w0rd!'),
(5, 'doe', 'Kerry', 'Herman', 'banap@mailinator.com', 'Pa$$w0rd!'),
(6, 'byjom', 'gajojevumo', 'Williams', 'fomi@mailinator.com', 'Pa$$w0rd!'),
(7, 'zanofedu', 'qyvakemocy', 'Gay', 'jejyg@mailinator.com', 'Pa$$w0rd!'),
(8, 'qyvadi', 'Vance', 'Carver', 'maruladiwa@mailinator.com', 'Pa$$w0rd!'),
(9, 'kowyxyq', 'Jade', 'Foreman', 'femeryzyfi@mailinator.com', 'Pa$$w0rd!'),
(13, 'test', 'ertyu', 'edfrghjk', 'dfghjk', 'wertyj'),
(14, 'test', 'Pratik', 'Bhaatt', 'test@test.com', 'password'),
(16, '', '', '', '', ''),
(17, 'tes', 'sdfs', '123', 'test@123.com', '123'),
(18, 'tes', 'sdfs', '123', 'test@123.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appinfo`
--
ALTER TABLE `appinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`flags_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appinfo`
--
ALTER TABLE `appinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `flags_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
