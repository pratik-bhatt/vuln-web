-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 09:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `flags_id` int(11) NOT NULL,
  `vulnerability` varchar(500) NOT NULL,
  `flag` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`flags_id`, `vulnerability`, `flag`) VALUES
(1, 'bola', '6fc6a82b70dc9e10777adc2f33f2d591d4a9b96832b7fd1a32e885fb1ce55511'),
(2, 'brokenAuth', '6ef62416e310ff9a0e2072eb80f1744257d6ffe0dfafbcf98e2e874e99a57f8a'),
(3, 'Bopa', '41be42a8d7f0ced80a40f616e56f3d1cc7225a035c4b0674f6bf32c2b4279145'),
(4, 'unrestrictedResourceConsumption', '4ee3282bbf543f9795e668a98ff9709dd4712f1bb92453db460f779ff7ba4c9d'),
(5, 'bfla', '9b81c148ac44f8e2723ff981f2e5622ebdce484b12db1273c726b4c4689e687a'),
(6, 'ssrf', '7a4809ef09fb943df7eb1743a7b8bf966d9b3432cca967894a43985207fa0d8f'),
(11, 'securityMisconfig', '96a22a3aa1a3ab2533f05af77474b76482eb70e924ac953ae98991d33f5f6b56'),
(12, 'AutoThreats', '76cabf27c6fbb7bc25d87c933d840b15987d33dca171b86314d62e9754816e4e'),
(13, 'improperAssetMngmt', '5bd73abca6b003d6701a8c0e327ddf29fe2723440e2f8e1ca863c0d5c7fb5008'),
(14, 'unsafeApiConsumption', '128ba83453a2be75c4635ddbdb44c7633677f2043e8cb728c2954bc1c8e2d800');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` double NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, 'kowyxyq', 'Jade', 'Foreman', 'femeryzyfi@mailinator.com', 'Pa$$w0rd!');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `flags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_invoice_map` FOREIGN KEY (`id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
