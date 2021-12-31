-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 11:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futureseekers`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs_tbl`
--

CREATE TABLE `jobs_tbl` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application` varchar(200) DEFAULT NULL,
  `date_applied` date NOT NULL DEFAULT current_timestamp(),
  `jstatus` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs_tbl`
--

INSERT INTO `jobs_tbl` (`id`, `job_id`, `comp_id`, `applicant_id`, `application`, `date_applied`, `jstatus`, `location`, `field`, `type`, `company`) VALUES
(2, 1, 24, 29, NULL, '2021-12-13', 'Active', 'Central Province', 'Frontend Developer', 'full time', 'ah company'),
(3, 48, 38, 38, NULL, '2021-12-13', 'Pending', 'North Province', 'Backend Developer', 'part time', 'KAZ'),
(25, 48, 24, 38, NULL, '2021-12-28', 'Active', 'Punjab', 'Javascript Developer', 'full time', 'Softtune'),
(26, 48, 24, 38, NULL, '2021-12-28', 'Pending', 'Asia', 'Asp.net', 'part time', 'ks company'),
(27, 1, 31, 39, NULL, '2021-12-28', 'Accepted', '', '', '', ''),
(28, 48, 24, 39, NULL, '2021-12-28', 'Rejected', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_listings`
--

CREATE TABLE `job_listings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `salary` int(10) NOT NULL,
  `pdate` date NOT NULL DEFAULT current_timestamp(),
  `edate` date NOT NULL,
  `experience` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_listings`
--

INSERT INTO `job_listings` (`id`, `user_id`, `title`, `salary`, `pdate`, `edate`, `experience`, `description`) VALUES
(1, 31, 'IT Intern', 50000, '2021-12-07', '0000-00-00', 'Experience more that 3 months', 'Assist in networking and computer repair'),
(48, 24, 'HR Executive', 100000, '2021-12-13', '0000-00-00', '5 year Experience in a similar field', 'Looking for experienced Hr Executives who can work well with teams'),
(49, 24, 'fefe', 0, '2021-12-13', '0000-00-00', 'eff', 'fef'),
(50, 24, 'fefefef', 0, '2021-12-13', '0000-00-00', 'fe323232', '3232323'),
(55, 24, '', 0, '2021-12-13', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notification_tbl`
--

CREATE TABLE `notification_tbl` (
  `note_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `note_title` varchar(100) NOT NULL,
  `status` char(10) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_tbl`
--

INSERT INTO `notification_tbl` (`note_id`, `receiver_id`, `sender_id`, `note_title`, `status`, `content`, `post_date`) VALUES
(24, 32, 1, 'Signup Declined', 'read', 'Your signup to Futureseekers was declined by the administration.', '2021-12-07 16:26:05'),
(25, 32, 1, 'Signup Approved', 'Unread', 'Your signup to Futureseekers was approved by the administration.', '2021-12-07 16:26:11'),
(26, 32, 1, 'Signup Approved', 'Unread', 'Your signup to Futureseekers was approved by the administration.', '2021-12-07 16:31:46'),
(27, 32, 1, 'Application Received', 'Unread', 'We have received your CV for accreditation. You will be contancted if you application is successful', '2021-12-07 17:13:57'),
(28, 34, 1, 'Signup Approved', 'read', 'Your signup to Futureseekers was approved by the administration.', '2021-12-08 08:19:04'),
(29, 34, 1, 'Application Received', 'read', 'We have received your CV for accreditation. You will be contancted if you application is successful', '2021-12-08 08:21:12'),
(30, 35, 1, 'Signup Approved', 'Unread', 'Your signup to Futureseekers was approved by the administration.', '2021-12-11 11:51:35'),
(31, 33, 1, 'Signup Approved', 'Unread', 'Your signup to Futureseekers was approved by the administration.', '2021-12-11 11:51:40'),
(32, 36, 1, 'Signup Declined', 'Unread', 'Your signup to Futureseekers was declined by the administration.', '2021-12-13 19:26:32'),
(33, 36, 1, 'Signup Declined', 'Unread', 'Your signup to Futureseekers was declined by the administration.', '2021-12-13 19:26:36'),
(34, 36, 1, 'Signup Approved', 'Unread', 'Your signup to Futureseekers was approved by the administration.', '2021-12-13 19:26:38'),
(35, 36, 1, 'Signup Declined', 'Unread', 'Your signup to Futureseekers was declined by the administration.', '2021-12-13 19:27:42'),
(36, 36, 1, 'Signup Declined', 'Unread', 'Your signup to Futureseekers was declined by the administration.', '2021-12-13 19:28:58'),
(37, 36, 1, 'Signup Approved', 'Unread', 'Your signup to Futureseekers was approved by the administration.', '2021-12-13 19:29:05'),
(38, 37, 1, 'Signup Approved', 'read', 'Your signup to Futureseekers was approved by the administration.', '2021-12-27 16:44:28'),
(39, 38, 1, 'Signup Approved', 'read', 'Your signup to Futureseekers was approved by the administration.', '2021-12-27 17:23:20'),
(40, 38, 1, 'Signup ', 'read', 'Your signup to Futureseekers was approved by the administration.', '2021-12-27 17:23:20'),
(41, 38, 1, 'hello', 'Unread', 'Your signup to Futureseekers was approved by the administration.', '2021-12-27 17:23:20'),
(42, 38, 1, 'notification', 'read', 'Your signup to Futureseekers was approved by the administration.', '2021-12-27 17:23:20'),
(43, 39, 1, 'Signup Approved', 'read', 'Your signup to Futureseekers was approved by the administration.', '2021-12-28 16:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registration_date` date NOT NULL,
  `type` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `ctype` varchar(100) DEFAULT '(Comapny Type)',
  `location` varchar(100) DEFAULT '(City)',
  `web` varchar(100) DEFAULT '(Website)',
  `github` varchar(100) DEFAULT '(Github)',
  `twitter` varchar(100) DEFAULT '(Twitter)',
  `insta` varchar(100) DEFAULT '(Instagram)',
  `fb` varchar(100) DEFAULT '(Facebook)',
  `phone` varchar(50) DEFAULT '(Official Contact)',
  `phone-alt` varchar(50) DEFAULT '(Mobile Number)',
  `address` varchar(100) DEFAULT '(Address)',
  `about` varchar(200) DEFAULT '(About)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `registration_date`, `type`, `status`, `ctype`, `location`, `web`, `github`, `twitter`, `insta`, `fb`, `phone`, `phone-alt`, `address`, `about`) VALUES
(24, 'Kavisha', 'kavi2001', 'kavisha.withana@gmail.com', '$2y$10$wstHehOF3FcqHHBv6lGRPeivY.owk5wC6qF0aQ1fQTLAMxfR79oqO', '2021-11-30', 'Employer', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(29, 'kavishaaaa', 'kavi123', 'kavi@gmail.com', '$2y$10$06WWKnZzK.2pI.WVZZHg6eaocNeU.O2RNvPK9Dia4kT89/NhDu8VG', '2021-12-01', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(30, 'hiru123', 'hiru123', 'hiru@gmail.com', '$2y$10$SKyD40gV0OjeSXyKffW8nuChbACuILDmDC5SXyqLeWo25sTJtvZnq', '2021-12-05', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(31, 'trial trial', 'trial', 'trial@gmail.com', '$2y$10$9ttr/2DrSL9i8SE4HPUhluLcthmJ8sbNWBzFhsMSfOwpt2dMITPkG', '2021-12-07', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(32, 'test1', 'test1', 'test1@gmail.com', '$2y$10$iPFDfgqDxieMUVXM34OFxOmnkdiyx5iETbaQvObKoyUxUYaYY6rXe', '2021-12-07', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(33, 'trial2', 'trial2', 'trial2@gmail.com', '$2y$10$gI8XqMRsYl3VbPWNH33flerwoXOoaFxVtl8UyfcPwe3tDjQUBHRIS', '2021-12-08', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(34, 'trial3', 'trial3', 'trial3@gmail.com', '$2y$10$jnFhIIJrLCsd8nJePBKkB.s/JQyEA0Vi1FKtNkn.sjV5.9/dtnl6W', '2021-12-08', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(35, 'trial4', 'trial4', 'trial4@gmail.com', '$2y$10$f/po6ukPX6i2A8txrtth.ONlePmfr2WAPN1g.zpEHBQoAeFM6LC2q', '2021-12-11', '1', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(36, 'hiri', 'qwerty', 'kavishawithana@gmail.com', '$2y$10$85NM5btRjEH4V7nUwBDkSulg1Ix6bmErQ0e6066dNkfrpoFYiDsd.', '2021-12-13', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(37, 'Rabia', 'Rabia', 'rabiaadrees50@gmail.com', '$2y$10$yL1i1SYF6MXo7Gtr1gXlj.QUnkedMTNJGfJtVFdHk/LLd6vTMXvGC', '2021-12-27', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(38, 'Warda', 'Warda', 'warda@gmail.com', '$2y$10$O3575Ck1aeLAuLm/YMP/9e70zi2k1RtLfoapP3Vo37LJZRA4Mgf2a', '2021-12-27', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)'),
(39, 'test', 'test', 'test@gmail.com', '$2y$10$rr8qtWLkdL6wtmTasaz6bOYb8PfF5k6miWYXIlXWbhHO86G1qcXgO', '2021-12-28', 'Job Seeker', 1, '(Comapny Type)', '(City)', '(Website)', '(Github)', '(Twitter)', '(Instagram)', '(Facebook)', '(Official Contact)', '(Mobile Number)', '(Address)', '(About)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs_tbl`
--
ALTER TABLE `jobs_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comp_id` (`comp_id`),
  ADD KEY `apllicant_id` (`applicant_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs_tbl`
--
ALTER TABLE `jobs_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs_tbl`
--
ALTER TABLE `jobs_tbl`
  ADD CONSTRAINT `jobs_tbl_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_tbl_ibfk_3` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_tbl_ibfk_4` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD CONSTRAINT `job_listings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
