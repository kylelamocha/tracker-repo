-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 02:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_ID`, `product_id`, `product_name`, `product_price`) VALUES
(6, 3, 'PB & J', 120);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`ID`, `name`) VALUES
(1, 'Rice Meals'),
(2, 'Sandwiches'),
(3, 'Espresso Drinks'),
(4, 'Non-Caffeinated Drinks'),
(5, 'Snacks'),
(6, 'Others'),
(7, 'Pasta'),
(8, 'Milk Tea'),
(9, 'Burgers');

-- --------------------------------------------------------

--
-- Table structure for table `guest_tbl`
--

CREATE TABLE `guest_tbl` (
  `g_id` int(11) NOT NULL,
  `guest_name` varchar(50) NOT NULL,
  `guest_timein` datetime NOT NULL,
  `guest_status` enum('Regular','Student') NOT NULL,
  `guest_rate` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_tbl`
--

INSERT INTO `guest_tbl` (`g_id`, `guest_name`, `guest_timein`, `guest_status`, `guest_rate`) VALUES
(1, 'asd', '0000-00-00 00:00:00', 'Regular', 11),
(2, 'ddd', '2024-09-26 14:10:00', 'Regular', 22),
(3, 'rrr', '2024-09-26 14:47:00', 'Student', 33),
(4, 'kylie', '2024-10-07 13:52:00', 'Regular', 111),
(5, 'lady gaga', '2024-10-08 12:34:00', 'Student', 100);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_ID` int(11) NOT NULL,
  `category_id` int(20) NOT NULL,
  `prod_img` varchar(100) DEFAULT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_price` int(11) DEFAULT NULL,
  `prod_stock` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1= Available, 2=Not Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_ID`, `category_id`, `prod_img`, `prod_name`, `prod_price`, `prod_stock`, `status`) VALUES
(1, 9, 'istockphoto-1775171327-1024x1024.jpg', 'Burger', 150, 2, 1),
(2, 8, 'th.jpg', 'Milktea', 90, 2, 1),
(3, 2, 'Turano_Fried_PB_J_04.jpg', 'PB & J', 120, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT '1= admin, 2=employee',
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin.aorbts', 'admin123', '2024-08-30 12:07:37'),
(2, 'emp.aorbts', 'empworkhub123', '2024-08-30 12:07:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_ID`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guest_tbl`
--
ALTER TABLE `guest_tbl`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guest_tbl`
--
ALTER TABLE `guest_tbl`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '1= admin, 2=employee', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
