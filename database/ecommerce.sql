-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2023 at 09:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `product_id`, `quantity`, `customer_id`) VALUES
(31, 'cartaf8b611492ec456dc3c01b92ca91ada863e488f8', 2, 1, NULL),
(49, 'cart2f401a49fe89e3503082ac7bb440a5e56503554f', 3, 100, NULL),
(60, 'cartec7717609584946eb4864107c57e5e6b09c8452e', 2, 3, NULL),
(69, 'cartc4c68ff3e55a5c2ad7d1d6467f1ba98067b011ad', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Night Dresses'),
(2, 'Bags'),
(3, 'Shoes'),
(4, 'Shirts'),
(5, 'Jeans');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Default', 'daudimwesige100@gmail.com', 'Quotati (6565596H)  From Akasia Kariakoo Pharmacy', 'fhbfd'),
(2, 'Default', 'daudimwesige100@gmail.com', 'Quotati (6565596H)  From Akasia Kariakoo Pharmacy', 'c efe- ie'),
(3, 'Default', 'daudimwesige100@gmail.com', 'Quotati (6565596H)  From Akasia Kariakoo Pharmacy', 'c efe- ie'),
(4, 'Default', 'daudimwesige100@gmail.com', 'Quotati (6565596H)  From Akasia Kariakoo Pharmacy', 'cyec8be09e'),
(5, 'Default', 'daudimwesige100@gmail.com', 'Quotati (6565596H)  From Akasia Kariakoo Pharmacy', 'v'),
(14, 'ds', 'ddf', 'dfeer', ''),
(15, 'r', '1', '2', ''),
(16, 'r', '1', '2', ''),
(17, '1', '2', '3', ''),
(18, '1', '2', '3', ''),
(19, 'david', 'david.daniel@shulesoft.africa', 'DAVID', ''),
(20, 'david', 'david.daniel@shulesoft.africa', 'DAVID', ''),
(21, '1', '2', '3', ''),
(22, '1', '2', '3', ''),
(23, 'ujfid', '1', '2', ''),
(24, '2', '2', '2', '2'),
(25, '2', '2', '2', '2'),
(28, 'David Daniel', 'david.daniel@shulesoft.africa', 'Product Discount', 'I want to know more about products discount');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `mobile`, `username`, `password`, `city`, `country`) VALUES
(3, 'david daniel', 'david@gmail.com', '120 BLOCK DAR', '+25574341788', 'david', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'DAR', 'Tanzania'),
(4, 'david daniel', 'david@gmail.com', '120 BLOCK DAR', '+25574341788', 'david', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 'DAR', 'Tanzania'),
(5, 'david daniel', 'david@gmail.com', '120 BLOCK DAR', '+25574341788', 'david', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 'DAR', 'Tanzania'),
(6, 'david daniel', 'david@gmail.com', '120 BLOCK DAR', '+25574341788', 'david', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 'DAR', 'Tanzania'),
(11, '', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(12, 'John Bocco', 'david@gmail.com', '150 BLOCK DAR', '+25574341788', 'john', '7c222fb2927d828af22f592134e8932480637c0d', 'Tanga', 'Tanzania'),
(13, '', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(14, '', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(15, '', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(16, '', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `product_id`) VALUES
(1, 'product-1.jpg', 2),
(2, 'product-2.jpg', 2),
(3, 'product-3.jpg', 2),
(5, 'Screenshot_from_2023-05-17_01-12-07.png', 1),
(6, 'Screenshot_from_2023-05-17_01-09-07.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`) VALUES
(229, 'Dress'),
(230, 'Jeans'),
(231, 'T-Shirt'),
(232, 'Jeans'),
(233, 'Sweater'),
(234, 'Jeans');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `customer_id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `date`, `status`, `customer_id`, `payment_method`, `created_at`) VALUES
(3, '2700', '2023-05-16 21:48:25', 'Over', 3, 'Cash', '2023-05-17 21:09:50'),
(4, '2700', '2023-05-16 21:53:52', 'Pending', 4, 'Cash', '2023-05-17 21:09:50'),
(5, '2700', '2023-01-16 21:54:10', 'Payed', 5, 'Cash', '2023-05-17 21:09:50'),
(6, '2700', '2023-02-16 21:54:56', 'Pending', 6, 'Cash', '2023-05-17 21:09:50'),
(10, '1400', '2023-01-20 08:26:46', 'Over', 11, 'Cash', '2023-05-20 08:26:46'),
(11, '2446', '2023-05-21 09:58:29', 'Pending', 12, 'Cash', '2023-05-21 09:58:29'),
(12, '323', '2023-04-21 16:26:03', 'Pending', 13, 'Cash', '2023-05-21 16:26:03'),
(13, '0', '2023-05-21 16:26:24', 'Pending', 14, 'Cash', '2023-05-21 16:26:24'),
(14, '800', '2023-05-21 16:31:06', 'Pending', 15, 'Cash', '2023-05-21 16:31:06'),
(15, '0', '2023-05-24 17:35:35', 'Pending', 16, 'Cash', '2023-05-24 17:35:35'),
(16, '300', '2023-05-24 19:08:19', 'Pending', 3, 'Cash', '2023-05-24 19:08:19'),
(17, '369', '2023-05-24 19:13:50', 'Pending', 3, 'Cash', '2023-05-24 19:13:50'),
(18, '9500', '2023-05-24 19:16:02', 'Pending', 3, 'Cash', '2023-05-24 19:16:02'),
(19, '900', '2023-05-24 19:19:18', 'Pending', 3, 'Cash', '2023-05-24 19:19:18'),
(20, '100', '2023-05-24 19:20:33', 'Pending', 3, 'Cash', '2023-05-24 19:20:33'),
(21, '300', '2023-05-24 19:32:14', 'Pending', 3, 'Cash', '2023-05-24 19:32:14'),
(22, '300', '2023-05-24 19:32:50', 'Pending', 3, 'Cash', '2023-05-24 19:32:50'),
(23, '300', '2023-05-24 19:33:24', 'Pending', 3, 'Cash', '2023-05-24 19:33:24'),
(24, '200', '2023-05-28 18:32:48', 'Pending', 3, 'Cash', '2023-05-28 18:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `quantity`, `price`, `order_id`, `created_at`) VALUES
(4, 3, 3, '200', 3, '2023-05-17 21:09:14'),
(5, 3, 8, '200', 3, '2023-05-17 21:09:14'),
(6, 2, 5, '100', 3, '2023-05-17 21:09:14'),
(7, 3, 3, '200', 4, '2023-05-17 21:09:14'),
(8, 3, 8, '200', 4, '2023-05-17 21:09:14'),
(9, 2, 5, '100', 4, '2023-05-17 21:09:14'),
(10, 3, 3, '200', 5, '2023-05-17 21:09:14'),
(11, 3, 8, '200', 5, '2023-05-17 21:09:14'),
(12, 2, 5, '100', 5, '2023-05-17 21:09:14'),
(13, 3, 3, '200', 6, '2023-05-17 21:09:14'),
(14, 3, 8, '200', 6, '2023-05-17 21:09:14'),
(15, 2, 5, '100', 6, '2023-05-17 21:09:14'),
(20, 2, 8, '100', 10, '2023-05-20 08:26:47'),
(21, 3, 3, '200', 10, '2023-05-20 08:26:47'),
(22, 1, 2, '123', 11, '2023-05-21 09:58:29'),
(23, 5, 2, '900', 11, '2023-05-21 09:58:29'),
(24, 4, 2, '100', 11, '2023-05-21 09:58:29'),
(25, 2, 2, '100', 11, '2023-05-21 09:58:29'),
(26, 2, 2, '100', 12, '2023-05-21 16:26:03'),
(27, 1, 1, '123', 12, '2023-05-21 16:26:03'),
(28, 2, 6, '100', 14, '2023-05-21 16:31:06'),
(29, 3, 1, '200', 14, '2023-05-21 16:31:06'),
(30, 2, 3, '100', 16, '2023-05-24 19:08:19'),
(31, 1, 3, '123', 17, '2023-05-24 19:13:50'),
(32, 2, 5, '100', 18, '2023-05-24 19:16:02'),
(33, 5, 10, '900', 18, '2023-05-24 19:16:02'),
(34, 2, 3, '100', 19, '2023-05-24 19:19:18'),
(35, 3, 3, '200', 19, '2023-05-24 19:19:18'),
(36, 4, 1, '100', 20, '2023-05-24 19:20:33'),
(37, 2, 3, '100', 21, '2023-05-24 19:32:14'),
(38, 2, 3, '100', 22, '2023-05-24 19:32:50'),
(39, 2, 3, '100', 23, '2023-05-24 19:33:24'),
(40, 3, 1, '200', 24, '2023-05-28 18:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE `order_payments` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `amount` double NOT NULL,
  `order_id` int(11) NOT NULL,
  `payed_by` varchar(255) DEFAULT NULL COMMENT 'payment method'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_payments`
--

INSERT INTO `order_payments` (`id`, `date`, `created_by`, `amount`, `order_id`, `payed_by`) VALUES
(1, '2023-05-18 18:04:07', 1, 200, 5, NULL),
(2, '2023-05-18 18:04:07', 1, 250, 3, NULL),
(3, '2023-05-20 14:53:05', 1, 50, 10, 'cash'),
(4, '2023-05-20 14:54:10', 1, 1350, 10, 'cash'),
(5, '2023-05-20 15:09:38', 1, 90, 10, 'cash'),
(6, '2023-05-20 15:13:05', 1, 2700, 3, 'cash'),
(7, '2023-05-20 15:21:27', 1, 1500, 5, 'cash'),
(8, '2023-05-20 15:22:16', 1, 500, 5, 'cash'),
(9, '2023-05-20 20:06:39', 1, 500, 5, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `old_price` decimal(10,0) NOT NULL,
  `quantity` int(100) NOT NULL,
  `short_description` varchar(180) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `old_price`, `quantity`, `short_description`, `description`, `image`, `category_id`) VALUES
(1, 'T-Shirt', '70', '100', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-1.jpg', 1),
(2, 'Jeans', '100', '110', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-2.jpg', 1),
(3, 'Dress', '200', '0', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-3.jpg', 1),
(4, 'Blouse', '560', '800', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-4.jpg', 1),
(5, 'Sweater', '281', '401', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-5.jpg', 2),
(11, 'T-shirt', '70', '100', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-1.jpg', 1),
(13, 'Dress', '200', '0', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-3.jpg', 1),
(14, 'Blouse', '560', '800', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-4.jpg', 1),
(15, 'Sweater', '281', '401', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-5.jpg', 2),
(16, 'Hoodie', '70', '100', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-1.jpg', 1),
(17, 'Skirt', '100', '110', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-2.jpg', 1),
(18, 'Shorts', '200', '0', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-3.jpg', 1),
(19, 'Jacket', '560', '800', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-4.jpg', 1),
(20, 'Pants', '281', '401', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-5.jpg', 2),
(21, 'Blazer', '70', '100', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-1.jpg', 1),
(22, 'Tank top', '100', '110', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-2.jpg', 1),
(23, 'Cardigan', '200', '0', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-3.jpg', 1),
(24, 'Leggings', '560', '800', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-4.jpg', 1),
(25, 'Jumpsuit', '281', '401', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-5.jpg', 2),
(26, 'Coat', '101', '111', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-2.jpg', 2),
(27, 'Polo shirt', '201', '1', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-3.jpg', 2),
(28, 'Sweatshirt', '561', '801', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-4.jpg', 2),
(29, 'Romper', '282', '402', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.', 'product-5.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `date`, `content`, `product_id`) VALUES
(1, 'David Daniel', 'david@gmail.vcom', '2023-05-15 20:34:54', 'It is a good product with high quality. It recommend it to everyone', 2),
(2, 'Ludovick Konyo', 'ludovick$gmail.com', '2023-05-15 20:34:54', 'very nice product. I have been looking for it for a long time', 2),
(3, 'Ally Juma', 'all.juma@gmail.com', '2023-05-16 05:32:38', 'Good product', 3),
(4, 'Ally Musa', 'all.juma@gmail.com', '2023-05-16 05:33:07', 'It is a good product. I like it', 3),
(5, 'C WOOW', 'daudimwesige100@gmail.com', '2023-05-29 04:59:02', 'CY UUIWW', 5);

-- --------------------------------------------------------

--
-- Table structure for table `setups`
--

CREATE TABLE `setups` (
  `id` int(11) NOT NULL,
  `support` int(11) NOT NULL,
  `confidence` int(11) NOT NULL,
  `scan` int(11) NOT NULL,
  `discount_percentage` double NOT NULL DEFAULT 15
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `name`, `phone`, `email`, `address`, `city`, `country`, `order_id`) VALUES
(2, 'DAVID DANIEL', '+2557855958', 'david@gmail.com', '350 BLOCK DAR CITY', 'Dar Es Salaam', 'Tanzania', 3),
(3, 'DAVID DANIEL', '+2557855958', 'david@gmail.com', '350 BLOCK DAR CITY', 'Dar Es Salaam', 'Tanzania', 4),
(4, 'DAVID DANIEL', '+2557855958', 'david@gmail.com', '350 BLOCK DAR CITY', 'Arusha', 'Tanzania', 5),
(5, 'DAVID DANIEL', '+2557855958', 'david@gmail.com', '350 BLOCK DAR CITY', 'Tanga', 'Tanzania', 6),
(8, '', '', '', '', '', 'Tanzania', 10),
(9, 'John Bocco', '+25574341788', 'david@gmail.com', '150 BLOCK DAR', 'Tanga', 'Tanzania', 11),
(10, '', '', '', '', '', 'Tanzania', 12),
(11, '', '', '', '', '', 'Tanzania', 13),
(12, '', '', '', '', '', 'Tanzania', 14),
(13, '', '', '', '', '', 'Tanzania', 15),
(14, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 16),
(15, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 17),
(16, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 18),
(17, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 19),
(18, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 20),
(19, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 21),
(20, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 22),
(21, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 23),
(22, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 24);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `display` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `product_id`, `display`) VALUES
(1, 1, 'active'),
(5, 3, ''),
(6, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `photo`, `username`, `password`) VALUES
(1, '                 Raja Casablancer', 'rajacasablanca@gmail.com', 'Male', 'Screenshot_from_2023-05-22_21-27-44.png', 'admin', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `setups`
--
ALTER TABLE `setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setups`
--
ALTER TABLE `setups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_payments`
--
ALTER TABLE `order_payments`
  ADD CONSTRAINT `order_payments_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_payments_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD CONSTRAINT `shipping_address_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
