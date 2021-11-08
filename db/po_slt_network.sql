-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2021 at 05:27 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `po_slt_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_city`
--

DROP TABLE IF EXISTS `tb_city`;
CREATE TABLE IF NOT EXISTS `tb_city` (
  `CityId` int(11) NOT NULL,
  `City` varchar(100) NOT NULL,
  PRIMARY KEY (`CityId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_city`
--

INSERT INTO `tb_city` (`CityId`, `City`) VALUES
(1, 'POLONNARUWA'),
(2, 'HABARANA'),
(3, 'MEDIRIGIRIYA'),
(4, 'PALUGASDAMANA'),
(5, 'WELIKANDA'),
(6, 'ARANAGANWILA'),
(7, 'DEHIATHTHAKANDIYA'),
(8, 'GIRADURUKOTTE'),
(9, 'DIYABEDUMA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_locations`
--

DROP TABLE IF EXISTS `tb_locations`;
CREATE TABLE IF NOT EXISTS `tb_locations` (
  `LocationID` int(11) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `CableSize` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  PRIMARY KEY (`LocationID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_locations`
--

INSERT INTO `tb_locations` (`LocationID`, `Location`, `CableSize`, `CityID`) VALUES
(1, 'KADURUWELA,WELIKANDA,ARANAGANWILA', 96, 1),
(2, 'KADURUWELA', 256, 1),
(3, 'NEW TOWN,PSCOLONY,ALUTHWEWA', 64, 1),
(4, 'ONAGAMA,GALTHABARAWA', 64, 1),
(5, 'MINNERIYA,HIGURAKGODA', 64, 1),
(6, 'HABARANA(RIN CABLE)', 32, 1),
(7, 'ATHUMALPITIYA,LUXAUYANA', 64, 1),
(8, 'JAYANTHIPURA,DIYABEDUMA', 64, 1),
(9, 'POLONNARUWA TOWN', 96, 1),
(10, 'WALIKANDA', 32, 1),
(11, 'PULASTHIGAMA', 32, 1),
(12, 'OPEN UNIVERCITY', 32, 1),
(13, 'KADURUWELA', 32, 1),
(14, 'MADIRIGIRIYA', 32, 2),
(15, 'BATAKOTUWA,GALAMUNA,PINPARA', 32, 2),
(16, 'HINGURAKGODA TOWN', 32, 2),
(17, 'MINNERIYA', 32, 2),
(18, 'RAJAELA MINNERIYA', 96, 2),
(19, 'SIRIKETHA,HINGURAKDAMANA,HATHAMUNA', 64, 2),
(20, 'AMBAGASWEWA,DIYASENPURA,PSG', 32, 3),
(21, 'PATUNUGAMA,SOMAWATHIYA', 64, 4),
(22, 'THALPOTHA,MADIRIGIRIYA', 32, 4),
(23, 'MANAMPITIYA,KALUKELE,POLONNARUWA', 64, 5),
(24, 'KATUWANVILA', 32, 5),
(25, 'ARALAGANVILA', 32, 5),
(26, 'WALACHCHENEI(RING CABLE)', 32, 5),
(27, 'WELIKANDA TOWN', 96, 5),
(28, 'DEHITTHEKANDIYA', 32, 6),
(29, 'MADAGAMA', 32, 6),
(30, 'DAMMINNA', 64, 6),
(31, 'GIRADURUKOTTE', 64, 7),
(32, 'SIRIPURA,NUWARAGALA', 32, 7),
(33, 'DKY_TOEN', 96, 7),
(34, 'MAHIYANGANAYA', 64, 8),
(35, 'BAKAMUNA', 32, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sender`
--

DROP TABLE IF EXISTS `tb_sender`;
CREATE TABLE IF NOT EXISTS `tb_sender` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Core_No` int(11) NOT NULL,
  `Distination` float DEFAULT NULL,
  `Loss` float DEFAULT NULL,
  `Status` varchar(50) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `CoreColor` varchar(50) NOT NULL,
  `D_Date` date DEFAULT NULL,
  `D_Core_NO` int(11) NOT NULL,
  `D_Distination` float DEFAULT NULL,
  `D_Loss` float DEFAULT NULL,
  `D_Status` varchar(50) NOT NULL,
  `D_Remarks` varchar(255) NOT NULL,
  `D_CoreColor` varchar(50) NOT NULL,
  `D_LocationID` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sender`
--

INSERT INTO `tb_sender` (`ID`, `Date`, `Core_No`, `Distination`, `Loss`, `Status`, `Remarks`, `CoreColor`, `D_Date`, `D_Core_NO`, `D_Distination`, `D_Loss`, `D_Status`, `D_Remarks`, `D_CoreColor`, `D_LocationID`) VALUES
(1, '2017-01-22', 1, 32.5235, 9.34, '', 'CEA uplink WKN(10G)', 'BLUE', '2017-01-22', 1, NULL, NULL, '', 'TO POLONNARUWA', 'BLUE', 'D1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `ID` int(11) NOT NULL,
  `PASWORD` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
