-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 05:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interior_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `address`) VALUES
(122333, 'josman joe', '23456789'),
(465675757, 'joseph kanyandekwe', 'mugisha@gmail.com'),
(45555, 'joel', '864686');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'JOSEPH', 'KANYANDEKWE', '0000', '1111@gmail.com', '098765432', '$2y$10$R4G4q0Li0sskxlU/q1.ePOgJ4o2NpOuVMJsDj4hZNUEFZE9AMNDb6', '2024-05-05 09:12:38', '09', 0),
(2, 'josman', 'joe', '7890', '2222@gmail.com', '0784855028', '$2y$10$Lxn9C39tT3yD/5ijogsroeGNB4aDRejQ7ni4xAMDvnjaaYA.wQVpK', '2024-05-05 09:28:14', '798655', 0),
(3, 'M', 'A', 'ssssssdfghj', 'z@gmail.com', '0987654321', '$2y$10$oR/dMOnVzL5jHT1nbgtIWe17Sk8k.dfp8QLTSeiSfggmvVYqhJsBO', '2024-05-07 10:24:28', '45', 0),
(4, 'kkkk', 'ddafghgc', 'zzzzz', '22ffgff@gmail.com', '078485edt5028', '$2y$10$I97jmyLVLYSoj1uqEHr8N.n4NJ3TgfNXu7rmzx0N5Bs8dyVyxtrVq', '2024-05-17 12:38:14', '79865566', 0),
(5, 'josman', 'jo', 'joseeph', 'joseph@gmail.com', '0987606538858', '$2y$10$P.o1yo/7dNHsYotZTM8WXe6tAZWurH/.0Mxos1hMEvw30A2wAsicy', '2024-05-22 12:03:33', '78', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
