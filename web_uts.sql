-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2016 at 07:41 AM
-- Server version: 5.5.24
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`username`, `password`) VALUES
('anto', '1d994afbbe98dfde06bbac24558ce49b798f2835'),
('henry', '293adf1768cf33c0281bf626854672796d6f8bc3'),
('budi12345', '5d373a0ed0c16806d5771e8dda3c79ad98c24b93'),
('andi', '81f27f2687e3bc0a43d52b09c30deeb98e83cdf3');

-- --------------------------------------------------------

--
-- Table structure for table `tbuserdata`
--

CREATE TABLE `tbuserdata` (
  `username` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'approved/pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuserdata`
--

INSERT INTO `tbuserdata` (`username`, `firstName`, `lastName`, `password`, `email`, `status`) VALUES
('andi', 'andi', 'andi', '81f27f2687e3bc0a43d52b09c30deeb98e83cdf3', 'andi@andi', 'approved'),
('angeline', 'angeline', 'abcd', 'abcd', 'angeline@ymail.com', 'pending'),
('anto', 'anto', 'anto', '1d994afbbe98dfde06bbac24558ce49b798f2835', 'anto@anto', 'approved'),
('budi', 'budi', 'budi', 'budi', 'budi@budi', 'pending'),
('budi12345', 'budi', 'santo', '5d373a0ed0c16806d5771e8dda3c79ad98c24b93', 'budi@bbd', 'approved'),
('henry', 'henry', 'wirawan', '293adf1768cf33c0281bf626854672796d6f8bc3', 'henry@gmail.com', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbuserkeepdata`
--

CREATE TABLE `tbuserkeepdata` (
  `idKeepData` bigint(20) NOT NULL COMMENT 'auto generate by time',
  `keepUsername` varchar(20) NOT NULL COMMENT 'username on keep account',
  `username` varchar(100) NOT NULL COMMENT 'other account username',
  `password` varchar(40) NOT NULL COMMENT 'other account password to save',
  `url` varchar(100) NOT NULL COMMENT 'www.exampleinsta.com',
  `description` varchar(200) NOT NULL COMMENT 'some description'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='other account data';

--
-- Dumping data for table `tbuserkeepdata`
--

INSERT INTO `tbuserkeepdata` (`idKeepData`, `keepUsername`, `username`, `password`, `url`, `description`) VALUES
(1477975426, 'henry', 'a', 'a', 'a', 'a'),
(1477975440, 'henry', 'asdf', 'as', 'as', 'as'),
(1477975434, 'henry', 'b', 'b', 'b', ''),
(1477976409, 'budi12345', 'budi', 'budiinsta', 'insta.com', 'abcd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`username`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `tbuserdata`
--
ALTER TABLE `tbuserdata`
  ADD PRIMARY KEY (`username`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `tbuserkeepdata`
--
ALTER TABLE `tbuserkeepdata`
  ADD PRIMARY KEY (`username`,`url`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
