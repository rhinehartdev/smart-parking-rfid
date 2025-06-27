-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 08:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking_lot_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `action` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `vehicle_id`, `action`, `timestamp`) VALUES
(1, 7, 'check-in', '2024-11-22 17:42:20'),
(2, 12, 'check-in', '2024-11-22 17:42:20'),
(4, 10, 'check-in', '2024-11-22 17:42:37'),
(5, 13, 'check-in', '2024-11-22 17:42:37'),
(7, 10, 'check-out', '2024-11-22 17:44:18'),
(8, 13, 'check-out', '2024-11-22 17:44:18'),
(10, 7, 'check-out', '2024-11-22 17:44:23'),
(11, 12, 'check-out', '2024-11-22 17:44:23'),
(13, 7, 'check-in', '2024-11-22 17:47:13'),
(14, 12, 'check-in', '2024-11-22 17:47:13'),
(16, 10, 'check-in', '2024-11-22 17:47:22'),
(17, 13, 'check-in', '2024-11-22 17:47:22'),
(19, 7, 'check-out', '2024-11-22 17:50:41'),
(20, 12, 'check-out', '2024-11-22 17:50:41'),
(22, 10, 'check-out', '2024-11-22 17:50:46'),
(23, 13, 'check-out', '2024-11-22 17:50:46'),
(25, 7, 'check-in', '2024-11-22 17:59:12'),
(26, 12, 'check-in', '2024-11-22 17:59:12'),
(28, 10, 'check-in', '2024-11-22 17:59:23'),
(29, 13, 'check-in', '2024-11-22 17:59:23'),
(31, 7, 'check-out', '2024-11-22 18:41:06'),
(32, 12, 'check-out', '2024-11-22 18:41:06'),
(34, 10, 'check-out', '2024-11-22 18:42:15'),
(35, 13, 'check-out', '2024-11-22 18:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `parking_config`
--

CREATE TABLE `parking_config` (
  `id` int(11) NOT NULL,
  `total_slots` int(11) NOT NULL,
  `two_wheeler_slots` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_config`
--

INSERT INTO `parking_config` (`id`, `total_slots`, `two_wheeler_slots`) VALUES
(1, 200, 50),
(2, 100, 50);

-- --------------------------------------------------------

--
-- Table structure for table `rfid_table`
--

CREATE TABLE `rfid_table` (
  `id` int(11) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `scanned_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rfid_table`
--

INSERT INTO `rfid_table` (`id`, `rfid`, `scanned_at`) VALUES
(65, '4315ffe3', '2024-11-16 11:30:51'),
(66, '6b9835f', '2024-11-16 11:30:55'),
(67, '4315ffe3', '2024-11-16 11:33:11'),
(68, '4315ffe3', '2024-11-16 11:33:17'),
(69, '4315ffe3', '2024-11-16 11:33:20'),
(70, '6b9835f', '2024-11-16 12:47:26'),
(71, '4315ffe3', '2024-11-16 12:47:37'),
(72, '567944e', '2024-11-16 12:47:41'),
(73, '13dd90e2', '2024-11-16 12:48:11'),
(74, 'e68034e', '2024-11-16 13:01:14'),
(75, '567944e', '2024-11-20 19:17:55'),
(76, '567944e', '2024-11-20 19:26:02'),
(77, '13dd90e2', '2024-11-20 19:26:08'),
(78, '567944e', '2024-11-20 19:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','worker') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$gkkDe39mn0r337vN3TTHQexwLI6geeq/Khhc7oRFikR42N6NjKXdq', 'admin', '2024-11-16 06:43:17'),
(2, 'rhine', 'rhinehart.dejucos1901@gmail.com', '$2y$10$iEgvn22aSSG1bq55IC.H6u52AaWnIBQxaBkw3al/enc8NU8b4xA9a', 'worker', '2024-11-16 06:46:19'),
(3, 'rhinehart', 'test@gmail.com', '$2y$10$4ILpihLTsv8gqukXAiH38OmSVDOn7QWTZaG.kCuC4pfiB/bKnQgz2', 'worker', '2024-11-16 06:57:00'),
(4, 'test5', 'test5@gmail.com', '$2y$10$AIXaEjZx6WEc3YeVeC.QE.OLk5t2uJA/b8/nQMN.0lUiu8IXvDwDO', 'worker', '2024-11-16 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `vehicle_brand` varchar(100) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `checked_in` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_model`, `vehicle_type`, `vehicle_brand`, `owner_name`, `designation`, `created_at`, `checked_in`) VALUES
(7, 'abc', 'Two-wheeler', 'asdasdasd', 'test', '567944e', '2024-11-14 08:26:57', 0),
(8, 'abcd', 'Two-wheeler', 'asdasdasd', 'test', '4315ffe3', '2024-11-14 08:27:51', 0),
(9, 'sdadsad', 'Two-wheeler', 'test', 'test', '6b9835f', '2024-11-15 11:52:59', 0),
(10, 'nissan', 'Two-wheeler', 'skyline', 'paul walker', '13dd90e2', '2024-11-16 12:51:47', 0),
(11, 'test6', 'Two-wheeler', 'test', 'test', 'e68034e', '2024-11-16 13:01:50', 0),
(12, 'testest', 'Two-wheeler', 'tezt', 'testest', '567944e', '2024-11-20 19:18:40', 0),
(13, 'sir', 'Four-wheeler', 'sir', 'sir', '13dd90e2', '2024-11-20 19:26:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_log`
--

CREATE TABLE `vehicle_log` (
  `log_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `rfid` varchar(255) DEFAULT NULL,
  `action` enum('check-in','check-out') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `parking_config`
--
ALTER TABLE `parking_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfid_table`
--
ALTER TABLE `rfid_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_log`
--
ALTER TABLE `vehicle_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `parking_config`
--
ALTER TABLE `parking_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rfid_table`
--
ALTER TABLE `rfid_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vehicle_log`
--
ALTER TABLE `vehicle_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle_log`
--
ALTER TABLE `vehicle_log`
  ADD CONSTRAINT `vehicle_log_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
