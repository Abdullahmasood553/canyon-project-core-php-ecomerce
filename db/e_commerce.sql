-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE `admin_login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin_login` (`user_id`, `user_name`, `user_password`) VALUES
(1,	'admin',	'admin'),
(2,	'abdullah',	'123456');

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `delivery` (`id`, `name`, `role`, `created_at`) VALUES
(1,	'Abdullah',	'Rider',	'2019-05-24 19:18:43'),
(2,	'Haseeb',	'Rider',	'2019-05-24 19:18:43');

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_msg` varchar(255) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seen_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `notification` (`id`, `admin_msg`, `order_id`, `user_id`, `seen_status`, `created_at`) VALUES
(21,	'Delivery Sucessful',	'CBI-8456',	4,	1,	'2019-06-12 21:45:30'),
(22,	'Delivery Sucessful',	'CBI-15231',	4,	1,	'2019-06-14 00:51:45'),
(23,	'Delivery Sucessful',	'CBI-30322',	4,	1,	'2019-06-15 10:52:54'),
(24,	'Delivery Sucessful',	'CBI-29932',	4,	1,	'2019-06-15 13:14:00'),
(25,	'Delivery Sucessful',	'CBI-23235',	4,	1,	'2019-06-15 13:18:51'),
(26,	'Delivery Sucessful',	'CBI-17126',	4,	1,	'2019-06-15 13:46:19'),
(27,	'Delivery Sucessful',	'CBI-1678854700',	4,	1,	'2019-06-17 05:56:21'),
(28,	'Delivery Sucessful',	'CBI-74482352',	4,	1,	'2019-06-17 07:01:17'),
(29,	'Delivery Sucessful',	'CBI-1639377249',	5,	1,	'2019-06-17 07:01:39'),
(30,	'Delivery Sucessful',	'CBI-1417220902',	5,	1,	'2019-06-17 07:14:13'),
(31,	'Delivery Sucessful',	'CBI-608901247',	4,	1,	'2019-06-17 07:22:35'),
(32,	'Delivery Sucessful',	'CBI-782747022',	5,	1,	'2019-06-17 07:33:09'),
(33,	'Delivery Sucessful',	'CBI-313254091',	4,	1,	'2019-06-17 07:33:56'),
(34,	'Delivery Sucessful',	'CBI-10750',	4,	1,	'2019-06-17 07:42:29'),
(35,	'Delivery Sucessful',	'CBI-21262',	4,	0,	'2019-06-17 07:50:19');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(200) NOT NULL,
  `total` int(255) NOT NULL,
  `p_names` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `seen_status` int(255) NOT NULL,
  `new_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`id`, `order_no`, `total`, `p_names`, `address`, `contact`, `user_id`, `seen_status`, `new_order`, `created_at`) VALUES
(91,	'CBI-8456',	330,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	1,	1,	'2019-06-12 21:45:30'),
(92,	'CBI-15231',	280,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	1,	1,	'2019-06-14 00:51:45'),
(93,	'CBI-30322',	75,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	1,	1,	'2019-06-15 10:52:54'),
(94,	'CBI-29932',	345,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	0,	1,	'2019-06-15 13:14:00'),
(95,	'CBI-23235',	50,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	0,	1,	'2019-06-15 13:18:51'),
(96,	'CBI-17126',	50,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	0,	1,	'2019-06-15 13:46:19'),
(97,	'CBI-1678854700',	50,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	1,	1,	'2019-06-17 05:56:21'),
(98,	'CBI-74482352',	100,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	0,	1,	'2019-06-17 07:01:17'),
(99,	'CBI-1639377249',	50,	'saad',	'1598 Papineau Avenue',	'03001234567',	5,	0,	1,	'2019-06-17 07:01:39'),
(100,	'CBI-1417220902',	180,	'saad',	'1598 Papineau Avenue',	'03001234567',	5,	0,	1,	'2019-06-17 07:14:13'),
(101,	'CBI-608901247',	50,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	0,	1,	'2019-06-17 07:22:35'),
(102,	'CBI-782747022',	25,	'saad',	'1598 Papineau Avenue',	'03001234567',	5,	0,	1,	'2019-06-17 07:33:09'),
(103,	'CBI-313254091',	50,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	0,	1,	'2019-06-17 07:33:56'),
(104,	'CBI-10750',	150,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	1,	1,	'2019-06-17 07:42:29'),
(105,	'CBI-21262',	90,	'Abdullah',	'1598 Papineau Avenue',	'03062320663',	4,	0,	1,	'2019-06-17 07:50:19');

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(100) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `product_cost` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `order_items` (`id`, `order_no`, `product_id`, `product_name`, `quantity`, `product_cost`) VALUES
(1,	'CBI-8456',	'2',	'1.5 Lit',	'3',	'50'),
(2,	'CBI-8456',	'1',	'19 Lit',	'2',	'90'),
(3,	'CBI-15231',	'1',	'19 Lit',	'2',	'90'),
(4,	'CBI-15231',	'2',	'1.5 Lit',	'2',	'50'),
(5,	'CBI-30322',	'3',	'1/2 Lit',	'3',	'25'),
(6,	'',	'CBI-8456',	'',	'',	''),
(7,	'',	'CBI-15231',	'',	'',	''),
(8,	'',	'CBI-30322',	'',	'',	''),
(9,	'',	'CBI-8456',	'',	'',	''),
(10,	'',	'CBI-15231',	'',	'',	''),
(11,	'',	'CBI-30322',	'',	'',	''),
(12,	'',	'CBI-8456',	'',	'',	''),
(13,	'',	'CBI-15231',	'',	'',	''),
(14,	'',	'CBI-30322',	'',	'',	''),
(15,	'',	'CBI-8456',	'',	'',	''),
(16,	'',	'CBI-15231',	'',	'',	''),
(17,	'',	'CBI-30322',	'',	'',	''),
(18,	'CBI-29932',	'1',	'19 Lit',	'3',	'90'),
(19,	'CBI-29932',	'3',	'1/2 Lit',	'1',	'25'),
(20,	'CBI-29932',	'2',	'1.5 Lit',	'1',	'50'),
(21,	'CBI-23235',	'3',	'1/2 Lit',	'2',	'25'),
(22,	'CBI-17126',	'3',	'1/2 Lit',	'2',	'25'),
(23,	'CBI-1678854700',	'3',	'1/2 Lit',	'2',	'25'),
(24,	'CBI-74482352',	'2',	'1.5 Lit',	'2',	'50'),
(25,	'CBI-1639377249',	'3',	'1/2 Lit',	'2',	'25'),
(26,	'CBI-1417220902',	'1',	'19 Lit',	'2',	'90'),
(27,	'CBI-608901247',	'3',	'1/2 Lit',	'2',	'25'),
(28,	'CBI-782747022',	'3',	'1/2 Lit',	'1',	'25'),
(29,	'CBI-313254091',	'2',	'1.5 Lit',	'1',	'50'),
(30,	'CBI-10750',	'2',	'1.5 Lit',	'3',	'50'),
(31,	'CBI-21262',	'1',	'19 Lit',	'1',	'90');

DROP TABLE IF EXISTS `order_old`;
CREATE TABLE `order_old` (
  `order_id` int(250) NOT NULL AUTO_INCREMENT,
  `p_names` varchar(250) NOT NULL,
  `product_cost` int(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `seen_status` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `order_old` (`order_id`, `p_names`, `product_cost`, `address`, `quantity`, `product_id`, `user_id`, `seen_status`, `created_at`) VALUES
(71,	'19 Lit',	90,	'Bahria',	'2',	'1',	5,	1,	'2019-05-06 19:03:20'),
(81,	'19 Lit',	90,	'Model Town Lahore',	'								10',	'1',	8,	1,	'2019-05-07 21:09:34'),
(82,	'19 Lit',	90,	'1598 Papineau Avenue',	'								10',	'1',	5,	0,	'2019-05-24 19:09:06'),
(83,	'19 Lit',	90,	'bahria town lahore',	'								3',	'1',	5,	0,	'2019-05-24 19:10:46'),
(84,	'19 Lit',	90,	'1598 Papineau Avenue',	'								5',	'1',	5,	0,	'2019-06-10 15:35:42'),
(85,	'1.5 Lit',	50,	'1598 Papineau Avenue',	'								5',	'2',	5,	0,	'2019-06-10 15:35:42'),
(86,	'19 Lit',	90,	'1598 Papineau Avenue',	'								2',	'1',	5,	0,	'2019-06-13 16:50:04');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(250) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `product_type` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `c_price` int(250) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `tags` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`product_id`, `product_name`, `details`, `image`, `product_type`, `price`, `c_price`, `brand`, `tags`, `time`) VALUES
(1,	'19 Lit',	'19 Litre Bottle',	'19.png',	'bottle',	90,	150,	'polo',	'summer',	'2018-12-04 16:08:54'),
(2,	'1.5 Lit',	'1.5 Litre Bottle',	'onePointFiveLiter.png',	'bottle',	50,	70,	'polo',	'summer',	'2018-12-04 16:08:54'),
(3,	'1/2 Lit',	'1/2 Liter Bottle',	'halfLiter.png',	'bottle',	25,	35,	'polo',	'summer',	'2018-12-04 16:08:54');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `name`, `contact`, `address`, `ref_name`, `created_at`) VALUES
(4,	'Abdullah',	'03062320663',	'1598 Papineau Avenue',	'Saad',	'2019-04-27 19:08:42'),
(5,	'saad',	'03001234567',	'1598 Papineau Avenue',	'abdullah',	'2019-04-27 19:08:42'),
(7,	'shazaib',	'2254545',	'model town',	'haseeb',	'2019-04-27 19:25:14'),
(8,	'Ali',	'1122',	'bahria town lahore',	'haseeb',	'2019-05-07 21:06:48'),
(9,	'sidra',	'123456789',	'bahria town lahore',	'haseeb',	'2019-05-18 18:08:08');

-- 2019-06-17 12:46:31
