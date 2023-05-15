-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 06:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_healthbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `member_fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `code`, `name`, `discount`, `member_fee`) VALUES
(1, 'BCK', 'Black Card', 0.2, 10000000),
(2, 'PTC', 'Prestige Card', 0.1, 1500000),
(3, 'SLV', 'Silva Card', 0.08, 120000),
(4, 'NON', 'Non Member', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `phone`, `email`, `address`, `card_id`) VALUES
(1, 'Fakhirul', 'L', '085100001234', 'fakhirul@gmail.com', 'Depok', 1),
(2, 'Akmal', 'L', '081900120034', 'akmal@gmail.com', 'Depok', 2),
(3, 'Muhammad Sumbul', 'L', '082190234455', 'soemboel@gmail.com', 'Bogor', 4),
(4, 'Amalia Hasanah', 'P', '081318387621', 'lia.hasanah@gmail.com', 'Bogor', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `date`, `qty`, `total_price`, `customer_id`, `product_id`) VALUES
(1, 'PO001', '2023-02-02 00:00:00', 2, 432000, 1, 4),
(2, 'PO002', '2023-02-22 00:00:00', 3, 414000, 4, 3),
(3, 'PO003', '2023-02-23 00:00:00', 5, 950000, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `sku` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `purchase_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `min_stock` int(11) DEFAULT 0,
  `product_type_id` int(11) NOT NULL,
  `restock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `purchase_price`, `sell_price`, `stock`, `min_stock`, `product_type_id`, `restock_id`) VALUES
(1, 'SK001', 'Cetaphil Facial Cleanser', 100000, 140000, 21, 1, 1, 1),
(2, 'SK002', 'L\'Oreal Paris Hair Care', 120000, 190000, 18, 1, 5, 1),
(3, 'SK003', 'Colgate Teeth Care', 100000, 145000, 15, 1, 4, 3),
(4, 'SK004', 'Imboost Force', 230000, 270000, 23, 1, 2, 2),
(5, 'SK005', 'Scarlett Jolly Body Lotion', 150000, 215000, 6, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`) VALUES
(1, 'Facial Cleanser'),
(2, 'Multivitamin'),
(3, 'Body Lotion'),
(4, 'Teeth Whitening Kit'),
(5, 'Hair Oil');

-- --------------------------------------------------------

--
-- Table structure for table `restock`
--

CREATE TABLE `restock` (
  `id` int(11) NOT NULL,
  `restock_number` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `restock`
--

INSERT INTO `restock` (`id`, `restock_number`, `date`, `qty`, `price`, `supplier_id`) VALUES
(1, 'RS001', '2022-03-10 00:00:00', 20, 11500000, 3),
(2, 'RS002', '2022-04-05 00:00:00', 15, 10000000, 2),
(3, 'RS003', '2023-01-01 00:00:00', 41, 24000000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `contact_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone`, `address`, `contact_name`) VALUES
(1, 'PT Prima Sentosa Indonesia', '081123456789', 'Surabaya', 'Dewi Kurniawati'),
(2, 'PT QNET Indonesia', '085678901234', 'Bandung', 'Andi Pratama'),
(3, 'PT Melia Sehat Sejahtera', '081234567890', 'Jakarta Timur', 'Dimas Sanjaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_customer_card1` (`card_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `fk_order_customer` (`customer_id`),
  ADD KEY `fk_order_product1` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `fk_product_product_type1` (`product_type_id`),
  ADD KEY `fk_product_restock1` (`restock_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restock`
--
ALTER TABLE `restock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restock_number` (`restock_number`),
  ADD KEY `fk_restock_supplier1` (`supplier_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restock`
--
ALTER TABLE `restock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_card1` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_product_type1` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_restock1` FOREIGN KEY (`restock_id`) REFERENCES `restock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `restock`
--
ALTER TABLE `restock`
  ADD CONSTRAINT `fk_restock_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
