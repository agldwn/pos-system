-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2026 at 08:39 PM
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
-- Database: `pos_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Angeldwin Gapay', 'adgapay@fit.edu.ph', '09171234567', '2026-09-23 19:12:38'),
(2, 'Roxhene Mae', 'roxhene@gmail.com', '09181234567', '2026-09-23 19:12:38'),
(3, 'James Lebron', 'lebrondagot@gmail.com', '09191234567', '2026-09-23 19:12:38'),
(4, 'Austin Malone', 'ausmalone@gmail.com', '09201234567', '2026-09-23 19:12:38'),
(5, 'Iza Lang', 'izalang67@gmail.com', '09211234567', '2026-09-23 19:12:38'),
(6, 'Reese Li', 'reeseli@gmail.com', '09263115498', '2026-10-09 15:01:05'),
(7, 'Jelo Kuro', 'jelokuro@gmail.com', '0948312739', '2026-10-09 15:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'admin', '$2y$10$4jk3H7Plv9uu2v33Bx81C.lQXOTdejHocnq7lXfbZr3C0Scq.0OOy', 'Angeldwin Gapay', '1791560840_aed3a501967ee850fdb2.jpg', '2026-09-23 19:12:38'),
(2, 'cashier01', '$2y$10$4jk3H7Plv9uu2v33Bx81C.lQXOTdejHocnq7lXfbZr3C0Scq.0OOy', 'Roxhene Mae', NULL, '2026-09-23 19:12:38'),
(3, 'staff01', '$2y$10$4jk3H7Plv9uu2v33Bx81C.lQXOTdejHocnq7lXfbZr3C0Scq.0OOy', 'James Lebron', NULL, '2026-09-23 19:12:38'),
(4, 'manager01', '$2y$10$4jk3H7Plv9uu2v33Bx81C.lQXOTdejHocnq7lXfbZr3C0Scq.0OOy', 'Austin Malone', NULL, '2026-09-23 19:12:38'),
(5, 'cashier02', '$2y$10$4jk3H7Plv9uu2v33Bx81C.lQXOTdejHocnq7lXfbZr3C0Scq.0OOy', 'Iza Lang', NULL, '2026-09-23 19:12:38'),
(6, 'cashier03', '$2y$10$4jk3H7Plv9uu2v33Bx81C.lQXOTdejHocnq7lXfbZr3C0Scq.0OOy', 'Vee Ni', NULL, '2026-10-09 15:11:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
