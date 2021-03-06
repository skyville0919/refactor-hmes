-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 10:34 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmes_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_con`
--

CREATE TABLE `accepted_con` (
  `Con_ID` int(11) NOT NULL,
  `Ref_No` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(12,4) NOT NULL,
  `Personnel_Assigned` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `accounting`
--

CREATE TABLE `accounting` (
  `TR_Acc` int(11) NOT NULL,
  `Ref_No` int(11) NOT NULL,
  `Reserved_to` varchar(100) DEFAULT NULL,
  `Acc_Date_Avail` date DEFAULT NULL,
  `Acc_Date_Paid` date DEFAULT NULL,
  `Acc_Type` varchar(50) NOT NULL,
  `Acc_Balance` decimal(6,2) NOT NULL,
  `Acc_Payment` decimal(6,2) NOT NULL,
  `Acc_Archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Acc_ID` int(11) NOT NULL,
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `M_Name` varchar(10) DEFAULT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `isVerified` tinyint(1) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `Code` varchar(10) NOT NULL,
  `Archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Acc_ID`, `F_Name`, `L_Name`, `M_Name`, `Contact_No`, `Address`, `Email`, `Password`, `isVerified`, `token`, `Code`, `Archived`) VALUES
(1, 'Reginald', 'Legaspi', 'Dela Cruz', '09295196649', 'Binangonan, Rizal', 'legaspireginald.rl@gmail.com', '$2y$10$NXPIeENsvQELXbwFbJCMbOb4AX2HnFxET1KQFEwHks8YzAzdYBL0O', 1, NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `TR_Add` int(11) NOT NULL,
  `Ref_No` int(11) NOT NULL,
  `Add_Description` varchar(20) NOT NULL,
  `Add_Amount` decimal(6,2) NOT NULL,
  `Add_Quantity` tinyint(4) NOT NULL,
  `Add_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `add_ons_price`
--

CREATE TABLE `add_ons_price` (
  `add_on_id` int(11) NOT NULL,
  `add_on_name` varchar(50) NOT NULL,
  `add_on_price` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_ons_price`
--

INSERT INTO `add_ons_price` (`add_on_id`, `add_on_name`, `add_on_price`) VALUES
(1, 'lunch', '1500.0000'),
(2, 'dinner', '1500.0000'),
(3, 'bed', '2000.0000'),
(4, 'concierge', '500.0000');

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `Acc_ID` int(11) NOT NULL,
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `M_Name` varchar(10) DEFAULT NULL,
  `Contact_No` varchar(15) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Code` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `Archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`Acc_ID`, `F_Name`, `L_Name`, `M_Name`, `Contact_No`, `Username`, `Password`, `Role`, `Code`, `date_created`, `Archived`) VALUES
(1, 'Reginald', 'Legaspi', 'Dela Cruz', '09295196649', 'admin', 'admin', 'HOUSEKEEPING-ADMIN', '1', '0000-00-00 00:00:00', 1),
(2, 'Don', 'Cool', 'Spa', '09295196649', 'accountadmin', 'accountadmin', 'ACCOUNT-ADMIN', '1', '0000-00-00 00:00:00', 1),
(3, 'Reginald', 'Cool', 'Spa', '09295196649', 'reservation', 'reservation', 'RESERVATION-ADMIN', '1', '2018-12-07 00:00:00', 1),
(4, 'First', 'Last', 'Middle', '09295196649', 'inventory', 'inventory', 'INVENTORY-ADMIN', '1', '2018-12-08 00:00:00', 1),
(5, 'REGINALD', 'LEGASPI', NULL, NULL, 'housekeeping', 'housekeeping', 'HOUSEKEEPING-ADMIN', '1', '2018-12-11 21:31:31', 1),
(6, 'ACCOUN', 'TING', NULL, NULL, 'accounting', 'accounting', 'ACCOUNTING-ADMIN', '1', '2018-12-14 12:49:10', 1),
(7, 'CMS', 'CMS', NULL, NULL, 'cms', 'cms', 'CMS-ADMIN', '1', '2018-12-14 18:27:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `log_id` int(11) NOT NULL,
  `Acc_ID` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`log_id`, `Acc_ID`, `account_name`, `login`, `logout`) VALUES
(1, 1, 'Reginald Legaspi', '2018-12-07 14:18:06', '0000-00-00 00:00:00'),
(2, 1, 'Reginald Legaspi', '2018-12-07 14:19:30', '2018-12-07 14:19:33'),
(3, 1, 'Reginald Legaspi', '2018-12-07 14:19:59', '2018-12-07 14:20:02'),
(4, 2, 'Don Cool', '2018-12-07 14:28:28', '2018-12-07 14:54:45'),
(5, 3, 'Reginald Cool', '2018-12-07 19:11:39', '0000-00-00 00:00:00'),
(6, 3, 'Reginald Cool', '2018-12-07 20:13:38', '0000-00-00 00:00:00'),
(7, 3, 'Reginald Cool', '2018-12-08 09:14:48', '2018-12-08 09:27:42'),
(8, 2, 'Don Cool', '2018-12-08 09:27:50', '2018-12-08 09:30:45'),
(9, 1, 'Reginald Legaspi', '2018-12-08 09:30:51', '2018-12-14 18:28:25'),
(10, 2, 'Don Cool', '2018-12-08 09:32:49', '0000-00-00 00:00:00'),
(11, 3, 'Reginald Cool', '2018-12-08 09:34:20', '2018-12-08 09:40:54'),
(12, 4, 'First Last', '2018-12-08 09:43:13', '0000-00-00 00:00:00'),
(13, 2, 'Don Cool', '2018-12-10 21:37:49', '0000-00-00 00:00:00'),
(14, 2, 'Don Cool', '2018-12-11 21:24:38', '0000-00-00 00:00:00'),
(15, 4, 'First Last', '2018-12-14 11:22:58', '2018-12-14 11:57:43'),
(16, 5, 'REGINALD LEGASPI', '2018-12-14 11:57:52', '0000-00-00 00:00:00'),
(17, 5, 'REGINALD LEGASPI', '2018-12-14 11:58:58', '0000-00-00 00:00:00'),
(18, 5, 'REGINALD LEGASPI', '2018-12-14 12:00:49', '0000-00-00 00:00:00'),
(19, 5, 'REGINALD LEGASPI', '2018-12-14 12:02:33', '2018-12-14 12:05:16'),
(20, 2, 'Don Cool', '2018-12-14 12:04:53', '0000-00-00 00:00:00'),
(21, 3, 'Reginald Cool', '2018-12-14 12:05:21', '0000-00-00 00:00:00'),
(22, 5, 'REGINALD LEGASPI', '2018-12-14 12:05:49', '0000-00-00 00:00:00'),
(23, 2, 'Don Cool', '2018-12-14 12:48:10', '0000-00-00 00:00:00'),
(24, 6, 'ACCOUN TING', '2018-12-14 12:49:21', '0000-00-00 00:00:00'),
(25, 6, 'ACCOUN TING', '2018-12-14 12:51:56', '0000-00-00 00:00:00'),
(26, 6, 'ACCOUN TING', '2018-12-14 12:53:37', '0000-00-00 00:00:00'),
(27, 5, 'REGINALD LEGASPI', '2018-12-14 12:54:00', '0000-00-00 00:00:00'),
(28, 6, 'ACCOUN TING', '2018-12-14 12:54:14', '0000-00-00 00:00:00'),
(29, 6, 'ACCOUN TING', '2018-12-14 13:02:05', '0000-00-00 00:00:00'),
(30, 6, 'ACCOUN TING', '2018-12-14 13:09:11', '0000-00-00 00:00:00'),
(31, 5, 'REGINALD LEGASPI', '2018-12-14 13:10:08', '0000-00-00 00:00:00'),
(32, 6, 'ACCOUN TING', '2018-12-14 13:10:52', '0000-00-00 00:00:00'),
(33, 2, 'Don Cool', '2018-12-14 18:27:00', '0000-00-00 00:00:00'),
(34, 7, 'CMS CMS', '2018-12-14 18:28:28', '0000-00-00 00:00:00'),
(35, 7, 'CMS CMS', '2018-12-14 21:20:23', '0000-00-00 00:00:00'),
(36, 7, 'CMS CMS', '2018-12-14 22:06:18', '0000-00-00 00:00:00'),
(37, 7, 'CMS CMS', '2018-12-14 22:06:48', '0000-00-00 00:00:00'),
(38, 7, 'CMS CMS', '2018-12-15 09:43:17', '0000-00-00 00:00:00'),
(39, 7, 'CMS CMS', '2018-12-15 12:18:20', '0000-00-00 00:00:00'),
(40, 7, 'CMS CMS', '2018-12-15 23:29:06', '0000-00-00 00:00:00'),
(41, 6, 'ACCOUN TING', '2018-12-16 09:55:33', '2018-12-16 10:51:31'),
(42, 6, 'ACCOUN TING', '2018-12-16 10:51:37', '0000-00-00 00:00:00'),
(43, 3, 'Reginald Cool', '2018-12-16 15:57:56', '2018-12-16 16:16:51'),
(44, 7, 'CMS CMS', '2018-12-16 16:17:01', '0000-00-00 00:00:00'),
(45, 6, 'ACCOUN TING', '2018-12-16 21:44:57', '2018-12-16 22:03:43'),
(46, 6, 'ACCOUN TING', '2018-12-16 22:03:48', '0000-00-00 00:00:00'),
(47, 6, 'ACCOUN TING', '2018-12-17 06:33:35', '0000-00-00 00:00:00'),
(48, 6, 'ACCOUN TING', '2018-12-18 08:16:13', '0000-00-00 00:00:00'),
(49, 2, 'Don Cool', '2018-12-18 08:23:43', '2018-12-18 08:24:59'),
(50, 5, 'REGINALD LEGASPI', '2018-12-18 08:26:09', '0000-00-00 00:00:00'),
(51, 5, 'REGINALD LEGASPI', '2018-12-18 08:26:22', '0000-00-00 00:00:00'),
(52, 4, 'First Last', '2018-12-18 08:26:35', '0000-00-00 00:00:00'),
(53, 5, 'REGINALD LEGASPI', '2018-12-18 08:28:26', '0000-00-00 00:00:00'),
(54, 5, 'REGINALD LEGASPI', '2018-12-18 08:31:03', '0000-00-00 00:00:00'),
(55, 5, 'REGINALD LEGASPI', '2018-12-18 08:32:38', '0000-00-00 00:00:00'),
(56, 5, 'REGINALD LEGASPI', '2018-12-18 08:33:38', '0000-00-00 00:00:00'),
(57, 5, 'REGINALD LEGASPI', '2018-12-18 08:33:49', '0000-00-00 00:00:00'),
(58, 5, 'REGINALD LEGASPI', '2018-12-18 08:41:10', '0000-00-00 00:00:00'),
(59, 5, 'REGINALD LEGASPI', '2018-12-18 08:43:30', '0000-00-00 00:00:00'),
(60, 5, 'REGINALD LEGASPI', '2018-12-18 08:46:27', '0000-00-00 00:00:00'),
(61, 5, 'REGINALD LEGASPI', '2018-12-18 08:50:27', '0000-00-00 00:00:00'),
(62, 5, 'REGINALD LEGASPI', '2018-12-18 08:58:41', '0000-00-00 00:00:00'),
(63, 5, 'REGINALD LEGASPI', '2018-12-18 09:03:18', '0000-00-00 00:00:00'),
(64, 5, 'REGINALD LEGASPI', '2018-12-18 09:03:43', '0000-00-00 00:00:00'),
(65, 5, 'REGINALD LEGASPI', '2018-12-18 09:04:20', '0000-00-00 00:00:00'),
(66, 5, 'REGINALD LEGASPI', '2018-12-18 09:04:38', '0000-00-00 00:00:00'),
(67, 5, 'REGINALD LEGASPI', '2018-12-18 09:05:13', '0000-00-00 00:00:00'),
(68, 5, 'REGINALD LEGASPI', '2018-12-18 09:05:30', '0000-00-00 00:00:00'),
(69, 5, 'REGINALD LEGASPI', '2018-12-18 09:14:59', '0000-00-00 00:00:00'),
(70, 5, 'REGINALD LEGASPI', '2018-12-18 09:20:40', '0000-00-00 00:00:00'),
(71, 5, 'REGINALD LEGASPI', '2018-12-18 09:21:05', '0000-00-00 00:00:00'),
(72, 4, 'First Last', '2018-12-18 09:34:36', '0000-00-00 00:00:00'),
(73, 4, 'First Last', '2018-12-18 09:39:19', '0000-00-00 00:00:00'),
(74, 3, 'Reginald Cool', '2018-12-18 09:56:57', '2018-12-18 10:16:09'),
(75, 7, 'CMS CMS', '2018-12-18 10:16:25', '0000-00-00 00:00:00'),
(76, 6, 'ACCOUN TING', '2018-12-23 13:37:34', '2018-12-23 14:49:13'),
(77, 3, 'Reginald Cool', '2018-12-23 14:49:20', '0000-00-00 00:00:00'),
(78, 3, 'Reginald Cool', '2018-12-23 19:18:45', '0000-00-00 00:00:00'),
(79, 3, 'Reginald Cool', '2018-12-29 15:18:15', '0000-00-00 00:00:00'),
(80, 3, 'Reginald Cool', '2018-12-30 20:57:17', '0000-00-00 00:00:00'),
(81, 3, 'Reginald Cool', '2019-01-01 10:10:26', '0000-00-00 00:00:00'),
(82, 4, 'First Last', '2019-01-06 09:06:56', '2019-01-06 09:16:21'),
(83, 3, 'Reginald Cool', '2019-01-06 09:16:31', '0000-00-00 00:00:00'),
(84, 3, 'Reginald Cool', '2019-01-06 21:16:03', '2019-01-06 21:55:26'),
(85, 5, 'REGINALD LEGASPI', '2019-01-06 21:55:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `Amenities_ID` int(11) NOT NULL,
  `Amenities_Type` varchar(50) NOT NULL,
  `Amenities_Desc` varchar(500) NOT NULL,
  `Amenities_Price` decimal(10,2) NOT NULL,
  `Amenities_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bedroom`
--

CREATE TABLE `bedroom` (
  `Bed_ID` int(11) NOT NULL,
  `Bed_Adult` tinyint(5) NOT NULL,
  `Bed_Child` tinyint(5) DEFAULT NULL,
  `Bed_Type` varchar(15) NOT NULL,
  `Bed_Available` int(11) NOT NULL,
  `Bed_Description` varchar(500) NOT NULL,
  `Bed_Price` decimal(6,2) NOT NULL,
  `Bed_Image` varchar(100) DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bedroom`
--

INSERT INTO `bedroom` (`Bed_ID`, `Bed_Adult`, `Bed_Child`, `Bed_Type`, `Bed_Available`, `Bed_Description`, `Bed_Price`, `Bed_Image`, `status`) VALUES
(1, 5, 5, 'STUDIO-ROOM', -167, '\r\nThe Corinthnians Sky Studio includes two bed and creates a refined ambiance of understated classic luxury.', '9000.00', 'images/bedroom/sky-studio.jpg', 'ACTIVE'),
(2, 2, 2, 'ECONOMY-SINGLE', 4, 'test', '7500.00', 'images/bedroom/single.jpg', 'ACTIVE'),
(3, 3, 3, 'STANDARD-TWIN', 7, 'The Sky Twin Room comes with two single beds with Dreamax Mattress, a modern fully equipped \r\n										bathroom finished in top quality bronze-coloured ceramics. ', '9000.00', 'images/bedroom/twin.jpg', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `bed_res`
--

CREATE TABLE `bed_res` (
  `TR_Bed` int(11) NOT NULL,
  `Ref_No` int(11) NOT NULL,
  `Reserved_to` varchar(100) NOT NULL,
  `Bed_ID` int(11) NOT NULL,
  `Bed_Adult` int(11) NOT NULL,
  `Bed_Child` int(11) NOT NULL,
  `Bed_Date` date NOT NULL,
  `Bed_Date_In` date NOT NULL,
  `Bed_Date_Out` date NOT NULL,
  `Bed_Remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `TR_Bill` int(11) NOT NULL,
  `Ref_No` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `concierge`
--

CREATE TABLE `concierge` (
  `TR_Conc` int(11) NOT NULL,
  `Ref_No` int(11) NOT NULL,
  `Emp_ID` int(11) NOT NULL,
  `Conc_Date_Req` date NOT NULL,
  `Conc_Description` varchar(20) NOT NULL,
  `Conc_Amount` decimal(6,2) DEFAULT NULL,
  `Conc_Serv_Charge` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `concierge_request`
--

CREATE TABLE `concierge_request` (
  `Req_ID` int(11) NOT NULL,
  `Ref_No` int(11) DEFAULT NULL,
  `TR_Desc` varchar(500) DEFAULT NULL,
  `TR_Qty` int(11) DEFAULT NULL,
  `Req_Date` date NOT NULL,
  `Archived` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concierge_request`
--

INSERT INTO `concierge_request` (`Req_ID`, `Ref_No`, `TR_Desc`, `TR_Qty`, `Req_Date`, `Archived`) VALUES
(1, 251, 'asd', 1, '2018-12-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contanct_info`
--

CREATE TABLE `contanct_info` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contanct_info`
--

INSERT INTO `contanct_info` (`id`, `facebook`, `twitter`, `instagram`, `other`) VALUES
(1, 'http://facebook.com', 'http://twitter.com', 'http://instagram.com', 'others.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Ref_No` int(11) NOT NULL,
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `M_Name` varchar(10) DEFAULT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Acc_ID` int(11) NOT NULL,
  `Archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Ref_No` varchar(10) NOT NULL,
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `M_Name` varchar(10) DEFAULT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Acc_ID` int(11) NOT NULL,
  `Archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE `customer_accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isVerified` tinyint(4) NOT NULL,
  `token` varchar(10) NOT NULL,
  `code` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_accounts`
--

INSERT INTO `customer_accounts` (`id`, `firstname`, `lastname`, `middlename`, `email`, `adress`, `contact`, `password`, `isVerified`, `token`, `code`) VALUES
(11, 'Reginald', 'Legaspi', 'dela cruz', 'legaspireginald.rl@gmail.com', '1940', '9295196649', '$2y$10$NXPIeENsvQELXbwFbJCMbOb4AX2HnFxET1KQFEwHks8YzAzdYBL0O', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_card`
--

CREATE TABLE `customer_card` (
  `Card_ID` int(11) NOT NULL,
  `Ref_No` int(11) DEFAULT NULL,
  `Card_Name` varchar(50) DEFAULT NULL,
  `Card_Number` int(100) DEFAULT NULL,
  `Card_Exp` varchar(50) DEFAULT NULL,
  `Card_Sec` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cus_log`
--

CREATE TABLE `cus_log` (
  `Acc_ID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Sex` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_accounts`
--

CREATE TABLE `emp_accounts` (
  `Emp_Acc_ID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Code` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `Archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_accounts`
--

INSERT INTO `emp_accounts` (`Emp_Acc_ID`, `Firstname`, `Lastname`, `Username`, `Password`, `Role`, `Code`, `date_created`, `Archived`) VALUES
(1, '', '', 'buenamar', 'admin1234', 'housekeeper', 0, '0000-00-00 00:00:00', 1),
(2, '', '', 'abueva', 'test1234', 'housekeeper', 1, '0000-00-00 00:00:00', 1),
(3, '', '', 'reginald', '009019096', 'housekeeper', 1, '0000-00-00 00:00:00', 0),
(4, '', '', 'reginald', '009019096', 'housekeeper', 1, '0000-00-00 00:00:00', 0),
(5, '', '', 'test123', 'test123', 'concierge', 1, '0000-00-00 00:00:00', 0),
(6, 'REGINALD', 'LEGASPI', 'ghie009', '009019096', 'Admin', 1, '2018-12-07 13:15:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_log`
--

CREATE TABLE `emp_log` (
  `Emp_Acc_ID` int(11) NOT NULL,
  `login` datetime NOT NULL,
  `Action` varchar(20) NOT NULL,
  `logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `Fac_ID` int(11) NOT NULL,
  `Fac_Capacity` int(11) DEFAULT NULL,
  `Fac_Type` varchar(50) NOT NULL,
  `Fac_Description` varchar(500) NOT NULL,
  `Fac_Image` varchar(100) DEFAULT NULL,
  `Fac_Price` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`Fac_ID`, `Fac_Capacity`, `Fac_Type`, `Fac_Description`, `Fac_Image`, `Fac_Price`) VALUES
(1, 100, 'FIESTA PAVILION', 'The Fiesta Pavilion is a popular choice for big conventions. It is a perfect balance between the old and the new, the traditional and progressive. It is easily divisible into 3 self-contained function rooms, namely the Pandanggo, the Polkabal and the Rigodon, catering to more intimate functions such as weddings and balls. The ballroom is equipped with state-of-the-art ceiling and lighting ?xtures that showcase seamless interplay between light and sound – an advantage for event organizers to matc', 'images/facilities/f1.jpg', '9000.00'),
(2, 100, 'FIESTA PAVILION', 'The Fiesta Pavilion is a popular choice for big conventions. It is a perfect balance between the old and the new, the traditional and progressive. It is easily divisible into 3 self-contained function rooms, namely the Pandanggo, the Polkabal and the Rigodon, catering to more intimate functions such as weddings and balls. The ballroom is equipped with state-of-the-art ceiling and lighting ?xtures that showcase seamless interplay between light and sound – an advantage for event organizers to matc', 'images/facilities/f1.jpg', '9000.00');

-- --------------------------------------------------------

--
-- Table structure for table `fac_res`
--

CREATE TABLE `fac_res` (
  `TR_Fac` int(11) NOT NULL,
  `Ref_No` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL,
  `Reserved_to` varchar(50) NOT NULL,
  `Fac_Attendees` int(11) NOT NULL,
  `Fac_Date` date NOT NULL,
  `Fac_Date_In` date NOT NULL,
  `Fac_Date_Out` date NOT NULL,
  `Fac_Time_In` time NOT NULL,
  `Fac_Time_Out` time NOT NULL,
  `Fac_Remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `housekeeping`
--

CREATE TABLE `housekeeping` (
  `date` datetime NOT NULL,
  `housekeeping_id` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `task` varchar(255) NOT NULL,
  `personnel_assigned` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `code` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Critical` varchar(50) NOT NULL,
  `Price` decimal(6,2) DEFAULT NULL,
  `Brand` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Item_ID`, `Name`, `Quantity`, `Critical`, `Price`, `Brand`) VALUES
(1, 'SHAMPOO', 5, '5', '12.00', 'SUNSILK'),
(2, 'SHAMPOO2', 2, '3', '12.00', 'SUNSILK2');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `package_photo` varchar(255) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `room_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `type`, `package_photo`, `quantity`, `room_status`) VALUES
(1, 'SKY', 'images/packages/sky-studio.jpg', '5', 1),
(2, 'TEST', 'images/packages/about.jpg', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reciept_log`
--

CREATE TABLE `reciept_log` (
  `Reciept_ID` int(11) NOT NULL,
  `TR_Acc` int(11) NOT NULL,
  `Reciept_Payment` decimal(6,2) NOT NULL,
  `Reciept_Change` decimal(6,2) NOT NULL,
  `Reciept_Date` date NOT NULL,
  `Reciept_Vat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restau_ID` int(11) NOT NULL,
  `Restau_Type` varchar(50) NOT NULL,
  `Restau_Price` decimal(10,2) NOT NULL,
  `Restau_Description` varchar(500) NOT NULL,
  `Restau_Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restau_ID`, `Restau_Type`, `Restau_Price`, `Restau_Description`, `Restau_Image`) VALUES
(1, 'ITALIAN STEAKHOUSE', '10000.00', 'Elevate your dining experience at Finestra Italian Steakhouse. Enjoy a superb steak experience that\'s a cut above the rest!', 'images/resto1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restau_res`
--

CREATE TABLE `restau_res` (
  `TR_Restau` int(11) NOT NULL,
  `Ref_No` int(11) NOT NULL,
  `Restau_ID` int(11) NOT NULL,
  `Reserved_to` varchar(50) NOT NULL,
  `Restau_Type` varchar(50) NOT NULL,
  `Restau_Seats` tinyint(5) NOT NULL,
  `Restau_Date` date NOT NULL,
  `Restau_Date_In` date NOT NULL,
  `Restau_Time_In` time NOT NULL,
  `Restau_Remarks` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Emp_ID` int(11) NOT NULL,
  `TR_No` varchar(10) NOT NULL,
  `TR_Type` varchar(10) NOT NULL,
  `Time_In` time NOT NULL,
  `Time_Out` time NOT NULL,
  `Date` date NOT NULL,
  `Team` varchar(15) DEFAULT NULL,
  `Archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `slider_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `room_type`, `slider_image`) VALUES
(1, 'STUDIO-ROOM', 'images/sliders/sky-studio.jpg'),
(3, 'STUDIO-ROOM', 'images/sliders/about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE `vat` (
  `Vat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`Vat`) VALUES
(12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_con`
--
ALTER TABLE `accepted_con`
  ADD PRIMARY KEY (`Con_ID`);

--
-- Indexes for table `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`TR_Acc`),
  ADD KEY `Ref_No` (`Ref_No`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Acc_ID`);

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`TR_Add`),
  ADD KEY `Ref_No` (`Ref_No`);

--
-- Indexes for table `add_ons_price`
--
ALTER TABLE `add_ons_price`
  ADD PRIMARY KEY (`add_on_id`);

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`Acc_ID`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`Amenities_ID`);

--
-- Indexes for table `bedroom`
--
ALTER TABLE `bedroom`
  ADD PRIMARY KEY (`Bed_ID`);

--
-- Indexes for table `bed_res`
--
ALTER TABLE `bed_res`
  ADD PRIMARY KEY (`TR_Bed`),
  ADD KEY `Ref_No` (`Ref_No`),
  ADD KEY `Bed_ID` (`Bed_ID`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`TR_Bill`),
  ADD KEY `Ref_No` (`Ref_No`);

--
-- Indexes for table `concierge`
--
ALTER TABLE `concierge`
  ADD PRIMARY KEY (`TR_Conc`),
  ADD KEY `Ref_No` (`Ref_No`),
  ADD KEY `Emp_ID` (`Emp_ID`);

--
-- Indexes for table `concierge_request`
--
ALTER TABLE `concierge_request`
  ADD PRIMARY KEY (`Req_ID`),
  ADD KEY `Ref_No` (`Ref_No`);

--
-- Indexes for table `contanct_info`
--
ALTER TABLE `contanct_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Ref_No`),
  ADD KEY `Acc_ID` (`Acc_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Ref_No`),
  ADD KEY `Acc_ID` (`Acc_ID`);

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_card`
--
ALTER TABLE `customer_card`
  ADD PRIMARY KEY (`Card_ID`),
  ADD KEY `Ref_No` (`Ref_No`);

--
-- Indexes for table `cus_log`
--
ALTER TABLE `cus_log`
  ADD KEY `Acc_ID` (`Acc_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `emp_accounts`
--
ALTER TABLE `emp_accounts`
  ADD PRIMARY KEY (`Emp_Acc_ID`);

--
-- Indexes for table `emp_log`
--
ALTER TABLE `emp_log`
  ADD KEY `Emp_Acc_ID` (`Emp_Acc_ID`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`Fac_ID`);

--
-- Indexes for table `fac_res`
--
ALTER TABLE `fac_res`
  ADD PRIMARY KEY (`TR_Fac`),
  ADD KEY `Fac_ID` (`Fac_ID`),
  ADD KEY `Ref_No` (`Ref_No`);

--
-- Indexes for table `housekeeping`
--
ALTER TABLE `housekeeping`
  ADD PRIMARY KEY (`housekeeping_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `reciept_log`
--
ALTER TABLE `reciept_log`
  ADD PRIMARY KEY (`Reciept_ID`),
  ADD KEY `TR_Acc` (`TR_Acc`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restau_ID`);

--
-- Indexes for table `restau_res`
--
ALTER TABLE `restau_res`
  ADD PRIMARY KEY (`TR_Restau`),
  ADD KEY `Restau_ID` (`Restau_ID`),
  ADD KEY `Ref_No` (`Ref_No`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD KEY `Emp_ID` (`Emp_ID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_con`
--
ALTER TABLE `accepted_con`
  MODIFY `Con_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `accounting`
--
ALTER TABLE `accounting`
  MODIFY `TR_Acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=558;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `TR_Add` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `add_ons_price`
--
ALTER TABLE `add_ons_price`
  MODIFY `add_on_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `Acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `Amenities_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bedroom`
--
ALTER TABLE `bedroom`
  MODIFY `Bed_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bed_res`
--
ALTER TABLE `bed_res`
  MODIFY `TR_Bed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `TR_Bill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `concierge`
--
ALTER TABLE `concierge`
  MODIFY `TR_Conc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `concierge_request`
--
ALTER TABLE `concierge_request`
  MODIFY `Req_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contanct_info`
--
ALTER TABLE `contanct_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Ref_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Acc_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_card`
--
ALTER TABLE `customer_card`
  MODIFY `Card_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_accounts`
--
ALTER TABLE `emp_accounts`
  MODIFY `Emp_Acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `Fac_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fac_res`
--
ALTER TABLE `fac_res`
  MODIFY `TR_Fac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `housekeeping`
--
ALTER TABLE `housekeeping`
  MODIFY `housekeeping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reciept_log`
--
ALTER TABLE `reciept_log`
  MODIFY `Reciept_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Restau_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restau_res`
--
ALTER TABLE `restau_res`
  MODIFY `TR_Restau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounting`
--
ALTER TABLE `accounting`
  ADD CONSTRAINT `accounting_ibfk_1` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`);

--
-- Constraints for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD CONSTRAINT `add_ons_ibfk_1` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`);

--
-- Constraints for table `bed_res`
--
ALTER TABLE `bed_res`
  ADD CONSTRAINT `bed_res_ibfk_1` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`),
  ADD CONSTRAINT `bed_res_ibfk_2` FOREIGN KEY (`Bed_ID`) REFERENCES `bedroom` (`Bed_ID`);

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`);

--
-- Constraints for table `concierge`
--
ALTER TABLE `concierge`
  ADD CONSTRAINT `concierge_ibfk_1` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`),
  ADD CONSTRAINT `concierge_ibfk_2` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`);

--
-- Constraints for table `concierge_request`
--
ALTER TABLE `concierge_request`
  ADD CONSTRAINT `concierge_request_ibfk_1` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Acc_ID`) REFERENCES `accounts` (`Acc_ID`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`Acc_ID`) REFERENCES `accounts` (`Acc_ID`);

--
-- Constraints for table `customer_card`
--
ALTER TABLE `customer_card`
  ADD CONSTRAINT `customer_card_ibfk_1` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`);

--
-- Constraints for table `cus_log`
--
ALTER TABLE `cus_log`
  ADD CONSTRAINT `cus_log_ibfk_1` FOREIGN KEY (`Acc_ID`) REFERENCES `accounts` (`Acc_ID`);

--
-- Constraints for table `emp_log`
--
ALTER TABLE `emp_log`
  ADD CONSTRAINT `emp_log_ibfk_1` FOREIGN KEY (`Emp_Acc_ID`) REFERENCES `emp_accounts` (`Emp_Acc_ID`);

--
-- Constraints for table `fac_res`
--
ALTER TABLE `fac_res`
  ADD CONSTRAINT `fac_res_ibfk_1` FOREIGN KEY (`Fac_ID`) REFERENCES `facility` (`Fac_ID`),
  ADD CONSTRAINT `fac_res_ibfk_2` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`);

--
-- Constraints for table `reciept_log`
--
ALTER TABLE `reciept_log`
  ADD CONSTRAINT `reciept_log_ibfk_1` FOREIGN KEY (`TR_Acc`) REFERENCES `accounting` (`TR_Acc`);

--
-- Constraints for table `restau_res`
--
ALTER TABLE `restau_res`
  ADD CONSTRAINT `restau_res_ibfk_1` FOREIGN KEY (`Restau_ID`) REFERENCES `restaurant` (`Restau_ID`),
  ADD CONSTRAINT `restau_res_ibfk_2` FOREIGN KEY (`Ref_No`) REFERENCES `customer` (`Ref_No`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
