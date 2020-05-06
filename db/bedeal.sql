-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 08:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bedeal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `an_rek` varchar(100) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `usern_target` varchar(30) NOT NULL,
  `bank_target` varchar(10) NOT NULL,
  `norek_target` int(20) NOT NULL,
  `bukti` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `username`, `an_rek`, `bank`, `no_rek`, `usern_target`, `bank_target`, `norek_target`, `bukti`, `status`, `tanggal`) VALUES
(32, 'ochaco', 'Lemiillion', 'BNI', 12123123, 'milio', 'Mandiri', 123913912, 'bukti-transaksi3.jpeg', 'terkonfirmasi', '2020-02-05 22:35:16'),
(33, 'ochaco', 'Justin Ikeh', 'BNI', 1231230912, 'justin69', 'Mandiri', 123901230, 'bukti-transaksi4.jpeg', 'pending', '2020-02-05 22:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment_name` text NOT NULL,
  `file_ext` text NOT NULL,
  `mime_type` text NOT NULL,
  `message_date_time` text NOT NULL,
  `ip_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `attachment_name`, `file_ext`, `mime_type`, `message_date_time`, `ip_address`) VALUES
(30, 184, 197, 'hi jon please send my project file report', '', '', '', '2018-06-13 17:28:40', '::1'),
(31, 197, 184, 'ok', '', '', '', '2018-06-13 17:28:45', '::1'),
(32, 197, 184, 'wait..', '', '', '', '2018-06-13 17:28:47', '::1'),
(33, 197, 184, 'NULL', 'Proejct_report_presenation.pptx', '.pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', '2018-06-13 17:29:11', '::1'),
(34, 184, 197, 'ok thanks', '', '', '', '2018-06-13 17:30:21', '::1'),
(35, 197, 184, 'open the file', '', '', '', '2018-06-13 17:30:34', '::1'),
(36, 184, 197, 'please send images', '', '', '', '2018-06-13 17:31:22', '::1'),
(37, 197, 184, 'ok', '', '', '', '2018-06-13 17:31:27', '::1'),
(38, 197, 184, 'wait bro..', '', '', '', '2018-06-13 17:31:33', '::1'),
(39, 197, 184, 'NULL', '21_preview.png', '.png', 'image/png', '2018-06-13 17:31:43', '::1'),
(40, 197, 184, 'you got it', '', '', '', '2018-06-13 17:32:05', '::1'),
(41, 184, 197, 'yes', '', '', '', '2018-06-13 17:32:10', '::1'),
(42, 184, 197, 'thanks', '', '', '', '2018-06-13 17:32:16', '::1'),
(43, 184, 197, 'some pdf file send', '', '', '', '2018-06-13 17:32:33', '::1'),
(44, 197, 184, 'NULL', 'Invoice.pdf', '.pdf', 'application/pdf', '2018-06-13 17:33:03', '::1'),
(47, 196, 184, 'hai juga', '', '', '', '2020-01-28 16:07:56', '::1'),
(49, 196, 184, 'mantabb', '', '', '', '2020-01-28 16:08:08', '::1'),
(51, 196, 184, 'hai', '', '', '', '2020-01-28 16:09:29', '::1'),
(53, 196, 184, 'jadi gini', '', '', '', '2020-01-28 18:19:20', '::1'),
(54, 196, 184, 'apayaaaa', '', '', '', '2020-01-28 18:19:26', '::1'),
(57, 196, 184, 'hai jg', '', '', '', '2020-01-29 09:06:07', '::1'),
(61, 209, 184, 'hai', '', '', '', '2020-01-30 19:55:56', '::1'),
(63, 210, 196, 'hai', '', '', '', '2020-01-31 09:10:03', '::1'),
(64, 210, 196, 'tes', '', '', '', '2020-01-31 12:23:39', '::1'),
(65, 196, 210, 'tes2', '', '', '', '2020-01-31 12:25:07', '::1'),
(66, 213, 212, 'NULL', 'kfc.jpg', '.jpg', 'image/jpeg', '2020-02-01 14:32:55', '::1'),
(67, 213, 210, 'jadi berapa bang?', '', '', '', '2020-02-03 16:27:18', '::1'),
(68, 210, 213, '500k deh, skinnya lumayan banyak ni akun bang', '', '', '', '2020-02-03 16:28:25', '::1'),
(69, 213, 210, 'coba ss skin nya deh', '', '', '', '2020-02-03 16:29:04', '::1'),
(70, 210, 213, 'NULL', 'th.jpg', '.jpg', 'image/jpeg', '2020-02-03 16:32:43', '::1'),
(71, 213, 210, 'nego dikit lah bang', '', '', '', '2020-02-03 16:33:23', '::1'),
(72, 210, 213, 'udah mentok itu', '', '', '', '2020-02-03 16:33:46', '::1'),
(73, 213, 210, 'yauda deh deal ya bang', '', '', '', '2020-02-03 16:43:25', '::1'),
(74, 210, 213, 'nah gtu dong nih rek. gw 09231290210901 a.n Milio, bank BCA', '', '', '', '2020-02-03 16:45:32', '::1'),
(75, 213, 210, 'ok bang siap wkwkwk', '', '', '', '2020-02-03 16:45:58', '::1'),
(80, 210, 213, 'p', '', '', '', '2020-02-09 11:55:59', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `source` int(5) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `is_email_verify` int(11) NOT NULL,
  `name` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `alternateEmail` text NOT NULL,
  `mobile_no` text NOT NULL,
  `website` text NOT NULL,
  `picture_url` text NOT NULL,
  `profile_url` text NOT NULL,
  `vendor_file` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `about` text NOT NULL,
  `type` text NOT NULL,
  `address` text NOT NULL,
  `address_2` text NOT NULL,
  `country` text NOT NULL,
  `language` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `pincode` text NOT NULL,
  `ip_address` text NOT NULL,
  `created` text NOT NULL,
  `lastlogged` text NOT NULL,
  `modified` text NOT NULL,
  `an_rek` varchar(100) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `no_rek` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `source`, `status`, `is_email_verify`, `name`, `first_name`, `last_name`, `email`, `alternateEmail`, `mobile_no`, `website`, `picture_url`, `profile_url`, `vendor_file`, `dob`, `gender`, `about`, `type`, `address`, `address_2`, `country`, `language`, `state`, `city`, `pincode`, `ip_address`, `created`, `lastlogged`, `modified`, `an_rek`, `bank`, `no_rek`) VALUES
(127, 'admin', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Admin', 1, 1, 0, 'Admin', 'Super', 'Admin', 'admin@admin.com', '', '', '', 'eligibility-jump.png', '', '', '', '', 'asdfsdfsdfsdf', '', 'Helosdf', '', '', '', '', '', '302039', '::1', '2018-03-21 15:53:01', '', '2018-03-22 07:31:43', '', '', 0),
(184, 'vendor1@ca.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Vendor', 0, 1, 1, 'Vendor 1 xyz', 'Vendor 1', 'xyz', 'vendor1@xyz.com', '', '', '', '4.png', '', '[\"27042018105604_test - Copy (2).png\",\"27042018105604_test - Copy (3) - Copy.png\"]', '', '', '', '', '', '', '', '', '', '', '', '::1', '2018-04-27 10:56:05', '', '', '', '', 0),
(185, 'vendor2@ca.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Vendor', 0, 1, 1, 'Vendor 2 xyz', 'Vendor 2', 'xyz', 'vendor2@xyz.com', '', '', '', '', '', '[\"27042018105632_message-bar-chart3.png\",\"27042018105632_test - Copy (2).png\"]', '', '', '', '', '', '', '', '', '', '', '', '::1', '2018-04-27 10:56:33', '', '', '', '', 0),
(196, 'client1@ca.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Client_cs', 0, 1, 1, 'Client 1 xyz', 'Client 1', 'xyz', 'client1@xyz.com', '', '', '', '1.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '::1', '2018-04-27 10:56:05', '', '', '', '', 0),
(197, 'client2@ca.com', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Client_cs', 0, 1, 1, 'Client 2 xyz', 'Client 2', 'xyz', 'client2@xyz.com', '', '', '', '2.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '::1', '2018-04-27 10:56:05', '', '', '', '', 0),
(198, 'tes', '$2y$12$RyMmZVcqPEt9X2lJbHg1Peq8uNUXKXOjt3QQC3oT7xJsXfzIbM5J2', 'Admin', 0, 0, 0, 'admin', 'aaaaa', 'bbbbbb', 'tes@gmail.com', '', '', '', '', '', '', '', 'laki', '', '', 'gfbfg', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(209, 'allmighty', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Client_cs', 1, 1, 1, 'allmight', '', '', 'nama123@gmail.com', '', '', '', '', '', '', '', '', '', '', 'jl qwerty', '', '', '', '', '', '', '::1', '2020-01-30 16:30:13', '', '', '', '', 0),
(210, 'milio', '$2y$12$RyMmZVcqPEt9X2lJbHg1Pek7sDg0NYUP/9zqyEU/KfDCklR2qixKK', 'Vendor', 1, 1, 0, 'milio penjual', '', '', 'milio@gmail.com', '', '', '', '', '', '', '', '', '', '', 'jl qwerty', '', '', '', '', '', '', '::1', '2020-01-31 07:14:17', '', '', 'Lemiillion', 'BNI', 1241244234),
(211, 'toga', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Client_cs', 1, 1, 0, ' Himiko Toga', '', '', 'toga@gmail.com', '', '', '', '', '', '', '', '', '', '', 'jl qwertyy', '', '', '', '', '', '', '::1', '2020-01-31 15:29:26', '', '2020-01-31 16:07:14', '', '', 0),
(212, 'deku', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Client_cs', 1, 1, 0, 'Midoriya', '', '', 'deku@gmail.com', '', '', '', '', '', '', '', '', '', '', 'jl qwerty', '', '', '', '', '', '', '::1', '2020-01-31 16:34:46', '', '', '', '', 0),
(213, 'ochaco', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Client_cs', 1, 1, 0, 'Uraraka Ochaco', '', '', 'ochaco@gmail.com', '', '', '', '', '', '', '', '', '', '', 'jl abc 12', '', '', '', '', '', '', '::1', '2020-01-31 20:12:10', '', '', 'Uraraka Ochaco', 'BRI', 2147483647),
(214, 'meliodafu', '$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe', 'Client_cs', 1, 1, 0, 'Meliodas', '', '', 'mellioas@gm.com', '', '', '', '', '', '', '', '', '', '', 'JL. sukses', '', '', '', '', '', '', '::1', '2020-02-01 16:12:02', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
