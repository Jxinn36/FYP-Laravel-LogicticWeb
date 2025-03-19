-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 01:28 PM
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
-- Database: `movematedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advID` int(10) NOT NULL,
  `advName` varchar(255) DEFAULT NULL,
  `advDesc` varchar(255) DEFAULT NULL,
  `advImg` varchar(255) DEFAULT NULL,
  `advCompany` varchar(255) DEFAULT NULL,
  `companyRegisNo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advID`, `advName`, `advDesc`, `advImg`, `advCompany`, `companyRegisNo`, `created_at`, `updated_at`, `deleted`) VALUES
(14, 'abc test1', 'njn', '1702725591.jpg', 'asss', 'ghj', '2023-12-16 11:19:51', '2023-12-16 11:19:51', NULL),
(15, 'abc', 'fdgvdf', '1702746676.jpg', 'abc', '123', '2023-12-16 17:11:16', '2023-12-16 17:11:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carrier`
--

CREATE TABLE `carrier` (
  `carrierID` int(255) NOT NULL,
  `fullName` varchar(30) DEFAULT NULL,
  `phNum` varchar(15) DEFAULT NULL,
  `ICnum` varchar(15) DEFAULT NULL,
  `vehicleNum` varchar(10) DEFAULT NULL,
  `orderID` varchar(255) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrier`
--

INSERT INTO `carrier` (`carrierID`, `fullName`, `phNum`, `ICnum`, `vehicleNum`, `orderID`, `userID`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Justin Bieber', '012-9261881', '982736-14-9736', NULL, '', NULL, NULL, NULL, NULL),
(2, 'hailey', '019-4627639', '963511-10-9918', NULL, '', NULL, NULL, NULL, NULL),
(113162451, NULL, NULL, NULL, NULL, '444', 3, NULL, NULL, NULL),
(310181894, NULL, NULL, NULL, NULL, '436', 3, NULL, NULL, NULL),
(333947309, NULL, NULL, NULL, NULL, '443', 3, NULL, NULL, NULL),
(395052239, NULL, NULL, NULL, NULL, '448', 3, NULL, NULL, NULL),
(627671849, NULL, NULL, NULL, NULL, '442', 3, NULL, NULL, NULL),
(907447881, NULL, NULL, NULL, NULL, '447', 3, NULL, NULL, NULL),
(1104809284, NULL, NULL, NULL, NULL, '446', 3, NULL, NULL, NULL),
(1312978820, NULL, NULL, NULL, NULL, '440', 3, NULL, NULL, NULL),
(1689970413, NULL, NULL, NULL, NULL, '441', 3, NULL, NULL, NULL),
(1822594192, NULL, NULL, NULL, NULL, '435', 3, NULL, NULL, NULL),
(1822594193, NULL, NULL, NULL, NULL, '451', 3, '2023-12-16 10:27:45', '2023-12-16 10:27:45', NULL),
(1822594194, NULL, NULL, NULL, NULL, '452', 3, '2023-12-16 10:51:30', '2023-12-16 10:51:30', NULL),
(1822594195, NULL, NULL, NULL, NULL, '453', 3, '2023-12-16 12:10:25', '2023-12-16 12:10:25', NULL),
(1822594196, NULL, NULL, NULL, NULL, '454', 3, '2023-12-16 17:23:20', '2023-12-16 17:23:20', NULL),
(1822594197, NULL, NULL, NULL, NULL, '455', 3, '2023-12-21 09:00:01', '2023-12-21 09:00:01', NULL),
(1822594198, NULL, NULL, NULL, NULL, '456', 3, '2023-12-24 11:19:52', '2023-12-24 11:19:52', NULL),
(1822594199, NULL, NULL, NULL, NULL, '457', 3, '2023-12-24 11:20:19', '2023-12-24 11:20:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `shipperID` int(11) DEFAULT NULL,
  `pickAddress` varchar(255) DEFAULT NULL,
  `dropAddress` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `vehicleID` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `deliveryStatus` enum('deliver','pending','receive') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  `dropMobile` varchar(20) DEFAULT NULL,
  `dropName` varchar(255) DEFAULT NULL,
  `midstop1` varchar(255) DEFAULT NULL,
  `midstop2` varchar(255) DEFAULT NULL,
  `midstop3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `shipperID`, `pickAddress`, `dropAddress`, `remark`, `vehicleID`, `amount`, `deliveryStatus`, `created_at`, `updated_at`, `deleted`, `dropMobile`, `dropName`, `midstop1`, `midstop2`, `midstop3`) VALUES
(453, 477, 'testt', 'hsakdj', NULL, NULL, NULL, 'deliver', '2023-12-16 12:10:14', '2023-12-24 11:23:49', NULL, '019-2918829', 'DRP', NULL, NULL, NULL),
(454, 478, 'testt', 'hsakdj', NULL, NULL, NULL, 'receive', '2023-12-16 17:09:02', '2023-12-16 17:23:56', NULL, '019-2918829', 'DRP', NULL, NULL, NULL),
(455, 479, 'ABC jln', 'xyz jalan', NULL, NULL, NULL, 'pending', '2023-12-16 17:10:09', '2023-12-21 09:00:01', NULL, '019-2918829', 'sharan', NULL, NULL, NULL),
(456, 480, 'testing', 'dasdasdsf', NULL, NULL, NULL, 'pending', '2023-12-22 05:36:36', '2023-12-24 11:19:52', NULL, '019-2918829', 'xa', NULL, NULL, NULL),
(457, 481, 'ABC jln', 'hsakdj', NULL, NULL, NULL, 'pending', '2023-12-22 05:39:34', '2023-12-24 11:20:19', NULL, '019-2918829', 'DRP', NULL, NULL, NULL),
(458, 482, 'testt', 'xyz jalan', NULL, NULL, NULL, NULL, '2023-12-24 11:17:27', '2023-12-24 11:17:27', NULL, '019-2918829', 'lee Jia Xin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `totalBill` decimal(10,2) DEFAULT NULL,
  `shipperID` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `totalBill`, `shipperID`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 100.00, 456, '2023-12-05 11:26:36', '2023-12-05 11:26:36', NULL),
(2, 15.00, 457, '2023-12-05 11:27:06', '2023-12-05 11:27:06', NULL),
(3, 15.00, 458, '2023-12-05 11:33:01', '2023-12-05 11:33:01', NULL),
(4, 15.00, 459, '2023-12-05 11:35:07', '2023-12-05 11:35:07', NULL),
(5, 15.00, 460, '2023-12-05 11:57:11', '2023-12-05 11:57:11', NULL),
(6, 15.00, 461, '2023-12-05 16:03:31', '2023-12-05 16:03:31', NULL),
(7, 15.00, 462, '2023-12-05 16:08:28', '2023-12-05 16:08:28', NULL),
(8, 100.00, 463, '2023-12-05 16:08:48', '2023-12-05 16:08:48', NULL),
(9, 100.00, 464, '2023-12-05 16:14:18', '2023-12-05 16:14:18', NULL),
(10, 100.00, 465, '2023-12-05 16:18:23', '2023-12-05 16:18:23', NULL),
(11, 15.00, 466, '2023-12-05 16:22:40', '2023-12-05 16:22:40', NULL),
(12, 100.00, 467, '2023-12-05 16:22:56', '2023-12-05 16:22:56', NULL),
(13, 15.00, 468, '2023-12-05 16:23:43', '2023-12-05 16:23:43', NULL),
(14, 100.00, 469, '2023-12-05 16:29:58', '2023-12-05 16:29:58', NULL),
(15, 100.00, 470, '2023-12-05 17:45:57', '2023-12-05 17:45:57', NULL),
(16, 15.00, 471, '2023-12-05 17:46:47', '2023-12-05 17:46:47', NULL),
(17, 15.00, 472, '2023-12-05 18:02:47', '2023-12-05 18:02:47', NULL),
(18, 15.00, 473, '2023-12-06 05:30:34', '2023-12-06 05:30:34', NULL),
(19, 15.00, 474, '2023-12-15 01:36:29', '2023-12-15 01:36:29', NULL),
(20, 15.00, 475, '2023-12-16 10:27:09', '2023-12-16 10:27:09', NULL),
(21, 15.00, 476, '2023-12-16 10:51:16', '2023-12-16 10:51:16', NULL),
(22, 15.00, 477, '2023-12-16 12:10:14', '2023-12-16 12:10:14', NULL),
(23, 15.00, 478, '2023-12-16 17:09:02', '2023-12-16 17:09:02', NULL),
(24, 100.00, 479, '2023-12-16 17:10:09', '2023-12-16 17:10:09', NULL),
(25, 15.00, 480, '2023-12-22 05:36:36', '2023-12-22 05:36:36', NULL),
(26, 100.00, 481, '2023-12-22 05:39:34', '2023-12-22 05:39:34', NULL),
(27, 15.00, 482, '2023-12-24 11:17:27', '2023-12-24 11:17:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleName`, `created_at`, `deleted`) VALUES
(1, 'Carrier', NULL, NULL),
(2, 'Shipper', NULL, NULL),
(3, 'admin', '2023-12-06 11:08:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `shipperID` int(11) NOT NULL,
  `fullName` varchar(30) DEFAULT NULL,
  `phNum` varchar(15) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  `paymentID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`shipperID`, `fullName`, `phNum`, `orderID`, `paymentID`, `userID`, `created_at`, `updated_at`, `deleted`) VALUES
(475, 'lee Jia Xin', '010-5032290', NULL, NULL, NULL, '2023-12-16 10:27:09', '2023-12-16 10:27:09', NULL),
(476, 'lee Jia Xin', '010-5032209', NULL, NULL, NULL, '2023-12-16 10:51:16', '2023-12-16 10:51:16', NULL),
(477, 'lee Jia Xin', '010-5032290', NULL, NULL, NULL, '2023-12-16 12:10:14', '2023-12-16 12:10:14', NULL),
(478, 'lee Jia Xin', '010-5032290', NULL, NULL, NULL, '2023-12-16 17:09:02', '2023-12-16 17:09:02', NULL),
(479, 'alii', '010-5032454', NULL, NULL, NULL, '2023-12-16 17:10:09', '2023-12-16 17:10:09', NULL),
(480, 'jx', '011-5248896', NULL, NULL, NULL, '2023-12-22 05:36:36', '2023-12-22 05:36:36', NULL),
(481, 'lee Jia Xin', '010-5032290', NULL, NULL, NULL, '2023-12-22 05:39:34', '2023-12-22 05:39:34', NULL),
(482, 'lee Jia Xin', '010-5032290', NULL, NULL, NULL, '2023-12-24 11:17:26', '2023-12-24 11:17:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `roleID`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'jia xin', '$2y$10$ftexG3WjjBaX8x0zg/VsU.hyYGdye0zWaoPdhNzR62haHRR.sksQ2', 'jx@gmail.com', 2, '2023-12-06 03:05:48', '2023-12-06 03:05:48', NULL),
(2, 'adminLee', '$2y$10$ldlibkQDsY8RFseMFAxJK.wafYaJtH2DYEotM6EMekeVhFgBNi6C6', 'admin@gmail.com', 3, '2023-12-06 03:06:41', '2023-12-06 03:06:41', NULL),
(3, 'Im Carrier', '$2y$10$diTYPQSlLSz/6SSjscTol.4iUIXoz2olgirteUQqtPlHlef606GGG', 'carrier@gmail.com', 1, '2023-12-06 03:07:22', '2023-12-06 03:07:22', NULL),
(4, 'Lee Jia Xin', '$2y$10$zm0a.V8ZBsErEREngqJ4IO5aLLUjfbVDNU1dgU3qXt5M8yFZevJ0y', 'ljiaxin56@gmail.com', 2, '2023-12-06 06:08:38', '2023-12-06 06:08:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicleID` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `noPlate` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicleID`, `type`, `noPlate`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'car', 'ABC123', NULL, NULL, NULL),
(2, 'lorry', 'XYZ789', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advID`);

--
-- Indexes for table `carrier`
--
ALTER TABLE `carrier`
  ADD PRIMARY KEY (`carrierID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `shipperID` (`shipperID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `shipperID` (`shipperID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shipperID`),
  ADD KEY `shipper_ibfk_1` (`orderID`),
  ADD KEY `shipper_ibfk_2` (`paymentID`),
  ADD KEY `shipper_ibfk_3` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `carrier`
--
ALTER TABLE `carrier`
  MODIFY `carrierID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1822594200;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipperID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrier`
--
ALTER TABLE `carrier`
  ADD CONSTRAINT `connect_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `shipper`
--
ALTER TABLE `shipper`
  ADD CONSTRAINT `shipper_ibfk_2` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`),
  ADD CONSTRAINT `shipper_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
