-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Dec 05, 2024 at 04:01 AM
=======
-- Generation Time: Dec 05, 2024 at 11:24 AM
>>>>>>> 34c31fc86bef5047c30f4521bf1addfcf5fb3005
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
-- Database: `smartbin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(199) NOT NULL,
  `user_id` varchar(199) NOT NULL,
  `pts_earned` decimal(65,0) DEFAULT NULL,
  `bottle_quantity` int(199) DEFAULT NULL,
  `pts_deducted` decimal(65,0) DEFAULT NULL,
  `acq_items` varchar(199) DEFAULT NULL,
  `item_qty` int(5) DEFAULT NULL,
  `service` enum('Vendo','Printer','','') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `user_id`, `pts_earned`, `bottle_quantity`, `pts_deducted`, `acq_items`, `item_qty`, `service`, `timestamp`) VALUES
(1, '20214365', 50, 10, NULL, NULL, NULL, NULL, '2024-11-28 06:30:00'),
(2, '20214365', 30, 6, NULL, NULL, NULL, NULL, '2024-11-28 07:00:00'),
(3, '20214365', 20, 4, 0, '', 0, NULL, '2024-11-28 08:00:00'),
(4, '20214325', 30, 10, 0, '', 0, NULL, '2024-11-28 06:30:00'),
(5, '20214361', 30, 6, 0, '', 0, NULL, '2024-11-28 07:00:00'),
(6, '20214365', 20, 4, 0, '', 0, NULL, '2024-11-28 08:00:00'),
(7, '20214343', 5, 10, 0, '', 0, NULL, '2024-11-28 06:30:00'),
(8, '20214343', 3, 6, 0, '', 0, 'Vendo', '2024-11-28 07:00:00'),
(9, '20214343', 20, 4, 0, '', 0, 'Vendo', '2024-11-28 08:00:00'),
(10, '20214343', 50, 10, 0, '', 0, 'Vendo', '2024-11-29 02:59:24'),
(11, '20214365', 0, 0, 10, 'Pen', 34, 'Vendo', '2024-11-29 07:52:34'),
(12, '20214365', 0, 0, 110, 'Id Lace', 34, 'Printer', '2024-11-29 07:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(199) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `email` varchar(199) NOT NULL,
  `password` varchar(199) NOT NULL,
  `fname` varchar(199) NOT NULL,
  `mname` varchar(199) DEFAULT NULL,
  `lname` varchar(199) NOT NULL,
  `suffix` enum('Jr.','Sr.','II','III','IV','') DEFAULT NULL,
  `fullname` varchar(199) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `department` enum('BSCPE','BSECE','BSEE','BSME','BSCE','BSARCH') DEFAULT NULL,
  `restriction` enum('SUPERADMIN','ADMIN','USER','') NOT NULL DEFAULT 'USER',
  `status` enum('ACTIVE','LOCKED','INACTIVE','') NOT NULL DEFAULT 'ACTIVE',
  `points` int(199) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `fname`, `mname`, `lname`, `suffix`, `fullname`, `photo`, `department`, `restriction`, `status`, `points`, `created_at`) VALUES
(1, '20214365', 'Easd123mail@gmail.coma', '$2y$10$R13exV/Hqp.MNkqb7Mjjn.tdJkLeps0ibTEQ7vGnSUt93L441TKNq', 'Markyggb', 'Cee', 'Nuh', 'II', 'Markyggb Cee Nuh II', 'uploads/profile_pictures/20214365_1733205965.jpg', NULL, 'SUPERADMIN', 'ACTIVE', 12, '2024-11-12 05:55:19'),
(2, '20214343', 'Joemama@gmail.com', '$2y$10$LpavXn1sXnkUXGG1oGxtFOPw8dA7616zMsuXkSG2CYYO9DUHhZfyK', 'Joe', '', 'Mama', 'IV', 'Joe Mama IV', NULL, 'BSECE', 'USER', 'ACTIVE', 0, '2024-11-12 06:41:00'),
(4, '20213434', 'joemama1@gmail.com', '$2y$10$F20aka1xtHE.xie7m6XLC.cGQ1FqEbwjS6P7coCR2wWz.sD49gqCG', 'Joe', 'Ma', 'Ma', 'II', 'Joe Ma Ma II', NULL, 'BSEE', 'ADMIN', 'INACTIVE', 0, '2024-11-12 06:42:55'),
(5, '20212121', 'a;sldhaisdj@asijdoi', '$2y$10$2nxyx8ut4LD8a87A/VlTFOQZCmcfi0odBpbOuZP1fD/gmKc1JV3L6', 'asdsd', 'asdsd', 'asd', 'Sr.', 'asdsd asdsd asd Sr.', NULL, 'BSCPE', 'USER', 'ACTIVE', 0, '2024-11-27 12:36:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
