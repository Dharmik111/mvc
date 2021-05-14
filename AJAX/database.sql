-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 07:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `status`, `createdDate`) VALUES
(1, 'alex', 'alex@1', 'Enable', '2021-02-24 13:56:14'),
(2, 'Raju', 'teapost12', 'Enable', '2021-02-24 13:57:29'),
(3, 'Carry', 'Carry@198', 'Enable', '2021-02-24 14:31:19'),
(25, 'Eoin Morgan', '@batsman', 'Enable', '2021-03-25 14:00:57'),
(31, 'Finn', 'Allen', 'Enable', '2021-04-01 15:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('product','category','customer') NOT NULL,
  `name` varchar(30) NOT NULL,
  `code` varchar(30) NOT NULL,
  `inputType` varchar(30) NOT NULL,
  `backEndType` varchar(30) NOT NULL,
  `sortOrder` int(11) NOT NULL,
  `backEndModel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backEndType`, `sortOrder`, `backEndModel`) VALUES
(1, 'product', 'Color', 'color', 'radio', 'varchar(255)', 1, 'Model/Product'),
(2, 'product', 'Brand', 'brand', 'checkbox', 'varchar(255)', 2, 'Model/Product'),
(3, 'product', 'Tv', 'tv', 'select', 'varchar(255)', 3, 'Model/Product'),
(5, 'product', 'Car', 'car', 'textarea', 'varchar(255)', 6, 'Model/Product'),
(6, 'product', 'Plane', 'plan', 'text', 'varchar(255)', 7, 'Model/Product');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(1, 'Pink', 1, 1),
(2, 'Apple', 2, 2),
(3, 'Samsung', 2, 3),
(4, 'Yellow', 1, 2),
(5, 'mi', 3, 5),
(6, 'redmi', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `sessionId` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingAmount` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `customerId`, `sessionId`, `total`, `discount`, `paymentMethodId`, `shippingMethodId`, `shippingAmount`, `createdDate`) VALUES
(1, 0, 0, '0', '0', 0, 0, 0, '2021-05-13 10:39:10'),
(3, 0, 0, '0', '0', 0, 0, 0, '2021-05-13 10:40:23'),
(4, 0, 0, '0', '0', 0, 0, 0, '2021-05-13 11:05:33'),
(5, 0, 0, '0', '0', 0, 0, 0, '2021-05-13 13:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `cartaddress`
--

CREATE TABLE `cartaddress` (
  `cartAddressId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `addressType` varchar(40) NOT NULL,
  `address` varchar(32) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `sameAsBilling` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cartItemId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `basePrice` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `pathId` varchar(40) DEFAULT NULL,
  `status` varchar(40) NOT NULL,
  `Beds` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `parentId`, `pathId`, `status`, `Beds`) VALUES
(1, 'Home', 0, '1', 'Enable', NULL),
(2, 'BedRoom', 1, '1=2', 'Enable', NULL),
(3, 'Beds', 1, '1=3', 'Enable', NULL),
(4, 'LightBulb', 2, '1=2=4', 'Enable', NULL),
(5, 'Cover', 3, '1=3=5', 'Enable', NULL),
(10, 'Kaborad', 2, '1=2=10', 'Enable', NULL),
(11, 'Chadar', 5, '1=3=5=11', 'Enable', NULL),
(15, 'Ausiku', 11, '1=3=5=11=15', 'Enable', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `identifier` varchar(40) NOT NULL,
  `content` varchar(100) NOT NULL,
  `status` varchar(40) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(1, 'teacher', 'contact us', 'finding', 'Enable', '2021-03-09 04:42:39'),
(43, 'facebook', 'name', 'friend', 'Enable', '2021-04-28 08:56:19'),
(45, 'WhatsApp', 'Unique', '<p>Connect People</p>\n', 'Enable', '2021-05-12 13:22:20'),
(46, 'Tv', 'Watching', '<p>Enjoyable</p>\n', 'Enable', '2021-05-12 13:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `configId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `value` varchar(40) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`configId`, `groupId`, `title`, `code`, `value`, `createdDate`) VALUES
(2, 1, 'Hacker', 'Rank', 'Performance', '2021-04-29 10:35:29'),
(3, 1, 'Job', 'Electrical', 'Checking', '2021-04-29 10:38:03'),
(6, 3, 'Chapter1', 'Pythagoras', '3.18', '2021-05-12 19:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `config_group`
--

CREATE TABLE `config_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config_group`
--

INSERT INTO `config_group` (`groupId`, `name`, `createdDate`) VALUES
(1, 'Web Designer', '2021-04-12 16:25:11'),
(2, 'PhotoGrapher', '2021-04-12 17:19:57'),
(3, 'Maths', '2021-05-12 19:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `groupId`, `firstName`, `lastName`, `email`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(3, 1, 'Alex', 'Carry', 'AlexCpall@gmail.com', 'Alexa@12', 'Enable', '2021-03-18 12:36:57', '2021-03-22 06:22:00'),
(10, 3, 'Jony', 'Baistrow', '123@gmail.com', 'jon@3290', 'Enable', '2021-03-22 06:26:51', '2021-03-23 14:41:12'),
(11, 1, 'Cristiano', 'Ronaldo', 'ronaldo@yahoo.com', 'rony@cris', 'Enable', '2021-03-27 07:43:23', NULL),
(12, 1, 'Messi', 'Leo', 'MessiBhai@gmail.com', 'Leo@van', 'Enable', '2021-03-27 07:43:56', NULL),
(19, 3, 'Virat', 'Kohli', 'vkOfficial@gmail.com', 'Vk@official', 'Enable', '2021-04-03 12:54:34', NULL),
(21, 1, 'Usen', 'Bold', 'Bold@gmail.com', '@boldi12', 'Enable', '2021-04-09 08:15:29', NULL),
(31, 1, 'Franky', 'bhai', 'franky@378gmail,com', 'franky@378', 'Enable', '2021-04-30 14:56:33', NULL),
(32, 1, 'AB', 'De Villliers', 'abd@gmail.com', 'superman@17', 'Enable', '2021-05-12 23:13:08', NULL),
(33, 1, 'Vin', 'Diesel', 'Vinty@gmail.com', 'vintydisel', 'Enable', '2021-05-13 09:39:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipCode` int(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `addressType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipCode`, `country`, `addressType`) VALUES
(7, 3, 'London', 'London', 'Ukm', 10, 'Uknn', 'Billing'),
(8, 3, 'London', 'London', 'Ukm', 10, 'Uknn', 'Shipping'),
(11, 10, 'Block5', 'Indonesia', 'Isrel', 453, 'zenda', 'Billing'),
(12, 10, 'Block6', 'africa', 'africaSouth', 849, 'Africa Town', 'Shipping'),
(13, 11, 'Modhera Society', 'Ahemadabad', 'Gujarat', 380001, 'India', 'Billing'),
(14, 11, 'Modhera Society', 'Ahemadabad', 'Gujarat', 380001, 'India', 'Shipping'),
(15, 12, 'Europe Street No9', 'Berlight', 'cvx', 923, 'Europe', 'Billing'),
(16, 12, 'Europe Street No9', 'Berlight', 'cvx', 923, 'Europe', 'Shipping'),
(42, 19, 'Powder Gali', 'Mumbai', 'Maharrashatra', 394033, 'India', 'Billing'),
(43, 19, 'malad', 'Mumbai', 'Maharrashatra', 394033, 'India', 'Shipping'),
(47, 21, 'Zonn', 'Valley', 'Scotland', 9299, 'Scoty', 'Billing'),
(48, 21, 'Zonn', 'Valley', 'Scotland', 3921, 'Scoty', 'Shipping'),
(61, 31, 'Chaul', 'Mumbai', 'Maharashtra', 123, 'India', 'billing'),
(62, 31, 'chowk', 'nagapur', 'Maharashtra', 123, 'India', 'shipping'),
(63, 32, 'SA street', 'Sanoya', 'Satn', 2234, 'South Africa', 'billing'),
(64, 32, 'SA street', 'Sanoya', 'Satn', 2235, 'South Africa', 'shipping'),
(65, 33, 'NA', 'LP', 'SP', 23, 'NA', 'billing'),
(66, 33, 'NA', 'LP', 'SP', 24, 'NA', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(1, 'WholeSaler', 'Enable', '2021-03-11 05:39:58'),
(3, 'Retailer', 'Enable', '2021-03-11 17:57:06'),
(4, 'Group3', 'Enable', '2021-03-11 18:05:41'),
(5, 'Group4', 'Enable', '2021-03-11 18:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `sessionId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingAmount` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `sessionId`, `customerId`, `total`, `discount`, `paymentMethodId`, `shippingMethodId`, `shippingAmount`, `createdDate`) VALUES
(2, 0, 3, '0', '0', 1, 1, 100, '2021-05-13 10:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `orderaddress`
--

CREATE TABLE `orderaddress` (
  `orderAddressId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `addressType` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `sameAsBilling` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderaddress`
--

INSERT INTO `orderaddress` (`orderAddressId`, `orderId`, `addressId`, `addressType`, `address`, `city`, `state`, `country`, `zipCode`, `sameAsBilling`) VALUES
(1, 2, 0, 'billing', 'London', 'London', 'Ukm', 'Uknn', 10, 0),
(2, 2, 0, 'shipping', 'London', 'London', 'Ukm', 'Uknn', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `orderItemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `basePrice` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`orderItemId`, `orderId`, `productId`, `quantity`, `basePrice`, `price`, `discount`, `createdDate`) VALUES
(1, 2, 2, 2, 95, 190, 2, '2021-05-13 10:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `description` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'COD', 'COD', 'Cash On Delivery', 'Enable', '2021-04-04 19:33:11'),
(2, 'Credit Card', 'Credit Card', 'Credit Card', 'Enable', '2021-04-04 19:33:44'),
(3, 'Debit Card', 'Debit Card', 'Debit Card', 'Enable', '2021-04-04 19:34:06'),
(4, 'BHIM UPI', 'BHIM UPI', 'BHIM UPI', 'Enable', '2021-04-04 19:34:36'),
(5, 'Net Banking', 'Net Banking', 'Net Banking', 'Enable', '2021-04-04 19:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateDate` datetime DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Brand` varchar(255) DEFAULT NULL,
  `Tv` varchar(255) DEFAULT NULL,
  `Car` varchar(255) DEFAULT NULL,
  `Plan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updateDate`, `Color`, `Brand`, `Tv`, `Car`, `Plan`) VALUES
(2, 's12', 'Biscuit', 95, 2, 200, 'very good', 'Enable', '2021-02-20 22:36:31', '0000-00-00 00:00:00', 'Yellow', 'Samsung', 'redmi', 'Lambergini', ''),
(93, 's15', 'Tshirt', 400, 20, 1, 'XXL', 'Enable', '2021-03-18 17:02:43', NULL, NULL, NULL, NULL, NULL, NULL),
(96, 's16', 'Shoes', 900, 10, 1, 'Size-10', 'Enable', '2021-03-22 13:51:56', NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'A10', 'Bats', 2000, 100, 1, 'Cricket', 'Enable', '2021-03-26 23:29:18', NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'B1', 'FootBall', 10000, 1000, 1, 'Playing Match', 'Enable', '2021-03-29 23:49:16', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(99, 'c3', 'Mobile', 15000, 1000, 1, 'Enjoyment', 'Enable', '2021-03-29 23:50:02', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(100, 'e4', 'Laptop', 60000, 2000, 1, 'Coding Gaming', 'Enable', '2021-03-29 23:50:45', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(103, 'f10', 'sound ', 1200, 20, 1, 'hellooo', 'Enable', '2021-04-01 11:57:08', NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'j14', 'Powerbank', 900, 20, 1, 'For Charging', 'Enable', '2021-04-09 14:08:17', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productmedia`
--

CREATE TABLE `productmedia` (
  `imageId` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `label` varchar(30) NOT NULL,
  `small` tinyint(4) DEFAULT 0,
  `thumb` tinyint(4) NOT NULL DEFAULT 0,
  `base` tinyint(4) NOT NULL DEFAULT 0,
  `gallery` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productmedia`
--

INSERT INTO `productmedia` (`imageId`, `productId`, `image`, `label`, `small`, `thumb`, `base`, `gallery`) VALUES
(1, 93, 'Upload/photo1.jpg', 'photo1.jpg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 2, 1, '100.00'),
(2, 2, 3, '220.00'),
(3, 2, 4, '330.00'),
(4, 2, 5, '450.00');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionId` int(11) NOT NULL,
  `question` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionId`, `question`, `status`) VALUES
(1, 'Where is Moon?', 'Enable'),
(3, 'Where is India?', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `choiceId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `is_right_choice` tinyint(1) DEFAULT 0,
  `choice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_option`
--

INSERT INTO `question_option` (`choiceId`, `questionId`, `is_right_choice`, `choice`) VALUES
(6, 1, 1, 'Earth');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `methodId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `amount` double NOT NULL,
  `description` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(1, 'Platinum', 'Platinum', 100, '1 Day', 'Enable', '2021-04-04 19:37:41'),
(2, 'Gold', 'Gold', 50, '3 Day', 'Enable', '2021-04-04 19:38:12'),
(3, 'Silver', 'Silver', 0, '7 Day', 'Enable', '2021-04-04 19:38:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attribute_option_ibfk_1` (`attributeId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `cartaddress`
--
ALTER TABLE `cartaddress`
  ADD PRIMARY KEY (`cartAddressId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cartItemId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configId`);

--
-- Indexes for table `config_group`
--
ALTER TABLE `config_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `orderaddress`
--
ALTER TABLE `orderaddress`
  ADD PRIMARY KEY (`orderAddressId`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`orderItemId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`choiceId`),
  ADD KEY `questionId` (`questionId`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cartaddress`
--
ALTER TABLE `cartaddress`
  MODIFY `cartAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `config_group`
--
ALTER TABLE `config_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderaddress`
--
ALTER TABLE `orderaddress`
  MODIFY `orderAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `choiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_option`
--
ALTER TABLE `question_option`
  ADD CONSTRAINT `question_option_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`questionId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
