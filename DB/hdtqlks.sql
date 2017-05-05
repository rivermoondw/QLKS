-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 04:49 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hdtqlks`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookingguest`
--

CREATE TABLE `bookingguest` (
  `bookingguest_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `convenient`
--

CREATE TABLE `convenient` (
  `convenient_id` int(11) NOT NULL,
  `name_conv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` bit(1) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `real_end_date` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `rank_id` int(11) NOT NULL,
  `rank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`rank_id`, `rank`) VALUES
(1, 'Standard'),
(2, 'Superior'),
(3, 'Deluxe'),
(4, 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `state` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_convenient`
--

CREATE TABLE `room_convenient` (
  `room_id` int(11) NOT NULL,
  `convenient_id` int(11) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(1, 'Single room'),
(2, 'Twin room'),
(3, 'Double room'),
(4, 'Triple room');

-- --------------------------------------------------------

--
-- Table structure for table `usingservice`
--

CREATE TABLE `usingservice` (
  `usingservice_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `usingtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `bookingguest`
--
ALTER TABLE `bookingguest`
  ADD PRIMARY KEY (`bookingguest_id`);

--
-- Indexes for table `convenient`
--
ALTER TABLE `convenient`
  ADD PRIMARY KEY (`convenient_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_convenient`
--
ALTER TABLE `room_convenient`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `usingservice`
--
ALTER TABLE `usingservice`
  ADD PRIMARY KEY (`usingservice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookingguest`
--
ALTER TABLE `bookingguest`
  MODIFY `bookingguest_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `convenient`
--
ALTER TABLE `convenient`
  MODIFY `convenient_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usingservice`
--
ALTER TABLE `usingservice`
  MODIFY `usingservice_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
