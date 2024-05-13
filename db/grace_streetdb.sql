-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 02:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grace_streetdbed`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `Product_Name` varchar(255) DEFAULT NULL,
  `Product_Price` decimal(10,2) DEFAULT NULL,
  `Product_Quantity` int(11) DEFAULT NULL,
  `Product_Image` blob DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `Product_Name`, `Product_Price`, `Product_Quantity`, `Product_Image`, `user_id`, `user_email`) VALUES
(92, 'Thony', 31.00, 1, 0x3432393438323935385f3732393736363833323631353830375f323833313334313532383135383830313233375f6e2e6a7067, 18, 'tebs@gmail.com'),
(93, 'Coziest Item', 499.00, 1, 0x312e6a7067, 18, 'tebs@gmail.com'),
(94, 'Coziest V2', 299.00, 2, 0x352e6a7067, 18, 'tebs@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `number`, `message`, `created_at`) VALUES
(1, 'Kenneth', 'John@gmail.com', 9231233, 'I like it ', '2024-04-21 06:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `grace_user`
--

CREATE TABLE `grace_user` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grace_user`
--

INSERT INTO `grace_user` (`id`, `username`, `email`, `password`) VALUES
(1, 'matthew', 'quintom53@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(2, 'Jerico Enopia', 'jerico@gmail.com', '1a9b9508b6003b68ddfe03a9c8cbc4bd4388339b'),
(3, 'admin', 'kaykay@gmail.com', '403d9917c3e950798601addf7ba82cd3c83f344b'),
(4, 'Rico Kenetthe Recta', 'rico@gmail.com', '3e511da7577d1864871b760ab30e05b56943c9b2'),
(5, 'jam', 'jam@gmail.com', '69df79bef9287d3bcb8f104a408b06de6a108fd8'),
(11, 'matthew', 'quintom53@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420'),
(12, 'jessica', 'jessica@gmail.com', '69df79bef9287d3bcb8f104a408b06de6a108fd8'),
(13, 'mike', 'mike@gmail.com', 'cae758978da31fa3b0b19edb1177738d4f57f8dd'),
(14, 'francis', 'francis@gmail.com', '30d1600eb2ec9e8b74a997edccb12c91328d8e23'),
(15, 'ron', 'ron@gmail.com', 'c1ecdc5b69acd9e42bf97f806206bdc769c42ee4'),
(16, 'Kenneth', 'John@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(17, 'Lani', 'Lani@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(18, 'tebs', 'tebs@gmail.com', '954a4c80e031984fe6e6f8371704dc8bc50eab6b'),
(19, 'admins', 'admins@gmail.com', 'c6c92702a84b81ae490d98d6ec71b92d1802a190');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Number` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Method` varchar(50) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Total_Products` varchar(1000) DEFAULT NULL,
  `Total_Price` decimal(10,2) DEFAULT NULL,
  `Placed_on` date DEFAULT NULL,
  `Order_Status` varchar(255) DEFAULT NULL,
  `order_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Name`, `Number`, `Email`, `Method`, `Address`, `Total_Products`, `Total_Price`, `Placed_on`, `Order_Status`, `order_email`) VALUES
(35, 'Jerico hipanoa Enopia', '0988866756', 'jerico@gmail.com', 'cash_on_delivery', 'kaymito', '<span style=\"display: block; margin-bottom: 10px;\">- Thony PHP31.00(3)</span><span style=\"display: block; margin-bottom: 10px;\">- Coziest Item PHP499.00(1)</span>', 592.00, '2024-04-24', 'Received', 'tebs@gmail.com'),
(36, 'Jan Matthew Ventura Quinto', '09992029392', 'quintom53@gmail.com', 'cash_on_delivery', '021 Kaymito st. villa Cuana Pinagbuhatan pasig city', '<span style=\"display: block; margin-bottom: 10px;\">- Thony PHP31.00(1)</span>', 31.00, '2024-04-24', 'Received', 'ron@gmail.com'),
(37, 'jemicah jairus Ventura quinto', '88946345645', 'jairusquinto566@gmail.com', 'cash_on_delivery', 'kaymito', '<span style=\"display: block; margin-bottom: 10px;\">- Coziest Item PHP499.00(1)</span>', 499.00, '2024-04-25', '1', 'ron@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_stock` int(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_status` varchar(11) NOT NULL,
  `date` date DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `product_image`, `product_name`, `product_stock`, `product_price`, `product_status`, `date`, `gender`, `description`) VALUES
(52, 'cancer.png', 'mikay', 78, '600', 'Available', NULL, '', NULL),
(53, 'leo.png', 'strong', 89, '450', 'Available', NULL, '', NULL),
(54, 'aries.png', 'gods perfect timing ', 58, '800', 'Available', NULL, '', NULL),
(55, 'capricorn.png', 'matthew', 78, '600', 'Available', NULL, '', NULL),
(56, 'monkey.png', 'sample23', 89, '600', 'Available', NULL, '', NULL),
(57, '2.jpg', 'Coziest', 55, '399', 'Available', NULL, '', NULL),
(58, '1.jpg', 'Coziest Item', 33, '499', 'Available', '2024-04-20', '', NULL),
(59, '429482958_729766832615807_2831341528158801237_n.jpg', 'Thony', 32, '31', 'Available', '2024-04-21', 'Mens', 'Free archived shirts or hoodies, for the first 100 orders on our Shopee & Lazada! So make sure to fo'),
(60, '5.jpg', 'Coziest V2', 55, '299', 'Available', '2024-04-22', 'Mens', 'Join the first 100 lucky winners of a FREE Shirt or a FREE Hoodie with a minimum purchase of ₱ 600.00, this coming 12AM (April 1');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `Wishlist_Image` blob DEFAULT NULL,
  `Wishlist_Name` varchar(255) DEFAULT NULL,
  `Wishlist_Price` decimal(10,2) DEFAULT NULL,
  `Wishlist_Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grace_user`
--
ALTER TABLE `grace_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grace_user`
--
ALTER TABLE `grace_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
