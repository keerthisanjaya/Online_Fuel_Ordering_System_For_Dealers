-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 08:13 PM
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
-- Database: `fueldb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bowserassign`
--

CREATE TABLE `bowserassign` (
  `idbowser` int(11) NOT NULL,
  `invnum` varchar(50) NOT NULL,
  `vehiclenum` varchar(50) NOT NULL,
  `drivernum` varchar(50) NOT NULL,
  `allowgateexit` tinyint(1) NOT NULL DEFAULT 0,
  `sealnumber` varchar(50) NOT NULL,
  `exittime` datetime DEFAULT NULL,
  `orderitemid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bowserassign`
--

INSERT INTO `bowserassign` (`idbowser`, `invnum`, `vehiclenum`, `drivernum`, `allowgateexit`, `sealnumber`, `exittime`, `orderitemid`) VALUES
(3, '7681_RZ_34', '5', '15', 1, '', '2023-12-22 19:50:08', 0),
(4, '8291_RZ_33', '6', '15', 1, '', NULL, 0),
(5, '6756_RZ_32', '6', '15', 1, '', NULL, 0),
(6, '3417_RZ_31', '5', '15', 1, '', NULL, 0),
(7, '7233_RZ_30', '5', '15', 1, '', NULL, 0),
(8, '3004_RZ_29', '5', '15', 1, '', NULL, 0),
(9, '7694_RZ_28', '5', '15', 1, '', '2023-12-22 16:36:06', 0),
(10, '1326_RZ_27', '5', '15', 1, '', NULL, 0),
(11, '3762_RZ_26', '5', '15', 1, '', NULL, 0),
(12, '8206_RZ_25', '5', '15', 1, '64680_931', '2023-12-19 18:49:14', 0),
(13, '5110_RZ_24', '5', '15', 1, '35847_920', '2023-12-19 18:48:57', 0),
(14, '9478_RZ_35', '5', '15', 1, '39506_169', '2023-12-22 16:53:35', 0),
(15, '9478_RZ_35', '5', '15', 1, '76843_969', '2023-12-22 16:54:40', 0),
(16, '3887_RZ_36', '6', '15', 1, '30174_156', '2023-12-22 19:50:26', 0),
(17, '5263_RZ_37', '5', '15', 1, '41870_974', '2023-12-22 18:34:27', 0),
(18, '6900_RZ_42', '5', '15', 1, '99720_652', NULL, 0),
(19, '9022_RZ_39', '5', '15', 1, '89688_475', NULL, NULL),
(20, '1616_RZ_43', '5', '15', 1, '14426_269', NULL, 107),
(21, '1616_RZ_43', '6', '15', 1, '80397_985', NULL, 108),
(22, '4654_RZ_44', '5', '15', 1, '94930_903', NULL, 110),
(23, '4654_RZ_44', '5', '15', 1, '49639_646', NULL, 111),
(24, '4654_RZ_44', '5', '15', 1, '45748_972', NULL, 112),
(25, '1616_RZ_43', '5', '15', 1, '19009_957', '2023-12-24 19:20:49', 109),
(26, '9684_RZ_45', '5', '15', 1, '91609_749', '2023-12-24 19:20:47', 113),
(27, '9684_RZ_45', '5', '15', 1, '86486_924', '2023-12-24 19:20:45', 114),
(28, '9684_RZ_45', '5', '15', 1, '99252_968', '2023-12-24 19:20:42', 115),
(29, '5546_RZ_47', '5', '15', 0, '35115_685', NULL, 118),
(30, '1165_RZ_48', '5', '15', 0, '89112_264', NULL, 120),
(31, '1165_RZ_48', '5', '15', 0, '14486_247', NULL, 121),
(32, '1165_RZ_48', '5', '15', 0, '81010_634', NULL, 122),
(33, '5392_RZ_52', '5', '15', 1, '77245_182', '2023-12-24 19:20:41', 132),
(34, '5392_RZ_52', '5', '15', 1, '18126_218', '2023-12-24 19:20:39', 133),
(35, '5392_RZ_52', '5', '15', 1, '30484_792', '2023-12-24 19:18:59', 134),
(36, '3847_RZ_46', '5', '17', 0, '12587_896', NULL, 116),
(37, '5377_RZ_59', '6', '17', 0, '24321_571', NULL, 158),
(38, '1891_RZ_60', '5', '17', 0, '72646_618', NULL, 159),
(39, '4229_RZ_62', '5', '17', 0, '99349_166', NULL, 162),
(40, '1165_RZ_48', '5', '17', 0, '59458_323', NULL, 120),
(41, '1165_RZ_48', '5', '17', 0, '16180_804', NULL, 122),
(42, '1165_RZ_48', '5', '17', 0, '49167_648', NULL, 122),
(43, '1165_RZ_48', '5', '17', 0, '57658_987', NULL, 121),
(44, '4229_RZ_62', '5', '17', 0, '69422_890', NULL, 162),
(45, '4229_RZ_62', '5', '17', 0, '32763_511', NULL, 162),
(46, '4334_RZ_61', '5', '17', 0, '43151_216', NULL, 161),
(47, '4334_RZ_61', '5', '17', 0, '37249_961', NULL, 161),
(48, '4334_RZ_61', '5', '17', 0, '32066_322', NULL, 161),
(49, '4334_RZ_61', '5', '17', 0, '58094_344', NULL, 161),
(50, '4334_RZ_61', '5', '17', 0, '94580_404', NULL, 161),
(51, '4334_RZ_61', '5', '17', 0, '23379_182', NULL, 161),
(52, '4334_RZ_61', '5', '17', 0, '12077_640', NULL, 161),
(53, '4334_RZ_61', '5', '17', 0, '85132_343', NULL, 161),
(54, '4334_RZ_61', '5', '17', 0, '96066_684', NULL, 161),
(55, '4334_RZ_61', '5', '17', 0, '53454_973', NULL, 161),
(56, '4334_RZ_61', '5', '17', 0, '73853_149', NULL, 161),
(57, '4334_RZ_61', '5', '17', 0, '36845_859', NULL, 161),
(58, '4334_RZ_61', '5', '17', 0, '44637_221', NULL, 161),
(59, '4334_RZ_61', '5', '17', 0, '67990_719', NULL, 161),
(60, '3254_RZ_63', '5', '17', 0, '55190_309', NULL, 163),
(61, '3254_RZ_63', '5', '17', 0, '21318_256', NULL, 164),
(62, '3254_RZ_63', '5', '17', 0, '56288_418', NULL, 165),
(63, '3254_RZ_63', '5', '17', 0, '20408_155', NULL, 166);

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
(1, '2023-10-31', 122, 122, 122, 332, 4, 0),
(2, '2023-10-31', 1000, 555, 66, 555, 4, 0),
(3, '2023-11-22', 1222, 444, 4444, 444, 6, 0),
(4, '2024-01-24', 0, 0, 0, 0, 6, 1),
(5, '2024-01-24', 6600, 6600, 6600, 6600, 6, 1),
(6, '2024-01-24', 100, 100, 100, 100, 6, 1),
(7, '2024-01-26', 0, 0, 0, 0, 6, 1),
(8, '2024-01-26', 10, 10, 10, 10, 6, 0),
(9, '2024-01-26', 10, 50, 60, 40, 11, 0),
(10, '2024-01-28', 9000, 9000, 8000, 8950, 11, 1),
(11, '2024-01-28', 700, 4500, 5000, 13200, 11, 0);

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
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `isactive` tinyint(4) DEFAULT NULL,
  `isavailable` tinyint(4) DEFAULT NULL,
  `employeetype_idemployeetype` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`idemployee`, `epf`, `fname`, `lname`, `gender`, `grade`, `isactive`, `isavailable`, `employeetype_idemployeetype`, `userid`, `isdelete`) VALUES
(12, 'EPF121314177', 'tes', 'with', 1, 'A3', 1, 0, 5, 14, 0),
(17, '925556449897', 'tes', 'with', 1, 'A3', 1, 1, 4, 20, 0),
(18, '', '', '', 0, '', 0, 0, 2, 15, 1),
(19, '', '', '', 0, '', 0, 1, 2, 15, 1),
(20, '123456', '', '', 0, '', 1, 0, 3, 32, 0),
(21, '17530', '', '', 0, '', 0, 0, 4, 29, 0),
(22, '117678', '', '', 0, 'A1', 1, 0, 2, 15, 0),
(23, '17543', '', '', 0, '', 0, 0, 5, 15, 0),
(24, '34567', '', '', 0, '', 0, 0, 3, 15, 0),
(25, '', '', '', 0, '', 0, 0, 2, 15, 0),
(26, '', '', '', 0, '', 0, 0, 2, 15, 0),
(27, '45678', '', '', 0, 'B1', 1, 0, 5, 15, 0),
(28, '', '', '', 0, '', 0, 0, 2, 15, 0),
(29, '111111', '', '', 0, '', 1, 1, 3, 33, 0),
(30, '22222', '', '', 0, 'A2', 1, 0, 3, 37, 0),
(31, '78963', 'ha', 'withr', 1, 'A3', 1, 0, 3, 15, 0);

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
(4, 'Driver', 0),
(5, 'Security', 0);

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
(5, 'Gampaha', 'Gampaha 2213', 22, 22, 22, 22, 22, 'Ampara', 14, 0, 'Thilina Abeysinghe', 0),
(6, 'Namaluwa', 'Dekatana Rd\r\nNamaluwa', 7, 6600, 6600, 6600, 6600, 'Gampaha', 15, 1, 'Keerthi Hettiarachchi', 0),
(7, 'Gampaha', '321 dyd', 3, 122, 3333, 6600, 1222, 'Badulla', 15, 1, 'Keerthi Hettiarachchi', 0),
(8, 'Namaluwa', 'frrfer', 333, 333, 333, 333, 333, 'Ampara', 15, 1, 'Keerthi Hettiarachchi', 0),
(9, '', '', 0, 0, 0, 0, 0, 'Ampara', 15, 0, 'pending', 0),
(10, '', '', 0, 0, 0, 0, 0, 'Ampara', 15, 0, 'pending', 0),
(11, 'Kandy', '321 Kandy Temple Kandy', 2, 13200, 13200, 13200, 13200, 'Kandy', 15, 1, 'Keerthi Hettiarachchi', 0),
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
(19, '2023-11-23 16:34:57', 14, '987243', 0, 0),
(20, '2023-12-06 17:25:35', 14, '347392', 0, 0),
(21, '2023-12-11 17:51:43', 14, '193491', 0, 0),
(22, '2023-12-11 17:54:49', 14, '534880', 0, 0),
(23, '2023-12-11 17:59:32', 14, '747083', 0, 0),
(24, '2023-12-11 18:18:21', 19, '409429', 0, 0),
(25, '2023-12-11 18:19:07', 14, '956714', 0, 0),
(26, '2023-12-11 18:45:35', 14, '854114', 0, 0),
(27, '2023-12-13 17:27:29', 14, '435894', 0, 0),
(28, '2023-12-14 10:24:04', 14, '835884', 0, 0),
(29, '2023-12-14 10:56:39', 14, '581072', 0, 0),
(30, '2023-12-15 19:51:02', 14, '535049', 0, 0),
(31, '2023-12-16 01:30:07', 14, '545483', 0, 0),
(32, '2023-12-16 14:37:47', 14, '329345', 0, 0),
(33, '2023-12-16 14:53:27', 14, '188173', 0, 0),
(34, '2023-12-17 04:38:46', 14, '223070', 0, 0),
(35, '2023-12-17 04:38:56', 14, '257368', 0, 0),
(36, '2023-12-17 17:27:58', 14, '502108', 0, 0),
(37, '2023-12-18 14:26:58', 14, '495212', 0, 0),
(38, '2023-12-18 14:27:04', 14, '681077', 0, 0),
(39, '2023-12-19 02:10:41', 14, '923191', 0, 0),
(40, '2023-12-19 15:43:55', 14, '503467', 0, 0),
(41, '2023-12-19 18:06:22', 14, '684378', 0, 0),
(42, '2023-12-19 18:51:06', 14, '345277', 0, 0),
(43, '2023-12-22 16:28:15', 14, '275029', 0, 0),
(44, '2023-12-24 16:24:04', 14, '838492', 0, 0),
(45, '2023-12-25 17:55:37', 14, '636761', 0, 0),
(46, '2023-12-26 10:03:46', 14, '832795', 0, 0),
(47, '2023-12-26 16:07:18', 14, '662990', 0, 0),
(48, '2023-12-26 16:08:21', 14, '155771', 0, 0),
(49, '2024-01-24 06:13:11', 14, '105445', 0, 0),
(50, '2024-01-24 08:22:32', 14, '440921', 0, 0),
(51, '2024-01-24 08:30:16', 14, '479336', 0, 0),
(52, '2024-01-24 08:38:14', 14, '945018', 0, 0),
(53, '2024-01-24 08:38:47', 14, '569567', 0, 0),
(54, '2024-01-24 08:52:41', 20, '278396', 0, 0),
(55, '2024-01-24 08:55:03', 14, '884171', 0, 0),
(56, '2024-01-24 08:55:44', 20, '435991', 0, 0),
(57, '2024-01-24 08:58:05', 20, '699213', 0, 0),
(58, '2024-01-24 08:58:40', 14, '686299', 0, 0),
(59, '2024-01-24 09:05:52', 21, '421363', 0, 0),
(60, '2024-01-24 09:15:39', 22, '505055', 0, 0),
(61, '2024-01-24 09:16:32', 14, '530623', 0, 0),
(62, '2024-01-24 09:22:11', 23, '724348', 0, 0),
(63, '2024-01-24 11:54:13', 26, '207438', 0, 0),
(64, '2024-01-24 16:22:23', 15, '445688', 0, 0),
(65, '2024-01-24 16:24:00', 15, '310430', 0, 0),
(66, '2024-01-24 16:36:06', 15, '579832', 0, 0),
(67, '2024-01-24 16:38:39', 15, '822447', 0, 0),
(68, '2024-01-24 16:38:48', 15, '238893', 0, 0),
(69, '2024-01-24 16:39:17', 15, '676786', 0, 0),
(70, '2024-01-24 17:19:32', 15, '368503', 0, 0),
(71, '2024-01-24 17:24:50', 27, '606032', 0, 0),
(72, '2024-01-24 17:28:33', 29, '568409', 0, 0),
(73, '2024-01-24 17:29:36', 29, '177222', 0, 0),
(74, '2024-01-24 17:50:55', 29, '833408', 0, 0),
(75, '2024-01-24 17:51:27', 15, '805246', 0, 0),
(76, '2024-01-24 17:53:14', 29, '463757', 0, 0),
(77, '2024-01-24 17:59:02', 32, '187314', 0, 0),
(78, '2024-01-24 18:00:55', 32, '847468', 0, 0),
(79, '2024-01-24 18:01:34', 29, '135350', 0, 0),
(80, '2024-01-24 18:02:11', 32, '674582', 0, 0),
(81, '2024-01-24 18:08:45', 29, '314590', 0, 0),
(82, '2024-01-24 18:09:13', 29, '262404', 0, 0),
(83, '2024-01-25 02:54:27', 29, '959956', 0, 0),
(84, '2024-01-25 03:33:23', 15, '398595', 0, 0),
(85, '2024-01-25 07:23:35', 29, '644967', 0, 0),
(86, '2024-01-25 07:25:29', 29, '452731', 0, 0),
(87, '2024-01-25 08:13:41', 29, '933443', 0, 0),
(88, '2024-01-25 19:19:10', 29, '786433', 0, 0),
(89, '2024-01-26 18:51:00', 29, '749548', 0, 0),
(90, '2024-01-26 18:53:46', 15, '891272', 0, 0),
(91, '2024-01-27 20:26:24', 29, '312073', 0, 0),
(92, '2024-01-27 21:22:04', 15, '704760', 0, 0),
(93, '2024-01-28 06:54:45', 15, '468589', 0, 0),
(94, '2024-01-29 19:00:17', 15, '109331', 0, 0),
(95, '2024-01-29 20:50:27', 33, '406655', 0, 0),
(96, '2024-01-29 20:52:53', 15, '626314', 0, 0),
(97, '2024-01-29 20:54:08', 33, '309877', 0, 0),
(98, '2024-01-29 20:55:22', 29, '755987', 0, 0),
(99, '2024-01-29 20:56:51', 33, '312599', 0, 0),
(100, '2024-01-29 21:02:35', 37, '217050', 0, 0),
(101, '2024-01-29 21:03:12', 29, '907329', 0, 0),
(102, '2024-01-29 21:04:03', 37, '406981', 0, 0),
(103, '2024-01-29 21:05:18', 37, '722560', 0, 0),
(104, '2024-01-30 17:28:22', 15, '659816', 0, 0),
(105, '2024-01-30 19:11:34', 29, '665465', 0, 0),
(106, '2024-01-30 19:47:27', 29, '829398', 0, 0),
(107, '2024-01-31 18:37:25', 29, '115869', 0, 0),
(108, '2024-01-31 18:37:46', 29, '322007', 0, 0),
(109, '2024-01-31 18:38:45', 29, '121185', 0, 0),
(110, '2024-01-31 18:39:03', 29, '677280', 0, 0),
(111, '2024-01-31 19:27:19', 41, '571706', 0, 0),
(112, '2024-01-31 19:38:35', 43, '244769', 0, 0),
(113, '2024-02-01 11:19:46', 29, '483156', 0, 0),
(114, '2024-02-01 17:16:38', 15, '494743', 0, 0),
(115, '2024-02-01 17:18:20', 29, '976149', 0, 0),
(116, '2024-02-01 20:45:57', 29, '719124', 0, 0),
(117, '2024-02-01 20:51:26', 15, '230825', 0, 0),
(118, '2024-02-10 04:52:50', 15, '761407', 0, 0),
(119, '2024-02-10 04:54:03', 29, '789779', 0, 0),
(120, '2024-02-10 06:53:16', 15, '232242', 0, 0),
(121, '2024-02-10 07:00:59', 15, '161950', 0, 0),
(122, '2024-02-10 07:03:48', 15, '508488', 0, 0),
(123, '2024-02-10 07:10:51', 15, '659093', 0, 0),
(124, '2024-02-10 07:18:50', 15, '799992', 0, 0),
(125, '2024-02-10 07:19:37', 15, '657163', 0, 0),
(126, '2024-02-10 07:32:19', 15, '656402', 0, 0),
(127, '2024-02-10 07:32:36', 15, '400243', 0, 0),
(128, '2024-02-10 07:34:29', 15, '282483', 0, 0),
(129, '2024-02-10 07:35:12', 15, '122520', 0, 0),
(130, '2024-02-10 07:44:22', 15, '172447', 0, 0),
(131, '2024-02-10 07:45:06', 15, '644940', 0, 0),
(132, '2024-02-10 07:47:36', 15, '183942', 0, 0),
(133, '2024-02-10 07:50:31', 15, '611845', 0, 0),
(134, '2024-02-10 07:52:44', 15, '786243', 0, 0),
(135, '2024-02-10 07:53:05', 15, '846116', 0, 0),
(136, '2024-02-10 07:57:09', 29, '689622', 0, 0),
(137, '2024-02-10 08:11:28', 15, '869203', 0, 0),
(138, '2024-02-10 08:15:50', 29, '559211', 0, 0),
(139, '2024-02-10 08:39:10', 15, '311125', 0, 0),
(140, '2024-02-10 08:40:21', 29, '727051', 0, 0),
(141, '2024-02-10 10:19:57', 15, '334688', 0, 0),
(142, '2024-02-11 09:52:08', 29, '706842', 0, 0),
(143, '2024-02-11 10:01:09', 15, '393265', 0, 0),
(144, '2024-02-11 10:01:48', 29, '306302', 0, 0),
(145, '2024-02-12 17:53:10', 15, '430350', 0, 0),
(146, '2024-02-16 01:08:18', 15, '548841', 0, 0),
(147, '2024-02-28 14:15:46', 15, '193420', 0, 0),
(148, '2024-02-28 14:16:06', 15, '188805', 0, 0),
(149, '2024-02-28 14:16:54', 15, '825017', 0, 0),
(150, '2024-02-28 14:17:58', 15, '532754', 0, 0);

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
(7, 'superpetrol', 600, '1', '2023-10-31 15:13:54', 0),
(8, 'superdeisel', 500, '1', '2024-01-26 19:43:28', 0);

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
  `isdelete` tinyint(1) NOT NULL DEFAULT 0,
  `orderstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`idorderitems`, `itemname`, `qty`, `itemamount`, `orders_idorders`, `isdelete`, `orderstatus`) VALUES
(1, 'deisel', 2, 400, 2, 0, 0),
(2, 'petrol', 2, 300, 2, 0, 0),
(3, 'superpetrol', 2, 1200, 2, 0, 0),
(4, 'deisel', 0, 0, 3, 0, 5),
(5, 'petrol', 0, 0, 3, 0, 0),
(6, 'superpetrol', 0, 0, 3, 0, 0),
(7, 'deisel', 10, 2000, 4, 0, 0),
(8, 'petrol', 22, 3300, 4, 0, 0),
(9, 'superpetrol', 11, 6600, 4, 0, 0),
(10, 'deisel', 2, 400, 5, 0, 0),
(11, 'petrol', 2, 300, 5, 0, 0),
(12, 'superpetrol', 2, 1200, 5, 0, 0),
(13, 'deisel', 12, 2400, 6, 0, 0),
(14, 'petrol', 13, 1950, 6, 0, 0),
(15, 'superpetrol', 12, 7200, 6, 0, 0),
(16, 'deisel', 10, 2000, 7, 0, 0),
(17, 'deisel', 10, 0, 8, 0, 0),
(18, 'petrol', 10, 0, 8, 0, 0),
(19, 'superpetrol', 10, 0, 8, 0, 0),
(20, 'deisel', 10, 2000, 9, 0, 0),
(21, 'petrol', 10, 1500, 9, 0, 0),
(22, 'superpetrol', 10, 6000, 9, 0, 0),
(23, 'deisel', 10, 2000, 10, 0, 0),
(24, 'petrol', 10, 1500, 10, 0, 0),
(25, 'superpetrol', 10, 6000, 10, 0, 0),
(26, 'deisel', 10, 2000, 11, 0, 0),
(27, 'petrol', 12, 1800, 11, 0, 0),
(28, 'superpetrol', 10, 6000, 11, 0, 0),
(29, 'deisel', 1000, 200000, 12, 0, 0),
(30, 'petrol', 2, 300, 12, 0, 0),
(31, 'superpetrol', 2, 1200, 12, 0, 0),
(32, 'deisel', 10000, 2000000, 13, 0, 0),
(33, 'petrol', 0, 0, 13, 0, 0),
(34, 'superpetrol', 0, 0, 13, 0, 0),
(35, 'deisel', 100, 20000, 14, 0, 0),
(36, 'petrol', 14, 2100, 14, 0, 0),
(37, 'superpetrol', 450, 270000, 14, 0, 0),
(38, 'deisel', 6600, 1320000, 15, 0, 0),
(39, 'petrol', 6600, 990000, 15, 0, 0),
(40, 'superpetrol', 6600, 3960000, 15, 0, 0),
(41, 'deisel', 10, 2000, 16, 0, 0),
(42, 'deisel', 10, 2000, 17, 0, 0),
(43, 'deisel', 10, 0, 18, 0, 0),
(44, 'deisel', 10, 2000, 19, 0, 0),
(45, 'petrol', 10, 1500, 19, 0, 0),
(46, 'superpetrol', 13, 7800, 19, 0, 0),
(47, 'deisel', 10, 2000, 20, 0, 0),
(48, 'petrol', 10, 1500, 20, 0, 2),
(49, 'superpetrol', 10, 6000, 20, 0, 0),
(50, 'deisel', 10, 2000, 21, 0, 0),
(51, 'petrol', 23, 3450, 21, 0, 0),
(52, 'superpetrol', 13, 7800, 21, 0, 0),
(53, 'deisel', 10, 2000, 22, 0, 0),
(54, 'petrol', 10, 1500, 22, 0, 0),
(55, 'superpetrol', 12, 7200, 22, 0, 0),
(56, 'deisel', 0, 0, 23, 0, 0),
(57, 'petrol', 0, 0, 23, 0, 0),
(58, 'superpetrol', 0, 0, 23, 0, 0),
(59, 'deisel', 112, 22400, 24, 0, 1),
(60, 'petrol', 222, 33300, 24, 0, 0),
(61, 'superpetrol', 222, 133200, 24, 0, 0),
(62, 'deisel', 212, 42400, 25, 0, 1),
(63, 'petrol', 22, 3300, 25, 0, 0),
(64, 'superpetrol', 22, 13200, 25, 0, 0),
(65, 'deisel', 1, 0, 26, 0, 1),
(66, 'petrol', 2, 0, 26, 0, 0),
(67, 'superpetrol', 2, 0, 26, 0, 0),
(68, 'deisel', 2, 400, 27, 0, 1),
(69, 'petrol', 2, 300, 27, 0, 0),
(70, 'superpetrol', 2, 1200, 27, 0, 0),
(71, 'deisel', 2, 400, 28, 0, 1),
(72, 'petrol', 1, 150, 28, 0, 0),
(73, 'superpetrol', 2, 1200, 28, 0, 0),
(74, 'deisel', 2, 400, 29, 0, 1),
(75, 'petrol', 1, 150, 29, 0, 0),
(76, 'superpetrol', 2, 1200, 29, 0, 0),
(77, 'deisel', 2, 400, 30, 0, 1),
(78, 'petrol', 2, 300, 30, 0, 0),
(79, 'superpetrol', 1, 600, 30, 0, 0),
(80, 'deisel', 2, 400, 31, 0, 1),
(81, 'petrol', 2, 300, 31, 0, 0),
(82, 'superpetrol', 22, 13200, 31, 0, 0),
(83, 'deisel', 6600, 1320000, 32, 0, 1),
(86, 'petrol', 13600, 2040000, 33, 0, 1),
(87, 'deisel', 600, 120000, 34, 0, 1),
(88, 'deisel', 100, 20000, 35, 0, 1),
(89, 'petrol', 255, 38250, 35, 0, 0),
(90, 'superpetrol', 500, 300000, 36, 0, 1),
(91, 'petrol', 600, 90000, 37, 0, 1),
(92, 'superpetrol', 500, 300000, 37, 0, 0),
(93, 'deisel', 100, 20000, 38, 0, 0),
(94, 'petrol', 200, 30000, 38, 0, 0),
(95, 'superpetrol', 255, 153000, 38, 0, 0),
(96, 'deisel', 200, 40000, 39, 0, 1),
(97, 'petrol', 100, 15000, 39, 0, 1),
(98, 'deisel', 100, 20000, 40, 0, 0),
(99, 'petrol', 300, 45000, 40, 0, 0),
(100, 'superpetrol', 500, 300000, 40, 0, 0),
(101, 'deisel', 100, 20000, 41, 0, 0),
(102, 'petrol', 300, 45000, 41, 0, 0),
(103, 'superpetrol', 500, 300000, 41, 0, 0),
(104, 'deisel', 100, 20000, 42, 0, 1),
(105, 'petrol', 200, 30000, 42, 0, 1),
(106, 'superpetrol', 150, 90000, 42, 0, 1),
(107, 'deisel', 100, 20000, 43, 0, 1),
(108, 'petrol', 200, 30000, 43, 0, 1),
(109, 'superpetrol', 100, 60000, 43, 0, 1),
(110, 'deisel', 200, 40000, 44, 0, 1),
(111, 'petrol', 500, 75000, 44, 0, 1),
(112, 'superpetrol', 300, 180000, 44, 0, 1),
(113, 'deisel', 200, 40000, 45, 0, 1),
(114, 'petrol', 150, 22500, 45, 0, 0),
(115, 'superpetrol', 180, 108000, 45, 0, 0),
(116, 'deisel', 200, 40000, 46, 0, 3),
(117, 'superpetrol', 500, 300000, 46, 0, 0),
(118, 'deisel', 125, 25000, 47, 0, 0),
(119, 'petrol', 395, 59250, 47, 0, 0),
(120, 'deisel', 25, 5000, 48, 0, 3),
(121, 'petrol', 58, 8700, 48, 0, 3),
(122, 'superpetrol', 98, 58800, 48, 0, 3),
(123, 'deisel', 1215, 243000, 49, 0, 2),
(124, 'petrol', 3225, 483750, 49, 0, 2),
(125, 'superpetrol', 789, 473400, 49, 0, 2),
(126, 'deisel', 1215, 243000, 50, 0, 2),
(127, 'petrol', 3225, 483750, 50, 0, 2),
(128, 'superpetrol', 789, 473400, 50, 0, 2),
(129, 'deisel', 1215, 243000, 51, 0, 2),
(130, 'petrol', 3225, 483750, 51, 0, 2),
(131, 'superpetrol', 789, 473400, 51, 0, 2),
(132, 'deisel', 123, 24600, 52, 0, 2),
(133, 'petrol', 322, 48300, 52, 0, 1),
(134, 'superpetrol', 33, 19800, 52, 0, 5),
(135, 'deisel', 6600, 1320000, 53, 0, 2),
(136, 'petrol', 6600, 990000, 53, 0, 2),
(137, 'superpetrol', 6600, 3960000, 53, 0, 2),
(138, 'deisel', 10, 2000, 54, 0, 0),
(139, 'petrol', 90, 13500, 54, 0, 0),
(140, 'superpetrol', 90, 54000, 54, 0, 0),
(141, 'superdeisel', 90, 45000, 54, 0, 0),
(142, 'deisel', 100, 20000, 55, 0, 2),
(143, 'petrol', 90, 13500, 55, 0, 2),
(144, 'superpetrol', 90, 54000, 55, 0, 2),
(145, 'superdeisel', 90, 45000, 55, 0, 2),
(146, 'deisel', 6600, 1320000, 56, 0, 2),
(147, 'petrol', 6600, 990000, 56, 0, 2),
(148, 'superpetrol', 6600, 3960000, 56, 0, 2),
(149, 'superdeisel', 6600, 3300000, 56, 0, 2),
(150, 'deisel', 1000, 200000, 57, 0, 2),
(151, 'petrol', 1000, 150000, 57, 0, 2),
(152, 'superpetrol', 1000, 600000, 57, 0, 2),
(153, 'superdeisel', 1000, 500000, 57, 0, 2),
(154, 'deisel', 6600, 1320000, 58, 0, 2),
(155, 'petrol', 6600, 990000, 58, 0, 2),
(156, 'superpetrol', 6600, 3960000, 58, 0, 2),
(157, 'superdeisel', 6600, 3300000, 58, 0, 2),
(158, 'deisel', 7600, 1520000, 59, 0, 3),
(159, 'deisel', 6600, 1320000, 60, 0, 3),
(160, 'superpetrol', 8500, 5100000, 60, 0, 2),
(161, 'superdeisel', 111, 55500, 61, 0, 3),
(162, 'superdeisel', 111, 0, 62, 0, 3),
(163, 'deisel', 50, 10000, 63, 0, 3),
(164, 'petrol', 70, 10500, 63, 0, 3),
(165, 'superpetrol', 70, 42000, 63, 0, 3),
(166, 'superdeisel', 60, 30000, 63, 0, 3),
(167, 'deisel', 5665, 1133000, 64, 0, 2),
(168, 'petrol', 656, 98400, 64, 0, 2),
(169, 'superpetrol', 6565, 3939000, 64, 0, 2),
(170, 'superdeisel', 6565, 3282500, 64, 0, 2),
(171, 'superdeisel', 5, 2500, 65, 0, 0),
(172, 'superdeisel', 5, 2500, 66, 0, 0),
(173, 'superdeisel', 5, 2500, 67, 0, 0),
(174, 'superdeisel', 9, 4500, 68, 0, 0);

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
(24, '2023-11-22 07:36:26', '5110_RZ_24', 188900, 0, 0, 1, 6, 'none', 0),
(25, '2023-11-22 07:44:12', '8206_RZ_25', 58900, 0, 0, 1, 6, 'none', 0),
(26, '2023-12-06 18:01:15', '3762_RZ_26', NULL, 0, 0, 0, 4, 'none', 0),
(27, '2023-12-06 18:02:07', '1326_RZ_27', NULL, 0, 0, 0, 4, 'none', 0),
(28, '2023-12-11 18:02:49', '7694_RZ_28', NULL, 0, 0, 0, 3, 'none', 0),
(29, '2023-12-11 18:21:41', '3004_RZ_29', NULL, 0, 0, 0, 4, 'none', 0),
(30, '2023-12-11 18:30:34', '7233_RZ_30', NULL, 0, 0, 0, 4, 'none', 0),
(31, '2023-12-13 17:29:01', '3417_RZ_31', NULL, 0, 0, 0, 4, 'none', 0),
(32, '2023-12-17 17:48:01', '6756_RZ_32', NULL, 0, 0, 0, 4, 'none', 0),
(33, '2023-12-17 17:53:55', '8291_RZ_33', NULL, 0, 0, 0, 3, 'none', 0),
(34, '2023-12-17 18:14:20', '7681_RZ_34', NULL, 0, 0, 0, 5, 'none', 0),
(35, '2023-12-22 16:44:26', '9478_RZ_35', NULL, 0, 0, 0, 3, 'none', 0),
(36, '2023-12-22 16:55:05', '3887_RZ_36', NULL, 0, 0, 0, 4, 'none', 0),
(37, '2023-12-22 16:57:34', '5263_RZ_37', NULL, 0, 0, 0, 5, 'none', 0),
(38, '2023-12-22 17:03:47', '4154_RZ_38', NULL, 0, 0, 1, 13, 'none', 0),
(39, '2023-12-22 18:57:17', '9022_RZ_39', NULL, 0, 0, 1, 3, 'none', 0),
(40, '2023-12-22 19:07:01', '7423_RZ_40', NULL, 0, 0, 0, 4, 'none', 0),
(41, '2023-12-22 19:07:01', '7423_RZ_40', NULL, 0, 0, 0, 4, 'none', 0),
(42, '2023-12-22 19:08:52', '6900_RZ_42', NULL, 0, 0, 1, 5, 'Thilina Abeysinghe', 0),
(43, '2023-12-22 19:38:19', '1616_RZ_43', NULL, 0, 0, 1, 4, 'Thilina Abeysinghe', 0),
(44, '2023-12-24 16:26:17', '4654_RZ_44', NULL, 0, 0, 1, 3, 'Thilina Abeysinghe', 0),
(45, '2023-12-24 18:25:39', '9684_RZ_45', NULL, 0, 0, 1, 4, 'Thilina Abeysinghe', 0),
(46, '2023-12-24 18:33:17', '3847_RZ_46', NULL, 0, 0, 1, 4, 'Thilina Abeysinghe', 0),
(47, '2023-12-24 18:38:44', '5546_RZ_47', NULL, 0, 0, 1, 5, 'Thilina Abeysinghe', 0),
(48, '2023-12-24 18:47:34', '1165_RZ_48', NULL, 0, 0, 1, 13, 'Thilina Abeysinghe', 0),
(49, '2023-12-24 19:06:55', '6889_RZ_49', NULL, 0, 0, 1, 5, 'Keerthi1 Hettiarachchi', 0),
(50, '2023-12-24 19:06:55', '6889_RZ_49', NULL, 0, 0, 1, 5, 'Keerthi1 Hettiarachchi', 0),
(51, '2023-12-24 19:06:55', '6889_RZ_49', NULL, 0, 0, 1, 5, 'Keerthi1 Hettiarachchi', 0),
(52, '2023-12-24 19:08:33', '5392_RZ_52', NULL, 0, 0, 1, 5, 'Thilina Abeysinghe', 0),
(53, '2024-01-24 17:51:38', '9649_RZ_53', NULL, 0, 0, 1, 6, 'Keerthi1 Hettiarachchi', 0),
(54, '2024-01-26 19:43:31', '6922_RZ_54', NULL, 0, 0, 0, 6, 'none', 0),
(55, '2024-01-26 19:58:49', '4924_RZ_55', NULL, 0, 0, 1, 6, 'Keerthi1 Hettiarachchi', 0),
(56, '2024-01-27 21:23:05', '5118_RZ_56', NULL, 0, 0, 1, 6, 'Keerthi1 Hettiarachchi', 0),
(57, '2024-02-01 17:17:50', '3880_RZ_57', NULL, 0, 0, 1, 6, 'Keerthi1 Hettiarachchi', 0),
(58, '2024-02-01 20:51:49', '6370_RZ_58', NULL, 0, 0, 1, 11, 'Keerthi1 Hettiarachchi', 0),
(59, '2024-02-01 21:02:42', '5377_RZ_59', NULL, 0, 0, 1, 6, 'Keerthi1 Hettiarachchi', 0),
(60, '2024-02-01 21:43:39', '1891_RZ_60', NULL, 0, 0, 1, 11, 'Keerthi1 Hettiarachchi', 0),
(61, '2024-02-10 07:54:11', '4334_RZ_61', NULL, 0, 0, 1, 6, 'Keerthi1 Hettiarachchi', 0),
(62, '2024-02-10 07:54:25', '4229_RZ_62', NULL, 0, 0, 1, 6, 'Keerthi1 Hettiarachchi', 0),
(63, '2024-02-10 10:20:13', '3254_RZ_63', NULL, 0, 0, 1, 12, 'Keerthi1 Hettiarachchi', 0),
(64, '2024-02-11 10:01:24', '2109_RZ_64', NULL, 0, 0, 1, 11, 'Keerthi1 Hettiarachchi', 0),
(65, '2024-02-12 17:53:23', '5039_RZ_65', NULL, 0, 0, 0, 7, 'none', 0),
(66, '2024-02-12 17:53:23', '5039_RZ_65', NULL, 0, 0, 0, 7, 'none', 0),
(67, '2024-02-12 17:53:23', '5039_RZ_65', NULL, 0, 0, 0, 7, 'none', 0),
(68, '2024-02-12 18:00:29', '8784_RZ_68', NULL, 0, 0, 0, 7, 'none', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `idorderstatus` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `orderitemid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createat` datetime NOT NULL,
  `isdelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `nic` varchar(15) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `isadmin` tinyint(4) DEFAULT NULL,
  `isdealer` tinyint(4) DEFAULT NULL,
  `isdriver` tinyint(4) DEFAULT NULL,
  `isgantryop` tinyint(1) NOT NULL DEFAULT 0,
  `issecurity` tinyint(1) NOT NULL DEFAULT 0,
  `phonenumber` varchar(45) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0,
  `driverstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `firstname`, `lastname`, `nic`, `email`, `password`, `isadmin`, `isdealer`, `isdriver`, `isgantryop`, `issecurity`, `phonenumber`, `isdelete`, `driverstatus`) VALUES
(14, 'Thilina', 'Abeysinghe', '', 'thilina@recurzive.com', '3c74e8c3a7314e9da6789b4a9fe45bc333764e2d68f683c23c0d87acf50952fb', 1, 0, NULL, 0, 0, '94717699107', 0, 0),
(15, 'Keerthi', 'Hettiarachchi', '', 'keerthi.sanjaya@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 0, 1, 0, 0, 0, '94716198852', 0, 0),
(19, 'Thilina', 'Abeysinghe', '', 'thilina2@recurzive.com', '3c74e8c3a7314e9da6789b4a9fe45bc333764e2d68f683c23c0d87acf50952fb', 1, 0, NULL, 0, 0, '94779798118', 0, 0),
(20, 'kiirthi', 'kiirthi', '950932134v', 'kiirthi321@gmail.com', 'd64ad2380052754f0af687305b52a5ec59dd644329af810ae68e5472236add63', 0, 0, 0, 0, 0, '94716198852', 0, 0),
(21, 'dealer', 'dealer', '935555654v', 'dealer@gmail.com', '2fc814f5d861c406d4ae401fb8397e8a73f37633602e295d6d0826dc9c14ba0c', 0, 0, 0, 0, 0, '94716198852', 0, 0),
(22, 'dealer2', 'deal', '9866655555v', 'dealer2@gmail.com', 'd3b8c0bb35af0e2d36e9a150739b753420ee2d4e1ec049822d376e2f7c56175b', 0, 0, 0, 0, 0, '94716198852', 0, 0),
(23, 'dealer3', 'dealer3', '950932136v', 'dealer3@gmail.com', 'd3b8c0bb35af0e2d36e9a150739b753420ee2d4e1ec049822d376e2f7c56175b', 0, 0, 0, 0, 0, '94779798118', 0, 0),
(24, 'dealer4', 'dealer4', '950932134v', 'dealer5@gmail.com', 'd3b8c0bb35af0e2d36e9a150739b753420ee2d4e1ec049822d376e2f7c56175b', 0, 0, 0, 0, 0, '94779798118', 0, 0),
(25, 'dealear6', 'deal5', '950932134v', 'dealer6@gmail.com', 'd3b8c0bb35af0e2d36e9a150739b753420ee2d4e1ec049822d376e2f7c56175b', 0, 1, 0, 0, 0, '94779798118', 0, 0),
(26, 'Dealer5', 'Dealer5', '93659888v', 'dealer55@gmail.com', 'd3b8c0bb35af0e2d36e9a150739b753420ee2d4e1ec049822d376e2f7c56175b', 0, 1, 0, 0, 0, '94779798118', 0, 0),
(29, 'Keerthi1', 'Hettiarachchi', '902560599V', 'keerthi.sanjaya1@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 1, NULL, 0, 0, 0, '94716198852', 0, 0),
(32, 'gantry', 'gantry1', '902560599V', 'gantry@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 0, NULL, 0, 0, 0, '94716198852', 0, 0),
(33, 'Kamal', 'Hapangama', '', 'kamal@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 1, 0, NULL, 0, 0, '94716198852', 0, 0),
(37, 'sec', 'sec12', '90256054599V', 'sec@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 0, NULL, 0, 0, 0, '94716198852', 0, 0),
(41, 'Vimal', 'Hapangama', '458678866V', 'vimal@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 1, 0, 0, 0, 0, '94716198852', 1, 0),
(43, 'Vimal te', 'Hapangama', '520586588V', 'vimal1@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 1, 0, 0, 0, 0, '94716198852', 0, 0),
(53, 'Dhanuka', 'Jayathilaka', '995263588V', 'dhanuka@gmail.com', '8e4e8039abd4262e77b36e12e4718cbaf8f49a05df7e01bb3ebfa26383d1faac', 0, NULL, 0, 0, 0, '94716198852', 0, 0),
(54, 'Sadun', 'Perera', '789589566V', 'sadunperera@gmail.com', '04fe3273855dca384929ddd0c0cb8ec97059ecee97bf5b29d0d2db2beead3aa5', 0, NULL, 0, 0, 0, '94716198852', 0, 0);

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
  `vehicle_is_active` varchar(45) DEFAULT '1',
  `vehicle_type_idvehicle_type` int(11) NOT NULL,
  `Location_idLocation` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT 0,
  `tankfillamount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`idvehicle`, `vehicle_number`, `vehicle_chasis_number`, `vehicle_yom`, `vehicle_no_of_passengers`, `vehicle_weight`, `vehicle_is_available`, `vehicle_is_active`, `vehicle_type_idvehicle_type`, `Location_idLocation`, `isdelete`, `tankfillamount`) VALUES
(5, 'KU-6018', 'cha123', '2023-11-09', 2, 2, '1', '1', 3, 10, 0, 0),
(6, 'wp116544', '13123', '2023-12-15', 2, 2555, '0', '1', 4, 10, 0, 0);

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
(6, '333335', '2023-11-02 00:00:00', '2023-11-29 00:00:00', '0', 5, '205504055.pdf', 0),
(7, 'kucalibration -101', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 6, 'Sumanadasa.pdf', 0);

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
(3, 6600, NULL, '1', 0),
(4, 19800, NULL, '1', 0);

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
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`idorderstatus`),
  ADD KEY `fkorderid` (`orderid`),
  ADD KEY `fkorderitem` (`orderitemid`);

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
  MODIFY `idbowser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `dailydip`
--
ALTER TABLE `dailydip`
  MODIFY `iddailydip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `iddocuments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `idemployee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
  MODIFY `idemployeetype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `idloginlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `materialprice`
--
ALTER TABLE `materialprice`
  MODIFY `idmaterialprice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `idorderitems` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idorders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `idorderstatus` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `idvehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_calibration_certificate`
--
ALTER TABLE `vehicle_calibration_certificate`
  MODIFY `idvehicle_calibration_certificate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD CONSTRAINT `fkorderid` FOREIGN KEY (`orderid`) REFERENCES `orders` (`idorders`),
  ADD CONSTRAINT `fkorderitem` FOREIGN KEY (`orderitemid`) REFERENCES `orderitems` (`idorderitems`);

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
