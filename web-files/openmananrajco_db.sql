-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2022 at 11:24 AM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openmananrajco_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `updationDate`) VALUES
(1, 'Manan Raj', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-07-26 17:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `sid` varchar(120) DEFAULT NULL,
  `sem` varchar(120) DEFAULT NULL,
  `branch` varchar(120) DEFAULT NULL,
  `subject` char(11) DEFAULT NULL,
  `subj_id` varchar(100) DEFAULT NULL,
  `date` varchar(120) DEFAULT NULL,
  `a_time` varchar(30) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`, `sid`, `sem`, `branch`, `subject`, `subj_id`, `date`, `a_time`, `UpdationDate`) VALUES
(4, 'Manan Raj', '1', '5', 'ISE', 'DBMS LAB', '2', '2022-01-11', '14:32', '2022-01-11 11:22:04'),
(12, 'Manan Raj', '1', '5', 'ISE', 'DBMS LAB', '2', '2022-01-18', '11:02:39', '2022-01-18 11:02:43'),
(15, 'Manan Raj', '1', '5', 'ISE', 'DBMS LAB', '2', '2022-01-27', '11:05:38', '2022-01-27 11:05:38'),
(17, 'Manan Raj', '1', '5', 'ISE', '', '', '2022-01-29', '06:34:34', '2022-01-29 06:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `tid` varchar(20) DEFAULT NULL,
  `subj_id` varchar(20) DEFAULT NULL,
  `subject_name` varchar(120) DEFAULT NULL,
  `sem` varchar(120) DEFAULT NULL,
  `day` varchar(120) DEFAULT NULL,
  `branch` varchar(120) DEFAULT NULL,
  `time` char(11) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `tid`, `subj_id`, `subject_name`, `sem`, `day`, `branch`, `time`, `end_time`, `UpdationDate`) VALUES
(5, '1', '2', 'DBMS LAB', '5', '5', 'ISE', '14:00', '17:00', NULL),
(6, '1', '2', 'DBMS LAB', '5', '1', 'ISE', '09:30', '12:30', NULL),
(7, '1', '2', 'DBMS LAB', '5', '7', 'ISE', '09:30', '01:30', '2022-01-29 06:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `sem` varchar(120) DEFAULT NULL,
  `usn` varchar(100) DEFAULT NULL,
  `dob` varchar(120) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `sem`, `usn`, `dob`, `branch`, `email`, `phone`, `password`, `UpdationDate`) VALUES
(1, 'Manan Raj', '5', '1SI19IS033', '1999-12-10', 'ISE', 'mrmananraj34@gmail.com', '7764001252', 'manan', '2022-01-29 06:01:32'),
(2, 'ABHISHEK PATIL', '5', '1SI19IS02', '01-JAN-2001', 'ISE', '1si19is02@sit.ac.in', '9999999992', 'addfg', NULL),
(3, 'AJNEESH', '5', '1SI19IS03', '01-JAN-2001', 'ISE', '1si19is03@sit.ac.in', '9999999993', 'adrty', NULL),
(4, 'ALMAS JABEEN', '5', '1SI19IS04', '01-JAN-2001', 'ISE', '1si19is04@sit.ac.in', '9999999994', 'qwyuy', NULL),
(5, 'AMARSHESH SHARMA', '5', '1SI19IS05', '01-JAN-2001', 'ISE', '1si19is05@sit.ac.in', '9999999995', 'xcvrt', NULL),
(6, 'ANANYA G S', '5', '1SI19IS06', '01-JAN-2001', 'ISE', '1si19is06@sit.ac.in', '9999999996', 'fghjk', NULL),
(7, 'ANKITHA P SHEKHAR', '5', '1SI19IS07', '01-JAN-2001', 'ISE', '1si19is07@sit.ac.in', '9999999997', 'yuipt', NULL),
(8, 'ANUSHA B H', '5', '1SI19IS08', '01-JAN-2001', 'ISE', '1si19is08@sit.ac.in', '9999999998', 'cgfyu', NULL),
(9, 'ANVITHA P SHEKHAR', '5', '1SI19IS09', '01-JAN-2001', 'ISE', '1si19is09@sit.ac.in', '9999999999', 'ertbn', NULL),
(10, 'ARSH RAJ', '5', '1SI19IS010', '01-JAN-2001', 'ISE', '1si19is010@sit.ac.in', '9999999910', 'ojhfc', NULL),
(11, 'ASHA R', '5', '1SI19IS011', '01-JAN-2001', 'ISE', '1si19is011@sit.ac.in', '9999999911', 'pkmjc', NULL),
(12, 'B U RAJESHWARI', '5', '1SI19IS012', '01-JAN-2001', 'ISE', '1si19is012@sit.ac.in', '9999999912', 'qjuhj', NULL),
(13, 'BALAJI E S', '5', '1SI19IS013', '01-JAN-2001', 'ISE', '1si19is013@sit.ac.in', '9999999913', 'oinmi', NULL),
(14, 'CHANDAN PRAJWAL', '5', '1SI19IS014', '01-JAN-2001', 'ISE', '1si19is014@sit.ac.in', '9999999914', 'ijhbv', NULL),
(15, 'DAWOOD', '5', '1SI19IS015', '01-JAN-2001', 'ISE', '1si19is015@sit.ac.in', '9999999915', 'erfgb', NULL),
(16, 'DEEKSHITH J', '5', '1SI19IS016', '01-JAN-2001', 'ISE', '1si19is016@sit.ac.in', '9999999916', 'qdsff', NULL),
(17, 'DEEPAK K', '5', '1SI19IS017', '01-JAN-2001', 'ISE', '1si19is017@sit.ac.in', '9999999917', 'dsfet', NULL),
(18, 'DISHA K U', '5', '1SI19IS018', '01-JAN-2001', 'ISE', '1si19is018@sit.ac.in', '9999999918', 'ergrt', NULL),
(19, 'EDIGA TIPESWAMY GARI ANUSHA', '5', '1SI19IS019', '01-JAN-2001', 'ISE', '1si19is019@sit.ac.in', '9999999919', 'rgbji', NULL),
(20, 'G M AKSHATHA', '5', '1SI19IS020', '01-JAN-2001', 'ISE', '1si19is020@sit.ac.in', '9999999920', 'okjmn', NULL),
(21, 'GAURI RAVISHANKAR', '5', '1SI19IS021', '01-JAN-2001', 'ISE', '1si19is021@sit.ac.in', '9999999921', 'onyvc', NULL),
(22, 'HARSHIT RAJ', '5', '1SI19IS022', '01-JAN-2001', 'ISE', '1si19is022@sit.ac.in', '9999999922', 'okmyq', NULL),
(23, 'INDUSHREE MANJUNATHA HEDGE', '5', '1SI19IS023', '01-JAN-2001', 'ISE', '1si19is023@sit.ac.in', '99999999923', 'omytd', NULL),
(24, 'JANARDHAN PRABHAKAR GOUDA', '5', '1SI19IS024', '01-JAN-2001', 'ISE', '1si19is024@sit.ac.in', '9999999924', 'okmbn', NULL),
(25, 'JASHWANTH E RAO', '5', '1SI19IS025', '01-JAN-2001', 'ISE', '1si19is025@sit.ac.in', '9999999925', 'pmnyt', NULL),
(26, 'K S ARAVINDA KASHYAP', '5', '1SI19IS026', '01-JAN-2001', 'ISE', '1si19is026@sit.ac.in', '9999999926', 'oikjn', NULL),
(27, 'KARTHIK D V', '5', '1SI19IS027', '01-JAN-2001', 'ISE', '1si19is027@sit.ac.in', '9999999927', 'zxcvb', NULL),
(28, 'KHUSHI VARDIYA', '5', '1SI19IS028', '01-JAN-2001', 'ISE', '1si19is028@sit.ac.in', '9999999928', 'xcvbn', NULL),
(29, 'KIRAN U', '5', '1SI19IS029', '01-JAN-2001', 'ISE', '1si19is029@sit.ac.in', '9999999929', 'cvbnm', NULL),
(30, 'KOMAL', '5', '1SI19IS030', '01-JAN-2001', 'ISE', '1si19is030@sit.ac.in', '9999999930', 'mnbvc', NULL),
(31, 'M E VAIBHAVI GUPTA', '5', '1SI19IS031', '01-JAN-2001', 'ISE', '1si19is031@sit.ac.in', '9999999931', 'bvcxz', NULL),
(32, 'MAMATHA R C', '5', '1SI19IS032', '01-JAN-2001', 'ISE', '1si19is032@sit.ac.in', '9999999932', 'nvcvv', NULL),
(34, 'MEGHA JAISWAL', '5', '1SI19IS034', '01-JAN-2001', 'ISE', '1si19is034@sit.ac.in', '9999999934', 'sdfgh', NULL),
(35, 'MEGHANA V S', '5', '1SI19IS035', '01-JAN-2001', 'ISE', '1si19is035@sit.ac.in', '9999999935', 'fghjk', NULL),
(36, 'MOHIT KUMAR', '5', '1SI19IS036', '01-JAN-2001', 'ISE', '1si19is036@sit.ac.in', '9999999936', 'aasrt', NULL),
(37, 'MONISH JAYPRAKASH SEELAM', '5', '1SI19IS037', '01-JAN-2001', 'ISE', '1si19is037@sit.ac.in', '9999999937', 'okmnb', NULL),
(38, 'MUSTAFA', '5', '1SI19IS038', '01-JAN-2001', 'ISE', '1si19is038@sit.ac.in', '9999999938', 'dhkll', NULL),
(39, 'NANDAN T N', '5', '1SI19IS039', '01-JAN-2001', 'ISE', '1si19is039@sit.ac.in', '9999999939', 'lkjhg', NULL),
(40, 'PRASANT KUMAR SINGH', '5', '1SI19IS040', '01-JAN-2001', 'ISE', '1si19is040@sit.ac.in', '9999999940', 'poiuy', NULL),
(41, 'PRIYANKA', '5', '1SI19IS041', '01-JAN-2001', 'ISE', '1si19is041@sit.ac.in', '9999999941', 'wsdfv', NULL),
(42, 'PRUTHVI KIRAN', '5', '1SI19IS042', '01-JAN-2001', 'ISE', '1si19is042@sit.ac.in', '9999999942', 'okmpp', NULL),
(43, 'RAJKAMAL SINGH', '5', '1SI19IS043', '01-JAN-2001', 'ISE', '1si19is043@sit.ac.in', '9999999943', 'tgvrt', NULL),
(44, 'RAKESH C J', '5', '1SI19IS044', '01-JAN-2001', 'ISE', '1si19is044@sit.ac.in', '9999999944', 'qazxc', NULL),
(45, 'SACHIDANAND', '5', '1SI19IS045', '01-JAN-2001', 'ISE', '1si19is045@sit.ac.in', '9999999945', 'iuytq', NULL),
(46, 'SAIJAL SHANKAR', '5', '1SI19IS046', '01-JAN-2001', 'ISE', '1si19is046@sit.ac.in', '9999999946', 'okmjr', NULL),
(47, 'SALMA TABASSUM', '5', '1SI19IS047', '01-JAN-2001', 'ISE', '1si19is047@sit.ac.in', '9999999947', 'onsys', NULL),
(48, 'SALMAN KHAN', '5', '1SI19IS048', '01-JAN-2001', 'ISE', '1si19is048@sit.ac.in', '9999999948', 'mzbxy', NULL),
(49, 'SALONI CHAUHAN', '5', '1SI19IS049', '01-JAN-2001', 'ISE', '1si19is049@sit.ac.in', '9999999949', 'oplsz', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `dob` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `dp` varchar(500) DEFAULT 'assets/img/T.png',
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `dob`, `email`, `phone`, `password`, `dp`, `UpdationDate`) VALUES
(1, 'Kavitha H', '1999-12-10', 'mrmananraj34@gmail.com', '7764001252', 'manan', 'assets/img/T.png', '2022-01-29 01:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `teach_subj`
--

CREATE TABLE `teach_subj` (
  `id` int(11) NOT NULL,
  `tid` varchar(120) DEFAULT NULL,
  `branch` varchar(120) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `sem` varchar(120) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teach_subj`
--

INSERT INTO `teach_subj` (`id`, `tid`, `branch`, `subject`, `sem`, `UpdationDate`) VALUES
(2, '1', 'ISE', 'DBMS LAB', '5', '2022-01-27 09:58:19'),
(3, '1', 'CSE', 'JAVA LAB', '4', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teach_subj`
--
ALTER TABLE `teach_subj`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teach_subj`
--
ALTER TABLE `teach_subj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
