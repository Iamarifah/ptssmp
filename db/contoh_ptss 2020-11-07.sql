-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 08:35 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contoh_ptss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `to_user_table` varchar(7) NOT NULL,
  `from_user_table` varchar(7) NOT NULL,
  `chat_time` datetime NOT NULL,
  `isnew` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `to_user_table`, `from_user_table`, `chat_time`, `isnew`) VALUES
(1, 1, 1, 'Hello A', 'student', 'staff', '2020-11-04 08:00:00', 1),
(2, 2, 1, 'Hello B', 'student', 'staff', '2020-11-04 09:00:00', 1),
(3, 1, 9, 'Hello C', 'staff', 'staff', '2020-11-04 18:00:00', 1),
(4, 11, 1, 'Hello D', 'staff', 'student', '2020-11-04 18:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_title` varchar(500) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `available_quantity` int(3) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_price` varchar(12) NOT NULL,
  `seller_table` varchar(7) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_id`, `product_name`, `product_title`, `product_category`, `available_quantity`, `product_description`, `product_price`, `seller_table`, `seller_id`) VALUES
(12, 'case', 'CASING IP11 11PRO 11PRO MAX', 'Accessories & Shoes', 4, 'bestfriend casing', '8.50', 'staff', 1),
(14, 'makeup', 'Matte Shimmer Nude Eyeshadow Makeup Palette', 'Health & Beauty', 4, 'Glow makeup', '15.90', 'staff', 9),
(17, 'brush', 'Soft Makeup Brush', 'Health & Beauty', 3, 'makeup brush', '10.00', 'staff', 11),
(18, 'pepero', '[Mix & Match] Lotte Pepero Almond 32g', 'Foods & Beverages', 5, 'You can savour delicious Pepero  Stick ', '5.90', 'student', 1),
(19, 'haus', 'HAUS BOOM SPARKLING REAL JUICE 275ML', 'Foods & Beverages', 6, '100% HALAL SPARKLING JUICE\r\nMADE IN MALAYSIA', '3.90', 'student', 2);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `profile_image`, `email`, `phone`) VALUES
(1, '', 'ella7@gmail.com', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `uname` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `conpass` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `conpass` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `uname`, `name`, `pass`, `conpass`) VALUES
(1, '000515100260', 'yasir', 'yas00', ''),
(9, '000921070282', 'Arifah', '000921070282', ''),
(11, '000227025402', 'Aina', '000227025402', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `conpass` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `uname`, `name`, `pass`, `conpass`) VALUES
(1, 'wana', 'Fatin Syazwana Binti Rosli', 'wana00', ''),
(2, '123', '123', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `profile_image` (`profile_image`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
