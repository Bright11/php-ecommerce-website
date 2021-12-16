-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql102.epizy.com
-- Generation Time: Apr 09, 2021 at 08:45 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_24331378_chikagod`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(7, 'Addidas'),
(8, 'Nick'),
(9, 'Samsung ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(10) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `product_title`, `product_image`, `product_price`, `qty`, `ip_address`, `total_price`) VALUES
(2, 'T Shirt', 'images (4).jpg', '250', 1, '197.211.39.238', '250'),
(3, 'Watch', '4.jpg', '100', 1, '197.211.39.238', '100'),
(4, 'School Bag', '5.jpg', '50', 1, '197.211.61.3', '50'),
(5, 'School Bag', '5.jpg', '50', 1, '105.112.96.180', '50'),
(6, 'T Shirt', 'images (4).jpg', '250', 1, '197.211.61.3', '250'),
(7, 'Watch', '4.jpg', '100', 1, '197.211.61.3', '100'),
(13, 'Watch', '4.jpg', '100', 1, '105.112.156.61', '100'),
(9, 'Watch', '4.jpg', '100', 1, '105.112.70.167', '100'),
(12, 'Camera', 'professional-video-camera.jpg', '48', 1, '105.112.156.61', '48'),
(14, 'Samsung', '1552670857_samsung galaxy s6.jpg', '500', 13, '105.112.156.61', '6500'),
(15, 'Camera', 'professional-video-camera.jpg', '48', 10, '37.228.254.125', '480'),
(16, 'Samsung', '1552670857_samsung galaxy s6.jpg', '500', 1, '37.228.254.125', '500'),
(17, 'T Shirt', 'images (4).jpg', '250', 1, '197.210.65.22', '250'),
(18, 'T Shirt', 'images (4).jpg', '250', 1, '197.210.84.187', '250'),
(21, 'Camera', 'professional-video-camera.jpg', '48', 1, '105.112.11.217', '48'),
(23, 'Hp Laptop', 'laptop.jpg', '2000', 1, '197.210.174.177', '2000'),
(24, 'Watch', '4.jpg', '100', 1, '197.210.174.242', '100');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(7, 'Womens Wear'),
(8, 'Men shoes'),
(9, 'Mens Wear'),
(10, 'School Bags'),
(11, 'Laptops'),
(12, 'Mobile Phone'),
(13, 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `customers_order`
--

CREATE TABLE `customers_order` (
  `customer_id` int(10) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `customer_city` text NOT NULL,
  `location` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(11, 9, 7, 'Watch', 100, 'Please all this item is not for sale but the site is for sale call us on 0543461813', '4.jpg', 'watch'),
(12, 9, 7, 'T Shirt', 250, 'Please all this item is not for sale but the site is for sale call us on 0543461813', 'images (4).jpg', 'clothes'),
(13, 10, 0, 'School Bag', 50, 'Please all this School bag is not for sale but the site is for sale call us on 0543461813', '5.jpg', 'bag'),
(14, 11, 7, 'Hp Laptop', 2000, 'Please all this Hp Laptop is not for sale but the site is for sale call us on 0543461813', 'laptop.jpg', 'Laptop'),
(15, 12, 9, 'Samsung', 500, 'Please all this phone is not for sale but the site is for sale call us on 0543461813', '1552670857_samsung galaxy s6.jpg', 'Phone'),
(16, 13, 7, 'Camera', 48, 'Please all this item is not for sale but the site is for sale call us on 0543461813', 'professional-video-camera.jpg', 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers_order`
--
ALTER TABLE `customers_order`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers_order`
--
ALTER TABLE `customers_order`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
