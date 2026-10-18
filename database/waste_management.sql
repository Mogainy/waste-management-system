-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2026 at 01:33 AM
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
-- Database: `waste_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection_requests`
--

CREATE TABLE `collection_requests` (
  `request_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `waste_type` varchar(100) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `pickup_address` text DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `status` enum('Pending','Assigned','In Progress','Completed','Cancelled') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `driver_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection_requests`
--

INSERT INTO `collection_requests` (`request_id`, `customer_id`, `waste_type`, `quantity`, `pickup_address`, `collection_date`, `status`, `created_at`, `driver_id`, `vehicle_id`) VALUES
(1, 1, 'Paper', '5 Bags', 'Embakasi', '2026-07-13', 'Pending', '2026-07-13 14:23:14', NULL, NULL),
(2, 1, 'Paper', '5 Bags', 'Embakasi', '2026-07-13', 'Pending', '2026-07-13 14:24:13', NULL, NULL),
(3, 1, 'Paper', '5 Bags', 'Embakasi', '2026-07-13', 'Pending', '2026-07-13 14:25:19', NULL, NULL),
(4, 1, 'Paper', '5 Bags', 'Embakasi', '2026-07-13', 'Pending', '2026-07-13 14:26:02', NULL, NULL),
(5, 1, 'Paper', '5 Bags', 'Embakasi', '2026-07-13', 'Pending', '2026-07-13 14:29:01', NULL, NULL),
(6, 1, 'Organic', '5 Bags', 'Embakasi', '2026-07-13', 'Pending', '2026-07-13 14:31:09', NULL, NULL),
(7, 1, 'Paper', '5 Bags', 'Embakasi', '2026-07-13', '', '2026-07-13 14:34:48', 2, 2),
(8, 1, 'Paper', '5 Bags', 'Embakasi', '2026-07-13', '', '2026-07-13 14:40:16', 2, 2),
(9, 2, 'General Waste', '3 Bags', '2ND SUNRISE APARTMENTS', '2026-07-13', 'Completed', '2026-07-13 19:55:57', 3, 3),
(10, 2, 'Organic', '5 Bags', '2ND SUNRISE APARTMENTS', '2026-07-14', 'Completed', '2026-07-13 21:40:08', 3, 4),
(11, 2, 'Metal', '400 metal bars', '3RD SUNSRISE APARTMENTS', '2026-07-14', 'Completed', '2026-07-13 23:10:57', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('Open','Resolved') DEFAULT 'Open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `estate` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `county` varchar(100) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `user_id`, `address`, `estate`, `town`, `county`, `latitude`, `longitude`) VALUES
(1, 2, NULL, 'Embakasi Village', 'Bungoma', 'Nairobi', NULL, NULL),
(2, 5, NULL, 'Village In', 'Wangige', 'Kiambu', NULL, NULL),
(3, 7, '2nd Sunrise', 'Village In', 'Wangige', 'Nairobi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `license_number` varchar(100) DEFAULT NULL,
  `national_id` varchar(20) NOT NULL,
  `status` enum('Available','Busy','Off Duty') DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `user_id`, `license_number`, `national_id`, `status`) VALUES
(1, 3, '09876543210', '0981234567', 'Available'),
(2, 4, '01-05-89067670', '342156789', 'Available'),
(3, 6, '01-05-89067670', '567843429', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `email`, `phone`, `address`) VALUES
(1, 'WasteMS', 'info@wastems.com', '0700000000', 'Nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','driver','customer') NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone`, `password`, `role`, `status`, `created_at`) VALUES
(1, 'System Administrator', 'admin@waste.com', '0700000000', '$2y$10$dDctyBOveQAUIQD5ZYQYPe7UXzuRYnYSoXIRg0WxNErSBdvGoP4c2', 'admin', 'Active', '2026-07-13 12:29:37'),
(2, 'Lydia Nyaboke ', 'Kimani@gmail.com', '0712345678', '$2y$10$14xAjnlmGjhT35VY/dE6Ue.fuSyNrnv3YLsv2LB1BdaPFklSAKf.q', 'customer', 'Active', '2026-07-13 13:38:03'),
(3, 'Ian', 'john@tracer.com', '0754234098', '$2y$10$KKQGeO1MQaDqKA4tnh6eHOYhytN/PY6jcwwXATLu8P.RPYYnJnBDe', 'driver', 'Active', '2026-07-13 13:44:25'),
(4, 'Glen Onyari', 'glen12@gmail.com', '0787654321', '$2y$10$NxoPq6H2WejdjdNN2aVlXOFS33YJo2Qwazrhynf2u.HJAqK0l1ik6', 'driver', 'Active', '2026-07-13 19:31:15'),
(5, 'Enock Mokaya', 'emmanuel@gmail.com', '0765432098', '$2y$10$HGMgiNca/d0zEcft7x5w7ufqaEWCTF8tjCHBDAYIZAqPzvMradxPe', 'customer', 'Active', '2026-07-13 19:44:07'),
(6, 'Sam Onyango', 'sam@gmail.com', '0712656743', '$2y$10$wV.SMJ7SbjvoT57h3VTqnONAdWrk7X/Jxbm7BUOu.R4aJUf6VSwK6', 'driver', 'Active', '2026-07-13 21:30:26'),
(7, 'Kevin Osoro', 'osoro@gmail.com', '0712345678', '$2y$10$EEIvOnJ1m19arMwrx7Rbr.bwX.1U8Qm0RNI/vlAyNAYNSGrzFG4CC', 'customer', 'Active', '2026-07-13 23:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `registration_number` varchar(30) DEFAULT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `capacity` varchar(50) DEFAULT NULL,
  `status` enum('Available','Busy','Maintenance') DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `registration_number`, `vehicle_type`, `capacity`, `status`) VALUES
(1, 'KDA 123A', 'Garbage Truck', '2', 'Busy'),
(2, 'KDB 456B', 'Skip Loader', '4', 'Busy'),
(3, 'KDC 789C', 'Pickup', '3', 'Available'),
(4, 'KDD 456D', 'Garbage Truck', '1', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `collection_requests`
--
ALTER TABLE `collection_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_requests`
--
ALTER TABLE `collection_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `collection_requests` (`request_id`),
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`driver_id`),
  ADD CONSTRAINT `assignments_ibfk_3` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`);

--
-- Constraints for table `collection_requests`
--
ALTER TABLE `collection_requests`
  ADD CONSTRAINT `collection_requests_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`assignment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
