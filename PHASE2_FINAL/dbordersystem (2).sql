-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2023 at 09:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbordersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `username` varchar(8) NOT NULL,
  `password` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblcombo`
--

CREATE TABLE `tblcombo` (
  `combo_id` int(6) NOT NULL,
  `name` varchar(34) NOT NULL,
  `main` varchar(34) NOT NULL,
  `sides` varchar(34) NOT NULL,
  `drink` varchar(34) NOT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcombo`
--

INSERT INTO `tblcombo` (`combo_id`, `name`, `main`, `sides`, `drink`, `discount`) VALUES
(1, 'Chicken Mash Tea', 'Chicken', 'Mashed Potato', 'Ice Tea', 0.1),
(2, 'Steak Veg Beer', 'Steak', 'Steamed Vegetables', 'Root Beer', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `Item` varchar(34) NOT NULL,
  `Category` varchar(5) NOT NULL,
  `Price` int(7) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`Item`, `Category`, `Price`, `img`) VALUES
('Steak', 'Mains', 900, 'https://whitneybond.com/wp-content/uploads/2021/06/steak-marinade-17.jpg'),
('Salmon', 'Mains', 850, 'https://assets.epicurious.com/photos/62d6c5146b6e74298a39d06a/1:1/w_2240,c_limit/BakedSalmon_RECIPE_04142022_9780_final.jpg'),
('Chicken', 'Mains', 300, 'https://www.seriouseats.com/thmb/TzrCtpp3aPnLBGIBrmO6g1ez-mQ=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/20220528-SpatchcockChicken-AmandaSuarez-27-9d40fab579a447eb9c699afcb9291f07.JPG'),
('Baked Potato', 'Sides', 80, 'https://ohsweetbasil.com/wp-content/uploads/Herb-and-Garlic-Roasted-Potatoes-1.jpg'),
('Mashed Potato', 'Sides', 75, 'https://i2.wp.com/lifemadesimplebakes.com/wp-content/uploads/2019/10/mashed-potatoes-resize-6.jpg'),
('Steamed Vegetables', 'Sides', 50, 'https://eatinginstantly.com/wp-content/uploads/2019/04/Instant-Pot-Steamed-Vegetables-5.jpg'),
('Ice Tea', 'Drink', 55, 'https://insanelygoodrecipes.com/wp-content/uploads/2022/09/Refreshing-Cold-Lemon-Iced-Tea-500x500.jpg'),
('Root Beer', 'Drink', 60, 'https://www.eazypeazymealz.com/wp-content/uploads/2016/08/HERO-folder.jpg'),
('Water', 'Drink', 20, 'https://www.yummymummykitchen.com/wp-content/uploads/2021/05/lemon-water-2-720x720.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `order_id` int(8) NOT NULL,
  `main` varchar(20) NOT NULL,
  `side` varchar(20) NOT NULL,
  `drink` varchar(20) NOT NULL,
  `mQuantity` int(100) NOT NULL,
  `sQuantity` int(100) NOT NULL,
  `dQuantity` int(100) NOT NULL,
  `total_price` bigint(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `orig_price` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
