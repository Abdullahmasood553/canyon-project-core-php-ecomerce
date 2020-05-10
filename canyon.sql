-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 01:50 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'admin', 'admin'),
(2, 'abdullah', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `name`, `role`, `created_at`) VALUES
(1, 'Abdullah', 'Rider', '2019-05-24 19:18:43'),
(2, 'Haseeb', 'Rider', '2019-05-24 19:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `admin_msg` varchar(255) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seen_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `admin_msg`, `order_id`, `user_id`, `seen_status`, `created_at`) VALUES
(21, 'Delivery Sucessful', 'CBI-8456', 4, 1, '2019-06-12 21:45:30'),
(22, 'Delivery Sucessful', 'CBI-15231', 4, 1, '2019-06-14 00:51:45'),
(23, 'Delivery Sucessful', 'CBI-30322', 4, 1, '2019-06-15 10:52:54'),
(24, 'Delivery Sucessful', 'CBI-29932', 4, 1, '2019-06-15 13:14:00'),
(25, 'Delivery Sucessful', 'CBI-23235', 4, 1, '2019-06-15 13:18:51'),
(26, 'Delivery Sucessful', 'CBI-17126', 4, 1, '2019-06-15 13:46:19'),
(27, 'Delivery Sucessful', 'CBI-1678854700', 4, 1, '2019-06-17 05:56:21'),
(28, 'Delivery Sucessful', 'CBI-74482352', 4, 1, '2019-06-17 07:01:17'),
(29, 'Delivery Sucessful', 'CBI-1639377249', 5, 1, '2019-06-17 07:01:39'),
(30, 'Delivery Sucessful', 'CBI-1417220902', 5, 1, '2019-06-17 07:14:13'),
(31, 'Delivery Sucessful', 'CBI-608901247', 4, 1, '2019-06-17 07:22:35'),
(32, 'Delivery Sucessful', 'CBI-782747022', 5, 1, '2019-06-17 07:33:09'),
(33, 'Delivery Sucessful', 'CBI-313254091', 4, 1, '2019-06-17 07:33:56'),
(34, 'Delivery Sucessful', 'CBI-10750', 4, 1, '2019-06-17 07:42:29'),
(35, 'Delivery Sucessful', 'CBI-21262', 4, 0, '2019-06-17 07:50:19'),
(36, 'Delivery Sucessful', 'CBI-67960', 4, 0, '2019-06-20 06:14:57'),
(37, 'Delivery Sucessful', 'CBI-91231', 4, 0, '2019-06-20 08:17:25'),
(39, 'Delivery Sucessful', 'CBI-30730', 10, 0, '2019-06-20 08:25:56'),
(40, 'Delivery Sucessful', 'CBI-34847', 10, 0, '2019-06-20 10:53:12'),
(41, 'Delivery Sucessful', 'CBI-52232', 4, 0, '2019-06-20 12:03:03'),
(42, 'Delivery Sucessful', 'CBI-53739', 4, 0, '2019-06-20 12:06:14'),
(43, 'Delivery Sucessful', 'CBI-40741', 4, 0, '2019-06-20 12:06:30'),
(44, 'Delivery Sucessful', 'CBI-22902', 4, 0, '2019-06-20 12:14:00'),
(45, 'Delivery Sucessful', 'CBI-70321', 4, 0, '2019-06-20 12:14:46'),
(46, 'Delivery Sucessful', 'CBI-30974', 4, 0, '2019-06-20 12:24:52'),
(47, 'Delivery Sucessful', 'CBI-39452', 11, 0, '2019-06-20 13:28:18'),
(48, 'Delivery Sucessful', 'CBI-14125', 12, 0, '2019-06-21 12:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(250) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `total` int(255) NOT NULL,
  `p_names` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `seen_status` int(255) NOT NULL,
  `new_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `total`, `p_names`, `address`, `contact`, `user_id`, `seen_status`, `new_order`, `created_at`) VALUES
(91, 'CBI-8456', 330, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 1, 1, '2019-06-12 21:45:30'),
(92, 'CBI-15231', 280, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 1, 1, '2019-06-14 00:51:45'),
(93, 'CBI-30322', 75, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 1, 1, '2019-06-15 10:52:54'),
(94, 'CBI-29932', 345, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 1, '2019-06-15 13:14:00'),
(95, 'CBI-23235', 50, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 1, '2019-06-15 13:18:51'),
(96, 'CBI-17126', 50, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 1, '2019-06-15 13:46:19'),
(97, 'CBI-1678854700', 50, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 1, 1, '2019-06-17 05:56:21'),
(98, 'CBI-74482352', 100, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 1, '2019-06-17 07:01:17'),
(99, 'CBI-1639377249', 50, 'saad', '1598 Papineau Avenue', '03001234567', 5, 0, 1, '2019-06-17 07:01:39'),
(100, 'CBI-1417220902', 180, 'saad', '1598 Papineau Avenue', '03001234567', 5, 0, 1, '2019-06-17 07:14:13'),
(101, 'CBI-608901247', 50, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 1, '2019-06-17 07:22:35'),
(102, 'CBI-782747022', 25, 'saad', '1598 Papineau Avenue', '03001234567', 5, 0, 1, '2019-06-17 07:33:09'),
(103, 'CBI-313254091', 50, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 1, '2019-06-17 07:33:56'),
(104, 'CBI-10750', 150, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 1, 1, '2019-06-17 07:42:29'),
(105, 'CBI-21262', 90, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 1, '2019-06-17 07:50:19'),
(106, 'CBI-67960', 180, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 0, '2019-06-20 06:14:57'),
(107, 'CBI-91231', 320, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 0, '2019-06-20 08:17:25'),
(109, 'CBI-30730', 1430, 'Umer', 'lahore punjab pakistan', '12345', 10, 0, 0, '2019-06-20 08:25:56'),
(110, 'CBI-34847', 870, 'Umer', 'lahore punjab pakistan', '12345', 10, 0, 0, '2019-06-20 10:53:12'),
(111, 'CBI-52232', 140, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 0, '2019-06-20 12:03:03'),
(112, 'CBI-53739', 140, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 0, '2019-06-20 12:06:13'),
(113, 'CBI-40741', 140, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 0, '2019-06-20 12:06:30'),
(114, 'CBI-22902', 1570, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 0, '2019-06-20 12:14:00'),
(115, 'CBI-70321', 1010, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 0, '2019-06-20 12:14:46'),
(116, 'CBI-30974', 1010, 'Abdullah', '1598 Papineau Avenue', '03062320663', 4, 0, 0, '2019-06-20 12:24:52'),
(117, 'CBI-39452', 1430, 'arsalan', 'gujranwala punjab pakistan', '123456', 11, 0, 0, '2019-06-20 13:28:18'),
(118, 'CBI-14125', 1430, 'najeeb', 'gujranwala punjab pakistan', '0123', 12, 0, 0, '2019-06-21 12:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `product_cost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_no`, `product_id`, `product_name`, `quantity`, `product_cost`) VALUES
(1, 'CBI-8456', '2', '1.5 Lit', '3', '50'),
(2, 'CBI-8456', '1', '19 Lit', '2', '90'),
(3, 'CBI-15231', '1', '19 Lit', '2', '90'),
(4, 'CBI-15231', '2', '1.5 Lit', '2', '50'),
(5, 'CBI-30322', '3', '1/2 Lit', '3', '25'),
(6, 'CBI-29932', '1', '19 Lit', '3', '90'),
(7, 'CBI-29932', '3', '1/2 Lit', '1', '25'),
(8, 'CBI-29932', '2', '1.5 Lit', '1', '50'),
(9, 'CBI-23235', '3', '1/2 Lit', '2', '25'),
(10, 'CBI-17126', '3', '1/2 Lit', '2', '25'),
(11, 'CBI-1678854700', '3', '1/2 Lit', '2', '25'),
(12, 'CBI-74482352', '2', '1.5 Lit', '2', '50'),
(13, 'CBI-1639377249', '3', '1/2 Lit', '2', '25'),
(14, 'CBI-1417220902', '1', '19 Lit', '2', '90'),
(15, 'CBI-608901247', '3', '1/2 Lit', '2', '25'),
(16, 'CBI-782747022', '3', '1/2 Lit', '1', '25'),
(17, 'CBI-313254091', '2', '1.5 Lit', '1', '50'),
(18, 'CBI-10750', '2', '1.5 Lit', '3', '50'),
(19, 'CBI-21262', '1', '19 Lit', '1', '90'),
(20, 'CBI-67960', '1', '19 Lit', '2', '90'),
(33, 'CBI-91231', '2', '1.5 Lit', '1', '50'),
(34, 'CBI-91231', '1', '19 Lit', '3', '90'),
(38, 'CBI-30730', '1', '19 Lit', '2', '90'),
(39, 'CBI-30730', '101', 'New Empty Bottle', '2', '600'),
(40, 'CBI-30730', '2', '1.5 Lit', '1', '50'),
(41, 'CBI-34847', '1', '19 Lit', '3', '90'),
(42, 'CBI-34847', '101', 'New Empty Bottle', '1', '600'),
(43, 'CBI-52232', '2', '1.5 Lit', '1', '50'),
(44, 'CBI-52232', '1', '19 Lit', '1', '90'),
(45, 'CBI-53739', '2', '1.5 Lit', '1', '50'),
(46, 'CBI-53739', '1', '19 Lit', '1', '90'),
(47, 'CBI-40741', '2', '1.5 Lit', '1', '50'),
(48, 'CBI-40741', '1', '19 Lit', '1', '90'),
(49, 'CBI-22902', '2', '1.5 Lit', '2', '50'),
(50, 'CBI-22902', '1', '19 Lit', '3', '90'),
(51, 'CBI-22902', '101', 'New Empty Bottle', '2', '600'),
(52, 'CBI-70321', '3', '1/2 Lit', '2', '25'),
(53, 'CBI-70321', '1', '19 Lit', '4', '90'),
(54, 'CBI-70321', '101', 'New Empty Bottle', '1', '600'),
(55, 'CBI-30974', '2', '1.5 Lit', '1', '50'),
(56, 'CBI-30974', '1', '19 Lit', '4', '90'),
(57, 'CBI-30974', '101', 'New Empty Bottle', '1', '600'),
(58, 'CBI-39452', '2', '1.5 Lit', '1', '50'),
(59, 'CBI-39452', '1', '19 Lit', '2', '90'),
(60, 'CBI-39452', '101', 'New Empty Bottle', '2', '600'),
(61, 'CBI-14125', '2', '1.5 Lit', '1', '50'),
(62, 'CBI-14125', '1', '19 Lit', '2', '90'),
(63, 'CBI-14125', '101', 'New Empty Bottle', '2', '600');

-- --------------------------------------------------------

--
-- Table structure for table `order_old`
--

CREATE TABLE `order_old` (
  `order_id` int(250) NOT NULL,
  `p_names` varchar(250) NOT NULL,
  `product_cost` int(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `seen_status` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_old`
--

INSERT INTO `order_old` (`order_id`, `p_names`, `product_cost`, `address`, `quantity`, `product_id`, `user_id`, `seen_status`, `created_at`) VALUES
(71, '19 Lit', 90, 'Bahria', '2', '1', 5, 1, '2019-05-06 19:03:20'),
(81, '19 Lit', 90, 'Model Town Lahore', '								10', '1', 8, 1, '2019-05-07 21:09:34'),
(82, '19 Lit', 90, '1598 Papineau Avenue', '								10', '1', 5, 0, '2019-05-24 19:09:06'),
(83, '19 Lit', 90, 'bahria town lahore', '								3', '1', 5, 0, '2019-05-24 19:10:46'),
(84, '19 Lit', 90, '1598 Papineau Avenue', '								5', '1', 5, 0, '2019-06-10 15:35:42'),
(85, '1.5 Lit', 50, '1598 Papineau Avenue', '								5', '2', 5, 0, '2019-06-10 15:35:42'),
(86, '19 Lit', 90, '1598 Papineau Avenue', '								2', '1', 5, 0, '2019-06-13 16:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `product_type` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `c_price` int(250) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `details`, `image`, `product_type`, `price`, `c_price`, `brand`, `tags`, `time`) VALUES
(1, '19 Lit', '19 Litre Bottle', '19.png', 'bottle', 90, 150, 'polo', 'summer', '2018-12-04 16:08:54'),
(2, '1.5 Lit', '1.5 Litre Bottle', 'onePointFiveLiter.png', 'bottle', 50, 70, 'polo', 'summer', '2018-12-04 16:08:54'),
(3, '1/2 Lit', '1/2 Liter Bottle', 'halfLiter.png', 'bottle', 25, 35, 'polo', 'summer', '2018-12-04 16:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `new_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `address`, `ref_name`, `new_user`, `created_at`) VALUES
(4, 'Abdullah', '03062320663', '1598 Papineau Avenue', 'Saad', 1, '2019-04-27 19:08:42'),
(5, 'saad', '03001234567', '1598 Papineau Avenue', 'abdullah', 1, '2019-04-27 19:08:42'),
(7, 'shazaib', '2254545', 'model town', 'haseeb', 1, '2019-04-27 19:25:14'),
(8, 'Ali', '1122', 'bahria town lahore', 'haseeb', 1, '2019-05-07 21:06:48'),
(9, 'sidra', '123456789', 'bahria town lahore', 'haseeb', 1, '2019-05-18 18:08:08'),
(10, 'Umer', '12345', 'lahore punjab pakistan', 'abdullah', 1, '2019-06-20 06:23:39'),
(11, 'arsalan', '123456', 'gujranwala punjab pakistan', 'umer', 1, '2019-06-20 13:16:04'),
(12, 'najeeb', '0123', 'gujranwala punjab pakistan', 'arslan', 1, '2019-06-21 12:30:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_old`
--
ALTER TABLE `order_old`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_old`
--
ALTER TABLE `order_old`
  MODIFY `order_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
