-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 03:57 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalindiproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `rid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`rid`, `oid`, `pid`, `quantity`, `price`) VALUES
(1, 3, 1, 1, 120),
(2, 6, 1, 1, 120),
(3, 3, 1, 1, 120),
(4, 9, 1, 1, 120),
(5, 11, 1, 1, 120),
(6, 12, 3, 1, 167.99),
(7, 13, 2, 1, 79.99),
(8, 13, 3, 3, 503.97),
(9, 14, 1, 1, 120),
(10, 14, 2, 1, 79.99),
(11, 14, 3, 1, 167.99),
(12, 15, 2, 1, 79.99),
(13, 16, 2, 2, 159.98),
(14, 17, 2, 2, 159.98),
(15, 18, 2, 1, 79.99),
(16, 19, 2, 1, 79.99),
(17, 20, 1, 3, 360),
(18, 20, 2, 2, 159.98),
(19, 21, 3, 1, 167.99),
(20, 22, 3, 2, 335.98),
(21, 22, 1, 1, 120),
(22, 22, 2, 1, 79.99),
(23, 23, 3, 1, 167.99),
(24, 24, 3, 1, 167.99),
(25, 25, 2, 1, 79.99);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `purchasedate` date NOT NULL,
  `price` float NOT NULL,
  `paymentmode` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `uid`, `purchasedate`, `price`, `paymentmode`) VALUES
(1, 1, '2016-10-07', 120, 'debit'),
(2, 2, '2016-10-07', 12.12, 'Ok Ok'),
(3, 3, '2016-10-07', 120, 'Credit/Debit Card'),
(4, 3, '2016-10-07', 495.96, 'Net Banking'),
(5, 3, '2016-10-07', 167.99, 'Net Banking'),
(6, 3, '2016-10-07', 120, 'Net Banking'),
(7, 3, '2016-10-07', 167.99, 'Credit/Debit Card'),
(8, 3, '2016-10-07', 120, 'Credit/Debit Card'),
(9, 3, '2016-10-07', 120, 'Credit/Debit Card'),
(10, 3, '2016-10-07', 287.99, 'Credit/Debit Card'),
(11, 3, '2016-10-07', 120, 'Credit/Debit Card'),
(12, 3, '2016-10-07', 167.99, 'Credit/Debit Card'),
(13, 3, '2016-10-07', 583.96, 'Net Banking'),
(14, 3, '2016-10-07', 367.98, 'Net Banking'),
(15, 3, '2016-10-07', 79.99, 'cod'),
(16, 3, '2016-10-07', 159.98, 'Credit/Debit Card'),
(17, 3, '2016-10-07', 159.98, 'Credit/Debit Card'),
(18, 3, '2016-10-07', 79.99, 'cod'),
(19, 3, '2016-10-07', 79.99, 'Net Banking'),
(20, 3, '2016-10-07', 519.98, 'Credit/Debit Card'),
(21, 3, '2016-10-07', 167.99, 'cod'),
(22, 3, '2016-10-07', 535.97, 'cod'),
(23, 3, '2016-10-07', 167.99, 'Cash On Delivery'),
(24, 3, '2016-10-07', 167.99, 'Credit/Debit Card'),
(25, 3, '2016-10-07', 79.99, 'Net Banking');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `image` text NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `name`, `description`, `type`, `price`, `availability`, `image`, `sold`) VALUES
(1, 'Amul Cheeze Spread', 'Amul cheeze is processed very well. Good for health.', 'dairy', 120, 8, 'pics/cheeze1.jpg', 9),
(2, 'Safal Frozen Peas', 'Frozen peas. Store in a cool place.', 'pulses', 79.99, 15, 'pics/mutter.jpg', 14),
(3, 'Amul Butter', '1kg Of Amul butter. Delicious.', 'dairy', 167.99, 23, 'pics/butter.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `address` longtext NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `password`, `phone`, `address`, `city`, `state`, `zip`) VALUES
(1, 'kk', 'kk', 'k@k.com', 'k', '9999999999', 'k', 'k', 'k', '401102'),
(2, 'Saurabh', 'Indoria', 'saurabhindoria2012@gmail.com', 'ad370ed99b189921e7fe26057c40aab9f4fee8385e47606f50f348b9a5530af0', '9768418262', 'b', 'Mumbai', 'Maharashtra', '401105'),
(3, 'Rishabh', 'Indoria', 'rishabhindoria@gmail.com', '12e71ffdacb0c67dd9a8e56fc1b6f20e25742bf031b4eb80cb9e28d0377099e3', '8898467054', 'B/308, Paras Nagar B,\r\nSneha Hospital lane,\r\nNavghar road,\r\nbhayander east', 'Mumbai', 'Maharashtra', '401105'),
(4, 'Kalindi', 'Awasthi', 'kalindi@awasthi.com', 'ad370ed99b189921e7fe26057c40aab9f4fee8385e47606f50f348b9a5530af0', '9768418261', 'kk', 'k', 'k', '401105');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
