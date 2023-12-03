-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 09:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `a_name`, `password`) VALUES
(1001, 'Princess Aura Nurr Ermily Amara Auliya Bidadari Nawal El-Zendra', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `applier`
--

CREATE TABLE `applier` (
  `applier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bdate` date NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applier`
--

INSERT INTO `applier` (`applier_id`, `name`, `email`, `ic`, `phone`, `gender`, `bdate`, `password`) VALUES
(8, 'Princess Aura Nurr Ermily Amara Auliya Bidadari Nawal El-Zendra Mohd. Hazim Ahmad', 'norsuhaidasaidin@gmail.com', '0123456789', '+60129276415', 'Perempuan', '2021-12-30', '789'),
(9, 'alia binti muhammad', 'alia@gmail.com', '2001', '0123', 'Lelaki', '2021-12-07', '123'),
(10, 'intan', 'shda0512@gmail.com', '789456124', '+60129276415', 'Lelaki', '2010-01-23', '456'),
(11, 'wani', 'wani@gmail.com', '789456', '0123140426', 'Perempuan', '2005-12-23', '741'),
(12, 'NORSUHAIDA SAIDIN', 'shda@gmail.com', '123', '+60129276415', 'Perempuan', '2021-09-23', '963');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_details`
--

CREATE TABLE `coordinator_details` (
  `i_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `applier_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_phone` varchar(15) NOT NULL,
  `office_phone` varchar(15) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_address2` varchar(100) NOT NULL,
  `c_address3` varchar(100) NOT NULL,
  `c_postcode` varchar(10) NOT NULL,
  `c_city` varchar(100) NOT NULL,
  `c_state` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `a_date` date NOT NULL DEFAULT current_timestamp(),
  `a_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coordinator_details`
--

INSERT INTO `coordinator_details` (`i_id`, `c_id`, `applier_id`, `c_name`, `c_email`, `c_phone`, `office_phone`, `c_address`, `c_address2`, `c_address3`, `c_postcode`, `c_city`, `c_state`, `status`, `a_date`, `a_time`) VALUES
(146, 64, 9, 'khairul adilah', 'adilah@gmail.com', '0123140426', '05123456', 'no. 7, jln wm 3/25', 'bandar behrang 2020', '', '35900', 'tanjong malim', 'perak', 'Ditolak', '2022-02-22', '10:17:22'),
(149, 67, 12, 'NORSUHAIDA', 'shda0512@gmail.com', '+60129276415', '0129276415', 'SAIDIN', '', '', '35900', 'gddf', 'Perak', 'Diluluskan', '2022-02-23', '16:46:12'),
(150, 68, 8, 'NORSUHAIDA', 'shda0512@gmail.com', '+60129276415', '+60129276415', 'SAIDIN', '', '', '35900', '0129276415', 'Perak', 'Diluluskan', '2022-02-24', '10:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `intern_details`
--

CREATE TABLE `intern_details` (
  `s_id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `applier_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `confirm_letter` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `transcript` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intern_details`
--

INSERT INTO `intern_details` (`s_id`, `i_id`, `applier_id`, `start_date`, `end_date`, `confirm_letter`, `resume`, `transcript`) VALUES
(6, 146, 9, '2022-03-01', '2022-08-22', 'NORSUHAIDA.pdf', 'RESUME.pdf', 'taw.pdf'),
(9, 149, 12, '2022-02-23', '2022-02-16', 'NORSUHAIDA.pdf', 'taw.pdf', 'tawaran.pdf'),
(10, 150, 8, '2022-02-24', '2022-03-10', 'NORSUHAIDA.pdf', 'taw.pdf', 'tawaran.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `s_id` int(11) NOT NULL,
  `applier_id` int(11) NOT NULL,
  `matric_no` varchar(20) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `marital` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `address3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `beneficiary` varchar(100) NOT NULL,
  `b_phone` varchar(15) NOT NULL,
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(100) NOT NULL,
  `offer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`s_id`, `applier_id`, `matric_no`, `programme`, `marital`, `address`, `address2`, `address3`, `postcode`, `city`, `state`, `beneficiary`, `b_phone`, `pic`, `department`, `offer`) VALUES
(6, 9, '2019421676', 'diploma in science computer', 'Bujang', 'no. 7, jln wm 3/25,', 'bandar behrang 2020', '', '35900', 'tanjong malim', 'perak', '', '', 'Intan.jpg', '-', 'tawaran.pdf'),
(9, 12, '1001', 'computer science', 'Bujang', 'NO 7, JLN WM 3/25, BANDAR BEHRANG 2020,, 35900, TA', '', 'kkkk', 'l', 'jj', 'kk', '', '', 'intern.jpg', 'JABATAN TEKNOLOGI MAKLUMAT, PELANCONGAN DAN REKREASI', 'tawaran.pdf'),
(10, 8, '1001', 'multimedia', 'Bujang', 'NO 7, JLN WM 3/25, BANDAR BEHRANG 2020,', '35900, TANJONG MALIM,PERAK', '', '35900', 'TANJUNG MALIM', 'Perak', '', '+60129276415', 'profile.png', 'JABATAN TEKNOLOGI MAKLUMAT, PELANCONGAN DAN REKREASI', 'tawaran.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applier`
--
ALTER TABLE `applier`
  ADD PRIMARY KEY (`applier_id`);

--
-- Indexes for table `coordinator_details`
--
ALTER TABLE `coordinator_details`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `applier_id` (`applier_id`),
  ADD KEY `i_id` (`i_id`);

--
-- Indexes for table `intern_details`
--
ALTER TABLE `intern_details`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `applier_id` (`applier_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `applier_id` (`applier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `applier`
--
ALTER TABLE `applier`
  MODIFY `applier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coordinator_details`
--
ALTER TABLE `coordinator_details`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `intern_details`
--
ALTER TABLE `intern_details`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinator_details`
--
ALTER TABLE `coordinator_details`
  ADD CONSTRAINT `coordinator_details_ibfk_1` FOREIGN KEY (`applier_id`) REFERENCES `applier` (`applier_id`),
  ADD CONSTRAINT `coordinator_details_ibfk_2` FOREIGN KEY (`i_id`) REFERENCES `intern_details` (`i_id`);

--
-- Constraints for table `intern_details`
--
ALTER TABLE `intern_details`
  ADD CONSTRAINT `intern_details_ibfk_1` FOREIGN KEY (`applier_id`) REFERENCES `applier` (`applier_id`),
  ADD CONSTRAINT `intern_details_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `student_details` (`s_id`);

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`applier_id`) REFERENCES `applier` (`applier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
