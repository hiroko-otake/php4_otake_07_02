-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2020 at 06:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ec_table`
--

CREATE TABLE `ec_table` (
  `id` int(12) NOT NULL,
  `item` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ec_table`
--

INSERT INTO `ec_table` (`id`, `item`, `value`, `description`, `fname`, `indate`) VALUES
(7, 'ミレニアム１（上）', 100, '美品', '01.jpg', '2020-11-02 17:56:48'),
(8, 'ミレニアム１（下）', 100, 'ほぼ新品', '02.jpg', '2020-11-02 17:57:20'),
(9, 'ミレニアム２（上）', 100, '美品', '03.jpg', '2020-11-02 17:57:57'),
(10, 'ミレニアム２（下）', 100, 'ほぼ新品', '04.jpg', '2020-11-02 17:58:22'),
(11, 'ミレニアム３（上）', 100, '美品', '05.jpg', '2020-11-02 17:58:46'),
(12, 'ミレニアム３（下）', 100, 'ほぼ新品', '06.jpg', '2020-11-02 17:59:13'),
(13, 'ミレニアム４（上）', 100, '美品', '07.jpg', '2020-11-02 18:00:30'),
(14, 'ミレニアム４（下）', 100, 'ほぼ新品', '08.jpg', '2020-11-02 18:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_table`
--
ALTER TABLE `ec_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_table`
--
ALTER TABLE `ec_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
