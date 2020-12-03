-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 01:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenleaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `regDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `userName`, `Email`, `password`, `regDate`) VALUES
(1, 'rifat', 'rifat.nibrit.rn@gmail.com', 'rifat', '2019-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pID` int(11) NOT NULL,
  `IpAddess` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(2, 'Shirts'),
(3, 'T-SHIRT');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `C_pass` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `Address` varchar(230) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipCode` varchar(30) DEFAULT NULL,
  `phone` int(12) NOT NULL,
  `regDate` date NOT NULL,
  `customerIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `FirstName`, `LastName`, `C_pass`, `Email`, `gender`, `Address`, `city`, `country`, `zipCode`, `phone`, `regDate`, `customerIP`) VALUES
(4, 'rifatur', 'rahman', 'rifat', 'rifat.nibrit.rn@gmail.com', ' MALE', '3/ka-1 fokruzzaman tower, college road, mymensingh ,bangladesh', 'mymensingh', 'Dhaka', ' 2200', 1868428129, '2019-11-28', '::1'),
(5, 'rifatur', 'Rahman', 'rifat', 'rifat@gmail.com', ' MALE', 'tongi,gazipur', 'dhaka', 'Bangladesh', ' 2210', 176585824, '2019-11-29', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(10) NOT NULL,
  `DueAmount` int(20) NOT NULL,
  `invoiceNo` int(20) NOT NULL,
  `totalProduct` int(10) NOT NULL,
  `orderDate` date NOT NULL,
  `orderStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `DueAmount`, `invoiceNo`, `totalProduct`, `orderDate`, `orderStatus`) VALUES
(11, 5, 1362, 121005, 3, '2019-12-04', 'pending'),
(12, 5, 906, 117045, 2, '2019-12-04', 'pending'),
(13, 5, 0, 125804, 0, '2019-12-04', 'pending'),
(14, 5, 1579, 121174, 4, '2019-12-04', 'pending'),
(15, 5, 673, 113209, 2, '2019-12-04', 'pending'),
(16, 5, 5468, 118077, 3, '2019-12-05', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `OD_id` int(11) NOT NULL,
  `customerID` int(10) NOT NULL,
  `invoiceNo` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `qtn` int(10) NOT NULL,
  `orderStatus` text NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`OD_id`, `customerID`, `invoiceNo`, `productID`, `qtn`, `orderStatus`, `orderDate`) VALUES
(1, 5, 120022, 5, 1, 'pending', '0000-00-00'),
(2, 5, 127154, 5, 1, 'pending', '0000-00-00'),
(3, 5, 102903, 5, 1, 'pending', '0000-00-00'),
(4, 5, 104317, 0, 1, 'Complete', '0000-00-00'),
(5, 5, 123691, 0, 1, 'pending', '0000-00-00'),
(6, 5, 123884, 0, 1, 'pending', '0000-00-00'),
(7, 5, 106020, 0, 1, 'pending', '0000-00-00'),
(8, 5, 111938, 0, 1, 'pending', '0000-00-00'),
(9, 5, 123932, 2, 1, 'pending', '0000-00-00'),
(10, 5, 121005, 5, 1, 'pending', '0000-00-00'),
(11, 5, 117045, 2, 1, 'pending', '0000-00-00'),
(12, 5, 125804, 0, 1, 'pending', '0000-00-00'),
(13, 5, 121174, 7, 1, 'pending', '0000-00-00'),
(14, 5, 113209, 6, 1, 'pending', '0000-00-00'),
(15, 5, 118077, 5, 1, 'pending', '2019-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `SKU` varchar(50) NOT NULL,
  `productPrice` int(10) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productOrigin` varchar(10) NOT NULL,
  `productSizes` varchar(5) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `discription` varchar(1100) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productDate` date NOT NULL,
  `keyword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `SKU`, `productPrice`, `productQuantity`, `productOrigin`, `productSizes`, `image`, `discription`, `categoryID`, `productDate`, `keyword`) VALUES
(1, 'New Winter Collection 2019', 'N140', 456, 10, 'GIRLS', 'Mediu', '8b951a88-e93a-4bb9-85a2-4dd3a309ec46-affordable-natural-curly-hair-routine.jpg', 'winter coming soon', 2, '2019-11-27', 'jackets'),
(2, 'g- star T-shirt', 'ds78', 450, 10, 'MENS', 'Large', '2018-Children-Cold-Winter-Thick-Warm-Down-Jackets-Boys-Girls-Kids-Down-Jacket-Girls-Winter-Coats.jpg', 'nice', 3, '2019-11-27', 'jackets '),
(5, 'gold- star BAG2', 'N14021', 4562, 451, 'MENS', 'Large', '9487648-1-burnbook.jpg', 'gusgd1', 3, '2019-11-27', 'BAG t-shirt'),
(7, 'Tshirt New Cullection 2019', '45712', 217, 42, 'MENS', 'Mediu', 'a-young-blond-woman-holding-shopping-bags-in-her-hands.jpg', 'eses', 2, '2019-12-04', 'shirt'),
(8, 'Tshirt New Cullection 2020', '4571s', 217, 42, 'KIDS', 'Mediu', '6befd71cda86b43acc050b51bc40d15e.jpg', 'dsdsdsdsds', 3, '2019-12-04', 'shirt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`OD_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `OD_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
