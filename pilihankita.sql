-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2013 at 01:23 AM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pilkita`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique` varchar(18) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `desa`
--
DROP TRIGGER IF EXISTS `bi_desa`;
DELIMITER //
CREATE TRIGGER `bi_desa` BEFORE INSERT ON `desa`
 FOR EACH ROW SET NEW.unique = OLD_PASSWORD(NEW.id)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `bu_desa`;
DELIMITER //
CREATE TRIGGER `bu_desa` BEFORE UPDATE ON `desa`
 FOR EACH ROW SET NEW.unique = OLD_PASSWORD(NEW.id)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique` varchar(24) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `sandi` char(35) NOT NULL,
  `tipe` char(2) NOT NULL DEFAULT '1',
  `status` char(2) NOT NULL DEFAULT '0',
  `foto` varchar(244) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `pengguna`
--
DROP TRIGGER IF EXISTS `bi_pengguna`;
DELIMITER //
CREATE TRIGGER `bi_pengguna` BEFORE INSERT ON `pengguna`
 FOR EACH ROW SET NEW.unique = OLD_PASSWORD(NEW.id)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `bu_pengguna`;
DELIMITER //
CREATE TRIGGER `bu_pengguna` BEFORE UPDATE ON `pengguna`
 FOR EACH ROW SET NEW.unique = OLD_PASSWORD(NEW.id)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pokok`
--

CREATE TABLE IF NOT EXISTS `pokok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pemilih` varchar(75) NOT NULL,
  `desa` varchar(75) NOT NULL,
  `tps` varchar(2) NOT NULL,
  `pendata` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE IF NOT EXISTS `rapor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengguna` varchar(24) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `tps` varchar(3) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tps`
--

CREATE TABLE IF NOT EXISTS `tps` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tulisan`
--

CREATE TABLE IF NOT EXISTS `tulisan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` char(18) NOT NULL,
  `judul` varchar(66) NOT NULL,
  `isi` text NOT NULL,
  `status` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `tulisan`
--
DROP TRIGGER IF EXISTS `bi_tulisan_table`;
DELIMITER //
CREATE TRIGGER `bi_tulisan_table` BEFORE INSERT ON `tulisan`
 FOR EACH ROW SET NEW.url = OLD_PASSWORD(NEW.id)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `bu_tulisan_table`;
DELIMITER //
CREATE TRIGGER `bu_tulisan_table` BEFORE UPDATE ON `tulisan`
 FOR EACH ROW SET NEW.url = MD5(NEW.id)
//
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
