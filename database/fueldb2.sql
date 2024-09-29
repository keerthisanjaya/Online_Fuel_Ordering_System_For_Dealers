-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 06:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fueldb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bowserassign`
--

CREATE TABLE `bowserassign` (
  `idbowser` int(11) NOT NULL,
  `invnum` varchar(50) NOT NULL,
  `fuelstationname` varchar(50) NOT NULL,
  `vehiclenum` varchar(50) NOT NULL,
  `drivernum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bowserassign`
--

INSERT INTO `bowserassign` (`idbowser`, `invnum`, `fuelstationname`, `vehiclenum`, `drivernum`) VALUES
(1, '5110_RZ_24', 'Namaluwa', 'KU-6018', 'EPF_78452544');

-- --------------------------------------------------------

--
-- Table structure for table `dailydip`
--

CREATE TABLE `dailydip` (
  `iddailydip` int(11) NOT NULL,
  `checkdate` date DEFAULT NULL,
  `petrol` int(11) DEFAULT NULL,
  `diesel` int(11) DEFAULT NULL,
  `superdiesel` int(11) DEFAULT NULL,
  `superpetrol` int(11) DEFAULT NULL,
  `fillingstation_idfillingstation` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dailydip`
--

INSERT INTO `dailydip` (`iddailydip`, `checkdate`, `petrol`, `diesel`, `superdiesel`, `superpetrol`, `fillingstation_idfillingstation`, `isdelete`) VALUES
(1, '2023-10-31', 122, 122, 122, 332, 3, 0),
(2, '2023-10-31', 1000, 555, 66, 555, 4, 0),
(3, '2023-11-22', 1222, 444, 4444, 444, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `iddocuments` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `filename` varchar(450) DEFAULT NULL,
  `uploaddate` date DEFAULT NULL,
  `isapproved` tinyint(4) DEFAULT NULL,
  `fillingstation_idfillingstation` int(11) NOT NULL,
  `approvedby` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`iddocuments`, `type`, `filename`, `uploaddate`, `isapproved`, `fillingstation_idfillingstation`, `approvedby`, `isdelete`) VALUES
(1, 'nic', '205504051.pdf', '2023-11-22', 0, 6, '0', 0),
(2, 'fuelstationdoc', '205504052.pdf', '2023-11-22', 0, 6, '0', 0),
(3, 'nic', '205504053.pdf', '2023-11-22', 0, 6, '0', 0),
(4, 'nic', '205504054.pdf', '2023-11-22', 0, 6, '0', 0),
(5, 'fuelstationdoc', '205504056.pdf', '2023-11-22', 0, 8, '0', 0),
(6, 'fuelstationdoc', '205504057.pdf', '2023-11-22', 0, 11, '0', 0),
(7, 'fuelstationdoc', '205504058.pdf', '2023-11-22', 0, 12, '0', 0),
(8, 'fuelstationdoc', 'dummy.pdf', '2023-11-23', 0, 13, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `idemployee` int(11) NOT NULL,
  `epf` varchar(45) DEFAULT NULL,
  `isactive` tinyint(4) DEFAULT NULL,
  `isavailable` tinyint(4) DEFAULT NULL,
  `employeetype_idemployeetype` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`idemployee`, `epf`, `isactive`, `isavailable`, `employeetype_idemployeetype`, `userid`, `isdelete`) VALUES
(4, 'EPF_50585496', 0, 0, 2, 14, 0),
(7, 'EPF_81279708', 0, 0, 2, 14, 0),
(8, 'EPF_78452544', 0, 0, 4, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employeetype`
--

CREATE TABLE `employeetype` (
  `idemployeetype` int(11) NOT NULL,
  `employeetype` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employeetype`
--

INSERT INTO `employeetype` (`idemployeetype`, `employeetype`, `isdelete`) VALUES
(2, 'Manager', 0),
(3, 'Gantry Operator', 0),
(4, 'Driver', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fillingstation`
--

CREATE TABLE `fillingstation` (
  `idfillingstation` int(11) NOT NULL,
  `fillingstation_name` varchar(45) DEFAULT NULL,
  `fillingstation_address` varchar(450) DEFAULT NULL,
  `numberoffueldespencers` int(11) DEFAULT NULL,
  `capacityofpetroltank` int(11) DEFAULT NULL,
  `capacityofdieseltank` int(11) DEFAULT NULL,
  `capacityofsuperpetrol` int(11) DEFAULT NULL,
  `capacityofsuperdiesel` int(11) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL,
  `Users_idUsers` int(11) NOT NULL,
  `isapproved` tinyint(4) DEFAULT NULL,
  `approvedby` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fillingstation`
--

INSERT INTO `fillingstation` (`idfillingstation`, `fillingstation_name`, `fillingstation_address`, `numberoffueldespencers`, `capacityofpetroltank`, `capacityofdieseltank`, `capacityofsuperpetrol`, `capacityofsuperdiesel`, `district`, `Users_idUsers`, `isapproved`, `approvedby`, `isdelete`) VALUES
(3, 'Maharagama ', '321 Railway Avenue', 12, 212, 212, 212, 212, 'Ampara', 14, 1, 'Thilina Abeysinghe', 0),
(4, 'Maharagama 2', 'Temple Road ', 2, 111, 11, 1232, 323, 'Colombo', 14, 1, 'Thilina Abeysinghe', 0),
(5, 'Gampaha', 'Gampaha 2213', 22, 22, 22, 22, 22, 'Ampara', 14, 1, 'Thilina Abeysinghe', 0),
(6, 'Namaluwa', 'Dekatana Rd\r\nNamaluwa', 7, 6600, 6600, 6600, 6600, 'Gampaha', 15, 1, 'Keerthi Hettiarachchi', 0),
(7, 'Gampaha', '321 dyd', 3, 122, 3333, 6600, 1222, 'Badulla', 15, 1, 'Keerthi Hettiarachchi', 0),
(8, 'Namaluwa', 'frrfer', 333, 333, 333, 333, 333, 'Ampara', 15, 1, 'Keerthi Hettiarachchi', 0),
(9, '', '', 0, 0, 0, 0, 0, 'Ampara', 15, 0, 'pending', 0),
(10, '', '', 0, 0, 0, 0, 0, 'Ampara', 15, 0, 'pending', 0),
(11, 'Kandy', '321 Kandy Temple Kandy', 2, 122, 222, 222, 22, 'Kandy', 15, 1, 'Keerthi Hettiarachchi', 0),
(12, 'Ragama', 'Ragama 2', 2, 2, 2, 2, 2, 'Colombo', 15, 1, 'Keerthi Hettiarachchi', 0),
(13, 'Kurunegala', 'Kurunegala KurunegalaKurunegala', 2, 2, 2, 2, 2, 'Kurunegala', 14, 1, 'Thilina Abeysinghe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `idLocation` int(11) NOT NULL,
  `locationname` varchar(45) DEFAULT NULL,
  `location_is_active` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`idLocation`, `locationname`, `location_is_active`, `isdelete`) VALUES
(10, 'Kollonawa', '1', 0),
(11, 'Mahargama', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE `loginlog` (
  `idloginlog` int(11) NOT NULL,
  `logindate` datetime DEFAULT NULL,
  `Users_idUsers` int(11) NOT NULL,
  `otpcode` varchar(45) DEFAULT NULL,
  `iscorrect` tinyint(4) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loginlog`
--

INSERT INTO `loginlog` (`idloginlog`, `logindate`, `Users_idUsers`, `otpcode`, `iscorrect`, `isdelete`) VALUES
(1, '2023-11-16 08:36:48', 14, '388376', 0, 0),
(2, '2023-11-16 08:38:14', 14, '306714', 0, 0),
(3, '2023-11-16 08:57:38', 14, '642074', 0, 0),
(4, '2023-11-16 08:58:08', 14, '973820', 0, 0),
(5, '2023-11-16 09:01:35', 14, '233613', 0, 0),
(6, '2023-11-16 11:00:43', 14, '910274', 0, 0),
(7, '2023-11-16 11:01:48', 14, '166687', 0, 0),
(8, '2023-11-16 12:12:52', 14, '400238', 0, 0),
(9, '2023-11-16 12:36:42', 14, '359611', 0, 0),
(10, '2023-11-16 12:37:30', 14, '587006', 0, 0),
(11, '2023-11-16 17:12:50', 15, '688758', 0, 0),
(12, '2023-11-16 17:14:05', 15, '720896', 0, 0),
(13, '2023-11-16 17:14:44', 15, '335986', 0, 0),
(14, '2023-11-16 17:18:06', 15, '661796', 0, 0),
(15, '2023-11-16 17:20:24', 15, '403367', 0, 0),
(16, '2023-11-18 17:45:29', 15, '935735', 0, 0),
(17, '2023-11-22 05:40:11', 15, '370502', 0, 0),
(18, '2023-11-22 05:56:26', 15, '257017', 0, 0),
(19, '2023-11-23 16:34:57', 14, '987243', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `materialprice`
--

CREATE TABLE `materialprice` (
  `idmaterialprice` int(11) NOT NULL,
  `materialtype` varchar(45) DEFAULT NULL,
  `materialprice` int(11) DEFAULT NULL,
  `material_is_active` varchar(45) DEFAULT NULL,
  `priceupdate` datetime NOT NULL,
  `isdelete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `materialprice`
--

INSERT INTO `materialprice` (`idmaterialprice`, `materialtype`, `materialprice`, `material_is_active`, `priceupdate`, `isdelete`) VALUES
(3, 'petrol', 100, '0', '2023-10-31 12:39:19', 0),
(4, 'deisel', 200, '1', '2023-10-31 12:39:37', 0),
(5, 'petrol', 150, '1', '2023-10-31 12:39:54', 0),
(6, 'superpetrol', 500, '0', '2023-10-31 15:12:21', 0),
(7, 'superpetrol', 600, '1', '2023-10-31 15:13:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `idorderitems` int(11) NOT NULL,
  `itemname` varchar(45) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `itemamount` double DEFAULT NULL,
  `orders_idorders` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`idorderitems`, `itemname`, `qty`, `itemamount`, `orders_idorders`, `isdelete`) VALUES
(1, 'deisel', 2, 400, 2, 0),
(2, 'petrol', 2, 300, 2, 0),
(3, 'superpetrol', 2, 1200, 2, 0),
(4, 'deisel', 0, 0, 3, 0),
(5, 'petrol', 0, 0, 3, 0),
(6, 'superpetrol', 0, 0, 3, 0),
(7, 'deisel', 10, 2000, 4, 0),
(8, 'petrol', 22, 3300, 4, 0),
(9, 'superpetrol', 11, 6600, 4, 0),
(10, 'deisel', 2, 400, 5, 0),
(11, 'petrol', 2, 300, 5, 0),
(12, 'superpetrol', 2, 1200, 5, 0),
(13, 'deisel', 12, 2400, 6, 0),
(14, 'petrol', 13, 1950, 6, 0),
(15, 'superpetrol', 12, 7200, 6, 0),
(16, 'deisel', 10, 2000, 7, 0),
(17, 'deisel', 10, 0, 8, 0),
(18, 'petrol', 10, 0, 8, 0),
(19, 'superpetrol', 10, 0, 8, 0),
(20, 'deisel', 10, 2000, 9, 0),
(21, 'petrol', 10, 1500, 9, 0),
(22, 'superpetrol', 10, 6000, 9, 0),
(23, 'deisel', 10, 2000, 10, 0),
(24, 'petrol', 10, 1500, 10, 0),
(25, 'superpetrol', 10, 6000, 10, 0),
(26, 'deisel', 10, 2000, 11, 0),
(27, 'petrol', 12, 1800, 11, 0),
(28, 'superpetrol', 10, 6000, 11, 0),
(29, 'deisel', 1000, 200000, 12, 0),
(30, 'petrol', 2, 300, 12, 0),
(31, 'superpetrol', 2, 1200, 12, 0),
(32, 'deisel', 10000, 2000000, 13, 0),
(33, 'petrol', 0, 0, 13, 0),
(34, 'superpetrol', 0, 0, 13, 0),
(35, 'deisel', 100, 20000, 14, 0),
(36, 'petrol', 14, 2100, 14, 0),
(37, 'superpetrol', 450, 270000, 14, 0),
(38, 'deisel', 6600, 1320000, 15, 0),
(39, 'petrol', 6600, 990000, 15, 0),
(40, 'superpetrol', 6600, 3960000, 15, 0),
(41, 'deisel', 10, 2000, 16, 0),
(42, 'deisel', 10, 2000, 17, 0),
(43, 'deisel', 10, 0, 18, 0),
(44, 'deisel', 10, 2000, 19, 0),
(45, 'petrol', 10, 1500, 19, 0),
(46, 'superpetrol', 13, 7800, 19, 0),
(47, 'deisel', 10, 2000, 20, 0),
(48, 'petrol', 10, 1500, 20, 0),
(49, 'superpetrol', 10, 6000, 20, 0),
(50, 'deisel', 10, 2000, 21, 0),
(51, 'petrol', 23, 3450, 21, 0),
(52, 'superpetrol', 13, 7800, 21, 0),
(53, 'deisel', 10, 2000, 22, 0),
(54, 'petrol', 10, 1500, 22, 0),
(55, 'superpetrol', 12, 7200, 22, 0),
(56, 'deisel', 0, 0, 23, 0),
(57, 'petrol', 0, 0, 23, 0),
(58, 'superpetrol', 0, 0, 23, 0),
(59, 'deisel', 112, 22400, 24, 0),
(60, 'petrol', 222, 33300, 24, 0),
(61, 'superpetrol', 222, 133200, 24, 0),
(62, 'deisel', 212, 42400, 25, 0),
(63, 'petrol', 22, 3300, 25, 0),
(64, 'superpetrol', 22, 13200, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idorders` int(11) NOT NULL,
  `orderdate` datetime DEFAULT NULL,
  `invoicenum` varchar(45) NOT NULL,
  `amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `isapproved` tinyint(4) DEFAULT NULL,
  `fillingstation_idfillingstation` int(11) NOT NULL,
  `approvedby` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idorders`, `orderdate`, `invoicenum`, `amount`, `discount`, `tax`, `isapproved`, `fillingstation_idfillingstation`, `approvedby`, `isdelete`) VALUES
(2, '2023-11-16 12:00:13', '', 1900, 0, 0, 0, 3, 'none', 0),
(3, '2023-11-16 12:02:09', '', 0, 0, 0, 0, 3, 'none', 0),
(4, '2023-11-16 12:08:15', '', 11900, 0, 0, 0, 4, 'none', 0),
(5, '2023-11-16 12:13:18', '', 1900, 0, 0, 0, 4, 'none', 0),
(6, '2023-11-16 17:21:59', '', 11550, 0, 0, 0, 6, 'none', 0),
(7, '2023-11-16 17:25:54', '', 9500, 0, 0, 0, 6, 'none', 0),
(8, '2023-11-16 17:35:37', '', 0, 0, 0, 0, 6, 'none', 0),
(9, '2023-11-16 17:50:11', '', 9500, 0, 0, 0, 6, 'none', 0),
(10, '2023-11-16 17:50:11', '', 9500, 0, 0, 0, 6, 'none', 0),
(11, '2023-11-16 17:57:08', '', 9800, 0, 0, 0, 6, 'none', 0),
(12, '2023-11-16 18:01:57', '', 201500, 0, 0, 0, 6, 'none', 0),
(13, '2023-11-16 18:07:01', '', 2000000, 0, 0, 0, 6, 'none', 0),
(14, '2023-11-16 18:07:37', '', 292100, 0, 0, 0, 6, 'none', 0),
(15, '2023-11-16 19:39:27', '', 6270000, 0, 0, 0, 6, 'none', 0),
(16, '2023-11-18 17:56:44', '', 9500, 0, 0, 0, 6, 'none', 0),
(17, '2023-11-18 17:56:44', '', 9500, 0, 0, 0, 6, 'none', 0),
(18, '2023-11-18 17:58:27', '', 0, 0, 0, 0, 6, 'none', 0),
(19, '2023-11-18 18:00:37', '', 11300, 0, 0, 0, 6, 'none', 0),
(20, '2023-11-18 18:03:20', '', 9500, 0, 0, 0, 6, 'none', 0),
(21, '2023-11-18 18:06:30', '', 13250, 0, 0, 0, 6, 'none', 0),
(22, '2023-11-18 18:09:39', '', 10700, 0, 0, 0, 6, 'none', 0),
(23, '2023-11-22 07:35:15', '5555', 0, 0, 0, 0, 6, 'none', 0),
(24, '2023-11-22 07:36:26', '5110_RZ_24', 188900, 0, 0, 0, 6, 'none', 0),
(25, '2023-11-22 07:44:12', '8206_RZ_25', 58900, 0, 0, 0, 6, 'none', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `idpaymentmethod` int(11) NOT NULL,
  `method_name` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `idpayments` int(11) NOT NULL,
  `paymentdate` datetime DEFAULT NULL,
  `isreceived` tinyint(4) DEFAULT NULL,
  `paymentmethod_idpaymentmethod` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `orders_idorders` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `isadmin` tinyint(4) DEFAULT NULL,
  `isdealer` tinyint(4) DEFAULT NULL,
  `isdriver` tinyint(4) DEFAULT NULL,
  `phonenumber` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `firstname`, `lastname`, `email`, `password`, `isadmin`, `isdealer`, `isdriver`, `phonenumber`, `isdelete`) VALUES
(14, 'Thilina', 'Abeysinghe', 'thilina@recurzive.com', '247758853ccfcf109a492afe1031862d0e2625b7a976d0497eab02d99fd24fca', 1, 0, 0, '94717699107', 0),
(15, 'Keerthi', 'Hettiarachchi', 'keerthi.sanjaya@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 0, 0, 0, '94716198852', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `idvehicle` int(11) NOT NULL,
  `vehicle_number` varchar(45) DEFAULT NULL,
  `vehicle_chasis_number` varchar(45) DEFAULT NULL,
  `vehicle_yom` date DEFAULT NULL,
  `vehicle_no_of_passengers` int(11) DEFAULT NULL,
  `vehicle_weight` int(11) DEFAULT NULL,
  `vehicle_is_available` varchar(45) DEFAULT NULL,
  `vehicle_is_active` varchar(45) DEFAULT NULL,
  `vehicle_type_idvehicle_type` int(11) NOT NULL,
  `Location_idLocation` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`idvehicle`, `vehicle_number`, `vehicle_chasis_number`, `vehicle_yom`, `vehicle_no_of_passengers`, `vehicle_weight`, `vehicle_is_available`, `vehicle_is_active`, `vehicle_type_idvehicle_type`, `Location_idLocation`, `isdelete`) VALUES
(5, 'KU-6018', 'cha123', '2023-11-09', 2, 2, '1', '1', 4, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_calibration_certificate`
--

CREATE TABLE `vehicle_calibration_certificate` (
  `idvehicle_calibration_certificate` int(11) NOT NULL,
  `vehicle_calibration_certificate_name` varchar(45) DEFAULT NULL,
  `vehicle_calibration_certificate_issue_date` datetime DEFAULT NULL,
  `vehicle_calibration_certificate_expiry_date` datetime DEFAULT NULL,
  `vehicle_calibration_certificate_is_active` varchar(45) DEFAULT NULL,
  `vehicle_idvehicle` int(11) NOT NULL,
  `cali_doc` varchar(500) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicle_calibration_certificate`
--

INSERT INTO `vehicle_calibration_certificate` (`idvehicle_calibration_certificate`, `vehicle_calibration_certificate_name`, `vehicle_calibration_certificate_issue_date`, `vehicle_calibration_certificate_expiry_date`, `vehicle_calibration_certificate_is_active`, `vehicle_idvehicle`, `cali_doc`, `isdelete`) VALUES
(6, '333335', '2023-11-02 00:00:00', '2023-11-29 00:00:00', '0', 5, '205504055.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_revenue_license`
--

CREATE TABLE `vehicle_revenue_license` (
  `idvehicle_revenue_license` int(11) NOT NULL,
  `vehicle_revenue_license_name` varchar(45) DEFAULT NULL,
  `vehicle_revenue_license_issue_date` datetime DEFAULT NULL,
  `vehicle_revenue_license_expiry_date` datetime DEFAULT NULL,
  `vehicle_revenue_license_is_active` varchar(45) DEFAULT NULL,
  `vehicle_idvehicle` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicle_revenue_license`
--

INSERT INTO `vehicle_revenue_license` (`idvehicle_revenue_license`, `vehicle_revenue_license_name`, `vehicle_revenue_license_issue_date`, `vehicle_revenue_license_expiry_date`, `vehicle_revenue_license_is_active`, `vehicle_idvehicle`, `isdelete`) VALUES
(3, '5555', '2023-11-02 00:00:00', '2023-11-30 00:00:00', '0', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `idvehicle_type` int(11) NOT NULL,
  `vehicle_capacity` int(11) DEFAULT NULL,
  `vehicle_type` varchar(45) DEFAULT NULL,
  `vehicle_type_is_active` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`idvehicle_type`, `vehicle_capacity`, `vehicle_type`, `vehicle_type_is_active`, `isdelete`) VALUES
(3, 6600, NULL, '1', 1),
(4, 6600, NULL, '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bowserassign`
--
ALTER TABLE `bowserassign`
  ADD PRIMARY KEY (`idbowser`);

--
-- Indexes for table `dailydip`
--
ALTER TABLE `dailydip`
  ADD PRIMARY KEY (`iddailydip`),
  ADD KEY `fk_dailydip_fillingstation` (`fillingstation_idfillingstation`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`iddocuments`),
  ADD KEY `fk_documents_fillingstation1` (`fillingstation_idfillingstation`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`idemployee`),
  ADD KEY `fk_employee_employeetype1` (`employeetype_idemployeetype`),
  ADD KEY `users_idusersfk` (`userid`);

--
-- Indexes for table `employeetype`
--
ALTER TABLE `employeetype`
  ADD PRIMARY KEY (`idemployeetype`);

--
-- Indexes for table `fillingstation`
--
ALTER TABLE `fillingstation`
  ADD PRIMARY KEY (`idfillingstation`),
  ADD KEY `fk_fillingstation_Users1` (`Users_idUsers`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idLocation`);

--
-- Indexes for table `loginlog`
--
ALTER TABLE `loginlog`
  ADD PRIMARY KEY (`idloginlog`),
  ADD KEY `fk_loginlog_Users1` (`Users_idUsers`);

--
-- Indexes for table `materialprice`
--
ALTER TABLE `materialprice`
  ADD PRIMARY KEY (`idmaterialprice`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`idorderitems`),
  ADD KEY `fk_orderitems_orders1` (`orders_idorders`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idorders`),
  ADD KEY `fk_orders_fillingstation1` (`fillingstation_idfillingstation`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`idpaymentmethod`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`idpayments`),
  ADD KEY `fk_payments_paymentmethod1` (`paymentmethod_idpaymentmethod`),
  ADD KEY `fk_payments_orders1` (`orders_idorders`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`idvehicle`),
  ADD KEY `fk_vehicle_vehicle_type1` (`vehicle_type_idvehicle_type`),
  ADD KEY `fk_vehicle_Location1` (`Location_idLocation`);

--
-- Indexes for table `vehicle_calibration_certificate`
--
ALTER TABLE `vehicle_calibration_certificate`
  ADD PRIMARY KEY (`idvehicle_calibration_certificate`),
  ADD KEY `fk_vehicle_calibration_certificate_vehicle1` (`vehicle_idvehicle`);

--
-- Indexes for table `vehicle_revenue_license`
--
ALTER TABLE `vehicle_revenue_license`
  ADD PRIMARY KEY (`idvehicle_revenue_license`),
  ADD KEY `fk_vehicle_revenue_license_vehicle1` (`vehicle_idvehicle`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`idvehicle_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bowserassign`
--
ALTER TABLE `bowserassign`
  MODIFY `idbowser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dailydip`
--
ALTER TABLE `dailydip`
  MODIFY `iddailydip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `iddocuments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `idemployee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
  MODIFY `idemployeetype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fillingstation`
--
ALTER TABLE `fillingstation`
  MODIFY `idfillingstation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `idLocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loginlog`
--
ALTER TABLE `loginlog`
  MODIFY `idloginlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `materialprice`
--
ALTER TABLE `materialprice`
  MODIFY `idmaterialprice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `idorderitems` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idorders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `idpaymentmethod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `idpayments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `idvehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_calibration_certificate`
--
ALTER TABLE `vehicle_calibration_certificate`
  MODIFY `idvehicle_calibration_certificate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_revenue_license`
--
ALTER TABLE `vehicle_revenue_license`
  MODIFY `idvehicle_revenue_license` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `idvehicle_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dailydip`
--
ALTER TABLE `dailydip`
  ADD CONSTRAINT `fk_dailydip_fillingstation` FOREIGN KEY (`fillingstation_idfillingstation`) REFERENCES `fillingstation` (`idfillingstation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk_documents_fillingstation1` FOREIGN KEY (`fillingstation_idfillingstation`) REFERENCES `fillingstation` (`idfillingstation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_employeetype1` FOREIGN KEY (`employeetype_idemployeetype`) REFERENCES `employeetype` (`idemployeetype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_idusersfk` FOREIGN KEY (`userid`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `fillingstation`
--
ALTER TABLE `fillingstation`
  ADD CONSTRAINT `fk_fillingstation_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loginlog`
--
ALTER TABLE `loginlog`
  ADD CONSTRAINT `fk_loginlog_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `fk_orderitems_orders1` FOREIGN KEY (`orders_idorders`) REFERENCES `orders` (`idorders`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_fillingstation1` FOREIGN KEY (`fillingstation_idfillingstation`) REFERENCES `fillingstation` (`idfillingstation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_orders1` FOREIGN KEY (`orders_idorders`) REFERENCES `orders` (`idorders`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_paymentmethod1` FOREIGN KEY (`paymentmethod_idpaymentmethod`) REFERENCES `paymentmethod` (`idpaymentmethod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_vehicle_Location1` FOREIGN KEY (`Location_idLocation`) REFERENCES `location` (`idLocation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicle_vehicle_type1` FOREIGN KEY (`vehicle_type_idvehicle_type`) REFERENCES `vehicle_type` (`idvehicle_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle_calibration_certificate`
--
ALTER TABLE `vehicle_calibration_certificate`
  ADD CONSTRAINT `fk_vehicle_calibration_certificate_vehicle1` FOREIGN KEY (`vehicle_idvehicle`) REFERENCES `vehicle` (`idvehicle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle_revenue_license`
--
ALTER TABLE `vehicle_revenue_license`
  ADD CONSTRAINT `fk_vehicle_revenue_license_vehicle1` FOREIGN KEY (`vehicle_idvehicle`) REFERENCES `vehicle` (`idvehicle`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
