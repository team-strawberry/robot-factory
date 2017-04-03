-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 04:16 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `apikeydata`
--

DROP TABLE IF EXISTS apikeydata;
CREATE TABLE apikeydata (
  `id` int NOT NULL,
  `keyvalue` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apikeydata`
--

INSERT INTO `apikeydata` (`id`, `keyvalue`) VALUES
('0', '000000');

-- --------------------------------------------------------

--
-- Table structure for table `assembledbots`
--

DROP TABLE IF EXISTS assembledbots;
CREATE TABLE assembledbots (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `head` varchar(20) NOT NULL,
  `torso` varchar(20) NOT NULL,
  `legs` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS ci_sessions;
CREATE TABLE ci_sessions (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('pnflp4egjvbvdokcci2ku44rh1p67m3l', '127.0.0.1', 1488930882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438383933303837393b);

-- --------------------------------------------------------

--
-- Table structure for table `historydata`
--

DROP TABLE IF EXISTS historydata;
CREATE TABLE historydata (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  seq varchar(256) NOT NULL,
  model varchar(20) DEFAULT NULL,  
  plant varchar(20) NOT NULL,
  action varchar(16) NOT NULL,
  quantity int(11) NOT NULL,
  amount int(11) NOT NULL,
  stamp datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `partsdata`
--

DROP TABLE IF EXISTS partsdata;
CREATE TABLE partsdata (
  `id` varchar(20) NOT NULL,
  `model` varchar(5) DEFAULT NULL,
  `piece` varchar(5) DEFAULT NULL,
  `plant` varchar(20) DEFAULT NULL,
  `stamp` datetime DEFAULT NULL,
  `aquired_time` datetime DEFAULT NULL,
  `file_name` varchar(20) DEFAULT NULL,
  `href` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
