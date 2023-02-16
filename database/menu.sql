-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2023 at 03:49 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexitd3_production_idm216`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `category` longtext COLLATE utf8_unicode_ci NOT NULL,
  `menu_item` longtext COLLATE utf8_unicode_ci NOT NULL,
  `item_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image_path` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category`, `menu_item`, `item_description`, `price`, `image_path`) VALUES
(1, 'burgers', 'classic', 'Classic cheeseburger with fries and a drink', 900, ''),
(2, 'burgers', 'royal', 'Royal cheeseburger topped with lettuce, tomato, and onion with French fries and a drink', 1000, ''),
(3, 'toppings', 'applewood smoked bacon', '', 200, ''),
(4, 'toppings', 'fresh cracked fried egg', '', 100, ''),
(5, 'toppings', 'sauteed mushrooms', '', 100, ''),
(6, 'toppings', 'fried onions', '', 100, ''),
(7, 'toppings', 'double meat', '', 500, ''),
(8, 'toppings', 'tomatoes', '', 0, ''),
(9, 'toppings', 'lettuce', '', 0, ''),
(10, 'toppings', 'pickles', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
