-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2019 at 08:27 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deliv`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `Address_id` int(10) UNSIGNED NOT NULL,
  `Address_Line1` varchar(60) NOT NULL,
  `Address_Line2` varchar(60) DEFAULT NULL,
  `Address_City` varchar(15) NOT NULL,
  `Address_State` varchar(15) NOT NULL,
  `Address_PostalCode` varchar(10) NOT NULL,
  `Address_Country` varchar(15) NOT NULL,
  PRIMARY KEY (`Address_id`),
  UNIQUE KEY `Address_id_UNIQUE` (`Address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`Address_id`, `Address_Line1`, `Address_Line2`, `Address_City`, `Address_State`, `Address_PostalCode`, `Address_Country`) VALUES
(1000, 'near nour pharma', 'facing president', 'Zawtar Charkieh', 'nabatieh', '1700', 'lebanon'),
(1001, 'shoukin', 'shoukin', 'Zawtar Charkieh', 'nabatieh', '1700', 'lebanon');

-- --------------------------------------------------------

--
-- Table structure for table `address_type`
--

DROP TABLE IF EXISTS `address_type`;
CREATE TABLE IF NOT EXISTS `address_type` (
  `Address_Type_Code` int(11) NOT NULL,
  `Address_Type_Description` varchar(45) NOT NULL,
  PRIMARY KEY (`Address_Type_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address_type`
--

INSERT INTO `address_type` (`Address_Type_Code`, `Address_Type_Description`) VALUES
(1, 'Billing'),
(2, 'Residence'),
(3, 'Delivery'),
(4, 'Office');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Cart_Quantity` int(100) NOT NULL,
  `Cart_Price` int(100) NOT NULL,
  PRIMARY KEY (`Cart_Id`),
  KEY `user_id` (`User_Id`),
  KEY `product_id` (`Product_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_Id`, `User_Id`, `Product_Id`, `Cart_Quantity`, `Cart_Price`) VALUES
(1000, 31, 20009, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(25) NOT NULL,
  `Category_Description` varchar(100) NOT NULL,
  PRIMARY KEY (`Category_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_Id`, `Category_Name`, `Category_Description`) VALUES
(10001, 'Convenience Products', 'consumed regularly and purchased frequently'),
(10002, 'Shopping Products', 'consume on a less frequent schedule compared to convenience products'),
(10003, 'Specialty Products', 'carry a high price tag relative to convenience and shopping products'),
(10004, 'Emergency Products', 'products a customer seeks due to sudden events'),
(10005, 'Unsought Products', 'purchase is unplanned by the consumer but occur as a result of marketer’s actions');

-- --------------------------------------------------------

--
-- Table structure for table `contract_type`
--

DROP TABLE IF EXISTS `contract_type`;
CREATE TABLE IF NOT EXISTS `contract_type` (
  `Contract_Id` int(11) NOT NULL,
  `Contract_Type_Name` varchar(45) NOT NULL,
  PRIMARY KEY (`Contract_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contract_type`
--

INSERT INTO `contract_type` (`Contract_Id`, `Contract_Type_Name`) VALUES
(30100, 'FIXED PRICE ESCALATION CONTRACT'),
(30200, 'FIRM FIXED TYPE CONTRACT'),
(30300, 'FIXED PRICE INCENTIVE CONTRACT'),
(30400, 'FIXED PRICE REDETERMINATION CONTRACT'),
(30500, 'COST/COST SHARING CONTRACT'),
(30600, 'COST PLUS AWARD FEE CONTRACT'),
(30700, 'COST PLUS FIXED FEE CONTRACT'),
(30800, 'TIME AND MATERIALS CONTRACT'),
(30900, 'LETTER SUBCONTRACT'),
(30901, 'INDEFINITE DELIVERY CONTRACT');

-- --------------------------------------------------------

--
-- Table structure for table `deguy_schedule`
--

DROP TABLE IF EXISTS `deguy_schedule`;
CREATE TABLE IF NOT EXISTS `deguy_schedule` (
  `Schedule_id` int(4) NOT NULL,
  `mondate` varchar(200) DEFAULT NULL,
  `tuesdate` varchar(200) DEFAULT NULL,
  `wednesdate` varchar(200) DEFAULT NULL,
  `thursdate` varchar(200) DEFAULT NULL,
  `fridate` varchar(200) DEFAULT NULL,
  `saturdate` varchar(200) DEFAULT NULL,
  `sundate` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deguy_schedule`
--

INSERT INTO `deguy_schedule` (`Schedule_id`, `mondate`, `tuesdate`, `wednesdate`, `thursdate`, `fridate`, `saturdate`, `sundate`) VALUES
(1000, '10:00##22:00', NULL, NULL, NULL, NULL, NULL, '09:00##20:00');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_product`
--

DROP TABLE IF EXISTS `deleted_product`;
CREATE TABLE IF NOT EXISTS `deleted_product` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(45) NOT NULL,
  `Delete_Date` datetime DEFAULT NULL,
  `Delete_By` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Product_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryguy`
--

DROP TABLE IF EXISTS `deliveryguy`;
CREATE TABLE IF NOT EXISTS `deliveryguy` (
  `DeliveryGuy_Id` int(4) NOT NULL,
  `Deguy_Schedule_id` int(4) NOT NULL,
  `User_Id` int(4) NOT NULL,
  `vehicle_type` varchar(20) NOT NULL,
  `date_of_start` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DeliveryGuy_Id`),
  KEY `fk_schedule_id_to_deguy` (`Deguy_Schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliveryguy`
--

INSERT INTO `deliveryguy` (`DeliveryGuy_Id`, `Deguy_Schedule_id`, `User_Id`, `vehicle_type`, `date_of_start`, `active`) VALUES
(1000, 1000, 31, 'car', '2019-06-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

DROP TABLE IF EXISTS `delivery_status`;
CREATE TABLE IF NOT EXISTS `delivery_status` (
  `Delivery_Status_Id` int(11) NOT NULL,
  `Delivery_Status_Description` varchar(30) NOT NULL,
  PRIMARY KEY (`Delivery_Status_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_status`
--

INSERT INTO `delivery_status` (`Delivery_Status_Id`, `Delivery_Status_Description`) VALUES
(11, 'Preparing for shipment'),
(22, 'Pakaging'),
(33, 'Shipped'),
(44, 'In Transit'),
(55, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_26_140122_create_address_type_table', 0),
(4, '2019_05_26_140122_create_addresses_table', 0),
(5, '2019_05_26_140122_create_cart_table', 0),
(6, '2019_05_26_140122_create_categories_table', 0),
(7, '2019_05_26_140122_create_contract_type_table', 0),
(8, '2019_05_26_140122_create_deleted_product_table', 0),
(9, '2019_05_26_140122_create_delivery_status_table', 0),
(10, '2019_05_26_140122_create_deliveryguy_table', 0),
(11, '2019_05_26_140122_create_order_delivery_table', 0),
(12, '2019_05_26_140122_create_order_details_table', 0),
(13, '2019_05_26_140122_create_orders_table', 0),
(14, '2019_05_26_140122_create_password_resets_table', 0),
(15, '2019_05_26_140122_create_payment_method_table', 0),
(16, '2019_05_26_140122_create_payment_method_type_table', 0),
(17, '2019_05_26_140122_create_previous_customer_table', 0),
(18, '2019_05_26_140122_create_previous_valued_customer_table', 0),
(19, '2019_05_26_140122_create_products_table', 0),
(20, '2019_05_26_140122_create_suppliers_table', 0),
(21, '2019_05_26_140122_create_suppliers_contract_table', 0),
(22, '2019_05_26_140122_create_users_table', 0),
(23, '2019_05_26_140122_create_users_addresses_table', 0),
(24, '2019_05_26_140122_create_wishlist_table', 0),
(25, '2019_05_26_144721_create_address_type_table', 0),
(26, '2019_05_26_144721_create_addresses_table', 0),
(27, '2019_05_26_144721_create_cart_table', 0),
(28, '2019_05_26_144721_create_categories_table', 0),
(29, '2019_05_26_144721_create_contract_type_table', 0),
(30, '2019_05_26_144721_create_deleted_product_table', 0),
(31, '2019_05_26_144721_create_delivery_status_table', 0),
(32, '2019_05_26_144721_create_deliveryguy_table', 0),
(33, '2019_05_26_144721_create_order_delivery_table', 0),
(34, '2019_05_26_144721_create_order_details_table', 0),
(35, '2019_05_26_144721_create_orders_table', 0),
(36, '2019_05_26_144721_create_password_resets_table', 0),
(37, '2019_05_26_144721_create_payment_method_table', 0),
(38, '2019_05_26_144721_create_payment_method_type_table', 0),
(39, '2019_05_26_144721_create_previous_customer_table', 0),
(40, '2019_05_26_144721_create_previous_valued_customer_table', 0),
(41, '2019_05_26_144721_create_products_table', 0),
(42, '2019_05_26_144721_create_suppliers_table', 0),
(43, '2019_05_26_144721_create_suppliers_contract_table', 0),
(44, '2019_05_26_144721_create_users_table', 0),
(45, '2019_05_26_144721_create_users_addresses_table', 0),
(46, '2019_05_26_144721_create_wishlist_table', 0),
(47, '2019_05_26_144722_add_foreign_keys_to_addresses_table', 0),
(48, '2019_05_26_144722_add_foreign_keys_to_cart_table', 0),
(49, '2019_05_26_144722_add_foreign_keys_to_users_addresses_table', 0),
(50, '2019_05_26_144746_create_address_type_table', 0),
(51, '2019_05_26_144746_create_addresses_table', 0),
(52, '2019_05_26_144746_create_cart_table', 0),
(53, '2019_05_26_144746_create_categories_table', 0),
(54, '2019_05_26_144746_create_contract_type_table', 0),
(55, '2019_05_26_144746_create_deleted_product_table', 0),
(56, '2019_05_26_144746_create_delivery_status_table', 0),
(57, '2019_05_26_144746_create_deliveryguy_table', 0),
(58, '2019_05_26_144746_create_order_delivery_table', 0),
(59, '2019_05_26_144746_create_order_details_table', 0),
(60, '2019_05_26_144746_create_orders_table', 0),
(61, '2019_05_26_144746_create_password_resets_table', 0),
(62, '2019_05_26_144746_create_payment_method_table', 0),
(63, '2019_05_26_144746_create_payment_method_type_table', 0),
(64, '2019_05_26_144746_create_previous_customer_table', 0),
(65, '2019_05_26_144746_create_previous_valued_customer_table', 0),
(66, '2019_05_26_144746_create_products_table', 0),
(67, '2019_05_26_144746_create_suppliers_table', 0),
(68, '2019_05_26_144746_create_suppliers_contract_table', 0),
(69, '2019_05_26_144746_create_users_table', 0),
(70, '2019_05_26_144746_create_users_addresses_table', 0),
(71, '2019_05_26_144746_create_wishlist_table', 0),
(72, '2019_05_26_144747_add_foreign_keys_to_addresses_table', 0),
(73, '2019_05_26_144747_add_foreign_keys_to_cart_table', 0),
(74, '2019_05_26_144747_add_foreign_keys_to_users_addresses_table', 0),
(75, '2019_06_15_133553_create_address_type_table', 0),
(76, '2019_06_15_133553_create_addresses_table', 0),
(77, '2019_06_15_133553_create_cart_table', 0),
(78, '2019_06_15_133553_create_categories_table', 0),
(79, '2019_06_15_133553_create_contract_type_table', 0),
(80, '2019_06_15_133553_create_deguy_schedule_table', 0),
(81, '2019_06_15_133553_create_deleted_product_table', 0),
(82, '2019_06_15_133553_create_delivery_status_table', 0),
(83, '2019_06_15_133553_create_deliveryguy_table', 0),
(84, '2019_06_15_133553_create_order_delivery_table', 0),
(85, '2019_06_15_133553_create_order_details_table', 0),
(86, '2019_06_15_133553_create_orders_table', 0),
(87, '2019_06_15_133553_create_password_resets_table', 0),
(88, '2019_06_15_133553_create_payment_method_table', 0),
(89, '2019_06_15_133553_create_payment_method_type_table', 0),
(90, '2019_06_15_133553_create_previous_customer_table', 0),
(91, '2019_06_15_133553_create_previous_valued_customer_table', 0),
(92, '2019_06_15_133553_create_products_table', 0),
(93, '2019_06_15_133553_create_suppliers_table', 0),
(94, '2019_06_15_133553_create_suppliers_contract_table', 0),
(95, '2019_06_15_133553_create_users_table', 0),
(96, '2019_06_15_133553_create_users_addresses_table', 0),
(97, '2019_06_15_133553_create_wishlist_table', 0),
(98, '2019_06_15_133555_add_foreign_keys_to_cart_table', 0),
(99, '2019_06_15_133555_add_foreign_keys_to_deliveryguy_table', 0),
(100, '2019_06_15_133555_add_foreign_keys_to_users_addresses_table', 0),
(101, '2019_07_13_091331_create_address_type_table', 0),
(102, '2019_07_13_091331_create_addresses_table', 0),
(103, '2019_07_13_091331_create_cart_table', 0),
(104, '2019_07_13_091331_create_categories_table', 0),
(105, '2019_07_13_091331_create_contract_type_table', 0),
(106, '2019_07_13_091331_create_deguy_schedule_table', 0),
(107, '2019_07_13_091331_create_deleted_product_table', 0),
(108, '2019_07_13_091331_create_delivery_status_table', 0),
(109, '2019_07_13_091331_create_deliveryguy_table', 0),
(110, '2019_07_13_091331_create_myjob_table', 0),
(111, '2019_07_13_091331_create_order_delivery_table', 0),
(112, '2019_07_13_091331_create_order_details_table', 0),
(113, '2019_07_13_091331_create_orders_table', 0),
(114, '2019_07_13_091331_create_password_resets_table', 0),
(115, '2019_07_13_091331_create_payment_method_table', 0),
(116, '2019_07_13_091331_create_payment_method_type_table', 0),
(117, '2019_07_13_091331_create_previous_customer_table', 0),
(118, '2019_07_13_091331_create_previous_valued_customer_table', 0),
(119, '2019_07_13_091331_create_products_table', 0),
(120, '2019_07_13_091331_create_suppliers_table', 0),
(121, '2019_07_13_091331_create_suppliers_contract_table', 0),
(122, '2019_07_13_091331_create_users_table', 0),
(123, '2019_07_13_091331_create_users_addresses_table', 0),
(124, '2019_07_13_091331_create_wishlist_table', 0),
(125, '2019_07_13_091333_add_foreign_keys_to_cart_table', 0),
(126, '2019_07_13_091333_add_foreign_keys_to_deliveryguy_table', 0),
(127, '2019_07_13_091333_add_foreign_keys_to_myjob_table', 0),
(128, '2019_07_13_091333_add_foreign_keys_to_users_addresses_table', 0),
(129, '2019_07_13_091333_add_foreign_keys_to_wishlist_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `myjob`
--

DROP TABLE IF EXISTS `myjob`;
CREATE TABLE IF NOT EXISTS `myjob` (
  `idu` int(11) NOT NULL,
  `daydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deliverycount` int(11) NOT NULL DEFAULT '0',
  `gain` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idu`,`daydate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myjob`
--

INSERT INTO `myjob` (`idu`, `daydate`, `deliverycount`, `gain`) VALUES
(31, '2019-06-13 09:35:37', 1, 10),
(31, '2019-07-13 09:36:06', 1, 30),
(31, '2019-07-13 09:36:23', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_Id` int(11) NOT NULL,
  `Customer_Id` int(10) NOT NULL,
  `Payment_Method_Id` int(11) NOT NULL,
  `Order_Date` timestamp NOT NULL,
  `Shipping_Date` timestamp NOT NULL,
  `Ship_Name` varchar(45) NOT NULL,
  `Ship_Address` varchar(60) NOT NULL,
  `Ship_City` varchar(15) NOT NULL,
  `Ship_State` varchar(15) NOT NULL,
  `Ship_Postal_Code` varchar(10) NOT NULL,
  `Ship_Country` varchar(15) NOT NULL,
  `Order_Confirmed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Order_Id`,`Customer_Id`,`Payment_Method_Id`),
  UNIQUE KEY `Order_id_UNIQUE` (`Order_Id`),
  KEY `fk_Orders_Customers1_idx` (`Customer_Id`),
  KEY `fk_Orders_Payment_Method1_idx` (`Payment_Method_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `Customer_Id`, `Payment_Method_Id`, `Order_Date`, `Shipping_Date`, `Ship_Name`, `Ship_Address`, `Ship_City`, `Ship_State`, `Ship_Postal_Code`, `Ship_Country`, `Order_Confirmed`) VALUES
(1000, 14, 1, '2019-05-29 21:00:00', '2019-05-29 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 1),
(1001, 14, 1, '2019-05-29 21:00:00', '2019-05-29 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1002, 28, 1, '2019-06-02 21:00:00', '2019-06-02 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1003, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1004, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 1),
(1005, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1006, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1007, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1008, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1009, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 1),
(1010, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1011, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 1),
(1012, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1013, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1014, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1015, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1016, 28, 1, '2019-06-15 21:00:00', '2019-06-15 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1018, 31, 1, '2019-06-22 21:00:00', '2019-06-22 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1019, 31, 1, '2019-06-28 21:00:00', '2019-06-28 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0),
(1020, 31, 1, '2019-06-30 21:00:00', '2019-06-30 21:00:00', 'hussein', 'User_Address', 'user_city', 'user_state', '1700', 'lebanon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery`
--

DROP TABLE IF EXISTS `order_delivery`;
CREATE TABLE IF NOT EXISTS `order_delivery` (
  `Order_Id` int(11) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Delivery_Status_id` int(11) NOT NULL,
  PRIMARY KEY (`Order_Id`,`Order_Date`),
  KEY `fk_Order_Delivery_Delivery_Status1_idx` (`Delivery_Status_id`),
  KEY `fk_Order_Delivery_Order_Details1_idx` (`Order_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_delivery`
--

INSERT INTO `order_delivery` (`Order_Id`, `Order_Date`, `Delivery_Status_id`) VALUES
(1000, '2019-05-30 02:16:36', 11),
(1001, '2019-05-30 02:16:36', 11),
(1002, '2019-06-03 04:01:04', 11),
(1003, '2019-06-16 09:54:54', 11),
(1004, '2019-06-16 09:54:55', 11),
(1005, '2019-06-16 10:18:27', 11),
(1006, '2019-06-16 10:29:31', 11),
(1007, '2019-06-16 10:29:32', 11),
(1008, '2019-06-16 10:33:02', 11),
(1009, '2019-06-16 10:33:02', 11),
(1010, '2019-06-16 10:33:02', 11),
(1011, '2019-06-16 10:33:02', 11),
(1012, '2019-06-16 10:33:02', 11),
(1013, '2019-06-16 10:33:02', 11),
(1014, '2019-06-16 10:33:02', 11),
(1015, '2019-06-16 10:33:02', 11),
(1016, '2019-06-16 11:58:40', 11),
(1018, '2019-06-23 04:47:19', 11),
(1019, '2019-06-29 11:48:15', 11),
(1020, '2019-07-01 09:01:04', 11);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `Order_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Order_Quantity` int(11) NOT NULL,
  `Order_Price` decimal(8,2) DEFAULT NULL,
  `Order_Total` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`Order_Id`,`Product_Id`),
  KEY `fk_Orders_has_Products_Products1_idx` (`Product_Id`),
  KEY `fk_Orders_has_Products_Orders1_idx` (`Order_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_Id`, `Product_Id`, `Order_Quantity`, `Order_Price`, `Order_Total`) VALUES
(1000, 20013, 1, '23.00', '23.00'),
(1001, 20020, 1, '23.00', '23.00'),
(1002, 20025, 1, '23.00', '23.00'),
(1003, 20003, 1, '23.00', '23.00'),
(1004, 20002, 1, '23.00', '23.00'),
(1005, 20013, 1, '23.00', '23.00'),
(1006, 20020, 1, '23.00', '23.00'),
(1007, 20020, 1, '23.00', '23.00'),
(1008, 20020, 1, '23.00', '23.00'),
(1009, 20025, 1, '23.00', '23.00'),
(1010, 20025, 1, '23.00', '23.00'),
(1011, 20020, 1, '23.00', '23.00'),
(1012, 20020, 1, '23.00', '23.00'),
(1013, 20020, 1, '23.00', '23.00'),
(1014, 20015, 1, '23.00', '23.00'),
(1015, 20014, 1, '23.00', '23.00'),
(1016, 20013, 1, '23.00', '23.00'),
(1018, 20008, 1, '23.00', '23.00'),
(1019, 20013, 1, '23.00', '23.00'),
(1020, 20020, 1, '23.00', '23.00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mhdi.hsen@gmail.com', '$2y$10$ALf.jwmohdP5J7k5SyKp6uoGTWlyFhvGnfDcCoc8Jh1P4jEyCJoSi', '2019-05-29 15:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `Payment_Method_Id` int(11) NOT NULL,
  `Customer_Id` int(10) UNSIGNED NOT NULL,
  `Payment_Method_Type_ID` int(11) NOT NULL,
  `Card_Number` varchar(16) DEFAULT NULL,
  `Valid_From_Year` year(4) DEFAULT NULL,
  `Valid_Till_Year` year(4) DEFAULT NULL,
  PRIMARY KEY (`Payment_Method_Id`),
  KEY `fk_Payment_Method_Customers1_idx` (`Customer_Id`),
  KEY `fk_Payment_Method_Payment_Method_Type1_idx` (`Payment_Method_Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_type`
--

DROP TABLE IF EXISTS `payment_method_type`;
CREATE TABLE IF NOT EXISTS `payment_method_type` (
  `Payment_Method_Type_Id` int(11) NOT NULL,
  `Payment_Method_Description` varchar(45) NOT NULL,
  PRIMARY KEY (`Payment_Method_Type_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method_type`
--

INSERT INTO `payment_method_type` (`Payment_Method_Type_Id`, `Payment_Method_Description`) VALUES
(1, 'Credit Card'),
(2, 'Debit Card'),
(3, 'Online Payment'),
(4, 'Cash Payment'),
(5, 'Cheque Payment'),
(6, 'Money Order'),
(7, 'Gift Card or Voucher');

-- --------------------------------------------------------

--
-- Table structure for table `previous_customer`
--

DROP TABLE IF EXISTS `previous_customer`;
CREATE TABLE IF NOT EXISTS `previous_customer` (
  `Previous_Customer_Id` int(11) NOT NULL,
  `Previous_Customer_FirstName` varchar(45) DEFAULT NULL,
  `Previous_Customer_LastName` varchar(45) DEFAULT NULL,
  `Previous_Customer_Phone` varchar(45) DEFAULT NULL,
  `Previous_Customer_Email` varchar(45) DEFAULT NULL,
  `Delete_On` datetime DEFAULT NULL,
  PRIMARY KEY (`Previous_Customer_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `previous_valued_customer`
--

DROP TABLE IF EXISTS `previous_valued_customer`;
CREATE TABLE IF NOT EXISTS `previous_valued_customer` (
  `Previous_Customer_Id` int(11) NOT NULL,
  `Previous_Customer_FirstName` varchar(45) DEFAULT NULL,
  `Previous_Customer_LastName` varchar(45) DEFAULT NULL,
  `Previous_Customer_Phone` varchar(45) DEFAULT NULL,
  `Previous_Customer_Email` varchar(45) DEFAULT NULL,
  `Delete_On` datetime DEFAULT NULL,
  PRIMARY KEY (`Previous_Customer_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Product_Id` int(11) NOT NULL,
  `Suppliers_Id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Product_Name` varchar(45) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `Product_Unit_Price` decimal(8,2) NOT NULL,
  `Product_Unit_InStock` int(11) NOT NULL,
  `Product_Availability_Status` enum('Y','N') DEFAULT NULL,
  `Sold_Per_Week` int(11) NOT NULL DEFAULT '0',
  `IsNew` tinyint(1) NOT NULL DEFAULT '1',
  `rating` enum('1','2','3','4','5') NOT NULL DEFAULT '1',
  PRIMARY KEY (`Product_Id`,`Suppliers_Id`,`Category_Id`),
  UNIQUE KEY `Product_id_UNIQUE` (`Product_Id`),
  KEY `fk_Product_Suppliers1_idx` (`Suppliers_Id`),
  KEY `fk_Product_Categories1_idx` (`Category_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Suppliers_Id`, `Category_Id`, `Product_Name`, `brand`, `Product_Unit_Price`, `Product_Unit_InStock`, `Product_Availability_Status`, `Sold_Per_Week`, `IsNew`, `rating`) VALUES
(20001, 30800, 10001, 'Pepsi', 'pepsi', '320.55', 100, 'Y', 0, 0, '3'),
(20002, 30800, 10002, 'Tawoo', 'burami', '355.00', 197, 'Y', 0, 1, '3'),
(20003, 30800, 10002, 'Labneh', 'taaneyel', '100.55', 0, 'N', 0, 1, '1'),
(20004, 30800, 10004, 'cheese', 'kiri', '255.55', 294, 'Y', 0, 1, '3'),
(20005, 30800, 10005, '3 in 1 gold', 'nescafe', '333.33', 100, 'Y', 0, 0, '5'),
(20006, 30810, 10001, 'Crispy', 'goldenchicken', '1320.55', 0, 'N', 0, 0, '4'),
(20007, 30810, 10002, 'Hamburguer', 'al taghziya', '3255.00', 190, 'Y', 0, 0, '2'),
(20008, 30810, 10002, 'Chips cheese', 'master', '1030.55', 373, 'Y', 0, 0, '4'),
(20009, 30810, 10004, 'Chips ketshup', 'master', '2555.55', 300, 'Y', 0, 0, '1'),
(20010, 30810, 10005, 'Pizza', 'master', '338.33', 100, 'Y', 0, 1, '2'),
(20011, 30820, 10005, 'Mankoushet Zaatar', 'bou marwan', '120.55', 120, 'Y', 0, 1, '1'),
(20012, 30820, 10004, 'Mankoushet Jebneh', 'bu marwan', '325.00', 270, 'Y', 0, 1, '1'),
(20013, 30820, 10002, 'Meat', 'elbayruti', '130.55', 490, 'Y', 0, 1, '4'),
(20014, 30820, 10003, 'Miranda', 'miranda', '555.55', 370, 'Y', 0, 0, '3'),
(20015, 30820, 10003, 'Water ', 'sahha', '338.22', 156, 'Y', 0, 1, '2'),
(20016, 30830, 10004, 'Feez', 'feez', '1202.55', 1202, 'Y', 0, 1, '5'),
(20017, 30830, 10004, 'Zinger', 'goldenchicken', '3254.00', 2704, 'Y', 0, 1, '1'),
(20018, 30830, 10001, 'T-shirt', 'zara', '1350.55', 4896, 'Y', 0, 1, '1'),
(20019, 30830, 10003, 'Pants', 'zara', '5585.55', 3750, 'Y', 0, 1, '1'),
(20020, 30830, 10002, 'Cheese Hallom', 'taaneyel', '3738.22', 1569, 'Y', 0, 1, '2'),
(20021, 30840, 10005, 'cleaning suppliment', 'fairy', '1202.55', 10, 'Y', 0, 1, '4'),
(20022, 30840, 10004, 'cleaning suppliment', 'persil', '3254.00', 0, 'N', 0, 1, '2'),
(20023, 30840, 10003, 'cleaning suppliment', 'clorox', '1350.55', 46, 'Y', 0, 1, '1'),
(20024, 30840, 10001, 'Cheese Ikawi', 'taaneyel', '5585.55', 30, 'Y', 0, 1, '1'),
(20025, 30840, 10002, 'Banadoura', 'feres', '3738.22', 7, 'Y', 0, 0, '5');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `Suppliers_id` int(11) NOT NULL,
  `Company_Name` varchar(45) NOT NULL,
  `Contact_Name` varchar(45) NOT NULL,
  `img` varchar(100) DEFAULT '\\shopaavatar.jpg',
  `Address` varchar(60) NOT NULL,
  `City` varchar(15) NOT NULL,
  `State` varchar(15) NOT NULL,
  `Postal_Code` varchar(10) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Supplier_Phone` varchar(12) NOT NULL,
  `Supplier_Fax` varchar(12) DEFAULT NULL,
  `Supplier_EMail` varchar(45) NOT NULL,
  `adv` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Suppliers_id`),
  UNIQUE KEY `Suppliers_id_UNIQUE` (`Suppliers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`Suppliers_id`, `Company_Name`, `Contact_Name`, `img`, `Address`, `City`, `State`, `Postal_Code`, `Country`, `Supplier_Phone`, `Supplier_Fax`, `Supplier_EMail`, `adv`) VALUES
(30800, 'Facebook', 'Mark J', '\\shopaavatar.jpg', '1 Hacker Way', 'Menlo Park', 'California', '02115', 'USA', '857-763-0001', '857-763-9001', 'info@facebook.com', 1),
(30810, 'Google', 'Larry P', '\\shopaavatar.jpg', '100 Parker Hill', 'Dallas', 'Texas', '02125', 'USA', '857-763-0002', '857-763-9002', 'info@google.com', 0),
(30820, 'LinkedIN', 'Matthew H', '\\shopaavatar.jpg', '190 Marino St Way', 'Atlanta', 'Georgia', '02135', 'USA', '857-763-0003', '857-763-9003', 'info@linkedin.com', 0),
(30830, 'Apple', 'Tin Cook', '\\shopaavatar.jpg', '111 Symphony Rd', 'NYU', 'N York', '02140', 'USA', '857-763-0004', '857-763-9004', 'info@apple.com', 1),
(30840, 'HTC', 'John H', '\\shopaavatar.jpg', '1020 Misson Main', 'I Poli', 'Indina', '02195', 'USA', '857-763-0005', '857-763-9005', 'info@htc.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_contract`
--

DROP TABLE IF EXISTS `suppliers_contract`;
CREATE TABLE IF NOT EXISTS `suppliers_contract` (
  `Suppliers_id` int(11) NOT NULL,
  `Contract_Type_ID` int(11) NOT NULL,
  `Contract_Details` varchar(100) NOT NULL,
  `Date_Contract_Signed` date NOT NULL,
  `Number_Of_Months` smallint(2) NOT NULL,
  `Date_Contract_Expires` date DEFAULT NULL,
  PRIMARY KEY (`Suppliers_id`,`Contract_Type_ID`),
  KEY `fk_Suppliers_Contract_Contract_Type1_idx` (`Contract_Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers_contract`
--

INSERT INTO `suppliers_contract` (`Suppliers_id`, `Contract_Type_ID`, `Contract_Details`, `Date_Contract_Signed`, `Number_Of_Months`, `Date_Contract_Expires`) VALUES
(30800, 30100, 'Contract Details : Contract is about', '2016-01-01', 2, '2016-03-01'),
(30800, 30200, 'Contract Details : Contract is about', '2017-02-01', 12, '2018-02-01'),
(30810, 30300, 'Contract Details : Contract is about', '2010-03-22', 22, '2012-01-22'),
(30810, 30400, 'Contract Details : Contract is about', '2012-04-07', 32, '2014-12-07'),
(30810, 30500, 'Contract Details : Contract is about', '2009-05-13', 25, '2011-06-13'),
(30820, 30100, 'Contract Details : Contract is about', '2011-11-21', 72, '2017-11-21'),
(30820, 30300, 'Contract Details : Contract is about', '2014-10-17', 78, '2021-04-17'),
(30820, 30600, 'Contract Details : Contract is about', '2016-12-23', 52, '2021-04-23'),
(30830, 30800, 'Contract Details : Contract is about', '2017-09-11', 13, '2018-10-11'),
(30840, 30900, 'Contract Details : Contract is about', '2015-11-07', 19, '2017-06-07'),
(30840, 30901, 'Contract Details : Contract is about', '2017-08-09', 10, '2018-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT './img/avatar.png',
  `dg` tinyint(1) NOT NULL DEFAULT '0',
  `newsletters` bit(1) NOT NULL DEFAULT b'0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `email_verified_at`, `password`, `phone`, `img`, `dg`, `newsletters`, `remember_token`, `created_at`, `updated_at`) VALUES
(31, 'hussein', 'mehdi', 'mhdi.hsen@gmail.com', '2019-06-19 06:55:47', '$2y$10$bPQOAErwEMvlfMbwW9TQm.c93/.skbllmM3/UJtG2aG6W5aMIpDyu', '71416551', './img/uploads/31--img', 1, b'0', NULL, '2019-06-19 06:55:23', '2019-07-14 10:39:27'),
(32, 'mahdi', 'safi', 'mehdii.alsafii@gmail.com', NULL, '$2y$10$O.qg/l9le5kS.gbYL4smQufF48F2SVkc3jIXvbwZwN/jhVaTyEPlu', '1111111111', './img/uploads/32--img', 0, b'0', NULL, '2019-07-01 06:04:03', '2019-07-01 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `users_addresses`
--

DROP TABLE IF EXISTS `users_addresses`;
CREATE TABLE IF NOT EXISTS `users_addresses` (
  `Customer_id` int(10) UNSIGNED NOT NULL,
  `Address_id` int(10) UNSIGNED NOT NULL,
  `Address_Type_Code` int(11) NOT NULL,
  `Date_From` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Customer_id`,`Address_id`,`Address_Type_Code`),
  KEY `fk_Customers_has_Addresses_Addresses1_idx` (`Address_id`),
  KEY `fk_Customers_has_Addresses_Customers_idx` (`Customer_id`),
  KEY `fk_Customers_Addresses_Address_Type1_idx` (`Address_Type_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_addresses`
--

INSERT INTO `users_addresses` (`Customer_id`, `Address_id`, `Address_Type_Code`, `Date_From`) VALUES
(32, 1001, 1, '2016-12-18 00:00:00'),
(1000, 1000, 1, '2016-12-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id_wishitem` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  PRIMARY KEY (`id_wishitem`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_product_id_to_products_id` FOREIGN KEY (`Product_Id`) REFERENCES `products` (`Product_Id`),
  ADD CONSTRAINT `fk_user_id_to_users_id` FOREIGN KEY (`User_Id`) REFERENCES `users` (`id`);

--
-- Constraints for table `deliveryguy`
--
ALTER TABLE `deliveryguy`
  ADD CONSTRAINT `fk_schedule_id_to_deguy` FOREIGN KEY (`Deguy_Schedule_id`) REFERENCES `deguy_schedule` (`Schedule_id`);

--
-- Constraints for table `myjob`
--
ALTER TABLE `myjob`
  ADD CONSTRAINT `fk__id_to_users_id` FOREIGN KEY (`idu`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD CONSTRAINT `fk_address_id_to_user_address` FOREIGN KEY (`Address_id`) REFERENCES `addresses` (`Address_id`),
  ADD CONSTRAINT `fk_user_address_to_address_type` FOREIGN KEY (`Address_Type_Code`) REFERENCES `address_type` (`Address_Type_Code`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_wish_product_prodcut` FOREIGN KEY (`product_id`) REFERENCES `products` (`Product_Id`),
  ADD CONSTRAINT `fk_wish_user_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
