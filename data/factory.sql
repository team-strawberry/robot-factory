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
  `id` int(20) NOT NULL,
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
  `id` int(120) NOT NULL,
  `head` varchar(20) NOT NULL,
  `body` varchar(20) NOT NULL,
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

--
-- Dumping data for table `partsdata`
--

INSERT INTO `partsdata` (`id`, `model`, `piece`, `plant`, `stamp`, `aquired_time`, `file_name`, `href`) VALUES
('000001', 'A', '1', 'strawberry', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'a1.jpeg', '/parts/000001'),
('000002', 'A', '2', 'strawberry', '2017-01-02 00:00:00', '2017-01-02 00:00:00', 'a2.jpeg', '/parts/000002'),
('000003', 'A', '3', 'strawberry', '2017-01-03 00:00:00', '2017-01-03 00:00:00', 'a3.jpeg', '/parts/000003'),
('000004', 'B', '1', 'strawberry', '2017-01-04 00:00:00', '2017-01-04 00:00:00', 'b1.jpeg', '/parts/000004'),
('000005', 'B', '2', 'strawberry', '2017-01-05 00:00:00', '2017-01-05 00:00:00', 'b2.jpeg', '/parts/000005'),
('000006', 'B', '3', 'strawberry', '2017-01-06 00:00:00', '2017-01-06 00:00:00', 'b3.jpeg', '/parts/000006'),
('000007', 'C', '1', 'strawberry', '2017-01-07 00:00:00', '2017-01-07 00:00:00', 'c1.jpeg', '/parts/000007'),
('000008', 'C', '2', 'strawberry', '2017-01-08 00:00:00', '2017-01-08 00:00:00', 'c2.jpeg', '/parts/000008'),
('000009', 'C', '3', 'strawberry', '2017-01-09 00:00:00', '2017-01-09 00:00:00', 'c3.jpeg', '/parts/000009'),
('000010', 'M', '1', 'strawberry', '2017-01-10 00:00:00', '2017-01-10 00:00:00', 'm1.jpeg', '/parts/000010'),
('000011', 'M', '2', 'strawberry', '2017-01-11 00:00:00', '2017-01-11 00:00:00', 'm2.jpeg', '/parts/000011'),
('000012', 'M', '3', 'strawberry', '2017-01-12 00:00:00', '2017-01-12 00:00:00', 'm3.jpeg', '/parts/000012'),
('000013', 'R', '1', 'strawberry', '2017-01-13 00:00:00', '2017-01-13 00:00:00', 'r1.jpeg', '/parts/000013'),
('000014', 'R', '2', 'strawberry', '2017-01-14 00:00:00', '2017-01-14 00:00:00', 'r2.jpeg', '/parts/000014'),
('000015', 'R', '3', 'strawberry', '2017-01-15 00:00:00', '2017-01-15 00:00:00', 'r3.jpeg', '/parts/000015'),
('000016', 'W', '1', 'strawberry', '2017-01-16 00:00:00', '2017-01-16 00:00:00', 'w1.jpeg', '/parts/000016'),
('000017', 'W', '2', 'strawberry', '2017-01-17 00:00:00', '2017-01-17 00:00:00', 'w2.jpeg', '/parts/000017'),
('000018', 'W', '3', 'strawberry', '2017-01-18 00:00:00', '2017-01-18 00:00:00', 'w3.jpeg', '/parts/000018');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
