-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2022 at 02:23 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaming_shopv4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`) VALUES
(1, 'Ali_123', 'e9e44883f6b0d21ea65e8876151011d0ebf8a230'),
(2, 'Ahmed_123', 'b4c0308373fd86f3d9b5f06da7ef309b7545d231'),
(3, 'Salaman_123', '8e7250ad9f035b96135c7f4ff440ced3dd378e43'),
(4, 'Mohammed_98346', '7ff2505ec54e5bb4eeb2c934189ee195f7c5e516'),
(5, 'Saqiq65454', '37619af39cd424c67078e08978832c7c474726af');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `ID` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Payment_method` varchar(50) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `OrderNumber` int(20) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`ID`, `Price`, `Payment_method`, `Customer_ID`, `OrderNumber`, `Location`, `Product_ID`, `Quantity`) VALUES
(1, 1200, 'stc pay', 6, 1001, 'Qatif', 1, 1),
(2, 270, 'Credit card', 7, 1002, 'Dammam', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `Price`, `Product_ID`, `Quantity`, `Customer_ID`) VALUES
(3, 1800, 1, 1, 1),
(4, 500, 3, 1, 1),
(6, 1500, 2, 1, 1),
(9, 1800, 1, 1, 2),
(11, 700, 4, 1, 2),
(12, 1000, 3, 2, 3),
(14, 1500, 3, 3, 4),
(16, 3600, 1, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Username`, `Email`, `Password`, `Phone_number`) VALUES
(6, 'gymmaster', 'gym@gmail.com', '$2y$10$4rKHVyg6Ylq1wKUE4utFZeNVpyZwJgs9OqLF0385f.vDUd1iMi/8G', '(053) 817-5984'),
(7, 'greentea', 'tea@gmail.com', '$2y$10$hzqZMj5jlw0oHe7JlzY.FeZbHtzbDmupY1zpzTcRa17vfjf7PjvY.', '(053) 817-5770'),
(8, 'coffeeguy', 'coffee@hotmail.com', '$2y$10$mTV3oS/n.jHpeesslY2n8uqo/n.nOUhNNVTnSyXTKfCLbPcmRWRu2', '(053) 817-5680'),
(9, 'compuintel', 'intel@gmail.com', '$2y$10$QPd3PF7nJ44aTC9CgRxDMODVwSUhT1Wlx4l3GLw.pEVp2TLtG3eZm', '(053) 817-5736');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Picture` varchar(250) NOT NULL,
  `Admin_ID` int(11) NOT NULL,
  `Summary` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Stock`, `Price`, `Picture`, `Admin_ID`, `Summary`) VALUES
(1, 'Graphic card geforce 3090', 9, 1200, '../images/grahpicCard.jpg', 1, 'Brand	Nvidia\r\nGraphics co-processor	NVIDIA GeForce RTX 3090\r\nVideo output interface	DisplayPort\r\nGraphics processor manufacturer	Nvidia GeForce RTX 3090\r\nGraphics RAM size	24 GB\r\nGraphics card interface	PCI-E\r\nAbout this item\r\nChipset: NVIDIA GeForce RTX 3090\r\nVideo Memory: 24GB GDDR6X\r\nMemory Interface: 384-bit\r\nOutput: DisplayPort x 3 (v1.4a) / HDMI 2.1 x 1\r\nNvidia India 3 Year *;\r\n    ;\r\n    '),
(2, 'Intel i9-12900KF', 20, 900, '../images/cpu.jpg', 4, '- Intel 7 Alder Lake Processor Base Power: 125W\r\n- Maximum Turbo Power: 241W\r\n- 30MB L3 Cache\r\n- 14MB L2 Cache\r\n- Windows 11 Supported'),
(3, 'Antec F12 RGB Cabinet Fan (Single Pack)', 20, 500, '../images/fan.jpg', 3, '- Rapid cooling: The arc surface of the fan frame is guided, which can produce good airflow and cooling effect (3pin：1000 RPM and 30.5 CFM), efficient ventilation, and large-capacity heat dissipation.\r\n\r\n- Trusted Premium Brand : 18-month manufacturer’s warranty and Professional Customer Service Assistance.\r\n'),
(4, 'ASUS ROG STRIX Z690-A GAMING WIFI D4 LGA 1700 motherboard', 30, 1230, '../images/motherboard.jpg', 4, 'Brand	ASUS\r\nCPU socket	LGA 1700\r\nCompatible devices	Desktop PC\r\nCompatible processors	Intel Celeron, Intel Pentium Gold\r\nChipset type	Intel Z690\r\nMemory clock speed	2133 MHz\r\nPlatform	Windows 11, Windows 10\r\nMemory storage capacity	128 GB\r\nRAM memory maximum size	128 GB'),
(5, 'OLOy RAM Blade RGB (2x8GB) 3600 MHz', 12, 500, '../images/ram.jpg', 4, 'DDR4 2x8GB UDIMM, total 16 GB\r\nFrequency : 3600 MHz CL18\r\n1.35V UDIMM (XMP 2.0 Automated Overclocking Technology)\r\nLifetime Warranty\r\nCompatible with Intel and AMD\r\n'),
(6, 'Astro A10', 200, 400, '../images/astroa10.jpg', 1, '    Enhance your everyday gaming setup with the ASTRO A10 Gen 2 Headset. Consider it the next evolution of the equipment you already use on a daily basis.'),
(7, 'Xbox controller', 99, 270, '../images/Xbox-controller.jpg', 1, '    Includes Xbox Wireless and Bluetooth® technology for wireless gaming on console, PC, mobile phones and tablets. Plug in any compatible headset with the 3.5mm stereo headset jack.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
