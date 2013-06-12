-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2013 at 02:02 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sitv`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengumuman`
--

CREATE TABLE IF NOT EXISTS `jenis_pengumuman` (
  `ID_JENIS` int(11) NOT NULL,
  `DESKRIPSI_JENIS` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_JENIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pengumuman`
--

INSERT INTO `jenis_pengumuman` (`ID_JENIS`, `DESKRIPSI_JENIS`) VALUES
(1, 'Multimedia'),
(2, 'Text');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `ID_PENGUMUMAN` int(11) NOT NULL AUTO_INCREMENT,
  `JUDUL_PENGUMUMAN` varchar(40) NOT NULL,
  `DESKRIPSI_PENGUMUMAN` text NOT NULL,
  `MULAI_TAYANG_PENGUMUMAN` datetime NOT NULL,
  `SELESAI_TAYANG_PENGUMUMAN` datetime NOT NULL,
  `ID_JENIS_PENGUMUMAN` int(11) NOT NULL,
  `LOKASI_FILE_PENGUMUMAN` text NOT NULL,
  `ID_PENGISI_PENGUMUMAN` int(11) NOT NULL,
  `ID_STATUS_PENGUMUMAN` tinyint(1) NOT NULL COMMENT '0 = new, 1 = approved, 2 = rejected',
  `TIMESTAMP_PENGUMUMAN` datetime NOT NULL,
  PRIMARY KEY (`ID_PENGUMUMAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`ID_PENGUMUMAN`, `JUDUL_PENGUMUMAN`, `DESKRIPSI_PENGUMUMAN`, `MULAI_TAYANG_PENGUMUMAN`, `SELESAI_TAYANG_PENGUMUMAN`, `ID_JENIS_PENGUMUMAN`, `LOKASI_FILE_PENGUMUMAN`, `ID_PENGISI_PENGUMUMAN`, `ID_STATUS_PENGUMUMAN`, `TIMESTAMP_PENGUMUMAN`) VALUES
(1, 'Pengumuman 1', 'pengumuman', '2013-05-19 16:00:00', '2013-05-20 17:00:00', 1, 'final-ise-oprec.jpg', 1, 1, '2013-05-19 14:27:34'),
(2, 'Penggantian jam kuliah kelas b alpro 2', 'Jam kuliah berubah menjadi jam 15.00', '2013-05-22 07:00:00', '2013-05-22 15:00:00', 1, 'fcs.jpg', 1, 1, '2013-05-20 12:51:26'),
(3, 'pengumuman oka', 'pengumuman banget', '2013-05-23 18:00:00', '2013-05-23 19:00:00', 1, '189117.jpg', 2, 1, '2013-05-22 17:10:35'),
(4, 'oka2', 'pengumuman kedua', '2013-05-23 09:00:00', '2013-05-23 10:00:00', 1, 'psg_away.jpg', 2, 1, '2013-05-22 17:14:29'),
(5, 'oka3', 'oka ketiga', '2013-05-23 14:00:00', '2013-05-23 15:00:00', 1, '', 2, 1, '2013-05-22 17:15:16'),
(6, 'pengumuman 4', 'pengumuman', '2013-05-23 21:00:00', '2013-05-23 22:00:00', 1, 'apache_pb.png', 1, 1, '2013-05-23 16:51:11'),
(7, 'a', 'a', '2013-05-23 02:00:00', '2013-05-23 03:00:00', 1, 'DSC_0802.JPG', 1, 1, '2013-05-24 01:00:18'),
(8, 'apa', 'apa yaaa', '2013-05-01 09:00:00', '2013-05-01 11:00:00', 1, 'amins1.png', 1, 1, '2013-05-24 22:30:10'),
(9, 'apaya', 'apaya', '2013-05-31 07:00:00', '2013-05-31 13:00:00', 1, 'France_Euro2012HomePI.png', 1, 1, '2013-05-25 00:33:53'),
(10, 'apaya', 'apaya', '2013-05-31 07:00:00', '2013-05-31 13:00:00', 1, 'France_Euro2012HomePI1.png', 1, 1, '2013-05-25 00:37:08'),
(11, 'coba', 'coba', '2013-05-17 08:00:00', '2013-05-17 10:00:00', 2, 'amins2.png', 2, 1, '2013-05-25 01:32:32'),
(12, 'coba', 'coba', '2013-05-17 08:00:00', '2013-05-17 10:00:00', 2, 'amins3.png', 2, 1, '2013-05-25 01:32:47'),
(13, 'satu lagi', 'apa ya', '2013-05-01 05:00:00', '2013-05-01 14:00:00', 1, 'France_Euro2012HomePI2.png', 1, 1, '2013-05-25 08:31:30'),
(14, 'oka3', 'oka', '2013-06-12 09:00:00', '2013-06-12 10:00:00', 2, '', 2, 1, '2013-06-01 13:44:54'),
(16, 'pengumuman admin', 'admin', '2013-06-07 04:00:00', '2013-06-07 05:00:00', 2, '', 1, 2, '2013-06-07 02:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `ID_ROLE` int(11) NOT NULL,
  `KETERANGAN_ROLE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID_ROLE`, `KETERANGAN_ROLE`) VALUES
(1, 'ADMIN'),
(2, 'KOORDINATOR'),
(3, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USER_NAME` varchar(60) NOT NULL,
  `USER_PASSWORD` text NOT NULL,
  `USER_ROLE` int(2) NOT NULL,
  UNIQUE KEY `USER_ID` (`USER_ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `EMAIL`, `USER_NAME`, `USER_PASSWORD`, `USER_ROLE`) VALUES
(1, 'admin@is.its.ac.id', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'sitv@is.its.ac.id', 'koordinator sitv', '000ba70415b5803c3956280ca6df9288', 2),
(3, 'oka11@mhs.is.its.ac.id', 'oka', 'dcf80b2416ca823e8d807558a9310eb3', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
