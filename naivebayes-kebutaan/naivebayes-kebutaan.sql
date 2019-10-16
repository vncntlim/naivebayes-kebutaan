-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 03:16 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naivebayes-kebutaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `NOMOR` int(11) NOT NULL,
  `NAMA_PASIEN` varchar(50) DEFAULT NULL,
  `UMUR` int(11) DEFAULT NULL,
  `DIABETES` varchar(5) DEFAULT NULL,
  `HIPERTENSI` varchar(5) DEFAULT NULL,
  `INTRAOKULAR` int(11) DEFAULT NULL,
  `KEBUTAAN` varchar(5) NOT NULL,
  `PRI_BUTA` double NOT NULL,
  `PRI_TIDAK_BUTA` double NOT NULL,
  `L_U_B` double NOT NULL,
  `L_U_TB` double NOT NULL,
  `L_I_B` double NOT NULL,
  `L_I_TB` double NOT NULL,
  `L_D_B` double NOT NULL,
  `L_D_TB` double NOT NULL,
  `L_H_B` double NOT NULL,
  `L_H_TB` double NOT NULL,
  `POS_BUTA` double NOT NULL,
  `POS_TIDAK_BUTA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`NOMOR`, `NAMA_PASIEN`, `UMUR`, `DIABETES`, `HIPERTENSI`, `INTRAOKULAR`, `KEBUTAAN`, `PRI_BUTA`, `PRI_TIDAK_BUTA`, `L_U_B`, `L_U_TB`, `L_I_B`, `L_I_TB`, `L_D_B`, `L_D_TB`, `L_H_B`, `L_H_TB`, `POS_BUTA`, `POS_TIDAK_BUTA`) VALUES
(1, 'Nata', 73, 'YA', 'TIDAK', 54, 'TIDAK', 0.42424242424242, 0.57575757575758, 0.030354637289799, 0.046864994106576, 0.069192195616245, 0.034008062249531, 0.57142857142857, 0.52631578947368, 0.42857142857143, 0.63157894736842, 0.00021821340272373, 0.00030503112667949),
(2, 'Rafa', 60, 'YA', 'TIDAK', 29, 'TIDAK', 0.42424242424242, 0.57575757575758, 0.095209088957082, 0.11415334670748, 0.069192195616245, 0.078719985538511, 0.57142857142857, 0.52631578947368, 0.42857142857143, 0.63157894736842, 0.0006844390553312, 0.0017198372826766),
(3, 'Alin', 35, 'YA', 'YA', 40, 'YA', 0.42424242424242, 0.57575757575758, 0.041453966427692, 0.018315411103776, 0.11084651488399, 0.12784232372685, 0.57142857142857, 0.52631578947368, 0.57142857142857, 0.36842105263158, 0.00063654063468435, 0.00026140977685224);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `NOMOR` int(11) NOT NULL,
  `NAMA_PASIEN` varchar(50) DEFAULT NULL,
  `UMUR` int(11) DEFAULT NULL,
  `DIABETES` varchar(5) DEFAULT NULL,
  `HIPERTENSI` varchar(5) DEFAULT NULL,
  `INTRAOKULAR` int(11) DEFAULT NULL,
  `KEBUTAAN` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`NOMOR`, `NAMA_PASIEN`, `UMUR`, `DIABETES`, `HIPERTENSI`, `INTRAOKULAR`, `KEBUTAAN`) VALUES
(1, 'Ali Topan', 56, 'YA', 'TIDAK', 61, 'YA'),
(2, 'Sartika', 41, 'TIDAK', 'YA', 39, 'YA'),
(3, 'Mika', 52, 'YA', 'TIDAK', 58, 'TIDAK'),
(4, 'Ruby', 69, 'YA', 'TIDAK', 42, 'YA'),
(5, 'Bian Utami', 48, 'YA', 'YA', 35, 'TIDAK'),
(6, 'Riandari', 66, 'TIDAK', 'YA', 54, 'TIDAK'),
(7, 'Uli Alwan', 55, 'TIDAK', 'TIDAK', 31, 'TIDAK'),
(8, 'Kanita', 56, 'YA', 'TIDAK', 44, 'YA'),
(9, 'Sarini', 67, 'TIDAK', 'YA', 36, 'YA'),
(10, 'Rafina', 73, 'TIDAK', 'YA', 40, 'TIDAK'),
(11, 'Budiman', 38, 'YA', 'YA', 33, 'YA'),
(12, 'Sartika', 51, 'TIDAK', 'YA', 36, 'TIDAK'),
(13, 'Mika', 59, 'TIDAK', 'TIDAK', 24, 'TIDAK'),
(14, 'Ruby', 37, 'YA', 'TIDAK', 37, 'TIDAK'),
(15, 'Kanita', 65, 'YA', 'TIDAK', 43, 'TIDAK'),
(16, 'Sarita', 61, 'YA', 'YA', 36, 'TIDAK'),
(17, 'Budian', 46, 'TIDAK', 'YA', 41, 'YA'),
(18, 'Sartika', 64, 'YA', 'TIDAK', 21, 'YA'),
(19, 'Miko', 36, 'TIDAK', 'YA', 43, 'TIDAK'),
(20, 'Riandani', 39, 'TIDAK', 'YA', 56, 'YA'),
(21, 'Ulilwan', 72, 'YA', 'TIDAK', 44, 'TIDAK'),
(22, 'Kanisa', 36, 'YA', 'YA', 33, 'YA'),
(23, 'Sarina', 62, 'YA', 'TIDAK', 27, 'TIDAK'),
(24, 'Budiana', 71, 'TIDAK', 'YA', 52, 'TIDAK'),
(25, 'Santika', 44, 'YA', 'TIDAK', 34, 'TIDAK'),
(26, 'Safira', 37, 'TIDAK', 'TIDAK', 22, 'YA'),
(27, 'Mira', 55, 'TIDAK', 'YA', 61, 'YA'),
(28, 'Rianti', 62, 'YA', 'YA', 34, 'YA'),
(29, 'Cici', 40, 'YA', 'TIDAK', 32, 'TIDAK'),
(30, 'Ina', 72, 'YA', 'TIDAK', 58, 'YA'),
(31, 'Mima', 63, 'TIDAK', 'TIDAK', 21, 'TIDAK'),
(32, 'Naya', 68, 'YA', 'TIDAK', 39, 'TIDAK'),
(33, 'Sarina', 66, 'TIDAK', 'TIDAK', 45, 'TIDAK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`NOMOR`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`NOMOR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `NOMOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `NOMOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
