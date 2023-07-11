-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 07:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(10, 'Sleeves'),
(14, 'Brands'),
(15, 'blouse');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `mobile`, `username`, `password`, `city`, `country`) VALUES
(3, 'Nice Emmanuel', 'david@gmail.com', '120 BLOCK DAR', '+25574341788', 'david', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'DAR', 'Tanzania'),
(4, 'Nice Emmanuel', 'david@gmail.com', '120 BLOCK DAR', '+25574341788', 'david', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 'DAR', 'Tanzania'),
(5, 'Nice Emmanuel', 'david@gmail.com', '120 BLOCK DAR', '+25574341788', 'david', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 'DAR', 'Tanzania'),
(6, 'Nice Emmanuel', 'david@gmail.com', '120 BLOCK DAR', '+25574341788', 'david', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 'DAR', 'Tanzania'),
(11, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(12, 'Nice Emmanuel', 'david@gmail.com', '150 BLOCK DAR', '+25574341788', 'john', '7c222fb2927d828af22f592134e8932480637c0d', 'Tanga', 'Tanzania'),
(13, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(14, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(15, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(16, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(17, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(18, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(19, 'Nice Emmanuel', 'dani@gmail.com', 'P.O.BOX 11 NIT', '+2546436464', 'david', 'd3232aa5222d3f0ac68819cddd15c4218a611d18', 'Arusha', 'Tanzania'),
(20, 'Nice Emmanuel', 'annajuma@gmail.com', 'PO BOX 342', '+225 765445212', 'anna', '0eafb46a0daa149e17a59616f7f266fac0927b82', 'MBEYA', 'Tanzania'),
(21, 'Nice Emmanuel', 'annajuma@gmail.com', 'PO BOX 342', '+225 765445212', 'anna', '0eafb46a0daa149e17a59616f7f266fac0927b82', 'MBEYA', 'Tanzania'),
(22, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania'),
(23, 'Nice Emmanuel', 'rehali@gmail.com', 'pox box 134', '255 6754321', 'reh_ali', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ARUSHA', 'Tanzania'),
(24, 'Nice Emmanuel', 'ney@gmail.com', 'Po box 5678', '255 7445032', 'ney_lazaros', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'kigoma', 'Tanzania'),
(25, 'Nice Emmanuel', 'amina@gmail.com', 'po box 4521', '255 6453219', 'amina_john', '35139ef894b28b73bea022755166a23933c7d9cb', 'Mwanza', 'Tanzania'),
(26, 'Nice Emmanuel', 'ali@gmail.com', 'po box 663', '255 7894021', 'ali_shabani', '8cb2237d0679ca88db6464eac60da96345513964', 'Same', 'Tanzania'),
(27, 'Nice Emmanuel', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Tanzania');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `product_id`) VALUES
(1, 'product-1.jpg', 2),
(2, 'product-2.jpg', 2),
(3, 'product-3.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`) VALUES
(317, 'blouse'),
(318, 'Jeans');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `date`, `status`, `customer_id`, `payment_method`, `created_at`) VALUES
(3, '2700', '2023-05-16 21:48:25', 'Over', 3, 'Cash', '2023-05-17 21:09:50'),
(4, '2700', '2023-05-16 21:53:52', 'Payed', 4, 'Cash', '2023-05-17 21:09:50'),
(5, '2700', '2023-01-16 21:54:10', 'Payed', 5, 'Cash', '2023-05-17 21:09:50'),
(6, '2700', '2023-02-16 21:54:56', 'Payed', 6, 'Cash', '2023-05-17 21:09:50'),
(10, '1400', '2023-01-20 08:26:46', 'Over', 11, 'Cash', '2023-05-20 08:26:46'),
(11, '2446', '2023-05-21 09:58:29', 'Payed', 12, 'Cash', '2023-05-21 09:58:29'),
(12, '323', '2023-04-21 16:26:03', 'Payed', 13, 'Cash', '2023-05-21 16:26:03'),
(13, '0', '2023-05-21 16:26:24', 'Payed', 14, 'Cash', '2023-05-21 16:26:24'),
(14, '800', '2023-05-21 16:31:06', 'Payed', 15, 'Cash', '2023-05-21 16:31:06'),
(15, '0', '2023-05-24 17:35:35', 'Payed', 16, 'Cash', '2023-05-24 17:35:35'),
(16, '300', '2023-05-24 19:08:19', 'Payed', 3, 'Cash', '2023-05-24 19:08:19'),
(17, '369', '2023-05-24 19:13:50', 'Payed', 3, 'Cash', '2023-05-24 19:13:50'),
(18, '9500', '2023-05-24 19:16:02', 'Payed', 3, 'Cash', '2023-05-24 19:16:02'),
(19, '900', '2023-05-24 19:19:18', 'Payed', 3, 'Cash', '2023-05-24 19:19:18'),
(20, '100', '2023-05-24 19:20:33', 'Payed', 3, 'Cash', '2023-05-24 19:20:33'),
(21, '300', '2023-05-24 19:32:14', 'Payed', 3, 'Cash', '2023-05-24 19:32:14'),
(22, '300', '2023-05-24 19:32:50', 'Payed', 3, 'Cash', '2023-05-24 19:32:50'),
(23, '300', '2023-05-24 19:33:24', 'Payed', 3, 'Cash', '2023-05-24 19:33:24'),
(24, '200', '2023-05-28 18:32:48', 'Payed', 3, 'Cash', '2023-05-28 18:32:48'),
(25, '300', '2023-06-04 15:29:28', 'Payed', 3, 'Cash', '2023-06-04 15:29:28'),
(26, '100', '2023-06-06 11:09:22', 'Payed', 17, 'Cash', '2023-06-06 11:09:22'),
(27, '200', '2023-06-06 11:18:36', 'Over', 18, 'Cash', '2023-06-06 11:18:36'),
(28, '92', '2023-06-07 07:57:26', 'Payed', 20, 'Bank Deposit', '2023-06-07 07:57:26'),
(29, '46', '2023-06-07 08:36:52', 'Over', 21, 'Cash', '2023-06-07 08:36:52'),
(30, '10', '2023-07-10 21:27:13', 'Payed', 22, 'Cash', '2023-07-10 21:27:13'),
(31, '46', '2023-07-10 21:41:48', 'Payed', 23, 'Bank Deposit', '2023-07-10 21:41:48'),
(32, '11000', '2023-07-10 23:03:33', 'Payed', 24, 'Bank Deposit', '2023-07-10 23:03:33'),
(33, '1369', '2023-07-10 23:21:32', 'Payed', 25, 'Bank Deposit', '2023-07-10 23:21:32'),
(34, '5244', '2023-07-11 07:32:01', 'Payed', 26, 'Bank Deposit', '2023-07-11 07:32:01'),
(35, '843', '2023-07-11 13:02:25', 'Pending', 27, 'Cash', '2023-07-11 13:02:25');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `quantity`, `price`, `order_id`, `created_at`) VALUES
(6, 2, 5, '100', 3, '2023-05-17 21:09:14'),
(9, 2, 5, '100', 4, '2023-05-17 21:09:14'),
(12, 2, 5, '100', 5, '2023-05-17 21:09:14'),
(15, 2, 5, '100', 6, '2023-05-17 21:09:14'),
(20, 2, 8, '100', 10, '2023-05-20 08:26:47'),
(23, 5, 2, '900', 11, '2023-05-21 09:58:29'),
(25, 2, 2, '100', 11, '2023-05-21 09:58:29'),
(26, 2, 2, '100', 12, '2023-05-21 16:26:03'),
(28, 2, 6, '100', 14, '2023-05-21 16:31:06'),
(30, 2, 3, '100', 16, '2023-05-24 19:08:19'),
(32, 2, 5, '100', 18, '2023-05-24 19:16:02'),
(33, 5, 10, '900', 18, '2023-05-24 19:16:02'),
(34, 2, 3, '100', 19, '2023-05-24 19:19:18'),
(37, 2, 3, '100', 21, '2023-05-24 19:32:14'),
(38, 2, 3, '100', 22, '2023-05-24 19:32:50'),
(39, 2, 3, '100', 23, '2023-05-24 19:33:24'),
(41, 2, 3, '100', 25, '2023-06-04 15:29:28'),
(42, 2, 1, '100', 26, '2023-06-06 11:09:22'),
(43, 2, 2, '100', 27, '2023-06-06 11:18:36'),
(48, 34, 3, '500', 32, '2023-07-10 23:03:33'),
(49, 34, 3, '500', 32, '2023-07-10 23:03:33'),
(50, 34, 12, '500', 32, '2023-07-10 23:03:33'),
(51, 34, 2, '500', 32, '2023-07-10 23:03:33'),
(52, 34, 2, '500', 32, '2023-07-10 23:03:33'),
(53, 31, 1, '173', 33, '2023-07-10 23:21:32'),
(54, 31, 1, '173', 33, '2023-07-10 23:21:32'),
(55, 31, 1, '173', 33, '2023-07-10 23:21:32'),
(56, 31, 1, '173', 33, '2023-07-10 23:21:32'),
(57, 31, 1, '173', 33, '2023-07-10 23:21:33'),
(58, 30, 2, '126', 33, '2023-07-10 23:21:33'),
(59, 30, 2, '126', 33, '2023-07-10 23:21:33'),
(60, 2, 2, '150', 34, '2023-07-11 07:32:01'),
(61, 2, 1, '150', 34, '2023-07-11 07:32:01'),
(62, 2, 2, '150', 34, '2023-07-11 07:32:01'),
(63, 2, 6, '150', 34, '2023-07-11 07:32:01'),
(64, 5, 2, '281', 34, '2023-07-11 07:32:01'),
(65, 5, 4, '281', 34, '2023-07-11 07:32:01'),
(66, 5, 2, '281', 34, '2023-07-11 07:32:01'),
(67, 5, 2, '281', 34, '2023-07-11 07:32:01'),
(68, 33, 4, '196', 34, '2023-07-11 07:32:01'),
(69, 5, 3, '281', 35, '2023-07-11 13:02:25');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, '2023-05-20 20:06:39', 1, 500, 5, 'cash'),
(10, '2023-06-04 15:30:06', 1, 300, 25, 'cash'),
(11, '2023-06-06 18:35:01', 1, 300, 27, 'cash'),
(12, '2023-06-06 18:36:19', 1, 100, 26, 'cash'),
(13, '2023-06-07 07:38:46', 1, 200, 24, 'Bank Deposit'),
(14, '2023-06-07 07:59:27', 1, 92, 28, 'Bank Deposit'),
(15, '2023-07-10 23:04:26', 1, 11000, 32, 'Bank Deposit'),
(16, '2023-07-10 23:04:46', 1, 46, 31, 'Bank Deposit'),
(17, '2023-07-10 23:05:01', 1, 10, 30, 'cash'),
(18, '2023-07-10 23:05:20', 1, 92, 29, 'cash'),
(19, '2023-07-10 23:05:35', 1, 300, 23, 'cash'),
(20, '2023-07-10 23:06:04', 1, 300, 22, 'cash'),
(21, '2023-07-10 23:06:28', 1, 300, 21, 'cash'),
(22, '2023-07-10 23:06:46', 1, 100, 20, 'cash'),
(23, '2023-07-10 23:07:10', 1, 900, 19, 'cash'),
(24, '2023-07-10 23:07:29', 1, 9500, 18, 'cash'),
(25, '2023-07-10 23:07:47', 1, 369, 17, 'cash'),
(26, '2023-07-10 23:08:03', 1, 300, 16, 'cash'),
(27, '2023-07-10 23:08:21', 1, 0, 15, 'cash'),
(28, '2023-07-10 23:08:37', 1, 800, 14, 'cash'),
(29, '2023-07-10 23:08:58', 1, 0, 13, 'cash'),
(30, '2023-07-10 23:09:25', 1, 2446, 11, 'cash'),
(31, '2023-07-10 23:09:43', 1, 2700, 4, 'cash'),
(32, '2023-07-10 23:10:05', 1, 323, 12, 'cash'),
(33, '2023-07-10 23:10:32', 1, 2700, 6, 'cash'),
(34, '2023-07-10 23:22:19', 1, 1369, 33, 'Bank Deposit'),
(35, '2023-07-11 07:32:53', 1, 5244, 34, 'Bank Deposit');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `old_price`, `quantity`, `short_description`, `description`, `image`, `category_id`) VALUES
(2, 'Jeans', '150', '0', 100, 'Available in all range size and perfect fit', 'For perfect outlook this outfit is recommended to you', 'images_(4).jpeg', 10),
(5, 'blouse', '281', '401', 100, 'Available in range of all size L,M and small', 'Get your perfect outfit and affordable', '17715086_37444956_6001.jpg', 10),
(11, 'sweater', '576', '588', 100, 'Available in all range size', 'Perfect and Available for you our dear customer', 'images_(7)1.jpeg', 10),
(14, 'Blouse', '440', '0', 100, 'Available in all range size and perfect for you', 'Available for you our dear customer', 'images_(8).jpeg', 10),
(30, 'shirt', '121', '123', 0, 'Blue collar T-shit for Men', 'Available in range size of L, M & small full cotton', 'images_(1).jpeg', 10),
(31, 'Shirt', '167', '170', 0, 'yellow collar T-shirt', 'Available in rage of size L, M & small full cotton', 'images_(2).jpeg', 10),
(32, 'T-shit', '228', '233', 6, 'Blue collar T-shit for Men', 'Available in all range size get you package', 'images_(1)1.jpeg', 10),
(33, 'blouse', '196', '200', 100, 'glimmer bloude', 'Available in range of all size', '315bf4e7cd9e3764e5ca1de2b4255645.png', 10),
(34, 'Sweater', '480', '490', 100, 'wool and warmth', 'Available for all ages', 'images_(6).jpeg', 10),
(35, 'Shirt', '600', '0', 100, 'Available in all range size', 'sawert', 'images.jpeg', 14),
(36, 'coat', '750', '0', 100, 'Available in all range size', ' asrgjhlkj', 'images_(9).jpeg', 14),
(37, ' Dresses', '300', '401', 100, 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut.', 'hhhhh', '14237386_20113836_600.jpg', 15);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `date`, `content`, `product_id`) VALUES
(1, 'David Daniel', 'david@gmail.vcom', '2023-05-15 20:34:54', 'It is a good product with high quality. It recommend it to everyone', 2),
(2, 'Ludovick Konyo', 'ludovick$gmail.com', '2023-05-15 20:34:54', 'very nice product. I have been looking for it for a long time', 2),
(5, 'C WOOW', 'daudimwesige100@gmail.com', '2023-05-29 04:59:02', 'CY UUIWW', 5),
(6, 'Neema Elvis', 'neyelvis@gmail.com', '2023-06-06 11:17:02', 'The product are very affordable with quality', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setups`
--

INSERT INTO `setups` (`id`, `support`, `confidence`, `scan`, `discount_percentage`) VALUES
(3, 2, 45, 10, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(22, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 24),
(23, 'david daniel', '+25574341788', 'david@gmail.com', '120 BLOCK DAR', 'DAR', 'Tanzania', 25),
(24, '', '', '', '', '', 'Tanzania', 26),
(25, '', '', '', '', '', 'Tanzania', 27),
(26, 'Anna Juma', '+225 765445212', 'annajuma@gmail.com', 'PO BOX 342', 'MBEYA', 'Tanzania', 28),
(27, '', '+225 765445212', 'annajuma@gmail.com', 'PO BOX 342', 'MBEYA', 'Tanzania', 29),
(28, '', '', '', '', '', 'Tanzania', 30),
(29, 'Rehema Ali', '255 6754321', 'rehali@gmail.com', 'pox box 134', 'ARUSHA', 'Tanzania', 31),
(30, 'Neema  Lazaros', '255 7445032', 'ney@gmail.com', 'Po box 5678', 'kigoma', 'Tanzania', 32),
(31, 'Amina John', '255 6453219', 'amina@gmail.com', 'po box 4521', 'Mwanza', 'Tanzania', 33),
(32, 'Ali Shabani', '255 7894021', 'ali@gmail.com', 'po box 663', 'Same', 'Tanzania', 34),
(33, '', '', '', '', '', 'Tanzania', 35);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `display` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `product_id`, `display`) VALUES
(6, 2, 'active'),
(9, 5, ''),
(10, 30, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `photo`, `username`, `password`) VALUES
(1, 'Nice Emmanuel', 'niceemmanuel@gmail.com', 'Female', 'Screenshot_from_2023-05-22_21-27-44.png', 'admin', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e'),
(3, '   Anna Juma', 'anna123@gmail.com', 'Female', 'images_(4).jpeg', 'anna_juma', 'adcd7048512e64b48da55b027577886ee5a36350');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setups`
--
ALTER TABLE `setups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
