-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2017 at 04:49 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 5.6.30-5+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpg`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  `ufname` varchar(100) NOT NULL,
  `ulname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `umobile` varchar(100) NOT NULL,
  `upass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--


INSERT INTO `user` (`uid`, `ufname`, `ulname`, `uemail`, `umobile`, `upass`) VALUES
(1, 'Yashraj', 'Singh', 'yashrajsingh94@gmail.com', '9691332585', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `customer_images`
--

CREATE TABLE `user_images` (
  `image_id` int(11)  NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` text(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User Image';

-- --------------------------------------------------------

--
-- Table structure for table `customer_image_album`
--

CREATE TABLE `user_image_album` (
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_image_category`
--

CREATE TABLE `user_image_category` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Customer Image Category';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `customer_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `customer_image_album`
--
ALTER TABLE `user_image_album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `customer_image_category`
--
ALTER TABLE `user_image_category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer_images`
--
ALTER TABLE `user_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_image_album`
--
ALTER TABLE `user_image_album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_image_category`
--
ALTER TABLE `user_image_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
