-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 09:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studenthelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `answered_reports`
--

CREATE TABLE `answered_reports` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `last_announcement`
--

CREATE TABLE `last_announcement` (
  `id` int(11) NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `last_announcement`
--

INSERT INTO `last_announcement` (`id`, `text`) VALUES
(1, 'dfgtdfg'),
(2, 'aa'),
(3, 'dfsdfg'),
(4, 'asdasd'),
(5, 'asdd'),
(6, 'asdasd'),
(7, 'asd'),
(8, 'Tararararara'),
(9, 'Sutra svi na fakultet!!!');

-- --------------------------------------------------------

--
-- Table structure for table `problem_report`
--

CREATE TABLE `problem_report` (
  `id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_report`
--

INSERT INTO `problem_report` (`id`, `type`, `description`, `user_id`) VALUES
(41, '1', 'asad', 0),
(42, '1', 'asad', 0),
(43, '1', 'asad', 0),
(44, '1', 'sfsdf', 0),
(45, '1', 'dfg', 0),
(46, '1', 'werwer', 0),
(47, '1', '11', 0),
(48, '1', 'asdasd', 0),
(49, '1', 'asdasd', 0),
(54, '1', 'aaa', 1),
(55, '1', 'asdasdasdasdasda', 1),
(56, '1', 'asdasdasdasd', 1),
(57, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(58, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(59, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(60, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(61, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(62, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(63, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(64, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(65, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(66, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(67, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(68, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(69, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(70, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(71, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(72, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(73, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(74, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(75, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(76, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(77, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(78, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(79, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(80, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(81, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(82, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(83, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(84, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1),
(85, 'Incident u prostorijama IPI Akademije', 'asdasdasdasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`, `username`, `isAdmin`) VALUES
(1, 'Nermin', 'Kadric', 'nerminkadric54@gmail.com', '123', 'nerminkadric12', 0),
(3, 'Nermin', 'Kadric', 'nerminkadric54@gmail.com2323', '123', 'nerminkadric19', 0),
(4, 'adsadasd', 'Kadric', 'nerminkadric54@gma123123123123il.com', '123456', 'nerminkadric19', 0),
(5, 'Nermin', 'Kadric', 'nerminkadric54@gmail.com1231231231', '123456', 'nerminkadric19', 0),
(6, 'Nermin', 'Kadric', 'nerminkadric54@gmail.com213123123', '123', 'nerminkadric19', 0),
(7, '', '', '', '', '', 0),
(8, 'Nermin', 'Kadric', 'nerminkadric54@gmail.com123123', '123', 'nerminkadric19', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answered_reports`
--
ALTER TABLE `answered_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_announcement`
--
ALTER TABLE `last_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_report`
--
ALTER TABLE `problem_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answered_reports`
--
ALTER TABLE `answered_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `last_announcement`
--
ALTER TABLE `last_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `problem_report`
--
ALTER TABLE `problem_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
