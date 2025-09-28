-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 06:26 AM
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
-- Database: `easymart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_type` varchar(20) DEFAULT 'admin',
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstName`, `lastName`, `password`, `account_type`, `email`, `phone_number`, `address`) VALUES
(1, 'Admin', 'User1', 'admin1', 'admin', 'admin1@gmail.com', '0123456789', '123, Main Street, Colombo 01, Sri Lanka'),
(2, 'Admin', 'User2', 'admin2', 'admin', 'admin2@gmail.com', '0781234567', '456, Second Avenue, Kandy, Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `sellerid` int(11) DEFAULT NULL,
  `discountName` varchar(255) NOT NULL,
  `discountType` enum('percentage','fixed') NOT NULL,
  `discountValue` decimal(10,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  `startDay` date NOT NULL DEFAULT current_timestamp(),
  `endDay` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `sellerid`, `discountName`, `discountType`, `discountValue`, `description`, `startDay`, `endDay`, `status`) VALUES
(26, 2, 'Test', 'percentage', 123.00, 'ssfaf', '0000-00-00', '0000-00-00', 'active'),
(28, 4, '10:10 ', 'percentage', 20.00, 'Octomber 10 ', '2024-10-09', '2024-10-12', 'active'),
(29, 4, '11:11', 'percentage', 10.00, 'asdfg', '0456-03-12', '0456-03-12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `status` enum('new','pending','resolved') DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `name`, `email`, `description`, `DATE`, `status`) VALUES
(1, 'Nimal Perera', 'nimalperera@gmail.com', 'How can I track my order?', '2024-10-01', 'new'),
(2, 'Amara Fernando', 'amarasfernando@hotmail.com', 'Do you offer international shipping?', '2024-10-02', 'resolved');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `sellerid` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('Pending','Shipped','Delivered','Canceled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `name`, `sellerid`, `product_id`, `DATE`, `address`, `image`, `payment_method`, `price`, `status`) VALUES
(8, 2, 'Chamuditha Sanka', 2, 1, '2024-10-07', '3131231', NULL, 'bank_transfer', 1500.00, 'Pending'),
(11, 2, 'fd fff', 4, 5, '2024-10-10', 'fff', NULL, 'credit_card', 9000.00, 'Pending'),
(12, 2, 'fdd fdf', 4, 5, '2024-10-10', 'fddd', NULL, 'credit_card', 9000.00, 'Pending'),
(13, 1, 's s', 4, 6, '2024-10-10', 'w', NULL, 'credit_card', 6000.00, 'Pending'),
(14, 1, '', 2, 1, '2024-10-10', 'ws', 's s', 'credit_card', 7500.00, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `sellerid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `sellerid`, `name`, `description`, `price`, `image`, `category`, `quantity`) VALUES
(1, 2, 'Men\'s Cotton T-Shirt', 'High-quality cotton T-shirt for men.', 1500.00, 'mens_tshirt.jpg', 'Clothing', 50),
(5, 4, 'Wireless Headphones', 'High-quality wireless headphones for music lovers.', 9000.00, 'wireless_headphones.jpg', 'Electronics', 75),
(6, 4, 'Running Shoes', 'Comfortable running shoes for daily workouts.', 6000.00, 'running_shoes.jpg', 'Clothing', 40),
(8, 2, 'Iphone 13', 'lorem50', 199.00, 'iphone13.jpg', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `account_type` enum('customer','seller') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstName`, `lastName`, `email`, `password`, `phone_number`, `address`, `account_type`) VALUES
(1, 'Nimal', 'Perera', 'nimalperera@gmail.com', 'Nimal@123', '0123456789', 'Colombo, Sri Lanka', 'customer'),
(2, 'Kumar', 'Seneviratne', 'kumarseneviratne@yahoo.com', 'Kumar@456', '0123456790', 'Kandy, Sri Lanka', 'seller'),
(3, 'Amara', 'Fernando', 'amarasfernando@hotmail.com', 'Amara@789', '0123456791', 'Galle, Sri Lanka', 'customer'),
(4, 'Ravi', 'Jayasinghe', 'ravijayasinghe@gmail.com', 'Ravi@101', '0123456792', 'Negombo, Sri Lanka', 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`),
  ADD KEY `sellerid` (`sellerid`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sellerid` (`sellerid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `sellerid` (`sellerid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`sellerid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
