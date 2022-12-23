-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 02:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `house_info`
--

CREATE TABLE `house_info` (
  `House_ID` varchar(25) NOT NULL,
  `House_type` varchar(25) NOT NULL,
  `Monthly_rate` int(25) NOT NULL,
  `Address` text NOT NULL,
  `Street` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_info`
--

INSERT INTO `house_info` (`House_ID`, `House_type`, `Monthly_rate`, `Address`, `Street`) VALUES
('4nJmCmebCr', 'Single-attached', 20000, 'test', 'test'),
('lGjbNco2gs', 'Rowhouse', 90000, 'Brgy sitio', 'Di magiba');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_table`
--

CREATE TABLE `receipt_table` (
  `Receipt_ID` varchar(25) NOT NULL,
  `Tenant_ID` varchar(25) NOT NULL,
  `House_ID` varchar(25) NOT NULL,
  `Monthly_charge` int(25) NOT NULL,
  `Balance` float(25,2) NOT NULL,
  `Amount_paid` float(25,2) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt_table`
--

INSERT INTO `receipt_table` (`Receipt_ID`, `Tenant_ID`, `House_ID`, `Monthly_charge`, `Balance`, `Amount_paid`, `Date`) VALUES
('73280', '4nJmCmebCr', '4nJmCmebCr', 20000, 449213120.00, 40000.00, '2022-12-20'),
('84675', 'lGjbNco2gs', 'lGjbNco2gs', 90000, 686951296.00, 450000.00, '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `renter_info`
--

CREATE TABLE `renter_info` (
  `Tenant_ID` varchar(25) NOT NULL,
  `Tenant_Name` varchar(25) NOT NULL,
  `Contact_Num` varchar(10) NOT NULL,
  `Method_of_Pay` varchar(25) NOT NULL,
  `Month_to_stay` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renter_info`
--

INSERT INTO `renter_info` (`Tenant_ID`, `Tenant_Name`, `Contact_Num`, `Method_of_Pay`, `Month_to_stay`) VALUES
('4nJmCmebCr', 'John Carlo', '0912-123-1', 'Paypal', 2),
('lGjbNco2gs', 'John Carlo Edward', '0912-134-8', 'GCASH', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `house_info`
--
ALTER TABLE `house_info`
  ADD PRIMARY KEY (`House_ID`),
  ADD UNIQUE KEY `Monthly_rate` (`Monthly_rate`);

--
-- Indexes for table `receipt_table`
--
ALTER TABLE `receipt_table`
  ADD PRIMARY KEY (`Receipt_ID`),
  ADD UNIQUE KEY `Foreign Key` (`Tenant_ID`),
  ADD KEY `House_ID` (`House_ID`),
  ADD KEY `Monthly_charge` (`Monthly_charge`);

--
-- Indexes for table `renter_info`
--
ALTER TABLE `renter_info`
  ADD PRIMARY KEY (`Tenant_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipt_table`
--
ALTER TABLE `receipt_table`
  ADD CONSTRAINT `receipt_table_ibfk_1` FOREIGN KEY (`Tenant_ID`) REFERENCES `renter_info` (`Tenant_ID`),
  ADD CONSTRAINT `receipt_table_ibfk_2` FOREIGN KEY (`House_ID`) REFERENCES `house_info` (`House_ID`),
  ADD CONSTRAINT `receipt_table_ibfk_3` FOREIGN KEY (`Monthly_charge`) REFERENCES `house_info` (`Monthly_rate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
