-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 07:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htu_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `cost` decimal(20,0) UNSIGNED NOT NULL,
  `selling_price` decimal(20,0) UNSIGNED NOT NULL,
  `available_quantity` bigint(50) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `cost`, `selling_price`, `available_quantity`, `created_at`, `updated_at`) VALUES
(1, 'lorem1', '0', '0', 0, '2022-09-10 17:01:27', '2022-09-10 17:01:27'),
(2, 'lorem2', '0', '0', 0, '2022-09-10 17:01:27', '2022-09-10 17:01:27'),
(3, 'lorem3', '0', '0', 0, '2022-09-10 17:01:27', '2022-09-10 17:01:27'),
(4, 'lorem4', '0', '0', 0, '2022-09-10 17:01:27', '2022-09-10 17:01:27'),
(5, 'lorem5', '0', '0', 0, '2022-09-10 17:01:27', '2022-09-10 17:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'site_title', 'HTU Point of sale'),
(2, 'site_slogan', 'store management by HTU');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `total` bigint(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35'),
(2, 2, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35'),
(3, 1, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35'),
(4, 1, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35'),
(5, 2, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35'),
(6, 3, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35'),
(7, 1, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35'),
(8, 1, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35'),
(9, 1, 0, '2022-07-23 09:16:35', '2022-07-23 09:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_items`
--

CREATE TABLE `transactions_items` (
  `id` bigint(20) NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `roles` varchar(20) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `display_name`, `roles`, `registered_at`, `updated_on`) VALUES
(1, 'admin_user', 'admin@htucms.local', '123', 'Mike Portnoy', 'admin', '2022-07-22 08:52:20', '2022-09-10 16:48:45.069965'),
(2, 'testing_user', 'test@test.com', '12345', 'John Kelsy', 'accountant', '2022-07-22 11:23:37', '2022-09-10 16:48:45.069965'),
(3, 'lor', 'lor@ipsom.com', '123', 'Lorem Ipsum', 'seller', '2022-07-23 09:19:09', '2022-09-10 16:48:45.069965'),
(4, 'procurment', 'procurment@htu.com', '223465htu', 'procurment name', 'procurment', '2022-09-10 16:43:40', '2022-09-10 16:48:45.069965');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions_items`
--
ALTER TABLE `transactions_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dddd` (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions_items`
--
ALTER TABLE `transactions_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
